<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Twig\TwigFunction;

session_start();
require 'vendor/autoload.php';
require 'config.php';

$helpers = scandir('app/helpers');
foreach ($helpers as $helper) {
    if (is_file('app/helpers/' . $helper)) {
        require 'app/helpers/' . $helper;
    }
}

$GLOBALS['config'] = $config;
$_SESSION['config'] = $config;

$app = new App(array('settings' => $config));

$container = $app->getContainer();

$container['upload_directory'] = $config['upload_directory'];

$container['view'] = function ($c) {
    global $config;
    $themepath = array('app/views');
    if (!empty($config['theme'])) $themepath[] = $config['theme'] . '/views';
    $v = new Twig($themepath, ['cache' => $GLOBALS['config']['cache']]);
    $v->addExtension(new TwigExtension($c->router, $c->request->getUri()));
    return $v;
};

$container['db'] = function () {
    global $config;
    $conn = null;
    if (!empty($config['db']['host'])) {
        $conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db_name']);
        $conn->set_charset("utf8");
    }
    return $conn;
};

$app->add(function (ServerRequestInterface $rq, ResponseInterface $rs, $n) use ($app, $container) {
    global $config;

    $langs = array();
    if (!empty($_SESSION['lang'])) {
        if (file_exists('app/languages/' . $_SESSION['lang'] . '.php')) {
            include 'app/languages/' . $_SESSION['lang'] . '.php';
        }
    } else {
        if (file_exists('app/languages/' . $config['language_default'] . '.php')) {
            include 'app/languages/' . $config['language_default'] . '.php';
        }
    }
    $GLOBALS['lang']['app'] = $langs;

    $langs = array();
    if (!empty($config['theme'])) {
        if (!empty($_SESSION['lang'])) {
            if (file_exists($config['theme'] . '/languages/' . $_SESSION['lang'] . '.php')) {
                include $config['theme'] . '/languages/' . $_SESSION['lang'] . '.php';
            }
        } else {
            if (file_exists($config['theme'] . '/languages/' . $config['language_default'] . '.php')) {
                include $config['theme'] . '/languages/' . $config['language_default'] . '.php';
            }
        }
    }
    $GLOBALS['lang']['theme'] = $langs;

    $GLOBALS['db_def'] = getAllDBDef();

    $uri = $rq->getUri();
    $uri = trim($uri->getPath(), '/');
    $GLOBALS['uri'] = explode('/', $uri);
    $view = $container->view->getEnvironment();
    $view->addGlobal("cur_lang", $_SESSION['lang']);
    $view->addGlobal("lang", $GLOBALS['lang']);
    $view->addGlobal("lang_js", json_encode($GLOBALS['lang']));

    $view->addGlobal("config", $config);
    $view->addGlobal("config_js", json_encode($config));

    $view->addGlobal("base_url", $config['base_url']);

    $view->addGlobal("cur_uri", $uri);
    $view->addGlobal("uri", $GLOBALS['uri']);
    $view->addGlobal("db_def", $GLOBALS['db_def']);

    if ($result = $container->db->query("SELECT * FROM settings")) {
        if ($row = $result->fetch_assoc()) {
            $GLOBALS['settings'] = $row;
            $view->addGlobal("settings", $row);
        }
    }

    $ex = array(
        'admin/user/login',
        'admin/repair'
    );
    if (preg_match('/^admin/', $uri) && !in_array($uri, $ex)) {
        if (empty($_SESSION['login'])) {
            return $rs->withRedirect($config['base_url'] . '/admin/user/login');
        } else {
            $view->addGlobal("login", $_SESSION['login']);
        }
    }

    /**
     * add function to twig view
     */
    $extFunction = new TwigFunction("form_field", function ($type, $name, $required = "", $listOption = array(), $val = "", $addNullOption = 0) {
        $html = "";
        switch ($type) {
            case "text":
                $html = "<input type='text' class='form-control' value='{$val}' name='{$name}' {$required}/>";
                break;
            case "slug":
                $html = "<input type='text' onchange='this.value=convertToURLString(this.value)' class='form-control' value='{$val}' name='{$name}' {$required}/>";
                break;
            case "datetime":
                if ($val == 'now') $val = date($GLOBALS['config']['date_format'] . ' H:i');
                $html = '<div class="input-group">
                                <input type="text" class="form-control datetimepicker" value="' . $val . '" name="' . $name . '" ' . $required . '/>
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                              </div>';
                break;
            case "date":
                $html = '<div class="input-group">
                                <input type="text" class="form-control datepicker" value="' . $val . '" name="' . $name . '" ' . $required . '/>
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                              </div>';
                break;
            case "time":
                $html = '<div class="input-group">
                                <input type="text" class="form-control timepicker" value="' . $val . '" name="' . $name . '" ' . $required . '/>
                                <div class="input-group-append">
                                  <span class="input-group-text"><i class="far fa-calendar"></i></span>
                                </div>
                              </div>';
                break;
            case "editor":
                $html = "<textarea class='ckeditor' name='{$name}' {$required}>{$val}</textarea>";
                break;
            case "textarea":
                $html = "<textarea class='form-control' name='{$name}' {$required}>{$val}</textarea>";
                break;
            case "multienum":
                $html = "<select class='form-control select2' multiple='multiple' name='{$name}[]' style='width: 100%'>";
                if ($addNullOption) $html .= "<option value=''>#</option>";
                if (is_array($listOption)) {
                    foreach ($listOption as $k => $v) {
                        if (is_array($val)) $html .= "<option value='{$k}' " . (in_array($k, $val) ? 'selected' : '') . ">$v</option>";
                        else $html .= "<option value='{$k}' " . ($k == $val ? 'selected' : '') . ">$v</option>";
                    }
                }
                $html .= "</select>";
                break;
            case "enum":
                $html = "<select class='form-control select2' name='{$name}' style='width: 100%'>";
                if ($addNullOption) $html .= "<option value=''>#</option>";
                if (is_array($listOption)) {
                    foreach ($listOption as $k => $v) {
                        $html .= "<option value='{$k}' " . ($k == $val ? 'selected' : '') . ">$v</option>";
                    }
                }
                $html .= "</select>";
                break;
        }
        return $html;
    });
    $view->addFunction($extFunction);

    $extFunction = new TwigFunction("view_field", function ($type, $name, $val, $listOption = array()) {
        $html = "";
        switch ($type) {
            case "text":
                $html = "<div data-field-name='{$name}'>{$val}</div>";
                break;
            case "enum":
                $html = "<div data-field-name='{$name}' data-field-value='{$val}'>{$listOption[$val]}</div>";
                break;
            case "multienum":
                $html = "<div data-field-name='{$name}'><ul>";
                foreach ($val as $k) {
                    $html .= "<li data-field-value='{$k}'>{$listOption[$k]}</li>";
                }
                $html .= "</ul></div>";
                break;
        }
        return $html;
    });
    $view->addFunction($extFunction);

    $extFunction = new TwigFunction("lang", function ($key, $location = 'app') {
        if (isset($GLOBALS['lang'][$location][$key])) return $GLOBALS['lang'][$location][$key];
        return $key;
    });
    $view->addFunction($extFunction);

    return $n($rq, $rs);
});

/**
 * admin router
 */
if ($routers = scandir('app/routers')) {
    foreach ($routers as $router) {
        if (is_file('app/routers/' . $router)) {
            include 'app/routers/' . $router;
        }
    }
}

/**
 * router of theme
 */
if (!empty($GLOBALS['config']['theme'])) {
    if ($routers = scandir($GLOBALS['config']['theme'] . '/routers')) {
        foreach ($routers as $router) {
            if (is_file($GLOBALS['config']['theme'] . '/routers/' . $router)) {
                include $GLOBALS['config']['theme'] . '/routers/' . $router;
            }
        }
    }
}

/**
 * 404 handle and redirect
 */
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (ServerRequestInterface $rq, ResponseInterface $rs) {
    global $config;
    $uri = $rq->getUri();
    $uri = $uri->getPath();
    if (preg_match('/^admin/', $uri)) {
        return $rs->withRedirect($config['base_url'] . '/admin');
    }
    return $rs->withRedirect($config['base_url']);
});

/**
 * run app
 */
$app->run();
<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

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
    if (!empty($config['db']['host']))
        return new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db_name']);
    return null;
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

    $uri = $rq->getUri();
    $uri = trim($uri->getPath(), '/');
    $GLOBALS['uri'] = explode('/', $uri);
    $view = $container->view->getEnvironment();
    $view->addGlobal("lang", $GLOBALS['lang']);
    $view->addGlobal("config", $config);
    $view->addGlobal("cur_lang", $_SESSION['lang']);
    $view->addGlobal("lang_js", json_encode($GLOBALS['lang']));
    $view->addGlobal("base_url", $config['base_url']);
    $view->addGlobal("cur_uri", $uri);
    $view->addGlobal("uri", $GLOBALS['uri']);

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
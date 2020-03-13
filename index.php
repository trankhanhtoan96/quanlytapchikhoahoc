<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

session_start();
require 'vendor/autoload.php';
require 'config.php';
require 'helper.php';
$GLOBALS['config'] = $config;

$app = new App(array('settings' => $config));

$container = $app->getContainer();

$container['upload_directory'] = $config['upload_directory'];

$container['view'] = function ($c) {
    $v = new Twig('public/views', ['cache' => $GLOBALS['config']['cache']]);
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
        if (file_exists('admin/languages/' . $_SESSION['lang'] . '.php')) {
            include 'admin/languages/' . $_SESSION['lang'] . '.php';
        }
    } else {
        if (file_exists('admin/languages/' . $config['language_default'] . '.php')) {
            include 'admin/languages/' . $config['language_default'] . '.php';
        }
    }
    $GLOBALS['lang']['admin'] = $langs;

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
        'admin/login',
        'admin/repair'
    );
    $_SESSION['login'] = array();
    if (preg_match('/^admin/', $uri) && !in_array($uri, $ex)) {
        if (empty($_SESSION['login'])) {
            return $rs->withRedirect($config['base_url'] . '/admin/login');
        } else {
            $view->addGlobal("login", $_SESSION['login']);
        }
    }

    return $n($rq, $rs);
});

$app->get('/admin/repair', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    require 'database.php';
    if (empty($tables)) return 'Empty database!';
    if (empty($this->db)) return 'Database not config yet!';
    foreach ($tables as $tableName => $table) {
        if ($r1 = $this->db->query("SHOW TABLES LIKE '{$tableName}'")) {
            if ($r1->num_rows > 0) {
                /*
                 * table exist
                 * check field to add or modify
                 */
                foreach ($table as $fieldName => $field) {
                    if ($r2 = $this->db->query("SHOW COLUMNS FROM $table LIKE '$fieldName'")) {
                        if ($r2->num_rows > 0) {
                            $required = (empty($field['required']) ? '' : 'not null');
                            $this->db->query("ALTER TABLE {$table} MODIFY {$fieldName} {$field['type']} {$required}");
                        }
                    } else {
                        $required = (empty($field['required']) ? '' : 'not null');
                        $this->db->query("ALTER TABLE $table ADD COLUMN  {$fieldName} {$field['type']} {$required}");
                    }
                }
            } else {
                /**
                 * table not exist
                 * create table for new
                 */
                $sql = "create table " . $tableName . " (";
                foreach ($table as $fieldName => $field) {
                    $required = (empty($field['required']) ? '' : 'not null');
                    $sql .= "{$fieldName} {$field['type']} {$required} ,";
                }
                $sql = rtrim($sql, ',') . ')';
                $this->db->query($sql);

                /**
                 * insert default data
                 */
                if (!empty($values)) {
                    foreach ($values as $table => $datas) {
                        foreach ($datas as $data) {
                            $sql = "insert into {$table} (";
                            $sql2 = 'values(';
                            foreach ($data as $col => $val) {
                                $sql .= $col . ',';
                                $sql2 .= '"' . $val . '",';
                            }
                            $sql = rtrim($sql, ',') . ') ' . rtrim($sql2, ',') . ')';
                            $this->db->query($sql);
                        }
                    }
                }
            }
        }
    }
    return 'Done!';
});

/**
 * set language for current user
 */
$app->post('/setLang', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    $_SESSION['lang'] = $rq->getParam('lang');
    return $rs->withJson(array('success' => 1));
});

/**
 * admin router
 */
if ($routers = scandir('admin/routers')) {
    foreach ($routers as $router) {
        if (is_file('admin/routers/' . $router)) {
            include 'admin/routers/' . $router;
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
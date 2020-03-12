<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

session_start();
require 'vendor/autoload.php';
require 'settings.php';
require 'helper.php';
$GLOBALS['app_settings'] = $appSettings;
$app = new App($appSettings);
$container = $app->getContainer();
$container['view'] = function ($container) {
    $view = new Twig('public/views', ['cache' => $GLOBALS['app_settings']['settings']['cache']]);
    $view->addExtension(new TwigExtension($container->router, $container->request->getUri()));
    return $view;
};
$container['db'] = function () {
    global $app_settings;
    if (!empty($app_settings['settings']['db']['host'])) {
        $conn = new mysqli($app_settings['settings']['db']['host'], $app_settings['settings']['db']['user'], $app_settings['settings']['db']['pass'], $app_settings['settings']['db']['db_name']);
        return $conn;
    }
    return null;
};
$container['upload_directory'] = 'public/media/upload';
$app->add(function (ServerRequestInterface $req, ResponseInterface $res, $next) use ($app, $container) {
    if (!empty($_SESSION['lang']) && file_exists('public/languages/' . $_SESSION['lang'] . '.php')) $GLOBALS['lang'] = require 'public/languages/' . $_SESSION['lang'] . '.php';
    else $GLOBALS['lang'] = require 'public/languages/vi.php';
    $uri = $req->getUri();
    $uri = trim($uri->getPath(), '/');
    $view = $container->view->getEnvironment();
    $view->addGlobal("lang", $GLOBALS['lang']);
    $view->addGlobal("cur_lang", $_SESSION['lang']);
    $view->addGlobal("lang_js", json_encode($GLOBALS['lang']));
    $view->addGlobal("base_url", $GLOBALS['app_settings']['settings']['base_url']);
    $view->addGlobal("cur_uri", $uri);
    $view->addGlobal("uri", explode('/', $uri));

    if ($result = $this->db->query("SELECT * FROM settings")) {
        if ($row = $result->fetch_assoc()) {
            $GLOBALS['settings'] = $row;
            $view->addGlobal("settings", $row);
        }
    }

    if (empty($_SESSION['login'])) {
        $_SESSION['login'] = null;
        if (preg_match('/^admin/', $uri) && $uri != 'admin/login' && $uri != 'admin/repair')
            return $res->withRedirect($GLOBALS['app_settings']['settings']['base_url'] . '/admin/login');
    }
    $view->addGlobal("login", $_SESSION['login']);
    $response = $next($req, $res);
    return $response;
});
$app->get('/admin/repair', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    require 'database.php';
    if (empty($db_tables)) $db_tables = array();
    foreach ($db_tables as $table => $table_detail) {
        $result = $this->db->query("SHOW TABLES LIKE '{$table}'");
        if ($result->num_rows > 0) {
            foreach ($table_detail as $col => $col_detail) {
                $result = $this->db->query("SHOW COLUMNS FROM $table LIKE '$col'");
                if ($result->num_rows > 0) $this->db->query("ALTER TABLE $table MODIFY  $col {$col_detail['type']} " . (!empty($col_detail['required']) ? 'not null' : ''));
                else $this->db->query("ALTER TABLE $table ADD COLUMN  $col {$col_detail['type']}" . (!empty($col_detail['required']) ? 'not null' : ''));
            }
        } else {
            //create table
            $sql = "create table " . $table . " (";
            foreach ($table_detail as $col => $col_detail) $sql .= $col . ' ' . $col_detail['type'] . ' ' . (!empty($col_detail['required']) ? 'not null' : '') . ',';
            $sql = rtrim($sql, ',') . ')';
            $this->db->query($sql);

            require 'database.php';
            //import default data
            if (empty($db_default_values)) $db_default_values = array();
            foreach ($db_default_values as $table => $datas) {
                foreach ($datas as $data) {
                    $sql = "insert into $table (";
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
    return 'Done!';
});
$app->post('/setLang', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    $_SESSION['lang'] = $req->getParam('lang');
    return $res->withJson(array('success' => 1));
});
require 'router_admin.php';
require 'router_' . $GLOBALS['app_settings']['settings']['theme'] . '.php';
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (ServerRequestInterface $req, ResponseInterface $res) {
    $uri = $req->getUri();
    $uri = trim($uri->getPath(), '/');
    if (preg_match('/^admin/', $uri)) {
        return $res->withRedirect($GLOBALS['app_settings']['settings']['base_url'] . '/admin');
    } else {
        return $res->withRedirect($GLOBALS['app_settings']['settings']['base_url']);
    }
});
$app->run();
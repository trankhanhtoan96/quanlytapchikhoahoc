<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/user/login', function (SR $rq,RS $rs, array $ag) {
    $_SESSION['login'] = null;
    return $this->view->render($rs, 'app/user/login.twig', $ag);
});
$app->post('/admin/user/login', function (SR $req,RS $res, array $args) {
    $data = array(
        'username' => $req->getParam('username'),
        'password' => $req->getParam('password')
    );
    $sql = "SELECT * FROM users where username='{$data['username']}'";
    $result = $this->db->query($sql);
    if ($result->num_rows == 1) {
        if ($row = $result->fetch_assoc()) {
            if (password_verify($data['password'], $row['password'])) {
                $_SESSION['login'] = $row;
                if(empty($_SESSION['lang'])) $_SESSION['lang']=$GLOBALS['config']['language_default'];

                /**
                 * update last_login
                 */
                $nowDb = date("Y-m-d H:i:s");
                $this->db->query("update users set last_login='{$nowDb}'");
                return $res->withJson(array('success' => 1));
            }
        }
    }
    return $res->withJson(array('success' => 0));
});
$app->get('/admin/user/change_password', function (SR $req,RS $res, array $args) {
    return $this->view->render($res, 'app/user/change_password.twig', $args);
});
$app->post('/admin/user/change_password', function (SR $req,RS $res, array $args) {
    if (password_verify($req->getParam('cur_pass'), $_SESSION['login']['password'])) {
        $pass = password_hash($req->getParam('new_pass'), 1);
        $sql = "update users set password='{$pass}' where id='{$_SESSION['login']['id']}'";
        $this->db->query($sql);
        $_SESSION['login']['password'] = $pass;
        return $res->withJson(array('success' => 1));
    }
    return $res->withJson(array('success' => 0));
});
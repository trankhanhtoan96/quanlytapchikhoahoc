<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->post('/admin/login', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
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
                return $res->withJson(array('success' => 1));
            }
        }
    }
    return $res->withJson(array('success' => 0));
});
$app->get('/admin/change_password', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    return $this->view->render($res, 'admin/change_password.twig', $args);
});
$app->post('/admin/change_password', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    if (password_verify($req->getParam('cur_pass'), $_SESSION['login']['password'])) {
        $pass = password_hash($req->getParam('new_pass'), 1);
        $sql = "update users set password='{$pass}' where id='{$_SESSION['login']['id']}'";
        $this->db->query($sql);
        $_SESSION['login']['password'] = $pass;
        return $res->withJson(array('success' => 1));
    }
    return $res->withJson(array('success' => 0));
});
$app->get('/admin/login', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    $_SESSION['login'] = null;
    return $this->view->render($res, 'admin/login.twig', $args);
});
$app->get('/admin', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    return $this->view->render($res, 'admin/dashboard.twig', $args);
});
$app->get('/admin/setting', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    return $this->view->render($res, 'admin/setting/setting.twig', $args);
});
$app->post('/admin/setting', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    $directory = $this->get('upload_directory');
    $uploadedFiles = $req->getUploadedFiles();

    $uploadedFile = $uploadedFiles['favicon'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        $this->db->query("UPDATE settings set favicon='$filename'");
    }

    $uploadedFile = $uploadedFiles['logo'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        $this->db->query("UPDATE settings set logo='$filename'");
    }

    return $res->withRedirect($GLOBALS['app_settings']['settings']['base_url'] . '/admin/setting');
});
$app->get('/admin/setting/email', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    return $this->view->render($res, 'admin/setting/setting_email.twig', $args);
});
$app->post('/admin/setting/email', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    if ($val = $req->getParam('mailer_host')) {
        $this->db->query("UPDATE settings set mailer_host='$val'");
    }
    if ($val = $req->getParam('mailer_user')) {
        $this->db->query("UPDATE settings set mailer_user='$val'");
    }
    if ($val = $req->getParam('mailer_pass')) {
        $kte = new KTEncrypt();
        $val = $kte->encode($val, 'tkt');
        $this->db->query("UPDATE settings set mailer_pass='$val'");
    }
    if ($val = $req->getParam('mailer_replyto')) {
        $this->db->query("UPDATE settings set mailer_replyto='$val'");
    }
    if ($val = $req->getParam('mailer_from')) {
        $this->db->query("UPDATE settings set mailer_from='$val'");
    }
    if ($val = $req->getParam('mailer_fromname')) {
        $this->db->query("UPDATE settings set mailer_fromname='$val'");
    }
    if ($val = $req->getParam('mailer_replytoname')) {
        $this->db->query("UPDATE settings set mailer_replytoname='$val'");
    }
    return $res->withRedirect($GLOBALS['app_settings']['settings']['base_url'] . '/admin/setting/email');
});
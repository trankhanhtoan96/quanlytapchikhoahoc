<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/admin/login', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    return $this->view->render($rs, 'app/login/login.twig', $ag);
});
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
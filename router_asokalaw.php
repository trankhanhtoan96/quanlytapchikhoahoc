<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', function (ServerRequestInterface $req, ResponseInterface $res, array $args) {
    return $this->view->render($res, 'asokalaw/home.twig', $args);
});
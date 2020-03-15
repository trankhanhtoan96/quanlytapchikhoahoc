<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/admin', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    return $this->view->render($rs, 'app/home/dashboard.twig', $ag);
});
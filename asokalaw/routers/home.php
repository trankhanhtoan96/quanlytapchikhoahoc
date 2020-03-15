<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    return $this->view->render($rs, 'asokalaw/home/home.twig', $ag);
});
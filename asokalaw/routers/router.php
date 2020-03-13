<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    return 'home';
});
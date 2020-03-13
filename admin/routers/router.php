<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/admin/login', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    return 'admin';
});
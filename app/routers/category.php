<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/admin/category', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    include 'app/database/category.php';
    $ag['database'] = empty($tables) ? null : $tables;
    return $this->view->render($rs, 'app/category/list.twig', $ag);
});
$app->get('/admin/category/create', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    include 'app/database/category.php';
    $ag['database'] = empty($tables) ? null : $tables;
    return $this->view->render($rs, 'app/category/create.twig', $ag);
});
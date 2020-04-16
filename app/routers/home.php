<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin', function (SR $rq,RS $rs, array $ag) {
    return $this->view->render($rs, 'app/home/dashboard.twig', $ag);
});
<?php

use Psr\Http\Message\ResponseInterface as RI;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/', function (SR $rq, RI $rs, array $ag) {
    $ag['partners'] = array();
    $tmp = scandir('upload/files/partner');
    foreach ($tmp as $tmp2) {
        if (is_file('upload/files/partner/' . $tmp2)) {
            $ag['partners'][] = $GLOBALS['config']['base_url'] . '/upload/files/partner/' . $tmp2;
        }
    }
    return $this->view->render($rs, 'asokalaw/home/home.twig', $ag);
});
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
    return $this->view->render($rs, 'asokalaw/home/index.twig', $ag);
});
$app->get('/dang-ky-nhan-hieu', function (SR $rq, RI $rs, array $ag) {
    $ag['partners'] = array();
    $tmp = scandir('upload/files/partner');
    foreach ($tmp as $tmp2) {
        if (is_file('upload/files/partner/' . $tmp2)) {
            $ag['partners'][] = $GLOBALS['config']['base_url'] . '/upload/files/partner/' . $tmp2;
        }
    }
    return $this->view->render($rs, 'asokalaw/dknh/index.twig', $ag);
});
$app->get('/tu-van-luat-su', function (SR $rq, RI $rs, array $ag) {
    $ag['partners'] = array();
    $tmp = scandir('upload/files/partner');
    foreach ($tmp as $tmp2) {
        if (is_file('upload/files/partner/' . $tmp2)) {
            $ag['partners'][] = $GLOBALS['config']['base_url'] . '/upload/files/partner/' . $tmp2;
        }
    }
    return $this->view->render($rs, 'asokalaw/tvls/index.twig', $ag);
});
$app->get('/phap-ly-thuong-xuyen', function (SR $rq, RI $rs, array $ag) {
    $ag['partners'] = array();
    $tmp = scandir('upload/files/partner');
    foreach ($tmp as $tmp2) {
        if (is_file('upload/files/partner/' . $tmp2)) {
            $ag['partners'][] = $GLOBALS['config']['base_url'] . '/upload/files/partner/' . $tmp2;
        }
    }
    return $this->view->render($rs, 'asokalaw/pltx/index.twig', $ag);
});
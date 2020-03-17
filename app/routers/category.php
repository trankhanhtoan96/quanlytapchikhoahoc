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

    $tables = null;
    include 'app/database/seo.php';
    $ag['seo'] = empty($tables) ? null : $tables['seo'];

    return $this->view->render($rs, 'app/category/create.twig', $ag);
});
$app->post('/admin/category/create', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    $id = createID();
    $data = array(
        'id' => $id,
        'name' => $rq->getParam('name'),
        'slug' => $rq->getParam('slug'),
        'status' => $rq->getParam('status'),
        'description' => $rq->getParam('description'),
        'parent_id' => $rq->getParam('parent_id'),
        'for_lang' => $rq->getParam('for_lang')
    );
    insertDB($this->db, 'category', $data);

    $idSEO = createID();
    $data = array(
        'id' => $idSEO,
        'title' => $rq->getParam('seo_title'),
        'keyword' => $rq->getParam('seo_keyword'),
        'description' => $rq->getParam('seo_description')
    );
    insertDB($this->db, 'seo', $data);

    $data = array(
        'id' => createID(),
        'category_id' => $id,
        'seo_id' => $idSEO
    );
    insertDB($this->db, 'category_seo', $data);

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/category/detail/' . $id);
});
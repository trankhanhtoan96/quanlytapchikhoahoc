<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/category', function (SR $rq, RS $rs, array $ag) {
    include 'app/database/category.php';
    $ag['database'] = empty($tables) ? null : $tables;
    return $this->view->render($rs, 'app/category/list.twig', $ag);
});
$app->get('/admin/category/create', function (SR $rq, RS $rs, array $ag) {
    $ag['db_def'] = getAllDBDef();
    return $this->view->render($rs, 'app/category/create.twig', $ag);
});
$app->post('/admin/category/create', function (SR $rq, RS $rs, array $ag) {
    $id = createID();
    $data = array(
        'id' => $id,
        'name' => $rq->getParam('name'),
        'slug' => $rq->getParam('slug'),
        'status' => $rq->getParam('status'),
        'description' => $rq->getParam('description'),
        'parent_id' => $rq->getParam('parent_id'),
        'for_lang' => serialize($rq->getParam('for_lang'))
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
$app->get('/admin/category/detail/{id}', function (SR $rq, RS $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/category');

    include 'app/database/category.php';
    $ag['database'] = empty($tables) ? null : $tables;

    $tables = null;
    include 'app/database/seo.php';
    $ag['seo'] = empty($tables) ? null : $tables['seo'];

    $result = $this->db->query("SELECT * from category where id='{$ag['id']}'");
    while ($row = $result->fetch_assoc()) {

    }
    return $this->view->render($rs, 'app/category/detail.twig', $ag);
});
<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/category', function (SR $rq, RS $rs, array $ag) {
    $sql = "select * from category order by created_at DESC";
    $ag['records'] = getDBRecords($this->db, $sql);
    foreach ($ag['records'] as $k => $v) {
        $ag['records'][$k]['for_lang'] = unserialize($v['for_lang']);
        $ag['records'][$k]['parent_id'] = getDBRecord($this->db, "select * from category where id='{$v['parent_id']}'");
    }
    return $this->view->render($rs, 'app/category/list.twig', $ag);
});
$app->get('/admin/category/create', function (SR $rq, RS $rs, array $ag) {
    $sql = "select id,name from category order by name";
    $ag['parent_id']['options'] = getDBRecords($this->db, $sql);
    foreach ($ag['parent_id']['options'] as $k => $v) $ag['parent_id']['options'][$k] = $v['name'];
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
        'for_lang' => serialize($rq->getParam('for_lang')),
        'created_at' => date("Y-m-d H:i:s")
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
    $ag['record'] = getDBRecord($this->db, "select * from category where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    $ag['record']['parent_id'] = getDBRecord($this->db, "select * from category where id='{$ag['record']['parent_id']}'");

    $ag['record']['seo'] = getDBRecord($this->db, "select seo.title,seo.keyword,seo.description from seo inner join category_seo on seo.id = category_seo.seo_id where category_seo.category_id='{$ag['id']}'");

    return $this->view->render($rs, 'app/category/detail.twig', $ag);
});
$app->get('/admin/category/edit/{id}', function (SR $rq, RS $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/category');

    $ag['record'] = getDBRecord($this->db, "select * from category where id='{$ag['id']}'");

    $sql = "select id,name from category order by name";
    $ag['parent_id']['options'] = getDBRecords($this->db, $sql);
    foreach ($ag['parent_id']['options'] as $k => $v) $ag['parent_id']['options'][$k] = $v['name'];

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    $ag['record']['seo'] = getDBRecord($this->db, "select seo.title,seo.keyword,seo.description from seo inner join category_seo on seo.id = category_seo.seo_id where category_seo.category_id='{$ag['id']}'");

    return $this->view->render($rs, 'app/category/edit.twig', $ag);
});
$app->post('/admin/category/edit', function (SR $rq, RS $rs, array $ag) {
    $data = array(
        'name' => $rq->getParam('name'),
        'slug' => $rq->getParam('slug'),
        'status' => $rq->getParam('status'),
        'description' => $rq->getParam('description'),
        'parent_id' => $rq->getParam('parent_id'),
        'for_lang' => serialize($rq->getParam('for_lang')),
        'modified_at' => date("Y-m-d H:i:s")
    );
    updateDB($this->db, 'category', $data, $rq->getParam('id'));

    $data = array(
        'title' => $rq->getParam('seo_title'),
        'keyword' => $rq->getParam('seo_keyword'),
        'description' => $rq->getParam('seo_description')
    );
    updateDB($this->db, 'seo', $data, $rq->getParam('seo_id'));

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/category/detail/' . $rq->getParam('id'));
});
$app->get('/admin/category/delete/{id}', function (SR $rq, RS $rs, array $ag) {
    $category_seo=getDBRecord($this->db,"select * from category_seo where category_id='{$ag['id']}'");
    deleteDB($this->db,'category',$category_seo['category_id']);
    deleteDB($this->db,'seo',$category_seo['seo_id']);
    deleteDB($this->db,'category_seo',$category_seo['id']);
    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/category');
});
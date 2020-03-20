<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/post', function (SR $rq, RS $rs, array $ag) {
    $sql = "select * from post order by created_at DESC";
    $ag['records'] = getDBRecords($this->db, $sql);
    foreach ($ag['records'] as $k => $v) {
        $ag['records'][$k]['for_lang'] = unserialize($v['for_lang']);
        $ag['records'][$k]['category'] = getDBRecords($this->db, "select c.id,c.name from category as c inner join post_category as pc on c.id = pc.category_id where pc.post_id='{$v['id']}'");
    }
    return $this->view->render($rs, 'app/post/list.twig', $ag);
});
$app->get('/admin/post/create', function (SR $rq, RS $rs, array $ag) {
    $sql = "select id,name from category order by name";
    $ag['category']['options'] = getDBRecords($this->db, $sql);
    foreach ($ag['category']['options'] as $k => $v) $ag['category']['options'][$k] = $v['name'];
    return $this->view->render($rs, 'app/post/create.twig', $ag);
});

$app->post('/admin/post/create', function (SR $rq, RS $rs, array $ag) {
    $id = createID();
    $data = array(
        'id' => $id,
        'title' => $rq->getParam('title'),
        'slug' => $rq->getParam('slug'),
        'status' => $rq->getParam('status'),
        'short_description' => $rq->getParam('short_description'),
        'description' => $rq->getParam('description'),
        'views_count' => 0,
        'for_lang' => serialize($rq->getParam('for_lang')),
        'publish_at' => $rq->getParam('publish_at'),
        'created_at' => date("Y-m-d H:i:s"),
        'modified_at' => date("Y-m-d H:i:s")
    );
    insertDB($this->db, 'post', $data);

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
        'post_id' => $id,
        'seo_id' => $idSEO
    );
    insertDB($this->db, 'post_seo', $data);

    foreach ($rq->getParam('category_id') as $c) {
        $data = array(
            'id' => createID(),
            'post_id' => $id,
            'category_id' => $c
        );
        insertDB($this->db, 'post_category', $data);
    }

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/post/detail/' . $id);
});

$app->get('/admin/post/detail/{id}', function (SR $rq, RS $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/post');
    $ag['record'] = getDBRecord($this->db, "select * from post where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    $ag['record']['category'] = getDBRecords($this->db, "select c.id,c.name from category as c inner join post_category as pc on c.id = pc.category_id where pc.post_id='{$ag['id']}'");

    $ag['record']['seo'] = getDBRecord($this->db, "select seo.title,seo.keyword,seo.description from seo inner join post_seo on seo.id = post_seo.seo_id where post_seo.post_id='{$ag['id']}'");

    return $this->view->render($rs, 'app/post/detail.twig', $ag);
});
$app->get('/admin/post/edit/{id}', function (SR $rq, RS $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/post');
    $ag['record'] = getDBRecord($this->db, "select * from post where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    $sql = "select id,name from category order by name";
    $ag['category']['options'] = getDBRecords($this->db, $sql);
    foreach ($ag['category']['options'] as $k => $v) $ag['category']['options'][$k] = $v['name'];

    $sql = "select category_id from post_category where post_id='{$ag['id']}'";
    $tmp = getDBRecords($this->db, $sql);
    foreach ($tmp as $k => $v) $ag['record']['category'][] = $v['category_id'];

    $ag['record']['seo'] = getDBRecord($this->db, "select seo.id,seo.title,seo.keyword,seo.description from seo inner join post_seo on seo.id = post_seo.seo_id where post_seo.post_id='{$ag['id']}'");

    return $this->view->render($rs, 'app/post/edit.twig', $ag);
});
$app->post('/admin/post/edit', function (SR $rq, RS $rs, array $ag) {
    $data = array(
        'title' => $rq->getParam('title'),
        'slug' => $rq->getParam('slug'),
        'status' => $rq->getParam('status'),
        'short_description' => $rq->getParam('short_description'),
        'description' => $rq->getParam('description'),
        'for_lang' => serialize($rq->getParam('for_lang')),
        'publish_at' => $rq->getParam('publish_at'),
        'modified_at' => date("Y-m-d H:i:s")
    );
    updateDB($this->db, 'post', $data, $rq->getParam('id'));

    $data = array(
        'title' => $rq->getParam('seo_title'),
        'keyword' => $rq->getParam('seo_keyword'),
        'description' => $rq->getParam('seo_description')
    );
    updateDB($this->db, 'seo', $data, $rq->getParam('seo_id'));

    $this->db->query("delete from post_category where post_id='" . $rq->getParam('id') . "'");
    foreach ($rq->getParam('category_id') as $c) {
        $data = array(
            'id' => createID(),
            'post_id' => $rq->getParam('id'),
            'category_id' => $c
        );
        insertDB($this->db, 'post_category', $data);
    }

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/post/detail/' . $rq->getParam('id'));
});

$app->get('/admin/post/delete/{id}', function (SR $rq, RS $rs, array $ag) {
    $category_seo = getDBRecord($this->db, "select * from category_seo where category_id='{$ag['id']}'");
    deleteDB($this->db, 'category', $category_seo['category_id']);
    deleteDB($this->db, 'seo', $category_seo['seo_id']);
    deleteDB($this->db, 'category_seo', $category_seo['id']);
    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/category');
});
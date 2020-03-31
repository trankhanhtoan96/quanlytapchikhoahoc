<?php

use Psr\Http\Message\ResponseInterface as RI;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/feedback', function (SR $rq, RI $rs, array $ag) {
    $sql = "select * from feedback order by created_at DESC";
    $ag['records'] = getDBRecords($this->db, $sql);
    foreach ($ag['records'] as $k => $v) {
        $ag['records'][$k]['for_lang'] = unserialize($v['for_lang']);
    }
    return $this->view->render($rs, 'app/feedback/list.twig', $ag);
});
$app->get('/admin/feedback/create', function (SR $rq, RI $rs, array $ag) {
    return $this->view->render($rs, 'app/feedback/create.twig', $ag);
});

$app->post('/admin/feedback/create', function (SR $rq, RI $rs, array $ag) {
    $id = createID();
    $data = array(
        'id' => $id,
        'title' => $rq->getParam('title'),
        'name' => $rq->getParam('name'),
        'avatar' => $rq->getParam('avatar'),
        'description' => $rq->getParam('description'),
        'for_lang' => serialize($rq->getParam('for_lang')),
        'created_at' => date("Y-m-d H:i:s"),
        'modified_at' => date("Y-m-d H:i:s")
    );
    insertDB($this->db, 'feedback', $data);

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/feedback/detail/' . $id);
});

$app->get('/admin/feedback/detail/{id}', function (SR $rq, RI $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/feedback');

    $ag['record'] = getDBRecord($this->db, "select * from feedback where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    return $this->view->render($rs, 'app/feedback/detail.twig', $ag);
});
$app->get('/admin/feedback/edit/{id}', function (SR $rq, RI $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/feedback');

    $ag['record'] = getDBRecord($this->db, "select * from feedback where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    return $this->view->render($rs, 'app/feedback/edit.twig', $ag);
});
$app->post('/admin/feedback/edit', function (SR $rq, RI $rs, array $ag) {
    $data = array(
        'title' => $rq->getParam('title'),
        'name' => $rq->getParam('name'),
        'avatar' => $rq->getParam('avatar'),
        'description' => $rq->getParam('description'),
        'for_lang' => serialize($rq->getParam('for_lang')),
        'modified_at' => date("Y-m-d H:i:s")
    );
    updateDB($this->db, 'feedback', $data, $rq->getParam('id'));

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/feedback/detail/' . $rq->getParam('id'));
});

$app->get('/admin/feedback/delete/{id}', function (SR $rq, RI $rs, array $ag) {
    deleteDB($this->db, 'feedback', $ag['id']);
    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/feedback');
});
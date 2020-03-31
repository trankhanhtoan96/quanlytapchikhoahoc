<?php

use Psr\Http\Message\ResponseInterface as RI;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/modulenametkt', function (SR $rq, RI $rs, array $ag) {
    $sql = "select * from modulenametkt order by created_at DESC";
    $ag['records'] = getDBRecords($this->db, $sql);
    foreach ($ag['records'] as $k => $v) {
        $ag['records'][$k]['for_lang'] = unserialize($v['for_lang']);
    }
    return $this->view->render($rs, 'app/modulenametkt/list.twig', $ag);
});
$app->get('/admin/modulenametkt/create', function (SR $rq, RI $rs, array $ag) {
    return $this->view->render($rs, 'app/modulenametkt/create.twig', $ag);
});

$app->post('/admin/modulenametkt/create', function (SR $rq, RI $rs, array $ag) {
    $id = createID();
    $data = array(
        'id' => $id,
        'name' => $rq->getParam('name'),
        'description' => $rq->getParam('description'),
        'for_lang' => serialize($rq->getParam('for_lang')),
        'created_at' => date("Y-m-d H:i:s"),
        'modified_at' => date("Y-m-d H:i:s")
    );
    insertDB($this->db, 'modulenametkt', $data);

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/modulenametkt/detail/' . $id);
});

$app->get('/admin/modulenametkt/detail/{id}', function (SR $rq, RI $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/modulenametkt');

    $ag['record'] = getDBRecord($this->db, "select * from modulenametkt where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    return $this->view->render($rs, 'app/modulenametkt/detail.twig', $ag);
});
$app->get('/admin/modulenametkt/edit/{id}', function (SR $rq, RI $rs, array $ag) {
    if (empty($ag['id'])) return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/modulenametkt');

    $ag['record'] = getDBRecord($this->db, "select * from modulenametkt where id='{$ag['id']}'");

    $ag['record']['for_lang'] = unserialize($ag['record']['for_lang']);

    return $this->view->render($rs, 'app/modulenametkt/edit.twig', $ag);
});
$app->post('/admin/modulenametkt/edit', function (SR $rq, RI $rs, array $ag) {
    $data = array(
        'name' => $rq->getParam('name'),
        'description' => $rq->getParam('description'),
        'for_lang' => serialize($rq->getParam('for_lang')),
        'modified_at' => date("Y-m-d H:i:s")
    );
    updateDB($this->db, 'modulenametkt', $data, $rq->getParam('id'));

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/modulenametkt/detail/' . $rq->getParam('id'));
});

$app->get('/admin/modulenametkt/delete/{id}', function (SR $rq, RI $rs, array $ag) {
    deleteDB($this->db, 'modulenametkt', $ag['id']);
    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/modulenametkt');
});
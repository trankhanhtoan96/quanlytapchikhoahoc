<?php

use Psr\Http\Message\ResponseInterface as RI;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/setting', function (SR $rq, RI $rs, array $ag) {
    return $this->view->render($rs, 'app/setting/setting.twig', $ag);
});
$app->post('/admin/setting', function (SR $rq, RI $rs, array $ag) {
    $data = array(
        'favicon' => $rq->getParam('favicon'),
        'logo' => $rq->getParam('logo'),
        'name' => $rq->getParam('name'),
        'email' => $rq->getParam('email'),
        'phone' => $rq->getParam('phone'),
        'branch_office' => $rq->getParam('branch_office'),
        'head_office' => $rq->getParam('head_office'),
    );
    $this->db->query("update settings set favicon='{$data['favicon']}'");
    $this->db->query("update settings set logo='{$data['logo']}'");
    $this->db->query("update settings set name='{$data['name']}'");
    $this->db->query("update settings set email='{$data['email']}'");
    $this->db->query("update settings set phone='{$data['phone']}'");
    $this->db->query("update settings set branch_office='{$data['branch_office']}'");
    $this->db->query("update settings set head_office='{$data['head_office']}'");

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/setting');
});
$app->get('/admin/setting/email', function (SR $rq, RI $rs, array $ag) {
    return $this->view->render($rs, 'app/setting/setting_email.twig', $ag);
});
$app->post('/admin/setting/email', function (SR $rq, RI $rs, array $ag) {
    $kte = new KTEncrypt();
    $data = array(
        'mailer_host' => $rq->getParam('mailer_host'),
        'mailer_user' => $rq->getParam('mailer_user'),
        'mailer_replyto' => $rq->getParam('mailer_replyto'),
        'mailer_from' => $rq->getParam('mailer_from'),
        'mailer_fromname' => $rq->getParam('mailer_fromname'),
        'mailer_replytoname' => $rq->getParam('mailer_replytoname'),
    );
    $this->db->query("update settings set mailer_host='{$data['mailer_host']}'");
    $this->db->query("update settings set mailer_user='{$data['mailer_user']}'");
    $this->db->query("update settings set mailer_replyto='{$data['mailer_replyto']}'");
    $this->db->query("update settings set mailer_from='{$data['mailer_from']}'");
    $this->db->query("update settings set mailer_fromname='{$data['mailer_fromname']}'");
    $this->db->query("update settings set mailer_replytoname='{$data['mailer_replytoname']}'");

    if (!empty($rq->getParam('mailer_pass'))) {
        $data['mailer_pass'] = $kte->encode($rq->getParam('mailer_pass'), 'tkt');
        $this->db->query("update settings set mailer_pass='{$data['mailer_pass']}'");
    }

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/setting/email');
});
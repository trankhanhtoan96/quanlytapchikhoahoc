<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/admin/setting', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    include 'app/database/setting.php';
    $ag['database'] = empty($tables) ? null : $tables;
    return $this->view->render($rs, 'app/setting/setting.twig', $ag);
});
$app->post('/admin/setting', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    $directory = $this->get('upload_directory');
    $uploadedFiles = $rq->getUploadedFiles();

    $uploadedFile = $uploadedFiles['favicon'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        $this->db->query("UPDATE settings set favicon='$filename'");
    }

    $uploadedFile = $uploadedFiles['logo'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        $this->db->query("UPDATE settings set logo='$filename'");
    }

    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/setting');
});
$app->get('/admin/setting/email', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    include 'app/database/setting.php';
    $ag['database'] = empty($tables) ? null : $tables;
    return $this->view->render($rs, 'app/setting/setting_email.twig', $ag);
});
$app->post('/admin/setting/email', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    if ($val = $rq->getParam('mailer_host')) {
        $this->db->query("UPDATE settings set mailer_host='$val'");
    }
    if ($val = $rq->getParam('mailer_user')) {
        $this->db->query("UPDATE settings set mailer_user='$val'");
    }
    if ($val = $rq->getParam('mailer_pass')) {
        $kte = new KTEncrypt();
        $val = $kte->encode($val, 'tkt');
        $this->db->query("UPDATE settings set mailer_pass='$val'");
    }
    if ($val = $rq->getParam('mailer_replyto')) {
        $this->db->query("UPDATE settings set mailer_replyto='$val'");
    }
    if ($val = $rq->getParam('mailer_from')) {
        $this->db->query("UPDATE settings set mailer_from='$val'");
    }
    if ($val = $rq->getParam('mailer_fromname')) {
        $this->db->query("UPDATE settings set mailer_fromname='$val'");
    }
    if ($val = $rq->getParam('mailer_replytoname')) {
        $this->db->query("UPDATE settings set mailer_replytoname='$val'");
    }
    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/setting/email');
});
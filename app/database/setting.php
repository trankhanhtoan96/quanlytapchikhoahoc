<?php
$tables = array(
    'settings' => array(
        'favicon' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_FAVICON'
        ),
        'logo' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_LOGO'
        ),
        'mailer_host' => array(
            'dbType' => 'varchar(100)',
            'label' => 'LBL_MAILER_HOST'
        ),
        'mailer_user' => array(
            'dbType' => 'varchar(100)',
            'label' => 'LBL_MAILER_USER'
        ),
        'mailer_pass' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_MAILER_PASS'
        ),
        'mailer_port' => array(
            'dbType' => 'varchar(100)',
            'label' => 'LBL_MAILER_PORT'
        ),
        'mailer_secure' => array(
            'dbType' => 'varchar(100)',
            'label' => 'LBL_MAILER_SECURE'
        ),
        'mailer_replyto' => array(
            'dbType' => 'varchar(100)',
            'label' => 'LBL_MAILER_REPLYTO'
        ),
        'mailer_from' => array(
            'dbType' => 'varchar(100)',
            'label' => 'LBL_MAILER_FROM'
        ),
        'mailer_fromname' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_MAILER_FROMNAME'
        ),
        'mailer_replytoname' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_MAILER_REPLYTONAME'
        ),
        'name' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_W_NAME'
        ),
        'email' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_EMAIL'
        ),
        'phone' => array(
            'dbType' => 'varchar(30)',
            'label' => 'LBL_PHONE'
        ),
        'head_office' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_HEAD_OFFICE'
        ),
        'branch_office' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_BRANCH_OFFICE'
        ),
    )
);
$values = array(
    'settings' => array(
        array(
            'favicon' => '',
            'logo' => '',
            'mailer_host' => '',
            'mailer_user' => '',
            'mailer_pass' => '',
            'mailer_replyto' => '',
            'mailer_from' => '',
            'mailer_fromname' => '',
            'mailer_replytoname' => ''
        )
    )
);
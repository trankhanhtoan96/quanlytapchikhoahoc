<?php
$tables = array(
    'feedback' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
            'label' => ''
        ),
        'name' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_NAME'
        ),
        'description' => array(
            'dbType' => 'text',
            'label'=>'LBL_DESCRIPTION'
        ),
        'created_at' => array(
            'dbType' => 'datetime'
        ),
        'modified_at' => array(
            'dbType' => 'datetime'
        ),
        'title' => array(
            'dbType' => 'varchar(255)',
            'label'=>'LBL_USER_TITLE'
        ),
        'avatar' => array(
            'dbType' => 'varchar(255)',
            'label'=>'LBL_AVATAR'
        ),
        'created_by' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'users'
        ),
        'modified_by' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'users'
        ),
        'for_lang'=>array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_LANGUAGE'
        ),
    )
);
$values = array();
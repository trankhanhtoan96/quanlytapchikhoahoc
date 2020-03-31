<?php
$tables = array(
    'modulenametkt' => array(
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
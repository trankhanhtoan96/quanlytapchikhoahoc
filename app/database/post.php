<?php
$tables = array(
    'post' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
            'label' => ''
        ),
        'title' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_TITLE'
        ),
        'slug' => array(
            'dbType' => 'varchar(255)',
            'label'=>'LBL_SLUG'
        ),
        'status' => array(
            'type' => 'enum',
            'dbType' => 'varchar(255)',
            'options' => 'post_status_options',
            'label'=>'LBL_STATUS'
        ),
        'short_description' => array(
            'dbType' => 'text',
            'label'=>'LBL_SHORT_DESCRIPTION'
        ),
        'description' => array(
            'dbType' => 'longtext',
            'label'=>'LBL_DESCRIPTION'
        ),
        'created_at' => array(
            'dbType' => 'datetime'
        ),
        'modified_at' => array(
            'dbType' => 'datetime'
        ),
        'publish_at' => array(
            'dbType' => 'datetime',
            'label'=>'LBL_PUBLISH_AT'
        ),
        'views_count' => array(
            'dbType' => 'int',
            'label'=>'LBL_VIEWS_COUNT'
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
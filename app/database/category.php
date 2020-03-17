<?php
$tables = array(
    'category' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
        ),
        'name' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_NAME'
        ),
        'slug' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_SLUG'
        ),
        'status' => array(
            'dbType' => 'varchar(255)',
            'options' => 'post_category_status_options',
            'label' => 'LBL_STATUS'
        ),
        'description' => array(
            'dbType' => 'text',
            'label' => 'LBL_DESCRIPTION'
        ),
        'parent_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'post_category',
            'label' => 'LBL_PARENT'
        ),
        'for_lang'=>array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_LANGUAGE'
        )
    )
);
$values = array();
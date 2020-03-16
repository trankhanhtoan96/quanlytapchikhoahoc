<?php
$tables = array(
    'post' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
            'label' => ''
        ),
        'title' => array(
            'dbType' => 'varchar(255)',
            'label' => ''
        ),
        'slug' => array(
            'dbType' => 'varchar(255)'
        ),
        'status' => array(
            'type' => 'enum',
            'dbType' => 'varchar(255)',
            'options' => 'post_status_options'
        ),
        'short_description' => array(
            'dbType' => 'text'
        ),
        'description' => array(
            'dbType' => 'longtext'
        ),
        'created_at' => array(
            'dbType' => 'datetime'
        ),
        'modified_at' => array(
            'dbType' => 'datetime'
        ),
        'publish_at' => array(
            'dbType' => 'datetime'
        ),
        'views_count' => array(
            'dbType' => 'int'
        ),
        'created_by' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'users'
        ),
        'modified_by' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'users'
        )
    )
);
$values = array();
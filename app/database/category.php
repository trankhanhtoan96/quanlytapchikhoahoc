<?php
$tables = array(
    'category' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
        ),
        'name' => array(
            'dbType' => 'varchar(255)',
        ),
        'slug' => array(
            'dbType' => 'varchar(255)'
        ),
        'status' => array(
            'type' => 'enum',
            'dbType' => 'varchar(255)',
            'options' => 'post_category_status_options'
        ),
        'description' => array(
            'dbType' => 'text'
        ),
        'parent_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'post_category'
        )
    )
);
$values = array();
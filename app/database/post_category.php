<?php
$tables = array(
    'post_category' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
        ),
        'category_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'category'
        ),
        'post_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'post'
        )
    )
);
$values = array();
<?php
$tables = array(
    'post_seo' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
        ),
        'post_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'category'
        ),
        'seo_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'seo'
        )
    )
);
$values = array();
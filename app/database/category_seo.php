<?php
$tables = array(
    'category_seo' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
        ),
        'category_id' => array(
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
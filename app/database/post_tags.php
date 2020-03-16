<?php
$tables = array(
    'post_tags' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
            'label' => ''
        ),
        'tags_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'tags'
        ),
        'post_id' => array(
            'dbType' => 'varchar(36)',
            'rel_table' => 'post'
        ),
    )
);
$values = array();
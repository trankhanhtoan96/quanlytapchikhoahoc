<?php
$tables = array(
    'seo' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key'
        ),
        'title' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_TITLE'
        ),
        'keyword' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_KEYWORD'
        ),
        'description' => array(
            'dbType' => 'varchar(255)',
            'label' => 'LBL_DESCRIPTION'
        )
    )
);
$values = array();
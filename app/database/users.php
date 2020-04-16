<?php
$tables = array(
    'users' => array(
        'id' => array(
            'dbType' => 'varchar(36) primary key',
            'label' => ''
        ),
        'name' => array(
            'dbType' => 'varchar(255)',
            'label' => ''
        ),
        'username' => array(
            'dbType' => 'varchar(100)',
            'required' => true,
            'label' => ''
        ),
        'password' => array(
            'dbType' => 'varchar(255)',
            'required' => true,
            'label' => ''
        ),
        'last_login' => array(
            'dbType' => 'datetime',
            'label' => ''
        )
    )
);
$values = array(
    'users' => array(
        array(
            'id' => '1',
            'name' => 'Admin',
            'username' => 'admin',
            'password' => '$2y$10$VD3/6bbVW32z56JcCbtNH.IuutRe8t.0VzSVUsDxPjy4oS.8ysaf2'//123456
        )
    )
);
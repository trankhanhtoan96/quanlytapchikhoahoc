<?php
$db_tables = [
    'users' => [
        'id' => [
            'type' => 'varchar(36) primary key',
            'label' => ''
        ],
        'name' => [
            'type' => 'varchar(255)',
            'label' => ''
        ],
        'username' => [
            'type' => 'varchar(100)',
            'required' => true,
            'label' => ''
        ],
        'password' => [
            'type' => 'varchar(255)',
            'required' => true,
            'label' => ''
        ],
        'last_login' => [
            'type' => 'datetime',
            'label' => ''
        ]
    ],
    'settings' => [
        'favicon' => [
            'type' => 'varchar(255)',
            'label' => ''
        ],
        'logo' => [
            'type' => 'varchar(255)',
            'label' => ''
        ],
        'mailer_host' => [
            'type' => 'varchar(100)',
            'label' => ''
        ],
        'mailer_user' => [
            'type' => 'varchar(100)',
            'label' => ''
        ],
        'mailer_pass' => [
            'type' => 'varchar(60)',
            'label' => ''
        ],
        'mailer_port' => [
            'type' => 'varchar(100)',
            'label' => ''
        ],
        'mailer_secure' => [
            'type' => 'varchar(100)',
            'label' => ''
        ],
        'mailer_replyto' => [
            'type' => 'varchar(100)',
            'label' => ''
        ],
        'mailer_from' => [
            'type' => 'varchar(100)',
            'label' => ''
        ],
        'mailer_fromname' => [
            'type' => 'varchar(255)',
            'label' => ''
        ],
        'mailer_replytoname' => [
            'type' => 'varchar(255)',
            'label' => ''
        ],
    ]
];
$db_default_values = [
    'users' => [
        [
            'id' => '1',
            'name' => 'Admin',
            'username' => 'admin',
            'password' => '$2y$10$VD3/6bbVW32z56JcCbtNH.IuutRe8t.0VzSVUsDxPjy4oS.8ysaf2'//123456
        ]
    ],
    'settings' => [
        [
            'favicon' => '',
            'logo' => '',
            'mailer_host' => '',
            'mailer_user' => '',
            'mailer_pass' => '',
            'mailer_replyto' => '',
            'mailer_from' => '',
            'mailer_fromname' => '',
            'mailer_replytoname' => ''
        ]
    ]
];
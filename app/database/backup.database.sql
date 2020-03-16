CREATE TABLE `category` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `post` (
  `id` varchar(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `short_description` text,
  `description` longtext,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `publish_at` datetime DEFAULT NULL,
  `views_count` int(11) DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `post_category` (
  `id` varchar(36) NOT NULL,
  `category_id` varchar(36) DEFAULT NULL,
  `post_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `post_tags` (
  `id` varchar(36) NOT NULL,
  `tags_id` varchar(36) DEFAULT NULL,
  `post_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `settings` (
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `mailer_host` varchar(100) DEFAULT NULL,
  `mailer_user` varchar(100) DEFAULT NULL,
  `mailer_pass` varchar(60) DEFAULT NULL,
  `mailer_port` varchar(100) DEFAULT NULL,
  `mailer_secure` varchar(100) DEFAULT NULL,
  `mailer_replyto` varchar(100) DEFAULT NULL,
  `mailer_from` varchar(100) DEFAULT NULL,
  `mailer_fromname` varchar(255) DEFAULT NULL,
  `mailer_replytoname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into settings(favicon,logo,mailer_host,mailer_user,mailer_pass,mailer_port,mailer_secure,mailer_replyto,mailer_from,mailer_fromname,mailer_replytoname) values("7bede8a590ce8a28.jpg","734f8503dd4a3328.png","12q1","2dd@gm.com","","","","6aea@gm.vm","3aa@gm.cmwwww","43e","7");


CREATE TABLE `users` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into users(id,name,username,password,last_login) values("1","Admin","admin","$2y$10$1CC2/qD9sP2Pbuf9YZ5Wsu0WPoBqEJAcRSCqpN5j03bmui.ovtWvG","2020-03-17 00:46:16");



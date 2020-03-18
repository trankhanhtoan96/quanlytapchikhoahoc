CREATE TABLE `category` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` varchar(36) DEFAULT NULL,
  `for_lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into category(id,name,slug,status,description,parent_id,for_lang) values("4d650ea76931152e121614e25c138b51mQGD","qqq","","active","","","s:2:"vi";");

insert into category(id,name,slug,status,description,parent_id,for_lang) values("97c3c8ab1b5d41bb6d5dcfa98a8586186BzT","1","","active","","","a:1:{i:0;s:2:"vi";}");

insert into category(id,name,slug,status,description,parent_id,for_lang) values("c82ebce6e84ce251a4a77c5b7927c2be5VAO","qq111","","active","","","s:2:"en";");

insert into category(id,name,slug,status,description,parent_id,for_lang) values("cb6c7c432943f36f58adf63bcf3c2fe4cX4U","2","","active","","","a:2:{i:0;s:2:"vi";i:1;s:2:"en";}");

insert into category(id,name,slug,status,description,parent_id,for_lang) values("ed6e49e4caa89b3fadaf4d8ece95e6faNhHY","qqq","","active","","","s:2:"vi";");

insert into category(id,name,slug,status,description,parent_id,for_lang) values("f78a6b2eb722f18e9336bf9946c6f613p3U5","aaa","","active","","","N;");


CREATE TABLE `category_seo` (
  `id` varchar(36) NOT NULL,
  `category_id` varchar(36) DEFAULT NULL,
  `seo_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into category_seo(id,category_id,seo_id) values("3886a32fe5862a8013f73c81420f6e70j67x","3886a32fe5862a8013f73c81420f6e70FrBN","3886a32fe5862a8013f73c81420f6e70CBHx");

insert into category_seo(id,category_id,seo_id) values("3b40d5434fccbd8d1783004bc29dce8aWB4D","3b40d5434fccbd8d1783004bc29dce8aCePj","3b40d5434fccbd8d1783004bc29dce8aPV3s");

insert into category_seo(id,category_id,seo_id) values("4d650ea76931152e121614e25c138b51Qsgx","4d650ea76931152e121614e25c138b51mQGD","4d650ea76931152e121614e25c138b51W3ie");

insert into category_seo(id,category_id,seo_id) values("6afd42680fc068c9499b1607601eeba9EhIk","6afd42680fc068c9499b1607601eeba9qqPz","6afd42680fc068c9499b1607601eeba9abzl");

insert into category_seo(id,category_id,seo_id) values("6c1b3bf0ed8d086c2ed8e9deb6f20475vhTJ","6c1b3bf0ed8d086c2ed8e9deb6f20475Dlmu","6c1b3bf0ed8d086c2ed8e9deb6f20475dsFl");

insert into category_seo(id,category_id,seo_id) values("97c3c8ab1b5d41bb6d5dcfa98a858618Fn9W","97c3c8ab1b5d41bb6d5dcfa98a8586186BzT","97c3c8ab1b5d41bb6d5dcfa98a858618d803");

insert into category_seo(id,category_id,seo_id) values("c82ebce6e84ce251a4a77c5b7927c2behobx","c82ebce6e84ce251a4a77c5b7927c2be5VAO","c82ebce6e84ce251a4a77c5b7927c2beaMH3");

insert into category_seo(id,category_id,seo_id) values("cb6c7c432943f36f58adf63bcf3c2fe4H7j0","cb6c7c432943f36f58adf63bcf3c2fe4cX4U","cb6c7c432943f36f58adf63bcf3c2fe40maZ");

insert into category_seo(id,category_id,seo_id) values("ed6e49e4caa89b3fadaf4d8ece95e6faI3mI","ed6e49e4caa89b3fadaf4d8ece95e6faNhHY","ed6e49e4caa89b3fadaf4d8ece95e6faIvGc");

insert into category_seo(id,category_id,seo_id) values("f3299ba987af38c2ecc0b72b0a0596c4WKSI","f3299ba987af38c2ecc0b72b0a0596c4t5WM","f3299ba987af38c2ecc0b72b0a0596c4o1HM");

insert into category_seo(id,category_id,seo_id) values("f78a6b2eb722f18e9336bf9946c6f613M56G","f78a6b2eb722f18e9336bf9946c6f613p3U5","f78a6b2eb722f18e9336bf9946c6f613Qugq");

insert into category_seo(id,category_id,seo_id) values("f9f59e9807d5ab2c493bb5a55a8f7826Zhiq","f9f59e9807d5ab2c493bb5a55a8f7826J0Cp","f9f59e9807d5ab2c493bb5a55a8f78265rOy");


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
  `name` varchar(255) DEFAULT NULL,
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


CREATE TABLE `seo` (
  `id` varchar(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into seo(id,title,keyword,description) values("3886a32fe5862a8013f73c81420f6e70CBHx","","","");

insert into seo(id,title,keyword,description) values("3b40d5434fccbd8d1783004bc29dce8aPV3s","tieu de","tu khoa","mo ta");

insert into seo(id,title,keyword,description) values("4d650ea76931152e121614e25c138b51W3ie","","","");

insert into seo(id,title,keyword,description) values("6afd42680fc068c9499b1607601eeba9abzl","","","");

insert into seo(id,title,keyword,description) values("6c1b3bf0ed8d086c2ed8e9deb6f20475dsFl","3333","3333","12343");

insert into seo(id,title,keyword,description) values("97c3c8ab1b5d41bb6d5dcfa98a858618d803","","","");

insert into seo(id,title,keyword,description) values("c82ebce6e84ce251a4a77c5b7927c2beaMH3","","","");

insert into seo(id,title,keyword,description) values("cb6c7c432943f36f58adf63bcf3c2fe40maZ","","","");

insert into seo(id,title,keyword,description) values("ed6e49e4caa89b3fadaf4d8ece95e6faIvGc","","","");

insert into seo(id,title,keyword,description) values("f3299ba987af38c2ecc0b72b0a0596c4o1HM","r","r","r");

insert into seo(id,title,keyword,description) values("f78a6b2eb722f18e9336bf9946c6f613Qugq","","","");

insert into seo(id,title,keyword,description) values("f9f59e9807d5ab2c493bb5a55a8f78265rOy","","","");


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

insert into users(id,name,username,password,last_login) values("1","Admin","admin","$2y$10$1CC2/qD9sP2Pbuf9YZ5Wsu0WPoBqEJAcRSCqpN5j03bmui.ovtWvG","2020-03-18 16:02:59");



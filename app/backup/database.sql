CREATE TABLE `category` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` varchar(36) DEFAULT NULL,
  `for_lang` varchar(255) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("22d7b35e45e4392eb14545a5067caedemcsh","1zzz","","active","","","a:1:{i:0;s:2:"vi";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("2ba6a3d3901ad16d843bba3cf7671af6pRWM","123","456","inactive","<p>adsfsdf</p>

<p><img alt="" src="http://localhost/tkt/tkframework/upload/images/1.png" style="height:974px; width:775px" /></p>
","9748d4dd8f42a8b89f517803daa9f1fclbEi","a:2:{i:0;s:2:"vi";i:1;s:2:"en";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("499f646e7c10fb5f814e587bd5db2663yXOV","danh muc bia viet 2","","active","","9748d4dd8f42a8b89f517803daa9f1fclbEi","a:1:{i:0;s:2:"vi";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("6a1484a20038f1218011aa5ef6e78a1fWd89","pouipiou","","active","","97c3c8ab1b5d41bb6d5dcfa98a8586186BzT","a:1:{i:0;s:2:"vi";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("80c8bac08c03a7f0cd30d6104f900ba3NN7W","1234","456","inactive","<p>adsfsdfqqqqqqqq</p>

<p><img alt="" class="img-fluid" src="http://localhost/tkt/tkframework/upload/images/1.png" style="width:775px" /></p>
","9748d4dd8f42a8b89f517803daa9f1fclbEi","a:1:{i:0;s:2:"en";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("9748d4dd8f42a8b89f517803daa9f1fclbEi","danh muc bai viet 1","","active","","f78a6b2eb722f18e9336bf9946c6f613p3U5","a:1:{i:0;s:2:"vi";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("97c3c8ab1b5d41bb6d5dcfa98a8586186BzT","1","","active","","","a:1:{i:0;s:2:"vi";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("cb6c7c432943f36f58adf63bcf3c2fe4cX4U","2","","active","","","a:2:{i:0;s:2:"vi";i:1;s:2:"en";}","","");

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values("f19afa1ad030069fd96da24c5bece517euQC","1234","456","inactive","<p>adsfsdf</p>

<p><img alt="" class="img-fluid" src="http://localhost/tkt/tkframework/upload/images/1.png" style="width:775px" /></p>
","9748d4dd8f42a8b89f517803daa9f1fclbEi","a:2:{i:0;s:2:"vi";i:1;s:2:"en";}","","");


CREATE TABLE `category_seo` (
  `id` varchar(36) NOT NULL,
  `category_id` varchar(36) DEFAULT NULL,
  `seo_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into category_seo(id,category_id,seo_id) values("22d7b35e45e4392eb14545a5067caedezvvA","22d7b35e45e4392eb14545a5067caedemcsh","22d7b35e45e4392eb14545a5067caedep9qq");

insert into category_seo(id,category_id,seo_id) values("2ba6a3d3901ad16d843bba3cf7671af6ERDW","2ba6a3d3901ad16d843bba3cf7671af6pRWM","2ba6a3d3901ad16d843bba3cf7671af6lJwr");

insert into category_seo(id,category_id,seo_id) values("3886a32fe5862a8013f73c81420f6e70j67x","3886a32fe5862a8013f73c81420f6e70FrBN","3886a32fe5862a8013f73c81420f6e70CBHx");

insert into category_seo(id,category_id,seo_id) values("3b40d5434fccbd8d1783004bc29dce8aWB4D","3b40d5434fccbd8d1783004bc29dce8aCePj","3b40d5434fccbd8d1783004bc29dce8aPV3s");

insert into category_seo(id,category_id,seo_id) values("499f646e7c10fb5f814e587bd5db2663J6pi","499f646e7c10fb5f814e587bd5db2663yXOV","499f646e7c10fb5f814e587bd5db2663adBK");

insert into category_seo(id,category_id,seo_id) values("6a1484a20038f1218011aa5ef6e78a1f8K2o","6a1484a20038f1218011aa5ef6e78a1fWd89","6a1484a20038f1218011aa5ef6e78a1fgfTR");

insert into category_seo(id,category_id,seo_id) values("6afd42680fc068c9499b1607601eeba9EhIk","6afd42680fc068c9499b1607601eeba9qqPz","6afd42680fc068c9499b1607601eeba9abzl");

insert into category_seo(id,category_id,seo_id) values("6c1b3bf0ed8d086c2ed8e9deb6f20475vhTJ","6c1b3bf0ed8d086c2ed8e9deb6f20475Dlmu","6c1b3bf0ed8d086c2ed8e9deb6f20475dsFl");

insert into category_seo(id,category_id,seo_id) values("80c8bac08c03a7f0cd30d6104f900ba3uTZ3","80c8bac08c03a7f0cd30d6104f900ba3NN7W","80c8bac08c03a7f0cd30d6104f900ba3AthT");

insert into category_seo(id,category_id,seo_id) values("9748d4dd8f42a8b89f517803daa9f1fcrbM9","9748d4dd8f42a8b89f517803daa9f1fclbEi","9748d4dd8f42a8b89f517803daa9f1fcJUGD");

insert into category_seo(id,category_id,seo_id) values("97c3c8ab1b5d41bb6d5dcfa98a858618Fn9W","97c3c8ab1b5d41bb6d5dcfa98a8586186BzT","97c3c8ab1b5d41bb6d5dcfa98a858618d803");

insert into category_seo(id,category_id,seo_id) values("cb6c7c432943f36f58adf63bcf3c2fe4H7j0","cb6c7c432943f36f58adf63bcf3c2fe4cX4U","cb6c7c432943f36f58adf63bcf3c2fe40maZ");

insert into category_seo(id,category_id,seo_id) values("f19afa1ad030069fd96da24c5bece5173VdW","f19afa1ad030069fd96da24c5bece517euQC","f19afa1ad030069fd96da24c5bece517JxHQ");

insert into category_seo(id,category_id,seo_id) values("f3299ba987af38c2ecc0b72b0a0596c4WKSI","f3299ba987af38c2ecc0b72b0a0596c4t5WM","f3299ba987af38c2ecc0b72b0a0596c4o1HM");

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
  `for_lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into post(id,title,slug,status,short_description,description,created_at,modified_at,publish_at,views_count,created_by,modified_by,for_lang) values("45cf8ecfb58ebad8fc64b2049dd1e81dDzNP","123123","asasasas-xc-c-c","draft","sss","<p>dddd</p>
","2020-03-20 13:11:10","2020-03-20 13:11:10","","0","","","a:2:{i:0;s:2:"vi";i:1;s:2:"en";}");


CREATE TABLE `post_category` (
  `id` varchar(36) NOT NULL,
  `category_id` varchar(36) DEFAULT NULL,
  `post_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into post_category(id,category_id,post_id) values("45cf8ecfb58ebad8fc64b2049dd1e81dGIkU","9748d4dd8f42a8b89f517803daa9f1fclbEi","45cf8ecfb58ebad8fc64b2049dd1e81dDzNP");

insert into post_category(id,category_id,post_id) values("45cf8ecfb58ebad8fc64b2049dd1e81di3EG","499f646e7c10fb5f814e587bd5db2663yXOV","45cf8ecfb58ebad8fc64b2049dd1e81dDzNP");

insert into post_category(id,category_id,post_id) values("550f87f98bcd97f489e2594e4ce15f3dIPdS","9748d4dd8f42a8b89f517803daa9f1fclbEi","550f87f98bcd97f489e2594e4ce15f3dOHzj");

insert into post_category(id,category_id,post_id) values("855212f9568595726d6bbf0c5038efd84S5a","9748d4dd8f42a8b89f517803daa9f1fclbEi","855212f9568595726d6bbf0c5038efd8BNw3");


CREATE TABLE `post_seo` (
  `id` varchar(36) NOT NULL,
  `post_id` varchar(36) DEFAULT NULL,
  `seo_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into post_seo(id,post_id,seo_id) values("45cf8ecfb58ebad8fc64b2049dd1e81dbnek","45cf8ecfb58ebad8fc64b2049dd1e81dDzNP","45cf8ecfb58ebad8fc64b2049dd1e81dolP0");

insert into post_seo(id,post_id,seo_id) values("550f87f98bcd97f489e2594e4ce15f3dgrH1","550f87f98bcd97f489e2594e4ce15f3dOHzj","550f87f98bcd97f489e2594e4ce15f3dOf0n");


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

insert into seo(id,title,keyword,description) values("22d7b35e45e4392eb14545a5067caedep9qq","","","");

insert into seo(id,title,keyword,description) values("2ba6a3d3901ad16d843bba3cf7671af6lJwr","qq","eeee","www");

insert into seo(id,title,keyword,description) values("3886a32fe5862a8013f73c81420f6e70CBHx","","","");

insert into seo(id,title,keyword,description) values("3b40d5434fccbd8d1783004bc29dce8aPV3s","tieu de","tu khoa","mo ta");

insert into seo(id,title,keyword,description) values("45cf8ecfb58ebad8fc64b2049dd1e81dolP0","123","44","54");

insert into seo(id,title,keyword,description) values("499f646e7c10fb5f814e587bd5db2663adBK","","","");

insert into seo(id,title,keyword,description) values("550f87f98bcd97f489e2594e4ce15f3dOf0n","1","3","2");

insert into seo(id,title,keyword,description) values("6a1484a20038f1218011aa5ef6e78a1fgfTR","","","");

insert into seo(id,title,keyword,description) values("6afd42680fc068c9499b1607601eeba9abzl","","","");

insert into seo(id,title,keyword,description) values("6c1b3bf0ed8d086c2ed8e9deb6f20475dsFl","3333","3333","12343");

insert into seo(id,title,keyword,description) values("80c8bac08c03a7f0cd30d6104f900ba3AthT","qq","eeee","www1");

insert into seo(id,title,keyword,description) values("855212f9568595726d6bbf0c5038efd8Vlqu","1","3","2");

insert into seo(id,title,keyword,description) values("9748d4dd8f42a8b89f517803daa9f1fcJUGD","","","");

insert into seo(id,title,keyword,description) values("97c3c8ab1b5d41bb6d5dcfa98a858618d803","","","");

insert into seo(id,title,keyword,description) values("cb6c7c432943f36f58adf63bcf3c2fe40maZ","","","");

insert into seo(id,title,keyword,description) values("f19afa1ad030069fd96da24c5bece517JxHQ","qq","eeee","www");

insert into seo(id,title,keyword,description) values("f3299ba987af38c2ecc0b72b0a0596c4o1HM","r","r","r");

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


CREATE TABLE `tags` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `users` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into users(id,name,username,password,last_login) values("1","Admin","admin","$2y$10$1CC2/qD9sP2Pbuf9YZ5Wsu0WPoBqEJAcRSCqpN5j03bmui.ovtWvG","2020-03-19 22:21:19");



CREATE TABLE `abc` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `for_lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into abc(id,name,description,created_at,modified_at,created_by,modified_by,for_lang) values('90c1c00859f3c050039844cbe2a07593CEod','aaaf','asfadfdsa','2020-03-31 18:33:19','2020-03-31 18:33:24','','','a:2:{i:0;s:2:"vi";i:1;s:2:"en";}');


CREATE TABLE `abcx` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `for_lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `asdf` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `for_lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('08f586636f9290b8355a388d049aeb97yaBM','danh muc bia viet 2','ooo-o','inactive','','9748d4dd8f42a8b89f517803daa9f1fclbEi','a:1:{i:0;s:2:"vi";}','','2020-03-21 10:49:52');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('09d39f427583e065d26bdeb3f0adc618CSIO','danh muc bia viet 2','','inactive','','9748d4dd8f42a8b89f517803daa9f1fclbEi','a:1:{i:0;s:2:"vi";}','','2020-03-21 10:50:24');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('0e9f69fd5dd8cf7aa6ffc93bd4c32ccevNgg','1','','inactive','','','a:1:{i:0;s:2:"vi";}','','2020-03-21 10:55:13');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('22d7b35e45e4392eb14545a5067caedemcsh','1zzz','','active','','','a:1:{i:0;s:2:"vi";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('2ba6a3d3901ad16d843bba3cf7671af6pRWM','123','456','inactive','<p>adsfsdf</p>

<p><img alt="" src="http://localhost/tkt/tkframework/upload/images/1.png" style="height:974px; width:775px" /></p>
','9748d4dd8f42a8b89f517803daa9f1fclbEi','a:2:{i:0;s:2:"vi";i:1;s:2:"en";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('499f646e7c10fb5f814e587bd5db2663yXOV','danh muc bia viet 2','','active','','9748d4dd8f42a8b89f517803daa9f1fclbEi','a:1:{i:0;s:2:"vi";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('6a1484a20038f1218011aa5ef6e78a1fWd89','pouipiou','','active','','97c3c8ab1b5d41bb6d5dcfa98a8586186BzT','a:1:{i:0;s:2:"vi";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('7542bc41a302a68b1ae4a7e384f2388bmC07','danh muc bai viet 1','','inactive','','','a:1:{i:0;s:2:"vi";}','','2020-03-21 10:53:43');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('80c650eeef408172d87dca29e82397a2CBwd','2','','inactive','','','a:2:{i:0;s:2:"vi";i:1;s:2:"en";}','','2020-03-21 10:56:32');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('80c8bac08c03a7f0cd30d6104f900ba3NN7W','1234','456','inactive','<p>adsfsdfqqqqqqqq</p>

<p><img alt="" class="img-fluid" src="http://localhost/tkt/tkframework/upload/images/1.png" style="width:775px" /></p>
','9748d4dd8f42a8b89f517803daa9f1fclbEi','a:1:{i:0;s:2:"en";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('9748d4dd8f42a8b89f517803daa9f1fclbEi','danh muc bai viet 1','','active','','f78a6b2eb722f18e9336bf9946c6f613p3U5','a:1:{i:0;s:2:"vi";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('97c3c8ab1b5d41bb6d5dcfa98a8586186BzT','1','','active','','','a:1:{i:0;s:2:"vi";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('cb6c7c432943f36f58adf63bcf3c2fe4cX4U','2','','active','','','a:2:{i:0;s:2:"vi";i:1;s:2:"en";}','','');

insert into category(id,name,slug,status,description,parent_id,for_lang,modified_at,created_at) values('f19afa1ad030069fd96da24c5bece517euQC','1234','456','inactive','<p>adsfsdf</p>

<p><img alt="" class="img-fluid" src="http://localhost/tkt/tkframework/upload/images/1.png" style="width:775px" /></p>
','9748d4dd8f42a8b89f517803daa9f1fclbEi','a:2:{i:0;s:2:"vi";i:1;s:2:"en";}','','');


CREATE TABLE `category_seo` (
  `id` varchar(36) NOT NULL,
  `category_id` varchar(36) DEFAULT NULL,
  `seo_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into category_seo(id,category_id,seo_id) values('08f586636f9290b8355a388d049aeb97BtsN','08f586636f9290b8355a388d049aeb97yaBM','08f586636f9290b8355a388d049aeb97ZQqp');

insert into category_seo(id,category_id,seo_id) values('09d39f427583e065d26bdeb3f0adc618a5n3','09d39f427583e065d26bdeb3f0adc618CSIO','09d39f427583e065d26bdeb3f0adc618avsi');

insert into category_seo(id,category_id,seo_id) values('0e9f69fd5dd8cf7aa6ffc93bd4c32ccecVEj','0e9f69fd5dd8cf7aa6ffc93bd4c32ccevNgg','0e9f69fd5dd8cf7aa6ffc93bd4c32cceCH3Z');

insert into category_seo(id,category_id,seo_id) values('22d7b35e45e4392eb14545a5067caedezvvA','22d7b35e45e4392eb14545a5067caedemcsh','22d7b35e45e4392eb14545a5067caedep9qq');

insert into category_seo(id,category_id,seo_id) values('2ba6a3d3901ad16d843bba3cf7671af6ERDW','2ba6a3d3901ad16d843bba3cf7671af6pRWM','2ba6a3d3901ad16d843bba3cf7671af6lJwr');

insert into category_seo(id,category_id,seo_id) values('3886a32fe5862a8013f73c81420f6e70j67x','3886a32fe5862a8013f73c81420f6e70FrBN','3886a32fe5862a8013f73c81420f6e70CBHx');

insert into category_seo(id,category_id,seo_id) values('3b40d5434fccbd8d1783004bc29dce8aWB4D','3b40d5434fccbd8d1783004bc29dce8aCePj','3b40d5434fccbd8d1783004bc29dce8aPV3s');

insert into category_seo(id,category_id,seo_id) values('499f646e7c10fb5f814e587bd5db2663J6pi','499f646e7c10fb5f814e587bd5db2663yXOV','499f646e7c10fb5f814e587bd5db2663adBK');

insert into category_seo(id,category_id,seo_id) values('6a1484a20038f1218011aa5ef6e78a1f8K2o','6a1484a20038f1218011aa5ef6e78a1fWd89','6a1484a20038f1218011aa5ef6e78a1fgfTR');

insert into category_seo(id,category_id,seo_id) values('6afd42680fc068c9499b1607601eeba9EhIk','6afd42680fc068c9499b1607601eeba9qqPz','6afd42680fc068c9499b1607601eeba9abzl');

insert into category_seo(id,category_id,seo_id) values('6c1b3bf0ed8d086c2ed8e9deb6f20475vhTJ','6c1b3bf0ed8d086c2ed8e9deb6f20475Dlmu','6c1b3bf0ed8d086c2ed8e9deb6f20475dsFl');

insert into category_seo(id,category_id,seo_id) values('7542bc41a302a68b1ae4a7e384f2388bzgk5','7542bc41a302a68b1ae4a7e384f2388bmC07','7542bc41a302a68b1ae4a7e384f2388b2cZd');

insert into category_seo(id,category_id,seo_id) values('80c650eeef408172d87dca29e82397a2tL7O','80c650eeef408172d87dca29e82397a2CBwd','80c650eeef408172d87dca29e82397a2SS3R');

insert into category_seo(id,category_id,seo_id) values('80c8bac08c03a7f0cd30d6104f900ba3uTZ3','80c8bac08c03a7f0cd30d6104f900ba3NN7W','80c8bac08c03a7f0cd30d6104f900ba3AthT');

insert into category_seo(id,category_id,seo_id) values('9748d4dd8f42a8b89f517803daa9f1fcrbM9','9748d4dd8f42a8b89f517803daa9f1fclbEi','9748d4dd8f42a8b89f517803daa9f1fcJUGD');

insert into category_seo(id,category_id,seo_id) values('97c3c8ab1b5d41bb6d5dcfa98a858618Fn9W','97c3c8ab1b5d41bb6d5dcfa98a8586186BzT','97c3c8ab1b5d41bb6d5dcfa98a858618d803');

insert into category_seo(id,category_id,seo_id) values('cb6c7c432943f36f58adf63bcf3c2fe4H7j0','cb6c7c432943f36f58adf63bcf3c2fe4cX4U','cb6c7c432943f36f58adf63bcf3c2fe40maZ');

insert into category_seo(id,category_id,seo_id) values('f19afa1ad030069fd96da24c5bece5173VdW','f19afa1ad030069fd96da24c5bece517euQC','f19afa1ad030069fd96da24c5bece517JxHQ');

insert into category_seo(id,category_id,seo_id) values('f3299ba987af38c2ecc0b72b0a0596c4WKSI','f3299ba987af38c2ecc0b72b0a0596c4t5WM','f3299ba987af38c2ecc0b72b0a0596c4o1HM');

insert into category_seo(id,category_id,seo_id) values('f9f59e9807d5ab2c493bb5a55a8f7826Zhiq','f9f59e9807d5ab2c493bb5a55a8f7826J0Cp','f9f59e9807d5ab2c493bb5a55a8f78265rOy');


CREATE TABLE `feedback` (
  `id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_by` varchar(36) DEFAULT NULL,
  `modified_by` varchar(36) DEFAULT NULL,
  `for_lang` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into feedback(id,name,description,created_at,modified_at,title,created_by,modified_by,for_lang,avatar) values('a05d4641a820dcdfb0f9834af0d2ed2flc0Y','Nguyễn Quang Minh','Luật sư Asoka có kiến thức cực kỳ chuyên sâu về lĩnh vực mình cần tham vấn, giúp mình xác nhận được những ý kiến pháp luật mình muốn tìm hiểu. Tư vấn súc tích, nhiệt tình và tin cậy. Mình cũng đã nhờ Asoka Law thực hiện các thủ tục pháp lý cho công ty riêng của mình sau đó.','2020-03-29 22:43:54','2020-03-30 03:42:42','Giám đốc - Thiên Kỳ Technology','','','a:2:{i:0;s:2:"vi";i:1;s:2:"en";}','http://localhost/binh/asokalaw/upload/images/KH.svg');


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

insert into post(id,title,slug,status,short_description,description,created_at,modified_at,publish_at,views_count,created_by,modified_by,for_lang) values('a5c0e717a6a2593bbe7a2a6bb4c75c45nsYI','111','atran-khasdf-dsf','published','a','<p>sddsads</p>
','2020-03-20 18:26:34','2020-03-20 18:45:36','2020-02-26 00:00:00','0','','','a:1:{i:0;s:2:"vi";}');

insert into post(id,title,slug,status,short_description,description,created_at,modified_at,publish_at,views_count,created_by,modified_by,for_lang) values('b697b6ce226282a456c0cd3a3f4d7554PWZA','1','2','published','','','2020-03-20 18:25:23','2020-03-20 18:25:23','2020-03-02 00:00:00','0','','','a:1:{i:0;s:2:"vi";}');


CREATE TABLE `post_category` (
  `id` varchar(36) NOT NULL,
  `category_id` varchar(36) DEFAULT NULL,
  `post_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into post_category(id,category_id,post_id) values('17478fc846834d6f07912e42a03838e48yaD','80c8bac08c03a7f0cd30d6104f900ba3NN7W','a5c0e717a6a2593bbe7a2a6bb4c75c45nsYI');

insert into post_category(id,category_id,post_id) values('3600340818298deb27458b346ccc866bcmYD','80c8bac08c03a7f0cd30d6104f900ba3NN7W','3600340818298deb27458b346ccc866bMr7T');

insert into post_category(id,category_id,post_id) values('45cf8ecfb58ebad8fc64b2049dd1e81dGIkU','9748d4dd8f42a8b89f517803daa9f1fclbEi','45cf8ecfb58ebad8fc64b2049dd1e81dDzNP');

insert into post_category(id,category_id,post_id) values('45cf8ecfb58ebad8fc64b2049dd1e81di3EG','499f646e7c10fb5f814e587bd5db2663yXOV','45cf8ecfb58ebad8fc64b2049dd1e81dDzNP');

insert into post_category(id,category_id,post_id) values('550f87f98bcd97f489e2594e4ce15f3dIPdS','9748d4dd8f42a8b89f517803daa9f1fclbEi','550f87f98bcd97f489e2594e4ce15f3dOHzj');

insert into post_category(id,category_id,post_id) values('6c6dc3eee53cbf364c822d4d9a15e8ddOMZb','80c8bac08c03a7f0cd30d6104f900ba3NN7W','762e74fde24cbc6ee4dd9ff8edaa1ef2J15k');

insert into post_category(id,category_id,post_id) values('6c6dc3eee53cbf364c822d4d9a15e8ddV6sq','499f646e7c10fb5f814e587bd5db2663yXOV','762e74fde24cbc6ee4dd9ff8edaa1ef2J15k');

insert into post_category(id,category_id,post_id) values('855212f9568595726d6bbf0c5038efd84S5a','9748d4dd8f42a8b89f517803daa9f1fclbEi','855212f9568595726d6bbf0c5038efd8BNw3');

insert into post_category(id,category_id,post_id) values('b3dfc52fce68b2f34a7226c9389410aeFlQ1','f19afa1ad030069fd96da24c5bece517euQC','63b264ef6d2209ba5ef6ec1c596e6a04CZ3q');


CREATE TABLE `post_seo` (
  `id` varchar(36) NOT NULL,
  `post_id` varchar(36) DEFAULT NULL,
  `seo_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into post_seo(id,post_id,seo_id) values('5c94bed879dd3497013bff2911b7cbe1WpD4','b697b6ce226282a456c0cd3a3f4d7554PWZA','5c94bed879dd3497013bff2911b7cbe1UyqM');

insert into post_seo(id,post_id,seo_id) values('a5c0e717a6a2593bbe7a2a6bb4c75c45yiTY','a5c0e717a6a2593bbe7a2a6bb4c75c45nsYI','a5c0e717a6a2593bbe7a2a6bb4c75c45dOys');


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

insert into seo(id,title,keyword,description) values('08f586636f9290b8355a388d049aeb97ZQqp','','','');

insert into seo(id,title,keyword,description) values('09d39f427583e065d26bdeb3f0adc618avsi','','','');

insert into seo(id,title,keyword,description) values('0e9f69fd5dd8cf7aa6ffc93bd4c32cceCH3Z','','','');

insert into seo(id,title,keyword,description) values('7542bc41a302a68b1ae4a7e384f2388b2cZd','','','');

insert into seo(id,title,keyword,description) values('80c650eeef408172d87dca29e82397a2SS3R','','','');

insert into seo(id,title,keyword,description) values('a5c0e717a6a2593bbe7a2a6bb4c75c45dOys','e','g','f');


CREATE TABLE `settings` (
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `mailer_host` varchar(100) DEFAULT NULL,
  `mailer_user` varchar(100) DEFAULT NULL,
  `mailer_port` varchar(100) DEFAULT NULL,
  `mailer_secure` varchar(100) DEFAULT NULL,
  `mailer_replyto` varchar(100) DEFAULT NULL,
  `mailer_from` varchar(100) DEFAULT NULL,
  `mailer_fromname` varchar(255) DEFAULT NULL,
  `mailer_replytoname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `head_office` varchar(255) DEFAULT NULL,
  `branch_office` varchar(255) DEFAULT NULL,
  `mailer_pass` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into settings(favicon,logo,mailer_host,mailer_user,mailer_port,mailer_secure,mailer_replyto,mailer_from,mailer_fromname,mailer_replytoname,name,email,head_office,branch_office,mailer_pass,phone) values('http://localhost/binh/asokalaw/upload/images/c8e96ee736408145.png','http://localhost/binh/asokalaw/upload/images/c8e96ee736408145.png','12q1e','2dd@gm.come','','','6aea@gm.vme','3aa@gm.cmwwwwe','43ee','7e','AsokaLaw','consult@asokalaw.vn','228 Nguyễn Hoàng, Phường An Phú, Quận 2, Tp. Hồ Chí Minh','23.OT09, Landmark 81, 208 Nguyễn Hữu Cảnh, Quận Bình Thạnh, Tp. Hồ Chí Minh','hNlJSG2dGYw6D+//Xl80G1crpgMMftl5r61O3AZhlLdLpha+EnTbFU8lhIsYw0I7FyevU94kqSTkN2Nu19PsFA==','(028) 62.789.228');


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

insert into users(id,name,username,password,last_login) values('1','Admin','admin','$2y$10$1CC2/qD9sP2Pbuf9YZ5Wsu0WPoBqEJAcRSCqpN5j03bmui.ovtWvG','2020-03-29 22:12:14');



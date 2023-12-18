

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(20) DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 Active,0 Close',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO banners (id, title, desc, image, link, sort, status, created_at, updated_at) VALUES ('14','','title','/uploads/banner/aya_sompo655da81c50dca.jpeg','www.link.com','2','1','2023-10-25 06:56:34','2023-11-30 15:21:52');

INSERT INTO banners (id, title, desc, image, link, sort, status, created_at, updated_at) VALUES ('15','','','/uploads/banner/aya_sompo655dadfbaa81b.jpg','','3','1','2023-11-22 13:37:02','2023-11-30 15:19:38');


CREATE TABLE `core_customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `app_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phoneno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_nrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('22','45','C000051354','INDIVIDUAL','ASHLEY','09771468472','12/MAMAKA(N)564232','','','2023-11-29 13:30:08','2023-11-29 13:30:08');

INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('23','46','C000051354','INDIVIDUAL','ASHLEY','09771468472','12/MAMAKA(N)564232','','','2023-11-29 13:30:10','2023-11-29 13:30:10');

INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('24','47','C000051353','INDIVIDUAL','Spidey','0979127919','12/MAMAKA(N)564232','','','2023-12-01 15:18:50','2023-12-01 15:18:50');

INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('25','48','C000051354','INDIVIDUAL','ASHLEY','09771468472','12/MAMAKA(N)564232','','','2023-12-06 12:43:14','2023-12-06 12:43:14');

INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('26','49','C000051354','INDIVIDUAL','ASHLEY','09771468472','12/MAMAKA(N)564232','','','2023-12-06 12:43:15','2023-12-06 12:43:15');

INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('27','50','C000051354','INDIVIDUAL','ASHLEY','09771468472','12/MAMAKA(N)564232','','','2023-12-06 14:19:34','2023-12-06 14:19:34');

INSERT INTO core_customers (id, app_customer_id, customer_code, customer_type, customer_name, customer_phoneno, customer_nrc, email, adddress, created_at, updated_at) VALUES ('28','51','C000051354','INDIVIDUAL','ASHLEY','09771468472','12/MAMAKA(N)564232','','','2023-12-06 14:19:34','2023-12-06 14:19:34');


CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phoneno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_customer_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_seqNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('45','C000051354','09787796698','Shine ','GROUP','','dGNGPYgmQxuVIyPiggFcvH:APA91bG9u3elcTCGFC-0Tk7-_I_F8oyvVwZynb81NbY2AY5pOCvigpylQ7Q4L8LZNFCNz7yDPMk2pLT5md9TpAI8SAMVr4Y1aYdMKwvIDr1tNpUe75-djZ_Ej_b0sp0pgnbReKjjUoOk','','','','2023-11-29 13:30:08','2023-11-29 13:30:08');

INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('46','C000051354','0979127919','Spidey Ss','GROUP','','dGNGPYgmQxuVIyPiggFcvH:APA91bG9u3elcTCGFC-0Tk7-_I_F8oyvVwZynb81NbY2AY5pOCvigpylQ7Q4L8LZNFCNz7yDPMk2pLT5md9TpAI8SAMVr4Y1aYdMKwvIDr1tNpUe75-djZ_Ej_b0sp0pgnbReKjjUoOk','','','','2023-11-29 13:30:10','2023-11-29 13:30:10');

INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('47','C000051353','0979127919','Spidey Shine','INDIVIDUAL','$2y$10$RIwxC1s7TFiEchHTs2LWAe3PTrnA4KWyglait7YsvQT0thSjzhEiW','sdfjkasd','/uploads/profile/aya_sompo656ee6b652e61.png','','','2023-12-01 15:18:48','2023-12-05 15:48:43');

INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('48','C000051354','09787766','','GROUP','','','','','','2023-12-06 12:43:14','2023-12-06 12:43:14');

INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('49','C000051354','0944446665','','GROUP','','','','','','2023-12-06 12:43:15','2023-12-06 12:43:15');

INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('50','C000051354','099787796698','','GROUP','','','','','','2023-12-06 14:19:33','2023-12-06 14:19:33');

INSERT INTO customers (id, customer_code, customer_phoneno, user_name, app_customer_type, password, device_token, profile_photo, risk_seqNo, risk_name, created_at, updated_at) VALUES ('51','C000051354','09944446665','','GROUP','','','','','','2023-12-06 14:19:34','2023-12-06 14:19:34');


CREATE TABLE `device_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO faqs (id, product_id, title, desc, created_at, updated_at) VALUES ('9','40','this us asdfas','sdfasd updae','2023-10-25 06:58:03','2023-10-25 06:58:31');


CREATE TABLE `internal_access_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `internal_access_lists_access_id_unique` (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO internal_access_lists (id, name, password, access_id, expires_at, scopes, created_at, updated_at) VALUES ('1','server1','','86d6c168-9300-4447-a648-ec2ed4748bc8','2023-10-12 10:27:02','','','');


CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trace_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `messagings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('1','adsf','sdfasd','Unicast','27','','2023-11-24 17:22:32','2023-11-24 17:22:32');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('2','df','adf','Unicast','27','','2023-11-24 17:47:45','2023-11-24 17:47:45');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('3','hello','this is testing','Unicast','27','','2023-11-24 17:48:13','2023-11-24 17:48:13');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('4','hello','asdfa','Unicast','27','','2023-11-24 17:48:26','2023-11-24 17:48:26');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('5','asdf','asdfas','Unicast','27','','2023-11-24 17:51:47','2023-11-24 17:51:47');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('6','testing','dasd','Unicast','27','','2023-11-24 17:54:22','2023-11-24 17:54:22');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('7','hello this is title','this is message','Unicast','27','','2023-11-24 17:55:06','2023-11-24 17:55:06');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('8','title','message','Unicast','27','','2023-11-24 17:55:27','2023-11-24 17:55:27');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('9','this','that','Unicast','27','','2023-11-24 17:56:27','2023-11-24 17:56:27');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('10','this','asdfads','Unicast','27','','2023-11-24 17:58:13','2023-11-24 17:58:13');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('11','asd','asdf','Unicast','27','','2023-11-24 18:04:18','2023-11-24 18:04:18');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('12','asd','fasd','Unicast','27','','2023-11-25 12:10:53','2023-11-25 12:10:53');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('13','asdf','asdf','Unicast','27','','2023-11-25 12:11:01','2023-11-25 12:11:01');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('14','sdf','ssadf','Unicast','45','','2023-11-30 15:36:32','2023-11-30 15:36:32');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('15','fasd','asdfas','Unicast','46','','2023-11-30 15:37:48','2023-11-30 15:37:48');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('16','sdfas','asdf','Unicast','46','','2023-11-30 15:38:42','2023-11-30 15:38:42');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('17','asdf','asdf','Unicast','46','','2023-11-30 15:39:42','2023-11-30 15:39:42');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('18','broadcasting','Message broadcasting','Broadcast','','','2023-12-01 11:44:58','2023-12-01 11:44:58');

INSERT INTO messagings (id, title, message, type, customer_id, image_url, created_at, updated_at) VALUES ('19','asdf','asdfasdf','Broadcast','','','2023-12-01 14:20:38','2023-12-01 14:20:38');


CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (id, migration, batch) VALUES ('1','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('2','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('3','2016_06_01_000001_create_oauth_auth_codes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('4','2016_06_01_000002_create_oauth_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('5','2016_06_01_000003_create_oauth_refresh_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('6','2016_06_01_000004_create_oauth_clients_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('7','2016_06_01_000005_create_oauth_personal_access_clients_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('8','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('9','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('10','2023_09_25_072527_create_customers_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('11','2023_09_28_070647_create_products_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('12','2023_09_28_090856_create_property_types_table','2');

INSERT INTO migrations (id, migration, batch) VALUES ('13','2023_09_28_091036_create_properties_table','2');

INSERT INTO migrations (id, migration, batch) VALUES ('14','2023_10_02_150136_create_banners_table','3');

INSERT INTO migrations (id, migration, batch) VALUES ('15','2023_10_04_090142_create_f_a_q_s_table','4');

INSERT INTO migrations (id, migration, batch) VALUES ('16','2023_10_11_082615_create_internal_tokens_table','5');

INSERT INTO migrations (id, migration, batch) VALUES ('17','2023_10_12_035034_create_internal_access_lists_table','6');

INSERT INTO migrations (id, migration, batch) VALUES ('19','2023_10_26_134016_create_core_customers_table','8');

INSERT INTO migrations (id, migration, batch) VALUES ('20','2023_10_19_102752_create_device_tokens_table','9');

INSERT INTO migrations (id, migration, batch) VALUES ('21','2023_10_31_074947_create_request_form_types_table','10');

INSERT INTO migrations (id, migration, batch) VALUES ('22','2023_11_02_032226_create_product_code_lists_table','11');

INSERT INTO migrations (id, migration, batch) VALUES ('23','2023_11_02_045052_create_product_code_list_request_form_types_table','12');

INSERT INTO migrations (id, migration, batch) VALUES ('24','2023_11_02_094058_create_request_forms_table','13');

INSERT INTO migrations (id, migration, batch) VALUES ('25','2023_11_08_163357_create_logs_table','14');

INSERT INTO migrations (id, migration, batch) VALUES ('26','2023_11_13_113312_create_motor_claim_cases_table','15');

INSERT INTO migrations (id, migration, batch) VALUES ('27','2023_11_14_003620_create_non_motor_claim_cases_table','16');

INSERT INTO migrations (id, migration, batch) VALUES ('28','2023_11_24_113522_create_messagings_table','17');


CREATE TABLE `motor_claim_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `app_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_channel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_damaged_portion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_seq_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_damaged_photos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('1','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551e9b993ac0bc2001624b0.png?sv=2023-08-03&st=2023-11-13T09%3A17%3A46Z&se=2024-02-11T09%3A17%3A46Z&sr=c&sp=r&sig=xF8yXpIGeLugi5cDioMFbZ9Sz0k8GHwL%2BT1fJf9t7g8%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551e9b893ac0b63911624ae.png?sv=2023-08-03&st=2023-11-13T09%3A17%3A44Z&se=2024-02-11T09%3A17%3A44Z&sr=c&sp=r&sig=1uQL9Zodf6L%2FtmHx0rqNo1zAoPOWY0lToWyjaOy3FSk%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551e9b893ac0ba9951624af.jpg?sv=2023-08-03&st=2023-11-13T09%3A17%3A45Z&se=2024-02-11T09%3A17%3A45Z&sr=c&sp=r&sig=j5kffpAQ3sCX0dcm5eNaAncxzkuqj%2F5iENvuaFLTagc%3D";}','2023-11-13 15:47:52','2023-11-13 15:47:52');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('2','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551f56893ac0b61431624fa.png?sv=2023-08-03&st=2023-11-13T10%3A07%3A36Z&se=2024-02-11T10%3A07%3A36Z&sr=c&sp=r&sig=GEiLaIEG4gsGK%2F8ULNqF1fNEV88qo5H%2BPL1emqA31lc%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551f56793ac0b8cfe1624f8.png?sv=2023-08-03&st=2023-11-13T10%3A07%3A35Z&se=2024-02-11T10%3A07%3A35Z&sr=c&sp=r&sig=tYju0yjLHrQerOsZeLuTLFFyPHRtbYlzMfYdiK2ulvw%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551f56793ac0b42581624f9.jpg?sv=2023-08-03&st=2023-11-13T10%3A07%3A35Z&se=2024-02-11T10%3A07%3A35Z&sr=c&sp=r&sig=tYju0yjLHrQerOsZeLuTLFFyPHRtbYlzMfYdiK2ulvw%3D";}','2023-11-13 16:37:44','2023-11-13 16:37:44');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('3','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551f62493ac0bc35d162517.png?sv=2023-08-03&st=2023-11-13T10%3A10%3A45Z&se=2024-02-11T10%3A10%3A45Z&sr=c&sp=r&sig=BC3%2BR%2FoCG7zfGdaPGqdxh1b9Shda%2FZ7Y4KyExKmol9k%3D','a:2:{i:0;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551f62393ac0bb11d162515.png?sv=2023-08-03&st=2023-11-13T10%3A10%3A43Z&se=2024-02-11T10%3A10%3A43Z&sr=c&sp=r&sig=VLBEg3Op3%2FA%2FPcUeJT%2BOS20VbdMYARGNsxYYPN5pFQ8%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551f62493ac0bb909162516.jpg?sv=2023-08-03&st=2023-11-13T10%3A10%3A44Z&se=2024-02-11T10%3A10%3A44Z&sr=c&sp=r&sig=2ndBH%2Blgc4asdP8YXB5gSZIw7hu22scnEWTnGIMUhWw%3D";}','2023-11-13 16:40:53','2023-11-13 16:40:53');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('4','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fac293ac0b84611625f9.png?sv=2023-08-03&st=2023-11-13T10%3A30%3A26Z&se=2024-02-11T10%3A30%3A26Z&sr=c&sp=r&sig=JEDCl%2FoEaCLbGYovmfSHmjjF9QMI5PIN6s2orpiBIag%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fac193ac0b8ac61625f4.png?sv=2023-08-03&st=2023-11-13T10%3A30%3A25Z&se=2024-02-11T10%3A30%3A25Z&sr=c&sp=r&sig=VCrQONscPe72RmkA%2FBd3JC1829tJPFzuUzbk%2BpidWfM%3D";i:1;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fac193ac0b7b6d1625f6.jpg?sv=2023-08-03&st=2023-11-13T10%3A30%3A25Z&se=2024-02-11T10%3A30%3A25Z&sr=c&sp=r&sig=VCrQONscPe72RmkA%2FBd3JC1829tJPFzuUzbk%2BpidWfM%3D";}','2023-11-13 17:00:33','2023-11-13 17:00:33');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('5','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fc5793ac0bb5e3162650.png?sv=2023-08-03&st=2023-11-13T10%3A37%3A11Z&se=2024-02-11T10%3A37%3A11Z&sr=c&sp=r&sig=Gdeh2MrFZ3jtwJwzijBY9LBZ2sO5ymsqH5acZ8Ch4fY%3D','a:2:{i:0;s:265:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fc5593ac0bb4c016264e.png?sv=2023-08-03&st=2023-11-13T10%3A37%3A10Z&se=2024-02-11T10%3A37%3A10Z&sr=c&sp=r&sig=fawa3RuHxEUVvjkMRE0sDNdw%2BzJfI%2F1z0Hp6v%2Bnl7%2FU%3D";i:1;s:265:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fc5693ac0b3c3916264f.jpg?sv=2023-08-03&st=2023-11-13T10%3A37%3A10Z&se=2024-02-11T10%3A37%3A10Z&sr=c&sp=r&sig=fawa3RuHxEUVvjkMRE0sDNdw%2BzJfI%2F1z0Hp6v%2Bnl7%2FU%3D";}','2023-11-13 17:07:18','2023-11-13 17:07:18');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('6','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fd9193ac0b5d26162666.png?sv=2023-08-03&st=2023-11-13T10%3A42%3A26Z&se=2024-02-11T10%3A42%3A26Z&sr=c&sp=r&sig=PgdHpuFwuyBhAAmhboqXK%2FycpdezKGzE2jg7nKXgHHM%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fd8f93ac0b442b162664.png?sv=2023-08-03&st=2023-11-13T10%3A42%3A24Z&se=2024-02-11T10%3A42%3A24Z&sr=c&sp=r&sig=AmMMNYeNKYuMbwS88W4kvLk8%2B15sJYn%2BvIHNgbo9B4g%3D";i:1;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fd9093ac0bf227162665.jpg?sv=2023-08-03&st=2023-11-13T10%3A42%3A24Z&se=2024-02-11T10%3A42%3A24Z&sr=c&sp=r&sig=AmMMNYeNKYuMbwS88W4kvLk8%2B15sJYn%2BvIHNgbo9B4g%3D";}','2023-11-13 17:12:32','2023-11-13 17:12:32');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('7','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fe8a93ac0b31c316267b.png?sv=2023-08-03&st=2023-11-13T10%3A46%3A35Z&se=2024-02-11T10%3A46%3A35Z&sr=c&sp=r&sig=FVmIs84m3dXzANcoPWMuqxpt5CI0vtcVC9v3OtZBuqs%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fe8993ac0bf35d162679.png?sv=2023-08-03&st=2023-11-13T10%3A46%3A33Z&se=2024-02-11T10%3A46%3A33Z&sr=c&sp=r&sig=HUh5kG18WkL1J8Ze2Y21hiI9g1exNYvy%2ByxCJKS5z1o%3D";i:1;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fe8a93ac0b07c316267a.jpg?sv=2023-08-03&st=2023-11-13T10%3A46%3A34Z&se=2024-02-11T10%3A46%3A34Z&sr=c&sp=r&sig=8q11FY8e45EZiho2tlBjCmMZxUpc9GJo%2BFZMYM%2BHT%2FA%3D";}','2023-11-13 17:16:41','2023-11-13 17:16:41');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('8','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fe9b93ac0b17e616268c.png?sv=2023-08-03&st=2023-11-13T10%3A46%3A51Z&se=2024-02-11T10%3A46%3A51Z&sr=c&sp=r&sig=kJBC6QtGhRj0raCpPRTv2gMPkatSB%2F42dvlDgCxLF68%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fe9a93ac0ba25616268a.png?sv=2023-08-03&st=2023-11-13T10%3A46%3A50Z&se=2024-02-11T10%3A46%3A50Z&sr=c&sp=r&sig=x5YHfkhurqC3KuRTk%2BbsEZsAOLZ9PFRM6rhcL4gFRJM%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fe9a93ac0b5b0716268b.jpg?sv=2023-08-03&st=2023-11-13T10%3A46%3A50Z&se=2024-02-11T10%3A46%3A50Z&sr=c&sp=r&sig=x5YHfkhurqC3KuRTk%2BbsEZsAOLZ9PFRM6rhcL4gFRJM%3D";}','2023-11-13 17:16:57','2023-11-13 17:16:57');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('9','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fec993ac0ba46016269e.png?sv=2023-08-03&st=2023-11-13T10%3A47%3A37Z&se=2024-02-11T10%3A47%3A37Z&sr=c&sp=r&sig=%2B0BMgTgpvS9nIqaVY9Or0ni06%2BSaWXQy3jMyMvx1lks%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fec893ac0bc10916269c.png?sv=2023-08-03&st=2023-11-13T10%3A47%3A36Z&se=2024-02-11T10%3A47%3A36Z&sr=c&sp=r&sig=FhaSNJnbTwH4%2BTFpnzts6Mrd0fQh9AA183zW%2F4MR8TM%3D";i:1;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551fec893ac0bd7cc16269d.jpg?sv=2023-08-03&st=2023-11-13T10%3A47%3A36Z&se=2024-02-11T10%3A47%3A36Z&sr=c&sp=r&sig=FhaSNJnbTwH4%2BTFpnzts6Mrd0fQh9AA183zW%2F4MR8TM%3D";}','2023-11-13 17:17:43','2023-11-13 17:17:43');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('10','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551ff8b93ac0b40e01626b2.png?sv=2023-08-03&st=2023-11-13T10%3A50%3A52Z&se=2024-02-11T10%3A50%3A52Z&sr=c&sp=r&sig=xl9p1e59N%2BFaurnyMxnq00ezbQdwzJ2fOe84FggDnAA%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551ff8a93ac0bdb8e1626b0.png?sv=2023-08-03&st=2023-11-13T10%3A50%3A51Z&se=2024-02-11T10%3A50%3A51Z&sr=c&sp=r&sig=zvl%2Fvswfu7wtNgAhnkBEit%2FO9c2F3SK8U7hL5NVOeSk%3D";i:1;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6551ff8b93ac0bf1ac1626b1.jpg?sv=2023-08-03&st=2023-11-13T10%3A50%3A51Z&se=2024-02-11T10%3A50%3A51Z&sr=c&sp=r&sig=zvl%2Fvswfu7wtNgAhnkBEit%2FO9c2F3SK8U7hL5NVOeSk%3D";}','2023-11-13 17:20:58','2023-11-13 17:20:58');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('11','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552355c93ac0b90791627af.png?sv=2023-08-03&st=2023-11-13T14%3A40%3A29Z&se=2024-02-11T14%3A40%3A29Z&sr=c&sp=r&sig=AUvzs6ZB9Bpv9OVhj2s60ug3J9BtfV6aRvStPohOfmA%3D','a:2:{i:0;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552355993ac0b744d1627ac.png?sv=2023-08-03&st=2023-11-13T14%3A40%3A25Z&se=2024-02-11T14%3A40%3A25Z&sr=c&sp=r&sig=F%2FOjeTR%2Bv7JhOBx%2FzYb4txxQ6NAdou6ceUd7i2xXmCU%3D";i:1;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552355993ac0b64b91627ad.jpg?sv=2023-08-03&st=2023-11-13T14%3A40%3A25Z&se=2024-02-11T14%3A40%3A25Z&sr=c&sp=r&sig=F%2FOjeTR%2Bv7JhOBx%2FzYb4txxQ6NAdou6ceUd7i2xXmCU%3D";}','2023-11-13 21:10:35','2023-11-13 21:10:35');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('12','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655235b393ac0b18831627c1.png?sv=2023-08-03&st=2023-11-13T14%3A41%3A55Z&se=2024-02-11T14%3A41%3A55Z&sr=c&sp=r&sig=%2FAKYlaO0aiMv3wEFa5tp3gNoktj1czYRnecSN3yTTeA%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655235b293ac0b87101627bf.png?sv=2023-08-03&st=2023-11-13T14%3A41%3A54Z&se=2024-02-11T14%3A41%3A54Z&sr=c&sp=r&sig=nZtgXj6hsS9LtgyxmAgFE%2BSTxrz8Exzes8taSklMksA%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655235b293ac0b1eec1627c0.jpg?sv=2023-08-03&st=2023-11-13T14%3A41%3A54Z&se=2024-02-11T14%3A41%3A54Z&sr=c&sp=r&sig=nZtgXj6hsS9LtgyxmAgFE%2BSTxrz8Exzes8taSklMksA%3D";}','2023-11-13 21:12:01','2023-11-13 21:12:01');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('13','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552361493ac0b31e51627db.png?sv=2023-08-03&st=2023-11-13T14%3A43%3A33Z&se=2024-02-11T14%3A43%3A33Z&sr=c&sp=r&sig=jihbIWz54GoQXi3iqCvr%2BDMaC2OnfuFGL%2Bne405zkAA%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552361093ac0b87f81627d9.png?sv=2023-08-03&st=2023-11-13T14%3A43%3A29Z&se=2024-02-11T14%3A43%3A29Z&sr=c&sp=r&sig=jeu9trpURD1k6i6n5RdJCKl9oWNxOICPZNEeCcglYUM%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552361193ac0b46e51627da.jpg?sv=2023-08-03&st=2023-11-13T14%3A43%3A29Z&se=2024-02-11T14%3A43%3A29Z&sr=c&sp=r&sig=jeu9trpURD1k6i6n5RdJCKl9oWNxOICPZNEeCcglYUM%3D";}','2023-11-13 21:13:38','2023-11-13 21:13:38');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('14','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552366a93ac0b171f1627ed.png?sv=2023-08-03&st=2023-11-13T14%3A44%3A58Z&se=2024-02-11T14%3A44%3A58Z&sr=c&sp=r&sig=8hbv0ucofT8SKfsSOqMqZEHTY%2Flsl95WxsH74g1ituI%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552366693ac0bb5ad1627eb.png?sv=2023-08-03&st=2023-11-13T14%3A44%3A54Z&se=2024-02-11T14%3A44%3A54Z&sr=c&sp=r&sig=rOjSlhipcJLrRAm%2FOu0RVpyTFDS00kynqHktKr4W%2B20%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552366793ac0b3cc01627ec.jpg?sv=2023-08-03&st=2023-11-13T14%3A44%3A55Z&se=2024-02-11T14%3A44%3A55Z&sr=c&sp=r&sig=NOlUA9V2kleX7nBx%2FgBdqOzQw8XfOLsLFzyr1NSBJjM%3D";}','2023-11-13 21:15:04','2023-11-13 21:15:04');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('15','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552370893ac0bcb12162807.png?sv=2023-08-03&st=2023-11-13T14%3A47%3A37Z&se=2024-02-11T14%3A47%3A37Z&sr=c&sp=r&sig=eRqqWDBtJWbvsXzwKrYPZn%2BWyvVHJ8VJn49mMUqp%2B9A%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655236f993ac0b4457162804.png?sv=2023-08-03&st=2023-11-13T14%3A47%3A22Z&se=2024-02-11T14%3A47%3A22Z&sr=c&sp=r&sig=ygASFeRbhfj7DQ5B%2Fuk97htvsBphsuDDzWXPDF%2FBvEU%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655236fc93ac0bb459162805.jpg?sv=2023-08-03&st=2023-11-13T14%3A47%3A25Z&se=2024-02-11T14%3A47%3A25Z&sr=c&sp=r&sig=7EpYYjTTIjQBFyMm9lgROUIgXPW8snwbm59ANFp83iY%3D";}','2023-11-13 21:17:42','2023-11-13 21:17:42');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('16','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655237a793ac0bcbed16281d.png?sv=2023-08-03&st=2023-11-13T14%3A50%3A16Z&se=2024-02-11T14%3A50%3A16Z&sr=c&sp=r&sig=xfeO%2FzamA8ql88xHIISgePMCWhZMly6kt4XSGILH0jA%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552379d93ac0b36c016281b.png?sv=2023-08-03&st=2023-11-13T14%3A50%3A05Z&se=2024-02-11T14%3A50%3A05Z&sr=c&sp=r&sig=CGYS3R0bVxewoMThY%2FYNqVcMnCmofbT5hXE%2BHnVrEC0%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655237a193ac0b4fef16281c.jpg?sv=2023-08-03&st=2023-11-13T14%3A50%3A09Z&se=2024-02-11T14%3A50%3A09Z&sr=c&sp=r&sig=CH544qNWBXpjfzoh0TFl1x8LDSN3BTeO49NOEwUPsjM%3D";}','2023-11-13 21:20:25','2023-11-13 21:20:25');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('17','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552385193ac0b62b8162831.png?sv=2023-08-03&st=2023-11-13T14%3A53%3A05Z&se=2024-02-11T14%3A53%3A05Z&sr=c&sp=r&sig=Vjvbgjv1YAoovJM8UIOKENmYBvv4XXyhw7DgMqZ6fF0%3D','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552384e93ac0beef516282f.png?sv=2023-08-03&st=2023-11-13T14%3A53%3A02Z&se=2024-02-11T14%3A53%3A02Z&sr=c&sp=r&sig=uEKGN%2Fm0ebHb9vobeFKrCizp0Dc450OKbDUUuE2e%2B60%3D";i:1;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552384e93ac0b3ce3162830.jpg?sv=2023-08-03&st=2023-11-13T14%3A53%3A02Z&se=2024-02-11T14%3A53%3A02Z&sr=c&sp=r&sig=uEKGN%2Fm0ebHb9vobeFKrCizp0Dc450OKbDUUuE2e%2B60%3D";}','2023-11-13 21:23:11','2023-11-13 21:23:11');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('18','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552387293ac0b3d10162843.png?sv=2023-08-03&st=2023-11-13T14%3A53%3A38Z&se=2024-02-11T14%3A53%3A38Z&sr=c&sp=r&sig=OmEUdSkZnYRGdR2wcp4g1RJv0pKnv7VHtfnNsAOBQtU%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552386793ac0b0a33162840.png?sv=2023-08-03&st=2023-11-13T14%3A53%3A27Z&se=2024-02-11T14%3A53%3A27Z&sr=c&sp=r&sig=UAS0mIds2vFfVUbMcWVBw%2FDLsBThx8NGxSEY2JKVyJI%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552386893ac0b2a01162842.jpg?sv=2023-08-03&st=2023-11-13T14%3A53%3A28Z&se=2024-02-11T14%3A53%3A28Z&sr=c&sp=r&sig=xWbZQI27Wj27pryf9oVOnHWKBGe8YbDqg7340kayi34%3D";}','2023-11-13 21:23:48','2023-11-13 21:23:48');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('19','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655238a993ac0b9df9162855.png?sv=2023-08-03&st=2023-11-13T14%3A54%3A33Z&se=2024-02-11T14%3A54%3A33Z&sr=c&sp=r&sig=%2BzYKywUIHgvoq1aFCRRLuE3cTN95CUSFYDKlcRlJtwE%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552389693ac0b4575162852.png?sv=2023-08-03&st=2023-11-13T14%3A54%3A14Z&se=2024-02-11T14%3A54%3A14Z&sr=c&sp=r&sig=Tms5zND3SDhc7nz27%2BUw9nNFX0Ii46BzKewfcwpVJlk%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552389c93ac0b53b0162853.jpg?sv=2023-08-03&st=2023-11-13T14%3A54%3A20Z&se=2024-02-11T14%3A54%3A20Z&sr=c&sp=r&sig=C2AsjfOScMISPhwGLsdGxVxHK86YqJDIqpe2meiPtt4%3D";}','2023-11-13 21:24:38','2023-11-13 21:24:38');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('20','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655238dd93ac0bce28162866.png?sv=2023-08-03&st=2023-11-13T14%3A55%3A26Z&se=2024-02-11T14%3A55%3A26Z&sr=c&sp=r&sig=c3TW0bG18M815stzAWyg7CXHnN%2BOLgGIPL0on8bzbZg%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655238da93ac0b47b7162864.png?sv=2023-08-03&st=2023-11-13T14%3A55%3A22Z&se=2024-02-11T14%3A55%3A22Z&sr=c&sp=r&sig=ZRMb4%2FHrDbO4ueLFl7TTCh7M46oZ4rCDZONKwvXvG8U%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655238db93ac0b33bc162865.jpg?sv=2023-08-03&st=2023-11-13T14%3A55%3A23Z&se=2024-02-11T14%3A55%3A23Z&sr=c&sp=r&sig=qPRVQawCFUXiKPSOwhFV6y9yYMjPdbi8Hk2KImUjPMI%3D";}','2023-11-13 21:25:31','2023-11-13 21:25:31');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('21','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552395b93ac0b563616287a.png?sv=2023-08-03&st=2023-11-13T14%3A57%3A31Z&se=2024-02-11T14%3A57%3A31Z&sr=c&sp=r&sig=CldLR17xkecTImulrcAsyi8zkeyuLKvtVBixUEN5SIQ%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552394b93ac0b0c6a162877.png?sv=2023-08-03&st=2023-11-13T14%3A57%3A16Z&se=2024-02-11T14%3A57%3A16Z&sr=c&sp=r&sig=Z0McCpXjYjeFGUYY6w8J7d46j51xl90UkjWW6VAapeA%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552394d93ac0b4826162878.jpg?sv=2023-08-03&st=2023-11-13T14%3A57%3A17Z&se=2024-02-11T14%3A57%3A17Z&sr=c&sp=r&sig=kqXiw6arnegKp3lAVHvdztjFdG4ZbIdii2bjbasV%2BLo%3D";}','2023-11-13 21:27:36','2023-11-13 21:27:36');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('22','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552397293ac0b734516288b.png?sv=2023-08-03&st=2023-11-13T14%3A57%3A54Z&se=2024-02-11T14%3A57%3A54Z&sr=c&sp=r&sig=X2X3yjlc4R6g%2FyoSNiTc2lXSl2vp18flRPP89KgU%2B2k%3D','a:2:{i:0;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552396f93ac0bd808162889.png?sv=2023-08-03&st=2023-11-13T14%3A57%3A51Z&se=2024-02-11T14%3A57%3A51Z&sr=c&sp=r&sig=GtEKmJuXk3eQdrSPJsABlz%2FDzi7Q6eHlqdzgIuatuAs%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552396f93ac0b092716288a.jpg?sv=2023-08-03&st=2023-11-13T14%3A57%3A51Z&se=2024-02-11T14%3A57%3A51Z&sr=c&sp=r&sig=GtEKmJuXk3eQdrSPJsABlz%2FDzi7Q6eHlqdzgIuatuAs%3D";}','2023-11-13 21:27:59','2023-11-13 21:27:59');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('23','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523a1593ac0b83b316289f.png?sv=2023-08-03&st=2023-11-13T15%3A00%3A37Z&se=2024-02-11T15%3A00%3A37Z&sr=c&sp=r&sig=nEEtTQYrVc%2BP2yDDnWU8zm5wRy8QXEry3H1ng5yG7vQ%3D','a:2:{i:0;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523a1393ac0b17e216289d.png?sv=2023-08-03&st=2023-11-13T15%3A00%3A35Z&se=2024-02-11T15%3A00%3A35Z&sr=c&sp=r&sig=%2F7DFUkD00XihfOIfpUPgJbwHwTP%2Ff29HG6%2FFgqyRJ8M%3D";i:1;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523a1393ac0ba5b416289e.jpg?sv=2023-08-03&st=2023-11-13T15%3A00%3A36Z&se=2024-02-11T15%3A00%3A36Z&sr=c&sp=r&sig=wySLn%2FIbiRUojPEo9TAgm6%2ByvL%2FFCZMei7cqkL7uC7Y%3D";}','2023-11-13 21:30:42','2023-11-13 21:30:42');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('24','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523a5f93ac0b9a471628b1.png?sv=2023-08-03&st=2023-11-13T15%3A01%3A51Z&se=2024-02-11T15%3A01%3A51Z&sr=c&sp=r&sig=FUoi%2F7BzREC3J4zGpXL2KqH1SzlM11rG0Kt8AZgzB1w%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523a5893ac0b5ab21628af.png?sv=2023-08-03&st=2023-11-13T15%3A01%3A44Z&se=2024-02-11T15%3A01%3A44Z&sr=c&sp=r&sig=E8t0rIpLL4Tadr00DbacWFsnh2AVvU52rovoo4AZ8w8%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523a5993ac0b5a561628b0.jpg?sv=2023-08-03&st=2023-11-13T15%3A01%3A45Z&se=2024-02-11T15%3A01%3A45Z&sr=c&sp=r&sig=uA4xihK1pZr9Q1noiTO0I3phW1cuqqRGz2uYjIyF%2FSc%3D";}','2023-11-13 21:31:56','2023-11-13 21:31:56');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('25','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523b3793ac0b4f2b1628c5.png?sv=2023-08-03&st=2023-11-13T15%3A05%3A27Z&se=2024-02-11T15%3A05%3A27Z&sr=c&sp=r&sig=0LIxUPBNzL9CyHKnY0%2FZrchB1ROC1Llbk7rcuSHvWFg%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523b3493ac0b12ea1628c3.png?sv=2023-08-03&st=2023-11-13T15%3A05%3A24Z&se=2024-02-11T15%3A05%3A24Z&sr=c&sp=r&sig=FFIK5uSL4hnHHGcwrmpseYngYvZ2oZx54GtpLcvJkhA%3D";i:1;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523b3493ac0b84db1628c4.jpg?sv=2023-08-03&st=2023-11-13T15%3A05%3A25Z&se=2024-02-11T15%3A05%3A25Z&sr=c&sp=r&sig=RrnQp4MNr4E3%2B%2Bdf2CXB9e8ogRBMvO695ep%2BqdQJnbY%3D";}','2023-11-13 21:35:32','2023-11-13 21:35:32');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('26','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523b6793ac0b1ec51628d7.png?sv=2023-08-03&st=2023-11-13T15%3A06%3A16Z&se=2024-02-11T15%3A06%3A16Z&sr=c&sp=r&sig=DalPxHRSyaExEgExVb4MDaeBrzPqfwwc3tupP9%2BJvWE%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523b5d93ac0b046f1628d5.png?sv=2023-08-03&st=2023-11-13T15%3A06%3A05Z&se=2024-02-11T15%3A06%3A05Z&sr=c&sp=r&sig=jUzT0EZkcUrTnpw9hOzaFoSWcS7cGweSVnvVf1WCItE%3D";i:1;s:265:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523b5f93ac0b53cc1628d6.jpg?sv=2023-08-03&st=2023-11-13T15%3A06%3A08Z&se=2024-02-11T15%3A06%3A08Z&sr=c&sp=r&sig=3sU2mHy%2BMT%2BOTQJfIDmFpSPoZqxSq%2BJukpFOfTmRp%2Bk%3D";}','2023-11-13 21:36:21','2023-11-13 21:36:21');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('27','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523d8b93ac0b33e2162924.png?sv=2023-08-03&st=2023-11-13T15%3A15%3A23Z&se=2024-02-11T15%3A15%3A23Z&sr=c&sp=r&sig=%2FgzZ%2FeK9K0C0mZGNC3lGm8aknwjbfkDCLP3lgzTxB1o%3D','a:2:{i:0;s:263:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523d8893ac0b5de3162922.png?sv=2023-08-03&st=2023-11-13T15%3A15%3A20Z&se=2024-02-11T15%3A15%3A20Z&sr=c&sp=r&sig=RlpOoIa9I5BKi%2B7%2BDugVOOVsgidVKzsee%2BuzTnPxrHM%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65523d8993ac0b0a6f162923.jpg?sv=2023-08-03&st=2023-11-13T15%3A15%3A21Z&se=2024-02-11T15%3A15%3A21Z&sr=c&sp=r&sig=FWHlXn93GBqnzUyC3BW9ejgYhzG1JZgElArRjzzI27w%3D";}','2023-11-13 21:45:29','2023-11-13 21:45:29');

INSERT INTO motor_claim_cases (id, app_customer_id, claim_channel, vehicle_no, driver_name, contact_fullname, contact_telephone, accident_location, accident_date, accident_time, accident_description, accident_damaged_portion, customer_code, risk_name, product_code, class_code, risk_seq_no, policy_no, customer_type, signature_image, accident_damaged_photos, created_at, updated_at) VALUES ('28','0','app','1A/9386(YGN)','test U MOE AUNG MAW','test U MOE AUNG MAW','09787365517','Neverland','12-31-2023','12:00 am','My car got hit in while stopping for a while in Neverland','Rare Bumper and Front Light','C00044491','1A/9386(YGN)','MNF','MT','00YGN2300462403','AYA/YGN/MNF/23000002','I','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655258a093ac0b85f51629ca.png?sv=2023-08-03&st=2023-11-13T17%3A10%3A56Z&se=2024-02-11T17%3A10%3A56Z&sr=c&sp=r&sig=5poR32Dl8whmC%2B3ozOGYRL%2F8LS3DPXbed1PWZqGN%2F5w%3D','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552589a93ac0b759b1629c8.png?sv=2023-08-03&st=2023-11-13T17%3A10%3A50Z&se=2024-02-11T17%3A10%3A50Z&sr=c&sp=r&sig=voHBrbdVOL7lbs9FtCqt0EMDJHqpTTMM36XQCdMxXsQ%3D";i:1;s:259:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552589c93ac0ba37a1629c9.jpg?sv=2023-08-03&st=2023-11-13T17%3A10%3A52Z&se=2024-02-11T17%3A10%3A52Z&sr=c&sp=r&sig=4JNG1ZDiTKAF7kBQv48zeIhvDnRQIbR8zOCE%2FdE3zIQ%3D";}','2023-11-13 23:41:12','2023-11-13 23:41:12');


CREATE TABLE `non_motor_claim_cases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `app_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_or_risk_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `accident_damaged_photos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_channel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO non_motor_claim_cases (id, app_customer_id, policy_or_risk_name, contact_fullname, contact_telephone, nrc_no, passport_no, product_type, accident_date, accident_time, accident_description, accident_damaged_photos, signature_image, claim_channel, created_at, updated_at) VALUES ('1','','AYA/YGN/LHC/20000040','U MOE AUNG MAW','09787365517','9/MAMANA(N)043453','""','Health Insurance','12-31-2023','12:00 am','Detailed explanation of the accident...','a:2:{i:0;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655268d993ac0b5ba3162a80.png?sv=2023-08-03&st=2023-11-13T18%3A20%3A09Z&se=2024-02-11T18%3A20%3A09Z&sr=c&sp=r&sig=WQ4mRlRXpoo864kjwQxDzBGIkxGENxcLSyG2iKtMJEk%3D";i:1;s:257:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655268d993ac0b2b48162a81.jpg?sv=2023-08-03&st=2023-11-13T18%3A20%3A09Z&se=2024-02-11T18%3A20%3A09Z&sr=c&sp=r&sig=WQ4mRlRXpoo864kjwQxDzBGIkxGENxcLSyG2iKtMJEk%3D";}','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/655268da93ac0bd3d9162a82.png?sv=2023-08-03&st=2023-11-13T18%3A20%3A10Z&se=2024-02-11T18%3A20%3A10Z&sr=c&sp=r&sig=Fvr01EN90aCoanz6JSakRsNGkFMM0E8OvBd%2Bom9oY9o%3D','app','2023-11-14 00:50:41','2023-11-14 00:50:41');

INSERT INTO non_motor_claim_cases (id, app_customer_id, policy_or_risk_name, contact_fullname, contact_telephone, nrc_no, passport_no, product_type, accident_date, accident_time, accident_description, accident_damaged_photos, signature_image, claim_channel, created_at, updated_at) VALUES ('2','','AYA/YGN/LHC/20000040','U MOE AUNG MAW','09787365517','9/MAMANA(N)043453','""','Health Insurance','12-31-2023','12:00 am','Detailed explanation of the accident...','a:2:{i:0;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552698493ac0bc537162a96.png?sv=2023-08-03&st=2023-11-13T18%3A23%3A01Z&se=2024-02-11T18%3A23%3A01Z&sr=c&sp=r&sig=QaeHwXYGmFBioagpCy1c%2BDw6sDOwWGABpEBD%2FNSKp0Q%3D";i:1;s:261:"https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552698593ac0b65a3162a97.jpg?sv=2023-08-03&st=2023-11-13T18%3A23%3A01Z&se=2024-02-11T18%3A23%3A01Z&sr=c&sp=r&sig=QaeHwXYGmFBioagpCy1c%2BDw6sDOwWGABpEBD%2FNSKp0Q%3D";}','https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/6552698693ac0b0251162a98.png?sv=2023-08-03&st=2023-11-13T18%3A23%3A02Z&se=2024-02-11T18%3A23%3A02Z&sr=c&sp=r&sig=LN9sIfcg3DprN0Cs1lUviOQw4oy97HRUCTQZLcKKDQw%3D','app','2023-11-14 00:53:14','2023-11-14 00:53:14');


CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('00161692d3044c9533cf36abacf5ab25defb04602b859039f5d16997cf09d0852a09fb2d13d51374','47','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-12-01 15:18:49','2023-12-01 15:18:49','2023-12-03 15:18:49');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('00f074f016907637b4e0d513e96011148f85d7a9510204ddfd38bdd9b6eee0db6742a32e5c535447','28','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 17:37:41','2023-10-26 17:37:41','2023-10-28 17:37:41');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0166fd53afb9c9936840516801a6b1e1446717436eeed33dc53197b49e91e1040116b37dedab99bc','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-13 10:18:45','2023-10-13 10:18:45','2023-10-15 10:18:45');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('02fbb1d98bdeab49015f6fc0e96d46ea6415c01abc842a841c53af16a22420bb4b19478f6b60fbe3','1','9a6063a2-7596-46d2-b43f-fdf07d21724e','internal_server_api_token','[]','0','2023-10-26 16:00:04','2023-10-26 16:00:04','2023-10-28 16:00:04');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0751bff771137ff40f741a0090e72b00c7bb4822b61359d82e80a4ac4c377c27f22918a7cf558a87','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:28:43','2023-10-12 04:28:43','2024-10-12 04:28:43');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0b2636e9ed1141756466c6cd395a53d388aa6cd3fbbe30e129a8fe9589b31fe30778e4e5d02d3d4f','26','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:55:44','2023-10-26 15:55:44','2023-10-28 15:55:44');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0d7bd8ebee5d5d0352748e1fea89c511ccbf08597e52a03a610f49d215cf5230d71fa47db83f3e59','17','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 14:14:26','2023-10-26 14:14:26','2023-10-28 14:14:26');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0f03f6134954d0bb2f4857af3f297a56baa04b3d398561ba3c1a4fc88023713da40f990b6a1c9e0c','7','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:41:47','2023-10-26 08:41:47','2023-10-28 08:41:47');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0f9cf4a404404fde3fd9df98beedde3295296a8c5402c5d5ab04d8565329efdd3be0fc25bf529fd8','47','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-12-05 15:29:33','2023-12-05 15:29:33','2023-12-07 15:29:33');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('101592931a802cf20ac4da8a3c16a3105869bb117b0be601eb1066dce33b283f3a98e5fa633f3108','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:55:42','2023-10-12 04:55:42','2024-10-12 04:55:42');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('108c5eda23df2e8f244093e14fac737d5e85233a9b80b121d92ae657cebc1f22efdd989b14c649aa','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:01:03','2023-10-12 05:01:03','2024-10-12 05:01:03');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('114fb8e3e64abc4755174385b0d1abb69da6ba54d2d009e727fc55dbed96dd20e3b00f72179037af','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:34:03','2023-10-12 05:34:03','2023-11-11 05:34:03');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('1223edfd5c4d3bbbe4c9b6f49b2458722f4472b18b75c392c188e6b54c4487da95128a81ec61b7ad','27','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-11-24 01:50:00','2023-11-24 01:50:00','2023-11-26 01:50:00');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('166f7571a3cf200f6b087fb5130b83e84737fe249d3b9d491646b613d47a026b8522431ef3c6ef29','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:29:08','2023-10-12 04:29:08','2024-10-12 04:29:08');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('1b6c5225c11405fd473d130efad73b51b55ec78f6028eb6d1e49acd7c805c9f8d3f1bd83ec308c39','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:07:56','2023-10-12 05:07:56','2024-10-12 05:07:56');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('1c4f41c104424662d8e384cc7efb2ac99e30230f2ccfcedc8db581dd0a37baffc5e754a7d7d60bf5','13','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 09:22:39','2023-10-26 09:22:39','2023-10-28 09:22:39');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('22b9439e0454bf1f4686f3d1b747029ba3148bc98ea5e7fd450b5a3b2394c281643be9b6baa59a77','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:03:59','2023-10-12 05:03:59','2024-10-12 05:03:59');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('2530e7def85a4f3b506f835a673b39d77dde5ccb9714bdfb65896694a2aa67267b282b83385d082a','20','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 14:33:34','2023-10-26 14:33:34','2023-10-28 14:33:34');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('27ff291091bee43ffc709770e3ff29100930d0e76160e68423e19c7b72d0f07ad956d4759945b2d4','1','9a6063a2-7596-46d2-b43f-fdf07d21724e','internal_server_api_token','[]','0','2023-10-18 08:39:55','2023-10-18 08:39:55','2023-10-20 08:39:55');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('2a123f7acfe7fda38b1973cd899c8c57ab5f1d067d620b956314c6526d1168eb8fc0e26edc932275','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:03:47','2023-10-12 05:03:47','2024-10-12 05:03:47');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('330e1ab9c55bbc759080f21d317916bd2f89c937be9dabf00f87dac080a0a6c1913ab21041252cda','22','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:06:12','2023-10-26 15:06:12','2023-10-28 15:06:12');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('331b30a81e6f00b4146263e70841a7bb76ba3112857eeb5d2398d4d734f892672f85b3c15ac83490','4','9a595b34-f73b-425c-b371-807407f9d575','CustomerToken','[]','0','2023-10-12 04:44:11','2023-10-12 04:44:11','2024-10-12 04:44:11');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('372fa50aa0282a0178d4747881e301afb02a8cd2cbf7de828aa6360c16bc5a0da59503f3326cccca','20','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 14:24:03','2023-10-26 14:24:03','2023-10-28 14:24:03');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('3afd03d99f7d3607b920e6dce4d52ab92916cf4eca48ea5351ded030218c58021d7bcbcd8821de43','11','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:44:05','2023-10-26 08:44:05','2023-10-28 08:44:05');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('3c0175e25c439dd5819510c567176c5b9c83d7503dd1491e62e5229a08713e4480cdcfcd5dd6433f','23','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:07:18','2023-10-26 15:07:18','2023-10-28 15:07:18');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('419489e7cbee7548fa94821a598fd18e99ab7d042542e43a538cca044fd2cb846100d375d15dd938','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:29:25','2023-10-12 04:29:25','2024-10-12 04:29:25');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('48169e97d0d5300d5572aa750d45377c353e1d3016a1da14e018b67845a227ee9c6a9a6a69ecbaec','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:13:13','2023-10-12 05:13:13','2024-10-12 05:13:13');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('4850580a84e6dc0ecb428a1b0fca6d56d8a64bd47a2ee3879ac3d816dc9484d80e264a4f87b80c05','27','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-11-24 01:50:20','2023-11-24 01:50:20','2023-11-26 01:50:20');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('498dee4194bdaba596ecff4be5bfd3300c2ae881b40627d48b6dc10599d8f7472e048f2edd218115','30','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-11-24 01:44:59','2023-11-24 01:44:59','2023-11-26 01:44:59');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('4c7e932cba7828ba84aba08d58e3bb4b20b8749900b6e423d406f903f93afafd9de9dd5c897259ea','21','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:04:37','2023-10-26 15:04:37','2023-10-28 15:04:37');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('4d87f283769e56cd129634eaa4ff8fe4509ccf026f0678cb77c60a22ec72590258e27ab3dac07461','1','9a6063a2-7596-46d2-b43f-fdf07d21724e','internal_server_api_token','[]','0','2023-10-26 14:45:16','2023-10-26 14:45:16','2023-10-28 14:45:16');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('4e54a73612aca2b9a40367c2b478324306121f561c3cd873e2fdcd1fe397a9b0a575e9ba2d5f536a','3','9a595b34-f73b-425c-b371-807407f9d575','admin_api','[]','0','2023-10-15 16:03:29','2023-10-15 16:03:29','2023-10-17 16:03:29');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('5b62bc5189a59d3c613a91e2fac6d75dbffce04196162c9c443b55a67e5a600c2204498aea80f64c','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:08:11','2023-10-12 05:08:11','2024-10-12 05:08:11');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('5e626859b9c08cc09d4de3813675381616753a61c7c982b98021c9d4a00d16f0c2726cdf8ae555ed','24','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:36:44','2023-10-26 15:36:44','2023-10-28 15:36:44');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('6060c287934ea7141fc709474f0afeee05d1748cf0c2bb8096dda0dc3f30849d081eee8ac46e2fe2','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:31:39','2023-10-12 04:31:39','2024-10-12 04:31:39');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('612d6a25876bf61959e02ba0559255abf87c8aebdc22647a7b11b6be7bd2fbba0257a983f0cce397','29','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-11-22 14:14:31','2023-11-22 14:14:31','2023-11-24 14:14:31');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('64b0f9268bc3678a8dfa48bd8e68349acf4d6a18ecbae6001446bf862a8be90046e9a34f1547e269','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:39:17','2023-10-12 04:39:17','2024-10-12 04:39:17');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('65fb4ab45cc4d4f7afad713e7f7a88b705666285b067156031001962f2c49fcde1cdbe0a5c3825eb','19','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 14:22:24','2023-10-26 14:22:24','2023-10-28 14:22:24');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('68579c7575d0fe12e9aa7e2137d0fb4ba557a1621da6808195c7b2d7e5c3f44c56a82d768cdbcb8b','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:44:17','2023-10-12 04:44:17','2024-10-12 04:44:17');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('6893dee48806fcf2f8fe3baacde8b3c29b03dd1c18c604bca5dd370ad0aee8eb7e66dfaf88cb7acc','9','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:42:55','2023-10-26 08:42:55','2023-10-28 08:42:55');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('69bac4133af8f5140a82273af732cd185c80b3abde909188f61f9cdd94f7bd1f7d51992ba37c6223','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:36:07','2023-10-12 05:36:07','2023-10-14 05:36:07');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('6ab380f7a098eb0da85f44d6a09510724c6ccb023320c37f10dd8c5237fdbd5030d6371f4c47a968','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:13:39','2023-10-12 05:13:39','2024-10-12 05:13:39');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('6dc3b6e48fa894464d2fc7516da235a19e44935085ab73fd493f89a9bdb87b60641440bbd6958809','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:45:26','2023-10-12 04:45:26','2024-10-12 04:45:26');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('71c0323f1dec82aacbf657e41a225a7a6790901ceb1ac7b7d0d8d5cd08e49605529d78dff040b0b7','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:59:36','2023-10-12 04:59:36','2024-10-12 04:59:36');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('75659270af0c9990f1c262c66c85001c7bd2143ca4d9a911d1b01826441fea3b997286d7e9f981f4','13','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:47:55','2023-10-26 08:47:55','2023-10-28 08:47:55');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('75bb0472af829186d8c881606e4f4acf89de4d5102ae61bae2b18106ae11b4d4fb596acfe012ffce','1','9a6063a2-7596-46d2-b43f-fdf07d21724e','internal_server_api_token','[]','0','2023-10-26 14:37:09','2023-10-26 14:37:09','2023-10-28 14:37:09');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('784a0be8153fd193bc1f5bb641f470ebc9fd46523cefac54a0f23927c06a558feeaa3f4204008cbf','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:20:35','2023-10-12 04:20:35','2024-10-12 04:20:35');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('7d24fb5edf828581c88667efccd5d68d06b22a214d8250c436c99762b5963058cbdb4bc3adb644b2','8','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:42:36','2023-10-26 08:42:36','2023-10-28 08:42:36');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('8175e4860fbf2d1e3457d47e35f7b658e628b9c6461c8ba2dff023417972f6892940ed2172b3b699','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-15 16:18:02','2023-10-15 16:18:02','2023-10-17 16:18:02');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('8280621a0d297605f96fa0ae9bf79dac3dbc1aec89eb488f033fa1ce6f3f52ab7e4845c811c36388','3','9a595b34-f73b-425c-b371-807407f9d575','admin_api','[]','0','2023-10-15 16:02:59','2023-10-15 16:02:59','2023-10-17 16:02:59');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('8988b1ac535566dbdfd4bfec824f24a1291b77001fa75006d4f5fe70a501ece1252d147b32d12b12','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:43:30','2023-10-12 04:43:30','2024-10-12 04:43:30');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('8ed78a6ca6e8dede6040453177ff8255e68cb9f86bccfabe11f437c9efbc6deda1a79106bce3a0e7','1','9a6063a2-7596-46d2-b43f-fdf07d21724e','internal_server_api_token','[]','0','2023-10-26 14:48:24','2023-10-26 14:48:24','2023-10-28 14:48:24');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('90904f2adb0101ef3bc07d3cc29ea914ff4dea2ecf8543a31c1aa581a0e3e1040441d9e69f0865ee','14','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 13:25:13','2023-10-26 13:25:13','2023-10-28 13:25:13');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('90c8b5626f6cc544cb0d7a374d9c4824925dab36d62c40198108a2d3aaada4fc11fb86488dd7f622','25','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:42:41','2023-10-26 15:42:41','2023-10-28 15:42:41');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('93017213d5d7a4873320c98a910491737443fb1c6738ca9ff8e5af37ce2eab97c31fe0838b09dd11','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-13 10:16:31','2023-10-13 10:16:31','2023-10-15 10:16:31');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('95d322e67fdaed2a7a770f3424cb4d2f323bb3dd89cb716cab161e14fcba86e92b515fe3360c5361','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-13 02:51:10','2023-10-13 02:51:10','2023-10-15 02:51:10');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('9bcb3b5559e33b7c9f32b8cd2ce9dba06dcd03ba4cd20749dad9e0f4b4afbd28ab062e02cb976aef','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:30:57','2023-10-12 04:30:57','2024-10-12 04:30:57');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('9d2498c22e84fbd0c2a28d07f726ace47be1063e15769858212ddee731d713f7bd066031f6b18eae','31','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-11-24 01:55:26','2023-11-24 01:55:26','2023-11-26 01:55:26');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('a1a790b95e62efa9510820422aa24627716bfaa5d79ff6bbd30d13691c9721d1afdba5374688dd49','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:20:51','2023-10-12 04:20:51','2024-10-12 04:20:51');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('a53b664bb11eaf6993552befc214766ddcd88d03707a617d4d9249e69ee9f627c0aed0d5d796f9f4','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:05:24','2023-10-12 05:05:24','2024-10-12 05:05:24');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('ab6cd3f9a8eaad9f3c0afe966029690d1681f0c189d36654fe76cbefdb626ec87abf5a2b464e48e5','1','9a6063a2-7596-46d2-b43f-fdf07d21724e','internal_server_api_token','[]','0','2023-10-26 14:47:36','2023-10-26 14:47:36','2023-10-28 14:47:36');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('ac2e2563630d0182a42890dbdcb59fed9152ad6da4abba0818f6fc0d252d1ac121968df860d3ec65','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:19:14','2023-10-12 04:19:14','2024-10-12 04:19:14');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('b470ea542583318a6b07008ecc05350c5b2646e22546abc37317f0b2c54778fc0a2ee0bbd6dbbbaf','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-13 10:17:48','2023-10-13 10:17:48','2023-10-15 10:17:48');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('b9428e4e252f3c0fa186a05cdfbfbff7b76bf996d9a0b42656394130644146e41798e477ec131060','27','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 17:36:56','2023-10-26 17:36:56','2023-10-28 17:36:56');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('b9561b1d884b07f2cdd47eec6c15b6b6fd53dfd0f02406b1c706d630469b3a7685baa69e12a88918','32','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-11-29 11:42:37','2023-11-29 11:42:37','2023-12-01 11:42:37');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('b98f15a0e1ec072c68c88614914e1e2370d0e7dec595e64cd43d14177d6c9e6800f78b9bb0ae7314','13','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 09:21:53','2023-10-26 09:21:53','2023-10-28 09:21:53');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('ba353260fce167ff10259983250a897bd164b75339179f92afecba824a13b9d71ec6a4d2579d6229','13','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 09:23:01','2023-10-26 09:23:01','2023-10-28 09:23:01');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('bbbfafa5517a477f14ad62697cbab2ddd49b4625f4c87ff882b47473ac3002c63a1cfc6173342e60','1','9a5952ed-9899-43c4-b958-f98c33920aeb','internal_server_api_token','[]','0','2023-10-12 04:41:18','2023-10-12 04:41:18','2024-10-12 04:41:18');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('bc50c74633dbfea8db643e75a7aacb69b2b2cf397133326646678aa9ece90b93fccd4480f18a6be1','10','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:43:30','2023-10-26 08:43:30','2023-10-28 08:43:30');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('bccc02a9ccc0d44a56e6cdd6f671a2fe2c63c5e5b3c342f64d5408992d0ac5fcc9ca2ab8e6c601f6','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:13:28','2023-10-12 05:13:28','2024-10-12 05:13:28');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('c5f3b7f62c697e152437536958968df20dc5b373ae0fad10c9c508f45a4ecf7f4383e017e1a76702','26','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 15:56:58','2023-10-26 15:56:58','2023-10-28 15:56:58');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('c956199c0045f47d1d3829921b8145fbd01d747f110d586a737cfd1168a751ba53a039d80d22e46d','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:59:20','2023-10-12 04:59:20','2024-10-12 04:59:20');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('d19426168df0b7420bc0cac65392ccd6195fa8832229a27ba70387a101cc62645e099f9d35c96170','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 10:06:32','2023-10-12 10:06:32','2023-10-14 10:06:32');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('d5c63b4558cbc8b02972cde67f8f6b7613b21ced7194f3a85b2e6777101d75869977c785cadce4d3','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:57:52','2023-10-12 04:57:52','2024-10-12 04:57:52');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('d61c52646cb7a2e1fc920765de8cd8a3bb9acdc8462f797b086330b7e3fc95b5bacd7cab7b298692','6','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:34:43','2023-10-26 08:34:43','2023-10-28 08:34:43');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('d83835927a6f7c759e907c3ca73a1ebfccf9e177f540240db19cdbf67c5d32d72077caccdcc70f1e','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:22:34','2023-10-12 05:22:34','2024-10-12 05:22:34');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('dbab27641dd3487f25630e1c5757cc5f7937a3d09ede8db5e26a8d5b55cd09e2728c89030e5b9def','3','9a6063a2-7596-46d2-b43f-fdf07d21724e','admin_api','[]','0','2023-10-15 16:47:28','2023-10-15 16:47:28','2023-10-17 16:47:28');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('dca6945dbb44eb8fb7c511d9fff0026636f4390e3089359457ca5c7d53073b0cf8c8c080fe1b4674','15','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 13:46:01','2023-10-26 13:46:01','2023-10-28 13:46:01');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('e21089b43338334227e5b85042c2421ac9d38b3e9ba663ddd4a6147ba6902588ed0c55e4c79b36f2','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 04:55:07','2023-10-12 04:55:07','2024-10-12 04:55:07');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('e896591e51ec460a6661b534bd083649a2f66b623d05aab029b2a817d10a7d0b5eab920c89407c30','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-13 10:21:16','2023-10-13 10:21:16','2023-10-15 10:21:16');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('f042dfbca3fcc3373be110932fd158a5b4df97834be02a170173f1220fa49f8ce0cae2d027293d8c','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:03:11','2023-10-12 05:03:11','2024-10-12 05:03:11');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('f2498fd4cdf258ebc556fa8c53eb8b7918ee82e39882d4d3e5f9587000d24216442024f3a2b4b3ad','18','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 14:21:42','2023-10-26 14:21:42','2023-10-28 14:21:42');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('f523a94008fae00fa134b942a42810687ec307acc59c15f173f0d320cbe5913b92a457d8b5bf368e','1','9a595b34-f73b-425c-b371-807407f9d575','internal_server_api_token','[]','0','2023-10-12 05:22:24','2023-10-12 05:22:24','2024-10-12 05:22:24');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('f5e3d267f3661b2533b0a5cdcf0caa65a4eaf9c6ad07d07fc1c6be90d0e6556c377a9e9128df8c62','16','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 14:06:38','2023-10-26 14:06:38','2023-10-28 14:06:38');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('fda77e200abce4ef2e14f2f0b02309ea210307d4daba8daf6149b6451514585236f03f33857bf124','12','9a6063a2-7596-46d2-b43f-fdf07d21724e','app_api_token','[]','0','2023-10-26 08:45:09','2023-10-26 08:45:09','2023-10-28 08:45:09');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('fdf4e6a200b0857bac9128caea0213f154ab3b2f15a5a907792e9a0a356b3b634cface8f75840e30','3','9a595b34-f73b-425c-b371-807407f9d575','admin_api','[]','0','2023-10-15 16:05:08','2023-10-15 16:05:08','2023-10-17 16:05:08');


CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a57b98e-e6f9-4613-8ec8-7003837ae637','','aya-smompo Personal Access Client','JF9haIW5KfOAz8M6CQaDpH1wSweasHmDQWCo5jA1','','http://localhost','1','0','0','2023-10-11 09:14:19','2023-10-11 09:14:19');

INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a5952ed-9899-43c4-b958-f98c33920aeb','','aya-smompo Personal Access Client','CsrnT2YB2K1QvK0sIYeMLUZV38gXwUbWP1Ry05Yf','','http://localhost','1','0','0','2023-10-12 04:19:00','2023-10-12 04:19:00');

INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a595b34-f73b-425c-b371-807407f9d575','','aya-smompo Personal Access Client','xMcPzrbN2iOa9QtSFk7vIKhFMia2WrTlImKaGdOv','','http://localhost','1','0','0','2023-10-12 04:42:09','2023-10-12 04:42:09');

INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a595b81-c5fb-40c7-9d86-5e9584fb8284','','aya-smompo Password Grant Client','P9lqmY1q4AV8GkdKneWZu9QOdlfpxrxtm0hQwj7L','internal_access','http://localhost','0','1','0','2023-10-12 04:42:59','2023-10-12 04:42:59');

INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a6063a2-7596-46d2-b43f-fdf07d21724e','','aya-smompo Personal Access Client','BhhkZFHJJsauqA6qB8KZv06wgkQRLy4DLiR9yP6J','','http://localhost','1','0','0','2023-10-15 16:36:31','2023-10-15 16:36:31');

INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a6063bd-217c-46d3-a169-8ba5fc3a8b27','','aya-smompo Password Grant Client','m556IpbFzoUS4nIIcMFYvPn8jvHvlNdXNnEi1vcx','admin','http://localhost','0','1','0','2023-10-15 16:36:48','2023-10-15 16:36:48');


CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO oauth_personal_access_clients (id, client_id, created_at, updated_at) VALUES ('2','9a5952ed-9899-43c4-b958-f98c33920aeb','2023-10-12 04:19:00','2023-10-12 04:19:00');

INSERT INTO oauth_personal_access_clients (id, client_id, created_at, updated_at) VALUES ('3','9a595b34-f73b-425c-b371-807407f9d575','2023-10-12 04:42:09','2023-10-12 04:42:09');

INSERT INTO oauth_personal_access_clients (id, client_id, created_at, updated_at) VALUES ('4','9a6063a2-7596-46d2-b43f-fdf07d21724e','2023-10-15 16:36:31','2023-10-15 16:36:31');


CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `product_code_list_request_form_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_code_list_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_form_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO product_code_list_request_form_types (id, product_code_list_id, request_form_type_id, product_code, created_at, updated_at) VALUES ('19','1','1','ECA','','');

INSERT INTO product_code_list_request_form_types (id, product_code_list_id, request_form_type_id, product_code, created_at, updated_at) VALUES ('20','1','2','ECA','','');

INSERT INTO product_code_list_request_form_types (id, product_code_list_id, request_form_type_id, product_code, created_at, updated_at) VALUES ('21','10','2','FAN','','');

INSERT INTO product_code_list_request_form_types (id, product_code_list_id, request_form_type_id, product_code, created_at, updated_at) VALUES ('22','10','3','FAN','','');

INSERT INTO product_code_list_request_form_types (id, product_code_list_id, request_form_type_id, product_code, created_at, updated_at) VALUES ('23','10','7','FAN','','');


CREATE TABLE `product_code_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('1','ENGG','ENGINEERING','ECA','CONTRACTOR'S_ALL_RISKS_MUNICHRE','2023-11-14 11:47:27','2023-11-14 11:47:27');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('2','ENGG','ENGINEERING','EEA','ERECTION_ALL_RISKS_MUNICHRE','2023-11-14 11:47:27','2023-11-14 11:47:27');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('3','ENGG','ENGINEERING','CAR','NEW CONTRACTOR'S_ALL_RISKS_MUNICHRE','2023-11-14 11:47:27','2023-11-14 11:47:27');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('4','ENGG','ENGINEERING','EAR','NEW ERECTION_ALL_RISKS_MUNICHRE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('5','FI','FIRE INSURANCE','FAT','ANNUAL CASH IN TRANSIT INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('6','FI','FIRE INSURANCE','FCS','CASH IN SAFE INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('7','FI','FIRE INSURANCE','FCT','CASH IN TRANSIT INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('8','FI','FIRE INSURANCE','FFG','FIDELITY GUARANTEE INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('9','FI','FIRE INSURANCE','FFI','FIRE INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('10','FI','FIRE INSURANCE','FAN','NEW ANNUAL CASH IN TRANSIT INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('11','FI','FIRE INSURANCE','FSA','NEW CASH IN SAFE INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('12','FI','FIRE INSURANCE','FTS','NEW CASH IN TRANSIT INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('13','FI','FIRE INSURANCE','FFD','NEW FIDELITY GUARANTEE INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('14','FI','FIRE INSURANCE','FIR','NEW FIRE INSURANCE','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('15','FI','FIRE INSURANCE','FST','NEW STOCK DECLARATION','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('16','FI','FIRE INSURANCE','FSD','STOCK DECLARATION','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('17','LF','HEALTH INSURANCE','AYH','AYA HEALTH','2023-11-14 11:47:28','2023-11-14 11:47:28');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('18','LF','HEALTH INSURANCE','LHC','CRITICAL ILLNESS INSURANCE','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('19','LF','HEALTH INSURANCE','LHN','HEALTH INSURANCE','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('20','LF','HEALTH INSURANCE','HMT','MEDI THUKHA MICRO HEALTH INSURANCE','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('21','LF','HEALTH INSURANCE','LHM','MICRO HEALTH INSURANCE','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('22','LF','HEALTH INSURANCE','LPL','PUBLIC LIFE INSURANCE','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('23','LF','HEALTH INSURANCE','LSE','SHORT TERM ENDOWMENT','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('24','LIA','LIABILITY','LBL','BAILEE'S / BAILEES'S AND WAREHOUSEMENS' LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('25','LIA','LIABILITY','LCL','CARRIER LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('26','LIA','LIABILITY','LCG','COMMERCIAL/COMPREHENSIVE GENERAL LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('27','LIA','LIABILITY','LDO','DIRECTOR & OFFICER LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('28','LIA','LIABILITY','LEM','EMPLOYER'S_LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('29','LIA','LIABILITY','LFF','FREIGHT_FORWARDER_LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('30','LIA','LIABILITY','LBA','NEW BAILEES'S & WAREHOUSEMENS' LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('31','LIA','LIABILITY','LCA','NEW CARRIER LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('32','LIA','LIABILITY','LCC','NEW COMMERCIAL/COMPREHENSIVE GENERAL LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('33','LIA','LIABILITY','LDI','NEW DIRECTOR & OFFICER LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('34','LIA','LIABILITY','LEL','NEW EMPLOYER'S LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('35','LIA','LIABILITY','LFR','NEW FREIGHT FORWARDER'S LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('36','LIA','LIABILITY','LPE','NEW PREMISES LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('37','LIA','LIABILITY','LPR','NEW PRODUCTS LIABILITY','2023-11-14 11:47:29','2023-11-14 11:47:29');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('38','LIA','LIABILITY','LPU','NEW PUBLIC LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('39','LIA','LIABILITY','LTL','NEW TENANT'S LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('40','LIA','LIABILITY','LTH','NEW THIRD-PARTY LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('41','LIA','LIABILITY','LTR','NEW TRANSPORT OPERATOR'S LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('42','LIA','LIABILITY','LPM','PREMISES LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('43','LIA','LIABILITY','LPD','PRODUCT_LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('44','LIA','LIABILITY','LPC','PUBLIC LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('45','LIA','LIABILITY','LTN','TENANT'S LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('46','LIA','LIABILITY','LTP','THIRD_PARTY_LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('47','LIA','LIABILITY','LTO','TRANSPORT OPERATOR'S LIABILITY','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('48','MR','MARINE INSURANCE','MCI','CARGO INSURANCE','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('49','MR','MARINE INSURANCE','MIT','INLAND TRANSIT INSURANCE','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('50','MR','MARINE INSURANCE','MCG','MARINE CARGO','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('51','MR','MARINE INSURANCE','MHS','MARINE HULL INSURANCE(STEEL)','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('52','MR','MARINE INSURANCE','MHW','MARINE HULL INSURANCE(WOODEN)','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('53','MR','MARINE INSURANCE','MCR','NEW CARGO INSURANCE','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('54','MR','MARINE INSURANCE','MIL','NEW INLAND TRANSIT INSURANCE','2023-11-14 11:47:30','2023-11-14 11:47:30');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('55','MR','MARINE INSURANCE','MMC','NEW MARINE CARGO','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('56','MR','MARINE INSURANCE','MST','NEW MARINE HULL INSURANCE(STEEL)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('57','MR','MARINE INSURANCE','MHO','NEW MARINE HULL INSURANCE(WOODEN)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('58','MR','MARINE INSURANCE','MAI','NEW OVERSEA MARINE CARGO INSURANCE (AIR)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('59','MR','MARINE INSURANCE','MOC','NEW OVERSEA MARINE CARGO INSURANCE (OCEAN)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('60','MR','MARINE INSURANCE','MCA','OVERSEA MARINE CARGO INSURANCE (AIR)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('61','MR','MARINE INSURANCE','MCO','OVERSEA MARINE CARGO INSURANCE (OCEAN)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('62','MS','PERSONAL ACCIDENT INSURANCE','MPS','NEW PERSONAL ACCIDENT INSURANCE','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('63','MS','PERSONAL ACCIDENT INSURANCE','MPA','PERSONAL ACCIDENT INSURANCE','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('64','MT','MOTOR INSURANCE','MCC','COMPREHENSIVE COMMERCIAL CAR','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('65','MT','MOTOR INSURANCE','MUC','COMPREHENSIVE COMMERCIAL CAR (USD)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('66','MT','MOTOR INSURANCE','MFC','COMPREHENSIVE COMMERCIAL FLEET','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('67','MT','MOTOR INSURANCE','MCH','COMPREHENSIVE DUAL PURPOSE CAR','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('68','MT','MOTOR INSURANCE','MUH','COMPREHENSIVE DUAL PURPOSE CAR (USD)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('69','MT','MOTOR INSURANCE','MCP','COMPREHENSIVE PRIVATE CAR','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('70','MT','MOTOR INSURANCE','MUP','COMPREHENSIVE PRIVATE CAR (USD)','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('71','MT','MOTOR INSURANCE','MFP','COMPREHENSIVE PRIVATE FLEET','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('72','MT','MOTOR INSURANCE','MTC','MOTOR CYCLE','2023-11-14 11:47:31','2023-11-14 11:47:31');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('73','MT','MOTOR INSURANCE','MUB','MOTOR CYCLE(USD)','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('74','MT','MOTOR INSURANCE','MNC','NEW MOTOR INSURANCE _COMMERCIAL','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('75','MT','MOTOR INSURANCE','MNP','NEW MOTOR INSURANCE _PRIVATE','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('76','MT','MOTOR INSURANCE','MCU','NEW MOTOR INSURANCE_COMMERCIAL(USD)','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('77','MT','MOTOR INSURANCE','MNF','NEW MOTOR INSURANCE_FLEET','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('78','MT','MOTOR INSURANCE','MFU','NEW MOTOR INSURANCE_FLEET(USD)','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('79','MT','MOTOR INSURANCE','MPU','NEW MOTOR INSURANCE_PRIVATE (USD)','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('80','PTY','PROPERTY','PIA','INDUSTRIAL ALL RISKS','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('81','PTY','PROPERTY','PIR','NEW INDUSTRIAL ALL RISKS','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('82','PTY','PROPERTY','PAL','NEW PROPERTY ALL RISK','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('83','PTY','PROPERTY','PAR','PROPERTY ALL RISK','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('84','TI','TRAVEL INSURANCE','TSD','DOMESTIC TRAVEL INSURANCE(GO)','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('85','TI','TRAVEL INSURANCE','TEC','EXPRESS_COACH_TRAVEL_INSURANCE','2023-11-14 11:47:32','2023-11-14 11:47:32');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('86','TI','TRAVEL INSURANCE','TIT','INDIVIDUAL_TRAVEL_INSURANCE','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('87','TI','TRAVEL INSURANCE','TNG','NEW DOMESTIC TRAVEL INSURANCE(GO)','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('88','TI','TRAVEL INSURANCE','TNX','NEW EXPRESS COACH TRAVEL INSURANCE','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('89','TI','TRAVEL INSURANCE','TNI','NEW INDIVIDUAL TRAVEL INSURANCE','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('90','TI','TRAVEL INSURANCE','TNJ','NEW OVERSEA TRAVEL INSURANCE(JOY)','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('91','TI','TRAVEL INSURANCE','TNO','NEW TRAVEL TOUR INSURANCE','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('92','TI','TRAVEL INSURANCE','TNL','NEW TRAVEL_LOCAL_INDIVIDUAL','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('93','TI','TRAVEL INSURANCE','TNT','NEW TRAVEL_LOCAL_TRAVEL&TOUR','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('94','TI','TRAVEL INSURANCE','TNS','NEW TRAVEL_OVERSEAS_INDIVIDUAL','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('95','TI','TRAVEL INSURANCE','TNR','NEW TRAVEL_OVERSEAS_TRAVEL&TOUR','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('96','TI','TRAVEL INSURANCE','TNE','NEW TRAVEL_U100 MILES-EXPRESS','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('97','TI','TRAVEL INSURANCE','TND','NEW TRAVEL_U100 MILES-INDIVIDUAL','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('98','TI','TRAVEL INSURANCE','TNU','NEW TRAVEL_U100 MILES-TRAVEL&TOUR','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('99','TI','TRAVEL INSURANCE','TSO','OVERSEA TRAVEL INSURANCE(JOY)','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('100','TI','TRAVEL INSURANCE','TTT','TRAVEL TOUR INSURANCE','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('101','TI','TRAVEL INSURANCE','TLI','TRAVEL_LOCAL_INDIVIDUAL','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('102','TI','TRAVEL INSURANCE','TLT','TRAVEL_LOCAL_TRAVEL&TOUR','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('103','TI','TRAVEL INSURANCE','TOI','TRAVEL_OVERSEAS_INDIVIDUAL','2023-11-14 11:47:33','2023-11-14 11:47:33');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('104','TI','TRAVEL INSURANCE','TOT','TRAVEL_OVERSEAS_TRAVEL&TOUR','2023-11-14 11:47:34','2023-11-14 11:47:34');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('105','TI','TRAVEL INSURANCE','TUE','TRAVEL_U100 MILES_EXPRESS','2023-11-14 11:47:34','2023-11-14 11:47:34');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('106','TI','TRAVEL INSURANCE','TUI','TRAVEL_U100 MILES_INDIVIDUAL','2023-11-14 11:47:34','2023-11-14 11:47:34');

INSERT INTO product_code_lists (id, class_code, class_description, product_code, product_description, created_at, updated_at) VALUES ('107','TI','TRAVEL INSURANCE','TUT','TRAVEL_U100 MILES_TRAVEL&TOUR','2023-11-14 11:47:34','2023-11-14 11:47:34');


CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INDIVIDUAL',
  `thumbnail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(10) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO products (id, name, title, product_type, thumbnail, brief_description, sort, status, created_at, updated_at) VALUES ('40','Product 1 Upda','this is title','COMMERCIAL','/uploads/thumbnail/aya_sompo6538bba9e9ace.jpg','desc','2','1','2023-10-25 06:54:33','2023-11-30 15:18:31');

INSERT INTO products (id, name, title, product_type, thumbnail, brief_description, sort, status, created_at, updated_at) VALUES ('41','Test Product 1','ee','INDIVIDUAL','/uploads/thumbnail/aya_sompo655dad91f415a.jpg','Brief Description is Brief Description Brief Description is Brief Description','1','0','2023-11-22 13:58:18','2023-11-30 15:25:25');

INSERT INTO products (id, name, title, product_type, thumbnail, brief_description, sort, status, created_at, updated_at) VALUES ('42','Test Product 0232','tititeo asdfasd','COMMERCIAL','/uploads/thumbnail/aya_sompo656815c5efc86.jpg','Brief Descriptio is Brief Descriptio','3','1','2023-11-30 11:25:33','2023-11-30 11:25:33');


CREATE TABLE `properties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO properties (id, product_id, property_type_id, title, desc, created_at, updated_at) VALUES ('39','41','39','asdfa','asdfas','2023-11-30 11:30:57','2023-11-30 11:30:57');


CREATE TABLE `property_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO property_types (id, name, created_at, updated_at) VALUES ('39','Benefits Update','2023-10-24 05:32:16','2023-10-24 08:12:30');


CREATE TABLE `request_form_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('1','Name Chnage','2023-10-31 11:20:45','2023-10-31 11:20:45');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('2','Mailing Address Change','2023-11-01 03:58:35','2023-11-01 03:58:35');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('3','Add into Authorize Drivers List','2023-11-01 03:58:56','2023-11-01 03:58:56');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('4','Sum Insured Chnage','2023-11-01 03:59:07','2023-11-01 03:59:07');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('5','Vehicle Usage Change','2023-11-01 03:59:24','2023-11-01 03:59:24');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('6','Windscreen Value Change','2023-11-01 03:59:52','2023-11-01 03:59:52');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('7','Engine Power Chnage','2023-11-01 04:00:07','2023-11-01 04:00:07');

INSERT INTO request_form_types (id, type, created_at, updated_at) VALUES ('8','Vehicl Number Change','2023-11-01 04:00:29','2023-11-01 04:00:29');


CREATE TABLE `request_forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `casetypecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_enquirychannels` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_enquiryproducttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_enquirytypes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_accounthandlerlookup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effective_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_bank_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_vehicleno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_customercode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_policyno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_productcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_classcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_risksequenceno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_caseid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_inquirydatetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiry_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incidentid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayasompo_casenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('1','','12','','','','Name Change','reason','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654ae8c9a7047','2023-11-08 01:47:53','0','','','','2023-11-08 01:47:53','2023-11-08 01:47:53');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('2','','12','','','','Name Change','reason','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654b124e95c06','2023-11-08 04:45:02','0','','','','2023-11-08 04:45:02','2023-11-08 04:45:02');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('3','','12','','','','Name Change','reason','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654b13c90fe2f','2023-11-08 04:51:21','0','','','','2023-11-08 04:51:21','2023-11-08 04:51:21');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('4','','12','','','','Name Change','reason','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000026632','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654b1b0c0e77f','2023-11-08 05:22:20','0','','','','2023-11-08 05:22:20','2023-11-08 05:22:20');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('5','','12','','','','Name Change','testing 08/14/2023 14:06','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654b3a779e8b4','2023-11-08 07:36:23','0','','','','2023-11-08 07:36:26','2023-11-08 07:36:26');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('6','','12','','','','Name Change','testing 1 08/14/2023 14:10','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654b3b6464729','2023-11-08 07:40:20','0','','','','2023-11-08 07:40:24','2023-11-08 07:40:24');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('7','','13','','','','Name Change','testing 1 08/14/2023 14:10','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654b40579039b','2023-11-08 08:01:27','0','','','','2023-11-08 08:01:29','2023-11-08 08:01:29');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('8','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc27925972','2023-11-08 17:16:41','0','Endorsement','a5ab7f94-5a7e-ee11-8179-000d3a85e8c0','AYA-EQ-23000119','2023-11-08 17:16:51','2023-11-08 17:16:51');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('9','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc5158a5bb','2023-11-08 17:27:49','0','Endorsement','ff676323-5c7e-ee11-8179-000d3a85e8c0','AYA-EQ-23000120','2023-11-08 17:27:53','2023-11-08 17:27:53');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('10','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc56076ad9','2023-11-08 17:29:04','0','Endorsement','2417a34a-5c7e-ee11-8179-6045bd57c806','AYA-EQ-23000121','2023-11-08 17:29:07','2023-11-08 17:29:07');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('11','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc573c2a28','2023-11-08 17:29:23','0','Endorsement','3dbd885b-5c7e-ee11-8179-6045bd57c806','AYA-EQ-23000122','2023-11-08 17:29:26','2023-11-08 17:29:26');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('12','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc5e1dca9b','2023-11-08 17:31:13','0','Endorsement','8034aa97-5c7e-ee11-8179-6045bd57c806','AYA-EQ-23000123','2023-11-08 17:31:16','2023-11-08 17:31:16');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('13','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc6100e913','2023-11-08 17:32:00','0','Endorsement','7a4980b6-5c7e-ee11-8179-6045bd57c806','AYA-EQ-23000124','2023-11-08 17:32:02','2023-11-08 17:32:02');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('14','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bc9629901a','2023-11-08 17:46:10','0','Endorsement','86e1d6b2-5e7e-ee11-8179-000d3a85e8c0','AYA-EQ-23000125','2023-11-08 17:46:13','2023-11-08 17:46:13');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('15','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654bca09bf34f','2023-11-08 17:48:57','0','Endorsement','a22a4317-5f7e-ee11-8179-6045bd57c806','AYA-EQ-23000126','2023-11-08 17:48:59','2023-11-08 17:48:59');

INSERT INTO request_forms (id, casetypecode, ayasompo_enquirychannels, ayasompo_enquiryproducttype, ayasompo_enquirytypes, ayasompo_accounthandlerlookup, title, reason, effective_date, bank_account_number, bank_name, other_bank_name, other_bank_address, ayasompo_vehicleno, customerid_contact, ayasompo_customercode, ayasompo_policyno, ayasompo_productcode, ayasompo_classcode, ayasompo_risksequenceno, ayasompo_caseid, ayasompo_inquirydatetime, app_customer_id, inquiry_type, incidentid, ayasompo_casenumber, created_at, updated_at) VALUES ('16','','13','','','','Name Change','Hell0 this is test test','2023/11/03','7912********','AYA Bank','other_bank_name','other_bank_address','','','C000051097','AYA/YGN/FIR/23000009','FIR','FI','00YGN2300463496','654deeda6c5a7','2023-11-10 15:20:34','0','Endorsement','dbe73333-a67f-ee11-8179-002248ecf212','AYA-EQ-23000339','2023-11-10 15:20:37','2023-11-10 15:20:37');


CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('3','Spidey Shine','spideyshine@gmail.com','','$2y$10$aOVmKS18PjeaZCDLUg6DmeKLP2RjQIW7oTHg8n0CT95THVbCMD3Uy','','2023-10-12 09:42:13','2023-10-12 09:42:13');

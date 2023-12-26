

CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO customers (id, name, phone, email, password, created_at, updated_at) VALUES ('1','Shine Shine','','spidey@gmail.com','$2y$10$Oz62NjiVSFRPmXvMPyMfAeuw/PEq9.26Gf5JEzF4bRoAZ71CJxPgy','2023-09-25 07:39:23','2023-09-25 07:39:23');

INSERT INTO customers (id, name, phone, email, password, created_at, updated_at) VALUES ('2','Shine Shine','','spidey1@gmail.com','$2y$10$DyWXuOr8V/THjWrGYPUekuBso8gIZ.T1yqXA1CSjZBHjU1KYfWLle','2023-09-25 07:41:28','2023-09-25 07:41:28');

INSERT INTO customers (id, name, phone, email, password, created_at, updated_at) VALUES ('3','Shine Shine','','spidey2@gmail.com','$2y$10$3S3bn3P4XzudOGFzy/9Uz.Y0vZ2zLy.AlpeXAPWZrP3O1E1M5f7oS','2023-09-25 09:45:18','2023-09-25 09:45:18');

INSERT INTO customers (id, name, phone, email, password, created_at, updated_at) VALUES ('4','Shine Shine','','spidey3@gmail.com','$2y$10$JW6jFu0hOcKB88mskYfei.uMQ7q2cx7NMvJJuYETygMzFtaI2LlQG','2023-09-25 09:45:44','2023-09-25 09:45:44');

INSERT INTO customers (id, name, phone, email, password, created_at, updated_at) VALUES ('5','Shine Shine','','spidey4@gmail.com','$2y$10$4HyAfkGe3RmW4D2bfaQlb.W0skQ422DSsL9JWqEknA/aoLe9Arxaq','2023-09-25 09:50:21','2023-09-25 09:50:21');


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



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (id, migration, batch) VALUES ('10','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('11','2014_10_12_100000_create_password_resets_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('12','2016_06_01_000001_create_oauth_auth_codes_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('13','2016_06_01_000002_create_oauth_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('14','2016_06_01_000003_create_oauth_refresh_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('15','2016_06_01_000004_create_oauth_clients_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('16','2016_06_01_000005_create_oauth_personal_access_clients_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('17','2019_08_19_000000_create_failed_jobs_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('18','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (id, migration, batch) VALUES ('19','2023_09_25_072527_create_customers_table','2');


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


INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('0dcc3c22418cd0c371476cb8848c0416853c8ceba2b5d507bd1f28b6c78d1c19a518f1233a173862','5','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 09:50:21','2023-09-25 09:50:21','2024-09-25 09:50:21');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('39c0b9fa2e514856210062c750036539e7c9720e3da79dbc4cd07a6e8ce4c7ee88ec8936b737dfe5','3','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 09:45:18','2023-09-25 09:45:18','2024-09-25 09:45:18');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('76369f33c9d7329dfd0a1b2546b42b4f7820dc50b6811df5ec89a79682473bd020edc7885a68b2be','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 07:50:24','2023-09-25 07:50:24','2024-09-25 07:50:24');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('809856ddcba350807f9c6db5d7d1f9131996cf973d13fbf036ea36b223912a60690da4205747364e','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-27 17:36:14','2023-09-27 17:36:14','2024-09-27 17:36:14');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('8a39a48970e902b86a4c91ff2a4c2a7f4b0085ca27bbd55421bfb1de77400793479c788c550d264b','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 09:32:11','2023-09-25 09:32:11','2024-09-25 09:32:11');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('9cf0d683bf8b5e2dd4c6262ad6b7d478836c6597ed096ba736f789b04821200bd9d73603e62f9a39','1','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 07:39:23','2023-09-25 07:39:23','2024-09-25 07:39:23');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('aa35bb321ad2f4ca7b2c666da1568babc175ab11b0a2b28e9d75db59db10ade928aaf1a7a733641b','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 07:41:28','2023-09-25 07:41:28','2024-09-25 07:41:28');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('bd152cb83cb8be0fd5d68f53a18f6b9d64140c0117f9c23baf8f101a31e54b65d486fd870c9beb4f','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-27 16:19:29','2023-09-27 16:19:29','2024-09-27 16:19:29');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('d09651d686635f1f063fa2db8b85e40a3a0074788d406885fc18d803fe3ce27ec3a617ba7ff47093','4','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 09:45:44','2023-09-25 09:45:44','2024-09-25 09:45:44');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('daa57457a77b135e26440a9b564ebc192807f3ca2c843fb2e26bb61975cba30826dcb85e80170e61','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 07:50:34','2023-09-25 07:50:34','2024-09-25 07:50:34');

INSERT INTO oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) VALUES ('dcc470789739b2b6b7ce3dad910e8cda27a6b5863570f2f48a055111c7f110ed1e7c9d7c45aec37b','2','9a375c49-e6df-4262-b8cd-12c08fc7d697','CustomerToken','[]','0','2023-09-25 07:46:05','2023-09-25 07:46:05','2024-09-25 07:46:05');


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


INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a375c49-e6df-4262-b8cd-12c08fc7d697','','aya-smompo Personal Access Client','AIdreQeVuAauNxvnumWdUDOsTMVe2USfqGtMTz6f','','http://localhost','1','0','0','2023-09-25 07:07:02','2023-09-25 07:07:02');

INSERT INTO oauth_clients (id, user_id, name, secret, provider, redirect, personal_access_client, password_client, revoked, created_at, updated_at) VALUES ('9a375c4a-233a-4a41-8c86-edc5200ca3ba','','aya-smompo Password Grant Client','GgOJxFOQRtc3hu7sOaEENisYHGg6MXcghNh0Mgp0','users','http://localhost','0','1','0','2023-09-25 07:07:02','2023-09-25 07:07:02');


CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO oauth_personal_access_clients (id, client_id, created_at, updated_at) VALUES ('1','9a375c49-e6df-4262-b8cd-12c08fc7d697','2023-09-25 07:07:02','2023-09-25 07:07:02');


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('1','Spidey Shine','spideshine@gmail.com','','$2y$10$YF5/wFqr8Rl6Kk1PkQu8He4aVtq.ErqJm6PNNFZnO0hUmvZDkyjJm','','2023-09-28 03:20:39','2023-09-28 03:20:39');

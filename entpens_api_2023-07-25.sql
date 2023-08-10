# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.33)
# Database: entpens_api
# Generation Time: 2023-07-25 04:15:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table achivements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `achivements`;

CREATE TABLE `achivements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `recruitment_id` bigint unsigned NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `achivement` enum('1st winner','2nd winner','3rd winner','finalist') COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('regional','national','international') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achivements_recruitment_id_foreign` (`recruitment_id`),
  CONSTRAINT `achivements_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `achivements` WRITE;
/*!40000 ALTER TABLE `achivements` DISABLE KEYS */;

INSERT INTO `achivements` (`id`, `recruitment_id`, `date`, `title`, `achivement`, `level`, `created_at`, `updated_at`)
VALUES
	(1,1,'010720','LKS','1st winner','regional','2023-07-25 04:02:19','2023-07-25 04:02:19');

/*!40000 ALTER TABLE `achivements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table departments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` enum('D3','D4') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table divisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `divisions`;

CREATE TABLE `divisions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table experiences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `experiences`;

CREATE TABLE `experiences` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `recruitment_id` bigint unsigned NOT NULL,
  `start_date` text COLLATE utf8_unicode_ci NOT NULL,
  `end_date` text COLLATE utf8_unicode_ci NOT NULL,
  `organization_name` text COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `experiences_recruitment_id_foreign` (`recruitment_id`),
  CONSTRAINT `experiences_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;

INSERT INTO `experiences` (`id`, `recruitment_id`, `start_date`, `end_date`, `organization_name`, `position`, `created_at`, `updated_at`)
VALUES
	(1,1,'010720','301120','Surabaya Dev','Dev Team','2023-07-25 04:02:19','2023-07-25 04:02:19');

/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table finances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `finances`;

CREATE TABLE `finances` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` bigint NOT NULL,
  `type` enum('income','expense') COLLATE utf8_unicode_ci NOT NULL,
  `balance` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table generations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `generations`;

CREATE TABLE `generations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int NOT NULL,
  `status_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;

INSERT INTO `logs` (`id`, `ip`, `method`, `uri`, `user_agent`, `duration`, `status_code`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,'127.0.0.1','POST','api/auth/register','PostmanRuntime/7.32.3',0,'201',NULL,'2023-07-25 04:01:48','2023-07-25 04:01:48'),
	(2,'127.0.0.1','POST','api/auth/login','PostmanRuntime/7.32.3',0,'200',NULL,'2023-07-25 04:01:57','2023-07-25 04:01:57'),
	(3,'127.0.0.1','POST','api/recruitment','PostmanRuntime/7.32.3',0,'200',NULL,'2023-07-25 04:02:19','2023-07-25 04:02:19');

/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mailings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mailings`;

CREATE TABLE `mailings` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `sender_position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_id_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `generation_id` bigint unsigned NOT NULL,
  `department_id` bigint unsigned NOT NULL,
  `division_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nrp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_generation_id_foreign` (`generation_id`),
  KEY `members_department_id_foreign` (`department_id`),
  KEY `members_division_id_foreign` (`division_id`),
  CONSTRAINT `members_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `members_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  CONSTRAINT `members_generation_id_foreign` FOREIGN KEY (`generation_id`) REFERENCES `generations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
	(4,'2018_05_02_142200_create_logs_table',1),
	(5,'2019_08_19_000000_create_failed_jobs_table',1),
	(6,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(7,'2022_10_20_024037_create_departments_table',1),
	(8,'2022_10_20_024258_create_generations_table',1),
	(9,'2022_10_20_024300_create_divisions_table',1),
	(10,'2022_10_20_024319_create_members_table',1),
	(11,'2022_11_12_114320_create_finances_table',1),
	(12,'2022_11_14_135832_create_mailings_table',1),
	(13,'2023_07_11_080326_create_recruitments_table',1),
	(14,'2023_07_11_090216_create_experiences_table',1),
	(15,'2023_07_11_090312_create_achivements_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Models\\User',1,'myAppToken','8de630d21660061b7940c21b96c021b5e91c324b6a2af57a2eaf6a2f3e4049f2','[\"*\"]',NULL,NULL,'2023-07-25 04:01:48','2023-07-25 04:01:48'),
	(2,'App\\Models\\User',1,'myAppToken','319dd556789ed1fdac20065144fa06a6c443c0d4be14da8582ce572ed2768faa','[\"*\"]','2023-07-25 04:02:19',NULL,'2023-07-25 04:01:57','2023-07-25 04:02:19');

/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table recruitments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recruitments`;

CREATE TABLE `recruitments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strata` enum('d3','S1 terapan') COLLATE utf8_unicode_ci NOT NULL,
  `prodi` text COLLATE utf8_unicode_ci NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boarding_address` text COLLATE utf8_unicode_ci NOT NULL,
  `home_address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mbti` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motto` text COLLATE utf8_unicode_ci NOT NULL,
  `interest` text COLLATE utf8_unicode_ci NOT NULL,
  `division` enum('Reporter','Videographer','Graphic Designer','Fotografer','Webmaster') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recruitments_user_id_foreign` (`user_id`),
  CONSTRAINT `recruitments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `recruitments` WRITE;
/*!40000 ALTER TABLE `recruitments` DISABLE KEYS */;

INSERT INTO `recruitments` (`id`, `user_id`, `name`, `strata`, `prodi`, `place_of_birth`, `date_of_birth`, `gender`, `religion`, `boarding_address`, `home_address`, `email`, `phone`, `mbti`, `motto`, `interest`, `division`, `created_at`, `updated_at`)
VALUES
	(1,1,'yudhaganteng','d3','teknik telekomunikasi','mojokerto','20082002','male','islam','surabaya','sidoarjo','yudha@gmail.com','085848250548','estj','apa yak??','gatau','Webmaster','2023-07-25 04:02:19','2023-07-25 04:02:19');

/*!40000 ALTER TABLE `recruitments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Kurniawan Try','ktyoedha@gmail.com',NULL,'$2y$10$cIcqk9aUGtArLopQ79IXWemnegf41KImq8BLgrUE/FwixQhWBk/qy',NULL,NULL,NULL,'2023-07-25 04:01:48','2023-07-25 04:01:48');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

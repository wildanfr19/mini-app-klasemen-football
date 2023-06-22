-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_klasemen
CREATE DATABASE IF NOT EXISTS `db_klasemen` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_klasemen`;

-- Dumping structure for table db_klasemen.clubs
CREATE TABLE IF NOT EXISTS `clubs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clubs_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_klasemen.clubs: ~3 rows (approximately)
DELETE FROM `clubs`;
INSERT INTO `clubs` (`id`, `name`, `city`, `created_at`, `updated_at`) VALUES
	(1, 'Persib', 'Bandung', '2023-06-22 01:14:38', '2023-06-22 01:14:38'),
	(2, 'Arema', 'Malang', '2023-06-22 01:15:02', '2023-06-22 01:15:02'),
	(3, 'Persija', 'Jakarta', '2023-06-22 01:15:08', '2023-06-22 01:15:08'),
	(4, 'PS TNI', 'Sulawesi', '2023-06-22 05:56:42', '2023-06-22 05:56:42'),
	(5, 'Persijap', 'Jepara', '2023-06-22 05:56:57', '2023-06-22 05:56:57');

-- Dumping structure for table db_klasemen.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_klasemen.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table db_klasemen.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_klasemen.migrations: ~6 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2023_06_22_013443_create_klubs_table', 1),
	(5, '2023_06_22_080403_create_clubs_table', 2),
	(6, '2023_06_22_081115_create_scores_table', 3);

-- Dumping structure for table db_klasemen.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_klasemen.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table db_klasemen.scores
CREATE TABLE IF NOT EXISTS `scores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `home_club_id` bigint(20) unsigned NOT NULL,
  `away_club_id` bigint(20) unsigned NOT NULL,
  `home_score` int(10) unsigned NOT NULL,
  `away_score` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_home_club_id_foreign` (`home_club_id`),
  KEY `scores_away_club_id_foreign` (`away_club_id`),
  CONSTRAINT `scores_away_club_id_foreign` FOREIGN KEY (`away_club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `scores_home_club_id_foreign` FOREIGN KEY (`home_club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_klasemen.scores: ~3 rows (approximately)
DELETE FROM `scores`;
INSERT INTO `scores` (`id`, `home_club_id`, `away_club_id`, `home_score`, `away_score`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 3, 1, '2023-06-22 01:22:14', '2023-06-22 01:22:14'),
	(2, 1, 3, 4, 1, '2023-06-22 01:23:11', '2023-06-22 01:23:11'),
	(3, 2, 3, 4, 2, '2023-06-22 01:23:37', '2023-06-22 01:23:37'),
	(4, 1, 2, 3, 1, '2023-06-22 05:57:26', '2023-06-22 05:57:26'),
	(5, 3, 4, 3, 2, '2023-06-22 05:57:26', '2023-06-22 05:57:26');

-- Dumping structure for table db_klasemen.users
CREATE TABLE IF NOT EXISTS `users` (
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

-- Dumping data for table db_klasemen.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Wildan', 'wildan@gmail.com', NULL, '$2y$10$yOcYn6b/5iaHV96EFf64tenO1IAU73CsKV5iMVbd6703MdajOd2Tq', NULL, '2023-06-22 01:13:22', '2023-06-22 01:13:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table test_digital_digdaya.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.cache: ~0 rows (approximately)

-- Dumping structure for table test_digital_digdaya.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.cache_locks: ~0 rows (approximately)

-- Dumping structure for table test_digital_digdaya.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.customers: ~10 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
	(1, 'Edythe Schiller', 'theresia.rau@boehm.com', '262.245.0481', '3990 Miller Ranch Suite 242\nMooreville, OH 39278', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(2, 'Doris Friesen', 'stephan02@metz.com', '(680) 632-9578', '531 Edgardo Unions\nToyburgh, CO 18538', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(3, 'Zane Lehner', 'dayana.crist@kautzer.biz', '720.430.3016', '58021 Earline Park Suite 995\nKelsietown, UT 75059', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(4, 'Dr. Jarrod Goldner', 'alind@schultz.org', '+14437604340', '867 Bryana Drive\nPablofurt, AR 02391-2824', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(5, 'Carolyne Lindgren Jr.', 'schneider.marquis@hotmail.com', '(947) 878-0015', '6090 Reilly Loop Apt. 016\nWest Berniecemouth, ND 15016-7664', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(6, 'Ms. Rahsaan Ernser Jr.', 'candace.prohaska@shanahan.biz', '458.908.4188', '86089 Elizabeth Parkways Suite 007\nHallieton, CO 04635', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(7, 'Winnifred Bogisich MD', 'mariah.kunze@gmail.com', '+1-216-318-0644', '81345 Littel Cove Apt. 367\nMedhurstside, MD 40978-7069', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(8, 'Hertha Howe MD', 'marks.kevon@lubowitz.com', '+1-908-308-0751', '244 Rodolfo Grove\nNorth Jenifer, KS 23000-9349', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(9, 'Mr. Garrett Little II', 'audie14@considine.com', '534-438-0122', '71311 Rosendo River Apt. 482\nPort Kaceyburgh, MI 25553', '2024-08-29 06:32:12', '2024-08-29 06:32:12'),
	(10, 'Harmon Reynolds', 'parmstrong@veum.net', '+1-419-998-3932', '79970 Stiedemann Point\nPfannerstillland, WA 57160', '2024-08-29 06:32:12', '2024-08-29 06:32:12');

-- Dumping structure for table test_digital_digdaya.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table test_digital_digdaya.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.jobs: ~0 rows (approximately)

-- Dumping structure for table test_digital_digdaya.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.job_batches: ~0 rows (approximately)

-- Dumping structure for table test_digital_digdaya.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_08_29_101433_create_customers_table', 1),
	(5, '2024_08_29_131200_create_products_table', 1),
	(6, '2024_08_30_013913_create_orders_table', 2),
	(7, '2024_08_30_013917_create_order_items_table', 2);

-- Dumping structure for table test_digital_digdaya.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned DEFAULT NULL,
  `order_date` date NOT NULL,
  `total_amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `total_amount`, `created_at`, `updated_at`) VALUES
	(4, NULL, '2024-08-30', 100000, '2024-08-29 19:06:00', '2024-08-29 19:06:00'),
	(5, NULL, '2024-08-30', 182000, '2024-08-29 20:26:21', '2024-08-29 20:26:21');

-- Dumping structure for table test_digital_digdaya.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.order_items: ~2 rows (approximately)
INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `subtotal`, `created_at`, `updated_at`) VALUES
	(7, 4, 1, 1, 60000, 60000, '2024-08-29 19:06:00', '2024-08-29 19:06:00'),
	(8, 4, 2, 4, 10000, 40000, '2024-08-29 19:06:00', '2024-08-29 19:06:00'),
	(9, 5, 5, 5, 19000, 95000, '2024-08-29 20:26:21', '2024-08-29 20:26:21'),
	(10, 5, 4, 3, 29000, 87000, '2024-08-29 20:26:21', '2024-08-29 20:26:21');

-- Dumping structure for table test_digital_digdaya.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table test_digital_digdaya.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.products: ~5 rows (approximately)
INSERT INTO `products` (`id`, `name`, `category`, `desc`, `price`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 'Meja Kayu', 'Furniture', 'Molestiae assumenda ea dolorem neque ratione veritatis.', 60000, 3, '2024-08-29 06:32:09', '2024-08-29 19:06:00'),
	(2, 'Buku Tulis', 'Alat Tulis', 'Dolorem fugiat qui et.', 10000, 1, '2024-08-29 06:32:09', '2024-08-29 19:06:00'),
	(3, 'Kotak Pensil', 'Alat Tulis', 'Cum vitae aut et.', 22000, 6, '2024-08-29 06:32:09', '2024-08-29 17:21:43'),
	(4, 'Kursi Plastik', 'Furniture', 'Autem dolores id alias maxime quam amet.', 29000, 6, '2024-08-29 06:32:09', '2024-08-29 20:26:21'),
	(5, 'Amplop Coklat', 'Alat Tulis', 'Hic est fugit est.', 19000, 3, '2024-08-29 06:32:09', '2024-08-29 20:26:21');

-- Dumping structure for table test_digital_digdaya.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('TOU9PuRdRppJ2rMBsuuyDox9bLzBSmOOjKzNHUCK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUVpqR3doRk9LR2dqSlN0eVU4YU11QnJKRDl6bGVKQmZrYXdCeFhxMSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1724988400);

-- Dumping structure for table test_digital_digdaya.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_digital_digdaya.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

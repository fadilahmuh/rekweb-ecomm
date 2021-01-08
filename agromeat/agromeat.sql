-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for agromeat
CREATE DATABASE IF NOT EXISTS `agromeat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `agromeat`;

-- Dumping structure for table agromeat.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table agromeat.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `alamat`, `email`, `no_hp`) VALUES
	(1, 'Ivan Pakpahan', 'ivan', 'ivan', 'Bengkulu', 'ivan@yahoo.co', '085268018218');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_activation_attempts
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_activation_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_groups
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_groups_permissions
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_groups_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_groups_users
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_groups_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_logins
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_logins: ~24 rows (approximately)
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
	(1, '::1', 'ivan', NULL, '2020-12-28 07:46:15', 0),
	(2, '::1', 'ivan', NULL, '2020-12-28 08:45:10', 0),
	(3, '::1', 'ivan', NULL, '2020-12-28 08:49:00', 0),
	(4, '::1', 'ivanpakpahanchrst@gmail.com', 3, '2020-12-28 08:59:28', 1),
	(5, '::1', 'agroadmin@gmail.com', 1, '2020-12-28 09:03:53', 1),
	(6, '::1', 'agroadmin@gmail.com', 1, '2020-12-29 01:32:21', 1),
	(7, '::1', 'agroadmin@gmail.com', 1, '2020-12-29 01:40:24', 1),
	(8, '::1', 'ivan@itenas.com', 6, '2020-12-29 01:59:05', 1),
	(9, '::1', 'ivan@itenas.com', 3, '2020-12-29 02:00:59', 1),
	(10, '::1', 'fadil@yahoo.com', 2, '2020-12-29 02:16:09', 1),
	(11, '::1', 'ivan@itenas.com', 3, '2020-12-29 02:19:46', 1),
	(12, '::1', 'ivan@itenas.com', 3, '2020-12-29 07:56:52', 1),
	(13, '::1', 'ivan@itenas.com', 3, '2020-12-29 18:34:49', 1),
	(14, '::1', 'ivan@itenas.com', 3, '2020-12-30 03:19:16', 1),
	(15, '::1', 'ivan@itenas.com', 3, '2020-12-30 19:18:31', 1),
	(16, '::1', 'admin', NULL, '2021-01-01 06:42:50', 0),
	(17, '::1', 'admin', NULL, '2021-01-01 06:42:53', 0),
	(18, '::1', 'fadil@yahoo.com', 2, '2021-01-01 06:43:00', 1),
	(19, '::1', 'fadil@yahoo.com', 2, '2021-01-01 06:59:58', 1),
	(20, '::1', 'fadil@yahoo.com', 2, '2021-01-01 21:33:59', 1),
	(21, '::1', 'fadil@yahoo.com', 2, '2021-01-04 23:46:32', 1),
	(22, '::1', 'fadil@yahoo.com', 2, '2021-01-05 01:37:20', 1),
	(23, '::1', 'fadil@yahoo.com', 2, '2021-01-07 08:08:01', 1),
	(24, '::1', 'fadil@yahoo.com', 2, '2021-01-07 14:02:03', 1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_permissions
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_permissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Site Administrator'),
	(2, 'user', 'Regular User Site');
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_reset_attempts
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_reset_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;

-- Dumping structure for table agromeat.auth_users_permissions
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.auth_users_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;

-- Dumping structure for table agromeat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1609161891, 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table agromeat.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `no_pemesan` char(20) DEFAULT NULL,
  `email_pemesan` varchar(50) NOT NULL,
  `alamat_order` varchar(255) DEFAULT NULL,
  `maps` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table agromeat.order: ~0 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table agromeat.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table agromeat.order_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;

-- Dumping structure for table agromeat.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `satuan` char(10) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL,
  `Lainnya` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table agromeat.produk: ~7 rows (approximately)
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`id`, `nama_produk`, `slug`, `Department`, `Stok`, `harga`, `satuan`, `gambar`, `desc`, `fungsi`, `Lainnya`, `created_at`, `updated_at`) VALUES
	(1, 'Sirloin', 'sirloin', 'Daging Domba', 10, 158000, 'kg', 'sirloin.jpg', 'Sirloin (Has Luar) adalah daging yang di ambil dari punggung bagian sisi atas.', 'BBQ | Steak | Sate | Teriyaki | Sukiyaki | Lada Hitam', '', NULL, '2020-12-30 20:57:51'),
	(2, 'Cube Roll', 'cube-roll', 'Daging Sapi', 1, 134000, 'kg', 'cuberoll.jpg', 'Cube Rolll adalah daging yang di ambil dari  punggung bagian atas sebelah depan  (diatas rusuk).', 'BBQ | Sate | Steak | Lada Hitam', '', NULL, NULL),
	(4, 'Blade / Paha Depan', 'blade-paha-depan', 'Daging Sapi', 1, 135000, 'kg', 'blade.jpg', 'Untuk memasak rendang, gepuk, atau ditumis', '', NULL, '2020-12-30 08:03:26', '2020-12-30 08:03:26'),
	(5, 'Lamusir', 'lamusir', 'Daging Domba', 1, 137000, 'kg', 'lamusir.jpg', 'Daging yang berasal dari bagian forequarter sapi.', 'Sate | Sop | Semur | Rawon', '', '2020-12-30 08:22:35', '2020-12-30 10:57:32'),
	(11, 'Oxtail Reguler', 'oxtail-reguler', 'Daging Domba', 1, 99000, 'kg', 'ox-reg_1.jpg', 'Untuk masakan sop buntut bakar atau goreng maupun bakar. Bisa untuk rawon buntut', '', '', '2020-12-30 22:35:44', '2020-12-30 23:02:20'),
	(12, 'Cincang Standar', 'cincang-standar', 'Daging Sapi', 1, 115000, 'kg', 'default.jpg', 'Untuk dimasak saus spaghetti, patty burger, atau meatball.', '', '', '2020-12-30 22:39:51', '2020-12-30 22:39:51'),
	(13, 'Tenderloin / Has Dalam', 'tenderloin-has-dalam', 'Daging Sapi', 9, 174000, 'kg', 'fix-tenderloin-2-w.jpg', 'Tenderloin (Has Dalam) adalah daging yang di ambil dari pinggang bagian sisi dalam', 'Barbeque | Sate | Daging Panggang', '', '2021-01-07 16:29:49', '2021-01-07 16:29:49');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table agromeat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `pas_foto` varchar(50) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table agromeat.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `nama`, `pas_foto`, `alamat`, `no_hp`) VALUES
	(1, 'agroadmin@gmail.com', 'adminsatu', '$2y$10$dui57d9JYvOoiMIJuouOKueal9GmnGjF19upPaghMl.g7oHqsyZke', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-28 08:53:21', '2020-12-28 08:53:21', NULL, 'Rizal Kusuma Bangsa', 'profil1.png\r\n', NULL, '02187727122'),
	(2, 'fadil@yahoo.com', 'fadilitenas', '$2y$10$.hXyl/c8CuZu1RZxEHJAiuxmJIxNjAFij5yMD.Uiuh4HDmat3EqnO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-29 01:58:26', '2020-12-29 01:58:26', NULL, 'Fannie Muhammad Fadilah Sani ', 'profil1.png', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9386658792328!2d107.63400411449965!3d-6.897939469419948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7bb26b63b69%3A0x9ed5cea73b538ee0!2sInstitut%20Teknologi%20Nasional!5e0!3m2!1sid!2sid!4v1609394382253!5m2!1sid!2sid" width="350" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>', '082381164193'),
	(3, 'ivan@itenas.com', 'ivanitenas', '$2y$10$yKZFG.eyEJPqSM9tSkKAheND/7LbANks7cD95Xj5UyFXoS2CS9Wom', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-29 01:58:53', '2020-12-29 01:58:53', NULL, 'Ivan Pakpahan', 'profil1.png', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9386658792328!2d107.63400411449965!3d-6.897939469419948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7bb26b63b69%3A0x9ed5cea73b538ee0!2sInstitut%20Teknologi%20Nasional!5e0!3m2!1sid!2sid!4v1609394382253!5m2!1sid!2sid" width="350" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>', '082381164193');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

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


-- Dumping database structure for siperkebunan
DROP DATABASE IF EXISTS `siperkebunan`;
CREATE DATABASE IF NOT EXISTS `siperkebunan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `siperkebunan`;

-- Dumping structure for table siperkebunan.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(22, '2021-05-20-124016', 'App\\Database\\Migrations\\Users', 'default', 'App', 1738898642, 1),
	(23, '2021-05-20-124435', 'App\\Database\\Migrations\\Session', 'default', 'App', 1738898642, 1),
	(24, '2021-05-20-125608', 'App\\Database\\Migrations\\UserRole', 'default', 'App', 1738898642, 1),
	(25, '2021-05-20-125818', 'App\\Database\\Migrations\\UserAccess', 'default', 'App', 1738898642, 1),
	(26, '2021-05-20-130307', 'App\\Database\\Migrations\\UserMenu', 'default', 'App', 1738898642, 1),
	(27, '2021-05-20-130307', 'App\\Database\\Migrations\\UserSubmenu', 'default', 'App', 1738898642, 1),
	(28, '2021-05-25-102709', 'App\\Database\\Migrations\\UserMenuCategory', 'default', 'App', 1738898642, 1),
	(29, '2025-02-04-080835', 'App\\Database\\Migrations\\Tree', 'default', 'App', 1738898683, 2),
	(30, '2025-02-04-080836', 'App\\Database\\Migrations\\Production', 'default', 'App', 1738898897, 3);

-- Dumping structure for table siperkebunan.production
DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_produksi` varchar(255) NOT NULL,
  `tanggal_panen` date NOT NULL,
  `id_pohon` varchar(255) NOT NULL,
  `jumlah_buah` int NOT NULL,
  `buah_matang` int NOT NULL,
  `jumlah_bunga_dompet` int NOT NULL,
  `jumlah_bunga_jantan` int NOT NULL,
  `jumlah_bunga_betina` int NOT NULL,
  `jumlah_janjang_panen` int NOT NULL,
  `berat_janjang_panen` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_produksi` (`id_produksi`),
  KEY `fk_production_tree` (`id_pohon`),
  CONSTRAINT `fk_production_tree` FOREIGN KEY (`id_pohon`) REFERENCES `tree` (`id_pohon`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.production: ~20 rows (approximately)
DELETE FROM `production`;
INSERT INTO `production` (`id`, `id_produksi`, `tanggal_panen`, `id_pohon`, `jumlah_buah`, `buah_matang`, `jumlah_bunga_dompet`, `jumlah_bunga_jantan`, `jumlah_bunga_betina`, `jumlah_janjang_panen`, `berat_janjang_panen`, `created_at`, `updated_at`) VALUES
	(7, 'PRD001', '2024-01-15', 'P001', 150, 120, 30, 40, 50, 10, 100, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(8, 'PRD002', '2024-02-10', 'P002', 180, 140, 35, 45, 55, 12, 110, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(9, 'PRD003', '2024-02-25', 'P003', 200, 160, 40, 50, 60, 15, 120, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(10, 'PRD004', '2024-03-05', 'P001', 170, 130, 32, 42, 52, 11, 105, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(11, 'PRD005', '2024-03-20', 'P002', 190, 150, 38, 48, 58, 14, 115, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(12, 'PRD006', '2024-04-10', 'P003', 210, 170, 42, 52, 62, 16, 125, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(13, 'PRD007', '2024-04-25', 'P001', 160, 125, 33, 43, 53, 10, 98, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(14, 'PRD008', '2024-05-15', 'P002', 175, 135, 34, 44, 54, 13, 108, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(15, 'PRD009', '2024-05-30', 'P003', 195, 155, 39, 49, 59, 14, 118, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(16, 'PRD010', '2024-06-10', 'P001', 145, 115, 29, 39, 49, 9, 95, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(17, 'PRD011', '2024-06-25', 'P002', 185, 145, 36, 46, 56, 12, 112, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(18, 'PRD012', '2024-07-05', 'P003', 205, 165, 41, 51, 61, 15, 123, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(19, 'PRD013', '2024-07-20', 'P001', 155, 125, 31, 41, 51, 11, 102, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(20, 'PRD014', '2024-08-10', 'P002', 170, 140, 37, 47, 57, 13, 110, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(21, 'PRD015', '2024-08-25', 'P003', 220, 180, 43, 53, 63, 17, 130, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(22, 'PRD016', '2024-09-05', 'P001', 175, 135, 34, 44, 54, 12, 107, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(23, 'PRD017', '2024-09-20', 'P002', 190, 150, 38, 48, 58, 14, 115, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(24, 'PRD018', '2024-10-10', 'P003', 200, 160, 40, 50, 60, 15, 120, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(25, 'PRD019', '2024-10-25', 'P001', 165, 130, 32, 42, 52, 11, 105, '2025-02-07 11:57:17', '2025-02-07 11:57:17'),
	(26, 'PRD020', '2024-11-05', 'P002', 180, 145, 36, 46, 56, 13, 113, '2025-02-07 11:57:17', '2025-02-07 11:57:17');

-- Dumping structure for table siperkebunan.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.sessions: ~2 rows (approximately)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('ci_session:hksk1l298tjoto2u0mhrto80749jpmm1', '127.0.0.1', '2025-02-07 07:02:19', _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313733383931313733363b5f63695f70726576696f75735f75726c7c733a33323a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f223b),
	('ci_session:8e6l7jqnsj8li8t1g01rjgqqivg4kalm', '::1', '2025-02-07 07:15:56', _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313733383931313738343b5f63695f70726576696f75735f75726c7c733a33363a22687474703a2f2f6c6f63616c686f73743a383038302f696e6465782e7068702f686f6d65223b757365726e616d657c733a31363a2264776979616e40676d61696c2e636f6d223b726f6c657c733a313a2231223b69734c6f67676564496e7c623a313b);

-- Dumping structure for table siperkebunan.tree
DROP TABLE IF EXISTS `tree`;
CREATE TABLE IF NOT EXISTS `tree` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_pohon` varchar(255) NOT NULL,
  `tahun_tanam` date NOT NULL,
  `jenis_bibit` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pohon` (`id_pohon`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.tree: ~3 rows (approximately)
DELETE FROM `tree`;
INSERT INTO `tree` (`id`, `id_pohon`, `tahun_tanam`, `jenis_bibit`, `created_at`, `updated_at`) VALUES
	(1, 'P001', '2025-02-07', 'Bibit Unggul', '2025-02-07 11:50:49', '2025-02-07 11:50:49'),
	(2, 'P002', '2025-02-07', 'Bibit Lokal', '2025-02-07 11:50:49', '2025-02-07 11:50:49'),
	(3, 'P003', '2025-02-07', 'Bibit Super', '2025-02-07 11:50:49', '2025-02-07 11:50:49');

-- Dumping structure for table siperkebunan.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.users: ~0 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', '$2y$10$/hnHdbBvi8UW6fb3k7SrIeYqw9SBI4rOzSRVLi8kRlupvvR9K2UqG', 1, '2025-02-06 09:30:28', '0000-00-00 00:00:00');

-- Dumping structure for table siperkebunan.user_access
DROP TABLE IF EXISTS `user_access`;
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `menu_category_id` int unsigned NOT NULL,
  `menu_id` int unsigned NOT NULL,
  `submenu_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.user_access: ~13 rows (approximately)
DELETE FROM `user_access`;
INSERT INTO `user_access` (`id`, `role_id`, `menu_category_id`, `menu_id`, `submenu_id`) VALUES
	(1, 1, 1, 0, 0),
	(2, 1, 0, 1, 0),
	(3, 1, 2, 0, 0),
	(4, 1, 0, 2, 0),
	(8, 1, 1, 0, 0),
	(9, 1, 0, 1, 0),
	(10, 1, 2, 0, 0),
	(11, 1, 0, 2, 0),
	(16, 1, 7, 0, 0),
	(18, 1, 0, 9, 0),
	(21, 1, 0, 10, 0);

-- Dumping structure for table siperkebunan.user_menu
DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_category` int unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `parent` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.user_menu: ~6 rows (approximately)
DELETE FROM `user_menu`;
INSERT INTO `user_menu` (`id`, `menu_category`, `title`, `url`, `icon`, `parent`) VALUES
	(1, 1, 'Dashboard', 'home', 'home', 0),
	(2, 2, 'Users', 'users', 'user', 0),
	(3, 3, 'Menu Management', 'menuManagement', 'command', 0),
	(4, 3, 'CRUD Generator', 'crudGenerator', 'code', 0),
	(9, 7, 'Production', 'productions', 'folder', 0),
	(10, 7, 'Tree', 'trees', 'folder', 0);

-- Dumping structure for table siperkebunan.user_menu_category
DROP TABLE IF EXISTS `user_menu_category`;
CREATE TABLE IF NOT EXISTS `user_menu_category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.user_menu_category: ~4 rows (approximately)
DELETE FROM `user_menu_category`;
INSERT INTO `user_menu_category` (`id`, `menu_category`) VALUES
	(1, 'Common Page'),
	(2, 'Settings'),
	(3, 'Developers'),
	(7, 'Garden');

-- Dumping structure for table siperkebunan.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.user_role: ~0 rows (approximately)
DELETE FROM `user_role`;
INSERT INTO `user_role` (`id`, `role_name`) VALUES
	(1, 'Admin');

-- Dumping structure for table siperkebunan.user_submenu
DROP TABLE IF EXISTS `user_submenu`;
CREATE TABLE IF NOT EXISTS `user_submenu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu` int unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table siperkebunan.user_submenu: ~0 rows (approximately)
DELETE FROM `user_submenu`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

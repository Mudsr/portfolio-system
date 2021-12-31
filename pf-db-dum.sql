-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for portfolio_system
DROP DATABASE IF EXISTS `portfolio_system`;
CREATE DATABASE IF NOT EXISTS `portfolio_system` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `portfolio_system`;

-- Dumping structure for table portfolio_system.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_expiry` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.clients: ~71 rows (approximately)
DELETE FROM `clients`;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `email`, `password`, `address`, `telephone`, `id_type`, `id_no`, `id_expiry`, `created_at`, `updated_at`) VALUES
	(1, 'باتل محمد باتل الرشيدي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(2, 'شركة التجارة و الاستثمار العقاري', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(3, 'شركة التجارة و الاستثمار العقاري', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(4, 'شركة القرين الدولية العقارية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(5, 'شركة القرين الدولية العقارية', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(6, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(7, 'شركة مجموعة إبراهيم محمد الجريوي العقارية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(8, 'شركة مجموعة إبراهيم محمد الجريوي العقارية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(9, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(10, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(11, 'شركة كنان العقارية / جمال محمد الفضالة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(12, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(13, 'ماجدة خليل سليمان ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(14, 'ماجدة خليل سليمان ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(15, 'شركة مجموعة المركز الدولي للمواد الغذائية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(16, 'الشركة العربية للكهرباء ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(17, 'حمد محمد حسن العمر ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(18, 'شركة ميريلاند العالمية للتجهيزات الغذائية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(19, 'باتل محمد باتل الرشيدي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(20, 'سارة حسن الوزان ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(21, 'العربية للكهرباء ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(22, 'نامي النامي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(23, 'عبدالله سرحان الذايدي', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(24, 'الشركة العربية للكهرباء ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(25, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(26, 'حمد محمد العمر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(27, 'مؤسسة فيصل ناصر القطامي للتجارة العامة ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(28, 'فايز  ادليهيس المطيري', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(29, 'محمد صالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(30, 'مؤسسة فيصل ناصر القطامي للتجارة العامة ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(31, 'خالد عبد العزيز إبراهيم الحسون', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(32, 'مشعل غصاب الزمانان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(33, 'شركة دار فارس ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(34, 'صلاح الخميس ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(35, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(36, 'سليمان خالد عبدالله الوزان ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(37, 'شركة دار فارس ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(38, 'محمد صالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(39, 'مشعل سامي المشري', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(40, 'حمد محمد حسن العمر ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(41, 'علي عبدالرحمن فارس المطيري', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(42, 'ماجدة خليل سليمان ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(43, 'عبداللطيف الدايل', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(44, 'شركة ساتكو التجارية الغذائية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(45, 'بدر مسفر المطيري ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(46, 'موسى حمود علي الجيران ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(47, 'موسى حمود علي الجيران ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(48, 'شركة الريادة للتمويل و الاستثمار ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(49, 'شركة الريادة المتحدة العقارية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(50, 'مشعل غصاب الزمنان ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(51, 'مشعل عبدالعزيز الجري ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(52, 'شركة فهد الجزيرة للتجارة العامة و المقاولات ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(53, 'هند سليمان الجارالله الجارالله ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(54, 'نايف احمد الدبوس ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(55, 'محمد صالح رجا الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(56, 'شركة جنا انترناشيونال التجارية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(57, 'عبدالله عادل المسافر ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(58, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(59, 'فهد سعد فالح الرشيدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(60, 'حمد محمد العمر ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(61, 'عبداللطيف الدايل ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(62, 'مشعل داود الخالدي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(63, 'شركة العز للتجارة العامة ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(64, 'جمال ناصر الصنهات العصيمي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(65, 'شركة تسكين العقارية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(66, 'فيصل صالح العجمي ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(67, 'شركة كنان العقارية / جمال محمد الفضالة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(68, 'حمد محمد حسن العمر ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(69, 'مشعل غصاب الزمانان', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(70, 'مشعل فهاد محمد الفراج ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(71, 'شركة بوابة كيفان للتجارة العامة ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(72, 'احمد نوري سليمان القناعي', NULL, NULL, NULL, NULL, 'Civil ID', '272080800479', '2023-10-12', '2021-10-27 11:25:17', '2021-10-27 11:25:17');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.deals
DROP TABLE IF EXISTS `deals`;
CREATE TABLE IF NOT EXISTS `deals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `plot_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `renewed_at` date DEFAULT NULL,
  `closed_at` date DEFAULT NULL,
  `sold_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deals_portfolio_id_foreign` (`portfolio_id`),
  KEY `deals_client_id_foreign` (`client_id`),
  CONSTRAINT `deals_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `deals_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.deals: ~71 rows (approximately)
DELETE FROM `deals`;
/*!40000 ALTER TABLE `deals` DISABLE KEYS */;
INSERT INTO `deals` (`id`, `portfolio_id`, `client_id`, `plot_no`, `type`, `entry_date`, `renewed_at`, `closed_at`, `sold_to`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '150/149', NULL, '2018-10-31', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(2, 1, 2, '99/101', NULL, '2018-12-25', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(3, 1, 3, '102/100', NULL, '2018-12-25', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(4, 1, 4, '1901', NULL, '2019-01-09', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(5, 1, 5, '1902', NULL, '2019-01-09', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(6, 1, 6, '1641', NULL, '2019-01-30', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(7, 1, 7, '287', NULL, '2019-01-31', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(8, 1, 8, '286', NULL, '2019-01-31', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(9, 1, 9, '132', NULL, '2019-02-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(10, 1, 10, '131', NULL, '2019-02-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(11, 1, 11, '154-153', NULL, '2019-03-14', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(12, 1, 12, '120-119', NULL, '2019-04-24', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(13, 1, 13, '163', NULL, '2019-05-01', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(14, 1, 14, '53', NULL, '2019-05-30', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(15, 1, 15, '239', NULL, '2019-07-08', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(16, 1, 16, '69', NULL, '2019-07-11', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(17, 1, 17, '219', NULL, '2019-07-16', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(18, 1, 18, '216', NULL, '2019-07-16', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(19, 1, 19, '231', NULL, '2019-07-22', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(20, 1, 20, '1380', NULL, '2019-07-23', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(21, 1, 21, '157', NULL, '2019-09-15', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(22, 1, 22, '63', NULL, '2019-09-24', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(23, 1, 23, '5-4', NULL, '2019-10-02', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(24, 1, 24, '241', NULL, '2019-10-09', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(25, 1, 25, '111', NULL, '2019-10-24', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(26, 1, 26, '1366-1364', NULL, '2019-10-30', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(27, 1, 27, '48', NULL, '2019-11-12', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(28, 1, 28, '65-70', NULL, '2019-11-19', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(29, 1, 29, '19', NULL, '2019-12-03', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(30, 1, 30, '24-25', NULL, '2019-12-04', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(31, 1, 31, '1452', NULL, '2019-12-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(32, 1, 32, '1454', NULL, '2019-12-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(33, 1, 33, '128', NULL, '2019-12-17', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(34, 1, 34, '124', NULL, '2019-12-25', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(35, 1, 35, '129', NULL, '2019-12-26', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(36, 1, 36, '1513', NULL, '2019-12-29', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(37, 1, 37, '126', NULL, '2019-12-29', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(38, 1, 38, '197', NULL, '2019-12-30', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(39, 1, 39, '159', NULL, '2020-01-16', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(40, 1, 40, '1365-1363', NULL, '2020-01-26', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(41, 1, 41, '1609-1610-1611-1612', NULL, '2020-02-19', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(42, 1, 42, '63', NULL, '2020-03-02', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(43, 1, 43, '1562', NULL, '2020-03-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(44, 1, 44, '282', NULL, '2020-03-11', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(45, 1, 45, '130', NULL, '2020-08-05', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(46, 1, 46, '29-28-27', NULL, '2020-09-02', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(47, 1, 47, '1176', NULL, '2020-12-01', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(48, 1, 48, '134', NULL, '2020-09-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(49, 1, 49, '7', NULL, '2020-10-13', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(50, 1, 50, '1420', NULL, '2020-10-21', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(51, 1, 51, '53', NULL, '2020-10-23', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(52, 1, 52, '206', NULL, '2020-11-08', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(53, 1, 53, '176', NULL, '2020-11-11', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(54, 1, 54, '27', NULL, '2020-12-14', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(55, 1, 55, '17', NULL, '2021-01-18', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(56, 1, 56, '278', NULL, '2021-01-20', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(57, 1, 57, '1721', NULL, '2021-01-28', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(58, 1, 58, '33', NULL, '2021-04-12', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(59, 1, 59, '34', NULL, '2021-04-12', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(60, 1, 60, '5&4', NULL, '2021-04-26', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(61, 1, 61, '181', NULL, '2021-06-07', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(62, 1, 62, '47', NULL, '2021-06-07', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(63, 1, 63, '141', NULL, '2021-06-10', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(64, 1, 64, '27', NULL, '2021-06-22', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(65, 1, 65, '30', NULL, '2021-07-25', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(66, 1, 66, '44', NULL, '2021-08-25', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(67, 1, 67, '47-46', NULL, '2021-09-01', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(68, 1, 68, '257', NULL, '2021-09-02', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(69, 1, 69, '165-164-163', NULL, '2021-09-09', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(70, 1, 70, '140', NULL, '2021-09-12', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(71, 1, 71, '98-97-96-95', NULL, '2021-09-13', NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41'),
	(72, 1, 1, '339Test', NULL, '2021-12-22', NULL, NULL, NULL, '2021-12-22 06:53:56', '2021-12-22 06:53:56'),
	(73, 1, 1, '339Test', NULL, '2021-12-22', NULL, NULL, NULL, '2021-12-22 07:00:25', '2021-12-22 07:00:25');
/*!40000 ALTER TABLE `deals` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.fee_calculations
DROP TABLE IF EXISTS `fee_calculations`;
CREATE TABLE IF NOT EXISTS `fee_calculations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) unsigned NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quarter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fee_calculations_portfolio_id_foreign` (`portfolio_id`),
  CONSTRAINT `fee_calculations_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.fee_calculations: ~0 rows (approximately)
DELETE FROM `fee_calculations`;
/*!40000 ALTER TABLE `fee_calculations` DISABLE KEYS */;
INSERT INTO `fee_calculations` (`id`, `portfolio_id`, `fee`, `quarter`, `created_at`, `updated_at`) VALUES
	(1, 1, '114098.3125', '3', '2021-10-04 07:19:42', '2021-12-27 06:34:57'),
	(2, 1, '116598.3125', '4', '2021-12-22 07:10:17', '2021-12-27 06:41:19');
/*!40000 ALTER TABLE `fee_calculations` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.media
DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.media: ~7 rows (approximately)
DELETE FROM `media`;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Plot', 1, 'e971552d-c86f-4c47-a78d-4ac4d68d954b', 'pai', 'عقد القسيمة (150-149)-الشويخ الصناعية', 'عقد-القسيمة-(150-149)-الشويخ-الصناعية.pdf.pdf', 'application/pdf', 'public', 'public', 4699963, '[]', '{"type": "pai", "issue_date": "2018-10-31", "expiry_date": "2023-10-30"}', '[]', '[]', 1, '2021-10-27 11:12:21', '2021-10-27 11:12:21'),
	(2, 'App\\Models\\Plot', 1, '946124e4-5d89-4480-92bd-cb702b8afc21', 'power_of_attorney', 'تفويض ادارة القسيمة 149-150 العميل باتل الرشيدي ', 'تفويض-ادارة-القسيمة-149-150-العميل-باتل-الرشيدي-.pdf', 'application/pdf', 'public', 'public', 256789, '[]', '{"type": "power_of_attorney", "issue_to": "باتل محمد باتل الرشيدي", "issue_date": "2020-11-09", "expiry_date": "2021-11-01"}', '[]', '[]', 2, '2021-10-27 11:12:21', '2021-10-27 11:12:21'),
	(3, 'App\\Models\\Client', 72, '73849ae2-d8c0-41ba-a698-1d8786e75b78', 'clients', 'Civil ID  - Ahmad N S ALqanai - 272080800479', 'Civil-ID----Ahmad-N-S-ALqanai---272080800479.pdf', 'application/pdf', 'public', 'public', 133574, '[]', '[]', '[]', '[]', 3, '2021-10-27 11:25:17', '2021-10-27 11:25:17'),
	(4, 'App\\Models\\Plot', 72, '813ed9b2-724f-4576-931d-e3d68707d1f3', 'pai', 'almanar-prospectus 1-65', 'almanar-prospectus-1-65.pdf', 'application/pdf', 'public', 'public', 584219, '[]', '{"type": "pai", "issue_date": "2021-12-01", "expiry_date": "2023-06-08"}', '[]', '[]', 4, '2021-12-22 06:53:56', '2021-12-22 06:53:56'),
	(5, 'App\\Models\\Plot', 73, '47365a18-2f4a-4582-b67d-a68adec3ea41', 'pai', 'Due Diligence Requirements', 'Due-Diligence-Requirements.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 15766, '[]', '{"type": "pai", "issue_date": "2021-12-01", "expiry_date": "2023-06-08"}', '[]', '[]', 5, '2021-12-22 07:00:25', '2021-12-22 07:00:25'),
	(6, 'App\\Models\\Plot', 73, '00bef86c-2406-4df9-8070-dab4d6d7c570', 'fire_insurance', 'Due Diligence Requirements', 'Due-Diligence-Requirements.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 15766, '[]', '{"type": "fire_insurance", "issue_date": "2021-12-01", "expiry_date": "2022-07-21"}', '[]', '[]', 6, '2021-12-22 07:00:25', '2021-12-22 07:00:25'),
	(7, 'App\\Models\\Plot', 73, 'b091e2b4-514f-4353-ab4b-90fad78172f7', 'new_deal_email', 'Due Diligence Requirements', 'Due-Diligence-Requirements.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 15766, '[]', '[]', '[]', '[]', 7, '2021-12-22 07:00:25', '2021-12-22 07:00:25');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.merges
DROP TABLE IF EXISTS `merges`;
CREATE TABLE IF NOT EXISTS `merges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) unsigned NOT NULL,
  `new_deal_id` bigint(20) unsigned NOT NULL,
  `old_deal_ids` json NOT NULL,
  `entry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `merges_portfolio_id_foreign` (`portfolio_id`),
  KEY `merges_new_deal_id_foreign` (`new_deal_id`),
  CONSTRAINT `merges_new_deal_id_foreign` FOREIGN KEY (`new_deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `merges_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.merges: ~0 rows (approximately)
DELETE FROM `merges`;
/*!40000 ALTER TABLE `merges` DISABLE KEYS */;
/*!40000 ALTER TABLE `merges` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.migrations: ~18 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_08_04_162632_create_permission_tables', 1),
	(5, '2021_08_05_194651_create_portfolios_table', 1),
	(6, '2021_08_07_172223_create_media_table', 1),
	(7, '2021_08_08_141339_create_clients_table', 1),
	(8, '2021_08_08_163730_create_documents_table', 1),
	(9, '2021_08_17_153719_create_deals_table', 1),
	(10, '2021_08_18_095626_create_plots_table', 1),
	(11, '2021_08_21_065658_create_renewals_table', 1),
	(12, '2021_08_21_065859_create_transfers_table', 1),
	(13, '2021_08_22_070217_create_tasks_table', 1),
	(14, '2021_08_25_153606_create_merges_table', 1),
	(15, '2021_08_25_153614_create_splits_table', 1),
	(16, '2021_09_08_111931_create_fee_calculations_table', 1),
	(17, '2021_09_14_104726_create_pai_rent_payments_table', 1),
	(18, '2021_09_29_201300_add_columns_to_plot_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.model_has_permissions: ~0 rows (approximately)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.model_has_roles: ~0 rows (approximately)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.pai_rent_payments
DROP TABLE IF EXISTS `pai_rent_payments`;
CREATE TABLE IF NOT EXISTS `pai_rent_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `deal_id` bigint(20) unsigned NOT NULL,
  `entry_date` date NOT NULL,
  `rent_amount` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pai_rent_payments_client_id_foreign` (`client_id`),
  KEY `pai_rent_payments_deal_id_foreign` (`deal_id`),
  CONSTRAINT `pai_rent_payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pai_rent_payments_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.pai_rent_payments: ~0 rows (approximately)
DELETE FROM `pai_rent_payments`;
/*!40000 ALTER TABLE `pai_rent_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `pai_rent_payments` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.permissions: ~0 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.plots
DROP TABLE IF EXISTS `plots`;
CREATE TABLE IF NOT EXISTS `plots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deal_id` bigint(20) unsigned NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_value` double NOT NULL,
  `finance_amount` double NOT NULL,
  `pai_rent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licensed_purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_area_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_civil_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pai_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plots_deal_id_foreign` (`deal_id`),
  CONSTRAINT `plots_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.plots: ~71 rows (approximately)
DELETE FROM `plots`;
/*!40000 ALTER TABLE `plots` DISABLE KEYS */;
INSERT INTO `plots` (`id`, `deal_id`, `area_name`, `block`, `property_value`, `finance_amount`, `pai_rent`, `licensed_purpose`, `application_no`, `plot_area_size`, `created_at`, `updated_at`, `client_civil_id`, `pai_client_id`) VALUES
	(1, 1, 'الشويخ الصناعية  2', 'ب', 2560000, 2560000, '14330.75', NULL, NULL, '2047.25', '2021-10-04 06:21:41', '2021-10-27 11:12:21', NULL, NULL),
	(2, 2, 'الشويخ الصناعية ', 'ب', 1560000, 1560000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(3, 3, 'الشويخ الصناعية', 'ب', 1550000, 1550000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-12-22 07:13:37', NULL, NULL),
	(4, 4, 'الري ', '1', 675000, 675000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(5, 5, 'الري ', '1', 675000, 675000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(6, 6, 'الري ', '1', 642000, 642000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(7, 7, 'الري ', '1', 890000, 890000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(8, 8, 'الري ', '1', 890000, 890000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(9, 9, 'الشويخ الصناعية 3', 'ب', 932500, 932500, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(10, 10, 'الشويخ الصناعية 3', 'ب', 932500, 932500, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(11, 11, 'الشويخ الصناعية -2', 'أ', 1590000, 1590000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(12, 12, 'الشويخ الصناعية ', 'ب', 480000, 480000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(13, 13, 'الفحيحيل الصناعية ', '5', 3000000, 3000000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(14, 14, 'شرق الاحمدي ', '8', 1560000, 1560000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(15, 15, 'الشويخ الصناعية -3', 'ج', 1197000, 1197000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(16, 16, 'الشويخ الصناعية -2', 'الشويخ الجديدة ', 3600000, 3600000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(17, 17, 'الشويخ الصناعية -3', 'أ', 1185000, 1185000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(18, 18, 'الشويخ الصناعية -3', 'أ', 630000, 630000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(19, 19, 'الشويخ الصناعية ', 'أ', 1325000, 1325000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(20, 20, 'الري ', '1', 420000, 420000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(21, 21, 'الشويخ الصناعية2', 'أ', 470000, 470000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(22, 22, 'الري الصناعية ', '-', 681000, 681000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(23, 23, 'الشويخ الصناعية -3', 'هـ', 1300000, 1300000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(24, 24, 'الشويخ الصناعية -3', 'ب', 1266000, 1266000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(25, 25, 'الشويخ الصناعية-3', 'أ', 690000, 690000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(26, 26, 'الري', '1', 870000, 870000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(27, 27, 'الشويخ الصناعية-3', 'أ', 1013000, 1013000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(28, 28, 'الشويخ الصناعية-2', 'ج', 440000, 440000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(29, 29, 'الشويخ الصناعية-3', 'ب', 870000, 870000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(30, 30, 'الشويخ الصناعية-3', 'أ', 1088000, 1088000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(31, 31, 'الري ', '1', 770000, 770000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(32, 32, 'الري ', '1', 770000, 770000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(33, 33, 'الشويخ الصناعية-3', 'ب', 809500, 809500, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(34, 34, 'الشويخ الصناعية-2', 'ج', 288000, 288000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(35, 35, 'الشويخ الصناعية-3', 'أ', 600000, 600000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(36, 36, 'الري', '1', 420000, 420000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(37, 37, 'الشويخ الصناعية-2', 'ب', 238750, 238750, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(38, 38, 'الشويخ الصناعية-3', 'ب', 695000, 695000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(39, 39, 'الشويخ الصناعية -2', 'ج', 261000, 261000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(40, 40, 'الري', '1', 1650000, 1650000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(41, 41, 'الري ', '1', 4170000, 4170000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(42, 42, 'الشويخ الصناعية -2', 'ز', 6720000, 6720000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(43, 43, 'الري', '1', 500000, 500000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(44, 44, 'صبحان الصناعية ', '11', 383500, 383500, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(45, 45, 'الشويخ الصناعية 2', 'ب', 720000, 720000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(46, 46, 'الشويخ الصناعية 2', 'ج', 4400000, 4400000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(47, 47, 'الري ', '1', 4400000, 4400000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(48, 48, 'الشويخ الصناعية 3', '1', 1200000, 1200000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(49, 49, 'الشويخ الصناعية 3', 'ج', 1250000, 1250000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(50, 50, 'الري', '1', 400000, 400000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(51, 51, 'الفحيحيل ', '5', 350000, 350000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(52, 52, 'الشويخ الصناعية 3', 'ب', 2465000, 2465000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(53, 53, 'الشويخ الصناعية 2', 'ب', 1334500, 1334500, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(54, 54, 'الشويخ الصناعية 2', 'و', 400000, 400000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(55, 55, 'الشويخ الصناعية 3', 'ب', 488000, 488000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(56, 56, 'صبحان الصناعية ', '11', 500000, 500000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(57, 57, 'الري', '1', 550000, 550000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(58, 58, 'الشويخ الصناعية 3', 'د', 1320000, 1320000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(59, 59, 'الشويخ الصناعية 3', 'د', 1320000, 1320000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(60, 60, 'الري', '1', 1463000, 1463000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(61, 61, 'الشويخ الصناعية 3', 'أ', 650000, 650000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(62, 62, 'الشويخ الصناعية 2', 'هـ', 485400, 485400, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(63, 63, 'الشويخ الصناعية 3', 'ب', 800000, 800000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(64, 64, 'الشويخ الصناعية 2', 'د', 670000, 670000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(65, 65, 'الشويخ الصناعية 2', 'الشويخ الجديدة ', 4680000, 4680000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(66, 66, 'شرق الاحمدي ', '8', 2000000, 2000000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(67, 67, 'الشويخ الصناعية 3', 'ب', 1140000, 1140000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(68, 68, 'الشويخ الصناعية 3', 'ج', 1010000, 1010000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(69, 69, 'الشويخ الصناعية 3', 'ج', 1800000, 1800000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(70, 70, 'الشويخ الصناعية 3', 'ب', 850000, 850000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(71, 71, 'الشويخ الصناعية 2', 'ب', 1375000, 1375000, NULL, NULL, NULL, NULL, '2021-10-04 06:21:41', '2021-10-04 06:21:41', NULL, NULL),
	(72, 72, 'Salmiya', '12', 1500000, 1000000, '15000', 'Consumer Products', '12567', '1500', '2021-12-22 06:53:56', '2021-12-22 06:53:56', NULL, NULL),
	(73, 73, 'Salmiya', '12', 1500000, 1000000, '15000', 'Consumer Products', '12567', '1500', '2021-12-22 07:00:25', '2021-12-22 07:00:25', NULL, NULL);
/*!40000 ALTER TABLE `plots` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.portfolios
DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `management_fee` json NOT NULL,
  `minimum_fee_per_quarter` double(8,2) NOT NULL,
  `fee_calculation_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_date` date DEFAULT NULL,
  `agreement_expiry` date DEFAULT NULL,
  `update_effective_from` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `closing_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `management_fee_last_calculated_at` date DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.portfolios: ~0 rows (approximately)
DELETE FROM `portfolios`;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` (`id`, `name`, `management_fee`, `minimum_fee_per_quarter`, `fee_calculation_method`, `contact_person`, `contact_number`, `contact_email`, `agreement_date`, `agreement_expiry`, `update_effective_from`, `closing_date`, `closing_reason`, `closing_remarks`, `management_fee_last_calculated_at`, `is_current`, `created_at`, `updated_at`) VALUES
	(1, 'WARBA', '{"to": ["500000000"], "from": ["0"], "percentage": ["0.005"]}', 6250.00, 'flat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-04 06:21:04', '2021-10-04 06:21:04');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.role_has_permissions: ~0 rows (approximately)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.splits
DROP TABLE IF EXISTS `splits`;
CREATE TABLE IF NOT EXISTS `splits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) unsigned NOT NULL,
  `plot_id` bigint(20) unsigned NOT NULL,
  `new_plots_ids` json NOT NULL,
  `entry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `splits_portfolio_id_foreign` (`portfolio_id`),
  KEY `splits_plot_id_foreign` (`plot_id`),
  CONSTRAINT `splits_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`) ON DELETE CASCADE,
  CONSTRAINT `splits_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.splits: ~0 rows (approximately)
DELETE FROM `splits`;
/*!40000 ALTER TABLE `splits` DISABLE KEYS */;
/*!40000 ALTER TABLE `splits` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.tasks
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `plot_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `completed_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_portfolio_id_foreign` (`portfolio_id`),
  KEY `tasks_client_id_foreign` (`client_id`),
  KEY `tasks_plot_id_foreign` (`plot_id`),
  CONSTRAINT `tasks_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tasks_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tasks_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.tasks: ~0 rows (approximately)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.transfers
DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint(20) unsigned NOT NULL,
  `plot_id` bigint(20) unsigned NOT NULL,
  `old_client_id` bigint(20) unsigned NOT NULL,
  `new_client_id` bigint(20) unsigned NOT NULL,
  `entry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transfers_portfolio_id_foreign` (`portfolio_id`),
  KEY `transfers_plot_id_foreign` (`plot_id`),
  KEY `transfers_old_client_id_foreign` (`old_client_id`),
  KEY `transfers_new_client_id_foreign` (`new_client_id`),
  CONSTRAINT `transfers_new_client_id_foreign` FOREIGN KEY (`new_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transfers_old_client_id_foreign` FOREIGN KEY (`old_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transfers_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transfers_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.transfers: ~0 rows (approximately)
DELETE FROM `transfers`;
/*!40000 ALTER TABLE `transfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `transfers` ENABLE KEYS */;

-- Dumping structure for table portfolio_system.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio_system.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `telephone`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@portfolio.com', NULL, '$2y$10$qJ6uAEuH4Key/qLiobiH8ePAKGZPYF8v3TkYy.U9OzzEX7l10QGzi', NULL, NULL, 'JL0Ein0bTDem8Fium1VNbp2O2DauwOgkQS14N9Pp0NQZSzXI9kDGSgcREuvj', '2021-10-04 06:20:11', '2021-10-04 06:20:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

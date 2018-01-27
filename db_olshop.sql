-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.33-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_olshop
CREATE DATABASE IF NOT EXISTS `db_olshop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_olshop`;

-- Dumping structure for table db_olshop.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.brand: ~2 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Thrill', '2018-01-08 01:44:01', '2018-01-08 01:44:01'),
	(3, 'Polygon', '2018-01-08 02:35:57', '2018-01-08 02:35:57');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table db_olshop.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(6, 'MTB', NULL, NULL),
	(7, 'Road Bike', NULL, NULL),
	(8, 'Hard Trail', NULL, NULL),
	(9, 'Soft Trail', NULL, NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table db_olshop.category_product
CREATE TABLE IF NOT EXISTS `category_product` (
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.category_product: ~2 rows (approximately)
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
	(6, 14),
	(8, 14),
	(9, 14);
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;

-- Dumping structure for table db_olshop.detail_transaction
CREATE TABLE IF NOT EXISTS `detail_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.detail_transaction: ~5 rows (approximately)
/*!40000 ALTER TABLE `detail_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_transaction` ENABLE KEYS */;

-- Dumping structure for table db_olshop.discussion
CREATE TABLE IF NOT EXISTS `discussion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_olshop.discussion: ~9 rows (approximately)
/*!40000 ALTER TABLE `discussion` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion` ENABLE KEYS */;

-- Dumping structure for table db_olshop.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_olshop.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2018_01_12_031125_create_review_table', 1),
	(3, '2018_01_22_020722_create_discussion_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_olshop.permission
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.permission: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'product.create', '2017-12-21 01:23:06', '2017-12-21 01:23:06'),
	(2, 'user.create', '2017-12-21 02:10:27', '2017-12-21 02:10:27'),
	(3, 'user.edit', '2018-01-25 01:23:47', '2018-01-25 01:24:01');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- Dumping structure for table db_olshop.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.permission_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
	(10, 1),
	(10, 2);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table db_olshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`,`description`),
  FULLTEXT KEY `name_2` (`name`,`description`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.product: ~2 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `brand_id`, `description`, `price`, `stock`, `created_at`, `updated_at`, `weight`) VALUES
	(14, 'Thrill Vanquish 3.0', 1, '<ul>\n	<li>Frame : Alloy 6061 Inner Routing</li>\n	<li>Fork : Sountour XCM HLO</li>\n	<li>Shifter : Shimano Altus SL-M310 27Sp</li>\n	<li>Brake : Shimano Hydraulic BR-M315</li>\n	<li>Crank : Promax Hollowtech II</li>\n	<li>FD : Shimano Altus</li>\n	<li>RD : Shimano Acera 9Sp</li>\n	<li>Rims : Alloy 32H</li>\n	<li>Hub Freehub : Shimano</li>\n	<li>Chain : YBN</li>\n	<li>Sprocket : Shimano Alivio CS-HG200 11-36T 9Sp</li>\n	<li>Handlebar : Thrill New</li>\n	<li>Stem : Thrill New</li>\n	<li>Seatpost : Thrill New</li>\n	<li>Saddle : Thrill XC-Race</li>\n	<li>Tire : Deli SA-258 27.5&quot; x 2.25</li>\n</ul>', 3850000, 3, '2017-10-26 04:34:51', '2018-01-24 08:03:58', NULL),
	(15, 'POLYGON SISKIU D7', 3, '<ol>\r\n	<li>sadhjasdhkjdashkjdhsas</li>\r\n	<li>jasdbgjasdgkjhasdkjhasdkjhads</li>\r\n	<li>askdhklahsdklhasd</li>\r\n	<li>nZcmnvZCBNvBMNXC</li>\r\n	<li>yqetghgwhjdahjdvschas</li>\r\n</ol>', 11000000, 5, '2018-01-05 07:09:06', '2018-01-08 02:46:51', NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table db_olshop.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.product_images: ~3 rows (approximately)
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` (`id`, `name`, `created_at`, `updated_at`, `product_id`) VALUES
	(12, 'img/nqMJeuOhLI.jpg', '2018-01-05 07:09:07', '2018-01-05 07:09:07', 15),
	(13, 'img/rQ6KaHtRCM.jpg', '2018-01-08 07:35:40', '2018-01-08 07:35:40', 14);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

-- Dumping structure for table db_olshop.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_olshop.review: ~15 rows (approximately)
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping structure for table db_olshop.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.role: ~0 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table db_olshop.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.role_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table db_olshop.social_accounts
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) DEFAULT NULL,
  `provider_user_id` text,
  `provider` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.social_accounts: ~3 rows (approximately)
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;

-- Dumping structure for table db_olshop.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.transaction: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

-- Dumping structure for table db_olshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_olshop.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

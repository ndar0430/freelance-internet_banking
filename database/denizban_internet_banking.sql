-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table denizban_internet_banking.bank_account
CREATE TABLE IF NOT EXISTS `bank_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.bank_account: ~0 rows (approximately)
DELETE FROM `bank_account`;
/*!40000 ALTER TABLE `bank_account` DISABLE KEYS */;
INSERT INTO `bank_account` (`id`, `user_id`, `balance`, `account_number`, `created_at`, `updated_at`) VALUES
	(1, 2, 0, 'ASDADSADASD', '2018-03-20 09:06:38', '2018-03-20 09:06:38');
/*!40000 ALTER TABLE `bank_account` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.migrations: ~5 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_03_18_165619_bank', 1),
	(4, '2018_03_18_211420_send', 1),
	(5, '2018_03_20_083925_laratrust_setup_tables', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.roles: ~3 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'normal-user', 'Normal User', NULL, '2018-03-20 16:58:17', '2018-03-20 16:58:18'),
	(2, 'super_admin', 'Super Admin', NULL, '2018-03-20 16:58:46', '2018-03-20 16:58:46'),
	(3, 'admin', 'Admin', NULL, '2018-03-20 16:58:45', '2018-03-20 16:58:45');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\\\User',
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.role_user: ~0 rows (approximately)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
	(2, 2, 'App\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.send_money
CREATE TABLE IF NOT EXISTS `send_money` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `To_account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `From_account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.send_money: ~0 rows (approximately)
DELETE FROM `send_money`;
/*!40000 ALTER TABLE `send_money` DISABLE KEYS */;
/*!40000 ALTER TABLE `send_money` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_details_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user_id`, `password`, `show_password`, `users_details_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 7388087263, '$2y$10$n.5mxBOjeCwRebMIawoH0OzLuY09ZdbWvw3WkVhGP7hShw/3gAER2', 'B9cYE1hPL~', 3, 'p4oxx9W5fP1hnsy0F1Hdr9kNnme8SI6zv2Z98dRaUmSIKkROgwoBw9GuJD8Y', '2018-03-20 08:56:56', '2018-03-20 08:56:56'),
	(2, 1947248500, '$2y$10$KMo4ZAk0Xrwrgk3U3nD3VO.XjjydPO7Pewe5TxSR7suOHQpIWn38i', '7z2NqhH@ut', 4, 'G2ijZksnCF0YY747OrQfpwlt4iaFe3zLmHtlSkVaOeUfd1qjOPlve15ulJiu', '2018-03-20 09:03:09', '2018-03-20 09:03:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table denizban_internet_banking.users_details
CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_details_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table denizban_internet_banking.users_details: ~20 rows (approximately)
DELETE FROM `users_details`;
/*!40000 ALTER TABLE `users_details` DISABLE KEYS */;
INSERT INTO `users_details` (`id`, `account_type`, `name`, `middle_name`, `surname`, `nationality`, `sex`, `date_of_birth`, `address`, `city`, `state`, `country`, `zip`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Business Checking', 'Yessenia', NULL, 'Boyer', 'KcOV7aqknk', 'Male', '2004-06-11', '3822 Brooklyn Flat Suite 179\nSouth Tre, HI 32702', 'Lake Kielville', 'District of Columbia', 'Iran', NULL, 113, 'cristopher09@example.com', '2018-03-20 08:42:35', '2018-03-20 08:42:35'),
	(2, 'Business Checking', 'Lowell', NULL, 'McCullough', 'u9VHxJteUT', 'Male', '2014-02-05', '572 Jaime Rest Suite 296\nEast Madalynport, ID 17914-0680', 'East Rosemariemouth', 'New Hampshire', 'Qatar', NULL, 472, 'glenna07@example.org', '2018-03-20 08:42:35', '2018-03-20 08:42:35'),
	(3, 'Savings', 'Kayleigh', NULL, 'Bernhard', 'dlIIf0WnZN', 'Male', '1986-05-07', '62242 Rossie Cove Suite 211\nNew Dallasbury, MA 56076', 'Alexaside', 'District of Columbia', 'Latvia', NULL, 81773320, 'dibbert.agnes@example.net', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(4, 'Business Checking', 'Lee', NULL, 'Purdy', 'UH7k9EnDri', 'Male', '1986-11-27', '8175 Berge Turnpike Suite 159\nCreminview, GA 51681-5152', 'Jastfurt', 'Maryland', 'Guinea', NULL, 1690, 'evie39@example.org', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(5, 'Savings', 'Sally', NULL, 'Walker', 'bCAy5Q6eyZ', 'Male', '1978-10-31', '425 Kilback Spring Apt. 517\nWest Chazborough, IL 03874', 'Alvenatown', 'New York', 'Cote d\'Ivoire', NULL, 9009, 'xbraun@example.org', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(6, 'Business Checking', 'Burnice', NULL, 'Watsica', 'Vrgn3z9ojC', 'Female', '1995-01-02', '62009 Rhett Trace Apt. 025\nLavinabury, AR 71632', 'Port Corene', 'Texas', 'Germany', NULL, 737439188, 'brooks83@example.org', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(7, 'Business Checking', 'Mallie', NULL, 'Halvorson', 'NTyla1OcuR', 'Male', '1970-10-28', '985 Tiana Glens Suite 436\nNitzschestad, CO 34541-8258', 'Lake Susanachester', 'New Jersey', 'Cameroon', NULL, 99, 'ora.streich@example.net', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(8, 'Savings', 'Ophelia', NULL, 'Baumbach', 'cMN0pMxdwp', 'Male', '1985-01-10', '6159 Morar Hollow\nElmiraberg, VT 01376', 'Framiberg', 'New York', 'Thailand', NULL, 72, 'dach.sylvia@example.net', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(9, 'Business Checking', 'Seth', NULL, 'Collins', '2kbaxDmGaU', 'Female', '2017-08-06', '433 Baumbach Track Suite 985\nNorth Westonton, LA 93149-1110', 'Sanfordbury', 'Montana', 'Niue', NULL, 68934480, 'ugibson@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(10, 'Business Checking', 'Loraine', NULL, 'Murphy', 'JmrCEdLq1p', 'Male', '1995-08-18', '7345 Schmeler Circles\nErnieview, AK 89684', 'Stehrland', 'Kansas', 'El Salvador', NULL, 56, 'dawson.conn@example.org', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(11, 'Savings', 'Earl', NULL, 'Beier', '21Kj6dokQr', 'Male', '1984-06-26', '3619 Pfannerstill Curve Suite 785\nKautzerside, MD 96933', 'Port Arden', 'Wisconsin', 'Falkland Islands (Malvinas)', NULL, 97151, 'schultz.aron@example.org', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(12, 'Personal Checking', 'Rudy', NULL, 'Simonis', '6nZeBB9Tfz', 'Male', '1972-12-03', '2521 Kamren Mountain\nNew Ebbafort, MS 80974', 'Jerdefurt', 'Vermont', 'Ghana', NULL, 83435, 'wabshire@example.net', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(13, 'Business Checking', 'Reyes', NULL, 'Kub', 'jvd5jrUhYG', 'Female', '1995-02-14', '99057 Sage Landing\nDeborahborough, CT 30086-5080', 'Charleymouth', 'North Dakota', 'Chile', NULL, 2340, 'florida.luettgen@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(14, 'Personal Checking', 'Elenor', NULL, 'West', '3Fy0moZeGD', 'Male', '1993-06-25', '595 D\'Amore Summit Apt. 085\nPort Derek, KS 62746', 'Ewaldshire', 'Utah', 'Sierra Leone', NULL, 8779476, 'lkessler@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(15, 'Business Checking', 'Mittie', NULL, 'Pacocha', 'vUUzztbvtv', 'Female', '1990-06-06', '8226 Hailey Ferry Apt. 897\nMaudport, TN 47825', 'Alexzanderstad', 'Arkansas', 'Martinique', NULL, 88, 'annalise.zboncak@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(16, 'Personal Checking', 'Geovanny', NULL, 'Stokes', '1hxMUY5Sls', 'Male', '1992-12-20', '381 Schmeler Terrace\nPowlowskiport, NH 12195', 'South Elaina', 'South Dakota', 'Bosnia and Herzegovina', NULL, 7549, 'mkiehn@example.net', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(17, 'Business Checking', 'Terrence', NULL, 'Murphy', 'J7wHJGOWno', 'Male', '2002-10-04', '3548 Larson Terrace Suite 657\nLake Samirchester, MN 84463', 'Lake Rocky', 'Texas', 'India', NULL, 62882647, 'ebert.astrid@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(18, 'Savings', 'Ila', NULL, 'Daniel', 'k6sheX30xp', 'Male', '2000-04-12', '978 Lesch Ford Apt. 868\nSouth Marjorybury, SC 53965', 'Hauckmouth', 'Oklahoma', 'Burundi', NULL, 802, 'otho22@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(19, 'Business Checking', 'Destiney', NULL, 'Block', 'U1VvOXAuZf', 'Male', '1987-09-18', '24779 Schoen Isle\nSouth Royce, NY 01773', 'Port Julius', 'Nevada', 'Chile', NULL, 227511694, 'emelie32@example.com', '2018-03-20 08:42:36', '2018-03-20 08:42:36'),
	(20, 'Savings', 'Carissa', NULL, 'Bahringer', 'GnUET1EoV1', 'Male', '1998-05-26', '1819 Bartell Throughway Apt. 745\nNyasiafurt, ID 20973-2889', 'South Margaretmouth', 'Colorado', 'Sri Lanka', NULL, 145, 'kiera71@example.net', '2018-03-20 08:42:36', '2018-03-20 08:42:36');
/*!40000 ALTER TABLE `users_details` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2022 at 06:30 AM
-- Server version: 8.0.27
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$TIsDnqAtoocT5cvjFI3wbOJEw20pUi7eD41mj2hlahWX46.WlRfpK', NULL, '2022-04-02 11:29:56', '2022-04-02 11:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Generic', '2022-05-03 11:26:19', '2022-05-03 11:26:19'),
(2, 'Nk Textiles', '2022-05-03 11:26:19', '2022-05-03 11:26:19'),
(3, 'SIRZL', '2022-05-03 11:27:09', '2022-05-03 11:27:09'),
(4, 'HMP Fashion', '2022-05-03 11:27:09', '2022-05-03 11:27:09'),
(5, 'Pandadi Saree', '2022-05-03 11:28:12', '2022-05-03 11:28:12'),
(6, 'Rajnandini', '2022-05-03 11:28:12', '2022-05-03 11:28:12'),
(7, 'Yash Gallery', '2022-05-03 11:29:09', '2022-05-03 11:29:09'),
(8, 'BIBA', '2022-05-03 11:29:09', '2022-05-03 11:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'mobile', 0, '2022-04-06 04:33:32', '2022-04-06 04:33:32'),
(2, 'clothes', 0, '2022-04-06 04:33:57', '2022-04-06 04:33:57'),
(3, 'iphone', 1, '2022-04-06 04:34:15', '2022-04-06 04:34:15'),
(4, 'mi', 1, '2022-04-06 04:34:26', '2022-04-06 04:34:26'),
(5, 'realme', 1, '2022-04-06 04:34:43', '2022-04-06 04:34:43'),
(6, 'OnePlus', 1, '2022-04-06 04:34:57', '2022-04-06 04:34:57'),
(7, 'man', 2, '2022-04-06 04:35:08', '2022-04-06 04:35:08'),
(8, 'woman', 2, '2022-04-06 04:35:24', '2022-04-06 04:35:24'),
(9, 'kids', 2, '2022-04-06 04:35:36', '2022-04-06 04:35:36'),
(17, 'backebery', 1, '2022-04-14 04:50:41', '2022-04-14 04:50:41'),
(12, 'vivo', 1, '2022-04-06 06:18:33', '2022-04-06 06:18:33'),
(13, 'oppo', 1, '2022-04-06 06:18:41', '2022-04-06 06:18:41'),
(18, 'Shoes', 0, '2022-05-03 04:39:39', '2022-05-03 04:39:39'),
(19, 'kid', 18, '2022-05-03 04:40:04', '2022-05-03 04:40:04'),
(20, 'man', 18, '2022-05-03 04:40:13', '2022-05-03 04:40:13'),
(21, 'woman', 18, '2022-05-03 04:56:34', '2022-05-03 04:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'India', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(2, 'Austria', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(3, 'Azerbaijan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(4, 'Bahamas', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(5, 'Bahrain', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(6, 'Bangladesh', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(7, 'Belize', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(8, 'Benin', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(9, 'Bermuda', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(10, 'Bhutan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(11, 'Burundi', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(12, 'Cambodia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(13, 'Cameroon', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(14, 'Canada', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(15, 'Chad', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(16, 'Chile', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(17, 'China', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(18, 'Guyana', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(19, 'Hong Kong', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(20, 'Iceland', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(21, 'Australia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(22, 'Indonesia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(23, 'Iraq', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(24, 'Palau', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(25, 'Panama', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(26, 'Philippines', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(27, 'Pitcairn', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(28, 'Poland', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(29, 'Portugal', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(30, 'Puerto Rico', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(31, 'Qatar', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(32, 'Réunion', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(33, 'Romania', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(34, 'Russian', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(35, 'Rwanda', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(36, 'Senegal', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(37, 'Serbia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(38, 'Seychelles', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(39, 'Sierra Leone', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(40, 'Singapore', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(41, 'Slovakia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(42, 'Slovenia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(43, 'Solomon Islands', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(44, 'Somalia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(45, 'South Africa', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(46, 'South Sudan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(47, 'Spain', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(48, 'Sri Lanka', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(49, 'Sudan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(50, 'Suriname', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(51, 'Svalbard and Jan Mayen', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(52, 'Swaziland', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(53, 'Sweden', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(54, 'Switzerland', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(55, 'Syrian Arab Republic', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(56, 'Taiwan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(57, 'Tajikistan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(58, 'Tonga', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(59, 'Trinidad and Tobago', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(60, 'Tunisia', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(61, 'Turkey', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(62, 'Turkmenistan', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(63, 'Turks and Caicos Islands', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(64, 'Tuvalu', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(65, 'Uganda', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(66, 'Ukraine', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(67, 'United Arab Emirates', '2022-04-22 04:09:35', '2022-04-22 04:09:35'),
(68, 'United Kingdom', '2022-04-22 04:09:35', '2022-04-22 04:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `product_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(33, '1', 'name', 'Port Bliss', '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(31, '1', 'color', 'blue', '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(32, '1', 'cloth', 'cotton', '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(35, '2', 'cloth', 'cotton', '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(36, '2', 'name', 'Janasya Women\'s Pure Cotton Straight Kurta', '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(34, '1', 'size', '150cm', '2022-05-06 03:21:25', '2022-05-06 03:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `final_orders`
--

DROP TABLE IF EXISTS `final_orders`;
CREATE TABLE IF NOT EXISTS `final_orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `total_amount` int DEFAULT NULL,
  `total_quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `final_orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `final_orders`
--

INSERT INTO `final_orders` (`id`, `user_id`, `first_name`, `last_name`, `address`, `address2`, `city`, `country_id`, `postal_code`, `total_amount`, `total_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'ketan', 'prajapati', '9 geeta nager soc', 'surat', 'surat', 1, 394170, 1198, 2, '2022-04-28 00:16:27', '2022-04-28 00:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'clothes', 0, '2022-05-03 00:01:37', '2022-05-03 00:01:37'),
(2, 'mobile', 0, '2022-05-03 00:02:07', '2022-05-03 00:02:07'),
(3, 'kids', 1, '2022-05-03 00:02:44', '2022-05-03 00:02:44'),
(4, 'man', 1, '2022-05-03 00:03:03', '2022-05-03 00:03:03'),
(5, 'woman', 1, '2022-05-03 00:03:14', '2022-05-03 00:03:14'),
(6, 'jeans', 4, '2022-05-03 00:04:04', '2022-05-03 00:04:04'),
(7, 'jeans', 3, '2022-05-03 00:04:12', '2022-05-03 00:04:12'),
(8, 'jeans', 5, '2022-05-03 00:04:18', '2022-05-03 00:04:18'),
(9, 't-shirt', 3, '2022-05-03 00:09:23', '2022-05-03 00:09:23'),
(10, 't-shirt', 4, '2022-05-03 00:09:29', '2022-05-03 00:09:29'),
(11, 't-shirt', 5, '2022-05-03 00:09:35', '2022-05-03 00:09:35'),
(12, 'shirt', 3, '2022-05-03 00:09:45', '2022-05-03 00:09:45'),
(13, 'shirt', 4, '2022-05-03 00:09:59', '2022-05-03 00:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_17_095141_create_admins_table', 1),
(6, '2022_04_05_091913_create_categories_table', 2),
(7, '2022_04_05_103851_create_categories_table', 3),
(8, '2022_04_05_110724_create_categories_table', 4),
(9, '2022_04_07_043315_create_menus_table', 5),
(10, '2022_04_07_054203_create_items_table', 6),
(11, '2022_04_14_070542_create_products', 7),
(12, '2022_04_18_064735_create_photos_table', 8),
(13, '2022_04_18_065237_create_photo_details_table', 8),
(14, '2022_04_18_090829_create_product_photos_table', 9),
(15, '2022_04_21_093126_create_prods_table', 10),
(16, '2022_04_22_091550_create_country', 11),
(17, '2022_04_22_093346_create_countries_table', 12),
(18, '2022_04_22_105002_create_shipping_addresses_table', 13),
(19, '2022_04_25_065429_create_orders_table', 14),
(20, '2022_04_25_065808_create_order_items_table', 14),
(21, '2022_04_25_100159_create_payments_table', 15),
(22, '2022_04_26_090254_create_payments_table', 16),
(23, '2022_04_27_104102_create_instamojo_payments_table', 17),
(24, '2022_04_27_110319_create_orders_table', 18),
(25, '2022_04_28_053655_create_final_orders_table', 19),
(26, '2022_04_28_120311_create_payments_table', 20),
(27, '2022_05_03_103223_create_brands_table', 21),
(28, '2022_05_03_103548_create_sizes_table', 21),
(29, '2022_05_04_053605_create_woman_products_table', 22),
(30, '2022_05_04_054406_create_product_sizes_table', 22),
(31, '2022_05_04_055247_create_woman_product_images_table', 22),
(32, '2022_05_05_052147_create_features_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `total_amount` int DEFAULT NULL,
  `total_quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `address2`, `city`, `country_id`, `postal_code`, `total_amount`, `total_quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 'deep ghoghari', '102 ram app', 'near bapasitaram chok', 'surat', 1, 394105, 599, 1, '2022-04-28 23:33:03', '2022-04-28 23:33:03'),
(2, 1, 'ketan prajapati', '9 geeta nager soc', 'near dilip nagar soc', 'surat', 1, 394170, 1298, 2, '2022-04-28 23:34:59', '2022-04-28 23:34:59'),
(3, 2, 'nayan rathod', 'I-503 BK home', 'near mansarovar amroli', 'surat', 1, 394170, 12297, 3, '2022-04-28 23:39:07', '2022-04-28 23:39:07'),
(4, 1, 'ketan prajapati', '9 geeta nager soc', 'near dilip nagar soc', 'surat', 1, 394170, 599, 1, '2022-04-29 05:44:32', '2022-04-29 05:44:32'),
(5, 1, 'ketan prajapati', '9 geeta nager soc', 'near dilip nagar soc', 'surat', 1, 394170, 71990, 1, '2022-04-29 06:54:45', '2022-04-29 06:54:45'),
(6, 1, 'ketan prajapati', '8 geeta nagar soc', 'near rang nagar soc amroli', 'surat', 1, 394107, 599, 1, '2022-04-30 04:59:25', '2022-04-30 04:59:25'),
(7, 2, 'nayan rathod', 'I-503 BK home', 'near mansarovar amroli', 'surat', 1, 394170, 1198, 2, '2022-04-30 06:03:49', '2022-04-30 06:03:49'),
(17, 1, 'ketan prajapati', '9 geeta nager soc', 'jain derasar road near dilip nagar soc amroli', 'surat gujarat', 1, 394170, 998, 2, '2022-05-10 06:22:08', '2022-05-10 06:22:08'),
(14, 1, 'ketan prajapati', '8 geeta nagar soc', 'near rang nagar soc amroli', 'surat', 1, 394107, 499, 1, '2022-05-10 06:15:25', '2022-05-10 06:15:25'),
(18, 1, 'ketan prajapati', '8 geeta nagar soc', 'near rang nagar soc amroli', 'surat', 1, 394107, 10999, 1, '2022-05-10 06:25:23', '2022-05-10 06:25:23'),
(19, 1, 'ketan prajapati', '8 geeta nagar soc', 'near rang nagar soc amroli', 'surat', 1, 394107, 1148, 2, '2022-05-10 06:27:23', '2022-05-10 06:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 1, 599, '2022-04-28 23:33:03', '2022-04-28 23:33:03'),
(2, 2, 13, 2, 649, '2022-04-28 23:34:59', '2022-04-28 23:34:59'),
(3, 3, 2, 1, 10999, '2022-04-28 23:39:07', '2022-04-28 23:39:07'),
(4, 3, 13, 2, 649, '2022-04-28 23:39:07', '2022-04-28 23:39:07'),
(5, 4, 12, 1, 599, '2022-04-29 05:44:32', '2022-04-29 05:44:32'),
(6, 5, 10, 1, 71990, '2022-04-29 06:54:45', '2022-04-29 06:54:45'),
(7, 6, 12, 1, 599, '2022-04-30 04:59:25', '2022-04-30 04:59:25'),
(8, 7, 12, 2, 599, '2022-04-30 06:03:49', '2022-04-30 06:03:49'),
(10, 14, 2, 1, 499, '2022-05-10 06:15:25', '2022-05-10 06:15:25'),
(12, 17, 2, 2, 499, '2022-05-10 06:22:08', '2022-05-10 06:22:08'),
(13, 18, 2, 1, 10999, '2022-05-10 06:25:23', '2022-05-10 06:25:23'),
(14, 19, 13, 1, 649, '2022-05-10 06:27:23', '2022-05-10 06:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_request_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `name`, `email`, `mobile`, `amount`, `payment_request_id`, `payment_link`, `payment_status`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'deep', 'deep@gmail.com', '+919875698574', '599.00', 'a38645b2aa9d45a3a1fea3ad94c43c53', 'https://test.instamojo.com/@ketan_tatvamasi/a38645b2aa9d45a3a1fea3ad94c43c53', 'Credit', 'MOJO2429205A39275029', '2022-04-28 23:33:14', '2022-04-28 23:33:57'),
(2, '2', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '1298.00', '4bcd7d8b8fc64f3c82190b9a9f477889', 'https://test.instamojo.com/@ketan_tatvamasi/4bcd7d8b8fc64f3c82190b9a9f477889', 'Credit', 'MOJO2429505A39275032', '2022-04-28 23:35:07', '2022-04-28 23:35:43'),
(3, '3', 'nayan rathod', 'nayan@gmail.com', '+917854123695', '12297.00', '0a5a7c114df74f80814a364c1cb027fd', 'https://test.instamojo.com/@ketan_tatvamasi/0a5a7c114df74f80814a364c1cb027fd', 'Credit', 'MOJO2429N05A39275037', '2022-04-28 23:39:25', '2022-04-28 23:40:15'),
(4, '4', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '599.00', '9b78f1d6c62c495c905c0ee513e123cc', 'https://test.instamojo.com/@ketan_tatvamasi/9b78f1d6c62c495c905c0ee513e123cc', 'Credit', 'MOJO2429905A39275138', '2022-04-29 05:44:40', '2022-04-29 05:45:22'),
(5, '5', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '71990.00', '58aa72877020453fb7424c34c84fe871', 'https://test.instamojo.com/@ketan_tatvamasi/58aa72877020453fb7424c34c84fe871', 'Credit', 'MOJO2429V05A39275161', '2022-04-29 06:54:53', '2022-04-29 06:55:35'),
(6, '6', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+919875698574', '599.00', 'e10e1aa0b641448da8a08e9b67b6f502', 'https://test.instamojo.com/@ketan_tatvamasi/e10e1aa0b641448da8a08e9b67b6f502', 'Credit', 'MOJO2430705A22493842', '2022-04-30 04:59:32', '2022-04-30 05:00:01'),
(7, '7', 'nayan prajapati', 'nayan@gmail.com', '+917046767790', '1198.00', '18ab822725194578bc39f1dad03c0b37', 'https://test.instamojo.com/@ketan_tatvamasi/18ab822725194578bc39f1dad03c0b37', 'Credit', 'MOJO2430305A22493869', '2022-04-30 06:04:06', '2022-04-30 06:04:39'),
(9, '14', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '499.00', '63ef5397cb6f472f8b117af51550e58a', 'https://test.instamojo.com/@ketan_tatvamasi/63ef5397cb6f472f8b117af51550e58a', 'Credit', 'MOJO2510Q05A58536946', '2022-05-10 06:16:34', '2022-05-10 06:17:04'),
(10, '17', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '998.00', 'b8c14caff9784288ac4f3eb10a5e1cb4', 'https://test.instamojo.com/@ketan_tatvamasi/b8c14caff9784288ac4f3eb10a5e1cb4', 'Credit', 'MOJO2510J05A58536952', '2022-05-10 06:23:01', '2022-05-10 06:23:30'),
(11, '18', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '10999.00', '686ebef2c553451c814ea8d310ef77c4', 'https://test.instamojo.com/@ketan_tatvamasi/686ebef2c553451c814ea8d310ef77c4', 'Credit', 'MOJO2510H05A58536956', '2022-05-10 06:25:50', '2022-05-10 06:26:19'),
(12, '19', 'ketan prajapati', 'ketan.tatvamasi@gmail.com', '+917046767790', '1148.00', 'fb75f95f3a4f40f183a0508b8d1b3022', 'https://test.instamojo.com/@ketan_tatvamasi/fb75f95f3a4f40f183a0508b8d1b3022', 'Credit', 'MOJO2510S05A58536958', '2022-05-10 06:27:30', '2022-05-10 06:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrp_price` bigint DEFAULT NULL,
  `saleing_price` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `subcategory_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `decription`, `mrp_price`, `saleing_price`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'oppo a83', 'oppo a83 is best', 11999, 10999, 1, 13, '2022-04-19 00:42:17', '2022-05-02 23:11:29'),
(2, 'mi note 5', 'mi note 5', 11999, 10999, 1, 4, '2022-04-19 00:43:20', '2022-05-02 23:15:53'),
(11, 'vivo v23', 'Capture professional-looking pictures with the Vivo V23 smartphone. This mobile phone features a 50 MP front camera and a 64 MP night camera to let you capture stunning pictures every day. Moreover, it comes with a 4200 mAh battery so that you can rely on', 31990, 29990, 1, 12, '2022-04-22 01:54:44', '2022-05-02 23:26:25'),
(10, 'iphone 13', 'Photographic Styles create a personal look for your photos. But unlike filters, styles selectively apply adjustments to the right areas, while preserving skin tones.', 75990, 71990, 1, 3, '2022-04-22 01:10:57', '2022-05-02 23:20:04'),
(12, 'levi\'s', 'Levi\'s t-shirt', 699, 599, 2, 7, '2022-04-22 01:57:49', '2022-05-02 23:27:44'),
(13, 'puma', 'puma t-shrit', 799, 649, 2, 8, '2022-04-22 02:03:00', '2022-05-02 23:34:58'),
(14, 'puma man t-shrit', 'Let your style evolve with the PUMA Graphic Men\'s t-shirt. Complete with a soft and comfortable fabric, the t-shirt only gets better with the striking PUMA branding and graphic prints.', 1499, 899, 2, 7, '2022-05-03 04:05:13', '2022-05-03 04:05:13'),
(15, 'Kid t-shrit', 'Short-Sleeve T-shirt with round neck in Navy Tape Border.,', 699, 499, 2, 9, '2022-05-03 04:10:14', '2022-05-03 04:10:14'),
(16, 'Oneplus Nord  CE 2', '65W SUPERVOOC – Accelerated charge velocity shall rocket the 4500mAh battery to a day\'s power in 15 minutes. Certified by TÜV Rheinland, one shall “Charge & Play” with an absolute peace of mind.', 25999, 24999, 1, 6, '2022-05-03 04:15:04', '2022-05-03 04:15:04'),
(17, 'CAMPUS Tormentor Lace-Up Running Shoes', 'Elevate your style with this comfortable pair of running shoes. Featuring a contemporary refined design with exceptional comfort, this pair is perfect to give your quintessential dressing an upgrade', 1799, 1529, 18, 20, '2022-05-03 04:58:05', '2022-05-03 04:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_photos`
--

DROP TABLE IF EXISTS `product_photos`;
CREATE TABLE IF NOT EXISTS `product_photos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_photos_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_photos`
--

INSERT INTO `product_photos` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(31, 2, '11651553153.png', '2022-05-02 23:15:53', '2022-05-02 23:15:53'),
(30, 1, '11651552889.png', '2022-05-02 23:11:29', '2022-05-02 23:11:29'),
(36, 12, '11651553864.png', '2022-05-02 23:27:44', '2022-05-02 23:27:44'),
(33, 11, '11651553486.png', '2022-05-02 23:21:26', '2022-05-02 23:21:26'),
(39, 14, '11651570513.png', '2022-05-03 04:05:13', '2022-05-03 04:05:13'),
(32, 10, '11651553404.png', '2022-05-02 23:20:04', '2022-05-02 23:20:04'),
(34, 11, '11651553785.png', '2022-05-02 23:26:25', '2022-05-02 23:26:25'),
(38, 13, '11651554298.png', '2022-05-02 23:34:58', '2022-05-02 23:34:58'),
(37, 13, '11651554247.png', '2022-05-02 23:34:07', '2022-05-02 23:34:07'),
(29, 1, '21651552843.png', '2022-05-02 23:10:43', '2022-05-02 23:10:43'),
(40, 14, '21651570513.png', '2022-05-03 04:05:13', '2022-05-03 04:05:13'),
(41, 15, '11651570814.png', '2022-05-03 04:10:14', '2022-05-03 04:10:14'),
(42, 15, '21651570814.png', '2022-05-03 04:10:14', '2022-05-03 04:10:14'),
(43, 16, '11651571104.png', '2022-05-03 04:15:04', '2022-05-03 04:15:04'),
(44, 16, '21651571104.png', '2022-05-03 04:15:04', '2022-05-03 04:15:04'),
(45, 17, '11651573685.png', '2022-05-03 04:58:05', '2022-05-03 04:58:05'),
(46, 17, '21651573685.png', '2022-05-03 04:58:05', '2022-05-03 04:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_sizes_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(57, '1', 7, '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(56, '1', 6, '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(55, '1', 3, '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(54, '1', 10, '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(53, '1', 1, '2022-05-06 03:21:25', '2022-05-06 03:21:25'),
(62, '2', 7, '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(61, '2', 6, '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(60, '2', 4, '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(59, '2', 2, '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(58, '2', 1, '2022-05-06 06:41:21', '2022-05-06 06:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

DROP TABLE IF EXISTS `shipping_addresses`;
CREATE TABLE IF NOT EXISTS `shipping_addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `first_name`, `last_name`, `address`, `address2`, `city`, `country_id`, `postal_code`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'nayan', 'rathod', 'I-503 BK home', 'near mansarovar amroli', 'surat', 1, 394170, 2, '2022-04-27 06:36:33', '2022-04-30 06:27:00'),
(2, 'deep', 'ghoghari', '102 ram app', 'near bapasitaram chok', 'surat', 1, 394105, 4, '2022-04-23 01:10:44', '2022-04-28 23:33:03'),
(3, 'ketan', 'prajapati', '9 geeta nager soc', 'jain derasar road near dilip nagar soc amroli', 'surat gujarat', 1, 394170, 1, '2022-04-27 03:26:30', '2022-04-30 04:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'X', '2022-05-03 10:41:53', '2022-05-03 10:41:53'),
(2, 'M', '2022-05-03 10:41:53', '2022-05-03 10:41:53'),
(3, 'L', '2022-05-03 10:42:38', '2022-05-03 10:42:38'),
(4, 'S', '2022-05-03 10:42:38', '2022-05-03 10:42:38'),
(5, 'XS', '2022-05-03 10:43:34', '2022-05-03 10:43:34'),
(6, 'XL', '2022-05-03 10:43:34', '2022-05-03 10:43:34'),
(7, 'XXL', '2022-05-03 10:44:23', '2022-05-03 10:44:23'),
(8, '3XL', '2022-05-03 10:44:23', '2022-05-03 10:44:23'),
(9, '4XL', '2022-05-03 10:45:19', '2022-05-03 10:45:19'),
(10, '5XL', '2022-05-03 10:45:19', '2022-05-03 10:45:19'),
(11, '6XL', '2022-05-03 10:45:58', '2022-05-03 10:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `google_id`, `created_at`, `updated_at`) VALUES
(1, 'ketan prajapati', 'ketan.tatvamasi@gmail.com', NULL, '$2y$10$6Lh5rnZmjmtr4u4pgLDxQOGLdEyoEPHgGgvk3FTQwwwphxKinmh8W', 'fG7MIise6f11aUlkYalwxmZTtDB1QMmy3rNV6aIcUYm8DkTvuCqZGawItV5S', NULL, '2022-04-02 05:58:42', '2022-04-05 00:11:47'),
(2, 'nayan', 'nayan@gmail.com', NULL, '$2y$10$Z/CvU81O3oLYIPHJWJgc4.GJ2nSdGQiOddJD0BjR5.OOQxfdPWk.i', NULL, NULL, '2022-04-04 23:39:49', '2022-04-04 23:39:49'),
(4, 'deep', 'deep@gmail.com', NULL, '$2y$10$XtEIBPWTkNhXhO610LnbKu0Q6SHbJp8sF7OZej2/DjJ1DpoKinnQm', NULL, NULL, '2022-04-22 23:11:24', '2022-04-22 23:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `woman_products`
--

DROP TABLE IF EXISTS `woman_products`;
CREATE TABLE IF NOT EXISTS `woman_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrp_price` bigint DEFAULT NULL,
  `saleing_price` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `subcategory_id` bigint DEFAULT NULL,
  `brand_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `woman_products`
--

INSERT INTO `woman_products` (`id`, `product_name`, `decription`, `mrp_price`, `saleing_price`, `category_id`, `subcategory_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Port Bliss Women\'s Pure Cotton Printed Straight Kurti', 'Care Instructions: Hand Wash Only\r\nPort Blish Women\'s Pure Cotton Printed Straight Kurti\r\nPackage Contains: 1 Ready to Wear Kurta; Top Work : Printed || Type: Straight\r\nSleeves : 3/4 sleeve || neck : round neck\r\nOccasion :- work wear, regular wear, festiv', 1099, 999, 2, 8, 6, '2022-05-05 03:32:21', '2022-05-06 03:21:25'),
(2, 'Janasya Women\'s', 'Care Instructions: Hand Wash Only\r\nFit Type: Regular', 699, 499, 2, 8, 2, '2022-05-05 06:30:52', '2022-05-06 06:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `woman_product_images`
--

DROP TABLE IF EXISTS `woman_product_images`;
CREATE TABLE IF NOT EXISTS `woman_product_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `woman_product_images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `woman_product_images`
--

INSERT INTO `woman_product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '11651741341.png', '2022-05-05 03:32:21', '2022-05-05 03:32:21'),
(2, 1, '21651741341.png', '2022-05-05 03:32:21', '2022-05-05 03:32:21'),
(3, 2, '11651752052.png', '2022-05-05 06:30:52', '2022-05-05 06:30:52'),
(7, 2, '11651821773.png', '2022-05-06 01:52:53', '2022-05-06 01:52:53'),
(8, 2, '11651839081.png', '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(9, 2, '21651839081.png', '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(10, 2, '31651839081.png', '2022-05-06 06:41:21', '2022-05-06 06:41:21'),
(11, 2, '41651839081.png', '2022-05-06 06:41:21', '2022-05-06 06:41:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2024 at 12:00 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `publication_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `student_id`, `publication_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-16', '2024-11-26 21:47:52', '2024-11-26 21:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `article_translations`
--

DROP TABLE IF EXISTS `article_translations`;
CREATE TABLE IF NOT EXISTS `article_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_id` bigint UNSIGNED NOT NULL,
  `language` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article_translations`
--

INSERT INTO `article_translations` (`id`, `article_id`, `language`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'My First Articlee', 'This is the content in English.', '2024-11-26 21:48:57', '2024-11-28 07:58:13'),
(2, 1, 'fr', 'Mon Premier Articlee', 'Voici le contenu en français.', '2024-11-26 21:48:57', '2024-11-28 07:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Bromont', '2024-10-27 14:39:36', '2024-10-27 14:38:36'),
(2, 'Laval', '2024-10-27 14:38:36', '2024-10-27 14:38:36'),
(1, 'Montreal', '2024-10-27 14:38:36', '2024-10-27 14:38:36'),
(4, 'Granby', '2024-10-31 01:36:43', '2024-10-31 01:36:43'),
(5, 'Quebec City', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(6, 'Brossard', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(7, 'Gatineau', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(8, 'Longueuil', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(9, 'Sherbrooke', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(10, 'Saguenay', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(11, 'Trois-Rivières', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(12, 'Terrebonne', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(13, 'Saint-Jean-sur-Richelieu', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(14, 'Repentigny', '2024-10-31 01:36:44', '2024-10-31 01:36:44'),
(15, 'Drummondville', '2024-10-31 01:36:44', '2024-10-31 01:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `student_id`, `title`, `upload_date`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'PDF 1', '2024-11-19', 'uploads/files/B3CTViBR7PhFM4ESUX9Yp7nQpo2HJw4chjV6gHe2.pdf', '2024-11-20 02:34:29', '2024-11-20 02:34:29'),
(5, 2, 'Sprin 3', '2024-11-19', 'uploads/files/zsybDJDAlgJSxgh4IYA7AKhW2A6vKZWu8l6HcHRl.pdf', '2024-11-20 03:06:31', '2024-11-20 03:06:31'),
(6, 2, 'Sprint Yopta', '2024-11-19', 'uploads/files/NGHMCoyX4CRZOzrtH8lrt7bMIIV64fHveyIBFJoV.pdf', '2024-11-20 03:38:12', '2024-11-20 05:17:39'),
(7, 1, 'PDF 2', '2024-11-28', 'uploads/files/siLjD4PRoiLCyM7EcA50igODIIE80rQ1agcxOGH9.pdf', '2024-11-29 02:17:08', '2024-11-29 05:05:27'),
(9, 1, 'Title 3', '2024-11-28', 'uploads/files/4vCgSUKc7VihVPfLOXWXJMKpTzrxFHgD84meDKf3.pdf', '2024-11-29 03:10:04', '2024-11-29 05:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_11_09_223132_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etudiants_email_unique` (`email`),
  KEY `etudiants_ville_id_foreign` (`city_id`),
  KEY `students_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `address`, `phone`, `email`, `birth_date`, `city_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Miska', '474 Rue Green', '1234567890', 'miska@gmail.com', '2024-11-20', 3, '2024-11-10 08:14:40', '2024-11-10 08:22:46', 2),
(2, 'Dioniska', '463 rue brossard', '1234567890', 'dioniska@gmail.com', '2021-02-09', 6, '2024-11-10 08:25:24', '2024-11-10 08:25:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_password` varchar(45) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `temp_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dionsika', 'dioniska@gmail.com', NULL, '$2y$12$25dMvGhHhYZshu9P7szJnu0N3ryGtTHljfE8AKfCzgGhAZ3mnyqMa', NULL, NULL, '2024-10-29 06:17:09', '2024-10-29 06:17:09'),
(2, 'miska', 'miska@gmail.com', NULL, '$2y$12$T1h.InyirvjQFpds8VAOIeWuTwlm9gAM6nxopbDSG/KsgVUaF24/u', NULL, NULL, '2024-11-05 08:53:05', '2024-11-05 08:53:05'),
(3, 'Dencik', 'dencik@gmail.com', NULL, '$2y$12$idhGfNubmmNJ28rK8m.cxerQ47opIt3iQBqZKVc4gaWed7RLPA0ee', NULL, NULL, '2024-11-08 08:19:42', '2024-11-08 08:19:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

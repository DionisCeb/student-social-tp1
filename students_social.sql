-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2024 at 01:24 PM
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_student_id_foreign` (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `student_id`, `title`, `content`, `publication_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'Learn Laravel', 'I created a video where i explain how to create a laravel project with database migration', '2024-11-09', '2024-11-10 03:47:44', '2024-11-10 03:47:44'),
(2, 2, 'Learn React', 'In this section i will explain how to create an React project whee I will explain you the basics of react', '2024-11-19', '2024-11-10 03:51:45', '2024-11-10 03:51:45');

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
(3, 'Bromont', '2024-10-27 10:39:36', '2024-10-27 10:38:36'),
(2, 'Laval', '2024-10-27 10:38:36', '2024-10-27 10:38:36'),
(1, 'Montreal', '2024-10-27 10:38:36', '2024-10-27 10:38:36'),
(4, 'Granby', '2024-10-30 21:36:43', '2024-10-30 21:36:43'),
(5, 'Quebec City', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(6, 'Brossard', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(7, 'Gatineau', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(8, 'Longueuil', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(9, 'Sherbrooke', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(10, 'Saguenay', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(11, 'Trois-Rivières', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(12, 'Terrebonne', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(13, 'Saint-Jean-sur-Richelieu', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(14, 'Repentigny', '2024-10-30 21:36:44', '2024-10-30 21:36:44'),
(15, 'Drummondville', '2024-10-30 21:36:44', '2024-10-30 21:36:44');

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
(1, 'Miska', '474 Rue Green', '1234567890', 'miska@gmail.com', '2024-11-20', 3, '2024-11-10 03:14:40', '2024-11-10 03:22:46', 2),
(2, 'Dioniska', '463 rue brossard', '1234567890', 'dioniska@gmail.com', '2021-02-09', 6, '2024-11-10 03:25:24', '2024-11-10 03:25:24', 1);

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
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dionsika', 'dioniska@gmail.com', NULL, '$2y$12$25dMvGhHhYZshu9P7szJnu0N3ryGtTHljfE8AKfCzgGhAZ3mnyqMa', NULL, '2024-10-29 02:17:09', '2024-10-29 02:17:09'),
(2, 'miska', 'miska@gmail.com', NULL, '$2y$12$T1h.InyirvjQFpds8VAOIeWuTwlm9gAM6nxopbDSG/KsgVUaF24/u', NULL, '2024-11-05 03:53:05', '2024-11-05 03:53:05'),
(3, 'Dencik', 'dencik@gmail.com', NULL, '$2y$12$idhGfNubmmNJ28rK8m.cxerQ47opIt3iQBqZKVc4gaWed7RLPA0ee', NULL, '2024-11-08 03:19:42', '2024-11-08 03:19:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `files` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` BIGINT UNSIGNED NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `upload_date` DATE NOT NULL,
  `file_path` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`student_id`) REFERENCES `students`(`id`) ON DELETE CASCADE
)
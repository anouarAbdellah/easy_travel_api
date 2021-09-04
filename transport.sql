-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 09:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Casablanca', '33.566573', '-7.614899', '2021-08-15 09:48:11', '2021-08-15 09:48:11'),
(2, 'Rabat', '34.023071', '-6.793671', '2021-08-15 09:48:33', '2021-08-15 09:48:33'),
(3, 'Tanger', '35.7595', '-5.8340', '2021-08-15 09:48:58', '2021-08-15 09:48:58'),
(4, 'Fes', '34.0181', '-5.0078', '2021-08-15 09:49:20', '2021-08-15 09:49:20'),
(5, 'El jadida', '33.2316', '-8.5007', '2021-08-15 09:49:48', '2021-08-15 09:49:48'),
(6, 'Oujda', '34.6820', '-1.9002', '2021-08-15 09:50:13', '2021-08-15 09:50:13'),
(7, 'Tetouan', '35.5889', '-5.3626', '2021-08-15 09:51:14', '2021-08-15 09:51:14'),
(8, 'El Hoceima', '35.2446', '-3.9317', '2021-08-15 09:52:54', '2021-08-15 09:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `content`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', '2021-08-28 17:53:15', '2021-08-28 17:53:15'),
(2, 1, 'test comment content', 'Test name user', '2021-08-28 17:56:42', '2021-08-28 17:56:42'),
(3, 1, 'laksdj qjdmsad qndsajdh q em Ipsum est simplement', 'test user 2', '2021-08-28 17:58:19', '2021-08-28 17:58:19'),
(4, 1, 'test comment to save', 'Test user name', '2021-08-28 17:59:09', '2021-08-28 17:59:09'),
(5, 1, 'asd', 'asd', '2021-08-28 18:00:24', '2021-08-28 18:00:24'),
(6, 1, 'asd', 'asd', '2021-08-28 18:01:25', '2021-08-28 18:01:25'),
(7, 1, 'asd', 'asd', '2021-08-28 18:02:21', '2021-08-28 18:02:21'),
(8, 1, 'asd', 'asd', '2021-08-28 18:05:03', '2021-08-28 18:05:03'),
(9, 1, 'asd', 'asd 2', '2021-08-28 18:05:09', '2021-08-28 18:05:09'),
(10, 1, 'asd', 'asd', '2021-08-28 18:05:41', '2021-08-28 18:05:41'),
(11, 1, 'asldkjqw asd', 'ttt', '2021-09-04 14:15:19', '2021-09-04 14:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', 'asd xacdqw dsawad sad', '2021-09-01 16:57:46', '2021-09-01 16:57:46'),
(2, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', 'kjashd', '2021-09-04 14:18:16', '2021-09-04 14:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `email`, `phone`, `rib`, `cin`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Samir', 'samir@mail.com', '0633333333', '89898989898989898989898333', 'BB999999', 'http://127.0.0.1:8000/uploads/photo-1507003211169-0a1dd7228f2d1630537551.jpg', 2, '2021-08-15 09:59:21', '2021-09-01 22:05:51'),
(2, 'Amine', 'amine@mail.com', '06666666666', '121212121212121121212121212', 'BB887878', 'http://127.0.0.1:8000/uploads/photo-1500648767791-00dcc994a43e1630537565.jpg', 2, '2021-08-15 09:59:55', '2021-09-01 22:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_25_093233_create_cities_table', 2),
(5, '2021_07_25_144453_create_drivers_table', 2),
(6, '2021_07_25_150134_create_vehicles_table', 2),
(7, '2021_08_15_113937_create_trips_table', 3),
(8, '2021_08_15_123937_create_points_table', 3),
(10, '2021_08_15_182300_create_posts_table', 4),
(11, '2021_08_28_160902_create_comments_table', 5),
(12, '2021_08_15_133807_create_reservations_table', 6),
(13, '2021_09_01_173228_create_contacts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `trip_id`, `city_id`, `time`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-09-08 19:24:00', 0.00, '2021-08-15 17:43:59', '2021-09-01 07:35:16'),
(2, 2, 2, '2021-09-08 21:24:00', 20.00, '2021-08-15 17:43:59', '2021-09-01 07:35:16'),
(3, 2, 4, '2021-09-09 00:25:00', 30.00, '2021-08-15 17:43:59', '2021-09-01 07:35:16'),
(4, 2, 6, '2021-09-09 01:26:00', 40.00, '2021-08-15 17:43:59', '2021-09-01 07:35:16'),
(5, 3, 1, '2021-09-08 13:14:00', 0.00, '2021-09-01 12:15:16', '2021-09-04 08:52:14'),
(6, 3, 2, '2021-09-08 14:14:00', 20.00, '2021-09-01 12:15:16', '2021-09-04 08:52:14'),
(7, 3, 4, '2021-09-08 15:15:00', 20.00, '2021-09-01 12:15:16', '2021-09-04 08:52:14'),
(8, 4, 1, '2021-09-08 15:54:00', 0.00, '2021-09-04 08:55:37', '2021-09-04 08:55:37'),
(9, 4, 2, '2021-09-08 16:54:00', 20.00, '2021-09-04 08:55:37', '2021-09-04 08:55:37'),
(10, 4, 3, '2021-09-08 17:55:00', 40.00, '2021-09-04 08:55:37', '2021-09-04 08:55:37'),
(11, 5, 1, '2021-09-08 14:05:00', 0.00, '2021-09-04 09:05:36', '2021-09-04 09:05:36'),
(12, 5, 2, '2021-09-08 15:05:00', 30.00, '2021-09-04 09:05:36', '2021-09-04 09:05:36'),
(13, 6, 1, '2021-09-09 18:13:00', 0.00, '2021-09-04 14:14:21', '2021-09-04 14:14:21'),
(14, 6, 2, '2021-09-09 19:13:00', 20.00, '2021-09-04 14:14:21', '2021-09-04 14:14:21'),
(15, 6, 3, '2021-09-09 21:14:00', 40.00, '2021-09-04 14:14:21', '2021-09-04 14:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Test post', 'http://127.0.0.1:8000/uploads/image1630537380.jpg', '<p>Le <i><strong>Lorem Ipsum</strong></i> est simplement du faux texte employé dans la composition et la mise en page avant impression. Le <i><strong>Lorem Ipsum</strong></i> est le faux texte standard.<br><br><br>Le <i><strong>Lorem Ipsum</strong></i> est simplement du faux texte employé dans la composition et la mise en page avant impression. Le <i><strong>Lorem Ipsum</strong></i> est le faux texte standard Le <i><strong>Lorem Ipsum</strong></i> est simplement du faux texte employé dans la composition et la mise en page avant impression. Le <i><strong>Lorem Ipsum</strong></i> est le faux texte standard Le <i><strong>Lorem Ipsum</strong></i> est simplement du faux texte employé dans la composition et la mise en page avant impression. Le <i><strong>Lorem Ipsum</strong></i> est le faux texte standard.</p><p>&nbsp;</p><p>Le <i><strong>Lorem Ipsum</strong></i> est simplement du faux texte employé dans la composition et la mise en page avant impression.</p>', 2, '2021-08-15 18:07:43', '2021-09-01 22:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat` int(11) DEFAULT NULL,
  `cart` int(11) DEFAULT NULL,
  `trip_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_point_id` bigint(20) UNSIGNED DEFAULT NULL,
  `end_point_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `number`, `seat`, `cart`, `trip_id`, `start_point_id`, `end_point_id`, `created_at`, `updated_at`) VALUES
(1, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'pRYbujMb', 24, NULL, 2, 1, 1, '2021-09-01 11:39:29', '2021-09-01 11:39:29'),
(2, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'R62tUzyN', 25, NULL, 2, 1, 1, '2021-09-01 11:39:29', '2021-09-01 11:39:29'),
(3, 'Abdellah Anouar', 'wrolfson@example.org', '0633333333', 't7nzCe7o', 28, NULL, 2, 1, 3, '2021-09-01 12:00:06', '2021-09-01 12:00:06'),
(4, 'Abdellah Anouar', 'wrolfson@example.org', '0633333333', 'ekXNxrAp', 29, NULL, 2, 1, 3, '2021-09-01 12:00:06', '2021-09-01 12:00:06'),
(5, 'Abdellah Anouar', 'treutel.ana@beer.com', '0633333333', '7ntJ32yl', 4, NULL, 2, 1, 3, '2021-09-01 12:02:08', '2021-09-01 12:02:08'),
(6, 'Abdellah Anouar', 'treutel.ana@beer.com', '0633333333', 'pyhY48KH', 21, NULL, 2, 1, 3, '2021-09-01 12:02:08', '2021-09-01 12:02:08'),
(7, 'Abdellah Anouar', 'wrolfson@example.org', '0633333333', 'O73CKa3N', 12, 1, 3, 5, 7, '2021-09-01 12:48:45', '2021-09-01 12:48:45'),
(8, 'Abdellah Anouar', 'wrolfson@example.org', '0633333333', '0HBdiA0m', 13, 1, 3, 5, 7, '2021-09-01 12:48:46', '2021-09-01 12:48:46'),
(9, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', '6s3yNEhF', 12, NULL, 2, 1, 3, '2021-09-01 13:14:02', '2021-09-01 13:14:02'),
(10, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'WAcyfRXB', 8, 0, 3, 5, 7, '2021-09-01 13:17:24', '2021-09-01 13:17:24'),
(11, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', '4cz7bMNy', 44, NULL, 2, 1, 3, '2021-09-01 13:36:39', '2021-09-01 13:36:39'),
(12, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'Zeequg27', 20, NULL, 2, 1, 3, '2021-09-01 13:39:38', '2021-09-01 13:39:38'),
(13, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'MY4kzqF9', 20, NULL, 2, 1, 3, '2021-09-01 13:40:53', '2021-09-01 13:40:53'),
(14, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'VZ96cdD2', 5, NULL, 2, 1, 3, '2021-09-01 13:41:54', '2021-09-01 13:41:54'),
(15, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'oKD5ezEr', 17, NULL, 2, 1, 3, '2021-09-01 13:44:00', '2021-09-01 13:44:00'),
(16, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'D2L26RVS', 12, 0, 3, 5, 7, '2021-09-01 22:12:40', '2021-09-01 22:12:40'),
(17, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'HicgrWLN', 20, 0, 3, 5, 7, '2021-09-01 22:12:41', '2021-09-01 22:12:41'),
(18, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'aAkCjsF1', 20, 1, 3, 5, 7, '2021-09-01 23:26:09', '2021-09-01 23:26:09'),
(19, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'c2yyseA4', 9, NULL, 4, 8, 10, '2021-09-04 08:58:18', '2021-09-04 08:58:18'),
(20, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'Zq15n4YG', 14, NULL, 4, 8, 10, '2021-09-04 08:58:18', '2021-09-04 08:58:18'),
(21, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'Amv0Mbo5', 17, NULL, 5, 11, 12, '2021-09-04 09:13:14', '2021-09-04 09:13:14'),
(22, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'es0kMGFM', 40, NULL, 5, 11, 12, '2021-09-04 09:13:14', '2021-09-04 09:13:14'),
(23, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'N8NhQB1z', 9, 2, 3, 5, 6, '2021-09-04 09:54:48', '2021-09-04 09:54:48'),
(24, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'cwVPEIOV', 34, NULL, 5, 11, 12, '2021-09-04 14:00:23', '2021-09-04 14:00:23'),
(25, 'Abdellah Anouar', 'anouarabdellah0@gmail.com', '0633333333', 'PjcymwAX', 41, NULL, 2, 1, 2, '2021-09-04 14:17:04', '2021-09-04 14:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `corona_mode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `vehicle_id`, `driver_id`, `start`, `corona_mode`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 2, '2021-09-08 19:24:00', 1, '2021-08-15 17:43:59', '2021-09-01 07:35:16'),
(3, 2, 3, 1, '2021-09-08 13:14:00', 1, '2021-09-01 12:15:16', '2021-09-04 08:52:14'),
(4, 2, 4, 1, '2021-09-08 15:54:00', 0, '2021-09-04 08:55:37', '2021-09-04 08:55:37'),
(5, 2, 5, 1, '2021-09-08 14:02:00', 0, '2021-09-04 09:05:36', '2021-09-04 09:05:36'),
(6, 2, 2, 1, '2021-09-09 16:12:00', 1, '2021-09-04 14:14:21', '2021-09-04 14:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$JrSAhazwTvwNBgt5BUZWFe2cJbdQrfPjA7tseSH46GkyclydWJQxu', 'admin', NULL, '2021-07-03 13:14:14', '2021-07-03 13:14:14'),
(2, 'CTM', 'anouarabdellah0@gmail.com', NULL, '$2y$10$PTRzlTOPV4iykxzxeF7QVO5QNJaENbuFHSxrCQR.VYWWSKJsaT6Kq', 'client', NULL, '2021-08-15 09:47:41', '2021-08-15 09:47:41'),
(3, 'test', 'test-client@mail.com', NULL, '$2y$10$hDbhs13mjBvDC5xjRzZvHua9.B9UF0XycQjFibtPZnuYllgUzk5pC', 'client', NULL, '2021-09-04 14:11:06', '2021-09-04 14:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `carts` int(11) DEFAULT NULL,
  `equipements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `type`, `number`, `seats`, `carts`, `equipements`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Car 1', 'Car', '2378 - b7', 44, NULL, 'wifi,free masks,free water,air-conditioner,lagage service', 'http://127.0.0.1:8000/uploads/gettyimages-136521748-612x6121629027081.jpg', 2, '2021-08-15 10:28:38', '2021-08-28 19:50:41'),
(3, 'Train 1', 'Train', '23783 - b787', 20, 3, 'wifi,lagage service,waiting room', 'http://127.0.0.1:8000/uploads/istockphoto-457433171-612x6121630502054.jpg', 2, '2021-09-01 12:14:15', '2021-09-01 12:14:15'),
(4, 'Mini bus 1', 'Mini bus', '12357 - b72', 20, NULL, 'air-conditioner,lagage service,waiting room,individual lamp', 'http://127.0.0.1:8000/uploads/Van_Vliet_Automotive_Trading_Holland_vto1120-toyota hiace std roof 4x4 mini bus1630749226.jpg', 2, '2021-09-04 08:53:46', '2021-09-04 08:53:46'),
(5, 'Autobus 40', 'Car', '9828-c98', 40, NULL, 'wifi,air-conditioner,lagage service,individual lamp', 'http://127.0.0.1:8000/uploads/depositphotos_4061648-stock-photo-bus-in-motion-on-the1630749765.jpg', 2, '2021-09-04 09:02:45', '2021-09-04 09:02:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `end_point_id` (`end_point_id`),
  ADD KEY `start_point_id` (`start_point_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`end_point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`start_point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

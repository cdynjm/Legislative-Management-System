-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2024 at 07:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filems`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `admin_id`, `category`, `parent_id`, `created_at`, `updated_at`) VALUES
(22, 1, 'Health Ordinance', 0, '2024-04-18 05:44:18', '2024-04-18 05:44:18'),
(23, 1, 'Health and Sanitation Ordinance', 0, '2024-01-04 23:55:05', NULL),
(24, 1, 'Environmental Ordinance', 0, '2024-01-29 04:04:07', '2024-01-29 04:04:07'),
(25, 1, 'Revenue Ordinance', 0, '2024-01-19 09:47:48', '2024-01-19 09:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `coauthor`
--

CREATE TABLE `coauthor` (
  `id` int NOT NULL,
  `fileid` int DEFAULT NULL,
  `author` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `coauthor`
--

INSERT INTO `coauthor` (`id`, `fileid`, `author`, `created_at`, `updated_at`) VALUES
(34, 18, 13, '2024-04-18 05:44:30', '2024-04-18 05:44:30'),
(35, 18, 19, '2024-04-18 05:44:30', '2024-04-18 05:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `folder_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `status_sp` int DEFAULT NULL,
  `ordinance_title` longtext,
  `author` varchar(255) DEFAULT NULL,
  `co_author` varchar(255) DEFAULT NULL,
  `first` date DEFAULT NULL,
  `second` date DEFAULT NULL,
  `third` date DEFAULT NULL,
  `ordinance_number` varchar(255) DEFAULT NULL,
  `final_title` longtext,
  `enactment_date` date DEFAULT NULL,
  `lce_approval` date DEFAULT NULL,
  `transmittal` date DEFAULT NULL,
  `sp_sl` date DEFAULT NULL,
  `posted` int DEFAULT NULL,
  `published` int DEFAULT NULL,
  `status_implementation` text,
  `filename` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `archive` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `admin_id`, `folder_id`, `status`, `status_sp`, `ordinance_title`, `author`, `co_author`, `first`, `second`, `third`, `ordinance_number`, `final_title`, `enactment_date`, `lce_approval`, `transmittal`, `sp_sl`, `posted`, `published`, `status_implementation`, `filename`, `extension`, `archive`, `created_at`, `updated_at`) VALUES
(18, 1, 22, 1, NULL, 'An Ordinance establishing the Local Epidemiology Surveillance Unit (LESU) of the Municipality of Sogod, Southern Leyte. Defining in compliance with Republic Act. 11332 (Otherwise known as the \"Mandatory Reporting of Notifiable Disease and Health Events of Public Concern Act.\")', '12', '[\"13\",\"19\",null]', '2024-04-18', '2024-04-25', '2024-04-08', '2023-276', 'An Ordinance establishing the Local Epidemiology Surveillance Unit (LESU) of the Municipality of Sogod, Southern Leyte. Defining in compliance with Republic Act. 11332 (Otherwise known as the \"Mandatory Reporting of Notifiable Disease and Health Events of Public Concern Act.\")', '2024-04-16', '2024-04-16', '2024-04-24', '2024-04-22', 1, 1, NULL, '20240418-111057.pdf', 'pdf', NULL, '2024-04-18 05:44:30', '2024-04-18 05:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `admin_id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'municipality-of-sogod-20240111-081416.gif', '2024-01-11 08:14:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `civil_status` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `status` int DEFAULT NULL,
  `from_year` date DEFAULT NULL,
  `to_year` date DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `admin_id`, `name`, `birthdate`, `address`, `civil_status`, `position`, `gender`, `status`, `from_year`, `to_year`, `photo`, `created_at`, `updated_at`) VALUES
(11, 1, 'Golo Jose Ramil', '2024-04-18', 'Sogod Southern Leyte', 'Married', '2', 'Male', 1, NULL, NULL, 'golo-jose-ramil-20240418-090812.png', '2024-04-18 01:08:12', '2024-04-18 01:08:12'),
(12, 1, 'Villa Marilyn', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Female', 1, NULL, NULL, 'villa-20240418-090708.png', '2024-04-18 01:07:08', '2024-04-18 01:07:08'),
(13, 1, 'Casil Sr. Alberto', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Male', 1, NULL, NULL, 'casil-sr-20240418-090757.png', '2024-04-18 01:07:57', '2024-04-18 01:07:57'),
(14, 1, 'Terante Sr. Rolando', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Male', 1, NULL, NULL, 'terante-sr-20240418-090903.png', '2024-04-18 01:09:03', '2024-04-18 01:09:03'),
(15, 1, 'Olo Rufo', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Male', 1, NULL, NULL, 'olo-20240418-090951.png', '2024-04-18 01:09:51', '2024-04-18 01:09:51'),
(16, 1, 'Faelnar Eliseo', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Male', 1, NULL, NULL, 'faelnar-20240418-091044.png', '2024-04-18 01:10:44', '2024-04-18 01:10:44'),
(17, 1, 'Feliano Patrick', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Male', 1, NULL, NULL, 'feliano-20240418-091124.png', '2024-04-18 01:11:24', '2024-04-18 01:11:24'),
(18, 1, 'Yu Rogelyn', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Female', 1, NULL, NULL, 'yu-20240418-091249.png', '2024-04-18 01:12:49', '2024-04-18 01:12:49'),
(19, 1, 'Dejarme Alna', '2024-04-18', 'Sogod Southern Leyte', 'Married', '3', 'Female', 1, NULL, NULL, 'dejarme-20240418-091636.png', '2024-04-18 01:16:36', '2024-04-18 01:16:36'),
(20, 1, 'Tan Sheffered Lino', '2024-04-18', 'Sogod Southern Leyte', 'Married', '1', 'Male', 1, NULL, NULL, 'tan-20240418-091754.png', '2024-04-18 01:17:54', '2024-04-18 01:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `admin_id`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(1, 1, 'A growing economic and educational hub with vibrant commerce and trade, diversified agricultural industry in Southern Leyte with clean, green, safe environment inhabited by empowered and disaster-resilient community, governed by dynamic and responsive leaders.', 'Pursue enhance revenue generation system,\r\nImprove agriculture productivity,\r\nAdvance infrastructure development in support to agriculture,\r\nProvide livelihood opportunities,\r\nPeriodic review of business and economic programs and policies,\r\nEnhanced basic integrated health, education and other social services,\r\nPromote peace and order,\r\nPursue development activities for the protection & management of environment,\r\nPromote climate change adaption, disaster awareness and preparedness in the community,\r\nImprove the implementation of solid waste management program.', '2024-04-18 06:13:40', '2024-04-18 06:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `suggestions` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `name`, `suggestions`, `created_at`, `updated_at`) VALUES
(4, 'Jemuel Cadayona', 'Hello, I just wanted to recommend an ordinance about curfews. Please establish a law requiring curfews to be applied beginning at 10 p.m.', '2024-04-18 05:50:16', '2024-04-18 05:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `userid` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `admin_id`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Municipality of Sogod', 'sogod@gmail.com', '$2y$10$rUMhYOAAn2ze7D7Ymzs.D.frfD1WtajKqbwHSJsttaZP8XaYDrLqK', 9061958437, 'Sogod Southern Leyte', NULL, NULL, 0, 1, '2023-07-11 17:51:33', '2024-04-18 06:13:40'),
(13, 11, NULL, 'jose@gmail.com', '$2y$10$.0I2UQSZcYC7UT34xQA7Oum9.T3J6DS9z60ZOWgKmriBCMtSMCARW', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 00:44:10', '2024-04-18 01:08:12'),
(14, 12, NULL, 'marilyn@gmail.com', '$2y$10$6CEacdLBQSuhKB0jn2Lc6.yU/jmmGdez2SLJKIHO.vgjzqYk6RJO2', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:07:08', '2024-04-18 01:07:08'),
(15, 13, NULL, 'alberto@gmail.com', '$2y$10$xZBfxxM7zC3NicZE9EIX4eYWzlm02yu3rB4UOwjk6MsVoZTZ52UK.', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:07:57', '2024-04-18 01:07:57'),
(16, 14, NULL, 'rolando@gmail.com', '$2y$10$1gb/khWNUSnNXEsTFXofaeyiBj8LFzWEPvTkG/xquZ4bUBtqZb3sK', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:09:03', '2024-04-18 01:09:03'),
(17, 15, NULL, 'rufo@gmail.com', '$2y$10$V.8QOLzEX3o/6yFVbCzd1OaFEcw2eEeLZMzLU2nPTcyZTyTTBsIwe', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:09:51', '2024-04-18 01:09:51'),
(18, 16, NULL, 'eliseo@gmail.com', '$2y$10$bhx25jrJbUFcKuC3ES159eiWh7MEURJSiOQO5MgdISLVq8pje8Mzm', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:10:44', '2024-04-18 01:10:44'),
(19, 17, NULL, 'patrick@gmail.com', '$2y$10$ELwasfX/BuJ8WOu6hcVnRekOUs9Kwa/.IhsftR0zMuA17sUfcRUiK', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:11:24', '2024-04-18 01:11:24'),
(20, 18, NULL, 'rogelyn@gmail.com', '$2y$10$/l33XQ9.q23KAyFineROze/kFxX6LVlz.S5uFy8yijzqHw.LZ0m/6', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:12:49', '2024-04-18 01:12:49'),
(21, 19, NULL, 'alna@gmail.com', '$2y$10$ckl/HUUbHjX0Ar1wYGlxQ.1d/KHK14RoTPFsbmIiq3ZHC3pnq/m9.', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:16:36', '2024-04-18 01:16:36'),
(22, 20, NULL, 'sheffered@gmail.com', '$2y$10$5oX0X.Y48vzs4YtydxgNNeQeA7mYyAVbG8UzLSoNzhwwzExpVJxYK', NULL, NULL, NULL, NULL, 1, 0, '2024-04-18 01:17:54', '2024-04-18 01:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coauthor`
--
ALTER TABLE `coauthor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `coauthor`
--
ALTER TABLE `coauthor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

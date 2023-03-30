-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 09:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_21_163849_create_projects_table', 2),
(6, '2023_03_21_164125_create_floors_table', 2),
(7, '2023_03_21_172327_create_projects_table', 3),
(8, '2023_03_21_172334_create_floors_table', 3),
(9, '2023_03_21_172537_create_floors_table', 4),
(10, '2023_03_21_172856_create_units_table', 5),
(11, '2023_03_27_191414_create_questions_records_table', 6),
(12, '2023_03_28_140648_create_subject_records_table', 6),
(13, '2023_03_28_142924_create_students_results_records_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 16, 'API Token', '5ec7e83abd328ff80694be9e756cd138df197557cc477afbdb96fe02f0e01cf9', '[\"*\"]', NULL, NULL, '2023-03-22 03:41:55', '2023-03-22 03:41:55'),
(2, 'App\\Models\\User', 17, 'API Token', 'e8bc7c6ce85978cf6f00f5fcaef244f7c27df3bc4621548908a42d49c24a2a1c', '[\"*\"]', NULL, NULL, '2023-03-22 03:43:52', '2023-03-22 03:43:52'),
(9, 'App\\Models\\User', 18, 'API TOKEN', '871fd0d63f4f2ba1a205a2824d78fdf9a0acb131f3bfd94391b57ee0091dcd83', '[\"*\"]', '2023-03-22 07:03:08', NULL, '2023-03-22 04:30:09', '2023-03-22 07:03:08'),
(10, 'App\\Models\\User', 18, 'API TOKEN', '5f1b0efc78fce1aea0a180348e4b14e8047da64fec2fbb4fce6524362606ed5e', '[\"*\"]', '2023-03-22 07:49:32', NULL, '2023-03-22 07:03:44', '2023-03-22 07:49:32'),
(11, 'App\\Models\\User', 18, 'API TOKEN', 'cd2ab70cb8064838c8d38bdb055ffd5c74064e3b4cc90894238f0097d7f19a64', '[\"*\"]', '2023-03-22 14:16:37', NULL, '2023-03-22 13:38:02', '2023-03-22 14:16:37'),
(12, 'App\\Models\\User', 18, 'API TOKEN', '95f3136b98fdb129c09c17774f28d72dd2088100018dddeec1dd3cd45102466e', '[\"*\"]', '2023-03-23 07:28:23', NULL, '2023-03-23 04:14:28', '2023-03-23 07:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `questions_records`
--

CREATE TABLE `questions_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `subject` int(11) NOT NULL DEFAULT 0,
  `question` text NOT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions_records`
--

INSERT INTO `questions_records` (`id`, `added_by`, `subject`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`, `score`, `active`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 'PHP stands For ?', 'Programming Hyper Text', 'Pre Hyper Programming', 'Pro Hyper Programming', 'Hyper Text Preprocessor', 'option4', 1, 1, '2023-03-28 14:56:13', '2023-03-28 14:56:13'),
(2, 18, 2, 'AJAX is ', 'JavaScript Library ', 'Programming language', 'Asynchronous JavaScript And XML', 'Json XML', 'option3', 1, 1, '2023-03-28 14:56:13', '2023-03-28 14:56:13'),
(3, 18, 2, 'Shortcut for jQuery is ? ', 'the $ sign', 'the % sign', 'the @ sign', 'the & sign', 'option1', 1, 1, '2023-03-28 14:56:13', '2023-03-28 14:56:13'),
(4, 18, 2, 'How many sizes of headers are available in HTML by default ?', '4', '6', '3', '8', 'option2', 1, 1, '2023-03-28 14:56:13', '2023-03-28 14:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `students_results_records`
--

CREATE TABLE `students_results_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_id` bigint(20) UNSIGNED NOT NULL,
  `std_name` varchar(255) DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` int(11) NOT NULL DEFAULT 0,
  `correct_answer` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_records`
--

CREATE TABLE `subject_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_records`
--

INSERT INTO `subject_records` (`id`, `added_by`, `title`, `code`, `active`, `created_at`, `updated_at`) VALUES
(1, 18, 'PHP', 'php', 1, '2023-03-28 14:54:18', '2023-03-27 19:00:00'),
(2, 18, 'AJAX', 'ajax', 1, '2023-03-28 14:54:35', '2023-03-28 14:54:35'),
(3, 18, 'MYSQLI', 'mysqli', 1, '2023-03-28 14:54:35', '2023-03-28 14:54:35'),
(4, 18, 'HTML', 'html', 1, '2023-03-28 14:55:33', '2023-03-28 14:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'bilal khan', 'x09bilal@gmail.com', NULL, '$2y$10$1Eii8F5fCxFmNczZeeduROgmkEx89Y9KgeSDovIhbCmb.kXChT59m', NULL, '2023-03-22 03:47:43', '2023-03-22 03:47:43'),
(19, 'Juniad ', 'junaid@gmail.com', NULL, '$2y$10$1Eii8F5fCxFmNczZeeduROgmkEx89Y9KgeSDovIhbCmb.kXChT59m', NULL, '2023-03-22 03:47:43', '2023-03-22 03:47:43');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions_records`
--
ALTER TABLE `questions_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_records_added_by_foreign` (`added_by`);

--
-- Indexes for table `students_results_records`
--
ALTER TABLE `students_results_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_results_records_std_id_foreign` (`std_id`),
  ADD KEY `students_results_records_question_id_foreign` (`question_id`);

--
-- Indexes for table `subject_records`
--
ALTER TABLE `subject_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_records_added_by_foreign` (`added_by`);

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions_records`
--
ALTER TABLE `questions_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students_results_records`
--
ALTER TABLE `students_results_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_records`
--
ALTER TABLE `subject_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions_records`
--
ALTER TABLE `questions_records`
  ADD CONSTRAINT `questions_records_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `students_results_records`
--
ALTER TABLE `students_results_records`
  ADD CONSTRAINT `students_results_records_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions_records` (`id`),
  ADD CONSTRAINT `students_results_records_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subject_records`
--
ALTER TABLE `subject_records`
  ADD CONSTRAINT `subject_records_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

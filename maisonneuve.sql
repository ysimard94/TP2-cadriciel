-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2023 at 12:44 AM
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
-- Database: `maisonneuve2194679`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`, `language_id`) VALUES
(8, 'hTesthsg', 'teteteteteste', 1, '2023-04-07 02:28:27', '2023-04-07 02:33:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles_has_languages`
--

CREATE TABLE `articles_has_languages` (
  `articles_id` bigint(20) UNSIGNED NOT NULL,
  `languages_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New Elishamouth', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(2, 'North Desiree', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(3, 'East Elisabeth', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(4, 'Adamsborough', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(5, 'North Beverlyfort', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(6, 'Okunevatown', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(7, 'Deonfort', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(8, 'Kerluketown', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(9, 'Eunashire', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(10, 'Port Valerie', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(11, 'New Idafurt', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(12, 'North Cassidyshire', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(13, 'East Kelsiechester', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(14, 'Croninburgh', '2023-03-12 02:38:19', '2023-03-12 02:38:19'),
(15, 'Feliciamouth', '2023-03-12 02:38:19', '2023-03-12 02:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'en'),
(2, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_03_11_205417_create_students_table', 1),
(3, '2023_03_11_205441_create_cities_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2023_04_05_175529_create_users_table', 2),
(6, '2023_04_05_181551_create_users_table', 3),
(7, '2023_04_05_175922_create_articles_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `address`, `city_id`, `created_at`, `updated_at`, `user_id`) VALUES
(89, 'Dr. Marco Dooley Jr.', '(850) 257-4920 x707', '66241 Danial Circle\nLake Pascaleport, NS  A9L 3B1', 3, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(90, 'Deanna Barrows', '608-800-7766 x932', '372 Gaetano Parkway\nPasqualeside, BC  C9J4V2', 13, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(91, 'Sophie Yundt', '1-135-573-9314', '872 Mavis Forest\nAuerfurt, NS  J8B 5H9', 5, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(92, 'Prof. Justina Zboncak', '(938) 849-3475', '84797 Reilly Glens Apt. 374\nKoeppport, SK  E7L-4J7', 9, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(93, 'Sanford O\'Conner', '916-410-6765 x974', '194 Reynolds Radial Suite 211\nNorth Ashton, YT  B4H 2B5', 11, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(94, 'Herminio Crooks', '657-953-5669', '9691 Balistreri Falls Suite 343\nKertzmannview, QC  B7N 7E7', 4, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(95, 'Chelsey Pouros', '1 (396) 928-4995', '61606 Kira Village Apt. 695\nCotyland, NT  K6V 1K7', 3, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(96, 'Abbigail Bogisich', '108-721-6718 x429', '451 Cole Meadow Apt. 399\nHaagfurt, BC  Y3M3B3', 7, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(97, 'Josianne Blick', '(685) 401-0313', '3298 Adrien Corner Suite 175\nPort Oswaldoview, NT  X1Y4E4', 10, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(98, 'Doris Adams', '(874) 089-4133', '56642 Deckow Via Suite 523\nPort Odessatown, YT  T6B-8G1', 12, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(99, 'Kari Prosacco', '945.221.1327', '75656 Spinka Locks\nSouth Jaceyside, NS  Y9P3N1', 6, '2023-03-12 02:39:11', '2023-03-12 02:39:11', 0),
(108, 'Steve', '52351235123', '5123', 12, '2023-04-05 23:56:09', '2023-04-05 23:56:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'steve@gmail.com', '$2y$10$h4GyWi/LQzRgA5j8PLdu0eh2JyWlTCGq57Q7edKIw6sTTBC.Ij0gO', NULL, '2023-04-05 22:44:58', '2023-04-05 22:44:58'),
(2, 'test@gmail.com', '$2y$10$01nSy1pXGkTWGhyu6KbN0.ZJriJqh1Y9/Xt9LReKr96ciDT16DMm2', NULL, '2023-04-06 02:16:42', '2023-04-06 02:16:42'),
(3, 'test2@gmail.com', '$2y$10$0KIjK4nO8.fNySvtAxDAGecVuwIa0jEogEV1e.a9BIvNFo9cekdeu', NULL, '2023-04-06 02:18:19', '2023-04-06 02:18:19'),
(4, 'test3@gmail.com', '$2y$10$TAKRHWQHbXbQ8uuSGfxJou0.yoJmuoMrPwqJ6JzQ6bw80a0XJ.91G', NULL, '2023-04-06 02:19:22', '2023-04-06 02:19:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `fk_articles_languages1_idx` (`language_id`);

--
-- Indexes for table `articles_has_languages`
--
ALTER TABLE `articles_has_languages`
  ADD PRIMARY KEY (`articles_id`,`languages_id`),
  ADD KEY `fk_articles_has_languages_languages1_idx` (`languages_id`),
  ADD KEY `fk_articles_has_languages_articles1_idx` (`articles_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_files_languages1_idx` (`language_id`),
  ADD KEY `fk_files_users1_idx` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_city_id_foreign` (`city_id`),
  ADD KEY `fk_students_users1_idx` (`user_id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_articles_languages1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `articles_has_languages`
--
ALTER TABLE `articles_has_languages`
  ADD CONSTRAINT `fk_articles_has_languages_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_has_languages_languages1` FOREIGN KEY (`languages_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_files_languages1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_files_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

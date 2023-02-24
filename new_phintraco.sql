-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2023 at 08:47 AM
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
-- Database: `new_phintraco`
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internalId` varchar(255) NOT NULL,
  `itemid` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itms`
--

CREATE TABLE `itms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `internalId` varchar(255) NOT NULL,
  `itemid` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itms`
--

INSERT INTO `itms` (`id`, `internalId`, `itemid`, `displayname`, `created_at`, `updated_at`) VALUES
(1, '9618', 'Attainment Factor', 'Attainment Factor', '2023-02-16 23:46:03', '2023-02-16 23:46:03'),
(2, '9597', 'Avaya and Verint COGS', 'Avaya and Verint COGS', '2023-02-16 23:50:06', '2023-02-16 23:50:06');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2023_01_16_114413_create_projects_table', 1),
(11, '2023_02_01_093139_create_presensimasuks_table', 1),
(12, '2023_02_03_141822_create_presensis_table', 1),
(13, '2023_02_13_165648_create_perusahaans_table', 2),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(15, '2023_02_16_080154_create_items_table', 3),
(16, '2023_02_17_063631_create_itms_table', 4),
(17, '2023_02_24_013337_create_pegawais_table', 5),
(18, '2023_02_24_022550_create_pegawais_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `uuid` char(36) NOT NULL DEFAULT uuid(),
  `parent_uuid` char(36) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `department_code` varchar(25) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `empl_id` varchar(25) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `ext_no` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`uuid`, `parent_uuid`, `company_id`, `department_code`, `name`, `email`, `empl_id`, `join_date`, `ext_no`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
('5dd3e33a-b417-11ed-baa4-46579262b49d', 'EB7DBB5D-5F49-4B1A-8254-225A677D6385', 7, 'DEPTBD', 'Qori', 'qori@phintraco.com', '2220714011-QSW', '2022-09-14', '0', '2023-02-24 00:46:36', '2023-02-24 00:46:36', NULL, 1, 1, NULL),
('64a9aae4-b3f6-11ed-baa4-46579262b49d', 'EB7DBB5D-5F49-4B1A-8254-225A677D6385', 7, 'DEPTBD', 'Ferlin Firdaus Turnip', 'firdaus.turnip@phintraco.com', '2230201061-FET', '2023-02-01', '123', '2023-02-23 20:24:36', '2023-02-23 20:24:36', NULL, 1, 1, NULL),
('6eb480de-b3f8-11ed-baa4-46579262b49d', '16348673-00E7-427A-A4BB-0799F3244044', 7, 'PTIN', 'Vincent Philips Siahaya', 'vincent@phintraco.com', '2080310011-VS', '2008-03-10', '0', '2023-02-23 21:05:10', '2023-02-23 21:05:10', NULL, 1, 1, NULL),
('964a885a-b416-11ed-baa4-46579262b49d', 'EB7DBB5D-5F49-4B1A-8254-225A677D6385', 7, 'DEPTBD', 'Sabdella Legi', 'legi@phintraco.com', '2220714011-SDL', '2022-08-14', '0', '2023-02-24 00:41:02', '2023-02-24 00:46:36', NULL, 1, 1, NULL),
('f10398cc-b3f8-11ed-baa4-46579262b49d', 'EB7DBB5D-5F49-4B1A-8254-225A677D6385', 7, 'DEPTBD', 'Iqoma Gumelar Rachman', 'iqoma.ra@phintraco.com', '2220714011-IQG', '2022-07-14', '0', '2023-02-23 21:08:49', '2023-02-24 00:46:36', NULL, 1, 1, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama_perusahaan`, `alamat_perusahaan`, `latitude`, `longitude`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'PT. Phintraco Technology The East', 'The East Tower 17th Floor Jl. Dr. Ide Anak Agung Gde Agung Kav. E3, Kawasan Mega Kuningan No.2, RT.5/RW.2, Kuningan, Kuningan Tim., Kuningan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950', '-6.229169833011968', '106.82525700395708', NULL, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'PT. Phincon Kota Kasablanka', 'eighty eight@kasablanka (88@kasablanka) office tower, 18th Floor Jalan Casablanca Raya Kav.88, RT.16/RW.5, Menteng Dalam, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12870', '-6.2243585897018185', '106.84186113263642', NULL, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'F.20 Coffee', 'Jl. Bukit Duri Permai, RT.6/RW.2, Tebet Tim., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 13320, Indonesia', '-6.22652125181769', '106.85327427073815', NULL, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presensimasuks`
--

CREATE TABLE `presensimasuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensis`
--

CREATE TABLE `presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `date_in` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `latitude_in` varchar(255) DEFAULT NULL,
  `longitude_in` varchar(255) DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `latitude_out` varchar(255) DEFAULT NULL,
  `longitude_out` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensis`
--

INSERT INTO `presensis` (`id`, `date`, `date_in`, `time_in`, `latitude_in`, `longitude_in`, `date_out`, `time_out`, `latitude_out`, `longitude_out`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, '2023-02-10', '2023-02-10', '15:28:08', '-6.2265637', '106.8497002', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-02-10 08:28:08', '2023-02-10 08:28:08'),
(2, '2023-02-16', '2023-02-16', '07:37:04', '-6.2244015', '106.8417381', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-02-16 00:37:04', '2023-02-16 00:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_at` datetime NOT NULL,
  `finish_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '$2y$10$SplCVA3/mcL/GTuIQHza7ePUpW1.BPBgVY6L1IhDLxjv/jILwjt86', 'admin', NULL, '2023-02-10 01:21:24', '2023-02-10 01:21:24', NULL, NULL, NULL, NULL),
(2, 'Lionel Messi', 'messi@gmail.com', '$2y$10$nOI/sMDmjCvszfgpAIW2rOJ4LWyc16dRNdoBvBk6myEBLljTHK.km', 'admin', NULL, '2023-02-16 00:19:08', '2023-02-16 00:19:08', NULL, 1, 1, NULL),
(3, 'Cristiano Ronaldo', 'cristiano@gmail.com', '$2y$10$gOexm0LCgXjZqps4HdniQOUxWPnLmNugMpTG.uK4EmvEDg9E.sYYe', 'admin', NULL, '2023-02-16 00:19:53', '2023-02-16 00:19:53', NULL, 1, 1, NULL),
(4, 'Neymar', 'neymar@gmail.com', '$2y$10$juelcwh3KhLyXrS9AnWP5.T1R.avRcOxuUIbU8hHIAQQWFXvMqb4m', 'user', NULL, '2023-02-23 01:14:07', '2023-02-23 01:14:07', NULL, 1, 1, NULL),
(9, 'Kylian Mbappe', 'mbappe@gmail.com', '$2y$10$sDotPgyIr7mjBVCxdNkE8OLjbHRAmkNodcP4JZpTuGAziAJ6Y49ie', 'user', NULL, '2023-02-23 01:42:18', '2023-02-23 01:42:18', NULL, 1, 1, NULL),
(10, 'Karim Benzema', 'benzema@gmail.com', '$2y$10$qpAPNmogIWmgQ9hcaQoTwu2cPBiCBJCsUdutZMNH37dcY1NJ1vt3e', 'admin', NULL, '2023-02-23 01:42:18', '2023-02-23 01:42:18', NULL, 1, 1, NULL),
(11, 'Vinicius Junior', 'vinicius@gmail.com', '$2y$10$W1kjx9vL/gjMezguiFuUOuVzY1fRyF2kwWTw11islG.jLTVOOT8pm', 'user', NULL, '2023-02-23 01:42:18', '2023-02-23 01:42:18', NULL, 1, 1, NULL),
(12, 'Luka Modric', 'modric@gmail.com', '$2y$10$aNVfHcewomwEfv.1yPhpaOdHD5sk7Wu/AWK4NJuinaXdSLkk7R5gW', 'admin', NULL, '2023-02-23 01:42:18', '2023-02-23 01:42:18', NULL, 1, 1, NULL);

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
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_created_by_foreign` (`created_by`),
  ADD KEY `items_updated_by_foreign` (`updated_by`),
  ADD KEY `items_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `itms`
--
ALTER TABLE `itms`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `pegawais_created_by_foreign` (`created_by`),
  ADD KEY `pegawais_updated_by_foreign` (`updated_by`),
  ADD KEY `pegawais_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaans_created_by_foreign` (`created_by`),
  ADD KEY `perusahaans_updated_by_foreign` (`updated_by`),
  ADD KEY `perusahaans_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `presensimasuks`
--
ALTER TABLE `presensimasuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensis_created_by_foreign` (`created_by`),
  ADD KEY `presensis_updated_by_foreign` (`updated_by`),
  ADD KEY `presensis_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_name_unique` (`name`),
  ADD KEY `projects_created_by_foreign` (`created_by`),
  ADD KEY `projects_updated_by_foreign` (`updated_by`),
  ADD KEY `projects_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itms`
--
ALTER TABLE `itms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensimasuks`
--
ALTER TABLE `presensimasuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pegawais_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pegawais_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD CONSTRAINT `perusahaans_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `perusahaans_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `perusahaans_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `presensis`
--
ALTER TABLE `presensis`
  ADD CONSTRAINT `presensis_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `presensis_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `presensis_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `projects_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `projects_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 03:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phintraco`
--

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
(4, '2023_01_16_114413_create_projects_table', 1);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `finish_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `start_at`, `finish_at`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(4, 'MPM Group by PT Mitra Pinasthika Mustika', 'As a proud member of the MPM Group, PT Mitra Pinasthika Mustika Rent is your comprehensive solution provider in terms of transportation services. With 13,000 Total Fleet in Service and 2,500 Drivers, this company is one of the largest rental service companies in Indonesia.', '2022-02-02 00:00:00', '2022-06-05 00:00:00', '2023-01-16 07:01:21', '2023-01-16 07:18:26', '2023-01-16 07:18:26', 5, 7, 7),
(5, 'Digiflora Web Development', 'Platform pemesanan papan bunga digital dengan misi memberikan alternatif digital untuk \'bunga papan\' dan menciptakan lingkungan yang lebih sehat.', '2021-05-06 00:00:00', '2021-08-06 00:00:00', '2023-01-16 07:15:34', '2023-01-16 07:15:34', NULL, 2, 2, NULL),
(6, 'ASDP Seru - Mobile App', 'A ticket booking application managed directly by ASDP. ASDP wants to provide services for users of boat travel services', '2020-09-09 00:00:00', '2021-01-09 00:00:00', '2023-01-16 07:20:13', '2023-01-16 07:20:13', NULL, 7, 7, NULL),
(7, 'Bendera Pay', 'Mobile application for giving incentives from Distributors to Salesmen and Outlets who have collaborated with the Frissian Flag.', '2020-05-08 00:00:00', '2020-10-08 00:00:00', '2023-01-16 07:23:13', '2023-01-16 07:23:13', NULL, 7, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'superadmin', 'superadmin@gmail.com', '$2y$10$DMpiNtGz3kx0lZ797jTwLeFSCh43ifcdx1dl94GHNHHFdw7x8UUUG', 'admin', NULL, '2023-01-16 04:48:52', '2023-01-16 04:48:52', NULL, NULL, NULL, NULL),
(2, 'Lionel Messi', 'messi@gmail.com', '$2y$10$5K1uZbhl/B9MUIFrXmx52.4Z0JgtllrGtM.YgKofbXtLEat719L1a', 'admin', NULL, '2023-01-16 05:07:04', '2023-01-16 05:07:04', NULL, NULL, NULL, NULL),
(3, 'Cristiano Ronaldo', 'cristiano@gmail.com', '$2y$10$86M4K0Pl31VnqhE9Z/Yj2.5.JbqfKa1S8iAZD9RafNIcvDe6/hYn2', 'admin', NULL, '2023-01-16 05:08:20', '2023-01-16 05:08:20', NULL, NULL, NULL, NULL),
(4, 'Neymar', 'neymar@gmail.com', '$2y$10$0V8qcSnUrlgpjze2hwdlpekGFkQ8h6kwGNadeNaCZORPkhZY4ezxu', 'user', NULL, '2023-01-16 05:27:48', '2023-01-16 06:42:32', '2023-01-16 06:42:32', NULL, 5, 5),
(5, 'Diego Maradona', 'maradona@gmail.com', '$2y$10$u5E3Oc0DfT07jTrMejNyJuBpA45rMZf.xVZiowLX9/f4S.sryk2wK', 'admin', NULL, '2023-01-16 05:29:05', '2023-01-16 05:29:05', NULL, NULL, NULL, NULL),
(6, 'Ronaldinho', 'ronaldinho@gmail.com', '$2y$10$bp78Isv.fiJ/42WexT1yMebqiXMI.7GMp4ZwQRTWZqLeDE9yCanWa', 'admin', NULL, '2023-01-16 05:33:13', '2023-01-16 06:42:45', '2023-01-16 06:42:45', 2, 5, 5),
(7, 'Zinadine Zidane', 'zidane@gmail.com', '$2y$10$kzIYp4UVmwRi7GBeauKBtOZmOBFxZX5pycySWLfUIruLqpeitzetC', 'admin', NULL, '2023-01-16 05:39:04', '2023-01-16 05:39:04', NULL, NULL, NULL, NULL),
(8, 'Pele', 'pele@gmail.com', '$2y$10$tFg1PvPC4ku7VNckim18IeQvSB9753bURyjBz/c0e9xdJACdRoW0C', 'admin', NULL, '2023-01-16 05:39:47', '2023-01-16 05:39:47', NULL, NULL, NULL, NULL),
(9, 'Karim Benzema', 'benzema@gmail.com', '$2y$10$eZ.gAr.1w9kZJbLc2RT/H.03cc6TTMPrkZSaev4wA3hzSX5pkIn0W', 'admin', NULL, '2023-01-16 05:40:29', '2023-01-16 06:09:35', NULL, 2, 3, NULL),
(13, 'Andik Vermansyah', 'andik@gmail.com', '$2y$10$Hn3Lwywtq8mJcRGkKBFadeWK9G4uPYkj.y31dzli59adh6fc8/MyC', 'admin', NULL, '2023-01-16 05:42:58', '2023-01-16 06:11:17', NULL, 2, 3, NULL),
(14, 'dede', 'dedede@gmail.com', '$2y$10$27UbO7hOHgFr9iXoK0n2heLVw2Ulr/odriTy3KNRO.GFO7URkYvs2', 'user', NULL, '2023-01-16 07:45:46', '2023-01-16 07:45:46', NULL, 2, 2, NULL);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

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

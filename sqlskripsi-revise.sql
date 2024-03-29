-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 05:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihanlagi`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `pickup_address`, `phone`) VALUES
(1, 'PT SIUUU', 'jl baru no 66 Bandar Lampung', 123456),
(2, 'PT Dicky', 'Jl Raden Saleh no 99 Bandar Lampung', 231990),
(3, 'PT Extrada', 'Jl Pangkal Pinang no 30 Bandar Lampung', 231669),
(4, 'PT DIcky Tasya', 'Jl uwahhhh', 123456);

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
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis`, `harga`) VALUES
(1, 'Bahan baku', 150),
(2, 'Bahan berat', 300),
(3, 'Bahan fragile', 400);

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_04_134630_create_transaksis_table', 2),
(6, '2024_03_04_175524_transaksi', 3),
(7, '2024_03_04_185114_admin_transaksi', 4),
(8, '2024_03_04_185407_transaksi', 5),
(9, '2024_03_04_191158_create_transaksis_table', 6),
(10, '2024_03_05_162335_customer', 7),
(11, '2024_03_05_163315_customer', 8),
(12, '2024_03_13_143534_transaksi', 9),
(13, '2024_03_13_144036_transaksi', 10),
(14, '2024_03_13_153004_jenis', 11),
(15, '2024_03_13_153929_truk', 12),
(16, '2024_03_13_154719_create_truks_table', 13),
(17, '2024_03_13_175725_transaksi', 13),
(18, '2024_03_20_171544_complete', 14),
(19, '2024_03_20_173819_transaksi', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truk` bigint(20) NOT NULL,
  `weight` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `tracking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `name`, `date`, `pickup_address`, `destination_address`, `barang`, `jenis`, `truk`, `weight`, `phone`, `total`, `tracking`, `is_completed`) VALUES
(1, 'PT Extrada', '2024-03-21', 'Jl Pangkal Pinang no 30 Bandar Lampung', 'Test', 'Ganja', 'Bahan baku', 1, 1000, 12345678, '1150000.00', 'on progress', 1),
(2, 'PT SIUUU', '2024-03-20', 'jl baru no 66 Bandar Lampung', 'test', 'sabu', 'Bahan baku', 2, 2000, 12345678, '2300000.00', 'delivery', 1),
(3, 'PT Extrada', '2024-03-18', 'Jl Pangkal Pinang no 3 Bandar Lampung', 'test', 'kaca', 'Bahan fragile', 3, 3000, 123456, '4200000.00', 'finish', 1),
(4, 'PT Dicky', '2024-03-21', 'Jl Raden Saleh no 99 Bandar Lampung', 'test', 'mobil', 'Bahan berat', 2, 5000, 12345, '3500000.00', 'delivery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `truk`
--

CREATE TABLE `truk` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `truk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `truk`
--

INSERT INTO `truk` (`id`, `truk`, `jumlah`, `harga`) VALUES
(1, 'Fuso', 18, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','gudang') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin01', 'admin01@gmail.com', NULL, '$2y$10$0r329g1ZqpbrxZ4B35HkVuQh7fu2VCF.AEJCzhUPoQpO7wJMb.NiS', 'admin', NULL, '2024-03-02 01:47:49', '2024-03-02 01:47:49'),
(2, 'Gudang01', 'gudang01@gmail.com', NULL, '$2y$10$/06tEVAveKPFwR1pwTgDjeq/j6r73w3Aj31jCRb.OB40tnumdwlbq', 'gudang', NULL, '2024-03-02 01:47:49', '2024-03-02 01:47:49');


--
-- Add foreign key constraints
--

-- Alter table `customer`
ALTER TABLE `customer`
  ADD CONSTRAINT `FK1_customer` FOREIGN KEY (`id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Alter table `jenis`
ALTER TABLE `jenis`
  ADD CONSTRAINT `FK3_jenis` FOREIGN KEY (`id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Alter table `truk`
ALTER TABLE `truk`
  ADD CONSTRAINT `FK2_truk` FOREIGN KEY (`id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

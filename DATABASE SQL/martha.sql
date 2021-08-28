-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 09:30 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martha`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `foodName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodPrice` int(11) NOT NULL,
  `SallersCount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `foodName`, `foodType`, `foodPrice`, `SallersCount`, `created_at`, `updated_at`) VALUES
(1, 'Rice', 'MAIN DISHES', 100, 0, '2021-08-27 01:57:05', '2021-08-27 01:57:05'),
(2, 'Rotty', 'MAIN DISHES', 20, 3, '2021-08-27 01:57:21', '2021-08-27 01:57:21'),
(3, 'Noodles', 'MAIN DISHES', 150, 1, '2021-08-27 01:57:37', '2021-08-27 01:57:37'),
(4, 'Wadai', 'SIDE DISHES', 45, 0, '2021-08-27 01:57:56', '2021-08-27 01:57:56'),
(5, 'Dhal Curry', 'SIDE DISHES', 75, 3, '2021-08-27 01:58:14', '2021-08-27 01:58:14'),
(6, 'Fish Curry', 'SIDE DISHES', 120, 4, '2021-08-27 01:58:32', '2021-08-27 01:58:32'),
(7, 'Watalappam', 'DESSERTS', 40, 2, '2021-08-27 01:58:52', '2021-08-27 01:58:52'),
(8, 'Jelly', 'DESSERTS', 20, 0, '2021-08-27 01:59:10', '2021-08-27 01:59:10'),
(9, 'Pudding', 'DESSERTS', 25, 0, '2021-08-27 01:59:22', '2021-08-27 01:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_08_27_041630_create_foods_table', 1),
(3, '2021_08_27_084435_create_orders_table', 2),
(4, '2021_08_27_085622_create_orders_table', 3),
(5, '2021_08_27_090111_create_orders_table', 4),
(6, '2021_08_28_055449_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderedMainDishes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrderedSideDishes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrderedDesserts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OrderDate` date NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderedMainDishes`, `OrderedSideDishes`, `OrderedDesserts`, `OrderDate`, `TotalPrice`, `created_at`, `updated_at`) VALUES
(1, 'Rotty', 'Wadai', 'Watalappam', '2021-08-28', 105, '2021-08-28 00:30:37', '2021-08-28 00:30:37'),
(2, 'Rice', 'Wadai', 'No Dessert', '2021-08-28', 145, '2021-08-28 00:33:42', '2021-08-28 00:33:42'),
(3, 'Rotty', 'Dhal Curry', 'Watalappam', '2021-08-28', 135, '2021-08-28 00:33:48', '2021-08-28 00:33:48'),
(4, 'Rotty', 'Dhal Curry', 'Watalappam', '2021-08-28', 135, '2021-08-28 01:39:53', '2021-08-28 01:39:53'),
(5, 'Rotty', 'Dhal Curry', 'Watalappam', '2021-08-28', 135, '2021-08-28 01:40:19', '2021-08-28 01:40:19'),
(6, 'Rotty', 'Dhal Curry', 'No Dessert', '2021-08-28', 95, '2021-08-28 01:45:05', '2021-08-28 01:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

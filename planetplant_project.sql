-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 10:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planetplant_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `code`, `name`, `gender`, `address`, `phone_number`, `email`, `photo`, `username`, `password`, `createdby`, `updatedby`, `deletedby`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A00001', 'admin01', 'M', 'ddddd', '0123456789', 'aaa@gmail.com', '/img_client/profile.jpg', 'admin', '$2y$10$H2l9YvfK.dPPWst3cFK8aem9MTwOet9ljGFhEfJxmUGkAQlPqP5t2', 'Admin', 'Admin', NULL, NULL, '2021-05-27 13:48:32', '2021-05-30 08:23:50'),
(3, 'A00002', 'Budi Charl', 'M', 'ddddd', '0123456789', 'bbb@aaa.com', 'img_client/profile.jpg', 'budi_02', '$2y$10$Mxbing1OydDXUtoamUQ6p.i8sy57PebML8OcZdw4GaEA8NHFQJFEq', 'Admin', 'Admin', NULL, NULL, '2021-05-27 21:53:58', '2021-05-27 21:53:58'),
(4, 'A00003', 'aaaa', 'F', 'adddssds', '43434343', 'aaaa@gmail.com', 'profile.jpg', 'aaaa', '$2y$10$rH63ogVnVT4.eGyPzpL3wul1IpZHx0r21mZllYu.09cmAOk.4v3hC', 'Admin', 'Admin', 'Admin', '2021-05-28 02:44:44', '2021-05-28 02:06:04', '2021-05-28 02:44:44'),
(5, 'A00004', 'cccc', 'M', 'ddddd', '0123456789', 'ccc@aaa.com', 'profile.jpg', 'cccc', '$2y$10$qVl0s3c3MaHfs6LXT3tp0ObKQfPgiiSkbryf6WrI3ZnaQJNEZ/TLq', 'Admin', 'Admin', 'Admin', '2021-05-28 02:43:42', '2021-05-28 02:12:07', '2021-05-28 02:43:42'),
(7, 'A00003', 'Bella', 'F', 'Jl. ABC no 10, Bandung', '+62123456789', 'bella@gmail.com', '/img_client/profile.jpg', 'bella_01', '$2y$10$EWrrRdzOIzIt0zamrC1jFeAANzhuSvWiZh6rhUdIRLuagABV1uz/2', 'Admin', 'Admin', 'Admin', '2021-05-28 06:55:05', '2021-05-28 06:53:36', '2021-05-28 06:55:05');

-- --------------------------------------------------------

--
-- Stand-in structure for view `countitemtypeviews`
-- (See below for the actual view)
--
CREATE TABLE `countitemtypeviews` (
`id` bigint(20)
,`name` varchar(191)
,`cover` varchar(191)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `provider_id`, `name`, `gender`, `photo`, `email`, `phone_number`, `username`, `password`, `provider`, `created_at`, `updated_at`) VALUES
(1, 'C00001', NULL, 'Customer', 'F', 'img_client/C00001.jpg', 'customer@gmail.com', '0123456789', 'customer01', '$2y$10$R8T85U2qev76948iFWOnce7eFqtqQJehAvgoXaA0ySrTkqYWTSHs6', NULL, '2021-05-12 07:40:25', '2021-05-23 22:13:57'),
(2, 'C00002', NULL, 'Customer2', NULL, NULL, 'customer2@gmail.com', NULL, 'customer02', '$2y$10$ACoBVmaxeKPSSORu4WDvG.zHGUNwLtlm7oFIVczRcmDqX6WbYvYRW', NULL, '2021-05-12 07:41:35', '2021-05-12 07:41:35'),
(6, 'C00003', NULL, 'Amanda Charl', 'F', 'img_client/C00003.jpg', 'amanda@gmail.com', '+62123456789', 'amanda_01', '$2y$10$oFLeFf2V/uToLbn3DN2TkeN2TgI69QjJqXVOYur5Xv0lDYiQE14aG', NULL, '2021-05-26 20:56:43', '2021-05-26 20:56:43'),
(7, 'C00004', NULL, 'Bella', 'F', 'img_client/profile.jpg', 'bella@gmail.com', '0123456789', 'bella_01', '$2y$10$nPecyyQaD.fJi6cbKbS3tO5F2dr5zLkviCncnWuFoK.xvRbBVNSIq', NULL, '2021-05-26 20:59:08', '2021-05-26 20:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemnewviews`
-- (See below for the actual view)
--
CREATE TABLE `itemnewviews` (
`id` bigint(20)
,`code` varchar(191)
,`name` varchar(191)
,`qty` int(11)
,`description` longtext
,`photo` varchar(191)
,`price` decimal(8,2)
,`totalprice` decimal(21,8)
,`discount` decimal(8,2)
,`idType` bigint(20)
,`tipeItem` varchar(191)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_type` bigint(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `code`, `name`, `description`, `photo`, `id_type`, `qty`, `price`, `discount`, `createdby`, `updatedby`, `deletedby`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'THB00001', 'Bunga Anggrek Phalaenopsis', 'Bentuk tanaman bunga anggrek\r\nCocok sebagai bahan dekorasi ruangan\r\nBunga artificial\r\nDilengkapi dengan pot\r\nTampilan natural seperti aslinya\r\nUkuran pot : 19 x 19 x 12 cm\r\nDimensi produk : 87 x 42 x 59 cm', 'img_item/THB00001.jpg', 1, 99, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-10 15:35:29', '2021-06-01 23:01:53', NULL),
(2, 'THB00002', 'Bunga Gloxinia', '', 'img_item/THB00002.jpg', 1, 99, '200000.00', '20.00', 'Admin', 'Admin', NULL, '2021-05-10 15:46:39', '2021-06-01 23:06:11', NULL),
(3, 'THB00003', 'Bunga Kastuba', '', 'img_item/THB00003.jpg', 1, 100, '100000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-10 15:46:39', '2021-05-10 15:46:39', NULL),
(4, 'THB00004', 'Bunga Amarilis', '', 'img_item/THB00004.jpg', 1, 100, '100000.00', '0.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(11, 'THB00005', 'Bunga Geranium', '', 'img_item/THB00005.jpg', 1, 100, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(12, 'THB00006', 'Bunga Kembang Sepatu', '', 'img_item/THB00006.jpg', 1, 100, '300000.00', '20.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(13, 'THB00007', 'Bunga Euphorbia', '', 'img_item/THB00007.jpg', 1, 100, '250000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(14, 'THB00008', 'Bunga Peace Lily', '', 'img_item/THB00008.jpg', 1, 100, '300000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(15, 'THB00009', 'Bunga Pentas', '', 'img_item/THB00009.jpg', 1, 100, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(16, 'THB000010', 'Bunga Anthrium', '', 'img_item/THB000010.jpg', 1, 100, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-07 15:52:09', '2021-05-07 15:52:09', NULL),
(17, 'THB000011', 'Bunga Lavender', '', 'img_item/THB000011.jpg', 1, 100, '350000.00', '20.00', 'Admin', 'Admin', NULL, '2021-05-07 15:52:10', '2021-05-07 15:52:10', NULL),
(18, 'THD00001', 'Daun Kuping Gajah', '', 'img_item/THD00001.jpg', 2, 99, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-10 16:04:05', '2021-06-01 23:01:53', NULL),
(19, 'THD00002', 'Daun Suplir', '', 'img_item/THD00002.jpg', 2, 100, '300000.00', '20.00', 'Admin', 'Admin', NULL, '2021-05-10 16:04:05', '2021-05-10 16:04:05', NULL),
(20, 'THD00003', 'Daun Sri Rejeki', '', 'img_item/THD00003.jpg', 2, 100, '250000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-10 16:04:05', '2021-05-10 16:04:05', NULL),
(21, 'THD00004', 'Daun Janda Bolong', '', 'img_item/THD00004.jpg', 2, 99, '300000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-06-02 04:58:13', NULL),
(22, 'THD00005', 'Daun Philodendron', '', 'img_item/THD00005.jpg', 2, 100, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-05-06 17:00:00', NULL),
(23, 'THD00006', 'Daun Monstera', '', 'img_item/THD00006.jpg', 2, 100, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-07 16:04:05', '2021-05-07 16:04:05', NULL),
(24, 'THD00007', 'Daun Kaktus', NULL, 'img_item/THD00007.png', 2, 100, '350000.00', '20.00', 'Admin', 'Admin', 'Admin', '2021-05-07 16:04:05', '2021-06-02 07:53:08', '2021-06-02 07:53:08'),
(25, 'THD00008', 'Daun Lidah Mertua', '', 'img_item/THD00008.jpg', 2, 99, '200000.00', '10.00', 'Admin', 'Admin', NULL, '2021-05-06 17:00:00', '2021-06-02 04:58:13', NULL),
(26, 'THD00006', 'Daun Monstera', '', 'img_item/THD00006.jpg', 2, 100, '200000.00', '10.00', 'Admin', 'Admin', 'Admin', '2021-05-07 16:04:05', '2021-06-02 04:52:42', '2021-06-02 04:52:42'),
(27, 'aaaaa', 'ewwe', 'dwdwdwdd', 'img_item/no_picture.jpg', 1, 100, '400000.00', '0.00', 'Admin', 'Admin', 'Admin', '2021-05-28 07:46:01', '2021-05-28 07:54:34', '2021-05-28 07:54:34'),
(28, 'bbbb', 'ewwe', 'dwdwdwdd', 'img_item/no_picture.jpg', 1, 100, '400000.00', '0.00', 'Admin', 'Admin', 'Admin', '2021-05-28 07:47:01', '2021-05-28 07:54:39', '2021-05-28 07:54:39'),
(29, 'cccc', 'ewwe', 'dwdwdwdd', 'img_item/no_picture.jpg', 3, 100, '400000.00', '0.00', 'Admin', 'Admin', 'Admin', '2021-05-28 07:47:55', '2021-05-28 07:54:45', '2021-05-28 07:54:45'),
(30, 'eeee', 'vvvvv', 'qqqq', 'img_item/eeee.jpg', 2, 100, '434343.00', '8.00', 'Admin', 'Admin', 'Admin', '2021-05-28 18:42:09', '2021-05-28 18:55:07', '2021-05-28 18:55:07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemviews`
-- (See below for the actual view)
--
CREATE TABLE `itemviews` (
`id` bigint(20)
,`code` varchar(191)
,`name` varchar(191)
,`qty` int(11)
,`description` longtext
,`photo` varchar(191)
,`price` decimal(8,2)
,`totalprice` decimal(21,8)
,`discount` decimal(8,2)
,`idType` bigint(20)
,`tipeItem` varchar(191)
,`terjual` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` bigint(20) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `code`, `name`, `cover`, `createdby`, `updatedby`, `deletedby`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'THB', 'Tanaman Hias Bunga', '/img_item/cover_bunga.jpg', 'Admin', 'Admin', '', '2021-05-10 15:17:01', '2021-05-10 15:17:01', NULL),
(2, 'THD', 'Tanaman Hias Daun', '/img_item/cover_daun.jpg', 'Admin', 'Admin', 'Admin', '2021-05-10 15:20:07', '2021-05-10 15:20:07', NULL),
(3, 'THA', 'Tanaman Hias Akar', '/img_item/cover_akar.jpg', 'Admin', 'Admin', 'Admin', '2021-05-10 15:20:07', '2021-05-10 15:20:07', NULL),
(4, 'MT', 'Media Tanam', '/img_item/no_picture.jpg', 'Admin', 'Admin', '', '2021-05-10 15:25:35', '2021-05-10 15:25:35', NULL),
(5, 'PT', 'Peralatan', '/img_item/cover_peralatan.jpg', 'Admin', 'Admin', '', '2021-05-10 15:25:35', '2021-05-10 15:25:35', NULL),
(10, 'abcd', 'ABCD', 'img_item/abcd.jpg', 'Admin', 'Admin', 'Admin', '2021-05-28 05:22:26', '2021-05-28 07:13:26', '2021-05-28 07:13:26');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_05_10_101127_create_customer_table', 2),
(6, '2021_05_10_102352_create_customer_table', 3),
(7, '2021_05_10_144853_create_item_table', 4),
(8, '2021_05_10_145644_create_itemtype_table', 5),
(9, '2021_05_10_162527_create_transactionitem_table', 6),
(10, '2021_05_13_150746_create_provinces_table', 7),
(11, '2021_05_13_150858_create_cities_table', 7),
(12, '2021_05_22_071306_create_payments_table', 8),
(13, '2021_05_22_085535_create_payment_types_table', 9),
(14, '2021_05_27_102632_create_admins_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_transaction` bigint(10) DEFAULT NULL,
  `transfer_date` timestamp NULL DEFAULT NULL,
  `slip_transfer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` decimal(8,2) DEFAULT NULL,
  `id_payment_type` bigint(10) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `code`, `name`, `id_transaction`, `transfer_date`, `slip_transfer`, `payment`, `id_payment_type`, `notes`, `payment_status`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, 'CP00001', 'Amanda Charl', 1, '2021-06-01 17:00:00', 'img_payment/CP00001.jpg', '404000.00', 1, 'aaaaa', 'DISETUJUI', NULL, '2021-06-02 04:34:52', '2021-06-02 04:36:08');

-- --------------------------------------------------------

--
-- Stand-in structure for view `paymentviews`
-- (See below for the actual view)
--
CREATE TABLE `paymentviews` (
`id` bigint(20)
,`code` varchar(191)
,`name` varchar(191)
,`code_transaction` varchar(255)
,`transfer_date` timestamp
,`slip_transfer` varchar(191)
,`payment` decimal(8,2)
,`id_payment_type` bigint(20)
,`payment_type` varchar(191)
,`payment_status` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deletedby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `code`, `type`, `note`, `createdby`, `updatedby`, `deletedby`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BCA00001', 'Transfer BCA - 123456789 a/n Planet Plant', '', 'Admin', NULL, '', '2021-05-22 09:00:31', '2021-05-22 09:00:31', NULL),
(2, 'BNI00001', 'Transfer BNI - 210299282872', 'Transfer BNI dengan no rekening 21019928329', 'Admin', 'Admin', NULL, '2021-05-28 23:51:12', '2021-05-28 23:51:12', NULL),
(3, 'BNI00001', 'Transfer BNI - 99999999', 'Transfer BNI dengan no rekening 99999999', 'Admin', 'Admin', 'Admin', '2021-05-28 23:51:39', '2021-05-29 01:28:39', '2021-05-29 01:28:39'),
(4, 'BNI00003', 'Transfer BNI - 111122222', 'aaabbbb', 'Admin', 'Admin', 'Admin', '2021-05-28 23:52:04', '2021-05-29 01:28:33', '2021-05-29 01:28:33');

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
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(29, 'App\\Models\\Customer', 1, 'ApiToken', '94e9fb268ceb92d636480f41a0e07a8b8904e17ff5a72079a7a2c4900b18a1d9', '[\"*\"]', NULL, '2021-05-11 19:50:05', '2021-05-11 19:50:05'),
(30, 'App\\Models\\Customer', 1, 'ApiToken', '608a8ed742e1322dde18132b95e72ea58e64bbc99ef3d74bbb8acbbdf1345732', '[\"*\"]', NULL, '2021-05-11 19:53:19', '2021-05-11 19:53:19'),
(31, 'App\\Models\\Customer', 1, 'ApiToken', 'b2c953af9f4039b4eb78034ce606421e20dffd8651c2565da837007829f37035', '[\"*\"]', NULL, '2021-05-11 19:53:50', '2021-05-11 19:53:50'),
(32, 'App\\Models\\Customer', 1, 'ApiToken', 'a5f53a4a050cdee46784c04a460f8c5237cd4ff7f29d2c724636fcce3de1f030', '[\"*\"]', NULL, '2021-05-11 20:00:44', '2021-05-11 20:00:44'),
(33, 'App\\Models\\Customer', 1, 'ApiToken', '6521a8daf1091af9f142b077ad9ef9ce42eeb8067e8e3ea86f0f1d78f543c8d5', '[\"*\"]', '2021-05-12 02:49:27', '2021-05-12 02:48:09', '2021-05-12 02:49:27'),
(34, 'App\\Models\\Customer', 1, 'ApiToken', 'd1557527afa0c2dbaafa6d0f4030a8bdc2981a0bcae7fdc486f38b8944c469ee', '[\"*\"]', '2021-05-12 03:59:59', '2021-05-12 03:08:00', '2021-05-12 03:59:59'),
(35, 'App\\Models\\Customer', 1, 'ApiToken', '06c1ec2a62bdeab3a0d68d7ada6e4b174848d7afe36a926413f271de99240977', '[\"*\"]', '2021-05-12 03:19:09', '2021-05-12 03:17:00', '2021-05-12 03:19:09'),
(36, 'App\\Models\\Customer', 1, 'ApiToken', '98eaed34b5f3fcc033e78cc1332fac5ed026698908a7de23edcfc7f9cbe72de4', '[\"*\"]', '2021-05-12 03:19:36', '2021-05-12 03:19:35', '2021-05-12 03:19:36'),
(37, 'App\\Models\\Customer', 1, 'ApiToken', '5bfd5f25dbccb604d21609832ae69183f612b3faab5acfeb2296ab5b05f62058', '[\"*\"]', '2021-05-12 03:20:53', '2021-05-12 03:19:36', '2021-05-12 03:20:53'),
(38, 'App\\Models\\Customer', 1, 'ApiToken', 'f959e05abd39310fa2224b7abf014859da1b6aa2adac3f740a822a99f9ccfbad', '[\"*\"]', '2021-05-12 03:30:41', '2021-05-12 03:30:41', '2021-05-12 03:30:41'),
(39, 'App\\Models\\Customer', 1, 'ApiToken', '9eba7c0f9076f4d480b4929b8a29be4005cac15b79619ac611f5f1c5ad3e09be', '[\"*\"]', '2021-05-12 03:44:15', '2021-05-12 03:44:14', '2021-05-12 03:44:15'),
(40, 'App\\Models\\Customer', 1, 'ApiToken', 'fd5b05a5764d313542a5990b7ca75941d8fd0ad0d77010deaa9d7bd228dcc086', '[\"*\"]', '2021-05-12 03:48:47', '2021-05-12 03:48:47', '2021-05-12 03:48:47'),
(41, 'App\\Models\\Customer', 1, 'ApiToken', '46324cf0da141891fbe512dfaabcab3843e6a49efc45122b58f7ffed641ef842', '[\"*\"]', '2021-05-12 03:50:00', '2021-05-12 03:50:00', '2021-05-12 03:50:00'),
(42, 'App\\Models\\Customer', 1, 'ApiToken', '640a9016cc62a3f1ccc5741e9eee631ff4d184f2677dcbaf8c54eaa180150656', '[\"*\"]', '2021-05-12 04:00:23', '2021-05-12 04:00:23', '2021-05-12 04:00:23'),
(43, 'App\\Models\\Customer', 1, 'ApiToken', '1e12f9f0937be6b954c9b9ae0be51b995b3c540f96267ecbefc75d8dd3f8f984', '[\"*\"]', '2021-05-12 04:02:19', '2021-05-12 04:01:55', '2021-05-12 04:02:19'),
(44, 'App\\Models\\Customer', 1, 'ApiToken', '8167c2750ca9b97f08cd39fa3e243efe8f8f7648d6c860c4be5582f1f986a0ec', '[\"*\"]', '2021-05-12 04:02:33', '2021-05-12 04:02:32', '2021-05-12 04:02:33'),
(45, 'App\\Models\\Customer', 1, 'ApiToken', '3ced3abfc0d83c6bf376290a5d7ab4b10caee935ba4f74c6ee9508ca0f3e72a2', '[\"*\"]', '2021-05-12 04:14:26', '2021-05-12 04:07:46', '2021-05-12 04:14:26'),
(46, 'App\\Models\\Customer', 1, 'ApiToken', '84c6256f9bc7671448ca15f75c2e8adb735f185b613b1543ed3c6d55e4d187d6', '[\"*\"]', '2021-05-12 04:14:40', '2021-05-12 04:14:40', '2021-05-12 04:14:40'),
(47, 'App\\Models\\Customer', 1, 'ApiToken', '69f4c9c4840c36a5db658d841027f626f8496bea65fe398f1ef139b711d37cd4', '[\"*\"]', '2021-05-12 04:18:29', '2021-05-12 04:16:39', '2021-05-12 04:18:29'),
(48, 'App\\Models\\Customer', 1, 'ApiToken', '33237b23605065d47958ea7dc88f3d338d064574dc73c79d5df037ce5f9415df', '[\"*\"]', '2021-05-12 04:38:20', '2021-05-12 04:19:01', '2021-05-12 04:38:20'),
(49, 'App\\Models\\Customer', 1, 'ApiToken', '2b00d4eafc58949707c263b34844db72a149b44e1f2fe9c4b076e7cab6e33473', '[\"*\"]', '2021-05-12 04:39:35', '2021-05-12 04:39:34', '2021-05-12 04:39:35'),
(50, 'App\\Models\\Customer', 1, 'ApiToken', '3768e4cf93857925bb4bbbd6a62312c7d9d1f7b6dd7b31d3187d3c5dcfd04221', '[\"*\"]', '2021-05-12 07:23:58', '2021-05-12 07:23:57', '2021-05-12 07:23:58'),
(51, 'App\\Models\\Customer', 2, 'ApiToken', '0aa8ae098890b26ba6d1ca3c59ef0b73e4283fcadc7dd37fe35c06656ff73a42', '[\"*\"]', '2021-05-12 07:42:20', '2021-05-12 07:42:19', '2021-05-12 07:42:20'),
(52, 'App\\Models\\Customer', 1, 'ApiToken', 'ffa4b3f9a132a5bc98cb1e0dcca2915d15bcdec8175b6641773ce5dd1f6c5ae4', '[\"*\"]', '2021-05-12 21:22:27', '2021-05-12 08:38:00', '2021-05-12 21:22:27'),
(53, 'App\\Models\\Customer', 1, 'ApiToken', '8b805c2fab543fab716273f241c33aa1aeff892a68aecd6155a64b3180ce1a0f', '[\"*\"]', '2021-05-18 09:28:58', '2021-05-12 21:25:11', '2021-05-18 09:28:58'),
(54, 'App\\Models\\Customer', 1, 'ApiToken', 'c500e92625406822f64c01a78001a0d101851ce5a7e383ad03d4c71fa34fbb94', '[\"*\"]', '2021-05-21 08:07:32', '2021-05-18 09:29:22', '2021-05-21 08:07:32'),
(55, 'App\\Models\\Customer', 1, 'ApiToken', '50d5bbf16e7e4de510d28f0d6040a22f53b3bfc8bd1ad86ffeb268a20e1c5e29', '[\"*\"]', '2021-06-01 02:06:41', '2021-05-21 08:08:09', '2021-06-01 02:06:41'),
(56, 'App\\Models\\Customer', 1, 'ApiToken', 'fa6ce127c3b825c18e0765334686674a7613a54e3de493fbe9931c8dca044e75', '[\"*\"]', '2021-05-26 07:49:57', '2021-05-25 02:43:37', '2021-05-26 07:49:57'),
(57, 'App\\Models\\Customer', 1, 'ApiToken', '8047edee7d108af25a0260ac8e845afe48694ba11ff1aa5fdac80adaf6152a11', '[\"*\"]', '2021-05-26 07:54:44', '2021-05-26 07:54:28', '2021-05-26 07:54:44'),
(58, 'App\\Models\\Customer', 6, 'ApiToken', '9ba859b0a02400a5a19c66bffc03f66fc12e2d395dd5c535a96782922e768003', '[\"*\"]', '2021-05-26 20:59:37', '2021-05-26 20:59:37', '2021-05-26 20:59:37'),
(59, 'App\\Models\\Customer', 1, 'ApiToken', '3fd854e41ce029f51fd4de16f0969513d37eb224343cd651c6735536d14ad462', '[\"*\"]', '2021-05-27 20:43:59', '2021-05-27 20:43:58', '2021-05-27 20:43:59'),
(60, 'App\\Models\\Customer', 1, 'ApiToken', 'da47d70290f7ca13fac700361907d0c28b935dabd4ab071f94e0756d7bde67ca', '[\"*\"]', '2021-05-27 21:18:14', '2021-05-27 21:12:28', '2021-05-27 21:18:14'),
(61, 'App\\Models\\Customer', 1, 'ApiToken', '4223e0ef2b2925a5571c06f76fcf6147394dda5a7a78fa4eca018604beca288e', '[\"*\"]', '2021-05-27 21:31:40', '2021-05-27 21:20:25', '2021-05-27 21:31:40'),
(62, 'App\\Models\\Customer', 1, 'ApiToken', 'c9989399880a4c35720f79052f006b692a9d82b54e93498e3da6a728abd94d34', '[\"*\"]', NULL, '2021-06-01 09:23:08', '2021-06-01 09:23:08'),
(63, 'App\\Models\\Customer', 1, 'ApiToken', 'b588c0286127da8239ff8421a50596f7e84337da5b4728658bae3d3dbb47b9cc', '[\"*\"]', NULL, '2021-06-01 09:50:19', '2021-06-01 09:50:19'),
(64, 'App\\Models\\Customer', 1, 'ApiToken', '8a58ee493ae1eb642bd5a242d61327d59304e10559aca1d88e363fe2a68deffd', '[\"*\"]', NULL, '2021-06-01 09:52:44', '2021-06-01 09:52:44'),
(65, 'App\\Models\\Customer', 1, 'ApiToken', 'ab13e7bd3d8a94675e8ce575e33332bd7ec284a594680e8b626194670c029b71', '[\"*\"]', NULL, '2021-06-01 10:11:37', '2021-06-01 10:11:37'),
(66, 'App\\Models\\Customer', 1, 'ApiToken', '54a3a5294597de04a633c5c69efe8366c6d8c5dcc7763b0b599fb8d15b9d2b9a', '[\"*\"]', NULL, '2021-06-01 10:13:35', '2021-06-01 10:13:35'),
(67, 'App\\Models\\Customer', 1, 'ApiToken', 'd93629a15f847e5d27e238fb8074baa8e644ab87191196d8999eb0591dd8ee4a', '[\"*\"]', '2021-06-02 19:43:38', '2021-06-01 10:15:16', '2021-06-02 19:43:38'),
(68, 'App\\Models\\Customer', 1, 'ApiToken', 'a056190df8df5d29fc11b3a0e79508b42a11f58b5b12a4c4817302e3e0c5559c', '[\"*\"]', '2021-06-02 20:03:56', '2021-06-02 20:03:53', '2021-06-02 20:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `type_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_province` int(11) DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` int(11) DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_customer` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `title`, `name`, `address`, `id_city`, `type_city`, `city`, `id_province`, `province`, `postalcode`, `phone_number`, `id_customer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alamat Amanda', 'Amanda Charl', 'Jl. ABC no 10', 23, 'Kota', 'Bandung', 9, 'Jawa Barat', 40232, '1234567', 1, '2021-06-01 22:55:00', '2021-06-01 22:55:14', NULL),
(2, 'Alamat Chika', 'Chika Charl', 'Jl.Sudirman no 11', 153, 'Kota', 'Jakarta Selatan', 6, 'DKI Jakarta', 45678, '323232', 1, '2021-06-01 22:56:01', '2021-06-01 22:56:09', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportcountdata`
-- (See below for the actual view)
--
CREATE TABLE `reportcountdata` (
`name` varchar(11)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportproductorders`
-- (See below for the actual view)
--
CREATE TABLE `reportproductorders` (
`month` varchar(9)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportsellingorders`
-- (See below for the actual view)
--
CREATE TABLE `reportsellingorders` (
`month` varchar(9)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactiondetailviews`
-- (See below for the actual view)
--
CREATE TABLE `transactiondetailviews` (
`id` bigint(20)
,`id_transaction` bigint(20)
,`id_item` bigint(20)
,`code` varchar(191)
,`name` varchar(191)
,`photo` varchar(191)
,`qty` int(11)
,`totalprice` decimal(18,0)
,`total` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_customer` bigint(20) DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT NULL,
  `id_receiver` bigint(20) DEFAULT NULL,
  `id_billing` bigint(20) DEFAULT NULL,
  `tax_percent` decimal(18,4) DEFAULT NULL,
  `tax_price` decimal(18,4) DEFAULT NULL,
  `shipping_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_price` decimal(18,0) DEFAULT NULL,
  `transaction_total` decimal(18,0) DEFAULT NULL,
  `transaction_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `id_customer`, `transaction_date`, `id_receiver`, `id_billing`, `tax_percent`, `tax_price`, `shipping_name`, `shipping_type`, `shipping_price`, `transaction_total`, `transaction_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'T00001', 1, '2021-06-01 23:01:53', 1, 1, '10.0000', '36000.0000', 'jne', 'CTC', '8000', '404000', 'SELESAI', 'LUNAS', '2021-06-01 23:01:53', '2021-06-02 04:37:54'),
(2, 'T00002', 1, '2021-06-01 23:06:11', 2, 2, '10.0000', '16000.0000', 'jne', 'CTCYES', '18000', '194000', 'BATAL', '-', '2021-06-01 23:06:11', '2021-06-02 04:38:43'),
(3, 'T00003', 1, '2021-06-02 04:58:13', 1, 2, '10.0000', '72000.0000', 'jne', 'REG', '11000', '803000', 'BELUM BAYAR', '-', '2021-06-02 04:58:13', '2021-06-02 04:58:13');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactionviews`
-- (See below for the actual view)
--
CREATE TABLE `transactionviews` (
`id` bigint(20)
,`code` varchar(255)
,`id_customer` bigint(20)
,`IDReceiver` bigint(20)
,`ReceiverName` varchar(255)
,`ReceiverAddress` longtext
,`ReceiverCity` varchar(511)
,`ReceiverProvince` varchar(255)
,`ReceiverPostalCode` int(11)
,`ReceiverPhoneNumber` varchar(255)
,`IdSender` bigint(20)
,`SenderName` varchar(255)
,`SenderAddress` longtext
,`SenderCity` varchar(511)
,`SenderProvince` varchar(255)
,`SenderPostalCode` int(11)
,`SenderPhoneNumber` varchar(255)
,`shipping_name` varchar(255)
,`shipping_type` varchar(255)
,`shipping_price` decimal(18,0)
,`transaction_total` decimal(18,0)
,`transaction_status` varchar(255)
,`payment_status` varchar(255)
,`transaction_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint(20) NOT NULL,
  `id_transaction` bigint(20) NOT NULL,
  `id_item` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(18,0) NOT NULL,
  `discount` decimal(18,0) NOT NULL,
  `totalprice` decimal(18,0) NOT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `id_transaction`, `id_item`, `qty`, `price`, `discount`, `totalprice`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '200000', '10', '180000', '180000', '2021-06-01 23:01:54', '2021-06-01 23:01:54'),
(2, 1, 18, 1, '200000', '10', '180000', '180000', '2021-06-01 23:01:54', '2021-06-01 23:01:54'),
(3, 2, 2, 1, '200000', '20', '160000', '160000', '2021-06-01 23:06:11', '2021-06-01 23:06:11'),
(4, 3, 21, 2, '300000', '10', '270000', '540000', '2021-06-02 04:58:13', '2021-06-02 04:58:13'),
(5, 3, 25, 1, '200000', '10', '180000', '180000', '2021-06-02 04:58:13', '2021-06-02 04:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `countitemtypeviews`
--
DROP TABLE IF EXISTS `countitemtypeviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `countitemtypeviews`  AS SELECT `it`.`id` AS `id`, `it`.`name` AS `name`, `it`.`cover` AS `cover`, count(`i`.`id_type`) AS `jumlah` FROM (`item_types` `it` left join `items` `i` on(`it`.`id` = `i`.`id_type`)) WHERE `i`.`deleted_at` is null AND `it`.`deleted_at` is null GROUP BY `it`.`id`, `it`.`name`, `it`.`cover` ;

-- --------------------------------------------------------

--
-- Structure for view `itemnewviews`
--
DROP TABLE IF EXISTS `itemnewviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemnewviews`  AS SELECT `i`.`id` AS `id`, `i`.`code` AS `code`, `i`.`name` AS `name`, `i`.`qty` AS `qty`, `i`.`description` AS `description`, `i`.`photo` AS `photo`, `i`.`price` AS `price`, `i`.`price`- `i`.`price` * (`i`.`discount` / 100) AS `totalprice`, `i`.`discount` AS `discount`, `it`.`id` AS `idType`, `it`.`name` AS `tipeItem`, `i`.`created_at` AS `created_at` FROM (`items` `i` join `item_types` `it` on(`i`.`id_type` = `it`.`id`)) WHERE `i`.`deleted_at` is null ORDER BY date_format(`i`.`created_at`,'%Y-%m-%d') DESC ;

-- --------------------------------------------------------

--
-- Structure for view `itemviews`
--
DROP TABLE IF EXISTS `itemviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemviews`  AS SELECT `i`.`id` AS `id`, `i`.`code` AS `code`, `i`.`name` AS `name`, `i`.`qty` AS `qty`, `i`.`description` AS `description`, `i`.`photo` AS `photo`, `i`.`price` AS `price`, `i`.`price`- `i`.`price` * (`i`.`discount` / 100) AS `totalprice`, `i`.`discount` AS `discount`, `it`.`id` AS `idType`, `it`.`name` AS `tipeItem`, sum(`tr_i`.`qty`) AS `terjual` FROM ((`items` `i` join `item_types` `it` on(`i`.`id_type` = `it`.`id`)) left join `transaction_items` `tr_i` on(`tr_i`.`id_item` = `i`.`id`)) WHERE `i`.`deleted_at` is null GROUP BY `i`.`id`, `i`.`code`, `i`.`name`, `i`.`qty`, `i`.`description`, `i`.`photo`, `i`.`price`, `i`.`discount`, `it`.`id`, `it`.`name` ORDER BY date_format(`i`.`created_at`,'%Y-%m-%d') DESC ;

-- --------------------------------------------------------

--
-- Structure for view `paymentviews`
--
DROP TABLE IF EXISTS `paymentviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paymentviews`  AS SELECT `p`.`id` AS `id`, `p`.`code` AS `code`, `p`.`name` AS `name`, `tr`.`code` AS `code_transaction`, `p`.`transfer_date` AS `transfer_date`, `p`.`slip_transfer` AS `slip_transfer`, `p`.`payment` AS `payment`, `pt`.`id` AS `id_payment_type`, `pt`.`type` AS `payment_type`, `p`.`payment_status` AS `payment_status` FROM ((`payments` `p` join `transactions` `tr` on(`p`.`id_transaction` = `tr`.`id`)) join `payment_types` `pt` on(`p`.`id_payment_type` = `pt`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `reportcountdata`
--
DROP TABLE IF EXISTS `reportcountdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportcountdata`  AS SELECT 'product' AS `name`, count(0) AS `jumlah` FROM `items` ;

-- --------------------------------------------------------

--
-- Structure for view `reportproductorders`
--
DROP TABLE IF EXISTS `reportproductorders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportproductorders`  AS SELECT CASE END FROM (`transactions` `tr` join `transaction_items` `tr_i` on(`tr_i`.`id_transaction` = `tr`.`id`)) WHERE `tr`.`payment_status` = 'LUNAS' AND `tr`.`transaction_status` = 'SELESAI' GROUP BY month(`tr`.`transaction_date`) ;

-- --------------------------------------------------------

--
-- Structure for view `reportsellingorders`
--
DROP TABLE IF EXISTS `reportsellingorders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportsellingorders`  AS SELECT CASE END FROM (`transactions` `tr` join `transaction_items` `tr_i` on(`tr_i`.`id_transaction` = `tr`.`id`)) WHERE `tr`.`payment_status` = 'LUNAS' AND `tr`.`transaction_status` = 'SELESAI' GROUP BY month(`tr`.`transaction_date`) ;

-- --------------------------------------------------------

--
-- Structure for view `transactiondetailviews`
--
DROP TABLE IF EXISTS `transactiondetailviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactiondetailviews`  AS SELECT `tr_i`.`id` AS `id`, `tr_i`.`id_transaction` AS `id_transaction`, `tr_i`.`id_item` AS `id_item`, `i`.`code` AS `code`, `i`.`name` AS `name`, `i`.`photo` AS `photo`, `tr_i`.`qty` AS `qty`, `tr_i`.`totalprice` AS `totalprice`, `tr_i`.`total` AS `total` FROM (`transaction_items` `tr_i` join `items` `i` on(`tr_i`.`id_item` = `i`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `transactionviews`
--
DROP TABLE IF EXISTS `transactionviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactionviews`  AS SELECT `tr`.`id` AS `id`, `tr`.`code` AS `code`, `tr`.`id_customer` AS `id_customer`, `tr`.`id_receiver` AS `IDReceiver`, `r`.`name` AS `ReceiverName`, `r`.`address` AS `ReceiverAddress`, concat_ws(' ',`r`.`type_city`,`r`.`city`) AS `ReceiverCity`, `r`.`province` AS `ReceiverProvince`, `r`.`postalcode` AS `ReceiverPostalCode`, `r`.`phone_number` AS `ReceiverPhoneNumber`, `tr`.`id_billing` AS `IdSender`, `rb`.`name` AS `SenderName`, `rb`.`address` AS `SenderAddress`, concat_ws(' ',`rb`.`type_city`,`rb`.`city`) AS `SenderCity`, `rb`.`province` AS `SenderProvince`, `rb`.`postalcode` AS `SenderPostalCode`, `rb`.`phone_number` AS `SenderPhoneNumber`, `tr`.`shipping_name` AS `shipping_name`, `tr`.`shipping_type` AS `shipping_type`, `tr`.`shipping_price` AS `shipping_price`, `tr`.`transaction_total` AS `transaction_total`, `tr`.`transaction_status` AS `transaction_status`, `tr`.`payment_status` AS `payment_status`, `tr`.`transaction_date` AS `transaction_date` FROM ((`transactions` `tr` join `receivers` `r` on(`r`.`id` = `tr`.`id_receiver`)) join `receivers` `rb` on(`rb`.`id` = `tr`.`id_billing`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Items_ItemsType` (`id_type`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_customer` (`id_customer`),
  ADD KEY `transaction_billing` (`id_billing`),
  ADD KEY `transaction_receivers` (`id_receiver`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_items_items` (`id_item`),
  ADD KEY `transaction_items_transactions` (`id_transaction`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `Items_ItemsType` FOREIGN KEY (`id_type`) REFERENCES `item_types` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transaction_billing` FOREIGN KEY (`id_billing`) REFERENCES `receivers` (`id`),
  ADD CONSTRAINT `transaction_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transaction_receivers` FOREIGN KEY (`id_receiver`) REFERENCES `receivers` (`id`);

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_items` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `transaction_items_transactions` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

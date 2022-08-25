-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 07:38 AM
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
-- Database: `diagnosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `address`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '01964719349', 'Banglamotor Dhakac', '5etmsm1ktt1661157877.jpg', NULL, '$2y$10$LSdQiC/sezytbxGTH91V6e9QvrAVH5y6JzpazuwEfdBzPSuyCiQgO', NULL, '2022-08-11 00:21:31', '2022-08-22 02:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `agency_name`, `created_at`, `updated_at`) VALUES
(1, 'abc agency', '2022-08-23 05:02:16', '2022-08-23 05:02:16'),
(2, 'def agenct', '2022-08-23 05:02:32', '2022-08-23 05:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'fcdfs', 'fdsggdfg', '2022-08-24 05:48:47', '2022-08-24 05:48:47'),
(2, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'SA', 'fdsfs', '2022-08-24 05:49:29', '2022-08-24 05:49:29'),
(3, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'ss', 'fdsf', '2022-08-24 05:49:38', '2022-08-24 05:49:38'),
(4, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'ss', 'fdsfsd', '2022-08-24 05:49:52', '2022-08-24 05:49:52'),
(5, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'ss', 'fsdf', '2022-08-24 05:50:09', '2022-08-24 05:50:09'),
(6, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'sss', 'dfsfdsg', '2022-08-24 05:50:55', '2022-08-24 05:50:55'),
(7, 'Artsoft Developer', 'developer1000486@gmail.com', '01964719349', 'ss', 'fsdf', '2022-08-24 05:51:20', '2022-08-24 05:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `package_id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Malaysia', '2022-08-11 03:31:44', '2022-08-11 03:57:24'),
(2, 3, 'Soudi Arab', '2022-08-11 03:51:56', '2022-08-11 03:51:56'),
(3, 5, 'United Arab Emirate', '2022-08-11 04:00:57', '2022-08-11 04:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `report_id`, `title`, `report_file`, `created_at`, `updated_at`) VALUES
(13, 2, NULL, '51adtv6dgy1661324616.png', '2022-08-24 01:03:36', '2022-08-24 01:03:36'),
(14, 2, NULL, 'z04mb91vg01661325789.jpeg', '2022-08-24 01:23:09', '2022-08-24 01:23:09');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_23_123038_create_admins_table', 1),
(7, '2022_08_04_070413_create_contacts_table', 1),
(8, '2022_08_11_061214_create_packages_table', 1),
(9, '2022_08_11_074250_create_countries_table', 2),
(10, '2022_08_11_114937_create_tests_table', 3),
(11, '2014_10_12_000000_create_users_table', 4),
(14, '2022_08_17_060133_create_documents_table', 6),
(15, '2022_08_21_085842_create_socials_table', 7),
(16, '2022_07_02_065711_create_sliders_table', 8),
(17, '2022_08_22_071316_create_services_table', 9),
(18, '2022_08_23_104936_create_agencies_table', 10),
(20, '2022_08_13_080619_create_patients_table', 12),
(21, '2022_08_14_073948_create_reports_table', 12),
(22, '2022_08_24_054212_create_test_results_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `previous_price` double(11,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `previous_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Simple Pakage', 2500.00, 2500.00, 0, '2022-08-11 01:20:44', '2022-08-11 01:20:44'),
(2, 'Malaysia Package', 2700.00, 2700.00, 0, '2022-08-11 01:27:07', '2022-08-11 01:27:07'),
(3, 'U.S.K', 3500.00, 3500.00, 0, '2022-08-11 01:30:49', '2022-08-11 01:34:42'),
(5, 'U.A.E package', 2400.00, 2400.00, 0, '2022-08-11 01:38:55', '2022-08-11 01:39:32');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `age`, `nid`, `passport`, `patient_number`, `gender`, `photo`, `email_verified_at`, `father_name`, `mother_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Test', 'test@gmail.com', '01964719349', '22', '4545465', 'BY654654544654', 'P101725', 'male', '6305ba67650a2.jpeg', NULL, 'dsdsadas', 'hdjsf fhgshdfsb fhgds', NULL, '2022-08-23 23:43:03', '2022-08-23 23:43:03'),
(3, 'sas', 'sa', '01964719349', '22', 'dd', 'BY654654544654', 'P567846', 'other', '6305d0c54bd5a.jpeg', NULL, NULL, 'ss', NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(4, 'gfdgd', 'gdfg', '01964719349', '22', 'dd', 'BY654654544654', 'P986165', 'male', '6305ef27d8307.jpeg', NULL, NULL, 'gfgdf', NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(5, 'gfdgd', 'gdfg', '01964719349', '22', 'dd', 'BY654654544654', 'P904008', 'male', '6305ef57f21f1.jpeg', NULL, NULL, 'gfgdf', NULL, '2022-08-24 03:28:55', '2022-08-24 03:28:55'),
(6, 'gfdgd', 'gdfg', '01964719349', '22', 'dd', 'BY654654544654', 'P564126', 'male', '6305ef7f90673.jpeg', NULL, NULL, 'gfgdf', NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(7, 'gfdgd', 'gdfg', '01964719349', '22', 'dd', 'BY654654544654', 'P465927', 'male', '6305efcf31d95.jpeg', NULL, NULL, 'gfgdf', NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `report_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','released') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `refund` double(11,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `country_id`, `patient_id`, `agency_id`, `report_number`, `status`, `refund`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 2, 'RP749267', 'released', 0.00, '2022-08-23 23:43:03', '2022-08-24 03:43:41'),
(3, 3, 3, 2, 'RP345996', 'pending', 0.00, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(4, 2, 4, 1, 'RP611565', 'pending', 0.00, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(5, 2, 5, 1, 'RP114753', 'pending', 0.00, '2022-08-24 03:28:55', '2022-08-24 03:28:55'),
(6, 2, 6, 1, 'RP826064', 'pending', 0.00, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(7, 2, 7, 1, 'RP438938', 'pending', 0.00, '2022-08-24 03:30:55', '2022-08-24 03:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Specialist Advise', 'It is a long established fact that reader will content of page when looks layout.', '8wali1rgma1661154405.jpg', '<i class=\"flaticon-nurse\"></i>', '2022-08-22 01:38:38', '2022-08-22 01:46:46'),
(2, 'Patient Onboarding', 'It is a long established fact that reader will content of page when looks layout.', 'gbos4tbkkq1661154362.jpg', '<i class=\"flaticon-hospital-ward\"></i>', '2022-08-22 01:38:49', '2022-08-22 01:46:03'),
(3, 'Heart Checkup', 'It is a long established fact that reader will content of page when looks layout.', 'nupjpmoh7f1661154441.jpg', '<i class=\"flaticon-health-care\"></i>', '2022-08-22 01:47:22', '2022-08-22 01:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactie',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_1`, `title_2`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'we are are diagnosis service provider in this city', 'There are many variations of passages of Lorem Ipsum amets a', 'hligt64s0t1661152209.jpg', 0, '2022-08-22 00:54:17', '2022-08-22 01:10:09'),
(4, 'We are providing best abortable service', 'There are many variations of passages of Lorem Ipsum amets avoilble but majority have sufferedcted humour or', '6mpzhynlsg1661152190.jpg', 0, '2022-08-22 00:57:43', '2022-08-22 01:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `url`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'facebook.com', 'facebook', '<i class=\"ri-facebook-fill\"></i>', '2022-08-21 03:28:22', '2022-08-21 05:22:01'),
(2, 'twitter.com', 'Twitter', '<i class=\"ri-twitter-fill\"></i>', '2022-08-21 03:29:19', '2022-08-21 03:29:19'),
(3, 'linkedin.com', 'linked', '<i class=\"ri-linkedin-fill\"></i>', '2022-08-21 03:29:44', '2022-08-21 03:29:44'),
(4, 'pinterest.com', 'pinterest', '<i class=\"ri-pinterest-line\"></i>', '2022-08-21 03:30:04', '2022-08-21 03:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `country_id`, `test_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blood Group', 0, '2022-08-13 00:35:24', '2022-08-13 00:35:24'),
(2, 1, 'HIV 01 and 02 antibody', 0, '2022-08-13 00:43:31', '2022-08-13 00:43:31'),
(3, 1, 'HbsAG', 0, '2022-08-13 00:43:51', '2022-08-13 00:43:51'),
(4, 1, 'HCV Angybody', 0, '2022-08-13 00:44:12', '2022-08-13 00:44:12'),
(5, 1, 'Malaria', 0, '2022-08-13 00:44:25', '2022-08-13 00:44:25'),
(6, 1, 'Filariasis', 0, '2022-08-13 00:44:43', '2022-08-13 00:44:43'),
(7, 1, 'TPHA', 0, '2022-08-13 00:45:01', '2022-08-13 00:45:01'),
(8, 1, 'Urine Otiates', 0, '2022-08-13 00:45:38', '2022-08-13 00:45:38'),
(9, 1, 'Urine Cannabinoids', 0, '2022-08-13 00:46:24', '2022-08-13 00:46:24'),
(10, 1, 'Urine Amphetamine', 0, '2022-08-13 00:47:04', '2022-08-13 00:47:04'),
(11, 1, 'Pregnancy Test Urine', 0, '2022-08-13 00:47:29', '2022-08-13 00:47:29'),
(12, 1, 'Bita HCg (Blood Pregnancy Test)', 0, '2022-08-13 00:48:15', '2022-08-13 00:48:15'),
(13, 1, 'RBS (Random Blood Sugar)', 0, '2022-08-13 00:48:55', '2022-08-13 00:48:55'),
(14, 1, 'X-Ray Chest P/A View Digital', 0, '2022-08-13 00:49:30', '2022-08-13 00:49:30'),
(17, 2, 'xyz', 0, '2022-08-20 00:54:01', '2022-08-20 00:54:01'),
(18, 2, 'abc', 0, '2022-08-20 00:54:12', '2022-08-20 00:54:12'),
(19, 2, 'a', 0, '2022-08-21 02:18:52', '2022-08-21 02:18:52'),
(20, 2, 'b', 0, '2022-08-21 02:18:57', '2022-08-21 02:18:57'),
(21, 2, 'c', 0, '2022-08-21 02:19:00', '2022-08-21 02:19:00'),
(22, 2, 'd', 0, '2022-08-21 02:19:04', '2022-08-21 02:19:04'),
(23, 2, 'e', 0, '2022-08-21 02:19:09', '2022-08-21 02:19:09'),
(24, 2, 'f', 0, '2022-08-21 02:19:15', '2022-08-21 02:19:15'),
(25, 2, 'i', 0, '2022-08-21 02:19:18', '2022-08-21 02:19:18'),
(26, 3, 'm', 0, '2022-08-21 02:19:35', '2022-08-21 02:19:35'),
(27, 3, 'n', 0, '2022-08-21 02:19:38', '2022-08-21 02:19:38'),
(28, 3, 'o', 0, '2022-08-21 02:19:41', '2022-08-21 02:19:41'),
(29, 3, 'p', 0, '2022-08-21 02:19:44', '2022-08-21 02:19:44'),
(30, 3, 'q', 0, '2022-08-21 02:19:47', '2022-08-21 02:19:47'),
(31, 3, 'r', 0, '2022-08-21 02:19:50', '2022-08-21 02:19:50'),
(32, 3, 's', 0, '2022-08-21 02:19:53', '2022-08-21 02:19:53'),
(33, 3, 't', 0, '2022-08-21 02:19:56', '2022-08-21 02:19:56'),
(34, 3, 'u', 0, '2022-08-21 02:19:59', '2022-08-21 02:19:59'),
(35, 3, 'v', 0, '2022-08-21 02:20:02', '2022-08-21 02:20:02'),
(36, 3, 'w', 0, '2022-08-21 02:20:09', '2022-08-21 02:20:09'),
(37, 2, 'x', 0, '2022-08-21 02:20:22', '2022-08-21 02:20:22'),
(38, 2, 'y', 0, '2022-08-21 02:20:25', '2022-08-21 02:20:25'),
(39, 3, 'z', 0, '2022-08-21 02:20:28', '2022-08-21 02:20:28'),
(41, 2, 'xaaa', 0, '2022-08-23 03:13:44', '2022-08-23 03:13:44'),
(43, 2, 'Blood Group', 0, '2022-08-23 03:19:03', '2022-08-23 03:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `positive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `report_id`, `test_id`, `positive`, `negative`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'clear', '10', '2022-08-23 23:43:03', '2022-08-24 03:53:51'),
(2, 2, 2, 'bvb', NULL, '2022-08-23 23:43:03', '2022-08-24 03:54:37'),
(3, 2, 3, 'nia', '20', '2022-08-23 23:43:03', '2022-08-24 03:53:50'),
(4, 2, 4, 'vbvb', NULL, '2022-08-23 23:43:03', '2022-08-24 03:54:35'),
(5, 2, 5, NULL, '20', '2022-08-23 23:43:03', '2022-08-24 03:54:32'),
(6, 2, 6, NULL, 'ace', '2022-08-23 23:43:03', '2022-08-24 03:54:31'),
(7, 2, 7, 'bvb', NULL, '2022-08-23 23:43:03', '2022-08-24 03:54:39'),
(8, 2, 8, NULL, '20', '2022-08-23 23:43:03', '2022-08-24 03:54:30'),
(9, 2, 9, NULL, '10', '2022-08-23 23:43:03', '2022-08-24 03:54:30'),
(10, 2, 10, NULL, 'ase', '2022-08-23 23:43:03', '2022-08-24 03:54:29'),
(11, 2, 11, NULL, '52', '2022-08-23 23:43:03', '2022-08-24 03:54:28'),
(12, 2, 12, NULL, 'de', '2022-08-23 23:43:03', '2022-08-24 03:54:28'),
(13, 2, 13, NULL, '10', '2022-08-23 23:43:03', '2022-08-24 03:54:00'),
(14, 2, 14, 'bvb', NULL, '2022-08-23 23:43:03', '2022-08-24 03:54:40'),
(15, 3, 26, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(16, 3, 27, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(17, 3, 28, 'djhjfh', NULL, '2022-08-24 01:18:29', '2022-08-24 03:17:41'),
(18, 3, 29, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 03:04:56'),
(19, 3, 30, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(20, 3, 31, NULL, '100.10 ico', '2022-08-24 01:18:29', '2022-08-24 03:17:38'),
(21, 3, 32, 'jkhgfdg', NULL, '2022-08-24 01:18:29', '2022-08-24 03:17:44'),
(22, 3, 33, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(23, 3, 34, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(24, 3, 35, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(25, 3, 36, NULL, NULL, '2022-08-24 01:18:29', '2022-08-24 01:18:29'),
(26, 3, 39, 'fjkdhg', NULL, '2022-08-24 01:18:29', '2022-08-24 03:17:42'),
(27, 4, 17, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(28, 4, 18, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(29, 4, 19, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(30, 4, 20, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(31, 4, 21, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(32, 4, 22, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(33, 4, 23, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(34, 4, 24, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(35, 4, 25, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(36, 4, 37, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(37, 4, 38, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(38, 4, 41, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(39, 4, 43, NULL, NULL, '2022-08-24 03:28:07', '2022-08-24 03:28:07'),
(40, 5, 17, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(41, 5, 18, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(42, 5, 19, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(43, 5, 20, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(44, 5, 21, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(45, 5, 22, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(46, 5, 23, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(47, 5, 24, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(48, 5, 25, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(49, 5, 37, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(50, 5, 38, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(51, 5, 41, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(52, 5, 43, NULL, NULL, '2022-08-24 03:28:56', '2022-08-24 03:28:56'),
(53, 6, 17, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(54, 6, 18, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(55, 6, 19, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(56, 6, 20, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(57, 6, 21, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(58, 6, 22, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(59, 6, 23, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(60, 6, 24, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(61, 6, 25, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(62, 6, 37, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(63, 6, 38, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(64, 6, 41, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(65, 6, 43, NULL, NULL, '2022-08-24 03:29:35', '2022-08-24 03:29:35'),
(66, 7, 17, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(67, 7, 18, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(68, 7, 19, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(69, 7, 20, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(70, 7, 21, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(71, 7, 22, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(72, 7, 23, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(73, 7, 24, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(74, 7, 25, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(75, 7, 37, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(76, 7, 38, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(77, 7, 41, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55'),
(78, 7, 43, NULL, NULL, '2022-08-24 03:30:55', '2022-08-24 03:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_package_id_foreign` (`package_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_report_id_foreign` (`report_id`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_number_unique` (`patient_number`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reports_report_number_unique` (`report_number`),
  ADD KEY `reports_country_id_foreign` (`country_id`),
  ADD KEY `reports_patient_id_foreign` (`patient_id`),
  ADD KEY `reports_agency_id_foreign` (`agency_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_country_id_foreign` (`country_id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_results_report_id_foreign` (`report_id`),
  ADD KEY `test_results_test_id_foreign` (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `test_results_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_results_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 03:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminlte2`
--

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

CREATE TABLE `boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totl_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boxes`
--

INSERT INTO `boxes` (`id`, `type`, `value`, `date`, `desc`, `invoiceType`, `invoice_id`, `totl_value`, `created_at`, `updated_at`) VALUES
(1, '1', '0', '2019-09-22', 'مبلغ ابتدائي', NULL, NULL, '0', '2019-09-22 10:18:22', '2019-09-22 10:18:22'),
(4, '0', '14573.166666666668', '2019-09-24', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '1', '-14573.166666666668', '2019-09-24 14:39:37', '2019-10-22 17:35:55'),
(5, '0', '450', '2019-09-24', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '2', '-24457.5', '2019-09-24 14:47:55', '2019-10-22 17:46:26'),
(8, '0', '200000', '2019-09-24', '200 جنيه كهربا', '2', '1', '-214823.16666666666', '2019-09-24 15:07:07', '2019-11-23 15:56:16'),
(9, '0', '8', '2019-10-29', 'dfsdfdfsd', NULL, NULL, '-15031.166666666668', '2019-11-15 23:11:48', '2019-11-15 23:11:48'),
(10, '1', '1000', '2019-11-17', 'طلبيه', NULL, NULL, '-14031.166666666668', '2019-11-16 20:05:49', '2019-11-16 20:05:49'),
(11, '0', '8097.25', '2019-11-21', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '5', '-22128.416666666668', '2019-11-21 19:33:28', '2019-11-21 19:33:28'),
(12, '1', '45030', '2019-11-22', 'Sell Invoice ( فاتورة مبيعات فورية الدفع)', '1', '6', '22901.583333333332', '2019-11-22 11:30:23', '2019-11-22 11:30:23'),
(13, '0', '47', '2019-11-11', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '7', '22854.583333333332', '2019-11-23 15:47:21', '2019-11-23 15:47:21'),
(14, '0', '300', '2019-11-22', 'شراء ادوات', '2', '2', '-177245.41666666666', '2019-11-23 15:55:30', '2019-11-23 15:56:16'),
(15, '0', '1000', '2019-11-13', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '8', '-178245.41666666666', '2019-11-23 19:36:28', '2019-11-23 19:36:28'),
(16, '1', '100000', '2019-12-07', 'توريد معدات سيارات', NULL, NULL, '-78245.41666666666', '2019-12-07 14:40:59', '2019-12-07 14:40:59'),
(17, '0', '10000000', '2019-12-07', 'بيع معدات سيارات', NULL, NULL, '-10078245.416666666', '2019-12-07 14:41:45', '2019-12-07 14:41:45'),
(18, '1', '1000000000000', '2019-12-07', 'any thing', NULL, NULL, '999989921754.5834', '2019-12-07 15:04:16', '2019-12-07 15:04:16'),
(19, '0', '999990100000', '2019-12-07', 'nothing', NULL, NULL, '-178245.41662597656', '2019-12-07 15:04:59', '2019-12-07 15:04:59'),
(20, '1', '12', '2019-12-01', 'smdla', NULL, NULL, '-178233.41662597656', '2019-12-07 15:05:49', '2019-12-07 15:05:49'),
(21, '0', '13', '2019-12-07', 's', NULL, NULL, '-178246.41662597656', '2019-12-07 15:10:41', '2019-12-07 15:10:41'),
(22, '1', '1', '2019-12-07', 'lk', NULL, NULL, '-178245.41662597656', '2019-12-07 15:11:00', '2019-12-07 15:11:00'),
(23, '0', '800', '2019-12-09', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '9', '-179045.41662597656', '2019-12-09 10:37:46', '2019-12-09 10:37:46'),
(24, '1', '2000154965', '2019-12-09', 'test', NULL, NULL, '1999975919.583374', '2019-12-09 10:39:09', '2019-12-09 10:39:09'),
(25, '0', '600', '2019-12-10', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '10', '1999975319.583374', '2019-12-10 05:42:49', '2019-12-10 05:42:49'),
(26, '0', '4627', '2019-12-10', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '11', '1999970692.583374', '2019-12-10 05:43:11', '2019-12-10 05:43:11'),
(27, '0', '1400', '2019-12-10', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '13', '1999969292.583374', '2019-12-10 05:44:07', '2019-12-10 05:44:07'),
(28, '0', '1200', '2019-12-10', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع)', '1', '14', '1999968092.583374', '2019-12-10 05:44:46', '2019-12-10 12:52:18'),
(29, '0', '57', '2019-12-10', 'sdkls;ld', NULL, NULL, '1999968435.583374', '2019-12-10 08:05:01', '2019-12-10 08:05:01'),
(30, '0', '635420', '2019-12-10', 'sdsdsdsdsdsd', NULL, NULL, '1999333015.583374', '2019-12-10 08:05:15', '2019-12-10 08:05:15'),
(31, '1', '8656312', '2019-12-10', 'sdskldksd', NULL, NULL, '2007989327.583374', '2019-12-10 08:05:29', '2019-12-10 08:05:29'),
(32, '1', '5468798', '2019-12-10', 'dlkfjdkjfdjfkdf', NULL, NULL, '2013457725.583374', '2019-12-10 08:05:45', '2019-12-10 12:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(8, 'barnx', '5446515445', 'sdfds', NULL, NULL),
(9, 'barnch 2', '5446515445', 'sdfds', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'عام', '2019-09-22 10:19:21', '2019-09-22 10:20:04'),
(2, 'lab', '2019-11-22 11:20:36', '2019-11-22 11:20:36'),
(3, 'doc', '2019-11-22 11:20:46', '2019-11-22 11:20:46'),
(4, 'قطع غيار', '2019-11-23 19:32:10', '2019-11-23 19:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_services` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_doctor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `c_name`, `c_services`, `c_doctor`, `created_at`, `updated_at`) VALUES
(2, 'dsdsdsd', 'sdsdsw', 'waerfwedddddddddddddddddddd', '2019-12-11 10:37:41', '2019-12-11 10:37:41'),
(3, 'الباطنه', 'كشف , استشارة', 'محمود حمدي حماد', '2019-12-11 10:39:34', '2019-12-11 10:39:34'),
(4, 'الباطنه', 'كشف , استشارة', 'محمود حمدي حماد', '2019-12-11 12:37:49', '2019-12-11 12:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone`, `email`, `specialty`, `note`, `created_at`, `updated_at`) VALUES
(2, 'Yoshio Pollard', '01111893717', 'byqebygonu@mailinator.com', 'Ut tempor velit mai', 'Esse provident dolo', '2019-12-11 09:36:58', '2019-12-11 09:44:31'),
(3, 'Mariko Ortiz', '01004460433', 'owner@owner.com', 'bskdjbjsbdjsedjsd', 'sdsdsds', '2019-12-11 11:13:34', '2019-12-11 11:13:34'),
(4, 'محمود حمدي حماد', '01004460433', 'mahmoudhammad423@gmail.com', 'باطنه', 'اخصائي', '2019-12-11 12:37:28', '2019-12-11 12:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'عام', 'اي حاجه', '2019-09-23 12:05:30', '2019-09-23 12:05:30'),
(7, 'صلاحيات معينة', 'صلاحيات معينة', '2019-10-22 22:41:19', '2019-10-22 22:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `date`, `invoice_type`, `total_value`, `total_gain`, `due`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, '1314878653', '2019-09-24', '0', '14573.166666666668', '0', '0', '4', '2019-09-24 14:32:31', '2019-10-22 17:35:55'),
(2, '200347459', '2019-09-24', '0', '450', '0', '0', '4', '2019-09-24 14:47:55', '2019-10-22 17:46:26'),
(4, '1057460072', '2019-10-19', '1', '7500', '1716.25', '0', '3', '2019-10-19 09:48:38', '2019-10-19 09:48:38'),
(5, '534817', '2019-11-21', '0', '8097.25', '0', '0', '4', '2019-11-21 19:33:28', '2019-11-21 19:33:28'),
(6, '1792851208', '2019-11-22', '1', '45030', '10306.5', '0', '3', '2019-11-22 11:30:23', '2019-11-22 11:30:23'),
(7, '534817', '2019-11-11', '0', '47', '0', '0', '4', '2019-11-23 15:47:21', '2019-11-23 15:47:21'),
(8, '546687', '2019-11-13', '0', '1000', '0', '0', '5', '2019-11-23 19:36:28', '2019-11-23 19:36:28'),
(9, '56465', '2019-12-09', '0', '800', '0', '0', '5', '2019-12-09 10:37:46', '2019-12-09 10:37:46'),
(10, '534817', '2019-12-10', '0', '600', '0', '0', '5', '2019-12-10 05:42:49', '2019-12-10 05:42:49'),
(11, '202020', '2019-12-10', '0', '4627', '0', '0', '4', '2019-12-10 05:43:11', '2019-12-10 05:43:11'),
(12, '990741', '2019-12-10', '0', '3470.25', '0', '1', '4', '2019-12-10 05:43:44', '2019-12-10 05:43:44'),
(13, '990741', '2019-12-10', '0', '1400', '0', '0', '4', '2019-12-10 05:44:07', '2019-12-10 05:44:07'),
(14, '990741', '2019-12-10', '0', '1200', '0', '0', '4', '2019-12-10 05:44:45', '2019-12-10 12:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_product`
--

CREATE TABLE `invoice_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_gain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_product`
--

INSERT INTO `invoice_product` (`id`, `invoice_id`, `product_id`, `quantity`, `sell_price`, `pay_price`, `total_price`, `total_gain`, `created_at`, `updated_at`) VALUES
(36, '4', '1', '5', '1500', '1156.75', '7500', '1716.25', '2019-10-19 09:48:38', '2019-10-19 09:48:38'),
(37, '4', '1', NULL, NULL, NULL, NULL, NULL, '2019-10-19 09:48:38', '2019-10-19 09:48:38'),
(41, '1', '1', '2', '0', '1200.25', '2400.5', '0', '2019-10-22 17:35:55', '2019-10-22 17:35:55'),
(42, '1', '2', '4', '0', '15.666666666666666', '62.666666666666664', '0', '2019-10-22 17:35:55', '2019-10-22 17:35:55'),
(43, '1', '3', '3', '0', '35', '105', '0', '2019-10-22 17:35:55', '2019-10-22 17:35:55'),
(53, '2', '3', '10', '0', '35', '350', '0', '2019-10-22 17:46:26', '2019-10-22 17:46:26'),
(54, '2', '1', '10', '0', '10', '100', '0', '2019-10-22 17:46:26', '2019-10-22 17:46:26'),
(55, '5', '1', '7', '0', '1156.75', '8097.25', '0', '2019-11-21 19:33:28', '2019-11-21 19:33:28'),
(56, '6', '1', '30', '1500', '1156.75', '45000', '10297.5', '2019-11-22 11:30:23', '2019-11-22 11:30:23'),
(57, '6', '4', '3', '10', '7', '30', '9', '2019-11-22 11:30:23', '2019-11-22 11:30:23'),
(58, '7', '2', '3', '0', '15.666666666666666', '47', '0', '2019-11-23 15:47:21', '2019-11-23 15:47:21'),
(59, '8', '5', '5', '0', '200', '1000', '0', '2019-11-23 19:36:28', '2019-11-23 19:36:28'),
(60, '9', '5', '4', '0', '200', '800', '0', '2019-12-09 10:37:46', '2019-12-09 10:37:46'),
(61, '10', '5', '3', '0', '200', '600', '0', '2019-12-10 05:42:49', '2019-12-10 05:42:49'),
(62, '11', '1', '4', '0', '1156.75', '4627', '0', '2019-12-10 05:43:11', '2019-12-10 05:43:11'),
(63, '12', '1', '3', '0', '1156.75', '3470.25', '0', '2019-12-10 05:43:44', '2019-12-10 05:43:44'),
(64, '13', '5', '7', '0', '200', '1400', '0', '2019-12-10 05:44:07', '2019-12-10 05:44:07'),
(66, '14', '5', '6', '0', '200', '1200', '0', '2019-12-10 12:52:18', '2019-12-10 12:52:18');

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
(5, '2019_04_02_082359_create_branches_table', 1),
(6, '2019_04_02_105124_create_offers_table', 2),
(75, '2014_10_12_000000_create_users_table', 3),
(76, '2014_10_12_100000_create_password_resets_table', 3),
(77, '2019_03_26_115654_create_students_table', 3),
(78, '2019_03_28_112530_create_payments_table', 3),
(79, '2019_09_02_145445_create_groups_table', 3),
(80, '2019_09_03_102323_create_suppliers_table', 3),
(81, '2019_09_03_110631_create_supplier_types_table', 3),
(82, '2019_09_03_113430_create_supplier_start_balances_table', 3),
(83, '2019_09_04_144638_create_boxes_table', 3),
(84, '2019_09_05_105958_create_categories_table', 3),
(85, '2019_09_05_111430_create_products_table', 3),
(86, '2019_09_09_120028_create_other_invoices_table', 3),
(87, '2019_09_10_105558_create_invoices_table', 3),
(88, '2019_09_10_110213_create_invoice_product_table', 3),
(89, '2019_09_17_114544_create_units_table', 3),
(90, '2019_10_22_203712_create_permissions_table', 4),
(91, '2019_12_02_114554_create_reservations_table', 5),
(92, '2019_12_04_104706_create_patients_table', 5),
(96, '2019_12_08_114324_create_sup_requests_table', 6),
(98, '2019_12_11_100630_create_doctors_table', 7),
(99, '2019_12_11_115753_create_clinics_table', 8),
(100, '2019_12_11_124358_add_clinic_doctor_to_patients', 9);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `amount`, `level`, `created_at`, `updated_at`) VALUES
(10, 'title', '15 kg', 'level 1', '2019-07-18 18:01:54', '2019-07-18 18:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `other_invoices`
--

CREATE TABLE `other_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_invoices`
--

INSERT INTO `other_invoices` (`id`, `desc`, `value`, `date`, `created_at`, `updated_at`) VALUES
(1, '200 جنيه كهربا', '200000', '2019-09-24', '2019-09-24 15:07:07', '2019-11-23 15:56:16'),
(2, 'شراء ادوات', '300', '2019-11-22', '2019-11-23 15:55:30', '2019-11-23 15:55:30');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_no`, `name`, `gender`, `address`, `phone`, `date_of_birth`, `notes`, `created_at`, `updated_at`, `clinic`, `doctor`) VALUES
(2, '19', 'Dara Church', 'Esse quae fugiat com', 'Nisi sit consequatu', '91', '1976-04-13', 'Sed id aliquam quisq', '2019-12-06 11:37:46', '2019-12-06 11:37:46', '', ''),
(3, '2659', 'Saeeed', 'male', 'Helwan', '01004460433', '2019-12-11', 'Aut quasi atque non', '2019-12-11 11:38:26', '2019-12-11 11:38:26', '3', '2'),
(4, '2000', 'Yasser', 'male', 'smdlskmdls', '01004460433', '2019-12-11', 'Dolore ducimus sit', '2019-12-11 12:08:11', '2019-12-11 12:08:11', '3', 'Mariko Ortiz'),
(5, '13', 'Mary Oneill', 'Adipisci aut ea sapi', 'Nisi et doloremque n', '35', '1974-08-13', 'Quibusdam enim quos', '2019-12-11 12:08:48', '2019-12-11 12:08:48', 'الباطنه', 'Mariko Ortiz'),
(6, '10000', 'سيد محمد مسعد', 'ذكر', 'الصف', '01004460433', '2019-12-11', 'استقبال', '2019-12-11 12:39:06', '2019-12-11 12:39:06', 'الباطنه', 'محمود حمدي حماد');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `group_id`, `menu`, `view`, `add`, `edit`, `delete`, `search`, `print`, `created_at`, `updated_at`) VALUES
(626, '7', 'dashboard', '0', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(627, '7', 'groups', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(628, '7', 'users', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(629, '7', 'suppliers', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(630, '7', 'categories', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(631, '7', 'units', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(632, '7', 'products', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(633, '7', 'PurchaseInvoice', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(634, '7', 'sellInvoice', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(635, '7', 'totalgainindex', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(636, '7', 'boxes', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:18', '2019-10-23 00:39:18'),
(637, '7', 'otherinvoices', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:19', '2019-10-23 00:39:19'),
(685, '1', 'dashboard', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(686, '1', 'groups', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(687, '1', 'users', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(688, '1', 'suppliers', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(689, '1', 'categories', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(690, '1', 'units', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(691, '1', 'products', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:19', '2019-12-11 09:01:19'),
(692, '1', 'PurchaseInvoice', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(693, '1', 'sellInvoice', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(694, '1', 'totalgainindex', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(695, '1', 'boxes', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(696, '1', 'otherinvoices', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(697, '1', 'reservations', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(698, '1', 'patient', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(699, '1', 'doctor', '1', '1', '1', '1', '1', '1', '2019-12-11 09:01:20', '2019-12-11 09:01:20'),
(700, '1', 'doctors', '1', '1', '1', '1', '1', '1', '2019-12-11 01:10:11', '2019-12-11 00:12:21'),
(701, '1', 'patients', '1', '1', '1', '1', '1', '1', '2019-12-11 01:10:11', '2019-12-11 00:12:21'),
(702, '1', 'clinics', '1', '1', '1', '1', '1', '1', '2019-12-11 01:10:11', '2019-12-11 00:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `category_id`, `unit_id`, `desc`, `sell_price`, `pay_price`, `expire_date`, `quantity`, `alert_quantity`, `created_at`, `updated_at`) VALUES
(1, '1419449488', 'اتش تي سي 2017', '1', '1', 'اي حاجه', '1156.75', '1500', '2019-11-21', '10', '5', '2019-09-22 10:20:58', '2019-12-10 05:43:44'),
(2, '887308514', 'جاي 5', '1', '1', 'اي حاجه', '15.666666666666666', '20', '2019-09-23', '17', '5', '2019-09-23 11:21:11', '2019-11-23 15:47:21'),
(3, '2003578141', 'بوكسر ريلاكس من مقاس 3 الي 7', '1', '1', 'مقاييغفبغ', '35', '45', '2019-09-24', '53', '3', '2019-09-24 14:45:07', '2019-11-15 23:13:48'),
(4, '202020', 'كشف', '3', '3', 'كشف', '7', '10', '2019-11-22', '2', '4', '2019-11-22 11:22:09', '2019-11-22 11:30:23'),
(5, '534817', 'فثسف', '4', '3', 'Admin For This System', '200', '300', '2019-11-23', '33', '5', '2019-11-23 19:33:36', '2019-12-10 12:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_expire_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `patient_no`, `name`, `gender`, `address`, `phone`, `date_of_birth`, `res_expire_date`, `notes`, `created_at`, `updated_at`) VALUES
(2, '67', 'Inez Mcdaniel', 'Quae numquam volupta', 'Exercitation magnam', '40', '2017-01-25', '2012-02-14', 'Molestiae laboris qu', '2019-12-06 12:27:24', '2019-12-06 12:27:24'),
(3, '61', 'Clark Williamson', 'Eiusmod molestiae ve', 'Modi est ipsum labo', '85', '1971-11-10', '2016-07-11', 'Dolorem est neque t', '2019-12-07 12:06:31', '2019-12-07 12:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `type`, `address`, `phone`, `notes`, `image`, `created_at`, `updated_at`) VALUES
(3, 'محمود حمدي عبدالله', '1', 'عرب الحصار - الصف - الجيزة', '01118763129', 'لا ملاحظات', NULL, '2019-09-22 13:08:49', '2019-11-15 23:15:21'),
(4, 'عربية البضاعة', '2', 'القاهره - المعادي الجديده', '01118763129', 'لا ملاحظات', NULL, '2019-09-22 13:09:13', '2019-09-22 13:09:13'),
(5, 'Mahmoud Hammad', '2', 'Helwan', '01004460433', 'shgja', NULL, '2019-11-23 16:09:35', '2019-11-23 16:09:35'),
(6, 'Emad', '1', 'Helwan', '01004460433', 'shgja', NULL, '2019-11-29 09:46:55', '2019-11-29 09:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_start_balances`
--

CREATE TABLE `supplier_start_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depet_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_start_balances`
--

INSERT INTO `supplier_start_balances` (`id`, `supplier_id`, `desc`, `date`, `payment_type`, `depet_value`, `invoice_id`, `total_balance`, `created_at`, `updated_at`) VALUES
(3, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-09-24', '0', '14573.166666666668', '1', '0', '2019-09-24 14:39:37', '2019-10-22 17:35:56'),
(4, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-09-24', '0', '450', '2', '0', '2019-09-24 14:47:55', '2019-10-22 17:46:26'),
(7, '4', 'dfsdfdfsd', '2019-10-29', '0', '8', NULL, '-8', '2019-11-15 23:11:48', '2019-11-15 23:11:48'),
(8, '3', 'طلبيه', '2019-11-17', '1', '1000', NULL, '1000', '2019-11-16 20:05:49', '2019-11-16 20:05:49'),
(9, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-11-21', '0', '8097.25', '5', '-8', '2019-11-21 19:33:29', '2019-11-21 19:33:29'),
(10, '3', 'Sell Invoice ( فاتورة مبيعات فورية الدفع )', '2019-11-22', '1', '45030', '6', '1000', '2019-11-22 11:30:23', '2019-11-22 11:30:23'),
(11, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-11-11', '0', '47', '7', '-8', '2019-11-23 15:47:21', '2019-11-23 15:47:21'),
(12, '5', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-11-13', '0', '1000', '8', '0', '2019-11-23 19:36:28', '2019-11-23 19:36:28'),
(13, '6', 'توريد معدات سيارات', '2019-12-07', '1', '100000', NULL, '100000', '2019-12-07 14:40:59', '2019-12-07 14:40:59'),
(14, '6', 'بيع معدات سيارات', '2019-12-07', '0', '10000000', NULL, '-9900000', '2019-12-07 14:41:45', '2019-12-07 14:41:45'),
(15, '6', 'any thing', '2019-12-07', '1', '1000000000000', NULL, '999990100000', '2019-12-07 15:04:15', '2019-12-07 15:04:15'),
(16, '6', 'nothing', '2019-12-07', '0', '999990100000', NULL, '0', '2019-12-07 15:04:59', '2019-12-07 15:04:59'),
(17, '6', 'smdla', '2019-12-01', '1', '12', NULL, '12', '2019-12-07 15:05:49', '2019-12-07 15:05:49'),
(18, '6', 's', '2019-12-07', '0', '13', NULL, '-1', '2019-12-07 15:10:41', '2019-12-07 15:10:41'),
(19, '6', 'lk', '2019-12-07', '1', '1', NULL, '0', '2019-12-07 15:11:00', '2019-12-07 15:11:00'),
(20, '5', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-12-09', '0', '800', '9', '0', '2019-12-09 10:37:46', '2019-12-09 10:37:46'),
(21, '5', 'test', '2019-12-09', '1', '2000154965', NULL, '2000154965', '2019-12-09 10:39:09', '2019-12-09 10:39:09'),
(22, '5', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-12-10', '0', '600', '10', '2000154965', '2019-12-10 05:42:49', '2019-12-10 05:42:49'),
(23, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-12-10', '0', '4627', '11', '-8', '2019-12-10 05:43:11', '2019-12-10 05:43:11'),
(24, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-12-10', '0', '1400', '13', '-8', '2019-12-10 05:44:07', '2019-12-10 05:44:07'),
(25, '4', 'Purchase Invoice ( فاتورة مشتريات فورية الدفع )', '2019-12-10', '0', '1200', '14', '-8', '2019-12-10 05:44:46', '2019-12-10 12:52:18'),
(26, '6', 'sdkls;ld', '2019-12-10', '0', '57', NULL, '-57', '2019-12-10 08:05:01', '2019-12-10 08:05:01'),
(27, '6', 'sdsdsdsdsdsd', '2019-12-10', '0', '635420', NULL, '-635477', '2019-12-10 08:05:15', '2019-12-10 08:05:15'),
(28, '6', 'sdskldksd', '2019-12-10', '1', '8656312', NULL, '8020835', '2019-12-10 08:05:29', '2019-12-10 08:05:29'),
(29, '6', 'dlkfjdkjfdjfkdf', '2019-12-10', '1', '5468798', NULL, '13489633', '2019-12-10 08:05:45', '2019-12-10 08:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_types`
--

CREATE TABLE `supplier_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_types`
--

INSERT INTO `supplier_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Client ( زبون )', NULL, NULL),
(2, 'Supplier ( مورد )', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sup_requests`
--

CREATE TABLE `sup_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sup_requests`
--

INSERT INTO `sup_requests` (`id`, `supId`, `phone`, `request`, `created_at`, `updated_at`) VALUES
(5, '6', '01004460433', 'السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قطعة جنط سبور 16 علما بأن 30 قطعة جنط سبور 15 قد يتم استرجعهم', '2019-12-09 03:14:23', '2019-12-09 01:17:20'),
(6, '6', '01004460433', 'السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قطعة جنط سبور 16 علما بأن 30 قطعة جنط سبور 15 قد يتم استرجعهم', '2019-12-09 03:14:23', '2019-12-09 01:17:20'),
(7, '6', '01004460433', 'السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قطعة جنط سبور 16 علما بأن 30 قطعة جنط سبور 15 قد يتم استرجعهم', '2019-12-09 03:14:23', '2019-12-09 01:17:20'),
(25, '6', '01004460433', 'السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قطعة جنط سبور 16 علما بأن 30 قطعة جنط سبور 15 قد يتم استرجعهم السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قط', '2019-12-10 06:12:11', '2019-12-10 06:12:11'),
(26, '6', '01004460433', 'السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قطعة جنط سبور 16 علما بأن 30 قطعة جنط سبور 15 قد يتم استرجعهم السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قط', '2019-12-10 06:12:30', '2019-12-10 06:12:30'),
(32, '6', '01004460433', 'Odit est velit enim', '2019-12-10 09:33:48', '2019-12-10 09:33:48'),
(33, '6', '01004460433', 'Quasi enim aut nostr', '2019-12-10 09:33:58', '2019-12-10 09:33:58'),
(34, '6', '01004460433', 'السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قطعة جنط سبور 16 علما بأن 30 قطعة جنط سبور 15 قد يتم استرجعهم السلام عليكم ورحمة الله وبركاته نريد طلب عدد 20 قطعة تيل فرامل و300 قط', '2019-12-10 09:34:06', '2019-12-10 09:34:06'),
(35, '6', '01004460433', 'Qui deserunt ab atqu', '2019-12-10 09:34:21', '2019-12-10 09:34:21'),
(36, '5', '01004460433', 'Quasi enim aut nostr', '2019-12-10 10:22:20', '2019-12-10 10:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'قطعه', '2019-09-22 10:19:37', '2019-09-22 10:19:37'),
(2, 'test', '2019-11-22 11:19:50', '2019-11-22 11:19:50'),
(3, 'other', '2019-11-22 11:20:09', '2019-11-22 11:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `group_id`, `desc`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Mahmoud Hammad', 'mahmoudhammad423@gmail.com', '01004460433', '1', 'Admin For This System', 'Helwan', NULL, '$2y$12$bL2bFTdjLlGASqtaQ96Gw.SEX0MjR4jsnHC8k6/dkOqcmcALQt1sa', NULL, '2019-11-15 23:02:02', '2019-11-15 23:02:02'),
(9, 'Bianca Watts', 'lytybi@mailinator.net', '87', '7', 'Enim aliquid eos omn', 'Quia quis officia in', NULL, '$2y$10$mNRAyLvSIuqcxaN44nCxmugSLobvafTfQ1LKcMJ3/XyqWCWLrD5ju', NULL, '2019-11-21 18:42:25', '2019-11-21 18:42:25'),
(11, 'Emad hamdi', 'emad@gmail.com', '01004460465', '1', 'Admin For This System', 'Helwan jhjh', NULL, '$2y$10$6RaN3XapKBvjat0B0HcF0O2LdB1cQBn9BIeK7vcek8iZx.0Oevn9e', NULL, '2019-11-29 09:49:41', '2019-11-29 09:49:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_product`
--
ALTER TABLE `invoice_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_invoices`
--
ALTER TABLE `other_invoices`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_start_balances`
--
ALTER TABLE `supplier_start_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_types`
--
ALTER TABLE `supplier_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_requests`
--
ALTER TABLE `sup_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice_product`
--
ALTER TABLE `invoice_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_invoices`
--
ALTER TABLE `other_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_start_balances`
--
ALTER TABLE `supplier_start_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier_types`
--
ALTER TABLE `supplier_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sup_requests`
--
ALTER TABLE `sup_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

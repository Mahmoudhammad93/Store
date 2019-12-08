-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 04:46 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminlte`
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
(7, '1', '200', '2019-09-24', 'Sell Invoice (  فاتورة مبيعات فورية الدفع )', '1', '3', '-24157.5', '2019-09-24 14:55:09', '2019-09-24 14:55:09'),
(8, '0', '200', '2019-09-24', '200 جنيه كهربا', '2', '1', '-15023.166666666668', '2019-09-24 15:07:07', '2019-10-22 17:46:26');

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
(1, 'عام', '2019-09-22 10:19:21', '2019-09-22 10:20:04');

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
(3, '740482332', '2019-09-24', '1', '200', '25', '0', '3', '2019-09-24 14:53:20', '2019-09-24 14:55:08'),
(4, '1057460072', '2019-10-19', '1', '7500', '1716.25', '0', '3', '2019-10-19 09:48:38', '2019-10-19 09:48:38');

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
(33, '3', '1', '10', '0', '1156.75', '11567.5', '0', '2019-09-24 14:55:08', '2019-09-24 14:55:08'),
(34, '3', '3', '5', '40', '35', '200', '25', '2019-09-24 14:55:08', '2019-09-24 14:55:08'),
(35, '3', '2', NULL, '20', '15.666666666666666', NULL, NULL, '2019-09-24 14:55:09', '2019-09-24 14:55:09'),
(36, '4', '1', '5', '1500', '1156.75', '7500', '1716.25', '2019-10-19 09:48:38', '2019-10-19 09:48:38'),
(37, '4', '1', NULL, NULL, NULL, NULL, NULL, '2019-10-19 09:48:38', '2019-10-19 09:48:38'),
(41, '1', '1', '2', '0', '1200.25', '2400.5', '0', '2019-10-22 17:35:55', '2019-10-22 17:35:55'),
(42, '1', '2', '4', '0', '15.666666666666666', '62.666666666666664', '0', '2019-10-22 17:35:55', '2019-10-22 17:35:55'),
(43, '1', '3', '3', '0', '35', '105', '0', '2019-10-22 17:35:55', '2019-10-22 17:35:55'),
(53, '2', '3', '10', '0', '35', '350', '0', '2019-10-22 17:46:26', '2019-10-22 17:46:26'),
(54, '2', '1', '10', '0', '10', '100', '0', '2019-10-22 17:46:26', '2019-10-22 17:46:26');

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
(90, '2019_10_22_203712_create_permissions_table', 4);

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
(1, '200 جنيه كهربا', '200', '2019-09-24', '2019-09-24 15:07:07', '2019-09-24 15:07:07');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` text COLLATE utf8mb4_unicode_ci,
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
(206, '1', 'dashboard', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(207, '1', 'groups', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(208, '1', 'users', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(209, '1', 'suppliers', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(210, '1', 'categories', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(211, '1', 'units', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(212, '1', 'products', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(213, '1', 'PurchaseInvoice', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(214, '1', 'sellInvoice', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(215, '1', 'totalgainindex', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(216, '1', 'boxes', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
(217, '1', 'otherinvoices', '1', '1', '1', '1', '1', '1', '2019-10-22 22:38:30', '2019-10-22 22:38:30'),
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
(637, '7', 'otherinvoices', '1', '1', '1', '1', '1', '1', '2019-10-23 00:39:19', '2019-10-23 00:39:19');

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
(1, '1419449488', 'اتش تي سي 2017', '1', '1', 'اي حاجه', '296.6875', '1500', '2019-09-23', '11', '5', '2019-09-22 10:20:58', '2019-10-22 17:46:26'),
(2, '887308514', 'جاي 5', '1', '1', 'اي حاجه', '15.666666666666666', '20', '2019-09-23', '14', '5', '2019-09-23 11:21:11', '2019-10-22 17:35:55'),
(3, '2003578141', 'بوكسر ريلاكس من مقاس 3 الي 7', '1', '1', 'مقاييغفبغ', '35', '45', '2019-09-24', '48', '3', '2019-09-24 14:45:07', '2019-10-22 17:35:55');

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
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `type`, `address`, `phone`, `notes`, `image`, `created_at`, `updated_at`) VALUES
(3, 'رضا مجدي محمد', '1', 'عرب الحصار - الصف - الجيزة', '01118763129', 'لا ملاحظات', NULL, '2019-09-22 13:08:49', '2019-09-22 13:08:49'),
(4, 'عربية البضاعة', '2', 'القاهره - المعادي الجديده', '01118763129', 'لا ملاحظات', NULL, '2019-09-22 13:09:13', '2019-09-22 13:09:13');

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
(6, '3', 'Sell Invoice ( فاتورة مبيعات فورية الدفع )', '2019-09-24', '1', '200', '3', '0', '2019-09-24 14:55:09', '2019-09-24 14:55:09');

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
(1, 'قطعه', '2019-09-22 10:19:37', '2019-09-22 10:19:37');

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
  `desc` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
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
(1, 'Admin', 'admin@admin.com', '01118763129', '1', 'اي', 'helwan', NULL, '$2y$10$b2gh3kpME9M/2NtRbTrY6.Wb0FtRjKHP.7JXVtwVS1MWqyLgbN7jO', NULL, NULL, '2019-09-23 12:06:13'),
(2, 'reda magdi', 'reda@gmail.com', '01118763129', '7', 'سلك يستخدم لعدة', 'helwan', NULL, '$2y$10$eyytNdU08vbQ6ajqOjHuJu.bL80o4K2QWNrxlD7T.dplQOrgEmfuW', NULL, '2019-10-22 22:41:54', '2019-10-22 22:41:54');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_product`
--
ALTER TABLE `invoice_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_invoices`
--
ALTER TABLE `other_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier_start_balances`
--
ALTER TABLE `supplier_start_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_types`
--
ALTER TABLE `supplier_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

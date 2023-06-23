-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 04:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommarce-recommanded-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `confirm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `mobile`, `email`, `password`, `image`, `status`, `confirm`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'superadmin', 0, '01558947938', 'admin@anon.com', '$2y$10$dSAClbWyDJQnC8v9n6wMh.tZMOznYJxIjOQcqVGf/7AzbsEDcrzS2', '92058.jpg', 1, NULL, NULL, '2023-06-12 23:36:27'),
(2, 'shafiul', 'admin', 0, '01558947938', 'shafiuladmin@anon.com', '$2y$10$e51TzlmNtRxPVAMoC3cJjeIH38vHh7U9U2LLc.SN98BMJ0iqXgVjW', '', 1, NULL, NULL, NULL),
(3, 'Mr.Paul', 'vendor', 1, '01866702189', 'arup@anon.com', '$2y$10$0./84g4GdBYDhSaVMdvb0OKGGLrs1b7DKZf2fEjWDQMmx7Y.Enx2C', '', 1, NULL, NULL, NULL),
(4, 'Sowrab Hasan', 'vendor', 2, '01611769787', 'sowrab@anon.com', '$2y$10$NDblB4jM3uAuNY.l67lReuo57YgdRruPsABMGB2X35eoXJUIWtiSu', '', 1, NULL, NULL, NULL),
(5, 'Mohammad Munir', 'vendor', 3, '01822604285', 'munir@anon.com', '$2y$10$tEGCtO5BdqiHKXco.1a.oOMr7QWtVok43auZSWzcnNYH.m/KGje2G', '', 1, NULL, NULL, NULL),
(6, 'Mohammad Sadekul Islam', 'vendor', 4, '01839673550', 'sadekul@anon.com', '$2y$10$Jt8xanrZdCFuCuhBmjvnAuRdRGZEmHHg6/Hj.s1kzHOh0R8wmns9O', '', 1, NULL, NULL, NULL),
(7, 'Md.Shafiul Islam', 'vendor', 5, '01558947938', 'shafiul@anon.com', '$2y$10$GjFz83YT3ontLvuphSweDe.TYUDY9lD0okRt7/74llH0EuAZYmMwm', '', 1, NULL, NULL, NULL),
(8, 'Naruto Uzumaki', 'vendor', 6, '01558947938', 'naruto@anon.com', '$2y$10$472CI9mtnz8jyGGEp6zTUOub2uOlEQmvl7XSBCWpsG97emD968AL2', '', 1, NULL, NULL, NULL),
(9, 'Monkey D Luffy', 'vendor', 7, '01558947938', 'luffy@anon.com', '$2y$10$5XZ8HoqG5ZKYlk3PiuoaROgf9Q1/gquOY.6xwIYVtxD3S6XqCnl0K', '', 1, NULL, NULL, NULL),
(10, 'Asta', 'vendor', 8, '01558947938', 'asta@anon.com', '$2y$10$t51yTP9SNS1WLabn240/8ukINapHJwelOoqhefPc1Uu6I9BY1Lpdm', '', 1, NULL, NULL, NULL),
(11, 'Ichigo Kurosaki', 'vendor', 9, '01558947938', 'icigo@anon.com', '$2y$10$US4s88VVqjBVVioV6pg6y.haBjDfRxxHyL2J/JJCd/IY49LPMC/OG', '', 1, NULL, NULL, NULL),
(12, 'Roronoa Zoro', 'vendor', 10, '01558947938', 'zoro@anon.com', '$2y$10$GHrlhy61vu7mm17lqWt/U.LulPweInTTqndi2IrGLoj1gwJoczqMu', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `all_pincode_bd`
--

CREATE TABLE `all_pincode_bd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `type`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, '7884.jpg', 'Slider', 'tranding-glasses', 'Tranding Glasses', 'Tranding Glasses', 1, NULL, '2023-06-11 11:13:13'),
(2, '38806.jpg', 'Slider', 'tops', 'Tops', 'Tops', 1, NULL, '2023-06-11 11:13:55'),
(3, '65643.jpg', 'Slider', 'women', 'Women Collections', 'Women Collections', 1, '2023-06-11 11:14:56', '2023-06-11 11:14:56'),
(4, '13564.jpg', 'Fix', 'spring-special-offer', 'Spring Special Offer', 'Spring Special Offer', 1, '2023-06-11 11:15:46', '2023-06-11 11:15:46'),
(5, '58596.jpg', 'Fix', 'spring-special-offer', 'Spring Special Offer', 'Spring Special Offer', 1, '2023-06-11 11:16:08', '2023-06-11 11:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rich Man', 1, NULL, NULL),
(2, 'Shoilpik', 1, NULL, NULL),
(3, 'Pret A Porter', 1, NULL, NULL),
(4, 'Samsung', 1, NULL, NULL),
(5, 'MI', 1, NULL, NULL),
(6, 'HP', 1, NULL, NULL),
(7, 'LG', 1, NULL, NULL),
(8, 'Agro', 1, NULL, NULL),
(9, 'Naturals', 1, NULL, NULL),
(10, 'Infinity', 1, '2023-06-11 12:35:07', '2023-06-11 12:35:07'),
(11, 'Cats Eye', 1, '2023-06-11 12:35:17', '2023-06-11 12:35:17'),
(12, 'One Plus', 1, '2023-06-11 12:35:26', '2023-06-11 12:35:26'),
(13, 'Polo', 1, '2023-06-11 12:35:35', '2023-06-11 12:35:35'),
(14, 'Lenovo', 1, '2023-06-11 12:35:51', '2023-06-11 12:35:51'),
(15, 'Walton', 1, '2023-06-12 00:20:09', '2023-06-12 00:20:09'),
(16, 'AMD', 1, '2023-06-12 00:20:25', '2023-06-12 00:20:25'),
(17, 'Intel', 1, '2023-06-12 00:20:38', '2023-06-12 00:20:38'),
(18, 'Gree', 1, '2023-06-12 01:00:03', '2023-06-12 01:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_discount` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 'Desktop', '', 0, '', 'desktop', '', '', '', 1, NULL, NULL),
(2, 0, 2, 'Laptop', '', 0, '', 'laptop', '', '', '', 1, NULL, NULL),
(3, 0, 2, 'Mobile', '', 0, '', 'mobile', '', '', '', 1, NULL, NULL),
(4, 0, 1, 'Men\'s', '', 0, '', 'men', '', '', '', 1, NULL, NULL),
(5, 0, 1, 'Women', '', 0, '', 'women', '', '', '', 1, NULL, NULL),
(6, 0, 1, 'Kid\'s', '', 0, '', 'kid', '', '', '', 1, NULL, NULL),
(7, 0, 3, 'Air Condition', '', 0, '', 'ac', '', '', '', 1, NULL, NULL),
(8, 0, 3, 'Television', '', 0, '', 'television', '', '', '', 1, NULL, NULL),
(9, 0, 4, 'Fruits', '', 0, '', 'fruits', '', '', '', 1, NULL, NULL),
(10, 0, 4, 'Vegetable', '', 0, '', 'vegetable', '', '', '', 1, NULL, NULL),
(11, 0, 4, 'Food', '', 0, NULL, 'food', NULL, NULL, NULL, 1, '2023-06-11 11:23:47', '2023-06-11 11:23:47'),
(12, 4, 1, 'T-Shirts', '', 0, NULL, 'men_tshirts', 'tshirt', 'tshirt', 't-shirt', 1, '2023-06-12 08:55:57', '2023-06-12 10:32:30'),
(13, 5, 1, 'Tops', '', 0, NULL, 'tops', NULL, NULL, NULL, 1, '2023-06-12 10:17:51', '2023-06-12 10:17:51'),
(14, 5, 1, 'T-Shirts', '', 0, NULL, 'women_tshirt', NULL, NULL, NULL, 1, '2023-06-12 10:21:12', '2023-06-12 10:30:55'),
(15, 5, 1, 'Skirts', '', 0, NULL, 'skirts', NULL, NULL, NULL, 1, '2023-06-12 10:32:16', '2023-06-12 10:32:16'),
(16, 4, 1, 'Shirt', '', 0, NULL, 'shirts', NULL, NULL, NULL, 1, '2023-06-12 10:36:15', '2023-06-12 10:37:01'),
(17, 4, 1, 'Pants', '', 0, NULL, 'pants', NULL, NULL, NULL, 1, '2023-06-12 10:37:55', '2023-06-12 10:37:55'),
(18, 6, 1, 'T-Shirts', '', 0, NULL, 'kid-t-shirts', NULL, NULL, NULL, 1, '2023-06-12 10:40:50', '2023-06-12 10:40:50'),
(19, 6, 1, 'Pants', '', 0, NULL, 'kid_pants', NULL, NULL, NULL, 1, '2023-06-12 10:41:30', '2023-06-12 10:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BD', 'Bangladesh', 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `coupon_option` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `categories` text DEFAULT NULL,
  `brands` text DEFAULT NULL,
  `users` text DEFAULT NULL,
  `coupon_type` varchar(255) DEFAULT NULL,
  `amount_type` varchar(255) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `vendor_id`, `coupon_option`, `coupon_code`, `categories`, `brands`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Manual', 'test10', '1', NULL, '', 'Single', 'Percentage', 10.00, '2022-12-31', 1, NULL, NULL),
(2, 2, 'Manual', 'test20', '1', NULL, '', 'Single', 'Percentage', 10.00, '2022-12-31', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sadekul Islam', 'KB Aman Ali RD', 'Chattogram', 'Chattogram', 'Bangladesh', '4203', '01919001122', 1, NULL, NULL),
(2, 1, 'Sadekul Islam', 'OR Nizam RD', 'Chattogram', 'Chattogram', 'Bangladesh', '4205', '01919001133', 1, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_19_143127_create_vendors_table', 1),
(6, '2022_12_19_144222_create_admins_table', 1),
(7, '2023_01_12_062924_create_vendors_business_details_table', 1),
(8, '2023_01_12_063915_create_vendors_bank_details', 1),
(9, '2023_01_24_180531_create_sections_table', 1),
(10, '2023_01_30_080838_create_brands_table', 1),
(11, '2023_01_30_134523_create_products_table', 1),
(12, '2023_02_02_081023_create_products_attributes_table', 1),
(13, '2023_02_03_175039_create_products_images_table', 1),
(14, '2023_02_05_054519_create_banners_table', 1),
(15, '2023_02_06_132359_update_banners_table', 1),
(16, '2023_02_07_070242_update_products_table', 1),
(17, '2023_02_15_145920_create_products_filters_table', 1),
(18, '2023_02_15_163136_create_products_filters_values_table', 1),
(19, '2023_03_26_071010_create_recently_viewed_products_table', 1),
(20, '2023_04_03_065851_create_coupons_table', 1),
(21, '2023_04_04_082032_create_countries_table', 1),
(22, '2023_04_06_182709_no', 1),
(23, '2023_04_07_061349_create_categories_table', 1),
(24, '2023_04_07_063624_create_carts_table', 1),
(25, '2023_04_07_114942_create_delivery_addresses_table', 1),
(26, '2023_04_10_144016_create_orders_table', 1),
(27, '2023_04_10_144924_create_orders_products_table', 1),
(28, '2023_04_13_174119_create_order_statuses_table', 1),
(29, '2023_04_14_182800_create_orders_logs_table', 1),
(30, '2023_04_15_222928_create_ratings_table', 1),
(31, '2023_05_01_114915_create_shipping_charges_table', 1),
(32, '2023_05_26_140642_create_all_pincode_bd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `grand_total` double(8,2) DEFAULT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `payment_gateway`, `grand_total`, `courier_name`, `tracking_number`, `created_at`, `updated_at`) VALUES
(1, 2, 'Thad Feest', '172 Kerluke Ridges Suite 419\nLake Nicole, AR 32189-0399', 'Julianaburgh', 'Georgia', 'Cuba', '3928', '+1-531-716-6147', 'user2@gmail.com', 0.00, 'test10', 10.00, 'Shipped', 'Paypal', 'Paypal', 51.49, 'Bangladesh', '247997181', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(2, 22, 'Skyla Denesik', '531 Stephon Cape Suite 509\nCathyport, MD 04611', 'Port Walton', 'Oklahoma', 'Northern Mariana Islands', '5852', '+1 (850) 226-2987', 'user22@gmail.com', 100.00, 'newuser', 10.00, 'Shipped', 'Cash On delaviray', 'Paypal', 71.91, 'Bangladesh', '692480', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(3, 11, 'Kevin Thiel', '311 Hammes Mall\nMarinaborough, AR 32960', 'Nadiamouth', 'Idaho', 'Senegal', '3005', '+1.901.200.1374', 'user11@gmail.com', 100.00, 'newuser', 20.00, 'Shipped', 'Paypal', 'Paypal', 14.15, 'Bangladesh', '468173', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(4, 22, 'Skyla Denesik', '531 Stephon Cape Suite 509\nCathyport, MD 04611', 'Port Walton', 'Oklahoma', 'Northern Mariana Islands', '5852', '+1 (850) 226-2987', 'user22@gmail.com', 50.00, 'newuser', 20.00, 'Delivered', 'Cash On delaviray', 'Cash On delaviray', 64.64, 'Bangladesh', '86', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(5, 5, 'Ms. Zora Raynor', '721 Camylle Heights\nChandlerberg, ND 29008', 'Loriview', 'New Hampshire', 'Micronesia', '4799', '+16175170387', 'user5@gmail.com', 0.00, 'newuser', 10.00, 'Shipped', 'Paypal', 'Cash On delaviray', 47.10, 'Bangladesh', '564303', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(6, 22, 'Skyla Denesik', '531 Stephon Cape Suite 509\nCathyport, MD 04611', 'Port Walton', 'Oklahoma', 'Northern Mariana Islands', '5852', '+1 (850) 226-2987', 'user22@gmail.com', 0.00, 'newuser', 20.00, 'Delivered', 'Paypal', 'Paypal', 10.39, 'Shundorban', '0', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(7, 5, 'Ms. Zora Raynor', '721 Camylle Heights\nChandlerberg, ND 29008', 'Loriview', 'New Hampshire', 'Micronesia', '4799', '+16175170387', 'user5@gmail.com', 0.00, 'newuser', 20.00, 'Shipped', 'Cash On delaviray', 'Cash On delaviray', 21.73, 'Shundorban', '7552', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(8, 21, 'Ms. Christine Schroeder', '53897 Bartell Ferry\nLake Royalfurt, CO 08761', 'Daughertychester', 'New Jersey', 'Gambia', '7920', '+1.757.298.1996', 'user21@gmail.com', 60.00, 'newuser', 10.00, 'Shipped', 'Cash On delaviray', 'Cash On delaviray', 46.78, 'Bangladesh', '74448', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(9, 10, 'Jeffery Harber', '555 Claudine Mission Apt. 367\nNew Daphneside, WA 36654-1843', 'Port Kristopher', 'New Jersey', 'Monaco', '2166', '+1 (862) 961-0197', 'user10@gmail.com', 0.00, 'newuser', 20.00, 'Delivered', 'Paypal', 'Paypal', 36.50, 'Bangladesh', '35633050', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(10, 12, 'Jewell Zulauf', '8111 Candace Knolls Apt. 953\nHartmannmouth, IL 55850', 'North Dell', 'Wisconsin', 'Serbia', '4165', '1-225-383-0727', 'user12@gmail.com', 60.00, 'test10', 10.00, 'Delivered', 'Paypal', 'Paypal', 76.02, 'Bangladesh', '3452212', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(11, 3, 'Alivia Reynolds', '60726 Padberg Loaf Apt. 963\nBoyleport, ND 22828-3449', 'Vivianneberg', 'New Mexico', 'Niue', '1419', '+1 (218) 686-1209', 'user3@gmail.com', 0.00, 'newuser', 20.00, 'Delivered', 'Paypal', 'Paypal', 89.37, 'Bangladesh', '54627', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(12, 14, 'Krista Quigley I', '105 Kunze Parks Apt. 461\nBrianview, NJ 92963', 'Luluborough', 'Georgia', 'Austria', '6759', '+1-850-876-5287', 'user14@gmail.com', 100.00, 'newuser', 20.00, 'Delivered', 'Paypal', 'Paypal', 83.90, 'Shundorban', '7341611', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(13, 13, 'Christiana Kemmer', '4975 Chanel Centers\nWest Danielle, OH 22287', 'Port Lee', 'Illinois', 'Czech Republic', '6493', '(229) 324-9719', 'user13@gmail.com', 50.00, 'newuser', 10.00, 'Shipped', 'Cash On delaviray', 'Paypal', 43.00, 'Shundorban', '6668', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(14, 4, 'Prof. Deontae Hermiston IV', '966 Prohaska Inlet\nColumbuston, NH 03606', 'South Jany', 'South Carolina', 'Moldova', '1395', '+1-210-749-1308', 'user4@gmail.com', 50.00, 'newuser', 10.00, 'Shipped', 'Paypal', 'Paypal', 49.93, 'Bangladesh', '51972', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(15, 8, 'Florida Rice', '3535 Naomi Mills Apt. 387\nLake Elroyburgh, SC 18653-7011', 'South Shany', 'Louisiana', 'Azerbaijan', '3785', '+1 (870) 388-0383', 'user8@gmail.com', 60.00, 'newuser', 20.00, 'Delivered', 'Paypal', 'Cash On delaviray', 95.33, 'Bangladesh', '42891185', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(16, 15, 'Dr. Rosendo Simonis III', '302 Lakin Pass\nWest Keelyfurt, CT 74592', 'Port Makenna', 'Maine', 'Paraguay', '1887', '1-802-937-0363', 'user15@gmail.com', 100.00, 'test10', 10.00, 'Delivered', 'Cash On delaviray', 'Paypal', 94.31, 'Bangladesh', '934139730', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(17, 23, 'Candace Konopelski', '56243 Joana Centers Apt. 729\nSatterfieldfurt, ID 89518', 'East Esther', 'Iowa', 'Brunei Darussalam', '3525', '+1 (267) 239-9975', 'user23@gmail.com', 0.00, 'newuser', 20.00, 'Delivered', 'Paypal', 'Cash On delaviray', 71.27, 'Shundorban', '870', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(18, 16, 'Johnson Price', '29856 Ziemann Junction\nBatzmouth, CA 05912', 'Cristopherview', 'Michigan', 'Anguilla', '2225', '(786) 664-2333', 'user16@gmail.com', 50.00, 'test10', 20.00, 'Delivered', 'Cash On delaviray', 'Paypal', 12.96, 'Shundorban', '6508', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(19, 6, 'Kianna Beahan', '157 Rau Bypass Apt. 381\nLeannamouth, MO 66195', 'Hermistonfurt', 'Illinois', 'Honduras', '9469', '1-909-983-9867', 'user6@gmail.com', 60.00, 'newuser', 10.00, 'Delivered', 'Cash On delaviray', 'Cash On delaviray', 56.79, 'Bangladesh', '9451', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(20, 12, 'Jewell Zulauf', '8111 Candace Knolls Apt. 953\nHartmannmouth, IL 55850', 'North Dell', 'Wisconsin', 'Serbia', '4165', '1-225-383-0727', 'user12@gmail.com', 60.00, 'test10', 10.00, 'Delivered', 'Cash On delaviray', 'Cash On delaviray', 17.28, 'Bangladesh', '8874642', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(21, 21, 'Ms. Christine Schroeder', '53897 Bartell Ferry\nLake Royalfurt, CO 08761', 'Daughertychester', 'New Jersey', 'Gambia', '7920', '+1.757.298.1996', 'user21@gmail.com', 100.00, 'test10', 20.00, 'Delivered', 'Paypal', 'Cash On delaviray', 55.52, 'Bangladesh', '867', '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(22, 17, 'Grady King', '657 Ryan Walks\nSouth Paula, WI 92900', 'Wolftown', 'New York', 'Belgium', '8944', '337.703.2790', 'user17@gmail.com', 50.00, 'newuser', 20.00, 'Shipped', 'Cash On delaviray', 'Cash On delaviray', 20.15, 'Bangladesh', '201', '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(23, 9, 'Jaleel Gerlach', '8928 Ayden Turnpike Suite 279\nLake Zackery, OH 46083', 'Vergiemouth', 'Oregon', 'Portugal', '3767', '1-806-623-2364', 'user9@gmail.com', 50.00, 'newuser', 20.00, 'Shipped', 'Paypal', 'Paypal', 84.35, 'Bangladesh', '5', '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(24, 12, 'Jewell Zulauf', '8111 Candace Knolls Apt. 953\nHartmannmouth, IL 55850', 'North Dell', 'Wisconsin', 'Serbia', '4165', '1-225-383-0727', 'user12@gmail.com', 60.00, 'newuser', 20.00, 'Shipped', 'Paypal', 'Paypal', 62.75, 'Bangladesh', '7551983', '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(25, 18, 'Agustina Graham', '8753 Pfannerstill Knoll Apt. 412\nPort Candiceshire, ND 11459-8352', 'Lake Ashly', 'Minnesota', 'Oman', '1262', '430-524-0518', 'user18@gmail.com', 0.00, 'test10', 10.00, 'Delivered', 'Paypal', 'Paypal', 53.39, 'Bangladesh', '49', '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(26, 1, 'Sadekul Islam', 'OR Nizam RD', 'Chattogram', 'Chattogram', 'Bangladesh', '4205', '01919001133', 'user1@gmail.com', 100.00, NULL, NULL, 'New', 'COD', 'COD', 127.35, NULL, NULL, '2023-06-07 07:23:05', '2023-06-07 07:23:05'),
(28, 1, 'Sadekul Islam', 'OR Nizam RD', 'Chattogram', 'Chattogram', 'Bangladesh', '4205', '01919001133', 'user1@gmail.com', 50.00, NULL, NULL, 'New', 'COD', 'COD', 2385.00, NULL, NULL, '2023-06-14 09:22:07', '2023-06-14 09:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders_logs`
--

CREATE TABLE `orders_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `vendor_id`, `admin_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, 1, 30, '246463', 'laptop', 'LightSalmon', 'Small', 46.50, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(2, 1, 2, 5, 5, 23, '117890', 'washing machine', 'DarkViolet', 'Large', 56.69, 6, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(3, 1, 2, 3, 1, 50, '3022', 'bread', 'MediumAquaMarine', 'Small', 81.93, 3, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(4, 2, 22, 3, 1, 2, '32390', 'rice', 'Linen', 'Small', 71.84, 2, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(5, 3, 11, 2, 2, 27, '768259', 'refrigerator', 'MediumSeaGreen', 'Small', 59.84, 2, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(6, 3, 11, 2, 4, 18, '138300', 'laptop', 'DarkSlateGray', 'Medium', 43.32, 9, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(7, 3, 11, 1, 5, 15, '750626', 'pant', 'DarkSlateGray', 'Medium', 41.41, 2, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(8, 4, 22, 1, 5, 1, '424428', 'laptop', 'RosyBrown', 'Medium', 19.96, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(9, 5, 5, 4, 3, 50, '3022', 'bread', 'MediumAquaMarine', 'Large', 81.93, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(10, 5, 5, 2, 5, 15, '750626', 'pant', 'DarkSlateGray', 'Small', 41.41, 1, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(11, 5, 5, 4, 4, 29, '451060', 'laptop', 'MediumSpringGreen', 'Large', 89.15, 8, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(12, 5, 5, 5, 5, 5, '730193', 'pant', 'DarkRed', 'Medium', 63.70, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(13, 5, 5, 4, 1, 19, '890905', 'tops', 'Indigo', 'Medium', 81.47, 1, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(14, 6, 22, 5, 2, 45, '18851', 'pant', 'MidnightBlue', 'Small', 10.19, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(15, 6, 22, 4, 4, 6, '77400', 'laptop', 'DarkSeaGreen', 'Large', 86.92, 1, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(16, 7, 5, 2, 2, 48, '687582', 'tops', 'Yellow', 'Large', 52.29, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(17, 7, 5, 2, 5, 1, '424428', 'laptop', 'RosyBrown', 'Small', 19.96, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(18, 7, 5, 4, 4, 47, '741101', 'laptop', 'Gainsboro', 'Small', 62.31, 3, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(19, 8, 21, 5, 3, 45, '18851', 'pant', 'MidnightBlue', 'Large', 10.19, 2, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(20, 8, 21, 5, 2, 1, '424428', 'laptop', 'RosyBrown', 'Small', 19.96, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(21, 8, 21, 4, 1, 35, '7027', 't-shirt', 'Silver', 'Small', 28.14, 2, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(22, 9, 10, 5, 2, 41, '445715', 'washing machine', 'MediumSlateBlue', 'Medium', 53.59, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(23, 9, 10, 4, 5, 9, '770335', 'bread', 'DodgerBlue', 'Medium', 82.60, 3, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(24, 9, 10, 2, 2, 41, '445715', 'washing machine', 'MediumSlateBlue', 'Medium', 53.59, 3, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(25, 9, 10, 1, 4, 38, '52332', 'pant', 'BurlyWood', 'Medium', 45.48, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(26, 10, 12, 3, 2, 36, '541364', 'rice', 'LightGoldenRodYellow', 'Medium', 79.85, 4, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(27, 11, 3, 3, 5, 10, '691111', 't-shirt', 'Pink', 'Large', 51.05, 6, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(28, 11, 3, 4, 5, 19, '890905', 'tops', 'Indigo', 'Large', 81.47, 6, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(29, 11, 3, 4, 2, 7, '704765', 'smartphone', 'Aquamarine', 'Small', 62.33, 8, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(30, 12, 14, 5, 1, 36, '541364', 'rice', 'LightGoldenRodYellow', 'Small', 79.85, 9, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(31, 12, 14, 2, 2, 22, '905119', 'pant', 'SeaGreen', 'Medium', 52.52, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(32, 13, 13, 4, 5, 26, '157202', 't-shirt', 'DimGrey', 'Small', 85.15, 3, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(33, 14, 4, 3, 4, 11, '209591', 'pant', 'Turquoise', 'Medium', 38.33, 9, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(34, 14, 4, 2, 5, 25, '786596', 'smartphone', 'MistyRose', 'Large', 39.23, 3, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(35, 15, 8, 4, 4, 50, '3022', 'bread', 'MediumAquaMarine', 'Large', 81.93, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(36, 15, 8, 1, 1, 34, '77808', 'rice', 'FloralWhite', 'Large', 75.54, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(37, 15, 8, 2, 4, 38, '52332', 'pant', 'BurlyWood', 'Medium', 45.48, 6, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(38, 15, 8, 1, 5, 44, '1630', 'shirt', 'LavenderBlush', 'Medium', 77.19, 4, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(39, 16, 15, 1, 5, 32, '208126', 't-shirt', 'DimGrey', 'Medium', 95.34, 7, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(40, 17, 23, 4, 2, 32, '208126', 't-shirt', 'DimGrey', 'Large', 95.34, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(41, 17, 23, 3, 1, 34, '77808', 'rice', 'FloralWhite', 'Large', 75.54, 9, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(42, 18, 16, 5, 3, 18, '138300', 'laptop', 'DarkSlateGray', 'Large', 43.32, 4, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(43, 18, 16, 4, 3, 11, '209591', 'pant', 'Turquoise', 'Small', 38.33, 1, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(44, 19, 6, 5, 5, 18, '138300', 'laptop', 'DarkSlateGray', 'Medium', 43.32, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(45, 19, 6, 3, 4, 42, '720400', 'washing machine', 'LemonChiffon', 'Small', 79.53, 6, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(46, 20, 12, 4, 3, 28, '756881', 'refrigerator', 'PaleTurquoise', 'Small', 11.21, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(47, 21, 21, 2, 2, 17, '12060', 'tops', 'Violet', 'Large', 64.92, 5, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(48, 21, 21, 5, 2, 18, '138300', 'laptop', 'DarkSlateGray', 'Small', 43.32, 0, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(49, 21, 21, 5, 1, 18, '138300', 'laptop', 'DarkSlateGray', 'Small', 43.32, 0, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(50, 21, 21, 3, 4, 25, '786596', 'smartphone', 'MistyRose', 'Medium', 39.23, 6, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(51, 21, 21, 5, 1, 29, '451060', 'laptop', 'MediumSpringGreen', 'Large', 89.15, 8, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(52, 22, 17, 1, 4, 6, '77400', 'laptop', 'DarkSeaGreen', 'Medium', 86.92, 6, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(53, 22, 17, 4, 2, 7, '704765', 'smartphone', 'Aquamarine', 'Large', 62.33, 3, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(54, 22, 17, 1, 2, 41, '445715', 'washing machine', 'MediumSlateBlue', 'Small', 53.59, 0, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(55, 23, 9, 2, 3, 31, '328516', 'rice', 'LightPink', 'Small', 92.53, 3, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(56, 23, 9, 1, 1, 22, '905119', 'pant', 'SeaGreen', 'Medium', 52.52, 0, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(57, 23, 9, 1, 3, 22, '905119', 'pant', 'SeaGreen', 'Large', 52.52, 2, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(58, 24, 12, 1, 4, 18, '138300', 'laptop', 'DarkSlateGray', 'Large', 43.32, 9, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(59, 24, 12, 1, 4, 26, '157202', 't-shirt', 'DimGrey', 'Small', 85.15, 2, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(60, 24, 12, 2, 3, 39, '438923', 'smartphone', 'Violet', 'Medium', 73.62, 9, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(61, 24, 12, 5, 4, 34, '77808', 'rice', 'FloralWhite', 'Small', 75.54, 7, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(62, 24, 12, 1, 3, 41, '445715', 'washing machine', 'MediumSlateBlue', 'Medium', 53.59, 4, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(63, 25, 18, 3, 5, 20, '602436', 't-shirt', 'Red', 'Large', 48.48, 5, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(64, 25, 18, 4, 3, 26, '157202', 't-shirt', 'DimGrey', 'Medium', 85.15, 2, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(65, 26, 1, 1, 9, 45, '18851', 'pant', 'MidnightBlue', 'M', 26.35, 1, '2023-06-07 07:23:05', '2023-06-07 07:23:05'),
(66, 28, 1, 8, 10, 50, '3022', 'Printed Tops & Pant Set by MUSLIN', 'MediumAquaMarine', 'L', 2334.00, 1, '2023-06-14 09:22:07', '2023-06-14 09:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Pending', 1, NULL, NULL),
(3, 'Cancelled', 1, NULL, NULL),
(4, 'In Progress', 1, NULL, NULL),
(5, 'Shipped', 1, NULL, NULL),
(6, 'Partially Shipped', 1, NULL, NULL),
(7, 'Delivered', 1, NULL, NULL),
(8, 'Partially Delivered', 1, NULL, NULL),
(9, 'Paid', 1, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_type` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_price` double(8,2) DEFAULT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `product_weight` int(11) DEFAULT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hdd` varchar(255) DEFAULT NULL,
  `ssd` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `shirt_type` varchar(255) DEFAULT NULL,
  `casual_shirt` varchar(255) DEFAULT NULL,
  `fit_type` varchar(255) DEFAULT NULL,
  `ton` varchar(255) DEFAULT NULL,
  `display_size` varchar(255) DEFAULT NULL,
  `processor` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `screen_size` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `sleeve` varchar(255) DEFAULT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') NOT NULL,
  `is_bestseller` enum('No','Yes') NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `vendor_id`, `admin_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `group_code`, `product_image`, `product_video`, `description`, `hdd`, `ssd`, `storage`, `shirt_type`, `casual_shirt`, `fit_type`, `ton`, `display_size`, `processor`, `operating_system`, `screen_size`, `pattern`, `sleeve`, `fabric`, `ram`, `meta_title`, `meta_keywords`, `meta_description`, `is_featured`, `is_bestseller`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 7, 9, 'vendor', 'Samsung 21.5 Inch S22F350F LED FULL HD Monitor', '424428', 'RosyBrown', 12000.00, 26.00, 893, NULL, '87069.jpg', 'https://schroeder.com/quo-a-consectetur-laudantium-qui-qui-veritatis.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15\" to 21\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perferendis assumenda ab aut occaecati officia odit numquam magni.', 'veritatis reiciendis unde consequatur mollitia', 'Quaerat quas iste id quisquam sapiente in temporibus.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:22:49'),
(2, 4, 11, 9, 1, 3, 'vendor', 'Chinigura Rice Primium', '32390', 'White', 140.00, 0.00, 1000, NULL, '12080.webp', 'http://www.pfannerstill.org/cupiditate-laboriosam-vitae-molestiae-qui-molestiae-ex.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Autem asperiores cumque dolore ullam nisi voluptas consequuntur.', 'laboriosam eum veritatis autem nesciunt', 'Nisi dolor dolorum exercitationem et sint illum dolores.', 'Yes', 'Yes', 1, '2023-06-06 08:38:39', '2023-06-11 11:28:51'),
(3, 3, 7, 15, 7, 9, 'vendor', 'WSI-INVERNA-24H [SMART PLASMA]', '82669', 'White', 70000.00, 26.00, 6134, NULL, '86744.jpg', 'http://www.adams.com/necessitatibus-itaque-ipsam-error-corporis-sit-dicta.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Culpa sed id ut.', 'non optio voluptates occaecati laborum', 'Eos earum fuga consectetur veritatis aspernatur quam.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:26:27'),
(4, 2, 2, 14, 6, 8, 'vendor', 'Lenovo IdeaPad 1 15AMN7 AMD Ryzen 5 512GB SSD 15.6\" FHD Laptop with DDR5 RAM', '127731', 'Fuchsia', 65000.00, 5.00, 1120, NULL, '42533.webp', 'https://stehr.com/et-delectus-consequatur-quo-ut-doloribus.html', NULL, NULL, '512 GB', NULL, NULL, NULL, NULL, NULL, '15\" to 21\"', 'AMD', 'Windows', NULL, NULL, NULL, NULL, '8 GB', 'Iure numquam iusto molestias aspernatur.', 'vel voluptas optio amet necessitatibus', 'Voluptates maiores omnis aspernatur quas.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:05:00'),
(5, 1, 5, 2, 1, 3, 'vendor', 'Fabrilife Women Premium Tee - Kitty - T Shirt For Women', '730193', 'GlaucousGreen', 685.00, 15.00, 115, NULL, '17166.webp', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Regular Fit', NULL, NULL, NULL, NULL, NULL, 'cartoon', 'half sleeve', 'cotton', NULL, 'Quas autem qui eos et odio consequatur ipsum.', 'similique qui commodi rerum aut', 'Tempora omnis animi ipsa occaecati sequi eveniet.', 'No', 'Yes', 1, '2023-06-06 08:38:39', '2023-06-12 23:44:54'),
(6, 1, 6, 1, 0, 1, 'superadmin', 'Boys Graphic T-shirt', '77400', 'DarkSeaGreen', 659.40, 0.00, 330, NULL, '98318.jpg', 'http://www.feil.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cartoon', 'half sleeve', 'cotton', NULL, 'Inventore exercitationem aliquid reiciendis consectetur a pariatur.', 'quas eligendi asperiores est eos', 'Praesentium reiciendis aut magni aliquid ea dolorem sit.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 09:22:56'),
(7, 2, 3, 4, 5, 7, 'vendor', 'Samsung Galaxy S23 Ultra', '704765', 'Aquamarine', 214999.00, 7.00, 1474, NULL, '82760.jpg', 'http://www.hahn.net/', NULL, NULL, NULL, '256 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', '6+', NULL, NULL, NULL, '16 GB', 'Maiores omnis harum rem voluptatem ab tenetur.', 'consequuntur explicabo et iure quos', 'Aut consequuntur aut et et dignissimos tenetur.', 'Yes', 'Yes', 1, '2023-06-06 08:38:39', '2023-06-13 09:28:35'),
(8, 1, 5, 10, 2, 4, 'vendor', 'tops', '689800', 'LightSlateGray', 2100.00, 8.00, 304, NULL, '8.jpg', 'http://www.doyle.com/ipsa-tempore-aut-quod-quibusdam-dignissimos-eligendi-quis', NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, 'Voluptatem repellat et soluta quo ut.', 'quaerat est necessitatibus nam est', 'Dolorum voluptatem voluptas cum modi in sit et.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:49:29'),
(9, 4, 11, 8, 1, 3, 'vendor', 'White Bread', '770335', 'White', 100.00, 0.00, 500, NULL, '47688.webp', 'https://stokes.com/itaque-sit-saepe-voluptatem-omnis-consequuntur-consequatur-enim.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Corrupti quibusdam adipisci cum totam vero.', 'reprehenderit quasi veniam itaque voluptatum', 'Minus numquam corrupti qui voluptatem vitae non.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-11 11:57:23'),
(10, 3, 7, 18, 10, 12, 'vendor', 'Gree GS-30XFV32 2.5 Ton Split Type Inverter Air Conditioner', '691111', 'White', 117000.00, 0.00, 7460, NULL, '20880.webp', 'http://wolff.org/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Accusamus vel fugit nihil.', 'quo culpa nobis hic quia', 'Ducimus voluptas et voluptatem sed sed.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 12:10:12'),
(11, 4, 10, 9, 7, 9, 'vendor', 'Green Tomato', '209591', 'Turquoise', 38.33, 30.00, 999, NULL, '11.jpg', 'https://fritsch.net/sapiente-quas-quia-vel-rerum-rerum.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Iusto commodi voluptatem et blanditiis ipsa.', 'et vel modi assumenda tenetur', 'Est culpa velit iste rerum perspiciatis quas.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 00:37:24'),
(12, 4, 9, 8, 7, 9, 'vendor', 'Lychee Premium', '380462', 'DimGray', 250.00, 9.00, 100, NULL, '79693.webp', 'http://www.feest.com/ipsam-velit-ratione-adipisci-accusamus.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Non sed beatae totam.', 'ut id sed rerum est', 'Quo est nemo nobis fugiat.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 00:45:16'),
(13, 4, 9, 9, 2, 4, 'vendor', 'bread', '969864', 'White', 83.23, 0.00, 500, NULL, '22293.webp', 'http://www.johnson.com/commodi-suscipit-explicabo-praesentium-tempora-pariatur-porro-dolore.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Consequuntur cupiditate voluptates est.', 'adipisci ut ullam pariatur tempora', 'Porro et necessitatibus cumque.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-11 12:37:55'),
(14, 4, 10, 8, 2, 4, 'vendor', 'Red Tomato', '606988', 'Red', 50.00, 10.00, 1000, NULL, '18921.webp', 'http://www.hahn.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et id ut sed.', 'qui dolor laudantium aspernatur distinctio', 'Iure amet rerum consequatur.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-11 12:40:21'),
(15, 1, 6, 1, 8, 10, 'vendor', 'Boys Shark Printed Shirt', '750626', 'DarkSlateBlue', 1050.00, 0.00, 790, NULL, '63485.jpg', 'http://www.mann.biz/', NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, 'Voluptas tempora accusantium ut.', 'incidunt a nam reiciendis porro', 'Inventore maxime minus est corrupti rerum quia quae.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 12:03:06'),
(16, 2, 1, 16, 6, 8, 'vendor', 'AMD Ryzen 5 7600X Star PC', '502863', 'Plum', 106900.00, 0.00, 9468, NULL, '59110.webp', 'http://kuhlman.com/eos-explicabo-placeat-sed-accusantium.html', NULL, '512GB to 1TB', '256 GB', NULL, NULL, NULL, NULL, NULL, '15\" to 21\"', 'AMD', NULL, NULL, NULL, NULL, NULL, '8 GB', 'Aut atque nostrum neque id et eos dolorem.', 'doloribus assumenda vel ut ut', 'Ducimus necessitatibus qui sapiente et ex qui nesciunt cum.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:10:29'),
(17, 2, 3, 5, 1, 3, 'vendor', 'Xiaomi-Redmi-Note-12-Pro-Speed-Black', '12060', 'Black', 28000.00, 20.00, 1000, NULL, '94826.jpg', 'http://www.olson.com/beatae-est-quia-aut-consequatur-debitis-vel.html', NULL, NULL, NULL, '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', '6+', NULL, NULL, NULL, '6 GB', 'Tempore voluptatum soluta rerum.', 'hic quia dolorem facilis quis', 'Provident qui quia in qui necessitatibus tenetur libero.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:10:45'),
(18, 2, 1, 17, 7, 9, 'vendor', 'Intel Core i5-10400f 10th Gen Gaming PC', '138300', 'DarkSlateGray', 52100.00, 0.00, 5295, NULL, '89506.webp', 'http://vonrueden.com/error-tempore-est-nisi-aut', NULL, '512GB to 1TB', '256 GB', NULL, NULL, NULL, NULL, NULL, '15\" to 21\"', 'Intel', NULL, NULL, NULL, NULL, NULL, '8 GB', 'Veritatis ex voluptatibus suscipit.', 'sint numquam ipsa sit tempora', 'Beatae sit velit et expedita ab distinctio amet.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:46:47'),
(19, 2, 1, 17, 7, 9, 'vendor', 'Intel Core i5-11400 11th Gen Gaming PC', '890905', 'Indigo', 90900.00, 0.00, 4890, NULL, '12096.webp', 'http://huels.net/ut-illum-itaque-voluptates-aliquam-et-qui-est', NULL, '512GB to 1TB', '512 GB', NULL, NULL, NULL, NULL, NULL, '15\" to 21\"', 'Intel', NULL, NULL, NULL, NULL, NULL, '16 GB', 'Et modi a numquam voluptatum autem ea a.', 'repellendus adipisci incidunt voluptatem quo', 'Placeat sunt aut nihil aut nesciunt rerum consectetur.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:49:19'),
(20, 3, 7, 18, 9, 11, 'vendor', 'Gree GS-24XFV32 2 Ton Fairy-Split Type Inverter Air Conditioner', '602436', 'White', 85000.00, 0.00, 8316, NULL, '91706.webp', 'http://crooks.net/saepe-perferendis-est-accusamus-qui-quia-non-itaque', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Corrupti laborum magnam soluta suscipit ullam.', 'ut laboriosam vel ex deserunt', 'Molestias molestiae ex reprehenderit eum nemo.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 12:07:40'),
(21, 2, 3, 5, 4, 6, 'vendor', 'Xiaomi-Redmi-Note-12-Pro', '683301', 'DeepSkyBlue', 36990.00, 17.00, 571, NULL, '835.webp', 'http://wintheiser.com/', NULL, NULL, NULL, '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', '6+', NULL, NULL, NULL, '6 GB', 'Et omnis quasi sequi sed a corporis eaque.', 'totam sed blanditiis quasi voluptatem', 'Facilis mollitia totam asperiores velit odit sint officiis.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 01:12:02'),
(22, 1, 17, 1, 10, 12, 'vendor', 'Premium Beige Colour twill Pant', '905119', 'SeaGreen', 2724.00, 8.00, 680, NULL, '54099.jpg', 'http://www.deckow.com/repellat-aspernatur-adipisci-voluptas-aspernatur-optio-quia-perferendis-aut', 'Slim fit pant made of stretchy cotton fabric. Featuring front pockets, rear pockets and zip fly and top button fastening.', NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', NULL, 'cotton', NULL, 'Voluptate molestiae voluptas quo.', 'autem sit et qui nihil', 'Repudiandae qui vitae nobis et exercitationem.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 12:13:03'),
(23, 4, 10, 8, 10, 12, 'vendor', 'Coriander Leaves (Dhonia Pata)', '117890', 'DarkViolet', 20.00, 0.00, 100, NULL, '51699.webp', 'http://www.becker.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mollitia ea laboriosam vitae rerum sit.', 'non quidem perspiciatis voluptate rerum', 'Culpa voluptates molestiae dolorum perferendis possimus.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 01:09:01'),
(24, 2, 2, 14, 4, 6, 'vendor', 'Lenovo V14 Core i5 11th Gen 1TB SATA 14\" FHD Laptop', '219899', 'DarkGray', 64000.00, 15.00, 1620, NULL, '98144.webp', 'http://www.funk.org/', NULL, NULL, '1 TB', NULL, NULL, NULL, NULL, NULL, '14\"', 'Intel', 'Windows', NULL, NULL, NULL, NULL, '16 GB', 'Labore repellat porro voluptatem in.', 'vel quia distinctio rerum laborum', 'Minima aut ut ut in est debitis iusto omnis.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 01:15:45'),
(25, 1, 4, 1, 1, 3, 'vendor', 'Men’s Slim-fit printed Shirt', '786596', 'White', 2700.00, 0.00, 573, NULL, '55079.jpg', 'https://www.witting.biz/provident-libero-quisquam-est-quas-voluptatem-unde', NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, 'Ipsum aut asperiores aut dolor a atque.', 'debitis quos labore natus incidunt', 'Eius dolores nam ipsum qui qui sint incidunt aut.', 'Yes', 'Yes', 1, '2023-06-06 08:38:39', '2023-06-13 00:19:20'),
(26, 4, 9, 8, 6, 8, 'vendor', 'Jaam', '157202', 'Jaam', 150.00, 23.00, 1000, NULL, '22985.webp', 'https://www.rau.com/cum-autem-saepe-qui-velit-nobis-fugiat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Non vero asperiores veniam inventore dolores error.', 'est officiis nostrum possimus est', 'Quam distinctio maiores rerum ipsum laboriosam.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 00:24:01'),
(27, 1, 6, 2, 1, 3, 'vendor', 'Kid T-shirt Hello', '768259', 'MediumSeaGreen', 250.00, 0.00, 288, NULL, '37624.webp', 'http://www.farrell.com/fugiat-enim-sint-velit-unde-et', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'letter print', 'half sleeve', 'cotton', NULL, 'Et consectetur enim dolores velit autem aut.', 'ex laudantium quas veniam impedit', 'Qui natus iure quisquam est nam cupiditate accusamus hic.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:22:27'),
(28, 3, 7, 7, 1, 3, 'vendor', 'refrigerator', '756881', 'PaleTurquoise', 30000.00, 21.00, 963, NULL, '72992.jpg', 'http://www.rice.biz/dolor-quae-et-quidem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nam dolore vero saepe voluptatem dolore.', 'nam alias aut autem voluptas', 'Atque quis natus officiis numquam.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:24:31'),
(29, 1, 4, 10, 5, 7, 'vendor', 'Classic Purple Colour Regular Fit Panjabi by LUBNAN', '451060', 'MediumSpringGreen', 2881.40, 0.00, 957, NULL, '52009.jpg', 'http://pollich.net/esse-tempora-nobis-atque', NULL, NULL, NULL, NULL, NULL, NULL, 'Regular Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, 'Et ut optio quia rerum tempore nihil qui.', 'exercitationem et placeat totam ipsum', 'Sit et sint aspernatur corporis.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 09:37:11'),
(30, 2, 3, 5, 3, 5, 'vendor', 'Redmi Note 12 Pro 5G', '246463', 'Black', 36990.00, 30.00, 905, NULL, '17444.webp', 'http://www.grimes.com/temporibus-incidunt-repellat-quidem-ut.html', NULL, NULL, NULL, '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', '6+', NULL, NULL, NULL, '8 GB', 'Ipsum impedit voluptatem enim deserunt quibusdam ad.', 'laudantium ipsam animi quos et', 'Sapiente officia occaecati dolor ullam.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 01:07:14'),
(31, 3, 7, 7, 7, 9, 'vendor', 'Xiaomi Viomi A1 1 Ton Split Type Smart Air Conditioner (AC)', '328516', 'LightPink', 106900.00, 12.00, 6420, NULL, '62501.jpg', 'https://lynch.com/saepe-iusto-animi-ut-ut.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Est molestiae vero officiis debitis qui.', 'perspiciatis culpa id consequatur labore', 'Qui et fugit accusamus deleniti.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:56:21'),
(32, 2, 2, 6, 2, 4, 'vendor', 'HP Pavilion 15-eh1890AU Ryzen 5 5500U 15.6\" FHD Laptop', '208126', 'DimGrey', 82469.00, 37.00, 2000, NULL, '5065.jpg', 'https://zieme.biz/voluptatibus-autem-cum-est.html', NULL, '120GB to 500GB', '512 GB', NULL, NULL, NULL, NULL, NULL, '15\" to 21\"', 'AMD', 'Windows', NULL, NULL, NULL, NULL, '16 GB', 'Est dolore et iste rerum est temporibus.', 'voluptas sed est eos dicta', 'Id laborum sapiente iure quasi quisquam.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:57:28'),
(33, 2, 3, 5, 5, 7, 'vendor', 'Xiaomi 11i Hypercharge 5G', '743783', 'LightGoldenRodYellow', 42990.00, 10.00, 678, NULL, '9282.jpg', 'http://www.wyman.info/voluptatum-eligendi-temporibus-beatae-commodi-totam.html', NULL, NULL, NULL, '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', NULL, NULL, NULL, NULL, '6 GB', 'Corporis atque qui et aut vel.', 'rem possimus et nesciunt architecto', 'Eum voluptatibus sunt tempore dolores eos.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 09:51:02'),
(34, 4, 9, 9, 6, 8, 'vendor', 'Malta', '77808', 'Lemon', 230.00, 5.00, 1000, NULL, '4562.webp', 'https://oconner.info/repudiandae-et-maiores-dolores-mollitia.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et dignissimos sed dolor dolorum.', 'ut quibusdam consequatur asperiores sed', 'Facere eaque iste velit accusantium itaque.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 00:26:34'),
(35, 3, 7, 6, 1, 3, 'vendor', 'Air Conditioner', '7027', 'Silver', 25000.00, 6.00, 191, NULL, '50092.jpg', 'https://schroeder.org/et-et-culpa-aperiam-voluptas-iste.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et voluptates et voluptas dicta officiis.', 'vitae dolores et tempora ut', 'Velit consequatur laboriosam et.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:25:13'),
(36, 4, 11, 9, 8, 10, 'vendor', 'Chashi Aromatic Chinigura Rice', '541364', 'LightGoldenRodYellow', 180.00, 0.00, 1000, NULL, '49237.webp', 'http://www.bergstrom.com/dolor-eligendi-dolorem-non-id-repudiandae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et accusantium velit et voluptatem illo odit nesciunt.', 'tempora sit qui autem ipsum', 'Possimus voluptatum dolor accusamus cumque.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 00:52:52'),
(37, 4, 10, 8, 6, 8, 'vendor', 'Badhakopi', '103498', 'Brown', 75.00, 13.00, 650, 'a', '12986.jpg', 'http://hyatt.com/aut-animi-ipsam-iste-consequuntur-ab-et-molestiae-modi.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Error quia suscipit nisi nam.', 'magni explicabo ut reprehenderit magnam', 'Libero atque laborum ut sit illo sit.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-12 00:28:36'),
(38, 4, 9, 8, 2, 4, 'vendor', 'Mango Himshagor', '52332', 'GlaucousGreen', 75.00, 0.00, 1000, NULL, '24850.webp', 'http://www.kohler.info/alias-fugit-voluptas-omnis-omnis-aut.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Harum magnam repudiandae aliquam qui quas.', 'rerum ut sunt cum necessitatibus', 'Sint quis doloremque sapiente aperiam delectus laudantium vel.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-11 12:45:19'),
(39, 3, 8, 12, 4, 6, 'vendor', 'OnePlus 32 Y1 Y Series 32-Inch HD Smart Android LED Television', '438923', 'Violet', 23500.00, 20.00, 1961, NULL, '20904.webp', 'http://www.russel.net/nostrum-aperiam-velit-natus-rem.html', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Repudiandae non in incidunt id veritatis rerum.', 'ea maxime minus quae aliquid', 'Sed perspiciatis sapiente quidem amet.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 01:18:15'),
(40, 2, 3, 5, 6, 8, 'vendor', 'smartphone', '148571', 'Black', 36990.00, 38.00, 1215, NULL, '86853.jpg', 'http://www.harris.com/ullam-distinctio-repellendus-nobis-iusto-et-dolores-soluta.html', NULL, NULL, NULL, '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', '6+', NULL, NULL, NULL, '8 GB', 'Sit ducimus necessitatibus quo amet ea enim.', 'et iure unde omnis sit', 'Consequatur consequatur at ut et assumenda autem maiores.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:12:44'),
(41, 3, 7, 15, 5, 7, 'vendor', 'washing machine WWM-AFM90', '445715', 'MediumSlateBlue', 53550.00, 0.00, 8688, NULL, '75903.jpg', 'http://www.buckridge.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Unde doloremque culpa sequi et voluptatem et rem.', 'quis non provident accusantium et', 'Ipsum necessitatibus est eligendi voluptatem eveniet qui quidem.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 09:58:04'),
(42, 1, 5, 10, 4, 6, 'vendor', 'Women’s Western Tops', '720400', 'LemonChiffon', 1651.65, 0.00, 315, NULL, '34576.jpg', 'http://www.harris.com/quis-consectetur-ut-beatae-cupiditate-fuga-eos-impedit', NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'polyester', NULL, 'Quia rerum quos ut.', 'necessitatibus et saepe voluptates et', 'Dolores ut qui et voluptatem ipsam.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 01:20:52'),
(43, 1, 4, 1, 5, 7, 'vendor', 'Blue Luxury Slim-Fit Formal Shirt by RICHMAN', '293126', 'DarkGoldenRod', 3467.44, 0.00, 530, NULL, '68451.jpg', 'https://bergstrom.com/dolorem-aut-id-cupiditate-sed-officiis-corporis-sunt-consequuntur.html', NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, 'Voluptates saepe tempore illum ratione expedita.', 'sapiente inventore distinctio aut qui', 'Consequatur mollitia et aut deserunt blanditiis maiores.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 10:01:06'),
(44, 2, 3, 4, 1, 3, 'vendor', 'samsungM33', '1630', 'Silver', 36000.00, 9.00, 645, NULL, '36285.png', 'http://bauch.com/', NULL, NULL, NULL, '128 GB', NULL, NULL, NULL, NULL, NULL, NULL, 'Android', '6+', NULL, NULL, NULL, '6 GB', 'Perferendis architecto in unde qui voluptatem qui ut.', 'at possimus est quia molestias', 'Impedit sapiente enim dicta ipsa culpa iure est quidem.', 'Yes', 'Yes', 1, '2023-06-06 08:38:39', '2023-06-13 00:30:51'),
(45, 4, 9, 9, 1, 3, 'vendor', 'Cherry Pineapple', '18851', 'Cherry', 45.00, 0.00, 580, 'z', '94290.webp', 'http://wilderman.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ex provident quo maiores tempore veniam consequatur distinctio id.', 'et non sed architecto ex', 'Et molestias veritatis sit est aspernatur nihil omnis.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-11 12:21:16'),
(46, 4, 10, 8, 2, 4, 'vendor', 'Green Tomato', '451529', 'Green', 90.28, 12.00, 1000, NULL, '83517.jpg', 'http://heller.biz/necessitatibus-est-id-molestias-optio-ex-deleniti-quis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ea sit et est ut.', 'dicta aut officiis officiis et', 'Sed in nobis quia perferendis rerum deserunt sit.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-11 12:46:09'),
(47, 3, 8, 7, 3, 5, 'vendor', 'LG C2 55-inch evo OLED 4K UHD Smart Television With Alexa', '741101', 'Gainsboro', 180000.00, 15.00, 279, NULL, '49837.webp', 'http://www.johnston.net/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Voluptas perspiciatis inventore neque accusantium.', 'rerum quo voluptatem est sed', 'Numquam perspiciatis similique quam consequatur est.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 01:07:47'),
(48, 2, 1, 4, 1, 3, 'vendor', 'Samsung 21.5 Inch S22F350F LED FULL HD Monitor', '687582', 'Black', 11830.00, 5.00, 1200, NULL, '43172.jpg', 'http://www.parisian.com/aliquam-ea-impedit-aspernatur-quam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Maxime ullam rerum ea.', 'qui provident et hic sunt', 'Aliquid eius vitae officiis modi dolor facere nostrum.', 'Yes', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:41:59'),
(49, 1, 6, 2, 1, 3, 'vendor', 'Boys & Girls Cartoon T-shirts Children Summer Short Sleeve', '454396', 'LightGray', 250.00, 34.00, 730, NULL, '48722.webp', 'http://leuschke.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cartoon', 'half sleeve', 'cotton', NULL, 'Eius odio eos sed molestiae.', 'et neque qui et ipsam', 'Ipsum molestiae nobis et voluptatem.', 'No', 'No', 1, '2023-06-06 08:38:39', '2023-06-13 00:45:15'),
(50, 1, 5, 10, 8, 10, 'vendor', 'Printed Tops & Pant Set by MUSLIN', '3022', 'MediumAquaMarine', 2334.00, 0.00, 394, NULL, '91083.jpg', 'http://batz.com/nobis-incidunt-debitis-perspiciatis', 'Linen Tops with trouser, Long  sleeve round neck with a back button closure.Details:\r\nColour: Onion Blue \r\nFabric: Viscose Blend', NULL, NULL, NULL, NULL, NULL, 'Regular Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, 'Accusamus nobis earum fuga exercitationem.', 'doloribus quaerat quisquam repellat culpa', 'Eum minus dicta cumque autem libero ut.', 'Yes', 'Yes', 1, '2023-06-06 08:38:39', '2023-06-14 08:59:38'),
(51, 1, 12, 1, 0, 1, 'superadmin', 'Men’s Blue Color Slim-Fit shirt', 'RMMRNTS', 'Blue', 3290.00, 0.00, 215, NULL, '99768.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, NULL, NULL, NULL, 'Yes', 'No', 1, '2023-06-12 10:24:31', '2023-06-12 23:37:45'),
(52, 1, 14, 2, 0, 1, 'superadmin', 'Shoilpik Women  t-shirt', 'STSW', 'Brown', 1200.00, 20.00, 150, NULL, '916.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', NULL, NULL, NULL, NULL, NULL, 'solid', 'full sleeve', 'cotton', NULL, NULL, NULL, NULL, 'Yes', 'No', 1, '2023-06-12 10:27:36', '2023-06-12 23:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 31, '2Ton', 106900.00, 59, 'jm-594874', 1, '2023-06-06 08:38:39', '2023-06-13 11:01:46'),
(2, 38, '1kg', 75.00, 80, 'pl-001295', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(3, 13, '1pkt', 83.00, 51, 'ld-425069', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(4, 42, 'M', 1651.65, 70, 'nc-002677', 1, '2023-06-06 08:38:39', '2023-06-13 01:22:00'),
(5, 48, '21.5(inch)', 11830.00, 85, 'ic-471794', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(6, 1, '21\"', 12000.00, 40, 'co-969405', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(7, 17, '6GB-128GB', 28000.00, 73, 'jx-405674', 1, '2023-06-06 08:38:39', '2023-06-13 00:16:55'),
(8, 39, '32\"', 23500.00, 84, 'kp-521320', 1, '2023-06-06 08:38:39', '2023-06-13 01:19:36'),
(9, 32, '16GB-500GB', 82469.00, 68, 'ki-170834', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(10, 10, '2.5Ton', 117000.00, 0, 'rs-195413', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(11, 28, '1Ton', 30000.00, 91, 'lw-224156', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(12, 47, '55\"', 180000.00, 90, 'qd-165128', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(13, 29, 'S', 2881.36, 37, 'qr-031397', 1, '2023-06-06 08:38:39', '2023-06-13 09:39:39'),
(14, 14, '1kg', 50.00, 83, 'gw-098771', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(15, 25, 'S', 2700.15, 62, 'dy-452862', 1, '2023-06-06 08:38:39', '2023-06-13 00:21:05'),
(16, 7, '16GB-256GB', 214999.00, 7, 'ft-169425', 1, '2023-06-06 08:38:39', '2023-06-13 09:33:15'),
(17, 2, '1kg', 140.00, 160, 'zg-664453', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(18, 27, 'L', 250.66, 26, 'pe-431979', 1, '2023-06-06 08:38:39', '2023-06-13 00:23:04'),
(19, 24, '16GB-1TB', 64000.00, 67, 'ca-468212', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(20, 44, '8GB-128GB', 36000.00, 48, 'ab-371506', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(21, 44, '8BG-256GB', 42000.00, 34, 'ci-242467', 1, '2023-06-06 08:38:39', '2023-06-06 08:38:39'),
(22, 32, '8GB-500GB', 80000.00, 71, 'em-129814', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(23, 33, '6GB-128GB', 42990.00, 10, 'tg-382012', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(24, 15, 'M', 1050.00, 67, 'ko-721069', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(25, 4, '8GB-256GB', 65000.00, 63, 'kj-094146', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(26, 31, '1Ton', 106900.00, 30, 'wj-845157', 1, '2023-06-06 08:38:40', '2023-06-13 11:01:46'),
(27, 18, '8GB-256GB', 52100.00, 54, 'tv-971738', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(28, 23, '250gm', 20.00, 10000, 'gn-907765', 1, '2023-06-06 08:38:40', '2023-06-13 12:15:45'),
(29, 20, '2Ton', 85000.00, 63, 'kh-564745', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(30, 37, '1Ps', 75.00, 35, 'gs-382193', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(31, 25, 'M', 2700.35, 4, 'ty-834170', 1, '2023-06-06 08:38:40', '2023-06-13 00:21:05'),
(32, 47, '52\"', 170000.00, 71, 'ch-685381', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(33, 2, 'M', 31.36, 52, 'nl-759625', 0, '2023-06-06 08:38:40', '2023-06-13 12:22:10'),
(34, 19, '16GB-512GB', 90900.00, 18, 'gi-264698', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(35, 12, '100Ps', 250.00, 48, 'bf-037759', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(36, 7, 'S', 69.49, 7, 'vi-137331', 0, '2023-06-06 08:38:40', '2023-06-13 09:33:15'),
(37, 42, 'L', 1651.05, 19, 'nw-583155', 1, '2023-06-06 08:38:40', '2023-06-13 01:22:00'),
(38, 22, '32\"', 2724.00, 61, 'ne-781409', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(39, 9, '1pkt', 100.00, 68, 'yn-025928', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(40, 5, 'L', 82.88, 41, 'zs-866272', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(41, 45, '4pcs', 45.00, 200, 'hd-746257', 1, '2023-06-06 08:38:40', '2023-06-07 07:23:05'),
(42, 6, 'M', 22.06, 88, 'iy-812816', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(43, 28, '1.5Ton', 40000.00, 73, 'dh-439480', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(44, 44, '6GB-128GB', 36000.00, 87, 'kv-827939', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(45, 39, 'L', 84.71, 0, 'mw-100869', 0, '2023-06-06 08:38:40', '2023-06-13 01:19:36'),
(46, 34, '1kg', 230.00, 50, 'vg-044607', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(47, 23, 'S', 59.27, 0, 'bo-288303', 0, '2023-06-06 08:38:40', '2023-06-13 12:16:31'),
(48, 17, '8GB-256GB', 32000.00, 49, 'nx-746524', 1, '2023-06-06 08:38:40', '2023-06-13 00:16:56'),
(49, 39, 'M', 91.52, 0, 'tx-476710', 0, '2023-06-06 08:38:40', '2023-06-13 01:19:36'),
(50, 48, '32(inch)', 15000.00, 62, 'kh-843575', 1, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(51, 51, 'M', 3290.00, 10, 'RMMRNTS-M', 1, '2023-06-12 23:40:56', '2023-06-12 23:41:05'),
(52, 51, 'L', 3290.00, 10, 'RMMRNTS-L', 1, '2023-06-12 23:40:56', '2023-06-12 23:41:05'),
(53, 51, 'XL', 3290.00, 10, 'RMMRNTS-XL', 1, '2023-06-12 23:40:56', '2023-06-12 23:41:05'),
(54, 51, 'XXL', 3290.00, 10, 'RMMRNTS-XXL', 1, '2023-06-12 23:40:56', '2023-06-12 23:41:05'),
(55, 52, 'L', 1200.00, 5, 'STSW-L', 1, '2023-06-12 23:42:24', '2023-06-12 23:42:24'),
(56, 52, 'XL', 1200.00, 10, 'STSW-XL', 1, '2023-06-12 23:42:24', '2023-06-12 23:42:24'),
(57, 17, '8GB-128GB', 30000.00, 10, 'XRN12P-003', 1, '2023-06-13 00:18:22', '2023-06-13 00:18:22'),
(58, 27, 'M', 250.00, 10, 'KTS-M', 1, '2023-06-13 00:23:40', '2023-06-13 00:23:40'),
(59, 35, '1Ton', 25000.00, 10, 'ACHP-1T', 1, '2023-06-13 00:28:11', '2023-06-13 00:28:11'),
(60, 35, '1.5Ton', 35000.00, 5, 'ACHP-1.5T', 1, '2023-06-13 00:28:45', '2023-06-13 00:28:45'),
(61, 49, 'M', 250.00, 10, 'BGCTCSSS-M', 1, '2023-06-13 00:46:16', '2023-06-13 00:46:16'),
(62, 49, 'S', 250.00, 5, 'BGCTCSSS-S', 1, '2023-06-13 00:46:44', '2023-06-13 00:46:44'),
(63, 8, 'M', 2100.00, 10, 'IT+M', 1, '2023-06-13 00:50:20', '2023-06-13 00:50:20'),
(64, 8, 'L', 2100.00, 5, 'IT-M', 1, '2023-06-13 00:50:57', '2023-06-13 00:50:57'),
(65, 30, '8GB-128GB', 36990.00, 10, 'RN12P5G-8128', 1, '2023-06-13 01:05:13', '2023-06-13 01:05:13'),
(66, 30, '6G-128GB', 33000.00, 5, 'RN12P5G-6128', 1, '2023-06-13 01:05:58', '2023-06-13 01:05:58'),
(67, 21, '6GB-128GB', 36990.00, 10, 'XRN12P-005', 1, '2023-06-13 01:13:22', '2023-06-13 01:13:22'),
(68, 29, 'M', 2881.00, 10, 'CPCRFPBL-M', 1, '2023-06-13 09:41:18', '2023-06-13 09:41:18'),
(69, 29, 'L', 2881.00, 10, 'CPCRFPBL-L', 1, '2023-06-13 09:41:18', '2023-06-13 09:41:18'),
(70, 29, 'XL', 2881.00, 5, 'CPCRFPBL-XL', 1, '2023-06-13 09:41:18', '2023-06-13 09:41:18'),
(71, 33, '8GB-128GB', 42990.00, 10, 'X11iH5G-8128', 1, '2023-06-13 09:56:31', '2023-06-13 09:56:31'),
(72, 33, '8GB-256GB', 42990.00, 5, 'X11iH5G-8256', 1, '2023-06-13 09:56:31', '2023-06-13 09:56:31'),
(73, 41, '12Kg', 53550.00, 10, 'WWM-AFM90', 1, '2023-06-13 09:59:42', '2023-06-13 09:59:42'),
(74, 43, 'L', 3467.00, 10, 'RBLSFFS-L', 1, '2023-06-13 10:02:29', '2023-06-13 10:02:29'),
(75, 43, 'XL', 3467.00, 10, 'RBLSFFS-XL', 1, '2023-06-13 10:02:29', '2023-06-13 10:02:29'),
(76, 16, '8GB-512GB', 106900.00, 5, 'AR5SP', 1, '2023-06-13 10:11:29', '2023-06-13 10:11:29'),
(77, 40, '6GB-128GB', 36990.00, 10, 'SPMI', 1, '2023-06-13 10:13:23', '2023-06-13 10:13:23'),
(78, 26, '1Kg', 150.00, 50, 'jaam-01', 1, '2023-06-13 10:14:59', '2023-06-13 10:14:59'),
(79, 3, '4Ton', 70000.00, 10, 'WSI', 1, '2023-06-13 10:28:12', '2023-06-13 10:28:12'),
(80, 11, '1kg', 38.00, 20, 'GT', 1, '2023-06-13 10:31:50', '2023-06-13 10:31:50'),
(81, 36, '1kg', 180.00, 100, 'CACR', 1, '2023-06-13 12:04:51', '2023-06-13 12:04:51'),
(82, 50, 'L', 2334.00, 0, 'PTPSBM', 1, '2023-06-13 12:06:23', '2023-06-14 09:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters`
--

CREATE TABLE `products_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_ids` varchar(255) DEFAULT NULL,
  `filter_name` varchar(255) DEFAULT NULL,
  `filter_column` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters`
--

INSERT INTO `products_filters` (`id`, `cat_ids`, `filter_name`, `filter_column`, `status`, `created_at`, `updated_at`) VALUES
(1, '1,2,3', 'RAM', 'ram', 1, NULL, NULL),
(2, '4,12,16,17,5,13,14,15,6,18,19', 'Fabric', 'fabric', 1, NULL, '2023-06-12 11:11:36'),
(3, '4,12,16,17,5,13,14,15,6,18,19', 'Sleeve', 'sleeve', 1, '2023-06-12 11:14:38', '2023-06-12 11:14:38'),
(4, '4,12,16,17,5,13,14,15,6,18,19', 'Patterns', 'pattern', 1, '2023-06-12 11:22:44', '2023-06-12 11:22:44'),
(5, '1,2,3', 'Screen Size', 'screen_size', 1, '2023-06-12 11:29:32', '2023-06-12 11:29:32'),
(6, '2,3', 'Operating System', 'operating_system', 1, '2023-06-12 11:30:55', '2023-06-12 11:30:55'),
(7, '1,2', 'Processor', 'processor', 1, '2023-06-12 11:31:27', '2023-06-13 00:56:24'),
(8, '1,2,8', 'Display Size', 'display_size', 1, '2023-06-12 11:32:55', '2023-06-13 00:52:52'),
(9, '7', 'Ton', 'ton', 1, '2023-06-12 11:34:19', '2023-06-12 11:34:19'),
(10, '4,12,16,17,5,13,14,15,6,18,19', 'Fit Type', 'fit_type', 1, '2023-06-12 11:40:18', '2023-06-12 11:40:18'),
(11, '16', 'Shirt Type', 'shirt_type', 1, '2023-06-12 11:42:29', '2023-06-12 11:43:55'),
(12, '3', 'Storage', 'storage', 1, '2023-06-12 23:54:21', '2023-06-12 23:55:32'),
(13, '1,2', 'SSD', 'ssd', 1, '2023-06-12 23:57:26', '2023-06-12 23:57:26'),
(14, '1,2', 'HDD', 'hdd', 1, '2023-06-12 23:57:45', '2023-06-12 23:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters_values`
--

CREATE TABLE `products_filters_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `filter_value` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters_values`
--

INSERT INTO `products_filters_values` (`id`, `filter_id`, `filter_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '4 GB', 1, NULL, '2023-06-12 23:56:42'),
(2, 1, '8 GB', 1, NULL, '2023-06-12 23:56:54'),
(3, 2, 'cotton', 1, NULL, NULL),
(4, 2, 'polyester', 1, NULL, NULL),
(5, 1, '12 GB', 1, '2023-06-12 11:35:53', '2023-06-12 11:35:53'),
(6, 1, '16 GB', 1, '2023-06-12 11:36:11', '2023-06-12 11:36:11'),
(7, 3, 'full sleeve', 1, '2023-06-12 11:37:20', '2023-06-12 11:37:20'),
(8, 3, 'half sleeve', 1, '2023-06-12 11:37:37', '2023-06-12 11:37:37'),
(9, 4, 'solid', 1, '2023-06-12 11:38:15', '2023-06-12 11:38:15'),
(10, 4, 'cartoon', 1, '2023-06-12 11:38:39', '2023-06-12 11:38:39'),
(11, 4, 'letter print', 1, '2023-06-12 11:38:58', '2023-06-12 11:38:58'),
(12, 11, 'Casual Shirt', 1, '2023-06-12 11:45:16', '2023-06-12 11:45:16'),
(13, 11, 'Formal Shirt', 1, '2023-06-12 11:45:32', '2023-06-12 11:45:32'),
(14, 5, '3.6-4.0(inch)', 1, '2023-06-12 11:48:08', '2023-06-12 11:50:44'),
(15, 5, '4.1-4.5(inch)', 1, '2023-06-12 11:51:28', '2023-06-12 11:51:28'),
(16, 5, '5.1-5.5(inch)', 1, '2023-06-12 11:51:57', '2023-06-12 11:51:57'),
(17, 5, '5.6-6(inch)', 1, '2023-06-12 11:52:23', '2023-06-12 11:52:23'),
(18, 5, '6+', 1, '2023-06-12 11:52:33', '2023-06-12 11:52:33'),
(19, 6, 'Android', 1, '2023-06-12 11:53:02', '2023-06-12 11:53:02'),
(20, 6, 'IOS', 1, '2023-06-12 11:53:23', '2023-06-12 11:53:23'),
(21, 6, 'Windows', 1, '2023-06-12 11:53:35', '2023-06-12 11:53:35'),
(22, 7, 'Intel', 1, '2023-06-12 11:53:57', '2023-06-12 11:53:57'),
(23, 7, 'AMD', 1, '2023-06-12 11:54:11', '2023-06-12 11:54:11'),
(24, 8, '32', 1, '2023-06-12 11:55:19', '2023-06-12 11:55:19'),
(25, 8, '42', 1, '2023-06-12 11:55:32', '2023-06-12 11:55:32'),
(26, 8, '55', 1, '2023-06-12 11:55:46', '2023-06-12 11:55:59'),
(27, 8, '50+', 1, '2023-06-12 11:56:16', '2023-06-12 11:56:16'),
(28, 9, '1', 1, '2023-06-12 11:56:55', '2023-06-12 11:56:55'),
(29, 9, '1.5', 1, '2023-06-12 11:57:47', '2023-06-12 11:57:47'),
(30, 9, '2', 1, '2023-06-12 11:57:56', '2023-06-12 11:57:56'),
(31, 9, '3', 1, '2023-06-12 11:58:07', '2023-06-12 11:58:07'),
(32, 9, '4', 1, '2023-06-12 11:58:16', '2023-06-12 11:58:16'),
(33, 10, 'Regular Fit', 1, '2023-06-12 11:58:32', '2023-06-12 11:58:32'),
(34, 10, 'Slim Fit', 1, '2023-06-12 11:59:02', '2023-06-12 11:59:02'),
(35, 1, '6 GB', 1, '2023-06-12 23:51:12', '2023-06-12 23:51:12'),
(36, 12, '64 GB', 1, '2023-06-12 23:54:45', '2023-06-12 23:54:45'),
(37, 12, '128 GB', 1, '2023-06-12 23:54:59', '2023-06-12 23:54:59'),
(38, 12, '32 GB', 1, '2023-06-12 23:56:12', '2023-06-12 23:56:12'),
(39, 13, '128 GB', 1, '2023-06-13 00:00:46', '2023-06-13 00:00:46'),
(40, 13, '256 GB', 1, '2023-06-13 00:01:02', '2023-06-13 00:01:02'),
(41, 13, '512 GB', 1, '2023-06-13 00:01:16', '2023-06-13 00:01:16'),
(42, 13, '1 TB', 1, '2023-06-13 00:01:36', '2023-06-13 00:01:36'),
(43, 14, '120GB to 500GB', 1, '2023-06-13 00:04:03', '2023-06-13 00:04:03'),
(44, 14, '512GB to 1TB', 1, '2023-06-13 00:04:41', '2023-06-13 00:04:41'),
(45, 14, '2TB  to 4TB', 1, '2023-06-13 00:05:27', '2023-06-13 00:05:27'),
(46, 12, '256 GB', 1, '2023-06-13 00:08:32', '2023-06-13 00:08:32'),
(47, 8, '14\"', 1, '2023-06-13 00:54:21', '2023-06-13 00:54:21'),
(48, 8, '15\" to 21\"', 1, '2023-06-13 00:54:53', '2023-06-13 00:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `review`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 19, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(2, 14, 29, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(3, 12, 32, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(4, 12, 47, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(5, 15, 16, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(6, 15, 48, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(7, 16, 18, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(8, 5, 7, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(9, 17, 45, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(10, 3, 2, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(11, 24, 24, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(12, 17, 43, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(13, 7, 39, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(14, 18, 29, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(15, 25, 5, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(16, 7, 14, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(17, 13, 19, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(18, 16, 15, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(19, 16, 23, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(20, 12, 45, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(21, 16, 45, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(22, 21, 16, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(23, 10, 10, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(24, 18, 33, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(25, 22, 8, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(26, 21, 25, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(27, 18, 47, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(28, 6, 16, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(29, 1, 33, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(30, 17, 24, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(31, 14, 27, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(32, 22, 4, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(33, 2, 21, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(34, 7, 41, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(35, 20, 8, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(36, 15, 42, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(37, 10, 34, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(38, 12, 14, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(39, 8, 34, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(40, 22, 43, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(41, 6, 17, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(42, 11, 19, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(43, 2, 6, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(44, 23, 12, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(45, 2, 45, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(46, 12, 40, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(47, 21, 48, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(48, 20, 13, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(49, 10, 33, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(50, 11, 36, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(51, 20, 37, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(52, 17, 22, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(53, 6, 45, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(54, 16, 36, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(55, 24, 18, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(56, 7, 2, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(57, 6, 45, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(58, 10, 7, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(59, 22, 49, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(60, 6, 18, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(61, 13, 48, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(62, 9, 24, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(63, 6, 1, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(64, 6, 46, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(65, 4, 16, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(66, 17, 47, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(67, 22, 29, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(68, 14, 20, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(69, 1, 21, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(70, 21, 18, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(71, 12, 40, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(72, 1, 46, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(73, 1, 36, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(74, 23, 6, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(75, 10, 10, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(76, 15, 46, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(77, 15, 5, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(78, 9, 30, 'Not A Good Product', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(79, 6, 4, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(80, 18, 21, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(81, 15, 17, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(82, 18, 5, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(83, 12, 44, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(84, 9, 4, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(85, 9, 45, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(86, 23, 44, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(87, 6, 3, 'Excellent Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(88, 7, 11, 'More Upgrading', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(89, 15, 10, 'More Upgrading', 3, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(90, 19, 4, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(91, 5, 47, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(92, 18, 40, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(93, 4, 15, 'Very Good Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(94, 1, 39, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(95, 4, 46, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(96, 16, 43, 'Not A Good Product', 2, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(97, 19, 14, 'Not A Good Product', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(98, 21, 22, 'Excellent Product', 5, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(99, 16, 37, 'Very Good Product', 4, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(100, 15, 29, 'More Upgrading', 1, 1, '2023-06-06 08:38:44', '2023-06-06 08:38:44'),
(101, 20, 50, 'love it', 4, 1, '2023-06-06 09:02:03', '2023-06-06 09:02:03'),
(102, 3, 50, 'I have used this product. I think this is one of best product in anon', 5, 1, '2023-06-06 09:05:49', '2023-06-06 09:05:49'),
(103, 25, 50, 'I have used this product. I think this is one of the best products in anon. highly recommended', 5, 1, '2023-06-06 09:08:08', '2023-06-06 09:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_products`
--

CREATE TABLE `recently_viewed_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_viewed_products`
--

INSERT INTO `recently_viewed_products` (`id`, `product_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 10, '449b86e32116fb56832b2e95a12d4562', NULL, NULL),
(2, 29, '449b86e32116fb56832b2e95a12d4562', NULL, NULL),
(3, 19, 'c56f8baca0c978e14692d00cfab0ba17', NULL, NULL),
(4, 19, '99190e32afd7c3b05eef84d699704713', NULL, NULL),
(5, 45, 'ea0adf10fc9c062443ee4739b97e26a4', NULL, NULL),
(6, 50, 'ea0adf10fc9c062443ee4739b97e26a4', NULL, NULL),
(7, 50, 'f9d909a5450f278d4463a25e9954be27', NULL, NULL),
(8, 50, '5f0a305236da172f484c4ecb81f10606', NULL, NULL),
(9, 45, '8a0d7c6060c39674d637a0604eb881fb', NULL, NULL),
(10, 50, 'e2af48138ca1861101632bbbf81a8a54', NULL, NULL),
(11, 49, 'bfe319c5138d69daca6c8ef201342580', NULL, NULL),
(12, 45, 'bfe319c5138d69daca6c8ef201342580', NULL, NULL),
(13, 38, 'bfe319c5138d69daca6c8ef201342580', NULL, NULL),
(14, 42, 'bfe319c5138d69daca6c8ef201342580', NULL, NULL),
(15, 50, 'bfe319c5138d69daca6c8ef201342580', NULL, NULL),
(16, 50, '7959d53c5884b09b68f0a58fd5e5043b', NULL, NULL),
(17, 18, '7959d53c5884b09b68f0a58fd5e5043b', NULL, NULL),
(18, 8, '7959d53c5884b09b68f0a58fd5e5043b', NULL, NULL),
(19, 18, '762ff62259224c654767d47c07b92cfc', NULL, NULL),
(20, 45, '762ff62259224c654767d47c07b92cfc', NULL, NULL),
(21, 52, 'd285458f97299cc8439f8bd52b8cb1b4', NULL, NULL),
(22, 44, '56bcca14d945e6c372b5114f50ab4cf4', NULL, NULL),
(23, 21, '56bcca14d945e6c372b5114f50ab4cf4', NULL, NULL),
(24, 18, '07187b4d3261d2c752289d5256bbe6bf', NULL, NULL),
(25, 18, 'a0cdb16c979b9ade64c84dfcb0578f02', NULL, NULL),
(26, 50, 'a0cdb16c979b9ade64c84dfcb0578f02', NULL, NULL),
(27, 45, 'e1081af168c2162a1b1c7fca7d480698', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 1, NULL, NULL),
(2, 'Electronics', 1, NULL, NULL),
(3, 'Appliances', 1, NULL, NULL),
(4, 'Groceries', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `0_500g` double(8,2) DEFAULT NULL,
  `501_1000g` double(8,2) DEFAULT NULL,
  `1001_2000g` double(8,2) DEFAULT NULL,
  `2001_5000g` double(8,2) DEFAULT NULL,
  `above_5000g` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `rate`, `status`, `0_500g`, `501_1000g`, `1001_2000g`, `2001_5000g`, `above_5000g`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 50.00, 1, 50.00, 100.00, 150.00, 200.00, 300.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marion Kris', '443 Hobart Mount\nNew Amieville, ND 65237-3848', 'McGlynnton', 'Maryland', 'Saint Martin', '3984', '(650) 506-4098', 'user1@gmail.com', '2023-06-06 08:38:40', '$2y$10$V1tOgrQGY6d94FOAtEifMuSt9575zK8v/YEkhfy25/EG.uGPVa0Pq', 1, NULL, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(2, 'Thad Feest', '172 Kerluke Ridges Suite 419\nLake Nicole, AR 32189-0399', 'Julianaburgh', 'Georgia', 'Cuba', '3928', '+1-531-716-6147', 'user2@gmail.com', '2023-06-06 08:38:40', '$2y$10$KF1hRwlBMXEEWj3y1enWUO6aYlgaRPEb7Z4VC57dBcX.D/a8V3uWe', 1, NULL, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(3, 'Alivia Reynolds', '60726 Padberg Loaf Apt. 963\nBoyleport, ND 22828-3449', 'Vivianneberg', 'New Mexico', 'Niue', '1419', '+1 (218) 686-1209', 'user3@gmail.com', '2023-06-06 08:38:40', '$2y$10$Wxfk8hQiZP7vPnoy4lZx6.H56sU3GyGXdkm2iOU9rTesh6lMnOgUC', 1, NULL, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(4, 'Prof. Deontae Hermiston IV', '966 Prohaska Inlet\nColumbuston, NH 03606', 'South Jany', 'South Carolina', 'Moldova', '1395', '+1-210-749-1308', 'user4@gmail.com', '2023-06-06 08:38:40', '$2y$10$37mIqYR4iWnLUP6ManHzn.js0D2i25rdORXwWGNKUihjUH7QA2z1u', 1, NULL, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(5, 'Ms. Zora Raynor', '721 Camylle Heights\nChandlerberg, ND 29008', 'Loriview', 'New Hampshire', 'Micronesia', '4799', '+16175170387', 'user5@gmail.com', '2023-06-06 08:38:40', '$2y$10$ZPMuk4BukG75yO5qGSxcB..2WLaMgALETxuR5Riy8hH0TTdUwlyUy', 1, NULL, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(6, 'Kianna Beahan', '157 Rau Bypass Apt. 381\nLeannamouth, MO 66195', 'Hermistonfurt', 'Illinois', 'Honduras', '9469', '1-909-983-9867', 'user6@gmail.com', '2023-06-06 08:38:40', '$2y$10$n5OoSMfXPL87dzDAUvAvCOSJ3mSxwCT39Bn3jJOmFqw/4J5IOLZLy', 1, NULL, '2023-06-06 08:38:40', '2023-06-06 08:38:40'),
(7, 'Nicola Reinger', '716 Agustina Coves\nLenoraberg, MA 98240-6682', 'Romanside', 'Arizona', 'Colombia', '1333', '458-457-6211', 'user7@gmail.com', '2023-06-06 08:38:41', '$2y$10$YqWtflNkKOUKvdGJPc5zb.Gk0YPgeJZaona0l/NRSjUet3Y6uPvIO', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(8, 'Florida Rice', '3535 Naomi Mills Apt. 387\nLake Elroyburgh, SC 18653-7011', 'South Shany', 'Louisiana', 'Azerbaijan', '3785', '+1 (870) 388-0383', 'user8@gmail.com', '2023-06-06 08:38:41', '$2y$10$JlCWs.tCqryzuukgU81Q2u4OUXZpdOJG/ey73HeMQGV9Pdf1SXAcy', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(9, 'Jaleel Gerlach', '8928 Ayden Turnpike Suite 279\nLake Zackery, OH 46083', 'Vergiemouth', 'Oregon', 'Portugal', '3767', '1-806-623-2364', 'user9@gmail.com', '2023-06-06 08:38:41', '$2y$10$3BbqMsbEmScY1JYDVpHeU.kpEnnZ0hh/wgETwz0F67SXgjyZZd7S6', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(10, 'Jeffery Harber', '555 Claudine Mission Apt. 367\nNew Daphneside, WA 36654-1843', 'Port Kristopher', 'New Jersey', 'Monaco', '2166', '+1 (862) 961-0197', 'user10@gmail.com', '2023-06-06 08:38:41', '$2y$10$RISC9GoNlTQqZn7cJc53w.JAH7QTHmW./efSH/pCNfphIXx1UxdUW', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(11, 'Kevin Thiel', '311 Hammes Mall\nMarinaborough, AR 32960', 'Nadiamouth', 'Idaho', 'Senegal', '3005', '+1.901.200.1374', 'user11@gmail.com', '2023-06-06 08:38:41', '$2y$10$.QyqrtveRRljIRRn9nCE.ODFvTwnQyvcJwb1Gie5pL453u4zMb/Su', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(12, 'Jewell Zulauf', '8111 Candace Knolls Apt. 953\nHartmannmouth, IL 55850', 'North Dell', 'Wisconsin', 'Serbia', '4165', '1-225-383-0727', 'user12@gmail.com', '2023-06-06 08:38:41', '$2y$10$lFWOe2X3aoyvLzD0knY.VeO0gFFdm5ayA8D/Ey9q23.FH0jkvYSmi', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(13, 'Christiana Kemmer', '4975 Chanel Centers\nWest Danielle, OH 22287', 'Port Lee', 'Illinois', 'Czech Republic', '6493', '(229) 324-9719', 'user13@gmail.com', '2023-06-06 08:38:41', '$2y$10$rp/XxBsgf39z.OWJz28vw.iM0AoLnt8GH221fbEGyHlj2G5Nt.gLi', 1, NULL, '2023-06-06 08:38:41', '2023-06-06 08:38:41'),
(14, 'Krista Quigley I', '105 Kunze Parks Apt. 461\nBrianview, NJ 92963', 'Luluborough', 'Georgia', 'Austria', '6759', '+1-850-876-5287', 'user14@gmail.com', '2023-06-06 08:38:42', '$2y$10$hEjrJd0Hgl.t5SkIJ0dH.efjL4UJIJAR0m0OYNmuKPp/xT.98nf9e', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(15, 'Dr. Rosendo Simonis III', '302 Lakin Pass\nWest Keelyfurt, CT 74592', 'Port Makenna', 'Maine', 'Paraguay', '1887', '1-802-937-0363', 'user15@gmail.com', '2023-06-06 08:38:42', '$2y$10$Bkt.QZXWgRx8gV9pGMH/.uc7fVUY5VA6JB0Wi4cCiGj.ZfnPiO5e2', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(16, 'Johnson Price', '29856 Ziemann Junction\nBatzmouth, CA 05912', 'Cristopherview', 'Michigan', 'Anguilla', '2225', '(786) 664-2333', 'user16@gmail.com', '2023-06-06 08:38:42', '$2y$10$Mo1diIFt6WC9nEf/g45h8u4Lf5rrjQ/3xspa1U1sLieoBMw7K4rwm', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(17, 'Grady King', '657 Ryan Walks\nSouth Paula, WI 92900', 'Wolftown', 'New York', 'Belgium', '8944', '337.703.2790', 'user17@gmail.com', '2023-06-06 08:38:42', '$2y$10$Hb6aBpr64/er3BJjlBO3s.z.CFW9aSh/qCijj7IxODIhi.pdUSLHm', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(18, 'Agustina Graham', '8753 Pfannerstill Knoll Apt. 412\nPort Candiceshire, ND 11459-8352', 'Lake Ashly', 'Minnesota', 'Oman', '1262', '430-524-0518', 'user18@gmail.com', '2023-06-06 08:38:42', '$2y$10$SvVcd7oTH/XsderWei2KC.kM8TzxvejSTWX0GPV/5c2Nsjq3B/Iki', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(19, 'Dr. Nayeli Trantow', '179 Padberg Square\nProsaccofort, NJ 10923', 'South Ellietown', 'Michigan', 'Italy', '5450', '352.883.5348', 'user19@gmail.com', '2023-06-06 08:38:42', '$2y$10$fk0YNzaxJ9whow5rStWF6.aMtkNjaJUfezP54ymyPnO5hg7.kB8zO', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(20, 'Dr. Marielle Mosciski I', '8731 Sandra Spurs\nBrownmouth, NY 72602-0994', 'Jacobibury', 'Tennessee', 'Kyrgyz Republic', '8871', '269-375-7940', 'user20@gmail.com', '2023-06-06 08:38:42', '$2y$10$RVTcHiQS0nBdzOzmvnYSOerPz4/dSNv2olcsK05rQilPbY7HNFD1C', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(21, 'Ms. Christine Schroeder', '53897 Bartell Ferry\nLake Royalfurt, CO 08761', 'Daughertychester', 'New Jersey', 'Gambia', '7920', '+1.757.298.1996', 'user21@gmail.com', '2023-06-06 08:38:42', '$2y$10$ZnLszpXXUc4c8fewixSv/.5jZ3v24e9f/dfnrcZSsY2rRlmn5WGbC', 1, NULL, '2023-06-06 08:38:42', '2023-06-06 08:38:42'),
(22, 'Skyla Denesik', '531 Stephon Cape Suite 509\nCathyport, MD 04611', 'Port Walton', 'Oklahoma', 'Northern Mariana Islands', '5852', '+1 (850) 226-2987', 'user22@gmail.com', '2023-06-06 08:38:43', '$2y$10$LAmtuMTb6hrNPJvTGKM5h.g2xRuVVstl1PCVSnZjE8XRJ1P3qtX1K', 1, NULL, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(23, 'Candace Konopelski', '56243 Joana Centers Apt. 729\nSatterfieldfurt, ID 89518', 'East Esther', 'Iowa', 'Brunei Darussalam', '3525', '+1 (267) 239-9975', 'user23@gmail.com', '2023-06-06 08:38:43', '$2y$10$Ctf1wRW8zcfyeM92h90A0eBAvjRbvjxCRp2o62Mlf77GL7fG1.CYu', 1, NULL, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(24, 'Dorothy Haley DVM', '586 Halvorson Port\nPort Marquise, DE 05053', 'Port Ashleighview', 'Iowa', 'Colombia', '2173', '346-364-1440', 'user24@gmail.com', '2023-06-06 08:38:43', '$2y$10$WQafH1pyA3MhxqIGAnUiHOmtg0qGTO2YrjSolzfrZs73CFVLHLEYu', 1, NULL, '2023-06-06 08:38:43', '2023-06-06 08:38:43'),
(25, 'Donny McLaughlin', '566 Parisian Street Apt. 427\nKlockoside, AK 78526-6725', 'West Kierafort', 'Washington', 'Bangladesh', '9993', '+1-949-730-0408', 'user25@gmail.com', '2023-06-06 08:38:43', '$2y$10$6dU3rD8hYhA78XB6RNW5lugz9PVr3.VirxcmTJsSu6LjKDY5Zhn7e', 1, NULL, '2023-06-06 08:38:43', '2023-06-06 08:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `confirm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `status`, `confirm`, `created_at`, `updated_at`) VALUES
(1, 'Mr.Paul', 'shitakundo', 'chattogram', 'chattogram', 'Bangladesh', '4310', '01866702189', 'arup@anon.com', 1, NULL, NULL, NULL),
(2, 'Sowrab Hasan', 'Chandgoan residential area', 'chattogram', 'chattogram', 'Bangladesh', '4212', '01611769787', 'sowrab@anon.com', 1, NULL, NULL, NULL),
(3, 'Mohammad Munir', 'Raozan', 'chattogram', 'chattogram', 'Bangladesh', '4340', '01822604285', 'munir@anon.com', 1, NULL, NULL, NULL),
(4, 'Mohammad Sadekul Islam', 'Banshkhali', 'chattogram', 'chattogram', 'Bangladesh', '4393', '01839673550', 'sadekul@anon.com', 1, NULL, NULL, NULL),
(5, 'Md.Shafiul Islam', 'Biponi Bitan (New Market), Chattogram', 'chattogram', 'chattogram', 'Bangladesh', '4000', '01556391725', 'shafiul@anon.com', 1, NULL, NULL, NULL),
(6, 'Naruto Uzumaki', 'Konoha', 'tokyo', 'tokyo', 'Japan', '110-0006', '080-1234-5678', 'naruto@anon.com', 1, NULL, NULL, NULL),
(7, 'Monkey D Luffy', 'Foosha Village', 'Dawn Island', 'Dawn Island', 'Goa Kingdom', '277612', '01558947938', 'luffy@anon.com', 1, NULL, NULL, NULL),
(8, 'Asta', 'Hage Village', 'Forsaken Realm', 'Forsaken Realm', 'Clover Kingdom', '8972372', '01558947938', 'asta@anon.com', 1, NULL, NULL, NULL),
(9, 'Ichigo Kurosaki', 'Karakura Town', 'Western Tokyo', 'Western Tokyo', 'Japan', '65476373', '01558947938', 'icigo@anon.com', 1, NULL, NULL, NULL),
(10, 'Roronoa Zoro', 'Shimotsuki Village', 'East Blue', 'East Blue', 'Goa Kingdom', '27862786', '01558947938', 'zoro@anon.com', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_details`
--

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_number` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_bank_details`
--

INSERT INTO `vendors_bank_details` (`id`, `vendor_id`, `account_holder_name`, `account_number`, `bank_name`, `bank_number`, `bank_ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paul Organic House', '117217865', 'City Bank Limited', NULL, '1121231', NULL, NULL),
(2, 2, 'SH Electronics', '127217865', 'City Bank Limited', NULL, '1221231', NULL, NULL),
(3, 3, 'Raozan Groceries', '137217865', 'Al-Arafah_Islami-Bank', NULL, '1321231', NULL, NULL),
(4, 4, 'OAS Tea', '147217865', 'Cox-Bazar Bank Limited', NULL, '1421231', NULL, NULL),
(5, 5, 'Banu Appeal', '157217865', 'Al-Arafah_Islami-Bank', NULL, '1521231', NULL, NULL),
(6, 6, 'Leaf', '167217865', 'Al-Arafah_Islami-Bank', NULL, '1621231', NULL, NULL),
(7, 7, 'One Piece', '177217865', 'Al-Arafah_Islami-Bank', NULL, '1721231', NULL, NULL),
(8, 8, 'Black Bull', '187217865', 'Al-Arafah_Islami-Bank', NULL, '1821231', NULL, NULL),
(9, 9, 'Ishina', '197217865', 'Al-Arafah_Islami-Bank', NULL, '1921231', NULL, NULL),
(10, 10, 'Lost Again', '110217865', 'Al-Arafah_Islami-Bank', NULL, '1101231', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_business_details`
--

CREATE TABLE `vendors_business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_city` varchar(255) DEFAULT NULL,
  `shop_state` varchar(255) DEFAULT NULL,
  `shop_country` varchar(255) DEFAULT NULL,
  `shop_pincode` varchar(255) DEFAULT NULL,
  `shop_mobile` varchar(255) DEFAULT NULL,
  `shop_website` varchar(255) DEFAULT NULL,
  `shop_email` varchar(255) DEFAULT NULL,
  `address_proof` varchar(255) DEFAULT NULL,
  `address_proof_image` varchar(255) DEFAULT NULL,
  `business_license_number` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_business_details`
--

INSERT INTO `vendors_business_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_website`, `shop_email`, `address_proof`, `address_proof_image`, `business_license_number`, `gst_number`, `pan_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paul Collection', 'shitakundo', 'Chattogram', 'Chattogram', 'Bangladesh', '4310', '01866702189', 'examplesie.bd', 'arup@anon.com', 'Passport', 'voterid.jpg', '3155432412', '3144234243', '21344242', NULL, '2023-06-11 12:31:00'),
(2, 2, 'SH Shopping', 'Chandgoan residential area', 'Chattogram', 'Chattogram', 'Bangladesh', '4212', '01611769787', 'examplesie.bd', 'sowrab@anon.com', 'Passport', 'voterid.jpg', '3255432412', '3244234243', '22344242', NULL, '2023-06-11 12:47:31'),
(3, 3, 'Raozan Electronics', 'Raozan', 'Chattogram', 'Chattogram', 'Bangladesh', '4340', '01822604285', 'examplesie.bd', 'munir@anon.com', 'Passport', 'voterid.jpg', '3355432412', '3344234243', '23344242', NULL, '2023-06-11 12:49:05'),
(4, 4, 'OAS', 'Banshkhali', 'Chattogram', 'Chattogram', 'Bangladesh', '4393', '01839673550', 'examplesie.bd', 'sadekul@anon.com', 'Passport', 'voterid.jpg', '3455432412', '3444234243', '24344242', NULL, '2023-06-11 13:04:37'),
(5, 5, 'Banu Appeal', 'Biponi Bitan (New Market), Chattogram', 'Chattogram', 'Chattogram', 'Bangladesh', '4000', '01558947938', 'examplesie.bd', 'shafiul@anon.com', 'Voter ID', 'voterid.jpg', '3555432412', '3544234243', '25344242', NULL, NULL),
(6, 6, 'Leaf', 'Konoha', 'tokyo', 'tokyo', 'Japan', '4003', '01558947938', 'examplesie.bd', 'naruto@anon.com', 'Voter ID', 'voterid.jpg', '3655432412', '3644234243', '26344242', NULL, NULL),
(7, 7, 'One Piece', 'Foosha Village', 'Dawn Island', 'Dawn Island', 'Goa Kingdom', '277612', '01558947938', 'examplesie.bd', 'luffy@anon.com', 'Voter ID', 'voterid.jpg', '3755432412', '3744234243', '27344242', NULL, NULL),
(8, 8, 'Black Bull', 'Hage Village', 'Forsaken Realm', 'Forsaken Realm', 'Clover Kingdom', '8972372', '01558947938', 'examplesie.bd', 'asta@anon.com', 'Voter ID', 'voterid.jpg', '3855432412', '3844234243', '28344242', NULL, NULL),
(9, 9, 'Ishina', 'Karakura Town', 'Western Tokyo', 'Western Tokyo', 'Japan', '4003', '65476373', 'examplesie.bd', 'icigo@anon.com', 'Voter ID', 'voterid.jpg', '3955432412', '3944234243', '29344242', NULL, NULL),
(10, 10, 'Lost Again', 'Shimotsuki Village', 'East Blue', 'East Blue', 'Goa Kingdom', '27862786', '01558947938', 'examplesie.bd', 'zoro@anon.com', 'Voter ID', 'voterid.jpg', '31055432412', '31044234243', '210344242', NULL, NULL);

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
-- Indexes for table `all_pincode_bd`
--
ALTER TABLE `all_pincode_bd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_logs`
--
ALTER TABLE `orders_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_filters`
--
ALTER TABLE `products_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `all_pincode_bd`
--
ALTER TABLE `all_pincode_bd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders_logs`
--
ALTER TABLE `orders_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `products_filters`
--
ALTER TABLE `products_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

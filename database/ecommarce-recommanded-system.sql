-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 01:04 PM
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
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
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
(1, 'admin', 'superadmin', 1, '01558947938', 'admin@anon.com', '$2y$10$1IYwHMurZZCh84Xml42KbOiAO6TQ.gsg4WVanDUbDMAW8Np.P3lj6', '39399.jpg', 1, NULL, NULL, '2023-03-08 02:12:39'),
(2, 'shafiul', 'vendor', 2, '01558947938', 'shafiuladmin@anon.com', '$2y$10$1IYwHMurZZCh84Xml42KbOiAO6TQ.gsg4WVanDUbDMAW8Np.P3lj6', '6776.png', 0, NULL, NULL, '2023-03-26 12:14:43'),
(3, 'shafiul ', 'vendor', 3, '01558947938', 'shafiul@admin.com', '$2y$10$9EvvIVJaZjisQmer8EpjPeHmys.ljo5A46JmBeR4umjNH84m76qzG', NULL, 1, NULL, NULL, NULL),
(7, 'Shafiul islam', 'vendor', 17, '01777063242', 'shafiuljony12@gmail.com', '$2y$10$Db/Ir/ZCY9Q.ddbeh6T/9Ov6TaykINkTnAAwxSmEWKHCDOK/5emhK', '96316.JPG', 0, 'Yes', '2023-03-26 06:03:18', '2023-03-26 00:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `type`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, '76150.jpg', 'Slider', 'tranding-glasses', 'Tranding Glasses', 'Tranding Glasses', 1, NULL, '2023-02-17 22:54:41'),
(2, '16021.jpg', 'Slider', 'tops', 'Tops', 'Tops', 1, NULL, '2023-02-17 22:55:05'),
(3, '1383.jpg', 'Slider', 'women-tops', 'tops', 'Women Tops', 1, '2023-02-17 22:55:52', '2023-02-17 22:55:52'),
(4, '62674.jpg', 'Fix', 'spring-special-offer', 'spring-special-collection', 'Spring special collection', 1, '2023-02-17 22:57:20', '2023-02-17 22:57:20'),
(5, '80420.jpg', 'Fix', 'spring-special-offer', 'spring-special-collection', 'Spring special collection', 1, '2023-02-17 22:58:46', '2023-02-17 22:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
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
(8, 'Lenovo', 1, '2023-02-17 08:18:30', '2023-02-17 08:18:30'),
(9, 'Cats Eye', 1, '2023-02-17 08:18:37', '2023-02-17 08:18:37'),
(10, 'One Plus', 1, '2023-02-17 08:18:45', '2023-02-17 08:18:45'),
(11, 'Tommy', 1, '2023-02-22 06:35:14', '2023-02-22 06:35:14'),
(12, 'Polo', 1, '2023-02-22 06:35:32', '2023-02-22 06:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_discount` double(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 'Desktop', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'desktop', NULL, NULL, NULL, 1, NULL, '2023-02-17 08:13:18'),
(2, 0, 2, 'Laptop', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'laptop', NULL, NULL, NULL, 1, NULL, '2023-02-17 08:13:35'),
(3, 0, 2, 'Mobile', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'mobile', NULL, NULL, NULL, 1, NULL, '2023-02-17 08:13:54'),
(4, 0, 1, 'Men', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'men', NULL, NULL, NULL, 1, '2023-02-17 08:12:01', '2023-02-17 08:12:01'),
(5, 0, 1, 'Women', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'women', NULL, NULL, NULL, 1, '2023-02-17 08:12:22', '2023-02-17 08:12:22'),
(6, 0, 1, 'Kids', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'kids', NULL, NULL, NULL, 1, '2023-02-17 08:12:53', '2023-02-17 08:12:53'),
(7, 0, 4, 'Vegetable', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'vegetable', NULL, NULL, NULL, 1, '2023-02-17 08:15:35', '2023-02-17 08:15:35'),
(8, 0, 4, 'Fish', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'fish', NULL, NULL, NULL, 1, '2023-02-17 08:16:02', '2023-02-17 08:16:02'),
(9, 0, 4, 'Meat', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content', 'meat', NULL, NULL, NULL, 1, '2023-02-17 08:16:46', '2023-02-17 08:16:46'),
(10, 0, 3, 'Air Conditioner', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'air-conditioner', NULL, NULL, NULL, 1, '2023-02-17 08:17:46', '2023-02-17 08:17:46'),
(11, 4, 1, 'T-Shirt', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 't-shirt', NULL, NULL, NULL, 1, '2023-02-17 08:23:03', '2023-02-17 08:23:03'),
(12, 6, 1, 'T-Shirt', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'kid-t-shirt', NULL, NULL, NULL, 1, '2023-02-17 08:23:45', '2023-02-17 08:23:45'),
(13, 5, 1, 'Tops', '', 0.00, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'tops', NULL, NULL, NULL, 1, '2023-02-17 08:24:12', '2023-02-17 08:24:12'),
(14, 4, 1, 'Shirt', '', 0.00, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'shirt', NULL, NULL, NULL, 1, '2023-02-18 00:06:49', '2023-02-18 00:06:49'),
(15, 3, 2, 'smartphone', '', 0.00, NULL, 'smart-phone', NULL, NULL, NULL, 1, '2023-02-21 12:47:40', '2023-02-21 12:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, NULL, NULL),
(2, 'AL', 'Albania', 1, NULL, NULL),
(3, 'DZ', 'Algeria', 1, NULL, NULL),
(4, 'DS', 'American Samoa', 1, NULL, NULL),
(5, 'AD', 'Andorra', 1, NULL, NULL),
(6, 'AO', 'Angola', 1, NULL, NULL),
(7, 'AI', 'Anguilla', 1, NULL, NULL),
(8, 'AQ', 'Antarctica', 1, NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', 1, NULL, NULL),
(10, 'AR', 'Argentina', 1, NULL, NULL),
(11, 'AM', 'Armenia', 1, NULL, NULL),
(12, 'AW', 'Aruba', 1, NULL, NULL),
(13, 'AU', 'Australia', 1, NULL, NULL),
(14, 'AT', 'Austria', 1, NULL, NULL),
(15, 'AZ', 'Azerbaijan', 1, NULL, NULL),
(16, 'BS', 'Bahamas', 1, NULL, NULL),
(17, 'BH', 'Bahrain', 1, NULL, NULL),
(18, 'BD', 'Bangladesh', 1, NULL, NULL),
(19, 'BB', 'Barbados', 1, NULL, NULL),
(20, 'BY', 'Belarus', 1, NULL, NULL),
(21, 'BE', 'Belgium', 1, NULL, NULL),
(22, 'BZ', 'Belize', 1, NULL, NULL),
(23, 'BJ', 'Benin', 1, NULL, NULL),
(24, 'BM', 'Bermuda', 1, NULL, NULL),
(25, 'BT', 'Bhutan', 1, NULL, NULL),
(26, 'BO', 'Bolivia', 1, NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', 1, NULL, NULL),
(28, 'BW', 'Botswana', 1, NULL, NULL),
(29, 'BV', 'Bouvet Island', 1, NULL, NULL),
(30, 'BR', 'Brazil', 1, NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', 1, NULL, NULL),
(32, 'BN', 'Brunei Darussalam', 1, NULL, NULL),
(33, 'BG', 'Bulgaria', 1, NULL, NULL),
(34, 'BF', 'Burkina Faso', 1, NULL, NULL),
(35, 'BI', 'Burundi', 1, NULL, NULL),
(36, 'KH', 'Cambodia', 1, NULL, NULL),
(37, 'CM', 'Cameroon', 1, NULL, NULL),
(38, 'CA', 'Canada', 1, NULL, NULL),
(39, 'CV', 'Cape Verde', 1, NULL, NULL),
(40, 'KY', 'Cayman Islands', 1, NULL, NULL),
(41, 'CF', 'Central African Republic', 1, NULL, NULL),
(42, 'TD', 'Chad', 1, NULL, NULL),
(43, 'CL', 'Chile', 1, NULL, NULL),
(44, 'CN', 'China', 1, NULL, NULL),
(45, 'CX', 'Christmas Island', 1, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', 1, NULL, NULL),
(47, 'CO', 'Colombia', 1, NULL, NULL),
(48, 'KM', 'Comoros', 1, NULL, NULL),
(49, 'CD', 'Democratic Republic of the Congo', 1, NULL, NULL),
(50, 'CG', 'Republic of Congo', 1, NULL, NULL),
(51, 'CK', 'Cook Islands', 1, NULL, NULL),
(52, 'CR', 'Costa Rica', 1, NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', 1, NULL, NULL),
(54, 'CU', 'Cuba', 1, NULL, NULL),
(55, 'CY', 'Cyprus', 1, NULL, NULL),
(56, 'CZ', 'Czech Republic', 1, NULL, NULL),
(57, 'DK', 'Denmark', 1, NULL, NULL),
(58, 'DJ', 'Djibouti', 1, NULL, NULL),
(59, 'DM', 'Dominica', 1, NULL, NULL),
(60, 'DO', 'Dominican Republic', 1, NULL, NULL),
(61, 'TP', 'East Timor', 1, NULL, NULL),
(62, 'EC', 'Ecuador', 1, NULL, NULL),
(63, 'EG', 'Egypt', 1, NULL, NULL),
(64, 'SV', 'El Salvador', 1, NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', 1, NULL, NULL),
(66, 'ER', 'Eritrea', 1, NULL, NULL),
(67, 'EE', 'Estonia', 1, NULL, NULL),
(68, 'ET', 'Ethiopia', 1, NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, NULL, NULL),
(70, 'FO', 'Faroe Islands', 1, NULL, NULL),
(71, 'FJ', 'Fiji', 1, NULL, NULL),
(72, 'FI', 'Finland', 1, NULL, NULL),
(73, 'FR', 'France', 1, NULL, NULL),
(74, 'FX', 'France, Metropolitan', 1, NULL, NULL),
(75, 'GF', 'French Guiana', 1, NULL, NULL),
(76, 'PF', 'French Polynesia', 1, NULL, NULL),
(77, 'TF', 'French Southern Territories', 1, NULL, NULL),
(78, 'GA', 'Gabon', 1, NULL, NULL),
(79, 'GM', 'Gambia', 1, NULL, NULL),
(80, 'GE', 'Georgia', 1, NULL, NULL),
(81, 'DE', 'Germany', 1, NULL, NULL),
(82, 'GH', 'Ghana', 1, NULL, NULL),
(83, 'GI', 'Gibraltar', 1, NULL, NULL),
(84, 'GK', 'Guernsey', 1, NULL, NULL),
(85, 'GR', 'Greece', 1, NULL, NULL),
(86, 'GL', 'Greenland', 1, NULL, NULL),
(87, 'GD', 'Grenada', 1, NULL, NULL),
(88, 'GP', 'Guadeloupe', 1, NULL, NULL),
(89, 'GU', 'Guam', 1, NULL, NULL),
(90, 'GT', 'Guatemala', 1, NULL, NULL),
(91, 'GN', 'Guinea', 1, NULL, NULL),
(92, 'GW', 'Guinea-Bissau', 1, NULL, NULL),
(93, 'GY', 'Guyana', 1, NULL, NULL),
(94, 'HT', 'Haiti', 1, NULL, NULL),
(95, 'HM', 'Heard and Mc Donald Islands', 1, NULL, NULL),
(96, 'HN', 'Honduras', 1, NULL, NULL),
(97, 'HK', 'Hong Kong', 1, NULL, NULL),
(98, 'HU', 'Hungary', 1, NULL, NULL),
(99, 'IS', 'Iceland', 1, NULL, NULL),
(100, 'IN', 'India', 1, NULL, NULL),
(101, 'IM', 'Isle of Man', 1, NULL, NULL),
(102, 'ID', 'Indonesia', 1, NULL, NULL),
(103, 'IR', 'Iran (Islamic Republic of)', 1, NULL, NULL),
(104, 'IQ', 'Iraq', 1, NULL, NULL),
(105, 'IE', 'Ireland', 1, NULL, NULL),
(106, 'IL', 'Israel', 1, NULL, NULL),
(107, 'IT', 'Italy', 1, NULL, NULL),
(108, 'CI', 'Ivory Coast', 1, NULL, NULL),
(109, 'JE', 'Jersey', 1, NULL, NULL),
(110, 'JM', 'Jamaica', 1, NULL, NULL),
(111, 'JP', 'Japan', 1, NULL, NULL),
(112, 'JO', 'Jordan', 1, NULL, NULL),
(113, 'KZ', 'Kazakhstan', 1, NULL, NULL),
(114, 'KE', 'Kenya', 1, NULL, NULL),
(115, 'KI', 'Kiribati', 1, NULL, NULL),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, NULL, NULL),
(117, 'KR', 'Korea, Republic of', 1, NULL, NULL),
(118, 'XK', 'Kosovo', 1, NULL, NULL),
(119, 'KW', 'Kuwait', 1, NULL, NULL),
(120, 'KG', 'Kyrgyzstan', 1, NULL, NULL),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, NULL, NULL),
(122, 'LV', 'Latvia', 1, NULL, NULL),
(123, 'LB', 'Lebanon', 1, NULL, NULL),
(124, 'LS', 'Lesotho', 1, NULL, NULL),
(125, 'LR', 'Liberia', 1, NULL, NULL),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, NULL, NULL),
(127, 'LI', 'Liechtenstein', 1, NULL, NULL),
(128, 'LT', 'Lithuania', 1, NULL, NULL),
(129, 'LU', 'Luxembourg', 1, NULL, NULL),
(130, 'MO', 'Macau', 1, NULL, NULL),
(131, 'MK', 'North Macedonia', 1, NULL, NULL),
(132, 'MG', 'Madagascar', 1, NULL, NULL),
(133, 'MW', 'Malawi', 1, NULL, NULL),
(134, 'MY', 'Malaysia', 1, NULL, NULL),
(135, 'MV', 'Maldives', 1, NULL, NULL),
(136, 'ML', 'Mali', 1, NULL, NULL),
(137, 'MT', 'Malta', 1, NULL, NULL),
(138, 'MH', 'Marshall Islands', 1, NULL, NULL),
(139, 'MQ', 'Martinique', 1, NULL, NULL),
(140, 'MR', 'Mauritania', 1, NULL, NULL),
(141, 'MU', 'Mauritius', 1, NULL, NULL),
(142, 'TY', 'Mayotte', 1, NULL, NULL),
(143, 'MX', 'Mexico', 1, NULL, NULL),
(144, 'FM', 'Micronesia, Federated States of', 1, NULL, NULL),
(145, 'MD', 'Moldova, Republic of', 1, NULL, NULL),
(146, 'MC', 'Monaco', 1, NULL, NULL),
(147, 'MN', 'Mongolia', 1, NULL, NULL),
(148, 'ME', 'Montenegro', 1, NULL, NULL),
(149, 'MS', 'Montserrat', 1, NULL, NULL),
(150, 'MA', 'Morocco', 1, NULL, NULL),
(151, 'MZ', 'Mozambique', 1, NULL, NULL),
(152, 'MM', 'Myanmar', 1, NULL, NULL),
(153, 'NA', 'Namibia', 1, NULL, NULL),
(154, 'NR', 'Nauru', 1, NULL, NULL),
(155, 'NP', 'Nepal', 1, NULL, NULL),
(156, 'NL', 'Netherlands', 1, NULL, NULL),
(157, 'AN', 'Netherlands Antilles', 1, NULL, NULL),
(158, 'NC', 'New Caledonia', 1, NULL, NULL),
(159, 'NZ', 'New Zealand', 1, NULL, NULL),
(160, 'NI', 'Nicaragua', 1, NULL, NULL),
(161, 'NE', 'Niger', 1, NULL, NULL),
(162, 'NG', 'Nigeria', 1, NULL, NULL),
(163, 'NU', 'Niue', 1, NULL, NULL),
(164, 'NF', 'Norfolk Island', 1, NULL, NULL),
(165, 'MP', 'Northern Mariana Islands', 1, NULL, NULL),
(166, 'NO', 'Norway', 1, NULL, NULL),
(167, 'OM', 'Oman', 1, NULL, NULL),
(168, 'PK', 'Pakistan', 1, NULL, NULL),
(169, 'PW', 'Palau', 1, NULL, NULL),
(170, 'PS', 'Palestine', 1, NULL, NULL),
(171, 'PA', 'Panama', 1, NULL, NULL),
(172, 'PG', 'Papua New Guinea', 1, NULL, NULL),
(173, 'PY', 'Paraguay', 1, NULL, NULL),
(174, 'PE', 'Peru', 1, NULL, NULL),
(175, 'PH', 'Philippines', 1, NULL, NULL),
(176, 'PN', 'Pitcairn', 1, NULL, NULL),
(177, 'PL', 'Poland', 1, NULL, NULL),
(178, 'PT', 'Portugal', 1, NULL, NULL),
(179, 'PR', 'Puerto Rico', 1, NULL, NULL),
(180, 'QA', 'Qatar', 1, NULL, NULL),
(181, 'RE', 'Reunion', 1, NULL, NULL),
(182, 'RO', 'Romania', 1, NULL, NULL),
(183, 'RU', 'Russian Federation', 1, NULL, NULL),
(184, 'RW', 'Rwanda', 1, NULL, NULL),
(185, 'KN', 'Saint Kitts and Nevis', 1, NULL, NULL),
(186, 'LC', 'Saint Lucia', 1, NULL, NULL),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, NULL, NULL),
(188, 'WS', 'Samoa', 1, NULL, NULL),
(189, 'SM', 'San Marino', 1, NULL, NULL),
(190, 'ST', 'Sao Tome and Principe', 1, NULL, NULL),
(191, 'SA', 'Saudi Arabia', 1, NULL, NULL),
(192, 'SN', 'Senegal', 1, NULL, NULL),
(193, 'RS', 'Serbia', 1, NULL, NULL),
(194, 'SC', 'Seychelles', 1, NULL, NULL),
(195, 'SL', 'Sierra Leone', 1, NULL, NULL),
(196, 'SG', 'Singapore', 1, NULL, NULL),
(197, 'SK', 'Slovakia', 1, NULL, NULL),
(198, 'SI', 'Slovenia', 1, NULL, NULL),
(199, 'SB', 'Solomon Islands', 1, NULL, NULL),
(200, 'SO', 'Somalia', 1, NULL, NULL),
(201, 'ZA', 'South Africa', 1, NULL, NULL),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, NULL, NULL),
(203, 'SS', 'South Sudan', 1, NULL, NULL),
(204, 'ES', 'Spain', 1, NULL, NULL),
(205, 'LK', 'Sri Lanka', 1, NULL, NULL),
(206, 'SH', 'St. Helena', 1, NULL, NULL),
(207, 'PM', 'St. Pierre and Miquelon', 1, NULL, NULL),
(208, 'SD', 'Sudan', 1, NULL, NULL),
(209, 'SR', 'Suriname', 1, NULL, NULL),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, NULL, NULL),
(211, 'SZ', 'Eswatini', 1, NULL, NULL),
(212, 'SE', 'Sweden', 1, NULL, NULL),
(213, 'CH', 'Switzerland', 1, NULL, NULL),
(214, 'SY', 'Syrian Arab Republic', 1, NULL, NULL),
(215, 'TW', 'Taiwan', 1, NULL, NULL),
(216, 'TJ', 'Tajikistan', 1, NULL, NULL),
(217, 'TZ', 'Tanzania, United Republic of', 1, NULL, NULL),
(218, 'TH', 'Thailand', 1, NULL, NULL),
(219, 'TG', 'Togo', 1, NULL, NULL),
(220, 'TK', 'Tokelau', 1, NULL, NULL),
(221, 'TO', 'Tonga', 1, NULL, NULL),
(222, 'TT', 'Trinidad and Tobago', 1, NULL, NULL),
(223, 'TN', 'Tunisia', 1, NULL, NULL),
(224, 'TR', 'Turkey', 1, NULL, NULL),
(225, 'TM', 'Turkmenistan', 1, NULL, NULL),
(226, 'TC', 'Turks and Caicos Islands', 1, NULL, NULL),
(227, 'TV', 'Tuvalu', 1, NULL, NULL),
(228, 'UG', 'Uganda', 1, NULL, NULL),
(229, 'UA', 'Ukraine', 1, NULL, NULL),
(230, 'AE', 'United Arab Emirates', 1, NULL, NULL),
(231, 'GB', 'United Kingdom', 1, NULL, NULL),
(232, 'US', 'United States', 1, NULL, NULL),
(233, 'UM', 'United States minor outlying islands', 1, NULL, NULL),
(234, 'UY', 'Uruguay', 1, NULL, NULL),
(235, 'UZ', 'Uzbekistan', 1, NULL, NULL),
(236, 'VU', 'Vanuatu', 1, NULL, NULL),
(237, 'VA', 'Vatican City State', 1, NULL, NULL),
(238, 'VE', 'Venezuela', 1, NULL, NULL),
(239, 'VN', 'Vietnam', 1, NULL, NULL),
(240, 'VG', 'Virgin Islands (British)', 1, NULL, NULL),
(241, 'VI', 'Virgin Islands (U.S.)', 1, NULL, NULL),
(242, 'WF', 'Wallis and Futuna Islands', 1, NULL, NULL),
(243, 'EH', 'Western Sahara', 1, NULL, NULL),
(244, 'YE', 'Yemen', 1, NULL, NULL),
(245, 'ZM', 'Zambia', 1, NULL, NULL),
(246, 'ZW', 'Zimbabwe', 1, NULL, NULL);

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
(10, '2023_01_26_182535_create_categories_table', 1),
(11, '2023_01_30_080838_create_brands_table', 1),
(12, '2023_01_30_134523_create_products_table', 1),
(13, '2023_02_02_081023_create_products_attributes_table', 1),
(14, '2023_02_03_175039_create_products_images_table', 1),
(15, '2023_02_05_054519_create_banners_table', 1),
(16, '2023_02_06_132359_update_banners_table', 1),
(17, '2023_02_07_070242_update_products_table', 1),
(18, '2023_02_15_145920_create_products_filters_table', 1),
(19, '2023_02_15_163136_create_products_filters_values_table', 1),
(20, '2023_03_26_071010_create_recently_viewed_products_table', 2),
(21, '2023_03_26_092551_add_group_code_to_products', 3),
(22, '2023_03_26_093025_add_group_code_to_products', 4),
(23, '2023_03_26_095259_add_group_code_to_products', 5),
(24, '2023_03_26_100122_add_group_code_to_products', 6),
(25, '2023_03_26_103258_create_carts_table', 7);

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
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_type` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_price` double(8,2) DEFAULT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `product_weight` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `screen_size` varchar(255) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `occasion` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `fit` varchar(255) DEFAULT NULL,
  `sleeve` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') NOT NULL,
  `is_bestseller` enum('No','Yes') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `vendor_id`, `admin_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_image`, `product_video`, `group_code`, `description`, `screen_size`, `operating_system`, `occasion`, `ram`, `fit`, `sleeve`, `pattern`, `fabric`, `meta_title`, `meta_keywords`, `meta_description`, `is_featured`, `is_bestseller`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 15, 4, 1, 0, 'vendor', 'Samsung Galaxy M33', 'SGM33', 'Blue', 36000.00, 10.00, 500, '78673.png', '18261.mp4', NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'Up to 3.9 in', 'Android', NULL, '4 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, NULL, '2023-03-23 23:23:28'),
(2, 1, 11, 1, 0, 1, 'superadmin', 'Richman Basic Full Sleeve T-shirt', 'RMBFSTS', 'white', 1600.00, 20.00, 200, '68814.jpg', '', NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', NULL, NULL, NULL, NULL, 'Slim Fit', 'full sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'Yes', 'Yes', 1, NULL, '2023-02-17 23:41:01'),
(3, 1, 11, 3, 0, 1, 'superadmin', 'mens-r-neck-t-shirt', 'RMMRNTS', 'Brown', 1318.00, 5.00, 100, '15636.jpg', NULL, NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', NULL, NULL, NULL, NULL, 'Slim Fit', 'half sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'No', 'Yes', 1, '2023-02-17 08:27:11', '2023-02-22 06:36:12'),
(4, 1, 13, 2, 0, 1, 'superadmin', 'Women Tops', 'WT01', 'Pink', 1200.00, 10.00, 200, '50486.jpg', NULL, NULL, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', NULL, NULL, NULL, NULL, 'Slim Fit', 'half sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-02-17 08:31:43', '2023-03-24 04:25:26'),
(5, 2, 15, 10, 0, 1, 'superadmin', 'OnePlus Nord N20 5G', 'ON20', 'Brown', 18990.00, 10.00, 500, '74164.jpg', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et elit vitae nunc egestas porttitor in in mauris. In quis tellus ut tortor eleifend faucibus. Integer dapibus ligula ac orci consequat cursus', 'Up to 3.9 in', 'Android', NULL, '4 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-02-17 13:17:48', '2023-02-21 12:48:58'),
(6, 1, 11, 2, 0, 1, 'superadmin', 'Men’s Solid Polo Shirt', 'AUARK', 'Brown', 1200.00, 20.00, 200, '20395.jpeg', NULL, NULL, 'lorfem', NULL, NULL, NULL, NULL, 'Slim Fit', 'half sleeve', 'solid', 'polyester', NULL, NULL, NULL, 'Yes', 'No', 1, '2023-02-17 23:43:07', '2023-02-22 05:47:33'),
(7, 1, 14, 1, 0, 1, 'superadmin', 'Men’s Solid Polo Shirt', 'MSPT002', 'Merun', 2700.00, 0.00, 200, '56903.jpg', NULL, NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', NULL, NULL, NULL, NULL, 'Slim Fit', 'full sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'No', 'Yes', 1, '2023-02-18 00:09:12', '2023-02-18 00:20:29'),
(8, 1, 14, 1, 0, 1, 'superadmin', 'Men’s Blue Color Slim-Fit shirt', 'MBCSFS', 'Blue', 2432.00, 20.00, 200, '98523.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', 'full sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'No', 'Yes', 1, '2023-02-22 06:00:06', '2023-02-22 06:00:06'),
(10, 2, 3, 5, 0, 1, 'superadmin', 'Note 12 Pro', 'MIRN12P', 'Blue', 28000.00, 5.00, 500, '70046.jpg', NULL, NULL, 'Lorem', 'Up to 4.4 in', 'Android', NULL, '8 GB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'Yes', 1, '2023-03-24 05:13:52', '2023-03-24 05:13:52'),
(11, 1, 11, 1, 0, 1, 'superadmin', 'Jacket', 'TVP', 'Red', 1200.00, 5.00, 200, '4835.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Slim Fit', 'full sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'Yes', 'No', 1, NULL, '2023-03-25 07:24:46'),
(13, 1, 11, 12, 0, 1, 'superadmin', 'Red T-Shirt', 'RTSP', 'red', 800.00, 0.00, 200, '81890.jpg', NULL, '101', 'lorem', NULL, NULL, NULL, NULL, 'Slim Fit', 'half sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'Yes', 'No', 1, '2023-03-26 02:59:46', '2023-03-26 04:02:59'),
(14, 1, 11, 12, 0, 1, 'superadmin', 'Blue T-Shirt', 'BTSP', 'Blue', 800.00, 0.00, 200, '30929.jpg', NULL, '101', NULL, NULL, NULL, NULL, NULL, 'Slim Fit', 'half sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'No', 'No', 1, '2023-03-26 03:01:09', '2023-03-26 04:03:16'),
(15, 1, 11, 12, 0, 1, 'superadmin', 'Green T-Shirt', 'GTSP', 'green', 800.00, 0.00, 200, '89452.jpg', NULL, '101', NULL, NULL, NULL, NULL, NULL, 'Slim Fit', 'half sleeve', 'solid', 'cotton', NULL, NULL, NULL, 'No', 'No', 1, '2023-03-26 03:02:12', '2023-03-26 04:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Small', 1200.00, 10, 'RMMRNTS-S', 0, NULL, '2023-03-24 00:51:31'),
(2, 6, 'Medium', 1200.00, 20, 'RMMRNTS-M', 1, NULL, '2023-03-24 00:51:31'),
(3, 6, 'Large', 1400.00, 10, 'RMMRNTS-L', 1, NULL, '2023-03-24 00:51:31'),
(4, 5, '64GB-4GB', 17990.00, 10, 'ONN205G', 1, '2023-02-21 12:34:33', '2023-02-21 12:34:33'),
(5, 5, '128GB-6GB', 18990.00, 10, 'ONN205GRM6', 1, '2023-02-21 12:34:33', '2023-02-21 12:34:33'),
(6, 1, '64GB-4GB', 33000.00, 100, 'SGM33', 1, '2023-02-21 12:57:55', '2023-02-21 12:57:55'),
(7, 7, 'Large', 2700.00, 20, 'MSPT002', 1, '2023-02-22 01:02:52', '2023-02-22 01:02:52'),
(8, 2, 'Large', 1600.00, 10, 'RMBFSTS-L', 1, '2023-02-22 01:05:34', '2023-02-22 01:05:34'),
(9, 2, 'Medium', 1600.00, 10, 'RMBFSTS-M', 1, '2023-02-22 01:05:34', '2023-02-22 01:05:34'),
(10, 2, 'Small', 1500.00, 5, 'RMBFSTS-S', 1, '2023-02-22 01:05:34', '2023-02-22 01:05:34'),
(11, 13, 'Small', 800.00, 10, 'RTSP-S', 1, '2023-03-26 07:40:04', '2023-03-26 08:09:24'),
(12, 13, 'Medium', 850.00, 10, 'RTSP-M', 1, '2023-03-26 07:40:04', '2023-03-26 08:09:24'),
(13, 13, 'Large', 900.00, 1, 'RTSP-L', 1, '2023-03-26 07:40:04', '2023-03-26 08:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters`
--

CREATE TABLE `products_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_ids` varchar(255) NOT NULL,
  `filter_name` varchar(255) NOT NULL,
  `filter_column` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters`
--

INSERT INTO `products_filters` (`id`, `cat_ids`, `filter_name`, `filter_column`, `status`, `created_at`, `updated_at`) VALUES
(1, '4,11,14,5,13,6,12', 'Fabric', 'fabric', 1, '2023-02-17 08:32:36', '2023-02-18 00:14:14'),
(2, '4,11,14,5,13,6,12', 'Patterns', 'pattern', 1, '2023-02-17 08:32:56', '2023-02-18 00:15:38'),
(3, '4,11,14,5,13,6,12', 'Sleeve', 'sleeve', 1, '2023-02-17 08:33:11', '2023-02-18 00:16:28'),
(4, '4,11,14,5,13,6,12', 'Fit', 'fit', 1, '2023-02-17 08:33:35', '2023-02-18 00:17:07'),
(5, '1,2,3', 'RAM', 'ram', 1, '2023-02-17 08:34:24', '2023-02-17 08:34:24'),
(6, '4,11,14,5,13,6,12', 'Occasion', 'occasion', 1, '2023-02-17 08:58:47', '2023-02-18 00:18:24'),
(7, '1,2,3', 'Operating System', 'operating_system', 1, '2023-02-17 08:59:16', '2023-02-17 08:59:16'),
(8, '3', 'Screen Size', 'screen_size', 1, '2023-02-17 11:38:38', '2023-02-17 11:49:26'),
(9, '1,2', 'Screen Size', 'screen_size', 1, '2023-02-17 11:50:09', '2023-02-17 11:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters_values`
--

CREATE TABLE `products_filters_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filter_id` int(11) NOT NULL,
  `filter_value` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters_values`
--

INSERT INTO `products_filters_values` (`id`, `filter_id`, `filter_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'cotton', 1, '2023-02-17 08:55:30', '2023-02-17 08:55:30'),
(2, 1, 'polyester', 1, '2023-02-17 08:55:41', '2023-02-17 08:55:41'),
(3, 5, '8 GB', 1, '2023-02-17 08:55:53', '2023-02-17 08:55:53'),
(4, 5, '4 GB', 1, '2023-02-17 08:56:02', '2023-02-17 08:56:02'),
(5, 2, 'solid', 1, '2023-02-17 08:56:42', '2023-02-17 08:56:42'),
(6, 4, 'Slim Fit', 1, '2023-02-17 08:57:03', '2023-02-17 08:57:03'),
(7, 3, 'full sleeve', 1, '2023-02-17 08:57:13', '2023-02-17 08:57:13'),
(8, 7, 'Windows', 1, '2023-02-17 08:59:43', '2023-02-17 08:59:43'),
(9, 7, 'Android', 1, '2023-02-17 08:59:58', '2023-02-17 08:59:58'),
(10, 7, 'Ios', 1, '2023-02-17 09:00:12', '2023-02-17 09:00:12'),
(11, 8, 'Up to 3.9 in', 1, '2023-02-17 11:41:35', '2023-02-17 11:41:35'),
(12, 8, 'Up to 4.4 in', 1, '2023-02-17 11:41:53', '2023-02-17 11:41:53'),
(13, 8, 'Up to 13.9 in', 1, '2023-02-17 11:42:21', '2023-02-17 11:42:21'),
(14, 8, '14.0 to 17.9 in', 1, '2023-02-17 11:42:46', '2023-02-17 11:42:46'),
(15, 8, '18.0 to 21.9 in', 1, '2023-02-17 11:43:09', '2023-02-17 11:43:09'),
(16, 3, 'full sleeve', 1, '2023-02-17 11:52:26', '2023-02-17 11:52:26'),
(17, 3, 'half sleeve', 1, '2023-02-17 11:52:51', '2023-02-17 11:52:51'),
(18, 3, 'short sleeve', 1, '2023-02-17 11:53:20', '2023-02-17 11:53:20'),
(19, 6, 'Eid Collection', 1, '2023-03-26 03:08:30', '2023-03-26 03:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'richmantshirt.jpg93040.jpg', 1, '2023-03-08 02:14:03', '2023-03-08 02:14:03'),
(2, 2, 'richmantshirt.jpg19827.jpg', 1, '2023-03-08 02:14:15', '2023-03-08 02:14:15');

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
(4, 3, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(5, 7, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(6, 2, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(7, 13, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(8, 11, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(9, 15, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(10, 14, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(11, 6, 'ec88e4dd82b74acd28cd04b0e01ef2b7', NULL, NULL),
(12, 13, '0c01b0d1be08990b3d07bf8a8284f513', NULL, NULL),
(13, 6, '0c01b0d1be08990b3d07bf8a8284f513', NULL, NULL),
(14, 13, '54022de5e1d68817757d358b76996781', NULL, NULL),
(15, 14, '54022de5e1d68817757d358b76996781', NULL, NULL),
(16, 6, '54022de5e1d68817757d358b76996781', NULL, NULL),
(17, 14, 'ec66307b6e098c364153a54a45da8868', NULL, NULL),
(18, 15, 'ec66307b6e098c364153a54a45da8868', NULL, NULL),
(19, 13, 'ec66307b6e098c364153a54a45da8868', NULL, NULL),
(20, 7, 'ec66307b6e098c364153a54a45da8868', NULL, NULL),
(21, 8, 'ec66307b6e098c364153a54a45da8868', NULL, NULL),
(22, 2, 'ec66307b6e098c364153a54a45da8868', NULL, NULL),
(23, 6, 'ec66307b6e098c364153a54a45da8868', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
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
(4, 'Groceries', 1, '2023-02-17 08:11:33', '2023-02-17 08:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
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
(2, 'shafiul', 'boddarhat-112', 'chattogram', 'chattogram', 'Bangladesh', '4002', '01558947938', 'sowrab@admin.com', 1, NULL, NULL, '2023-03-25 23:50:46'),
(3, 'Sadek', NULL, NULL, NULL, NULL, NULL, '01838451672', 'sadekul@gmail.com', 0, 'Yes', '2023-02-17 05:57:46', '2023-02-16 23:58:04'),
(4, 'John', NULL, NULL, NULL, NULL, NULL, '01834567656', 'john@gmail.com', 0, 'Yes', '2023-02-17 06:01:23', '2023-02-17 00:01:51'),
(5, 'SADEKUL ISLAM', NULL, NULL, NULL, NULL, NULL, '01764206820', 'sadekulislam443@gmail.com', 0, NULL, '2023-03-21 14:12:49', '2023-03-21 14:12:49'),
(10, 'Jane', NULL, NULL, NULL, NULL, NULL, '01838451671', 'jane@gmail.com', 0, NULL, '2023-03-24 10:05:49', '2023-03-24 10:05:49'),
(11, 'Kate', NULL, NULL, NULL, NULL, NULL, '01923849283', 'kate@gmail.com', 0, NULL, '2023-03-24 12:54:43', '2023-03-24 12:54:43'),
(12, 'Czar', NULL, NULL, NULL, NULL, NULL, '01923848392', 'czar@gmail.com', 0, NULL, '2023-03-24 12:59:30', '2023-03-24 12:59:30'),
(13, 'Czar', NULL, NULL, NULL, NULL, NULL, '01934039402', 'czar@mail.com', 0, 'Yes', '2023-03-24 15:09:59', '2023-03-24 09:10:48'),
(14, 'Malik', NULL, NULL, NULL, NULL, NULL, '01838451667', 'malik@gmail.com', 0, 'Yes', '2023-03-25 17:44:46', '2023-03-25 11:45:37'),
(15, 'Jony', NULL, NULL, NULL, NULL, NULL, '019475673388', 'jony@gmail.com', 0, 'Yes', '2023-03-25 17:50:21', '2023-03-25 11:50:49'),
(17, 'Shafiul islam', NULL, NULL, NULL, NULL, NULL, '01777063242', 'shafiuljony12@gmail.com', 0, 'Yes', '2023-03-26 06:03:18', '2023-03-26 00:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_details`
--

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
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
(2, 2, 'sawrab Electronics store', '127217865', 'Al-arafa_islami-Bank', NULL, '1221231', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors_business_details`
--

CREATE TABLE `vendors_business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `shop_city` varchar(255) NOT NULL,
  `shop_state` varchar(255) NOT NULL,
  `shop_country` varchar(255) NOT NULL,
  `shop_pincode` varchar(255) NOT NULL,
  `shop_mobile` varchar(255) NOT NULL,
  `shop_website` varchar(255) NOT NULL,
  `shop_email` varchar(255) NOT NULL,
  `address_proof` varchar(255) NOT NULL,
  `address_proof_image` varchar(255) NOT NULL,
  `business_license_number` varchar(255) NOT NULL,
  `gst_number` varchar(255) NOT NULL,
  `pan_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_business_details`
--

INSERT INTO `vendors_business_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_website`, `shop_email`, `address_proof`, `address_proof_image`, `business_license_number`, `gst_number`, `pan_number`, `created_at`, `updated_at`) VALUES
(2, 2, 'sawrab Electronics store', 'boddarHat cda-124', 'Chattogram', 'chattogram', 'Bangladesh', '4001', '01558947938', 'examplesw.in', 'sowrab@admin.com', 'Voter ID', 'voterid.jpg', '3255432412', '3244234243', '23344242', NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_filters`
--
ALTER TABLE `products_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendors_bank_details`
--
ALTER TABLE `vendors_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors_business_details`
--
ALTER TABLE `vendors_business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

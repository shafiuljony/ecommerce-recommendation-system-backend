-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:32 PM
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
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shafiul Islam', 'superadmin', 0, '01558947938', 'admin@eduadmin.com', '$2y$10$WTchRn8DRzFgENmBLNHr2.3wkNPMlEMbAILK0ihE3ffRJesz4Cwxu', '97282.JPG', 1, NULL, '2023-01-26 10:01:16'),
(2, 'Sadekul Islam', 'vendor', 1, '01839673550', 'sadeq@admin.com', '$2a$12$I59aps/86B/mZgYaZXGuOe6UL5BxSG73XSpxr6bLO/RymkCOjnW.C', '3968.jpg', 1, NULL, '2023-01-26 09:58:06'),
(3, 'Sowrab Hasan', 'vendor', 2, '01611769787', 'sowrab@admin.com', '$2a$12$I59aps/86B/mZgYaZXGuOe6UL5BxSG73XSpxr6bLO/RymkCOjnW.C', '38253.JPG', 1, NULL, '2023-01-26 09:51:28');

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
(1, 'Rich Man', 1, NULL, '2023-01-30 03:26:30'),
(2, 'Shoilpik', 1, NULL, NULL),
(3, 'Pret A Porter', 1, NULL, NULL),
(4, 'Samsung', 1, NULL, '2023-01-30 07:26:46'),
(5, 'MI', 0, NULL, '2023-01-30 08:52:51'),
(7, 'HP', 1, NULL, '2023-01-30 03:28:11'),
(8, 'LG', 1, '2023-01-30 07:28:18', '2023-01-30 07:28:40'),
(9, 'One Plus', 1, '2023-02-01 02:12:17', '2023-02-01 02:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_discount` float NOT NULL DEFAULT 0,
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
(1, 0, 1, 'Desktop', '', 0, '', 'computer', '', '', '', 1, NULL, '2023-01-27 00:22:10'),
(2, 0, 1, 'Laptop', '', 0, '', 'laptop', '', '', '', 0, NULL, '2023-01-27 00:23:03'),
(3, 0, 1, 'Mobile', '13368.jpg', 0, NULL, 'mobile', NULL, NULL, NULL, 1, NULL, '2023-01-30 01:28:08'),
(4, 0, 2, 'Men', '', 10, 'men', 'men', 'men', 'men', 'men', 1, '2023-01-29 02:23:23', '2023-01-29 05:56:02'),
(5, 0, 2, 'Women', '', 10, 'women', 'women', 'women', 'women', 'women', 0, '2023-01-29 02:26:37', '2023-01-29 12:07:03'),
(6, 0, 2, 'Kids', '', 10, 'kids', 'kids', 'kids', 'kids', 'kids', 1, '2023-01-29 02:30:35', '2023-01-29 02:30:35'),
(7, 3, 1, 'smartphone', '', 10, NULL, 'smart phone', 'smart phone', 'smart phone', 'smart phone', 1, '2023-01-29 05:32:43', '2023-01-30 01:36:06'),
(9, 4, 2, 'T-Shirt', '', 10, '', 'tshirt', NULL, NULL, NULL, 1, '2023-01-29 12:40:54', '2023-01-29 12:40:54'),
(11, 4, 2, 'Formal Shirt', '', 0, NULL, 'formal_shirt', NULL, NULL, NULL, 1, '2023-02-01 02:25:31', '2023-02-01 02:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2022_12_19_143127_create_vendors_table', 2),
(6, '2022_12_19_144222_create_admins_table', 3),
(7, '2023_01_12_062924_create_vendors_business_details_table', 4),
(8, '2023_01_12_063915_create_vendors_bank_details', 5),
(9, '2023_01_24_180531_create_sections_table', 6),
(10, '2023_01_26_182535_create_categories_table', 7),
(11, '2023_01_30_080838_create_brands_table', 8),
(12, '2023_01_30_134523_create_products_table', 9),
(13, '2023_02_02_081023_create_products_attributes_table', 10);

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
  `admin_id` int(11) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_discount` varchar(255) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `section_id`, `category_id`, `brand_id`, `vendor_id`, `admin_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_image`, `product_video`, `description`, `meta_title`, `meta_keywords`, `meta_description`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 4, 0, 1, 'superadmin', 'Samsung Galaxy M33', 'SM-M336B', 'Blue', '36000', '10', '500', '49277.png', '8465.mp4', 'Samsung Galaxy M33', 'Samsung Galaxy M33', 'Samsung Galaxy M33', 'Samsung Galaxy M33', 'Yes', 1, NULL, '2023-02-02 01:31:31'),
(2, 2, 6, 2, 0, 1, 'superadmin', 'Apparel-Unicorn-Are-Real', 'AUARK', 'NavyBlue', '800', '20', '100', '15618.jpg', '', 'Apparel-Unicorn-Are-Real', 'Apparel-Unicorn-Are-Real', 'Apparel-Unicorn-Are-Real', 'Apparel-Unicorn-Are-Real', 'No', 1, NULL, '2023-02-02 01:22:01'),
(3, 2, 9, 2, 0, 1, 'superadmin', 'T-shirt Cotton', 'TSC001', 'Black', '1200', '10', '150', NULL, NULL, NULL, NULL, NULL, NULL, 'No', 1, '2023-02-01 02:11:14', '2023-02-01 02:11:14'),
(4, 1, 7, 9, 0, 1, 'superadmin', 'OnePlus Nord N20 5G', 'ON20', 'Blue', '18990', '0', '500', NULL, NULL, NULL, NULL, NULL, NULL, 'No', 1, '2023-02-01 02:18:20', '2023-02-01 10:12:13'),
(5, 2, 11, 1, 0, 1, 'superadmin', 'Formal', 'RMF01', 'white', '1880', '8', '200', NULL, NULL, NULL, NULL, NULL, NULL, 'No', 1, '2023-02-01 02:27:00', '2023-02-01 10:12:14'),
(6, 2, 9, 1, 0, 1, 'superadmin', 'mens-r-neck-t-shirt', 'RMMRNTS', 'white', '1318', '40', '100', '76961.jpg', '44467.mp4', NULL, NULL, NULL, NULL, 'No', 1, '2023-02-01 09:52:18', '2023-02-01 10:12:15'),
(7, 1, 1, 8, 0, 1, 'superadmin', 'LG Teases 3', 'LG 48GQ900', 'black', '90000', '10', '3000', '21400.jpg', NULL, 'New Gaming Monitors Including a 48-Inch 4K OLED Display', 'New Gaming Monitors Including a 48-Inch 4K OLED Display', 'New Gaming Monitors Including a 48-Inch 4K OLED Display', 'New Gaming Monitors Including a 48-Inch 4K OLED Display', 'No', 1, '2023-02-02 01:43:52', '2023-02-02 01:43:52');

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
(1, 6, 'Small', 800.00, 10, 'RMMRNTS-S', 1, '2023-02-02 12:34:38', '2023-02-02 12:34:38'),
(2, 6, 'Medium', 900.00, 10, 'RMMRNTS-M', 1, '2023-02-02 12:34:38', '2023-02-02 12:34:38'),
(3, 6, 'Large', 1000.00, 10, 'RMMRNTS-L', 1, '2023-02-02 12:34:38', '2023-02-02 12:34:38'),
(5, 6, 'XL', 1100.00, 5, 'RMMRNTS-XL', 1, '2023-02-02 12:55:42', '2023-02-02 12:55:42');

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
(1, 'Electronics', 1, '0000-00-00 00:00:00', '2023-01-27 00:12:44'),
(2, 'Clothing', 1, '2023-01-25 07:29:40', '2023-01-27 00:12:43'),
(3, 'Appliances', 1, '2023-01-25 07:29:40', '2023-01-27 00:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shafiul islam', 'shafiuljony12@gmail.com', NULL, '$2y$10$7GQVwJ.B.Az2yMA889EsNejg5etDgqOHpofUiRdeVlHMF9kV4yB/G', NULL, '2022-12-18 15:32:57', '2022-12-18 15:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sadekul Islam', 'rattarpol', 'chattogram', 'chattogram', 'Bangladesh', '4005', '01839673550', 'sadeq@admin.com', 0, NULL, '2023-01-26 09:58:06'),
(2, 'Sowrab Hasan', '14 No. Gareg , Boddarhut', 'chattogram', 'chattogram', 'Bangladesh', '4002', '01611769787', 'sowrab@admin.com', 1, NULL, '2023-01-26 09:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_bank_details`
--

CREATE TABLE `vendors_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors_bank_details`
--

INSERT INTO `vendors_bank_details` (`id`, `vendor_id`, `account_holder_name`, `bank_name`, `account_number`, `bank_ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'MSI Electronics LTD', 'Al-Arafah Islami Bank', '112131287856309', '321213', NULL, '2023-01-17 07:27:37'),
(2, 2, 'Sowrab Electronics Store', 'CIty Bank Bangladesh LTD Bhabir Bank', '127217865', '1221231', NULL, '2023-02-01 02:50:35');

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
(1, 1, 'MSI Electronics LTD', 'rattarpol cda-120', 'Chittagong', 'chittagong', 'Bangladesh', '4005', '01839673550', 'msiltd.com.bd', 'sadeq@admin.com', 'Tread lisence', '60935.jpg', '325543241', '324423424', '2334424', NULL, '2023-01-26 09:59:21'),
(2, 2, 'Sowrab Electronics Store', 'boddarhut cda-124', 'Chattogram', 'chattogram', 'Bangladesh', '4002', '01611769787', 'sawrabdada.bd', 'sowrab@admin.com', 'Tread lisence', '75672.jpg', '3255432412', '3244234243', '23344242', NULL, '2023-02-01 02:44:08');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

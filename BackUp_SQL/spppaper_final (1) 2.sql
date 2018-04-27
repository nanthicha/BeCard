-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2018 at 07:02 PM
-- Server version: 5.5.31
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spppaper_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE `affiliates` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `username`, `assigned_to`, `added_on`) VALUES
(3, 'sun_vsp', 'poom', '2018-04-12 14:19:01'),
(2, 'stamp', 'kwanchanok', '2018-04-12 14:13:03'),
(4, 'sun_vsp', 'qeqeq', '2018-04-12 14:17:57'),
(7, 'stamp', 'charee', '2018-04-12 14:27:14'),
(8, 'kwanchanok', 'testing', '2018-04-12 15:26:06'),
(9, 'stamp', 'wow', '2018-04-12 15:28:59'),
(12, 'stamp', 'testerter', '2018-04-12 15:30:16'),
(13, 'stamp', 'kwan', '2018-04-12 15:32:10'),
(14, 'stamp', 'yoyo', '2018-04-14 16:07:35'),
(15, 'stamp', 'spppaper', '2018-04-14 17:00:58'),
(16, 'stamp', 'oooo', '2018-04-14 17:02:25'),
(31, 'qmacejkovic', 'ppppo', '2018-04-14 17:23:13'),
(30, 'qmacejkovic', 'ppppo', '2018-04-14 17:21:59'),
(29, 'qmacejkovic', 'qmacejkovics', '2018-04-14 17:21:10'),
(23, 'qmacejkovic', 'superadmin', '2018-04-14 17:11:52'),
(24, 'qmacejkovic', 'sssss', '2018-04-14 17:12:50'),
(25, 'qmacejkovic', 'oioi', '2018-04-14 17:14:40'),
(32, 'lucious.stamm', 'padthai', '2018-04-18 09:40:15'),
(33, 'lucious.stamm', 'padthai', '2018-04-18 09:40:59'),
(34, 'lucious.stamm', 'padthai', '2018-04-18 09:41:23'),
(35, 'lucious.stamm', 'tomyumkung', '2018-04-18 09:41:57'),
(36, 'bnk48', 'b5810450440', '2018-04-24 08:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `beCard_Setting`
--

CREATE TABLE `beCard_Setting` (
  `siteName` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beCard_Setting`
--

INSERT INTO `beCard_Setting` (`siteName`) VALUES
('BeCard สะสมแต้ม');

-- --------------------------------------------------------

--
-- Table structure for table `bepoint_logs`
--

CREATE TABLE `bepoint_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bepoint` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bepoint_logs`
--

INSERT INTO `bepoint_logs` (`id`, `username`, `msg`, `bepoint`, `type`, `balance`, `added_on`) VALUES
(14, 'stamp', 'Testing System BePoint', 1, 0, 203, '2018-04-14 16:48:27'),
(13, 'stamp', 'Testing System BePoint', 1, 0, 202, '2018-04-14 16:48:03'),
(12, 'stamp', 'Testing System BePoint', 1, 0, 201, '2018-04-14 16:48:00'),
(19, 'stamp', 'Testing System BePoint', 1, 0, 208, '2018-04-14 17:00:58'),
(20, 'stamp', 'Invited to $username for register.', 50, 0, 258, '2018-04-14 17:40:47'),
(15, 'stamp', 'Testing System BePoint', 1, 0, 204, '2018-04-14 16:48:28'),
(16, 'stamp', 'Testing System BePoint', 1, 0, 205, '2018-04-14 16:48:32'),
(17, 'stamp', 'Testing System BePoint', 1, 0, 206, '2018-04-14 16:48:32'),
(18, 'stamp', 'Testing System BePoint', 1, 0, 207, '2018-04-14 16:48:33'),
(21, 'qmacejkovic', 'Invited to superadmin for register.', 50, 0, 50, '2018-04-14 17:07:53'),
(22, 'qmacejkovic', 'Invited to {superadmin} for register.', 50, 0, 100, '2018-04-14 17:10:01'),
(23, 'qmacejkovic', 'Invited to for register.', 50, 0, 150, '2018-04-14 17:10:19'),
(26, 'ppppo', 'Register from qmacejkovic invite.', 100, 0, 100, '2018-04-14 17:23:13'),
(25, 'qmacejkovic', 'Invited to qmacejkovics for register.', 50, 0, 250, '2018-04-14 17:21:10'),
(27, 'lucious.stamm', 'Invited to padthai for register.', 50, 0, 50, '2018-04-18 09:40:15'),
(28, 'lucious.stamm', 'Invited to padthai for register.', 50, 0, 100, '2018-04-18 09:40:59'),
(29, 'padthai', 'Register from lucious.stamm invite.', 100, 0, 100, '2018-04-18 09:40:59'),
(30, 'lucious.stamm', 'Invited to padthai for register.', 50, 0, 150, '2018-04-18 09:41:23'),
(31, 'lucious.stamm', 'Invited to tomyumkung for register.', 50, 0, 200, '2018-04-18 09:41:57'),
(32, 'tomyumkung', 'Register from lucious.stamm invite.', 100, 0, 100, '2018-04-18 09:41:57'),
(33, 'bnk48', 'Invited to b5810450440 for register.', 50, 0, 50, '2018-04-24 08:40:14'),
(34, 'b5810450440', 'Register from bnk48 invite.', 100, 0, 100, '2018-04-24 08:40:14'),
(35, 'stamp', 'Register new card :Starbuck Thailand 2018 Member Card', 10, 0, 268, '2018-04-24 17:09:44'),
(36, 'stamp', 'Register new card :Starbuck Thailand 2018 Member Card', 10, 0, 278, '2018-04-24 17:10:39'),
(37, 'stamp', 'Register new card :Starbuck Gold Member Card', 10, 0, 288, '2018-04-24 17:12:05'),
(38, 'bnk48', 'Register new card :Starbuck Gold Member Card', 10, 0, 60, '2018-04-27 10:32:56'),
(39, 'sun1', 'Register new card :Starbuck Gold Member Card', 10, 0, 10, '2018-04-27 10:33:36'),
(40, 'sun1', 'Register new card :Starbucks Amazing Member Card', 10, 0, 20, '2018-04-27 10:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `username`, `shop_id`, `name`, `phone`, `latlng`, `created_at`, `updated_at`) VALUES
(1, 'sun_vsp', '1', 'Black Dragon', '0812345678', '13.7563,100.5018', '2018-04-23 15:44:55', '2018-04-23 15:44:55'),
(2, 'stamp', '5', 'Kasetsart University', '029823145', '13.844216600360262,100.56918781929016', '2018-04-23 16:53:23', '2018-04-23 16:53:23'),
(3, 'sun_vsp', '1', 'ซันเอง', '0852224434', '13.758009052415312,100.50892394714356', '2018-04-25 08:21:02', '2018-04-25 08:21:02'),
(4, 'sun_vsp', '1', 'Punch', '0811111111', '13.6758619,100.58760219999999', '2018-04-26 05:20:19', '2018-04-26 05:20:19'),
(5, 'stamp', '6', 'Zpell Rangsit', '024583942', '13.9888135,100.61747500000001', '2018-04-26 14:53:08', '2018-04-26 14:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `cashiers`
--

CREATE TABLE `cashiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashiers`
--

INSERT INTO `cashiers` (`id`, `shop_id`, `name`, `phone`, `email`, `username`, `password`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'min', '0812345678', 'min@hotmial.com', 'minny', 'dQB1e6uyde', '1', '2018-04-23 16:04:23', '2018-04-23 16:04:23'),
(2, '1', 'boom', '0822233321', 'boom@hotmail.com', 'boommy', '98BEhB2TUY', '3', '2018-04-26 04:38:29', '2018-04-26 04:38:29'),
(3, '1', 'nut', '0811111111', 'nut@hotmail.com', 'nutty', 'cu8aHQfKpn', '1', '2018-04-26 04:39:13', '2018-04-26 04:39:13'),
(4, '6', 'kasetsart', '0904433433', 'ks@starbuck.com', 'kaset', 'i4o42lNDxg', '2', '2018-04-26 14:53:48', '2018-04-26 14:53:48'),
(5, '6', 'Zpell Cashier', '0804548444', 'zpell@starbuck.co.th', 'zpell', 'e2ahd4LMGb', '5', '2018-04-26 16:05:36', '2018-04-26 16:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `membercards`
--

CREATE TABLE `membercards` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageBG` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorHex1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#118cf1',
  `colorHex2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#5eb8fa',
  `bahtperpoint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keycard` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membercards`
--

INSERT INTO `membercards` (`id`, `username`, `shop_id`, `name`, `description`, `imageBG`, `colorHex1`, `colorHex2`, `bahtperpoint`, `created_at`, `updated_at`, `keycard`) VALUES
(1, 'bnk48', '4', 'BNK48 Official Senpai Member Card', 'BNK48 Official Senpai Member Card', 'T3CsAELFaS_1524660429.png', '#f792f7', '#ff67f2', '100', '2018-04-24 07:26:37', '2018-04-25 12:59:42', 'T3CsAELFaS'),
(3, 'stamp', '6', 'Starbuck Gold Member Card', 'Starbuck Gold Member Card : Giving a Starbucks Card is more than a thoughtful gesture. It’s also an invitation to My Starbucks Rewards™ Simply registering a Starbucks Card puts you on the path to earning rewards all year long. Now you can Reload your Card on web.', '6_1524574747.png', '#E1D6AE', '#619849', '50', '2018-04-24 12:59:07', NULL, 'NhTPcO5L0p'),
(5, 'kwan', '5', 'BeCard Member Card', 'BeCard Member Card', '5_1524661458.png', '#118cf1	', '#5eb8fa', '25', '2018-04-25 13:04:18', NULL, 'QrzGWwpzg7'),
(6, 'kfc', '8', 'KFC Thailand Member Card', 'KFC Thailand Member Card : Joining the Greggs Rewards scheme means you\'re in line for free hot drinks, treats and surprises every time you visit the popular bakery chain.', '8_1524662081.png', '#A92D34', '#A92D34', '100', '2018-04-25 13:14:41', NULL, 'HNjlSgSrXv'),
(7, 'stamp', '6', 'Starbucks Amazing Member Card', 'Starbucks Amazing Member Card is a special member card only on BeCard and only customer to purchese more 3000THB i one day', '6_1524824461.png', '#68412b', '#54311d', '25', '2018-04-27 10:21:01', NULL, 'i3EKWgp51o');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 5),
(24, '2014_10_12_100000_create_password_resets_table', 5),
(5, '2018_04_11_091558_add_gender_and_bod_to_user', 3),
(7, '2018_04_11_101835_add_private_key_to_user', 4),
(25, '2018_04_10_221323_add_image', 5),
(28, '2018_04_12_142548_create_user_logs_table', 6),
(29, '2018_04_12_201344_add_bepoint_to_users', 7),
(30, '2018_04_12_204523_create_affiliates_table', 8),
(32, '2018_04_13_151753_create_vochers_table', 9),
(35, '2018_04_14_231450_create_bepoint__logs_table', 10),
(36, '2018_04_16_144927_add_field_users_table', 11),
(37, '2018_04_18_193611_create_shops_table', 12),
(38, '2018_04_18_210638_create_shops_table', 13),
(39, '2018_04_18_222946_add_status_to_shops_table', 14),
(40, '2018_04_23_092014_create_branchs_table', 15),
(41, '2018_04_23_092100_create_cashiers_table', 15),
(42, '2018_04_23_172716_add_field_shops_table', 15),
(43, '2018_04_23_102014_create_branchs_table', 16),
(44, '2018_04_23_180035_add_field_shops_table', 17),
(45, '2018_04_23_221340_create_branches_table', 18),
(46, '2018_04_23_225933_create_cashiers_table', 19),
(47, '2018_04_23_230233_create_cashiers_table', 20),
(48, '2018_04_24_123950_create_membercards_table', 21),
(49, '2018_04_24_234029_create_user_cards_table', 22),
(50, '2018_04_26_141544_create_promotions_table', 23),
(51, '2018_04_27_185851_create_redeems_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('suphavich.c@gmail.com', '$2y$10$HZo.Zd5Tlhw/oPbgHRzfeO2BtoZBNCu5Sfo4CKSyENEkK4q1eiWYa', '2018-04-24 04:12:07'),
('chamamas.k@ku.th', '$2y$10$pJfUgh4b2QF3S4JE.n3i5ejYN1OE6iePh4X7EMQw7rPse0//0qRQK', '2018-04-27 11:58:08'),
('satta.c@ku.th', '$2y$10$r7NqsT01AxPmuYyradAHmeN.r7nV/efxhPrgNUKS9OBNOeLiugf7G', '2018-04-27 12:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeems`
--

CREATE TABLE `redeems` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `referance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgCover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defaultCover.png',
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('beauty','clothes','drink','food','jewellery','service') COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` enum('sliver','gold') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `description`, `username`, `logo`, `imgCover`, `time`, `type`, `latlng`, `package`, `created_at`, `updated_at`, `status`, `phone`, `url`, `email`) VALUES
(1, 'Black Dragon', 'ร้านค้าลึกลับ', 'sun_vsp', 'bnk48_1524063366.jpg', 'defaultCover.png', '10:08,21:08', 'service', '12.9182259,100.78026239999997', 'gold', '2018-04-18 06:51:24', '2018-04-18 06:51:24', 'on', '0812345678', 'black-dragon', 'black_dragon@hotmail.com'),
(4, 'BNK48 Cafe Official Store', 'BNK48 Cafe Official Store', 'bnk48', 'bnk48_1524063366.jpg', 'defaultCover.png', '8:00,20:00', 'service', '13.7325602,100.56954280000002', 'gold', '2018-04-18 14:58:24', '2018-04-18 14:59:24', 'on', '0248848484', 'bnk48', 'bnk48@bnk48.com'),
(5, 'BeCard', 'BeCard inc', 'kwan', 'stamp_1524067506.png', 'defaultCover.png', '00:00,12:00', 'service', '13.7563,100.5018', 'gold', '2018-04-18 16:05:06', '2018-04-18 16:05:06', 'on', '1113', 'becard', 'becard@becard.club'),
(6, 'Starbuck', 'Starbuck cofee', 'stamp', 'stamp_1524068326.png', 'defaultCover.png', '07:00,23:00', 'drink', '13.988873623382743,100.61696869068146', 'gold', '2018-04-18 16:18:46', '2018-04-18 16:18:46', 'off', '029872222', 'starbucks', 'contact@starbucks.co.th'),
(8, 'KFC Thailand inc.', 'KFC, until 1991 known as Kentucky Fried Chicken, is an American fast food restaurant chain that specializes in fried chicken.', 'kfc', 'kfc_1524661987.png', 'defaultCover.png', '07:00,22:00', 'food', '13.757092001451564,100.51660579376221', 'gold', '2018-04-25 13:13:07', '2018-04-25 13:13:07', 'off', '1150', 'kfc', 'kfc@kfc.co.th'),
(9, 'cavokii', 'selling all things.', 'cavikii', 'default.jpg', 'defaultCover.png', '14:22,14:35', 'beauty', '13.757613053576378,100.4974226348877', 'sliver', '2018-04-27 08:23:08', '2018-04-27 08:23:08', 'off', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_key` text COLLATE utf8mb4_unicode_ci,
  `role` enum('User','Cashier','Entrepreneur','Admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('Female','Male','N/A') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `dob` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `bePoint` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `private_key`, `role`, `sex`, `dob`, `remember_token`, `created_at`, `updated_at`, `image`, `bePoint`, `phone`) VALUES
(1, 'sun_vsp', 'sun_vsp', 'vasupol.ch@ku.th', '$2y$10$GvPFgz/3hFa/XpNATaH5O.McltKli4TwcQWZ1NdBUpMHLSLbP2OLG', 'hnQd7saeSlPwZhombD98eNo9jj5UwfNZren4Fqp8', 'Admin', 'N/A', '2018-04-13 00:00:00', 'XpdKFv3tjVPJa12bsy8UzPUdLzRu6cXxJjbwJeYiGpjBfdhRGDtv22StYqyk', '2018-04-11 10:06:53', '2018-04-26 00:32:47', 'sunny_1524043953.jpg', 100, '0852224434'),
(2, 'stamp', 'stamp', 'suphavich.c@gmail.com', '$2y$10$DURe/PQSCKfT5iN.QhU3EejiIkBnvNrSldIFZ/uAqnqdpACrTGRaC', 'XxT5XpcGzmF9Q9J25yI1Mn5aPENchsAP5RphZ7eY', 'Admin', 'Male', '1996-08-15 00:00:00', 'xOlcnqJNOeIrkJk0rYjkEggxAZue4KRlo7IHTT1vpt1VJ6CSnlEaTotcztQ9', '2018-04-11 11:51:33', '2018-04-23 03:47:06', 'Suphavich_1524040118.jpg', 288, '191'),
(3, 'ss', 'ss', 's.s@hotmail.com', '$2y$10$GR30TP6259vQlnt6BIQiFuFMlXi1Av8pBSsYU13VomTpY254pXwPy', 'Ycx93UHbbgZWlnKnIVMb87TN8gGjadKpkW2VPDPF', 'User', 'N/A', NULL, 'r0v5gszPzqNZUeUJOG6H4EMhNwIBQAdZjjtQoQimA5TjYiSKGDWGQ5Vj6XrJ', '2018-04-11 12:05:21', '2018-04-11 12:05:21', 'default.png', 0, NULL),
(5, 'stamper', 'stamper', 'suphavich.c@ku.th', '$2y$10$Gt3CSWoLzgfIW1tobrMWnuC/Uo8X/owqFjqnJ.7w3Ca6C45b31cvm', 'kecIV5FmDvHsxzBegqpKW95MRUxGE9eTwM8rkxXC', 'Entrepreneur', 'Male', '1996-08-15 00:00:00', 'KYhpprwlE4LehPW4YcXNHnu9h8HJ82IlVull2LDYo8Hcyun5s6yk2Iin37ze', '2018-04-11 12:55:02', '2018-04-23 01:37:33', 'Suphavich Chanppittayanukoonkit_1523523239.png', 0, '0804548452'),
(4, 'a', 'a', 'a@hotmail.com', '$2y$10$s2RVEyu5YuIOLrMzSCTMJunJpEy0zYGw7UZUNQvI7rtJevTyE6zAe', 'eJkxo4lFP1m1PbmNbBWoA02bDkYTNcstJG01TBkm', 'Entrepreneur', 'N/A', NULL, NULL, '2018-04-11 12:37:59', '2018-04-11 12:37:59', 'default.png', 0, NULL),
(6, 'kfc', 'Kip Medhurst', 'jordy.wiza@example.org', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'zr8iD3sPF5n6cHcfaD7p4I7Wn0qfVwsWqSlJxGw7', 'Entrepreneur', 'Male', '1994-06-06 00:00:00', 'lkQMhnG2io', '2018-04-11 14:54:50', '2018-04-11 14:54:50', 'default.png', 0, NULL),
(7, 'lehner.priscilla', 'Travon Watsica', 'showell@example.org', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'kszC7aosxINjel8ExbSMp4BiatHiyJLlZOX6MHG6', 'User', 'Male', '1976-08-01 00:00:00', '6eF5xjdaZhR1SDu4Wj7YCdKD7P89ZQPQ5QPj7XwdyEdoYoEjs0BFNh3HwmkW', '2018-04-11 14:54:50', '2018-04-11 14:54:50', 'default.png', 0, NULL),
(8, 'qmacejkovic', 'Roberta Crooks', 'baumbach.geoffrey@example.com', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'CfZpO9WxlZqf3AtxPkc6uCeaYo7FbJ0RtOsBk3Ar', 'Cashier', 'Female', '1993-07-29 00:00:00', 'l6Uz0knOvYpun2qS16Q0RXoJO85m9MgNPJgWRHrUK63zYSbKp0rValzEwH3R', '2018-04-11 14:54:50', '2018-04-11 14:54:50', 'Roberta Crooks_1523462232.png', 300, NULL),
(9, 'breitenberg.alycia', 'Abigayle Sawayn', 'claudia12@example.org', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'an45sY010z6aoy6ayfDqD4rnPxgRBVP9K4RWudb6', 'Entrepreneur', 'Female', '2004-10-30 00:00:00', 'eEF9fxWfRw3F6zB3mc8IbV0821Tn3UwjHBNAqgLATStoh9sG6dx6UX4IWkJF', '2018-04-11 14:56:30', '2018-04-11 14:56:30', 'Abigayle Sawayn_1523462372.png', 0, NULL),
(10, 'lucious.stamm', 'Uriah Murphy', 'sheaney@example.net', '$2y$10$G134qk40HO2lfujueitwNeS2fZrFKhAHejJgjAr/w1wv7Oe6nYIsa', 'XwbMTgYjpicNg47mjLsjGQArF1fTqWDsMcnCkcjx', 'User', 'Female', '1990-04-13 00:00:00', 'huJIAmgLtjYT29RcN8Otapo2atcNtOLrP3yjnPZl51iYsL6qXWAqNYXA15C1', '2018-04-11 14:56:30', '2018-04-11 14:56:30', 'default.png', 200, NULL),
(11, 'brooks.dubuque', 'Samir Smitham', 'bruce47@example.org', '$2y$10$MSUz4XBmxnAr7qE.cYLMveQbmXyx1q6kWEevQGkdopiFrxEqLCxFm', 'YPGjZyjHeMycJYhyksQWDpcL7UpTMB3RoSslSG69', 'Entrepreneur', 'Male', '2008-10-10 00:00:00', 'T3rTwNrajRGPiHWsSui1OfJojkeyKiF2PWeBSCZSKDykllp4RRYA5PpBDvVo', '2018-04-11 14:56:30', '2018-04-11 14:56:30', 'default.png', 0, NULL),
(12, 'camila.lubowitz', 'Ms. Sally Kautzer Sr.', 'dale83@example.net', '$2y$10$fJC2OE0CsgdbKSQQLo/pOuPGd1n5AXd/Lcq.SwSkCIah85fu364DW', 'Ly10Nh2xuLHIKupyULGxV1UkMJ02Ydg3pUGGiClS', 'Cashier', 'Male', '2004-09-15 00:00:00', 'A2VKyKsDOg5wbxFjclCuCsbG0SCjPisF3IGxWRfAZSknbys8M61W9wp760ya', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0, NULL),
(13, 'grady.antwan', 'Idell Langosh', 'rogers.satterfield@example.net', '$2y$10$9zuPvJjNQRzwOYDIe7t.le5oiDAixLZo..q9BcLRgXC4ul9U2dWMC', 'c9BWnCmj6PFPNtc2V98hUGV4Rfgo9qzqLrv1mZ7W', 'User', 'Female', '1993-05-18 00:00:00', 'ozBYco2aX5L9y52odOfDRMoQeZhmLLrUCvdLdDJyKbKIWypUDxeofihVWRIp', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0, NULL),
(14, 'justine.kilback', 'Aliyah Kiehn', 'grady.cristian@example.com', '$2y$10$wjRRhYfGIzCnY91zq2nRNOfhVTy2kw/qnfh1EqEoZ2ERnouGJ99gu', '1RzBCqNEqEguKM0Akf3R1LPPIKh3MS2raHGC5eyk', 'User', 'Male', '1978-07-03 00:00:00', 'tjQzAObqu653BErxHoHiqxiqHr2GI3yos2a3VCJCQ6WNDvtDPOAkRFhvvgrh', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0, NULL),
(15, 'kerluke.carolina', 'Mrs. Lillie Goyette', 'fadel.jennings@example.com', '$2y$10$fhparSI7Vv3BOx6mWQeF8u5g7Mg6uJHqo8XorXl2Oko3PruxZVk7q', '8PIznjbjtPJ24AlLuG3yCksemths4lE8nP53fcFr', 'Cashier', 'Male', '1996-06-09 00:00:00', 'qDngHXXFd9HRjIAz26jM5yXuRIiQRP8yApR7yxM84odFbYKzz2xYmLxPQzFC', '2018-04-11 14:57:53', '2018-04-12 09:00:08', 'Mrs. Lillie Goyette_1523523612.png', 0, NULL),
(16, 'will.ernie', 'Prof. Shany Gusikowski', 'claudine.cremin@example.net', '$2y$10$i9q/tlvb5LlILW.cNFKEvev32/VI.YjcdEMAwxeFuIZwUDNwSH18u', 'T1q5Aa9ZNvJr7Ce8y95a8fOvxFSlEy4sxA7VrQOR', 'User', 'Female', '1986-06-11 00:00:00', 'FrapgGEY5L4QLbCBs6PshifcEHPALG95dkR2tjEauOdauuN2tRrrqKsVtWxr', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0, NULL),
(17, 'neva76', 'Dr. Reed Will III', 'reed.konopelski@example.com', '$2y$10$H1tnBIIo2t/eIpWzBEaQ5.YTRaKx4B41O1tbmlda.edMlWWaF3IBq', '6omRZYyfucGWggAgd67R3zdUnWNj1f6TH71zVSaB', 'User', 'Male', '1971-01-31 00:00:00', 'BFqBVB5ZW6rOxnDKg3IU7G3AFCUHcevgzBCCrb5SgnQEl5tkLGOasS3Oo1nC', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(18, 'andres10', 'Janie Kerluke', 'bskiles@example.com', '$2y$10$Gok1EsvAVbV3izZjJRdrLOKnF.LgRYHE0vPOsg/GK2PWjuNw0Y6Na', 'pSt55MHiRn7BuWWuRihJmU2viW4v49yYfVrYCvWz', 'User', 'Female', '1978-04-15 00:00:00', 'cBnUOJZpCKj3WChbbSwQzcULFZc1p38icFapSCqhV5f6sXpewR2DZxtERDmH', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(19, 'xhuels', 'Kale Herman', 'kasey77@example.org', '$2y$10$eTp4Exko/rbwrXeQ4md1iOZQHx7cedEDRKqXIbZOE0I8UGQ7JMPAq', 'ZwYoRDff1c6bH9X1OddvwdaQdAjBdelT41dBJPT3', 'User', 'Male', '1992-12-14 00:00:00', 'c3uZmOy2TFBy2mETghqJlJLJ3QzXKChnGtbsGl3lAT55SYsDkgowWqAyqgnN', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(20, 'isabell92', 'Melba Ortiz', 'vreynolds@example.com', '$2y$10$X38ZYVOXO64OxBp4gAe0ae1zx41P46/V9zhZjpzPEZ3UNcPYliK.a', 'bu3LDbYkvh4MULdxuLJsybIy9Nlnh7XnPfa1BjFf', 'User', 'Female', '2010-10-21 00:00:00', 'AMO7A9olOkwKfwFuxtwrDF7Yvv4ClXJs3VheQZTNvptrfmmTEYdctAGiOAE3', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(21, 'jkrajcik', 'Mrs. Lacy Zboncak', 'robyn.douglas@example.com', '$2y$10$nBQREo6K5PlNDke2zbCiUOMknYJ2SxTyfwZzbMqjWRHuSueU/4yxS', 'iznznUzBZ4h84AnrE0oNxUtibnfRonSNwh00tIvy', 'User', 'Male', '1998-02-22 00:00:00', '3sm83xq0Gumvtco95Dq1FsDrPvnJOqCkF82F74Du7ExVh8n4NdNhoHup8GRH', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(22, 'shanelle15', 'Mrs. Camylle Ondricka', 'josefa.parisian@example.com', '$2y$10$fElUEc.KQ/Ms/3ncToWcm.bsoz3CjVYey5yAnRMS3DisDIVQWgQqa', '2mgzggVr5A0ou5KnuhDMdVFZU7wD21piBX1DEaZN', 'User', 'Male', '1970-05-14 00:00:00', 'iZ4K4jomUsjutqHOBI2AFp4qLHI9kaEZjloFahQjsatDR5nP1bCkA7gAJ0KL', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(23, 'hope.trantow', 'Eryn Williamson', 'daryl.runolfsson@example.net', '$2y$10$uHJG4ragoGKSyykwbNyPEuqE3o64lYj.RMnPeXZTCR9zXtZbxDpBe', 'VwXI23EeST5cGBTTKuUDQZj6TqrfJEF4YFQyOdS4', 'User', 'Female', '1991-07-15 00:00:00', 'M9d1g2bg5Se5A5Xy3r5i5WSqKvFexgfSEMXxmauppkISOBFDoPj3K5MAjI0F', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(24, 'oreichert', 'Orie Von', 'nprice@example.com', '$2y$10$jPIVzbAjqqJm.p.TVjT09u2CE9WfeLBJ5EIT/ZFwY9MwS5o9UN55y', 'L7tHGpw3tvsskPmCC1LGwFlZGmaWuZweTQYCpDl5', 'User', 'Female', '1972-03-09 00:00:00', 'vYwZL27TG47vaM9m9bg032xqPHz6VHUzIaWVUhDkSHX4C6lahwSA3oCeVzzC', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(25, 'ywalsh', 'Xander Cassin', 'bernhard.botsford@example.net', '$2y$10$VRW4fxeR8nJX9w3gSBetkOayZHvS3ZLX3UvjPNAVxhju2.XW3h332', 'hDznvPpVmFC3bSqOOsbUtKbWIt3oTKySA6UkjcFB', 'User', 'Female', '2003-05-19 00:00:00', '2St1ieuNiL3rnaSDD6FXlBAAtQkOpWnedO2VLGHZUKWRoCQhGlYZmujmaEr5', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(26, 'jaqueline.hamill', 'Alek Windler DVM', 'nicole.watsica@example.com', '$2y$10$xIrqjG0Tzm8Y1nPmqWAuo.oOHqRxwhnMJP0WWGorsQAJei5RpYnya', 'pIoYRxIYYUItYPLfwQ28XVWyd4gigIP2oGAUOxaK', 'User', 'Male', '1996-08-21 00:00:00', 'P78l50XHXoyhoAa9EsVTgNZrDu218s8oflva0V7JtHwCMfTri0QqaMdagrTQ', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(27, 'floy16', 'Drew Blanda', 'kylee15@example.net', '$2y$10$lnOQPxn.ThGLemPhWg6U0eoe4FQTRKCndfxyEbab1ztonZFKObiNW', 'Ed9vXegaGtMQuNrDNK18ZNOkc0Ujb7rRBHPNoyOF', 'User', 'Female', '1980-10-08 00:00:00', 'GQiwMEKTepq3q6xhBSGOX0DATKe7dvZLThgfi8aSFe78LTAz8g0ywysDbmhs', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(28, 'rowena76', 'Andre Ryan', 'ddonnelly@example.org', '$2y$10$B.QFCr89kO4EpfGdIr5usuQvH0GqjzrMf6I9ySNnyANOUWYoindu2', 'kww5eSgMPMhkjSzfYTf4O23Kis9ZjwHdvQUhrU9X', 'User', 'Male', '1996-11-27 00:00:00', 'UQDYEnEjsyIsAVDxGuWaFYfkorxmUUPzpImHW14jHpldAkik7fvM9rbfAxB3', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(29, 'aurelia52', 'Bianka Braun', 'mskiles@example.org', '$2y$10$nlygKrW.1gglyZVmmp8yc.YRqnKx37FHeM./gpSbAW7aZnDeREIsS', 'tMPwTxdAs7knbBjFAngkmdjCHwPBo5lxuDhuuOPB', 'User', 'Female', '1982-02-27 00:00:00', 'RMeaXX598ABA0rMPFLtioP4xikpVlnJLDluF6d6DMJUfXXax7l81rXJR83N3', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(30, 'ogusikowski', 'Javonte Bechtelar', 'nona.mcclure@example.net', '$2y$10$0d/K90NwBIKQ60RujIHtFe3CxFn5k/SrpAHpFxgdtmrdARQQo3dsi', 'n9eZ02sOFFkdWxZHSpoOzXsVJDJdd5MT9YwbCfqz', 'User', 'Female', '1982-09-18 00:00:00', 'tlRDRyc2JlWC8LamzQ430Pftx6jThGxAOFCebic5YGHzxsGCQL395gxrAZyx', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(31, 'ortiz.geo', 'Mohammed Parisian DVM', 'ford.torp@example.net', '$2y$10$fErbNTIztd4k.j9JgmlhleVeIx0BBxFGj2iDC4ohUABvIRiqwuJyi', 'XrLISpMT6wSS1pcfp2fTexewX9lu5LbhSUPnMI0S', 'User', 'Male', '1971-01-30 00:00:00', 'dRCCtK3uvn5PvYCcaAPWNe9c5M8qnHtrEukH0oX13wjCTYRzBIOOLZ3b6xkz', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(32, 'karine.schowalter', 'Salvador Dicki', 'cormier.devon@example.com', '$2y$10$qdM2ojs0jiZFsncEuBEVn.nDpW7qjOeB./5ZkJLMjfV7rl8kwVC.u', 'qKy4QZZHTLC3OVIbhtyfZNzxSgt1XHsxrFWQ6dZy', 'User', 'Male', '1988-02-26 00:00:00', 'sHvWpJSnlfv5B7muqidRyB8kQ0WrXGU07oW4ENGWNyOd5GgNYbtZGJoi7Pvt', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(33, 'harber.rahsaan', 'Glen Hammes PhD', 'lonny.ernser@example.net', '$2y$10$avTnkxsQrwKDoVumPOzoheuDi/CjkMdReBOHEkwi08nvcBA8Xe3ku', '81GFwMwlhRVxEb6RjePzBuW63pE4iB53zky1uvn7', 'User', 'Male', '2002-10-20 00:00:00', 'wSmbePSUyLAFBQqq2Sg3l7VQAnTPwL3ut0UtYEJH2JHybnW75kO4BarMoEge', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(34, 'vcarroll', 'Lyric Daniel', 'ncummerata@example.org', '$2y$10$8laK1LYv4cyGXSvhCVQQWeZTuRAG7kiWY4bTg1AhKwqjDvYGyEVwi', '4tfs14jE8fWskYcYCo859RCaHATEnpRw29OT0yBu', 'User', 'Male', '1994-04-15 00:00:00', 'RMg51sJBguISZvfYBkhLwkEMNxalM2liouW49DyS9T8kLg2bHUHz2vvQMysT', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(35, 'witting.eden', 'Pedro O\'Kon PhD', 'kling.dusty@example.org', '$2y$10$QJW0656N5lR9AsULaVhZhOygbrRfx8VzvHQZ6Zb8Vl4gtb6T8Kaea', 'TYelyVAIFdE6Xz5osIAbmXoV1KureQf1i98cVKV4', 'User', 'Male', '1977-12-20 00:00:00', 'BXrUMp2dte537nRDxbU5hsqNqG1Tu7IXzcryyr0E6tqJxyNqFrtYcPgyq0d8', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(36, 'erdman.brett', 'Prof. Chelsie Klocko', 'senger.darren@example.com', '$2y$10$hwNAKm3VGB0DXG/a3gyjn.qwcDGRS4/C8d3b9LyBXEILT0TQc7IL6', 'YoKl7GtVEKBn3LZTBXqqF2EyhhIGhMEb77CUD8Xn', 'User', 'Male', '1978-06-02 00:00:00', 'tTfs7LCTGNQIceNkA1I9h59FFgalpFRtVV2yxYd9RWirRZqCrGxowgpWEzmK', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(37, 'nadia.kozey', 'Lea Quitzon', 'fay.dangelo@example.net', '$2y$10$ddz4p9xuGDo3AEQPfw0Q9OC4E2ycW.x2JgB8GUXNEtspsOw4k3g4C', 'Vinfhqg7eECCe0RIFuCK5DWfwpqXXvMG52fWEn28', 'User', 'Male', '1979-03-12 00:00:00', 'ApX9p5BWTEsHcl6mjeXPRsX73FQfXAIkFoT2yIiZ71oExUOmZy8wQpVQhJlY', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(38, 'graham.nella', 'Dr. Nya Dare III', 'kristin.goodwin@example.net', '$2y$10$4S.drZvmZMPm4LN6G3zRWukNMNbH.abc/eG7.FI8aHyWJ0kzCQYHi', 'ECe64LHltEDjiyAvALrwuk5wycTh8k8uPu1su5Q3', 'User', 'Female', '1994-07-07 00:00:00', '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(39, 'johnny88', 'Ms. Katelin Bashirian', 'genoveva.emmerich@example.org', '$2y$10$lAGzogx7so//O.8omYYecOQEv8SnTv5bR/ftCUC4kuSRiGHpnYsKC', 'vRPEyJUjlMdsplkDAg7yw0fZnpWlYAKihxQ2eDyc', 'User', 'Female', '1995-09-19 00:00:00', 'dNgkNb37tHNNBYXv1tSYVKrcAAQv8ebjea0szOjHzTtFP245Je8wsG99uyL4', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(40, 'abernathy.colby', 'Kathryn Auer I', 'ljenkins@example.com', '$2y$10$vtHYKtXRuivDHQq6LNLT9.MkEa/fYUVdTrc.8Oyuf0TpcAvo2Op8S', 'iKpExriv1wlhovOBmKx8bYu82F6JZUHjTOzuP3ni', 'User', 'Male', '2006-03-10 00:00:00', 'iN2g2aEdNXB3sFrGeiyIFEaWH4ocB1TnFDYF003ytkEru9ST9mg76keRa7Mv', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(41, 'vicenta93', 'Freeda Roberts', 'nnader@example.org', '$2y$10$9PJIKM6PkWGqAFKH9uR2deMOyeSd7dh6n2Sqayl.tEJJG9FDxuFQa', 'dXhfSOKGPcoNuQvNPY1ehwxG9nMWpEq0uM7spHtz', 'Cashier', 'Male', '1977-10-09 00:00:00', 'fOij5NGagkI0UrUGXueP7Z5QWj0V2HUQzldjNWW4kMxVf0Y2ZSJ3lAALUFTc', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0, NULL),
(42, 'kwanchanok', 'Kwanchanok', 'kwanchanok.chanp@gmail.com', '$2y$10$eM9zvZcNMHLP2qdpbmYwaeSmRMmwaGDFf3kJLnkxnGEVrn4WfK6By', 'mPdqvWybK8jbQgUndKlsN8qfXZHaNNkDvYzwXiOj', 'User', 'N/A', NULL, 'Afe5OA7ijIXlKk9NNcLtdYSU4P7qiY1p9OMEjgip6uKu1zDiqbdFc07XOZKR', '2018-04-12 14:12:53', '2018-04-12 14:12:53', 'default.png', 50, NULL),
(43, 'poom', 'poom', 'poom@ku.ac.th', '$2y$10$k3j.FaKSRLtQXF/VYWLOge8bbMrYrIwxwMQrP1eKHC3UeTBsGMIxq', '78DIuwviGfq1Pic9vKzWzfurPbkQJ7LOktoIS3at', 'User', 'N/A', NULL, '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-12 14:14:07', '2018-04-12 14:14:07', 'default.png', 0, NULL),
(44, 'charee', 'ชารี', 'charee@eventhubs.com', '$2y$10$2jpsXzUcMEQrzYSXuqM2SO8dbiQh00QZ2/0zDioTO/5wIjT.DIlF6', 'WzTpTToMQs2f0ceJU8MznrUjVv1C9xwv6312MBTo', 'User', 'N/A', NULL, '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-12 14:27:04', '2018-04-12 14:27:04', 'default.png', 0, NULL),
(45, 'testing', 'testing', 'testing@localhost.com', '$2y$10$3yrAcZRzAktZpeaZcGoBIuINAZqlfiJvKq6txmftHgKkz9h8Z3PoK', '1vHEt3ty0F0awNKUlb9ddv6ei7hOcTCkwX0gq17v', 'User', 'N/A', NULL, '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-12 15:25:56', '2018-04-12 15:25:56', 'default.png', 100, NULL),
(46, 'wow', 'wowww', 'wow@gmail.com', '$2y$10$ZlUbXQ.qvMedqgtcwyvRc.zwAlwaaqWmjMoS8HzOB2UIORxQX3WAW', 'Muvq7gseE4LVuFLrtZbBkGvAm5hXQLplKr31KUEj', 'User', 'N/A', NULL, 'fOij5NGagkI0UrUGXueP7Z5QWj0V2HUQzldjNWW4kMxVf0Y2ZSJ3lAALUFTc', '2018-04-12 15:29:14', '2018-04-12 15:29:14', 'default.png', 100, NULL),
(47, 'testerter', 'remember_token', 'remember_token@gmail.com', '$2y$10$o6uvvrwCFd2E0dqKgrv2weJdzicDFfzHdUwWuFUwnIQN25ERVbH7.', 'K9Ove5SZkZWybgDcVyDcMFl83De1Clmic26BKPMZ', 'User', 'N/A', NULL, 'dNgkNb37tHNNBYXv1tSYVKrcAAQv8ebjea0szOjHzTtFP245Je8wsG99uyL4', '2018-04-12 15:30:06', '2018-04-12 15:30:06', 'default.png', 100, NULL),
(48, 'kwan', 'Kwanchanok', 'kwan@gmail.com', '$2y$10$j4FTbE7M8SwFSVuyk18hs.S1n36VApsj8pNv1yBe/aXmJS2d7JHhi', '38Z2l4WWkAYmobs93nIQjwXyNaNdrtiTL2hxGCo2', 'Entrepreneur', 'N/A', NULL, 'CPEiENzGcBFT9HcwXDgb88xWwLfXaVhW3cxwV12V4lnIn0VEcpIPhRT5Bk7t', '2018-04-12 15:32:00', '2018-04-12 15:32:00', 'default.png', 100, NULL),
(49, 'spppaper', 'Suphavich Chanppittayanukoonkit', 'suphavich.c@dada.com', '$2y$10$7QH7Id1FGjAwA6j.RKp6z.lJzLjNpOt2vexde7SR8qo7KZPXkxNeW', 'vbZ9iUb0vonjfMDdnakVZWZR0XB5kmiEVE4uDOvK', 'User', 'N/A', NULL, NULL, '2018-04-14 17:00:47', '2018-04-14 17:00:47', 'default.png', 100, NULL),
(50, 'oooo', 'oooo', 'oooo@gmail.com', '$2y$10$LQzywED6x4EfbsWs22wqYuNt2O7JnRJpDPmfnzXgeHBzOhk2vypcC', 'PfWexvrSiVjKZoPvra9Zgj0h3RRynoZPt1gXQyEJ', 'User', 'N/A', NULL, NULL, '2018-04-14 17:02:14', '2018-04-14 17:02:14', 'default.png', 100, NULL),
(51, 'superadmin', 'Admin', 'admin@ssss.com', '$2y$10$PXkJJvYcE8EoX0BjU3LPoOzFWcjhTrKc7VSV8C7LoHRiP0E4NlVxe', 's758l2bw4K8vuMXUX9VkZS8GpVHIxTkSICbSG5Oq', 'User', 'N/A', NULL, NULL, '2018-04-14 17:11:12', '2018-04-14 17:11:12', 'default.png', 0, NULL),
(52, 'sssss', 'ddd', 'asd@fmail.com', '$2y$10$z51oNtZCZ.k1vqEscLLH9u4.MCg9pIOugRgv.350U2f6cpllW9Pc6', '0mEabf8b1TUbVwdysgYQS6gcKYaRqtt0I22hDfik', 'User', 'N/A', NULL, NULL, '2018-04-14 17:12:38', '2018-04-14 17:12:38', 'default.png', 0, NULL),
(53, 'oioi', 'oioi', 'oioi@gmail.com', '$2y$10$hhAE5S.S/dTq9Zpohau88uyB.taXg1PaJnbiLvOP/DQIH6ERUEjXi', 'QN4x3eYEGG2L8BREjWxygki6eECUJ41tPJsNbLX6', 'User', 'N/A', NULL, NULL, '2018-04-14 17:14:28', '2018-04-14 17:14:28', 'default.png', 0, NULL),
(54, 'qmacejkovics', 'qmacejkovics', 'qmacejkovics@gmail.com', '$2y$10$3GUF0NABCAO8gHx3rfy6Q.3oKrjkuKRD7aBM27Q0XXqJ4r3PoDpby', 'fmtL79pp2QzTxgrzJyXAVk1kUT9C2zBYSv4sKyeF', 'User', 'N/A', NULL, NULL, '2018-04-14 17:20:59', '2018-04-14 17:20:59', 'default.png', 100, NULL),
(55, 'ppppo', 'ppppo', 'ppppo@gmail.com', '$2y$10$zbVW8j6lzKbtqz.49ALIDuJ40HEW.wvyRxKtdslxHe3Z8tNkeRc2.', 'sqwrKLwARbdElT8yd5KCwKeuqaT853zVny1wzxpA', 'User', 'N/A', NULL, NULL, '2018-04-14 17:23:02', '2018-04-14 17:23:02', 'default.png', 100, NULL),
(56, 'sun1', 'sunny', 'sunny@hotmail.com', '$2y$10$kqQUkAYMmylojEg8Mp78yOGLdHBhjgebGlWjSGT4CoIJchhUl4V2e', 'EVOuGKYSrW03eUSVsD1F2upw6QvA3EYcmC9LPz9p', 'User', 'N/A', NULL, 'mA2MICYdDbaoSfECnwyC7q4SFMMsrM57gqNhusl05D8DYmSc1p0VE7pBWhXK', '2018-04-16 03:38:13', '2018-04-16 03:38:13', 'sunny_1524043953.jpg', 20, '123456'),
(59, 'padthai', 'Padthai Jaichana', 'padthai@gmail.com', '$2y$10$3x9k4w4h3R88nvsZ1uX3u.Gr6X3QTag7jVa5ga43tUuXJmbEhhVjy', 'La7G3EFnIRNzmKftW9cUlMe7cFnn7pN5HxoPcGOz', 'User', 'N/A', NULL, NULL, '2018-04-18 09:40:45', '2018-04-18 09:40:45', 'default.png', 100, NULL),
(60, 'tomyumkung', 'Tomyumkung Aroi', 'padthaipadthai@gmail.com', '$2y$10$FwvvYwx1lUf0eGWRVFnvSek11/6Ygl0QQQephl2AbzsHcWpdv2d9y', 'TnJvpUuYGd5CHQD9KJe4H3nTOgZ5S5HDZHvUa0G5', 'User', 'N/A', NULL, NULL, '2018-04-18 09:41:43', '2018-04-18 09:41:43', 'default.png', 100, NULL),
(61, 'bnk48', 'BNK48 Official', 'bnk48@becard.com', '$2y$10$Sp/fAZSOaplf2fc7PtP5AuKF.I/UKfqc0VVXair4DurYIhzo1exdq', 'LiO9mkQZwpDHsn78maAJyAbNRMd9nDYJ18H9ROgo', 'Entrepreneur', 'N/A', NULL, 'tXzDI37BdYOaqd2mwkPXdT5D7xVMB3I3RQTxBhghTKobdAcHx1MiRMKL8KAr', '2018-04-18 14:55:20', '2018-04-18 14:55:20', 'default.png', 60, '0904548452'),
(66, 'minny', 'min', 'min@hotmial.com', 'dQB1e6uyde', 'mxn14XJtSn1DtUDc4LA39qSqvUIhqOmIyOdh6bgx', 'User', 'N/A', NULL, NULL, '2018-04-23 16:04:23', '2018-04-23 16:04:23', 'default.png', 0, '0812345678'),
(67, 'spp', 'spp', 'spp@gmail.com', '$2y$10$r1qMNWTnTCBBIiwvomKpmeE7khWBrJ21oGNtyKAnfOmE.pQzZOG32', 'nwHBrAUFgvCKJ1G7QidbP2lD4oJoYDif2ShRDajE', 'User', 'N/A', NULL, 'mfGT18LIIOYpQjBxo3hTJQYy4o3MIrut5bPXlt7qY0Yk6CV0sEH9JpZcpZCS', '2018-04-24 08:34:26', '2018-04-24 08:34:26', 'default.png', 0, '1911'),
(68, 'b5810450440', '5810450440', 'b5810450440@gmail.com', '$2y$10$2jZdS8s8L.piuIh.w1V/3ea/mZ/G0KWoaXfSex.5DajzYBI8Dls8W', 'wftdduCIZKDjoJrkGCvxWABAldgW6iAN5IzdD0FF', 'User', 'N/A', NULL, 'M2m1q6735i5NLOmpQMzbDpkwkFwJ9YuG7kQkxlQB8ichwwbcCW8mwWTiOgu0', '2018-04-24 08:40:14', '2018-04-24 08:40:14', 'default.png', 100, '1150'),
(69, 'cavikii', 'cavikii', 'satta.c@ku.th', '$2y$10$4hup8jrxDeKoW3ekHI5nVO9KivBv6TMTOdz0ogK/87oVUm8dfBDPC', 'tiLUXcS7EdffvXitP8luzvjgE1YCkJhhZsGXW0nY', 'Admin', 'Male', NULL, 'UGRMAhzJef0wL4aZ6jeZpjwnfZZSfdDQ3Z9P3pj50dzCRs0Ve14CfjVGWDgy', '2018-04-24 08:51:30', '2018-04-24 08:51:30', 'default.png', 0, '086455327'),
(70, 'Kanoon', 'Chamamas', 'chamamas.k@ku.th', '$2y$10$Vk5OvOQS.mxHjZIv68aNmOBUx.5rhhPSwOMJMeXd/9CnENcHuG26K', 'BgQcr9E9yGA0trBAcenaBVqm6ps5JsJW6zuTXfo5', 'User', 'N/A', NULL, 'J31WxeFOaF4rxB0SzZq5xaj6CetWWfOWMQqOGeZ4Kvl4Kijmg0NOEwAlCpb8', '2018-04-25 10:38:34', '2018-04-25 10:38:34', 'default.png', 0, '0961429514'),
(71, 'boommy', 'boom', 'boom@hotmail.com', '98BEhB2TUY', '6v3qAMGmoxYf2TDleCUqi627Vf2rgaYQyvPWLEz2', 'User', 'N/A', NULL, NULL, '2018-04-26 04:38:29', '2018-04-26 04:38:29', 'default.png', 0, '0822233321'),
(72, 'nutty', 'nut', 'nut@hotmail.com', 'cu8aHQfKpn', 'IOVJCDakw75arLWuyHNiY4A6P0tWHtI1rQR5cnqg', 'User', 'N/A', NULL, NULL, '2018-04-26 04:39:13', '2018-04-26 04:39:13', 'default.png', 0, '0811111111'),
(73, 'kaset', 'kasetsart', 'ks@starbuck.com', 'i4o42lNDxg', '6UIbVqfZT3n6nBjHPEfOIv9V1l0CCCz2ICD3pNSp', 'User', 'N/A', NULL, NULL, '2018-04-26 14:53:48', '2018-04-26 14:53:48', 'default.png', 0, '0904433433'),
(74, 'zpell', 'Zpell Cashier', 'zpell@starbuck.co.th', '$2y$10$ygNhYh9Y4U3L6t3TqOl1Q.IyoOZgn0tedqlq.isgZVfEErejdb7vS', 'KfPywL81koiyUAGxrAGhXwNYYByyJaHSbjxUEPWp', 'Cashier', 'N/A', NULL, NULL, '2018-04-26 16:05:36', '2018-04-26 16:05:36', 'default.png', 0, '0804548444'),
(75, 'satta', 'satta', 'satta@sat.sat', '$2y$10$9R9TXXsqG37FfWcVkK6txuDgYcchyhHwounGz4DLa00RkiC3ALOci', 'xXmLDSxWrR1UPr6KdvuU6TWsHQyjbFvukRylbWH9', 'Entrepreneur', 'N/A', NULL, '1ogVkgASFtMmOQKe2Kt7kj0XrjQlbsNc6rbuGQ5qoIgXiFzET4333rWlFw6N', '2018-04-27 08:34:10', '2018-04-27 08:34:10', 'default.png', 0, '0899999999');

-- --------------------------------------------------------

--
-- Table structure for table `user_cards`
--

CREATE TABLE `user_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_id` int(11) NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_cards`
--

INSERT INTO `user_cards` (`id`, `username`, `card_id`, `point`, `created_at`, `updated_at`) VALUES
(6, 'sun1', 7, 0, '2018-04-27 10:35:26', NULL),
(3, 'stamp', 3, 0, '2018-04-24 17:12:04', NULL),
(4, 'bnk48', 3, 0, '2018-04-27 10:32:53', NULL),
(5, 'sun1', 3, 0, '2018-04-27 10:33:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `username`, `msg`, `assigned_to`, `added_on`) VALUES
(1, 'stamp', 'Change role to Entrepreneur', 'ss', '2018-04-12 08:02:59'),
(2, 'stamp', 'Change role to Cashier', 'ss', '2018-04-12 08:03:05'),
(3, 'stamp', 'Updated profile infomation.', '', '2018-04-12 08:08:27'),
(4, 'stamp', 'Changed role to Entrepreneur', 'breitenberg.alycia', '2018-04-12 08:11:41'),
(5, 'stamper', 'Updated profile infomation.', '', '2018-04-12 08:53:24'),
(6, 'stamper', 'Updated profile infomation.', '', '2018-04-12 08:53:52'),
(7, 'stamp', 'Changed role to Cashier', 'kerluke.carolina', '2018-04-12 08:57:04'),
(8, 'kerluke.carolina', 'Updated profile infomation.', '', '2018-04-12 09:00:18'),
(9, 'stamp', 'Changed role to Admin', 'stamper', '2018-04-12 09:01:48'),
(10, 'stamper', 'Changed role to Cashier', 'lucious.stamm', '2018-04-12 09:02:11'),
(11, 'stamper', 'Changed role to Cashier', 'brooks.dubuque', '2018-04-12 09:02:19'),
(12, 'stamp', 'Invited to register , and BePoint+50 (={{ 0 }}) because invitie is {{ 2 }} ', 'charee', '2018-04-12 14:27:14'),
(13, 'kwanchanok', 'Invited to register , and BePoint+50 (={{ 0+50 }}) because invitie is {{ 1 }}. But testing has 100 BePoint on started.', 'testing', '2018-04-12 15:26:07'),
(14, 'stamp', 'Invited to register , and BePoint+50 (={{ 50+50 }}) because invitie is {{ 3 }}. But wow has 100 BePoint on started.', 'wow', '2018-04-12 15:28:59'),
(15, 'sun_vsp', 'Invited to register , and BePoint+50 (={{ 0+50 }}) because invitie is {{ 3 }}. But wow has 100 BePoint on started.', 'wow', '2018-04-12 15:29:25'),
(16, 'sun_vsp', 'Invited to register , and BePoint+50 (={{ 50+50 }}) because invitie is {{ 4 }}. But wow has 100 BePoint on started.', 'wow', '2018-04-12 15:29:41'),
(17, 'stamp', 'Invited to register , and BePoint+50 (={{ 100+50 }}) because invitie is {{ 4 }}. But testerter has 100 BePoint on started.', 'testerter', '2018-04-12 15:30:16'),
(18, 'stamp', 'Invited to register , and BePoint+50 (={{ 150+50 }}) because invitie is {{ 5 }}. But kwan has 100 BePoint on started.', 'kwan', '2018-04-12 15:32:10'),
(19, 'stamp', 'Create new reward BeCard Travel pillow', '', '2018-04-13 14:36:31'),
(20, 'stamp', 'Create new reward BeCard Travel pillow', '', '2018-04-13 14:37:09'),
(21, 'stamp', 'Create new reward BeCard Luggage 24\'\'', '', '2018-04-13 15:00:41'),
(22, 'stamp', 'Updated reward BeCard Travel pillow infomation.', '', '2018-04-13 16:34:54'),
(23, 'stamp', 'Updated reward BeCard Travel pillow infomation.', '', '2018-04-13 16:35:03'),
(24, 'stamp', 'Updated reward BeCard Travel pillow infomation.', '', '2018-04-13 16:35:59'),
(25, 'stamp', 'Updated reward BeCard Travel pillow infomation.', '', '2018-04-13 16:37:38'),
(26, 'stamp', 'Updated reward BeCard Travel pillow infomation.', '', '2018-04-13 16:37:46'),
(27, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-13 16:40:17'),
(28, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-13 16:40:24'),
(29, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-13 16:43:06'),
(30, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-13 16:43:15'),
(31, 'a', 'b', 'c', '2018-04-14 16:00:45'),
(32, 'a', 'b', 'c', '2018-04-14 16:01:58'),
(33, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-14 16:03:14'),
(34, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-14 16:03:42'),
(35, 'stamp', 'Changed role to User', 'ss', '2018-04-14 16:04:57'),
(36, 'stamp', 'Changed role to Cashier', 'camila.lubowitz', '2018-04-14 16:53:49'),
(37, 'stamp', 'Invited to register , and BePoint not plus because invitie is more than 5. But spppaper has 100 BePoint on started.', 'spppaper', '2018-04-14 17:00:58'),
(38, 'stamp', 'Invited to register , and BePoint not plus because invitie is more than 5. But oooo has 100 BePoint on started.', 'oooo', '2018-04-14 17:02:25'),
(39, 'qmacejkovic', 'Invited to register , and BePoint not plus because invitie is more than 5. But sssss has 100 BePoint on started.', 'sssss', '2018-04-14 17:12:50'),
(40, 'qmacejkovic', 'Invited to register , and BePoint not plus because invitie is more than 5. But oioi has 100 BePoint on started.', 'oioi', '2018-04-14 17:14:40'),
(41, 'qmacejkovic', 'Invited to register , and BePoint+50 (={{ 250+50 }}) because invitie is {{ 4 }}. But qmacejkovics has 100 BePoint on started.', 'qmacejkovics', '2018-04-14 17:21:10'),
(42, 'qmacejkovic', 'Invited to register , and BePoint not plus because invitie is more than 5. But ppppo has 100 BePoint on started.', 'ppppo', '2018-04-14 17:23:14'),
(43, 'lucious.stamm', 'Invited to register , and BePoint+50 (={{ 50+50 }}) because invitie is {{ 2 }}. But padthai has 100 BePoint on started.', 'padthai', '2018-04-18 09:40:59'),
(44, 'lucious.stamm', 'Invited to register , and BePoint+50 (={{ 150+50 }}) because invitie is {{ 4 }}. But tomyumkung has 100 BePoint on started.', 'tomyumkung', '2018-04-18 09:41:57'),
(45, 'stamp', 'Updated reward BeCard Luggage 24\'\' infomation.', '', '2018-04-18 12:59:53'),
(46, 'stamp', 'Updated reward BeCard Travel pillow infomation.', '', '2018-04-18 13:00:02'),
(47, 'stamp', 'Create new Shop as Starbuck', '', '2018-04-18 16:19:01'),
(48, 'stamp', 'Create new reward Osaka 2018 Tumbler Lace 473ml', '', '2018-04-18 16:22:35'),
(49, 'stamp', 'Updated reward Osaka 2018 Tumbler Lace 473ml infomation.', '', '2018-04-18 16:22:41'),
(50, 'stamp', 'Updated profile infomation.', '', '2018-04-18 16:51:13'),
(51, 'sun_vsp', 'Create new Shop as s', '', '2018-04-21 17:25:25'),
(52, 'stamper', 'Updated profile infomation.', '', '2018-04-23 01:28:14'),
(53, 'stamper', 'Updated profile infomation.', '', '2018-04-23 01:28:42'),
(54, 'stamper', 'Updated profile infomation.', '', '2018-04-23 01:28:46'),
(55, 'stamper', 'Updated profile infomation.', '', '2018-04-23 01:37:27'),
(56, 'stamper', 'Updated profile infomation.', '', '2018-04-23 01:37:33'),
(57, 'stamp', 'Updated profile infomation.', '', '2018-04-23 03:47:18'),
(58, 'stamp', 'Updated profile infomation.', '', '2018-04-23 03:47:21'),
(59, 'stamp', 'Updated profile infomation.', '', '2018-04-23 03:47:24'),
(60, 'bnk48', 'Invited to register , and BePoint+50 (={{ 0+50 }}) because invitie is {{ 1 }}. But b5810450440 has 100 BePoint on started.', 'b5810450440', '2018-04-24 08:40:14'),
(61, 'stamp', 'Create new member card, keycard ', '', '2018-04-24 13:35:01'),
(62, 'stamp', 'Updated member card infomation, keycard AYqr03t8fT', '', '2018-04-24 13:35:09'),
(63, 'stamp', 'Updated member card infomation, as Buddy Bear Member Card', '', '2018-04-24 13:36:57'),
(64, 'stamp', 'Register new card :Starbuck Thailand 2018 Member Card', '', '2018-04-24 17:09:44'),
(65, 'stamp', 'Register new card :Starbuck Thailand 2018 Member Card', '', '2018-04-24 17:10:38'),
(66, 'stamp', 'Register new card :Starbuck Gold Member Card', '', '2018-04-24 17:12:05'),
(67, 'bnk48', 'Updated member card infomation, as BNK48 Official Senpai Member Card', '', '2018-04-25 12:41:28'),
(68, 'bnk48', 'Updated member card infomation, as BNK48 Official Senpai Member Card', '', '2018-04-25 12:47:11'),
(69, 'bnk48', 'Updated member card infomation, as BNK48 Official Senpai Member Card', '', '2018-04-25 12:59:44'),
(70, 'kwan', 'Create new member card, as BeCard Member Card', '', '2018-04-25 13:04:20'),
(71, 'kfc', 'Create new Shop as KFC Thailand inc.', '', '2018-04-25 13:13:09'),
(72, 'kfc', 'Create new member card, as KFC Thailand Member Card', '', '2018-04-25 13:14:43'),
(73, 'sun_vsp', 'Updated profile infomation.', '', '2018-04-26 00:32:50'),
(74, 'cavikii', 'Create new Shop as cavokii', '', '2018-04-27 08:23:14'),
(75, 'stamp', 'Create new member card, as Starbucks Amazing Member Card', '', '2018-04-27 10:21:03'),
(76, 'bnk48', 'Register new card :Starbuck Gold Member Card', '', '2018-04-27 10:32:55'),
(77, 'sun1', 'Register new card :Starbuck Gold Member Card', '', '2018-04-27 10:33:35'),
(78, 'sun1', 'Register new card :Starbucks Amazing Member Card', '', '2018-04-27 10:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `bePoint` int(11) NOT NULL,
  `reception` int(11) NOT NULL DEFAULT '0',
  `voucherFormat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `owner`, `status`, `name`, `description`, `image`, `amount`, `bePoint`, `reception`, `voucherFormat`, `created_at`, `updated_at`, `shop_id`) VALUES
(3, 'stamp', 1, 'BeCard Luggage 24\'\'', 'These sizes are popular for travelers looking for a smaller, lighter option of luggage to check. These pieces are too large to carry onto the plane, but are perfect for trips of 3 to 5 days. There is room for 2 to 3 outfits, a couple pair of shoes, and toiletry kits. The suiter (a fold out or removable garment sleeve) has space for up to 2 suits or dresses.', '1523637784.png', 20, 2000, 1, 'BPL', '2018-04-13 15:00:30', '2018-11-05 17:00:00', 5),
(2, 'stamp', 1, 'BeCard Travel pillow', 'Cute name, but you’ll love its features and functional design even more. Not only is it eco-friendly and made with sustainable fabrics to absorb moisture (like sweat or drool), but it’s also packed with memory foam to provide neck, shoulder, and head support.', '1523630218.png', 20, 200, 1, 'BP', '2018-04-12 17:00:00', '2018-06-28 17:00:00', 5),
(4, 'stamp', 1, 'Osaka 2018 Tumbler Lace 473ml', 'Osaka 2018 Tumbler Lace 473ml', '1524068540.JPG', 10, 2000, 1, 'ST1', '2018-04-18 16:22:20', '2018-08-30 17:00:00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affiliates_username_foreign` (`username`),
  ADD KEY `affiliates_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `bepoint_logs`
--
ALTER TABLE `bepoint_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bepoint_logs_username_foreign` (`username`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_username_foreign` (`username`),
  ADD KEY `branches_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `cashiers`
--
ALTER TABLE `cashiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cashiers_email_unique` (`email`),
  ADD UNIQUE KEY `cashiers_username_unique` (`username`),
  ADD KEY `cashiers_shop_id_foreign` (`shop_id`),
  ADD KEY `cashiers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `membercards`
--
ALTER TABLE `membercards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membercards_username_foreign` (`username`),
  ADD KEY `membercards_shop_id_foreign` (`shop_id`);

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
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `redeems`
--
ALTER TABLE `redeems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_username_foreign` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_cards`
--
ALTER TABLE `user_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_cards_username_foreign` (`username`),
  ADD KEY `user_cards_card_id_foreign` (`card_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logs_username_foreign` (`username`),
  ADD KEY `user_logs_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vouchers_owner_foreign` (`owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliates`
--
ALTER TABLE `affiliates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `bepoint_logs`
--
ALTER TABLE `bepoint_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cashiers`
--
ALTER TABLE `cashiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `membercards`
--
ALTER TABLE `membercards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `redeems`
--
ALTER TABLE `redeems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `user_cards`
--
ALTER TABLE `user_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

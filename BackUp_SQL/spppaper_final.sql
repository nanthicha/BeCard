-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 11:19 PM
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
(14, 'stamp', 'yoyo', '2018-04-14 16:07:35');

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
(32, '2018_04_13_151753_create_vochers_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `bePoint` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `private_key`, `role`, `sex`, `dob`, `remember_token`, `created_at`, `updated_at`, `image`, `bePoint`) VALUES
(1, 'sun_vsp', 'sunny', 'vasupol.ch@ku.th', '$2y$10$GvPFgz/3hFa/XpNATaH5O.McltKli4TwcQWZ1NdBUpMHLSLbP2OLG', 'hnQd7saeSlPwZhombD98eNo9jj5UwfNZren4Fqp8', 'Admin', 'N/A', '2018-04-13 00:00:00', 'EfUrPuQXIk1TdhF2M1t1auLQZe3XFANqrKTrSyqbGakhEL0n35on0lOaba3b', '2018-04-11 10:06:53', '2018-04-11 10:46:26', 'sunny_1523447874.jpg', 100),
(2, 'stamp', 'Suphavich', 'suphavich.c@gmail.com', '$2y$10$DURe/PQSCKfT5iN.QhU3EejiIkBnvNrSldIFZ/uAqnqdpACrTGRaC', 'XxT5XpcGzmF9Q9J25yI1Mn5aPENchsAP5RphZ7eY', 'Admin', 'Male', '1996-08-15 00:00:00', 'taOaUnNvwYpAaHDophSRplNjpNpauTM06tGI8grGETO2SupqvCZ8rgAi7fH7', '2018-04-11 11:51:33', '2018-04-12 08:08:17', 'Suphavich_1523451244.jpg', 200),
(3, 'ss', 'ss', 's.s@hotmail.com', '$2y$10$GR30TP6259vQlnt6BIQiFuFMlXi1Av8pBSsYU13VomTpY254pXwPy', 'Ycx93UHbbgZWlnKnIVMb87TN8gGjadKpkW2VPDPF', 'User', 'N/A', NULL, 'r0v5gszPzqNZUeUJOG6H4EMhNwIBQAdZjjtQoQimA5TjYiSKGDWGQ5Vj6XrJ', '2018-04-11 12:05:21', '2018-04-11 12:05:21', 'default.png', 0),
(5, 'stamper', 'Suphavich Chanppittayanukoonkit', 'suphavich.c@ku.th', '$2y$10$Gt3CSWoLzgfIW1tobrMWnuC/Uo8X/owqFjqnJ.7w3Ca6C45b31cvm', 'kecIV5FmDvHsxzBegqpKW95MRUxGE9eTwM8rkxXC', 'Admin', 'Male', '1996-08-15 00:00:00', '3SrmIFLd83he8bnMIo6RTYuOTFWLCqSeoXvwQDm6HwMGaakOlhrKVEY6Nd3P', '2018-04-11 12:55:02', '2018-04-12 08:53:42', 'Suphavich Chanppittayanukoonkit_1523523239.png', 0),
(4, 'a', 'a', 'a@hotmail.com', '$2y$10$s2RVEyu5YuIOLrMzSCTMJunJpEy0zYGw7UZUNQvI7rtJevTyE6zAe', 'eJkxo4lFP1m1PbmNbBWoA02bDkYTNcstJG01TBkm', 'Entrepreneur', 'N/A', NULL, NULL, '2018-04-11 12:37:59', '2018-04-11 12:37:59', 'default.png', 0),
(6, 'georgiana45', 'Kip Medhurst', 'jordy.wiza@example.org', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'zr8iD3sPF5n6cHcfaD7p4I7Wn0qfVwsWqSlJxGw7', 'User', 'Male', '1994-06-06 00:00:00', 'lkQMhnG2io', '2018-04-11 14:54:50', '2018-04-11 14:54:50', 'default.png', 0),
(7, 'lehner.priscilla', 'Travon Watsica', 'showell@example.org', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'kszC7aosxINjel8ExbSMp4BiatHiyJLlZOX6MHG6', 'User', 'Male', '1976-08-01 00:00:00', 'pdPWs9bOp4', '2018-04-11 14:54:50', '2018-04-11 14:54:50', 'default.png', 0),
(8, 'qmacejkovic', 'Roberta Crooks', 'baumbach.geoffrey@example.com', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'CfZpO9WxlZqf3AtxPkc6uCeaYo7FbJ0RtOsBk3Ar', 'Cashier', 'Female', '1993-07-29 00:00:00', 'RQ2AeEfphTYkUhFy4JODsUa6ZK2gCitE6nC55qNc56L2wuYSWyO2SN9Dm02N', '2018-04-11 14:54:50', '2018-04-11 14:54:50', 'Roberta Crooks_1523462232.png', 0),
(9, 'breitenberg.alycia', 'Abigayle Sawayn', 'claudia12@example.org', '$2y$10$6ldVW4R6hxEE80EBZI5X6uwRTDouxQDoHirZ0KHkjOk9r4XznO4Rq', 'an45sY010z6aoy6ayfDqD4rnPxgRBVP9K4RWudb6', 'Entrepreneur', 'Female', '2004-10-30 00:00:00', 'eEF9fxWfRw3F6zB3mc8IbV0821Tn3UwjHBNAqgLATStoh9sG6dx6UX4IWkJF', '2018-04-11 14:56:30', '2018-04-11 14:56:30', 'Abigayle Sawayn_1523462372.png', 0),
(10, 'lucious.stamm', 'Uriah Murphy', 'sheaney@example.net', '$2y$10$G134qk40HO2lfujueitwNeS2fZrFKhAHejJgjAr/w1wv7Oe6nYIsa', 'XwbMTgYjpicNg47mjLsjGQArF1fTqWDsMcnCkcjx', 'Cashier', 'Female', '1990-04-13 00:00:00', 'FdZFcqBCcSmJp4gYrXWXSX6lfqgkUXVdzahQ6fhocOnjIi4VhbJVDwjcfwub', '2018-04-11 14:56:30', '2018-04-11 14:56:30', 'default.png', 0),
(11, 'brooks.dubuque', 'Samir Smitham', 'bruce47@example.org', '$2y$10$MSUz4XBmxnAr7qE.cYLMveQbmXyx1q6kWEevQGkdopiFrxEqLCxFm', 'YPGjZyjHeMycJYhyksQWDpcL7UpTMB3RoSslSG69', 'Cashier', 'Male', '2008-10-10 00:00:00', 'T3rTwNrajRGPiHWsSui1OfJojkeyKiF2PWeBSCZSKDykllp4RRYA5PpBDvVo', '2018-04-11 14:56:30', '2018-04-11 14:56:30', 'default.png', 0),
(12, 'camila.lubowitz', 'Ms. Sally Kautzer Sr.', 'dale83@example.net', '$2y$10$fJC2OE0CsgdbKSQQLo/pOuPGd1n5AXd/Lcq.SwSkCIah85fu364DW', 'Ly10Nh2xuLHIKupyULGxV1UkMJ02Ydg3pUGGiClS', 'User', 'Male', '2004-09-15 00:00:00', 'A2VKyKsDOg5wbxFjclCuCsbG0SCjPisF3IGxWRfAZSknbys8M61W9wp760ya', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0),
(13, 'grady.antwan', 'Idell Langosh', 'rogers.satterfield@example.net', '$2y$10$9zuPvJjNQRzwOYDIe7t.le5oiDAixLZo..q9BcLRgXC4ul9U2dWMC', 'c9BWnCmj6PFPNtc2V98hUGV4Rfgo9qzqLrv1mZ7W', 'User', 'Female', '1993-05-18 00:00:00', 'ozBYco2aX5L9y52odOfDRMoQeZhmLLrUCvdLdDJyKbKIWypUDxeofihVWRIp', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0),
(14, 'justine.kilback', 'Aliyah Kiehn', 'grady.cristian@example.com', '$2y$10$wjRRhYfGIzCnY91zq2nRNOfhVTy2kw/qnfh1EqEoZ2ERnouGJ99gu', '1RzBCqNEqEguKM0Akf3R1LPPIKh3MS2raHGC5eyk', 'User', 'Male', '1978-07-03 00:00:00', 'tjQzAObqu653BErxHoHiqxiqHr2GI3yos2a3VCJCQ6WNDvtDPOAkRFhvvgrh', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0),
(15, 'kerluke.carolina', 'Mrs. Lillie Goyette', 'fadel.jennings@example.com', '$2y$10$fhparSI7Vv3BOx6mWQeF8u5g7Mg6uJHqo8XorXl2Oko3PruxZVk7q', '8PIznjbjtPJ24AlLuG3yCksemths4lE8nP53fcFr', 'Cashier', 'Male', '1996-06-09 00:00:00', 'qDngHXXFd9HRjIAz26jM5yXuRIiQRP8yApR7yxM84odFbYKzz2xYmLxPQzFC', '2018-04-11 14:57:53', '2018-04-12 09:00:08', 'Mrs. Lillie Goyette_1523523612.png', 0),
(16, 'will.ernie', 'Prof. Shany Gusikowski', 'claudine.cremin@example.net', '$2y$10$i9q/tlvb5LlILW.cNFKEvev32/VI.YjcdEMAwxeFuIZwUDNwSH18u', 'T1q5Aa9ZNvJr7Ce8y95a8fOvxFSlEy4sxA7VrQOR', 'User', 'Female', '1986-06-11 00:00:00', 'FrapgGEY5L4QLbCBs6PshifcEHPALG95dkR2tjEauOdauuN2tRrrqKsVtWxr', '2018-04-11 14:57:53', '2018-04-11 14:57:53', 'default.png', 0),
(17, 'neva76', 'Dr. Reed Will III', 'reed.konopelski@example.com', '$2y$10$H1tnBIIo2t/eIpWzBEaQ5.YTRaKx4B41O1tbmlda.edMlWWaF3IBq', '6omRZYyfucGWggAgd67R3zdUnWNj1f6TH71zVSaB', 'User', 'Male', '1971-01-31 00:00:00', 'BFqBVB5ZW6rOxnDKg3IU7G3AFCUHcevgzBCCrb5SgnQEl5tkLGOasS3Oo1nC', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(18, 'andres10', 'Janie Kerluke', 'bskiles@example.com', '$2y$10$Gok1EsvAVbV3izZjJRdrLOKnF.LgRYHE0vPOsg/GK2PWjuNw0Y6Na', 'pSt55MHiRn7BuWWuRihJmU2viW4v49yYfVrYCvWz', 'User', 'Female', '1978-04-15 00:00:00', 'cBnUOJZpCKj3WChbbSwQzcULFZc1p38icFapSCqhV5f6sXpewR2DZxtERDmH', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(19, 'xhuels', 'Kale Herman', 'kasey77@example.org', '$2y$10$eTp4Exko/rbwrXeQ4md1iOZQHx7cedEDRKqXIbZOE0I8UGQ7JMPAq', 'ZwYoRDff1c6bH9X1OddvwdaQdAjBdelT41dBJPT3', 'User', 'Male', '1992-12-14 00:00:00', 'c3uZmOy2TFBy2mETghqJlJLJ3QzXKChnGtbsGl3lAT55SYsDkgowWqAyqgnN', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(20, 'isabell92', 'Melba Ortiz', 'vreynolds@example.com', '$2y$10$X38ZYVOXO64OxBp4gAe0ae1zx41P46/V9zhZjpzPEZ3UNcPYliK.a', 'bu3LDbYkvh4MULdxuLJsybIy9Nlnh7XnPfa1BjFf', 'User', 'Female', '2010-10-21 00:00:00', 'AMO7A9olOkwKfwFuxtwrDF7Yvv4ClXJs3VheQZTNvptrfmmTEYdctAGiOAE3', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(21, 'jkrajcik', 'Mrs. Lacy Zboncak', 'robyn.douglas@example.com', '$2y$10$nBQREo6K5PlNDke2zbCiUOMknYJ2SxTyfwZzbMqjWRHuSueU/4yxS', 'iznznUzBZ4h84AnrE0oNxUtibnfRonSNwh00tIvy', 'User', 'Male', '1998-02-22 00:00:00', '3sm83xq0Gumvtco95Dq1FsDrPvnJOqCkF82F74Du7ExVh8n4NdNhoHup8GRH', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(22, 'shanelle15', 'Mrs. Camylle Ondricka', 'josefa.parisian@example.com', '$2y$10$fElUEc.KQ/Ms/3ncToWcm.bsoz3CjVYey5yAnRMS3DisDIVQWgQqa', '2mgzggVr5A0ou5KnuhDMdVFZU7wD21piBX1DEaZN', 'User', 'Male', '1970-05-14 00:00:00', 'iZ4K4jomUsjutqHOBI2AFp4qLHI9kaEZjloFahQjsatDR5nP1bCkA7gAJ0KL', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(23, 'hope.trantow', 'Eryn Williamson', 'daryl.runolfsson@example.net', '$2y$10$uHJG4ragoGKSyykwbNyPEuqE3o64lYj.RMnPeXZTCR9zXtZbxDpBe', 'VwXI23EeST5cGBTTKuUDQZj6TqrfJEF4YFQyOdS4', 'User', 'Female', '1991-07-15 00:00:00', 'M9d1g2bg5Se5A5Xy3r5i5WSqKvFexgfSEMXxmauppkISOBFDoPj3K5MAjI0F', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(24, 'oreichert', 'Orie Von', 'nprice@example.com', '$2y$10$jPIVzbAjqqJm.p.TVjT09u2CE9WfeLBJ5EIT/ZFwY9MwS5o9UN55y', 'L7tHGpw3tvsskPmCC1LGwFlZGmaWuZweTQYCpDl5', 'User', 'Female', '1972-03-09 00:00:00', 'vYwZL27TG47vaM9m9bg032xqPHz6VHUzIaWVUhDkSHX4C6lahwSA3oCeVzzC', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(25, 'ywalsh', 'Xander Cassin', 'bernhard.botsford@example.net', '$2y$10$VRW4fxeR8nJX9w3gSBetkOayZHvS3ZLX3UvjPNAVxhju2.XW3h332', 'hDznvPpVmFC3bSqOOsbUtKbWIt3oTKySA6UkjcFB', 'User', 'Female', '2003-05-19 00:00:00', '2St1ieuNiL3rnaSDD6FXlBAAtQkOpWnedO2VLGHZUKWRoCQhGlYZmujmaEr5', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(26, 'jaqueline.hamill', 'Alek Windler DVM', 'nicole.watsica@example.com', '$2y$10$xIrqjG0Tzm8Y1nPmqWAuo.oOHqRxwhnMJP0WWGorsQAJei5RpYnya', 'pIoYRxIYYUItYPLfwQ28XVWyd4gigIP2oGAUOxaK', 'User', 'Male', '1996-08-21 00:00:00', 'P78l50XHXoyhoAa9EsVTgNZrDu218s8oflva0V7JtHwCMfTri0QqaMdagrTQ', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(27, 'floy16', 'Drew Blanda', 'kylee15@example.net', '$2y$10$lnOQPxn.ThGLemPhWg6U0eoe4FQTRKCndfxyEbab1ztonZFKObiNW', 'Ed9vXegaGtMQuNrDNK18ZNOkc0Ujb7rRBHPNoyOF', 'User', 'Female', '1980-10-08 00:00:00', 'GQiwMEKTepq3q6xhBSGOX0DATKe7dvZLThgfi8aSFe78LTAz8g0ywysDbmhs', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(28, 'rowena76', 'Andre Ryan', 'ddonnelly@example.org', '$2y$10$B.QFCr89kO4EpfGdIr5usuQvH0GqjzrMf6I9ySNnyANOUWYoindu2', 'kww5eSgMPMhkjSzfYTf4O23Kis9ZjwHdvQUhrU9X', 'User', 'Male', '1996-11-27 00:00:00', 'UQDYEnEjsyIsAVDxGuWaFYfkorxmUUPzpImHW14jHpldAkik7fvM9rbfAxB3', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(29, 'aurelia52', 'Bianka Braun', 'mskiles@example.org', '$2y$10$nlygKrW.1gglyZVmmp8yc.YRqnKx37FHeM./gpSbAW7aZnDeREIsS', 'tMPwTxdAs7knbBjFAngkmdjCHwPBo5lxuDhuuOPB', 'User', 'Female', '1982-02-27 00:00:00', 'RMeaXX598ABA0rMPFLtioP4xikpVlnJLDluF6d6DMJUfXXax7l81rXJR83N3', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(30, 'ogusikowski', 'Javonte Bechtelar', 'nona.mcclure@example.net', '$2y$10$0d/K90NwBIKQ60RujIHtFe3CxFn5k/SrpAHpFxgdtmrdARQQo3dsi', 'n9eZ02sOFFkdWxZHSpoOzXsVJDJdd5MT9YwbCfqz', 'User', 'Female', '1982-09-18 00:00:00', 'tlRDRyc2JlWC8LamzQ430Pftx6jThGxAOFCebic5YGHzxsGCQL395gxrAZyx', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(31, 'ortiz.geo', 'Mohammed Parisian DVM', 'ford.torp@example.net', '$2y$10$fErbNTIztd4k.j9JgmlhleVeIx0BBxFGj2iDC4ohUABvIRiqwuJyi', 'XrLISpMT6wSS1pcfp2fTexewX9lu5LbhSUPnMI0S', 'User', 'Male', '1971-01-30 00:00:00', 'dRCCtK3uvn5PvYCcaAPWNe9c5M8qnHtrEukH0oX13wjCTYRzBIOOLZ3b6xkz', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(32, 'karine.schowalter', 'Salvador Dicki', 'cormier.devon@example.com', '$2y$10$qdM2ojs0jiZFsncEuBEVn.nDpW7qjOeB./5ZkJLMjfV7rl8kwVC.u', 'qKy4QZZHTLC3OVIbhtyfZNzxSgt1XHsxrFWQ6dZy', 'User', 'Male', '1988-02-26 00:00:00', 'sHvWpJSnlfv5B7muqidRyB8kQ0WrXGU07oW4ENGWNyOd5GgNYbtZGJoi7Pvt', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(33, 'harber.rahsaan', 'Glen Hammes PhD', 'lonny.ernser@example.net', '$2y$10$avTnkxsQrwKDoVumPOzoheuDi/CjkMdReBOHEkwi08nvcBA8Xe3ku', '81GFwMwlhRVxEb6RjePzBuW63pE4iB53zky1uvn7', 'User', 'Male', '2002-10-20 00:00:00', 'wSmbePSUyLAFBQqq2Sg3l7VQAnTPwL3ut0UtYEJH2JHybnW75kO4BarMoEge', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(34, 'vcarroll', 'Lyric Daniel', 'ncummerata@example.org', '$2y$10$8laK1LYv4cyGXSvhCVQQWeZTuRAG7kiWY4bTg1AhKwqjDvYGyEVwi', '4tfs14jE8fWskYcYCo859RCaHATEnpRw29OT0yBu', 'User', 'Male', '1994-04-15 00:00:00', 'RMg51sJBguISZvfYBkhLwkEMNxalM2liouW49DyS9T8kLg2bHUHz2vvQMysT', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(35, 'witting.eden', 'Pedro O\'Kon PhD', 'kling.dusty@example.org', '$2y$10$QJW0656N5lR9AsULaVhZhOygbrRfx8VzvHQZ6Zb8Vl4gtb6T8Kaea', 'TYelyVAIFdE6Xz5osIAbmXoV1KureQf1i98cVKV4', 'User', 'Male', '1977-12-20 00:00:00', 'BXrUMp2dte537nRDxbU5hsqNqG1Tu7IXzcryyr0E6tqJxyNqFrtYcPgyq0d8', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(36, 'erdman.brett', 'Prof. Chelsie Klocko', 'senger.darren@example.com', '$2y$10$hwNAKm3VGB0DXG/a3gyjn.qwcDGRS4/C8d3b9LyBXEILT0TQc7IL6', 'YoKl7GtVEKBn3LZTBXqqF2EyhhIGhMEb77CUD8Xn', 'User', 'Male', '1978-06-02 00:00:00', 'tTfs7LCTGNQIceNkA1I9h59FFgalpFRtVV2yxYd9RWirRZqCrGxowgpWEzmK', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(37, 'nadia.kozey', 'Lea Quitzon', 'fay.dangelo@example.net', '$2y$10$ddz4p9xuGDo3AEQPfw0Q9OC4E2ycW.x2JgB8GUXNEtspsOw4k3g4C', 'Vinfhqg7eECCe0RIFuCK5DWfwpqXXvMG52fWEn28', 'User', 'Male', '1979-03-12 00:00:00', 'ApX9p5BWTEsHcl6mjeXPRsX73FQfXAIkFoT2yIiZ71oExUOmZy8wQpVQhJlY', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(38, 'graham.nella', 'Dr. Nya Dare III', 'kristin.goodwin@example.net', '$2y$10$4S.drZvmZMPm4LN6G3zRWukNMNbH.abc/eG7.FI8aHyWJ0kzCQYHi', 'ECe64LHltEDjiyAvALrwuk5wycTh8k8uPu1su5Q3', 'User', 'Female', '1994-07-07 00:00:00', '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(39, 'johnny88', 'Ms. Katelin Bashirian', 'genoveva.emmerich@example.org', '$2y$10$lAGzogx7so//O.8omYYecOQEv8SnTv5bR/ftCUC4kuSRiGHpnYsKC', 'vRPEyJUjlMdsplkDAg7yw0fZnpWlYAKihxQ2eDyc', 'User', 'Female', '1995-09-19 00:00:00', 'dNgkNb37tHNNBYXv1tSYVKrcAAQv8ebjea0szOjHzTtFP245Je8wsG99uyL4', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(40, 'abernathy.colby', 'Kathryn Auer I', 'ljenkins@example.com', '$2y$10$vtHYKtXRuivDHQq6LNLT9.MkEa/fYUVdTrc.8Oyuf0TpcAvo2Op8S', 'iKpExriv1wlhovOBmKx8bYu82F6JZUHjTOzuP3ni', 'User', 'Male', '2006-03-10 00:00:00', 'iN2g2aEdNXB3sFrGeiyIFEaWH4ocB1TnFDYF003ytkEru9ST9mg76keRa7Mv', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(41, 'vicenta93', 'Freeda Roberts', 'nnader@example.org', '$2y$10$9PJIKM6PkWGqAFKH9uR2deMOyeSd7dh6n2Sqayl.tEJJG9FDxuFQa', 'dXhfSOKGPcoNuQvNPY1ehwxG9nMWpEq0uM7spHtz', 'Cashier', 'Male', '1977-10-09 00:00:00', 'fOij5NGagkI0UrUGXueP7Z5QWj0V2HUQzldjNWW4kMxVf0Y2ZSJ3lAALUFTc', '2018-04-11 14:57:54', '2018-04-11 14:57:54', 'default.png', 0),
(42, 'kwanchanok', 'Kwanchanok', 'kwanchanok.chanp@gmail.com', '$2y$10$eM9zvZcNMHLP2qdpbmYwaeSmRMmwaGDFf3kJLnkxnGEVrn4WfK6By', 'mPdqvWybK8jbQgUndKlsN8qfXZHaNNkDvYzwXiOj', 'User', 'N/A', NULL, 'Afe5OA7ijIXlKk9NNcLtdYSU4P7qiY1p9OMEjgip6uKu1zDiqbdFc07XOZKR', '2018-04-12 14:12:53', '2018-04-12 14:12:53', 'default.png', 50),
(43, 'poom', 'poom', 'poom@ku.ac.th', '$2y$10$k3j.FaKSRLtQXF/VYWLOge8bbMrYrIwxwMQrP1eKHC3UeTBsGMIxq', '78DIuwviGfq1Pic9vKzWzfurPbkQJ7LOktoIS3at', 'User', 'N/A', NULL, '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-12 14:14:07', '2018-04-12 14:14:07', 'default.png', 0),
(44, 'charee', 'ชารี', 'charee@eventhubs.com', '$2y$10$2jpsXzUcMEQrzYSXuqM2SO8dbiQh00QZ2/0zDioTO/5wIjT.DIlF6', 'WzTpTToMQs2f0ceJU8MznrUjVv1C9xwv6312MBTo', 'User', 'N/A', NULL, '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-12 14:27:04', '2018-04-12 14:27:04', 'default.png', 0),
(45, 'testing', 'testing', 'testing@localhost.com', '$2y$10$3yrAcZRzAktZpeaZcGoBIuINAZqlfiJvKq6txmftHgKkz9h8Z3PoK', '1vHEt3ty0F0awNKUlb9ddv6ei7hOcTCkwX0gq17v', 'User', 'N/A', NULL, '9LkejWrYm8qsldEbMLaDXfc1DV2AoNB24kzIFsKa4Pq0DEEjziY1ZabrhVsL', '2018-04-12 15:25:56', '2018-04-12 15:25:56', 'default.png', 100),
(46, 'wow', 'wowww', 'wow@gmail.com', '$2y$10$ZlUbXQ.qvMedqgtcwyvRc.zwAlwaaqWmjMoS8HzOB2UIORxQX3WAW', 'Muvq7gseE4LVuFLrtZbBkGvAm5hXQLplKr31KUEj', 'User', 'N/A', NULL, 'fOij5NGagkI0UrUGXueP7Z5QWj0V2HUQzldjNWW4kMxVf0Y2ZSJ3lAALUFTc', '2018-04-12 15:29:14', '2018-04-12 15:29:14', 'default.png', 100),
(47, 'testerter', 'remember_token', 'remember_token@gmail.com', '$2y$10$o6uvvrwCFd2E0dqKgrv2weJdzicDFfzHdUwWuFUwnIQN25ERVbH7.', 'K9Ove5SZkZWybgDcVyDcMFl83De1Clmic26BKPMZ', 'User', 'N/A', NULL, 'dNgkNb37tHNNBYXv1tSYVKrcAAQv8ebjea0szOjHzTtFP245Je8wsG99uyL4', '2018-04-12 15:30:06', '2018-04-12 15:30:06', 'default.png', 100),
(48, 'kwan', 'Kwanchanok', 'kwan@gmail.com', '$2y$10$j4FTbE7M8SwFSVuyk18hs.S1n36VApsj8pNv1yBe/aXmJS2d7JHhi', '38Z2l4WWkAYmobs93nIQjwXyNaNdrtiTL2hxGCo2', 'User', 'N/A', NULL, 'ApX9p5BWTEsHcl6mjeXPRsX73FQfXAIkFoT2yIiZ71oExUOmZy8wQpVQhJlY', '2018-04-12 15:32:00', '2018-04-12 15:32:00', 'default.png', 100);

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
(35, 'stamp', 'Changed role to User', 'ss', '2018-04-14 16:04:57');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `owner`, `status`, `name`, `description`, `image`, `amount`, `bePoint`, `reception`, `voucherFormat`, `created_at`, `updated_at`) VALUES
(3, 'stamp', 1, 'BeCard Luggage 24\'\'', 'These sizes are popular for travelers looking for a smaller, lighter option of luggage to check. These pieces are too large to carry onto the plane, but are perfect for trips of 3 to 5 days. There is room for 2 to 3 outfits, a couple pair of shoes, and toiletry kits. The suiter (a fold out or removable garment sleeve) has space for up to 2 suits or dresses.', '1523637784.png', 20, 1000, 1, 'BPL', '2018-04-13 15:00:30', '2018-11-05 17:00:00'),
(2, 'stamp', 1, 'BeCard Travel pillow', 'Cute name, but you’ll love its features and functional design even more. Not only is it eco-friendly and made with sustainable fabrics to absorb moisture (like sweat or drool), but it’s also packed with memory foam to provide neck, shoulder, and head support.', '1523630218.png', 20, 100, 1, 'BP', '2018-04-12 17:00:00', '2018-06-28 17:00:00');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

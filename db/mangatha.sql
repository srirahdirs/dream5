-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 07:12 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangatha`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1554983730),
('m130524_201442_init', 1554983734),
('m190124_110200_add_verification_token_column_to_user_table', 1554983734);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_verified` smallint(6) DEFAULT '0',
  `email_verified` smallint(6) DEFAULT '0',
  `admin_verified` smallint(6) DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile_number`, `password`, `password_reset_token`, `gender`, `otp`, `otp_verified`, `email_verified`, `admin_verified`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'smssri', 'sri.rahdirs@gmail.com', '9789253515', '$2y$10$.V78/z2qqjC4w11lKcsMXupr4C5VFqg/e8qqgfReplp51livA4skW', NULL, NULL, NULL, 0, 0, 0, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'ragu', 'sri.rahdirs@gmail.com1', '9789253516', '$2y$10$MX3LceTvKvnuOmc/cRMepuQWymMQG69T8bfW1Qk/y9EGQAywiZHoO', NULL, NULL, NULL, 0, 0, 0, 10, '2019-06-15 13:39:05', '2019-06-15 13:39:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card_file` text COLLATE utf8mb4_unicode_ci,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card_file` text COLLATE utf8mb4_unicode_ci,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_file` text COLLATE utf8mb4_unicode_ci,
  `is_pan_verified` enum('Yes','Rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_aadhar_verified` enum('Yes','Rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_account_verified` enum('Yes','Rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `pan_card`, `pan_card_file`, `aadhar_card`, `aadhar_card_file`, `account_number`, `ifsc_code`, `bank_name`, `bank_file`, `is_pan_verified`, `is_aadhar_verified`, `is_account_verified`, `created_at`, `updated_at`) VALUES
(1, 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-15 13:39:05', '2019-06-15 13:39:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `otp` (`otp`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

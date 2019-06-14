-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 05:16 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_verified` smallint(6) DEFAULT '0',
  `email_verified` smallint(6) DEFAULT '0',
  `admin_verified` smallint(6) DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `mobile_number`, `auth_key`, `password_hash`, `password_reset_token`, `gender`, `otp`, `otp_verified`, `email_verified`, `admin_verified`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'sri.rahdirs@gmail.com', '', 'o6oETJsbi9c7tEpGul8bEKN8Dtu40fmt', '$2y$13$2U1ozn3YqkInXDOChIlLzOT16bkyqbtWLQZKYdzgtEN0i6Z5E4AIu', NULL, NULL, NULL, 0, 0, 0, 9, 1554984088, 1554984088, 'ymhrxvuvK2MjfJjd0Qhlvue-Et56jT-5_1554984088'),
(2, 'sridhar', 'sridhar@omgtech.in', '9789253515', '2FkcrJNFtVl3XdDI0krgJiG5xbp3cypz', '$2y$13$rDZOifhLPo/euXGeCd2hVOuaBA1kWG2Sn4uob39Dj44t87NEObuNC', NULL, NULL, NULL, 0, 0, 0, 9, 1555579897, 1555579897, '9R-IVTUG5D8btVdwHJ3GXK3spDKlTJKU_1555579897'),
(4, 'smssri', 'sridharvmsccs@gmail.com', '6381566734', 'wUF1BwDoTmSmio6gIhlzVUqjZjyCf5Jo', '$2y$13$OalvBPm3/BhVfC.ufvbVsOtApVa69GeWxF9/8Ary5uRqvTp9pQyzS', NULL, NULL, NULL, 0, 0, 0, 9, 1555585043, 1555585043, 'bw44SjMUjPTP2B7r67YFrLAlu2GkUVGk_1555585043');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `otp` (`otp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

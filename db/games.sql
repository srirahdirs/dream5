-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2021 at 09:31 PM
-- Server version: 5.7.31
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamin_mangatha`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `category` varchar(55) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `team_a` varchar(255) NOT NULL,
  `team_b` varchar(255) NOT NULL,
  `match_date_time` datetime NOT NULL,
  `status` varchar(55) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `category`, `game_type`, `team_a`, `team_b`, `match_date_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cricket', 'T20', 'KKR', 'PJB', '2021-04-26 19:30:00', 'Completed', '2021-04-26 17:09:25', '2021-04-27 09:01:56', '2021-04-26 17:09:25'),
(2, 'Cricket', 'T20', 'DD', 'RCB', '2021-04-27 19:30:00', 'Completed', '2021-04-26 17:10:27', '2021-04-27 17:30:11', '2021-04-26 17:10:27'),
(3, 'Cricket', 'T20', 'RR', 'CSK', '2021-04-28 19:12:00', 'Deleted', '2021-04-27 08:17:30', '2021-04-27 09:01:28', '2021-04-27 08:17:30'),
(4, 'Cricket', 'T20', 'DC', 'RCB', '2021-04-27 19:30:00', 'Completed', '2021-04-27 09:05:05', '2021-04-27 17:30:12', '2021-04-27 09:05:05'),
(5, 'Cricket', 'T20', 'CSK', 'SRH', '2021-04-28 19:30:00', 'Upcoming', '2021-04-27 09:06:32', NULL, '2021-04-27 09:06:32'),
(6, 'Cricket', 'T20', 'MI', 'RR', '2021-04-29 15:30:00', 'Upcoming', '2021-04-27 09:08:16', NULL, '2021-04-27 09:08:16'),
(7, 'Cricket', 'T20', 'DC', 'KKR', '2021-04-29 19:30:00', 'Upcoming', '2021-04-27 09:09:28', NULL, '2021-04-27 09:09:28'),
(8, 'Cricket', 'T20', 'PBKS', 'RCB', '2021-04-30 19:30:00', 'Upcoming', '2021-04-27 09:10:51', NULL, '2021-04-27 09:10:51'),
(9, 'Cricket', 'T20', 'MI', 'CSK', '2021-05-01 19:30:00', 'Upcoming', '2021-04-27 09:12:32', NULL, '2021-04-27 09:12:32'),
(10, 'Cricket', 'T20', 'RR', 'SRH', '2021-05-02 15:30:00', 'Upcoming', '2021-04-27 09:15:47', NULL, '2021-04-27 09:15:47'),
(11, 'Cricket', 'T20', 'PBKS', 'DC', '2021-05-02 19:30:00', 'Upcoming', '2021-04-27 09:16:39', NULL, '2021-04-27 09:16:39'),
(12, 'Cricket', 'T20', 'KKR', 'RCB', '2021-05-03 19:30:00', 'Upcoming', '2021-04-27 09:18:14', NULL, '2021-04-27 09:18:14'),
(13, 'Cricket', 'T20', 'SRH', 'MI', '2021-05-04 19:30:00', 'Upcoming', '2021-04-27 09:18:59', NULL, '2021-04-27 09:18:59'),
(14, 'Cricket', 'T20', 'RR', 'CSK', '2021-05-05 19:30:00', 'Upcoming', '2021-04-27 09:20:39', NULL, '2021-04-27 09:20:39'),
(15, 'Cricket', 'T20', 'RCB', 'PBKS', '2021-05-06 19:30:00', 'Upcoming', '2021-04-27 09:21:53', NULL, '2021-04-27 09:21:53'),
(16, 'Cricket', 'T20', 'SRH', 'CSK', '2021-05-07 19:30:00', 'Upcoming', '2021-04-27 09:23:18', NULL, '2021-04-27 09:23:18'),
(17, 'Cricket', 'T20', 'KKR', 'DC', '2021-05-08 15:30:00', 'Upcoming', '2021-04-27 09:23:57', NULL, '2021-04-27 09:23:57'),
(18, 'Cricket', 'T20', 'RR', 'MI', '2021-05-08 19:30:00', 'Upcoming', '2021-04-27 09:24:26', NULL, '2021-04-27 09:24:26'),
(19, 'Cricket', 'T20', 'CSK', 'PBKS', '2021-05-09 15:30:00', 'Upcoming', '2021-04-27 09:25:33', NULL, '2021-04-27 09:25:33'),
(20, 'Cricket', 'T20', 'RCB', 'SRHS', '2021-05-09 19:30:00', 'Upcoming', '2021-04-27 09:26:12', NULL, '2021-04-27 09:26:12'),
(21, 'Cricket', 'T20', 'MI', 'KKR', '2021-05-10 19:30:00', 'Upcoming', '2021-04-27 09:26:58', NULL, '2021-04-27 09:26:58'),
(22, 'Cricket', 'T20', 'DC', 'RR', '2021-05-11 19:30:00', 'Upcoming', '2021-04-27 09:27:40', NULL, '2021-04-27 09:27:40'),
(23, 'Cricket', 'T20', 'CSK', 'KKR', '2021-05-12 19:30:00', 'Upcoming', '2021-04-27 09:28:17', NULL, '2021-04-27 09:28:17'),
(24, 'Cricket', 'T20', 'MI', 'PBKS', '2021-05-13 15:30:00', 'Upcoming', '2021-04-27 09:29:08', NULL, '2021-04-27 09:29:08'),
(25, 'Cricket', 'T20', 'SRH', 'RR', '2021-05-13 19:30:00', 'Upcoming', '2021-04-27 09:58:08', NULL, '2021-04-27 09:58:08'),
(26, 'Cricket', 'T20', 'RCB', 'DC', '2021-05-14 19:30:00', 'Upcoming', '2021-04-27 09:58:40', NULL, '2021-04-27 09:58:40'),
(27, 'Cricket', 'T20', 'KKR', 'PBKS', '2021-05-15 19:30:00', 'Upcoming', '2021-04-27 09:59:19', NULL, '2021-04-27 09:59:19'),
(28, 'Cricket', 'T20', 'RR', 'RCB', '2021-05-16 15:30:00', 'Upcoming', '2021-04-27 09:59:54', NULL, '2021-04-27 09:59:54'),
(29, 'Cricket', 'T20', 'CSK', 'MI', '2021-05-16 19:30:00', 'Upcoming', '2021-04-27 10:00:24', NULL, '2021-04-27 10:00:24'),
(30, 'Cricket', 'T20', 'DC', 'SRH', '2021-05-17 19:30:00', 'Upcoming', '2021-04-27 10:00:59', NULL, '2021-04-27 10:00:59'),
(31, 'Cricket', 'T20', 'KKR', 'RR', '2021-05-18 19:30:00', 'Upcoming', '2021-04-27 10:01:37', NULL, '2021-04-27 10:01:37'),
(32, 'Cricket', 'T20', 'SRH', 'PBKS', '2021-05-19 19:30:00', 'Upcoming', '2021-04-27 10:02:17', NULL, '2021-04-27 10:02:17'),
(33, 'Cricket', 'T20', 'RCB', 'MI', '2021-05-20 19:30:00', 'Upcoming', '2021-04-27 10:02:52', NULL, '2021-04-27 10:02:52'),
(34, 'Cricket', 'T20', 'KKR', 'SRH', '2021-05-21 15:30:00', 'Upcoming', '2021-04-27 10:03:25', NULL, '2021-04-27 10:03:25'),
(35, 'Cricket', 'T20', 'DC', 'CSK', '2021-05-21 19:30:00', 'Upcoming', '2021-04-27 10:04:07', NULL, '2021-04-27 10:04:07'),
(36, 'Cricket', 'T20', 'PBKS', 'RR', '2021-05-22 19:30:00', 'Upcoming', '2021-04-27 10:04:52', NULL, '2021-04-27 10:04:52'),
(37, 'Cricket', 'T20', 'MI', 'DC', '2021-05-23 15:30:00', 'Upcoming', '2021-04-27 10:05:28', NULL, '2021-04-27 10:05:28'),
(38, 'Cricket', 'T20', 'RCB', 'CSK', '2021-05-23 19:30:00', 'Upcoming', '2021-04-27 10:05:59', NULL, '2021-04-27 10:05:59'),
(39, 'Cricket', 'T20', 'MI', 'RCB', '2021-04-09 19:30:00', 'Completed', '2021-04-27 10:08:48', NULL, '2021-04-27 10:08:48'),
(40, 'Cricket', 'T20', 'CSK', 'DC', '2021-04-10 19:30:00', 'Completed', '2021-04-27 10:13:32', NULL, '2021-04-27 10:13:32'),
(41, 'Cricket', 'T20', 'KKR', 'SRH', '2021-04-11 19:30:00', 'Completed', '2021-04-27 10:14:34', NULL, '2021-04-27 10:14:34'),
(42, 'Cricket', 'T20', 'PBKS', 'RR', '2021-04-12 19:30:00', 'Completed', '2021-04-27 10:15:21', NULL, '2021-04-27 10:15:21'),
(43, 'Cricket', 'T20', 'MI', 'KKR', '2021-04-13 19:30:00', 'Completed', '2021-04-27 10:16:07', NULL, '2021-04-27 10:16:07'),
(44, 'Cricket', 'T20', 'RCB', 'SRH', '2021-04-14 19:30:00', 'Completed', '2021-04-27 10:17:19', NULL, '2021-04-27 10:17:19'),
(45, 'Cricket', 'T20', 'DC', 'RR', '2021-04-15 19:30:00', 'Completed', '2021-04-27 10:18:14', NULL, '2021-04-27 10:18:14'),
(46, 'Cricket', 'T20', 'PBKS', 'CSK', '2021-04-16 19:30:00', 'Completed', '2021-04-27 10:19:03', NULL, '2021-04-27 10:19:03'),
(47, 'Cricket', 'T20', 'MI', 'SRH', '2021-04-17 19:30:00', 'Completed', '2021-04-27 10:20:19', NULL, '2021-04-27 10:20:19'),
(48, 'Cricket', 'T20', 'RCB', 'KKR', '2021-04-18 15:30:00', 'Completed', '2021-04-27 10:21:26', NULL, '2021-04-27 10:21:26'),
(49, 'Cricket', 'T20', 'PBKS', 'DC', '2021-04-18 19:30:00', 'Completed', '2021-04-27 10:22:11', NULL, '2021-04-27 10:22:11'),
(50, 'Cricket', 'T20', 'CSK', 'RR', '2021-04-19 19:30:00', 'Completed', '2021-04-27 10:22:55', NULL, '2021-04-27 10:22:55'),
(51, 'Cricket', 'T20', 'MI', 'DC', '2021-04-20 19:30:00', 'Completed', '2021-04-27 10:23:51', NULL, '2021-04-27 10:23:51'),
(52, 'Cricket', 'T20', 'PBKS', 'SRH', '2021-04-21 15:30:00', 'Completed', '2021-04-27 10:24:45', NULL, '2021-04-27 10:24:45'),
(53, 'Cricket', 'T20', 'CSK', 'KKR', '2021-04-21 19:30:00', 'Completed', '2021-04-27 10:25:35', NULL, '2021-04-27 10:25:35'),
(54, 'Cricket', 'T20', 'RR', 'RCB', '2021-04-22 19:30:00', 'Completed', '2021-04-27 10:26:39', NULL, '2021-04-27 10:26:39'),
(55, 'Cricket', 'T20', 'MI', 'PBKS', '2021-04-23 19:30:00', 'Completed', '2021-04-27 10:27:18', NULL, '2021-04-27 10:27:18'),
(56, 'Cricket', 'T20', 'KKR', 'RR', '2021-04-24 19:30:00', 'Completed', '2021-04-27 10:28:03', NULL, '2021-04-27 10:28:03'),
(57, 'Cricket', 'T20', 'CSK', 'RCB', '2021-04-25 15:30:00', 'Completed', '2021-04-27 10:28:46', NULL, '2021-04-27 10:28:46'),
(58, 'Cricket', 'T20', 'DC', 'SRH', '2021-04-25 19:30:00', 'Completed', '2021-04-27 10:29:50', NULL, '2021-04-27 10:29:50'),
(59, 'Cricket', 'T20', 'PBKS', 'KKR', '2021-04-26 19:30:00', 'Completed', '2021-04-27 10:30:47', NULL, '2021-04-27 10:30:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

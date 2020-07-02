-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 04:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reporting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `finish_report`
--

CREATE TABLE `finish_report` (
  `uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `work_done` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finish_report`
--

INSERT INTO `finish_report` (`uid`, `user_id`, `fdate`, `work_done`, `created_date`, `updated_date`) VALUES
(4, 2, '2020-06-15', 'Final Reports', '2020-06-12 16:17:11', '2020-06-18 10:49:18'),
(5, 2, '2020-06-11', 'finish report', '2020-06-12 16:19:35', '2020-06-12 16:19:35'),
(6, 2, '2020-06-18', 'Finish report', '2020-06-18 10:38:57', '2020-06-18 10:38:57'),
(11, 3, '2020-06-19', 'Finish Report', '2020-06-19 08:15:04', '2020-06-19 08:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(3) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `user_id`, `hash_code`, `status`, `created_date`, `updated_date`) VALUES
(2, 2, 'b23d6daf1221617d', 1, '2020-06-29 13:34:20', '2020-06-29 13:34:20'),
(4, 2, 'c86a7e848a6cf18d', 1, '2020-06-29 13:57:56', '2020-06-29 13:57:56'),
(6, 2, '0035c51a363e56ea', 1, '2020-06-29 14:02:55', '2020-06-29 14:02:55'),
(7, 2, '9a4c993983040ad5', 1, '2020-06-29 16:10:19', '2020-06-29 16:10:19'),
(8, 2, '3f08cb5f2c998259', 1, '2020-07-01 08:52:26', '2020-07-01 08:52:26'),
(9, 2, '32ef1fc5cd3eb8bc', 1, '2020-07-01 08:59:05', '2020-07-01 08:59:05'),
(10, 2, '1ed5bffe9b03fa68', 1, '2020-07-01 09:13:14', '2020-07-01 09:13:14'),
(11, 2, '43b223d05e86fb51', 1, '2020-07-01 09:15:08', '2020-07-01 09:15:08'),
(12, 3, 'b781b9c3cd02a87b', 1, '2020-07-01 09:26:40', '2020-07-01 09:26:40'),
(13, 2, '75fd93b14b0127c4', 1, '2020-07-01 09:54:55', '2020-07-01 09:54:55'),
(14, 2, '75fd93b14b0127c4', 1, '2020-07-01 09:56:56', '2020-07-01 09:56:56'),
(15, 3, '8dd8623daaa86199', 1, '2020-07-01 17:33:13', '2020-07-01 17:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `plan_report`
--

CREATE TABLE `plan_report` (
  `uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ndate` date NOT NULL,
  `morning_plan` text COLLATE utf8_unicode_ci NOT NULL,
  `evening_plan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_report`
--

INSERT INTO `plan_report` (`uid`, `user_id`, `ndate`, `morning_plan`, `evening_plan`, `created_date`, `updated_date`) VALUES
(1, 2, '2020-06-12', 'morning reports', 'evening reports', '0000-00-00 00:00:00', '2020-06-18 10:03:14'),
(2, 2, '2020-06-11', 'morning report', 'evening report', '0000-00-00 00:00:00', '2020-06-12 15:32:24'),
(3, 3, '2020-06-11', 'morning plan detail', 'evening plan detail', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, '2020-06-11', 'morning report', 'morning report', '0000-00-00 00:00:00', '2020-06-12 08:21:04'),
(5, 2, '2020-06-11', 'morning report', 'morning report', '0000-00-00 00:00:00', '2020-06-18 10:06:35'),
(6, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:56:58', '2020-06-12 08:21:04'),
(7, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:57:17', '2020-06-12 08:21:04'),
(8, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:57:38', '2020-06-12 08:21:04'),
(9, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:57:59', '2020-06-12 08:21:04'),
(10, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:58:11', '2020-06-12 08:21:04'),
(11, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:58:30', '2020-06-12 08:21:04'),
(13, 2, '2020-06-12', 'morning report', 'evening plans', '2020-06-12 10:30:46', '2020-06-17 11:09:05'),
(14, 2, '2020-06-12', 'morning plan', 'evening report', '2020-06-12 16:10:01', '2020-06-12 16:10:01'),
(15, 2, '2020-06-15', 'Daily Report', 'Evening Report', '2020-06-15 16:06:34', '2020-06-15 16:06:34'),
(16, 2, '2020-06-17', 'Morning Plan', 'Evening report', '2020-06-17 11:04:59', '2020-06-18 09:56:17'),
(18, 3, '2020-06-17', 'morning report\r\n', 'evening report', '2020-06-17 18:55:14', '2020-07-01 14:51:58'),
(19, 2, '2020-06-18', 'morning report', 'evening reports', '2020-06-18 09:57:37', '2020-06-18 10:06:50'),
(24, 2, '2020-06-18', 'Morning Plans', 'Evening finish', '2020-06-18 21:38:28', '2020-06-18 21:38:28'),
(25, 2, '2020-06-18', 'morning reports 2', 'evening reports2', '2020-06-18 21:39:39', '2020-06-18 21:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `email`, `password`, `role`, `active`, `created_date`, `updated_date`) VALUES
(2, 'zay', 'zaylinhtike1122@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, '2020-06-11 13:39:29', '2020-07-01 09:56:57'),
(3, 'Ko Ko', 'capital.zaylinhtike@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2020-06-11 13:40:06', '2020-07-01 17:33:13'),
(4, 'Ma Ma', 'mama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 0, '2020-06-11 13:40:30', '2020-06-15 13:40:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finish_report`
--
ALTER TABLE `finish_report`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_report`
--
ALTER TABLE `plan_report`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finish_report`
--
ALTER TABLE `finish_report`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `plan_report`
--
ALTER TABLE `plan_report`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

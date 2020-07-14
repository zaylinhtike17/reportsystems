-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 03:58 AM
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
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(1, 'Yangon'),
(2, 'Mandalay');

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
(15, 2, '2020-07-13', 'finish', '2020-07-13 14:59:02', '2020-07-13 14:59:02'),
(16, 3, '2020-07-13', 'aaaafdfdfdf', '2020-07-13 14:59:33', '2020-07-13 16:36:20'),
(17, 3, '2020-07-13', 'fdfdfdfdfdf', '2020-07-13 16:36:41', '2020-07-13 16:36:41');

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
(15, 3, '8dd8623daaa86199', 1, '2020-07-01 17:33:13', '2020-07-01 17:33:13'),
(16, 0, '', 1, '2020-07-07 13:06:03', '2020-07-07 13:06:03'),
(17, 0, '', 1, '2020-07-07 13:10:12', '2020-07-07 13:10:12'),
(18, 3, '70565fc06cd5463d', 1, '2020-07-13 13:29:51', '2020-07-13 13:29:51');

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
(2, 2, '2020-07-13', 'morn', 'eve', '2020-07-13 14:58:44', '2020-07-13 14:58:44'),
(4, 3, '2020-07-13', 'dfdf', 'fdfdf', '2020-07-13 16:35:22', '2020-07-13 16:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `township` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(350) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`id`, `user_id`, `phone_no`, `township`, `city`, `profile_image`) VALUES
(26, 2, '', '', '', '12.webp'),
(27, 2, '', '', '', 'man-avatar-profile-vector-21372076.jpg'),
(29, 3, '', '', '', 'man-avatar-profile-vector-21372076.jpg'),
(30, 3, '', '', '', 'man-avatar-profile-vector-21372076.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE `township` (
  `id` int(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `township_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`id`, `city_id`, `township_name`) VALUES
(1, 1, 'Ahlone'),
(2, 1, 'Bahan'),
(3, 1, 'Botahtaung\r\n'),
(4, 1, 'Dagon Myothit(East)'),
(5, 1, 'Dagon Myothit(North)'),
(6, 1, 'Dagon Myothit(Seikkan)'),
(7, 1, 'Dagon Myothit(South)'),
(8, 1, 'Dawbon'),
(9, 1, 'Hlaing'),
(10, 1, 'Hlaingtharya'),
(11, 1, 'Insein'),
(12, 1, 'Kamaryut'),
(13, 1, 'Kyauktada'),
(14, 1, 'Kyeemyindaing'),
(15, 1, 'Lanmadaw'),
(16, 1, 'Latha'),
(17, 1, 'Mayangone'),
(18, 1, 'Mingaladon'),
(19, 1, 'Mingalartaungnyunt'),
(20, 1, 'North Okkalapa'),
(21, 1, 'Pabedan'),
(22, 1, 'Pazundaung'),
(23, 1, 'Sanchaung'),
(24, 1, 'Seikkan'),
(25, 1, 'Shwepyithar'),
(26, 1, 'South Okkalapa'),
(27, 1, 'Tamwe'),
(28, 1, 'Thaketa'),
(29, 1, 'Thingangyun'),
(30, 1, 'Yankin'),
(31, 2, 'Amarapura'),
(32, 2, 'Aungmyaythazan'),
(33, 2, 'Chanayethazan'),
(34, 2, 'Chanmyathazi'),
(35, 2, 'Mahaaungmyay'),
(36, 2, 'Patheingyi');

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
  `role_name` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `email`, `password`, `role`, `role_name`, `active`, `created_date`, `updated_date`) VALUES
(2, 'zay', 'zaylinhtike1122@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'admin', 1, '2020-06-11 13:39:29', '2020-07-10 16:47:54'),
(3, 'Ko Ko', 'capital.zaylinhtike@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'member', 1, '2020-06-11 13:40:06', '2020-07-13 13:29:52'),
(4, 'Ma Ma', 'mama@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'member', 0, '2020-06-11 13:40:30', '2020-07-10 16:32:48'),
(10, 'sss', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'member', 1, '2020-07-10 15:47:46', '2020-07-10 15:47:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finish_report`
--
ALTER TABLE `finish_report`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plan_report`
--
ALTER TABLE `plan_report`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `township`
--
ALTER TABLE `township`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

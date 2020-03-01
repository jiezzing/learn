-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 01:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `announcement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`announcement`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `admin_id`, `recipient`, `announcement`, `created`, `modified`, `status_id`) VALUES
(1, 2, 4, '{\"title\":\"Web Development\",\"description\":\"Googlge Dev Conference\",\"announcement\":\"<p><span style=\\\"color: rgb(54, 54, 55); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; letter-spacing: 0.3px;\\\">Featured above, this method saves array-formatted data. The second parameter allows you to sidestep validation, and the third allows you to supply a list of model fields to be saved. For added security, you can limit the saved fields to those listed in&nbsp;<\\/span><code class=\\\"docutils literal notranslate\\\" style=\\\"font-family: &quot;Roboto Mono&quot;, Consolas, Monaco, monospace; font-size: 15px; padding: 0px 2px; color: rgb(54, 54, 55); background-color: rgb(236, 236, 233); line-height: normal; letter-spacing: 0.3px; white-space: normal;\\\"><span class=\\\"pre\\\">$fieldList<\\/span><\\/code><span style=\\\"color: rgb(54, 54, 55); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; letter-spacing: 0.3px;\\\">. When using a&nbsp;<\\/span><code class=\\\"docutils literal notranslate\\\" style=\\\"font-family: &quot;Roboto Mono&quot;, Consolas, Monaco, monospace; font-size: 15px; padding: 0px 2px; color: rgb(54, 54, 55); background-color: rgb(236, 236, 233); line-height: normal; letter-spacing: 0.3px; white-space: normal;\\\"><span class=\\\"pre\\\">fieldList<\\/span><\\/code><span style=\\\"color: rgb(54, 54, 55); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; letter-spacing: 0.3px;\\\">&nbsp;the primary key will be included in the&nbsp;<\\/span><code class=\\\"docutils literal notranslate\\\" style=\\\"font-family: &quot;Roboto Mono&quot;, Consolas, Monaco, monospace; font-size: 15px; padding: 0px 2px; color: rgb(54, 54, 55); background-color: rgb(236, 236, 233); line-height: normal; letter-spacing: 0.3px; white-space: normal;\\\"><span class=\\\"pre\\\">fieldList<\\/span><\\/code><span style=\\\"color: rgb(54, 54, 55); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 15px; letter-spacing: 0.3px;\\\">&nbsp;automatically.<\\/span><br><\\/p>\"}', '2020-02-26 06:24:06', '2020-02-26 06:24:06', 1),
(2, 2, 2, '{\"title\":\"Test\",\"description\":\"Test\",\"announcement\":\"<p>Test<\\/p><p>Test<\\/p><p>Test<\\/p><p>Test<br><\\/p>\",\"recipient\":\"3\"}', '2020-03-01 11:19:55', '2020-03-01 11:19:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `admin_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'TLE', '2020-03-01 19:11:36', '2020-03-01 19:11:36', 2),
(2, 1, 'Home Economics', '2020-03-01 19:11:36', '2020-03-01 19:11:36', 2),
(3, 1, 'Plumbing', '2020-03-01 19:11:36', '2020-03-01 19:11:36', 2),
(4, 1, 'English', '2020-03-01 12:16:03', '2020-03-01 12:16:03', 2),
(5, 1, 'Civics', '2020-03-01 13:13:18', '2020-03-01 13:13:18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `submodules`
--

CREATE TABLE `submodules` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middle_initial` char(1) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `age` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `firstname`, `lastname`, `middle_initial`, `id_no`, `email`, `password`, `gender`, `birthdate`, `address`, `age`, `created`, `modified`, `status_id`) VALUES
(1, 2, 'Fritz Gerald', 'Dumdum', 'M', '', 'fritzgeralddumdum@yahoo.com', '29f64013cb910f08b77cd576c5212c1824466b91', NULL, NULL, NULL, 0, '2020-02-20 10:51:01', '2020-02-20 10:51:01', 1),
(2, 2, 'Relisa', 'Mongas', 'T', '', 'relis@gmail.com', '29f64013cb910f08b77cd576c5212c1824466b91', NULL, NULL, NULL, 0, '2020-02-20 11:00:16', '2020-02-20 11:00:16', 1),
(3, 2, 'Franck ', 'Dumdum', 'M', '', 'jiezzing@gmail.com', '29f64013cb910f08b77cd576c5212c1824466b91', NULL, NULL, NULL, 0, '2020-02-21 02:41:13', '2020-02-21 02:41:13', 1),
(4, 4, 'Midoriya', 'Shoto', 'A', '', 'midoriya@gmail.com', '29f64013cb910f08b77cd576c5212c1824466b91', NULL, NULL, NULL, 0, '2020-02-24 02:10:39', '2020-02-24 02:10:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'Administrator'),
(2, 'School Administrator'),
(3, 'Teacher'),
(4, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submodules`
--
ALTER TABLE `submodules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `submodules`
--
ALTER TABLE `submodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 11:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
  `univ_id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `announcement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`announcement`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `admin_id`, `univ_id`, `recipient`, `announcement`, `created`, `modified`, `status_id`) VALUES
(1, 6, 1, 1, '{\"title\":\"Web Developer\",\"description\":\"This is a test web developer\",\"announcement\":\"<p>This is a test web developer<br><\\/p>\",\"recipient\":[\"4\"]}', '2020-03-13 03:19:12', '2020-03-13 03:19:12', 1),
(2, 2, 1, 1, '{\"title\":\"Disco\",\"description\":\"There will be a big disco to be held this evening.\",\"announcement\":\"<p>There will be a big disco to be held this evening.<br><\\/p>\"}', '2020-03-13 10:20:08', '2020-03-13 10:20:08', 1),
(3, 6, 2, 1, '{\"title\":\"Web Developer\",\"description\":\"This a web developer test exam sample.\",\"announcement\":\"<p>This a web developer test exam sample.<br><\\/p>\",\"recipient\":[\"4\"]}', '2020-03-13 03:21:18', '2020-03-13 03:21:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `sub_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'EXPLORATORY k_to_12_commercial_cooking_learning_module.pdf', '2020-03-12 13:39:23', '2020-03-12 13:39:23', 2),
(2, 1, 'LM_Cookery G.9 .pdf', '2020-03-12 13:39:23', '2020-03-12 13:39:23', 2),
(3, 1, 'Marc-Lennard-Colina-Resume-2.pdf', '2020-03-12 13:39:23', '2020-03-12 13:39:23', 2),
(4, 2, 'EXPLORATORY k_to_12_commercial_cooking_learning_module.pdf', '2020-03-12 16:51:11', '2020-03-12 16:51:11', 2),
(5, 2, 'LM_Cookery G.9 .pdf', '2020-03-12 16:51:11', '2020-03-12 16:51:11', 2),
(6, 2, 'Marc-Lennard-Colina-Resume-2.pdf', '2020-03-12 16:51:11', '2020-03-12 16:51:11', 2),
(7, 3, 'EXPLORATORY k_to_12_commercial_cooking_learning_module.pdf', '2020-03-12 16:52:25', '2020-03-12 16:52:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 'Grade 1', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(2, 'Grade 2', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(3, 'Grade 3', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(4, 'Grade 4', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(5, 'Grade 5', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(6, 'Grade 6', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(7, 'Grade 7', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(8, 'Grade 8', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(9, 'Grade 9', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(10, 'Grade 10', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(11, 'Grade 11', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(12, 'Grade 12', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(13, '1st Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(14, '2nd Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(15, '3rd Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2),
(16, '4th Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 2);

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
(1, 1, 'TLE', '2020-03-09 16:33:47', '2020-03-09 16:33:47', 2),
(2, 1, 'TVE', '2020-03-12 11:55:25', '2020-03-12 11:55:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `univ_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `level_id`, `univ_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 1, 'Kamunggay', '2020-03-12 14:56:30', '2020-03-12 14:56:30', 0),
(2, 1, 1, 'Marupork', '2020-03-12 14:56:41', '2020-03-12 14:56:41', 0),
(3, 1, 1, 'Rizal Park', '2020-03-12 14:57:14', '2020-03-12 14:57:14', 2),
(4, 1, 1, 'Aguinalyes', '2020-03-12 14:57:41', '2020-03-12 14:57:41', 2),
(5, 4, 1, 'Topaz', '2020-03-12 15:05:17', '2020-03-12 15:05:17', 2),
(6, 5, 1, 'Magnanakaw', '2020-03-12 15:57:02', '2020-03-12 15:57:02', 2),
(7, 16, 1, 'Coronavirus', '2020-03-13 13:45:40', '2020-03-13 13:45:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `student_sections`
--

CREATE TABLE `student_sections` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `univ_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `access_level` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`access_level`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `univ_id`, `name`, `access_level`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'Filipino', '[\"4\"]', '2020-03-11 13:43:32', '2020-03-11 13:43:32', 2),
(2, 1, 'English', '[\"4\"]', '2020-03-11 13:44:50', '2020-03-11 13:44:50', 2),
(3, 1, 'Mathematics', '[\"2\",\"4\",\"5\"]', '2020-03-11 13:45:05', '2020-03-11 13:45:05', 2),
(4, 1, 'Science', '[\"3\"]', '2020-03-11 13:47:34', '2020-03-11 13:47:34', 2),
(5, 1, 'Araling Panlipunan', '[\"3\"]', '2020-03-11 13:47:51', '2020-03-11 13:47:51', 2),
(6, 1, 'Edukasyon sa Pagpapakatao (EsP)', '[\"3\"]', '2020-03-11 13:48:07', '2020-03-11 13:48:07', 2),
(7, 1, 'Technical Vocational Education (TVE)', '[\"3\"]', '2020-03-11 13:48:30', '2020-03-11 13:48:30', 2),
(8, 1, 'MAPEH', '[\"3\"]', '2020-03-11 13:48:35', '2020-03-11 13:48:35', 2),
(9, 1, 'Technical Trade Drawing (TTD)', '[\"3\"]', '2020-03-11 13:48:47', '2020-03-11 13:48:47', 2),
(10, 1, 'Internet and Computing Fundamentals (ICF)', '[\"16\"]', '2020-03-11 13:49:02', '2020-03-11 13:49:02', 2),
(11, 1, 'Arts', '[\"4\"]', '2020-03-11 13:50:17', '2020-03-11 13:50:17', 2);

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

--
-- Dumping data for table `submodules`
--

INSERT INTO `submodules` (`id`, `module_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'Cookery', '2020-03-09 16:34:34', '2020-03-09 16:34:34', 2),
(2, 1, 'Livelihood and Education', '2020-03-09 17:40:37', '2020-03-09 17:40:37', 2),
(3, 1, 'Commercial Cooking', '2020-03-09 17:43:12', '2020-03-09 17:43:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trivias`
--

CREATE TABLE `trivias` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `univ_id` int(11) NOT NULL,
  `trivias` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`trivias`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trivias`
--

INSERT INTO `trivias` (`id`, `user_id`, `univ_id`, `trivias`, `created`, `modified`, `status_id`) VALUES
(1, 6, 1, '{\"question\":\"Where do I live?\",\"answer\":\"Hinunagan\",\"hint\":\"Malocate ni siya sa southern part.\"}', '2020-03-13 04:00:27', '2020-03-13 04:00:27', 2),
(2, 6, 1, '{\"question\":\"Where do I live?\",\"answer\":\"Hinunagan\",\"hint\":\"Malocate ni siya sa southern part.\"}', '2020-03-13 05:58:13', '2020-03-13 05:58:13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `code`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'University of Cebu - Banilad Campus', '2020-03-04 14:54:30', '2020-03-04 14:54:30', 1),
(2, 2, 'University of Cebu - Lapu-Lapu Mandaue', '2020-03-04 14:54:30', '2020-03-04 14:54:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `univ_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `univ_id`, `firstname`, `lastname`, `middle_initial`, `about`, `email`, `password`, `image`, `gender`, `birthdate`, `address`, `age`, `created`, `modified`, `status_id`) VALUES
(1, 2, 2, 'Edsy', 'Run', NULL, NULL, 'edsy@gmail.com', '55a11c3208ca5770ad21508dbd4ce9d42de2b9d9', NULL, NULL, NULL, NULL, NULL, '2020-03-13 17:54:16', '2020-03-13 17:54:16', 1);

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
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sections`
--
ALTER TABLE `student_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submodules`
--
ALTER TABLE `submodules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trivias`
--
ALTER TABLE `trivias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_sections`
--
ALTER TABLE `student_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submodules`
--
ALTER TABLE `submodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trivias`
--
ALTER TABLE `trivias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

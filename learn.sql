-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 08:33 AM
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
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `recipient` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`recipient`)),
  `announcement` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`announcement`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `user_id`, `school_id`, `recipient`, `announcement`, `created`, `modified`, `status_id`) VALUES
(2, 1, 1, '[\"2\"]', '{\"title\":\"A Big Disco\",\"description\":\"In this example, you can see how effectively ELOQUII is announcing their new store\\u2019s location. As you can see, they start by mentioning the area of the new location and follow-up by showing an image that helps their fans refresh their memory regarding all the store locations.\",\"announcement\":\"<p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 17px; line-height: 1.6; font-family: Roboto, Arial, sans-serif; color: rgb(121, 122, 128); padding: 0px 0px 20px; border: 0px; outline: 0px; vertical-align: baseline; text-align: justify;\\\">In today\\u2019s modern world, much of our conversation happens through the medium of email. Whether it is for marketing purposes or for personal use, utilizing email\\u2019s power has proven to work better and be more efficient than other communication channels for a multitude of reasons.<br><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 17px; line-height: 1.6; font-family: Roboto, Arial, sans-serif; color: rgb(121, 122, 128); padding: 0px 0px 20px; border: 0px; outline: 0px; vertical-align: baseline; text-align: justify;\\\">Today, we\\u2019d like to center our focus around announcement email templates, the sort of which you will often see within the context of business.<br><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 17px; line-height: 1.6; font-family: Roboto, Arial, sans-serif; color: rgb(121, 122, 128); padding: 0px 0px 20px; border: 0px; outline: 0px; vertical-align: baseline; text-align: justify;\\\">What we love about announcement emails is that they are directly related to marketing, but they are also used for internal, company-related matters, such as the promotion or the resignation of an employee.<br><\\/p><p style=\\\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 17px; line-height: 1.6; font-family: Roboto, Arial, sans-serif; color: rgb(121, 122, 128); padding: 0px 0px 20px; border: 0px; outline: 0px; vertical-align: baseline; text-align: justify;\\\">For that reason, we decided to create an article where you can find templates for all the different types of announcement emails you may need to use. So, let\\u2019s get started!<\\/p>\",\"subject\":\"General Meetings\"}', '2020-03-22 10:57:14', '2020-03-22 10:57:14', 1);

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
(1, 1, 'EXPLORATORY k_to_12_commercial_cooking_learning_module.pdf', '2020-03-22 14:55:35', '2020-03-22 14:55:35', 2),
(2, 1, 'LM_Cookery G.9 .pdf', '2020-03-22 14:55:35', '2020-03-22 14:55:35', 2),
(3, 1, 'Marc-Lennard-Colina-Resume-2.pdf', '2020-03-22 14:55:35', '2020-03-22 14:55:35', 2);

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
(1, 'Grade 1', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(2, 'Grade 2', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(3, 'Grade 3', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(4, 'Grade 4', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(5, 'Grade 5', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(6, 'Grade 6', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(7, 'Grade 7', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 1),
(8, 'Grade 8', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 1),
(9, 'Grade 9', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 1),
(10, 'Grade 10', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 1),
(11, 'Grade 11', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 1),
(12, 'Grade 12', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 1),
(13, '1st Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(14, '2nd Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(15, '3rd Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0),
(16, '4th Year College', '2020-03-11 10:09:22', '2020-03-11 10:09:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `school_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'Technology and Livelihood Education', '2020-03-21 15:33:51', '2020-03-21 15:33:51', 2),
(2, 1, 'MAPEH', '2020-03-21 15:34:34', '2020-03-21 15:34:34', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `code`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 'University of Cebu - Banilad Campus', '2020-03-04 14:54:30', '2020-03-04 14:54:30', 1),
(2, 2, 'University of Cebu - Lapu-Lapu Mandaue', '2020-03-04 14:54:30', '2020-03-04 14:54:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `level_id`, `school_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 10, 1, 'Topaz', '2020-03-21 21:57:15', '2020-03-21 21:57:15', 1),
(2, 10, 1, 'Ruby', '2020-03-21 21:57:24', '2020-03-21 21:57:24', 1),
(3, 10, 1, 'Pearl', '2020-03-21 21:57:29', '2020-03-21 21:57:29', 1),
(4, 7, 1, 'Bato', '2020-03-21 21:58:41', '2020-03-21 21:58:41', 1);

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
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `access_level` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`access_level`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `school_id`, `name`, `access_level`, `created`, `modified`, `status_id`) VALUES
(3, 1, 'TLE', '[\"9\"]', '2020-03-21 16:23:38', '2020-03-21 16:23:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `submodules`
--

CREATE TABLE `submodules` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submodules`
--

INSERT INTO `submodules` (`id`, `module_id`, `school_id`, `name`, `created`, `modified`, `status_id`) VALUES
(1, 1, 1, 'Physical Education', '2020-03-21 15:34:13', '2020-03-21 15:34:13', 2),
(2, 1, 1, 'Home Economics', '2020-03-21 15:34:20', '2020-03-21 15:34:20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trivias`
--

CREATE TABLE `trivias` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `trivias` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`trivias`)),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trivias`
--

INSERT INTO `trivias` (`id`, `user_id`, `school_id`, `trivias`, `created`, `modified`, `status_id`) VALUES
(1, 1, 1, '{\"question\":\"Where do I live?\",\"answer\":\"Hinunagan\",\"hint\":\"Malocate ni siya sa southern part.\"}', '2020-03-13 04:00:27', '2020-03-13 04:00:27', 2),
(2, 1, 1, '{\"question\":\"Where do I live?\",\"answer\":\"Hinunagan\",\"hint\":\"Malocate ni siya sa southern part.\"}', '2020-03-13 05:58:13', '2020-03-13 05:58:13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
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

INSERT INTO `users` (`id`, `user_type`, `school_id`, `firstname`, `lastname`, `middle_initial`, `about`, `email`, `password`, `image`, `gender`, `birthdate`, `address`, `age`, `created`, `modified`, `status_id`) VALUES
(1, 2, 1, 'Edsy', 'Edillo', '', NULL, 'edsy@gmail.com', '55a11c3208ca5770ad21508dbd4ce9d42de2b9d9', '{\"name\":\"midoriya.jpg\",\"size\":25954}', NULL, '2020-03-12', NULL, NULL, '2020-03-16 10:46:36', '2020-03-16 10:46:36', 1),
(2, 2, 2, 'Fritz Gerald', 'Dumdum', NULL, NULL, 'jiezzing@gmail.com', '55a11c3208ca5770ad21508dbd4ce9d42de2b9d9', NULL, NULL, NULL, NULL, NULL, '2020-03-18 08:45:19', '2020-03-18 08:45:19', 1);

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
-- Indexes for table `schools`
--
ALTER TABLE `schools`
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
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submodules`
--
ALTER TABLE `submodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trivias`
--
ALTER TABLE `trivias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

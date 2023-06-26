-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 11:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhss_quiz_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `status`) VALUES
(1, 'One', 1),
(2, 'Two', 1),
(3, 'Three', 1),
(4, 'Four', 1),
(5, 'Five', 1),
(6, 'Six', 1),
(7, 'Seven', 1),
(8, 'Eight', 1),
(9, 'Nine', 1),
(10, 'Ten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(11) NOT NULL,
  `lowMCQ` int(11) NOT NULL,
  `moderateMCQ` int(11) NOT NULL,
  `highMCQ` int(11) NOT NULL,
  `lowCRQ` int(11) NOT NULL,
  `moderateCRQ` int(11) NOT NULL,
  `highCRQ` int(11) NOT NULL,
  `lowERQ` int(11) NOT NULL,
  `moderateERQ` int(11) NOT NULL,
  `highERQ` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `lowMCQ`, `moderateMCQ`, `highMCQ`, `lowCRQ`, `moderateCRQ`, `highCRQ`, `lowERQ`, `moderateERQ`, `highERQ`, `name`) VALUES
(1, 3, 2, 0, 3, 2, 0, 2, 0, 0, 'Low'),
(2, 2, 2, 1, 2, 2, 1, 1, 1, 0, 'Moderate'),
(3, 0, 2, 3, 0, 2, 3, 0, 1, 1, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `topic` text NOT NULL,
  `question` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `classId`, `subjectId`, `chapter`, `topic`, `question`, `type`, `priority`, `opt1`, `opt2`, `opt3`, `opt4`, `userId`, `date`, `status`) VALUES
(3, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 CRQ 1 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:22:30', 1),
(4, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 CRQ 2 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:23:30', 1),
(5, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 CRQ 3 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:24:09', 1),
(6, 6, 1, 1, '1.2', 'Six Computer Science 1 1.2 CRQ 4 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:24:44', 1),
(7, 6, 1, 1, '1.2', 'Six Computer Science 1 1.2 CRQ 5 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:25:02', 1),
(8, 6, 1, 1, '1.2', 'Six Computer Science 1 1.2 CRQ 6 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:25:19', 1),
(9, 6, 1, 1, '1.3', 'Six Computer Science 1 1.3 CRQ 7 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:25:46', 1),
(10, 6, 1, 1, '1.3', 'Six Computer Science 1 1.3 CRQ 8 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:26:05', 1),
(11, 6, 1, 1, '1.3', 'Six Computer Science 1 1.3 CRQ 9 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:26:25', 1),
(12, 6, 1, 1, '1.4', 'Six Computer Science 1 1.4 CRQ 10 Low', 'CRQ', 'Low', '', '', '', '', 1, '2023-01-27 18:27:07', 1),
(13, 6, 1, 1, '1.4', 'Six Computer Science 1 1.4 CRQ 11 Low', 'CRQ', 'Low', '', '', '', '', 1, '2023-01-27 18:27:35', 1),
(14, 6, 1, 1, '1.4', 'Six Computer Science 1 1.4 CRQ 12 Low', 'CRQ', 'Low', '', '', '', '', 1, '2023-01-27 18:28:01', 1),
(15, 6, 1, 1, '1.5', 'Six Computer Science 1 1.5 CRQ 13 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-27 18:29:12', 1),
(16, 6, 1, 1, '1.5', 'Six Computer Science 1 1.5 CRQ 14 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-27 18:29:28', 1),
(17, 6, 1, 1, '1.5', 'Six Computer Science 1 1.5 CRQ 15 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-27 18:29:45', 1),
(18, 6, 1, 1, '1.5', 'Six Computer Science 1 1.5 CRQ 16 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-27 18:30:03', 1),
(19, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 ERQ 17 High', 'ERQ', 'High', '', '', '', '', 1, '2023-01-27 18:30:33', 1),
(20, 6, 1, 1, '1.2', 'Six Computer Science 1 1.2 ERQ 18 Moderate', 'ERQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:31:05', 1),
(21, 6, 1, 1, '1.3', 'Six Computer Science 1 1.3 ERQ 19 Low', 'ERQ', 'Low', '', '', '', '', 1, '2023-01-27 18:31:46', 1),
(22, 6, 1, 1, '1.4', 'Six Computer Science 1 1.4 ERQ 20 Moderate', 'ERQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:32:20', 1),
(23, 6, 1, 1, '1.5', 'Six Computer Science 1 1.5 ERQ 21 Moderate', 'ERQ', 'Moderate', '', '', '', '', 1, '2023-01-27 18:32:49', 1),
(24, 6, 1, 1, '1.2', 'Six Computer Science 1 1.2 ERQ 22 High', 'ERQ', 'High', '', '', '', '', 1, '2023-01-27 18:41:34', 1),
(25, 6, 1, 1, '1.3', 'Six Computer Science 1 1.3 ERQ 23 High', 'ERQ', 'High', '', '', '', '', 1, '2023-01-27 18:42:42', 1),
(26, 6, 1, 1, '1.4', 'Six Computer Science 1 1.4 ERQ 24 Low', 'ERQ', 'Low', '', '', '', '', 1, '2023-01-27 18:43:02', 1),
(27, 6, 1, 1, '1.5', 'Six Computer Science 1 1.5 ERQ 25 Low', 'ERQ', 'Low', '', '', '', '', 1, '2023-01-27 18:43:30', 1),
(28, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 26 Low', 'MCQ', 'Low', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:45:01', 1),
(29, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 27 High', 'MCQ', 'High', 'Option 1', 'Option 2', 'Option 3 ', 'Option 4', 1, '2023-01-27 18:45:35', 1),
(30, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 28 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:46:05', 1),
(31, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 29 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:46:45', 1),
(32, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 30 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:47:11', 1),
(33, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 31 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:47:50', 1),
(34, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 32 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:48:59', 1),
(35, 6, 1, 1, '1.1', 'Six Computer Science 1 1.1 MCQ 33 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-27 18:49:32', 1),
(69, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 CRQ 1 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(70, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 CRQ 2 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(71, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 CRQ 3 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(72, 6, 1, 2, '2.2', 'Six Computer Science 2 2.2 CRQ 4 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(73, 6, 1, 2, '2.2', 'Six Computer Science 2 2.2 CRQ 5 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(74, 6, 1, 2, '2.2', 'Six Computer Science 2 2.2 CRQ 6 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(75, 6, 1, 2, '2.3', 'Six Computer Science 2 2.3 CRQ 7 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(76, 6, 1, 2, '2.3', 'Six Computer Science 2 2.3 CRQ 8 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(77, 6, 1, 2, '2.3', 'Six Computer Science 2 2.3 CRQ 9 Moderate', 'CRQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(78, 6, 1, 2, '2.4', 'Six Computer Science 2 2.4 CRQ 10 Low', 'CRQ', 'Low', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(79, 6, 1, 2, '2.4', 'Six Computer Science 2 2.4 CRQ 11 Low', 'CRQ', 'Low', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(80, 6, 1, 2, '2.4', 'Six Computer Science 2 2.4 CRQ 12 Low', 'CRQ', 'Low', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(81, 6, 1, 2, '2.5', 'Six Computer Science 2 2.5 CRQ 13 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(82, 6, 1, 2, '2.5', 'Six Computer Science 2 2.5 CRQ 14 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(83, 6, 1, 2, '2.5', 'Six Computer Science 2 2.5 CRQ 15 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(84, 6, 1, 2, '2.5', 'Six Computer Science 2 2.5 CRQ 16 High', 'CRQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(85, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 ERQ 17 High', 'ERQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(86, 6, 1, 2, '2.2', 'Six Computer Science 2 2.2 ERQ 18 Moderate', 'ERQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(87, 6, 1, 2, '2.3', 'Six Computer Science 2 2.3 ERQ 19 Low', 'ERQ', 'Low', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(88, 6, 1, 2, '2.4', 'Six Computer Science 2 2.4 ERQ 20 Moderate', 'ERQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(89, 6, 1, 2, '2.5', 'Six Computer Science 2 2.5 ERQ 21 Moderate', 'ERQ', 'Moderate', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(90, 6, 1, 2, '2.2', 'Six Computer Science 2 2.2 ERQ 22 High', 'ERQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(91, 6, 1, 2, '2.3', 'Six Computer Science 2 2.3 ERQ 23 High', 'ERQ', 'High', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(92, 6, 1, 2, '2.4', 'Six Computer Science 2 2.4 ERQ 24 Low', 'ERQ', 'Low', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(93, 6, 1, 2, '2.5', 'Six Computer Science 2 2.5 ERQ 25 Low', 'ERQ', 'Low', '', '', '', '', 1, '2023-01-28 10:15:19', 1),
(94, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 26 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:19', 1),
(95, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 27 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3 ', 'Option 4', 1, '2023-01-28 10:15:19', 1),
(96, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 28 Moderate', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:19', 1),
(97, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 29 Low', 'MCQ', 'Low', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:19', 1),
(98, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 30 Moderate', 'MCQ', 'Low', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:20', 1),
(99, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 31 Low', 'MCQ', 'Moderate', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:20', 1),
(100, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 32 High', 'MCQ', 'High', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:20', 1),
(101, 6, 1, 2, '2.1', 'Six Computer Science 2 2.1 MCQ 33 High', 'MCQ', 'High', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 1, '2023-01-28 10:15:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`) VALUES
(1, 'Computer Science', 1),
(2, 'English', 1),
(3, 'Urdu', 1),
(4, 'Math', 1),
(5, 'Social Studies', 1),
(6, 'Islamiyat', 1),
(7, 'Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Jazib Ahmad', 'jazib.ahmad147@hotmail.com', '32250170a0dca92d53ec9624f336ca24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 02:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmstlee4`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt_count`
--

CREATE TABLE `attempt_count` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `time_count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `plant_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filename`, `plant_name`, `description`) VALUES
(47, 'received_1072049816788463.jpeg', 'Onion', 'This is Onion'),
(48, 'received_433050758986484.jpeg', 'Okra', 'This is okra'),
(50, 'Eggplant-Month-640x514.jpg', 'Eggplant', 'This is Eggplant'),
(57, 'received_606176561189139.jpeg', 'Squash', 'This is Squash');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`activity_log_id`, `username`, `date`, `action`, `teacher_id`) VALUES
(26, 'Maria', '2022-12-14 21:55:27', 'Edit Teacher Maria', 1234),
(27, 'Tine', '2022-12-14 21:56:59', 'Add User Tine', 1234),
(28, 'Tine', '2022-12-14 21:57:40', 'Edit Teacher Tine', 1234),
(29, 'Evelyn', '2022-12-14 21:59:55', 'Add User Evelyn', 1234),
(30, 'Jazedane', '2022-12-15 14:23:41', 'Edit Teacher Jazedane', 1234),
(31, 'Jazedane', '2022-12-15 14:24:28', 'Edit Teacher Jazedane', 1234),
(32, 'Jazedane', '2022-12-15 14:24:52', 'Edit Teacher Jazedane', 1234),
(33, 'Jazedane', '2022-12-15 14:25:19', 'Edit Teacher Jazedane', 1234),
(34, 'Hapon', '2023-01-01 21:20:33', 'Add User Hapon', 1234),
(35, 'Kilat', '2023-01-14 15:02:47', 'Add User Kilat', 1234),
(36, 'Kilat', '2023-01-14 15:05:43', 'Add User Kilat', 1234),
(37, 'ADMIN', '2023-01-14 21:12:43', 'Edit Teacher ADMIN', 1234),
(38, 'Ten', '2023-01-14 21:12:50', 'Edit Teacher Ten', 1234),
(39, 'Pon', '2023-01-14 21:58:44', 'Add User Pon', 1234),
(40, 'ADMIN', '2023-01-14 22:10:39', 'Edit Teacher ADMIN', 1234),
(41, 'Maria', '2023-01-17 20:15:41', 'Edit Teacher Maria', 1234),
(42, '22-2222', '2023-01-17 20:27:39', 'Add Student KEY KEY', 1255),
(43, '22-2222', '2023-01-17 20:46:15', 'Edit Student KEY KEY', 1255),
(44, '12-3', '2023-01-17 20:47:28', 'Add Student MAR MAR', 1255),
(45, '12-3', '2023-01-17 20:48:59', 'Edit Student MAR MAR', 1255),
(46, '12-3', '2023-01-17 20:49:28', 'Edit Student MAR MAR', 1255),
(47, '22-2222', '2023-01-17 20:54:10', 'Edit Student KEY KEY', 1255);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`, `year`, `section`, `isDeleted`) VALUES
(2230, 'GRADE 10 - LOVE', 10, 'LOVE', 0),
(2232, 'GRADE 10 - HOPE', 10, 'HOPE', 0),
(2260, 'GRADE 10 - TECHNOLOGY', 10, 'TECHNOLOGY', 0),
(2261, 'GRADE 8 - EINSTEIN', 8, 'SAME', 0),
(2267, 'GRADE 9 - NIGHT', 9, 'NIGHT', 0),
(2274, 'GRADE 10 - SAMPLE', 10, 'SAMPLE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade_category`
--

CREATE TABLE `tbl_grade_category` (
  `grade_category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `impact_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_grade_category`
--

INSERT INTO `tbl_grade_category` (`grade_category_id`, `category_name`, `class_id`, `impact_percentage`) VALUES
(200, 'Activity', 2230, 60),
(201, 'Project', 2232, 10),
(226, 'Activity', 2232, 60),
(227, 'Project', 2230, 10),
(228, 'Activity', 2257, 10),
(229, 'Activity', 2260, 40),
(231, 'Quiz', 2260, 10),
(232, 'Project', 2260, 20),
(233, 'Summative Test', 2260, 10),
(234, 'Exam', 2260, 20),
(235, 'Activity', 2261, 60),
(238, 'Quiz', 2230, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `message_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`message_id`, `receiver_id`, `content`, `date_sended`, `sender_id`, `receiver_name`, `sender_name`, `message_status`) VALUES
(121, 22, 'hey', '2022-09-15 19:37:50', 1234, 'Aurelia Hackett', 'Admin Admin', ''),
(123, 22, 'Hello student', '2022-09-19 09:09:18', 1234, 'Aurelia Hackett', '', 'read'),
(302, 36, 'hey', '2022-10-10 21:54:55', 1234, 'Maria Luz', 'Admin Admin', ''),
(306, 36, 'hello maria ', '2022-10-11 10:37:56', 1234, 'Maria Luz', 'Admin Admin', ''),
(307, 0, '', '2022-10-30 10:28:38', 1234, ' ', 'ROSALIE JAENA', ''),
(308, 0, '', '2022-10-30 10:28:40', 1234, ' ', 'ROSALIE JAENA', ''),
(315, 46, 'Hello arnel', '2022-11-03 21:51:14', 1234, 'ARNEL AMION', 'ROSALIE JAENA', ''),
(322, 46, 'hi student', '2022-11-08 14:54:42', 1234, 'ARNEL AMION', 'ROSALIE JAENA', ''),
(333, 87, 'Hello mic                             ', '2022-11-21 14:04:15', 1234, 'MIC MIC', '', ''),
(335, 87, 'hello                                    ', '2022-11-21 14:12:47', 1234, 'MIC MIC', ' ', ''),
(337, 87, 'hello again', '2022-11-21 14:13:50', 1234, 'MIC MIC', 'ROSALIE JAENA', ''),
(349, 58, 'Hey', '2022-11-24 10:24:15', 1234, 'TIN TIN', 'ROSALIE JAENA', ''),
(351, 58, 'Hi                               ', '2022-11-24 10:27:14', 1234, 'TIN TIN', ' ', ''),
(359, 58, 'Hey', '2022-11-27 23:52:18', 1234, 'TIN TIN', 'ROSALIE JAENA', ''),
(360, 58, 'Hey student                              ', '2022-11-27 23:55:39', 1234, 'TIN TIN', ' ', ''),
(361, 92, 'Hello                                  ', '2022-11-28 00:19:07', 1234, 'B B', ' ', ''),
(363, 97, 'hello', '2022-11-28 12:44:57', 1234, 'RENA MAE MANLANGIT', 'ROSALIE JAENA', 'read'),
(364, 1234, 'Hi', '2022-11-30 02:31:49', 97, 'ROSALIE JAENA', 'RENA MAE MANLANGIT', 'read'),
(390, 92, 'hi', '2022-12-30 18:23:08', 1234, 'B BEN', ' ', ''),
(391, 91, 'hi', '2022-12-30 18:26:55', 1234, 'MARIA LUZ SARTORIO', ' ', 'read'),
(400, 91, 'hello', '2023-01-04 21:06:03', 1234, 'MARIA LUZ SARTORIO', 'ROSALIE JAENA', 'read'),
(401, 1234, 'Hello', '2023-01-04 21:06:36', 91, 'ROSALIE JAENA', 'MARIA LUZ SARTORIO', 'read'),
(403, 1234, 'Hello maam', '2023-01-04 21:07:45', 91, 'ROSALIE JAENA', 'MARIA LUZ SARTORIO', 'read'),
(404, 0, 'hi --=12', '2023-01-04 21:10:05', 1234, ' ', ' ', ''),
(405, 0, '                                    ', '2023-01-04 21:11:20', 1234, ' ', ' ', ''),
(406, 0, '                                    ', '2023-01-04 21:11:50', 1234, ' ', ' ', ''),
(407, 0, 'ADQWDQW', '2023-01-04 21:11:58', 1234, ' ', ' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_sent`
--

CREATE TABLE `tbl_message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_sent`
--

INSERT INTO `tbl_message_sent` (`message_sent_id`, `receiver_id`, `content`, `date_sended`, `sender_id`, `receiver_name`, `sender_name`) VALUES
(2, 22, 'hi', '2022-09-14 22:39:43', 22, 'Admin Admin', 'Aurelia Hackett'),
(185, 1234, 'hey ad', '2022-10-10 21:55:23', 36, 'Admin Admin', 'Maria Luz'),
(187, 1234, 'hello admin', '2022-10-11 10:37:05', 36, 'Admin Admin', ' '),
(198, 1234, 'hello maam', '2022-11-03 22:14:16', 46, 'ROSALIE JAENA', 'ARNEL AMION'),
(216, 1234, 'hello im mic', '2022-11-21 14:04:35', 87, 'ROSALIE JAENA', 'MIC MIC'),
(220, 1234, 'hi again', '2022-11-21 14:14:15', 87, 'ROSALIE JAENA', 'MIC MIC'),
(237, 1242, 'hi                     ', '2022-11-26 00:35:11', 90, 'Jaze Dane', ' '),
(238, 1234, 'Hi                                  ', '2022-11-27 23:28:24', 58, 'ROSALIE JAENA', ' '),
(240, 1234, 'Hi ma,am                                    ', '2022-11-27 23:29:01', 58, 'ROSALIE JAENA', ' '),
(244, 1234, '                                    Hi mam', '2022-11-28 12:44:36', 97, 'ROSALIE JAENA', ' '),
(245, 97, 'hello', '2022-11-28 12:44:57', 1234, 'RENA MAE MANLANGIT', 'ROSALIE JAENA'),
(246, 1234, 'Hi', '2022-11-30 02:31:50', 97, 'ROSALIE JAENA', 'RENA MAE MANLANGIT'),
(264, 104, 'Hi', '2022-12-15 13:37:25', 1242, 'TIN TIN', 'JAZE DANE'),
(273, 91, 'hi', '2022-12-30 18:26:55', 1234, 'MARIA LUZ SARTORIO', ' '),
(282, 91, 'hello', '2023-01-04 21:06:03', 1234, 'MARIA LUZ SARTORIO', 'ROSALIE JAENA'),
(283, 1234, 'Hello', '2023-01-04 21:06:36', 91, 'ROSALIE JAENA', 'MARIA LUZ SARTORIO'),
(285, 1234, 'Hello maam', '2023-01-04 21:07:46', 91, 'ROSALIE JAENA', 'MARIA LUZ SARTORIO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `broadcaster_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `message`, `link`, `date`, `broadcaster_id`, `receiver_id`, `is_read`) VALUES
(563, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:29', 1234, 64, 0),
(564, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:29', 1234, 65, 0),
(565, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:29', 1234, 66, 0),
(566, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:30', 1234, 88, 0),
(567, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:30', 1234, 89, 0),
(568, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 36, 0),
(569, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 58, 0),
(570, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 64, 0),
(571, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 65, 1),
(572, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 66, 0),
(573, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 88, 0),
(574, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:45:33', 1234, 89, 0),
(575, 'New Activity Added: <b>Task</b>', 'task_student.php?id=57', '2022-11-26 01:04:47', 1242, 90, 0),
(577, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=60', '2022-11-28 00:23:26', 1234, 92, 1),
(579, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 93, 0),
(581, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 92, 1),
(582, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 94, 0),
(583, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 95, 0),
(584, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 96, 0),
(585, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 97, 1),
(586, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 98, 0),
(589, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 93, 0),
(591, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 92, 1),
(592, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 94, 0),
(593, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 95, 0),
(594, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 96, 0),
(595, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 97, 0),
(596, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 98, 0),
(599, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 93, 0),
(601, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 92, 1),
(602, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 94, 0),
(603, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 95, 0),
(604, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 96, 0),
(605, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 97, 0),
(606, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 98, 0),
(607, 'submit activity name <b>Activity 1</b>', 'view_submit_task.php?id=60&post_id=194', '2022-11-29 04:18:34', 97, 1234, 1),
(608, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 93, 0),
(609, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 91, 1),
(610, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 92, 1),
(611, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 94, 0),
(612, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 95, 0),
(613, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 96, 0),
(614, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 97, 0),
(615, 'New Activity Added: <b>Exam</b>', 'task_student.php?id=60', '2022-11-29 15:08:39', 1234, 98, 0),
(616, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:08:59', 1234, 93, 0),
(617, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 91, 1),
(618, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 92, 1),
(619, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 94, 0),
(620, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 95, 0),
(621, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 96, 0),
(622, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 97, 0),
(623, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-29 15:09:00', 1234, 98, 0),
(624, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:31', 1234, 93, 0),
(625, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:31', 1234, 91, 1),
(626, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:32', 1234, 92, 1),
(627, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:32', 1234, 94, 0),
(628, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:32', 1234, 95, 0),
(629, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:32', 1234, 96, 0),
(630, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:32', 1234, 97, 0),
(631, 'New Activity Added: <b>Summative Test</b>', 'task_student.php?id=60', '2022-11-29 15:09:32', 1234, 98, 0),
(632, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:26', 1234, 93, 0),
(634, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:26', 1234, 92, 1),
(635, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:26', 1234, 94, 0),
(636, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:26', 1234, 95, 0),
(637, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:26', 1234, 96, 0),
(638, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:26', 1234, 97, 0),
(639, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-11-29 15:21:27', 1234, 98, 0),
(640, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:23', 1234, 93, 0),
(642, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:24', 1234, 92, 1),
(643, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:24', 1234, 94, 0),
(644, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:24', 1234, 95, 0),
(645, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:24', 1234, 96, 0),
(646, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:24', 1234, 97, 0),
(647, 'New Activity Added: <b>Test</b>', 'task_student.php?id=60', '2022-11-29 15:22:24', 1234, 98, 0),
(648, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:53', 1234, 93, 0),
(649, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 91, 1),
(650, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 92, 1),
(651, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 94, 0),
(652, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 95, 0),
(653, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 96, 0),
(654, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 97, 0),
(655, 'New Activity Added: <b>Quiz 3</b>', 'task_student.php?id=60', '2022-11-29 15:22:54', 1234, 98, 0),
(659, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:09', 1234, 93, 0),
(661, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:10', 1234, 92, 1),
(662, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:10', 1234, 94, 0),
(663, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:10', 1234, 95, 0),
(664, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:10', 1234, 96, 0),
(665, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:10', 1234, 97, 0),
(666, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:47:10', 1234, 98, 0),
(667, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 93, 0),
(668, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 91, 1),
(669, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 92, 1),
(670, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 94, 0),
(671, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 95, 0),
(672, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 96, 0),
(673, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 97, 0),
(674, 'New Activity Added: <b>Quiz 2</b>', 'task_student.php?id=60', '2022-12-07 20:49:28', 1234, 98, 0),
(676, 'The Task <b></b> has been graded. You received a grade of <b>30</b>.', 'submit_task.php?id=&post_id=', '2022-12-08 20:47:39', 1234, 0, 0),
(678, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:35', 1234, 93, 0),
(680, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:36', 1234, 92, 1),
(681, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:36', 1234, 94, 0),
(682, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:36', 1234, 95, 0),
(683, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:36', 1234, 96, 0),
(684, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:36', 1234, 97, 0),
(685, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:00:36', 1234, 98, 0),
(686, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:46', 1234, 93, 0),
(688, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:46', 1234, 92, 1),
(689, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:46', 1234, 94, 0),
(690, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:47', 1234, 95, 0),
(691, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:47', 1234, 96, 0),
(692, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:47', 1234, 97, 0),
(693, 'New Activity Added: <b>Sample 5</b>', 'task_student.php?id=60', '2022-12-08 23:02:47', 1234, 98, 0),
(694, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 93, 0),
(696, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 92, 1),
(697, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 94, 0),
(698, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 95, 0),
(699, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 96, 0),
(700, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 97, 0),
(701, 'New Activity Added: <b>Sample 4</b>', 'task_student.php?id=60', '2022-12-08 23:05:06', 1234, 98, 0),
(702, 'The Task <b></b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 22:46:27', 1234, 0, 0),
(703, 'The Task <b></b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 22:47:59', 1234, 0, 0),
(704, 'The Task <b></b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 22:49:38', 1234, 70, 0),
(705, 'The Task <b></b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 22:50:55', 1234, 0, 0),
(706, 'The Task <b></b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 22:52:28', 1234, 0, 0),
(707, 'The Task <b></b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:03:04', 1234, 0, 0),
(708, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:03:45', 1234, 0, 0),
(709, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:04:26', 1234, 0, 0),
(710, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:04:46', 1234, 0, 0),
(711, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:05:34', 1234, 0, 0),
(712, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:06:17', 1234, 0, 0),
(713, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:06:45', 1234, 0, 0),
(714, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:07:13', 1234, 0, 0),
(715, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:08:29', 1234, 0, 0),
(716, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:08:32', 1234, 0, 0),
(717, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:09:13', 1234, 0, 0),
(718, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&id=', '2022-12-10 23:09:45', 1234, 0, 0),
(719, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:10:18', 1234, 0, 0),
(720, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:10:36', 1234, 0, 0),
(721, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:11:10', 1234, 0, 0),
(722, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:12:17', 1234, 0, 0),
(723, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:12:36', 1234, 0, 0),
(724, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:12:50', 1234, 0, 0),
(725, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:13:06', 1234, 0, 0),
(726, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:13:36', 1234, 0, 0),
(727, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:17:04', 1234, 0, 0),
(728, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:18:04', 1234, 0, 0),
(729, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:18:24', 1234, 70, 0),
(730, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:20:09', 1234, 70, 0),
(731, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:21:55', 1234, 70, 0),
(732, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:22:21', 1234, 70, 0),
(733, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:23:17', 1234, 70, 0),
(734, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:24:03', 1234, 70, 0),
(735, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=&post_id=', '2022-12-10 23:24:29', 1234, 70, 0),
(736, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?student_task_id=70', '2022-12-10 23:26:53', 1234, 70, 0),
(737, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:07:32', 1234, 0, 0),
(738, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=<br />\r\n<b>Warning</b>:  Undefined variable $id in <b>C:Phphtdocslmstlee4adminedi', '2022-12-11 02:09:29', 1234, 0, 0),
(739, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:09:55', 1234, 0, 0),
(740, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:10:28', 1234, 0, 0),
(741, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:10:35', 1234, 0, 0),
(742, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:50:38', 1234, 0, 0),
(743, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:52:24', 1234, 0, 0),
(744, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=&post_id=199', '2022-12-11 02:52:46', 1234, 0, 0),
(745, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:52:54', 1234, 0, 0),
(746, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:53:27', 1234, 0, 0),
(747, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:54:29', 1234, 70, 0),
(748, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:54:52', 1234, 70, 0),
(749, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:57:15', 1234, 70, 0),
(750, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:57:49', 1234, 70, 0),
(751, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:59:33', 1234, 0, 0),
(752, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 02:59:48', 1234, 70, 0),
(753, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:02:14', 1234, 0, 0),
(754, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:02:18', 1234, 0, 0),
(755, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:12:57', 1234, 0, 0),
(756, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:15:17', 1234, 0, 0),
(757, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:17:09', 1234, 0, 0),
(758, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:17:46', 1234, 70, 0),
(759, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:22:20', 1234, 70, 0),
(760, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:22:49', 1234, 70, 0),
(761, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:23:50', 1234, 60, 0),
(762, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:24:24', 1234, 0, 0),
(763, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:25:32', 1234, 60, 0),
(764, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:25:51', 1234, 0, 0),
(765, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:26:45', 1234, 0, 0),
(766, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:27:20', 1234, 0, 0),
(767, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:27:35', 1234, 0, 0),
(768, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:27:49', 1234, 0, 0),
(769, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:28:11', 1234, 0, 0),
(770, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:28:41', 1234, 0, 0),
(771, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:30:38', 1234, 0, 0),
(772, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:30:56', 1234, 0, 0),
(773, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:31:54', 1234, 0, 0),
(774, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:32:09', 1234, 0, 0),
(775, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:34:13', 1234, 0, 0),
(776, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:38:59', 1234, 0, 0),
(777, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 03:43:55', 1234, 0, 0),
(778, 'The Task <b>Project</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 11:05:50', 1234, 91, 1),
(779, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-11 11:08:36', 1234, 91, 1),
(780, 'New Activity Added: <b>Activity Einstein</b>', 'task_student.php?id=61', '2022-12-15 12:08:54', 1242, 104, 0),
(781, 'New Activity Added: <b>Activity Einstein</b>', 'task_student.php?id=61', '2022-12-15 12:08:54', 1242, 108, 0),
(782, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 102, 0),
(783, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 91, 1),
(784, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 92, 1),
(785, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 94, 0),
(786, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 96, 0),
(787, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 97, 0),
(788, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=60', '2022-12-17 20:11:31', 1234, 98, 0),
(790, 'submit task name <b>Summative Test 1</b>', 'view_submit_task.php?id=60&post_id=200', '2022-12-18 12:48:15', 91, 1234, 1),
(800, 'The Task <b>Activity 1</b> has been graded. You received a grade of <b>30</b>.', 'submit_task.php?id=60&post_id=194', '2022-12-18 13:27:02', 1234, 91, 1),
(801, 'The Task <b>Project</b> has been graded. You received a grade of <b>50</b>.', 'submit_task.php?id=60&post_id=199', '2022-12-18 13:29:57', 1234, 91, 1),
(802, 'The Task <b>Exam</b> has been graded. You received a grade of <b>40</b>.', 'submit_task.php?id=60&post_id=198', '2022-12-18 13:30:14', 1234, 91, 1),
(803, 'The Task <b>Quiz 1</b> has been graded. You received a grade of <b>30</b>.', 'submit_task.php?id=60&post_id=197', '2022-12-18 13:30:38', 1234, 91, 1),
(806, 'The Task <b>Activity 2</b> has been graded. You received a grade of <b>10</b>.', 'submit_task.php?id=60&post_id=210', '2022-12-18 13:31:52', 1234, 91, 1),
(807, 'The Task <b>Activity 2</b> has been graded. You received a grade of <b>10</b>.', 'submit_task.php?id=60&post_id=210', '2022-12-18 13:33:33', 1234, 91, 1),
(808, 'submit task name <b>Activity 1</b>', 'view_submit_task.php?id=60&post_id=194', '2022-12-18 13:38:56', 91, 1234, 1),
(809, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:39', 1234, 102, 0),
(810, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:39', 1234, 91, 1),
(811, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:39', 1234, 92, 1),
(812, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:40', 1234, 94, 0),
(813, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:40', 1234, 96, 0),
(814, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:40', 1234, 97, 0),
(815, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=60', '2022-12-18 15:17:40', 1234, 98, 0),
(827, 'The Task <b>Activity 3</b> has been graded. You received a grade of <b>30</b>.', 'submit_task.php?id=60&post_id=211', '2022-12-18 20:55:40', 1234, 91, 1),
(828, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 102, 0),
(829, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 91, 1),
(830, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 92, 1),
(831, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 94, 0),
(832, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 96, 0),
(833, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 97, 0),
(834, 'New Task Added: <b>Project 2</b>', 'task_student.php?id=60', '2022-12-18 21:00:16', 1234, 98, 0),
(835, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:06', 1234, 102, 0),
(836, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:07', 1234, 91, 1),
(837, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:07', 1234, 92, 1),
(838, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:07', 1234, 94, 0),
(839, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:07', 1234, 96, 0),
(840, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:07', 1234, 97, 0),
(841, 'New Task Added: <b>Project 3</b>', 'task_student.php?id=60', '2022-12-19 14:14:07', 1234, 98, 0),
(848, 'submit task name <b>Project 3</b>', 'view_submit_task.php?id=60&post_id=213', '2023-01-01 16:34:31', 91, 1234, 1),
(850, 'submit task name <b>Project 2</b>', 'view_submit_task.php?id=60&post_id=212', '2023-01-02 21:59:26', 91, 1234, 1),
(852, 'submit task name <b>Activity 2</b>', 'view_submit_task.php?id=60&post_id=210', '2023-01-04 21:52:33', 91, 1234, 1),
(853, 'submit task name <b>Activity 3</b>', 'view_submit_task.php?id=60&post_id=211', '2023-01-04 22:30:37', 91, 1234, 1),
(854, 'The Task <b>Project 2</b> has been graded. You received a grade of <b>20</b>.', 'submit_task.php?id=60&post_id=212', '2023-01-08 15:18:45', 1234, 91, 1),
(855, 'The Task <b>Project 3</b> has been graded. You received a grade of <b>15</b>.', 'submit_task.php?id=60&post_id=213', '2023-01-08 15:19:26', 1234, 91, 1),
(856, 'submit task name <b>Sample</b>', 'view_submit_task.php?id=60&post_id=196', '2023-01-15 15:17:30', 91, 1234, 1),
(857, 'submit task name <b>Exam</b>', 'view_submit_task.php?id=60&post_id=198', '2023-01-15 15:18:19', 91, 1234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE `tbl_school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`school_year_id`, `school_year`) VALUES
(1, '2022-2023'),
(10, '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_no` bigint(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `birthdate`, `address`, `phone_no`, `email`, `nationality`, `class_id`, `username`, `password`, `location`, `status`, `isDeleted`) VALUES
(47, 'JADE RICK', 'CASU', 'CASUYON', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0039', 'c9f7f85910ab95a7e4970db249426b6a2bd927605885858f21c2c454bee94c7e', 'NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(45, 'JEFFREY', 'ALIJA', 'ALINDAJAO', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0037', '6901de3b7598c8a38f72a564e074bdbbb03cad1d3744587af1e8497898f58f6d', 'NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1),
(46, 'ARNEL', 'AMION', 'AMION', 'MALE', 16, '0000-00-00', '', 0, '', '', 2230, '22-0038', '024944d08fd86b5fda0026172dfc62303d104b46321f0c9985ac205213b39f96', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(48, 'JOHN FERNAND', 'DADA', 'DADA', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0040', '7d9627c5913cc68090580a239b531f518f6ad086936d96013d3682aa3f6c6136', 'NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(110, 'MARRY', 'ME', 'ME', 'MALE', 20, '0000-00-00', '', 0, '', '', 2261, '44-4444', '4d84f13234092bdc60e2e87f889336302ba66920f6364523803f2fb0b63de205', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(113, 'JAY', 'JAY', 'JAY', 'MALE', 20, '0000-00-00', '', 0, '', '', 2232, '22-1', '92ddc502d22881a4e9f6b7a9347430b12eec2881c3aad0a274ba8edafc34af20', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(109, 'BIN', 'BIN', 'BIN', 'MALE', 18, '0000-00-00', '', 0, '', '', 2232, '24-4444', 'fe82e4b48aeac39907bb11317e1480c2e39e41987c7fb621d886ac0a7dc32a76', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(107, 'HAPON', 'HAPON', 'HAPON', 'MALE', 20, '0000-00-00', '', 0, '', '', 2261, '23-4444', '21b8e134bab5d86102379698f70a703860fabcb88c03a3aa21cf1284aacfce53', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(104, 'TIN', 'TIN', 'TIN', 'MALE', 18, '0000-00-00', '', 0, '', '', 2261, '23-3334', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(91, 'MARIA LUZ', 'BACONGON', 'SARTORIO', 'FEMALE', 23, '1999-11-25', '', 9123456788, '', '', 2260, '22-2222', '51609286fb7f6089e0a0a418355949c791e84870ae2523093ba00bb3ecff7f8e', '7787_File_IMG_20220823_114206.jpg', 'Registered', 0),
(92, 'B', 'TEN', 'BEN', 'MALE', 18, '0000-00-00', '', 0, '', '', 2260, '12-3456', '6700869c8ff7480e34a70a708b028700dbaa3a033b5652b903afe89f49a31456', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(87, 'MIC', 'MIC', 'MIC', 'MALE', 18, '0000-00-00', '', 0, '', '', 2230, '55-5555', 'c947b6a42f0a5b2ad781f60bc50af20bc77514b0e52ae4d0e95f5d8145ff1cc2', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(94, 'KKK', 'KAY', 'KKK', 'FEMALE', 20, '0000-00-00', '', 0, '', '', 2260, '22-0000', '8254c329a92850f6d539dd376f4816ee2764517da5e0235514af433164480d7a', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(96, 'JAN', 'JAN', 'JAN', 'MALE', 17, '0000-00-00', '', 0, '', '', 2260, '34-5678', '82717b14ffa62b3aa4f94e43bd3db1560f5dce3af061d285d8661e202526226f', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(97, 'RENA MAE', 'MAE', 'MANLANGIT', 'FEMALE', 22, '0000-00-00', '', 9375555453, '', '', 2260, '22-9999', '2658e71049c5dce8bf013249aca7cc5aace0f71774fff6136d23bac0baea39c5', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(98, 'EVELYN', 'EVE', 'ESCALICAS', 'FEMALE', 22, '0000-00-00', '', 0, '', '', 2260, '22-1000', '5dcd11b40da180f3974ce441cd8e1c64a9137d29e12655a2dc896b4abc991843', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(123, 'MAR', 'MAR', 'MAR', 'MALE', 20, '0000-00-00', '', 0, '', '', 2274, '12-3', '0fd4f1bb53c18bd6f310a3b2d358d71bb54d7670e86798936490125ce9d56a71', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(122, 'KEY', 'KEY', 'KEY', 'FEMALE', 18, '0000-00-00', '', 0, '', '', 2274, '22-2222', '1bc2a73b1b4d90aa926e042ad9a70d28aa39b6bc4764167f04b8c69faf27c880', 'NO-IMAGE-AVAILABLE.jpg', 'Registered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_task`
--

CREATE TABLE `tbl_student_task` (
  `student_task_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_file` varchar(250) NOT NULL,
  `task_date_upload` datetime NOT NULL,
  `task_description` varchar(1000) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_status` tinyint(4) NOT NULL,
  `end_date` datetime NOT NULL DEFAULT current_timestamp(),
  `feedback` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `impact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_task`
--

INSERT INTO `tbl_student_task` (`student_task_id`, `task_id`, `task_file`, `task_date_upload`, `task_description`, `task_name`, `task_status`, `end_date`, `feedback`, `student_id`, `grade`, `total_points`, `impact`) VALUES
(49, 186, '/lmstlee4/admin/uploads/8944_File_2830_File_FB_IMG_15752135345599416.jpg', '2022-11-24 09:59:29', 'This is my sample', 'Sample', 5, '2022-11-20 23:54:29', '', 58, 20, 0, 0),
(50, 189, '/lmstlee4/admin/uploads/3022_File_2830_File_FB_IMG_15752135345599416.jpg', '2022-11-24 10:04:01', 'This is activity 1', 'Activity 1', 0, '2022-11-24 10:04:01', '', 58, 0, 0, 0),
(51, 194, '/lmstlee4/admin/uploads/1437_File_Tree1.png', '2022-12-18 13:38:56', '<span style=\"font-family: Impact;\">This is my activity</span>', 'Activity 1', 3, '2022-11-28 01:36:01', '<p><b><span style=\"font-family: \"Times New Roman\";\" times=\"\" new=\"\" roman\";\"=\"\">Well Done</span></b></p>', 91, 30, 0, 0),
(53, 196, '/lmstlee4/admin/uploads/2151_File_2377_File_received_784964352798660.jpeg', '2023-01-15 15:17:30', 'Sample student', 'Sample', 3, '2022-11-28 14:36:28', '<b>Try Send Again</b>', 91, 35, 0, 0),
(70, 199, '/lmstlee4/admin/uploads/7872_File_Eggplant-Month-640x514.jpg', '2022-12-07 21:55:04', '<p><br></p>', 'Project', 3, '2022-12-07 21:55:04', '<p><b style=\"background-color: rgb(0, 255, 0);\">Excellent</b></p>', 91, 50, 0, 0),
(71, 197, '', '2022-12-08 20:14:45', '', 'Quiz 1', 3, '2022-12-08 20:14:45', '<p><span style=\"background-color: rgb(0, 255, 0); font-family: Impact;\"><b>Done</b></span></p>', 91, 30, 0, 0),
(72, 198, '/lmstlee4/admin/uploads/1444_File_3243_File_Eggplant-Month-640x514.jpg', '2023-01-15 15:18:19', '', 'Exam', 3, '2022-12-09 15:15:10', '<font color=\"#0000ff\"><b>Perfect</b></font>', 91, 40, 0, 0),
(73, 210, '/lmstlee4/admin/uploads/1847_File_1651_File_received_606176561189139.jpeg', '2023-01-04 21:52:33', '', 'Activity 2', 3, '2022-12-17 21:09:12', '', 91, 10, 0, 0),
(79, 200, '/lmstlee4/admin/uploads/3947_File_Tree1.png', '2022-12-18 13:00:59', '<p>Test</p>', 'Summative Test', 3, '2022-12-18 13:00:59', '', 91, 100, 0, 0),
(93, 211, '/lmstlee4/admin/uploads/7956_File_2377_File_received_784964352798660.jpeg', '2023-01-04 22:30:37', '<p><b>This is my Activity 3</b></p>', 'Activity 3', 3, '2022-12-18 20:37:01', '', 91, 30, 0, 0),
(94, 213, '/lmstlee4/admin/uploads/4922_File_index4.jpg', '2023-01-01 16:34:31', '<p><b style=\"background-color: rgb(0, 255, 0);\">This is my Project 3</b></p>', 'Project 3', 3, '2022-12-19 14:16:49', '<p><span style=\"background-color: rgb(255, 255, 0); font-family: Impact;\"><b>Please send again</b></span></p>', 91, 15, 0, 0),
(96, 198, '', '2022-12-30 21:31:28', '', '', 3, '2022-12-30 21:31:28', '', 92, 30, 0, 0),
(97, 212, '/lmstlee4/admin/uploads/3243_File_Eggplant-Month-640x514.jpg', '2023-01-02 21:59:26', '', 'Project 2', 3, '2023-01-02 21:55:43', '', 91, 20, 0, 0),
(98, 198, '', '2023-01-08 15:04:44', '', '', 3, '2023-01-08 15:04:44', '', 96, 30, 0, 0),
(99, 198, '', '2023-01-08 15:09:33', '', '', 3, '2023-01-08 15:09:33', '', 94, 10, 0, 0),
(100, 200, '/lmstlee4/dist/img/no-attachment.jpg', '2023-01-15 17:19:31', '', '', 3, '2023-01-15 17:19:31', '', 94, 90, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `subject_title`) VALUES
(123, 'TLE10', 'Technology, Education and Livelihood');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `task_id` int(11) NOT NULL,
  `task_file` varchar(250) NOT NULL,
  `date_upload` datetime NOT NULL,
  `task_desc` varchar(1000) NOT NULL,
  `task_status` tinyint(2) NOT NULL,
  `end_date` datetime NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `total_points` int(11) NOT NULL,
  `grade_category_id` int(11) NOT NULL,
  `quarter` tinyint(4) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `task_file`, `date_upload`, `task_desc`, `task_status`, `end_date`, `teacher_id`, `class_id`, `task_name`, `total_points`, `grade_category_id`, `quarter`, `isDeleted`) VALUES
(81, 'uploads/sample.docx', '2022-08-15 01:24:32', 'Task1', 1, '2022-10-01 00:00:00', 123, 2223, 'Task number 1', 0, 0, 0, 1),
(185, '', '2022-11-20 23:45:59', 'Activity 1', 0, '2022-11-27 12:45:00', 1234, 28, 'Activity 1', 60, 200, 1, 0),
(186, '', '2022-11-20 23:46:48', 'Sample', 0, '2022-11-26 11:46:00', 1234, 29, 'Sample', 30, 201, 1, 0),
(187, '', '2022-11-21 14:19:39', 'This is sample 2', 0, '2022-11-26 02:19:00', 1234, 29, 'Sample 2', 50, 226, 2, 0),
(194, '', '2022-11-28 00:23:26', 'Please send Activity 1', 0, '2022-12-03 12:01:00', 1234, 60, 'Activity 1', 30, 229, 1, 0),
(195, '', '2022-11-28 12:38:10', 'Send a Project', 0, '2022-12-03 12:38:00', 1234, 60, 'Project', 50, 230, 1, 1),
(196, '', '2022-11-28 14:34:55', 'Sample', 0, '2022-12-03 02:34:00', 1234, 60, 'Sample', 40, 229, 1, 0),
(197, '', '2022-11-29 03:12:39', 'quiz', 0, '2022-12-10 12:00:00', 1234, 60, 'Quiz 1', 30, 231, 1, 0),
(198, '', '2022-11-29 15:08:39', '', 0, '2022-11-29 03:08:00', 1234, 60, 'Exam', 40, 234, 1, 0),
(199, '', '2022-11-29 15:09:00', '', 0, '2022-11-29 03:08:00', 1234, 60, 'Project', 50, 232, 1, 0),
(200, '', '2022-11-29 15:09:32', '', 0, '2022-11-29 03:09:00', 1234, 60, 'Summative Test', 100, 233, 1, 0),
(201, '', '2022-11-29 15:21:27', '', 0, '2022-11-30 03:21:00', 1234, 60, 'Quiz 2', 50, 231, 1, 1),
(203, '', '2022-11-29 15:22:54', '', 0, '2022-12-01 03:22:00', 1234, 60, 'Quiz 3', 30, 231, 1, 1),
(210, '', '2022-12-17 20:11:31', '', 0, '2022-12-18 08:11:00', 1234, 60, 'Activity 2', 20, 229, 2, 0),
(211, '', '2022-12-18 15:17:40', '', 0, '2022-12-19 03:17:00', 1234, 60, 'Activity 3', 30, 229, 2, 0),
(212, '', '2022-12-18 21:00:16', '', 0, '2022-12-25 12:00:00', 1234, 60, 'Project 2', 40, 232, 2, 0),
(213, '', '2022-12-19 14:14:07', '<p><b>Send a Project 3</b></p>', 0, '2022-12-23 12:00:00', 1234, 60, 'Project 3', 30, 232, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `education` varchar(300) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone_no` bigint(25) NOT NULL,
  `department` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(200) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `education`, `skills`, `address`, `birthdate`, `gender`, `phone_no`, `department`, `nationality`, `location`, `about`, `teacher_stat`, `isDeleted`, `is_superadmin`) VALUES
(1234, 'ADMIN', '23908401df1c879155ba712ab94b383e6db1d25c064ae5e1b285928e7792f8da', 'ROSALIE', 'PIOQUINTO', 'JAENA', 'admin@admin.com', '', '', 'Bug-Ang, Toboso', '2022-10-12', 'FEMALE', 9123456788, 'TLE', 'Filipino', 'received_472195831476549.webp', '', 'ACTIVATED', 0, 1),
(1242, 'Jazedane', '20bff4e3daba64b0c151ff275496b79a129db808edd1446362bc124de66b9dbb', 'JAZE', 'DANE', 'DANE', '', '', '', '', '2022-11-13', 'MALE', 0, '', '', 'haikyu.jpg', '', 'ACTIVATED', 0, 0),
(1252, 'Tin', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'TIN', 'TIN', 'TIN', '', '', '', '', '2022-11-13', 'Male', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'ACTIVATED', 0, 0),
(1255, 'Maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627', 'MARIA', 'BACONGON', 'SARTORIO', '', '', '', '', '2022-11-13', 'Female', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'ACTIVATED', 0, 0),
(1267, 'Ten', 'e4432baa90819aaef51d2a7f8e148bf7e679610f3173752fabb4dcb2d0f418d3', 'TEN', 'TEN', 'TEN', '', '', '', '', '0000-00-00', 'Female', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'DEACTIVATED', 0, 0),
(1272, 'Kilat', 'f834e0687cfb128c59f7470608363369fc17f3ee8228c2cdfe2848712d15474b', 'RENA MAE', 'MAE', 'MANLANGIT', '', '', '', '', '0000-00-00', 'FEMALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'DEACTIVATED', 0, 0),
(1273, 'Pon', '7857afe20170f373cee227e461a46a5d9df448d196c8dd32bdf7fc61afa3155c', 'HAPON', 'PON', 'TEN', '', '', '', '', '0000-00-00', 'MALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'DEACTIVATED', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_class`
--

CREATE TABLE `tbl_teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_class`
--

INSERT INTO `tbl_teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year_id`, `isDeleted`) VALUES
(28, 1234, 2230, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(29, 1234, 2232, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(30, 1, 2232, 123, '/lmstlee4/admin/uploads/thumbnails.png', 2022, 0),
(31, 1234, 2235, 123, '/lmstlee4/admin/uploads/thumbnails.png', 2022, 0),
(32, 1242, 2235, 123, '/lmstlee4/admin/uploads/thumbnails.png', 2022, 0),
(46, 1234, 2234, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(47, 1234, 2248, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(57, 1242, 2257, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(58, 1242, 2258, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(60, 1234, 2260, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(61, 1242, 2261, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(62, 1234, 2262, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(63, 1234, 2263, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(64, 1234, 2264, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(65, 1234, 2265, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(66, 1234, 2266, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(67, 1242, 2267, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(68, 1234, 2268, 0, '/lmstlee4/admin/uploads/thumbnails.png', 0, 0),
(69, 1234, 2269, 0, '/lmstlee4/admin/uploads/thumbnails.png', 0, 0),
(70, 1234, 2270, 0, '/lmstlee4/admin/uploads/thumbnails.png', 0, 0),
(71, 1234, 2271, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(72, 1234, 2272, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(73, 1234, 2273, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0),
(74, 1255, 2274, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_class_student`
--

CREATE TABLE `tbl_teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_class_student`
--

INSERT INTO `tbl_teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`, `isDeleted`) VALUES
(43, 23, 36, 1242, 0),
(46, 28, 45, 1234, 1),
(47, 28, 46, 1234, 0),
(48, 28, 47, 1234, 0),
(49, 28, 48, 1234, 0),
(59, 29, 58, 1234, 0),
(86, 29, 65, 1234, 1),
(87, 29, 66, 1234, 0),
(96, 29, 76, 1234, 0),
(104, 28, 84, 1234, 0),
(107, 28, 87, 1234, 0),
(109, 29, 89, 1234, 0),
(110, 56, 36, 1242, 1),
(118, 60, 91, 1234, 0),
(122, 60, 95, 1234, 0),
(123, 60, 96, 1234, 0),
(124, 60, 97, 1234, 0),
(125, 60, 98, 1234, 0),
(126, 60, 99, 1234, 0),
(127, 60, 100, 1234, 0),
(128, 60, 101, 1234, 0),
(129, 60, 102, 1234, 0),
(130, 60, 103, 1234, 0),
(131, 61, 104, 1242, 0),
(132, 61, 105, 1242, 0),
(133, 61, 106, 1242, 0),
(134, 67, 107, 1242, 0),
(135, 61, 108, 1242, 0),
(136, 29, 109, 1234, 0),
(137, 61, 110, 1242, 0),
(138, 61, 111, 1242, 0),
(139, 67, 112, 1242, 0),
(140, 29, 113, 1234, 0),
(141, 60, 114, 1234, 0),
(142, 60, 115, 1234, 0),
(143, 60, 116, 1234, 0),
(144, 60, 117, 1234, 0),
(145, 60, 118, 1234, 0),
(146, 74, 119, 1255, 0),
(147, 74, 120, 1255, 0),
(148, 74, 121, 1255, 0),
(149, 74, 122, 1255, 0),
(150, 74, 123, 1255, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_log`
--

CREATE TABLE `tbl_teacher_log` (
  `teacher_log_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_date` datetime NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_log`
--

INSERT INTO `tbl_teacher_log` (`teacher_log_id`, `username`, `login_date`, `teacher_id`) VALUES
(1, 'Admin', '2022-11-27 00:52:20', 1234),
(2, 'Admin', '2022-11-27 01:09:30', 1234),
(3, 'Admin', '2022-11-27 01:25:04', 1234),
(4, 'Admin', '2022-11-27 18:48:17', 1234),
(5, 'Jazedane', '2022-11-27 23:59:49', 1242),
(6, 'Admin', '2022-11-28 11:26:53', 1234),
(7, 'Admin', '2022-11-28 12:34:17', 1234),
(8, 'Admin', '2022-11-28 14:27:08', 1234),
(9, 'Jazedane', '2022-11-28 23:31:49', 1242),
(10, 'Jazedane', '2022-11-28 23:49:33', 1242),
(11, 'Admin', '2022-11-28 23:51:17', 1234),
(12, 'Admin', '2022-11-28 23:51:54', 1234),
(13, 'Admin', '2022-11-28 23:53:15', 1234),
(14, 'Jazedane', '2022-11-28 23:55:50', 1242),
(15, 'Admin', '2022-11-28 23:56:04', 1234),
(16, 'Tin', '2022-11-29 00:01:35', 1252),
(17, 'Jazedane', '2022-11-29 00:04:00', 1242),
(18, 'Jazedane', '2022-11-29 00:44:18', 1242),
(19, 'Admin', '2022-11-29 00:44:26', 1234),
(20, 'Jazedane', '2022-11-29 00:44:44', 1242),
(21, 'Jazedane', '2022-11-29 01:14:28', 1242),
(22, 'Admin', '2022-11-29 01:36:59', 1234),
(23, 'Jazedane', '2022-11-29 01:37:12', 1242),
(24, 'Jazedane', '2022-11-29 01:37:12', 1242),
(25, 'Admin', '2022-11-29 10:28:56', 1234),
(26, 'Jazedane', '2022-11-29 10:30:36', 1242),
(27, 'Maria', '2022-11-29 15:39:47', 1255),
(28, 'Jazedane', '2022-11-30 00:59:29', 1242),
(29, 'Jazedane', '2022-11-30 00:59:30', 1242),
(30, 'Admin', '2022-11-30 14:34:50', 1234),
(31, 'Admin', '2022-12-04 16:16:58', 1234),
(32, 'Admin', '2022-12-07 14:03:26', 1234),
(33, 'Admin', '2022-12-08 20:04:05', 1234),
(34, 'Admin', '2022-12-09 15:05:35', 1234),
(35, 'Ten', '2022-12-09 23:42:07', 1267),
(36, 'Admin', '2022-12-10 19:51:20', 1234),
(37, 'Admin', '2022-12-10 20:25:46', 1234),
(38, 'Admin', '2022-12-11 11:00:55', 1234),
(39, 'Admin', '2022-12-14 19:00:57', 1234),
(40, 'Tin', '2022-12-14 19:14:16', 1252),
(41, 'Ten', '2022-12-14 19:17:27', 1267),
(42, 'Maria', '2022-12-14 21:25:51', 1255),
(43, 'Maria', '2022-12-14 21:27:02', 1255),
(44, 'Maria', '2022-12-14 21:55:47', 1255),
(45, 'Tine', '2022-12-14 21:57:52', 1268),
(46, 'Admin', '2022-12-15 08:38:29', 1234),
(47, 'Jazedane', '2022-12-15 08:38:52', 1242),
(48, 'Admin', '2022-12-15 13:44:55', 1234),
(49, 'Jazedane', '2022-12-15 14:25:30', 1242),
(50, 'Admin', '2022-12-17 19:50:31', 1234),
(51, 'Admin', '2022-12-18 12:19:30', 1234),
(52, 'Tin', '2022-12-18 22:53:04', 1252),
(53, 'Maria', '2022-12-18 22:53:31', 1255),
(54, 'Jazedane', '2022-12-18 22:53:51', 1242),
(55, 'Admin', '2022-12-19 13:25:37', 1234),
(56, 'Admin', '2022-12-19 22:06:59', 1234),
(57, 'Admin', '2022-12-25 14:51:25', 1234),
(58, 'Admin', '2022-12-26 20:55:17', 1234),
(59, 'Admin', '2022-12-29 17:10:50', 1234),
(60, 'Admin', '2022-12-29 22:51:58', 1234),
(61, 'Admin', '2022-12-29 22:53:26', 1234),
(62, 'Admin', '2022-12-29 22:57:29', 1234),
(63, 'Admin', '2022-12-30 16:25:17', 1234),
(64, 'Admin', '2022-12-30 16:32:50', 1234),
(65, 'Admin', '2022-12-30 16:36:46', 1234),
(66, 'Admin', '2022-12-30 17:21:41', 1234),
(67, 'Admin', '2022-12-30 17:26:24', 1234),
(68, 'Admin', '2022-12-30 17:38:52', 1234),
(69, 'Admin', '2022-12-30 17:45:06', 1234),
(70, 'Admin', '2022-12-30 17:47:32', 1234),
(71, 'Admin', '2022-12-30 21:56:21', 1234),
(72, 'Maria', '2022-12-30 22:16:33', 1255),
(73, 'Admin', '2022-12-30 22:22:34', 1234),
(74, 'Admin', '2022-12-30 22:52:32', 1234),
(75, 'Admin', '2022-12-31 21:47:50', 1234),
(76, 'Jazedane', '2022-12-31 22:00:18', 1242),
(77, 'Jazedane', '2022-12-31 22:56:42', 1242),
(78, 'Jazedane', '2022-12-31 22:58:59', 1242),
(79, 'Jazedane', '2022-12-31 23:01:13', 1242),
(80, 'Jazedane', '2022-12-31 23:05:58', 1242),
(81, 'Jazedane', '2022-12-31 23:07:15', 1242),
(82, 'Admin', '2023-01-01 14:44:40', 1234),
(83, 'Jazedane', '2023-01-01 14:44:59', 1242),
(84, 'Admin', '2023-01-01 17:56:10', 1234),
(85, 'Jazedane', '2023-01-01 22:45:24', 1242),
(86, 'Admin', '2023-01-02 19:56:10', 1234),
(87, 'Admin', '2023-01-03 13:05:31', 1234),
(88, 'Admin', '2023-01-04 13:08:48', 1234),
(89, 'Admin', '2023-01-04 13:23:55', 1234),
(90, 'Admin', '2023-01-04 16:24:03', 1234),
(91, 'Admin', '2023-01-08 13:51:28', 1234),
(92, 'Admin', '2023-01-08 17:27:32', 1234),
(93, 'Jazedane', '2023-01-08 18:35:31', 1242),
(94, 'Admin', '2023-01-08 21:28:32', 1234),
(95, 'Admin', '2023-01-08 21:35:33', 1234),
(96, 'Admin', '2023-01-09 15:21:25', 1234),
(97, 'Admin', '2023-01-09 19:34:48', 1234),
(98, 'Admin', '2023-01-09 20:56:47', 1234),
(99, 'Jazedane', '2023-01-09 21:17:55', 1242),
(100, 'Admin', '2023-01-12 13:33:53', 1234),
(101, 'Admin', '2023-01-12 20:59:05', 1234),
(102, 'Admin', '2023-01-14 15:01:21', 1234),
(103, 'Admin', '2023-01-14 15:47:45', 1234),
(104, 'Admin', '2023-01-14 16:54:17', 1234),
(105, 'Admin', '2023-01-14 16:58:47', 1234),
(106, 'Admin', '2023-01-14 17:00:36', 1234),
(107, 'Admin', '2023-01-14 17:13:14', 1234),
(108, 'Admin', '2023-01-15 13:05:35', 1234),
(109, 'Admin', '2023-01-15 20:49:24', 1234),
(110, 'Admin', '2023-01-16 10:25:09', 1234),
(111, 'Admin', '2023-01-16 10:29:51', 1234),
(112, 'Admin', '2023-01-16 11:22:34', 1234),
(113, 'Admin', '2023-01-16 11:27:02', 1234),
(114, 'Admin', '2023-01-16 15:50:26', 1234),
(115, 'Maria', '2023-01-17 19:46:47', 1255),
(116, 'Admin', '2023-01-17 19:57:12', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt_count`
--
ALTER TABLE `attempt_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_grade_category`
--
ALTER TABLE `tbl_grade_category`
  ADD PRIMARY KEY (`grade_category_id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  ADD PRIMARY KEY (`student_task_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tbl_teacher_class`
--
ALTER TABLE `tbl_teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `tbl_teacher_class_student`
--
ALTER TABLE `tbl_teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `tbl_teacher_log`
--
ALTER TABLE `tbl_teacher_log`
  ADD PRIMARY KEY (`teacher_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt_count`
--
ALTER TABLE `attempt_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2275;

--
-- AUTO_INCREMENT for table `tbl_grade_category`
--
ALTER TABLE `tbl_grade_category`
  MODIFY `grade_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=858;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1274;

--
-- AUTO_INCREMENT for table `tbl_teacher_class`
--
ALTER TABLE `tbl_teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_teacher_class_student`
--
ALTER TABLE `tbl_teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tbl_teacher_log`
--
ALTER TABLE `tbl_teacher_log`
  MODIFY `teacher_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
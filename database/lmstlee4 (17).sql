-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:41 PM
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
(34, 'FB_IMG_15752132570449006.jpg', 'Pinya', 'This is pinya'),
(36, 'FB_IMG_15752132794137984.jpg', 'Kamatis', 'This is kamatis'),
(39, 'FB_IMG_15752133884258148.jpg', 'Apple', 'This is Apple'),
(42, 'FB_IMG_15752133842884300.jpg', 'Okra', 'this is okra');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'admin', '2022-08-15 10:00:01', 'Add Student 22-0001'),
(3, '', '2022-09-18 20:23:40', 'Edit Teacher Admin'),
(4, '', '2022-09-18 20:25:00', 'Add User 111-1111'),
(5, '', '2022-10-11 09:24:49', 'Add User 111'),
(20, 'Maria', '2022-10-26 19:22:46', 'Add User Maria'),
(21, '', '2022-10-30 14:14:42', 'Edit Teacher ADMIN'),
(22, '', '2022-10-31 10:55:56', 'Add User '),
(23, '', '2022-10-31 11:03:02', 'Add User '),
(24, '', '2022-10-31 11:08:46', 'Add User '),
(25, '', '2022-10-31 11:34:52', 'Add User '),
(26, '', '2022-10-31 12:01:19', 'Add User '),
(27, '', '2022-10-31 12:17:46', 'Add User '),
(28, '', '2022-10-31 12:22:04', 'Add User '),
(29, '', '2022-10-31 15:10:03', 'Add User '),
(30, 'Tin', '2022-10-31 15:37:09', 'Add User Tin'),
(31, 'Mortimer', '2022-10-31 16:05:38', 'Add User Mortimer'),
(32, 'Maria', '2022-10-31 20:25:44', 'Add User Maria'),
(33, 'Maria', '2022-10-31 20:38:37', 'Add User Maria'),
(34, 'Tine', '2022-11-08 23:05:05', 'Add User Tine'),
(35, 'hapon', '2022-11-08 23:28:15', 'Add User hapon'),
(36, 'jeffrey', '2022-11-08 23:28:35', 'Add User jeffrey'),
(37, 'Hapon', '2022-11-11 19:44:44', 'Add User Hapon'),
(38, 'admin', '2022-11-12 10:50:35', 'Add User admin'),
(39, '', '2022-11-12 14:03:34', 'Edit Teacher admin'),
(40, 'Jazedane', '2022-11-12 14:06:47', 'Add User Jazedane'),
(41, '', '2022-11-13 22:57:22', 'Edit Teacher Jazedane'),
(42, '', '2022-11-13 22:57:43', 'Edit Teacher Tin'),
(43, '', '2022-11-13 22:57:54', 'Edit Teacher Maria'),
(44, '', '2022-11-13 22:59:57', 'Edit Teacher ADMIN'),
(45, '', '2022-11-18 20:22:01', 'Edit Teacher ADMIN'),
(46, '', '2022-11-18 20:22:10', 'Edit Teacher ADMIN'),
(47, '', '2022-11-18 20:22:15', 'Edit Teacher ADMIN'),
(48, '', '2022-11-18 20:22:21', 'Edit Teacher ADMIN'),
(49, '', '2022-11-18 20:22:30', 'Edit Teacher ADMIN'),
(50, '', '2022-11-18 20:22:59', 'Edit Teacher ADMIN'),
(51, '', '2022-11-18 20:23:03', 'Edit Teacher ADMIN'),
(52, '', '2022-11-18 20:23:11', 'Edit Teacher ADMIN'),
(53, '', '2022-11-18 20:23:16', 'Edit Teacher ADMIN'),
(54, '', '2022-11-18 20:23:22', 'Edit Teacher ADMIN'),
(55, '', '2022-11-18 20:23:26', 'Edit Teacher ADMIN'),
(56, 'ADMIN', '2022-11-18 20:24:36', 'Edit Teacher ADMIN'),
(57, 'Ten', '2022-11-21 01:33:55', 'Add User Ten'),
(58, 'Ten', '2022-11-21 01:36:04', 'Edit Teacher Ten'),
(59, 'Ben', '2022-11-21 13:55:52', 'Add User Ben'),
(60, 'Mar', '2022-11-21 13:56:26', 'Add User Mar'),
(61, 'ADMIN', '2022-11-21 21:47:54', 'Edit Teacher ADMIN');

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
(2230, 'GRADE 10 - LOVE', 0, 'LOVE', 0),
(2232, 'GRADE 10 - HOPE', 0, 'HOPE', 0),
(2234, 'GRADE 10 - WISDOM', 0, '', 1),
(2235, 'Grade 9 - DIAMOND', 0, 'DIAMOND', 1),
(2236, 'GRADE 9 - SAMPLE', 0, '', 1);

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
(207, 'Activity', 0, 40),
(216, 'Project', 0, 30),
(226, 'Activity', 2232, 60),
(227, 'Project', 2230, 10);

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
(123, 22, 'Hello student', '2022-09-19 09:09:18', 1234, 'Aurelia Hackett', '', ''),
(302, 36, 'hey', '2022-10-10 21:54:55', 1234, 'Maria Luz', 'Admin Admin', 'read'),
(306, 36, 'hello maria ', '2022-10-11 10:37:56', 1234, 'Maria Luz', 'Admin Admin', 'read'),
(307, 0, '', '2022-10-30 10:28:38', 1234, ' ', 'ROSALIE JAENA', ''),
(308, 0, '', '2022-10-30 10:28:40', 1234, ' ', 'ROSALIE JAENA', ''),
(309, 0, '', '2022-10-30 10:29:21', 1234, ' ', 'ROSALIE JAENA', ''),
(315, 46, 'Hello arnel', '2022-11-03 21:51:14', 1234, 'ARNEL AMION', 'ROSALIE JAENA', ''),
(322, 46, 'hi student', '2022-11-08 14:54:42', 1234, 'ARNEL AMION', 'ROSALIE JAENA', ''),
(333, 87, 'Hello mic                             ', '2022-11-21 14:04:15', 1234, 'MIC MIC', '', ''),
(335, 87, 'hello                                    ', '2022-11-21 14:12:47', 1234, 'MIC MIC', ' ', ''),
(337, 87, 'hello again', '2022-11-21 14:13:50', 1234, 'MIC MIC', 'ROSALIE JAENA', ''),
(341, 1234, 'Heyyo', '2022-11-21 20:24:09', 58, 'ROSALIE JAENA', 'Tin Tin', ''),
(345, 58, 'hey', '2022-11-21 20:53:40', 1234, 'Tin Tin', 'ROSALIE JAENA', ''),
(346, 58, 'Heylo                                    ', '2022-11-21 20:54:34', 1234, 'Tin Tin', ' ', ''),
(347, 1234, 'Hey', '2022-11-21 20:55:22', 58, 'ROSALIE JAENA', 'Tin Tin', '');

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
(219, 87, 'hello again', '2022-11-21 14:13:50', 1234, 'MIC MIC', 'ROSALIE JAENA'),
(220, 1234, 'hi again', '2022-11-21 14:14:15', 87, 'ROSALIE JAENA', 'MIC MIC'),
(223, 1234, 'Heyyo', '2022-11-21 20:24:09', 58, 'ROSALIE JAENA', 'Tin Tin'),
(229, 1234, 'Hey', '2022-11-21 20:55:22', 58, 'ROSALIE JAENA', 'Tin Tin');

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
(378, 'New Task Added: <b>Sample</b>', 'task_student.php?id=15', '2022-10-10 22:24:38', 1234, 22, 0),
(379, 'New Task Added: <b>Sample</b>', 'task_student.php?id=15', '2022-10-10 22:24:38', 1234, 36, 1),
(380, 'submit task name <b>MariaLuz.jpg</b>', 'view_submit_task.php?id=15&post_id=156', '2022-10-10 22:25:36', 36, 1234, 1),
(385, 'New Task Added: <b>Task</b>', 'task_student.php?id=15', '2022-10-10 23:38:01', 1234, 22, 0),
(386, 'New Task Added: <b>Task</b>', 'task_student.php?id=15', '2022-10-10 23:38:01', 1234, 36, 1),
(387, 'submit task name <b>MariaTask</b>', 'view_submit_task.php?id=15&post_id=159', '2022-10-10 23:39:40', 36, 1234, 1),
(390, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=15', '2022-10-15 22:17:00', 1234, 22, 0),
(391, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=15', '2022-10-15 22:17:00', 1234, 36, 1),
(392, 'The Task <b>MariaTask</b> has been graded. You received a grade of <b>80</b>.', 'submit_task.php?id=15&post_id=159', '2022-10-16 22:36:09', 1234, 36, 1),
(393, 'New Task Added: <b>Test</b>', 'task_student.php?id=15', '2022-10-17 23:46:13', 1234, 22, 0),
(394, 'New Task Added: <b>Test</b>', 'task_student.php?id=15', '2022-10-17 23:46:14', 1234, 36, 1),
(395, 'submit task name <b>Maria Luzzy</b>', 'view_submit_task.php?id=15&post_id=160', '2022-10-18 21:10:53', 36, 1234, 1),
(396, 'The Task <b>Maria Luzzy</b> has been graded. You received a grade of <b>90</b>.', 'submit_task.php?id=15&post_id=160', '2022-10-18 21:11:37', 1234, 36, 1),
(397, 'submit task name <b>Task</b>', 'view_submit_task.php?id=15&post_id=159', '2022-10-19 20:44:33', 52, 1234, 1),
(398, 'The Task <b>MariaTask</b> has been graded. You received a grade of <b>90</b>.', 'submit_task.php?id=15&post_id=159', '2022-10-19 20:45:47', 1234, 36, 1),
(399, 'The Task <b>Task</b> has been graded. You received a grade of <b>90</b>.', 'submit_task.php?id=15&post_id=159', '2022-10-19 20:46:45', 1234, 52, 1),
(400, 'submit task name <b>Jaze</b>', 'view_submit_task.php?id=15&post_id=159', '2022-10-29 22:08:39', 36, 1234, 1),
(401, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 36, 0),
(402, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 43, 0),
(403, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 44, 0),
(404, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 50, 0),
(405, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:33', 1234, 51, 0),
(421, 'New Task Added: <b>Task 4</b>', 'task_student.php?id=28', '2022-10-31 17:35:41', 1234, 47, 0),
(422, 'New Task Added: <b>Task 4</b>', 'task_student.php?id=28', '2022-10-31 17:35:41', 1234, 36, 0),
(423, 'New Task Added: <b>Task 4</b>', 'task_student.php?id=28', '2022-10-31 17:35:41', 1234, 45, 0),
(424, 'New Task Added: <b>Task 4</b>', 'task_student.php?id=28', '2022-10-31 17:35:41', 1234, 46, 1),
(425, 'New Task Added: <b>Task 4</b>', 'task_student.php?id=28', '2022-10-31 17:35:41', 1234, 48, 0),
(426, 'submit task name <b>Tintask</b>', 'view_submit_task.php?id=28&post_id=166', '2022-10-31 17:42:09', 46, 1234, 1),
(427, 'The Activity <b>Tintask</b> has been graded. You received a grade of <b>90</b>.', 'submit_task.php?id=28&post_id=166', '2022-11-01 22:00:34', 1234, 46, 1),
(428, 'submit task name <b>Task 3</b>', 'view_submit_task.php?id=28&post_id=166', '2022-11-02 12:43:07', 46, 1234, 1),
(429, 'submit task name <b>Activity 3</b>', 'view_submit_task.php?id=28&post_id=166', '2022-11-03 18:22:49', 46, 1234, 1),
(430, 'submit task name <b>Activity 4</b>', 'view_submit_task.php?id=28&post_id=167', '2022-11-03 18:33:50', 46, 1234, 1),
(431, 'New Task Added: <b>Activity 5</b>', 'task_student.php?id=28', '2022-11-03 19:17:54', 1234, 47, 0),
(432, 'New Task Added: <b>Activity 5</b>', 'task_student.php?id=28', '2022-11-03 19:17:54', 1234, 45, 0),
(433, 'New Task Added: <b>Activity 5</b>', 'task_student.php?id=28', '2022-11-03 19:17:54', 1234, 46, 0),
(434, 'New Task Added: <b>Activity 5</b>', 'task_student.php?id=28', '2022-11-03 19:17:55', 1234, 48, 0),
(435, 'submit task name <b>Sample</b>', 'view_submit_task.php?id=28&post_id=166', '2022-11-03 21:17:38', 46, 1234, 1),
(436, 'submit task name <b>Sample 2</b>', 'view_submit_task.php?id=28&post_id=166', '2022-11-03 21:30:37', 46, 1234, 1),
(437, 'New Task Added: <b>Activity 6</b>', 'task_student.php?id=28', '2022-11-04 17:04:54', 1234, 47, 0),
(438, 'New Task Added: <b>Activity 6</b>', 'task_student.php?id=28', '2022-11-04 17:04:55', 1234, 45, 0),
(439, 'New Task Added: <b>Activity 6</b>', 'task_student.php?id=28', '2022-11-04 17:04:55', 1234, 46, 0),
(440, 'New Task Added: <b>Activity 6</b>', 'task_student.php?id=28', '2022-11-04 17:04:55', 1234, 48, 0),
(441, 'submit task name <b>Activity 6</b>', 'view_submit_task.php?id=28&post_id=168', '2022-11-04 17:06:11', 46, 1234, 1),
(442, 'submit activity name <b>Activity 6</b>', 'view_submit_task.php?id=28&post_id=169', '2022-11-05 22:33:52', 46, 1234, 1),
(443, 'submit activity name <b>Activity 6</b>', 'view_submit_task.php?id=28&post_id=169', '2022-11-05 22:36:00', 46, 1234, 1),
(444, 'submit activity name <b>Activity 5</b>', 'view_submit_task.php?id=28&post_id=168', '2022-11-05 22:36:41', 46, 1234, 1),
(445, 'submit activity name <b>Activity 5.1</b>', 'view_submit_task.php?id=28&post_id=168', '2022-11-05 22:46:21', 46, 1234, 1),
(446, 'submit activity name <b>Test</b>', 'view_submit_task.php?id=28&post_id=168', '2022-11-05 22:52:42', 46, 1234, 1),
(447, 'submit activity name <b>Test</b>', 'view_submit_task.php?id=28&post_id=168', '2022-11-05 22:53:26', 46, 1234, 1),
(448, 'submit activity name <b>Activity 6</b>', 'view_submit_task.php?id=28&post_id=169', '2022-11-05 22:55:26', 46, 1234, 1),
(449, 'submit activity name <b>Activity 6</b>', 'view_submit_task.php?id=28&post_id=169', '2022-11-05 22:56:53', 46, 1234, 1),
(450, 'New Task Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-05 23:04:58', 1234, 47, 0),
(451, 'New Task Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-05 23:04:58', 1234, 45, 0),
(452, 'New Task Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-05 23:04:58', 1234, 46, 0),
(453, 'New Task Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-05 23:04:59', 1234, 48, 0),
(454, 'submit activity name <b>Activity 1</b>', 'view_submit_task.php?id=28&post_id=170', '2022-11-05 23:05:55', 46, 1234, 1),
(455, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-10 13:32:26', 1234, 36, 0),
(456, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-10 13:32:26', 1234, 58, 1),
(457, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-10 13:32:26', 1234, 64, 0),
(458, 'New Activity Added: Test', 'task_student.php?id=29', '2022-11-10 21:34:19', 1234, 36, 0),
(459, 'New Activity Added: Test', 'task_student.php?id=29', '2022-11-10 21:34:19', 1234, 58, 1),
(460, 'New Activity Added: Test', 'task_student.php?id=29', '2022-11-10 21:34:19', 1234, 64, 0),
(461, 'New Activity Added: Maria Luz Mañapao', 'task_student.php?id=29', '2022-11-10 21:57:18', 1234, 36, 0),
(462, 'New Activity Added: Maria Luz Mañapao', 'task_student.php?id=29', '2022-11-10 21:57:18', 1234, 58, 1),
(463, 'New Activity Added: Maria Luz Mañapao', 'task_student.php?id=29', '2022-11-10 21:57:18', 1234, 64, 0),
(464, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=177', '2022-11-10 22:00:41', 58, 1234, 0),
(465, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=30', '2022-11-12 14:18:46', 1, 2, 0),
(466, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=30', '2022-11-12 14:18:46', 1, 18, 1),
(467, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=30', '2022-11-12 14:18:46', 1, 14, 0),
(468, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=176', '2022-11-12 15:01:26', 58, 1234, 0),
(469, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=177', '2022-11-12 15:01:57', 58, 1234, 0),
(470, 'New Activity Added: Activity 7', 'task_student.php?id=29', '2022-11-12 15:17:59', 1234, 36, 0),
(471, 'New Activity Added: Activity 7', 'task_student.php?id=29', '2022-11-12 15:17:59', 1234, 58, 1),
(472, 'New Activity Added: Activity 7', 'task_student.php?id=29', '2022-11-12 15:17:59', 1234, 64, 0),
(473, 'submit activity name <b>Maria Luz Mañapao</b>', 'view_submit_task.php?id=29&post_id=177', '2022-11-12 23:23:55', 58, 1234, 0),
(474, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-12 23:29:43', 1234, 47, 0),
(475, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-12 23:29:43', 1234, 45, 0),
(476, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-12 23:29:43', 1234, 46, 0),
(477, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-12 23:29:43', 1234, 48, 0),
(478, 'submit activity name <b>Amion Activity 1</b>', 'view_submit_task.php?id=28&post_id=180', '2022-11-12 23:32:25', 46, 1234, 0),
(479, 'submit activity name <b>Activity 1</b>', 'view_submit_task.php?id=28&post_id=180', '2022-11-12 23:34:03', 46, 1234, 0),
(480, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=28', '2022-11-12 23:37:50', 1234, 47, 0),
(481, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=28', '2022-11-12 23:37:51', 1234, 45, 0),
(482, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=28', '2022-11-12 23:37:51', 1234, 46, 0),
(483, 'New Activity Added: <b>Activity 2</b>', 'task_student.php?id=28', '2022-11-12 23:37:51', 1234, 48, 0),
(484, 'submit activity name <b>Activity 2</b>', 'view_submit_task.php?id=28&post_id=181', '2022-11-12 23:44:21', 46, 1234, 0),
(485, 'submit activity name <b>Activity 2</b>', 'view_submit_task.php?id=28&post_id=181', '2022-11-12 23:45:33', 46, 1234, 0),
(486, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=28', '2022-11-12 23:51:22', 1234, 47, 0),
(487, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=28', '2022-11-12 23:51:22', 1234, 45, 0),
(488, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=28', '2022-11-12 23:51:22', 1234, 46, 0),
(489, 'New Activity Added: <b>Activity 3</b>', 'task_student.php?id=28', '2022-11-12 23:51:22', 1234, 48, 0),
(490, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=28&post_id=182', '2022-11-12 23:52:08', 46, 1234, 0),
(491, 'submit activity name <b>Activity 3</b>', 'view_submit_task.php?id=28&post_id=182', '2022-11-12 23:53:11', 46, 1234, 0),
(492, 'submit activity name <b>Activity 2</b>', 'view_submit_task.php?id=28&post_id=181', '2022-11-13 00:20:35', 46, 1234, 0),
(493, 'submit activity name <b>Activity 2</b>', 'view_submit_task.php?id=28&post_id=181', '2022-11-13 00:21:43', 46, 1234, 0),
(494, 'submit activity name <b>Activity 3</b>', 'view_submit_task.php?id=28&post_id=182', '2022-11-13 00:22:57', 46, 1234, 1),
(495, 'submit activity name <b>Activity 3</b>', 'view_submit_task.php?id=28&post_id=182', '2022-11-13 00:23:55', 46, 1234, 1),
(496, 'New Activity Added: Sample', 'task_student.php?id=29', '2022-11-13 23:41:03', 1234, 36, 0),
(497, 'New Activity Added: Sample', 'task_student.php?id=29', '2022-11-13 23:41:03', 1234, 58, 1),
(498, 'New Activity Added: Sample', 'task_student.php?id=29', '2022-11-13 23:41:03', 1234, 64, 0),
(499, 'submit activity name <b>My Sample</b>', 'view_submit_task.php?id=29&post_id=183', '2022-11-15 00:19:09', 58, 1234, 0),
(500, 'New Activity Added: Project', 'task_student.php?id=29', '2022-11-15 13:54:58', 1234, 36, 0),
(501, 'New Activity Added: Project', 'task_student.php?id=29', '2022-11-15 13:54:58', 1234, 58, 0),
(502, 'New Activity Added: Project', 'task_student.php?id=29', '2022-11-15 13:54:58', 1234, 64, 0),
(503, 'New Activity Added: Project', 'task_student.php?id=29', '2022-11-15 13:54:59', 1234, 65, 0),
(504, 'New Activity Added: Project', 'task_student.php?id=29', '2022-11-15 13:54:59', 1234, 66, 0),
(505, 'New Activity Added: Project', 'task_student.php?id=29', '2022-11-15 13:54:59', 1234, 76, 0),
(506, 'submit activity name <b>Project</b>', 'view_submit_task.php?id=29&post_id=184', '2022-11-15 13:56:21', 58, 1234, 0),
(507, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:36:34', 1234, 0, 0),
(508, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:38:02', 1234, 47, 0),
(509, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:39:14', 1234, 0, 0),
(510, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:39:17', 1234, 0, 0),
(511, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:40:15', 1234, 47, 0),
(512, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:40:32', 1234, 47, 0),
(513, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:40:48', 1234, 47, 0),
(514, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:43:34', 1234, 47, 0),
(515, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=&post_id=', '2022-11-16 23:45:16', 1234, 47, 0),
(516, 'The Task <b>Sample</b> has been graded. You received a points of <b>35</b>.', 'submit_task.php?id=47&post_id=1234', '2022-11-16 23:46:32', 1234, 47, 0),
(517, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-20 23:45:58', 1234, 47, 0),
(518, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-20 23:45:58', 1234, 45, 0),
(519, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-20 23:45:58', 1234, 46, 0),
(520, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=28', '2022-11-20 23:45:58', 1234, 48, 0),
(521, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:47', 1234, 36, 0),
(522, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:47', 1234, 58, 0),
(523, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:47', 1234, 64, 0),
(524, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:47', 1234, 65, 0),
(525, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:47', 1234, 66, 0),
(526, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:48', 1234, 76, 0),
(527, 'submit activity name <b>Tin Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-20 23:54:29', 58, 1234, 0),
(528, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 36, 0),
(529, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 58, 0),
(530, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 64, 0),
(531, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 65, 0),
(532, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 66, 0),
(533, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 76, 0),
(534, 'New Activity Added: <b>Sample 2</b>', 'task_student.php?id=29', '2022-11-21 14:19:38', 1234, 86, 0),
(535, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=28', '2022-11-21 22:45:22', 1234, 47, 0),
(536, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=28', '2022-11-21 22:45:22', 1234, 45, 0),
(537, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=28', '2022-11-21 22:45:22', 1234, 46, 0),
(538, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=28', '2022-11-21 22:45:22', 1234, 48, 0),
(539, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=28', '2022-11-21 22:45:22', 1234, 84, 0),
(540, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=28', '2022-11-21 22:45:22', 1234, 87, 0),
(541, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-21 22:49:31', 58, 1234, 0),
(542, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-22 00:09:35', 58, 1234, 0),
(543, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-24 01:02:01', 58, 1234, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_read`
--

CREATE TABLE `tbl_notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification_read`
--

INSERT INTO `tbl_notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(131, 22, 'yes', 121),
(132, 36, 'yes', 124),
(147, 22, 'yes', 134),
(152, 36, 'yes', 165);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_read_teacher`
--

CREATE TABLE `tbl_notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification_read_teacher`
--

INSERT INTO `tbl_notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(41, 1234, 'yes', 121),
(42, 1234, 'yes', 40),
(43, 1234, 'yes', 41),
(44, 1234, 'yes', 42),
(45, 1234, 'yes', 43),
(46, 1234, 'yes', 44),
(69, 1234, 'yes', 303);

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
(1, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
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

INSERT INTO `tbl_student` (`student_id`, `firstname`, `lastname`, `gender`, `age`, `birthdate`, `address`, `phone_no`, `email`, `nationality`, `class_id`, `username`, `password`, `location`, `status`, `isDeleted`) VALUES
(47, 'JADE RICK', 'CASUYON', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0039', 'c9f7f85910ab95a7e4970db249426b6a2bd927605885858f21c2c454bee94c7e', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(36, 'ANJIE', 'ALEGARBES', 'MALE', 17, '0000-00-00', '', 0, '', '', 2232, '22-0001', 'e0d6f8e94087836656f29a7bcbc40f16607ed71c38d407f6102d9e4148b77244', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(45, 'JEFFREY', 'ALINDAJAO', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0037', '6901de3b7598c8a38f72a564e074bdbbb03cad1d3744587af1e8497898f58f6d', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(46, 'ARNEL', 'AMION', 'MALE', 16, '0000-00-00', '', 0, '', '', 2230, '22-0038', '024944d08fd86b5fda0026172dfc62303d104b46321f0c9985ac205213b39f96', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(48, 'JOHN FERNAND', 'DADA', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0040', '7d9627c5913cc68090580a239b531f518f6ad086936d96013d3682aa3f6c6136', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1),
(58, 'TIN', 'TIN', 'MALE', 18, '2010-07-16', 'Caduha-an', 9123456789, 'jaze@gmail.com', 'Filipino', 2232, '22-0060', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'uploads/FB_IMG_15752132794137984.jpg', 'Registered', 0),
(64, 'Maria', 'Mañapao', 'MALE', 20, '0000-00-00', '', 0, '', '', 2232, '1234567', '2d4431da8c0684abc04c437f36f25dc87ef62b53815b7039cf26c93fb49a3a4c', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1),
(65, 'JAZE', 'DANE', 'MALE', 25, '0000-00-00', '', 0, '', '', 2232, '22-2222', '36481fdc1518c3156425e326fc064ef167be30727cb09d9a9f19bc5934486588', 'uploads/FB_IMG_15752132719152170.jpg', 'Unregistered', 0),
(66, 'AD', 'AD', 'MALE', 20, '0000-00-00', '', 0, '', '', 2232, '22-2222', '87bbf324d20e8572be65dfc7d8a35276c858ad4e587a45f1c52cb0add1595200', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1),
(87, 'MIC', 'MIC', 'MALE', 18, '0000-00-00', '', 0, '', '', 2230, '55-5555', 'c947b6a42f0a5b2ad781f60bc50af20bc77514b0e52ae4d0e95f5d8145ff1cc2', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(88, 'BIN', 'BIN', 'MALE', 20, '0000-00-00', '', 0, '', '', 2232, '66-6666', '2f9b142bbf0d4d8b45d183cf05a93a983c372c68479a317a11a7d82447fe3019', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(89, 'LUZ', 'LUZZY', 'FEMALE', 22, '0000-00-00', '', 0, '', '', 2232, '44-4444', '157a18e038806ee9924105c83d786ceaf39ddb9402e2a8c202cc66e55c143d61', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_task`
--

CREATE TABLE `tbl_student_task` (
  `student_task_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `task_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `task_status` tinyint(4) NOT NULL,
  `p_condition` tinyint(3) NOT NULL,
  `end_date` datetime NOT NULL DEFAULT current_timestamp(),
  `feedback` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `impact` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_task`
--

INSERT INTO `tbl_student_task` (`student_task_id`, `task_id`, `floc`, `task_fdatein`, `fdesc`, `fname`, `task_status`, `p_condition`, `end_date`, `feedback`, `student_id`, `grade`, `total_points`, `impact`, `isDeleted`) VALUES
(45, 181, '/lmstlee4/admin/uploads/2175_File_FB_IMG_15752135963379941.jpg', '2022-11-13 00:21:43', 'Activity', 'Activity 2', 2, 1, '2022-11-13 00:20:35', '', 46, 45, 0, 0, 1),
(46, 182, '/lmstlee4/admin/uploads/6221_File_FB_IMG_15752132499356344.jpg', '2022-11-13 00:23:55', 'Activity 3', 'Activity 3', 3, 1, '2022-11-13 00:22:57', '', 46, 20, 0, 0, 1),
(47, 183, '/lmstlee4/admin/uploads/5142_File_moon.jpg', '2022-11-15 00:19:09', 'Sample1', 'Sample', 5, 1, '2022-11-15 00:19:09', '', 58, 40, 0, 0, 1),
(48, 184, '/lmstlee4/admin/uploads/9976_File_FB_IMG_15752132719152170.jpg', '2022-11-15 13:56:22', 'This is my project', 'Project', 5, 2, '2022-11-15 13:56:22', '', 58, 40, 0, 0, 1),
(49, 186, '/lmstlee4/admin/uploads/3202_File_1356_File_FB_IMG_15752132410870857.jpg', '2022-11-24 01:02:01', 'This is my sample', 'Sample', 5, 1, '2022-11-20 23:54:29', '', 58, 20, 0, 0, 0);

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
(123, 'TLE10', 'Technology, Education, and Livelihood');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `task_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `task_status` tinyint(2) NOT NULL,
  `p_condition` tinyint(3) NOT NULL,
  `end_date` datetime NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `total_points` int(11) NOT NULL,
  `grade_category_id` int(11) NOT NULL,
  `quarter` tinyint(4) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `floc`, `fdatein`, `fdesc`, `task_status`, `p_condition`, `end_date`, `teacher_id`, `class_id`, `fname`, `total_points`, `grade_category_id`, `quarter`, `isDeleted`) VALUES
(81, 'uploads/sample.docx', '2022-08-15 01:24:32', 'Task1', 1, 0, '2022-10-01 00:00:00', 123, 2223, 'Task number 1', 0, 0, 0, 1),
(181, '', '2022-11-12 23:37:51', '', 0, 0, '2022-11-25 12:01:00', 1234, 28, 'Activity 2', 50, 200, 0, 1),
(182, '', '2022-11-12 23:51:22', '', 0, 0, '2022-11-18 12:01:00', 1234, 28, 'Activity 3', 30, 200, 0, 1),
(183, '', '2022-11-13 23:41:03', 'Sample', 0, 0, '2022-11-19 12:01:00', 1234, 29, 'Sample', 40, 207, 0, 1),
(184, '', '2022-11-15 13:54:58', 'Project1', 0, 0, '2022-11-26 12:01:00', 1234, 29, 'Project', 40, 216, 0, 1),
(185, '', '2022-11-20 23:45:59', 'Activity 1', 0, 0, '2022-11-27 12:45:00', 1234, 28, 'Activity 1', 60, 200, 1, 0),
(186, '', '2022-11-20 23:46:48', 'Sample', 0, 0, '2022-11-26 11:46:00', 1234, 29, 'Sample', 30, 201, 1, 0),
(187, '', '2022-11-21 14:19:39', 'This is sample 2', 0, 0, '2022-11-26 02:19:00', 1234, 29, 'Sample 2', 50, 226, 2, 0),
(188, '', '2022-11-21 22:45:22', '', 0, 0, '2022-11-26 10:45:00', 1234, 28, 'Sample', 40, 202, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
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
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `email`, `education`, `skills`, `address`, `birthdate`, `gender`, `phone_no`, `department`, `nationality`, `location`, `about`, `teacher_stat`, `isDeleted`) VALUES
(1234, 'ADMIN', '23908401df1c879155ba712ab94b383e6db1d25c064ae5e1b285928e7792f8da', 'ROSALIE', 'JAENA', 'admin@admin.com', '', '', 'Toboso', '2022-10-12', 'FEMALE', 9123456789, 'TLE', 'Filipino', 'received_472195831476549.webp', '', 'Activated', 0),
(1242, 'Jazedane', '20bff4e3daba64b0c151ff275496b79a129db808edd1446362bc124de66b9dbb', 'Jaze', 'Dane', '', '', '', '', '2022-11-13', 'Male', 0, '', '', 'haikyu.jpg', '', '', 0),
(1252, 'Tin', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'Tin', 'Tin', '', '', '', '', '2022-11-13', 'Male', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 0),
(1255, 'Maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627', 'Maria', 'Sartorio', '', '', '', '', '2022-11-13', 'Female', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', '', 0),
(1256, 'Tine', 'eb8e739a0a72ead14ac2bfb01dc8c0c8261ad400d3d8bf69c5df57b170c97967', 'Tine', 'Tine', '', '', '', '', '2022-11-13', '', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1),
(1259, 'Hapon', '21b8e134bab5d86102379698f70a703860fabcb88c03a3aa21cf1284aacfce53', 'Hapon', 'Pon', '', '', '', '', '2022-11-13', '', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1),
(1260, 'Ten', 'e4432baa90819aaef51d2a7f8e148bf7e679610f3173752fabb4dcb2d0f418d3', 'Ten', 'Ten', '', '', '', '', '0000-00-00', 'FEMALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1),
(1261, 'Ben', '6700869c8ff7480e34a70a708b028700dbaa3a033b5652b903afe89f49a31456', 'BEN', 'BEN', '', '', '', '', '0000-00-00', 'MALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1),
(1262, 'Mar', '51609286fb7f6089e0a0a418355949c791e84870ae2523093ba00bb3ecff7f8e', 'MAR', 'MAR', '', '', '', '', '0000-00-00', 'FEMALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1);

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
(47, 1234, 2248, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0);

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
(48, 28, 47, 1234, 1),
(49, 28, 48, 1234, 0),
(59, 29, 58, 1234, 0),
(65, 29, 64, 1234, 1),
(86, 29, 65, 1234, 1),
(87, 29, 66, 1234, 0),
(96, 29, 76, 1234, 0),
(104, 28, 84, 1234, 0),
(105, 28, 85, 1234, 0),
(106, 28, 86, 1234, 0),
(107, 28, 87, 1234, 0),
(108, 29, 88, 1234, 0),
(109, 29, 89, 1234, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_log`
--

CREATE TABLE `tbl_teacher_log` (
  `teacher_log_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_log`
--

INSERT INTO `tbl_teacher_log` (`teacher_log_id`, `username`, `login_date`, `logout_date`, `teacher_id`) VALUES
(216, 'Admin', '2022-10-19 22:51:05', '2022-11-22 23:53:07', 1234),
(217, 'Admin', '2022-10-19 23:13:40', '2022-11-22 23:53:07', 1234),
(218, 'Admin', '2022-10-20 00:04:09', '2022-11-22 23:53:07', 1234),
(219, 'Admin', '2022-10-26 22:02:58', '2022-11-22 23:53:07', 1234),
(220, 'Admin', '2022-10-26 22:03:13', '2022-11-22 23:53:07', 1234),
(221, 'Admin', '2022-10-26 22:04:17', '2022-11-22 23:53:07', 1234),
(222, 'Jazedane', '2022-10-26 22:05:42', '2022-11-18 21:17:51', 1242),
(223, 'Admin', '2022-10-26 22:06:03', '2022-11-22 23:53:07', 1234),
(224, 'Admin', '2022-10-28 14:59:42', '2022-11-22 23:53:07', 1234),
(225, 'Admin', '2022-10-28 16:06:09', '2022-11-22 23:53:07', 1234),
(226, 'Admin', '2022-10-29 14:30:06', '2022-11-22 23:53:07', 1234),
(227, 'Admin', '2022-10-30 09:39:40', '2022-11-22 23:53:07', 1234),
(228, 'Admin', '2022-10-31 12:24:59', '2022-11-22 23:53:07', 1234),
(229, 'Admin', '2022-10-31 12:27:11', '2022-11-22 23:53:07', 1234),
(230, 'Admin', '2022-10-31 15:30:41', '2022-11-22 23:53:07', 1234),
(231, 'Admin', '2022-10-31 15:46:12', '2022-11-22 23:53:07', 1234),
(232, 'Admin', '2022-10-31 16:06:38', '2022-11-22 23:53:07', 1234),
(233, 'Maria', '2022-10-31 20:39:20', '2022-11-02 09:11:32', 1255),
(234, 'Maria', '2022-10-31 20:41:29', '2022-11-02 09:11:32', 1255),
(235, 'Maria', '2022-10-31 20:41:39', '2022-11-02 09:11:32', 1255),
(236, 'Maria', '2022-10-31 21:40:30', '2022-11-02 09:11:32', 1255),
(237, 'Maria', '2022-10-31 21:59:41', '2022-11-02 09:11:32', 1255),
(238, 'Admin', '2022-11-01 10:06:41', '2022-11-22 23:53:07', 1234),
(239, 'Admin', '2022-11-01 10:15:01', '2022-11-22 23:53:07', 1234),
(240, 'Admin', '2022-11-01 18:47:28', '2022-11-22 23:53:07', 1234),
(241, 'Maria', '2022-11-01 18:55:23', '2022-11-02 09:11:32', 1255),
(242, 'Maria', '2022-11-01 23:05:21', '2022-11-02 09:11:32', 1255),
(243, 'Maria', '2022-11-01 23:10:21', '2022-11-02 09:11:32', 1255),
(244, 'Admin', '2022-11-02 08:53:55', '2022-11-22 23:53:07', 1234),
(245, 'Maria', '2022-11-02 09:00:17', '2022-11-02 09:11:32', 1255),
(246, 'Maria', '2022-11-02 09:11:45', '', 1255),
(247, 'Admin', '2022-11-03 18:09:29', '2022-11-22 23:53:07', 1234),
(248, 'Admin', '2022-11-04 15:04:59', '2022-11-22 23:53:07', 1234),
(249, 'Admin', '2022-11-05 16:34:33', '2022-11-22 23:53:07', 1234),
(250, 'Admin', '2022-11-07 14:07:12', '2022-11-22 23:53:07', 1234),
(251, 'Admin', '2022-11-08 14:16:07', '2022-11-22 23:53:07', 1234),
(252, 'Admin', '2022-11-09 16:42:33', '2022-11-22 23:53:07', 1234),
(253, 'Admin', '2022-11-10 13:13:43', '2022-11-22 23:53:07', 1234),
(254, 'Admin', '2022-11-10 16:35:01', '2022-11-22 23:53:07', 1234),
(255, 'Admin', '2022-11-11 19:15:32', '2022-11-22 23:53:07', 1234),
(256, 'admin', '2022-11-12 10:50:41', '2022-11-12 23:16:20', 1),
(257, 'admin', '2022-11-12 10:54:19', '2022-11-12 23:16:20', 1),
(258, 'admin', '2022-11-12 10:59:25', '2022-11-12 23:16:20', 1),
(259, 'admin', '2022-11-12 11:14:38', '2022-11-12 23:16:20', 1),
(260, 'Admin', '2022-11-12 13:57:20', '2022-11-12 23:16:20', 1),
(261, 'Admin', '2022-11-12 15:03:09', '2022-11-22 23:53:07', 1234),
(262, 'Admin', '2022-11-12 23:16:32', '2022-11-22 23:53:07', 1234),
(263, 'Admin', '2022-11-13 18:25:04', '2022-11-22 23:53:07', 1234),
(264, 'Admin', '2022-11-14 17:52:38', '2022-11-22 23:53:07', 1234),
(265, 'Admin', '2022-11-15 01:05:20', '2022-11-22 23:53:07', 1234),
(266, 'Admin', '2022-11-15 10:29:36', '2022-11-22 23:53:07', 1234),
(267, 'Admin', '2022-11-16 20:08:50', '2022-11-22 23:53:07', 1234),
(268, 'Admin', '2022-11-16 20:08:53', '2022-11-22 23:53:07', 1234),
(269, 'Admin', '2022-11-17 17:22:36', '2022-11-22 23:53:07', 1234),
(270, 'Jazedane', '2022-11-17 23:21:29', '2022-11-18 21:17:51', 1242),
(271, 'Admin', '2022-11-17 23:27:12', '2022-11-22 23:53:07', 1234),
(272, 'Admin', '2022-11-18 19:59:08', '2022-11-22 23:53:07', 1234),
(273, 'Jazedane', '2022-11-18 21:07:36', '2022-11-18 21:17:51', 1242),
(274, 'Tin', '2022-11-18 21:17:59', '2022-11-18 21:19:22', 1252),
(275, 'Admin', '2022-11-18 21:19:33', '2022-11-22 23:53:07', 1234),
(276, 'Admin', '2022-11-19 11:05:09', '2022-11-22 23:53:07', 1234),
(277, 'Admin', '2022-11-20 15:58:21', '2022-11-22 23:53:07', 1234),
(278, 'Ten', '2022-11-21 01:34:25', '2022-11-21 01:36:44', 1260),
(279, 'Ten', '2022-11-21 01:35:08', '2022-11-21 01:36:44', 1260),
(280, 'Admin', '2022-11-21 01:49:45', '2022-11-22 23:53:07', 1234),
(281, 'Admin', '2022-11-21 13:44:10', '2022-11-22 23:53:07', 1234),
(282, 'Admin', '2022-11-22 11:45:25', '2022-11-22 23:53:07', 1234),
(283, 'Admin', '2022-11-22 18:14:29', '2022-11-22 23:53:07', 1234),
(284, 'Admin', '2022-11-23 19:15:52', '', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_notification`
--

CREATE TABLE `tbl_teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(200) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_notification`
--

INSERT INTO `tbl_teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `task_id`) VALUES
(40, 15, 'Submit Assignment file name <b>my_assignment</b>', '2022-08-31 12:00:50', 'view_submit_task.php', 22, 81),
(41, 15, 'Submit Task file name <b>Maria-Sample1</b>', '2022-10-02 18:14:21', 'view_submit_task.php', 36, 92),
(43, 15, 'Submit Task file name <b>Luz</b>', '2022-10-02 22:50:55', 'view_submit_task.php', 36, 88);

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
-- Indexes for table `tbl_notification_read`
--
ALTER TABLE `tbl_notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `tbl_notification_read_teacher`
--
ALTER TABLE `tbl_notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

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
-- Indexes for table `tbl_teacher_notification`
--
ALTER TABLE `tbl_teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt_count`
--
ALTER TABLE `attempt_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2257;

--
-- AUTO_INCREMENT for table `tbl_grade_category`
--
ALTER TABLE `tbl_grade_category`
  MODIFY `grade_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT for table `tbl_notification_read`
--
ALTER TABLE `tbl_notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `tbl_notification_read_teacher`
--
ALTER TABLE `tbl_notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_school_year`
--
ALTER TABLE `tbl_school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1263;

--
-- AUTO_INCREMENT for table `tbl_teacher_class`
--
ALTER TABLE `tbl_teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_teacher_class_student`
--
ALTER TABLE `tbl_teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_teacher_log`
--
ALTER TABLE `tbl_teacher_log`
  MODIFY `teacher_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `tbl_teacher_notification`
--
ALTER TABLE `tbl_teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

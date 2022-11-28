-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 09:23 PM
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
(39, 'FB_IMG_15752133884258148.jpg', 'Apple', 'This is Apple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity_log`
--

INSERT INTO `tbl_activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'D', '2022-11-29 00:54:23', 'Add User D'),
(2, 'Ten', '2022-11-29 00:56:46', 'Add User Ten'),
(3, 'B', '2022-11-29 01:00:08', 'Add User B');

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
(2257, 'GRADE 9 - DAY', 9, 'day', 1),
(2258, 'GRADE 8 - NIGHT', 8, 'NIGHT', 1),
(2260, 'GRADE 10 - TECHNOLOGY', 10, 'TECHNOLOGY', 0);

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
(231, 'Quiz', 2260, 10);

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
(349, 58, 'Hey', '2022-11-24 10:24:15', 1234, 'TIN TIN', 'ROSALIE JAENA', ''),
(351, 58, 'Hi                               ', '2022-11-24 10:27:14', 1234, 'TIN TIN', ' ', ''),
(355, 1242, 'hi                     ', '2022-11-26 00:35:11', 90, 'Jaze Dane', ' ', ''),
(357, 1234, 'Heylo', '2022-11-27 23:28:47', 58, 'ROSALIE JAENA', 'TIN TIN', ''),
(358, 1234, 'Hi ma,am                                    ', '2022-11-27 23:29:01', 58, 'ROSALIE JAENA', ' ', ''),
(359, 58, 'Hey', '2022-11-27 23:52:18', 1234, 'TIN TIN', 'ROSALIE JAENA', ''),
(360, 58, 'Hey student                              ', '2022-11-27 23:55:39', 1234, 'TIN TIN', ' ', ''),
(361, 92, 'Hello                                  ', '2022-11-28 00:19:07', 1234, 'B B', ' ', ''),
(362, 1234, '                                    Hi mam', '2022-11-28 12:44:36', 97, 'ROSALIE JAENA', ' ', ''),
(363, 97, 'hello', '2022-11-28 12:44:57', 1234, 'RENA MAE MANLANGIT', 'ROSALIE JAENA', '');

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
(241, 58, 'Hey', '2022-11-27 23:52:18', 1234, 'TIN TIN', 'ROSALIE JAENA'),
(242, 58, 'Hey student                              ', '2022-11-27 23:55:39', 1234, 'TIN TIN', ' '),
(243, 92, 'Hello                                  ', '2022-11-28 00:19:07', 1234, 'B B', ' '),
(244, 1234, '                                    Hi mam', '2022-11-28 12:44:36', 97, 'ROSALIE JAENA', ' '),
(245, 97, 'hello', '2022-11-28 12:44:57', 1234, 'RENA MAE MANLANGIT', 'ROSALIE JAENA');

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
(464, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=177', '2022-11-10 22:00:41', 58, 1234, 1),
(465, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=30', '2022-11-12 14:18:46', 1, 2, 0),
(466, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=30', '2022-11-12 14:18:46', 1, 18, 1),
(467, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=30', '2022-11-12 14:18:46', 1, 14, 0),
(468, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=176', '2022-11-12 15:01:26', 58, 1234, 1),
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
(522, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=29', '2022-11-20 23:46:47', 1234, 58, 1),
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
(543, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-24 01:02:01', 58, 1234, 0),
(544, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-24 09:48:52', 58, 1234, 0),
(545, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=186', '2022-11-24 09:59:27', 58, 1234, 0),
(546, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:05', 1234, 36, 0),
(547, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:05', 1234, 58, 0),
(548, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:05', 1234, 64, 0),
(549, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:06', 1234, 65, 0),
(550, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:06', 1234, 66, 0),
(551, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:06', 1234, 88, 0),
(552, 'New Activity Added: <b>Activity</b>', 'task_student.php?id=29', '2022-11-24 10:01:06', 1234, 89, 0),
(553, 'submit activity name <b>Activity 1</b>', 'view_submit_task.php?id=29&post_id=189', '2022-11-24 10:04:01', 58, 1234, 0),
(554, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:17', 1234, 36, 0),
(555, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:18', 1234, 58, 0),
(556, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:18', 1234, 64, 0),
(557, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:26', 1234, 65, 0),
(558, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:27', 1234, 66, 0),
(559, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:27', 1234, 88, 0),
(560, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:27', 1234, 89, 0),
(561, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:28', 1234, 36, 0),
(562, 'New Activity Added: <b>Test</b>', 'task_student.php?id=29', '2022-11-24 21:36:28', 1234, 58, 0),
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
(576, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=60', '2022-11-28 00:23:25', 1234, 91, 0),
(577, 'New Activity Added: <b>Activity 1</b>', 'task_student.php?id=60', '2022-11-28 00:23:26', 1234, 92, 1),
(578, 'submit activity name <b>Sartorio</b>', 'view_submit_task.php?id=60&post_id=194', '2022-11-28 01:36:01', 91, 1234, 0),
(579, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 93, 0),
(580, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 91, 0),
(581, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 92, 0),
(582, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 94, 0),
(583, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 95, 0),
(584, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 96, 0),
(585, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 97, 1),
(586, 'New Activity Added: <b>Project</b>', 'task_student.php?id=60', '2022-11-28 12:38:10', 1234, 98, 0),
(587, 'submit activity name <b>Kilat</b>', 'view_submit_task.php?id=60&post_id=194', '2022-11-28 12:43:08', 97, 1234, 0),
(588, 'submit activity name <b>Activity 1</b>', 'view_submit_task.php?id=60&post_id=194', '2022-11-28 12:47:55', 91, 1234, 0),
(589, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 93, 0),
(590, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 91, 0),
(591, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 92, 0),
(592, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 94, 0),
(593, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 95, 0),
(594, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 96, 0),
(595, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 97, 0),
(596, 'New Activity Added: <b>Sample</b>', 'task_student.php?id=60', '2022-11-28 14:34:55', 1234, 98, 0),
(597, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=60&post_id=196', '2022-11-28 14:36:28', 91, 1234, 0),
(598, 'submit activity name <b>Project Student</b>', 'view_submit_task.php?id=60&post_id=195', '2022-11-28 14:40:28', 91, 1234, 0),
(599, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 93, 0),
(600, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 91, 0),
(601, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 92, 0),
(602, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 94, 0),
(603, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 95, 0),
(604, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 96, 0),
(605, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 97, 0),
(606, 'New Activity Added: <b>Quiz 1</b>', 'task_student.php?id=60', '2022-11-29 03:12:39', 1234, 98, 0),
(607, 'submit activity name <b>Activity 1</b>', 'view_submit_task.php?id=60&post_id=194', '2022-11-29 04:18:34', 97, 1234, 0);

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
(45, 'JEFFREY', 'ALINDAJAO', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0037', '6901de3b7598c8a38f72a564e074bdbbb03cad1d3744587af1e8497898f58f6d', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1),
(46, 'ARNEL', 'AMION', 'MALE', 16, '0000-00-00', '', 0, '', '', 2230, '22-0038', '024944d08fd86b5fda0026172dfc62303d104b46321f0c9985ac205213b39f96', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(48, 'JOHN FERNAND', 'DADA', 'MALE', 17, '0000-00-00', '', 0, '', '', 2230, '22-0040', '7d9627c5913cc68090580a239b531f518f6ad086936d96013d3682aa3f6c6136', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(58, 'TIN', 'TIN', 'MALE', 18, '2010-07-16', 'Caduha-an', 9123456789, 'jaze@gmail.com', 'Filipino', 2232, '22-0060', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'uploads/FB_IMG_15752132794137984.jpg', 'Registered', 0),
(90, 'J', 'J', 'MALE', 20, '0000-00-00', '', 0, '', '', 2257, '12-3333', '842e12f360f822412abc2dc42bd0cc5651f8a73d04c413cd4eb44d66903c03b8', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 1),
(65, 'JAZE', 'DANE', 'MALE', 25, '0000-00-00', '', 0, '', '', 2232, '22-2222', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'uploads/FB_IMG_15752132719152170.jpg', 'Unregistered', 0),
(66, 'AD', 'AD', 'MALE', 20, '0000-00-00', '', 0, '', '', 2232, '22-2222', '87bbf324d20e8572be65dfc7d8a35276c858ad4e587a45f1c52cb0add1595200', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1),
(93, 'N', 'N', 'MALE', 18, '0000-00-00', '', 0, '', '', 2260, '22-1234', '5fada7aca2d84f26100e0a25809188fc72ca18d6ef5a1ce23a8cfb1ab2e84ed6', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(91, 'MARIA LUZ', 'SARTORIO', 'FEMALE', 23, '1999-11-25', '', 0, '', '', 2260, '22-1111', '0fc8a03ad1187aa375ba219843c7d609a2e1816535a938a7a86e7320dd1d1e74', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(92, 'B', 'B', 'MALE', 18, '0000-00-00', '', 0, '', '', 2260, '12-3456', '0d2e8f33f0a8089fa55261d42e23123a9dcdb435a9d8d4d07d9bf7ec2e59b571', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(87, 'MIC', 'MIC', 'MALE', 18, '0000-00-00', '', 0, '', '', 2230, '55-5555', 'c947b6a42f0a5b2ad781f60bc50af20bc77514b0e52ae4d0e95f5d8145ff1cc2', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(88, 'BIN', 'BIN', 'MALE', 20, '0000-00-00', '', 0, '', '', 2232, '66-6666', '2f9b142bbf0d4d8b45d183cf05a93a983c372c68479a317a11a7d82447fe3019', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(89, 'LUZ', 'LUZZY', 'FEMALE', 22, '0000-00-00', '', 0, '', '', 2232, '44-4444', '157a18e038806ee9924105c83d786ceaf39ddb9402e2a8c202cc66e55c143d61', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(94, 'K', 'K', 'FEMALE', 20, '0000-00-00', '', 0, '', '', 2260, '22-0000', 'a6ba2161e33e9c870981808adb3b9812a1b00b83a2035e432528efd30b1528cd', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(95, 'V', 'V', 'MALE', 20, '0000-00-00', '', 0, '', '', 2260, '22-344', '59279016b95791e221e29747023aa29c3c5a16725739894535c8688c9c31f216', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(96, 'JAN', 'JAN', 'MALE', 17, '0000-00-00', '', 0, '', '', 2260, '34-5678', '82717b14ffa62b3aa4f94e43bd3db1560f5dce3af061d285d8661e202526226f', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(97, 'RENA MAE', 'MANLANGIT', 'FEMALE', 22, '0000-00-00', '', 0, '', '', 2260, '22-9999', '85e1621705ac0c863c2459d18e056bca2f001e2966d4ddef456c8e8b1ecab346', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(98, 'EVELYN', 'ESCALICAS', 'FEMALE', 22, '0000-00-00', '', 0, '', '', 2260, '22-1000', '5dcd11b40da180f3974ce441cd8e1c64a9137d29e12655a2dc896b4abc991843', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0);

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
(49, 186, '/lmstlee4/admin/uploads/8944_File_2830_File_FB_IMG_15752135345599416.jpg', '2022-11-24 09:59:29', 'This is my sample', 'Sample', 5, 1, '2022-11-20 23:54:29', '', 58, 20, 0, 0, 0),
(50, 189, '/lmstlee4/admin/uploads/3022_File_2830_File_FB_IMG_15752135345599416.jpg', '2022-11-24 10:04:01', 'This is activity 1', 'Activity 1', 0, 0, '2022-11-24 10:04:01', '', 58, 0, 0, 0, 0),
(51, 194, '/lmstlee4/admin/uploads/7787_File_IMG_20220823_114206.jpg', '2022-11-28 12:47:55', 'This is my activity', 'Activity 1', 5, 0, '2022-11-28 01:36:01', '', 91, 30, 0, 0, 0),
(53, 196, '/lmstlee4/admin/uploads/7534_File_2937_File_FB_IMG_15752133842884300.jpg', '2022-11-28 14:36:28', 'Sample student', 'Sample', 5, 0, '2022-11-28 14:36:28', '', 91, 35, 0, 0, 0),
(54, 195, '/lmstlee4/admin/uploads/9053_File_2961_File_FB_IMG_15752133804887025.jpg', '2022-11-28 14:40:28', 'Project Student', 'Project', 5, 0, '2022-11-28 14:40:28', '', 91, 50, 0, 0, 0),
(56, 197, '', '', '', 'Quiz 1', 0, 0, '2022-11-29 03:31:14', '', 91, 20, 30, 30, 0),
(57, 197, '', '', '', '', 0, 0, '2022-11-29 03:58:56', '', 92, 30, 30, 30, 0),
(58, 197, '', '', '', '', 0, 0, '2022-11-29 04:02:00', '', 94, 30, 40, 30, 0),
(60, 197, '', '', '', '', 0, 0, '2022-11-29 04:15:17', '', 96, 30, 40, 0, 0),
(61, 194, '/lmstlee4/admin/uploads/9378_File_2021_File_IMG20221127175357.jpg', '2022-11-29 04:18:34', 'Activity 1', 'Activity 1', 0, 0, '2022-11-29 04:18:34', '', 97, 0, 0, 0, 0);

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
(183, '', '2022-11-13 23:41:03', 'Sample', 0, 0, '2022-11-19 12:01:00', 1234, 29, 'Sample', 40, 207, 0, 1),
(184, '', '2022-11-15 13:54:58', 'Project1', 0, 0, '2022-11-26 12:01:00', 1234, 29, 'Project', 40, 216, 0, 1),
(185, '', '2022-11-20 23:45:59', 'Activity 1', 0, 0, '2022-11-27 12:45:00', 1234, 28, 'Activity 1', 60, 200, 1, 0),
(186, '', '2022-11-20 23:46:48', 'Sample', 0, 0, '2022-11-26 11:46:00', 1234, 29, 'Sample', 30, 201, 1, 0),
(187, '', '2022-11-21 14:19:39', 'This is sample 2', 0, 0, '2022-11-26 02:19:00', 1234, 29, 'Sample 2', 50, 226, 2, 0),
(194, '', '2022-11-28 00:23:26', 'Please send Activity 1', 0, 0, '2022-12-03 12:01:00', 1234, 60, 'Activity 1', 30, 229, 1, 0),
(195, '', '2022-11-28 12:38:10', 'Send a Project', 0, 0, '2022-12-03 12:38:00', 1234, 60, 'Project', 50, 230, 1, 1),
(196, '', '2022-11-28 14:34:55', 'Sample', 0, 0, '2022-12-03 02:34:00', 1234, 60, 'Sample', 40, 229, 1, 0),
(197, '', '2022-11-29 03:12:39', 'quiz', 0, 0, '2022-12-10 12:00:00', 1234, 60, 'Quiz 1', 30, 231, 1, 0);

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
  `isDeleted` tinyint(1) NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `email`, `education`, `skills`, `address`, `birthdate`, `gender`, `phone_no`, `department`, `nationality`, `location`, `about`, `teacher_stat`, `isDeleted`, `is_superadmin`) VALUES
(1234, 'ADMIN', '23908401df1c879155ba712ab94b383e6db1d25c064ae5e1b285928e7792f8da', 'ROSALIE', 'JAENA', 'admin@admin.com', '', '', 'Toboso', '2022-10-12', 'FEMALE', 9123456789, 'TLE', 'Filipino', 'received_472195831476549.webp', '', 'Activated', 0, 1),
(1242, 'Jazedane', '20bff4e3daba64b0c151ff275496b79a129db808edd1446362bc124de66b9dbb', 'JAZE', 'DANE', '', '', '', '', '2022-11-13', 'MALE', 0, '', '', 'haikyu.jpg', '', '', 0, 0),
(1252, 'Tin', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'Tin', 'Tin', '', '', '', '', '2022-11-13', 'Male', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 0, 0),
(1255, 'Maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627', 'Maria', 'Sartorio', '', '', '', '', '2022-11-13', 'Female', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', '', 0, 0),
(1263, 'Benten', '6700869c8ff7480e34a70a708b028700dbaa3a033b5652b903afe89f49a31456', 'BEN', 'TEN', '', '', '', '', '0000-00-00', 'Female', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1, 0),
(1265, 'Ten', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'TEN', 'TEN', '', '', '', '', '0000-00-00', 'MALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1, 0),
(1266, 'B', '3e23e8160039594a33894f6564e1b1348bbd7a0088d42c4acb73eeaed59c009d', 'B', 'B', '', '', '', '', '0000-00-00', 'MALE', 0, '', '', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1, 0);

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
(60, 1234, 2260, 123, '/lmstlee4/admin/uploads/thumbnails.png', 1, 0);

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
(65, 29, 64, 1234, 0),
(86, 29, 65, 1234, 1),
(87, 29, 66, 1234, 0),
(96, 29, 76, 1234, 0),
(104, 28, 84, 1234, 0),
(105, 28, 85, 1234, 0),
(106, 28, 86, 1234, 0),
(107, 28, 87, 1234, 0),
(108, 29, 88, 1234, 0),
(109, 29, 89, 1234, 0),
(110, 56, 36, 1242, 0),
(111, 56, 58, 1242, 0),
(112, 56, 64, 1242, 0),
(113, 56, 65, 1242, 0),
(114, 56, 66, 1242, 0),
(115, 56, 88, 1242, 0),
(116, 56, 89, 1242, 0),
(117, 57, 90, 1242, 0),
(118, 60, 91, 1234, 0),
(119, 60, 92, 1234, 0),
(120, 60, 93, 1234, 0),
(121, 60, 94, 1234, 0),
(122, 60, 95, 1234, 0),
(123, 60, 96, 1234, 0),
(124, 60, 97, 1234, 0),
(125, 60, 98, 1234, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_log`
--

CREATE TABLE `tbl_teacher_log` (
  `teacher_log_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_log`
--

INSERT INTO `tbl_teacher_log` (`teacher_log_id`, `username`, `login_date`, `logout_date`, `teacher_id`) VALUES
(1, 'Admin', '2022-11-27 00:52:20', '2022-11-29 04:22:34', 1234),
(2, 'Admin', '2022-11-27 01:09:30', '2022-11-29 04:22:34', 1234),
(3, 'Admin', '2022-11-27 01:25:04', '2022-11-29 04:22:34', 1234),
(4, 'Admin', '2022-11-27 18:48:17', '2022-11-29 04:22:34', 1234),
(5, 'Jazedane', '2022-11-27 23:59:49', '2022-11-29 04:17:08', 1242),
(6, 'Admin', '2022-11-28 11:26:53', '2022-11-29 04:22:34', 1234),
(7, 'Admin', '2022-11-28 12:34:17', '2022-11-29 04:22:34', 1234),
(8, 'Admin', '2022-11-28 14:27:08', '2022-11-29 04:22:34', 1234),
(9, 'Jazedane', '2022-11-28 23:31:49', '2022-11-29 04:17:08', 1242),
(10, 'Jazedane', '2022-11-28 23:49:33', '2022-11-29 04:17:08', 1242),
(11, 'Admin', '2022-11-28 23:51:17', '2022-11-29 04:22:34', 1234),
(12, 'Admin', '2022-11-28 23:51:54', '2022-11-29 04:22:34', 1234),
(13, 'Admin', '2022-11-28 23:53:15', '2022-11-29 04:22:34', 1234),
(14, 'Jazedane', '2022-11-28 23:55:50', '2022-11-29 04:17:08', 1242),
(15, 'Admin', '2022-11-28 23:56:04', '2022-11-29 04:22:34', 1234),
(16, 'Tin', '2022-11-29 00:01:35', '2022-11-29 00:03:52', 1252),
(17, 'Jazedane', '2022-11-29 00:04:00', '2022-11-29 04:17:08', 1242),
(18, 'Jazedane', '2022-11-29 00:44:18', '2022-11-29 04:17:08', 1242),
(19, 'Admin', '2022-11-29 00:44:26', '2022-11-29 04:22:34', 1234),
(20, 'Jazedane', '2022-11-29 00:44:44', '2022-11-29 04:17:08', 1242),
(21, 'Jazedane', '2022-11-29 01:14:28', '2022-11-29 04:17:08', 1242),
(22, 'Admin', '2022-11-29 01:36:59', '2022-11-29 04:22:34', 1234),
(23, 'Jazedane', '2022-11-29 01:37:12', '2022-11-29 04:17:08', 1242),
(24, 'Jazedane', '2022-11-29 01:37:12', '2022-11-29 04:17:08', 1242);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2261;

--
-- AUTO_INCREMENT for table `tbl_grade_category`
--
ALTER TABLE `tbl_grade_category`
  MODIFY `grade_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

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
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1267;

--
-- AUTO_INCREMENT for table `tbl_teacher_class`
--
ALTER TABLE `tbl_teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_teacher_class_student`
--
ALTER TABLE `tbl_teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_teacher_log`
--
ALTER TABLE `tbl_teacher_log`
  MODIFY `teacher_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_teacher_notification`
--
ALTER TABLE `tbl_teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

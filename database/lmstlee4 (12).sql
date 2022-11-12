-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 03:28 AM
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
(37, 'Hapon', '2022-11-11 19:44:44', 'Add User Hapon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_year` int(11) NOT NULL,
  `class_section` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`, `class_year`, `class_section`, `isDeleted`) VALUES
(2230, 'Grade 10 - Love', 0, '', 0),
(2232, 'Grade 10 - Hope', 0, '', 0);

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
(200, 'Activity', 2230, 60);

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
(315, 46, 'Hello arnel', '2022-11-03 21:51:14', 1234, 'ARNEL AMION', 'ROSALIE JAENA', ''),
(316, 1234, 'hello maam', '2022-11-03 22:14:16', 46, 'ROSALIE JAENA', 'ARNEL AMION', ''),
(322, 46, 'hi student', '2022-11-08 14:54:42', 1234, 'ARNEL AMION', 'ROSALIE JAENA', '');

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
(197, 46, 'Hello arnel', '2022-11-03 21:51:14', 1234, 'ARNEL AMION', 'ROSALIE JAENA'),
(198, 1234, 'hello maam', '2022-11-03 22:14:16', 46, 'ROSALIE JAENA', 'ARNEL AMION'),
(204, 46, 'hi student', '2022-11-08 14:54:42', 1234, 'ARNEL AMION', 'ROSALIE JAENA');

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
(398, 'The Task <b>MariaTask</b> has been graded. You received a grade of <b>90</b>.', 'submit_task.php?id=15&post_id=159', '2022-10-19 20:45:47', 1234, 36, 1),
(399, 'The Task <b>Task</b> has been graded. You received a grade of <b>90</b>.', 'submit_task.php?id=15&post_id=159', '2022-10-19 20:46:45', 1234, 52, 1),
(400, 'submit task name <b>Jaze</b>', 'view_submit_task.php?id=15&post_id=159', '2022-10-29 22:08:39', 36, 1234, 1),
(401, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 36, 0),
(402, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 43, 0),
(403, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 44, 0),
(404, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:32', 1234, 50, 0),
(405, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:33', 1234, 51, 0),
(406, 'New Task Added: <b>Task 1</b>', 'task_student.php?id=28', '2022-10-31 17:12:58', 1234, 47, 0),
(407, 'New Task Added: <b>Task 1</b>', 'task_student.php?id=28', '2022-10-31 17:12:58', 1234, 36, 0),
(408, 'New Task Added: <b>Task 1</b>', 'task_student.php?id=28', '2022-10-31 17:12:58', 1234, 45, 0),
(409, 'New Task Added: <b>Task 1</b>', 'task_student.php?id=28', '2022-10-31 17:12:59', 1234, 46, 1),
(410, 'New Task Added: <b>Task 1</b>', 'task_student.php?id=28', '2022-10-31 17:12:59', 1234, 48, 0),
(411, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=28', '2022-10-31 17:19:02', 1234, 47, 0),
(412, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=28', '2022-10-31 17:19:02', 1234, 36, 0),
(413, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=28', '2022-10-31 17:19:02', 1234, 45, 0),
(414, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=28', '2022-10-31 17:19:02', 1234, 46, 1),
(415, 'New Task Added: <b>Task 2</b>', 'task_student.php?id=28', '2022-10-31 17:19:02', 1234, 48, 0),
(416, 'New Task Added: <b>Task 3</b>', 'task_student.php?id=28', '2022-10-31 17:30:25', 1234, 47, 0),
(417, 'New Task Added: <b>Task 3</b>', 'task_student.php?id=28', '2022-10-31 17:30:25', 1234, 36, 0),
(418, 'New Task Added: <b>Task 3</b>', 'task_student.php?id=28', '2022-10-31 17:30:25', 1234, 45, 0),
(419, 'New Task Added: <b>Task 3</b>', 'task_student.php?id=28', '2022-10-31 17:30:25', 1234, 46, 1),
(420, 'New Task Added: <b>Task 3</b>', 'task_student.php?id=28', '2022-10-31 17:30:25', 1234, 48, 0),
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
(464, 'submit activity name <b>Sample</b>', 'view_submit_task.php?id=29&post_id=177', '2022-11-10 22:00:41', 58, 1234, 0);

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

INSERT INTO `tbl_student` (`student_id`, `firstname`, `lastname`, `gender`, `age`, `class_id`, `username`, `password`, `location`, `status`, `isDeleted`) VALUES
(47, 'JADE RICK', 'CASUYON', 'MALE', 17, 2230, '22-0039', 'c9f7f85910ab95a7e4970db249426b6a2bd927605885858f21c2c454bee94c7e', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(36, 'ANJIE', 'ALEGARBES', 'MALE', 17, 2232, '22-0001', 'e0d6f8e94087836656f29a7bcbc40f16607ed71c38d407f6102d9e4148b77244', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(45, 'JEFFREY', 'ALINDAJAO', 'MALE', 17, 2230, '22-0037', '6901de3b7598c8a38f72a564e074bdbbb03cad1d3744587af1e8497898f58f6d', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(46, 'ARNEL', 'AMION', 'MALE', 16, 2230, '22-0038', '024944d08fd86b5fda0026172dfc62303d104b46321f0c9985ac205213b39f96', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(48, 'JOHN FERNAND', 'DADA', 'MALE', 17, 2230, '22-0040', '7d9627c5913cc68090580a239b531f518f6ad086936d96013d3682aa3f6c6136', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(58, 'Tin', 'Tin', 'MALE', 18, 2232, '22-0060', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(64, 'Maria', 'Mañapao', 'MALE', 20, 2232, '1234567', '2d4431da8c0684abc04c437f36f25dc87ef62b53815b7039cf26c93fb49a3a4c', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_grade`
--

CREATE TABLE `tbl_student_grade` (
  `student_grade_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `1st_quarter` int(11) NOT NULL,
  `2nd_quarter` int(11) NOT NULL,
  `3rd_quarter` int(11) NOT NULL,
  `4th_quarter` int(11) NOT NULL,
  `gen_ave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student_grade`
--

INSERT INTO `tbl_student_grade` (`student_grade_id`, `student_id`, `1st_quarter`, `2nd_quarter`, `3rd_quarter`, `4th_quarter`, `gen_ave`) VALUES
(100, 58, 60, 60, 60, 60, 60);

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
(11, 81, 'uploads/sample.pdf', '2022-08-15 10:12:04', 'abcd', 'efghij', 1, 0, '2022-10-01 11:13:49', '', 22, 90, 0, 0, 0),
(12, 92, 'uploads/2961_File_FB_IMG_15752133919503719.jpg', '2022-10-02 18:14:21', 'This is my task', 'Maria-Sample1', 0, 0, '0000-00-00 00:00:00', '', 36, 95, 0, 0, 0),
(14, 88, 'uploads/1484_File_FB_IMG_15752133842884300.jpg', '2022-10-02 22:50:55', 'This is picture', 'Luz', 0, 0, '0000-00-00 00:00:00', '', 36, 80, 0, 0, 0),
(16, 125, 'C:/Php/htdocs/lmstle/admin/uploads/9582_File_FB_IMG_15752133842884300.jpg', '2022-10-03 09:11:32', 'Submit', 'Mar', 0, 0, '0000-00-00 00:00:00', '', 36, 90, 0, 0, 0),
(21, 153, 'uploads/8193_File_moon.jpg', '2022-10-09 21:45:42', 'this is  moon', 'moon', 0, 0, '2022-10-09 21:45:42', '', 36, 0, 0, 0, 0),
(22, 154, 'uploads/6024_File_FB_IMG_15752133884258148.jpg', '2022-10-09 22:45:16', 'This is my pic', 'Pic1', 0, 0, '2022-10-09 22:45:16', '', 36, 0, 0, 0, 0),
(23, 155, 'uploads/6571_File_FB_IMG_15752134736613920.jpg', '2022-10-10 17:28:26', 'This is a picture', 'Picture', 0, 0, '2022-10-10 17:28:26', '', 36, 0, 0, 0, 0),
(24, 155, 'C:/Php/htdocs/lmstle/admin/uploads/4382_File_FB_IMG_15752132951769003.jpg', '2022-10-10 20:27:33', 'Picture', 'Jaze Dane', 0, 0, '2022-10-10 20:27:33', '', 36, 0, 0, 0, 0),
(25, 156, '/lmstle/admin/uploads/4107_File_FB_IMG_15752132951769003.jpg', '2022-10-10 22:25:37', 'This is my weekly task', 'MariaLuz.jpg', 0, 0, '2022-10-10 22:25:37', '', 36, 0, 0, 0, 0),
(26, 159, '/lmstle/admin/uploads/7738_File_FB_IMG_15752135963379941.jpg', '2022-10-10 23:39:40', 'This is my task', 'MariaTask', 0, 0, '2022-10-10 23:39:40', '', 36, 90, 0, 0, 0),
(27, 160, '/lmstle/admin/uploads/9123_File_haikyu.jpg', '2022-10-18 21:10:53', 'This is my Task 2', 'Maria Luzzy', 0, 0, '2022-10-18 21:10:53', '', 36, 90, 0, 0, 0),
(28, 159, '/lmstle/admin/uploads/5964_File_FB_IMG_15752132719152170.jpg', '2022-10-19 20:44:33', 'My task', 'Task', 0, 0, '2022-10-19 20:44:33', '', 52, 90, 0, 0, 0),
(29, 159, '/lmstle/admin/uploads/7709_File_FB_IMG_15752133919503719.jpg', '2022-10-29 22:08:39', 'This is task', 'Jaze', 0, 0, '2022-10-29 22:08:39', '', 36, 0, 0, 0, 0),
(34, 166, '/lmstle/admin/uploads/7562_File_Tree1.png', '2022-11-03 21:17:39', 'Sample', 'Task 3', 5, 1, '2022-11-03 21:17:39', 'Good', 46, 85, 0, 0, 0),
(36, 168, '/lmstle/admin/uploads/1842_File_FB_IMG_15752132794137984.jpg', '2022-11-04 17:06:11', 'Please check it ma\'am', 'Activity 5', 4, 1, '2022-11-04 17:06:11', 'Good', 46, 65, 0, 0, 0),
(37, 169, '/lmstlee4/admin/uploads/5675_File_FB_IMG_15752132951769003.jpg', '2022-11-05 22:56:53', 'Activity 6', 'Activity 6', 5, 1, '2022-11-05 22:56:53', 'Good', 46, 35, 0, 0, 0),
(38, 170, '/lmstlee4/admin/uploads/1133_File_FB_IMG_15752134736613920.jpg', '2022-11-05 23:05:55', 'My Activity 1', 'Activity 1', 5, 1, '2022-11-05 23:05:55', 'Very Good', 46, 45, 0, 0, 0),
(39, 177, '/lmstlee4/admin/uploads/3806_File_Tree4.png', '2022-11-10 22:00:41', 'Sample', 'Maria Luz Mañapao', 5, 1, '2022-11-10 22:00:41', 'Perfect', 58, 100, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_uploaded_task`
--

CREATE TABLE `tbl_student_uploaded_task` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_uploaded_task`
--

INSERT INTO `tbl_student_uploaded_task` (`file_id`, `floc`, `fdatein`, `fdesc`, `student_id`, `fname`) VALUES
(100, 'admin/sample.docx', '2022-08-15 11:00:00', 'file', 22, 'task');

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
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `floc`, `fdatein`, `fdesc`, `task_status`, `p_condition`, `end_date`, `teacher_id`, `class_id`, `fname`, `total_points`, `grade_category_id`, `isDeleted`) VALUES
(81, 'uploads/sample.docx', '2022-08-15 01:24:32', 'Task1', 1, 0, '2022-10-01 00:00:00', 123, 2223, 'Task number 1', 0, 0, 0),
(164, '', '2022-10-31 17:12:59', 'Submit task', 0, 0, '0000-00-00 00:00:00', 1234, 28, 'Task 1', 0, 0, 1),
(166, '', '2022-10-31 17:30:25', 'Task', 0, 0, '2022-11-05 12:00:00', 1234, 28, 'Task 3', 90, 0, 0),
(168, '', '2022-11-03 19:17:55', 'Activity ', 0, 0, '2022-11-11 12:00:00', 1234, 28, 'Activity 5', 70, 0, 0),
(169, '', '2022-11-04 17:04:55', 'Please send activity', 0, 0, '2022-11-04 05:03:00', 1234, 28, 'Activity 6', 40, 0, 0),
(170, '', '2022-11-05 23:04:59', 'Please send Activity 1', 0, 0, '2022-11-13 12:00:00', 1234, 28, 'Activity 1', 60, 0, 0),
(176, '', '2022-11-10 21:34:19', '', 0, 0, '2022-11-12 12:00:00', 1234, 29, 'Test', 10, 0, 0),
(177, '', '2022-11-10 21:57:18', 'Married with 5 children', 0, 0, '2022-12-03 12:00:00', 1234, 29, 'Maria Luz Mañapao', 100, 0, 0);

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
  `location` varchar(200) NOT NULL,
  `about` varchar(200) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `location`, `about`, `teacher_stat`, `isDeleted`) VALUES
(1234, 'ADMIN', '23908401df1c879155ba712ab94b383e6db1d25c064ae5e1b285928e7792f8da', 'ROSALIE', 'JAENA', 'received_472195831476549.webp\r\n', '', 'Activated', 0),
(1242, 'Jazedane', '20bff4e3daba64b0c151ff275496b79a129db808edd1446362bc124de66b9dbb', 'Jaze', 'Dane', 'haikyu.jpg', '', '', 0),
(1252, 'Tin', 'ab547757da37eb600011051fb0e9fe0c9ea49d220086a939c76369d29bfa1542', 'Tin', 'Tin', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 0),
(1255, 'Maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627', 'Maria', 'Sartorio', 'NO-IMAGE-AVAILABLE.jpg', '', '', 0),
(1256, 'Tine', 'eb8e739a0a72ead14ac2bfb01dc8c0c8261ad400d3d8bf69c5df57b170c97967', 'Tine', 'Tine', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1),
(1259, 'Hapon', '21b8e134bab5d86102379698f70a703860fabcb88c03a3aa21cf1284aacfce53', 'Hapon', 'Pon', 'NO-IMAGE-AVAILABLE.jpg', '', 'Activated', 1);

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
  `school_year` varchar(100) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_class`
--

INSERT INTO `tbl_teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`, `isDeleted`) VALUES
(28, 1234, 2230, 123, '/lmstle/admin/uploads/thumbnails.png', '2022-2023', 0),
(29, 1234, 2232, 123, '/lmstlee4/admin/uploads/thumbnails.png', '2022-2023', 0);

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
(44, 27, 43, 1234, 0),
(45, 27, 44, 1234, 0),
(46, 28, 45, 1234, 0),
(47, 28, 46, 1234, 0),
(48, 28, 47, 1234, 0),
(49, 28, 48, 1234, 0),
(51, 27, 50, 1234, 0),
(52, 27, 51, 1234, 0),
(59, 29, 58, 1234, 0),
(60, 29, 59, 1234, 0),
(61, 29, 60, 1234, 0),
(62, 29, 61, 1234, 0),
(63, 29, 62, 1234, 0),
(64, 29, 63, 1234, 0),
(65, 29, 64, 1234, 0);

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
(216, 'Admin', '2022-10-19 22:51:05', '2022-11-11 22:33:18', 1234),
(217, 'Admin', '2022-10-19 23:13:40', '2022-11-11 22:33:18', 1234),
(218, 'Admin', '2022-10-20 00:04:09', '2022-11-11 22:33:18', 1234),
(219, 'Admin', '2022-10-26 22:02:58', '2022-11-11 22:33:18', 1234),
(220, 'Admin', '2022-10-26 22:03:13', '2022-11-11 22:33:18', 1234),
(221, 'Admin', '2022-10-26 22:04:17', '2022-11-11 22:33:18', 1234),
(222, 'Jazedane', '2022-10-26 22:05:42', '2022-10-26 22:05:53', 1242),
(223, 'Admin', '2022-10-26 22:06:03', '2022-11-11 22:33:18', 1234),
(224, 'Admin', '2022-10-28 14:59:42', '2022-11-11 22:33:18', 1234),
(225, 'Admin', '2022-10-28 16:06:09', '2022-11-11 22:33:18', 1234),
(226, 'Admin', '2022-10-29 14:30:06', '2022-11-11 22:33:18', 1234),
(227, 'Admin', '2022-10-30 09:39:40', '2022-11-11 22:33:18', 1234),
(228, 'Admin', '2022-10-31 12:24:59', '2022-11-11 22:33:18', 1234),
(229, 'Admin', '2022-10-31 12:27:11', '2022-11-11 22:33:18', 1234),
(230, 'Admin', '2022-10-31 15:30:41', '2022-11-11 22:33:18', 1234),
(231, 'Admin', '2022-10-31 15:46:12', '2022-11-11 22:33:18', 1234),
(232, 'Admin', '2022-10-31 16:06:38', '2022-11-11 22:33:18', 1234),
(233, 'Maria', '2022-10-31 20:39:20', '2022-11-02 09:11:32', 1255),
(234, 'Maria', '2022-10-31 20:41:29', '2022-11-02 09:11:32', 1255),
(235, 'Maria', '2022-10-31 20:41:39', '2022-11-02 09:11:32', 1255),
(236, 'Maria', '2022-10-31 21:40:30', '2022-11-02 09:11:32', 1255),
(237, 'Maria', '2022-10-31 21:59:41', '2022-11-02 09:11:32', 1255),
(238, 'Admin', '2022-11-01 10:06:41', '2022-11-11 22:33:18', 1234),
(239, 'Admin', '2022-11-01 10:15:01', '2022-11-11 22:33:18', 1234),
(240, 'Admin', '2022-11-01 18:47:28', '2022-11-11 22:33:18', 1234),
(241, 'Maria', '2022-11-01 18:55:23', '2022-11-02 09:11:32', 1255),
(242, 'Maria', '2022-11-01 23:05:21', '2022-11-02 09:11:32', 1255),
(243, 'Maria', '2022-11-01 23:10:21', '2022-11-02 09:11:32', 1255),
(244, 'Admin', '2022-11-02 08:53:55', '2022-11-11 22:33:18', 1234),
(245, 'Maria', '2022-11-02 09:00:17', '2022-11-02 09:11:32', 1255),
(246, 'Maria', '2022-11-02 09:11:45', '', 1255),
(247, 'Admin', '2022-11-03 18:09:29', '2022-11-11 22:33:18', 1234),
(248, 'Admin', '2022-11-04 15:04:59', '2022-11-11 22:33:18', 1234),
(249, 'Admin', '2022-11-05 16:34:33', '2022-11-11 22:33:18', 1234),
(250, 'Admin', '2022-11-07 14:07:12', '2022-11-11 22:33:18', 1234),
(251, 'Admin', '2022-11-08 14:16:07', '2022-11-11 22:33:18', 1234),
(252, 'Admin', '2022-11-09 16:42:33', '2022-11-11 22:33:18', 1234),
(253, 'Admin', '2022-11-10 13:13:43', '2022-11-11 22:33:18', 1234),
(254, 'Admin', '2022-11-10 16:35:01', '2022-11-11 22:33:18', 1234),
(255, 'Admin', '2022-11-11 19:15:32', '2022-11-11 22:33:18', 1234);

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
-- Indexes for table `tbl_student_grade`
--
ALTER TABLE `tbl_student_grade`
  ADD PRIMARY KEY (`student_grade_id`);

--
-- Indexes for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  ADD PRIMARY KEY (`student_task_id`);

--
-- Indexes for table `tbl_student_uploaded_task`
--
ALTER TABLE `tbl_student_uploaded_task`
  ADD PRIMARY KEY (`file_id`);

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
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2233;

--
-- AUTO_INCREMENT for table `tbl_grade_category`
--
ALTER TABLE `tbl_grade_category`
  MODIFY `grade_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_student_grade`
--
ALTER TABLE `tbl_student_grade`
  MODIFY `student_grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_student_uploaded_task`
--
ALTER TABLE `tbl_student_uploaded_task`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1260;

--
-- AUTO_INCREMENT for table `tbl_teacher_class`
--
ALTER TABLE `tbl_teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_teacher_class_student`
--
ALTER TABLE `tbl_teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_teacher_log`
--
ALTER TABLE `tbl_teacher_log`
  MODIFY `teacher_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `tbl_teacher_notification`
--
ALTER TABLE `tbl_teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
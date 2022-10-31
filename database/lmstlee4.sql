-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 07:56 AM
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
(28, '', '2022-10-31 12:22:04', 'Add User ');

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
(2223, 'Grade 10 - Hope', 0, '', 0),
(2230, 'Grade 10 - Love', 0, '', 0),
(2232, 'GRADE 10 - WISDOM', 0, '', 0);

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
(309, 0, '', '2022-10-30 10:29:21', 1234, ' ', 'ROSALIE JAENA', '');

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
(183, 36, 'hey maria', '2022-10-10 21:42:53', 1234, 'Maria Luz', ''),
(185, 1234, 'hey ad', '2022-10-10 21:55:23', 36, 'Admin Admin', 'Maria Luz'),
(187, 1234, 'hello admin', '2022-10-11 10:37:05', 36, 'Admin Admin', ' '),
(188, 36, 'hello maria ', '2022-10-11 10:37:56', 1234, 'Maria Luz', 'Admin Admin'),
(189, 0, '', '2022-10-30 10:28:38', 1234, ' ', 'ROSALIE JAENA'),
(190, 0, '', '2022-10-30 10:28:40', 1234, ' ', 'ROSALIE JAENA'),
(191, 0, '', '2022-10-30 10:29:21', 1234, ' ', 'ROSALIE JAENA');

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
(405, 'New Task Added: <b>Activity</b>', 'task_student.php?id=15', '2022-10-29 22:22:33', 1234, 51, 0);

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
(133, 36, 'yes', 121),
(134, 36, 'yes', 123),
(135, 36, 'yes', 122),
(136, 36, 'yes', 128),
(144, 36, 'yes', 134),
(145, 36, 'yes', 133),
(146, 36, 'yes', 132),
(147, 22, 'yes', 134),
(148, 22, 'yes', 133),
(149, 22, 'yes', 132),
(150, 22, 'yes', 128),
(151, 36, 'yes', 151),
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
(47, 1234, 'yes', 370),
(48, 1234, 'yes', 370),
(49, 1234, 'yes', 370),
(50, 1234, 'yes', 370),
(51, 1234, 'yes', 370),
(52, 1234, 'yes', 370),
(53, 1234, 'yes', 370),
(54, 1234, 'yes', 370),
(55, 1234, 'yes', 370),
(56, 1234, 'yes', 370),
(57, 1234, 'yes', 370),
(58, 1234, 'yes', 370),
(59, 1234, 'yes', 370),
(60, 1234, 'yes', 370),
(61, 1234, 'yes', 370),
(62, 1234, 'yes', 370),
(63, 1234, 'yes', 370),
(64, 1234, 'yes', 370),
(65, 1234, 'yes', 370),
(66, 1234, 'yes', 370),
(67, 1234, 'yes', 370),
(68, 1234, 'yes', 303),
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
(36, 'ANJIE', 'ALEGARBES', 'MALE', 17, 2223, '22-0001', 'e0d6f8e94087836656f29a7bcbc40f16607ed71c38d407f6102d9e4148b77244', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(43, 'MATTHEW VENICE', 'BALAOD', 'MALE', 17, 2223, '22-0002', 'f8eb9ae4f219cb97dee1ced7897f9e9351f99d1dc82e777f78cb2ce7e80296e2', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', 0),
(44, 'JAYSON', 'BLANCO', 'MALE', 17, 2223, '22-0003', '8f3f746e42f9347151df08aaed9a2fc622b269e77b1f0211fc8d9a6af15b8cbf', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(45, 'JEFFREY', 'ALINDAJAO', 'MALE', 17, 2230, '22-0037', '6901de3b7598c8a38f72a564e074bdbbb03cad1d3744587af1e8497898f58f6d', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(46, 'ARNEL', 'AMION', 'MALE', 16, 2230, '22-0038', '024944d08fd86b5fda0026172dfc62303d104b46321f0c9985ac205213b39f96', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(48, 'JOHN FERNAND', 'DADA', 'MALE', 17, 2230, '22-0040', '7d9627c5913cc68090580a239b531f518f6ad086936d96013d3682aa3f6c6136', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(50, 'DENNES', 'BONGHANOY', 'MALE', 16, 2223, '22-0004', '0419db9f57d395015f3527ab7bf89d20888e8ec45d012adcf151c1145c5a779a', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0),
(51, 'JEMARK', 'CANETE', 'MALE', 17, 2223, '22-0005', 'baac41a9d1334a35ad929b06fbca7241102e67bca930234d2789a943c2114405', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 0);

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
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student_task`
--

INSERT INTO `tbl_student_task` (`student_task_id`, `task_id`, `floc`, `task_fdatein`, `fdesc`, `fname`, `task_status`, `p_condition`, `end_date`, `student_id`, `grade`, `isDeleted`) VALUES
(11, 81, 'uploads/sample.pdf', '2022-08-15 10:12:04', 'abcd', 'efghij', 1, 0, '2022-10-01 11:13:49', 22, '90', 0),
(12, 92, 'uploads/2961_File_FB_IMG_15752133919503719.jpg', '2022-10-02 18:14:21', 'This is my task', 'Maria-Sample1', 0, 0, '0000-00-00 00:00:00', 36, '95%', 0),
(14, 88, 'uploads/1484_File_FB_IMG_15752133842884300.jpg', '2022-10-02 22:50:55', 'This is picture', 'Luz', 0, 0, '0000-00-00 00:00:00', 36, '80%', 0),
(16, 125, 'C:/Php/htdocs/lmstle/admin/uploads/9582_File_FB_IMG_15752133842884300.jpg', '2022-10-03 09:11:32', 'Submit', 'Mar', 0, 0, '0000-00-00 00:00:00', 36, '90%', 0),
(21, 153, 'uploads/8193_File_moon.jpg', '2022-10-09 21:45:42', 'this is  moon', 'moon', 0, 0, '2022-10-09 21:45:42', 36, '', 0),
(22, 154, 'uploads/6024_File_FB_IMG_15752133884258148.jpg', '2022-10-09 22:45:16', 'This is my pic', 'Pic1', 0, 0, '2022-10-09 22:45:16', 36, '', 0),
(23, 155, 'uploads/6571_File_FB_IMG_15752134736613920.jpg', '2022-10-10 17:28:26', 'This is a picture', 'Picture', 0, 0, '2022-10-10 17:28:26', 36, '', 0),
(24, 155, 'C:/Php/htdocs/lmstle/admin/uploads/4382_File_FB_IMG_15752132951769003.jpg', '2022-10-10 20:27:33', 'Picture', 'Jaze Dane', 0, 0, '2022-10-10 20:27:33', 36, '', 0),
(25, 156, '/lmstle/admin/uploads/4107_File_FB_IMG_15752132951769003.jpg', '2022-10-10 22:25:37', 'This is my weekly task', 'MariaLuz.jpg', 0, 0, '2022-10-10 22:25:37', 36, '', 0),
(26, 159, '/lmstle/admin/uploads/7738_File_FB_IMG_15752135963379941.jpg', '2022-10-10 23:39:40', 'This is my task', 'MariaTask', 0, 0, '2022-10-10 23:39:40', 36, '90', 0),
(27, 160, '/lmstle/admin/uploads/9123_File_haikyu.jpg', '2022-10-18 21:10:53', 'This is my Task 2', 'Maria Luzzy', 0, 0, '2022-10-18 21:10:53', 36, '90', 0),
(28, 159, '/lmstle/admin/uploads/5964_File_FB_IMG_15752132719152170.jpg', '2022-10-19 20:44:33', 'My task', 'Task', 0, 0, '2022-10-19 20:44:33', 52, '90', 0),
(29, 159, '/lmstle/admin/uploads/7709_File_FB_IMG_15752133919503719.jpg', '2022-10-29 22:08:39', 'This is task', 'Jaze', 0, 0, '2022-10-29 22:08:39', 36, '', 0);

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
(123, 'TLE10', 'Technology, Livelihood and Education'),
(123, 'TLE10', 'Technology, Livelihood and Education');

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
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `floc`, `fdatein`, `fdesc`, `task_status`, `p_condition`, `end_date`, `teacher_id`, `class_id`, `fname`, `isDeleted`) VALUES
(81, 'uploads/sample.docx', '2022-08-15 01:24:32', 'Task1', 1, 0, '2022-10-01 00:00:00', 123, 2223, 'Task number 1', 0),
(159, '', '2022-10-10 23:38:01', 'This is task', 0, 0, '2022-10-15 00:00:00', 1234, 15, 'Task', 0),
(160, '', '2022-10-15 22:17:00', 'Please send your task 2', 0, 0, '2022-10-22 00:00:00', 1234, 15, 'Task 2', 0),
(161, '', '2022-10-17 23:46:14', 'Test1', 0, 0, '2022-10-21 00:00:00', 1234, 15, 'Test', 0),
(163, '', '2022-10-29 22:22:33', 'this is activity', 0, 0, '0000-00-00 00:00:00', 1234, 15, 'Activity', 0);

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
(1234, 'ADMIN', 'jazedane27', 'ROSALIE', 'JAENA', 'received_472195831476549.webp', '', 'Activated', 0),
(1242, 'Jazedane', 'jaze', 'Jaze', 'Dane', 'haikyu.jpg', '', '', 0);

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
(15, 1234, 2223, 123, '/lmstle/admin/uploads/thumbnails.png', '2022-2023', 0),
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
(52, 27, 51, 1234, 0);

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
(216, 'Admin', '2022-10-19 22:51:05', '2022-10-31 12:26:43', 1234),
(217, 'Admin', '2022-10-19 23:13:40', '2022-10-31 12:26:43', 1234),
(218, 'Admin', '2022-10-20 00:04:09', '2022-10-31 12:26:43', 1234),
(219, 'Admin', '2022-10-26 22:02:58', '2022-10-31 12:26:43', 1234),
(220, 'Admin', '2022-10-26 22:03:13', '2022-10-31 12:26:43', 1234),
(221, 'Admin', '2022-10-26 22:04:17', '2022-10-31 12:26:43', 1234),
(222, 'Jazedane', '2022-10-26 22:05:42', '2022-10-26 22:05:53', 1242),
(223, 'Admin', '2022-10-26 22:06:03', '2022-10-31 12:26:43', 1234),
(224, 'Admin', '2022-10-28 14:59:42', '2022-10-31 12:26:43', 1234),
(225, 'Admin', '2022-10-28 16:06:09', '2022-10-31 12:26:43', 1234),
(226, 'Admin', '2022-10-29 14:30:06', '2022-10-31 12:26:43', 1234),
(227, 'Admin', '2022-10-30 09:39:40', '2022-10-31 12:26:43', 1234),
(228, 'Admin', '2022-10-31 12:24:59', '2022-10-31 12:26:43', 1234),
(229, 'Admin', '2022-10-31 12:27:11', '', 1234);

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
-- Indexes for table `tbl_student_uploaded_task`
--
ALTER TABLE `tbl_student_uploaded_task`
  ADD PRIMARY KEY (`file_id`);

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
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2233;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `tbl_message_sent`
--
ALTER TABLE `tbl_message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_student_task`
--
ALTER TABLE `tbl_student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_student_uploaded_task`
--
ALTER TABLE `tbl_student_uploaded_task`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1251;

--
-- AUTO_INCREMENT for table `tbl_teacher_class`
--
ALTER TABLE `tbl_teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_teacher_class_student`
--
ALTER TABLE `tbl_teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_teacher_log`
--
ALTER TABLE `tbl_teacher_log`
  MODIFY `teacher_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `tbl_teacher_notification`
--
ALTER TABLE `tbl_teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
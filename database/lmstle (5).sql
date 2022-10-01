-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 06:13 AM
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
-- Database: `lmstle`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'admin', '2022-08-15 10:00:01', 'Add Student 22-0001'),
(3, '', '2022-09-18 20:23:40', 'Edit Teacher Admin'),
(4, '', '2022-09-18 20:25:00', 'Add User 111-1111');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(2223, 'Grade 10-A'),
(2224, 'Grade 10-B');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(20, 1234, 'Chapter 1');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(100, 'admin/uploads/sample.pdf', '2022-08-15 09:00:01', 'abcd', 1234, 2223, 'Task', 'TLE-Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
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
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `receiver_id`, `content`, `date_sended`, `sender_id`, `receiver_name`, `sender_name`, `message_status`) VALUES
(121, 22, 'hey', '2022-09-15 19:37:50', 1234, 'Aurelia Hackett', 'Admin Admin', ''),
(123, 22, 'Hello student', '2022-09-19 09:09:18', 1234, 'Aurelia Hackett', '', ''),
(248, 1234, 'hello admin', '2022-09-26 23:45:17', 36, 'Admin Admin', ' ', ''),
(249, 36, 'hello maria', '2022-09-26 23:45:52', 1234, 'Maria Luz', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `receiver_id`, `content`, `date_sended`, `sender_id`, `receiver_name`, `sender_name`) VALUES
(2, 22, 'hi', '2022-09-14 22:39:43', 22, 'Admin Admin', 'Aurelia Hackett'),
(130, 1234, 'hello admin', '2022-09-26 23:45:17', 36, 'Admin Admin', ' '),
(131, 36, 'hello maria', '2022-09-26 23:45:52', 1234, 'Maria Luz', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(121, 15, 'Add file name <b>sss</b>', '2022-08-15 12:00:01', 'downloadable_student.php'),
(128, 15, 'Add Task file name <b>Sample</b>', '2022-09-21 13:58:23', 'task_student.php'),
(132, 15, 'Add Task file name <b>Sample1</b>', '2022-09-24 20:54:24', 'task_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
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
(151, 36, 'yes', 151);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(41, 1234, 'yes', 121),
(42, 1234, 'yes', 40);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(1, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `gender`, `age`, `class_id`, `username`, `password`, `location`, `status`) VALUES
(22, 'Aurelia', 'Hackett', '', 0, 2223, '22-0002', '19116cb2143c2df77bf41d2c590747395c5173037e3729b5016e990ff5408cce', 'uploads/istockphoto-1156449252-612x612.jpg', 'Registered'),
(36, 'Maria', 'Luz', '', 0, 2223, '22-0001', 'e0d6f8e94087836656f29a7bcbc40f16607ed71c38d407f6102d9e4148b77244', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(37, 'Juzz', 'Tine', '', 0, 2224, '22-0003', '50c21b1688f575bce5dfd5e9aaa4fc252677be7fef1e9f2ce1775ea689ef7f04', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(39, 'Tin', 'Tin', '', 0, 2224, '22-0004', 'd8bef6f7cc4828d2273d9583a0d8a76253da302265b72d5b6a65ff19f54b5b1d', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered');

-- --------------------------------------------------------

--
-- Table structure for table `student_task`
--

CREATE TABLE `student_task` (
  `student_task_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `task_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `task_status` tinyint(4) NOT NULL,
  `end_date` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_task`
--

INSERT INTO `student_task` (`student_task_id`, `task_id`, `floc`, `task_fdatein`, `fdesc`, `fname`, `task_status`, `end_date`, `student_id`, `grade`) VALUES
(11, 81, 'admin/uploads/sample.pdf', '2022-08-15 10:12:04', 'abcd', 'efghij', 1, '2022-10-01 11:13:49', 22, '90');

-- --------------------------------------------------------

--
-- Table structure for table `student_uploaded_task`
--

CREATE TABLE `student_uploaded_task` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_uploaded_task`
--

INSERT INTO `student_uploaded_task` (`file_id`, `floc`, `fdatein`, `fdesc`, `student_id`, `fname`) VALUES
(100, 'admin/sample.docx', '2022-08-15 11:00:00', 'file', 22, 'task');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `number_grading` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `description`, `number_grading`) VALUES
(123, 'TLE10', 'Technology, Livelihood and Education', '', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `task_status` tinyint(2) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `floc`, `fdatein`, `fdesc`, `task_status`, `start_date`, `end_date`, `teacher_id`, `class_id`, `fname`) VALUES
(81, 'uploads/sample.docx', '2022-08-15 01:24:32', 'Task1', 1, '0000-00-00 00:00:00', '2022-10-01 00:00:00', 123, 2223, 'Task number 1'),
(88, 'uploads/2605_File_FB_IMG_15752132570449006.jpg', '2022-09-21 13:58:24', 'Please Answer', 1, '0000-00-00 00:00:00', '2022-10-01 00:00:00', 1234, 15, 'Sample'),
(92, 'uploads/7472_File_FB_IMG_15752133884258148.jpg', '2022-09-24 20:54:24', 'Test', 1, '0000-00-00 00:00:00', '2022-10-01 00:00:00', 1234, 15, 'Sample1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(200) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(1234, 'Admin', 'jazedane27', 'Admin', 'Admin', 'juzztine.jpg', '', '', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(15, 1234, 2223, 123, '/lmstle/admin/uploads/thumbnails.png', '2022-2023'),
(16, 1234, 2224, 123, '/lmstle/admin/uploads/thumbnails.png', '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(30, 15, 22, 1234),
(34, 15, 0, 1234),
(35, 15, 36, 1234),
(36, 16, 37, 1234),
(38, 16, 39, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(200) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `task_id`) VALUES
(40, 15, 'Submit Assignment file name <b>my_assignment</b>', '2022-08-31 12:00:50', 'view_submit_task.php', 22, 81);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_shared`
--

INSERT INTO `teacher_shared` (`teacher_shared_id`, `teacher_id`, `shared_teacher_id`, `floc`, `fdatein`, `fdesc`, `fname`) VALUES
(50, 1234, 60, 'admin/uploads/sample.jpg', '2022-08-31 01:00:10', 'Task', 'Task1');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `teacher_id`) VALUES
(115, 'admin', '2022-09-17 18:07:55', '2022-10-01 11:49:42', 1234),
(116, 'admin', '2022-09-17 18:26:07', '2022-10-01 11:49:42', 1234),
(117, 'admin', '2022-09-17 20:40:45', '2022-10-01 11:49:42', 1234),
(118, 'admin', '2022-09-17 22:07:00', '2022-10-01 11:49:42', 1234),
(119, 'admin', '2022-09-18 19:31:06', '2022-10-01 11:49:42', 1234),
(120, 'admin', '2022-09-18 19:35:51', '2022-10-01 11:49:42', 1234),
(121, 'Admin', '2022-09-18 20:39:36', '2022-10-01 11:49:42', 1234),
(122, 'Admin', '2022-09-18 20:52:53', '2022-10-01 11:49:42', 1234),
(123, 'Admin', '2022-09-18 21:05:59', '2022-10-01 11:49:42', 1234),
(124, 'Admin', '2022-09-18 21:09:15', '2022-10-01 11:49:42', 1234),
(125, 'Admin', '2022-09-18 22:33:18', '2022-10-01 11:49:42', 1234),
(126, 'Admin', '2022-09-19 08:57:12', '2022-10-01 11:49:42', 1234),
(127, 'Admin', '2022-09-19 09:08:16', '2022-10-01 11:49:42', 1234),
(128, 'Admin', '2022-09-19 18:24:05', '2022-10-01 11:49:42', 1234),
(129, 'Admin', '2022-09-19 18:43:27', '2022-10-01 11:49:42', 1234),
(130, 'Admin', '2022-09-19 19:09:49', '2022-10-01 11:49:42', 1234),
(131, 'Admin', '2022-09-19 19:10:06', '2022-10-01 11:49:42', 1234),
(132, 'Admin', '2022-09-19 19:10:17', '2022-10-01 11:49:42', 1234),
(133, 'Admin', '2022-09-19 19:10:31', '2022-10-01 11:49:42', 1234),
(134, 'Admin', '2022-09-19 19:10:58', '2022-10-01 11:49:42', 1234),
(135, 'Admin', '2022-09-19 19:11:19', '2022-10-01 11:49:42', 1234),
(136, 'Admin', '2022-09-19 21:17:54', '2022-10-01 11:49:42', 1234),
(137, 'Admin', '2022-09-19 21:39:40', '2022-10-01 11:49:42', 1234),
(138, 'Admin', '2022-09-19 22:11:56', '2022-10-01 11:49:42', 1234),
(139, 'Admin', '2022-09-20 12:40:35', '2022-10-01 11:49:42', 1234),
(140, 'Admin', '2022-09-20 17:22:38', '2022-10-01 11:49:42', 1234),
(141, 'Admin', '2022-09-20 18:40:23', '2022-10-01 11:49:42', 1234),
(142, 'Admin', '2022-09-20 20:15:09', '2022-10-01 11:49:42', 1234),
(143, 'Admin', '2022-09-20 21:03:55', '2022-10-01 11:49:42', 1234),
(144, 'Admin', '2022-09-20 21:20:35', '2022-10-01 11:49:42', 1234),
(145, 'Admin', '2022-09-20 21:28:24', '2022-10-01 11:49:42', 1234),
(146, 'Admin', '2022-09-20 21:56:31', '2022-10-01 11:49:42', 1234),
(147, 'Admin', '2022-09-21 10:13:51', '2022-10-01 11:49:42', 1234),
(148, 'Admin', '2022-09-24 19:59:27', '2022-10-01 11:49:42', 1234),
(149, 'Admin', '2022-09-25 20:45:48', '2022-10-01 11:49:42', 1234),
(150, 'Admin', '2022-09-25 21:57:44', '2022-10-01 11:49:42', 1234),
(151, 'Admin', '2022-09-25 22:26:00', '2022-10-01 11:49:42', 1234),
(152, 'Admin', '2022-09-26 20:41:53', '2022-10-01 11:49:42', 1234),
(153, 'Admin', '2022-09-27 16:31:28', '2022-10-01 11:49:42', 1234),
(154, 'Admin', '2022-09-27 16:48:52', '2022-10-01 11:49:42', 1234),
(155, 'Admin', '2022-09-27 17:00:41', '2022-10-01 11:49:42', 1234),
(156, 'Admin', '2022-09-27 17:01:56', '2022-10-01 11:49:42', 1234),
(157, 'Admin', '2022-09-28 15:57:07', '2022-10-01 11:49:42', 1234),
(158, 'Admin', '2022-09-28 16:54:39', '2022-10-01 11:49:42', 1234),
(159, 'Admin', '2022-09-28 21:26:30', '2022-10-01 11:49:42', 1234),
(160, 'Admin', '2022-09-28 21:28:37', '2022-10-01 11:49:42', 1234),
(161, 'Admin', '2022-09-28 21:45:12', '2022-10-01 11:49:42', 1234),
(162, 'Admin', '2022-09-28 21:52:57', '2022-10-01 11:49:42', 1234),
(163, 'Admin', '2022-09-28 23:14:28', '2022-10-01 11:49:42', 1234),
(164, 'Admin', '2022-09-30 20:43:05', '2022-10-01 11:49:42', 1234),
(165, 'Admin', '2022-09-30 21:16:56', '2022-10-01 11:49:42', 1234),
(166, 'Admin', '2022-10-01 10:13:43', '2022-10-01 11:49:42', 1234),
(167, 'Admin', '2022-10-01 11:53:56', '', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_task`
--
ALTER TABLE `student_task`
  ADD PRIMARY KEY (`student_task_id`);

--
-- Indexes for table `student_uploaded_task`
--
ALTER TABLE `student_uploaded_task`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2226;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student_task`
--
ALTER TABLE `student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_uploaded_task`
--
ALTER TABLE `student_uploaded_task`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

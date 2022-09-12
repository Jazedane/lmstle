-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 04:47 AM
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
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `username`, `password`, `location`, `status`) VALUES
(21, 'Jaze ', 'Dane', 2223, '22-0001', 'jazedane', 'uploads/Tree1.png', 'Registered');

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
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_task`
--

INSERT INTO `student_task` (`student_task_id`, `task_id`, `floc`, `task_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(11, 81, 'admin/sample.pdf', '2022-08-15 10:12:04', 'abcd', 'efghij', 21, '90');

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
(100, 'admin/sample.docx', '2022-08-15 11:00:00', 'file', 1, 'task');

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
-- Table structure for table `task_update`
--

CREATE TABLE `task_update` (
  `task_id` int(11) NOT NULL,
  `floc` varchar(200) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_update`
--

INSERT INTO `task_update` (`task_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(81, 'uploads/sample.docx', '2022-08-16 11:00:01', 'abcdf', 1234, 2223, 'Task Number 1');

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
(1234, 'admin', 'admin', 'Admin', 'Admin', 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', 'Activated'),
(1235, 'Jenifer88', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Odell', 'Rogahn', '', '', '', '');

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
(15, 10, 2223, 123, 'admin/uploads/sample.jpg', '2022-2023'),
(16, 1234, 2223, 123, 'admin/uploads/thumbnails.jpg', '2022-2023'),
(17, 1234, 0, 123, 'admin/uploads/thumbnails.jpg', '2022-2023'),
(18, 21, 2223, 123, 'admin/uploads/thumbnails.jpg', '2022-2023'),
(19, 1234, 2224, 123, 'admin/uploads/thumbnails.jpg', '2022-2023');

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
(30, 15, 21, 1234);

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
(40, 15, 'Submit Assignment file name <b>my_assignment</b>', '2022-08-31 12:00:50', 'view_submit_assignment.php', 21, 22);

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
(50, 10, 60, 'admin/uploads/sample.jpg', '2022-08-31 01:00:10', 'Task', 'Task1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_task`
--

CREATE TABLE `teacher_task` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', '2022-08-16 11:00:00', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-05 13:45:47', '2022-09-11 23:05:05', 1234),
(0, 'Admin', '2022-09-05 15:06:01', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-05 15:12:24', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-05 21:42:27', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-07 14:40:52', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-07 16:54:14', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:01:22', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:01:22', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:03:09', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:03:11', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:03:26', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:05:16', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:05:24', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:45:07', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:46:24', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 12:54:49', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-10 16:34:24', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 21:09:49', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 21:26:02', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:10:49', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:42:13', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:43:52', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:44:09', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:47:58', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:48:59', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:50:23', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:55:18', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:55:30', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:56:35', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:57:15', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:58:46', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 22:59:32', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 23:03:39', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 23:03:48', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 23:04:02', '2022-09-11 23:05:05', 1234),
(0, 'admin', '2022-09-11 23:13:04', '', 1234),
(0, 'admin', '2022-09-11 23:13:59', '', 1234),
(0, 'admin', '2022-09-11 23:14:13', '', 1234),
(0, 'admin', '2022-09-12 10:21:09', '', 1234),
(0, 'admin', '2022-09-12 10:25:21', '', 1234),
(0, 'admin', '2022-09-12 10:25:47', '', 1234),
(0, 'admin', '2022-09-12 10:28:28', '', 1234),
(0, 'admin', '2022-09-12 10:37:16', '', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

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
-- Indexes for table `task_update`
--
ALTER TABLE `task_update`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2225;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_task`
--
ALTER TABLE `student_task`
  MODIFY `student_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_update`
--
ALTER TABLE `task_update`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 08:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sshekhar_13151421_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `batch_name` varchar(100) NOT NULL,
  `batch_start_time` time NOT NULL,
  `batch_end_time` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `center_id`, `batch_name`, `batch_start_time`, `batch_end_time`, `status`, `date_time`) VALUES
(1, 1, 'Batch-1', '18:45:00', '19:45:00', 0, '2022-06-05 18:46:37'),
(2, 1, 'Batch-2', '19:31:00', '20:31:00', 0, '2022-06-06 19:31:44'),
(3, 1, 'Batch-#', '21:46:00', '22:46:00', 0, '2022-06-06 19:46:52'),
(4, 1, 'Batch-3', '22:47:00', '23:47:00', 1, '2022-06-06 19:47:35'),
(5, 1, 'Batch-1', '18:20:00', '20:20:00', 1, '2022-06-08 18:20:18'),
(6, 1, 'uhgu', '18:33:00', '19:33:00', 1, '2022-06-08 18:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(100) NOT NULL,
  `center_email` varchar(100) NOT NULL,
  `center_password` varchar(200) NOT NULL,
  `center_c_password` varchar(100) NOT NULL,
  `center_mob_num` varchar(50) NOT NULL,
  `center_logo` varchar(200) NOT NULL,
  `center_owner_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `center_course_tbl`
--

CREATE TABLE `center_course_tbl` (
  `center_course_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center_course_tbl`
--

INSERT INTO `center_course_tbl` (`center_course_id`, `center_id`, `course_id`, `date_time`) VALUES
(75, 1, 4, '2022-06-12 22:06:10'),
(76, 1, 5, '2022-06-12 22:06:20'),
(77, 1, 6, '2022-06-12 22:06:24'),
(79, 1, 3, '2022-07-26 10:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `center_owner`
--

CREATE TABLE `center_owner` (
  `center_owner_id` int(11) NOT NULL,
  `center_owner_name` varchar(100) NOT NULL,
  `center_owner_email` varchar(200) NOT NULL,
  `center_owner_mob_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(200) NOT NULL,
  `content_source` varchar(500) NOT NULL,
  `center_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_title`, `content_source`, `center_id`, `course_id`, `category_id`, `sub_category_id`, `date_time`) VALUES
(1, 'title1', 'xfsdfa', 1, 6, 0, 11, '2022-06-11 11:45:41'),
(2, 'title2', 'xfsdfa', 1, 6, 0, 11, '2022-06-11 11:45:41'),
(3, 'tttt1', 'kjlk', 1, 2, 39, 8, '2022-06-11 11:47:45'),
(4, 'tttt2', 'kjlk', 1, 2, 39, 8, '2022-06-11 11:47:45'),
(5, 'tttt3', 'kjlk', 1, 2, 39, 8, '2022-06-11 11:47:45'),
(6, 'dcdaf', 'dfda', 1, 6, 43, 11, '2022-06-11 11:50:57'),
(7, 'dsd', 'dfda', 1, 6, 43, 11, '2022-06-11 11:50:57'),
(8, 'dsd', 'dfda', 1, 6, 43, 11, '2022-06-11 11:50:57'),
(9, 'dsgfdsgfd', 'fsadfdsf', 1, 6, 43, 12, '2022-06-11 11:51:56'),
(10, 'aaaaaaaaaaaaaaaaaa', 'fsadfdsf', 1, 6, 43, 12, '2022-06-11 11:51:56'),
(11, 'qqqqqqqqqq', 'rer', 1, 6, 43, 11, '2022-06-11 11:52:56'),
(12, 'aaaaa', '', 1, 6, 43, 11, '2022-06-11 11:52:56'),
(13, 'title11111111111', 'https://stseducationindia.com/cource.php?v=stsindia&t=sss', 1, 6, 43, 11, '2022-06-11 12:20:03'),
(14, 'titlt22222222222', 'liknk2222222222', 1, 6, 43, 11, '2022-06-11 12:20:04'),
(15, 'titlte3', 'link3333333', 1, 6, 43, 11, '2022-06-11 12:20:04'),
(16, 'shekhar', 'https://www.shekhar.com/', 1, 6, 43, 11, '2022-06-12 06:04:45'),
(17, 'dsfsdfas2', 'dsfasdfsad', 1, 6, 43, 11, '2022-06-12 06:04:45'),
(18, 'sdfsdfdsfsd', 'ssdfdf', 1, 6, 43, 11, '2022-06-12 06:04:45'),
(19, 'stst', 'dgfdgf', 1, 2, 39, 8, '2022-06-12 06:35:48'),
(20, 'hjjhf', 'fjhfhgfhgf', 1, 2, 39, 8, '2022-06-12 06:35:48'),
(21, 'jfufyht', 'dghdf', 1, 2, 39, 8, '2022-06-12 06:35:48'),
(22, 'hgfhdhgfhg', 'gf', 1, 2, 39, 9, '2022-06-12 06:38:45'),
(23, 'gjhgjh', 'ddtrdtr', 1, 2, 39, 9, '2022-06-12 06:38:45'),
(24, 'dfgfgdfg', 'g.com', 1, 6, 55, 16, '2022-06-12 22:12:13'),
(25, 'tttt', 'ttttt', 1, 6, 43, 12, '2022-06-13 17:58:42'),
(26, 'ddddd', 'fgggg', 1, 6, 43, 12, '2022-06-13 17:58:43'),
(27, 'dsfdsg', 'fgdfd', 1, 6, 43, 12, '2022-06-13 17:58:43'),
(28, 'Atomic Phy', 'sgsdfgdfgdf', 1, 3, 62, 34, '2022-07-26 09:56:06'),
(29, 'sdfsd', 'fsgdsfgsdf', 1, 3, 62, 34, '2022-07-26 09:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `content_category`
--

CREATE TABLE `content_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `center_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_category`
--

INSERT INTO `content_category` (`category_id`, `category_name`, `center_id`, `course_id`, `date_time`) VALUES
(35, 'SS1', 1, 5, '2022-06-08 20:55:24'),
(36, 'SS2', 1, 5, '2022-06-08 20:55:24'),
(37, 'SS3', 1, 5, '2022-06-08 20:55:24'),
(38, 'SS5', 1, 5, '2022-06-08 20:55:24'),
(39, 'Phy', 1, 2, '2022-06-09 12:52:39'),
(40, 'Che', 1, 2, '2022-06-09 12:52:39'),
(41, 'Math', 1, 2, '2022-06-09 12:52:39'),
(42, 'Bio', 1, 2, '2022-06-09 12:52:39'),
(43, 'GS-1', 1, 6, '2022-06-09 12:57:28'),
(44, 'GS-2', 1, 6, '2022-06-09 12:57:28'),
(45, 'GS-3', 1, 6, '2022-06-09 12:57:28'),
(46, 'GS-4', 1, 6, '2022-06-09 15:29:40'),
(47, 'GS-5', 1, 6, '2022-06-09 15:29:40'),
(48, 'sss', 1, 5, '2022-06-09 16:16:20'),
(49, 'sts', 1, 5, '2022-06-09 16:16:20'),
(50, 'Physics', 1, 5, '2022-06-09 16:16:20'),
(51, 'trddrt', 1, 5, '2022-06-12 22:07:56'),
(52, 'gffft', 1, 4, '2022-06-12 22:08:19'),
(53, 'ytytty', 1, 4, '2022-06-12 22:08:20'),
(54, 'uyyt', 1, 4, '2022-06-12 22:08:20'),
(55, 'yhyhyh', 1, 6, '2022-06-12 22:09:10'),
(56, 'yuhu', 1, 6, '2022-06-12 22:09:10'),
(57, 'yyyy', 1, 6, '2022-06-12 22:09:10'),
(58, 'Rishabh', 1, 6, '2022-06-16 18:30:05'),
(59, 'Shekhar', 1, 6, '2022-06-16 18:30:05'),
(60, 'sts', 1, 6, '2022-06-21 08:58:28'),
(61, 'sts2', 1, 6, '2022-06-21 08:58:29'),
(62, 'cat1', 1, 3, '2022-07-26 09:49:32'),
(63, 'cat2', 1, 3, '2022-07-26 09:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `content_sub_category`
--

CREATE TABLE `content_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_sub_category`
--

INSERT INTO `content_sub_category` (`sub_category_id`, `sub_category_name`, `category_id`, `course_id`, `center_id`, `date_time`) VALUES
(1, 'dsfs', 45, 6, 1, '2022-06-09 20:26:15'),
(2, 'sdfgs', 45, 6, 1, '2022-06-09 20:26:16'),
(3, 'kkkk', 37, 5, 1, '2022-06-09 21:04:03'),
(4, 'kkk', 37, 5, 1, '2022-06-09 21:04:04'),
(5, 'kkj', 44, 6, 1, '2022-06-09 21:08:29'),
(6, 'kkk', 37, 5, 1, '2022-06-09 21:31:34'),
(7, 'mnn', 37, 5, 1, '2022-06-09 21:31:34'),
(8, 'sdfg', 39, 2, 1, '2022-06-09 21:55:33'),
(9, 'sdg', 39, 2, 1, '2022-06-09 21:55:34'),
(10, 'sdgs', 39, 2, 1, '2022-06-09 21:55:34'),
(11, 'xfsd', 43, 6, 1, '2022-06-09 22:14:45'),
(12, 'vcxvxcx', 43, 6, 1, '2022-06-09 22:15:27'),
(13, 'jhfhgf', 47, 6, 1, '2022-06-10 16:14:15'),
(14, 'gjhgjh', 47, 6, 1, '2022-06-10 16:14:15'),
(15, 'kjgjh', 47, 6, 1, '2022-06-10 16:14:15'),
(16, 'sdjklsdfgh', 55, 6, 1, '2022-06-12 22:10:21'),
(17, '1', 59, 6, 1, '2022-06-16 18:32:07'),
(18, '2', 59, 6, 1, '2022-06-16 18:32:07'),
(19, '3', 59, 6, 1, '2022-06-16 18:32:07'),
(20, 'fasdfd', 43, 6, 1, '2022-06-21 17:09:54'),
(21, 'fdsg', 43, 6, 1, '2022-06-21 17:09:54'),
(22, 'sdgdsfg', 43, 6, 1, '2022-06-21 17:09:54'),
(23, 'ghjghjh', 43, 6, 1, '2022-06-21 17:09:54'),
(24, 'ghfg', 43, 6, 1, '2022-06-21 17:09:54'),
(25, 'sdfa', 43, 6, 1, '2022-06-21 17:09:54'),
(26, 'safd', 43, 6, 1, '2022-06-21 17:09:54'),
(27, 'sadfds', 43, 6, 1, '2022-06-21 17:09:54'),
(28, 'ssdfds', 43, 6, 1, '2022-06-21 17:09:54'),
(29, 'dfgdf', 43, 6, 1, '2022-06-21 17:09:54'),
(30, 'sdfgfsd', 43, 6, 1, '2022-06-21 17:09:54'),
(31, 'gdhdgf', 43, 6, 1, '2022-06-21 17:09:54'),
(32, 'hjhgjh', 43, 6, 1, '2022-06-21 17:09:54'),
(33, 'fasdfasd', 43, 6, 1, '2022-06-27 15:40:01'),
(34, 'sub 1', 62, 3, 1, '2022-07-26 09:54:42'),
(35, 'sub 2', 62, 3, 1, '2022-07-26 09:54:42'),
(36, 'sub 3', 62, 3, 1, '2022-07-26 09:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`course_id`, `course_name`, `category`, `date_time`) VALUES
(2, '10th', '', '2022-06-04 09:16:25'),
(3, '11th', '', '2022-06-04 09:16:45'),
(4, '12th', '', '2022-06-04 09:16:45'),
(5, 'UPSC CSE', '', '2022-06-04 09:17:07'),
(6, 'NEET', '', '2022-06-04 09:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `live_classes`
--

CREATE TABLE `live_classes` (
  `live_classes_id` int(11) NOT NULL,
  `live_topic` varchar(150) NOT NULL,
  `host_name` varchar(100) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `live_date` date NOT NULL,
  `live_start_time` time NOT NULL,
  `live_end_time` time NOT NULL,
  `live_url` varchar(200) NOT NULL,
  `center_id` int(11) NOT NULL,
  `created_by` varchar(2) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `live_desc` varchar(1000) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_classes`
--

INSERT INTO `live_classes` (`live_classes_id`, `live_topic`, `host_name`, `batch_id`, `live_date`, `live_start_time`, `live_end_time`, `live_url`, `center_id`, `created_by`, `teacher_id`, `live_desc`, `date_time`) VALUES
(1, 'live 1', 'sadfa', 5, '2022-06-25', '15:24:00', '15:24:00', 'asdfasdf/sd/f/df//f/asdf/aF:S:FASDF/fasF:.com', 1, 'c', 0, 'india is my love', '2022-06-20 15:26:21'),
(2, 'live 2', 'love', 4, '2022-06-25', '15:24:00', '15:24:00', 'asdfasdf/sd/f/df//f/asdf/aF:S:FASDF/fasF:.com', 1, 'c', 0, 'sdafdsfsdfdsf', '2022-06-20 15:27:42'),
(3, 'live 3', 'lllll', 5, '2022-06-07', '08:24:00', '15:24:00', 'asdfasdf/sd/f/df//f/asdf/aF:S:FASDF/fasF:.commmmm', 1, 'c', 0, 'sdafdsfsdfdsfmmmmmmmmmmmmmmmmm', '2022-06-20 15:29:19'),
(4, 'df', 'dsf', 5, '2022-06-20', '15:30:00', '16:30:00', 'dfadsf', 1, 'c', 0, 'sdfdsfasdfdsf', '2022-06-20 15:30:30'),
(5, 'monu', 'shekharq', 4, '2022-06-24', '16:17:00', '17:17:00', 'https://www.stseducationindia.com', 1, 'c', 0, 'india first big online GCMS software prvider', '2022-06-20 16:18:23'),
(6, 'dsfadsf', 'dsfadf', 0, '0000-00-00', '00:00:00', '00:00:00', '', 1, 'c', 0, '', '2022-06-24 22:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meeting_id` int(11) NOT NULL,
  `meeting_topic` varchar(200) NOT NULL,
  `host_name` varchar(100) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_start_time` time NOT NULL,
  `meeting_end_time` time NOT NULL,
  `meeting_platform` varchar(3) NOT NULL,
  `meeting_url` varchar(200) NOT NULL,
  `meet_join_id` varchar(30) NOT NULL,
  `meet_join_password` varchar(100) NOT NULL,
  `center_id` int(11) NOT NULL,
  `meeting_desc` varchar(1000) NOT NULL,
  `created_by` varchar(2) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `meeting_topic`, `host_name`, `batch_id`, `meeting_date`, `meeting_start_time`, `meeting_end_time`, `meeting_platform`, `meeting_url`, `meet_join_id`, `meet_join_password`, `center_id`, `meeting_desc`, `created_by`, `teacher_id`, `date_time`) VALUES
(28, 'Today meet', 'Shkhar Sir', 4, '2022-06-24', '14:18:00', '15:18:00', 'GM', 'https://meet.us/j/333444555', '', '', 1, 'today meeting\r\n', '', 0, '2022-06-24 14:19:13'),
(29, 'nextday', 'dsa', 4, '2022-06-25', '14:20:00', '16:20:00', 'ZM', 'https://zoom.us/j/333444555', '29', 'asdfasd', 1, 'dsfgfdsg', '', 0, '2022-06-24 14:20:23'),
(30, 'ALL Stu', 'STS', 0, '2022-06-25', '14:46:00', '14:46:00', 'GM', 'https://meet.us/j/333444555', '', '', 1, 'sdafsdaf', '', 0, '2022-06-24 14:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `student_first_name` varchar(100) NOT NULL,
  `student_last_name` varchar(100) NOT NULL,
  `student_email` varchar(200) NOT NULL,
  `student_password` varchar(200) NOT NULL,
  `student_c_password` varchar(200) NOT NULL,
  `student_mob_num` varchar(50) NOT NULL,
  `student_dob` date NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `fee_type` varchar(20) NOT NULL,
  `fee_amount` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `area_code` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `center_id`, `student_first_name`, `student_last_name`, `student_email`, `student_password`, `student_c_password`, `student_mob_num`, `student_dob`, `course_id`, `batch_id`, `fee_type`, `fee_amount`, `country`, `state`, `area_code`, `date_time`) VALUES
(1, 1, 'Sudhanshu', 'Shekhar', 'ss@gmail.com', '1234', '1234', '9876576543', '2022-06-09', 1, 0, 'm', '500', 'india', '', '88', '2022-06-04 07:48:07'),
(2, 1, 'Santosh', 'Singh', 'stseducationindia@gmail.com', '1234', '1234', '06202254450', '2022-06-15', 1, 0, 'm', '500', 'india', 'Bihar', '844330', '2022-06-04 07:48:07'),
(3, 1, 'Santosh', 'Singh', 'stsedutionindia@gmail.com', '1234', '1234', '06202254450', '2022-06-15', 1, 0, 'm', '500', 'india', 'Bihar', '844330', '2022-06-04 07:48:07'),
(4, 1, 'Anju', 'Devi', 'flpsantosh1@gmail.com', '1234', '1234', '+918873708049', '2022-06-06', 1, 0, 'm', '500', 'india', 'Bihar', '867733', '2022-06-04 07:48:07'),
(5, 1, 'Anju', 'kumari', 'flpsantosh@gmail.com', '1234', '1234', '+918873708049', '2022-06-21', 1, 0, 'y', '3000', 'india', 'Bihar', '876433', '2022-06-04 07:48:07'),
(6, 2, 'student3', 'sfas', 'sfas@gmail.com', '12345', '12345', '87645465454', '2022-06-21', 3, 0, 'm', '600', 'india', 'Bihar', '65432', '2022-06-04 07:48:07'),
(7, 2, 'rishab', 'kumar', 'r@gmail.com', '1234', '1234', '34567888996', '2022-06-13', 1, 0, 'm', '500', 'india', 'Bihar', '654322', '2022-06-04 07:48:07'),
(8, 1, 'Rajeev', 'inr', 'rajeev@gmail.com', '12345', '12345', '7234256382', '2022-06-12', 1, 0, 'm', '600', 'india', 'Bihar', '833254', '2022-06-04 07:48:07'),
(9, 1, 'Abhinav', 'kumar', 'abhinav@gmail.com', '12345', '12345', '6352187652', '2022-06-14', 1, 0, 'm', '600', 'india', 'Bihar', '844503', '2022-06-04 07:48:07'),
(10, 1, 'Ashish', 'Raj', 'raj@gmail.com', '12345', '123456', '43562899933', '2026-08-19', 1, 0, 'y', '600', 'india', 'Bihar', '855304', '2022-06-04 07:48:07'),
(11, 1, 'Anju', 'ss', 'flpsanth1@gmail.com', '1234', '1235', '+918873708049', '2022-06-23', 3, 0, 'm', '1000', 'india', 'Bihar', '65434', '2022-06-05 15:24:53'),
(12, 1, 'Anju', 'ss', 'flp@gmail.com', '1234', '1235', '+918873708049', '2022-06-23', 2, 0, 'm', '1000', 'india', 'Bihar', '65434', '2022-06-05 15:25:44'),
(13, 1, 'Santosh', 'sdfas', 'stseducnindia@gmail.com', '123', '123', '06202254450', '2022-06-22', 1, 0, 'm', '956', 'india', 'Bihar', '876544', '2022-06-05 15:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mob_num` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_amount` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `area_code` varchar(30) NOT NULL,
  `teacher_photo` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `c_password` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `center_id`, `first_name`, `last_name`, `email`, `mob_num`, `dob`, `subject`, `payment_type`, `payment_amount`, `country`, `state`, `area_code`, `teacher_photo`, `password`, `c_password`, `date_time`) VALUES
(1, 1, 'Sudhnashu', 'Shekhar', 'ss@gmail.com', '1234765678', '0000-00-00', 'Math', 'm', '1500', 'india', 'bihar', '78987', '', '1234', '1234', '2022-06-04 07:07:34'),
(5, 1, 'teacher1', 'kumar', 't1@gmail.com', '67346482344', '2022-06-30', 'Physics', 'm', '2000', 'india', 'Bihar', '65456', '', '12345', '1235', '2022-06-04 08:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `test_series`
--

CREATE TABLE `test_series` (
  `test_series_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `test_series_name` varchar(200) NOT NULL,
  `no_of_questions` int(11) NOT NULL,
  `marks_of_every_question` int(11) NOT NULL,
  `test_duration` int(11) NOT NULL,
  `time_unit` varchar(2) NOT NULL,
  `center_id` int(11) NOT NULL,
  `created_by` varchar(2) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_series`
--

INSERT INTO `test_series` (`test_series_id`, `course_id`, `test_series_name`, `no_of_questions`, `marks_of_every_question`, `test_duration`, `time_unit`, `center_id`, `created_by`, `teacher_id`, `status`, `date_time`) VALUES
(4, 3, 'Physics Test', 100, 2, 3, 'h', 1, 'c', 0, 1, '2022-06-27 16:13:25'),
(5, 4, 'Chem', 100, 2, 2, 'h', 1, 'c', 0, 0, '2022-07-24 13:34:26'),
(6, 6, 'biotech', 10, 10, 30, 'm', 1, 'c', 0, 0, '2022-07-24 14:48:28'),
(7, 3, 'Today', 100, 2, 3, 'h', 1, 'c', 0, 0, '2022-07-26 09:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `ts_question`
--

CREATE TABLE `ts_question` (
  `ts_question_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option_A` varchar(40) NOT NULL,
  `option_B` varchar(40) NOT NULL,
  `option_C` varchar(40) NOT NULL,
  `option_D` varchar(40) NOT NULL,
  `correct_option` varchar(3) NOT NULL,
  `test_series_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_question`
--

INSERT INTO `ts_question` (`ts_question_id`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `correct_option`, `test_series_id`, `date_time`) VALUES
(10, 'monu', 'erwere', 'retrt', 'rwerw', 'ertr5', 'A', 6, '2022-07-24 14:50:39'),
(11, 'working or not', 'whrgfuwrhiru', 'hrgbwrhuiirf', 'jnwrgrfrh', 'wfggrhgirh', 'B', 6, '2022-07-24 14:50:39'),
(12, '56tgrtngrtnk', 'tgnbthn', 'hnthnhn', 'nthnthnh', 'nyntyntyn', 'C', 6, '2022-07-24 14:50:39'),
(13, 'edit dsfg', 'edit', 'edit', 'edit3', 'edit4', 'B', 4, '2022-07-24 17:47:25'),
(14, 'sadfasd', 'sdafa', 'sadf', 'sdfsadf', 'sdfas', 'D', 6, '2022-07-25 16:59:40'),
(15, 'dfasdf', 'dsfa', 'asdfa', 'a', 'sdfa', 'B', 6, '2022-07-25 17:01:42'),
(16, 'hghjhg', 'hj', 'ghjg', 'g', 'jhg', 'C', 6, '2022-07-25 21:30:25'),
(17, 'hghjhgjhkjh@=234', 'hj', 'ghjg', 'gkjhkj', 'jhg', 'A', 6, '2022-07-25 21:30:50'),
(18, 'SDAFKJASDHFJK JS', 'jhgjhg', 'gjh', 'gjhg', 'jg', 'C', 7, '2022-07-26 09:59:58'),
(19, 'WHAT', 'sdfds', 'FDGDF', 'SDFDSG', 'FGDFG', 'C', 7, '2022-07-26 09:59:58'),
(20, 'DSFDSG', 'DSF', 'JHG', 'JHGJH', 'GJ', 'C', 7, '2022-07-26 09:59:58'),
(21, 'GJJ', 'HGJH', 'JH', 'JHG', 'JHGJ', 'C', 7, '2022-07-26 09:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `ts_result`
--

CREATE TABLE `ts_result` (
  `ts_result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ts_question_id` int(11) NOT NULL,
  `answer` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`center_id`),
  ADD UNIQUE KEY `center_email` (`center_email`);

--
-- Indexes for table `center_course_tbl`
--
ALTER TABLE `center_course_tbl`
  ADD PRIMARY KEY (`center_course_id`);

--
-- Indexes for table `center_owner`
--
ALTER TABLE `center_owner`
  ADD PRIMARY KEY (`center_owner_id`),
  ADD UNIQUE KEY `center_owner_email` (`center_owner_email`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `content_category`
--
ALTER TABLE `content_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `content_sub_category`
--
ALTER TABLE `content_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD PRIMARY KEY (`live_classes_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_email` (`email`);

--
-- Indexes for table `test_series`
--
ALTER TABLE `test_series`
  ADD PRIMARY KEY (`test_series_id`);

--
-- Indexes for table `ts_question`
--
ALTER TABLE `ts_question`
  ADD PRIMARY KEY (`ts_question_id`);

--
-- Indexes for table `ts_result`
--
ALTER TABLE `ts_result`
  ADD PRIMARY KEY (`ts_result_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `center_course_tbl`
--
ALTER TABLE `center_course_tbl`
  MODIFY `center_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `center_owner`
--
ALTER TABLE `center_owner`
  MODIFY `center_owner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `content_category`
--
ALTER TABLE `content_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `content_sub_category`
--
ALTER TABLE `content_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `live_classes`
--
ALTER TABLE `live_classes`
  MODIFY `live_classes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_series`
--
ALTER TABLE `test_series`
  MODIFY `test_series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ts_question`
--
ALTER TABLE `ts_question`
  MODIFY `ts_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ts_result`
--
ALTER TABLE `ts_result`
  MODIFY `ts_result_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 11:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_ewsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `closure_date` varchar(100) NOT NULL,
  `final_closure_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`, `start_date`, `closure_date`, `final_closure_date`) VALUES
(8, 'test 2', '03/30/2019', '04/01/2019', '04/07/2019'),
(10, 'ss', '03/30/2019', '04/08/2019', '04/10/2019'),
(13, 'test ', '04/04/2019', '04/12/2019', '04/13/2019'),
(14, 'ok', '04/14/2019', '04/20/2019', '04/22/2019');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` varchar(150) CHARACTER SET utf8 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 2, 'hi', '2019-03-29 21:32:41', 0),
(2, 2, 1, 'hello', '2019-03-29 21:33:47', 0),
(3, 1, 2, 'whats up', '2019-03-29 21:34:04', 0),
(4, 11, 2, 'nothing', '2019-03-29 21:34:32', 0),
(5, 2, 1, 'ow', '2019-03-29 21:34:39', 0),
(6, 2, 1, 'kj', '2019-03-29 21:40:41', 0),
(7, 1, 2, 'ok', '2019-03-29 21:41:05', 0),
(8, 2, 1, 'k', '2019-03-29 21:41:12', 0),
(9, 1, 2, 'done', '2019-03-29 21:44:27', 0),
(10, 9, 2, 'ok', '2019-03-29 21:47:19', 0),
(11, 8, 1, 'ok', '2019-03-29 21:56:08', 0),
(12, 7, 1, 'why', '2019-03-29 21:56:22', 0),
(13, 11, 2, 'whats up', '2019-03-29 22:05:39', 0),
(14, 11, 9, 'hello', '2019-03-30 17:49:05', 0),
(15, 9, 11, 'whats up', '2019-03-30 17:49:39', 0),
(16, 1, 2, 'hi', '2019-03-30 21:28:21', 0),
(17, 1, 2, 'ok', '2019-04-04 11:13:56', 0),
(18, 1, 2, 'now ok', '2019-04-09 19:46:50', 0),
(19, 4, 6, 'hello', '2019-04-09 20:35:09', 0),
(21, 6, 4, 'no', '2019-04-10 19:09:26', 0),
(22, 6, 4, 'hello sir', '2019-04-10 19:13:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_body` varchar(800) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `author_type` varchar(30) DEFAULT NULL,
  `date` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `comment_body`, `author_id`, `author_type`, `date`, `time`) VALUES
(7, 10, 'hjhj', 2, 'STAFF', '03/28/2019', '06:24:32 pm'),
(8, 10, 'sssssssssssssssssssssssssssssssss', 2, 'STAFF', '03/28/2019', '06:25:24 pm'),
(9, 12, '12', 2, 'STAFF', '03/28/2019', '06:27:00 pm'),
(10, 13, '13', 2, 'STAFF', '03/28/2019', '06:27:22 pm'),
(11, 12, 'ok', 2, 'STAFF', '03/30/2019', '07:52:48 pm'),
(12, 10, 'ok', 2, 'STAFF', '03/30/2019', '07:53:55 pm'),
(13, 13, 'ok', 2, 'STAFF', '03/30/2019', '07:54:46 pm'),
(14, 13, 'ok', 2, 'STAFF', '03/30/2019', '07:55:12 pm'),
(15, 12, 'ok', 2, 'STAFF', '03/30/2019', '08:06:01 pm'),
(16, 13, 'ki obostha', 2, 'STAFF', '03/30/2019', '08:06:12 pm'),
(17, 10, 'ok', 2, 'STAFF', '03/30/2019', '08:08:29 pm'),
(18, 10, 'no', 8, 'Admin', '03/30/2019', '10:32:57 pm'),
(19, 10, 'no', 8, 'Admin', '03/30/2019', '10:33:00 pm'),
(20, 12, 'rrrrrr', 2, 'STAFF', '04/04/2019', '01:31:50 pm'),
(21, 12, '', 2, 'STAFF', '04/04/2019', '01:31:52 pm'),
(22, 10, 'ok sir', 8, 'Admin', '04/09/2019', '09:35:41 pm'),
(23, 11, 'now ok', 8, 'Admin', '04/09/2019', '09:41:23 pm'),
(24, 11, 'now ok mc', 2, 'STAFF', '04/09/2019', '09:45:28 pm'),
(25, 11, 'now mm ok', 7, 'STAFF', '04/09/2019', '09:52:09 pm'),
(26, 10, 'sdsdsds', 11, 'STAFF', '04/09/2019', '10:34:50 pm');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(0, 'Super'),
(1, 'IT'),
(2, 'CSE'),
(3, 'BIT'),
(4, 'CIS');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `magazine_title` varchar(200) DEFAULT NULL,
  `magazine_desc` varchar(2000) DEFAULT NULL,
  `post_author_id` int(11) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `post_type` varchar(100) DEFAULT NULL,
  `file_input` varchar(100) DEFAULT NULL,
  `post_approved` varchar(100) DEFAULT NULL,
  `post_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_name`, `magazine_title`, `magazine_desc`, `post_author_id`, `department`, `date`, `time`, `post_type`, `file_input`, `post_approved`, `post_status`) VALUES
(10, 'test 2', 'abcd', 'abcd', 1, 'IT', '2019-03-24', '01:01:42 am', 'Public', 'zip_file/1553367702.zip', 'Approved', 'Select'),
(11, 'test 2', 'oke', 'asas', 1, 'IT', '2019-03-23', '02:46:36 am', 'Public', 'zip_file/1553373996.zip', 'Approved', 'Select'),
(12, 'ss', 'sa', 'asw', 9, 'CIS', '2019-03-24', '02:46:55 am', 'Public', 'zip_file/1553374015.zip', 'Approved', 'Select'),
(13, 'test 2', 'sfsadfdasf', 'sdsadsafdas', 9, 'CIS', '2019-03-25', '07:28:46 pm', 'Anonymous', 'zip_file/1553520526.zip', 'Approved', 'Select'),
(14, 'test 2', 'sssssssss', 'ok', 1, 'IT', '2019-03-25', '07:34:26 pm', 'Public', 'zip_file/1553520866.zip', 'Not Approved', 'Pending'),
(15, 'ss', 'ww', 'w', 9, 'CIS', '2019-03-25', '07:35:51 pm', 'Public', 'zip_file/1553520951.zip', 'Approved', 'Select'),
(18, 'Ok', 'sdsd', 'ssss', 1, 'IT', '2019-03-25', '08:36:14 pm', 'Public', 'zip_file/1553524574.zip', 'Not Approved', 'Pending'),
(19, 'test ', 'testiing', 'sds', 3, 'CIS', '2019-04-04', '12:40:53 am', 'Public', '', 'Not Approved', 'Pending'),
(20, 'test ', 'testing2', 'sdsdfdafeadf', 4, 'BIT', '2019-04-04', '01:43:39 am', 'Anonymous', '', 'Not Approved', 'Select'),
(21, 'test ', 'ssd', 'sdddddd', 4, 'BIT', '2019-04-04', '01:48:10 am', 'Public', '', 'Not Approved', 'Pending'),
(24, 'test ', 'lets start', 'ok ok', 9, 'CIS', '2019-04-11', '01:38:50 am', 'Anonymous', '', 'Not Approved', 'Pending'),
(25, 'test ', 'sdsd', 'sdsd', 3, 'CIS', '2019-04-12', '11:28:08 pm', 'Public', 'zip_file/1555090088.zip', 'Not Approved', 'Pending'),
(26, 'ok', 'mail', 'mail', 3, 'CIS', '2019-04-13', '12:22:38 am', 'Anonymous', '', 'Not Approved', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `joinning_date` varchar(20) DEFAULT NULL,
  `post` varchar(20) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `department_id`, `joinning_date`, `post`, `photo`) VALUES
(2, 1, '2019-3-10', 'MC', 'dist/img/avatar3.png'),
(6, 3, '2019-5-1', 'MC', 'dist/img/user1-128x128.jpg'),
(7, 0, '2019-3-10', 'MM', 'dist/img/avatar.png'),
(8, 0, '2019-3-10', 'Admin', 'dist/img/avatar3.png'),
(11, 4, '2019-5-1', 'MC', 'dist/img/avatar.png'),
(21, 1, '2018-12-12', 'Guest', 'dist/img/avatar3.png'),
(22, 4, '2018-12-12', 'Guest', 'dist/img/avatar3.png'),
(23, 3, '2018-12-12', 'Guest', 'dist/img/avatar3.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `session` int(10) DEFAULT NULL,
  `account_status` varchar(20) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `department_id`, `session`, `account_status`, `photo`) VALUES
(1, 1, 2019, 'Active', 'dist/img/user1-128x128.jpg'),
(3, 4, 2019, 'Active', 'dist/img/user1-128x128.jpg'),
(4, 3, 2019, 'Active', 'dist/img/avatar3.png'),
(9, 4, 2019, 'Active', 'dist/img/user1-128x128.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `last_login_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_logout_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `user_type`, `email`, `password`, `status`, `last_login_activity`, `last_logout_activity`) VALUES
(1, 'Riazul', 'Islam', 'STD', 'riaz@diit.info', '1234', 'Activate', '2019-04-14 18:13:20', '2019-04-14 19:19:33'),
(2, 'Nazrana', 'Haque', 'STAFF', 'mc.it@gmail.com', '123', 'Activate', '2019-04-14 19:28:00', '2019-04-14 19:28:07'),
(3, 'Israfil', 'Samrat', 'STD', 'samrat@gmail.com', '123', 'Activate', '2019-04-12 17:10:34', '2019-04-12 18:31:04'),
(4, 'Faruk', 'Hosen', 'STD', 'faruk@gmail.com', '123456', 'Activate', '2019-04-14 18:49:12', '2019-04-14 18:44:59'),
(6, 'Mustafizur', 'Rahman', 'STAFF', 'mc.bit@gmail.com', '123', 'Activate', '2019-04-03 19:40:09', '2019-04-03 19:40:09'),
(7, 'Mr. Matthew ', 'Prichard', 'STAFF', 'mm@gmail.com', '123', 'Activate', '2019-04-14 19:28:31', '2019-04-14 19:34:24'),
(8, 'Administrator ', NULL, 'Admin ', 'admin@gmail.com', '123', 'Activate', '2019-04-14 19:27:23', '2019-04-14 19:27:53'),
(9, 'kaji', 'rasul', 'STD', 'kaji@gmail.com', '123', 'Activate', '2019-04-14 18:45:13', '2019-04-14 18:48:57'),
(11, 'Nayeema', 'Rahman', 'STAFF', 'mc.cis@gmail.com', '123', 'Activate', '2019-04-12 18:32:15', '2019-04-12 18:37:03'),
(21, 'Kazi', 'Sonnet', 'STAFF', 'sonnet.it@gmail.com', '123', 'Activate', '2019-04-14 20:20:21', '2019-04-14 20:20:38'),
(22, 'Minhaz', 'Hossain', 'STAFF', 'minhaz.cis@gmail.com', '123', 'Activate', '2019-04-14 20:21:40', '2019-04-14 19:40:48'),
(23, 'Rakibul', 'Hasan', 'STAFF', 'prince.bit@gmail.com', '123', 'Activate', '2019-04-14 19:50:17', '2019-04-14 19:50:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `F6` (`category_name`),
  ADD KEY `F7` (`post_author_id`),
  ADD KEY `D2` (`department`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `F4` (`department_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `F2` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `F7` FOREIGN KEY (`post_author_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `F3` FOREIGN KEY (`s_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `F4` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `F1` FOREIGN KEY (`std_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `F2` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

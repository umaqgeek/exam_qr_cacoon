-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2016 at 06:20 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qr_izhar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE IF NOT EXISTS `examination` (
  `e_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `e_datetime` datetime NOT NULL,
  `e_starttime` datetime NOT NULL,
  `e_endtime` datetime NOT NULL,
  `v_id` int(11) NOT NULL,
  `e_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`e_id`, `sub_id`, `e_datetime`, `e_starttime`, `e_endtime`, `v_id`, `e_status`) VALUES
(3, 2, '2016-11-16 00:00:00', '2016-10-15 13:30:00', '2016-10-15 16:30:00', 1, 1),
(5, 1, '2016-10-20 00:00:00', '2016-10-15 14:30:00', '2016-10-15 17:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lect_subject`
--

CREATE TABLE IF NOT EXISTS `lect_subject` (
  `ls_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lect_subject`
--

INSERT INTO `lect_subject` (`ls_id`, `s_id`, `sub_id`) VALUES
(7, 1, 2),
(8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff1`
--

CREATE TABLE IF NOT EXISTS `staff1` (
  `s_id` int(11) NOT NULL,
  `s_number` varchar(200) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_type` varchar(20) NOT NULL,
  `s_password` varchar(200) NOT NULL,
  `s_profilepic` varchar(200) NOT NULL,
  `s_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff1`
--

INSERT INTO `staff1` (`s_id`, `s_number`, `s_name`, `s_type`, `s_password`, `s_profilepic`, `s_status`) VALUES
(1, 's01', 'Prof Dr. Ayu', '2', 's', 'default-pic.png', 1),
(2, 'bpa1', 'En. Nizam Pavel', '1', 'z', 'default-pic.png', 1),
(3, 'k01', 'Kakashi Sensei', '2', 'k', 'default-pic.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE IF NOT EXISTS `staff_type` (
  `st_id` int(11) NOT NULL,
  `st_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`st_id`, `st_desc`) VALUES
(1, 'BPA Staff'),
(2, 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `stud_exam`
--

CREATE TABLE IF NOT EXISTS `stud_exam` (
  `se_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ses_id` int(11) NOT NULL DEFAULT '1',
  `se_checkin` datetime NOT NULL,
  `se_tableno` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_exam`
--

INSERT INTO `stud_exam` (`se_id`, `e_id`, `u_id`, `ses_id`, `se_checkin`, `se_tableno`) VALUES
(6, 3, 2, 1, '0000-00-00 00:00:00', 0),
(7, 5, 1, 1, '0000-00-00 00:00:00', 0),
(8, 3, 1, 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stud_exam_status`
--

CREATE TABLE IF NOT EXISTS `stud_exam_status` (
  `ses_id` int(11) NOT NULL,
  `ses_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_exam_status`
--

INSERT INTO `stud_exam_status` (`ses_id`, `ses_desc`) VALUES
(1, 'Absent'),
(2, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(200) NOT NULL,
  `sub_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_code`, `sub_name`, `sub_status`) VALUES
(1, 'BITP2223', 'Software Requirements and Design', 1),
(2, 'BITP3113', 'Object Oriented Programming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `u_id` int(11) NOT NULL,
  `u_matric` varchar(200) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `u_course` varchar(200) NOT NULL,
  `u_faculty` varchar(200) NOT NULL,
  `u_courseyear` varchar(20) NOT NULL,
  `u_contact` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_qrcode` text NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_profilepic` varchar(200) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`u_id`, `u_matric`, `u_name`, `u_course`, `u_faculty`, `u_courseyear`, `u_contact`, `u_email`, `u_qrcode`, `u_password`, `u_profilepic`, `u_status`) VALUES
(1, 'm03', 'Umaq Mukhtar', 'MITA', 'FTMK', '4', '0199737578', 'umaq@sukati.com', '', 'a', 'default-pic.png', 1),
(2, 'm01', 'Uchiha Sasuke', 'MITA', 'FTMK', '3', '091231231', 'sasuke@gmail.com', '', 'sa', 'default-pic.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `v_id` int(11) NOT NULL,
  `v_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`v_id`, `v_desc`) VALUES
(1, 'Sport Complex'),
(2, 'Main Hall'),
(3, 'Dewan Bestari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `lect_subject`
--
ALTER TABLE `lect_subject`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `staff1`
--
ALTER TABLE `staff1`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `stud_exam`
--
ALTER TABLE `stud_exam`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `stud_exam_status`
--
ALTER TABLE `stud_exam_status`
  ADD PRIMARY KEY (`ses_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lect_subject`
--
ALTER TABLE `lect_subject`
  MODIFY `ls_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `staff1`
--
ALTER TABLE `staff1`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stud_exam`
--
ALTER TABLE `stud_exam`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stud_exam_status`
--
ALTER TABLE `stud_exam_status`
  MODIFY `ses_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

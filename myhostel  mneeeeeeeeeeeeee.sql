-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2018 at 04:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin@admin.com', 'admin', '2018-10-29 03:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(5) NOT NULL,
  `reg_id` int(5) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `paytype` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `transno` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` text COLLATE latin1_spanish_ci NOT NULL,
  `paid_date` datetime DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `reg_id`, `mess_id`, `paytype`, `amount`, `transno`, `status`, `remark`, `paid_date`, `date`) VALUES
(6, 8, 4, NULL, 32, NULL, 0, '', NULL, '2018-11-26 18:50:41'),
(5, 6, 4, 'Ibank', 22, '22332233', 1, 'dssfdf', NULL, '2018-11-26 18:50:41'),
(4, 4, 4, NULL, 12, NULL, 0, '', NULL, '2018-11-26 18:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `inmate_id` int(11) NOT NULL,
  `feedback` text COLLATE latin1_spanish_ci NOT NULL,
  `reply` text COLLATE latin1_spanish_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `inmate_id`, `feedback`, `reply`, `date`) VALUES
(1, 1, 'dxxxvxcv', 'jjjj', '2018-11-27 04:29:36'),
(2, 6, 'hhhhhhh', NULL, '2018-11-27 04:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `hdf`
--

CREATE TABLE `hdf` (
  `hdf_id` int(5) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `hdf`
--

INSERT INTO `hdf` (`hdf_id`, `hostel_id`, `year`, `date`, `total`, `balance`) VALUES
(1, 2, 2018, '2018-11-27 00:11:08', 34545, 29990),
(2, 2, 2015, '2018-11-27 04:07:35', 4544, 4544);

-- --------------------------------------------------------

--
-- Table structure for table `hdf_bill`
--

CREATE TABLE `hdf_bill` (
  `bill_id` int(11) NOT NULL,
  `hdf_id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `items` text,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hdf_bill`
--

INSERT INTO `hdf_bill` (`bill_id`, `hdf_id`, `bill_no`, `items`, `file_path`, `file_name`, `amount`, `date`) VALUES
(1, 1, '23324234', 'esdfsfsfsfsdf', 'files/hdf', 'TueNov272018613w (2).pdf', 4545, '2018-11-27 00:43:18'),
(2, 1, '23324234', 'esdfsfsfsfsdf', 'files/hdf', 'TueNov272018614w (2).pdf', 4545, '2018-11-27 00:44:24'),
(3, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018617TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:47:46'),
(4, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018625TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:55:02'),
(5, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018625TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:55:18'),
(6, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018625TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:55:44'),
(7, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018625TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:55:53'),
(8, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018626TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:56:10'),
(9, 1, '23324234', 'eeeee', 'files/hdf', 'TueNov272018626TTMCAS1S3Dec2017.pdf', 444, '2018-11-27 00:56:40'),
(10, 1, 'reeee', 'ddfsdfsdf', 'files/hdf', 'TueNov272018627w (1).pdf', 1, '2018-11-27 00:57:22'),
(11, 1, 'reeee', 'ddfsdfsdf', 'files/hdf', 'TueNov272018634w (1).pdf', 1, '2018-11-27 01:04:05'),
(12, 1, 'reeee', 'ddfsdfsdf', 'files/hdf', 'TueNov272018634w (1).pdf', 1, '2018-11-27 01:04:19'),
(13, 1, '23324234', 'ddddd', 'files/hdf', 'TueNov272018634two-by-four.pdf', 544, '2018-11-27 01:04:43'),
(14, 1, '23324234', 'ddddd', 'files/hdf', 'TueNov272018941Computer A (1).pdf', 4555, '2018-11-27 04:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(5) NOT NULL,
  `name` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `capacity` int(5) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `name`, `capacity`, `phone`) VALUES
(1, 'PGH', 22, 9961430436),
(2, 'MH', 150, 9961430470);

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `mess_id` int(11) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `fiile_path` varchar(255) DEFAULT NULL,
  `file1_name` varchar(255) DEFAULT NULL,
  `file2_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess`
--

INSERT INTO `mess` (`mess_id`, `hostel_id`, `month`, `year`, `fiile_path`, `file1_name`, `file2_name`, `status`, `remark`, `date`) VALUES
(4, 2, 3, 2018, 'files/mess', 'TueNov272018020Wifi request form students.pdf', 'TueNov272018020two-by-four.pdf', -1, 'sogiong', '2018-11-26 18:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(10) NOT NULL,
  `is_authority` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE latin1_spanish_ci,
  `file_name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `is_authority`, `description`, `file_name`, `file_path`, `date`) VALUES
(1, 1, 'ddddd', 'TueNov272018947Application Form.pdf', 'files/notice', '2018-11-27 04:17:52'),
(2, 0, 'ddddd', 'TueNov272018952Application Form.pdf', 'files/notice', '2018-11-27 04:22:31'),
(3, 0, 'ddddd', 'TueNov272018952Application Form.pdf', 'files/notice', '2018-11-27 04:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(11) NOT NULL,
  `admn_no` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `category` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `address` text COLLATE latin1_spanish_ci,
  `allot_no` int(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` bigint(20) NOT NULL,
  `class` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `batch` int(5) NOT NULL,
  `email` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `gender` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL,
  `is_authority` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `admn_no`, `hostel_id`, `name`, `password`, `category`, `address`, `allot_no`, `status`, `date`, `phone`, `class`, `batch`, `email`, `gender`, `is_authority`) VALUES
(1, '22334', 0, 'name', 'qqqqqq', NULL, NULL, NULL, 1, '2018-11-21 02:25:38', 8899887788, 'MCA', 2015, 'email@email.com', NULL, 0),
(2, '123', 0, 'saam', 'www', NULL, NULL, NULL, 1, '2018-11-22 02:38:02', 666666, 'MCA', 2015, 'as@gmail.com', NULL, 0),
(4, '111111', 2, 'ssssss', '11111111', NULL, NULL, NULL, 1, '2018-11-26 10:05:52', 5555555555, 'B.arch', 2017, 'aw@gmail.com', 'male', 0),
(5, '121212', 1, 'Sari', '222222', NULL, NULL, NULL, 1, '2018-11-26 11:05:22', 9961430111, 'MCA', 2018, 'aw111@gmail.com', 'male', 1),
(6, '6667788', 2, 'Sumith', 'qqqqqq', 'OEC', 'how to do', 34, 1, '2018-11-26 11:06:05', 9961433434, 'B.tech', 2016, 'aa@bb.cc', 'male', 1),
(7, '8788', 1, 'Hans', 'ddddd', NULL, NULL, NULL, 1, '2018-11-26 11:06:55', 9961430567, 'MCA', 2017, 'aw111dddd@gmail.com', 'male', 0),
(8, '0898', 2, 'Rum', '11111', NULL, NULL, NULL, 1, '2018-11-26 11:07:33', 9961430430, 'B.arch', 2017, 'fff@gmail.com', 'male', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `reg_no` (`reg_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `hdf`
--
ALTER TABLE `hdf`
  ADD PRIMARY KEY (`hdf_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `hdf_bill`
--
ALTER TABLE `hdf_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `hdf_id` (`hdf_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `reg no` (`admn_no`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hdf`
--
ALTER TABLE `hdf`
  MODIFY `hdf_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hdf_bill`
--
ALTER TABLE `hdf_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostel_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mess`
--
ALTER TABLE `mess`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

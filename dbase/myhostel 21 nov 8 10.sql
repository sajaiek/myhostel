-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 02:42 AM
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
  `reg_no` int(5) NOT NULL,
  `month` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `attendence` int(2) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` text COLLATE latin1_spanish_ci NOT NULL,
  `date` date NOT NULL,
  `msg` text COLLATE latin1_spanish_ci NOT NULL,
  `feedback_from` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdf`
--

CREATE TABLE `hdf` (
  `item_id` int(5) NOT NULL,
  `item` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `price` int(5) NOT NULL,
  `date` date NOT NULL,
  `balance` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(5) NOT NULL,
  `name` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `date` date NOT NULL,
  `authority_name` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(10) NOT NULL,
  `subject` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `ex_date` date NOT NULL,
  `hostel_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(11) NOT NULL,
  `reg_no` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `type` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `category` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `address` text COLLATE latin1_spanish_ci,
  `allot_no` int(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` bigint(20) NOT NULL,
  `class` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `batch` int(5) NOT NULL,
  `email` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `hostel_name` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `gender` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `reg_no`, `name`, `password`, `type`, `category`, `address`, `allot_no`, `status`, `date`, `phone`, `class`, `batch`, `email`, `hostel_name`, `gender`) VALUES
(1, '22334', 'name', 'qqqqqq', 'INMATE', NULL, NULL, NULL, NULL, '2018-11-21 02:25:38', 8899887788, 'MCA', 2015, 'email@email.com', 'OLDLH', NULL);

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
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `feedback_from` (`feedback_from`);

--
-- Indexes for table `hdf`
--
ALTER TABLE `hdf`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `reg no` (`reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2018 at 06:58 AM
-- Server version: 5.7.23
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin@admin.com', 'admin', '2018-10-29 03:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(5) NOT NULL AUTO_INCREMENT,
  `reg_id` int(5) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `paytype` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `transno` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` text COLLATE latin1_spanish_ci NOT NULL,
  `paid_date` datetime DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`),
  KEY `reg_no` (`reg_id`),
  KEY `mess_id` (`mess_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `inmate_id` int(11) NOT NULL,
  `from_is_autho` int(11) DEFAULT '0',
  `to_is_autho` int(11) NOT NULL DEFAULT '0',
  `feedback` text COLLATE latin1_spanish_ci NOT NULL,
  `reply` text COLLATE latin1_spanish_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`),
  KEY `inmate_id` (`inmate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdf`
--

DROP TABLE IF EXISTS `hdf`;
CREATE TABLE IF NOT EXISTS `hdf` (
  `hdf_id` int(5) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double NOT NULL,
  `balance` int(10) NOT NULL,
  PRIMARY KEY (`hdf_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdf_bill`
--

DROP TABLE IF EXISTS `hdf_bill`;
CREATE TABLE IF NOT EXISTS `hdf_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `hdf_id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `items` text,
  `file_path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`),
  KEY `hdf_id` (`hdf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE IF NOT EXISTS `hostel` (
  `hostel_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `capacity` int(5) NOT NULL,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`hostel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

DROP TABLE IF EXISTS `mess`;
CREATE TABLE IF NOT EXISTS `mess` (
  `mess_id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) NOT NULL,
  `fiile_path` varchar(255) DEFAULT NULL,
  `file1_name` varchar(255) DEFAULT NULL,
  `file2_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mess_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(10) NOT NULL AUTO_INCREMENT,
  `is_authority` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE latin1_spanish_ci,
  `filename` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hostel_id` int(5) NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `admn_no` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `hostel_id` int(11) NOT NULL,
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
  `gender` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL,
  `is_authority` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reg_id`),
  UNIQUE KEY `reg no` (`admn_no`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `admn_no`, `hostel_id`, `name`, `password`, `type`, `category`, `address`, `allot_no`, `status`, `date`, `phone`, `class`, `batch`, `email`, `hostel_name`, `gender`, `is_authority`) VALUES
(1, '22334', 0, 'name', 'qqqqqq', 'INMATE', NULL, NULL, NULL, 1, '2018-11-21 02:25:38', 8899887788, 'MCA', 2015, 'email@email.com', 'OLDLH', NULL, 0),
(2, '123', 0, 'saam', 'www', 'INMATE', NULL, NULL, NULL, 1, '2018-11-22 02:38:02', 666666, 'MCA', 2015, 'as@gmail.com', 'PGH', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

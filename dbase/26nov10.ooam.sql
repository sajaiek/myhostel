-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2018 at 04:31 AM
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
  `bill_id` int(5) NOT NULL,
  `reg_no` int(5) NOT NULL,
  `month` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `year` int(10) NOT NULL,
  `paytype` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `transno` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `reg_no` (`reg_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` text COLLATE latin1_spanish_ci NOT NULL,
  `date` date NOT NULL,
  `msg` text COLLATE latin1_spanish_ci NOT NULL,
  `feedback_from` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  KEY `feedback_from` (`feedback_from`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hdf`
--

DROP TABLE IF EXISTS `hdf`;
CREATE TABLE IF NOT EXISTS `hdf` (
  `item_id` int(5) NOT NULL,
  `item` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `price` int(5) NOT NULL,
  `date` date NOT NULL,
  `balance` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE IF NOT EXISTS `hostel` (
  `hostel_id` int(5) NOT NULL,
  `name` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `date` date NOT NULL,
  `authority_name` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`hostel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(10) NOT NULL,
  `subject` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `ex_date` date NOT NULL,
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
  `gender` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`reg_id`),
  UNIQUE KEY `reg no` (`reg_no`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `reg_no`, `name`, `password`, `type`, `category`, `address`, `allot_no`, `status`, `date`, `phone`, `class`, `batch`, `email`, `hostel_name`, `gender`) VALUES
(1, '22334', 'name', 'qqqqqq', 'INMATE', NULL, NULL, NULL, 0, '2018-11-21 02:25:38', 8899887788, 'MCA', 2015, 'email@email.com', 'OLDLH', NULL),
(2, '123', 'saam', 'www', 'INMATE', NULL, NULL, NULL, 0, '2018-11-22 02:38:02', 666666, 'MCA', 2015, 'as@gmail.com', 'PGH', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2018 at 05:48 AM
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
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(5) NOT NULL,
  `reg_no` int(5) NOT NULL,
  `month` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `attendence` int(2) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
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
  `reg_no` int(10) NOT NULL,
  `name` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `category` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `address` text COLLATE latin1_spanish_ci NOT NULL,
  `allot_no` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dept` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `hostel_name` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `gender` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

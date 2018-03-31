-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2018 at 08:14 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostelh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(40) NOT NULL,
  `adminpass` varchar(40) NOT NULL,
  `collegename` varchar(256) NOT NULL,
  `factor` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminpass`, `collegename`, `factor`, `status`) VALUES
('admin', 'admin', '', 65, 0);

-- --------------------------------------------------------

--
-- Table structure for table `college_hostels`
--

DROP TABLE IF EXISTS `college_hostels`;
CREATE TABLE IF NOT EXISTS `college_hostels` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `hostelname` varchar(80) NOT NULL,
  `collegename` varchar(80) NOT NULL,
  `location` varchar(256) NOT NULL,
  `boysrooms` int(4) NOT NULL,
  `boysperroom` int(2) NOT NULL,
  `girlsrooms` int(4) NOT NULL,
  `girlsperroom` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`hostelname`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `determining_factors`
--

DROP TABLE IF EXISTS `determining_factors`;
CREATE TABLE IF NOT EXISTS `determining_factors` (
  `formid` int(11) NOT NULL,
  `acpcid` int(10) NOT NULL,
  `name` varchar(81) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `category` varchar(8) NOT NULL,
  `distance` float NOT NULL,
  `merit` int(8) NOT NULL,
  `allot` int(11) NOT NULL DEFAULT '0',
  `room` varchar(15) NOT NULL DEFAULT '-',
  `college` varchar(80) NOT NULL,
  PRIMARY KEY (`formid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_application`
--

DROP TABLE IF EXISTS `hostel_application`;
CREATE TABLE IF NOT EXISTS `hostel_application` (
  `formid` int(11) NOT NULL,
  `acpcid` int(10) NOT NULL,
  `name` varchar(81) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `aadhar` varchar(16) NOT NULL,
  `merit` varchar(8) NOT NULL,
  `photo` longtext NOT NULL,
  `gender` varchar(6) NOT NULL,
  `category` varchar(8) NOT NULL,
  `address` text NOT NULL,
  `distance` varchar(256) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `parentname` varchar(60) NOT NULL,
  `relation` varchar(60) NOT NULL,
  `occupation` varchar(60) NOT NULL,
  `income` varchar(15) NOT NULL,
  `hometelephone` varchar(12) NOT NULL,
  `parentmobile` varchar(15) NOT NULL,
  `localguname` varchar(60) NOT NULL,
  `localmobile` varchar(15) NOT NULL,
  `localaddress` text NOT NULL,
  PRIMARY KEY (`formid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered_student`
--

DROP TABLE IF EXISTS `registered_student`;
CREATE TABLE IF NOT EXISTS `registered_student` (
  `acpcid` int(10) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(16) NOT NULL,
  `course` varchar(80) NOT NULL,
  `college` varchar(80) NOT NULL,
  `hostel` varchar(80) NOT NULL,
  `formid` int(11) NOT NULL AUTO_INCREMENT,
  `step` int(2) NOT NULL,
  PRIMARY KEY (`acpcid`),
  UNIQUE KEY `UNIQUE` (`pin`),
  UNIQUE KEY `FORMID` (`formid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(1) NOT NULL DEFAULT '1',
  `general` float NOT NULL DEFAULT '50',
  `sebc` float NOT NULL DEFAULT '27',
  `scst` float NOT NULL DEFAULT '22.5',
  `others` float NOT NULL DEFAULT '0.5',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `general`, `sebc`, `scst`, `others`) VALUES
(1, 50, 27, 22.5, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

DROP TABLE IF EXISTS `super`;
CREATE TABLE IF NOT EXISTS `super` (
  `admin` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super`
--

INSERT INTO `super` (`admin`, `password`, `status`) VALUES
('super', 'super', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

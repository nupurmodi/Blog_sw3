-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 12:01 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogset`
--
CREATE DATABASE IF NOT EXISTS `blogset` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blogset`;

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE IF NOT EXISTS `blogdata` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `category` varchar(20) NOT NULL,
  `blogger_id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `creation_date` date NOT NULL,
  `updation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`),
  KEY `blogwriter` (`blogger_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE IF NOT EXISTS `bloggers` (
  `blogger_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `intro` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `blogger_creation_date` date NOT NULL,
  `b_updation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activate` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`blogger_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_details`
--

CREATE TABLE IF NOT EXISTS `blog_details` (
  `blog_id` int(11) NOT NULL,
  `blog_detail_image` varchar(200) NOT NULL,
  KEY `blogdatas` (`blog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE IF NOT EXISTS `queries` (
  `queryno` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`queryno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

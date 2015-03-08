-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2015 at 05:52 AM
-- Server version: 5.5.40
-- PHP Version: 5.3.10-1ubuntu3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BookAway`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE IF NOT EXISTS `tbl_books` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `book` text NOT NULL,
  `category` text NOT NULL,
  `author` text NOT NULL,
  `sell_rent` varchar(100) NOT NULL,
  `sell_price` varchar(100) NOT NULL,
  `rent_price` varchar(100) NOT NULL,
  `rent_time` varchar(100) NOT NULL,
  `college` varchar(300) NOT NULL,
  `date_added` datetime NOT NULL,
  `image_source` text NOT NULL,
  `book_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colleges`
--

CREATE TABLE IF NOT EXISTS `tbl_colleges` (
  `college_id` int(100) NOT NULL AUTO_INCREMENT,
  `college` varchar(500) NOT NULL,
  `alt_spellings` varchar(200) NOT NULL,
  `rel_booster` float NOT NULL,
  PRIMARY KEY (`college_id`),
  KEY `id` (`college_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE IF NOT EXISTS `tbl_seller` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `college` varchar(300) NOT NULL,
  `book_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

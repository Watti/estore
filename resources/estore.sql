-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2015 at 04:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goldfish`
--
create database goldfish;
use goldfish;
-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemcategory_id` int(11) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `bar_code` varchar(25) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `itemcategory_id`, `item_code`, `item_name`, `bar_code`, `unit`, `description`, `deleted`) VALUES
(3, 2, 'SP001', 'Soup A', '20215435', 'Pcs', 'This is Soup A', 0),
(4, 2, 'OL_098', 'Coconut Oil', '9438589', 'L', 'This is Coconut Oil', 0),
(5, 2, 'BV044', 'Smak', '34957934', 'L', 'This is SMAK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE IF NOT EXISTS `item_category` (
  `itemcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemcategory_code` varchar(255) NOT NULL,
  `itemcategory_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`itemcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`itemcategory_id`, `itemcategory_code`, `itemcategory_name`, `description`, `deleted`) VALUES
(2, 'CAT_001', 'CATEGORY_A', 'This is A Category', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_price`
--

CREATE TABLE IF NOT EXISTS `item_price` (
  `itemprice_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemprice_code` varchar(20) NOT NULL,
  `unit_price` float(10,2) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`itemprice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `item_price`
--

INSERT INTO `item_price` (`itemprice_id`, `itemprice_code`, `unit_price`, `discount_type`, `deleted`) VALUES
(1, 'IP_001', 270.00, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `itemprice_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `min_qty` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `display_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `usertype_id`, `created_date`, `display_name`, `active`) VALUES
(1, 'shan', '202cb962ac59075b964b07152d234b70', 2, '2015-11-14 04:44:36', 'Shan', 1),
(2, 'indunil', '202cb962ac59075b964b07152d234b70', 2, '2015-11-14 04:44:36', 'Indunil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `usertype_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype_name`, `permission`) VALUES
(1, 'DEV', ''),
(2, 'MANAGER', ''),
(3, 'STORE KEEPER', ''),
(4, 'CASHIER', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `total` float NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
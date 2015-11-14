-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 06:33 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `bar_code` varchar(25) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `minimum_quantity` float NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `item_code` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `type`, `bar_code`, `unit`, `quantity`, `unit_price`, `minimum_quantity`, `remarks`, `item_code`) VALUES
(1, 'Soap', '123', 'pcs', 500, 40, 10, '', 1),
(2, 'Rice', '222', 'Kg', 25, 80, 5, '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

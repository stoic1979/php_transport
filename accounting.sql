-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2015 at 08:13 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `comp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `uid`, `title`, `phone`, `address`) VALUES
(1, 20, 'weavebytes', '848484848', 'Mohali'),
(2, 50, 'bigbytes', '858965262', 'Patiala'),
(3, 450, 'interglobe', '+41526953635', '421-A CA Georgia'),
(4, 20, 'New Company', '3333', 'abc'),
(5, 20, 'New Company', '3333', 'abc'),
(6, 20, 'New Company', '3333', 'abc'),
(7, 20, 'New Company', '3333', 'abc'),
(8, 20, 'New Company', '3333', 'abc'),
(9, 3, 'ABC Comp', '987654', '123 Office'),
(10, 3, 'DDDDD', '11111', 'AAAA');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `firm_name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `uid`, `name`, `firm_name`, `address`, `phone`, `email`) VALUES
(1, 3, 'new customer', 'aaa', '123 abc', '33344', 'xyz@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `did` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `photo` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `social_security_no` text NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `uid`, `name`, `photo`, `address`, `email`, `phone`, `social_security_no`) VALUES
(1, 3, 'New Driver', 'aa', '12 xyz', 'xyz@gmail.com', '77788', '11');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE IF NOT EXISTS `trailer` (
  `trailer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `make` text NOT NULL,
  `yr_model` text NOT NULL,
  `yr_first_sold` text NOT NULL,
  `vlf_class` text NOT NULL,
  `type_veh` text NOT NULL,
  `type_lic` text NOT NULL,
  `license_num` text NOT NULL,
  `body_type_model` text NOT NULL,
  `mp` text NOT NULL,
  `mo` text NOT NULL,
  `ax` text NOT NULL,
  `wc` text NOT NULL,
  `unladen_g_cgw` text NOT NULL,
  `vehicle_id_num` text NOT NULL,
  `type_vehicle_use` text NOT NULL,
  `date_issued` date NOT NULL,
  `cc_alco` text NOT NULL,
  `dt_fee_recvd` date NOT NULL,
  `pic` text NOT NULL,
  `registered_owner` text NOT NULL,
  `amount_due` float NOT NULL,
  `amount_recvd` float NOT NULL,
  `amount_paid` float NOT NULL,
  PRIMARY KEY (`trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `type` text NOT NULL,
  `info` text NOT NULL,
  `amount` float NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `description` text NOT NULL,
  `is_paid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE IF NOT EXISTS `truck` (
  `truck_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `make` text NOT NULL,
  `yr_model` text NOT NULL,
  `yr_first_sold` text NOT NULL,
  `vlf_class` text NOT NULL,
  `type_veh` text NOT NULL,
  `type_lic` text NOT NULL,
  `license_num` text NOT NULL,
  `body_type_model` text NOT NULL,
  `mp` text NOT NULL,
  `mo` text NOT NULL,
  `ax` text NOT NULL,
  `wc` text NOT NULL,
  `unladen_g_cgw` text NOT NULL,
  `vehicle_id_num` text NOT NULL,
  `type_vehicle_use` text NOT NULL,
  `date_issued` date NOT NULL,
  `cc_alco` text NOT NULL,
  `dt_fee_recvd` date NOT NULL,
  `pic` text NOT NULL,
  `registered_owner` text NOT NULL,
  `amount_due` float NOT NULL,
  `amount_recvd` float NOT NULL,
  `amount_paid` float NOT NULL,
  PRIMARY KEY (`truck_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `upload_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `date` date NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'sma', 'suraj@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'seema', 'seema@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'khushbu', 'khushbu@gmail.com', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

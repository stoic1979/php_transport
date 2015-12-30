-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2015 at 08:23 PM
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
  `country` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pin_code` text NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `uid`, `title`, `phone`, `address`, `country`, `city`, `state`, `pin_code`) VALUES
(1, 20, 'weavebytes', '848484848', 'Mohali', '', '', '', ''),
(2, 50, 'bigbytes', '858965262', 'Patiala', '', '', '', ''),
(3, 450, 'interglobe', '+41526953635', '421-A CA Georgia', '', '', '', ''),
(4, 20, 'New Company', '3333', 'abc', '', '', '', ''),
(5, 20, 'New Company', '3333', 'abc', '', '', '', ''),
(6, 20, 'New Company', '3333', 'abc', '', '', '', ''),
(7, 20, 'New Company', '3333', 'abc', '', '', '', ''),
(8, 20, 'New Company', '3333', 'abc', '', '', '', ''),
(9, 3, 'ABC Comp', '987654', '123 Office', '', '', '', ''),
(10, 3, 'DDDDD', '11111', 'AAAA', '', '', '', ''),
(11, 9, 'IT Company ', '77440 ', ' 121 Street ', 'USA', '', '', ''),
(12, 9, 'IT Company', '77440', 'Shanghai,China', 'China', '', '', ''),
(13, 9, 'New Company', '88990', '19 new city', 'Sri Lanka', '', '', ''),
(14, 9, 'New Company', '88990', '19 new city', 'Sri Lanka', '', '', ''),
(16, 9, 'Android Game', '22113', '11 sss', 'India', '', '', ''),
(18, 9, 'ggg', '777', '666', 'Denmark', 'uuu', 'kkk', '555');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `uid`, `name`, `firm_name`, `address`, `phone`, `email`) VALUES
(1, 3, 'new customer', 'aaa', '123 abc', '33344', 'xyz@gmail'),
(2, 9, 'mmm', 'nnn', '222 street', '444', 'gg@gg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`trailer_id`, `uid`, `make`, `yr_model`, `yr_first_sold`, `vlf_class`, `type_veh`, `type_lic`, `license_num`, `body_type_model`, `mp`, `mo`, `ax`, `wc`, `unladen_g_cgw`, `vehicle_id_num`, `type_vehicle_use`, `date_issued`, `cc_alco`, `dt_fee_recvd`, `pic`, `registered_owner`, `amount_due`, `amount_recvd`, `amount_paid`) VALUES
(1, 9, '11', '44', '77', '33', 'rr', 'rrr', '33', 'ffff', '77', '88', '66', '779', 'iii', 'kk', '77', '0000-00-00', '55', '0000-00-00', '', 'tt', 55, 66, 77);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `uid`, `title`, `date`, `type`, `info`, `amount`, `sender`, `receiver`, `description`, `is_paid`) VALUES
(1, 9, 'aa', '0000-00-00', 'ee', 'sss', 22221, 'ss', 'aa', 'www', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`truck_id`, `uid`, `make`, `yr_model`, `yr_first_sold`, `vlf_class`, `type_veh`, `type_lic`, `license_num`, `body_type_model`, `mp`, `mo`, `ax`, `wc`, `unladen_g_cgw`, `vehicle_id_num`, `type_vehicle_use`, `date_issued`, `cc_alco`, `dt_fee_recvd`, `pic`, `registered_owner`, `amount_due`, `amount_recvd`, `amount_paid`) VALUES
(1, 9, '1', '2012', '2014', 'xxx', 'suv', 'permanent', '1111', 'metalic', '11', '12', '13', '14', 'sss', '15', 'daily', '0000-00-00', 'ddddd', '0000-00-00', '', 'mary', 20000, 100000, 120000),
(2, 9, '11', '22', '333', 'ffff', 'ree', 'ff', '2222', 'ffff', 'tt', 'tt', 'gg', 'hh', 'hhh', '77', 'uuu', '0000-00-00', 'yy', '0000-00-00', '', 'yyy', 5, 6, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`upload_id`, `uid`, `title`, `type`, `date`, `img`) VALUES
(1, 9, 'Rec1', 'Purchase', '0000-00-00', ''),
(2, 9, 'Rec2', 'Rent', '0000-00-00', ''),
(3, 9, 'rec3', 'Other', '0000-00-00', ''),
(9, 9, 'ABC Comp', 'Purchase', '0000-00-00', ''),
(10, 9, 'rec4', 'Rent', '0000-00-00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'sma', 'suraj@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'seema', 'seema@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'khushbu', 'khushbu@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'sonia1', 'sonia1@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'sonia', 'sonia@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'newUser', 'new@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 'john', 'john@gmail.com', '202cb962ac59075b964b07152d234b70');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

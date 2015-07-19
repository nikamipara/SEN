-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2013 at 09:18 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sen`
--

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE IF NOT EXISTS `lost_found` (
  `lost_found_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `id` char(30) DEFAULT NULL,
  `Title` varchar(10) NOT NULL,
  `object_details` varchar(100) DEFAULT NULL,
  `place` varchar(10) NOT NULL,
  PRIMARY KEY (`lost_found_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD CONSTRAINT `lost_found_ibfk_2` FOREIGN KEY (`id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

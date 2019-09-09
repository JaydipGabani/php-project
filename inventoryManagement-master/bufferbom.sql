-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 04:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bufferbom`
--

CREATE TABLE IF NOT EXISTS `bufferbom` (
  `Projectid` varchar(255) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `AstroDieNo` varchar(255) NOT NULL,
  `KeymarkDieNo` varchar(255) NOT NULL,
  `Finish` varchar(255) NOT NULL,
  `WeightxFeet` varchar(255) NOT NULL,
  `OrderLength` varchar(255) NOT NULL,
  `TotalLbs` varchar(255) NOT NULL,
  `NorexID` varchar(255) NOT NULL,
`No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bufferbom`
--
ALTER TABLE `bufferbom`
 ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bufferbom`
--
ALTER TABLE `bufferbom`
MODIFY `No` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

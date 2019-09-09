-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 04:56 PM
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
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`No` int(10) NOT NULL,
  `Projectid` int(7) NOT NULL,
  `Qty` int(6) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `AstroDieNo` int(5) NOT NULL,
  `KeymarkDieNo` varchar(10) NOT NULL,
  `Finish` varchar(255) NOT NULL,
  `WeightxFeet` float NOT NULL,
  `OrderLength` float NOT NULL,
  `TotalLbs` float NOT NULL,
  `NorexID` int(5) NOT NULL,
  `PO` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`No`, `Projectid`, `Qty`, `Description`, `AstroDieNo`, `KeymarkDieNo`, `Finish`, `WeightxFeet`, `OrderLength`, `TotalLbs`, `NorexID`, `PO`) VALUES
(1, 2313, 264, '', 10072, 'H-09513', 'Duracron Rootbeer Candy', 0, 168, 0, 11221, 1111),
(2, 2313, 264, '', 10072, 'H-09513', 'Duracron Rootbeer Candy', 0, 168, 0, 11221, 0),
(3, 2313, -264, '', 10072, 'H-09513', 'Duracron Rootbeer Candy', 0, 168, 0, 11221, 0),
(4, 2313, 260, '', 10072, 'H-09513', 'Duracron Rootbeer Candy', 0, 168, 0, 11221, 0),
(5, 2313, 4, '', 10072, 'H-09513', 'Duracron Rootbeer Candy', 0, 168, 0, 11221, 1111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `No` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

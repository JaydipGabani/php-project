-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 04:33 PM
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
-- Table structure for table `inventorystorage`
--

CREATE TABLE IF NOT EXISTS `inventorystorage` (
  `NorexID` varchar(255) NOT NULL,
  `Finish` varchar(255) NOT NULL,
  `Location` varchar(1) NOT NULL,
  `LocOnSite` varchar(4) NOT NULL,
  `Qty` int(5) NOT NULL,
  `OrderLength` varchar(255) NOT NULL,
  `Projectid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorystorage`
--

INSERT INTO `inventorystorage` (`NorexID`, `Finish`, `Location`, `LocOnSite`, `Qty`, `OrderLength`, `Projectid`) VALUES
('11001', 'Duracron Rootbeer Candy', '2', 'aa', 12, '168', 0),
('11124', 'red', '1', 'aa', 6, '', 1111),
('11125', 'blue', '1', 'aa', 123, '', 1111),
('11221', 'Duracron Rootbeer Candy', '2', 'aa', 12, '140', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventorystorage`
--
ALTER TABLE `inventorystorage`
 ADD PRIMARY KEY (`NorexID`,`Finish`,`Projectid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

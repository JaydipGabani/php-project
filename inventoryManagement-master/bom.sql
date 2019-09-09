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
-- Table structure for table `bom`
--

CREATE TABLE IF NOT EXISTS `bom` (
`No` int(10) NOT NULL,
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
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `RQty` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`No`, `Projectid`, `Qty`, `Description`, `AstroDieNo`, `KeymarkDieNo`, `Finish`, `WeightxFeet`, `OrderLength`, `TotalLbs`, `NorexID`, `Date`, `Time`, `RQty`) VALUES
(1, '2313', '264', '5000 - TOP RAIL', '10072', 'H-09513', 'Duracron Rootbeer Candy', '0.724', '168', '2675.904', '11221', '2017-01-11', '838:59:59', 264),
(2, '2313', '264', '5000 LOCK - INT TILT', '10123', 'H-09512', 'Duracron Rootbeer Candy', '0.895', '168', '3307.92', '11221', '2017-01-11', '838:59:59', 264),
(3, '2313', '2240', 'MUNTIN FRAME', '11646', '0', 'Duracron Rootbeer Candy', '0.158', '174', '5131.84', '11221', '2017-01-11', '838:59:59', 2240),
(4, '2313', '192', '"6"" MULL BASE"', '14028', '0', 'Mill Finish', '0.579', '156', '1445.184', '11221', '2017-01-11', '838:59:59', 192),
(5, '2313', '1673', '"1/16"" x 3/4"" Bar"', '14266', '0', 'Duracron Rootbeer Candy', '0.109', '150', '2279.4625', '11221', '2017-01-11', '838:59:59', 1673),
(6, '2313', '264', 'COOP-CITY KPR RAIL  ', '15629', 'H-09531', 'Duracron Rootbeer Candy', '1.117', '168', '4128.432', '11221', '2017-01-11', '838:59:59', 264),
(7, '2313', '632', 'COOP-CITY TOP STILE ', '15630', 'S-41386', 'Duracron Rootbeer Candy', '0.450', '144', '3412.8', '11221', '2017-01-11', '838:59:59', 632),
(8, '2313', '632', 'COOP-CITY BTM STILE ', '15631', 'S-41384', 'Duracron Rootbeer Candy', '0.563', '144', '4269.792', '11221', '2017-01-11', '838:59:59', 632),
(9, '2313', '1673', 'MUNTIN', '18510', '0', 'Duracron Rootbeer Candy', '0.179', '150', '3743.3375', '11221', '2017-01-11', '838:59:59', 1673),
(10, '2313', '192', '"6"" MULL CAP WITH RAISED ENDS"', '18561', '0', 'Duracron Rootbeer Candy', '0.675', '156', '1684.8', '11221', '2017-01-11', '838:59:59', 192),
(11, '2313', '264', '5000 SILL - EQUAL LEG', '20790', 'S-50271', 'Duracron Rootbeer Candy', '0.977', '168', '3610.992', '11221', '2017-01-11', '838:59:59', 264),
(12, '2313', '1524', '"2"" X 1 1/2"" TRIM CAP"', '2161', '0', 'Duracron Rootbeer Candy', '0.268', '156', '5309.616', '11221', '2017-01-11', '838:59:59', 1524),
(13, '2313', '406', '"2"" X 1 1/2"" CLIP"', '2162', '0', 'Mill Finish', '0.273', '180', '1662.57', '11221', '2017-01-11', '838:59:59', 406),
(14, '2313', '223', 'SCREEN              ', '3013', 'H-07805', 'Duracron Rootbeer Candy', '0.129', '192', '460.272', '11221', '2017-01-11', '838:59:59', 223),
(15, '2313', '121', 'SCREEN W/.250 STOP  ', '3014', 'H-11088', 'Duracron Rootbeer Candy', '0.145', '192', '280.72', '11221', '2017-01-11', '838:59:59', 121),
(16, '2313', '102', 'SCREEN HANDLE       ', '3548', 'H-02924', 'Duracron Rootbeer Candy', '0.180', '192', '293.76', '11221', '2017-01-11', '838:59:59', 102),
(17, '2313', '359', '"1"" x 2"" TRIM"', '7559', 'S-44718', 'Duracron Rootbeer Candy', '0.187', '192', '1074.128', '11221', '2017-01-11', '838:59:59', 359),
(18, '2313', '117', '"1"" x 2"" CLIP"', '7560', 'S-44717', 'Mill Finish', '0.190', '180', '333.45', '11221', '2017-01-11', '838:59:59', 117),
(19, '2313', '264', '5000 - HEAD         ', '8741', 'S-50270', 'Duracron Rootbeer Candy', '0.737', '168', '2723.952', '11221', '2017-01-11', '838:59:59', 264),
(20, '2313', '1254', '5000 - JAMB         ', '8742', 'S-41387', 'Duracron Rootbeer Candy', '0.876', '144', '13182.048', '11221', '2017-01-11', '838:59:59', 1254),
(21, '2313', '264', '5000 - BOTTOM RAIL  ', '8750', 'H-09511', 'Duracron Rootbeer Candy', '0.713', '168', '2635.248', '11221', '2017-01-11', '838:59:59', 264),
(22, '2313', '528', '5000 - SNAP LATCH   ', '8752', 'S-42639', 'Duracron Rootbeer Candy', '0.274', '168', '2025.408', '11221', '2017-01-11', '838:59:59', 528),
(23, '2313', '326', '3X2.75 COL. PAN SILL', '9240', '0', 'Duracron Rootbeer Candy', '0.538', '174', '2543.126', '11221', '2017-01-11', '838:59:59', 326),
(24, '2313', '1556', '"3 1/8"" x 2 1/2"" COLONIAL PANNING"', 'TBD', '0', 'Duracron Rootbeer Candy', '0.724', '174', '16334.888', '11221', '2017-01-11', '838:59:59', 1556);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
 ADD PRIMARY KEY (`No`,`Projectid`,`AstroDieNo`,`KeymarkDieNo`,`Finish`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
MODIFY `No` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

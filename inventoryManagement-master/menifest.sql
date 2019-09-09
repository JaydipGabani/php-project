-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 09:25 PM
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
-- Table structure for table `menifest`
--

CREATE TABLE IF NOT EXISTS `menifest` (
  `ShipD` varchar(20) NOT NULL,
  `NBP` int(10) NOT NULL,
  `PO` int(10) NOT NULL,
  `BL` int(10) NOT NULL,
  `Manifest` int(10) NOT NULL,
  `Ticket` int(10) NOT NULL,
  `SO` int(10) NOT NULL,
  `Item` int(10) NOT NULL,
  `AstroDieNo` int(10) DEFAULT NULL,
  `KeymarkDieNo` varchar(100) NOT NULL DEFAULT 'empty',
  `Part_Description` varchar(130) NOT NULL,
  `Finish` varchar(30) NOT NULL,
  `Length` int(10) NOT NULL,
  `Pcs` int(10) NOT NULL,
  `Ft` float NOT NULL,
  `NetWt` int(10) NOT NULL,
`Barcode` int(13) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `NorexID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `LocOnSite` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menifest`
--

INSERT INTO `menifest` (`ShipD`, `NBP`, `PO`, `BL`, `Manifest`, `Ticket`, `SO`, `Item`, `AstroDieNo`, `KeymarkDieNo`, `Part_Description`, `Finish`, `Length`, `Pcs`, `Ft`, `NetWt`, `Barcode`, `Model`, `NorexID`, `Location`, `LocOnSite`) VALUES
('1/5/17', 2693, 6297, 190481, 335876, 1132073, 370239, 1, 8085, 'empty', '2000 PD-FLG HD  2"', 'AUTUMN MIST', 204, 34, 1.09, 633, 133, '2000', 1056, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132184, 370239, 2, 10553, 'empty', '2001 - SILL', 'AUTUMN MIST', 204, 52, 1.07, 949, 134, '2001', 1065, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132095, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 8, 1.49, 203, 135, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132995, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 8, 1.49, 203, 136, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132994, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 30, 1.49, 760, 137, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132066, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 30, 1.49, 760, 138, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132093, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 139, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132117, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 140, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132099, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 141, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132112, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 142, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132179, 370239, 5, 6765, 'empty', '2000 PD - GLASS TOP RAIL', 'AUTUMN MIST', 204, 90, 0.47, 733, 143, '2000', 1049, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131912, 370239, 7, 6766, 'empty', '2000 PD - BOTT. RAIL FIXED RAIL', 'AUTUMN MIST', 204, 54, 0.7, 643, 144, '2000', 1050, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132495, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 70, 1.11, 1212, 145, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132488, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 70, 1.11, 1212, 146, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132497, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 44, 1.11, 762, 147, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132491, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 70, 1.11, 1212, 148, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132936, 370239, 11, 10552, 'empty', '2001 - STIFFENER', 'AUTUMN MIST', 186, 70, 1.01, 1097, 149, '2001', 1064, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132942, 370239, 11, 10552, 'empty', '2001 - STIFFENER', 'AUTUMN MIST', 186, 78, 1.01, 1222, 150, '2001', 1064, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131854, 370239, 13, 18678, 'empty', '1250 Open (SGD Door Screen)', 'AUTUMN MIST', 192, 145, 0.3, 708, 151, '1250', 1597, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131837, 370239, 14, 7559, 'empty', 'SNAP TRIM - CAP (2.000 X 1.000)', 'AUTUMN MIST', 186, 431, 0.18, 1249, 152, 'TRIM', 1509, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131832, 370239, 14, 7559, 'empty', 'SNAP TRIM - CAP (2.000 X 1.000)', 'AUTUMN MIST', 186, 400, 0.18, 1159, 153, 'TRIM', 1509, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131829, 370239, 15, 7560, 'empty', 'SNAP TRIM - 2.000 X 1.000 CLIP', 'AUTUMN MIST', 186, 128, 0.18, 377, 154, 'CLIPS', 1344, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132932, 370239, 16, 4210, 'empty', 'SNAP TRIM - CAP (1 X 1-1/2)', 'AUTUMN MIST', 198, 468, 0.16, 1290, 155, 'TRIM', 1504, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131849, 370239, 17, 7538, 'empty', 'SNAP TRIM CAP - 1.000 X 3.000', 'AUTUMN MIST', 198, 187, 0.24, 762, 156, 'TRIM', 1508, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132603, 370239, 19, 22598, 'empty', '3-1/4 EXT-INT MULLION', 'AUTUMN MIST', 198, 96, 0.46, 738, 157, 'MULLION', 2094, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131408, 370239, 20, 7560, 'empty', 'SNAP TRIM - 2.000 X 1.000 CLIP', 'MILL FINISH', 180, 183, 0.18, 522, 158, 'CLIPS', 1344, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131490, 370239, 20, 7560, 'empty', 'SNAP TRIM - 2.000 X 1.000 CLIP', 'MILL FINISH', 180, 185, 0.18, 527, 159, 'CLIPS', 1344, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1133145, 370239, 21, 4211, 'empty', '1" X 1.5" CLIP', 'MILL FINISH', 180, 34, 0.15, 80, 160, 'CLIP', 1737, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131410, 370239, 21, 4211, 'empty', '1" X 1.5" CLIP', 'MILL FINISH', 180, 404, 0.15, 945, 161, 'CLIP', 1737, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131409, 370239, 22, 7539, 'empty', 'SNAP TRIM BASE - 1.000 X 3.000', 'MILL FINISH', 180, 142, 0.24, 533, 162, 'CLIPS', 1343, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131414, 370239, 22, 7539, 'empty', 'SNAP TRIM BASE - 1.000 X 3.000', 'MILL FINISH', 180, 127, 0.24, 476, 163, 'CLIPS', 1343, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132665, 370239, 22, 7539, 'empty', 'SNAP TRIM BASE - 1.000 X 3.000', 'MILL FINISH', 180, 13, 0.24, 49, 164, 'CLIPS', 1343, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132683, 370502, 1, 7733, 'empty', '4000 - HEAD FLANGE 2 1/2"', 'FINE SILVER', 198, 16, 1.03, 273, 165, '4000', 1176, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132653, 370502, 2, 20224, 'empty', '4002 SLIDER SILL', 'FINE SILVER', 198, 15, 1.54, 381, 166, '4002', 1728, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132425, 370502, 4, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'FINE SILVER', 180, 84, 0.78, 992, 167, '4000', 1206, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132442, 370502, 4, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'FINE SILVER', 180, 84, 0.78, 992, 168, '4000', 1206, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132441, 370502, 4, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'FINE SILVER', 180, 84, 0.78, 992, 169, '4000', 1206, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132395, 370502, 5, 7830, 'empty', 'STILE', 'FINE SILVER', 198, 127, 0.41, 876, 170, '4000', 1184, '1', 'NA'),
('1/5/17', 2693, 6296, 190481, 335878, 1133019, 370238, 10, 7829, 'empty', '4000 KEEPER RAIL ', 'AUTUMN MIST', 192, 72, 0.55, 644, 171, '4000', 1183, '1', 'NA'),
('1/5/17', 2693, 6296, 190481, 335878, 1133014, 370238, 10, 7829, 'empty', '4000 KEEPER RAIL ', 'AUTUMN MIST', 192, 75, 0.55, 671, 172, '4000', 1183, '1', 'NA'),
('1/5/17', 2693, 6296, 190481, 335878, 1133020, 370238, 11, 8207, 'empty', '4000 VERT RAIL BYPASS', 'AUTUMN MIST', 192, 15, 0.35, 86, 173, '4000', 1189, '1', 'NA'),
('1/5/17', 2542, 6070, 190481, 335879, 1133257, 371368, 1, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'NBP BRONZE', 192, 13, 0.78, 164, 174, '4000', 1206, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132073, 370239, 1, 8085, 'empty', '2000 PD-FLG HD  2"', 'AUTUMN MIST', 204, 34, 1.09, 633, 175, '2000', 1056, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132184, 370239, 2, 10553, 'empty', '2001 - SILL', 'AUTUMN MIST', 204, 52, 1.07, 949, 176, '2001', 1065, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132095, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 8, 1.49, 203, 177, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132995, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 8, 1.49, 203, 178, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132994, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 30, 1.49, 760, 179, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132066, 370239, 3, 10554, 'empty', '2001 - SUB SILL', 'AUTUMN MIST', 204, 30, 1.49, 760, 180, '2001', 1066, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132093, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 181, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132117, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 182, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132099, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 183, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132112, 370239, 4, 8086, 'empty', '2000 PD-FLG JMB 2"', 'AUTUMN MIST', 186, 54, 1.02, 856, 184, '2000', 1057, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132179, 370239, 5, 6765, 'empty', '2000 PD - GLASS TOP RAIL', 'AUTUMN MIST', 204, 90, 0.47, 733, 185, '2000', 1049, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131912, 370239, 7, 6766, 'empty', '2000 PD - BOTT. RAIL FIXED RAIL', 'AUTUMN MIST', 204, 54, 0.7, 643, 186, '2000', 1050, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132495, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 70, 1.11, 1212, 187, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132488, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 70, 1.11, 1212, 188, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132497, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 44, 1.11, 762, 189, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132491, 370239, 9, 10551, 'empty', '2001 - INTERLOCK', 'AUTUMN MIST', 186, 70, 1.11, 1212, 190, '2001', 1063, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132936, 370239, 11, 10552, 'empty', '2001 - STIFFENER', 'AUTUMN MIST', 186, 70, 1.01, 1097, 191, '2001', 1064, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132942, 370239, 11, 10552, 'empty', '2001 - STIFFENER', 'AUTUMN MIST', 186, 78, 1.01, 1222, 192, '2001', 1064, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131854, 370239, 13, 18678, 'empty', '1250 Open (SGD Door Screen)', 'AUTUMN MIST', 192, 145, 0.3, 708, 193, '1250', 1597, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131837, 370239, 14, 7559, 'empty', 'SNAP TRIM - CAP (2.000 X 1.000)', 'AUTUMN MIST', 186, 431, 0.18, 1249, 194, 'TRIM', 1509, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131832, 370239, 14, 7559, 'empty', 'SNAP TRIM - CAP (2.000 X 1.000)', 'AUTUMN MIST', 186, 400, 0.18, 1159, 195, 'TRIM', 1509, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131829, 370239, 15, 7560, 'empty', 'SNAP TRIM - 2.000 X 1.000 CLIP', 'AUTUMN MIST', 186, 128, 0.18, 377, 196, 'CLIPS', 1344, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132932, 370239, 16, 4210, 'empty', 'SNAP TRIM - CAP (1 X 1-1/2)', 'AUTUMN MIST', 198, 468, 0.16, 1290, 197, 'TRIM', 1504, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131849, 370239, 17, 7538, 'empty', 'SNAP TRIM CAP - 1.000 X 3.000', 'AUTUMN MIST', 198, 187, 0.24, 762, 198, 'TRIM', 1508, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132603, 370239, 19, 22598, 'empty', '3-1/4 EXT-INT MULLION', 'AUTUMN MIST', 198, 96, 0.46, 738, 199, 'MULLION', 2094, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131408, 370239, 20, 7560, 'empty', 'SNAP TRIM - 2.000 X 1.000 CLIP', 'MILL FINISH', 180, 183, 0.18, 522, 200, 'CLIPS', 1344, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131490, 370239, 20, 7560, 'empty', 'SNAP TRIM - 2.000 X 1.000 CLIP', 'MILL FINISH', 180, 185, 0.18, 527, 201, 'CLIPS', 1344, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1133145, 370239, 21, 4211, 'empty', '1" X 1.5" CLIP', 'MILL FINISH', 180, 34, 0.15, 80, 202, 'CLIP', 1737, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131410, 370239, 21, 4211, 'empty', '1" X 1.5" CLIP', 'MILL FINISH', 180, 404, 0.15, 945, 203, 'CLIP', 1737, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131409, 370239, 22, 7539, 'empty', 'SNAP TRIM BASE - 1.000 X 3.000', 'MILL FINISH', 180, 142, 0.24, 533, 204, 'CLIPS', 1343, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1131414, 370239, 22, 7539, 'empty', 'SNAP TRIM BASE - 1.000 X 3.000', 'MILL FINISH', 180, 127, 0.24, 476, 205, 'CLIPS', 1343, '1', 'NA'),
('1/5/17', 2693, 6297, 190481, 335876, 1132665, 370239, 22, 7539, 'empty', 'SNAP TRIM BASE - 1.000 X 3.000', 'MILL FINISH', 180, 13, 0.24, 49, 206, 'CLIPS', 1343, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132683, 370502, 1, 7733, 'empty', '4000 - HEAD FLANGE 2 1/2"', 'FINE SILVER', 198, 16, 1.03, 273, 207, '4000', 1176, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132653, 370502, 2, 20224, 'empty', '4002 SLIDER SILL', 'FINE SILVER', 198, 15, 1.54, 381, 208, '4002', 1728, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132425, 370502, 4, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'FINE SILVER', 180, 84, 0.78, 992, 209, '4000', 1206, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132442, 370502, 4, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'FINE SILVER', 180, 84, 0.78, 992, 210, '4000', 1206, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132441, 370502, 4, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'FINE SILVER', 180, 84, 0.78, 992, 211, '4000', 1206, '1', 'NA'),
('1/5/17', 2623, 6326, 190481, 335877, 1132395, 370502, 5, 7830, 'empty', 'STILE', 'FINE SILVER', 198, 127, 0.41, 876, 212, '4000', 1184, '1', 'NA'),
('1/5/17', 2693, 6296, 190481, 335878, 1133019, 370238, 10, 7829, 'empty', '4000 KEEPER RAIL ', 'AUTUMN MIST', 192, 72, 0.55, 644, 213, '4000', 1183, '1', 'NA'),
('1/5/17', 2693, 6296, 190481, 335878, 1133014, 370238, 10, 7829, 'empty', '4000 KEEPER RAIL ', 'AUTUMN MIST', 192, 75, 0.55, 671, 214, '4000', 1183, '1', 'NA'),
('1/5/17', 2693, 6296, 190481, 335878, 1133020, 370238, 11, 8207, 'empty', '4000 VERT RAIL BYPASS', 'AUTUMN MIST', 192, 15, 0.35, 86, 215, '4000', 1189, '1', 'NA'),
('1/5/17', 2542, 6070, 190481, 335879, 1133257, 371368, 1, 15864, 'empty', '4000 JAMB - 2" FLANGE', 'NBP BRONZE', 192, 13, 0.78, 164, 216, '4000', 1206, '1', 'NA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menifest`
--
ALTER TABLE `menifest`
 ADD PRIMARY KEY (`Barcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menifest`
--
ALTER TABLE `menifest`
MODIFY `Barcode` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=217;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

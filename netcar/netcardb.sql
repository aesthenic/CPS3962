-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2020 at 06:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netcardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointmentID` bigint(20) NOT NULL AUTO_INCREMENT,
  `customerID` bigint(20) NOT NULL,
  `dealerID` bigint(20) NOT NULL,
  `vehicleID` bigint(20) NOT NULL,
  `descriptionAppointment` varchar(500) NOT NULL,
  `dateTimeAppointment` timestamp NOT NULL,
  `statusAppointment` tinyint(4) NOT NULL,
  `detailStatusAppointment` varchar(500) NOT NULL,
  PRIMARY KEY (`appointmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `customerID`, `dealerID`, `vehicleID`, `descriptionAppointment`, `dateTimeAppointment`, `statusAppointment`, `detailStatusAppointment`) VALUES
(1, 1, 1, 2, 'Car Inspection for buying purpose', '2020-05-31 14:00:00', 1, 'Confirmed by the dealer'),
(2, 2, 2, 1, 'Car Inspection for buying purpose', '2020-06-30 15:00:00', 1, 'Confirmed by the dealer');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` bigint(20) NOT NULL AUTO_INCREMENT,
  `nameCust` varchar(250) NOT NULL,
  `emailCust` varchar(250) NOT NULL,
  `passwordCust` varchar(500) NOT NULL,
  `avatarCust` varchar(250) NOT NULL,
  `adrCust` varchar(250) NOT NULL,
  `townCust` varchar(250) NOT NULL,
  `stateCust` varchar(250) NOT NULL,
  `countryCust` varchar(250) NOT NULL,
  `phoneNumCust` varchar(20) NOT NULL,
  `dateTimeCust` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zipCodeCust` int(6) DEFAULT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `nameCust`, `emailCust`, `passwordCust`, `avatarCust`, `adrCust`, `townCust`, `stateCust`, `countryCust`, `phoneNumCust`, `dateTimeCust`, `zipCodeCust`) VALUES
(1, 'Customer1', 'customer1@gmail.com', 'customer1', '', '70 Ferry St', 'Newark', 'NJ', 'USA', '+1(973)565 4585', '2020-04-28 16:27:18', 7103),
(2, 'Customer2', 'customer2@gmail.com', 'customer2', '', '17 Morris avenue', 'Union', 'NJ', 'USA', '+1(973)456 5254', '2020-04-28 16:38:05', 7088),
(6, 'Customer3', 'customer3@gmail.com', 'customer3', '', '', '', '', '', '', '2020-04-30 05:14:06', NULL),
(5, 'Francis Doh', 'test@gmail.com', 'test', '', '', '', '', '', '', '2020-04-30 05:10:45', NULL),
(8, 'Customer4', 'customer4@gmail.com', 'customer4', '', '', '', '', '', '', '2020-04-30 15:37:18', NULL),
(9, 'Customer5', 'customer5@gmail.com', 'customer5', '', '', '', '', '', '', '2020-04-30 23:51:25', NULL),
(10, 'Customer6', 'customer6@gmail.com', 'customer6', '', '', '', '', '', '', '2020-05-01 05:31:48', NULL),
(11, 'Carine Jonhson', 'carine@gmail.com', 'carine', '', '', '', '', '', '', '2020-05-01 05:41:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

DROP TABLE IF EXISTS `dealer`;
CREATE TABLE IF NOT EXISTS `dealer` (
  `dealerID` bigint(20) NOT NULL AUTO_INCREMENT,
  `nameDealer` varchar(250) NOT NULL,
  `emailDealer` varchar(250) NOT NULL,
  `passwordDealer` varchar(500) NOT NULL,
  `avatarDealer` varchar(250) NOT NULL,
  `adrDealer` varchar(250) NOT NULL,
  `townDealer` varchar(250) NOT NULL,
  `stateDealer` varchar(250) NOT NULL,
  `countryDealer` varchar(250) NOT NULL,
  `phoneNumDealer` varchar(20) NOT NULL,
  `typeDealer` varchar(10) DEFAULT NULL,
  `dateTimeDealer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zipeCodeDealer` int(6) DEFAULT NULL,
  PRIMARY KEY (`dealerID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealerID`, `nameDealer`, `emailDealer`, `passwordDealer`, `avatarDealer`, `adrDealer`, `townDealer`, `stateDealer`, `countryDealer`, `phoneNumDealer`, `typeDealer`, `dateTimeDealer`, `zipeCodeDealer`) VALUES
(1, 'Dealer1', 'dealer1@gmail.com', 'dealer1', '', '15 Springfield Ave', 'Newark', 'NJ', 'USA', '+1(336) 565 8989', 'public', '2020-04-28 16:50:00', 7103),
(2, 'NetCar', 'netcar@gmail.com', 'netcar', '', '725 Morris Ave', 'Union', 'NJ', 'USA', '+1(973) 365 4458', 'private', '2020-04-28 16:50:00', 7088),
(3, 'Dealer2', 'dealer2@gmail.com', 'dealer2', '', '', '', '', '', '', NULL, '2020-04-30 07:34:46', NULL),
(4, 'Dealer3', 'dealer3@gmail.com', 'dealer3', '', '', '', '', '', '', NULL, '2020-04-30 07:36:27', NULL),
(5, 'Dealer4', 'dealer4@gmail.com', 'dealer4', '', '', '', '', '', '', NULL, '2020-04-30 15:40:58', NULL),
(6, 'Union Auto', 'union@gmail.com', 'union', '', '', '', '', '', '', NULL, '2020-05-01 05:11:22', NULL),
(7, 'Dealer 5', 'dealer5@gmail.com', 'dealer5', '', '', '', '', '', '', NULL, '2020-05-01 05:50:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `filevehicle`
--

DROP TABLE IF EXISTS `filevehicle`;
CREATE TABLE IF NOT EXISTS `filevehicle` (
  `fileVehicleID` bigint(20) NOT NULL AUTO_INCREMENT,
  `pathFileVehicle` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `nameFileVehicle` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `datetimeFileVehicle` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vehicleID` bigint(20) NOT NULL,
  `dealerID` bigint(20) NOT NULL,
  PRIMARY KEY (`fileVehicleID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `filevehicle`
--

INSERT INTO `filevehicle` (`fileVehicleID`, `pathFileVehicle`, `nameFileVehicle`, `datetimeFileVehicle`, `vehicleID`, `dealerID`) VALUES
(7, NULL, '1588550306_1.jpg', '2020-05-04 00:00:17', 19, 2),
(2, NULL, '1588549501_1.jpg', '2020-05-03 23:53:02', 18, 2),
(3, NULL, '1588549501_2.jpg', '2020-05-03 23:53:02', 18, 2),
(4, NULL, '1588549501_3.jpg', '2020-05-03 23:53:02', 18, 2),
(5, NULL, '1588549501_4.jpg', '2020-05-03 23:53:02', 18, 2),
(8, NULL, '1588550306_2.jpg', '2020-05-04 00:00:17', 19, 2),
(10, NULL, '1588564766_1.jpg', '2020-05-04 04:02:06', 21, 6),
(11, NULL, '1588565133_1.jpg', '2020-05-04 04:07:36', 21, 6),
(12, NULL, '1588565428_1.jpg', '2020-05-04 04:20:17', 22, 2),
(13, NULL, '1588567875_1.jpg', '2020-05-04 04:51:16', 25, 6),
(14, NULL, '1588994340_1.png', '2020-05-09 03:19:12', 26, 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `msgID` bigint(20) NOT NULL AUTO_INCREMENT,
  `customerID` bigint(20) NOT NULL,
  `dealerID` bigint(20) NOT NULL,
  `contentMsg` varchar(1000) NOT NULL,
  `attachmentMsg` varchar(250) NOT NULL,
  `dateTimeMsg` timestamp NOT NULL,
  `statusCustMsg` tinyint(4) NOT NULL,
  `statusDealerMsg` tinyint(4) NOT NULL,
  PRIMARY KEY (`msgID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statistiq`
--

DROP TABLE IF EXISTS `statistiq`;
CREATE TABLE IF NOT EXISTS `statistiq` (
  `statistiqID` bigint(20) NOT NULL AUTO_INCREMENT,
  `customerID` bigint(20) NOT NULL,
  `vehicleID` bigint(20) NOT NULL,
  `typeStatistiq` varchar(10) NOT NULL,
  `dateTimeStatistiq` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`statistiqID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistiq`
--

INSERT INTO `statistiq` (`statistiqID`, `customerID`, `vehicleID`, `typeStatistiq`, `dateTimeStatistiq`) VALUES
(1, 1, 1, 'view', '2020-04-29 09:00:00'),
(2, 2, 2, 'saved', '2020-04-28 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicleID` bigint(20) NOT NULL AUTO_INCREMENT,
  `vinVehicle` varchar(20) NOT NULL,
  `yearVehicle` int(11) NOT NULL,
  `makeVehicle` varchar(50) NOT NULL,
  `modelVehicle` varchar(50) NOT NULL,
  `typeVehicle` varchar(25) NOT NULL,
  `exteriorColorVehicle` varchar(25) NOT NULL,
  `interiorColorVehicle` varchar(25) NOT NULL,
  `purchasedPriceVehicle` double DEFAULT NULL,
  `sellingPriceVehicle` double NOT NULL,
  `descriptionVehicle` text NOT NULL,
  `statusVehicle` int(11) NOT NULL,
  `timeDateVehicle` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dealerPostingVehicle` bigint(20) NOT NULL,
  `mileageVehicle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`vehicleID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleID`, `vinVehicle`, `yearVehicle`, `makeVehicle`, `modelVehicle`, `typeVehicle`, `exteriorColorVehicle`, `interiorColorVehicle`, `purchasedPriceVehicle`, `sellingPriceVehicle`, `descriptionVehicle`, `statusVehicle`, `timeDateVehicle`, `dealerPostingVehicle`, `mileageVehicle`) VALUES
(1, '7D1585699DHG45854', 2019, 'Toyota', 'Camry XLE', 'sedan', 'white', 'red', 20000, 22000, '', 1, '2020-05-03 21:48:21', 6, NULL),
(2, '8D5666645GFD64892', 2018, 'Nissan', 'Altima', 'sedan', 'white', 'gray', 18000, 20000, '', 1, '2020-05-03 21:48:21', 2, NULL),
(26, '5665JHGJ5863HG86', 2019, 'Ford', 'Explorer', 'suv', 'Red', 'Gray', NULL, 15000, 'Nice and running smooth.', 1, '2020-05-09 03:19:12', 2, NULL),
(25, '52465445JFD5525558', 2014, 'Nissan', 'Altima', 'sedean', 'Black', 'Dark', NULL, 3000, 'Nice car. 28 to 38 MPG. Car runs smooth. No accident or engine light.', 1, '2020-05-04 04:51:16', 6, NULL),
(13, '5', 85, '55', '55', 'suv', '5', '55', NULL, 5, '555', 1, '2020-05-03 23:35:53', 0, NULL),
(16, '9GJGY56682KJH6', 2016, 'Hyundai', 'Elantra Limited', 'sedean', 'White', 'Black', NULL, 5000, 'Car working in great condition.', 1, '2020-05-03 23:42:00', 2, NULL),
(17, '45GGJD5796278', 2013, 'Hyundai', 'Elantra', 'sedean', 'White', 'Gray', NULL, 4500, 'Set appointment for more. Car is running perfectly.', 1, '2020-05-03 23:45:03', 2, NULL),
(18, '5668HFTY68756', 2016, 'Hyundai', 'Elantra', 'sedean', 'White', 'Brown', NULL, 6000, 'Stop by to take a look yourself. Car is working fine.', 1, '2020-05-03 23:53:02', 2, NULL),
(19, '56GYG5599231', 2019, 'Honda', 'Accord Touring', 'sedean', 'White', 'Brown', NULL, 9000, 'Nice and fresh. Please stop by to see for yourself.', 1, '2020-05-04 00:00:17', 2, NULL),
(21, '56895YR586GF456', 2020, 'Lexus', 'GT 220 AWD', 'suv', 'Blue', 'Gray', NULL, 19000, 'Brand new. Stop by to see for yourself.', 1, '2020-05-04 03:59:38', 6, NULL),
(22, '565GFD524JG5525', 2020, 'BMW', 'i8', 'sedean', 'Yellow', 'Dark', NULL, 36000, 'All new. Full package. Sport car, ready for you.', 1, '2020-05-04 04:05:36', 6, NULL),
(23, '655KJG5855HG', 2012, 'Toyota', 'Camry', 'sedean', 'White', 'Silver', NULL, 4000, 'Nice and running smooth', 1, '2020-05-04 04:26:40', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlistID` bigint(20) NOT NULL AUTO_INCREMENT,
  `customerID` bigint(20) NOT NULL,
  `vehicleID` bigint(20) NOT NULL,
  `dateTimeWishlist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`wishlistID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistID`, `customerID`, `vehicleID`, `dateTimeWishlist`) VALUES
(1, 1, 2, '2020-04-28 18:37:50'),
(2, 2, 1, '2020-04-28 18:37:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

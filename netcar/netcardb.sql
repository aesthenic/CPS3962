-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2020 at 07:58 AM
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
  `dataTimeAppointment` timestamp NOT NULL,
  `statusAppointment` tinyint(4) NOT NULL,
  `detailStatusAppointment` varchar(500) NOT NULL,
  PRIMARY KEY (`appointmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `customerID`, `dealerID`, `vehicleID`, `descriptionAppointment`, `dataTimeAppointment`, `statusAppointment`, `detailStatusAppointment`) VALUES
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `nameCust`, `emailCust`, `passwordCust`, `avatarCust`, `adrCust`, `townCust`, `stateCust`, `countryCust`, `phoneNumCust`, `dateTimeCust`, `zipCodeCust`) VALUES
(1, 'Customer1', 'customer1@gmail.com', 'customer1', '', '70 Ferry St', 'Newark', 'NJ', 'USA', '+1(973)565 4585', '2020-04-28 16:27:18', 7103),
(2, 'Customer2', 'customer2@gmail.com', 'customer2', '', '17 Morris avenue', 'Union', 'NJ', 'USA', '+1(973)456 5254', '2020-04-28 16:38:05', 7088),
(6, 'Customer3', 'customer3@gmail.com', 'customer3', '', '', '', '', '', '', '2020-04-30 05:14:06', NULL),
(5, 'Francis Doh', 'test@gmail.com', 'test', '', '', '', '', '', '', '2020-04-30 05:10:45', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dealerID`, `nameDealer`, `emailDealer`, `passwordDealer`, `avatarDealer`, `adrDealer`, `townDealer`, `stateDealer`, `countryDealer`, `phoneNumDealer`, `typeDealer`, `dateTimeDealer`, `zipeCodeDealer`) VALUES
(1, 'Dealer1', 'dealer1@gmail.com', 'dealer1', '', '15 Springfield Ave', 'Newark', 'NJ', 'USA', '+1(336) 565 8989', 'public', '2020-04-28 16:50:00', 7103),
(2, 'NetCar', 'netcar@gmail.com', 'netcar', '', '725 Morris Ave', 'Union', 'NJ', 'USA', '+1(973) 365 4458', 'private', '2020-04-28 16:50:00', 7088),
(3, 'Dealer2', 'dealer2@gmail.com', 'dealer2', '', '', '', '', '', '', NULL, '2020-04-30 07:34:46', NULL),
(4, 'Dealer3', 'dealer3@gmail.com', 'dealer3', '', '', '', '', '', '', NULL, '2020-04-30 07:36:27', NULL);

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
  `purchasedPriceVehicle` double NOT NULL,
  `sellingPriceVehicle` double NOT NULL,
  `statusVehicle` int(11) NOT NULL,
  `dealerID` int(11) NOT NULL,
  PRIMARY KEY (`vehicleID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleID`, `vinVehicle`, `yearVehicle`, `makeVehicle`, `modelVehicle`, `typeVehicle`, `exteriorColorVehicle`, `interiorColorVehicle`, `purchasedPriceVehicle`, `sellingPriceVehicle`, `statusVehicle`, `dealerID`) VALUES
(1, '7D1585699DHG45854', 2019, 'Toyota', 'Camry XLE', 'sedan', 'white', 'red', 20000, 22000, 1, 1),
(2, '8D5666645GFD64892', 2018, 'Nissan', 'Altima', 'sedan', 'white', 'gray', 18000, 20000, 1, 2);

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

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2020 at 08:51 AM
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
  `appointmentID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `dealerID` bigint(20) NOT NULL,
  `vehicleID` bigint(20) NOT NULL,
  `descriptionAppointment` varchar(500) NOT NULL,
  `dataTimeAppointment` timestamp NOT NULL,
  `statusAppointment` tinyint(4) NOT NULL,
  `detailStatusAppointment` varchar(500) NOT NULL,
  PRIMARY KEY (`appointmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` bigint(20) NOT NULL,
  `nameCust` varchar(250) NOT NULL,
  `emailCust` varchar(250) NOT NULL,
  `passwordCust` varchar(500) NOT NULL,
  `avatarCust` varchar(250) NOT NULL,
  `adrCust` varchar(250) NOT NULL,
  `townCust` varchar(250) NOT NULL,
  `stateCust` varchar(250) NOT NULL,
  `countryCust` varchar(250) NOT NULL,
  `phoneCodeCust` varchar(5) NOT NULL,
  `phoneNumCust` int(10) NOT NULL,
  `dateTimeCust` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zipCodeCust` int(6) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

DROP TABLE IF EXISTS `dealer`;
CREATE TABLE IF NOT EXISTS `dealer` (
  `dealerID` bigint(20) NOT NULL,
  `nameDealer` varchar(250) NOT NULL,
  `emailDealer` varchar(250) NOT NULL,
  `passwordDealer` varchar(500) NOT NULL,
  `adrDealer` varchar(250) NOT NULL,
  `townDealer` varchar(250) NOT NULL,
  `stateDealer` varchar(250) NOT NULL,
  `countryDealer` varchar(250) NOT NULL,
  `phoneCodeDealer` varchar(5) NOT NULL,
  `phoneNumDealer` int(10) NOT NULL,
  `avatarDealer` varchar(250) NOT NULL,
  `typeDealer` varchar(10) NOT NULL,
  `dateTimeDealer` timestamp NOT NULL,
  `zipeCodeDealer` int(6) NOT NULL,
  PRIMARY KEY (`dealerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `msgID` bigint(20) NOT NULL,
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
  `statistiqID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `vehicleID` bigint(20) NOT NULL,
  `typeStatistiq` varchar(10) NOT NULL,
  `dateTimeStatistiq` timestamp NOT NULL,
  PRIMARY KEY (`statistiqID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicleID` bigint(20) NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wishlistID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `vehicleID` bigint(20) NOT NULL,
  `dateTimeWishlist` timestamp NOT NULL,
  PRIMARY KEY (`wishlistID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

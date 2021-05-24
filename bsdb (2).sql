-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2021 at 11:17 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cert`
--

CREATE TABLE `cert` (
  `certID` int(2) NOT NULL,
  `certname` varchar(30) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `about` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cert`
--

INSERT INTO `cert` (`certID`, `certname`, `logo`, `about`) VALUES
(1, 'Fairtrade', 'fairtrade.png', 'fairtrade is good :)'),
(2, 'Environmental Choice', 'envirochoice.png', 'Environmental Choice is a government funded ecolabel'),
(3, 'Greentick', 'greentick.png', '\r\nGreen Tick\r\nGreen Tick is a global, sustainability standard for consumer products. It is an independent environmental certification separate from any industry or government guidance. '),
(4, 'SPCA Certification', 'spca.png', 'spca certifies animal products to make sure they have equal rights and live humanly'),
(5, 'USDA Organic', 'usda.png', 'USDA blurb'),
(6, 'New Zealand Made', 'nzmade.png', 'NZ made blurb'),
(7, 'Rainforest Alliance', 'rainalliance.png', 'blurb'),
(8, 'Toitu Carbon Reduce', 'toitureduce.png', 'blurb'),
(9, 'Toitu Carbon zero', 'toituzero.png', 'blurb');

-- --------------------------------------------------------

--
-- Table structure for table `productcert`
--

CREATE TABLE `productcert` (
  `ID` int(11) NOT NULL,
  `productID` int(10) NOT NULL,
  `certID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcert`
--

INSERT INTO `productcert` (`ID`, `productID`, `certID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 0, 1),
(6, 0, 3),
(7, 0, 3),
(8, 0, 1),
(9, 0, 1),
(10, 0, 1),
(11, 0, 2),
(12, 0, 2),
(13, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(5) NOT NULL,
  `productbarcode` int(5) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `image` varchar(20) NOT NULL,
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productbarcode`, `productname`, `image`, `typeID`) VALUES
(1, 123456, 'Steak and Shrimp', 'steak.jpg', 1),
(2, 234567, 'nachos', 'nachos.jpg', 4),
(3, 345678, 'chips', 'chips.jpg', 3),
(4, 456789, 'soup', 'soup.jpg', 3),
(12, 1, 'sadness', 'sadness.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeID` int(3) NOT NULL,
  `typename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `typename`) VALUES
(1, 'meat/seafood'),
(2, 'fruit/veg'),
(3, 'pantry'),
(4, 'frozen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cert`
--
ALTER TABLE `cert`
  ADD PRIMARY KEY (`certID`);

--
-- Indexes for table `productcert`
--
ALTER TABLE `productcert`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cert`
--
ALTER TABLE `cert`
  MODIFY `certID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productcert`
--
ALTER TABLE `productcert`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

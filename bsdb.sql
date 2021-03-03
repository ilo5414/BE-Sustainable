-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2021 at 02:10 AM
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
  `name` varchar(30) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `about` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(5) NOT NULL,
  `barcode` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `certID` int(2) NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `barcode`, `name`, `certID`, `image`) VALUES
(1, 123456, 'Steak and Shrimp', 1, 'steak.jpg'),
(2, 234567, 'nachos', 1, 'nachos.jpg'),
(3, 345678, 'chips', 1, 'chips.jpg'),
(4, 456789, 'soup', 1, 'soup.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cert`
--
ALTER TABLE `cert`
  ADD PRIMARY KEY (`certID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cert`
--
ALTER TABLE `cert`
  MODIFY `certID` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2021 at 04:27 AM
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
(9, 'Toitu Carbon zero', 'toituzero.png', 'blurb'),
(10, 'Bio Gro Organic', 'biogroorganic.png', 'nz cert for organic produce ... blurb');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyID` int(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `pagelink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyID`, `companyname`, `pagelink`) VALUES
(1, 'CeresOrganics', 'https://ceres.co.nz/'),
(2, 'Grounded Responsible Coffee', 'https://www.groundedcoffee.co.nz/'),
(3, 'Frenz Free Range Eggs', 'http://www.frenzeggs.co.nz/'),
(4, 'Havana Coffee Works', 'https://shop.havana.co.nz/products/five-star');

-- --------------------------------------------------------

--
-- Table structure for table `favcert`
--

CREATE TABLE `favcert` (
  `favcertID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `certID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favcert`
--

INSERT INTO `favcert` (`favcertID`, `userID`, `certID`) VALUES
(44, 6, 2),
(45, 2, 1),
(46, 2, 2),
(47, 2, 3),
(51, 4, 4),
(60, 3, 3),
(61, 3, 4),
(62, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `favprod`
--

CREATE TABLE `favprod` (
  `favprodID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favprod`
--

INSERT INTO `favprod` (`favprodID`, `userID`, `productID`) VALUES
(7, 6, 2),
(8, 2, 1),
(9, 2, 2),
(29, 3, 1),
(32, 3, 4),
(35, 3, 5);

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
(1, 1, 6),
(2, 2, 10),
(5, 3, 10),
(6, 4, 10),
(7, 4, 1),
(9, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(5) NOT NULL,
  `productbarcode` bigint(50) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `companyID` int(50) NOT NULL,
  `typeID` int(11) NOT NULL,
  `blurb` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productbarcode`, `productname`, `companyID`, `typeID`, `blurb`) VALUES
(1, 9421900241088, '5 Star Plunger Grind', 4, 1, 'Meshes can have shape keys defined for them. These give different positions to the vertices (though their number and topology—edge/face connections—cannot change). The amount of influence each shape key contributes to the shape can be continuously adjusted from nothing to 100%, and like other proper'),
(2, 75710900201, 'Organic Mixed Size 10pack', 3, 1, 'Meshes can have shape keys defined for them. These give different positions to the vertices (though their number and topology—edge/face connections—cannot change). The amount of influence each shape key contributes to the shape can be continuously adjusted from nothing to 100%, and like other property values can be made to vary over time.'),
(3, 9415748021339, 'Organic Peanut Butter Smooth', 1, 1, ''),
(4, 9421904673021, 'Plunger Grind Kickstarter', 2, 1, ''),
(5, 9415748021261, 'Organic chopped tomatoes', 1, 4, ''),
(6, 9415748005070, 'Organic Chickpeas Garbanzo Beans', 1, 4, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`) VALUES
(2, 'sophia', '$2y$10$L5UjXtQ0SbvPlR2Bo9cBU./ld0RWxptaMKS/LQ85L74Ij6ghZvmky', ''),
(3, 'izzy', '$2y$10$cbl1B5y6jGja4aMYRYiTDONwGBxCXxcpBd059oI0TV2L9Xsz53IQe', ''),
(5, 'ILogie', '$2y$10$VMkj1XdD8Qo82Nbrq44FeOwV2lbPcJ8TXGwR1CYIqR1XzpeTBHw.e', 'ilo5414@stacmail.net'),
(6, 'gor', '$2y$10$OJY/w/AAmgMcoQY.M13kMe4YLz1Gj9c6pEY0EpIxHdDsO8IbBUqme', 'gor1@gormail.com'),
(7, 'ilog', '$2y$10$HY9.vbPYwqwkXK.KeLHH.eItrYHzDIqDnqAiI94z8HA03fpJZAZPa', 'log@log');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cert`
--
ALTER TABLE `cert`
  ADD PRIMARY KEY (`certID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `favcert`
--
ALTER TABLE `favcert`
  ADD PRIMARY KEY (`favcertID`);

--
-- Indexes for table `favprod`
--
ALTER TABLE `favprod`
  ADD PRIMARY KEY (`favprodID`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cert`
--
ALTER TABLE `cert`
  MODIFY `certID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favcert`
--
ALTER TABLE `favcert`
  MODIFY `favcertID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `favprod`
--
ALTER TABLE `favprod`
  MODIFY `favprodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `productcert`
--
ALTER TABLE `productcert`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

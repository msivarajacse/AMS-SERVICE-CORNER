-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2019 at 11:23 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanjayshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

CREATE TABLE `adminprofile` (
  `ADMINID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` text NOT NULL,
  `PHONENO` varchar(30) NOT NULL,
  `ADDRESS` text NOT NULL,
  `CREATED` text NOT NULL,
  `WHOCREATED` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`ADMINID`, `NAME`, `USERNAME`, `PASSWORD`, `PHONENO`, `ADDRESS`, `CREATED`, `WHOCREATED`) VALUES
(1, 'Praveenram', 'praveenrambalu', 'a63208d97ee31c052f0802e19301936f', '08220085613', 'Mahendra institute of technology.\r\nMallasamdram', '2018-10-02 11:45:40', 'Admin'),
(2, 'Sanjaibal', 'sanjaibal', 'bf07d7dc7ecd6a0a106a4014dfde870a', '07373966701', '2/80 Ammasipalayam, Kokkarayanpettai(po), Tiruchengode(tk), Namakkal(dt).', 'Tue Jan 01 2019 14:47:26 GMT+0530 (India Standard Time)', 'Praveenram');

-- --------------------------------------------------------

--
-- Table structure for table `authenticationkey`
--

CREATE TABLE `authenticationkey` (
  `keyid` int(11) NOT NULL,
  `authkey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authenticationkey`
--

INSERT INTO `authenticationkey` (`keyid`, `authkey`) VALUES
(1, '241037A4jwwwrZ5bb5debb');

-- --------------------------------------------------------

--
-- Table structure for table `phonedetails`
--

CREATE TABLE `phonedetails` (
  `SID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `CONTACTNO` text NOT NULL,
  `ADMIN_NAME` varchar(30) NOT NULL,
  `WHO_RECEIVED_COMPANY` varchar(30) NOT NULL,
  `WHEN_RECEIVED` text NOT NULL,
  `IMEI` text NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `MODEL` varchar(75) NOT NULL,
  `PROBLEM` varchar(50) NOT NULL,
  `PROBLEM_DESCRIPTION` text NOT NULL,
  `APPROXIMATE_PRICE` text NOT NULL,
  `DELIVERY_DATE` text NOT NULL,
  `RECEIVER_NAME` varchar(50) NOT NULL,
  `WHO_GAVE` varchar(50) NOT NULL,
  `WHEN_DELIVERY` text NOT NULL,
  `AMOUNT_COLLECTED` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `ADVANCE_AMOUNT` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phonedetails`
--

INSERT INTO `phonedetails` (`SID`, `NAME`, `CONTACTNO`, `ADMIN_NAME`, `WHO_RECEIVED_COMPANY`, `WHEN_RECEIVED`, `IMEI`, `BRAND`, `MODEL`, `PROBLEM`, `PROBLEM_DESCRIPTION`, `APPROXIMATE_PRICE`, `DELIVERY_DATE`, `RECEIVER_NAME`, `WHO_GAVE`, `WHEN_DELIVERY`, `AMOUNT_COLLECTED`, `STATUS`, `ADVANCE_AMOUNT`) VALUES
(1, 'Dhass', '9943212453', 'Praveenram', 'Praveenram', '2018-10-02 15:04:03', '', 'Redmi', '3s Prime', 'Earpiece', 'earpiece is not loud', '300', '2018-10-05', 'prakSH', 'praveenram', '2018-10-02 15:05:55', '250', 'DELIVERED', '50'),
(2, 'prakdjfkaj', '9943212453', 'Praveenram', 'kdsjf', '2018-10-02 15:28:03', 'dkafjk', 'dsakjf', 'dksfjak', 'fkasdjfk', 'kdsjfk', '212', '2122-12-12', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', '12'),
(3, 'Praveenram Balachandran', '8220085613', 'Praveenram', 'ASDLKJ', '2018-10-03 17:03:49', 'KJKJK', 'KJASDK', 'KAJSDK', 'KEYPAD', 'DASJKF', '12', '2131-12-12', '', '', '', '', 'Not Ready', '12123'),
(4, 'fsad', 'sdsfsa', 'Praveenram', 'dsaf', 'Wed Oct 03 2018 17:53:27 GMT+0530 (India Standard Time)', 'dasfa', 'dsaf', 'dsaf', 'DISPLAY DAMAGE', 'dsfa', '12', '1212-12-12', 'Praveenram Balachandran', 'sakthivel', 'Wed Oct 03 2018 17:56:31 GMT+0530 (India Standard Time)', '200', 'DELIVERED', '100'),
(5, 'Dhasss', '9943212453', 'Praveenram', 'Praveenram', 'Thu Oct 04 2018 13:57:55 GMT+0530 (India Standard Time)', '', 'Redmi', '3sprime', 'SPEAKER', '', '', '2018-10-05', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', ''),
(6, 'Dhasss', '9943212453', 'Praveenram', 'Praveenram', 'Thu Oct 04 2018 13:57:55 GMT+0530 (India Standard Time)', '', 'Redmi', '3sprime', 'SPEAKER', '', '', '2018-10-05', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', ''),
(7, 'Dhasss', '9943212453', 'Praveenram', 'Praveenram', 'Thu Oct 04 2018 13:57:55 GMT+0530 (India Standard Time)', '', 'Redmi', '3sprime', 'SPEAKER', '', '', '2018-10-05', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', ''),
(8, 'Sanjaibal', '883887144', 'Praveenram', 'praveenram', 'Thu Oct 04 2018 14:02:00 GMT+0530 (India Standard Time)', '', 'Moto ', 'g4 plus', 'NO SERVICE', '', '', '2018-10-05', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', ''),
(9, 'Praveenram Balachandran', '8220085613', 'Praveenram', 'Praveenram', 'Thu Oct 04 2018 14:19:18 GMT+0530 (India Standard Time)', '', 'Redmi', '3sprime', 'RINGER', '', '', '2018-10-10', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', ''),
(10, 'Praveenram Balachandran', '8220085613', 'Praveenram', 'Praveenram', 'Thu Oct 04 2018 14:19:18 GMT+0530 (India Standard Time)', '', 'Redmi', '3sprime', 'RINGER', '', '', '2018-10-10', 'Praveenram Balachandran', 'ramjibaba', 'Thu Oct 04 2018 14:35:11 GMT+0530 (India Standard Time)', '200', 'DELIVERED', ''),
(11, 'ram', '8220085613', 'Praveenram', 'kk', 'Thu Oct 04 2018 15:13:44 GMT+0530 (India Standard Time)', '', 'kk', 'kk', 'RINGER', 'k', '', '2018-10-05', '', '', '', '', 'COLLECTED & SERVICE ON PROCESS', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_category`
--

CREATE TABLE `stock_category` (
  `ID` int(30) NOT NULL,
  `CATEGORY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_category`
--

INSERT INTO `stock_category` (`ID`, `CATEGORY`) VALUES
(6, 'MOBILE PHONE'),
(7, 'headphone'),
(8, 'BATTERY'),
(9, 'BLUETOOH'),
(10, 'Tempred glass'),
(12, 'OTG Cable'),
(13, 'ccpin'),
(14, 'disolay'),
(15, 'earing speaker'),
(16, 'ringer'),
(17, 'pannel');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `STOCK_ID` int(50) NOT NULL,
  `STOCK_BRAND` text NOT NULL,
  `STOCK_MODEL` text NOT NULL,
  `STOCK_MRP` text NOT NULL,
  `STOCK_DISCOUNT` text NOT NULL,
  `STOCK_CATEGORY` text NOT NULL,
  `STOCK_QUANTITY` text NOT NULL,
  `STOCK_LOG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`STOCK_ID`, `STOCK_BRAND`, `STOCK_MODEL`, `STOCK_MRP`, `STOCK_DISCOUNT`, `STOCK_CATEGORY`, `STOCK_QUANTITY`, `STOCK_LOG`) VALUES
(1, 'SAMSUNG', 'J6', '132', '10', 'MOBILE PHONE', '117', '2019-01-01 11:49:39'),
(4, 'NOKIA', 'JIB', '4235', '542', 'MOBILE PHONE', '5', '2019-01-01 13:14:15'),
(5, 'NEON', 'IELA', '12', '10', 'MOBILE PHONE', '47', '2019-01-01 13:14:52'),
(7, 'vivo', 'v9', '15000', '200', 'MOBILE PHONE', '5', '2019-01-01 14:49:10'),
(8, 'ERD', '2252', '450', '20', 'BATTERY', '3', '2019-01-01 14:50:17'),
(9, 'OTG Cable', 'target', '60', '10', 'OTG Cable', '30', '2019-01-01 14:55:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminprofile`
--
ALTER TABLE `adminprofile`
  ADD PRIMARY KEY (`ADMINID`);

--
-- Indexes for table `authenticationkey`
--
ALTER TABLE `authenticationkey`
  ADD PRIMARY KEY (`keyid`);

--
-- Indexes for table `phonedetails`
--
ALTER TABLE `phonedetails`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `stock_category`
--
ALTER TABLE `stock_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`STOCK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminprofile`
--
ALTER TABLE `adminprofile`
  MODIFY `ADMINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authenticationkey`
--
ALTER TABLE `authenticationkey`
  MODIFY `keyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phonedetails`
--
ALTER TABLE `phonedetails`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock_category`
--
ALTER TABLE `stock_category`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `STOCK_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

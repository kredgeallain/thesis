-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 08:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `baranggay`
--

CREATE TABLE `baranggay` (
  `baranggayID` int(21) NOT NULL,
  `baranggay` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baranggay`
--

INSERT INTO `baranggay` (`baranggayID`, `baranggay`) VALUES
(1, 'brgy. juan'),
(2, 'baranggay2'),
(3, 'baranggay3'),
(4, 'baranggay4');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchID` int(21) NOT NULL,
  `batch` varchar(21) NOT NULL,
  `unit` varchar(21) NOT NULL DEFAULT 'layer',
  `farmID` int(21) NOT NULL,
  `date` date NOT NULL,
  `initial` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchID`, `batch`, `unit`, `farmID`, `date`, `initial`) VALUES
(4, '123', 'layer', 6, '0123-12-23', 0),
(5, '123', 'layer', 7, '0123-12-23', 0),
(6, 'palawan batch 1', 'broiler', 8, '0000-00-00', 0),
(10, 'asd qec2 2', 'broiler', 11, '2022-11-01', 1231),
(11, 'palawan batch broiler', 'broiler', 12, '2022-11-19', 21),
(12, 'batch 90', 'broiler', 13, '2022-11-04', 21),
(15, 'batch 45', 'layer', 17, '2022-12-04', 23),
(16, 'bacth23', 'layer', 18, '2022-12-04', 123),
(17, 'batch 3', 'Select Farm Unit', 19, '2022-12-02', 45),
(18, '2nd batch', 'layer', 20, '2022-12-05', 12313),
(19, 'batch 1', 'broiler', 21, '2022-12-05', 1234),
(20, '', 'Select Farm Unit', 22, '0000-00-00', 0),
(21, 'batch 1', 'broiler', 23, '2022-12-07', 20),
(22, '', 'Select Farm Unit', 26, '0000-00-00', 0),
(23, '', 'Select Farm Unit', 29, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `broiler`
--

CREATE TABLE `broiler` (
  `broilerID` int(21) NOT NULL,
  `batchID` int(21) NOT NULL,
  `broiler_weight` int(21) NOT NULL,
  `mortality` int(21) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farmID` int(21) NOT NULL,
  `baranggayID` int(21) NOT NULL,
  `farmname` varchar(21) NOT NULL,
  `farmowner` varchar(21) NOT NULL,
  `contactno` int(21) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farmID`, `baranggayID`, `farmname`, `farmowner`, `contactno`, `lat`, `lng`) VALUES
(2, 1, 'farm 11', 'farmer 11', 1231313, '0', '0'),
(3, 1, 'farm 11', 'farmer 11', 1231313, '0', '0'),
(4, 1, 'farm 11', 'farmer 11', 1231313, '0', '0'),
(5, 1, 'farm 11', 'farmer 11', 1231313, '0', '0'),
(6, 1, 'farm 11', 'farmer 11', 1231313, '0', '0'),
(7, 1, 'farm 11', 'farmer 11', 1231313, '0', '0'),
(8, 2, 'palawan farm', 'palawan', 12345, '0', '0'),
(9, 1, 'asdsadas', 'asdasdsasd', 123132123, '0', '0'),
(10, 2, 'farmville 2', 'farmer 21', 12124124, '0', '0'),
(11, 2, 'Farmville', 'Farmer 22', 444444, '0', '0'),
(12, 1, 'farm palawan', 'palawan good boy ', 123123, '0', '0'),
(13, 2, 'FARM2', 'FARM222', 8888888, '0', '0'),
(17, 4, 'farm00', 'famer00', 1234, '0', '0'),
(18, 1, 'ad', 'qweqe', 0, '0', '0'),
(19, 2, 'farm 1', 'famer 1', 1234, '0', '0'),
(20, 4, 'grecia farm', 'grecia farmer', 12313124, '0', '0'),
(21, 3, 'jom farm', 'jom farmer', 213, '0', '0'),
(22, 1, 'farm 101', 'farmer 101', 12314, '0', '0'),
(23, 1, 'juan farm', 'juan', 908761234, '0', '0'),
(26, 3, 'wewqwr', 'wrwre', 0, '0', '0'),
(29, 2, '', '', 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `layer`
--

CREATE TABLE `layer` (
  `layerID` int(11) NOT NULL,
  `batchID` int(11) NOT NULL,
  `no_eggs` int(11) NOT NULL,
  `reject_eggs` int(11) NOT NULL,
  `mortality` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(21) NOT NULL,
  `layerID` int(21) NOT NULL,
  `broilerID` int(21) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `position` varchar(21) NOT NULL DEFAULT 'admin',
  `password` varchar(21) NOT NULL,
  `repassword` varchar(21) NOT NULL,
  `baranggay` varchar(21) NOT NULL,
  `mobile_no` bigint(21) NOT NULL,
  `status` varchar(21) NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `position`, `password`, `repassword`, `baranggay`, `mobile_no`, `status`) VALUES
(85, 'admin', 'admin', 'admin', 'admin', 'admin', '', 913456789, 'on'),
(86, 'agent', 'agent', 'agent', 'agent', 'agent', '', 98765432, 'on'),
(87, 'user 1', 'user1', 'admin', '1234', '', '', 923123124, 'on'),
(88, 'jomjom', 'jom', 'admin', 'jomjom', '', '', 90912312, 'on'),
(89, 'alucard', 'alucard', 'agent', 'alucard', '', '', 131414, 'on'),
(90, 'miya', 'miya', 'admin', 'miya', 'miya', '', 2131421, 'on'),
(91, 'ashe', 'ashe', 'admin', 'aseh', 'aseh', '', 11231515, 'on'),
(94, 'King D Delacruz', 'king', 'admin', '', '', '   brgy. juan  ', 213456789, 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baranggay`
--
ALTER TABLE `baranggay`
  ADD PRIMARY KEY (`baranggayID`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchID`),
  ADD UNIQUE KEY `farmID` (`farmID`);

--
-- Indexes for table `broiler`
--
ALTER TABLE `broiler`
  ADD PRIMARY KEY (`broilerID`),
  ADD KEY `batchID` (`batchID`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farmID`),
  ADD KEY `baranggayID` (`baranggayID`);

--
-- Indexes for table `layer`
--
ALTER TABLE `layer`
  ADD PRIMARY KEY (`layerID`),
  ADD KEY `batchID` (`batchID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `layerID` (`layerID`,`broilerID`),
  ADD KEY `broilerID` (`broilerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baranggay`
--
ALTER TABLE `baranggay`
  MODIFY `baranggayID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `broiler`
--
ALTER TABLE `broiler`
  MODIFY `broilerID` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farmID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `layer`
--
ALTER TABLE `layer`
  MODIFY `layerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `farm` (`farmID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `broiler`
--
ALTER TABLE `broiler`
  ADD CONSTRAINT `broiler_ibfk_1` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`);

--
-- Constraints for table `farm`
--
ALTER TABLE `farm`
  ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`baranggayID`) REFERENCES `baranggay` (`baranggayID`);

--
-- Constraints for table `layer`
--
ALTER TABLE `layer`
  ADD CONSTRAINT `layer_ibfk_1` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`broilerID`) REFERENCES `broiler` (`broilerID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`layerID`) REFERENCES `layer` (`layerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*Altered Table Layer Added Lcurrent for current number of chickens upon gathering production data,
  this is the bases on computing the mortality rate*/
ALTER TABLE `layer` ADD `Lcurrent` INT(11) NOT NULL AFTER `reject_eggs`;

/*Altered Table Broiler Added Bcurrent for current number of chickens upon gathering production data,
  this is the bases on computing the mortality rate*/
ALTER TABLE `broiler` ADD `Bcurrent` INT(11) NOT NULL AFTER `broiler_weight`;

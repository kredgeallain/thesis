-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 04:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(1, 'baranggay1'),
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
(9, 'batch 9', 'layer', 1, '2022-11-02', 21),
(10, 'asd qec2 2', 'broiler', 11, '2022-11-01', 1231),
(11, 'palawan batch broiler', 'broiler', 12, '2022-11-19', 21),
(12, 'batch 90', 'broiler', 13, '2022-11-04', 21);

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farmID` int(21) NOT NULL,
  `baranggayID` int(21) NOT NULL,
  `farmname` varchar(21) NOT NULL,
  `farmowner` varchar(21) NOT NULL,
  `contactno` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farmID`, `baranggayID`, `farmname`, `farmowner`, `contactno`) VALUES
(1, 1, 'farm 3', 'farmer 3', 1231313),
(2, 1, 'farm 11', 'farmer 11', 1231313),
(3, 1, 'farm 11', 'farmer 11', 1231313),
(4, 1, 'farm 11', 'farmer 11', 1231313),
(5, 1, 'farm 11', 'farmer 11', 1231313),
(6, 1, 'farm 11', 'farmer 11', 1231313),
(7, 1, 'farm 11', 'farmer 11', 1231313),
(8, 2, 'palawan farm', 'palawan', 12345),
(9, 1, 'asdsadas', 'asdasdsasd', 123132123),
(10, 2, 'farmville 2', 'farmer 21', 12124124),
(11, 2, 'Farmville', 'Farmer 22', 444444),
(12, 1, 'farm palawan', 'palawan good boy ', 123123),
(13, 2, 'FARM2', 'FARM222', 8888888);

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `mapID` int(21) NOT NULL,
  `lat` int(21) NOT NULL,
  `lng` int(21) NOT NULL,
  `farmID` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(21) NOT NULL,
  `batchID` int(21) NOT NULL,
  `noeggs` int(11) NOT NULL,
  `rejecteggs` int(11) NOT NULL,
  `wieght` float NOT NULL,
  `mortality` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `current` int(21) NOT NULL,
  `userID` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `farmID` int(11) NOT NULL,
  `batchID` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `mobile_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `position`, `password`, `mobile_no`) VALUES
(1, 'jomarie', 'jom', 'admin', 'jomjom', 123123),
(39, 'kredge', 'kredgeal', 'agent', 'kredge123', 12313123),
(65, 'Kurt Anfernee Amunategui', 'kurt', 'agent', 'safczfasfa', 123123123),
(68, 'Kingkong', 'king', 'agent', 'qwrasfa', 1212412),
(69, 'Mark Lee', 'Mark', 'agent', 'leee', 1111111),
(74, 'krede', 'k', 'agent', 'kredge', 12345);

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
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farmID`),
  ADD KEY `baranggayID` (`baranggayID`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`mapID`),
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `farmID` (`farmID`,`batchID`,`product`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `product` (`product`);

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
  MODIFY `batchID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farmID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `mapID` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `farm` (`farmID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm`
--
ALTER TABLE `farm`
  ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`baranggayID`) REFERENCES `baranggay` (`baranggayID`);

--
-- Constraints for table `map`
--
ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `farm` (`farmID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`product`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `report_ibfk_4` FOREIGN KEY (`farmID`) REFERENCES `farm` (`farmID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

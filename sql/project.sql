-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 01:39 AM
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
(1, 'Barangay On3'),
(2, 'Barangay Two'),
(3, 'Barangay Three'),
(4, 'Barangay Four'),
(9, 'Barangay Five'),
(15, 'Barangay Six'),
(16, 'Barangay Seven'),
(17, 'Barangay Eight'),
(18, 'Barangay Nine'),
(19, 'Barangay Ten');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchID` int(21) NOT NULL,
  `farmID` int(11) NOT NULL,
  `batch` varchar(21) NOT NULL,
  `unit` varchar(21) NOT NULL DEFAULT 'layer',
  `date` date NOT NULL,
  `initial` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchID`, `farmID`, `batch`, `unit`, `date`, `initial`) VALUES
(92, 93, 'Batch 1', 'layer', '2023-03-03', 100),
(93, 93, 'Batch 1', 'broiler', '2023-03-03', 40),
(94, 93, ' Batch 1', 'layer', '2023-03-13', 250),
(95, 93, 'batch 3', 'layer', '2023-03-13', 300),
(96, 93, 'Batch 2', 'layer', '2023-03-14', 21);

-- --------------------------------------------------------

--
-- Table structure for table `broiler`
--

CREATE TABLE `broiler` (
  `broilerID` int(21) NOT NULL,
  `batchID` int(21) NOT NULL,
  `userID` int(21) NOT NULL,
  `broiler_weight` int(21) NOT NULL,
  `Bcurrent` int(11) NOT NULL,
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
(93, 1, 'Grecia\'s Farm', 'Joemarie Grecia', 2345667, '10.59197842', '122.69170620');

-- --------------------------------------------------------

--
-- Table structure for table `layer`
--

CREATE TABLE `layer` (
  `layerID` int(11) NOT NULL,
  `batchID` int(11) NOT NULL,
  `userID` int(20) NOT NULL,
  `no_eggs` int(11) NOT NULL,
  `reject_eggs` int(11) NOT NULL,
  `Lcurrent` int(11) NOT NULL,
  `mortality` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layer`
--

INSERT INTO `layer` (`layerID`, `batchID`, `userID`, `no_eggs`, `reject_eggs`, `Lcurrent`, `mortality`, `date`) VALUES
(51, 92, 136, 21, 2, 23, 1, '2023-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `position` varchar(21) NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL,
  `repassword` varchar(21) NOT NULL,
  `baranggay` varchar(21) NOT NULL,
  `mobile_no` bigint(21) NOT NULL,
  `status` varchar(21) NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `position`, `password`, `repassword`, `baranggay`, `mobile_no`, `status`) VALUES
(136, 'admin', 'admin', 'admin', 'admin', 'admin', '   baranggay2  ', 1234, 'on'),
(137, 'agent', 'agent', 'agent', 'agent', 'agent', '   baranggay2  ', 9087654345, 'on'),
(138, 'Jane', 'jane', 'agent', 'jane', 'jane', '    Brgy. Jane  ', 9087654345, 'on'),
(139, 'Joemarie D. Grecia', 'Joms', 'admin', 'joms', 'joms', '   Barangay One  ', 2345678, 'on');

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
  ADD KEY `farmID` (`farmID`);

--
-- Indexes for table `broiler`
--
ALTER TABLE `broiler`
  ADD PRIMARY KEY (`broilerID`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `userID` (`userID`);

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
  ADD KEY `batchID` (`batchID`),
  ADD KEY `userID` (`userID`);

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
  MODIFY `baranggayID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `broiler`
--
ALTER TABLE `broiler`
  MODIFY `broilerID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farmID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `layer`
--
ALTER TABLE `layer`
  MODIFY `layerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`farmID`) REFERENCES `farm` (`farmID`);

--
-- Constraints for table `broiler`
--
ALTER TABLE `broiler`
  ADD CONSTRAINT `broiler_ibfk_1` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`),
  ADD CONSTRAINT `broiler_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `farm`
--
ALTER TABLE `farm`
  ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`baranggayID`) REFERENCES `baranggay` (`baranggayID`);

--
-- Constraints for table `layer`
--
ALTER TABLE `layer`
  ADD CONSTRAINT `layer_ibfk_1` FOREIGN KEY (`batchID`) REFERENCES `batch` (`batchID`),
  ADD CONSTRAINT `layer_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

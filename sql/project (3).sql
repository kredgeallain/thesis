-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 04:49 PM
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
(1, 'Barangay One'),
(2, 'Barangay Two'),
(25, 'Barangay Three'),
(28, 'barangay four'),
(29, 'barangay five'),
(30, 'Cabano');

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
  `initial` int(21) NOT NULL,
  `status` varchar(21) NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchID`, `farmID`, `batch`, `unit`, `date`, `initial`, `status`) VALUES
(118, 100, 'Batch4', 'layer', '2023-03-27', 1000, 'on'),
(119, 100, 'Batch 1', 'broiler', '2023-03-28', 1000, 'off'),
(120, 100, 'Batch2', 'layer', '2023-03-28', 1000, 'on'),
(121, 100, 'Batch2', 'broiler', '2023-03-29', 1000, 'on'),
(122, 101, 'Batch1', 'layer', '2023-04-11', 1000, 'on'),
(123, 102, 'batch1', 'layer', '2023-04-10', 1000, 'on'),
(124, 100, 'Batch 1', 'layer', '2023-04-11', 1000000, 'on'),
(125, 104, 'Batch1', 'layer', '2023-04-11', 100, 'off'),
(126, 104, 'Batch1', 'broiler', '2023-04-11', 1000, 'off');

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
  `reject` int(21) NOT NULL,
  `mortality` int(21) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broiler`
--

INSERT INTO `broiler` (`broilerID`, `batchID`, `userID`, `broiler_weight`, `Bcurrent`, `reject`, `mortality`, `date`) VALUES
(4, 119, 146, 1000, 1000, 0, 100, '2023-03-28'),
(5, 126, 148, 1500, 1500, 1000, 1000, '2023-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farmID` int(21) NOT NULL,
  `baranggayID` int(21) NOT NULL,
  `farmname` varchar(21) NOT NULL,
  `farm_size` int(21) NOT NULL,
  `no_farmers` int(21) NOT NULL,
  `farmowner` varchar(21) NOT NULL,
  `address` varchar(21) DEFAULT NULL,
  `exp` int(21) NOT NULL,
  `contactno` int(21) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farmID`, `baranggayID`, `farmname`, `farm_size`, `no_farmers`, `farmowner`, `address`, `exp`, `contactno`, `lat`, `lng`) VALUES
(100, 1, 'Farm One', 100, 2, 'Joms Dela Cruz Grecia', 'Iloilo City', 10, 987654, '10.58758386', '122.68569137'),
(101, 2, 'Where is Farm', 3456, 2, 'asdfcvb', 'Iloilo City', 12, 3456, '10.72950327', '122.54313722'),
(102, 29, 'Farm Jom', 1000, 10, 'JomJom Grecia', 'Iloilo City', 10, 956533431, '10.58189001', '122.69714115'),
(103, 1, 'HiveFarm', 10000, 10, 'Hive Bee', 'Iloilo City', 20, 98765123, '10.59356625', '122.68964279'),
(104, 30, 'Jamille Farm', 10000, 0, 'Joyce Jamille', 'Iloilo City', 1, 2147483647, '10.59235829', '122.69089509');

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
  `mortality` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `f_date` date NOT NULL DEFAULT current_timestamp(),
  `t_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layer`
--

INSERT INTO `layer` (`layerID`, `batchID`, `userID`, `no_eggs`, `reject_eggs`, `mortality`, `date`, `f_date`, `t_date`) VALUES
(10, 118, 146, 1000, 12, 0, '2023-03-27', '2023-04-18', '2023-04-18'),
(11, 118, 146, 100, 1, 20, '2023-03-28', '2023-04-18', '2023-04-18'),
(12, 118, 146, 1000, 23, 100, '2023-03-28', '2023-04-18', '2023-04-18'),
(13, 118, 146, 1000, 10, 100, '2023-03-28', '2023-04-18', '2023-04-18'),
(14, 118, 146, 100, 10, 80, '2023-03-29', '2023-04-18', '2023-04-18'),
(16, 118, 146, 100, 10, 500, '2023-03-29', '2023-04-18', '2023-04-18'),
(17, 120, 146, 1000, 10, 100, '2023-04-03', '2023-04-18', '2023-04-18'),
(18, 118, 146, 12121, 1, 0, '2023-04-03', '2023-04-18', '2023-04-18'),
(20, 125, 148, 200, 10, 5, '2023-04-11', '2023-04-18', '2023-04-18'),
(21, 125, 148, 100, 1, 95, '2023-04-11', '2023-04-18', '2023-04-18'),
(22, 118, 146, 1000, 10, 20, '2023-04-18', '2023-04-18', '2023-04-18'),
(23, 118, 146, 10000, 100, 80, '2023-04-18', '2023-04-18', '2023-04-18'),
(24, 118, 146, 1000, 10, 10, '2023-04-18', '2023-04-18', '2023-04-18'),
(25, 118, 146, 10000, 1000, 1, '2023-04-18', '2023-04-16', '2023-04-17'),
(26, 118, 146, 10000, 1000, 1, '2023-04-18', '2023-04-16', '2023-04-17'),
(27, 118, 146, 1000, 10, 1, '2023-04-18', '2023-04-01', '2023-04-20');

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
  `baranggay` varchar(21) NOT NULL,
  `mobile_no` varchar(21) NOT NULL,
  `status` varchar(21) NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `position`, `password`, `baranggay`, `mobile_no`, `status`) VALUES
(145, 'Administrator', 'admin', 'admin', '$2y$10$3DZWWWWc.zOA9IFv4F9z1uERvEcTvt8enxbUmonGV6SINkSC5giKi', 'Barangay Juan', '345678', 'on'),
(146, 'Agent', 'agent', 'agent', '$2y$10$RUxzvCE6BSC/I.fu0Jp45uyGY8wBiNi0S8qMchyhZZc6.vwi1IF0q', 'Barangay One  ', '98765789', 'on'),
(147, 'Joemarie D. Grecia', 'joms', 'admin', '$2y$10$IFiTurX.a3DpTL3aDeSWbuJvDxXR/rTbE0S0mYYp6rrZfq0pGBi3e', '   Barangay One  ', '98768', 'on'),
(148, 'Kenn Mark Evangelista', 'agent1', 'agent', '$2y$10$62rDCwYD9D7/PnjWIyVTiOirow5AY4kBjr2t83fF5u5cCKFwuQ4uW', '', '9124231094', 'on'),
(149, 'Joemarie Grecia', 'agent2', 'agent', '$2y$10$2Hkfx2qX5GPPp9d07Km.Xed3Pa.qPoX2Mi.cw0xGgRVcrDg/6usQK', '', '9123456789', 'on'),
(150, 'Kenn Mark Evangelista', 'admin1', 'admin', '$2y$10$f0nNY6jlcPgvixKK7kZJ6exDMqqRo1Y7MOLohEi5frAWmb2V90yeG', '', '912345672', 'on');

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
  MODIFY `baranggayID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `broiler`
--
ALTER TABLE `broiler`
  MODIFY `broilerID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farmID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `layer`
--
ALTER TABLE `layer`
  MODIFY `layerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

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

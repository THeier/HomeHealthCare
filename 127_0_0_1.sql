-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 11:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `26pw-p2-taniaheier`
--
CREATE DATABASE IF NOT EXISTS `26pw-p2-taniaheier` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `26pw-p2-taniaheier`;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `disabled` bit(1) NOT NULL DEFAULT b'0',
  `deceasedDate` date DEFAULT NULL,
  `begDate` date NOT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientaddress`
--

CREATE TABLE `patientaddress` (
  `addressID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `Number` varchar(50) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientmed`
--

CREATE TABLE `patientmed` (
  `medID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `drug` varchar(100) NOT NULL,
  `quantity` int(1) DEFAULT NULL,
  `timesPerDay` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fName` varchar(55) NOT NULL,
  `lName` varchar(55) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `begDate` date NOT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userbio`
--

CREATE TABLE `userbio` (
  `userBioID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `begDate` datetime NOT NULL,
  `userBio` varchar(500) NOT NULL,
  `referralMode` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `patientaddress`
--
ALTER TABLE `patientaddress`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `patientmed`
--
ALTER TABLE `patientmed`
  ADD PRIMARY KEY (`medID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userbio`
--
ALTER TABLE `userbio`
  ADD PRIMARY KEY (`userBioID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientaddress`
--
ALTER TABLE `patientaddress`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientmed`
--
ALTER TABLE `patientmed`
  MODIFY `medID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userbio`
--
ALTER TABLE `userbio`
  MODIFY `userBioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patientaddress`
--
ALTER TABLE `patientaddress`
  ADD CONSTRAINT `patientaddress_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patientmed`
--
ALTER TABLE `patientmed`
  ADD CONSTRAINT `patientmed_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userbio`
--
ALTER TABLE `userbio`
  ADD CONSTRAINT `userbio_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

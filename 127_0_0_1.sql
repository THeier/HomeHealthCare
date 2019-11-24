-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 01:26 AM
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
  `sex` varchar(1) NOT NULL,
  `begDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `disabled` varchar(3) DEFAULT NULL,
  `dcsDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `userID`, `fName`, `lName`, `dob`, `sex`, `begDate`, `endDate`, `disabled`, `dcsDate`) VALUES
(1, 1, 'Edward', 'Jones', '1939-09-01', 'M', '2019-10-02', '0000-00-00', 'No', NULL),
(2, 1, 'Ethel', 'Howard', '1930-01-02', 'F', '2019-08-01', '0000-00-00', 'No', NULL),
(3, 1, 'Nancy', 'Smith', '1937-10-01', 'F', '2019-10-02', '0000-00-00', 'No', NULL),
(4, 1, 'Ethel', 'Maynard', '1930-11-06', 'F', '2019-07-01', '0000-00-00', 'No', NULL),
(9, 4, 'Jim', 'Shorts', '1930-12-05', 'M', '0001-01-01', '0000-00-00', 'No', NULL),
(10, 4, 'Heather', 'Jones', '1940-11-15', 'F', '0001-01-01', '0000-00-00', 'No', NULL),
(13, 4, 'Gayle', 'Smith', '1945-03-15', 'M', '0001-01-01', '0000-00-00', 'Yes', NULL),
(15, 4, 'Lisa', 'Ling', '1920-02-16', 'F', '0001-01-01', '0000-00-00', 'Yes', NULL),
(20, 1, 'Tania', 'Heier', '1934-12-13', 'M', '0001-01-01', '0000-00-00', 'No', NULL),
(24, 1, 'Mark', 'Hart', '1933-01-01', 'M', '0001-01-01', '0000-00-00', 'Yes', NULL),
(25, 4, 'Jason', 'Homes', '1920-10-11', 'M', '0001-01-01', '0000-00-00', 'Yes', NULL),
(32, 8, 'Holly', 'Wood', '1933-01-14', 'F', '0001-01-01', '0000-00-00', 'No', NULL),
(34, 1, 'Joe', 'Harmond', '1950-11-12', 'M', '0001-01-01', '0000-00-00', 'Yes', NULL),
(35, 1, 'Logan', 'More', '1943-11-12', 'F', '0001-01-01', '0000-00-00', 'No', NULL),
(36, 14, 'Jerry', 'Garcia', '1930-10-12', '', '0001-01-01', '0000-00-00', 'Yes', NULL),
(38, 4, 'Tania', 'Hall', '1930-10-10', '', '0001-01-01', '0000-00-00', 'No', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patientaddress`
--

CREATE TABLE `patientaddress` (
  `addressID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `begDate` date NOT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientaddress`
--

INSERT INTO `patientaddress` (`addressID`, `patientID`, `number`, `street`, `city`, `state`, `zip`, `email`, `begDate`, `endDate`) VALUES
(1, 9, '250', 'G Street', 'Lincoln ', 'NE', 68509, NULL, '0000-00-00', NULL);

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

--
-- Dumping data for table `patientmed`
--

INSERT INTO `patientmed` (`medID`, `patientID`, `drug`, `quantity`, `timesPerDay`) VALUES
(1, 1, 'Baby Aspirin', 1, 1);

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
  `userType` varchar(100) NOT NULL,
  `begDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `filePath` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fName`, `lName`, `userName`, `password`, `userType`, `begDate`, `endDate`, `filePath`) VALUES
(1, 'Joe', 'Jones', 'joe@abc.com', 'pass', 'cna', '2019-10-14', NULL, 'images/default avatar.jpg'),
(4, 'jane', 'doe', 'janedoe@abc.com', 'pass', 'pas', '2019-10-14', NULL, 'images/default avatar.jpg'),
(8, 'Tania', 'Heier', 'theier@abc.com', 'pass', 'cma', '2019-10-14', NULL, 'images/default avatar.jpg'),
(13, 'jim', 'jim', 'jim@abc.com', 'pass', 'cma', '2019-10-21', NULL, 'images/default avatar.jpg'),
(14, 'Tania', 'Heier', 'joe1@abc.com', 'pass', 'cna', '2019-11-23', NULL, 'images/default avatar.jpg');

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
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `patientaddress`
--
ALTER TABLE `patientaddress`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `patientaddress_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

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

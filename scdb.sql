-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 04:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomimages`
--

CREATE TABLE `accomimages` (
  `imageID` int(11) NOT NULL,
  `imageURL` varchar(200) DEFAULT NULL,
  `acID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `acID` int(11) NOT NULL,
  `acname` varchar(25) DEFAULT NULL,
  `lat` varchar(25) DEFAULT NULL,
  `lang` varchar(25) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `attracID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attracimages`
--

CREATE TABLE `attracimages` (
  `imageID` int(11) NOT NULL,
  `imageURL` varchar(200) DEFAULT NULL,
  `attracID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `attracID` int(11) NOT NULL,
  `atname` varchar(50) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `toilet` varchar(25) DEFAULT NULL,
  `threeGfourG` varchar(25) DEFAULT NULL,
  `unseen` varchar(25) DEFAULT NULL,
  `traveladvice` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `security` varchar(25) DEFAULT NULL,
  `facilitiesfordisabled` varchar(25) DEFAULT NULL,
  `advicefordisabled` varchar(200) DEFAULT NULL,
  `wifi` varchar(25) DEFAULT NULL,
  `history` varchar(500) DEFAULT NULL,
  `tourdesk` varchar(25) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `festival` varchar(25) DEFAULT NULL,
  `variousnature` varchar(25) DEFAULT NULL,
  `replacein` varchar(25) DEFAULT NULL,
  `replaceout` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resimages`
--

CREATE TABLE `resimages` (
  `imageID` int(11) NOT NULL,
  `imageURL` varchar(200) DEFAULT NULL,
  `resID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `resID` int(11) NOT NULL,
  `resname` varchar(25) DEFAULT NULL,
  `lat` varchar(25) DEFAULT NULL,
  `lng` varchar(25) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `attracID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `revID` int(11) NOT NULL,
  `topic` varchar(25) DEFAULT NULL,
  `reviewdes` varchar(300) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `attracID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `souvenir`
--

CREATE TABLE `souvenir` (
  `servID` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `adress` varchar(200) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `lat` varchar(25) DEFAULT NULL,
  `lng` varchar(25) DEFAULT NULL,
  `attracID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `image` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomimages`
--
ALTER TABLE `accomimages`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `acID` (`acID`);

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`acID`),
  ADD KEY `attracID` (`attracID`);

--
-- Indexes for table `attracimages`
--
ALTER TABLE `attracimages`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `attracID` (`attracID`);

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`attracID`);

--
-- Indexes for table `resimages`
--
ALTER TABLE `resimages`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `resID` (`resID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`resID`),
  ADD KEY `attracID` (`attracID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`revID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `attracID` (`attracID`);

--
-- Indexes for table `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`servID`),
  ADD KEY `attracID` (`attracID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomimages`
--
ALTER TABLE `accomimages`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `acID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attracimages`
--
ALTER TABLE `attracimages`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `attracID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resimages`
--
ALTER TABLE `resimages`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `revID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `souvenir`
--
ALTER TABLE `souvenir`
  MODIFY `servID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomimages`
--
ALTER TABLE `accomimages`
  ADD CONSTRAINT `accomimages_ibfk_1` FOREIGN KEY (`acID`) REFERENCES `accommodation` (`acID`);

--
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`attracID`) REFERENCES `attractions` (`attracID`);

--
-- Constraints for table `attracimages`
--
ALTER TABLE `attracimages`
  ADD CONSTRAINT `attracimages_ibfk_1` FOREIGN KEY (`attracID`) REFERENCES `attractions` (`attracID`);

--
-- Constraints for table `resimages`
--
ALTER TABLE `resimages`
  ADD CONSTRAINT `resimages_ibfk_1` FOREIGN KEY (`resID`) REFERENCES `restaurant` (`resID`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`attracID`) REFERENCES `attractions` (`attracID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`attracID`) REFERENCES `attractions` (`attracID`);

--
-- Constraints for table `souvenir`
--
ALTER TABLE `souvenir`
  ADD CONSTRAINT `souvenir_ibfk_1` FOREIGN KEY (`attracID`) REFERENCES `attractions` (`attracID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

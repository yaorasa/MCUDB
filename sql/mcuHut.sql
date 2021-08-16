-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2021 at 02:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MCU`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcuHut`
--

CREATE TABLE `mcuHut` (
  `hutname` varchar(100) NOT NULL,
  `hutotherName` varchar(100) DEFAULT NULL,
  `gasBottle` varchar(100) DEFAULT NULL,
  `gasBottle2` varchar(100) DEFAULT NULL,
  `sleepingBag` varchar(100) DEFAULT NULL,
  `sbAmount` varchar(100) DEFAULT NULL,
  `needWash` varchar(100) DEFAULT NULL,
  `howManyNeed` varchar(100) DEFAULT NULL,
  `spareBox` varchar(100) DEFAULT NULL,
  `whatNeed` varchar(100) DEFAULT NULL,
  `gearBehind` varchar(100) DEFAULT NULL,
  `listGear` varchar(100) DEFAULT NULL,
  `flyOut` varchar(100) DEFAULT NULL,
  `listFlyOut` varchar(100) DEFAULT NULL,
  `needAnything` varchar(100) DEFAULT NULL,
  `needList` varchar(100) DEFAULT NULL,
  `needOther` varchar(100) DEFAULT NULL,
  `kitchenItem` varchar(100) DEFAULT NULL,
  `otherKitchen` varchar(100) NOT NULL,
  `foodItem` varchar(100) DEFAULT NULL,
  `otherFood` varchar(100) DEFAULT NULL,
  `fireWood` varchar(100) DEFAULT NULL,
  `listfire` varchar(100) DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `datereported` varchar(100) DEFAULT NULL,
  `volName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcuHut`
--
ALTER TABLE `mcuHut`
  ADD PRIMARY KEY (`hutname`),
  ADD UNIQUE KEY `hutname` (`hutname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

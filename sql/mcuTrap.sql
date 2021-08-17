-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2021 at 11:07 AM
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
-- Table structure for table `mcuTrap`
--

CREATE TABLE `mcuTrap` (
  `area` varchar(55) DEFAULT NULL,
  `line` varchar(55) DEFAULT NULL,
  `code` varchar(55) NOT NULL,
  `boxLength` varchar(200) DEFAULT NULL,
  `entrance` varchar(100) DEFAULT NULL,
  `meshType` varchar(200) DEFAULT NULL,
  `slideOut` varchar(100) DEFAULT NULL,
  `end` varchar(100) DEFAULT NULL,
  `internalBaffle` varchar(200) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `design` varchar(200) DEFAULT NULL,
  `lidSecurity` varchar(200) DEFAULT NULL,
  `rebar` varchar(100) DEFAULT NULL,
  `pinkTri` varchar(100) DEFAULT NULL,
  `boxCondi` varchar(55) DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `photo` varchar(2000) DEFAULT NULL,
  `datereported` varchar(100) DEFAULT NULL,
  `volName` varchar(100) DEFAULT NULL,
  `rebar1Need` varchar(100) DEFAULT NULL,
  `rebar2Need` varchar(100) DEFAULT NULL,
  `relevelNeed` varchar(100) DEFAULT NULL,
  `relocationNeed` varchar(100) DEFAULT NULL,
  `newlidNeed` varchar(100) DEFAULT NULL,
  `pinkTriNeed` varchar(100) DEFAULT NULL,
  `marketPole` varchar(100) DEFAULT NULL,
  `calibrate` varchar(100) DEFAULT NULL,
  `notesM` varchar(100) DEFAULT NULL,
  `dateMaintain` varchar(100) DEFAULT NULL,
  `trapperName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcuTrap`
--
ALTER TABLE `mcuTrap`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `code` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

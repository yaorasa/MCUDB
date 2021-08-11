-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2021 at 01:36 AM
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
-- Table structure for table `trapInventory`
--

CREATE TABLE `trapInventory` (
  `area` varchar(55) NOT NULL,
  `line` varchar(55) NOT NULL,
  `code` varchar(55) NOT NULL,
  `boxLength` varchar(100) DEFAULT NULL,
  `entrance` varchar(55) DEFAULT NULL,
  `end` varchar(55) DEFAULT NULL,
  `internalBaffle` varchar(55) DEFAULT NULL,
  `killTrap` varchar(55) DEFAULT NULL,
  `lidSecurity` varchar(55) DEFAULT NULL,
  `rebar` varchar(55) DEFAULT NULL,
  `pinkTri` varchar(55) DEFAULT NULL,
  `boxCondi` varchar(55) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `datereported` varchar(50) DEFAULT NULL,
  `maintain` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trapInventory`
--
ALTER TABLE `trapInventory`
  ADD PRIMARY KEY (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

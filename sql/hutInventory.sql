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
-- Table structure for table `hutInventory`
--

CREATE TABLE `hutInventory` (
  `hut_name` varchar(100) NOT NULL,
  `gasBottle` varchar(55) DEFAULT NULL,
  `sleepingBag` varchar(55) DEFAULT NULL,
  `needWash` varchar(55) DEFAULT NULL,
  `howManyNeed` varchar(200) DEFAULT NULL,
  `spareBox` varchar(55) DEFAULT NULL,
  `whatNeed` varchar(55) DEFAULT NULL,
  `gearBehind` varchar(55) DEFAULT NULL,
  `listGear` varchar(200) DEFAULT NULL,
  `flyOut` varchar(55) DEFAULT NULL,
  `listFlyOut` varchar(200) DEFAULT NULL,
  `needAnything` varchar(55) DEFAULT NULL,
  `needList` varchar(200) DEFAULT NULL,
  `firewood` varchar(55) DEFAULT NULL,
  `listfire` varchar(200) DEFAULT NULL,
  `photo` varchar(2000) DEFAULT NULL,
  `note` varchar(55) DEFAULT NULL,
  `datereported` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutInventory`
--

INSERT INTO `hutInventory` (`hut_name`, `gasBottle`, `sleepingBag`, `needWash`, `howManyNeed`, `spareBox`, `whatNeed`, `gearBehind`, `listGear`, `flyOut`, `listFlyOut`, `needAnything`, `needList`, `firewood`, `listfire`, `photo`, `note`, `datereported`) VALUES
('Hut01', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Axe', 'Yes', 'Axe', 'Yes', 'Gumboots, ZombiePowder', 'Yes', 'Firewood', 'https://drive.google.com/open?id=1N5ec8lDZjIbiE8l5ZeNfoLig6-bF-7-q', '1-Aug', ''),
('Hut02', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers', 'No', ' ', 'No', ' ', 'No', ' ', 'No', ' ', 'https://drive.google.com/open?id=11zAfn7wASeNNWHV7Lay6oXiCzVi2IFey', '3-Aug', ''),
('Hut03', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Axe', 'Yes', 'Axe', 'Yes', 'Gumboots, ZombiePowder', 'Yes', 'Firewood', 'https://drive.google.com/open?id=1N5ec8lDZjIbiE8l5ZeNfoLig6-bF-7-q', '1-Aug', ''),
('Hut04', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Saw', 'Yes', 'Something', 'No', ' ', 'No', ' ', 'https://drive.google.com/open?id=1jaqGtLjQhGpuACXf1BA5LoCPXPR4zya2', '', ''),
('Hut05', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Axe', 'Yes', 'Axe', 'Yes', 'Gumboots, ZombiePowder', 'Yes', 'Firewood', 'https://drive.google.com/open?id=1N5ec8lDZjIbiE8l5ZeNfoLig6-bF-7-q', '2-Aug', ''),
('Hut06', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers', 'No', ' ', 'No', ' ', 'No', ' ', 'No', ' ', 'https://drive.google.com/open?id=11zAfn7wASeNNWHV7Lay6oXiCzVi2IFey', '4-Aug', ''),
('Hut07', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Saw', 'Yes', 'Something', 'No', ' ', 'No', ' ', 'https://drive.google.com/open?id=1jaqGtLjQhGpuACXf1BA5LoCPXPR4zya2', '', ''),
('Hut08', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Axe', 'Yes', 'Axe', 'Yes', 'Gumboots, ZombiePowder', 'Yes', 'Firewood', 'https://drive.google.com/open?id=1N5ec8lDZjIbiE8l5ZeNfoLig6-bF-7-q', '2-Aug', ''),
('Hut09', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers', 'No', ' ', 'No', ' ', 'No', ' ', 'No', ' ', 'https://drive.google.com/open?id=11zAfn7wASeNNWHV7Lay6oXiCzVi2IFey', '4-Aug', ''),
('Hut10', 'untitled', 'untitled', 'Yes', 'untitled', 'Yes', 'Pliers, ZombieBath', 'Yes', 'Saw', 'Yes', 'Something', 'No', ' ', 'No', ' ', 'https://drive.google.com/open?id=1jaqGtLjQhGpuACXf1BA5LoCPXPR4zya2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hutInventory`
--
ALTER TABLE `hutInventory`
  ADD PRIMARY KEY (`hut_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

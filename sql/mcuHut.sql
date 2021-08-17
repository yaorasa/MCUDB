-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2021 at 11:08 AM
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
  `gasBottle` varchar(100) DEFAULT NULL,
  `gasBottle2` varchar(100) DEFAULT NULL,
  `sleepingBag` varchar(100) DEFAULT NULL,
  `sbAmount` varchar(100) DEFAULT NULL,
  `needWash` varchar(100) DEFAULT NULL,
  `howManyNeed` varchar(1000) DEFAULT NULL,
  `spareBox` varchar(1000) DEFAULT NULL,
  `whatNeed` varchar(1000) DEFAULT NULL,
  `gearBehind` varchar(100) DEFAULT NULL,
  `listGear` varchar(1000) DEFAULT NULL,
  `flyOut` varchar(100) DEFAULT NULL,
  `listFlyOut` varchar(1000) DEFAULT NULL,
  `needAnything` varchar(100) DEFAULT NULL,
  `needList` varchar(1000) DEFAULT NULL,
  `needOther` varchar(100) DEFAULT NULL,
  `kitchenItem` varchar(1000) DEFAULT NULL,
  `otherKitchen` varchar(1000) DEFAULT NULL,
  `foodItem` varchar(1000) DEFAULT NULL,
  `otherFood` varchar(1000) DEFAULT NULL,
  `fireWood` varchar(100) DEFAULT NULL,
  `listfire` varchar(1000) DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `datereported` varchar(100) DEFAULT NULL,
  `volName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcuHut`
--

INSERT INTO `mcuHut` (`hutname`, `gasBottle`, `gasBottle2`, `sleepingBag`, `sbAmount`, `needWash`, `howManyNeed`, `spareBox`, `whatNeed`, `gearBehind`, `listGear`, `flyOut`, `listFlyOut`, `needAnything`, `needList`, `needOther`, `kitchenItem`, `otherKitchen`, `foodItem`, `otherFood`, `fireWood`, `listfire`, `note`, `photo`, `datereported`, `volName`) VALUES
('aurora_point_hut', 'one_quarter', 'full', 'two', '', '', '', 'list', '8mm_spanner sponge scourer', '', '', 'no', '', 'yes', 'kitchen_items', '', 'tea_towel', '', '', '', 'no', '', '', '', 'Sat Dec 10 00:00:00 UTC 2016', 'joel'),
('chester_burn_hut', 'three_quarters', 'none', 'two', '', '', '', 'no', '', '', '', 'no', '', 'yes', 'toilet_paper kitchen_items', '', 'Cupsx2 sharp_knife butter_knife forks spoons tea_towel cloth', '', '', '', 'no', '', '', '', 'Tue Jan 12 00:00:00 UTC 2016', 'norm'),
('Dunedin', 'half', 'full', 'two', '', '', '', 'no', '', '', '', 'no', '', 'no', '', '', '', '', '', '', 'firewood', '', '', '', 'Sat Apr 01 00:00:00 UTC 2018', 'Rasa'),
('HowdenHut', 'Half', 'Full', 'Two', ' ', 'Yes', 'Two', 'Yes', 'Ratchet, 8mmRatchetnut, Scrapper, Scourer, Sponge, Hammer, PinkTriangles, Nails, LidScrews, Pencil, PackingTape, Staples, TrappingGloves', 'Yes', 'Hhhhhh', 'Yes', 'Ggvggv', 'Yes', 'Gumboots, ZombiePowder, Spade, Baitstation, RatBait, ToiletPaper, ChillyBin, ZombieFootBath, Damprid, HandSanitiserRefill, KitchenItems, FoodItems, Other', 'Dydffd', 'CampOven, Billy, FishSlice, CheeseGrater, CupsX2, PlatesX2, BowlsX2, SharpKnife, ButterKnife, Forks, Spoons, TeaTowels, Cloth, DishBrush, DishwahingLiquid, CoffeePlunger, Other', 'Jjhgc', 'CookinngOil, Salt, Pepper, Sugar, EmergencyFood, Tea, Other', 'Okjhhgff', 'Yes', 'Axe, Firewood, NoFireInHut', 'Hgvvcc', 'https://drive.google.com/open?id=1T9PTF8r-efFufNJJ3dSEI6B2YGHx1O30', '15/08/21', 'Ojhgff'),
('jennings_biv', 'three_quarters', 'none', 'two', '', '', '', 'no', '', '', '', 'yes', '', 'no', '', '', '', '', '', '', 'no_fire', '', '', '', 'Sat Apr 08 00:00:00 UTC 2017', 'Steven fortune'),
('log_cabin', 'three_quarters', 'full', 'two', '', '', '', 'yes', '', '', 'packing_tape', 'yes', '', 'yes', 'toilet_paper other', 'Candles, permanent marker', '', '', '', '', 'no_fire', '', '', '', 'Wed Jan 25 00:00:00 UTC 2017', 'Jeff'),
('mckenzie_villa', 'three_quarters', 'full', 'one', '', '', '', 'yes', '', '', 'ratchett 8mm_ratchet_nut 8mm_spanner scrapper sponge scourer hammer nails lid_screws pencil packing_tape', 'no', '', 'yes', 'food_items', '', '', '', 'tea_bags', '', 'firewood', '', '', '', 'Sun Apr 02 00:00:00 UTC 2017', 'Chris'),
('mid_chester_hut', 'half', 'full', 'two', '', '', '', 'no', '', '', '', 'no', '', 'no', '', '', '', '', '', '', 'firewood', '', '', '', 'Sat Apr 01 00:00:00 UTC 2017', 'Braxton'),
('mystery_biv', 'three_quarters', 'full', 'three', '', '', '', 'yes', '', '', 'ratchett 8mm_ratchet_nut 8mm_spanner scrapper sponge scourer nails lid_screws pencil', 'yes', '', 'no', '', '', '', '', '', '', 'no_fire', '', '', '', 'Sat Mar 04 00:00:00 UTC 2017', 'James'),
('plateau_creek_hut', 'full', 'three_quarters', 'two', '', '', '', 'no', '', '', '', 'yes', '', 'no', '', '', '', '', '', '', 'no', '', '', '', 'Sat Jan 21 00:00:00 UTC 2017', 'Christopher Greenan'),
('pointburn_biv', 'full', 'full', 'two replacments', 'one', '', '', 'no', '', '', '', 'other', 'manky sleeping bag. empty fuel bottle and box of rubbish.', 'yes', 'kitchen_items', '', 'other', 'some kind of general spray cleaning stuff for surfaces.', '', '', 'no_fire', '', '', 'https://murchisonstoat.appspot.com/view/binaryData?blobKey=hut_info_form%5B%40version%3Dnull+and+%40uiVersion%3Dnull%5D%2Fhut_info_form%5B%40key%3Duuid%3Ade0f77f3-2152-4aa2-a1a1-f9666cb376cf%5D%2Fimage', 'Sat Mar 04 00:00:00 UTC 2017', 'james'),
('snag_hut', 'one_quarter', 'full', 'two', '', '', '', 'list', 'scourer pink_triangles nails lid_screws pencil packing_tape', '', '', 'other', 'Rubbish', 'no', '', '', '', '', '', '', 'firewood', '', '', 'https://murchisonstoat.appspot.com/view/binaryData?blobKey=hut_info_form%5B%40version%3Dnull+and+%40uiVersion%3Dnull%5D%2Fhut_info_form%5B%40key%3Duuid%3A42e12d1d-03b4-4288-907b-f7ffba3aadd0%5D%2Fimage', 'Mon Mar 20 00:00:00 UTC 2017', 'Steven fortune'),
('takahe_valley_hut', 'three_quarters', 'full', 'two', '', '', '', 'yes', '', '', 'packing_tape', 'yes', '', 'yes', 'other', 'Has 3rd gas bottle FULL', '', '', '', '', 'no', '', '', '', 'Sat Mar 04 00:00:00 UTC 2017', 'Jeff'),
('tentcamp_biv', 'half', 'full', 'two', '', '', '', 'list', 'ratchett 8mm_ratchet_nut sponge scourer pencil', '', '', 'yes', '', 'yes', 'pindone kitchen_items', '', 'other', 'Can opener', '', '', 'no_fire', '', '', '', 'Sun Mar 12 00:00:00 UTC 2017', 'Chris B'),
('te_au_hut', 'half', 'full', 'one', '', '', '', 'no', '', '', '', 'no', '', 'yes', 'toilet_paper', '', '', '', '', '', 'firewood', '', '', '', 'Thu Mar 30 00:00:00 UTC 2017', 'Chris'),
('top_ettrick_hut', 'three_quarters', 'full', 'two', '', '', '', 'no', '', '', '', 'yes', '', 'yes', 'gumboots kitchen_items food_items other', 'Candles', 'forks spoons other', 'Tin opener', '', '', 'firewood', '', '', '', 'Wed Jan 25 00:00:00 UTC 2017', 'Jeff'),
('waterfall_biv', 'one_quarter', 'full', 'two', '', '', '', 'list', 'scrapper hammer', '', '', 'yes', '', 'no', '', '', '', '', '', '', 'no_fire', '', '', '', 'Sat Apr 01 00:00:00 UTC 2017', 'Braxton'),
('wisely_hut', 'half', 'full', 'two', '', '', '', 'list', 'scrapper', '', '', 'yes', '', 'yes', 'food_items', '', '', '', 'emergency_food', '', 'no_fire', '', '', '', 'Mon Mar 20 00:00:00 UTC 2017', 'braxton'),
('woodrow_biv', 'full', 'empty', 'one', '', '', '', 'list', 'ratchett 8mm_ratchet_nut 8mm_spanner sponge scourer hammer pink_triangles nails packing_tape', '', '', 'yes', '', 'yes', 'other', 'Spade', '', '', '', '', 'no_fire', '', '', '', 'Wed Apr 05 00:00:00 UTC 2017', 'Steve F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcuHut`
--
ALTER TABLE `mcuHut`
  ADD PRIMARY KEY (`hutname`),
  ADD UNIQUE KEY `hutname` (`hutname`),
  ADD UNIQUE KEY `hutname_2` (`hutname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

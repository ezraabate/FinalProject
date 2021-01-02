-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 02, 2021 at 09:54 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `Account_id` int(11) NOT NULL AUTO_INCREMENT,
  `Account_username` varchar(255) NOT NULL,
  `Account_password` varchar(60) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_id`, `Account_username`, `Account_password`, `Status`) VALUES
(1, 'retailer', '$2y$10$8Vwh6849DZKF0nOS7HGoBOAc7cBIi0sbVOeMyBjlEeVEgW3OM4WC2', 1),
(2, 'Wholesaler', '$2y$10$0MCmrVonZoZfZ7FqJmcRcu3hD0B7Q4E2ZOR.rHKQjpGB94xEkv4d.', 1),
(3, 'Administrator', '$2y$10$gE6/5HQPY4E0Mpd10SIO9eOsX0Dcs6xucEzp1q3syzpYQOwxvbiMe', 1),
(4, 'Ezra', '$2y$10$C9XiI0XDynF8rbbFeGlbKO0zfyNkssU1tlIuyA/ViEe3MQTbrEYzm', 1),
(5, 'Ezraabate', '$2y$10$.idAw5nK/1lUd/K2/4/xfek302WGiXZ7ban/PCM5sxqnqBGc/GpsW', 1),
(6, 'Aman', '$2y$10$IlOdAC7Kw5odepcaYCKwdOFZcHoeFzTpVrD1HubcnolO7irDta.CW', 1),
(7, 'Wholesaler2', '$2y$10$neRSkvOPQPKQG2IidnBA7uXmwU8Lz/iVCQEfFmUQkl/Cjh4D2.jlK', 1),
(8, 'retailer2', '$2y$10$EwY.wcLdm5WGwa17pbDVUeoe5tSGp08i9ETuNF4ddx6.PAIcprtIS', 1),
(9, 'retailer3', '$2y$10$63EDLBUEU1RTfSWkVXw3QetyjVZd3FaMI3jo9au82Bhj7sMOnc9lm', 1),
(10, 'Wholesalernew', '$2y$10$4JjIHDaf6XPeY6FvrILFF.4SwZ4p5H2bbxg8wzE7lBDCRPTrRq2H2', 1),
(11, 'AAAAAA', '$2y$10$HI/.ICq.DsFFvLGwky/1tOh73gTCcjajzOzVWnoElnjS9AmwBFfTW', 1),
(12, 'AAAY', '$2y$10$5XubU0c/Y/5BYgedpXyW5elwjS6E57fZFemPNEHlF39EDU4tqMUUW', 1),
(13, 'BBBBEEE', '$2y$10$n3du5zGDIe4zPj7UBKWAVe.s2Lm66.WyxBGDXuYIwapmMVnLhbPQm', 1),
(14, 'mop', '$2y$10$urZnLdoumFuR/KEMHgmBJeLBonDDs4PKSCwgw1/qJ4fdIkZDe49HK', 1),
(15, 'poppp', '$2y$10$AidC8l6Y1/kcebs1iXlP/.DDuaXE4PrUAjII/JdGUpicQ79LODGsO', 1),
(16, 'Daniadmin', '$2y$10$WnTAm25PCd4U.UnMR5.0BOCvPOU.PVNyB4dp2TWrdbIlBBbnYqr3q', 1),
(17, 'Amanadmin', '$2y$10$4auG68fEU/bMHxmuJMBIHemBTWqlWCB.uj8zAZ8lXomGtIyBt.Tcy', 1),
(18, 'amanu', '$2y$10$5wds1KWqxNygoHzcVS5kveey3j4q2irclpPdomvmTKoZlsRyu1QE2', 1),
(19, 'danis', '$2y$10$G.kq9nB4wku02HRKGoOv8OcG/w9e2tB5FYBtoA9EtuEdn0.kJHK6q', 1);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `User_id` int(11) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `SubCity` varchar(100) NOT NULL,
  `MarketPlace` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`User_id`,`phone_number`,`City`,`SubCity`,`MarketPlace`,`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`User_id`, `phone_number`, `City`, `SubCity`, `MarketPlace`, `Email`) VALUES
(1, '+251-900-00-00-0000000', 'Addis Ababa', 'Nifassilk', '', 'Johndoe@gmail.com'),
(2, '+251-111-11-11-111', 'Addis Ababaa', 'Kolfe', 'Merkato', 'Alemuabebe@gmail.com'),
(3, '+251-900-00-00-00', 'Addis Ababa', 'Kolfe', '', 'tewdroszerihun@gmail.com'),
(4, '+251923781291', 'Addis Ababa', 'Nifas-silk', '', 'ezraabate8@gmail.com'),
(5, '0923781291', 'Addis Ababa', 'Lideta', '', 'ezraabate15@hotmail.com'),
(6, '+251922958961', 'AA', 'Kolfe', '', 'amanmess@gmail.com'),
(7, '0966332255', 'AA', 'Nifassilk', 'Merkato', 'Abebe@gmail.com'),
(8, '0988774455', 'AA', 'Nifassilk', '', 'Almazm@gmail.com'),
(9, '0966332212', 'AA', 'kolfe', '', 'Birukh@gmail.com'),
(10, '0966874545', 'AA', 'Lideta', 'Merkato', 'Zemedkun@gmail.com'),
(11, '098845630', 'AA', 'AA', '', 'asd@gfh.fgf'),
(12, '096321456', 'AA', 'AAA', '', 'hgyug@hgjugh.ugyu'),
(13, '75644646465', 'AAA', 'AAAB', 'Merkato', 'iojio@opio.oiujoi'),
(14, '46464', 'AA', 'AAAA', '', 'sad@sad.asda'),
(15, '7553545645', 'AAAAA', 'NNNN', 'sholla', 'sda@sadas.asdsa'),
(16, '+25411226644', 'AA', 'AA', '', 'dani@gmail.com'),
(17, '+251698547', 'AA', 'BBB', '', 'Amanuelmess@gmail.com'),
(18, '091245789644', 'addis', 'kebena', '', 'amanunel@gamil.com'),
(19, '09223599', 'addis', 'kebena', 'merkato', 'da@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

DROP TABLE IF EXISTS `bankaccount`;
CREATE TABLE IF NOT EXISTS `bankaccount` (
  `Bank_account_number` varchar(50) NOT NULL,
  `Bank_name` varchar(50) DEFAULT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`Bank_account_number`),
  KEY `User_id` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankaccount`
--

INSERT INTO `bankaccount` (`Bank_account_number`, `Bank_name`, `User_id`) VALUES
('00000', 'CBE', 8),
('000000', 'Awash', 1),
('0000000', 'CBE', 7),
('1111111', 'Dashen', 2),
('1321212', 'CBE', 9),
('5465464', 'NIB', 10);

-- --------------------------------------------------------

--
-- Table structure for table `itemcategory`
--

DROP TABLE IF EXISTS `itemcategory`;
CREATE TABLE IF NOT EXISTS `itemcategory` (
  `categ_id` int(10) NOT NULL AUTO_INCREMENT,
  `categ_name` varchar(50) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`categ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemcategory`
--

INSERT INTO `itemcategory` (`categ_id`, `categ_name`, `Status`) VALUES
(1, 'Electronics', 1),
(2, 'clothing', 1),
(3, 'furniture', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemfilter`
--

DROP TABLE IF EXISTS `itemfilter`;
CREATE TABLE IF NOT EXISTS `itemfilter` (
  `Filter_id` int(11) NOT NULL AUTO_INCREMENT,
  `Filter_type` varchar(50) NOT NULL,
  `Filter_value` varchar(50) NOT NULL,
  PRIMARY KEY (`Filter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemfilter`
--

INSERT INTO `itemfilter` (`Filter_id`, `Filter_type`, `Filter_value`) VALUES
(1, 'color', 'red'),
(2, 'size', 'small'),
(3, 'unit', 'kilogram'),
(4, 'color', 'black'),
(5, 'test', 'value');

-- --------------------------------------------------------

--
-- Table structure for table `itemforsale`
--

DROP TABLE IF EXISTS `itemforsale`;
CREATE TABLE IF NOT EXISTS `itemforsale` (
  `Item_ID_ForSale` int(11) NOT NULL,
  `DatePosted` date DEFAULT NULL,
  `SellingPrice` float NOT NULL DEFAULT '0',
  `itemQuantity` float NOT NULL DEFAULT '0',
  `totalItemQuantity` float DEFAULT '0',
  `Pricebuffer` float NOT NULL DEFAULT '0',
  `discount_Status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Item_ID_ForSale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemforsale`
--

INSERT INTO `itemforsale` (`Item_ID_ForSale`, `DatePosted`, `SellingPrice`, `itemQuantity`, `totalItemQuantity`, `Pricebuffer`, `discount_Status`) VALUES
(1, '2020-12-12', 1500, 56, 99, 1500, 0),
(2, '2020-12-12', 70000, 134, 159, 0, 0),
(4, NULL, 0, 0, 0, 0, 0),
(5, NULL, 0, 0, 0, 0, 0),
(6, NULL, 0, 0, 0, 0, 0),
(7, NULL, 0, 0, 0, 0, 0),
(8, NULL, 0, 0, 0, 0, 0),
(9, NULL, 0, 0, 0, 0, 0),
(10, NULL, 0, 0, 90, 0, 0),
(13, NULL, 0, 0, 10, 0, 0),
(14, NULL, 1000, 10, 30, 1200, 1),
(15, NULL, 19000, 10, 60, 21000, 1),
(18, NULL, 1500, 50, 50, 2100, 1),
(19, '2020-11-01', 10000, 39, 52, 0, 0),
(21, '2020-11-01', 2000, 90, 97, 0, 0),
(22, '2020-11-01', 1500, 49, 50, 0, 0),
(23, '2020-11-05', 1600, 45, 50, 0, 0),
(24, '2020-11-23', 34, 0, 1, 0, 0),
(25, NULL, 0, 0, 0, 0, 0),
(26, NULL, 0, 0, 0, 0, 0),
(27, NULL, 0, 0, 0, 0, 0),
(28, NULL, 0, 0, 0, 0, 0),
(29, '2020-12-13', 25000, 10, 10, 0, 0),
(30, NULL, 0, 0, 0, 0, 0),
(31, '2020-12-13', 2000, 10, 10, 0, 0);

--
-- Triggers `itemforsale`
--
DROP TRIGGER IF EXISTS `totalItemAmountForSale_insert`;
DELIMITER $$
CREATE TRIGGER `totalItemAmountForSale_insert` BEFORE INSERT ON `itemforsale` FOR EACH ROW BEGIN
	SET NEW.totalItemQuantity := NEW.itemQuantity;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `totalItemAmountForSale_update`;
DELIMITER $$
CREATE TRIGGER `totalItemAmountForSale_update` BEFORE UPDATE ON `itemforsale` FOR EACH ROW BEGIN 
	SELECT itemQuantity,NEW.itemQuantity INTO @ItemQuantity,@ItemQuantityNew FROM itemforsale WHERE Item_ID_ForSale = OLD.Item_ID_ForSale;
    IF @ItemQuantityNew > @ItemQuantity THEN
    	SET NEW.totalItemQuantity = (@ItemQuantityNew - @ItemQuantity) + OLD.totalItemQuantity;
    END IF;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `itemforsalenotification`
--

DROP TABLE IF EXISTS `itemforsalenotification`;
CREATE TABLE IF NOT EXISTS `itemforsalenotification` (
  `itemForSaleID` int(11) NOT NULL,
  `notificationID` int(11) NOT NULL,
  `Status` int(1) DEFAULT '0',
  PRIMARY KEY (`itemForSaleID`,`notificationID`),
  KEY `notificationID` (`notificationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemforsalenotification`
--

INSERT INTO `itemforsalenotification` (`itemForSaleID`, `notificationID`, `Status`) VALUES
(1, 33, 0),
(1, 34, 0),
(1, 41, 0),
(1, 42, 0),
(1, 45, 0),
(1, 46, 0),
(2, 51, 0),
(2, 52, 0),
(2, 53, 0),
(2, 54, 0),
(2, 55, 0),
(2, 56, 0),
(2, 57, 0),
(2, 58, 0),
(2, 59, 0),
(2, 60, 0),
(2, 62, 0),
(2, 63, 0),
(2, 64, 0),
(2, 65, 0),
(2, 66, 0),
(2, 67, 0),
(2, 68, 0),
(2, 69, 0),
(2, 70, 0),
(2, 71, 0),
(2, 72, 0),
(2, 73, 0),
(2, 74, 0),
(2, 75, 0),
(2, 76, 0),
(2, 77, 0),
(2, 78, 0),
(2, 79, 0),
(2, 80, 0),
(2, 81, 0),
(2, 82, 0),
(2, 83, 0),
(2, 84, 0),
(2, 85, 0),
(2, 86, 0),
(2, 87, 0),
(2, 88, 0),
(2, 89, 0),
(2, 90, 0),
(2, 91, 0),
(2, 93, 0),
(2, 94, 0),
(2, 95, 0),
(2, 96, 0),
(2, 97, 0),
(2, 98, 0),
(2, 99, 0),
(2, 100, 0),
(2, 101, 0),
(2, 102, 0),
(9, 1, 0),
(9, 92, 0),
(10, 2, 0),
(10, 3, 0),
(10, 18, 0),
(19, 19, 0),
(19, 20, 0),
(19, 21, 0),
(19, 22, 0),
(21, 12, 0),
(21, 13, 0),
(21, 14, 0),
(21, 15, 0),
(22, 23, 0),
(22, 24, 0),
(23, 26, 0),
(23, 27, 0),
(24, 35, 0),
(24, 36, 0),
(24, 48, 0),
(29, 103, 0),
(29, 104, 0),
(29, 105, 0),
(29, 106, 0),
(29, 107, 0),
(31, 108, 0),
(31, 109, 0),
(31, 110, 0),
(31, 111, 0),
(31, 112, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `Notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `Notification_type` int(11) NOT NULL,
  `Date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Notification_id`),
  KEY `Notification_type` (`Notification_type`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Notification_id`, `Notification_type`, `Date_created`) VALUES
(1, 4, '0000-00-00 00:00:00'),
(2, 4, '0000-00-00 00:00:00'),
(3, 4, '0000-00-00 00:00:00'),
(4, 3, '0000-00-00 00:00:00'),
(5, 4, '0000-00-00 00:00:00'),
(6, 4, '0000-00-00 00:00:00'),
(7, 3, '0000-00-00 00:00:00'),
(8, 3, '0000-00-00 00:00:00'),
(9, 3, '2020-10-28 07:31:24'),
(10, 3, '2020-10-30 05:42:10'),
(11, 3, '2020-10-30 05:45:04'),
(12, 4, '2020-10-30 06:06:42'),
(13, 4, '2020-10-30 06:06:43'),
(14, 4, '2020-11-01 08:19:17'),
(15, 4, '2020-11-01 08:19:17'),
(16, 1, '0000-00-00 00:00:00'),
(17, 3, '2020-11-01 08:21:10'),
(18, 2, '0000-00-00 00:00:00'),
(19, 4, '2020-11-01 15:51:21'),
(20, 4, '2020-11-01 15:51:21'),
(21, 4, '2020-11-01 15:53:23'),
(22, 4, '2020-11-01 15:53:24'),
(23, 4, '2020-11-01 15:56:03'),
(24, 4, '2020-11-01 15:56:03'),
(25, 3, '2020-11-01 15:58:13'),
(26, 4, '2020-11-05 10:22:20'),
(27, 4, '2020-11-05 10:22:20'),
(28, 3, '2020-11-14 07:09:04'),
(29, 3, '2020-11-14 07:17:42'),
(30, 3, '2020-11-14 08:05:45'),
(31, 3, '2020-11-14 08:43:04'),
(32, 3, '2020-11-14 08:47:19'),
(33, 4, '2020-11-23 08:38:58'),
(34, 4, '2020-11-23 08:38:59'),
(35, 4, '2020-11-23 09:09:30'),
(36, 4, '2020-11-23 09:09:30'),
(37, 1, '0000-00-00 00:00:00'),
(38, 3, '2020-11-26 12:14:19'),
(39, 3, '2020-12-11 12:53:34'),
(40, 3, '2020-12-12 07:49:43'),
(41, 4, '2020-12-12 07:51:43'),
(42, 4, '2020-12-12 07:51:43'),
(43, 1, '0000-00-00 00:00:00'),
(44, 3, '2020-12-12 08:09:18'),
(45, 4, '2020-12-12 09:26:03'),
(46, 4, '2020-12-12 09:26:04'),
(47, 3, '2020-12-12 10:09:57'),
(48, 2, '0000-00-00 00:00:00'),
(49, 1, '0000-00-00 00:00:00'),
(50, 1, '0000-00-00 00:00:00'),
(51, 4, '2020-12-12 17:54:53'),
(52, 4, '2020-12-12 17:54:53'),
(53, 4, '2020-12-12 17:54:53'),
(54, 4, '2020-12-12 17:54:53'),
(55, 4, '2020-12-12 17:54:54'),
(56, 4, '2020-12-12 17:55:00'),
(57, 4, '2020-12-12 17:55:00'),
(58, 4, '2020-12-12 17:55:01'),
(59, 4, '2020-12-12 17:55:01'),
(60, 4, '2020-12-12 17:55:01'),
(61, 1, '0000-00-00 00:00:00'),
(62, 4, '2020-12-12 17:59:02'),
(63, 4, '2020-12-12 17:59:02'),
(64, 4, '2020-12-12 17:59:03'),
(65, 4, '2020-12-12 17:59:04'),
(66, 4, '2020-12-12 17:59:05'),
(67, 4, '2020-12-12 17:59:06'),
(68, 4, '2020-12-12 17:59:07'),
(69, 4, '2020-12-12 17:59:09'),
(70, 4, '2020-12-12 17:59:10'),
(71, 4, '2020-12-12 17:59:11'),
(72, 4, '2020-12-12 17:59:39'),
(73, 4, '2020-12-12 17:59:40'),
(74, 4, '2020-12-12 17:59:42'),
(75, 4, '2020-12-12 17:59:43'),
(76, 4, '2020-12-12 17:59:43'),
(77, 4, '2020-12-12 17:59:45'),
(78, 4, '2020-12-12 17:59:45'),
(79, 4, '2020-12-12 17:59:46'),
(80, 4, '2020-12-12 17:59:47'),
(81, 4, '2020-12-12 17:59:48'),
(82, 4, '2020-12-12 18:00:41'),
(83, 4, '2020-12-12 18:00:42'),
(84, 4, '2020-12-12 18:00:43'),
(85, 4, '2020-12-12 18:00:43'),
(86, 4, '2020-12-12 18:00:46'),
(87, 4, '2020-12-12 18:01:16'),
(88, 4, '2020-12-12 18:01:16'),
(89, 4, '2020-12-12 18:01:17'),
(90, 4, '2020-12-12 18:01:17'),
(91, 4, '2020-12-12 18:01:18'),
(92, 2, '0000-00-00 00:00:00'),
(93, 4, '2020-12-12 19:07:01'),
(94, 4, '2020-12-12 19:07:01'),
(95, 4, '2020-12-12 19:07:01'),
(96, 4, '2020-12-12 19:07:01'),
(97, 4, '2020-12-12 19:07:01'),
(98, 4, '2020-12-12 19:51:29'),
(99, 4, '2020-12-12 19:51:29'),
(100, 4, '2020-12-12 19:51:29'),
(101, 4, '2020-12-12 19:51:29'),
(102, 4, '2020-12-12 19:51:29'),
(103, 4, '2020-12-13 05:38:18'),
(104, 4, '2020-12-13 05:38:18'),
(105, 4, '2020-12-13 05:38:18'),
(106, 4, '2020-12-13 05:38:18'),
(107, 4, '2020-12-13 05:38:18'),
(108, 4, '2020-12-13 05:53:20'),
(109, 4, '2020-12-13 05:53:20'),
(110, 4, '2020-12-13 05:53:21'),
(111, 4, '2020-12-13 05:53:21'),
(112, 4, '2020-12-13 05:53:21'),
(113, 3, '2020-12-13 05:56:33'),
(114, 3, '2020-12-13 07:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `notificationcontent`
--

DROP TABLE IF EXISTS `notificationcontent`;
CREATE TABLE IF NOT EXISTS `notificationcontent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificationcontent`
--

INSERT INTO `notificationcontent` (`ID`, `Content`) VALUES
(1, 'item is getting low in your stock.'),
(2, 'item provided for sale is getting low.'),
(3, 'order is placed by'),
(4, 'item is posted for sale.');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE IF NOT EXISTS `orderitem` (
  `Order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `Quantity` float NOT NULL,
  PRIMARY KEY (`Order_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`Order_id`, `item_id`, `Quantity`) VALUES
(1, 5, 1),
(2, 5, 1),
(3, 5, 1),
(6, 1, 1),
(6, 2, 3),
(7, 1, 1),
(8, 13, 1),
(9, 14, 1),
(10, 14, 1),
(11, 14, 1),
(12, 14, 1),
(13, 14, 1),
(14, 14, 1),
(15, 14, 1),
(16, 14, 1),
(17, 14, 1),
(18, 1, 1),
(18, 14, 1),
(19, 1, 11),
(19, 2, 11),
(20, 1, 1),
(20, 19, 1),
(21, 1, 1),
(21, 19, 1),
(22, 1, 1),
(22, 19, 1),
(23, 1, 1),
(24, 1, 1),
(24, 19, 1),
(25, 1, 1),
(25, 19, 1),
(26, 1, 1),
(26, 19, 1),
(27, 1, 1),
(27, 19, 1),
(28, 1, 1),
(28, 19, 1),
(29, 1, 1),
(29, 19, 1),
(30, 1, 1),
(30, 19, 1),
(31, 1, 1),
(32, 1, 1),
(32, 19, 1),
(33, 1, 1),
(33, 19, 1),
(34, 1, 1),
(34, 19, 1),
(35, 1, 1),
(36, 1, 44),
(37, 1, 1),
(39, 1, 5),
(40, 1, 1),
(41, 1, 2),
(42, 1, 26),
(43, 1, 1),
(44, 1, 1),
(45, 2, 1),
(46, 2, 1),
(47, 21, 3),
(48, 21, 1),
(49, 21, 1),
(50, 21, 1),
(51, 21, 1),
(52, 10, 92),
(53, 22, 1),
(54, 1, 1),
(55, 23, 1),
(56, 23, 3),
(57, 1, 1),
(57, 2, 1),
(58, 1, 1),
(58, 4, 1),
(59, 2, 1),
(60, 2, 1),
(61, 1, 1),
(62, 2, 1),
(63, 2, 4),
(64, 2, 2),
(65, 2, 1),
(66, 2, 1),
(67, 23, 1),
(68, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordernotification`
--

DROP TABLE IF EXISTS `ordernotification`;
CREATE TABLE IF NOT EXISTS `ordernotification` (
  `orderID` int(11) NOT NULL,
  `notificationID` int(11) NOT NULL,
  PRIMARY KEY (`orderID`,`notificationID`),
  KEY `notificationID` (`notificationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordernotification`
--

INSERT INTO `ordernotification` (`orderID`, `notificationID`) VALUES
(1, 4),
(2, 7),
(3, 8),
(37, 9),
(1, 10),
(51, 11),
(52, 17),
(53, 25),
(54, 28),
(55, 29),
(56, 30),
(57, 31),
(58, 32),
(60, 38),
(61, 39),
(62, 40),
(63, 44),
(64, 47),
(67, 113),
(68, 114);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Total_cost` float NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Order_id`),
  KEY `Order_ibfk_1` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `User_id`, `Date_created`, `Total_cost`, `Status`) VALUES
(1, 1, '0000-00-00 00:00:00', 100, 0),
(2, 1, '0000-00-00 00:00:00', 100, 1),
(3, 1, '0000-00-00 00:00:00', 100, 1),
(4, 1, '2020-05-07 12:22:17', 16500, 0),
(5, 1, '2020-05-07 12:55:05', 0, 0),
(6, 1, '2020-05-07 13:03:51', 211500, 1),
(7, 1, '2020-05-07 16:11:29', 1500, 1),
(8, 1, '2020-05-07 16:12:19', 100.5, 1),
(9, 1, '2020-09-17 07:36:57', 1200, 1),
(10, 1, '2020-09-17 07:39:10', 1200, 0),
(11, 1, '2020-09-17 07:40:05', 1200, 0),
(12, 1, '2020-09-17 07:44:39', 1200, 0),
(13, 1, '2020-09-17 07:46:26', 1200, 0),
(14, 1, '2020-09-17 07:46:55', 1200, 0),
(15, 1, '2020-09-17 07:47:43', 1200, 0),
(16, 1, '2020-09-17 07:53:21', 1200, 0),
(17, 1, '2020-09-17 07:54:05', 1200, 0),
(18, 1, '2020-09-17 07:55:22', 2700, 0),
(19, 1, '2020-10-10 06:47:59', 732600, 0),
(20, 1, '2020-10-20 09:01:41', 12600, 0),
(21, 1, '2020-10-20 09:05:19', 12600, 0),
(22, 1, '2020-10-20 09:06:03', 12600, 0),
(23, 1, '2020-10-20 09:06:26', 1600, 0),
(24, 1, '2020-10-20 09:08:01', 12600, 0),
(25, 1, '2020-10-20 09:10:21', 12600, 0),
(26, 1, '2020-10-20 09:11:04', 12600, 0),
(27, 1, '2020-10-20 09:12:45', 12600, 0),
(28, 1, '2020-10-20 09:14:08', 12600, 0),
(29, 1, '2020-10-20 09:19:11', 12600, 0),
(30, 1, '2020-10-20 09:22:01', 12600, 0),
(31, 1, '2020-10-20 09:23:17', 1600, 0),
(32, 1, '2020-10-20 09:27:06', 12600, 0),
(33, 1, '2020-10-20 09:34:45', 12600, 0),
(34, 1, '2020-10-20 09:35:49', 12600, 0),
(35, 1, '2020-10-20 09:37:48', 1600, 0),
(36, 1, '2020-10-26 12:05:31', 70400, 0),
(37, 1, '2020-10-28 07:31:23', 1600, 0),
(38, 1, '2020-10-29 08:24:18', 8000, 0),
(39, 1, '2020-10-29 08:25:34', 8000, 0),
(40, 1, '2020-10-29 09:58:27', 1600, 0),
(41, 1, '2020-10-29 10:03:20', 3200, 0),
(42, 1, '2020-10-29 10:07:28', 41600, 0),
(43, 1, '2020-10-29 10:10:31', 1600, 0),
(44, 1, '2020-10-29 10:54:07', 1600, 0),
(45, 1, '2020-10-29 10:56:18', 65000, 0),
(46, 1, '2020-10-29 10:58:07', 65000, 0),
(47, 1, '2020-10-29 15:15:27', 6000, 0),
(48, 1, '2020-10-30 05:30:08', 2000, 0),
(49, 1, '2020-10-30 05:32:17', 2000, 0),
(50, 1, '2020-10-30 05:42:09', 2000, 0),
(51, 1, '2020-10-30 05:45:03', 2000, 0),
(52, 1, '2020-11-01 08:21:09', 0, 0),
(53, 1, '2020-11-01 15:58:13', 1500, 0),
(54, 9, '2020-11-14 07:09:04', 1600, 1),
(55, 9, '2020-11-14 07:17:42', 1600, 1),
(56, 9, '2020-11-14 08:05:45', 4800, 1),
(57, 9, '2020-11-14 08:43:04', 66600, 1),
(58, 9, '2020-11-14 08:47:19', 1600, 1),
(59, 1, '2020-11-23 08:46:36', 65000, 0),
(60, 1, '2020-11-26 12:14:19', 65000, 0),
(61, 1, '2020-12-11 12:53:33', 1200, 0),
(62, 9, '2020-12-12 07:49:43', 65000, 0),
(63, 1, '2020-12-12 08:09:18', 260000, 0),
(64, 1, '2020-12-12 10:09:57', 130000, 0),
(65, 1, '2020-12-12 12:33:28', 65000, 0),
(66, 1, '2020-12-12 12:35:20', 65000, 1),
(67, 8, '2020-12-13 05:56:33', 1600, 1),
(68, 18, '2020-12-13 07:27:10', 1500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `wholesaler_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `wholesaler_id` (`wholesaler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `wholesaler_id`, `rating`) VALUES
(1, 2, 5),
(2, 2, 4),
(3, 2, 5),
(4, 2, 1),
(5, 2, 4),
(6, 2, 5),
(7, 2, 5),
(8, 2, 4),
(9, 2, 5),
(10, 7, 4),
(11, 7, 4),
(12, 10, 5),
(13, 10, 4),
(14, 10, 4),
(15, 10, 5),
(16, 2, 5),
(17, 7, 5),
(18, 7, 5),
(19, 2, 5),
(20, 2, 5),
(21, 7, 5),
(22, 2, 5),
(23, 2, 5),
(24, 2, 4),
(25, 2, 3),
(26, 2, 3),
(27, 2, 3),
(28, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(255) NOT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'Administrator'),
(2, 'Retailer'),
(3, 'Wholesaler ');

-- --------------------------------------------------------

--
-- Table structure for table `sentto`
--

DROP TABLE IF EXISTS `sentto`;
CREATE TABLE IF NOT EXISTS `sentto` (
  `Notification_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Notification_id`,`User_id`),
  KEY `SentTo_ibfk_1` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sentto`
--

INSERT INTO `sentto` (`Notification_id`, `User_id`, `Status`) VALUES
(2, 1, 1),
(3, 2, 1),
(4, 2, 1),
(5, 1, 1),
(6, 2, 1),
(7, 2, 1),
(8, 2, 1),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 1, 1),
(13, 9, 1),
(14, 1, 1),
(15, 9, 1),
(16, 2, 1),
(17, 2, 1),
(18, 1, 1),
(18, 2, 1),
(18, 9, 1),
(18, 10, 1),
(19, 1, 1),
(20, 9, 1),
(21, 1, 1),
(22, 9, 1),
(23, 1, 1),
(24, 9, 1),
(25, 10, 1),
(26, 8, 1),
(27, 9, 1),
(28, 2, 1),
(29, 7, 1),
(30, 7, 1),
(31, 2, 1),
(32, 2, 1),
(33, 1, 1),
(34, 9, 1),
(35, 1, 1),
(36, 9, 1),
(37, 2, 1),
(38, 2, 1),
(39, 2, 1),
(40, 2, 1),
(41, 1, 1),
(42, 9, 1),
(43, 2, 1),
(44, 2, 1),
(45, 1, 1),
(46, 9, 1),
(47, 2, 1),
(48, 1, 1),
(48, 2, 1),
(48, 9, 1),
(48, 10, 0),
(48, 11, 0),
(48, 12, 0),
(48, 14, 0),
(49, 2, 1),
(50, 2, 1),
(51, 1, 1),
(52, 9, 1),
(53, 11, 0),
(54, 12, 0),
(55, 14, 0),
(56, 1, 1),
(57, 9, 1),
(58, 11, 0),
(59, 12, 0),
(60, 14, 0),
(61, 2, 1),
(62, 1, 1),
(63, 9, 1),
(64, 11, 0),
(65, 12, 0),
(66, 14, 0),
(67, 1, 1),
(68, 9, 1),
(69, 11, 0),
(70, 12, 0),
(71, 14, 0),
(72, 1, 1),
(73, 9, 1),
(74, 11, 0),
(75, 12, 0),
(76, 14, 0),
(77, 1, 1),
(78, 9, 1),
(79, 11, 0),
(80, 12, 0),
(81, 14, 0),
(82, 1, 1),
(83, 9, 1),
(84, 11, 0),
(85, 12, 0),
(86, 14, 0),
(87, 1, 1),
(88, 9, 1),
(89, 11, 0),
(90, 12, 0),
(91, 14, 0),
(92, 1, 1),
(92, 2, 1),
(92, 9, 1),
(92, 10, 0),
(92, 11, 0),
(92, 12, 0),
(92, 14, 0),
(93, 1, 1),
(94, 9, 0),
(95, 11, 0),
(96, 12, 0),
(97, 14, 0),
(98, 1, 1),
(99, 9, 0),
(100, 11, 0),
(101, 12, 0),
(102, 14, 0),
(103, 1, 0),
(104, 9, 0),
(105, 11, 0),
(106, 12, 0),
(107, 14, 0),
(108, 8, 0),
(109, 9, 0),
(110, 11, 0),
(111, 12, 0),
(112, 14, 0),
(113, 7, 0),
(114, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `Stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `Stock_name` varchar(255) DEFAULT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`Stock_id`),
  KEY `User_id` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Stock_id`, `Stock_name`, `User_id`) VALUES
(1, 'Alemu\'s stock', 2),
(2, 'Abebe\'s Stock', 7),
(3, 'Zemedkun\'s stock', 10),
(4, 'stockofwho', 13),
(5, 'jkijkj', 15),
(6, 'dani', 19);

-- --------------------------------------------------------

--
-- Table structure for table `stockitem`
--

DROP TABLE IF EXISTS `stockitem`;
CREATE TABLE IF NOT EXISTS `stockitem` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT,
  `ExpirationDate` date NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ItemName` text NOT NULL,
  `ItemDescription` text NOT NULL,
  `ItemImage` longblob,
  `VendorName` text NOT NULL,
  `ItemBrand` text NOT NULL,
  `sellingPrice` float NOT NULL,
  `PurchasingPrice` float NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `StockID` int(11) NOT NULL,
  `ItemQuantity` float NOT NULL,
  `totalItemQuantity` float DEFAULT '0',
  `color` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `CategoryID` (`CategoryID`),
  KEY `StockID` (`StockID`),
  KEY `color` (`color`),
  KEY `size` (`size`),
  KEY `unit` (`unit`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockitem`
--

INSERT INTO `stockitem` (`ItemID`, `ExpirationDate`, `DateAdded`, `ItemName`, `ItemDescription`, `ItemImage`, `VendorName`, `ItemBrand`, `sellingPrice`, `PurchasingPrice`, `CategoryID`, `StockID`, `ItemQuantity`, `totalItemQuantity`, `color`, `size`, `unit`) VALUES
(1, '2020-04-06', '2020-04-21 14:18:36', 'Headphones', 'portable Headphones Bluetooth connection available', 0x74657374696d6167652e6a7067, 'Apple', 'Apple', 1500, 1000, 1, 1, 1, 1, 1, 2, 3),
(2, '2020-04-06', '2020-04-27 11:42:54', 'iPhone', 'New model iPhone', 0x6970686f6e652e6a7067, 'Apple', 'iPhone', 70000, 50000, 1, 1, 92, 300, 1, 2, 3),
(4, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(5, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(6, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(7, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(8, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(9, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(10, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 0, 1, 2, 3),
(11, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 90, 1, 2, 3),
(12, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 90, 90, 1, 2, 3),
(13, '2020-04-06', '2020-04-27 11:42:54', 'some_item', 'some_item_description', 0x4e554c4c, 'vname', 'someBrand', 100.5, 150, 1, 1, 110, 110, 1, 2, 3),
(14, '0000-00-00', '2020-09-16 10:38:05', 'test', 'test', 0x616c6572742d636972636c65642e706e67, 'test', 'test', 1200, 1000, 1, 1, 90, 100, 1, 2, 3),
(15, '2023-05-05', '2020-10-05 08:23:04', 'newitem', 'new item description', 0x53637265656e73686f745f28313029342e706e67, 'newitemvendor', 'newitembrand', 20000, 10000, 1, 1, 50, 100, 1, 2, 3),
(16, '2023-05-05', '2020-10-05 08:35:41', 'newitem', 'new item description', 0x53637265656e73686f745f28313029382e706e67, 'newitemvendor', 'newitembrand', 20000, 10000, 1, 1, 50, 100, 4, 2, 3),
(17, '2023-05-05', '2020-10-05 11:17:15', 'newitem', 'new item description', 0x53637265656e73686f745f28313029392e706e67, 'newitembrand', 'newitembrand', 20000, 10000, 1, 1, 100, 100, 4, 2, 3),
(18, '0000-00-00', '2020-10-15 05:54:23', 'Tshirt', 'Quality Tshirt for adult men', 0x612e6a7067, 'polo', 'polo', 2000, 1000, 2, 2, 50, 100, 4, 2, 3),
(19, '0000-00-00', '2020-10-20 07:22:35', 'samsung', 'new samsung', 0x6e657770682e6a7067, 'Samsung', 'Samsung s8', 10000, 5000, 1, 3, 48, 100, 4, 2, 3),
(21, '0000-00-00', '2020-10-29 11:16:27', 'speaker', 'Xiaomi Mi Outdoor Bluetooth Speaker', 0x62312e6a7067, 'Xiaomi', 'XiaomiMI', 2000, 1000, 1, 1, 3, 100, 4, 2, 3),
(22, '0000-00-00', '2020-11-01 15:55:44', 'speaker', 'new speaker', 0x632e6a7067, 'Apple', 'Apple', 1500, 1000, 1, 3, 50, 100, 4, 2, 3),
(23, '0000-00-00', '2020-11-05 10:21:59', 'Tshirt', 'Adidas tshirt for kids', 0x642e6a7067, 'Adidas', 'Adidas', 1600, 1000, 2, 2, 50, 100, 1, 2, 3),
(24, '2020-12-03', '2020-11-23 05:23:17', 'as', 'asd', '', 'as', 'as', 34, 12, 1, 1, 0, 1, 1, 2, 3),
(25, '0000-00-00', '2020-12-11 13:05:54', 'Samsung', 'New samsung avaliable', 0x63312e6a7067, 'Samsung', 'Samsung', 15000, 10000, 1, 1, 100, 100, 4, 2, 3),
(26, '2020-12-14', '2020-12-12 11:31:57', 'a', 'bb', 0x61362e6a7067, 'brand', 'brand', 1000, 100, 1, 1, 100, 100, 1, 2, 3),
(27, '2020-12-12', '2020-12-12 11:33:14', 'a', 'bb', 0x61372e6a7067, 'brand', 'brand', 1000, 100, 1, 1, 100, 100, 1, 2, 3),
(28, '2020-12-14', '2020-12-12 11:35:27', 'a', 'bb', 0x61382e6a7067, 'vendor', 'brand', 10000, 100, 1, 1, 100, 100, 1, 2, 3),
(29, '2020-12-31', '2020-12-13 05:36:36', 'iPhone', 'Apple iPhone XS Max smartphone. Announced Sep 2018.Disclaimer. We can not guarantee that the .', 0x6970686f6e656d61782e6a7067, 'Apple', 'Iphone', 25000, 20000, 1, 1, 90, 100, 4, 2, 3),
(30, '2020-12-31', '2020-12-13 05:44:11', 'Iphone', 'Apple iPhone XS Max smartphone. Announced Sep 2018.Disclaimer. We can not guarantee that the.', 0x6970686f6e656d6178312e6a7067, 'Apple', 'Iphone', 25000, 20000, 1, 1, 100, 100, 4, 2, 3),
(31, '2020-12-31', '2020-12-13 05:52:47', 'Jacket', 'Cotton jacket', 0x6a61636b6574322e6a7067, 'Adidas', 'Adidas', 2000, 1500, 2, 2, 90, 100, 1, 2, 3);

--
-- Triggers `stockitem`
--
DROP TRIGGER IF EXISTS `toalItemAmountStock_update`;
DELIMITER $$
CREATE TRIGGER `toalItemAmountStock_update` BEFORE UPDATE ON `stockitem` FOR EACH ROW BEGIN 
	SELECT ItemQuantity,NEW.ItemQuantity INTO @ItemQuantity,@ItemQuantityNew FROM stockitem WHERE ItemID = OLD.ItemID;
    IF @ItemQuantityNew > @ItemQuantity THEN
    	SET NEW.totalItemQuantity = (@ItemQuantityNew - @ItemQuantity) + OLD.totalItemQuantity;
    END IF;
    
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `totalItemAmountStock_insert`;
DELIMITER $$
CREATE TRIGGER `totalItemAmountStock_insert` BEFORE INSERT ON `stockitem` FOR EACH ROW BEGIN
	SET NEW.totalItemQuantity := NEW.ItemQuantity;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stockitemnotification`
--

DROP TABLE IF EXISTS `stockitemnotification`;
CREATE TABLE IF NOT EXISTS `stockitemnotification` (
  `stockItemID` int(11) NOT NULL,
  `notificationID` int(11) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stockItemID`,`notificationID`),
  KEY `notificationID` (`notificationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockitemnotification`
--

INSERT INTO `stockitemnotification` (`stockItemID`, `notificationID`, `Status`) VALUES
(1, 43, 1),
(2, 49, 1),
(2, 50, 1),
(2, 61, 1),
(21, 16, 0),
(24, 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribefor`
--

DROP TABLE IF EXISTS `subscribefor`;
CREATE TABLE IF NOT EXISTS `subscribefor` (
  `Categ_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`Categ_id`,`User_id`),
  KEY `User_id` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribefor`
--

INSERT INTO `subscribefor` (`Categ_id`, `User_id`) VALUES
(1, 1),
(1, 2),
(2, 7),
(2, 8),
(1, 9),
(2, 9),
(1, 10),
(1, 11),
(2, 11),
(3, 11),
(1, 12),
(2, 12),
(3, 12),
(3, 13),
(1, 14),
(2, 14),
(3, 14),
(2, 15),
(1, 18),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tinlicense`
--

DROP TABLE IF EXISTS `tinlicense`;
CREATE TABLE IF NOT EXISTS `tinlicense` (
  `License_number` int(7) NOT NULL,
  `TIN_number` int(10) DEFAULT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`License_number`),
  KEY `User_id` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinlicense`
--

INSERT INTO `tinlicense` (`License_number`, `TIN_number`, `User_id`) VALUES
(676, 6468, 10),
(58785, 745874587, 15),
(3333333, 2222222, 2),
(123345644, 1233345, 19),
(656646465, 0, 7),
(2147483647, 122, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `SecondName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Retail_name` varchar(50) DEFAULT NULL,
  `wholesale_name` varchar(50) DEFAULT NULL,
  `Registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roleID` int(11) NOT NULL,
  `Account_id` int(11) NOT NULL,
  `photo` longblob NOT NULL,
  PRIMARY KEY (`User_id`),
  KEY `Account_id` (`Account_id`),
  KEY `roleID` (`roleID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `FirstName`, `SecondName`, `LastName`, `Retail_name`, `wholesale_name`, `Registration_date`, `roleID`, `Account_id`, `photo`) VALUES
(1, 'John', 'Doe', 'Smith', 'John\'s Shop', NULL, '2020-04-20 11:27:19', 2, 1, 0x746573742e706e67),
(2, 'Alemu', 'Abebe', 'Kebede', NULL, 'Alemu wholesale shop', '2020-04-20 11:38:36', 3, 2, 0x74657374312e706e67),
(3, 'Tewdros', 'Zerihun', 'Sisay', NULL, NULL, '2020-04-20 11:43:57', 1, 3, 0x74657374322e706e67),
(4, 'Ezra', 'Abate', 'Zegeye', NULL, NULL, '2020-10-07 07:47:58', 1, 4, ''),
(5, 'Ezra', 'Zegeye', 'Abate', NULL, NULL, '2020-10-07 11:10:23', 1, 5, ''),
(6, 'Amanuel', 'Molla', 'Messele', NULL, NULL, '2020-10-10 09:03:50', 1, 6, 0x657a72612e706e67),
(7, 'Abebe', 'Kebede', 'Molla', NULL, 'Abebe\'s Shop', '2020-10-15 05:51:50', 3, 7, 0x657a7261312e706e67),
(8, 'Almaz', 'Mitiku', 'Tesfaye', 'Almaz\'s', NULL, '2020-10-15 05:56:45', 2, 8, 0x657a7261322e706e67),
(9, 'Biruk', 'Hailu', 'Shiferaw', 'Biruk\'s', NULL, '2020-10-15 07:17:39', 2, 9, 0x657a7261332e706e67),
(10, 'Zemedkun', 'Abebe', 'Mesfin', NULL, 'Zemedkun\'s shop', '2020-10-20 07:18:33', 3, 10, 0x657a7261342e706e67),
(11, 'newrett', 'newrett', 'newrett', 'newretret', NULL, '2020-12-12 10:29:16', 2, 11, 0x61312e6a7067),
(12, 'AAA', 'BBB', 'CCC', 'AAAret', NULL, '2020-12-12 10:32:24', 2, 12, 0x61322e6a7067),
(13, 'hello', 'xyzhello', 'xyzhello', NULL, 'nameofw', '2020-12-12 10:40:34', 3, 13, 0x61332e6a7067),
(14, 'asda', 'uh', 'jh', 'jh', NULL, '2020-12-12 10:44:18', 2, 14, 0x61342e6a7067),
(15, 'sda', 'jhbkjjk', 'hjk', NULL, 'jkij', '2020-12-12 10:45:44', 3, 15, 0x63322e6a7067),
(16, 'Daniel', 'Kumbi', 'Bedesa', NULL, NULL, '2020-12-12 17:42:02', 1, 16, 0x657a7261352e706e67),
(17, 'Amanuel', 'Messele', 'Molla', NULL, NULL, '2020-12-12 17:43:21', 1, 17, 0x657a7261362e706e67),
(18, 'amanuel', 'messele', 'molla', 'aman', NULL, '2020-12-13 07:22:53', 2, 18, 0x657a7261372e706e67),
(19, 'dani', 'kunbi', 'as', NULL, 'danishop', '2020-12-13 07:24:51', 3, 19, 0x657a7261382e706e67);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD CONSTRAINT `BankAccount_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `itemforsale`
--
ALTER TABLE `itemforsale`
  ADD CONSTRAINT `itemforsale_ibfk_1` FOREIGN KEY (`Item_ID_ForSale`) REFERENCES `stockitem` (`ItemID`);

--
-- Constraints for table `itemforsalenotification`
--
ALTER TABLE `itemforsalenotification`
  ADD CONSTRAINT `itemForSaleNotification_ibfk_1` FOREIGN KEY (`itemForSaleID`) REFERENCES `itemforsale` (`Item_ID_ForSale`),
  ADD CONSTRAINT `itemForSaleNotification_ibfk_2` FOREIGN KEY (`notificationID`) REFERENCES `notification` (`Notification_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `Notification_ibfk_1` FOREIGN KEY (`Notification_type`) REFERENCES `notificationcontent` (`ID`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `OrderItem_ibfk_2` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `itemforsale` (`Item_ID_ForSale`);

--
-- Constraints for table `ordernotification`
--
ALTER TABLE `ordernotification`
  ADD CONSTRAINT `orderNotification_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `orderNotification_ibfk_2` FOREIGN KEY (`notificationID`) REFERENCES `notification` (`Notification_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`wholesaler_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `sentto`
--
ALTER TABLE `sentto`
  ADD CONSTRAINT `SentTo_ibfk_1` FOREIGN KEY (`Notification_id`) REFERENCES `notification` (`Notification_id`),
  ADD CONSTRAINT `SentTo_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `Stock_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `stockitem`
--
ALTER TABLE `stockitem`
  ADD CONSTRAINT `StockItem_ibfk_7` FOREIGN KEY (`CategoryID`) REFERENCES `itemcategory` (`categ_id`),
  ADD CONSTRAINT `StockItem_ibfk_8` FOREIGN KEY (`StockID`) REFERENCES `stock` (`Stock_id`),
  ADD CONSTRAINT `stockitem_ibfk_1` FOREIGN KEY (`color`) REFERENCES `itemfilter` (`Filter_id`),
  ADD CONSTRAINT `stockitem_ibfk_2` FOREIGN KEY (`size`) REFERENCES `itemfilter` (`Filter_id`),
  ADD CONSTRAINT `stockitem_ibfk_3` FOREIGN KEY (`unit`) REFERENCES `itemfilter` (`Filter_id`);

--
-- Constraints for table `stockitemnotification`
--
ALTER TABLE `stockitemnotification`
  ADD CONSTRAINT `stockItemNotification_ibfk_1` FOREIGN KEY (`stockItemID`) REFERENCES `stockitem` (`ItemID`),
  ADD CONSTRAINT `stockItemNotification_ibfk_2` FOREIGN KEY (`notificationID`) REFERENCES `notification` (`Notification_id`);

--
-- Constraints for table `subscribefor`
--
ALTER TABLE `subscribefor`
  ADD CONSTRAINT `SubscribeFor_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `SubscribeFor_ibfk_2` FOREIGN KEY (`Categ_id`) REFERENCES `itemcategory` (`categ_id`);

--
-- Constraints for table `tinlicense`
--
ALTER TABLE `tinlicense`
  ADD CONSTRAINT `TINLicense_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`Account_id`) REFERENCES `account` (`Account_id`),
  ADD CONSTRAINT `User_ibfk_2` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

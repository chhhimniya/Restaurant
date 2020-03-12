-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2020 at 12:10 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brand_logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brand_order` int(11) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_logo`, `brand_order`) VALUES
(13, 'Thai', 'download (1).jpg', 2),
(11, 'Khmer', 'download.jpg', 1),
(9, 'VN Food', 'download (2).jpg', 4),
(14, 'Indiaáž”áŸ’ážšáž‘áŸážŸážáŸ’áž˜áŸ‚ážš', 'unnamed.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(110) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Dinner'),
(2, 'Morning'),
(3, 'Launch'),
(4, 'Drinking');

-- --------------------------------------------------------

--
-- Table structure for table `cate_brand`
--

DROP TABLE IF EXISTS `cate_brand`;
CREATE TABLE IF NOT EXISTS `cate_brand` (
  `cate_brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`cate_brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cate_brand`
--

INSERT INTO `cate_brand` (`cate_brand_id`, `cate_id`, `brand_id`) VALUES
(1, 13, 1),
(2, 13, 1),
(3, 11, 2),
(4, 9, 3),
(5, 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `item_detail` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cate_brand_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_image`, `item_detail`, `cate_brand_id`) VALUES
(2, 'áŸ¥ážáŸ’áž“áŸážš', 2000, 'Lemon-Rice-olc6iona9496h3m4hn6fr3fzwjc5oft7voz0l2gib6.jpg', '', 0),
(3, 'calláž˜áž€áž”áž„áž”áž¾áž”áŸ„áŸ‡áž”áž„áŸ‹áž¢áž¼áž“', 1000, 'screenshot-www.youtube.com-2020.02.29-13_19_02.png', '', 0),
(6, 'áž…áŸ€áž“', 1000, 'Chicken-65-olc6ibhjlfr5yk58mhhns6rjl550oocz5vu7v700qa.jpg', '', 0),
(7, 'áž”áŸ’ážšáž áž·ážážáŸƒ', 2000, '07-small.jpg', '', 0),
(8, 'áž†áž¶áž˜áŸ’áž‘áŸážŸážœáŸ€ážážŽáž¶áž˜', 20000, '08-large.jpg', '', 0),
(9, 'áž”áŸ’ážšáž áž·ážáž¢ážáŸ‹áž›áž·áž', 1000, '09-large.jpg', '', 0),
(10, 'áž˜áŸ’áž‡áž¼ážšážœáŸ€ážážŽáž¶áž˜áž•áŸ’ážŠáž¶áž…áŸ‹ážŸáŸ’áž“áŸáž áŸ', 1990, '11-large.jpg', '', 0),
(11, 'ážáŸ’áž“áŸ„ážáž†áž¶ážáŸ’áž‰áž¸', 2000, '12-large.jpg', 'áž˜áž¶áž“ážáŸ’áž˜áž¸áŸ—', 0),
(12, 'áž€áŸ’ážšáž˜áŸ‰áž»áž˜áž”áž¶ážáŸ’ážáž·áž™áž¶', 2000, '11-small.jpg', '', 0),
(14, 'áž‘áž¹áž€áž—áŸ’áž“áŸ‚áž€ážŠáž»áž„áž áŸ', 3000, 'Lamb-Rogan-Josh-olc6if8wcrwb8zzs0j4625tdyomhjgrwieg5saug1e.jpg', '', 0),
(15, 'ážáŸ’áž‡áž„ážŸáž¶áŸ†áž„áž˜áž¶áž“áž‡áŸáž™', 4010, 'DSC_0080-1170x550-1-olc6iajrljiktmzoi3otsmdm9i92l0h7e2xebcs7fw.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE IF NOT EXISTS `menu_item` (
  `menu_item_id` int(50) NOT NULL AUTO_INCREMENT,
  `menu_item_name` varchar(100) NOT NULL,
  `menu_item_order` int(20) NOT NULL,
  PRIMARY KEY (`menu_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `menu_item_name`, `menu_item_order`) VALUES
(1, 'food', 1),
(9, 'mekong', 4),
(3, 'India Food', 2),
(4, 'name', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

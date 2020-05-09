-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 08:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Niya', '123'),
(2, 'viseth', '1234'),
(3, 'somnang', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brand_logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `brand_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_logo`, `brand_order`) VALUES
(13, 'Thai', 'images.jpg', 1),
(9, 'Khmer', 'tumblr_p7klnd37EI1wls21to1_400.jpg', 2),
(14, 'China', 'download.png', 3),
(15, 'Japan', 'japan-food-logo-vector-3172501.jpg', 4),
(16, 'India', 'food_logo_1x.jpg', 5),
(18, 'USA', 'download.jpg', 6),
(19, 'UK', 'download (1).png', 7),
(20, 'French', 'download (2).png', 8),
(21, 'Spain', 'download (1).jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(110) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Breakfast'),
(2, 'Launch'),
(3, 'Evening'),
(4, 'Drinking');

-- --------------------------------------------------------

--
-- Table structure for table `cate_brand`
--

CREATE TABLE `cate_brand` (
  `cate_brand_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cate_brand`
--

INSERT INTO `cate_brand` (`cate_brand_id`, `cate_id`, `brand_id`) VALUES
(1, 1, 9),
(2, 2, 13),
(3, 3, 14),
(4, 4, 9),
(5, 1, 15),
(6, 2, 19),
(7, 3, 17),
(8, 4, 19),
(9, 1, 17),
(10, 1, 18),
(11, 2, 15),
(12, 4, 16),
(13, 3, 9),
(14, 2, 14),
(15, 4, 13),
(16, 1, 16),
(17, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `chef_id` int(11) NOT NULL,
  `chef_name` varchar(200) NOT NULL,
  `chef_image` varchar(250) NOT NULL,
  `chef_position` varchar(200) NOT NULL,
  `chef_gmail` varchar(200) NOT NULL,
  `chef_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`chef_id`, `chef_name`, `chef_image`, `chef_position`, `chef_gmail`, `chef_detail`) VALUES
(1, 'Jack', 'chefs_1.webp', 'Senior Chef', 'niyachhim2103@gmail.com', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>\r\n'),
(2, 'niya', 'chefs_2.webp', 'Master Chef', 'niya@gmail.com', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment</p>\r\n'),
(3, 'Tom', 'chefs_3.webp', 'Master Chef', 'niyachhim2103@gmail.com', '<p>so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish</p>\r\n'),
(5, 'Tenus', 'team-image1.jpg', 'Leader Team', 'Tenus@gmail.com', '<p>&nbsp;Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</p>\r\n'),
(6, 'Chris Park', '02.jpg', 'Manager Chef', 'ChrisPark@gmail.com', '<p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>\r\n'),
(7, 'The Rock', 'team-image2.jpg', 'Security', 'therock@gmail.com', '<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `gmail`, `subject`, `message`) VALUES
(1, 'Samrach', 'Gmail.com', 'Khmer Food', 'Welcome to menu mkoengun'),
(2, 'Thun Thymother', 'asdf', 'Thai Food Street', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin'),
(3, 'Chhim niya', 'niyachhim2103@gmail.com', 'SUZI', 'Welcome to you babyContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latinhere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you'),
(4, 'Somnang', 'niyachhim2103@gmail.com', 'VN Traditional Food', 'welomceIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout'),
(5, 'Yem Lyhour', 'yemlyhour@gmail.com', 'Khmer Angkor', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also.');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(50) NOT NULL,
  `content_title` varchar(200) NOT NULL,
  `content_menu` int(11) NOT NULL,
  `content_description` text NOT NULL,
  `content_order` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_title`, `content_menu`, `content_description`, `content_order`) VALUES
(1, 'Heading', 14, '', 3),
(2, 'Tag', 0, '<p>detaildetaildetaildetaildetaildetaildetailThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;</p>\r\n', 4),
(3, 'Heading1', 13, '<p>Welcome to me asisgn some time</p>\r\n\r\n<p>&nbsp;</p>\r\n', 3),
(4, 'Our Team', 15, '<p>Welcome to men aosme mekont dnek</p>\r\n', 3),
(5, 'HeadinTage1', 4, '<p>Welcome to back something anything&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected&nbsp;Welcome to back something anything&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected&nbsp;Welcome to back something anything&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected&nbsp;Welcome to back something anything&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected&nbsp;</p>\r\n', 1),
(6, 'Paragraphp member', 0, '<p>To something member thing some&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected&nbsp;</p>\r\n', 5),
(7, 'Maintain', 14, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an u</p>\r\n', 2),
(8, 'Heading3241', 15, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of&nbsp;</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of&nbsp;</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of&nbsp;</p>\r\n', 3),
(9, 'Something meong', 9, '<p>WelThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of&nbsp;</p>\r\n', 2),
(10, 'HeadMain', 0, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which&nbsp;</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which&nbsp;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which&nbsp;</p>\r\n', 1),
(11, 'Our Main', 0, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text</p>\r\n', 5),
(12, 'Paragraph', 3, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.&nbsp;</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_title` varchar(111) NOT NULL,
  `expense_price` int(111) NOT NULL,
  `expense_date` datetime NOT NULL,
  `expense_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_title`, `expense_price`, `expense_date`, `expense_description`) VALUES
(1, 'exise', 130, '2020-04-05 08:48:43', 'sdasdf'),
(2, 'POS', 23, '2020-04-10 15:14:13', ''),
(6, 'Equipment', 150, '2020-04-10 15:09:13', ''),
(7, 'mekondsd', 1500, '2020-04-10 15:14:03', ''),
(9, 'mekondsd', 15005, '2020-04-10 15:39:52', '1adasd');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `name`, `image`, `order_number`, `detail`) VALUES
(1, 'Maraa', 'Screenshot (5).png', '1', '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n'),
(3, 'Our Mission', 'Screenshot (1).png', '3', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<p>&quot;</p>\r\n'),
(5, 'Our Vision', 'Screenshot (6).png', '2', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `item_detail` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cate_brand_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_image`, `item_detail`, `cate_brand_id`) VALUES
(6, 'some', 1000, 'Chicken-65-olc6ibhjlfr5yk58mhhns6rjl550oocz5vu7v700qa.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 6),
(7, 'Komoni', 2000, '07-small.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 11),
(8, 'corona', 20, 'menu-image4.jpg', '', 3),
(9, 'Traditional Food', 1000, 'about-image.jpg', '', 4),
(21, 'នំបញ្ចុក', 2500, 'menu-image5.jpg', '', 13),
(12, 'Covid19', 2000, '11-small.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 14),
(19, 'Khmer Cham', 12, 'menu-image1.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown pr', 16),
(14, 'some', 3000, 'Lamb-Rogan-Josh-olc6if8wcrwb8zzs0j4625tdyomhjgrwieg5saug1e.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 6),
(22, 'Minamino', 1288, 'colorada-pueblo-chiles-brett-oconnor-flickr-1.webp', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown pr', 11),
(17, 'Khmer traditional', 3000, '04-large.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown pr', 1),
(16, 'Main Food', 12, 'a08c805593834e9da16fbe78_893x595.webp', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 10),
(23, 'Fokogi', 1200, 'menu-image3.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown pr', 11),
(24, 'Covid20', 23, 'menu-image1.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 5),
(27, 'Idol Angkor', 120, 'RaT-bg.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 8),
(25, 'Tea', 150, '3.jpg', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin profe', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `menu_item_id` int(50) NOT NULL,
  `menu_item_name` varchar(100) NOT NULL,
  `menu_item_order` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `menu_item_name`, `menu_item_order`) VALUES
(9, 'Contact Us', 5),
(3, 'About Us', 3),
(4, 'Gallery', 2),
(11, 'Setting', 3),
(12, 'Our Team', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `cate_brand`
--
ALTER TABLE `cate_brand`
  ADD PRIMARY KEY (`cate_brand_id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chef_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cate_brand`
--
ALTER TABLE `cate_brand`
  MODIFY `cate_brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `menu_item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

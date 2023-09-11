-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 05:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `Name` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`Name`, `Password`) VALUES
('admin@123', '$2y$10$JY/y3WpTkvP52KvWzDKcbeRt22EVjR5byNoQUfzaarsrwr8W6juqm');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `status`, `image`) VALUES
(1, 'Montblanc', 1, '79040828_logo-vector-montblanc.jpg'),
(2, 'NOVIUM', 1, '36251025_950b46eef090-brandlogo1-16742365.jpg'),
(3, 'DUCATI', 1, '89199324_Ducati-Logo-Vector-scaled.jpg'),
(4, 'CROSS', 1, '62483496_Cross-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart1`
--

CREATE TABLE `cart1` (
  `cart_id` int(40) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart1`
--

INSERT INTO `cart1` (`cart_id`, `p_id`, `p_name`, `brand_id`, `price`, `image`) VALUES
(3, 19, '128467 Meisterstück LeGrand Around The World In 80 Days Fountain Pen (14K Fine) - Anthracite With Gold Trims', 1, 86000, '72975583_4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

CREATE TABLE `cart2` (
  `cart_id` int(40) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart2`
--

INSERT INTO `cart2` (`cart_id`, `p_id`, `p_name`, `brand_id`, `price`, `image`) VALUES
(2, 19, '128467 Meisterstück', 1, 86000, '72975583_4.webp'),
(3, 18, '128475 Meisterstück', 1, 14680, '63540709_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart3`
--

CREATE TABLE `cart3` (
  `cart_id` int(40) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `query` varchar(2000) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `email`, `subject`, `query`, `time`) VALUES
(1, 'sunny@gmail.com', 'nice pens', 'sab badhiya h', '2023-09-07 15:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(40) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(12) NOT NULL,
  `u_id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_table1`
--

CREATE TABLE `order_table1` (
  `order_id` int(40) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(12) NOT NULL,
  `u_id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table1`
--

INSERT INTO `order_table1` (`order_id`, `brand_id`, `p_name`, `image`, `price`, `u_id`, `username`, `email`, `phone_no`, `address`, `time`) VALUES
(1, 1, '128475 Meisterstück Classique ', '63540709_3.jpg', 14680, 1, 'Abhishek', 'abhi@gmail.com', 9315887944, 'delhi', '2023-09-07 15:17:07'),
(2, 1, '128467 Meisterstück LeGrand Ar', '72975583_4.webp', 86000, 1, 'Abhishek', 'abhi@gmail.com', 9315887944, 'delhi', '2023-09-07 15:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_table2`
--

CREATE TABLE `order_table2` (
  `order_id` int(40) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(12) NOT NULL,
  `u_id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table2`
--

INSERT INTO `order_table2` (`order_id`, `brand_id`, `p_name`, `image`, `price`, `u_id`, `username`, `email`, `phone_no`, `address`, `time`) VALUES
(1, 3, 'Black Trofeo Ballpoint Pen', '18600373_2.jpeg', 6248, 2, 'sunny', 'sunny@gmail.com', 56161551, 'as/paschim vihar delhi', '2023-09-07 15:56:15'),
(2, 1, '128475 Meisterstück Classique ', '63540709_3.jpg', 14680, 2, 'sunny', 'sunny@gmail.com', 56161551, 'as/paschim vihar delhi', '2023-09-07 16:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_table3`
--

CREATE TABLE `order_table3` (
  `order_id` int(40) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(12) NOT NULL,
  `u_id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table3`
--

INSERT INTO `order_table3` (`order_id`, `brand_id`, `p_name`, `image`, `price`, `u_id`, `username`, `email`, `phone_no`, `address`, `time`) VALUES
(1, 4, 'Century II Transluscent Green ', '72886916_4.jpeg', 9368, 3, 'anuj', 'aNUJ@GMAIL.COM', 78945612302, 'sultanpuri', '2023-09-07 16:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `long_desc` varchar(2000) NOT NULL,
  `specification` varchar(3000) NOT NULL,
  `features` varchar(3000) NOT NULL,
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `brand_id`, `p_name`, `mrp`, `price`, `qty`, `image`, `status`, `short_desc`, `long_desc`, `specification`, `features`, `count`) VALUES
(1, 4, 'Century II Medalist', 6200, 4960, 1, '43751976_1.jpeg', 1, 'Writing will be much more fun with this amazing pen. This century II medalist silver ballpoint pen by Cross offers a comfortable and seamless writing experience. Its slim tip flows butter-smooth ink, while its sleek body offers an easy grip. This pen is crafted with care from metal. Besides, its amazing ink flow technique ensures a consistent thickness of writing with smudge-proof ink.', 'Writing will be much more fun with this amazing pen. This century II medalist silver ballpoint pen by Cross offers a comfortable and seamless writing experience. Its slim tip flows butter-smooth ink, while its sleek body offers an easy grip. This pen is crafted with care from metal. Besides, its amazing ink flow technique ensures a consistent thickness of writing with smudge-proof ink.', 'COLOR\r\nSilver\r\nMATERIAL TYPE\r\nMetal\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 'COLOR\r\nSilver\r\nMATERIAL TYPE\r\nMetal\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 0),
(2, 4, 'Bailey Black', 5700, 4560, 1, '53677811_2.jpeg', 1, 'Write your bright destiny with this fountain pen from Cross. Its finest nib gives you writing flow as smooth as butter. Made with superior quality metal, it has got a smooth finish for your ease of gripping. Moreover, it comes in a black hue that adds on to its beauty.', 'Write your bright destiny with this fountain pen from Cross. Its finest nib gives you writing flow as smooth as butter. Made with superior quality metal, it has got a smooth finish for your ease of gripping. Moreover, it comes in a black hue that adds on to its beauty.', ' COLOR\r\nBlack\r\nMATERIAL TYPE\r\nMetal\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nFountain Pen', 'COLOR\r\nBlack\r\nMATERIAL TYPE\r\nMetal\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nFountain Pen', 0),
(3, 4, 'Bailey Fountain', 3200, 2719, 1, '85380679_3.jpeg', 1, 'Endlessly elegant, this fountain pen from Cross will be a perfect gifting option for your dear one. Made with care using high-quality resin, it assures long years of usage. It is sleek, modern and fun to take and write with no matter wherever you are.', 'Endlessly elegant, this fountain pen from Cross will be a perfect gifting option for your dear one. Made with care using high-quality resin, it assures long years of usage. It is sleek, modern and fun to take and write with no matter wherever you are.', 'COLOR\r\nTeal & Gold\r\nMATERIAL TYPE\r\nResin\r\nWRITING INSTRUMENT TYPE\r\nFountain Pen', 'COLOR\r\nTeal & Gold\r\nMATERIAL TYPE\r\nResin\r\nWRITING INSTRUMENT TYPE\r\nFountain Pen', 0),
(4, 4, 'Transluscent ', 11760, 9368, 1, '72886916_4.jpeg', 1, 'A wonderful way to make your loved one feel special, present this roller ball pen from Cross on their special day. Designed to perfection, this writing instrument will be a perfect companion for working professionals.', 'A wonderful way to make your loved one feel special, present this roller ball pen from Cross on their special day. Designed to perfection, this writing instrument will be a perfect companion for working professionals.\r\n COLOR\r\nGreen\r\nFEATURE1\r\nLifetime Mechanical Guarantee\r\nMATERIAL TYPE\r\nBrass\r\nMULTIPACK CONTENTS\r\nNo\r\nWRITING INSTRUMENT TYPE\r\nRollerball', ' COLOR\r\nGreen\r\nFEATURE1\r\nLifetime Mechanical Guarantee\r\nMATERIAL TYPE\r\nBrass\r\nMULTIPACK CONTENTS\r\nNo\r\nWRITING INSTRUMENT TYPE\r\nRollerball', 'COLOR\r\nGreen\r\nFEATURE1\r\nLifetime Mechanical Guarantee\r\nMATERIAL TYPE\r\nBrass\r\nMULTIPACK CONTENTS\r\nNo\r\nWRITING INSTRUMENT TYPE\r\nRollerball', 1),
(5, 3, 'Red Trofeo', 8979, 6248, 1, '17333297_1.jpeg', 1, 'More than a pen, a brand statement. The Ducati Corse shield adorn the top of the ballpoint pen with a colored resin triangular pin that shapes the entire pen cap, making this product unique. The clip is itself inspired by motorbike vent and a small italian flag complete the design at half lenght. All very sporty, all very unique.', 'More than a pen, a brand statement. The Ducati Corse shield adorn the top of the ballpoint pen with a colored resin triangular pin that shapes the entire pen cap, making this product unique. The clip is itself inspired by motorbike vent and a small italian flag complete the design at half lenght. All very sporty, all very unique.', ' COLLECTION NAME\r\nTrofeo\r\nCOLOR\r\nRed\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 'COLLECTION NAME\r\nTrofeo\r\nCOLOR\r\nRed\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 0),
(6, 3, 'Black Trofeo', 8925, 6248, 1, '18600373_2.jpeg', 1, 'More than a pen, a brand statement. The Ducati Corse shield adorn the top of the ballpoint pen with a colored resin triangular pin that shapes the entire pen cap, making this product unique. The clip is itself inspired by motorbike vent and a small italian flag complete the design at half lenght. All very sporty, all very unique.', 'More than a pen, a brand statement. The Ducati Corse shield adorn the top of the ballpoint pen with a colored resin triangular pin that shapes the entire pen cap, making this product unique. The clip is itself inspired by motorbike vent and a small italian flag complete the design at half lenght. All very sporty, all very unique.\r\nCOLLECTION NAME\r\nTrofeo\r\nCOLOR\r\nBlack\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', ' COLLECTION NAME\r\nTrofeo\r\nCOLOR\r\nBlack\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 'COLLECTION NAME\r\nTrofeo\r\nCOLOR\r\nBlack\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 3),
(7, 3, 'Townsend Blue', 18795, 15500, 1, '55410647_3.jpeg', 1, 'An excellent gift for your dear ones, this blue rollerball pen from Cross ensures a smooth writing experience. Ideal for both students and professionals, this pen is crafted with care using superior quality metal that gives a good finish and prevents fingers from slipping off. Moreover, its fine nib ensures stress-free writing for hours.', 'An excellent gift for your dear ones, this blue rollerball pen from Cross ensures a smooth writing experience. Ideal for both students and professionals, this pen is crafted with care using superior quality metal that gives a good finish and prevents fingers from slipping off. Moreover, its fine nib ensures stress-free writing for hours.', ' COLOR\r\nBlue\r\nMATERIAL TYPE\r\nMetal\r\nWRITING INSTRUMENT TYPE\r\nRoller Ball', 'COLOR\r\nBlue\r\nMATERIAL TYPE\r\nMetal\r\nWRITING INSTRUMENT TYPE\r\nRoller Ball', 0),
(8, 3, 'Townsend  ', 12660, 10900, 1, '67756406_4.jpeg', 1, 'A perfect blend of performance and stylish look, this silver ballpoint pen from Cross will offer a smooth flow of ink while writing. Ideal for both students and professionals, this pen is crafted with care using superior quality metal that gives a good finish and prevents fingers from slipping off. Moreover, its fine nib ensures stress-free writing for hours.', 'A perfect blend of performance and stylish look, this silver ballpoint pen from Cross will offer a smooth flow of ink while writing. Ideal for both students and professionals, this pen is crafted with care using superior quality metal that gives a good finish and prevents fingers from slipping off. Moreover, its fine nib ensures stress-free writing for hours.', ' COLOR\r\nSilver\r\nMATERIAL TYPE\r\nMetal\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 'COLOR\r\nSilver\r\nMATERIAL TYPE\r\nMetal\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 0),
(12, 2, 'ROBERTO CAVALLI 1', 18500, 14680, 1, '77863397_2.jpeg', 1, 'Write your thoughts with this ballpoint pen from Roberto Cavalli. It is gold-plated which renders the pen an amazing shine. If you are thinking of gifting something to your teacher or parent on their special days, this ballpoint pen is a striking choice.', 'Write your thoughts with this ballpoint pen from Roberto Cavalli. It is gold-plated which renders the pen an amazing shine. If you are thinking of gifting something to your teacher or parent on their special days, this ballpoint pen is a striking choice.', ' COLOR\r\nBlack & Gold\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 'COLOR\r\nBlack & Gold\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 0),
(13, 2, 'ROBERTO CAVALLI', 18999, 15800, 1, '20956048_1.jpeg', 1, 'Write your thoughts with this ballpoint pen from Roberto Cavalli. It is gold-plated which renders the pen an amazing shine. If you are thinking of gifting something to your teacher or parent on their special days, this ballpoint pen is a striking choice.', 'COLOR\r\nBlack & Gold\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen\r\nWrite your thoughts with this ballpoint pen from Roberto Cavalli. It is gold-plated which renders the pen an amazing shine. If you are thinking of gifting something to your teacher or parent on their special days, this ballpoint pen is a striking choice.', ' COLOR\r\nBlack & Gold\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 'COLOR\r\nBlack & Gold\r\nMATERIAL TYPE\r\nStainless Steel\r\nNET QUANTITY\r\n1\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen', 0),
(14, 2, 'Hoverpen ', 14000, 12999, 1, '29349490_1.jpeg', 1, 'Hoverpen 1.0 from Novium is a unique and stylish writing instrument. It is durable and corrosion-resistant. The pen has an ergonomic design that makes it comfortable to write with for long periods of time. It also features a floating design that allows it to stand upright on its own. It is a great gift for anyone who loves unique and functional writing instruments.', 'Hoverpen 1.0 from Novium is a unique and stylish writing instrument. It is durable and corrosion-resistant. The pen has an ergonomic design that makes it comfortable to write with for long periods of time. It also features a floating design that allows it to stand upright on its own. It is a great gift for anyone who loves unique and functional writing instruments.\r\nCOLOR\r\nShining Silver\r\nFEATURE1\r\nThe Hoverpen 1.0 Shining Silver Titanium Ballpoint Pen is made from titanium, which is a strong and durable material that is also corrosion-resistant. The pen is available in a variety of colours, including pitch black, which is a sleek and sophisticated colour that will look great on any desk.\r\nFEATURE2\r\nThe Hoverpen is 5.5 inches long and 0.5 inches in diameter. This makes it a comfortable size to hold and use. This makes it a lightweight pen that is easy to carry around.\r\nFEATURE3\r\nThe Hoverpen uses a magnetic field to levitate and spin on its own. This is made possible by the pen\'s unique design, which includes a small magnet in the pen and a larger magnet in the base.\r\nMATERIAL TYPE\r\nTitanium\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen\r\n', ' COLOR\r\nShining Silver\r\nFEATURE1\r\nThe Hoverpen 1.0 Shining Silver Titanium Ballpoint Pen is made from titanium, which is a strong and durable material that is also corrosion-resistant. The pen is available in a variety of colours, including pitch black, which is a sleek and sophisticated colour that will look great on any desk.\r\nFEATURE2\r\nThe Hoverpen is 5.5 inches long and 0.5 inches in diameter. This makes it a comfortable size to hold and use. This makes it a lightweight pen that is easy to carry around.\r\nFEATURE3\r\nThe Hoverpen uses a magnetic field to levitate and spin on its own. This is made possible by the pen\'s unique design, which includes a small magnet in the pen and a larger magnet in the base.\r\nMATERIAL TYPE\r\nTitanium\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen\r\n', 'COLOR\r\nShining Silver\r\nFEATURE1\r\nThe Hoverpen 1.0 Shining Silver Titanium Ballpoint Pen is made from titanium, which is a strong and durable material that is also corrosion-resistant. The pen is available in a variety of colours, including pitch black, which is a sleek and sophisticated colour that will look great on any desk.\r\nFEATURE2\r\nThe Hoverpen is 5.5 inches long and 0.5 inches in diameter. This makes it a comfortable size to hold and use. This makes it a lightweight pen that is easy to carry around.\r\nFEATURE3\r\nThe Hoverpen uses a magnetic field to levitate and spin on its own. This is made possible by the pen\'s unique design, which includes a small magnet in the pen and a larger magnet in the base.\r\nMATERIAL TYPE\r\nTitanium\r\nWRITING INSTRUMENT TYPE\r\nBallpoint Pen\r\n', 1),
(15, 1, 'Starwalke', 57200, 59200, 1, '26964584_2.webp', 1, 'The new StarWalker is about walking amid the stars. It\'s about The new StarWalker is about walking amidst the stars. It\'s about exploring the cosmos and foreign galaxies, about being part of one of the most mysterious and powerful of humankinds adventures: space exploration. The collection\'s new design celebrates the immense emotion, described by all space travellers, of seeing our blue planet floating in the vast expanse of space. The unique StarWalker emblem technology features a blue translucent dome beneath the Montblanc emblem, reminiscent of the Earth emerging above the lunar horizon. The StarWalker Metal comes with a platinum-coated barrel and fittings.', 'The new StarWalker is about walking amid the stars. It\'s about The new StarWalker is about walking amidst the stars. It\'s about exploring the cosmos and foreign galaxies, about being part of one of the most mysterious and powerful of humankinds adventures: space exploration. The collection\'s new design celebrates the immense emotion, described by all space travellers, of seeing our blue planet floating in the vast expanse of space. The unique StarWalker emblem technology features a blue translucent dome beneath the Montblanc emblem, reminiscent of the Earth emerging above the lunar horizon. The StarWalker Metal comes with a platinum-coated barrel and fittings.\r\n Engravable:	Engravable\r\nWi Pen Weight:	57.88\r\nPen Type:	Ballpoint Pen\r\nPre Installed Ink Colour:	Black\r\nCap Mechanism:	Twist\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Silver\r\nClip Color:	Platinum\r\nBarrel Material:	Platinum\r\nClip Material:	Platinum', ' Engravable:	Engravable\r\nWi Pen Weight:	57.88\r\nPen Type:	Ballpoint Pen\r\nPre Installed Ink Colour:	Black\r\nCap Mechanism:	Twist\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Silver\r\nClip Color:	Platinum\r\nBarrel Material:	Platinum\r\nClip Material:	Platinum', 'Engravable:	Engravable\r\nWi Pen Weight:	57.88\r\nPen Type:	Ballpoint Pen\r\nPre Installed Ink Colour:	Black\r\nCap Mechanism:	Twist\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Silver\r\nClip Color:	Platinum\r\nBarrel Material:	Platinum\r\nClip Material:	Platinum', 0),
(16, 5131, '128475 Meisterstück Classique', 51600, 53600, 1, '96747222_3.jpg', 1, 'The Meisterstück \'Around The World In 80 Days\' collection by Montblanc is inspired by Jules Verne\'s famous adventure novel. The Classique Ballpoint pen in anthracite precious resin draws upon the second leg of the journey, which spans from Bombay to Yokohama.\r\n\r\nTo symbolise this part of the adventure, the cap of the pen showcases a cartouche featuring a depiction of a majestic elephant, representing the main characters\' mode of transportation during this leg of the journey. The clip of the pen is adorned with a red lacquered diamond card suit.', 'The Meisterstück \'Around The World In 80 Days\' collection by Montblanc is inspired by Jules Verne\'s famous adventure novel. The Classique Ballpoint pen in anthracite precious resin draws upon the second leg of the journey, which spans from Bombay to Yokohama.\r\n\r\nTo symbolise this part of the adventure, the cap of the pen showcases a cartouche featuring a depiction of a majestic elephant, representing the main characters\' mode of transportation during this leg of the journey. The clip of the pen is adorned with a red lacquered diamond card suit.\r\nCollections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	20.86 g\r\nPen Length:	139 mm\r\nPen Mechanism:	Twist\r\nPen Type:	Ballpoint Pen\r\nGrip Diameter:	12.5 mm\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	20.86 g', ' Collections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	20.86 g\r\nPen Length:	139 mm\r\nPen Mechanism:	Twist\r\nPen Type:	Ballpoint Pen\r\nGrip Diameter:	12.5 mm\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	20.86 g', 'Collections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	20.86 g\r\nPen Length:	139 mm\r\nPen Mechanism:	Twist\r\nPen Type:	Ballpoint Pen\r\nGrip Diameter:	12.5 mm\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	20.86 g', 0),
(18, 1, '128475 Meisterstück', 18500, 14680, 1, '63540709_3.jpg', 1, 'The Meisterstück \'Around The World In 80 Days\' collection by Montblanc is inspired by Jules Verne\'s famous adventure novel. The Classique Ballpoint pen in anthracite precious resin draws upon the second leg of the journey, which spans from Bombay to Yokohama.\r\n\r\nTo symbolise this part of the adventure, the cap of the pen showcases a cartouche featuring a depiction of a majestic elephant, representing the main characters\' mode of transportation during this leg of the journey. The clip of the pen is adorned with a red lacquered diamond card suit.', 'The Meisterstück \'Around The World In 80 Days\' collection by Montblanc is inspired by Jules Verne\'s famous adventure novel. The Classique Ballpoint pen in anthracite precious resin draws upon the second leg of the journey, which spans from Bombay to Yokohama.\r\n\r\nTo symbolise this part of the adventure, the cap of the pen showcases a cartouche featuring a depiction of a majestic elephant, representing the main characters\' mode of transportation during this leg of the journey. The clip of the pen is adorned with a red lacquered diamond card suit.', ' Collections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	20.86 g\r\nPen Length:	139 mm\r\nPen Mechanism:	Twist\r\nPen Type:	Ballpoint Pen\r\nGrip Diameter:	12.5 mm\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	20.86 g\r\n', 'Collections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	20.86 g\r\nPen Length:	139 mm\r\nPen Mechanism:	Twist\r\nPen Type:	Ballpoint Pen\r\nGrip Diameter:	12.5 mm\r\nFilling Mechanism:	Refill\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	20.86 g\r\n', 2),
(19, 1, '128467 Meisterstück', 89100, 86000, 1, '72975583_4.webp', 1, '                    \r\nThe Meisterstück \'Around The World In 80 Days\' collection takes inspiration from Jules Verne\'s famous adventure novel. This LeGrand Fountain Pen is crafted with anthracite precious resin and draws upon the second leg of the journey, which spans from Bombay to Yokohama. On the cap of the pen, you can find a cartouche featuring a depiction of a majestic elephant, symbolising the mode of transportation used during this part of the adventure. The clip of the pen is adorned with a red lacquered diamond card suit, reflecting Mr. Fogg\'s daring wager to complete the entire journey in 80 days. The cone is intricately engraved with a pattern inspired by Princess Aouda\'s jewellery and the card suits, further emphasising Mr. Fogg\'s ambitious journey.\r\n\r\nThe writing instrument is adorned with a hand-crafted 14K gold nib. This nib is engraved with a hot air balloon and depicts Mr. Fogg\'s departure from Bombay at 20:00 on 20 October and his departure from Yokohama at 18:00 on 14 November.        ', '\r\nThe Meisterstück \'Around The World In 80 Days\' collection takes inspiration from Jules Verne\'s famous adventure novel. This LeGrand Fountain Pen is crafted with anthracite precious resin and draws upon the second leg of the journey, which spans from Bombay to Yokohama. On the cap of the pen, you can find a cartouche featuring a depiction of a majestic elephant, symbolising the mode of transportation used during this part of the adventure. The clip of the pen is adorned with a red lacquered diamond card suit, reflecting Mr. Fogg\'s daring wager to complete the entire journey in 80 days. The cone is intricately engraved with a pattern inspired by Princess Aouda\'s jewellery and the card suits, further emphasising Mr. Fogg\'s ambitious journey.\r\n\r\nThe writing instrument is adorned with a hand-crafted 14K gold nib. This nib is engraved with a hot air balloon and depicts Mr. Fogg\'s departure from Bombay at 20:00 on 20 October and his departure from Yokohama at 18:00 on 14 November.', ' Collections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	30.18 g\r\nPen Length:	146 mm\r\nPen Mechanism:	Cap\r\nPen Type:	Fountain Pen\r\nGrip Diameter:	15.5 mm\r\nFilling Mechanism:	Converter\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	30.18 g', 'Collections:	Around the world 80 days\r\nEngravable:	No\r\nProduct Material:	Precious Resin\r\nWi Pen Weight:	30.18 g\r\nPen Length:	146 mm\r\nPen Mechanism:	Cap\r\nPen Type:	Fountain Pen\r\nGrip Diameter:	15.5 mm\r\nFilling Mechanism:	Converter\r\nBarrel Color:	Dark Grey\r\nCap Color:	Dark Grey\r\nClip Color:	Gold\r\nBarrel Material:	Precious Resin\r\nClip Material:	Gold\r\nProduct Finish:	Matte\r\nWeight:	30.18 g', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` bigint(10) NOT NULL,
  `phone_no` bigint(16) NOT NULL,
  `d_o_b` date NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `email`, `address`, `city`, `pincode`, `phone_no`, `d_o_b`, `gender`) VALUES
(1, 'Abhishek', '$2y$10$yVIqFJPePJMFvDQ6aR5.ieCRDOUR23vBH55SkILbhbRJnxdvHSDn2', 'abhi@gmail.com', 'delhi', 'Delhi', 110086, 9315887944, '2005-06-01', 'male'),
(2, 'sunny', '$2y$10$q9OWpPXzGByvdQluKzn/weA588OqFzGOqNC4446x71ZX5ANvAqcv6', 'sunny@gmail.com', 'as/paschim vihar delhi', 'North West Delhi', 110086, 56161551, '2006-11-01', 'male'),
(3, 'anuj', '$2y$10$5Ts8w8ijZ/WFbhCeLcyPJudHZyfr4OBYDf3QVlm/pCl18JFmo7r1C', 'aNUJ@GMAIL.COM', 'sultanpuri', 'yoganda', 110059, 78945612302, '1998-05-07', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand` (`brand`);

--
-- Indexes for table `cart1`
--
ALTER TABLE `cart1`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart2`
--
ALTER TABLE `cart2`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart3`
--
ALTER TABLE `cart3`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_table1`
--
ALTER TABLE `order_table1`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_table2`
--
ALTER TABLE `order_table2`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_table3`
--
ALTER TABLE `order_table3`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_name` (`p_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart1`
--
ALTER TABLE `cart1`
  MODIFY `cart_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart2`
--
ALTER TABLE `cart2`
  MODIFY `cart_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart3`
--
ALTER TABLE `cart3`
  MODIFY `cart_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table1`
--
ALTER TABLE `order_table1`
  MODIFY `order_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_table2`
--
ALTER TABLE `order_table2`
  MODIFY `order_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_table3`
--
ALTER TABLE `order_table3`
  MODIFY `order_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

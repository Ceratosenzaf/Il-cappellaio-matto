-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 05:09 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `il-cappellaio-matto`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text,
  `email` text NOT NULL,
  `password` text,
  `address` text,
  `house_number` text,
  `city` text,
  `postal_code_number` int(11) DEFAULT NULL,
  `state` text,
  `country` text,
  `card_number` text,
  `card_owner_name` text,
  `card_expiry_month` int(11) DEFAULT NULL,
  `card_expiry_year` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `name`, `surname`, `email`, `password`, `address`, `house_number`, `city`, `postal_code_number`, `state`, `country`, `card_number`, `card_owner_name`, `card_expiry_month`, `card_expiry_year`) VALUES
(1, 'gianni', 'serra', 'gianni@serra.it', 'sogianni', 'via willy il coyote', '88', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(2, 'lucrezia', NULL, 'lu@cre.zia', 'lulu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'lillo', 'lolli', 'li@lo.it', NULL, 'via osas', '12', 'chioggia', 33556, 'veneto', 'italy', '2343424242', 'lillo lolli', 12, 1998),
(4, 'giggi', 'proietti', 'ggiggggi@pro.iet', NULL, 'via fausta', '7', 'roma', 3302, 'lazio', 'italy', '334342423425', 'proiettittitititi giggggi', 11, 2100),
(5, 'sushi', 'swap', 'jesuischarlie@jadore.dior', NULL, 'vie de la paix', '17', 'egalite', 32892, 'fraternite', 'france', '234234234234', 'pancake swap', 23, 3424),
(6, 'sushi', 'swap', 'jesuischarlie@jadore.dior', NULL, 'vie de la paix', '17', 'egalite', 32892, 'fraternite', 'france', '234234234234', 'pancake swap', 23, 3424),
(7, 'sushi', 'swap', 'jesuischarlie@jadore.dior', NULL, 'vie de la paix', '17', 'egalite', 32892, 'fraternite', 'france', '234234234234', 'pancake swap', 23, 3424),
(8, 'fg', 'sg', 'sfdgsd@gsd.gdf', NULL, 'ajlÃ²dfjlk', '26', 'asfÃ²ldsa', 3243, 'laskdf', 'ljsdf', '329847328947', 'jdksafhsak', 12, 3289),
(9, 'fg', 'sg', 'sfdgsd@gsd.gdf', NULL, 'ajlÃ²dfjlk', '26', 'asfÃ²ldsa', 3243, 'laskdf', 'ljsdf', '329847328947', 'jdksafhsak', 12, 3289),
(10, 'fg', 'sg', 'sfdgsd@gsd.gdf', NULL, 'ajlÃ²dfjlk', '26', 'asfÃ²ldsa', 3243, 'laskdf', 'ljsdf', '329847328947', 'jdksafhsak', 12, 3289),
(11, 'fg', 'sg', 'sfdgsd@gsd.gdf', NULL, 'ajlÃ²dfjlk', '26', 'asfÃ²ldsa', 3243, 'laskdf', 'ljsdf', '329847328947', 'jdksafhsak', 12, 3289),
(12, 'fgtds', 'gdfgfd', 'gdsdf@gdf.g', NULL, 'Ã²ldsjflÃ²k', '36', 'dslÃ²afk', 2345, 'klafj', 'kdks', '4968486', 'dÃ Ã²saflk lsdfk', 11, 2112),
(13, 'qwer', 'wqer', 'qweroiuypfckxnmx.dsfsdf@sdafds.dsfa', NULL, 'asdfas', '78', 'fsdafas', 35648, 'fadsf', 'fsdfa', '374537878783', 'afsdasf', 42, 4424),
(14, 'dsg', 'fdg', 'zxcvbnm.dslafj@gmail.com', NULL, 'ldksajfsdoai', '23', 'lsaifjaslk', 2203, 'ksdlfa', 'lksdjale', '3290478234902', 'ksdflajk', 2, 2333),
(15, 'a', 'a', 'sfkjsd@fas.ds', NULL, 'adks', '32', 'dkflsja', 25223, 'slkafj', 'lkdss', '29852957298', 'jakaf sdkja', 11, 1223);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `brand` text,
  `image_path` text,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `name`, `brand`, `image_path`, `price`, `description`) VALUES
(1, 'polo classic sport', 'Polo Ralph Lauren', 'polo-classic.jpg', '28.99', ''),
(2, 'essential aframe NY', 'New Era', 'essential-aframe.jpg', '18.99', ''),
(3, 'TWINE MLB 9FORTY', 'New Era', 'twine-new-era.jpg', '18.99', ''),
(4, 'established unisex', 'Tommy Hilfiger', 'established-tommy.jpg', '29.99', ''),
(5, 'classic sport', 'Polo Ralph Lauren', 'classic-sport.jpg', '34.99', ''),
(6, 'basic classic sport', 'Polo Ralph Lauren', 'classic-white-blue.jpg', '34.99', ''),
(7, 'tommy classic unisex', 'Tommy Hilfiger', 'tommy-classic.jpg', '32.99', ''),
(8, 'Tonal Red Bull', 'New Era', 'red-bull.jpg', '22.99', ''),
(9, 'Logo cap', 'Calvin Klein Jeans', 'calvin-k.jpg', '34.99', ''),
(10, 'Dark Logo unisex', 'Calvin Klein Jeans', 'ck-logo-dark.jpg', '33.99', ''),
(11, 'Patch unisex', 'Calvin Klein Jeans', 'ck-patch.jpg', '36.99', ''),
(12, 'Adidas logo cap', 'Adidas Originals', 'adidas-logo.jpg', '22.99', ''),
(13, 'Classic tech ball', 'The North Face', 'north-face-logo.jpg', '25.99', ''),
(14, 'Classic nature brown', 'The North Face', 'tnf-nature.jpg', '29.99', ''),
(15, 'Baseb class', 'Adidas Originals', 'adidas-pink.jpg', '24.99', ''),
(16, 'Futura unisex minimal', 'Nike Sportswear', 'nike-minimal.jpg', '21.99', ''),
(17, 'tommy blue', 'Tommy Hilfiger', 'tommy-blue.jpg', '29.99', ''),
(18, 'Tonal aframe trucker ', 'New Era', 'bull-black.jpg', '17.99', ''),
(19, 'afternoon camp', 'Supreme', 'afternoon-multicolor.jpg', '129.99', ''),
(20, 'Spiral white', 'Anti Social Social Club', 'assc-control.jpg', '93.99', ''),
(21, 'Sta mesh navy', 'Bape', 'bape-navy.jpg', '85.99', ''),
(22, '5950 Subway ', 'Hat Club Yankee', '5950.jpg', '84.99', ''),
(23, 'Cacti heritage seal ', 'Travis Scott', 'cacti.jpg', '69.99', ''),
(24, 'Medusa unisex', 'Versace', 'medusa.jpg', '349.99', ''),
(25, 'Zanotti unisex', 'Giuseppe Zanotti', 'zanotti.jpg', '224.99', ''),
(26, 'TRESOR DE LA MER ', 'Versace', 'tresor-blue.jpg', '123.85', ''),
(27, 'TRESOR DE LA MER', 'Versace', 'tresor-pink.jpg', '123.85', ''),
(28, 'barocco unisex', 'Versace', 'barocco.jpg', '112.99', ''),
(29, 'new bond classic', 'Polo Ralph Lauren', 'polo-bear.jpg', '27.99', ''),
(30, 'weekend baseball ', 'Belstaff', 'belstaff.jpg', '67.89', ''),
(31, 'Jumping man black', 'Air jordan', 'jordan.jpg', '24.99', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum               repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam eum harum corrupti dicta, aliquam sequi voluptate quas. \r\n<br>\r\n<br>Materials: 100% cotton\r\n<br>Caution: hand wash and dry clean if possible'),
(32, 'Uncool', 'Azs Tokyo', 'uncool.jpg', '69.99', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number_of_products` int(11) NOT NULL,
  `size` varchar(2) NOT NULL,
  `address` text,
  `house_number` text,
  `city` text,
  `postal_code_number` int(11) DEFAULT NULL,
  `state` text,
  `country` text,
  `card_number` text,
  `card_owner_name` text,
  `card_expiry_month` int(11) DEFAULT NULL,
  `card_expiry_year` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `account_id`, `product_id`, `number_of_products`, `size`, `address`, `house_number`, `city`, `postal_code_number`, `state`, `country`, `card_number`, `card_owner_name`, `card_expiry_month`, `card_expiry_year`) VALUES
(1, 1, 2, 1, 'M', 'via willy il coyote', '8g', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(2, 1, 2, 1, 'M', 'via willy il coyote', '8g', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(3, 1, 2, 1, 'M', 'via willy il coyote', '8g', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(4, 1, 3, 1, 'L', 'via willy il coyote', '88', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(5, 1, 1, 34, 'L', 'via willy il coyote', '88', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(6, 1, 25, 1, 'L', 'via willy il coyote', '88', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(7, 8, 1, 1, 'M', 'ajlÃ²dfjlk', '26', 'asfÃ²ldsa', 3243, 'laskdf', 'ljsdf', '329847328947', 'jdksafhsak', 12, 3289),
(8, 12, 1, 1, 'M', 'Ã²ldsjflÃ²k', '36', 'dslÃ²afk', 2345, 'klafj', 'kdks', '4968486', 'dÃ Ã²saflk lsdfk', 11, 2112),
(9, 13, 1, 1, 'M', 'asdfas', '78', 'fsdafas', 35648, 'fadsf', 'fsdfa', '374537878783', 'afsdasf', 42, 4424),
(10, 14, 3, 1, 'M', 'ldksajfsdoai', '23', 'lsaifjaslk', 2203, 'ksdlfa', 'lksdjale', '3290478234902', 'ksdflajk', 2, 2333),
(11, 15, 17, 1, 'M', 'adks', '32', 'dkflsja', 25223, 'slkafj', 'lkdss', '29852957298', 'jakaf sdkja', 11, 1223),
(12, 1, 11, 7, 'L', 'via willy il coyote', '88', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022),
(13, 1, 8, 8, 'M', 'via willy il coyote', '88', 'cagliari', 35875, 'puglia', 'italia', '5678844521', 'gianni serra', 12, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `model_id` int(11) NOT NULL,
  `size` char(1) NOT NULL,
  `available_items` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`model_id`, `size`, `available_items`) VALUES
(31, 'S', 19),
(31, 'M', 39),
(31, 'L', 47),
(30, 'S', 9),
(30, 'M', 12),
(30, 'L', 7),
(1, 'S', 27),
(1, 'M', 22),
(1, 'L', 0),
(2, 'S', 12),
(2, 'M', 12),
(2, 'L', 7),
(3, 'S', 9),
(3, 'M', 7),
(3, 'L', 6),
(4, 'S', 15),
(4, 'M', 17),
(4, 'L', 19),
(5, 'S', 17),
(5, 'M', 17),
(5, 'L', 17),
(6, 'S', 3),
(6, 'M', 4),
(6, 'L', 5),
(7, 'S', 15),
(7, 'M', 16),
(7, 'L', 17),
(8, 'S', 19),
(8, 'M', 9),
(8, 'L', 23),
(9, 'S', 5),
(9, 'M', 9),
(9, 'L', 7),
(10, 'S', 12),
(10, 'M', 11),
(10, 'L', 6),
(11, 'S', 9),
(11, 'M', 6),
(11, 'L', 2),
(12, 'S', 22),
(12, 'M', 24),
(12, 'L', 19),
(13, 'S', 25),
(13, 'M', 27),
(13, 'L', 33),
(14, 'S', 6),
(14, 'M', 7),
(14, 'L', 4),
(15, 'S', 22),
(15, 'M', 17),
(15, 'L', 15),
(16, 'S', 19),
(16, 'M', 22),
(16, 'L', 15),
(17, 'S', 3),
(17, 'M', 6),
(17, 'L', 12),
(18, 'S', 9),
(18, 'M', 7),
(18, 'L', 5),
(19, 'S', 1),
(19, 'M', 3),
(19, 'L', 5),
(20, 'S', 9),
(20, 'M', 11),
(20, 'L', 10),
(21, 'S', 3),
(21, 'M', 4),
(21, 'L', 1),
(22, 'S', 13),
(22, 'M', 9),
(22, 'L', 14),
(23, 'S', 3),
(23, 'M', 7),
(23, 'L', 0),
(24, 'S', 1),
(24, 'M', 3),
(24, 'L', 4),
(25, 'S', 0),
(25, 'M', 0),
(25, 'L', 1),
(26, 'S', 2),
(26, 'M', 7),
(26, 'L', 4),
(27, 'S', 3),
(27, 'M', 7),
(27, 'L', 5),
(28, 'S', 1),
(28, 'M', 2),
(28, 'L', 3),
(29, 'S', 13),
(29, 'M', 9),
(29, 'L', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`model_id`,`size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

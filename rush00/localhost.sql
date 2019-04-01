-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 31, 2019 at 12:45 AM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production`
--
CREATE DATABASE IF NOT EXISTS `production` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `production`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_color` varchar(80) NOT NULL,
  `product_size` varchar(80) NOT NULL,
  `product_price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT '3',
  `brand_id` int(11) NOT NULL,
  `product_img` text NOT NULL,
  `category` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_color`, `product_size`, `product_price`, `Quantity`, `brand_id`, `product_img`, `category`) VALUES
(2, 'Oxford shirt', 'beige', 'S', 25, 1, 1, 'https://lp2.hm.com/hmgoepprod?set=source[/a2/59/a25960547936712523cc8f96b39b180c6702ca18.jpg],origin[dam],category[men_shirt_dressed_regularfit],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shirt'),
(3, 'Skinny jean destroy', 'grey', '29', 40, 3, 2, 'https://lp2.hm.com/hmgoepprod?set=source[/ef/21/ef21103f782494f9972452cb02772f041bee8c0b.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],hmver[1]&call=url[file:/product/main]', 'jeans'),
(4, 'Cotton shirt', 'white', 'S', 13, 3, 3, 'https://lp2.hm.com/hmgoepprod?set=source[/65/36/6536afec66395906a23c93c65c1108055893f009.jpg],origin[dam],category[men_shirts_casual],type[DESCRIPTIVESTILLLIFE],res[m],hmver[1]&call=url[file:/product/main]', 'shirt'),
(5, 'Denim shirt', 'blue', 'M', 30, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/02/4b/024b4f886c354d350b8d84e8fa6714d80e32f08a.jpg],origin[dam],category[men_shirts_denim],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shirt'),
(6, 'Cotton chino', 'red', '29', 50, 3, 3, 'https://lp2.hm.com/hmgoepprod?set=source[/4b/b1/4bb110d627c95eee8c1fdf2227ad0708bdb53fbc.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'jeans'),
(7, 'Slim jean', 'blue', '29', 35, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/6f/09/6f09f78393196a7ecb03decdcf2c7f36841dc439.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'jeans'),
(8, 'Slim jeans black', 'black', '29', 35, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/13/da/13da52f0c90e9b4dd1ff1098b956fe28dfd14557.jpg],origin[dam],category[men_jeans_slim],type[DESCRIPTIVESTILLLIFE],res[m],hmver[1]&call=url[file:/product/main]', 'jeans'),
(9, 'Slim fit Easy-iron', 'mixed', 'M', 30, 3, 5, 'https://lp2.hm.com/hmgoepprod?set=source[/9c/ce/9ccec8d5b75c95ead92ac2bcb7b493721fd42bda.jpg],origin[dam],category[men_shirt_dressed_slimfit],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shirt'),
(10, 'Leather sneakers', 'white', '42', 70, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/5a/be/5abeb00f96b213419c94407604d35fe8d6cf8959.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shoes'),
(11, 'Oxford shoes', 'brown', '42', 60, 3, 1, 'https://lp2.hm.com/hmgoepprod?set=source[/76/5a/765aa1715235d0601e0d443a18153dfd9cdb275f.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shoes'),
(12, 'Canvas sneakers', 'blue', '42', 25, 3, 6, 'https://lp2.hm.com/hmgoepprod?set=source[/80/f0/80f077dc60a353a851e3e9b38c082e559907bb1a.jpg],origin[dam],category[men_shoes_sneakers],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shoes'),
(13, 'Sneakers', 'black', '42', 50, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/62/a2/62a2b98d4151b68569af72e35bfc6ab5cc30de20.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shoes'),
(14, 'Casual sneakers', 'blue', '41', 30, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/d6/8c/d68c17ac1dbbb67d39b3e21c3e3ee00f5ebafa7e.jpg],origin[dam],category[men_shoes_sneakers],type[DESCRIPTIVESTILLLIFE],res[m],res[m],hmver[1]&call=url[file:/product/main]', 'shoes'),
(15, 'Cotton shirt pink', 'pink', 'S', 25, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/e9/83/e98353da4f24d7a376bd82fd933e91eca82b2b51.jpg],origin[dam],category[men_shirts_casual],type[DESCRIPTIVESTILLLIFE],res[m],hmver[1]&call=url[file:/product/main]', 'shirt'),
(16, 'Classic hoodie', 'black', 'M', 20, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/c3/74/c374c12aba52a513227bd2a44fbde9c8c633c5a7.jpg],origin[dam],category[men_hoodiessweatshirts],type[DESCRIPTIVESTILLLIFE],res[l],hmver[1]&call=url[file:/product/main]', 'sweatshirt'),
(17, 'Paramount hoodie', 'white', 'M', 20, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/e0/39/e039a2009b31a65efeee12b42210412a3e211996.jpg],origin[dam],category[men_hoodiessweatshirts],type[DESCRIPTIVESTILLLIFE],res[m],res[l],hmver[1]&call=url[file:/product/main]', 'sweatshirt'),
(18, 'Classic sweatshirt', 'grey', 'M', 20, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/3e/e8/3ee8b8f76988f39c3e468b78b217f2abb2ce8940.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],res[l],hmver[1]&call=url[file:/product/main]', 'sweatshirt'),
(20, 'Hooded sweatshirt', 'brown', 'M', 30, 3, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/96/41/96418f7d918af70f5614856f434c1caf850667f5.jpg],origin[dam],category[men_hoodiessweatshirts_hoodies],type[DESCRIPTIVESTILLLIFE],res[m],res[l],hmver[1]&call=url[file:/product/main]', 'sweatshirt'),
(21, 'Super mario sweatshirt', 'grey', 'M', 30, 1, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/88/fb/88fb4556c553c9f7c1ceaf6b3ec8f38da5956b90.jpg],origin[dam],category[men_hoodiessweatshirts_sweatshirts],type[DESCRIPTIVESTILLLIFE],res[m],res[l],hmver[1]&call=url[file:/product/main]', 'sweatshirt'),
(22, 'Skinny jeans white', 'white', '29', 30, 1, 4, 'https://lp2.hm.com/hmgoepprod?set=source[/5e/2a/5e2a67c4b1a7d12198a090e817d120c15ff4f512.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[l],hmver[1]&call=url[file:/product/main]', 'jeans');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

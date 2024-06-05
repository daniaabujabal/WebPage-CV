-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 11:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(15) NOT NULL,
  `food_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `status` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `food_id`, `user_id`, `status`) VALUES
(1, 8, 3, 'Yes'),
(2, 8, 3, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `quantity` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` enum('Pending','Moved','Delivered','') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `product_name`, `product_price`, `user_id`, `quantity`, `status`, `date`) VALUES
(16, 8, 'Koshary', '250', 3, '3', 'Moved', '2021-04-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(15) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_price` varchar(15) CHARACTER SET utf8 NOT NULL,
  `f_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_details` longtext CHARACTER SET utf8 NOT NULL,
  `file_input_1` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `f_type`, `product_details`, `file_input_1`) VALUES
(8, 'Koshary', '250', 'lunch', '                                 Egypts national dish and a widely popular street food. An Egyptian dish that originated during the mid-19th century, the dish combines Italian and Arab culinary elements. Koshary is made of rice, macaroni, and lentils mixed together, topped with a spiced tomato sauce and garlic vinegar and garnished with chickpeas and crispy fried onions. It is often served with sprinklings of garlic juice; garlic vinegar and hot sauce are optional.                            ', '332e6f1bc31d876f9e46bc448fb77b86.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `r_table`
--

CREATE TABLE `r_table` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `persons` varchar(15) NOT NULL,
  `status` enum('pending','served') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_table`
--

INSERT INTO `r_table` (`id`, `name`, `phone`, `day`, `time`, `persons`, `status`) VALUES
(1, '1', '', '20210419', '12:00', '3', 'served'),
(2, 'Nawaf', '13234234234324', 'Monday', '12-00', '3-Persons', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('active','blocked') NOT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `contact`, `address`, `email`, `password`, `status`, `type`) VALUES
(1, '', '', '', 'nawaf@gmail.com', '1234', 'active', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_table`
--
ALTER TABLE `r_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `r_table`
--
ALTER TABLE `r_table`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


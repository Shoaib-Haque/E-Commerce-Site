-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 10:29 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(11, 'Laptop'),
(12, 'Headphone'),
(13, 'Camera'),
(14, 'Shirt'),
(15, 'Baby'),
(16, 'Book'),
(17, 'iphone');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `name`, `email`, `subject`, `message`) VALUES
(14, 'Shoaib', 'shoaibhaque7@gmail.com', 'Test', 'test'),
(15, 'Shoaib', 'shoaibhaque7@gmail.com', 'DEFENCE DAY', 'DEFENCE DAY');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(11, 3000, '4123', 'Delivered', 'BAN'),
(12, 6000, '4123', 'Delivered', 'BAN'),
(13, 9000, '4123', 'Delivered', 'BAN'),
(15, 0, '4123', 'Pending', 'BAN'),
(16, 0, '4123', 'Pending', 'BAN'),
(17, 0, '4123', 'Pending', 'BAN'),
(18, 0, '4123', 'Pending', 'BAN'),
(19, 0, '4123', 'Pending', 'BAN'),
(20, 0, '4123', 'Delivered', 'BAN');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_image`) VALUES
(5, 'Men Casual Shirt ', 14, 3000, 0, '', 'jpeg.jpg'),
(6, 'PHP Book    ', 16, 150, 9, '', 'download (1).jpg'),
(7, 'Baby Dress', 15, 2000, 9, '', '61LMHUUe5AL._UX679_.jpg'),
(8, 'DSLR', 13, 30000, 8, '', 'canon-eos-rebel-t6i-dslr-camera-with-18-55mm-is-stm-len-d-2018051817120549_1202224.jpg'),
(9, 'Laptop', 11, 55000, 12, '', '81FuDweP5XL._SX466_.jpg'),
(10, 'Headphone ', 12, 1200, 10, '', 'zdownload (1).jpg'),
(11, 'iphone 8', 17, 80000, 5, '', 'download (1).jpg'),
(12, 'Baby Dress   ', 15, 3000, 10, '', '61O8IqnHFnL._UX522_.jpg'),
(13, 'T shirt ', 14, 600, 4, '', 'preview.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_title`, `product_quantity`) VALUES
(11, 5, 11, 3000, 'Men Casual Shirt ', 1),
(12, 7, 12, 2000, 'Baby Dress', 3),
(13, 5, 13, 3000, 'Men Casual Shirt ', 3),
(14, 6, 14, 150, 'PHP Book ', 2),
(15, 14, 15, 2000, 'Baby Dress', 3),
(16, 13, 16, 600, 'T shirt ', 1),
(17, 13, 17, 600, 'T shirt ', 1),
(18, 6, 18, 150, 'PHP Book ', 1),
(19, 6, 19, 150, 'PHP Book   ', 1),
(20, 8, 20, 30000, 'DSLR', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'sabbir', 'sabbir@gmail.com', '1234'),
(2, 'admin', 'rana@gmail.com', '1234'),
(4, 'admin', 'admin@gmail.com', 'admin'),
(6, 'shoaib', 'shoaibhaque7@gmail.com', '1234'),
(7, 'demo', 'sarminnila111@gmail.com', 'demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

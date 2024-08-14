-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 14, 2024 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hkartdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `1` int(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`1`, `role`, `email`, `password`, `user_name`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(2, 'customer', 'customer@gmail.com', 'customer', 'customer1'),
(10, 'customer', 'customer2@gmail.com', 'customer2', 'customer2'),
(11, 'customer', 'rahul@gmail.com', 'rahul', 'rahul'),
(12, 'customer', 'preethi@gmail.com', 'preethi', 'preethi'),
(13, 'customer', 'jacob@gmail.com', 'jacob', 'jacob');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `order_status` varchar(500) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_price`, `order_status`, `email`) VALUES
(24, 'rolex watch', '80000', 'cancelled', 'customer@gmail.com'),
(28, 'iphone 15', '85001', 'shipped', 'customer2@gmail.com'),
(29, 'nike shoe', '2000', 'cancelled', 'customer@gmail.com'),
(32, 'iphone 15', '85001', 'order confirm', 'rahul@gmail.com'),
(33, 'iphone 15', '85001', 'ordered', 'customer@gmail.com'),
(37, 'mac 2 pro', '120000', '', 'rahul@gmail.com'),
(38, 'fan', '3000', 'ordered', 'rahul@gmail.com'),
(39, 'mac 2 pro', '120000', 'cancelled', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hkartproducts`
--

CREATE TABLE `hkartproducts` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_contents` varchar(3000) NOT NULL,
  `product_img` varchar(200) NOT NULL,
  `active` varchar(100) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hkartproducts`
--

INSERT INTO `hkartproducts` (`id`, `product_name`, `product_contents`, `product_img`, `active`, `product_price`) VALUES
(6, 'iphone 15', 'latest iphone with free airbuds', 'bagus-hernawan-A6JxK37IlPo-unsplash.jpg', '1', '85001'),
(7, 'mac 2 pro', 'buy at rs:', 'yuhaimedia-ykI7BeSWgMo-unsplash.jpg', '1', '120000'),
(14, 'nike shoe', 'genuine quality', 'structure-25-road-running-shoes-pxbP4c.jpg', '1', '2000'),
(18, 'rolex watch', '10yrs warrranty', 'whatsapp-image-2022-12-30-at-6-47-52-pm-1-.jpeg', '1', '80000'),
(19, 'fan', 'fast fan', '612yk-TB+GL._AC_UF894,1000_QL80_.jpg', '1', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `order_status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`1`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hkartproducts`
--
ALTER TABLE `hkartproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hkartproducts`
--
ALTER TABLE `hkartproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

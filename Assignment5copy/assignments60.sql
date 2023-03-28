-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2023 at 06:40 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignments60`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addcart`
--

INSERT INTO `addcart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 18, 1, 1),
(2, 18, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike`
--

CREATE TABLE `like_dislike` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `like_count` int NOT NULL DEFAULT '0',
  `dislike` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `like_dislike`
--

INSERT INTO `like_dislike` (`id`, `user_id`, `product_id`, `like_count`, `dislike`) VALUES
(2, 18, 1, 0, 0),
(3, 18, 2, 1, 0),
(4, 22, 1, 1, 0),
(5, 18, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_category_id` int NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_tags` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is active,1 is deactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_title`, `product_description`, `product_category_id`, `product_image`, `product_tags`, `status`, `created_date`, `modified_date`) VALUES
(1, 17, 'Head Phone', 'boAt Rockerz 370 On Ear Bluetooth Headphones with Upto 12 Hours Playtime, Cozy Padded Earcups and Bluetooth v5.0, with Mic (Buoyant Black)', 2, 'product-big-03.png', 'Music', '0', '2023-02-01 09:20:25', '2023-02-23 12:40:21'),
(2, 17, 'Keyboard', 'Amazon Basics Wireless Bluetooth Multi-Device Keyboard for Windows, Apple iOS Android or Chrome, Compact Space-Saving Design, for PC/Mac/Laptop/Smartphone/Tablet (Black)', 2, 'product-02.png', 'Computer', '0', '2023-02-01 09:22:40', '2023-02-23 12:40:21'),
(3, 17, 'Smart Watch', 'Fire-Boltt Gladiator 1.96\" Biggest Display Smart Watch with Bluetooth Calling, Voice Assistant &123 Sports Modes, 8 Unique UI Interactions, SpO2, 24/7 Heart Rate Tracking', 6, 'product-39.png', 'mobile', '0', '2023-02-01 09:39:31', '2023-02-22 11:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0' COMMENT '0 is active,1 is deactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Shirts', '0', '2023-02-01 04:06:17', '2023-02-23 12:13:12'),
(2, 'Electronics', '0', '2023-02-01 04:06:28', '2023-02-23 12:40:07'),
(3, 'T-Shirts', '1', '2023-02-01 04:07:37', '2023-02-23 12:40:21'),
(4, 'Denim', '1', '2023-02-01 04:08:12', '2023-02-22 12:32:14'),
(5, 'Child', '1', '2023-02-01 04:08:30', '2023-02-22 07:41:19'),
(6, 'Mobile', '0', '2023-02-01 09:38:51', '2023-02-22 11:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `comment`, `created_date`, `modified_date`) VALUES
(1, 1, 17, 'nice', '2023-02-02 09:31:38', '2023-02-02 09:31:38'),
(2, 3, 17, 'nice', '2023-02-02 04:31:34', NULL),
(3, 2, 18, 'cool', '2023-02-02 04:53:04', NULL),
(4, 1, 18, 'awesome', '2023-02-02 04:56:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 is admin,1 is user',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1 is deactive,0 is active',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 is present , 1 is deleted',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `delete_status`, `created_date`, `modified_date`) VALUES
(17, 'mayank@gmail.com', '$2y$10$cdb2WCFAfXcE8qTE5RYNg.wvOiT.gKQXxjXtPMjouoJpE4gzroQUi', '0', '0', '0', '2023-01-31 07:08:50', '2023-01-31 14:17:06'),
(18, 'amit@gmail.com', '$2y$10$xiWWJN2xkP.U6jJocbl1iugHp0Ot16DtMTzx8g3P1Agns2tTf.G3G', '1', '0', '0', '2023-01-31 08:43:30', '2023-02-17 05:51:55'),
(19, 'anurag@gmail.com', '$2y$10$YxncMlEGzevgyxgbxV782O1qXpWPoh8527XBDKih4sDox2oQGqNWu', '1', '0', '0', '2023-02-02 05:56:22', '2023-02-16 08:00:44'),
(21, 'rahul@gmail.com', '$2y$10$5eVYH6FU9ivoLHblGHVsQO3tdLMmmYQb7ZkIag1GxIIIURi.WuZBu', '1', '0', '0', '2023-02-13 12:08:45', '2023-02-16 14:46:06'),
(22, 'kunal@gmail.com', '$2y$10$M28AxwBRVbODdk7M578pDewOAbhVEsduyVRi6KZHgXs/22kRxDMO2', '1', '0', '0', '2023-02-14 06:29:37', '2023-02-23 09:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'imageicon.jpg',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `profile_image`, `created_date`, `modified_date`) VALUES
(4, 17, 'Mayank', 'Gupta', '8975642884', 'Patiala , Punjab', 'images 11.jpeg', '2023-01-31 07:08:50', NULL),
(5, 18, 'Amittt', 'sharma', '6230254102', 'New Delhi', 'download.jpeg', '2023-01-31 08:43:30', '2023-02-20 05:34:54'),
(6, 19, 'Anurag', 'Sharma', '8974563215', 'zirakpur Punjab', 'download .jpeg', '2023-02-02 05:56:22', NULL),
(8, 21, 'Rahul', 'Jaiswal', '5469213784', 'Zirakpur Punjab', 'imageicon.jpg', '2023-02-13 12:08:45', '2023-02-21 08:59:33'),
(9, 22, 'Kunallll', 'Singh', '9513627845', 'Mani Majra , Chandigarh', 'download.jpeg', '2023-02-14 06:29:37', '2023-02-21 09:15:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user` (`user_id`),
  ADD KEY `cart_product` (`product_id`);

--
-- Indexes for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_like` (`user_id`),
  ADD KEY `product_like` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category` (`product_category_id`),
  ADD KEY `user_product` (`user_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products` (`product_id`),
  ADD KEY `users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `like_dislike`
--
ALTER TABLE `like_dislike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addcart`
--
ALTER TABLE `addcart`
  ADD CONSTRAINT `cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD CONSTRAINT `product_like` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_like` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_product` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

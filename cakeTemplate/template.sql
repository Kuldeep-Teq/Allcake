-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2023 at 06:50 PM
-- Server version: 8.0.31-0ubuntu0.20.04.2
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
-- Database: `template`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `comment` varchar(300) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(80) NOT NULL,
  `image` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `name`, `image`, `created`) VALUES
(1, 5, 'new Alieance', 'marguerite-729510__340.jpg', '2023-01-23 05:34:51'),
(2, 9, 'fsff', 'discount_image.png', '2023-01-23 05:35:56'),
(4, 9, 'post 4', 'banner_image.png', '2023-01-23 09:04:09'),
(7, 9, 'New Post', 'young-woman-looking-lamp.png', '2023-01-23 11:15:06'),
(8, 10, 'my first post', 'banner_image.png', '2023-01-23 12:05:07'),
(9, 10, 'Pooja', 'young-woman-looking-lamp.png', '2023-01-23 12:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `image` varchar(250) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `full_name`, `gender`, `company`, `job`, `country`, `address`, `phone`, `email`, `password`) VALUES
(1, 'banner_image.png', 'ftyg', 'male', 'sdgf', 'dfgf', 'fghfg', 'fghfg', '76766777676', 'seger@gmail.com', '12345678'),
(2, 'banner_image.png', 'Pardeep Singh', 'Male', 'Lueilwitz, Wisoky and Leuschke', 'Web Designer', 'Amrica', 'A108 Adam Street, New York, NY 535022', '76766777676', 'pardeep@gmail.com', 'Pardeep@123'),
(3, '2201.w022.n001.519B.p15.519-removebg-preview.png', 'ddsg', 'Male', 'gdsgsd', 'gsdgsd', 'gsds', 'gsd', '1111111111', 'anu@gmail.com', 'Harsh@123'),
(4, '2201.w022.n001.519B.p15.519-removebg-preview.png', 'dfsafds', 'Male', 'ffsdf', 'fasfas', 'fasfas', 'fasfsa', '76766777676', 'hk244381@gmail.com', 'Harsh@123'),
(5, '2201.w022.n001.519B.p15.519-removebg-preview.png', 'fdf', 'Male', 'fsdfd', 'fd', 'ffds', 'fsdfds', '76766777676', 'amit@gmail.com', 'Harsh@123'),
(6, '2201.w022.n001.519B.p15.519-removebg-preview.png', 'dsds', 'Male', 'dsaf', 'dsasd', 'dsadsa', 'ddsd', '76766777676', 'au@gmail.com', 'Harsh@123'),
(7, '2201.w022.n001.519B.p15.519-removebg-preview.png', 'fdfd', 'Male', 'fdsfs', 'fsafda', 'fasfs', 'fasfsa', '76766777676', 'Harsh@gmail.com', 'Harsh@123'),
(8, 'banner_image.png', 'dgfgh', 'Male', 'dtjn', 'yjkgh', 'fgyjmf', 'fjkfh', '76766777676', 'abx@gmail.com', 'Abx@1234'),
(9, 'banner_image.png', 'dhgf', 'Male', 'fhfg', 'fgjgf', 'ghjgh', 'ghkjg', '76766777676', 'abc@gmail.com', '$2y$10$JbC8bONGLCN1Y4HDu9MKgeQxMi2/KOdbB3UjNlCbBxvL9lK8WUg5y'),
(10, 'marguerite-729510__340.jpg', 'Akshat sood', 'Male', 'Tech Web', 'PHP Developer', 'India', 'Himachal', '1234567898', 'akshat1234@gmail.com', '$2y$10$dMOUsO.0YGI8hERqSpfMcu9sPiFtWXpWnCapEK5yRzQ7YMpVUkNwW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

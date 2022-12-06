-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 06:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `we18103`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`) VALUES
(1, 'Danh muc 1'),
(2, 'Danh muc 2'),
(3, 'Danh muc 3'),
(4, 'Danh muc 4');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productDesc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `productPrice` double NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productDesc`, `productImage`, `productPrice`, `categoryId`) VALUES
(1, 'Product 2', 'Description 2', 'http://localhost/php1_ass_ph29220/public/uploads/prd2.png', 200, 2),
(2, 'Coc phat sang', 'Dung de uong nuoc', 'http://localhost/php1_ass_ph29220/public/uploads/prd2.png', 200, 1),
(3, 'man hinh', 'Xem phim', 'http://localhost/php1_ass_ph29220/public/uploads/prd3.png', 500, 2),
(4, 'ao khoac', 'fullstack', 'http://localhost/php1_ass_ph29220/uploads/Nguyễn Tuấn Anh HTML & CSS Certificate.png', 200, 3),
(5, 'fullstack dev', 'Áo khoác ', 'http://localhost/php1_ass_ph29220/uploads/628c65f7e0d57.jpg', 344, 1),
(6, 'lexus123232', 'lexus dsdsdsds', 'http://localhost/php1_ass_ph29220/uploads/lexusrxgalleryext10djpeg-1637544388.jpg', 233, 2),
(7, 'Oto do choi', 'ô tô đồ chơi', 'http://localhost/php1_ass_ph29220/uploads/00a5208b9ae3cf9c15356f7d96831e57_1603428904.jpeg', 123, 3),
(8, 'tuan anh', 'nguyen tuan anh', 'http://localhost/php1_ass_ph29220/uploads/anhntph1.png', 100, 4),
(9, 'html css', 'ReactJs advance', 'http://localhost/php1_ass_ph29220/uploads/Nguyễn Tuấn Anh Build Website With ReactJS Certificate.png', 120, 1),
(10, 'tuan anh', 'js advanced', 'http://localhost/php1_ass_ph29220/uploads/Nguyễn Tuấn Anh JavaScript Advanced Certificate.png', 123, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` int(5) NOT NULL,
  `censorship` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `censorship`) VALUES
(1, 'Tuan Anh', 'tuananh12@gmail.com', '123456', 1, 1),
(2, 'Nguyen Hung', 'hunganh26@gmail.com', '654321', 0, 0),
(3, 'nguyen phuong', 'phuong12@gmail.com', '123456', 1, 0),
(4, 'anhntph', 'anh@gmail.com', '123456', 0, 1),
(5, 'tan van son', 'hung@gmail.com', '123456', 1, 0),
(6, 'Trong dau', 'tuananh1210085213@gmail.com', '123456', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

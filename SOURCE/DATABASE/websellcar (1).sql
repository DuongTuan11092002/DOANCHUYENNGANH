-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 05:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websellcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `automaker`
--

CREATE TABLE `automaker` (
  `autoMakerID` int(11) NOT NULL,
  `autoMakerName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automaker`
--

INSERT INTO `automaker` (`autoMakerID`, `autoMakerName`, `status`) VALUES
(1, 'TOYOTA', 1),
(2, 'MAZDA', 1),
(3, 'SUZUKI', 1),
(4, 'TESLA', 1),
(5, 'HONDA', 1),
(6, 'KIA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `productCarID` int(11) DEFAULT NULL,
  `accessaryID` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesID` int(11) NOT NULL,
  `categoriesName` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesID`, `categoriesName`, `slug`, `image`, `status`) VALUES
(1, 'SEDAN', '', '', 1),
(2, 'SUV', '', '', 1),
(3, 'HatchBack', '', '', 1),
(4, 'Crossover (CUV)', '', '', 1),
(5, 'Pickup – xe bán tải', '', '', 1),
(6, 'Coupe – xe thể thao', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarycar`
--

CREATE TABLE `librarycar` (
  `libraryCarID` int(11) NOT NULL,
  `thumnail` varchar(255) NOT NULL,
  `productCarID` int(11) DEFAULT NULL,
  `productCarDetail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsdetail`
--

CREATE TABLE `newsdetail` (
  `newsDetailID` int(11) NOT NULL,
  `newsDetailHeading` varchar(255) NOT NULL,
  `descriptionDetail` varchar(255) NOT NULL,
  `newsDetailIMG` varchar(255) NOT NULL,
  `newsID` int(11) DEFAULT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newslist`
--

CREATE TABLE `newslist` (
  `newsID` int(11) NOT NULL,
  `newsHeading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumnail` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `orderDate` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderDetailID` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `accessaryID` int(11) DEFAULT NULL,
  `productCarID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcar`
--

CREATE TABLE `productcar` (
  `productCarID` int(11) NOT NULL,
  `productCarName` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `thumnail` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_at` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL,
  `deleted` smallint(6) DEFAULT NULL,
  `autoMakerID` int(11) DEFAULT NULL,
  `categoriesID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcar`
--

INSERT INTO `productcar` (`productCarID`, `productCarName`, `description`, `price`, `thumnail`, `slug`, `status`, `create_at`, `update_at`, `deleted`, `autoMakerID`, `categoriesID`) VALUES
(1, 'TOYOTA Vios', 'Dòng xe được mọi người tiếp cận', '500000000', '17018535241699172599Mazda.jpg', NULL, 1, '2023-12-18', NULL, NULL, 3, 2),
(2, 'MAZDA', 'Tiếp cận thị trường mới', '450000000', '17018535761699172599Mazda.jpg', NULL, 1, '2023-12-08', NULL, NULL, 2, 1),
(3, 'Tesla', 'xe xịn', '500000000', '170193445217007290601699172599Mazda.jpg', NULL, 1, '2222-12-12', NULL, NULL, 3, 2),
(6, 'MAZDA 3', 'Xe gia đình', '700000000', '170193636817007290601699172599Mazda.jpg', NULL, 1, '2022-12-23', NULL, NULL, 5, 2),
(7, 'HONDA CIVIC', 'sport car', '1000000000', '170193648017007290601699172599Mazda.jpg', NULL, 1, '2023-12-09', NULL, NULL, 5, 1),
(8, 'KIA Morning 2022', 'Tổng quan KIA Morning Được sản xuất từ năm 2004 đến nay bởi Hàn Quốc, Tại thị trường Việt Nam, KIA Morning 2021 được phân phối qua 6 phiên bản từ tiêu chuẩn đến cao cấp (thêm 2 phiên bản GT-Line và X-Line). Dòng xe này được cho là phù hợp với những khác', '304000000', '1703135173kiaMorning.jpg', NULL, 1, '2023-02-22', NULL, NULL, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productcardetail`
--

CREATE TABLE `productcardetail` (
  `productCarDetailID` int(11) NOT NULL,
  `productCarDetailName` varchar(255) NOT NULL,
  `productCarDetailTextEngine` varchar(255) DEFAULT NULL,
  `productCarDetailTextInterio` varchar(255) DEFAULT NULL,
  `productCarDetailTextTechniques` varchar(255) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `productCarID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcardetail`
--

INSERT INTO `productcardetail` (`productCarDetailID`, `productCarDetailName`, `productCarDetailTextEngine`, `productCarDetailTextInterio`, `productCarDetailTextTechniques`, `images`, `productCarID`) VALUES
(1, 'TOYOTA VIOS', 'Động cơ mạnh mẽ mới', 'Nội thất tinh tế', 'Công nghệ mới', '17018540411699248200newDetail2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account`, `password`, `fullname`, `address`, `email`, `status`, `phone`, `avatar`, `roleID`) VALUES
('ADMIN', '202cb962ac59075b964b07152d234b70', 'Kim Dương Tuấn', 'Trà Vinh', 'Admin@gmail.com', '1', '0911096648', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automaker`
--
ALTER TABLE `automaker`
  ADD PRIMARY KEY (`autoMakerID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `productCarID` (`productCarID`),
  ADD KEY `account` (`account`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesID`);

--
-- Indexes for table `librarycar`
--
ALTER TABLE `librarycar`
  ADD PRIMARY KEY (`libraryCarID`),
  ADD KEY `productCarID` (`productCarID`),
  ADD KEY `productCarDetail` (`productCarDetail`);

--
-- Indexes for table `newsdetail`
--
ALTER TABLE `newsdetail`
  ADD PRIMARY KEY (`newsDetailID`),
  ADD KEY `newsID` (`newsID`);

--
-- Indexes for table `newslist`
--
ALTER TABLE `newslist`
  ADD PRIMARY KEY (`newsID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productCarID` (`productCarID`);

--
-- Indexes for table `productcar`
--
ALTER TABLE `productcar`
  ADD PRIMARY KEY (`productCarID`),
  ADD KEY `autoMakerID` (`autoMakerID`),
  ADD KEY `categoriesID` (`categoriesID`);

--
-- Indexes for table `productcardetail`
--
ALTER TABLE `productcardetail`
  ADD PRIMARY KEY (`productCarDetailID`),
  ADD KEY `productCarID` (`productCarID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account`),
  ADD KEY `roleID` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automaker`
--
ALTER TABLE `automaker`
  MODIFY `autoMakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `librarycar`
--
ALTER TABLE `librarycar`
  MODIFY `libraryCarID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsdetail`
--
ALTER TABLE `newsdetail`
  MODIFY `newsDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newslist`
--
ALTER TABLE `newslist`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcar`
--
ALTER TABLE `productcar`
  MODIFY `productCarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productcardetail`
--
ALTER TABLE `productcardetail`
  MODIFY `productCarDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productCarID`) REFERENCES `productcar` (`productCarID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`account`) REFERENCES `users` (`account`);

--
-- Constraints for table `librarycar`
--
ALTER TABLE `librarycar`
  ADD CONSTRAINT `librarycar_ibfk_1` FOREIGN KEY (`productCarID`) REFERENCES `productcar` (`productCarID`),
  ADD CONSTRAINT `librarycar_ibfk_2` FOREIGN KEY (`productCarDetail`) REFERENCES `productcardetail` (`productCarDetailID`);

--
-- Constraints for table `newsdetail`
--
ALTER TABLE `newsdetail`
  ADD CONSTRAINT `newsdetail_ibfk_1` FOREIGN KEY (`newsID`) REFERENCES `newslist` (`newsID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`productCarID`) REFERENCES `productcar` (`productCarID`);

--
-- Constraints for table `productcar`
--
ALTER TABLE `productcar`
  ADD CONSTRAINT `productcar_ibfk_1` FOREIGN KEY (`autoMakerID`) REFERENCES `automaker` (`autoMakerID`),
  ADD CONSTRAINT `productcar_ibfk_2` FOREIGN KEY (`categoriesID`) REFERENCES `categories` (`categoriesID`);

--
-- Constraints for table `productcardetail`
--
ALTER TABLE `productcardetail`
  ADD CONSTRAINT `productcardetail_ibfk_1` FOREIGN KEY (`productCarID`) REFERENCES `productcar` (`productCarID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

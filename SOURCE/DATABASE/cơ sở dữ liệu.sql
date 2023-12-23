-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 10:16 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`account`, `password`, `fullname`, `address`, `email`, `status`, `phone`) VALUES
('DuongTuan', '202cb962ac59075b964b07152d234b70', 'Kim Dương Tuấn', 'Trà Vinh', 'admin@gmail.com', '1', '0911096648');

-- --------------------------------------------------------

--
-- Table structure for table `automaker`
--

CREATE TABLE `automaker` (
  `autoMakerID` int(11) NOT NULL,
  `autoMakerName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automaker`
--

INSERT INTO `automaker` (`autoMakerID`, `autoMakerName`, `status`) VALUES
(1, 'VinFast', 1),
(2, 'Mazda', 1),
(3, 'Toyota', 1),
(4, 'Mercedes-benz', 1),
(5, 'Lexus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesID` int(11) NOT NULL,
  `categoriesName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesID`, `categoriesName`, `status`) VALUES
(1, 'Sedan', 1),
(2, 'Hatchback', 1),
(3, 'SUV', 1),
(4, 'Crossover', 1),
(5, 'Coupe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsdetail`
--

CREATE TABLE `newsdetail` (
  `newsDetailID` int(11) NOT NULL,
  `newsDetailHeading` varchar(255) NOT NULL,
  `descriptionDetail` varchar(255) DEFAULT NULL,
  `newsDetailIMG` varchar(255) DEFAULT NULL,
  `newsID` int(11) NOT NULL,
  `create_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newslist`
--

CREATE TABLE `newslist` (
  `newsID` int(11) NOT NULL,
  `newsHeading` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `create_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
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
  `orderID` int(11) NOT NULL,
  `productCarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcar`
--

CREATE TABLE `productcar` (
  `productCarID` int(11) NOT NULL,
  `productCarName` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `create_at` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL,
  `deleted` smallint(6) DEFAULT NULL,
  `autoMakerID` int(11) NOT NULL,
  `categoriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcar`
--

INSERT INTO `productcar` (`productCarID`, `productCarName`, `description`, `price`, `thumnail`, `status`, `create_at`, `update_at`, `deleted`, `autoMakerID`, `categoriesID`) VALUES
(1, 'Toyota Camry 2.0Q', 'Toyota Camry 2023 là dòng xe sở hữu kích thước tổng thể DxRxC (mm) - 4.885 x 1.840 x 1.445, chiều dài cơ sở 2.825mm, khoảng sáng gầm 140 mm. Có thể nói rằng Camry sở hữu kích thước lớn nhất trong các dòng Sedan hạng D hiện nay. Xe ra mắt thị trường với 4 ', '1069999998', '1703322269cac-dong-xe-toyota-27.jpg', 1, '2023-12-12', NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productcardetail`
--

CREATE TABLE `productcardetail` (
  `productCarDetailID` int(11) NOT NULL,
  `productCarDetailName` varchar(255) NOT NULL,
  `productCarDetailTextEngine` varchar(800) DEFAULT NULL,
  `productCarDetailTextInterio` varchar(800) DEFAULT NULL,
  `productCarDetailTextTechniques` varchar(800) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `productCarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcardetail`
--

INSERT INTO `productcardetail` (`productCarDetailID`, `productCarDetailName`, `productCarDetailTextEngine`, `productCarDetailTextInterio`, `productCarDetailTextTechniques`, `images`, `productCarID`) VALUES
(1, 'Toyota Camry 2.5Q', 'dòng xe này còn được nâng cấp với động cơ 4 xy lanh Dynamic Force sử dụng van biến thiên điều khiển điện tử VVT-iE: 2.0L mã M20A-FKS (ở phiên bản 2.0G và 2.0Q) cho công suất tối đa 170 mã lực, mô men xoắn cực đại 206Nm và động cơ 2.5L mã A25A-FKS (phiên b', 'Tất cả ghế ngồi xe Toyota Camry đều được bọc chất liệu da sang trọng, tạo cảm giác êm ái, dễ chịu khi sử dụng. Ghế lái được tích hợp chức năng chỉnh điện 10 hướng, riêng các phiên bản Camry 2.0Q, 2.5Q và 2.5HV còn được trang bị thêm tính năng nhớ ghế ở 2 ', 'xe còn được trang bị 03 chế độ lái là ECO (tiết kiệm), Normal (thông thường) và Sport (thể thao) nhằm thỏa mãn nhu cầu cá nhân của từng khách hàng. Bộ lốp thay đổi thành 235/45R18 có khả năng bám đường tốt hơn. Những tính năng độc quyền đáng chú ý khác tr', '1703322695cac-dong-xe-toyota-27.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account`, `password`, `fullname`, `address`, `email`, `status`, `phone`, `avatar`) VALUES
('VanA', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', 'Châu thành, Đồng Tháp', 'VanA@gmail.com', '1', '091234566', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automaker`
--
ALTER TABLE `automaker`
  ADD PRIMARY KEY (`autoMakerID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesID`);

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
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `account` (`account`);

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
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automaker`
--
ALTER TABLE `automaker`
  MODIFY `autoMakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `productCarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productcardetail`
--
ALTER TABLE `productcardetail`
  MODIFY `productCarDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `newsdetail`
--
ALTER TABLE `newsdetail`
  ADD CONSTRAINT `newsdetail_ibfk_1` FOREIGN KEY (`newsID`) REFERENCES `newslist` (`newsID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`account`) REFERENCES `users` (`account`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

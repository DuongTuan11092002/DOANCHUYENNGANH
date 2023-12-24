CREATE TABLE `admin` (
  `account` varchar(255) PRIMARY KEY NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255),
  `email` varchar(255),
  `status` varchar(255),
  `phone` varchar(255)
);

CREATE TABLE `users` (
  `account` varchar(255) PRIMARY KEY NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255),
  `email` varchar(255),
  `status` varchar(255),
  `phone` varchar(255),
  `avatar` varchar(255)
);

CREATE TABLE `shipping` (
  `shippingID` int PRIMARY KEY AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255),
  `method` varchar(255) NOT NULL
);

CREATE TABLE `order` (
  `orderID` int PRIMARY KEY AUTO_INCREMENT,
  `order_code` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `shippingID` int
);

CREATE TABLE `orderDetail` (
  `orderDetailID` int PRIMARY KEY AUTO_INCREMENT,
  `orderCode` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `productCarID` int NOT NULL,
  `orderID` int
);

CREATE TABLE `productCar` (
  `productCarID` int PRIMARY KEY AUTO_INCREMENT,
  `productCarName` varchar(255) NOT NULL,
  `description` varchar(255),
  `price` varchar(255) NOT NULL,
  `thumnail` varchar(255),
  `slug` varchar(255),
  `create_at` varchar(255),
  `update_at` varchar(255),
  `deleted` smallint,
  `autoMakerID` int NOT NULL,
  `categoriesID` int NOT NULL,
  `status` int NOT NULL
);

CREATE TABLE `productCarDetail` (
  `productCarDetailID` int PRIMARY KEY AUTO_INCREMENT,
  `productCarDetailName` varchar(255) NOT NULL,
  `productCarDetailTextEngine` varchar(255),
  `productCarDetailTextInterio` varchar(255),
  `productCarDetailTextTechniques` varchar(255),
  `productCarID` int NOT NULL
);

CREATE TABLE `autoMaker` (
  `autoMakerID` int PRIMARY KEY AUTO_INCREMENT,
  `autoMakerName` varchar(255) NOT NULL,
  `status` int NOT NULL
);

CREATE TABLE `categories` (
  `categoriesID` int PRIMARY KEY AUTO_INCREMENT,
  `categoriesName` varchar(255) NOT NULL,
  `status` int NOT NULL
);

CREATE TABLE `newsList` (
  `newsID` int PRIMARY KEY AUTO_INCREMENT,
  `newsHeading` varchar(255) NOT NULL,
  `description` varchar(255),
  `thumnail` varchar(255),
  `status` int NOT NULL,
  `create_at` varchar(255) NOT NULL
);

CREATE TABLE `newsDetail` (
  `newsDetailID` int PRIMARY KEY AUTO_INCREMENT,
  `newsDetailHeading` varchar(255) NOT NULL,
  `descriptionDetail` varchar(255),
  `newsDetailIMG` varchar(255),
  `newsID` int NOT NULL,
  `create_at` varchar(255) NOT NULL
);

ALTER TABLE `productCarDetail` ADD FOREIGN KEY (`productCarID`) REFERENCES `productCar` (`productCarID`);

ALTER TABLE `productCar` ADD FOREIGN KEY (`autoMakerID`) REFERENCES `autoMaker` (`autoMakerID`);

ALTER TABLE `productCar` ADD FOREIGN KEY (`categoriesID`) REFERENCES `categories` (`categoriesID`);

ALTER TABLE `orderDetail` ADD FOREIGN KEY (`productCarID`) REFERENCES `productCar` (`productCarID`);

ALTER TABLE `newsDetail` ADD FOREIGN KEY (`newsID`) REFERENCES `newsList` (`newsID`);

ALTER TABLE `order` ADD FOREIGN KEY (`shippingID`) REFERENCES `shipping` (`shippingID`);

ALTER TABLE `orderDetail` ADD FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`);

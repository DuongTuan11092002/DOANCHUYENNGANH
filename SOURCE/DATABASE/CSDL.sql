CREATE TABLE `role` (
  `roleID` int PRIMARY KEY,
  `roleName` varchar(255)
);

CREATE TABLE `user` (
  `account` varchar(255) PRIMARY KEY,
  `password` varchar(255),
  `fullname` varchar(255),
  `address` varchar(255),
  `email` varchar(255),
  `phone` varchar(255),
  `avatar` varchar(255),
  `roleID` int
);

CREATE TABLE `order` (
  `orderID` int PRIMARY KEY,
  `account` varchar(255),
  `fullname` varchar(255),
  `phone` varchar(255),
  `address` varchar(255),
  `orderDate` varchar(255),
  `total` int
);

CREATE TABLE `orderDetail` (
  `orderDetailID` int PRIMARY KEY,
  `price` varchar(255),
  `total` int,
  `orderID` int,
  `accessaryID` int,
  `productCarID` int
);

CREATE TABLE `productCar` (
  `productCarID` int PRIMARY KEY,
  `productCarName` varchar(255),
  `description` varchar(255),
  `price` varchar(255),
  `thumnail` varchar(255),
  `create_at` varchar(255),
  `update_at` varchar(255),
  `deleted` smallint,
  `autoMakerID` int,
  `classifyID` int
);

CREATE TABLE `productCarDetail` (
  `productCarDetailID` int PRIMARY KEY,
  `productCarDetailName` varchar(255),
  `productCarDetailTextEngine` varchar(255),
  `productCarDetailTextInterio` varchar(255),
  `productCarDetailTextTechniques` varchar(255),
  `libraryCarID` int,
  `productCarID` int
);

CREATE TABLE `libraryCar` (
  `libraryCarID` int PRIMARY KEY,
  `thumnail` varchar(255),
  `productCarID` int
);

CREATE TABLE `productAccessary` (
  `accessaryID` int PRIMARY KEY,
  `accessaryName` varchar(255),
  `description` varchar(255),
  `price` varchar(255),
  `thumnail` varchar(255),
  `create_at` varchar(255),
  `update_at` varchar(255),
  `deleted` smallint,
  `accessaryMakerID` int,
  `classifyID` int
);

CREATE TABLE `libraryAccessary` (
  `libraryAccessaryID` int PRIMARY KEY,
  `thumnail` varchar(255),
  `accessaryID` int
);

CREATE TABLE `autoMaker` (
  `autoMakerID` int PRIMARY KEY,
  `autoMakerName` varchar(255)
);

CREATE TABLE `accessaryMaker` (
  `accessaryMakerID` int PRIMARY KEY,
  `accessaryMakerName` varchar(255)
);

CREATE TABLE `classify` (
  `classifyID` int PRIMARY KEY,
  `classifyName` varchar(255)
);

CREATE TABLE `newsList` (
  `newsID` int PRIMARY KEY,
  `newsHeading` varchar(255),
  `description` varchar(255),
  `thumnail` varchar(255),
  `account` varchar(255),
  `create_at` varchar(255)
);

CREATE TABLE `newsDetail` (
  `newsDetailID` int PRIMARY KEY,
  `newsDetailHeading` varchar(255),
  `descriptionDetail` varchar(255),
  `newsDetailIMG` varchar(255),
  `newsID` int,
  `account` varchar(255),
  `create_at` varchar(255)
);

CREATE TABLE `libraryNews` (
  `libraryNewsID` int PRIMARY KEY,
  `thumnail` varchar(255),
  `newsID` int,
  `newsDetailID` int
);

ALTER TABLE `orderDetail` ADD FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`);

ALTER TABLE `orderDetail` ADD FOREIGN KEY (`accessaryID`) REFERENCES `productAccessary` (`accessaryID`);

ALTER TABLE `orderDetail` ADD FOREIGN KEY (`productCarID`) REFERENCES `productCar` (`productCarID`);

ALTER TABLE `productAccessary` ADD FOREIGN KEY (`accessaryMakerID`) REFERENCES `accessaryMaker` (`accessaryMakerID`);

ALTER TABLE `libraryCar` ADD FOREIGN KEY (`productCarID`) REFERENCES `productCar` (`productCarID`);

ALTER TABLE `libraryAccessary` ADD FOREIGN KEY (`accessaryID`) REFERENCES `productAccessary` (`accessaryID`);

ALTER TABLE `libraryNews` ADD FOREIGN KEY (`newsID`) REFERENCES `newsList` (`newsID`);

ALTER TABLE `libraryNews` ADD FOREIGN KEY (`newsDetailID`) REFERENCES `newsDetail` (`newsDetailID`);

ALTER TABLE `productCar` ADD FOREIGN KEY (`classifyID`) REFERENCES `classify` (`classifyID`);

ALTER TABLE `productAccessary` ADD FOREIGN KEY (`classifyID`) REFERENCES `classify` (`classifyID`);

ALTER TABLE `productCarDetail` ADD FOREIGN KEY (`productCarID`) REFERENCES `productCar` (`productCarID`);

ALTER TABLE `productCarDetail` ADD FOREIGN KEY (`libraryCarID`) REFERENCES `libraryCar` (`libraryCarID`);

ALTER TABLE `productCar` ADD FOREIGN KEY (`autoMakerID`) REFERENCES `autoMaker` (`autoMakerID`);

ALTER TABLE `newsList` ADD FOREIGN KEY (`account`) REFERENCES `user` (`account`);

ALTER TABLE `newsDetail` ADD FOREIGN KEY (`account`) REFERENCES `user` (`account`);

ALTER TABLE `user` ADD FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`);

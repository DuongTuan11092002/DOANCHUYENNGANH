-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 10:26 AM
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
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`account`, `password`, `fullname`, `address`, `email`, `status`, `phone`) VALUES
('Admin', '202cb962ac59075b964b07152d234b70', 'Kim Dương Tuấn', 'Trà Vinh', 'Admin@gmail.com', '1', '0911096648'),
('Duongtuan1', '202cb962ac59075b964b07152d234b70', 'Dương Kim Tuấn', 'Châu Thành, Vĩnh Long', 'DuongTuanAD@gmail.com', '1', '0922095546'),
('VanThanh', '202cb962ac59075b964b07152d234b70', 'Trần Văn Thanh', 'Hải Phòng', 'VanThanhAD@gmail.com', '1', '0933093347');

-- --------------------------------------------------------

--
-- Table structure for table `automaker`
--

CREATE TABLE `automaker` (
  `autoMakerID` int(11) NOT NULL,
  `autoMakerName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automaker`
--

INSERT INTO `automaker` (`autoMakerID`, `autoMakerName`, `status`, `slug`) VALUES
(1, 'Mazda', 1, 'mazda'),
(2, 'Toyota', 1, 'toyota'),
(3, 'Mercedes benz', 1, 'mercedes-benz'),
(4, 'Lexus', 1, 'lexus'),
(5, 'Ford', 1, 'ford'),
(6, 'Honda', 1, 'honda');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoriesID` int(11) NOT NULL,
  `categoriesName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoriesID`, `categoriesName`, `status`, `slug`) VALUES
(1, 'Sedan', 1, 'sedan'),
(2, 'Hatchback', 1, 'hatchback'),
(3, 'SUV – xe thể thao đa dụng', 1, 'suv-xe-the-thao-da-dung'),
(5, 'Coupe – xe thể thao', 1, 'coupe-xe-the-thao'),
(6, 'Pickup – xe bán tải', 1, 'pickup-xe-ban-tai');

-- --------------------------------------------------------

--
-- Table structure for table `category_blog`
--

CREATE TABLE `category_blog` (
  `id` int(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_blog`
--

INSERT INTO `category_blog` (`id`, `title`, `description`, `status`, `image`, `slug`) VALUES
(3, 'Thị Trường ô tô', 'Thị Trường ô tô', 1, '1704100480toyota-hilux-2021-revo-tai-malaysia-blogoto-vn.jpg', 'thi-truong-o-to'),
(4, 'Kinh nghiệm lái xe', 'Kinh nghiệm lái xe', 1, '1704131036peugeot-408-oto-com-vn-1-2c4c.jpg', 'kinh-nghiem-lai-xe'),
(5, 'Đánh giá xe', 'Đánh giá xe', 1, '1704131086suzuki-xl7-9d83.jpg', 'danh-gia-xe');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(255) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `fullname` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `email`, `phone`, `address`, `subject`, `message`, `fullname`, `status`) VALUES
(4, 'Kim884740@gmail.com', '082209334', 'Vĩnh Long', 'Cần đặt dòng xe honda civic typeA', 'Tôi cần đặt dòng xe honda Civic type A trong năm nay', 'Nguyễn Văn C', 1),
(5, 'Kim884740@gmail.com', '0911096649', 'Trà Vinh', 'Đặt xe gì đó', 'dsadasdas', 'Kim Dương Tuấn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `shippingID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `order_code`, `status`, `shippingID`) VALUES
(4, '90540', 3, 6),
(7, '22362', 2, 9),
(8, '46024', 1, 10),
(9, '45972', 1, 11),
(10, '94250', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderDetailID` int(11) NOT NULL,
  `orderCode` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productCarID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderDetailID`, `orderCode`, `quantity`, `productCarID`, `orderID`) VALUES
(1, '90540', 3, 1, NULL),
(4, '22362', 10, 1, NULL),
(5, '46024', 1, 1, NULL),
(6, '45972', 2, 5, NULL),
(7, '94250', 6, 1, NULL),
(8, '94250', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `short_content` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `category_id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `status`, `image`, `content`, `short_content`, `slug`, `category_id_blog`) VALUES
(1, 'Đánh giá xe Mazda 3 2023: Liệu có còn đáng mua ở thời điểm hiện tại?', 'Mặc dù Mazda 3 2023 tại thị trường Việt hiện vẫn thuộc thế hệ thứ 4 ra mắt kể từ năm 2019, song nhờ ngôn ngữ thiết kế hấp dẫn, danh sách tiện nghi đa dạng cùng hệ thống an toàn tối ưu,…đây vẫn là đối thủ đáng gờm trong phân khúc sedan hạng C.', 1, '1704178622Mazda-3.jpg', 'Về giá bán\r\nTại thị trường Việt, Mazda 3 2023 đang tiếp tục được phân phối với cả 2 biến thể sedan và sport. Trong đó, biến thể sedan gồm 3 bản  với giá dao động từ 669 – 759 triệu đồng, biến thể sport có 2 bản với giá là 699 - 759 triệu đồng.\r\n\r\nĐánh giá xe Mazda 3 2023: Liệu có còn đáng mua ở thời điểm hiện tại? 02\r\n\r\nMazda 3 2023 đang tiếp tục được phân phối với cả 2 biến thể sedan và sport.\r\nMazda 3 đang cạnh tranh cùng các đối thủ gồm KIA K3 (584 - 819 triệu đồng), Honda Civic (730 – 875 triệu đồng), Hyundai Elantra (599 – 799 triệu đồng) hay Toyota Corolla Altis (719 - 868 triệu đồng).\r\n\r\nSo với các đối thủ, giá bán Mazda 3 2023 hiện chênh lệch không đáng kể. Khi mà các đối thủ trong cùng phân khúc liên tục nâng cấp, liệu rằng ở thời điểm hiện tại, Mazda 3 2023 còn đủ sức hút để có thể duy trì vị thế?\r\n\r\nĐánh giá thiết kế Mazda 3\r\nNhư đã đề cập, Mazda 3 hiện thuộc thế hệ thứ 4, ra mắt vào năm 2019. Mặc dù vậy, so với các đối thủ thì Mazda 3 vẫn tạo ấn tượng mạnh với người dùng khi là mẫu xe có ngoại hình thời trang và sang trọng nhất ở phân khúc sedan hạng C. \r\n\r\nĐiều này là nhờ vào thiết kế Kodo đặc trưng của Mazda. Song, để tạo sự mới mẻ, Mazda 3 2023 đã được tinh chỉnh, loại bỏ các đường gân dập nổi chạy dọc thân xe để trở nên tinh tế hơn.\r\n\r\nĐánh giá xe Mazda 3 2023: Liệu có còn đáng mua ở thời điểm hiện tại? 01\r\n\r\nLưới tản nhiệt cỡ lớn được viền crôm bóng bẩy cũng thêm phần cao cấp cho xe.\r\nThay vì hướng tới sự thể thao, cứng cáp, gãy gọn như các đối thủ,…Mazda 3 được thiết kế thanh thoát và hướng tới sự lịch lãm. Đặc biệt, kết hợp cùng lưới tản nhiệt cỡ lớn được viền crôm bóng bẩy cũng thêm phần cao cấp cho xe.\r\n\r\nMazda 3 sedan có kích thước tổng thể (dài x rộng x cao) lần lượt ở mức 4.660 x 1.795 x 1.440 mm, chiều dài cơ sở 2.725mm và đi kèm khoảng sáng gầm 145mm. Các thông số này có sự chênh lệch không quá nhiều so với các đối thủ trong phân khúc như KIA K3 hay Honda Civic.\r\n\r\nĐánh giá xe Mazda 3 2023: Liệu có còn đáng mua ở thời điểm hiện tại? 02\r\n\r\nKích thước của Mazda 3 chênh lệch không quá đáng kể so với các đối thủ.\r\nTrang bị ngoại thất của Mazda 3 cũng được đánh giá cao với loạt trang bị như hệ thống chiếu sáng LED tự động bật/tắt và cân bằng góc chiếu, mâm hợp kim 18 inch hay cụm ống xả kép,…\r\n\r\nĐánh giá khoang nội thất Mazda 3 2023\r\nĐối lập với phong cách trẻ trung từ các đối thủ, cabin Mazda3 2023 mang đến cảm giác lịch lãm, sang trọng khi được sử dụng khá nhiều vật liệu da và kim loại.\r\n\r\nĐiểm nhấn của khoang nội thất trên Mazda 3 là cách bố trí khu vực bảng điều khiển hướng về phía người lái, cho cảm giác hiện đại và cũng tạo được vẻ sang trọng. \r\n\r\nHãng xe Mazda cũng là nhà sản xuất hiếm hoi ngoài màu đen còn cung cấp tùy chọn bọc da màu trắng trong nội thất ở nhóm sedan hạng C. Qua đó, giúp khách hàng sở hữu Mazda3 có thêm những trải nghiệm cao cấp.', 'Có thể thấy, những người chọn Mazda 3 2023 đều là người cần một mẫu xe gia đình an toàn, mang phong cách sang trọng và có danh sách công nghệ vận hành hiện đại. Trong khi đó, về phần các đối thủ có hơi hướng đôi chút về sự thể thao.', 'danh-gia-xe-mazda-3-2023-lieu-co-con-dang-mua-o-thoi-diem-hien-tai', 5);

-- --------------------------------------------------------

--
-- Table structure for table `productcar`
--

CREATE TABLE `productcar` (
  `productCarID` int(11) NOT NULL,
  `productCarName` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` bigint(255) NOT NULL,
  `thumnail` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `create_at` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL,
  `deleted` smallint(6) DEFAULT NULL,
  `autoMakerID` int(11) NOT NULL,
  `categoriesID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcar`
--

INSERT INTO `productcar` (`productCarID`, `productCarName`, `description`, `price`, `thumnail`, `slug`, `create_at`, `update_at`, `deleted`, `autoMakerID`, `categoriesID`, `status`) VALUES
(1, 'Toyota Camry 2.5Q', 'Toyota Camry 2.5Q 2022 là phiên bản cao cấp với mức giá đắt hơn khá nhiều so với 2.0G. Chính vì thế, xe được trang bị hàng loạt những công nghệ hàng đầu hiện nay bên cạnh những phẩm chất đã làm nên tên tuổi của dòng xe này.', 1700000000, '1703402468cac-dong-xe-toyota-27.jpg', 'toyota-camry-25q', '2023-02-22', NULL, NULL, 2, 1, 1),
(2, 'Lexus ES 250', 'Lexus ES 250 là một mẫu sedan hạng sang của thương hiệu xe Nhật Bản Lexus, được giới thiệu vào năm 2018. Đây là phiên bản nâng cấp của Lexus ES 200 và có sự khác biệt về động cơ và trang bị. Ngoài ra, xe còn được trang bị các tính năng tiện nghi cao cấp n', 2700000000, '1703579271Lexus-ES-1_red.jpg', 'lexus-es-250', '2023-12-12', NULL, NULL, 4, 1, 1),
(3, 'Lexus ES 300h', 'Lexus ES 300h là mẫu sedan hạng sang sử dụng động cơ hybrid của hãng xe Nhật Bản Lexus, được giới thiệu lần đầu tiên vào năm 2012. Hiện nay, Lexus ES 300h đã có mặt tại Việt Nam cũng như nhiều nước trên thế giới.Ở nước ngoài, Lexus ES 300h cũng được bán r', 2000000000, '1703579746lexus-es300h-13.jpg', 'lexus-es-300h', '2024-01-01', NULL, NULL, 4, 1, 1),
(4, 'Honda City 2022', 'Honda City là một mẫu sedan cỡ B được giới thiệu lần đầu vào năm 1981 bởi hãng sản xuất xe khổng lồ Honda. Trong đó, tính riêng thị trường Châu Á, City xuất hiện khá muộn từ những năm 1996.Honda City luôn đứng trong top 10 mẫu xe bán chạy nhất tại Việt Na', 800000000, '1703656958honda-city.jpg', 'honda-city-2022', '2022-10-24', NULL, NULL, 6, 1, 1),
(5, 'Honda Civic 2022', 'Phân khúc sedan hạng C đang trở thành khu vực sôi động bậc nhất thị trường xe tại Việt Nam khi có sự khuấy động của những cái tên mới ra mắt gần đây như MG5, Beijing U5, Corolla Altis... Tuy nhiên, nổi bật nhất phải kể Honda Civic 2022, dòng xe được khách', 1100000000, '1703657202honda-civic.jpg', 'honda-civic-2022', '2022-11-25', NULL, NULL, 6, 1, 1),
(6, 'Mazda3 Sport 1.5L Deluxe', 'Mazda 3 là một mẫu hatchback hạng C của hãng Mazda. Đây gần như là xe hatchback hạng C duy nhất được phân phối chính thức tại thị trường Việt Nam. Xe được THACO Trường Hải lắp ráp và phân phối với tất cả 10 phiên bản, trong đó có 5 phiên bản hatchback gồm', 699000000, '1704093837Mazda-3.jpg', 'mazda3-sport-15l-deluxe', '2023-07-12', NULL, NULL, 1, 2, 1),
(7, 'Toyota Yaris', 'Toyota Yaris 2023 là mẫu xe hatchback 5 chỗ khiến nhiều đối thủ phải dè chừng với thiết kế mới mẽ, khoang nội thất tiện nghi cùng mức giá bán cạnh tranh', 684000000, '1704094782toyota-yaris.jpg', 'toyota-yaris', '2023-11-09', NULL, NULL, 2, 2, 1),
(8, 'NEW MAZDA 2', 'Chậm rãi \"Nhìn\",\"Chạm\" và \"Cảm nhận\"hơi thở sành điệu, tự tin trong thiết kế KODO của mẫu xe thế hệ mới. Mẫu xe hướng bạn đến hình mẫu mà bạn khao khát.', 500000000, '1704352069new-mazda2.jpg', 'new-mazda-2', '2023-11-09', NULL, NULL, 1, 1, 1),
(9, 'New Mazda2 1.5L Luxury', 'Chậm rãi \"Nhìn\",\"Chạm\" và \"Cảm nhận\"hơi thở sành điệu, tự tin trong thiết kế KODO của mẫu xe thế hệ mới. Mẫu xe hướng bạn đến hình mẫu mà bạn khao khát.', 504000000, '1704352389new-mazda2-lux-pre.jpg', 'new-mazda2-15l-luxury', '2023-12-11', NULL, NULL, 1, 1, 1),
(10, 'New Mazda2 Sport 1.5L Luxury', 'Chậm rãi \"Nhìn\",\"Chạm\" và \"Cảm nhận\"hơi thở sành điệu, tự tin trong thiết kế KODO của mẫu xe thế hệ mới. Mẫu xe hướng bạn đến hình mẫu mà bạn khao khát.', 517000000, '1704352844new-mazda2-lux-hatchback.jpg', 'new-mazda2-sport-15l-luxury', '2023-09-11', NULL, NULL, 1, 2, 1),
(11, 'Mazda CX-8 2.5L Luxury', 'Tại Mazda, không có chi tiết nào được xem là chi tiết nhỏ khi đề cập đến quá trình tạo nên một mẫu xe. Mazda CX-8 là sự kết hợp hoàn hảo từ thiết kế đến tiện nghi, công nghệ, giúp chiếc xe dễ dàng thu hút mọi ánh nhìn.', 949000000, '1704353086mazda-cx-8_2.jpg', 'mazda-cx-8-25l-luxury', '2023-10-25', NULL, NULL, 1, 3, 1),
(12, 'Mazda CX-8 2.5L Premium AWD', 'Tại Mazda, không có chi tiết nào được xem là chi tiết nhỏ khi đề cập đến quá trình tạo nên một mẫu xe. Mazda CX-8 là sự kết hợp hoàn hảo từ thiết kế đến tiện nghi, công nghệ, giúp chiếc xe dễ dàng thu hút mọi ánh nhìn.', 1119000000, '1704353501mazda-cx-8_2.jpg', 'mazda-cx-8-25l-premium-awd', '2023-12-10', NULL, NULL, 1, 3, 1),
(13, 'COROLLA ALTIS 1.8G', 'Đậm chất chơi ngời chuẩn mực', 725000000, '1704353970Corolla-Altis.jpg', 'corolla-altis-18g', '2023-07-12', NULL, NULL, 2, 1, 1),
(14, 'WIGO E', 'Mượt mà, Lướt êm phố thị', 360000000, '1704354286wigoe.jpg', 'wigo-e', '2023-08-12', NULL, NULL, 2, 2, 1),
(15, 'YARIS CROSS', 'Toyota Corolla Cross là mẫu xe Toyota SUV 5 chỗ gầm cao được nhập khẩu nguyên chiếc từ Thái Lan và đã được ra mắt chính thức tại thị trường Việt từ tháng 8/2020.', 650000000, '1704354766toyota-suv-2022-3.jpeg', 'yaris-cross', '2023-06-12', NULL, NULL, 2, 3, 1),
(16, 'FORTUNER 2.4AT 4X2', 'Lướt hành trình - Đậm dấu ấn', 1055000000, '1704354933fortuner-toyota.jpg', 'fortuner-24at-4x2', '2023-10-09', NULL, NULL, 2, 3, 1),
(17, 'HILUX 2.4L 4X2 AT', 'Chinh phục đỉnh cao', 851999999, '1704355320Toyota-Hilux.jpg', 'hilux-24l-4x2-at', '2023-10-10', NULL, NULL, 2, 6, 1),
(18, 'C-Class Mercedes-Benz', 'Đây là thế giới của tôi', 1599000000, '1704355831mercedes-benz-c-class-w206.jpg', 'c-class-mercedes-benz', '2023-07-12', NULL, NULL, 3, 1, 1),
(19, 'mercedes benz E-Class', 'Chọn dẫn đầu', 2159000000, '1704356325mercedes-benz-e-class-w206.jpg', 'mercedes-benz-e-class', '2023-12-12', NULL, NULL, 3, 1, 1),
(20, 'GLC SUV X253', 'Mạnh mẽ, đa tài.', 1909000000, '1704356644mercedes-benz-glc-w206.jpg', 'glc-suv-x253', '2023-12-12', NULL, NULL, 3, 3, 1),
(21, 'Mercedes-AMG GT 4-door', 'Hơn cả một chiếc Gran Turismo đầy lôi cuốn.', 6719000000, '1704357136AMG-GT4.jpg', 'mercedes-amg-gt-4-door', '2023-12-12', NULL, NULL, 3, 5, 1),
(22, 'NX Crossover', 'ĐỊNH HÌNH TƯƠNG LAI', 3130000000, '1704357519lexus-nx-overview.jpg', 'nx-crossover', '2023-12-12', NULL, NULL, 4, 3, 1),
(23, 'RX Crossover', 'KHAI PHÓNG\r\nMỌI QUY CHUẨN', 3430000000, '1704358051lexus-rx-overview.jpg', 'rx-crossover', '2023-12-12', NULL, NULL, 4, 3, 1),
(24, 'lexus LX', 'THỐNG LĨNH MỌI\r\nCUNG ĐƯỜNG', 8500000000, '1704358298lexus-lx-overview.jpg', 'lexus-lx', '2023-12-12', NULL, NULL, 4, 3, 1),
(25, 'Territory Titanium X 1.5L AT', 'Dòng xe Hiện đại', 700000000, '1704359267Ford-Territory.jpg', 'territory-titanium-x-15l-at', '2023-12-21', NULL, NULL, 5, 3, 1),
(26, 'Ford Everest', 'Ford ra mắt Everest thế hệ mới tại Việt Nam hôm 1/7, với 4 phiên bản, 3 tùy chọn Ambiente, Sport, Titanium đều dẫn động một cầu, turbo đơn và Titanium+ dẫn động 2 cầu, turbo kép.', 1637494000, '1704359508Ford-Everest.jpg', 'ford-everest', '2023-12-12', NULL, NULL, 5, 3, 1),
(27, 'Ford Explorer', 'Phiên bản Ford Explorer Limited được trang bị động cơ Xăng 2.3L Ecoboost I4 mạnh mẽ và tiết kiệm nhiên liệu. Với công suất lớn hơn thế hệ động cơ trước đó kết hợp cùng hộp số tự động 10 cấp cho phép chuyển số mượt mà và nhạy bén, Explorer mới luôn mang đế', 2439000000, '1704359658Ford-Exporler.jpg', 'ford-explorer', '2023-12-12', NULL, NULL, 5, 3, 1),
(28, 'Ford Ranger', 'Ford Ranger là mẫu bán tải thành công nhất tại trị trường Việt Nam. Đa dạng phiên bản, kiểu dáng bắt mắt và nhiều trang bị, Ranger đang làm mưa, làm gió trong phân khúc xe bán tải.', 708237000, '1704359953ford-ranger.jpg', 'ford-ranger', '2023-12-12', NULL, NULL, 5, 6, 1),
(29, 'Ranger Sport 2.0L AT 4X4', 'Ford Ranger Sport sở hữu ngoại hình thể thao, mạnh mẽ Thiết kế ngoại thất Ford Ranger Sport 2023 không có nhiều khác biệt so với các bản còn lại.', 900000000, '1704360273ranger-sport-d536.jpg', 'ranger-sport-20l-at-4x4', '2023-12-12', NULL, NULL, 5, 6, 1);

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
  `images` varchar(500) DEFAULT NULL,
  `productCarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcardetail`
--

INSERT INTO `productcardetail` (`productCarDetailID`, `productCarDetailName`, `productCarDetailTextEngine`, `productCarDetailTextInterio`, `productCarDetailTextTechniques`, `images`, `productCarID`) VALUES
(1, 'TOYOTA CAMRY 2.5Q', 'Đây là hạng mục mà xe không có quá nhiều sự cải tiến khi vẫn sử dụng động cơ 2AR-FE, 16 van DOHC, VVT-i, sản sinh công suất sản sinh công suất 178 mã lực tại 6.000 vòng/phút, mô-men xoắn cực đại 235 Nm tại 4.100 vòng/phút. Hệ thống động cơ này đi kèm hộp số tự động 6 cấp. Ngoài ra, xe còn được trang bị 03 chế độ lái là ECO (tiết kiệm), Normal (thông thường) và Sport (thể thao) nhằm thỏa mãn nhu cầu cá nhân của từng khách hàng. Bộ lốp thay đổi thành 235/45R18 có khả năng bám đường tốt hơn.', 'Sở hữu chiều dài trục cơ sở 2825 mm (Tăng 50 mm so với thế hệ trước), Toyota Camry 2.5Q 2022 đã rộng rãi nay càng rộng rãi hơn, chưa kể đến việc tự do chọn nội thất màu be hoặc đen tùy thích thay vì gắn chặt theo từng biến thể như trước đây. Lưới tản nhiệt phía trước cong và hẹp, kết hợp với hốc gió thấp và rộng bên dưới. Hiệu ứng của lưới tản nhiệt phía trên, kết hợp đèn pha mỏng và logo Toyota khiến xe nổi bật lên dáng vẻ trọng tâm rộng, thấp.Nhìn từ bên hông, Xe ô tô Toyota Camry 2.5Q 2022 khỏe khoắn và mạnh mẽ với những đường gân chạy dọc. Gương chiếu hậu hiện đại khi không chỉ chỉnh điện và tích hợp báo rẽ thông thường mà còn gập điện tự động, chống bám nước, nhớ 2 vị trí và tự động điều chỉnh khi lùi.', 'Là phiên bản cao cấp nên điều dễ hiểu là Toyota Camry bản 2.5Q được trang bị hàng loạt tiện nghi hiện đại như: Hệ thống dẫn đường lần đầu tiên được trang bị trên Camry 2.5Q mang đến cảm giác tự tin, an tâm cho người lái trên những lộ trình mới lạ. Tiếp theo là cửa sổ trời giúp hành khách trên xe dễ dàng hòa mình vào không gian thoáng đãng trong lành trong các hành trình. Hệ thống âm thanh JBL 9 loa với công nghệ Clari-Fi đem đến chất lượng âm thanh cao cấp “rót mật vào tai” hành khách, cũng như sự tiện lợi với bảng điều khiển cho cả hàng ghế sau. Xe còn sở hữu hệ thống điều hòa tự động 3 vùng độc lập có cửa gió sau với khả năng làm mát khoang nội thất nhanh, mạnh và sâu. Ngoài ra, hầu hết các tiện nghi thường thấy đều xuất hiện trên chiếc Toyota Camry 2.5Q 2022 này. Đáng chú ý là tính năng', '1703402704cac-dong-xe-toyota-27.jpg', 1),
(2, 'Lexus ES 250', 'Tên xe\r\n\r\nLexus ES 250 2021\r\n\r\nSố chỗ ngồi\r\n\r\n5\r\n\r\nKiểu xe\r\n\r\nSedan\r\n\r\nXuất xứ\r\n\r\nNhập khẩu nguyên chiếc từ Nhật Bản\r\n\r\nKích thước DxRxC (mm)\r\n\r\n4.975 x 1.865 x 1.445\r\n\r\nChiều dài cơ sở (mm)\r\n\r\n2.870 mm\r\n\r\nĐộng cơ\r\n\r\nI4 2.5L\r\n\r\nDung tích công tác\r\n\r\n2.5L\r\n\r\nLoại nhiên liệu\r\n\r\nXăng\r\n\r\nCông suất cực đại (hp)\r\n\r\n210\r\n\r\nMô-men xoắn cực đại (Nm)\r\n\r\n335\r\n\r\nHộp số\r\n\r\nTự động 8 cấp\r\n\r\nHệ dẫn động\r\n\r\nCầu trước\r\n\r\nTreo trước/sau\r\n\r\nMacpherson/tay đòn kép\r\n\r\nHệ thống lái\r\n\r\nTrợ lực điện\r\n\r\nCỡ mâm\r\n\r\n18 inch\r\n\r\nKhả năng tăng tốc 0-100 km/h\r\n\r\n9.1 giây\r\n\r\nTốc độ tối đa\r\n\r\n204 km/h\r\n\r\nMức tiêu hao nhiên liệu trung bình\r\n\r\n7,06 L/100 km', 'Nội thất của Lexus ES 250 được thiết kế với sự tinh tế và đẳng cấp, với các chi tiết cao cấp và tính năng tiên tiến để đảm bảo sự thoải mái và tiện nghi cho người lái và hành khách trên xe.\r\n\r\nGhế trước và sau của xe được bọc da cao cấp, tạo nên cảm giác êm ái và thoải mái khi ngồi. Ghế trước có tính năng điều chỉnh điện, tính năng sưởi và thông gió, và cả tính năng massage để giảm stress sau một ngày làm việc căng thẳng. Bên cạnh đó, bảng điều khiển trung tâm của xe được trang bị màn hình cảm ứng LCD kích thước lớn, cho phép người lái điều khiển các tính năng của xe một cách dễ dàng và nhanh chóng. Hệ thống giải trí trên xe cũng rất đa dạng, bao gồm hệ thống âm thanh cao cấp, kết nối Bluetooth, đài FM/AM, kết nối USB và AUX, và hỗ trợ Apple CarPlay và Android Auto.', 'Hệ thống âm thanh cao cấp: Xe được trang bị hệ thống âm thanh Mark Levinson với 17 loa và công suất lên tới 1800 watt, mang đến âm thanh rõ ràng và sống động.\r\n\r\nHệ thống giải trí: Lexus ES 250 có hệ thống giải trí với màn hình cảm ứng đa chức năng, kết nối Bluetooth, Apple CarPlay và Android Auto, giúp người sử dụng dễ dàng kết nối và điều khiển các thiết bị di động.\r\n\r\nHệ thống điều hòa tự động đa vùng: Hệ thống điều hòa tự động đa vùng giúp người sử dụng điều chỉnh nhiệt độ và lưu lượng gió cho từng vị trí khác nhau trong xe.\r\n\r\nGhế da cao cấp: Ghế lái và ghế hành khách được bọc da cao cấp, có tính năng sưởi ấm, làm mát, điều chỉnh điện và bộ nhớ vị trí.\r\n\r\nHệ thống cảm biến và camera: Xe được trang bị hệ thống cảm biến và camera giúp người sử dụng quan sát và giám sát toàn bộ khoang xe', '1703579403Lexus-ES-1_red.jpg', 2),
(3, 'Lexus ES 300h', 'Số chỗ ngồi\r\n\r\n05\r\n\r\nKiểu xe\r\n\r\nsedan\r\n\r\nXuất xứ\r\n\r\nNhập khẩu nguyên chiếc\r\n\r\nKích thước DxRxC\r\n\r\n4975 x 1865 x 1445 mm\r\n\r\nTự trọng\r\n\r\n1,680 – 1,740 kg\r\n\r\nChiều dài cơ sở\r\n\r\n2870 mm\r\n\r\nĐộng cơ\r\n\r\nXăng 2.5L 4 xy-lanh thẳng hàng kết hợp động cơ điện\r\n\r\nDung tích bình xăng\r\n\r\n50L\r\n\r\nCông suất cực đại\r\n\r\n214 mã lực tại 5700 vòng/phút\r\n\r\nMô-men xoắn cực đại\r\n\r\n221 Nm tại 3600-5200 vòng/phút\r\n\r\nHộp số\r\n\r\nVô cấp CVT\r\n\r\nTăng tốc 0-100km/h\r\n\r\n8.9 giây\r\n\r\nTốc độ tối đa\r\n\r\n180km/h\r\n\r\nTreo trước/sau\r\n\r\nMacpherson/tay đòn kép\r\n\r\nPhanh trước/sau\r\n\r\nĐĩa thông gió/đĩa thường\r\n\r\nCỡ mâm\r\n\r\n18 inch\r\n\r\nMức tiêu hao nhiên liệu trung bình\r\n\r\n4.7L/100km', 'Lexus ES 300h được trang bị các tiện nghi hiện đại và tiên tiến như hệ thống âm thanh Mark Levinson, hệ thống giải trí với màn hình cảm ứng kích thước lớn, kết nối Bluetooth, hệ thống điều hòa tự động đa vùng, hệ thống khởi động bằng nút bấm và hệ thống giảm ồn bên trong.\r\n\r\nBên cạnh đó, nội thất của Lexus ES 300h cũng được thiết kế với sự chú trọng đến chi tiết nhỏ nhặt và các tính năng tiện ích, như hệ thống giữa hai ghế trước có nhiều khay đựng đồ và cổng sạc USB, cửa sổ trời panorama rộng lớn, hệ thống thông tin giải trí với kết nối smartphone thông qua Apple CarPlay và Android Auto, và hệ thống âm thanh surround của Mark Levinson với 17 loa, tạo ra âm thanh chất lượng cao và không gian giải trí tuyệt vời.Đuôi xe Lexus ES 300h\r\nĐuôi xe Lexus ES 300h cũng được thiết kế khá tinh tế và đẳ', 'Hệ thống thông tin giải trí\r\nLexus ES 300h được trang bị màn hình cảm ứng kích thước lớn\r\nHệ thống âm thanh Mark Levinson\r\nHệ thống giải trí với kết nối Bluetooth.\r\nHệ thống điều hòa tự động đa vùng\r\nHệ thống giải trí với kết nối smartphone thông qua Apple CarPlay và Android Auto\r\nHệ thống âm thanh surround của Mark Levinson với 17 loa\r\nHệ thống lái: Lexus ES 300h được trang bị hệ thống lái chính xác và dễ dàng điều khiển. \r\nHệ thống lái trợ lực điện (Electric Power Steering)\r\nHệ thống khởi động bằng nút bấm (Push Start Button) \r\nHệ thống lái tự động (Adaptive Cruise Control)\r\nKhả năng tiết kiệm nhiên liệu: Lexus ES 300h được trang bị động cơ Hybrid Synergy Drive. Cho phép tiết kiệm nhiên liệu tốt hơn so với các loại động cơ truyền thống. Giúp giảm thiểu lượng khí thải và bảo vệ môi trường', '1703579819lexus-es300h-13.jpg', 3),
(4, 'Honda City 2022', 'Động cơ Honda City 2022 mạnh nhất phân khúc\r\nHonda City 2022 thế hệ thứ 5 tiếp tục được trang bị khối động cơ I4 1.5L i-VTEC. Tại Việt Nam, không có bản động cơ tăng áp I3 1.0L như tại thị trường Thái Lan. \r\n\r\nĐiểm đặc biệt ở khối động cơ này là sử dụng cam kép DOHC, điều này giúp khả năng vận hành của xe được tối ưu hơn. Hộp số tự động vô cấp CVT cũng có sự tinh chỉnh. Theo đó, khối động cơ này sản sinh ra công suất tối đa 119 mã lực tại 6.600 vòng/phút, mô men xoắn 145Nm tại 4.300 vòng/phút.Về công suất, động cơ 1.5L DOHC 119 mã lực mới trên Honda City mạnh hơn động cơ cũ (118 mã lực) 1 mã lực. Dù sự thay đổi về mã lực không quá lớn, nhưng nếu so với những đối thủ cùng phân khúc thì City vẫn đứng đầu về sức mạnh.\r\n\r\nHonda City vẫn sử dụng hệ thống treo trước McPherson và treo sau giằng x', 'Nội thất City 2022 cứng cáp, thể thao\r\nNội thất Honda City 2022 có sự đổi hoàn toàn mới với không gian rộng rãi hơn. Cùng với đó, một vài chi tiết được nhấn nhá tinh tế mang đến nét thể thao, cá tính hơn.\r\n\r\nKhoang lái\r\nThiết kế nội thất Honda City với kiểu đối xứng quen thuộc nhưng được làm gãy gọn, thể thao và hiện đại hơn. Nổi bật phải kể đến bảng taplo được làm từ nhựa cứng nhưng được phối nhiều tông màu và chỉ viền giúp tôn lên sự cao cấp, sang trọng.\r\n\r\nMàn hình trung tâm của xe có kích thước lớn và được làm mỏng hơn cũng mang đến trải nghiệm tiện dụng và thanh thoát hơn với tính năng cảm ứng và kết nối với điện thoại qua Apple Carplay/Android Auto.Hệ thống ghế ngồi \r\nCity có hai tuỳ chọn chất liệu bọc ghế. Phiên bản City G và L sử dụng bọc ghế nỉ, trong khi bản RS là ghế bọc da kết ', 'Trang bị an toàn cao cấp\r\nHệ thống an toàn trên Honda City thế hệ mới khá đầy đủ như: hệ thống chống bó cứng phanh ABS, hệ thống hỗ trợ lực phanh khẩn cấp BA, hệ thống phân bổ lực phanh điện tử EBD, hỗ trợ khởi hành ngang dốc HSA, hệ thống cân bằng điện tử VSA…', '1703657086honda-city.jpg', 4),
(5, 'Honda Civic 2022', 'Điểm gây nhiều thất vọng trên Honda Civic 2022 là tất cả các phiên bản chỉ trang bị 1 tùy chọn vận hành. Sức mạnh sẽ được cung cấp từ động cơ 1.5L tăng áp, 4 xi lanh thẳng hàng cho công suất tối đa 176 mã lực và mô-men xoắn cực đại 240Nm. Đi kèm đó là hộp số vô cấp CVT với trang bị tiêu chuẩn 2 chế độ vận hành: Normal và Econ. Riêng có phiên bản RS mới được trang bị thêm chế độ Sport.\r\n\r\nHệ thống vận hành của Civic 2022 tiếp tục trang bị trợ lực lái điện thích ứng với chuyển động, chức năng hướng dẫn lái xe tiết kiệm…', 'Ngoại thất hiện đại và trưởng thành hơn\r\nNhìn bằng mắt thường, Honda Civic 2022 không quá khác biệt so với thế hệ trước. Tuy nhiên thực tế thì mẫu xe này đã được kéo dài hơn 30mm, chiều dài cơ sở cũng được tăng thêm 35 mm. Đây là 2 thông số sẽ tạo nên sự khác biệt cho Honda Civic 2022, giúp xe cải thiện khả năng di chuyển trên đường thẳng và ổn định hơn khi đánh lái.Nổi bật nhất về thiết kế ở thế hệ thứ 11 phải nói về cách tạo hình làm cho người nhìn có cảm giác chiếc xe bề thế và vững chãi hơn. Thay vì hất lên như đời trước, các chi tiết bây giờ được sắp đặt theo phương ngang.\r\n\r\nRất nhiều chi tiết được nhà sản xuất làm mới lại như: Mặt ca-lăng đường viền mạ chrome to bản trên thế hệ trước đã được lược bỏ, hốc hút gió được thiết kế nổi bật hơn nhờ những nan ngang nhỏ hơn và được sơn màu đ', 'Tính năng công nghệ hàng đầu phân khúc\r\nHonda cũng trang bị cho tất cả các phiên bản của Honda Civic 2022 hệ thống an toàn Honda Sensing. Trên vô lăng có tích hợp đầy đủ nút bấm cảnh báo chệch làn, giữ làn hay điều chỉnh khoảng cách với xe phía trước … Điểm khác biệt duy nhất là phiên bản RS có thêm lẫy chuyển số thể thao. \r\n\r\nNgoài vô lăng, cụm đồng hồ lái của Honda Civic 2022 cũng mang đến cho người dùng trải nghiệm vượt trội so với thế hệ trước. Xe được trang bị màn hình đa thông tin cỡ lớn 7 hoặc 10,2 inch. Tiêu chuẩn đồng hồ lái thậm chí còn cao cấp hơn cả đàn anh Honda Accord.Ghế ngồi trên Honda Civic 2022 cũng thiết kế theo phong cách thể thao như trước đây, với 2 lựa chọn chất liệu nỉ trên phiên bản E và G, và chất liệu da kết hợp da lộn dành cho phiên bản RS. Đặc biệt ghế ngồi phi', '1703657291honda-civic.jpg', 5),
(6, 'Mazda 3', 'Động cơ vận hành\r\n\r\nMazda 3 Hatchback 2024 trang bị động cơ xăng SkyActiv-G 4 xy lanh thẳng hàng DOHC 16 van với 2 tùy chọn. Một là động cơ SkyActiv-G 1.5L với công suất 110 mã lực cùng mô men xoắn 146Nm. Hai là động cơ SkyActiv-G 2.0L công suất 153 mã lực và mô men xoắn 200Nm. Xe trang bị hộp số tự động 6 cấp với toàn bộ sức mạnh truyền xuống hệ dẫn động cầu trước.\r\n\r\nMức tiêu hao nhiên liệu\r\n\r\nMức tiêu hao nhiên liệu của Mazda 3 Hatchback 2024 đối với điều kiện đường hỗn hợp là 6.4L/100Km. Trong khi đó đường đô thị xe tiêu hao 8.2L/100Km và ngoài đô thị là 5.4L/100Km.', 'Thiết kế ghế ngồi\r\n\r\nSo với Sedan thì bản Hatchback có không gian hàng ghế sau rộng rãi hơn vì cốp xe nhỏ và trục cơ sở xe tăng 25mm (2.725mm). Vì vậy mà hành khách duỗi chân dễ dàng. Độ dốc lưng ghế lớn hơn thế hệ trước đảm bảo người ngồi thoải mái bất kể hành trình dài. Đặc biệt với cửa sổ trời tích hợp trên trần xe mà không gian thoáng đãng hơn.\r\nThiết kế vô lăng & táp lô\r\n\r\nMazda 3 Hatchback 2024 sở hữu vô lăng 3 chấu đa chức năng bọc da cao cấp tích hợp cả lẫy chuyển số và nút bấm tiện ích. Khoang lái của Mazda 3 Hatchback không khác biệt nhiều với Sedan. Điểm duy nhất đáng chú ý là táp lô xe sử dụng chất liệu da màu đỏ. Mặc dù thay đổi nhỏ nhưng cũng đủ khiến bảng táp lô trở nên khác lạ và đặc biệt hơn.\r\n\r\nNgôn ngữ KODO mới với thiết kế tập trung vào người lái sẽ giúp bạn cảm thấy dễ', 'Trang bị tiện nghi giải trí\r\n\r\nCác trang bị tiện nghi của Mazda 3 Hatchback 2024 được đánh giá cao, cụ thể màn hình cảm ứng 8.8 inch kết nối hệ thống thông tin giải trí Mazda Connect. Hệ thống này điều khiển bằng núm xoay trên bảng điều khiển, dễ điều hướng và hiển thị hình ảnh rõ nét. Ngoài ra còn có đầu DVD, dàn âm thanh 8 loa chất lượng cao, kết nối USB, AUX và Bluetooth.\r\n\r\nMazda 3 Hatchback 2024 trang bị hệ thống điều hòa 2 vùng độc lập giống thế hệ cũ hỗ trợ làm mát nhanh. Hàng ghế phía sau có kèm các cửa gió giúp không gian thoáng mát tràn ngập khoang cabin. Một số tính năng khác như điện thoại rảnh tay Bluetooth, Apple CarPlay và Android Auto, radio vệ tinh SiriusXM, khởi động nút bấm….', '1704094039Mazda-3.jpg', 6),
(7, 'Toyota Yaris', 'Thông số kỹ thuật cơ bản Toyota Yaris mới\r\nSố chỗ: 05\r\nĐộng cơ: Xăng 1.5L, 4 xy lanh thẳng hàng\r\nCông suất tối đa: 107 mã lực tại 6000 vòng/phút\r\nHộp số: Vô cấp CVT\r\nDẫn động: Cầu trước\r\nMô-men xoắn (Nm): 140 Nm tại 4200 vòng/phút', 'Nội thất đầy đủ tiện nghi\r\nNội thất Toyota Yaris 2023 được tối giản hóa theo phong cách “less-is-more” (càng ít lại càng nhiều). Xe sử dụng nhiều vật liệu cao cấp, mềm mại cho nội thất hơn. Táp lô mỏng hơn và thấp hơn. Các màn hình lớn hơn và dễ sử dụng hơn, ngoài ra còn có màn hình hiển thị kính lái rộng 10 inch.\r\nNội thất xe được nâng cấp nhiều chi tiết trang trí bằng chrome sáng bóng, đề nổ bằng nút bấm, hệ thống âm thanh sáu loa, có gương trang điểm và hộp sơ cứu. Với kiểu dáng hatchback, Toyota Yaris 2023 sẽ có lợi thế hơn khi sở hữu trần cao. Nhờ vậy mà không gian chứa hành lý được rộng rãi hơn, người ngồi phía sau sẽ có thêm không gian phía trần.\r\nPhần ghế ngồi không quá màu mè, màu sắc tối giản sang trọng, hàng ghế trước thiết kế hai phần đệm tay rộng, đảm bảo cảm giác ngồi thoải m', 'Khung xe GOA\r\n\r\nKhung xe GOA được chế tạo đặc biệt với các vùng co rụm ở phía trước và phía sau có tác dụng hấp thụ xung lực khi va chạm. Bên cạnh đó, khoang hành khách là khu vực được bảo vệ tốt nhất với thiết kế vững chắc nhằm hạn chế tối đa sự biến dạng với các thanh gia cường.\r\nHỗ trợ lực phanh khẩn cấp\r\n\r\nVới bộ cảm biến áp suất dầu phanh, hệ thống hỗ trợ lực phanh khẩn cấp BA tự động gia tăng thêm lực phanh trong trường hợp khẩn cấp, mang lại sự an tâm cho hành khách trên mọi chuyến đi.\r\nHệ thống khởi hành ngang dốc (HAC)\r\n\r\nHAC sẽ tự động phanh tới các bánh xe trong 2 giây giúp xe không bị trôi, khi người lái chuyển từ chân phanh sang chân ga để khởi hành ngang dốc', '1704094931toyota-yaris.jpg', 7),
(8, 'NEW MAZDA2', 'KÍCH THƯỚC - KHỐI LƯỢNG\r\nKích thước tổng thể	4340 x 1695 x 1470 (mm)	\r\nChiều dài cơ sở	2570 (mm)	\r\nBán kính quay vòng tối thiểu	4.7 (m)	\r\nKhoảng sáng gầm xe	140	\r\nKhối lượng không tải	1111	\r\nKhối lượng toàn tải	1538	\r\nThể tích khoang hành lý	440	\r\nDung tích thùng nhiên liệu	44\r\n\r\nĐỘNG CƠ - HỘP SỐ\r\nLoại động cơ	Skyactiv-G 1.5L	\r\nHệ thống nhiên liệu	Phun xăng trực tiếp / Direct Injection	\r\nDung tích xi lanh	1496	\r\nCông suất tối đa	110/6000	\r\nMô men xoắn cực đại	144/4000	\r\nHộp số	6AT	\r\nChế độ thể thao	\r\nHệ thống kiểm soát gia tốc (GVC)	GVC Plus', 'SỰ KẾT HỢP HÀI HOÀ CỦA ÁNH SÁNG VÀ BÓNG TỐI\r\nChủ đề thiết kế không gian bên trong của New Mazda2 là nghệ thuật thể hiện sự hài hoà của ánh sáng và bóng tối, cùng với chất lượng vật liệu để có thể tạo ra màu sắc phong phú và vẻ đẹp cho không gian.\r\n\r\nPHONG CÁCH THIẾT KẾ ẤN TƯỢNG\r\nMẫu xe đô thị với thết kế tinh giản cùng nghệ thuật đường nét thân xe mang tới vẻ đẹp năng động, hoà quyện cùng điểm nhấn thể thao, cá tính nổi bật.', 'VẬN HÀNH ỔN ĐỊNH VÀ LINH HOẠT\r\nHệ thống Skyactiv-Vehicle Dynamics và hệ thống kiểm soát gia tốc G-Vectoring Control đều là những công nghệ tiến tiến giúp người lái kiểm soát hành trình di chuyển tối ưu. Công nghệ này giúp xe duy trì sự êm ái ngay cả khi ôm cua và thoát cua.\r\n\r\nNÂNG TẦM GIÁ TRỊ TIỆN NGHI\r\nMazda đã nâng cấp giao diện điều khiển cho người dùng bằng cách bố trí lại chân ga, vị trí lái xe, hệ thống giải trí và điều chỉnh tầm nhìn trong buồng lái; bổ sung hàng loạt tiện ích như: màn hình HUD, Apple CarPlay và Android Auto kết nối thông minh, gương tự động chống chói… giúp người lái dễ dàng kết nối và điều khiển mọi thứ trong tầm tay. Tất cả những yếu tố tiện nghi cao cấp giúp người sở hữu lái xe với tâm trí thoải mái và mang đến cảm hứng sống tích cực từng ngày.', '1704352221new-mazda2.jpg', 8),
(9, 'New Mazda2 1.5L Luxury', 'KÍCH THƯỚC - KHỐI LƯỢNG\r\nKích thước tổng thể	4340 x 1695 x 1470 (mm)	\r\nChiều dài cơ sở	2570 (mm)	\r\nBán kính quay vòng tối thiểu	4.7 (m)	\r\nKhoảng sáng gầm xe	140	\r\nKhối lượng không tải	1111	\r\nKhối lượng toàn tải	1538	\r\nThể tích khoang hành lý	440	\r\nDung tích thùng nhiên liệu	44\r\n\r\nĐỘNG CƠ - HỘP SỐ\r\nLoại động cơ	Skyactiv-G 1.5L	\r\nHệ thống nhiên liệu	Phun xăng trực tiếp / Direct Injection	\r\nDung tích xi lanh	1496	\r\nCông suất tối đa	110/6000	\r\nMô men xoắn cực đại	144/4000	\r\nHộp số	6AT	\r\nChế độ thể thao	\r\nHệ thống kiểm soát gia tốc (GVC)	GVC Plus	\r\nHệ thống ngừng/khởi động thông minh', 'SỰ KẾT HỢP HÀI HOÀ CỦA ÁNH SÁNG VÀ BÓNG TỐI\r\nChủ đề thiết kế không gian bên trong của New Mazda2 là nghệ thuật thể hiện sự hài hoà của ánh sáng và bóng tối, cùng với chất lượng vật liệu để có thể tạo ra màu sắc phong phú và vẻ đẹp cho không gian.\r\n\r\nNỘI THẤT\r\nChất liệu nội thất (Da)	Nỉ	\r\nGhế lái điều chỉnh điện	Chỉnh cơ	\r\nGhế lái có nhớ vị trí	\r\nGhế phụ điều chỉnh điện	Chỉnh cơ	\r\nDVD player	\r\nMàn hình cảm ứng	Màn hình Analog + Digital	\r\nKết nối AUX, USB, bluetooth	\r\nSố loa	4	\r\nLẫy chuyển số	\r\nPhanh tay điện tử	\r\nGiữ phanh tự động	\r\nKhởi động bằng nút bấm	\r\nGa tự động	\r\nĐiều hòa tự động	\r\nCửa gió hàng ghế sau	\r\nCửa sổ chỉnh điện	Auto ghế lái	\r\nGương chiếu hậu trung tâm chống chói tự động	\r\nMàn hình hiển thị tốc độ HUD	\r\nRèm che nắng kính sau chỉnh điện	\r\nRèm che nắng cửa sổ hàng ghế sau	\r\nT', 'NÂNG TẦM GIÁ TRỊ TIỆN NGHI\r\nMazda đã nâng cấp giao diện điều khiển cho người dùng bằng cách bố trí lại chân ga, vị trí lái xe, hệ thống giải trí và điều chỉnh tầm nhìn trong buồng lái; bổ sung hàng loạt tiện ích như: màn hình HUD, Apple CarPlay và Android Auto kết nối thông minh, gương tự động chống chói… giúp người lái dễ dàng kết nối và điều khiển mọi thứ trong tầm tay. Tất cả những yếu tố tiện nghi cao cấp giúp người sở hữu lái xe với tâm trí thoải mái và mang đến cảm hứng sống tích cực từng ngày\r\nVẬN HÀNH MẠNH MẼ VÀ TỐI ƯU\r\nVới các thông số vận hành tốt nhất so với các mẫu xe cùng kích cỡ như chiều dài cơ sở lớn nhất (2.570mm) và bán kính quay vòng nhỏ nhất (4,7m); Khả năng tăng tốc nhanh và mức tiêu hao nhiên liệu lý tưởng, Mazda2 thể hiện “chất lượng vượt trội” về khả năng vận hành l', '1704352593new-mazda2-lux-pre.jpg', 9),
(10, 'Mazda CX-8 2.5L Luxury', 'ĐỘNG CƠ - HỘP SỐ\r\nLoại động cơ	Skyactiv-G 2.5L	\r\nHệ thống nhiên liệu	Phun xăng trực tiếp	\r\nDung tích xi lanh	2488	\r\nCông suất tối đa	188/6000	\r\nMô men xoắn cực đại	252/4000	\r\nHộp số	Tự động 6 cấp (6AT)	\r\nChế độ thể thao	\r\nHệ thống kiểm soát gia tốc (GVC)	\r\nHệ thống ngừng/khởi động thông minh	\r\n\r\nSỨC MẠNH ĐẾN TỪ ĐỘNG CƠ\r\nMazda CX-8 được trang bị động cơ SKYACTIV-G 2.5L thế hệ mới đạt công suất cực đại 188 mã lực tại vòng tua 6000 vòng/phút và mô-men xoắn cực đại 252 Nm tại vòng tua 4000 vòng/phút và ứng dụng công nghệ phun xăng trực tiếp với tỉ số nén cao, cùng hộp số tự động 6 cấp được thiết kế riêng để chuyển số mượt mà, giúp xe vận hành êm ái, tiết kiệm nhiên liệu, giảm thiểu khí thải.', 'NỘI THẤT ĐẲNG CẤP, SANG TRỌNG\r\nMazda CX-8 là mẫu xe duy nhất trong phân khúc được trang bị da cao cấp Nappa, loại da tự nhiên, không chỉ mang đến cảm giác êm ái, mềm mại và mịn màng, thoáng khí mà còn thể hiện được sự đẳng cấp, tôn vinh giá trị và nâng cao trải nghiệm cho người sở hữu. Không gian nội thất còn tạo điểm nhấn với các chi tiết ốp gỗ sang trọng. Tất cả các chi tiết gỗ được sử dụng trên xe Mazda CX-8 đều là gỗ thiên nhiên được chọn lọc tỉ mỉ, bề mặt được xử lý kỹ, nâng cao đẳng cấp cho người sử dụng. Tất cả hướng đến mục tiêu nâng cao đẳng cấp cho người sử dụng, tôn vinh giá trị và tăng trải nghiệm cho người sở hữu.\r\n\r\nSUV 7 CHỖ ĐÍCH THỰC\r\nMazda CX-8 là mẫu SUV sở hữu hàng ghế 3 có khoảng để chân lớn nhất phân khúc với chiều cao đệm ghế hợp lí mang lại tư thế ngồi thoải mái khi ', 'TRANG BỊ TIỆN NGHI HÀNG ĐẦU PHÂN KHÚC\r\nMazda CX-8 sở hữu khoang lái thiết kế hiện đại, tích hợp nhiều tính năng nhằm hỗ trợ tối đa người lái, giúp việc lái xe trở nên dễ dàng và bớt căng thẳng. Hàng ghế trước trang bị ghế chỉnh điện, ghế lái có tính năng nhớ vị trí; chức năng sưởi ghế; điều hoà tự động 3 vùng độc lập; gương chống chói; Mazda Connect, DVD; phanh tay điện tử, hệ thống tự động giữ phanh Auto Hold; chìa khoá thông minh, khởi động nút bấm; màn hình HUD hiển thị các thông tin quan trọng ngay tầm mắt người lái; và đặc biệt là hệ thống 10 loa Bose mang đến âm thanh chân thực, sống động.', '1704353237mazda-cx-8_2.jpg', 11),
(11, 'Mazda CX-8 2.5L Premium AWD', 'ĐỘNG CƠ - HỘP SỐ\r\nLoại động cơ	Skyactiv-G 2.5L	\r\nHệ thống nhiên liệu	Phun xăng trực tiếp	\r\nDung tích xi lanh	2488	\r\nCông suất tối đa	188/6000	\r\nMô men xoắn cực đại	252/4000	\r\nHộp số	Tự động 6 cấp (6AT)	\r\nChế độ thể thao	\r\nHệ thống kiểm soát gia tốc (GVC)	\r\nHệ thống ngừng/khởi động thông minh	\r\n\r\nSỨC MẠNH ĐẾN TỪ ĐỘNG CƠ\r\nMazda CX-8 được trang bị động cơ SKYACTIV-G 2.5L thế hệ mới đạt công suất cực đại 188 mã lực tại vòng tua 6000 vòng/phút và mô-men xoắn cực đại 252 Nm tại vòng tua 4000 vòng/phút và ứng dụng công nghệ phun xăng trực tiếp với tỉ số nén cao, cùng hộp số tự động 6 cấp được thiết kế riêng để chuyển số mượt mà, giúp xe vận hành êm ái, tiết kiệm nhiên liệu, giảm thiểu khí thải.', 'NỘI THẤT\r\nChất liệu nội thất (Da)	Ghế da Nappa	\r\nGhế lái điều chỉnh điện	\r\nGhế lái có nhớ vị trí	\r\nGhế phụ điều chỉnh điện	\r\nDVD player	\r\nMàn hình cảm ứng	8\"	\r\nKết nối AUX, USB, bluetooth	\r\nSố loa	10 loa Bose	\r\nLẫy chuyển số	\r\nPhanh tay điện tử	\r\nGiữ phanh tự động	\r\nKhởi động bằng nút bấm	\r\nGa tự động	\r\nĐiều hòa tự động	\r\nCửa gió hàng ghế sau	\r\nCửa sổ chỉnh điện	\r\nGương chiếu hậu trung tâm chống chói tự động	\r\nMàn hình hiển thị tốc độ HUD	\r\nRèm che nắng kính sau chỉnh điện	\r\nRèm che nắng cửa sổ hàng ghế sau	\r\nTựa tay hàng ghế sau	\r\nTựa tay ghế sau tích hợp cổng USB	\r\nHàng ghế thứ hai gập theo tỉ lệ 60:40	\r\n\r\nNỘI THẤT ĐẲNG CẤP, SANG TRỌNG\r\nMazda CX-8 là mẫu xe duy nhất trong phân khúc được trang bị da cao cấp Nappa, loại da tự nhiên, không chỉ mang đến cảm giác êm ái, mềm mại và mịn màng, ', 'CÔNG NGHỆ SKYACTIV®\r\nMối quan tâm của Mazda là một trải nghiệm lái đầy hứng khởi. Với Mazda CX-8, Mazda tiếp tục duy trì tinh thần này thông qua công nghệ Skyactiv® - yếu tố quan trọng giúp mẫu SUV 7 chỗ vượt trội hơn so với các đối thủ về khả năng mang đến trải nghiệm lái bùng nổ.', '1704353601mazda-cx-8_2.jpg', 12),
(12, 'COROLLA ALTIS 1.8G', 'Hộp số tự động vô cấp\r\n\r\nHộp số tự động vô cấp thông minh CVT vận hành êm ái cho khả năng biến thiên cấp số vô hạn mà không có sự ngắt quãng giữa các bước số. Chức năng sang số thể thao được tích hợp trên hộp số và tay lái đem đến cho chủ sở hữu khả năng đánh lái tối ưu và xử lý nhạy bén, tận hưởng trọn vẹn từng giây phút hứng khởi.\r\n\r\nTNGA\r\n\r\nĐịnh hướng thiết kế toàn cầu của Toyota mang lại cảm giác vận hành tuyệt vời: Tăng tính linh hoạt & tính ổn định, mở rộng tầm quan sát.\r\n\r\nĐộng cơ\r\n\r\nĐộng cơ 2ZR-FBE (1.8L) mạnh mẽ cho công suất tối đa 138 mã lực và mô-men xoắn cực đại 172 Nm.', 'Ghế lái\r\n\r\nGhế ngồi bọc da cho tất cả phiên bản & có thể chỉnh điện lên đến 10 hướng.\r\n\r\nTay lái\r\nĐược thiết kế 3 chấu bọc da mạ bạc, tích hợp các nút điều chỉnh âm thanh, màn hình hiển thị đa thông tin và hệ thống kiểm soát hành trình, hỗ trợ đắc lực cho chủ sở hữu khi lái xe.\r\n\r\nTựa tay hàng ghế thứ hai\r\nHàng ghế sau được trang bị tựa tay mang đến sự thoải mái cho hành khách phía sau, đồng thời trên tựa tay còn trang bị khay đựng cốc/chai nước đầy tiện dụng.\r\n\r\nMàn hình đa thông tin\r\nMàn hình đa thông tin 12.3\'\' mang đến khả năng hiển thị rõ nét & đồng hồ tốc độ có thể chuyển từ loại kim vật lý sang loại hiển thị số.', 'Cảm biến hỗ trợ đỗ xe\r\n\r\nCảm biến hỗ trợ đỗ xe xác định vật cản, phát tín hiệu cảnh báo hỗ trợ người điều khiển thao tác phù hợp để lùi hoặc đỗ xe an toàn, đặc biệt ở những không gian hẹp (được trang bị 6 cảm biến trên phiên bản V & HEV, 2 cảm biến ở phiên bản G).\r\n\r\nCamera lùi\r\n\r\nHỗ trợ người điều khiển xe dễ dàng quan sát & điều chỉnh hướng lái.\r\n\r\nTúi khí\r\n\r\n7 túi khí được trang bị cho cả 3 phiên bản trong đó có túi khí đầu gối bảo vệ tối ưu giúp giảm thiểu chấn thương trong trường hợp va chạm.', '1704354134Corolla-Altis.jpg', 13),
(13, 'WIGO E', 'Động cơ\r\nDung tích động cơ (cc)	1198\r\nCông suất tối đa ((kw)) hp/ Vòng/phút)	(65) 87/6000\r\nHộp số\r\nHộp số	Số sàn 5 cấp\r\nHệ thống treo\r\nHệ thống treo	Độc lập Mc Pherson/ Dầm xoắn', 'Cần số\r\nCần số được đặt ở vị trí cao tạo sự thuận lợi trong quá trình sử dụng.\r\nKhoang lái\r\nKhoang lái\r\nNội thất hiện đại với thiết kế mô phỏng khoang lái thể thao cùng khu vực điều khiển trung tâm hướng đến người lái mang lại sự tiện lợi và cảm giác hưng phấn khi sử dụng. Đồng thời, những họa tiết trang trí tại các khu vực xung quanh được thiết kế tỉ mỉ tạo nên phong cách hiện đại, cao cấp cho khu vực khoang lái.\r\nTay lái\r\nTay lái\r\nTay lái với vô lăng 3 chấu mang lại cảm giác thể thao, năng động.\r\nGhế lái \r\nGhế lái\r\nKiểu dáng hiện đại với chất liệu cao cấp tạo nét thanh lịch, sang trọng cho không gian trong xe.\r\nHệ thống điều hòa \r\nHệ thống điều hòa\r\nĐiều hòa với khả năng làm lạnh nhanh và mát sâu mang lại cảm giác dễ chịu cho hành khách ở mọi vị trí.\r\nKhông gian nội thất\r\nKhông gian nội', 'Hệ thống ổn định thân xe (VSC)\r\n\r\nHệ thống tự động giảm công suất động cơ và phanh bánh xe khi phát hiện nguy cơ xe bị trượt, giúp xe vận hành ổn định, đặc biệt khi xe chuyển hướng đột ngột để tránh chướng ngại vật ở tốc độ cao.\r\n\r\nHệ thống hỗ trợ khỏi hành ngang dốc (HAC)\r\n\r\nHỗ trợ tự động giữ phanh khi người lái nhả chân phanh chuyển sang đạp chân ga lúc khởi hành ngang dốc, ngăn không cho xe bị trôi ngược về phía sau khi khởi hành trên các địa hình nghiêng.', '1704354409wigoe.jpg', 14),
(14, 'YARIS CROSS', 'Vận hành\r\n\r\nToyota Corolla Cross có động cơ xăng 1.8L 2ZR-FE. Công suất xe có thể đạt tới 138 mã lực và mô men xe xoắn cực đại tại 172Nm tùy phiên bản. Xe sử dụng hộp số CVT hiện đại (1.8HV) và hộp số tự động vô cấp (1.8G & 1.8V) cho phép xe có thể tăng tốc được nhanh chóng. Mức tiêu thụ nhiên liệu của xe là 7.64 lít xăng/100km cho cung đường hỗn hợp.\r\nThông số kỹ thuật\r\n\r\nToyota Corolla Cross có kích thước chiều dài x rộng x cao lần lượt là 4.460 x 1.825 x 1.620 (mm), chiều dài cơ sở 2.640mm và khoảng sáng gầm 161mm. Kích thước gọn gàng và gầm cao cho phép chiếc xe Corolla Cross di chuyển linh hoạt trên các cung đường thành thị hẹp.', 'Nội thất\r\n\r\nToyota Corolla Cross có hệ thống nội thất sang trọng với tông màu chính trong xe là đen và đỏ. Toyota Corolla Cross sở hữu màn hình đồng hồ hiển thị 7 inch (1.8HV) hoặc 4.2 inch (1.8G & 1.8V) hiện đại giúp người dùng thuận tiện theo dõi thông tin khi lái xe. Màn hình giải trí cảm ứng rộng 9 inch (1.8HV & 1.8V)/7 inch (1.8G) kết nối được với cả Android Auto và Apple CarPlay. Xe có dàn âm thanh 6 loa cho phép người sử dụng thư giãn ngay trên xe. Hệ thống điều hòa 2 vùng với cửa gió đặt dưới bệ tỳ tay giúp hàng ghế thứ 2 được làm mát nhanh hơn. \r\n\r\nThiết kế cửa sau rộng rãi, thuận tiện cho hành khách khi di chuyển lên, xuống xe. Ghế ngồi được bọc da với khả năng chỉnh điện 8 hướng tại ghế lái và chỉnh cơ 4 hướng đối với ghế hành khách. Ghế sau có khả năng ngả lưng và gập 60/40 giú', 'An toàn\r\n\r\nToyota Corolla Cross được trang bị nhiều hệ thống an toàn như hệ thống kiểm soát lực kéo, định hướng thiết kế toàn cầu mới TNGA, hệ thống khởi hành ngang dốc HAC, hệ thống hỗ trợ lực phanh khẩn cấp, phanh điện tử EBD, chống bó cứng phanh (ABS) giúp xe hoạt động linh hoạt, có khả năng xử lý các trường hợp khẩn cấp. Xe được trang bị đến 07 túi khí giúp lái xe và hành khách luôn yên tâm khi sử dụng xe.', '1704354821toyota-suv-2022-3.jpeg', 15),
(15, 'FORTUNER 2.4AT 4X2', 'Vận hành\r\n\r\nToyota Fortuner có đến 3 loại động cơ, đó là diesel 2.4L công suất 147 mã lực và mô men xoắn 400Nm, động cơ diesel 2.8L công suất 201 mã lực và mô men xoắn 500 Nm và động cơ xăng 2.7L công suất 164 mã lực và mô men xoắn 245 Nm. Với 3 loại động cơ khác nhau thì mức tiêu hao năng lượng của Toyota Fortuner dao động từ 7,03 đến 11,42 lít/100km trên cung đường hỗn hợp. \r\n\r\nThông số kỹ thuật\r\n\r\nToyota Fortuner có thông số dài, rộng, cao lần lượt là 4.795 mm, 1.855 mm và 1.835 mm. Với kích thước này, xe có không gian nội thất thoải mái cho người dùng.', 'Nội thất\r\n\r\nNội thất của Toyota Fortuner được thiết kế hiện đại với bảng đồng hồ taplo tại trung tâm, màn hình giải trí kết nối được với điện thoại thông minh. Dàn âm thanh của xe bao gồm 11 loa JBL (trừ phiên bản 2.4MT 4X2, 2.4MT 4X2, 2.7AT4X2) giúp khách hàng có thể giải trí trên xe. Các ghế ngồi của Toyota Fortuner được bọc da hoặc nỉ, hàng ghế thứ 3 có thể gập 50:50 sang 2 bên sau để ngả lưng. Hàng ghế sau có bệ tỳ tay và có thể gấp gọn nếu muốn tăng không gian. Đặc biệt, trên xe có ngăn đựng kính để người dùng có thể đặt kính cận, kính râm và dễ dàng tìm khi cần sử dụng. Hệ thống điều hòa của Toyota Fortuner loại tự động hoặc chỉnh tay có cửa gió và hộp làm mát ở các ghế sau giúp người ngồi luôn thoải mái trên xe.', 'An toàn\r\n\r\nToyota Fortuner nổi tiếng với độ an toàn với trang bị hệ thống chống bó cứng phanh (ABS), hệ thống hỗ trợ khởi động ngang dốc (HAC), hệ thống phanh tự động khi phát hiện vật cản phía trước, hệ thống cân bằng điện tử (VSC). Fortuner được trang bị 7 túi khí hiện đại hạn chế tối đa chấn thương cho hành khách trong trường hợp tai nạn bất khả kháng.', '1704354991fortuner-toyota.jpg', 16),
(16, 'Toyota Hilux', 'Vận hành\r\n\r\nToyota Hilux 2.4E 4×2 AT sử dụng động cơ dầu kết hợp với hộp số tự động 6 cấp cùng dẫn động cầu sau. Khối động cơ này giúp mang đến công suất 147 mã lực và mô men xoắn đạt 400 Nm. Động cơ dầu kết hợp công nghệ Turbo tăng áp và công nghệ phun nhiên liệu trực tiếp giúp Hilux có khả năng tiết kiệm nhiên liệu tốt. Hệ thống treo trước và sau mang đến cho xe khả năng vận hành ổn định và vượt trội. Bên cạnh đó, khung gầm chắc chắn cũng giúp Toyota Hilux vận hành êm ái suốt hành trình.', 'Nội thất\r\n\r\nĐánh giá Toyota Hilux 2.4E 4×2 AT sở hữu cabin đơn giản và thực dụng. Bảng điều khiển và ốp cửa sử dụng vật liệu nhựa là chủ yếu, nhưng có thêm ốp trang trí gỡ gạc phần nào về mặt thị giác. Nếu như bản Hilux 2.8G phần ốp dạng kính đen, thì các bản 2.4E được mạ bạc.\r\n\r\nThiết kế phần “mặt tiền” nội thất xe được đánh giá ở mức chấp nhận được. Với một chiếc bán tải giá lăn bánh hơn cả tỷ đồng, thực tế khách hàng vẫn muốn có sự đầu tư, trau chuốt về phần nhìn. Vì tính thẩm mỹ hay cảm giác sang trọng cũng là yếu tố ảnh hưởng đến trải nghiệm chung.\r\n\r\nKhông gian rộng rãi và thoải mái được xem là ưu điểm lớn nhất ở các mẫu xe Toyota. Với một chiếc xe bán tải như Toyota Hilux thì khó thể đòi hỏi cabin rộng rãi bằng xe SUV hay crossover. Tuy nhiên khi so sánh với các mẫu xe cùng phân khú', 'Toyota Hilux 2.4E 4×2 AT còn có thêm một số nâng cấp nổi bật có thể kể tới như hỗ trợ kết nối smartphone qua Apple CarPlay/Android Auto. \r\n\r\nToyota Hilux chỉ sử dụng điều hoà tự động và cửa gió hàng ghế sau cho bản 2.8G. Trong khi các phiên bản còn lại chỉ được trang bị điều hoà chỉnh tay và không có cửa gió hàng ghế sau.\r\n\r\nVà cũng chỉ có duy nhất bản Toyota Hilux 2.8G sử dụng cửa sổ chỉnh điện 1 chạm chống kẹt cho cả 4 cửa. Trong khi các bản còn lại đều sử dụng cửa chỉnh điện 1 chạm ở cửa phía ghế lái.\r\nAn toàn\r\n\r\nĐánh giá các trang bị an toàn của Toyota Hilux 2.4L 4×2 AT cũng được nâng cấp đáng kể. Xe nhận được các công nghệ an toàn nổi bật như:\r\n\r\nHỗ trợ phanh ABS, EBD, BA\r\nCân bằng điện tử\r\nKiểm soát lực kéo\r\nHỗ trợ khởi hành ngang dốc\r\n07 túi khí\r\nCảm biến hỗ trợ đỗ xe: Sau, Góc trướ', '1704355410Toyota-Hilux.jpg', 17),
(17, 'C-Class Mercedes-Benz', 'C-Class mới 2022 là thế hệ C-Class đầu tiên được trang bị đèn chào mừng với hình chiếu logo Mercedes-Benz. Xe tích hợp cụm đèn pha trước ứng dụng công nghệ DIGITAL LIGHT giúp trải nghiệm lái an toàn hơn.\r\n\r\nĐây cũng là lần đầu tiên, tất cả các phiên bản của C-Class sedan (W206) đều được trang bị tiêu chuẩn động cơ 4 xi-lanh kết hợp cùng bộ đề kiêm phát điện ISG và bộ pin 48V.\r\n\r\nHệ thống điện trên C-Class mới mang lại khả năng cung cấp tối đa lên đến 15 kW (~20 Hp) và 200Nm mô-men xoắn, giúp giảm thiểu tối đa độ trễ của chân ga khi đề-pa.\r\n\r\nC-Class thế hệ mới được xây dựng trên nền tảng khung sườn Mercedes MRA II với hệ dẫn động cầu sau đặc trưng. Nền tảng này được phát triển lần đầu trên mẫu xe S-Class (W/V222) vào năm 2014 và cũng được áp dụng trên S-Class thế hệ mới (W/V223).\r\n\r\nKhoang', 'Trang bị tiêu chuẩn\r\nHình dạng đổ dài, và sự trang nhã kín đáo mang lại ấn tượng tổng thể thuần túy và diễn giải nét sang trọng hiện đại theo cách hoàn toàn mới. Hệ thống đèn viền nội thất chất cao cấp với thiết kế chiếu sáng kéo dài từ hộp giữa qua toàn bộ xe cùng 64 màu chuyển đổi linh hoạt hoặc chiếu sáng nhiều khu vực của nội thất. Thả lỏng và thư giãn trong thế giới bạn chọn.\r\n\r\nNội thất của thế hệ C-Class mới mang ngôn ngữ thiết kế đương đại và trẻ trung: Hệ thống thông tin giải trí MBUX (Mercedes-Benz User Experience) thế hệ thứ 2 và màn hình giải trí trung tâm 30,2 cm (11,9 inch) tích hợp điều khiển cảm ứng.', 'Giống như S-Class thế hệ mới, C-Class mới được trang bị hệ thống thông tin giải trí MBUX (Mercedes-Benz User Experience) thế hệ thứ hai.. Chỉ vài thao tác chạm với màn hình cảm ứng trung tâm 11.9 inch và hãy sẵn sàng đắm chìm trong không gian âm nhạc của riêng bạn cùng hệ thống âm thanh vòm Burmester 3D.\r\n\r\nTheo thời gian sử dụng, hệ thống sẽ tự động học hỏi theo các thói quen hằng ngày, các hành động lặp đi lặp lại nhiều lần, cũng như cách người lái vận hành xe, từ đó có những phản hồi tương ứng. Với MBUX, chiếc xe sẽ dần trở thành một người bạn tinh tế, và một cộng sự đắc lực.\r\n\r\nKhông chỉ dừng ở thị giác, tuyên ngôn về phong cách sống hiện đại thông minh trên C-Class còn thỏa mãn cả nhu cầu về sự tiện lợi và an toàn. Giảm căng thẳng sau tay lái nhờ hệ thống hỗ trợ lái xe.\r\n\r\nSo với dòng', '1704356129mercedes-benz-c-class-w206.jpg', 18),
(18, 'mercedes benz e-Class', 'Động cơ hybrid bốn và sáu xi-lanh của Mercedes-Benz E-class 2024\r\nHai hệ truyền động hybrid sẽ được cung cấp tại Hoa Kỳ. Cả hai động cơ đều có máy phát điện khởi động tích hợp chạy bằng hệ thống điện 48 volt, với động cơ điện góp phần tăng công suất 23 mã lực và mô-men xoắn 148 pound-feet có thể được sử dụng để giảm độ trễ turbo và khởi động/dừng mượt mà hệ thống. E350 sử dụng động cơ bốn xi-lanh 2.0 lít tăng áp 255 mã lực tạo ra 295 pound-feet, tăng 22 pound-feet so với bốn xi-lanh đi. Bước lên E450 mang đến một động cơ sáu xi-lanh thẳng hàng 3.0 lít sản sinh công suất 375 mã lực và 369 pound-feet, tăng 13 mã lực so với E450 trước đó. Tất cả các E-class đều dẫn động bốn bánh và cả hai hệ truyền động đều kết nối với hộp số tự động chín cấp.\r\n\r\nMercedes-Benz E-Class 2024 học từ quá khứ, hướ', 'Mặc dù Mercedes-Benz E-class 2024 sẽ có hai màn hình tiêu chuẩn, nhưng nội thất công nghệ cao được trình bày ở đây cho thấy một màn hình thứ ba tùy chọn phía trước hành khách, dẫn đến một tấm kính lớn trải dài trên phần còn lại của bảng điều khiển. Thiết lập tương tự trên EQS được gọi là \"Hyperscreen,\" nhưng Mercedes đã hạ cấp trạng thái của màn hình trên Mercedes-Benz E-class xuống chỉ còn \"Super Screen.\" Mercedes cho biết các mẫu E-class 2024 được trang bị hai màn hình có một miếng trang trí lớn ở phía bên phải của bảng điều khiển, nhưng không cung cấp bất kỳ hình ảnh nào cho thấy cấu hình đó.\r\n\r\nMercedes-Benz E-Class 2024 học từ quá khứ, hướng tới tương lai\r\nBộ màn hình ấn tượng của Mercedes-Benz E-class 2024 \r\n\r\nPhần còn lại của cabin Mercedes-Benz E-class 2024 được trang trí bằng số b', 'Mercedes-Benz E-class 2024 có hệ thống treo đa liên kết ở mỗi góc, với hệ thống treo khí nén tùy chọn thay thế thiết lập lò xo thép cơ bản như một phần của gói Công nghệ. Có bộ giảm chấn thích ứng và chức năng cân bằng tải có thể điều chỉnh dựa trên mặt đường. Gói Công nghệ cũng bổ sung hệ thống lái bánh sau, giúp E-class 2024 nhanh nhẹn hơn ở tốc độ thấp hơn bằng cách giảm vòng quay gần 3 feet.\r\n\r\n Mercedes-Benz E-Class 2024 học từ quá khứ, hướng tới tương lai\r\nE-class 2024 có nhiều tính năng hỗ trợ người lái tiêu chuẩn\r\n\r\nMercedes-Benz E-class 2024 có nhiều tính năng hỗ trợ người lái tiêu chuẩn nhưng gói một số nâng cấp—chẳng hạn như hệ thống lái chủ động với tính năng định tâm làn đường và thay đổi làn đường tự động—thành gói Hỗ trợ người lái bổ sung tùy chọn.', '1704356404mercedes-benz-e-class-w206.jpg', 19),
(19, 'GLC SUV X253', 'Động cơ, khả năng tăng tốc 0-60 và tốc độ tối đa\r\nChúng tôi sẽ không bận tâm đến GLC 300d mạnh mẽ hơn, vì 220d gần như nhanh và chi phí thấp hơn. Chiếc thứ hai sẽ đạt tốc độ 0-62 mph trong 7,9 giây, trong khi 300d giảm thời gian này xuống còn 6,5 giây, đứng đầu ở tốc độ 144 mph. Chiếc xăng 300 cũng sử dụng động cơ 2.0 lít, nhưng nhờ công suất 254 mã lực, nó sẽ đạt tốc độ 0-62 mph trong 6,2 giây với tốc độ tối đa 149 mph.\r\n\r\nCả hai động cơ diesel đều sử dụng động cơ 2,0 lít của Mercedes lần đầu tiên được trang bị cho C-Class, đây là một bước tiến so với động cơ 2,1 lít cũ được sử dụng trước năm 2019, mượt mà hơn, êm hơn và nhanh hơn một chút. Chúng cung cấp công suất lần lượt là 191 mã lực và 242 mã lực, trong khi mẫu xe mạnh mẽ hơn cũng có thêm mô-men xoắn 100Nm để tạo ra mô-men xoắn đáng ', 'Nội thất sang trọng và tinh tế trên GLC luôn chào đón bạn bước vào trải nghiệm. Từng chi tiết được thiết kế với một mục đích duy nhất: giúp bạn thoải mái trong suốt hành trình. Tất cả nhờ vào những trang bị công nghệ tối tân và thông minh nhất.', 'Thông minh và nhanh nhạy trong mọi tác vụ. Tính năng cảm ứng trên MBUX giúp bạn lựa chọn chính xác nội dung hiển thị mong muốn và điều khiển một cách mượt mà như thao tác trên chính chiếc smartphone của bạn. Bạn có thể điều khiển cảm ứng MBUX thông qua touchpad, nút cảm ứng trên tay lái hoặc trên màn hình hiển thị - sự lựa chọn nằm ở bạn.', '1704356926mercedes-benz-glc-w206.jpg', 20),
(20, 'Mercedes-AMG GT 4-door', 'Động cơ/hộp số\r\nKiểu động cơ\r\nI6 3.0\r\nDung tích (cc)\r\n2.999\r\nCông suất (mã lực)/vòng tua (vòng/phút)\r\n435hp tại 6100 vòng/phút\r\nMô-men xoắn (Nm)/vòng tua (vòng/phút)\r\n520/1800-5800\r\nHộp số\r\nTự đống 9 cấp AMG SPEEDSHIFT TCT 9G\r\nHệ dẫn động\r\n4 bánh toàn thời gian 4MATIC+\r\nLoại nhiên liệu\r\nXăng\r\nMức tiêu thụ nhiên liệu đường hỗn hợp (lít/100 km)\r\n11,4', 'Nội thất\r\nChất liệu bọc ghế\r\nDa cao cấp\r\nGhế lái chỉnh điện\r\nChỉnh điện\r\nNhớ vị trí ghế lái\r\nCó/Nhớ 3 vị trí\r\nMassage ghế lái\r\nGhế phụ chỉnh điện\r\nCó/Nhớ 3 vị trí\r\nMassage ghế phụ\r\nThông gió (làm mát) ghế lái\r\nThông gió (làm mát) ghế phụ\r\nSưởi ấm ghế lái\r\nSưởi ấm ghế phụ\r\nBảng đồng hồ tài xế\r\nBảng đồng hồ dạng kĩ thuật với màn hình 12.3-inch\r\nNút bấm tích hợp trên vô-lăng\r\nChất liệu bọc vô-lăng\r\nDa nappa /sợi DINAMICA\r\nHàng ghế thứ hai\r\nGập được\r\nChìa khoá thông minh\r\nKhởi động nút bấm\r\nĐiều hoà\r\nĐiều hòa 3 vùng khí hậu tự động THERMOTRONIC\r\nCửa gió hàng ghế sau\r\nCửa kính một chạm\r\nCửa sổ trời\r\nCửa sổ trời toàn cảnh\r\nGương chiếu hậu trong xe chống chói tự động\r\nTựa tay hàng ghế trước\r\nTựa tay hàng ghế sau\r\nMàn hình trung tâm\r\nMàn hình cảm ứng 12.3-inch\r\nKết nối Apple CarPlay\r\nKết nối Andro', 'Số túi khí\r\n4\r\nChống bó cứng phanh (ABS)\r\nHỗ trợ lực phanh khẩn cấp (BA)\r\nPhân phối lực phanh điện tử (EBD)\r\nCân bằng điện tử (VSC, ESP)\r\nKiểm soát lực kéo (chống trượt, kiểm soát độ bám đường TCS)\r\nHỗ trợ khởi hành ngang dốc\r\nHỗ trợ đổ đèo\r\nCảnh báo điểm mù\r\nCảm biến lùi\r\nCamera lùi\r\nCamera 360 độ\r\nCamera quan sát điểm mù\r\nCảnh báo chệch làn đường\r\nHỗ trợ giữ làn\r\nHỗ trợ phanh tự động giảm thiểu va chạm\r\nCảnh báo phương tiện cắt ngang khi lùi\r\nCảnh báo tài xế buồn ngủ\r\nMóc ghế an toàn cho trẻ em Isofix', '1704357310AMG-GT4.jpg', 21),
(21, 'NX Crossover', 'Động cơ của NX 350 loại tăng áp 2,4 lít, công suất 275 mã lực, mô-men xoắn 430 Nm, hộp số tự động 8 cấp, dẫn động 4 bánh toàn thời gian. Giá bán của bản này là 3,01 tỷ đồng.\r\n\r\nBản 350h lắp động cơ 2,5 lít hút khí tự nhiên, cho công suất 188 mã lực, mô-men xoắn cực đại 239 Nm. Động cơ này kết hợp với môtơ điện gắn ở cầu sau, cho tổng công suất 240 mã lực và mô-men xoắn 360 Nm. Hộp số đi kèm loại CVT và dẫn động 4 bánh toàn thời gian. NX 350h giá 3,3 tỷ đồng.', 'Phần đèn pha LED thông minh, thích ứng có kiểu dáng mới. Đèn định vị nằm chung vị trí đèn pha thay vì tách rời như thế hệ trước. NX hay các mẫu xe của Lexus nói chung cho hai hình dung về thiết kế: kiểu năng động vừa phải khi nhìn từ bên hông nhưng góc cạnh, nổi loạn khi nhìn chính diện hoặc từ phía sau.\r\n\r\nĐuôi xe của NX là phần thay đổi nhiều nhất khi vuông vức hơn và dải đèn hậu LED mới vắt ngang. Cả 2 phiên bản F Sport và 350h đều chỉ có lựa chọn la-zăng 20 inch kèm lốp run-flat. Riêng bản F Sport trang bị hệ thống treo thích ứng và các chi tiết ở lưới tản nhiệt, cản trước/cản sau góc cạnh hơn.', 'Khoang lái Lexus NX 350 lột xác so với thế hệ cũ khi các chi tiết được sắp xếp lại theo hướng tinh giản và hướng về người lái. Những trang bị tiêu chuẩn ở nội thất như màn hình cảm ứng thông tin giải trí 14 inch kết nối điện thoại thông minh, lẫy chuyển số, màn hình HUD trên kính lái, cửa sổ trời, điều hòa hai vùng. Bên cạnh đó là hệ thống dẫn đường với bản đồ Việt Nam, sạc không dây. Riêng bản 350h có đèn trang trí nội thất 64 màu.\r\n\r\nGhế trên NX mới bọc da, chỉnh điện 10 hướng bản F Sport (12 hướng bản 350h), nhớ 3 vị trí, sưởi, làm mát. Ghế phụ chỉnh điện 8 hướng. Hệ thống âm thanh 8 loa trên bản F Sport, trong khi loại cao cấp hơn, Mark Levinson 17 loa có trên bản 350h.', '1704357675lexus-nx-overview.jpg', 22),
(22, 'RX Crossover', 'Động cơ\r\nTùy phiên bản xe Lexus RX 2023 động cơ và hệ truyền động sẽ khác nhau\r\nĐáng chú ý, RX thế hệ mới đã từ bỏ động cơ V6 hút khí tự nhiên. Đi kèm là hộp số tự động 8 cấp, hệ dẫn động cầu trước hoặc 4 bánh toàn thời gian. Nhờ đó, xe có thể tăng tốc từ 0-96 km/h trong thời gian 7,2 giây, nhanh hơn trước 0,7 giây.\r\n\r\nTrong đó\r\nLexus RX 350 (FWD/AWD) được cung cấp động cơ: 4cyl dung tích 2.4L tăng áp cho công suất 275 mã lực và 429Nm. Hộp số tự động 8 cấp (8AT).\r\nPhiên bản RX 350h (AWD) được trang bị động cơ:  4cyl dung tích 2.5L kết hợp với hệ truyền động hybrid cho công suất 246 mã lực và 315Nm. Hộp số tự động biến thiên vô cấp (CVT).\r\nĐộng cơ Bản Lexus RX 500h F Sport (DIRECT4 AWD): 4cyl dung tích 2.4L tăng áp, kết hợp hệ truyền động hybrid cho công suất 367 mã lực và 550Nm.\r\nVận hành ', 'Nội thất\r\nthiết kế nội thất của RX 2023 rất giống với NX thế hệ mới, bao gồm bảng đồng hồ kỹ thuật số và hệ thống thông tin giải trí Lexus Interface thế hệ mới, đi kèm màn hình cảm ứng 9,8 inch trên phiên bản tiêu chuẩn hoặc 14 inch trên các phiên bản cao cấp.\r\n\r\n\r\nLexus RX 2023 được thiết k trực quan giúp người lái dễ dàng kiểm soát.\r\n\r\nCabin nổi bật với màn hình cảm ứng đa phương tiện 14 inch, màn hình hỗ trợ lái kỹ thuật số. Lexus RX 2023 được trang bị nhiều công nghệ như mở cửa một chạm với hệ thống e-Latch, RX chào đón người lái với hệ thống đèn chiếu sáng đa màu, cửa sổ trời bằng kính panorama.\r\n\r\n\r\nNhờ chiều dài cơ sở tăng lên như đã nhắc ở trên, nội thất của Lexus RX 2023 trở nên rộng rãi hơn, đặc biệt là ở hàng ghế sau và khoang hành', 'An toàn\r\nLexus Safety System+ 3.0\r\nMẫu xe RX 2023 được Bổ sung nhiều trang bị và công nghệ mới như Chìa khóa kỹ thuật số, Hệ thống an toàn Lexus + 3.0 và hệ thống đa phương tiện Lexus và\r\n\r\nHệ thống kiểm soát hành trình ở mọi dải tốc độ\r\nKiểm soát tốc độ khi vào cua mới\r\nHệ thống ngăn va chạm sớm nâng cấp\r\nPhát hiện người đi bộ\r\nHỗ trợ tránh va chạm ở giao lộ và phát hiện mô-tô mới\r\nHệ thống dừng khẩn cấp\r\nCảnh báo chệch làn đường tích hợp hỗ trợ đánh lái\r\nHỗ trợ đỗ xe nâng cấp.', '1704358167lexus-rx-overview.jpg', 23),
(23, 'lexus LX', 'Động cơ;\r\nSức mạnh xe Lexus LX 570 – động cơ và hệ dẫn động\r\nLexus LX 570 2021 vẫn sở hữu khối động cơ V8 5.7L cùng hộp số tự động 8 cấp và hệ dẫn động 4 bánh\r\nĐược thiết kế để chinh phục những địa hình thử thách, LX570 2021  mới vẫn được trang bị hệ dẫn động bốn bánh 4WD mạnh mẽ giúp người lái tự tin vượt qua mọi khó khăn trên những cung đường hiểm trở mà vẫn đem đến sự thoải mái ấn tượng.', 'Nội thất;\r\nThiết kế nội thất & trang bị trên Lexus LX 570\r\nTrải nghiệm về sự sang trọng đỉnh cao đến từ trình độ chế tác tinh xảo với chất liệu da mềm mại, ốp gỗ cao cấp Shimamoku được cắt và đánh bóng từ những bàn tay Takumi bậc thầy, kết hợp với ánh sáng trắng dịu nhẹ tinh tế của đèn LED và hệ thống chiếu sáng xung quanh tích hợp trong cửa xe càng nhấn mạnh sự đẳng cấp của LX.\r\n\r\n\r\nTrang bị\r\nTiện nghi xe  Lexus LX 570 2021\r\nKhông gian nội thất sang trọng của LX570 2021 vẫn đầy tiện nghi và cảm xúc với\r\n\r\n+ Hệ thống âm thanh vòm 19 loa Mark Levinson mang lại trải nghiệm âm thanh 3 chiều sống động, với tính năng Bluetooth và chế độ AV trên điện thoại di động hay máy nghe nhạc cầm tay kết\r\n+ Điều hòa Lexus Climate Concierge (LCC) 4 vùng độc lập tích hợp những công nghệ tiên tiến đầu tiên tr', 'An toàn;\r\nXe Lexus LX 570 được trang bị  tính năng hỗ trợ lái và an toàn như:\r\nHệ thống cảnh báo điểm mù (BSM)\r\n\r\n+ Cảnh báo phương tiện cắt ngang khi lùi (Rear Cross Traffic Alert).\r\n+ Chế độ lựa chọn đa địa hình\r\n+ Hỗ trợ vượt địa hình,\r\n+ Chế độ hỗ trợ vào cua (Turn assist),\r\n+ Tính năng kiểm soát trợ lực lái biến thiên (VFC),\r\n+ 10 túi khí SRS tiêu chuẩn,…\r\nMàn hình đa hiển thị các góc quan sát khác nhau từ 4 camera đặt quanh xe.', '1704358378lexus-lx-overview.jpg', 24),
(24, 'Ford Territory', 'Động cơ & Hộp số\r\n\r\nXăng 1.5L EcoBoost tăng áp, I4; Phun xăng trực tiếp\r\nCông suất cực đại: 160 (118 kW) / 5.400~ 5.700 rpm\r\nMô men xoắn cực đại: 500Nm / 1750-2000 rpm\r\nSố tự động 7 cấp\r\nChế độ lái tùy chọn\r\nTrợ lực lái điện\r\nHệ thống dẫn động\r\n\r\nDẫn động một cầu / 4x2', 'Nội thất là nơi tập trung tiện nghi và trang trí với sự kết hợp giữa màu xanh và màu gỗ và các tông màu tối. Có thể cảm nhận được ngay sự sang trọng và cao cấp khi vừa mới ngồi vào ghế lái, toàn bộ vô lăng, ghế lái, táp-lô, táp-pi cửa, các chi tiết nhỏ… đều được bọc da. Bên cạnh đó còn là điểm nhấn tới từ các chi tiết được ốp gỗ tự nhiên và crom sáng bóng tạo thêm những đường nét tinh tế cho nội thất của Territory.\r\n\r\nVô lăng được làm dạng D-Cut thể thao với hàng loạt nút bấm điều chỉnh menu, đàm thoại rảnh tay, cruise control, kiểm soát làn đường… Nút bấm khởi động được làm nhỏ nhắn, ngay cạnh cửa gió điều hòa phía trước.\r\n\r\nĐiểm ấn tượng nhất khoang lái nằm ở bảng điều khiển trung tâm, nơi có cặp màn hình nối liền nhau, phong cách thường thấy ở khá nhiều mẫu xe của nhiều hãng ở thị trườn', 'Trang bị an toàn\r\n\r\nTerritory sở hữu rất nhiều những công nghệ an toàn, tính năng hỗ trợ lái hiện đại\r\n\r\nTerritory ứng dụng những công nghệ an toàn và tính tiện nghi cao cấp nhất của Ford. Xe trang bị công nghệ hỗ trợ lái Ford Co-Pilot 360 bao gồm đỗ xe tự động, camera 360, cảnh báo điểm mù kết hợp cảnh báo phương tiện cắt ngang, kiểm soát hành trình thích ứng với tính năng dừng và đi (Stop & Go), cảnh báo va chạm kết hợp phanh tự động khẩn cấp và cảnh báo va chạm khi mở cửa. Ngoài ra, mẫu SUV mới của Ford còn có cảnh báo chệch làn, duy trì làn đường, kiểm soát áp suất lốp.', '1704359385Ford-Territory.jpg', 25);
INSERT INTO `productcardetail` (`productCarDetailID`, `productCarDetailName`, `productCarDetailTextEngine`, `productCarDetailTextInterio`, `productCarDetailTextTechniques`, `images`, `productCarID`) VALUES
(25, 'Ford Everest', 'Động cơ và hộp số\r\nFord Everest thế hệ mới sử dụng động cơ 2.0 dầu với hai biến thể bi-turbo và turbo đơn. Bản cao nhất Titanium+ sử dụng động cơ bi-turbo, dẫn động 2 cầu đi cùng với đó là núm gài cầu điện tử, chế độ 2 cầu nhanh, 2 cầu chậm hoặc dẫn động cầu sau, sử dụng trong các trường hợp vượt đường khó. Các phiên bản còn lại đều dùng turbo đơn và dẫn động cầu sau.\r\n\r\n\r\nĐộng cơ mạnh mẽ có công suất lên tới 210 mã lực trên Ford Everest Titanium\r\n\r\nSức mạnh trên bản Titanium+ là công suất 210 mã lực và mô-men xoắn 500 Nm, hộp số Selectshift 10 cấp. Các phiên bản còn lại là 170 mã lực và 405 Nm, hộp số 6 cấp.', 'hoang lái\r\nEverest có nội thất mới với nhiều đường thẳng, táp-lô được làm phẳng tăng không gian cho cabin. Bên cạnh đó là ngập tràn những công nghệ như màn hình cảm ứng giải trí đặt dọc với hệ thống SYNC 4A và cụm đồng hồ kỹ thuật số sau vô-lăng.\r\n\r\n\r\nKhoang nội thất gây ấn tượng mạnh bởi sự tinh tế và hiện đại\r\n\r\nVô-lăng kiểu mới, thiết kế 4 chấu to bản, bọc da với đầy đủ các nút bấm: Ra lệnh giọng nói, Đàm thoại rảnh tay, Điều chỉnh âm lượng, Cruise Control... Phía sau vô lăng là cụm đồng hồ dạng kỹ thuật số tấm nền TFT có kích thước 8 inch (bản Ambient và Sport) hoặc 12 inch (bản Titanium và Titanium+).\r\n\r\nChính giữa Táp-lô là cửa gió điều hòa có họa tiết giống lưới tản nhiệt và màn hình giải trí cảm ứng kích thước lớn, 12 inch trên bản Titanium và Titanium+ hoặc 10 inch trên bản Ambien', 'Trang bị an toàn\r\nỞ thế hệ mới, cả 4 phiên bản đều được trang bị các tính năng cơ bản như: Chống bó cứng phanh (ABS), Phân phối lực phanh điện tử (EBD), Cân bằng điện tử (ESP), Hỗ trợ khởi hành ngang dốc, 7 túi khí... Trên 2 bản cao cấp sẽ có thêm Camera360, Cảnh báo điểm mù, Cảnh báo phương tiện cắt ngang khi lùi, Cảnh báo chệch làn, Hỗ trợ duy trì làn đường, Cảnh báo va chạm và Hỗ trợ phanh khẩn cấp khi gặp chướng ngại vật.', '1704359570Ford-Everest.jpg', 26),
(26, 'Ford Explorer', 'Động cơ và hộp số\r\n\r\nĐộng cơ tăng áp dung tích chỉ 2.3 lít nhưng cho ra công suất lên tới 301 mã lực\r\n\r\nXe vẫn trang bị động cơ EcoBoost 2,3 lít nhưng công suất tăng từ 273 mã lực lên 301 mã lực, mô-men xoắn cực đại từ 420 Nm lên 431,5 Nm. Hộp số tự động 10 cấp thay cho loại 6 cấp ở bản cũ. Dẫn động 4 bánh toàn thời gian.', 'Khoang lái\r\nNội thất Explorer 2022 gây ấn tượng mạnh với sự sang trọng của các chất liệu da, ốp gỗ và crom xước. Ford cho biết, hãng tăng cường vật liệu cách âm giữa khoang động cơ và khoang hành khách. Kính chắn gió và hai kính cửa trước sử dụng vật liệu cao cấp nhằm tăng khả năng cách âm, chống tia tử ngoại.\r\n\r\n\r\nKhoang lái đem lại cảm giác tiện nghi mà vô cùng sang trọng với các vật liệu cao cấp\r\n\r\nBên cạnh đó là hàng loạt các nâng cấp mới giúp xe tăng thêm phần hiện đại và trẻ trung. Vô-lăng ba chấu đa chức năng, trợ lực điện được bọc da cao cấp, trên vô-lăng có đầy đủ các nút bấm điều chỉnh Menu, Volume, Đàm thoại rảnh tay, Cruise Control… Phía sau là đồng hồ kỹ thuật số có kích thước 6,5 inch giúp hiển thị thông tin lái một cách trực quan và đầy đủ nhất.\r\n\r\n\r\nMàn hình giải trí cảm ứn', 'Trang bị an toàn\r\nCông nghệ an toàn trên Explorer cũng nâng cấp, nhiều và hiện đại nhất phân khúc. Xe trang bị hệ thống kiểm soát hành trình thích ứng, cảnh báo lệch làn và hỗ trợ giữ làn đường, đèn pha tự động, cảnh báo điểm mù, cảnh báo phương tiện cắt ngang, cảnh báo va chạm và hỗ trợ phanh tự động khẩn cấp.\r\n\r\nBên cạnh đó là hệ thống camera 360 độ, hỗ trợ đánh lái tránh va chạm sử dụng cảm biến radar và siêu âm để phát hiện vật thể trên đường, 8 túi khí.', '1704359722Ford-Exporler.jpg', 27),
(27, 'Ford Ranger', 'Động cơ và hộp số\r\nCác phiên bản XL, XLS và XLT của Ranger đều sử dụng động cơ diesel 2.0 turbo đơn, cho công suất 168 mã lực và mô-men xoắn cực đại 405 Nm. Chỉ bản Wildtrak trang bị động cơ diesel 2.0 turbo kép có công suất 207 mã lực và mô-men xoắn cực đại 500 Nm. Đi cùng với đó là hộp số 10AT trên bản Wildtrak và tùy chọn hộp số 6AT, 6MT trên các phiên bản XL, XLS, XLT.\r\n\r\n\r\nĐộng cơ mạnh mẽ cùng hệ dẫn động 4WD giúp mẫu xe thoải mái di chuyển ở các cung đường đồi núi\r\n\r\nTrên các phiên bản sử dụng hệ dẫn động 4WD, lần đầu tiên Ranger được trang bị tùy chọn chế độ lái. 6 lựa chọn chế độ lái bao gồm: Bình thường, Tiết kiệm, Kéo và Tải nặng, Trơn trượt, Bùn đất và Cát sỏi.\r\n\r\nXe cũng được trang bị tính năng gài cầu điện tử, nếu trước đây, hệ thống 4x4 bán thời gian cho phép tùy chỉnh chế độ', 'Khoang lái\r\nNội thất của Ranger cũng tương tự với Everest với điểm nhấn là màn hình trung tâm dài như một chiếc máy tính bảng, thứ vốn bắt đầu trên xe Volvo, Tesla và ngày càng phổ biến trong ngành bốn bánh.\r\n\r\n\r\nKhoang lái được làm rất tiện nghi với đầy đủ các công nghệ hiện đại\r\n\r\nVô lăng trợ lực điện được thiết kế mới với đầy đủ các nút bấm điều chỉnh menu, âm lượng, đàm thoại rảnh tay, cruise control… Phía sau vô lăng là bảng đồng hồ dạng màn hình kỹ thuật số, giúp hiển thị thông tin trực quan và đầy đủ.\r\n\r\nChính giữa Táp lô là màn hình giải trí cảm ứng đặt dọc với kích thước 12 inch trên bản Wildtrak và 10,1 inch trên các bản còn lại. Đi cùng với đó là hệ thống thông tin giải trí SYNC4 mới nhất của Ford. Xe cũng tích hợp thêm modem cho kết nối internet, chủ xe có thể sử dụng ứng dụng ', 'Trang bị an toàn\r\nBên cạnh các tính năng an toàn căn bản như: Chống bó cứng phanh, Phân phối lực phanh điện tử, Cân bằng điện tử, Kiểm soát lực kéo, Hỗ trợ khởi hành ngang dốc… Ranger thế hệ mới còn được nâng cấp thêm các công nghệ an toàn, hỗ trợ người lái có thể kể đến: Hệ thống kiểm soát tốc độ tự động thông minh, Duy trì làn đường, Phanh sau va chạm, Hỗ trợ phanh khi lùi, Cảnh báo va chạm', '1704360016ford-ranger.jpg', 28),
(28, 'Ranger Sport 2.0L AT 4X4', 'Ford Ranger Sport được trang bị động cơ dầu 4 xi-lanh, tăng áp đơn, dung tích 2.0L, sản sinh công suất tối đa 170 mã lực và mô-men xoắn cực đại 405 Nm. Động cơ này kết hợp với hộp số tự động 6 cấp và hệ dẫn động 4 bánh.\r\n\r\nTrong khi đó bản cao nhất Wildtrak dùng cỗ máy dầu 2.0L Turbo kép kết hợp với hộp số tự động 10 cấp, mang lại công suất 210PS/ 3500 rpm và mô men xoắn cực đại 500Nm/ 1750-2000rpm.\r\n\r\nThông số	Ranger Sport 2.0L 4X4 AT \r\nĐộng cơ\r\nLoại động cơ    	Tăng áp đơn\r\nSố xy lanh    	4\r\nDung tích xy lanh (cc)  	1.996\r\nLoại nhiên liệu    	Dầu\r\nCông suất tối đa (hp/rpm)    	 170/ 3.500\r\nMô men xoắn tối đa (Nm/rpm)    	405/ 1.750 - 2.500\r\nVận hành\r\nHệ thống truyền động    	Bốn bánh\r\nHộp số    	Số tự động 6 cấp\r\nHệ thống treo Trước	Độc lập, tay đòn kép, thanh cân bằng, lò xo trụ và ống ', 'Nội thất - Tiện nghi\r\nThông số kỹ thuật xe Ford Ranger Sport3.\r\n\r\nKhoang nội thất xe Ford Ranger Sport 2023 nhận khá nhiều trang bị hiện đại\r\n\r\nVốn là phiên bản đắt thứ 2 nên khách mua xe Ford Ranger Sport 2023 sẽ được trải nghiệm khá đầy đủ các trang bị hiện đại bên trong khoang nội thất. Trong đó có thể kể đến như vô lăng bọc da; ghế bọc da Vinyl, ghế lái chỉnh tay 6 hướng; khởi động dạng nút bấm; chìa khóa thông minh; điều hòa cơ; gương chiếu hậu tự động chỉnh 2 chế độ ngày/đêm; bảng đồng hồ kỹ thuật số với màn hình 8 inch; màn hình giải trí trung tâm dạng cảm ứng 10,1 inch, kết nối hệ thông tin giải trí SYNC 4A, hỗ trợ Apple CarPlay/Android Auto không dây; điều khiển bằng giọng nói; âm thanh 6 loa; sạc điện thoại không dây...', 'Trang bị an toàn là điều gây nhiều tiếc nuối nhất trên bản Ford Ranger Sport 2023 khi chỉ sở hữu những tính năng cơ bản như: 6 túi khí, phanh đĩa trước, phanh tang trống sau, camera lùi, hệ thống cân bằng điện tử, hỗ trợ khởi hành ngang dốc, hỗ trợ xuống dốc và hệ thống kiểm soát hành trình.', '1704360360ranger-sport-d536.jpg', 29);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingID`, `fullname`, `phone`, `address`, `email`, `method`) VALUES
(3, 'Nguyễn Văn A', '0922096645', 'Châu Thành, Trà Vinh', 'VanA@gmail.com', 'cod'),
(4, 'Nguyễn Văn A', '0922096645', 'Châu Thành, Trà Vinh', 'VanA@gmail.com', 'cod'),
(5, 'Kim Thị B', '0923123124', 'Trà Ôn, Vĩnh long', 'ThiB@gmail.com', 'cod'),
(6, 'Kim Thị B', '0923123124', 'Trà Ôn, Vĩnh long', 'ThiB@gmail.com', 'cod'),
(7, 'Kim Dương A', '0944093343', 'Châu thành, Trà Vinh', 'DuongA@gmail.com', 'cod'),
(8, 'Nguyễn Văn A', '0892321323', 'Châu thành, Thanh hóa', 'VanA@gmail.com', 'cod'),
(9, 'Trần Thanh A', '0923234334', 'An giang', 'ThanhA@gmail.com', 'vnpay'),
(10, 'Nguyễn Văn A', '0911096648', 'Ấp bàu sơn, xã đa lộc , huyện châu thành , trà vinh', 'Kim884740@gmail.com', 'cod'),
(11, 'Kim Dương Tuấn', '0364202648', 'Trà vinh', 'Kim884740@gmail.com', 'vnpay'),
(12, 'Kim Dương Tuấn', '0932143432', 'Cà Mau', 'Kim884740@gmail.com', 'vnpay');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `phone` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account`, `password`, `fullname`, `address`, `email`, `status`, `phone`, `avatar`) VALUES
('Duongtuan', '202cb962ac59075b964b07152d234b70', 'Kim Dương Tuấn', 'Trà Vinh', 'Duongtuan@gmail.com', '1', '0364202648', NULL),
('VanA', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', 'Châu thành, Trà Vinh', 'VanA@gmail.com', '1', '0922093345', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`account`);

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
-- Indexes for table `category_blog`
--
ALTER TABLE `category_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `shippingID` (`shippingID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `productCarID` (`productCarID`),
  ADD KEY `orderdetail_ibfk_2` (`orderID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`category_id_blog`);

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
  MODIFY `autoMakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_blog`
--
ALTER TABLE `category_blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productcar`
--
ALTER TABLE `productcar`
  MODIFY `productCarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `productcardetail`
--
ALTER TABLE `productcardetail`
  MODIFY `productCarDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`shippingID`) REFERENCES `shipping` (`shippingID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productCarID`) REFERENCES `productcar` (`productCarID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orderID`) REFERENCES `order` (`orderID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `blog_id` FOREIGN KEY (`category_id_blog`) REFERENCES `category_blog` (`id`);

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

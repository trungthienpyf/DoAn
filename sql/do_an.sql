-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 13, 2022 lúc 03:59 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `address`, `gender`, `birthday`, `email`, `password`, `level`) VALUES
(99999999, 'Admin', 0, '', 0, '0000-00-00', 'admin@gmail.com', '123', 0),
(888888888, 'Super Admin', 0, '', 0, '0000-00-00', 'superadmin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_detail`
--

CREATE TABLE `category_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category_detail`
--

INSERT INTO `category_detail` (`id`, `name`, `category_id`) VALUES
(1, 'Áo thun', 1),
(2, 'Jacket', 1),
(3, 'Hoodie', 1),
(4, 'Sweater', 1),
(5, 'Áo sơmi', 1),
(19, 'Quần dài', 2),
(20, 'Quần short', 2),
(21, 'Mũ / nón', 3),
(22, 'Tất ', 3),
(23, 'Balo / túi', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `birthday`, `email`, `password`, `token`, `phone`, `address`) VALUES
(2, 'thien', NULL, NULL, '456@gmail.com', '456', 'user_61d5647d8a7757.26499859', 11111, 'phu yen'),
(3, 'user1', NULL, NULL, 'user123@gmail.com', '123', NULL, 0, ''),
(6, 'ha', 0, '2002-12-10', '123@gmail.com', '123', 'user_61d5742a10bc48.59755064', 0, ''),
(7, 'hoang', 1, '2002-01-01', 'hoang@gmail.com', '123456a', NULL, 0, ''),
(8, 'ah', 1, '2002-01-01', 'maioi@gmail.com', '123456a', NULL, 0, ''),
(9, 'hong', 0, '2002-02-02', 'hong123@gmail.com', '123456a', NULL, 0, ''),
(10, 'hai', 1, '2002-01-03', 'hai@gmail.com', '123456a', NULL, 0, ''),
(13, 'hung', 1, '2002-01-01', 'hung@gmail.com', '123456a', NULL, 0, ''),
(14, 'truong', 1, '2002-01-01', 'truong@gmail.com', '123456a', NULL, 0, ''),
(17, 'anh', 1, '2002-01-01', 'anh@gmail.com', '123456a', NULL, 0, ''),
(19, 'Nguyễn Vũ Mạnh Hà', 0, '2002-01-01', 'manhha584224@gmail.com', '123456a', NULL, 344558306, '319, ấp bình xuân 1, xuân phú');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_orders`
--

CREATE TABLE `detail_orders` (
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_orders`
--

INSERT INTO `detail_orders` (`orders_id`, `product_id`, `quantity`) VALUES
(31, 52, 1),
(31, 53, 1),
(33, 52, 1),
(34, 52, 1),
(34, 53, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(48, 'China'),
(50, 'USA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name_receive` varchar(50) NOT NULL,
  `phone_receive` varchar(11) NOT NULL,
  `address_receive` text NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `time`, `name_receive`, `phone_receive`, `address_receive`, `note`, `status`, `customer_id`, `total_price`) VALUES
(31, '2022-01-08 09:31:10', 'thien dep trai', '123123', '12312312', '', 1, 2, 322221),
(33, '2022-01-08 10:35:46', '12312', '-1123123', '123123', '1231', 0, 2, 222222),
(34, '2022-01-10 06:19:43', 'Nguyễn Vũ Mạnh Hà', '0344558306', '319, ấp bình xuân 1, xuân phú', '', 0, 6, 322221);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `price` int(11) NOT NULL,
  `manufacturers_id` int(11) NOT NULL,
  `category_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `img`, `price`, `manufacturers_id`, `category_detail_id`) VALUES
(52, 'Sơmi nhung tăm', 'Vải nhung tăm mềm mại, phù hợp mọi loại da nhạy cảm. Phù hợp mọi trái tim bị tổn thương.', '1642086074.jpg', 250000, 48, 5),
(53, 'Quần nỉ nâu', 'Quần dài, vải nỉ, mua về không mặc vừa thì để trưng', '1642086833.jpg', 199000, 48, 19),
(54, 'Áo thun thời thượng', 'Áo đỉnh cao, cực cool cực ngầu, phù hợp cả nam cả nữ', '1642084804.jpg', 150000, 48, 1),
(55, 'Áo thun nasa', 'Áo thun vải cực xịn, phù hợp để mặc', '1642084864.jpg', 99000, 48, 1),
(56, 'Áo thun nữ dùng', 'Áo thun unisex nhưng nữ mặc đẹp hơn >_<', '1642084935.jpg', 120000, 48, 1),
(57, 'Áo thun tự kỉ', 'Áo màu đen huyền bí dành cho những ai thích sống nội tâm, ẩn mình.', '1642084978.jpg', 130000, 48, 1),
(58, 'Jacket thông thường', 'Áo khoác phù hợp với mọi lứa tuổi', '1642085089.jpg', 350000, 48, 2),
(59, 'Jacket varsity', 'Áo cực ấm cho mùa đông, ấm hơn khi mặc đôi với người yêu.', '1642085192.jpg', 399000, 48, 2),
(60, 'Bomber nhung gân', 'Áo xinh đẹp xỉu, cute phô mai que', '1642085273.jpg', 299000, 48, 2),
(61, 'Hoodie đen', 'Ấm áp mùa đông, nóng nực mùa hè, không nên mua', '1642085349.jpg', 499000, 48, 3),
(62, 'Hoodie xám', 'Xám tro như màu tình yêu chúng ta vậy', '1642085434.jpg', 460000, 48, 3),
(63, 'Sweater độc đáo', 'Phá cách độc đáo, tỉ lệ có người yêu khi mua áo là 99%', '1642085634.jpg', 499000, 48, 4),
(64, 'Sweater nữ đáng ew', 'Áo cực xinh. Sẽ đáng yêu hơn khi bạn mua 2 áo.', '1642085720.jpg', 499000, 48, 4),
(65, 'Sweater giản dị', 'Phù hợp với mọi địa hình, mọi tình huống và mọi outfit.', '1642085810.jpg', 450000, 48, 4),
(66, 'Sơmi BBR', 'Áo sơmi thu hút mọi ánh nhìn. Thứ thiết yêu trong tủ đồ của bạn.', '1642085881.jpg', 250000, 48, 5),
(67, 'Somi Basic', 'Áo phụ hợp mọi lứa tuổi, mọi dịp đám cưới, đám hỏi, đám ....', '1642085961.jpg', 250000, 48, 5),
(68, 'Quần thun ống rộng', 'Rất tiện dùng để mặc.', '1642086874.jpg', 299000, 48, 19),
(69, 'Quần jean nữ', 'Quần nữ dịu dàng, đốn hạ trái tim đàn ông', '1642086979.jpg', 250000, 50, 19),
(70, 'Quần short nam nữ', 'Vải nhung tăm, ấm áp mềm mại', '1642088818.jpg', 99000, 48, 20),
(71, 'Quần short cá tính', 'Quần phù hợp để mặc, không hợp để đội.', '1642088857.jpg', 99000, 48, 20),
(72, 'Quần đùi nữ', 'Quần phù hợp để mặc khi ngủ', '1642088889.jpg', 99000, 48, 20),
(73, 'Mũ lưỡi trai', 'Mũ lưỡi trai, che nắng hợp lí', '1642089005.jpg', 150000, 48, 21),
(74, 'Mũ bucket', 'Mũ xinh xẻo, chụp hình bao truất', '1642089038.jpg', 120000, 48, 21),
(75, 'Nón len', 'Nón len ấm áp, mềm mại, phù hợp mọi kích thước', '1642089077.jpg', 120000, 50, 21),
(76, 'Tất cổ cao đơn giản', 'Tất ấm cúng', '1642089368.jpg', 35000, 48, 22),
(77, 'Tất cổ thấp đơn giản', 'Tát phù hợp với bàn chân nhỏ', '1642089400.jpg', 22000, 48, 22),
(78, 'Tất màu mè', 'Tất màu ngẫu nhiên cho người thích cá tính', '1642089452.jpg', 35000, 48, 22),
(79, 'Balo đơn giản', 'Balo chứa đựng cả balo', '1642089475.jpg', 399000, 48, 23),
(80, 'Túi đeo chéo', 'Phù hợp đựng mỹ phẩm, điện thoại, ví tiền và liêm sỉ', '1642089518.jpg', 299000, 48, 23),
(81, 'Túi tò te', 'Giờ con đeo túi tò te đi mua cho mẹ cái túi đì o', '1642089553.jpg', 299000, 48, 23);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`name`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`customer_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`orders_id`,`product_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`customer_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manufactures_product` (`manufacturers_id`),
  ADD KEY `fk_category_product` (`category_detail_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=888888889;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `comment_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detail_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_manufactures_product` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_detail_id`) REFERENCES `category_detail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

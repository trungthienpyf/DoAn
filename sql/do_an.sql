-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2021 at 05:04 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_an`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `address`, `gender`, `birthday`, `email`, `password`, `level`) VALUES
(1, 'Admin', 0, '', 0, '0000-00-00', 'admin@gmail.com', '123', 0),
(2, 'Super Admin', 0, '', 0, '0000-00-00', 'superadmin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(18, 'Áo sơmi'),
(15, 'Áo thun'),
(23, 'Balo / túi'),
(17, 'Hoodie / sweater'),
(16, 'Jacket'),
(21, 'Mũ / nón'),
(19, 'Quần dài'),
(20, 'Quần short'),
(22, 'Tát  ');

-- --------------------------------------------------------

--
-- Table structure for table `comment_product`
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(48, 'China'),
(50, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name_receive` varchar(50) NOT NULL,
  `phone_receive` varchar(11) NOT NULL,
  `address_receive` text NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `price` int(11) NOT NULL,
  `manufacturers_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `img`, `price`, `manufacturers_id`, `category_id`) VALUES
(18, 'Adventure backpack', 'Trọng lượng nhẹ: 650 gram.\r\nApa:k 02 có kích thước 42 x 30 x 13.5cm (cao x ngang x rộng).\r\nHệ thống quai đeo áp dụng công nghệ Đối kháng trọng lực a.k.a /Lite Anti-gravity Tech™/. Dày dặn hơn. Êm hơn. Hấp thụ chấn động tốt hơn. Ôm sát vai hơn.\r\nNgăn laptop với công nghệ Armored Protection Tech™, đảm bảo laptop của bạn được bảo vệ tối đa. Ngăn laptop chứa vừa lap 16\". Kích thước 39 x 27 x 2.5cm (cao x ngang x rộng).\r\nThiết kế ngăn chính với thể tích chứa đồ lớn, và 3 ngăn phụ đối diện ngăn lap giúp sắp xếp gọn gàng đồ dùng đủ cho những chuyến đi 3-4 ngày.\r\nNgăn phụ hai bên hông sử dụng kĩ thuật may dấu viền lõi thun, giúp khi không sử dụng, ngăn tự thu gọn theo sát form balo, khi sử dụng, ngăn sẽ giãn ra, chứa vừa 1 bình đựng nước 500ml.\r\nSử dụng vải Cordura 840D bên ngoài và 210D bên trong, cho độ bền đáng kinh ngạc, kể cả trong điều kiện sử dụng ngoài trời liên tục.\r\nToàn bộ balo được gia cố bằng đường đánh bọ, đảm bảo không bung chỉ, không sứt quai suốt thời gian sử dụng.\r\nTem chống hàng giả, đồng thời cũng là tem nhận diện cho dòng balo Adventure pa:k /Anti-counterfeiting badge/ sử dụng kĩ thuật ép khuôn chế tác TPU cao cấp nhất hiện nay, giúp tạo ra trên cùng 1 bề mặt những chi tiết nổi với độ sắc nét không tưởng, đặc biệt nhất với kí tự “G” 3D dưới nền ánh xạ bạc. Mẫu tem này hiện KHÔNG THỂ làm giả tại thị trường Việt Nam. Hay nói cách khác: khi đeo Apa:k, bạn bè của bạn sẽ luôn biết đây là một sản phẩm authentic - chính hãng.\r\nCuối cùng. Như G-Tech backpack, Grimm DC cực kì tự tin ở chất lượng của sản phẩm của mình. Chính sách bảo hành trọn 18 tháng vẫn được áp dụng trên Apa:k. Để biết thêm chi tiết xin liên hệ nhân viên của chúng tôi.', '1640614384.jpg', 500000, 48, 23),
(19, 'Áo khoác thông gió', 'Thông tin kỹ thuật:\r\n\r\nCông nghệ áp dụng: AIR-tech™ by Grimm DC a.k.a Hệ thống luân chuyển dòng khí. Gồm 3 bộ phận: AIR-vent in a.k.a. khe đưa gió vào, lưới mess cho phép không khí luân chuyển trước/sau và AIR-vent out a.k.a. khe thoát gió ra. Vị trí AIR-vent in và out được tính toán chi tiết để đảm bảo tối đa hiệu quả thông khí cho các vùng nhiệt độ cao của cơ thể nhưng không làm form áo bị phồng lên quá mức khi di chuyển với tốc độ lớn.\r\nHệ thống 4 túi: hai túi hông thường + 1 túi ẩn với dây khóa bên hông trái + 1 túi bí mật bên trong.\r\nChất liệu vải: Polyester fiber.\r\nToàn bộ dây khóa sử dụng YKK zip.\r\nCổ tay hai thành phần: thun co giãn và đai gài velcro - đảm bảo ôm vừa vặn mọi kích thước cổ tay.\r\nBox logo: sử dụng kỹ thuật đúc khuôn silicon chính xác để tái tạo độ cao và chi tiết cho từng chữ.\r\nCụm Grimm DC ở mặt lưng: sử dụng kỹ thuật thêu nổi 3D với độ cao nét chữ lên đến 1.5mm.', '1640614439.jpg', 450000, 48, 16),
(20, 'Urbanista messenger bag', '- Một chiếc túi có ngăn đựng laptop riêng, vừa 13\" với tiêu chuẩn chống sốc Grimm DC Armored Protection Tech™ - bảo vệ tuyệt đối chiếc máy của bạn*. TUYỆT ĐỐI. Hãy xem hình chụp ngăn laptop lộn ngược ra ngoài để thấy độ dày và sự chắc chắn chúng tôi tạo ra.\r\n\r\n- Ngăn chính rộng với nhiều túi phụ. Đảm bảo chứa mọi thứ bạn cần, một cách ngăn nắp, cho cả ngày phiêu lưu trong thành phố. Ngăn chính vừa laptop 16\" nhe.\r\n\r\n- Thông số kích thước: 35 x 16 x 25cm (đáy ngang x dọc x cao). Ngang nắp: 41cm (nắp túi to hơn đáy). Dây đeo khi xả ra hết cỡ là 1m2.\r\n\r\n- Thích hợp để đựng máy chụp hình + lens*.\r\n\r\n- Đựng được thêm số lượng lớn sách vở, bút viết, iPad, ví, phụ kiện, thậm chí áo khoác mỏng. Đi học, đi chơi là đúng bài.\r\n\r\n- Có hai túi bên hông, đựng vừa chai nước nhỏ dung tích 250ml.\r\n\r\n- Một chiếc túi cứng cáp, không ọp ẹp, tự \"đứng\" được khi bạn đặt túi xuống đất. Không nhiều messenger bag trên đời làm được điều này đâu.\r\n\r\n- Quai đeo với lớp đệm dày, để bạn không đau vai sau nhiều giờ sử dụng.\r\n\r\n- Vải đã được phủ lớp trượt nước. Mưa nhỏ hoặc nước vô tình đổ lên sẽ trôi nhanh như cuộc tình cũ. (Nhưng vì miệng túi thiết kế có chỗ hở, nên không thích hợp dầm mưa nhé).\r\n\r\n*mỗi cạnh của ngăn laptop đều được lót mút PE 7T với thiết kế treo do Grimm DC phát triển. Ngoài ra tất cả bề mặt bên ngoài của túi cũng được lót mút PE 7T dày. Đảm bảo hấp thụ chấn động một cách triệt để.', '1640614538.jpg', 500000, 48, 23),
(21, 'Vớ Iron Flame', 'Những điểm đặc biệt:\r\n1. Đường may nối linking: đây là một đường may đặc biệt, được thực hiện thủ công từng đôi một. Khi dệt ống vớ bằng máy xong, ở chi tiết ráp hai mí ngay tại mũi vớ, thông thường sẽ được may gập lại, và tạo ra một đường cấn ở bên trong. Khi mang những dòng sneakers chật hoặc bó chân, đường cấn này sẽ cọ sát vào da, gây khó chịu. Với Iron Flame socks, chúng tôi đã triệt tiêu đường nối này bằng việc kết hai đường mí bằng tay, dùng chỉ để xỏ qua từng mũi đan một. Đây là kỹ thuật chỉ xuất hiện ở các dòng vớ trung-cao cấp. Và chúng tôi mang nó đến với các bạn.\r\n\r\n2. Ba lớp chất liệu khác nhau tạo nên vớ, bao gồm:\r\n- Lớp thun cổ chân, sử dụng sợi thun 90: ôm khít chân nhưng không thô ráp.\r\n- Lớp mui bàn chân, sử dụng sợi cotton đan nylon spandex: tạo cảm giác thoải mái và thoáng khí.\r\n- Lớp lót bàn chân, sử dụng sợi cotton được dệt xù: tạo lớp đệm khiến vớ êm hơn rất nhiều. Đây cũng là điểm đặc biệt nhất trong 3 lớp chất liệu.\r\n\r\n3. Toàn bộ sợi tạo nên Iron Flame Socks, cung cấp bởi công ty RSWM Limited - Ấn Độ, đều đạt:\r\n- Chứng nhận STANDARD 100 by OEKO-TEX ®, cấp bởi HOHENSTEIN Textile Testing Institute GmbH & Co. KG – Cộng hoà Liên bang Đức.\r\n\r\n- Chuẩn CR, không chứa formaldehype, không chứa màu azo, cấp bởi VIETNAM TEXTILE RESEARCH INSTITUTE – Cộng hòa Xã hội chủ nghĩa Việt Nam.\r\n\r\nIron Flame Socks đủ tiêu chuẩn để xuất khẩu.', '1640614645.jpg', 120000, 48, 22),
(22, 'Hot Like Blink Shirt', 'Áo sơmi', '1640614701.jpg', 400000, 48, 18),
(23, 'Jogger Đen', 'Khả năng bảo vệ khỏi tia UV của vải theo phương pháp thử EN 13758-1:2001 là 115. Chỉ số UPF của vải khi trên 50 có nghĩa là chỉ cho phép 2% số tia UVA và UVB xuyên qua và được gán khả năng bảo vệ Tuyệt Vời. Tuy nhiên chỉ số UPF của vải nỉ Grimm DC đạt đến 115. Gấp đôi mức độ này.\r\n\r\nKhông phát hiện thấy bất kỳ hàm lượng formaldehyt và các amin thơm giải phóng từ chất màu azo nào. Đây là hai chất xuất hiện trong một số quá trình xử lý vải và có khả năng gây ung thư.\r\n\r\nĐộ bền màu giặt A1S; 40 độ C (cấp): ISO 105-C06:2010 hay còn gọi là Colour fastness to domestic and commercial laundering (Độ bền màu với tẩy gia đình và tẩy thương mại).\r\n\r\nĐộ bền màu ánh sáng đèn Xenon: ISO 105 B02-2000 hay còn gọi là Colour fastness to artificial light: Xenon arc fading lamp test (Độ bền màu với ánh sáng nhân tạo: đèn Xenon).\r\n\r\nMặt ngoài được cắt lông: tạo độ mượt cho bề mặt, hạn chế bớt việc bị xù lông sau khi giặt.\r\n\r\nMặt trong sau khi được đánh bông lại được xén lông ngắn lại nhằm tạo độ mềm mịn cần thiết cho lớp nỉ nhưng lại không quá nhiều lông dài gây cảm giác khó chịu khi mặc.', '1640614737.jpeg', 250000, 48, 19),
(24, 'Sakura tee', '\r\n Chất liệu: Vải cotton 100% 2 chiều\r\n\r\n Size: S/M/L', '1640614798.jpg', 350000, 50, 15),
(25, 'BLOSSOM tee', '\r\n Chất liệu: Vải cotton 100% 2 chiều\r\n\r\n Size: S/M/L', '1640614848.jpg', 350000, 48, 15),
(26, 'FABRIC BOMBER BROWN MST', '\r\n Chất liệu: Vải nhung tăm\r\n\r\n Size: S/M/L', '1640614929.jpg', 550000, 48, 16),
(27, 'Crossbody Vietnamien', 'Phối màu chỉ ánh vàng Metallic Golden Floss AN-02.\r\n\r\n11.076 mũi kim, mất 40 phút thêu (máy tự động) và trên 100 công đoạn may thủ công cho mỗi sản phẩm.\r\n\r\nKhoá kéo YKK và dây khoá Dual Black Hardened Lock được đặt sản xuất riêng.\r\n\r\nVải ParaNord trượt nước.\r\n\r\nLớp lót 210d chống thấm.\r\n\r\nDây đai Ultra Lift bản lớn 5cm.\r\n\r\nKhoá gài EcoFriendly Pure Black.\r\n\r\nKích thước túi: ngang 26cm x cao 16cm x rộng 10cm. Đủ lớn cho ví dài, iphone 7plus, phụ kiện như tai nghe, sạc dự phòng, cáp sạc...\r\n\r\nBên trong có một ngăn phụ với dây kéo rời để chứa những vật dụng cần để riêng hoặc ít sử dụng đến.\r\n\r\nVới những người có làn da nhạy cảm, thì một số tăng đưa đôi Axetat đang được sử dụng để tăng giảm chiều dài dây đeo vẫn có những cạnh nhựa (ba dớ) còn sót lại, khiến đôi khi cọ vào vai / cổ gây khó chịu. Chúng tôi hiểu cảm giác này, và quyết định đưa vào sử dụng bộ tăng đưa mới với khuôn đúc chính xác cùng thế hệ phôi nhựa tốt nhất, khiến chi phí thành phẩm của bộ phận này cao hơn 8 lần so với mẫu cũ, nhưng kết quả là bề mặt sản phẩm đạt đến độ mịn hoàn mỹ, không góc cạnh, không xước.', '1640614991.jpg', 250000, 48, 23),
(28, 'Double Knee Pants', 'Chất liệu: Kaki 100% cotton.\r\nFitting: Oversized, form dáng thoải mái, năng động.\r\nChi tiết: Chất vải cứng lên form đứng dáng. Được giặt qua để tạo gân và khiến vải mềm hơn. Chi tiết Double knee đặc sắc, có hình thêu sau quần và tag da.\r\nHướng dẫn bảo quản: Sản phẩm bền nhất khi giặt tay. Có thể giặt máy ở nhiệt độ thường. Khi phơi tránh ánh nắng trực tiếp. Nên treo sản phẩm để form đẹp hơn.', '1640615033.jpg', 650000, 48, 19),
(29, 'Utility Pod Short', 'Chất liệu: Nilon Ripstop\r\nFitting: Loose fit\r\nChi tiết: Chất vải đặc biệt khiến quần bền và lên form đứng dáng. Thiết kế nhiều túi hộp và có tag thêu signature của team Candles.\r\nHướng dẫn bảo quản: Sản phẩm bền nhất khi giặt tay. Có thể giặt máy ở nhiệt độ thường. Khi phơi tránh ánh nắng trực tiếp. Nên treo sản phẩm để form đẹp hơ', '1640615107.jpg', 450000, 48, 20),
(30, 'Quần Âu ', '1. Đai lưng co giãn a.k.a Elastic waistband:\r\n\r\nLưng quần được luồn một đai thun giúp co giãn ôm khít eo người mặc. Thông thường phần đai thun này xuất hiện dưới dạng những đường lượn sóng nhăn nhúm. Bạn sẽ phải lựa chọn: một lưng quần phẳng phiu nhưng không co giãn (cực kì khó chịu khi ăn no) hoặc một lưng quần xấu xí không phù hợp với một chiếc quần lịch lãm.\r\n\r\nNhưng tại sao phải lựa chọn? Chúng tôi đã nghiên cứu và ứng dụng một kĩ thuật may đặc biệt giúp ẩn hoàn toàn đai co giãn này bên trong lưng quần. Bạn có một chiếc quần Âu “đúng chuẩn” phẳng phiu, nhưng lại có tính năng co giãn.\r\n\r\nThật sự tuyệt vời đúng không?\r\n\r\n \r\n\r\n2. Những tiểu tiết đường cắt và bóp ống khéo léo đã tạo ra mẫu quần không bị già nua mà vẫn thể hiện được sự trẻ trung của người mặc. Phù hợp khi sử dụng trong các dịp trang trọng lẫn đời thường.\r\n\r\n \r\n\r\n3. Túi bên phải gồm 2 phần: một túi thường và một túi nổi dưới dạng khoá kéo YKK. Vì như các bạn, chúng tôi đã từng rớt nát màn hình điện thoại chỉ vì trót bỏ vào một túi quần Âu không khoá.\r\n\r\n \r\n\r\n4. Chất liệu vải được sử dụng có hai điểm đặc biệt:\r\n\r\n- Rất đứng form vì được pha trộn với sợi polyester (những điểm sáng ánh bạc trên vải).\r\n\r\n- Tỉ lệ sợi cotton hợp lý + kỹ thuật dệt đặc biệt khiến quần vẫn thấm hút nước rất tốt, đảm bảo cho việc vận động cả ngày ngoài trời vẫn thoải mái.\r\n\r\n \r\n\r\n5. Logo Grimm DC được thêu với độ chi tiết đáng kinh ngạc.', '1640615208.jpg', 650000, 48, 19),
(31, 'Vintage Logo Hoodie', 'Đang cập nhật ...', '1640615244.jpg', 650000, 48, 17),
(32, 'Candles Essential Hoodie', 'Đang cập nhật ...', '1640615289.jpg', 450000, 48, 17),
(33, 'Bacsic Sweater', 'Đang cập nhật ...', '1640615341.jpg', 450000, 48, 17),
(34, 'Áo Straight out Viet Nam', 'Đang cập nhật ...', '1640615371.jpg', 350000, 48, 15),
(36, 'Fishing hat', 'Mũ câu cá...tính', '1640615492.jpg', 150000, 48, 21),
(37, 'Flame Cap', 'Mũ lưỡi trai hoạ tiết lửa', '1640615526.jpg', 200000, 48, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`name`);

--
-- Indexes for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`customer_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`orders_id`,`product_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ten` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_manufactures_product` (`manufacturers_id`),
  ADD KEY `fk_category_product` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `comment_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detail_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_product` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_manufactures_product` FOREIGN KEY (`manufacturers_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

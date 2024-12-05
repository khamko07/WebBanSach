-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 10:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbansach_khamko`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `last_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_update`) VALUES
(2, 'Thuong', 'Hong Thuong', 908774914, 'Quang Nam', '', '50000', '2023-01-16 23:36:21', '1702744581'),
(3, 'Thuong', 'TD', 9876543, 'Hue', '', '546000', '2023-05-16 23:37:04', '1702744624'),
(4, 'Thuong', 'Hthuong', 876211, 'Ha Noi', '', '360000', '2023-03-16 23:37:47', '1702744667'),
(5, 'Thuong', 'TTT', 87654, 'Hue', '', '720000', '2023-11-16 23:38:21', '1702744701'),
(6, 'Admin', 'HT', 9973635, 'Quang Nam', '', '490000', '2023-12-17 00:18:50', '1702747130'),
(7, 'Admin', 'Tung', 987645, 'Quang Ngai', '', '120000', '2023-09-17 00:20:39', '1702747239'),
(8, 'Admin', 'Hthuong', 987654637, 'Hue', '', '156000', '2023-06-17 00:21:09', '1702747269'),
(9, 'Khampasong', 'Khamko', 987654345, '459 Ton Duc Thang', 'Good', '87000', '2024-12-05 15:33:29', '1733387609');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_time` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_update`) VALUES
(1, 2, 3, 1, 50000, '2023-12-16', '0000-00-00'),
(2, 3, 4, 7, 78000, '2023-12-16', '0000-00-00'),
(3, 4, 1, 1, 120000, '2023-12-16', '0000-00-00'),
(4, 4, 20, 2, 120000, '2023-12-16', '0000-00-00'),
(5, 5, 21, 6, 120000, '2023-12-16', '0000-00-00'),
(6, 6, 3, 2, 50000, '2023-12-17', '0000-00-00'),
(7, 6, 4, 5, 78000, '2023-12-17', '0000-00-00'),
(8, 7, 1, 1, 120000, '2023-12-17', '0000-00-00'),
(9, 8, 4, 2, 78000, '2023-12-17', '0000-00-00'),
(10, 9, 2, 1, 87000, '2024-12-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `price_goc` int(11) NOT NULL,
  `SLNhap` int(11) NOT NULL,
  `content` text NOT NULL,
  `last_updated` int(11) NOT NULL,
  `tacgia` varchar(255) NOT NULL,
  `NXB` varchar(255) NOT NULL,
  `sotrang` int(11) NOT NULL,
  `ctyphathanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `price_goc`, `SLNhap`, `content`, `last_updated`, `tacgia`, `NXB`, `sotrang`, `ctyphathanh`) VALUES
(1, 'Đắc nhân tâm', '/uploads/14-12-2023/dac_nhan_tam(1).jpg', 120000, 100000, 10, 'Đắc nhân tâm của Dale Carnegie là quyển sách duy nhất về thể loại self-help liên tục đứng đầu danh mục sách bán chạy nhất (best-selling Books) do báo The New York Times bình chọn suốt 10 năm liền. Được xuất bản năm 1936, với số lượng bán ra hơn 15 triệu bản, tính đến nay, sách đã được dịch ra ở hầu hết các ngôn ngữ, trong đó có cả Việt Nam, và đã nhận được sự đón tiếp nhiệt tình của đọc giả ở hầu hết các quốc gia.', 1702529926, ' J.K.Rowling', 'NXB Tổng Hợp Thành Phố Hồ Chí Minh\r\n', 122, ' First News - Trí Việt'),
(2, 'Phương pháp sáng tạo', '/uploads/14-12-2023/phuong_phap_sang_tao.jpg', 87000, 75000, 15, 'Bạn có từng nghĩ ra ý tưởng về một sản phẩm hoặc dịch vụ mới mà bạn cho rằng sẽ rất tuyệt vời, nhưng lại không bắt tay vào hành động vì cảm thấy quá mạo hiểm? Hoặc có lẽ đơn giản là bạn không biết mình phải làm gì tiếp theo? Hoặc ở nơi làm việc, bạn có từng nghĩ ra một ý tưởng mà bạn cho rằng có thể sẽ tác động rất lớn đến công ty mình – như thay đổi cách họ phát triển và phân phối sản phẩm, cung cấp dịch vụ khách hàng, tuyển dụng hoặc đào tạo nhân viên?', 1702530567, 'Baird T. Spalding', 'Nhà Xuất Bản Tổng hợp TP.HCM', 312, 'Viện Quản Lý P.A.C.E'),
(3, 'Ánh lửa tình ', '/uploads/14-12-2023/anh_lua_tinh_ban.jpg', 50000, 40000, 12, 'Chúng ta không thể chọn gia đình mình sinh ra nhưng hoàn toàn có thể chọn cho mình những người bạn tốt, người không phán xét ta và luôn sát cánh cùng ta trên bước đường cuộc sống. Bạn bè chính là gia đình thứ hai của chúng ta.', 1702530716, 'Biên dịch: First News ', 'Nhà Xuất Bản Tổng hợp TP.HCM', 345, ' First News - Trí Việt'),
(4, 'Hành trình về phương Đông ', '/uploads/14-12-2023/hanh_trinh_ve_phuong_dong.jpg', 78000, 56, 6, '', 1702531305, 'Stephen M.R. Covey, Rebecca R. Merrill, Grey Link', '', 412, ' FIRST NEWS'),
(20, 'Đắc nhân tâm', '/uploads/14-12-2023/lam_chu_cuoc_doi(1).jpg', 120000, 70000, 0, '', 1702551259, '', '', 0, ''),
(21, 'Sách Kĩ năng sống', '/uploads/14-12-2023/danhthuc(1).jpg', 120000, 50000, 0, '', 1702552283, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sdt` int(11) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `sdt`, `password`, `status`, `create_time`) VALUES
(1, 'Thuong', 987654, '81dc9bdb52d04dc20036dbd8313ed055', 1, 1702744547),
(2, 'Admin', 987654, '81dc9bdb52d04dc20036dbd8313ed055', 0, 1702744722),
(3, 'Khamko', 824906137, 'b20bb95ab626d93fd976af958fbc61ba', 0, 1733385643),
(4, 'khampasong', 98654567, 'b20bb95ab626d93fd976af958fbc61ba', 1, 1733387549);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail_product` (`product_id`),
  ADD KEY `order_detail_ibfk_5` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_5` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2023 lúc 09:05 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lagi.shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'admin', 'admin@lagi.shop', 'admin', '$2y$10$BZk5uLPGm4Oq.23TgSlB2.hRxPgfWS4LFT.fXaCr960OLAVbhW.J2', '0'),
(15, 'Trần Thẩm Khang', 'thamkhang2003@gmail.com', 'admin@gmail.com', '$2y$10$G21JK9qzsrwf.mlMhMizjOf9eT8rPZhWmeKTiVcpdkDtd/LooVhFC', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Gucci'),
(4, 'Zara'),
(5, 'H&M'),
(6, 'Louis Vuitton'),
(7, 'Chanel'),
(8, 'Puma'),
(9, 'Forever 21'),
(10, 'Calvin Klein'),
(32, 'Khang'),
(36, 'LAGI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cartID`, `productId`, `userId`, `quantity`) VALUES
(155, 112, 17, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Thời trang nam'),
(2, 'Thời trang nữ'),
(3, 'Quần jeans'),
(4, 'Giày sneakers'),
(5, 'Váy đầm'),
(6, 'Áo sơ mi'),
(7, 'Phụ kiện'),
(8, 'Túi xách'),
(9, 'Giày cao gót'),
(10, 'Đồng hồ'),
(11, 'Trang sức'),
(12, 'Đồ bơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `dateComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `recieve_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `recipientName` varchar(255) NOT NULL,
  `recipientPhone` int(11) NOT NULL,
  `recipientAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`orderId`, `thanhtien`, `userId`, `order_time`, `recieve_time`, `status`, `recipientName`, `recipientPhone`, `recipientAddress`) VALUES
(112, 418000, 17, '2023-05-09 19:23:07', '0000-00-00 00:00:00', 1, 'Trần Thẩm Khang', 2147483647, 'Thành phố Hà Nội, Quận Long Biên, Phường Thượng Thanh'),
(113, 2847900, 17, '2023-05-10 08:28:23', '0000-00-00 00:00:00', 1, 'Trần Thẩm Khang', 2147483647, 'Thành phố Hà Nội, Quận Long Biên, Phường Thượng Thanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productName` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `orderId`, `productId`, `price`, `image`, `quantity`, `productName`) VALUES
(46, 112, 107, '200000', 'uploads/product_10.png', 2, 'Áo Lagi'),
(47, 113, 107, '200000', 'uploads/product_10.png', 1, 'Áo Lagi'),
(48, 113, 108, '2000000', 'uploads/product_3.png', 1, 'Áo Gucci'),
(49, 113, 110, '1000000', 'uploads/product_5.png', 1, 'Giày Lagi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(100) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(110) NOT NULL,
  `brandId` int(110) NOT NULL,
  `product_desc` text NOT NULL,
  `price` bigint(255) NOT NULL,
  `price_discount` bigint(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `price`, `price_discount`, `image`, `amount`, `created_at`, `hidden`) VALUES
(107, 'Áo Lagi', 1, 36, '', 200000, 190000, 'uploads/product_10.png', 0, '2023-05-10 05:42:59', 0),
(108, 'Áo Gucci', 2, 3, '', 2000000, 1400000, 'uploads/product_3.png', 100, '2023-05-10 05:42:46', 0),
(109, 'Áo Adidas', 6, 1, '', 300000, 200000, 'uploads/product_1.png', 0, '2023-05-10 05:41:17', 0),
(110, 'Giày Lagi', 1, 1, '', 1000000, 999000, 'uploads/product_5.png', 0, '2023-05-10 05:42:00', 0),
(111, 'Mắt Kính Gucci', 7, 3, '', 30000000, 2500000, 'uploads/product_6.png', 0, '2023-05-10 05:45:42', 0),
(112, 'Túi Chanel', 1, 7, '', 6000000, 5000000, 'uploads/product_4.png', 0, '2023-05-10 05:46:41', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `ngaySinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `userPassword`, `email`, `gioiTinh`, `sdt`, `ngaySinh`, `diaChi`, `isActive`) VALUES
(7, 'Quan Văn Mạnh', 'manhne', '202cb962ac59075b964b07152d234b70', 'quanmanh901@gmail.com', 'nam', 899391826, '18-04-2002', '309/1/4 Lê Đức Thọ', 0),
(8, 'Quan Văn Mạnh', 'manh22', '202cb962ac59075b964b07152d234b70', 'manh2106@gmail.com', 'Nam', 981984623, '2002-21-06', 'Hồ Chí Minh', 0),
(10, 'Phùng Phạm Khánh Linh', 'khanhlinh', '202cb962ac59075b964b07152d234b70', 'nguyenthanhquynhlinh@gmail.com', 'Nam', 981984623, '2002-21-06', 'Hồ Chí Minh', 1),
(15, 'Trần Thẩm Khang', 'admin1@gmail.com', '$2y$10$qd/KrSsHtR9pXT6AJCei8O7ZiRNYhXkmdS1kUq90eE1fS1doo0bve', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-04-18', 'Tỉnh Cao Bằng, Huyện Bảo Lâm, Xã Nam Cao, khang', 1),
(17, 'Trần Thẩm Khang', 'thamkhang', '$2y$10$zuf/Ax5rLhvrPR0yfIDEKeDVP0sQWnxOgntm6YvLWFZc7WwVJMny.', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-04-11', 'Thành phố Hà Nội, Quận Long Biên, Phường Thượng Thanh', 1),
(18, 'Trần Thẩm Khang', 'admin', '$2y$10$8cnwaC4kyEH/pcfi241ED.qlpqSo6ejyO46N8ps.EVu5mt2t.XY0u', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-10', 'Tỉnh Cao Bằng, Huyện Bảo Lâm, Xã Nam Cao, xas', 1),
(19, 'Trần Thẩm Khang', 'admin@gmail.com', '$2y$10$ikQFWcJfx6aIRclINa2Cke9SymuUDb4SHc0Ou9Dq74oEyZYe/f2Ya', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-01', 'Thành phố Hà Nội, Quận Ba Đình, Phường Phúc Xá, khang', 0),
(24, 'Trần Thẩm Khang', 'trankhang', '$2y$10$8EmAYzBr9NSHA0lxlFsbR.hco2dipxa8f.evJ5f.NbYFvRkA40JXa', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-02', 'Thành phố Hà Nội, Quận Ba Đình, Phường Trúc Bạch, Thành phố Hà Nội, Quận Ba Đình, Phường Trúc Bạch, warwetat4w', 0),
(27, 'Trần Thẩm Khang', 'khang1', '$2y$10$HrAzqBMvGvXlCrcx5JoryeGeLmgijAxbi03qA/iSmFUrIagIZSUo.', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-10', 'Tỉnh Cao Bằng, Huyện Bảo Lạc, Xã Cô Ba, Tỉnh Cao Bằng, Huyện Bảo Lạc, Xã Cô Ba, dfsagafg', 0),
(28, 'Trần Thẩm Khang', 'khang123', '$2y$10$rvtZLkND3zKrLUXMrVPFTeisEedr6GrsUujfIRMymK28HuYN5rJU2', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-02', 'Tỉnh Hà Giang, Thành phố Hà Giang, Phường Quang Trung, sfsadf', 0),
(29, 'Trần Thẩm Khang', 'khang12', '$2y$10$QvWiKsdrpsTbOTHCudfSX.aFrQDy7ckmWb3pfwxFRUSa2fD0kWwi6', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-02', 'Thành phố Hà Nội, Quận Hoàn Kiếm, Phường Đồng Xuân, Tỉnh Hà Giang, Thành phố Hà Giang, Phường Quang Trung, sfsadf', 0),
(30, 'Trần Thẩm Khang', 'linh', '$2y$10$929yIWVV3g1pWompiZqli.AzFjELQsRU9.ZWFX6r1lMwb2U/ceZgK', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-02', 'Tỉnh Lào Cai, Huyện Bắc Hà, Xã Tả Van Chư, asdfsadf', 0),
(31, 'Trần Thẩm Khang', 'khang12345', '$2y$10$P9/uQnoG/x1DOTKXU/ULCeDAZH6/NrYA39LTQnSLmHFMsEf/JVjkm', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-01', 'Thành phố Hà Nội, Quận Hoàng Mai, Phường Hoàng Văn Thụ, asdfasdf', 0),
(32, 'Trần Thẩm Khang', 'admin123', '$2y$10$whqz9WbpkYb79VkXw0r9S.m.E7t2amoXCCXhWkXx2tUPyk/2fGz2y', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-03', 'Tỉnh Tuyên Quang, Huyện Na Hang, Xã Thượng Giáp, sdafasdf', 0),
(33, 'Trần Thẩm Khangasdf', 'wefwaf', '$2y$10$A7nA92T3MNVl78JJRHJSeOqdXhb3t0WKRSS1g3MxS0CYPsJsQY9.K', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-02', 'Tỉnh Quảng Ninh, Huyện Ba Chẽ, Xã Thanh Lâm, asdfdsag', 0),
(34, 'Trần Thẩm Khang', 'dfa', '$2y$10$Ug7PkdDk3w1qdLHwiLeRg.388Wi5ks0LIkEF0lxJb2GHgbQyH626u', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-03', 'Tỉnh Quảng Ninh, Huyện Tiên Yên, Xã Đại Dực, asdfasdf', 0),
(37, 'Trần Thẩm Khang', 'admin@gmail.comasdf', '$2y$10$vTTbIMMwle5ubALiVM/y8eo8I6WchxIz.D8JR8GQwlCoCC5HaFueS', 'thamkhang2003@gmail.com', 'Nam', 2147483647, '2023-05-18', 'sdafs', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `uc_adminUser` (`adminUser`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `orderId` (`orderId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `catId` (`catId`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

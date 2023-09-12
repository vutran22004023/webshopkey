-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 12, 2023 lúc 04:35 PM
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
-- Cơ sở dữ liệu: `db_key_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'namne', '12345678');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'office'),
(2, 'game'),
(3, 'add');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contents` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `contents` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `title`, `contents`, `created`, `status`) VALUES
(1, 'Phan Hoai Nam', 'phanhoainam.work@gmail.com', 'Demo web', 'Test thôi nhá', '2023-08-08 08:32:54', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_order` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `total`, `date_order`, `status`, `user_id`) VALUES
(1, 245000, '2018-01-25 18:30:30', 1, 12),
(2, 225000, '2018-01-25 19:42:03', 1, 13),
(3, 245000, '2018-01-25 19:45:13', 1, 14),
(4, 245000, '2018-02-02 08:27:05', 1, 15),
(5, 245000, '2018-02-02 08:29:12', 1, 15),
(6, 235000, '2018-11-06 18:20:48', 0, 10),
(7, 245000, '2018-11-06 18:23:37', 0, 15),
(8, 245000, '2023-09-10 19:13:48', 0, 26),
(9, 245000, '2023-09-10 19:13:50', 0, 26),
(10, 1165000, '2023-09-11 08:55:28', 0, 26),
(11, 275000, '2023-09-12 20:44:01', 0, 26),
(12, 225000, '2023-09-12 20:46:01', 0, 26),
(13, 225000, '2023-09-12 20:53:09', 0, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyprd` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `saleprice` float NOT NULL,
  `created` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `keyword` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `keyprd`, `category_id`, `image`, `description`, `price`, `saleprice`, `created`, `quantity`, `keyword`, `status`) VALUES
(2, 'Steam Wallet Code 40 HKD', 'XM2V9-DN9HH-QB449-XDGKC-W2RMW', 2, 'images/game/1.png', '', 130000, 0, '2017-12-18', 8, '', 0),
(3, 'Steam Wallet Code 80 HKD', 'W8W6K-3N7KK-PXB9H-8TD8W-BWTH9', 2, 'images/game/2.png', '', 260000, 0, '2017-12-18', 10, '', 0),
(4, 'Gói nạp Steam Wallet 20$', 'NMMKJ-6RK4F-KMJVX-8D9MJ-6MWKP', 2, 'images/game/3.png', '', 470000, 0, '2017-12-18', 7, '', 0),
(5, 'Steam Wallet Code 100 TWD', 'W8W6K-3N7KK-PXB9H-8TD8W-BWTH9', 2, 'images/game/4.png', '', 89000, 0, '2017-12-18', 12, '', 0),
(6, 'Gói nạp Steam Wallet 50$ ( Nạp chậm )', 'VQ9DP-NVHPH-T9HJC-J9PDT-KTQRG', 2, 'images/game/5.png', '', 1175000, 0, '2017-12-18', 15, '', 0),
(7, 'Steam Wallet Code 50 HKD', 'KDNJ9-G2MPB-HWJB4-DC6C2-DDCWD', 2, 'images/game/6.png', '', 163000, 0, '2017-12-18', 9, '', 0),
(8, 'Gói nạp Steam Wallet 100$ ( Nạp chậm )', 'NMMKJ-6RK4F-KMJVX-8D9MJ-6MWKP', 2, 'images/game/7.png', '', 2350000, 0, '2017-12-18', 19, '', 0),
(9, 'Steam Wallet Code 200 HKD', 'VQ9DP-NVHPH-T9HJC-J9PDT-KTQRG', 2, 'images/game/8.png', '', 629000, 0, '2017-12-18', 15, '', 0),
(10, 'Gói gia hạn Spotify Premium 01 năm', '3D7W4-F9N4Q-HMQMK-8632X-DYKGG', 3, 'images/office/10.jpg', '', 315000, 0, '2017-12-18', 10, '', 0),
(11, 'Tài khoản OpenAI - ChatGPT (Có sẵn 5$)', 'B7PBN-GCYRC-Y7WMJ-3YGY2-XTQ2T', 3, 'images/add/9.jpg', '', 99000, 0, '2017-12-18', 10, '', 0),
(12, 'Windows 10 Professional CD Key', '8NJHV-FBGB4-FBTQH-J3CFT-BP32T', 1, 'images/office/11.jpg', '', 245000, 0, '2017-12-18', 20, '', 0),
(13, 'Windows 11 Professional CD Key', 'N278J-P73GG-9MW84-JMPP4-CR6TG', 1, 'images/office/12.jpg', '', 275000, 0, '2017-12-18', 21, '', 0),
(14, 'Microsoft Office 2021 Professional Plus for Windows', 'D6QFG-VBYP2-XQHM7-J97RH-VVRCK', 1, 'images/office/13.jpg', '', 225000, 0, '2017-12-18', 17, '', 0),
(15, 'Microsoft Office 2019 Professional Plus for Windows', 'V7Y44-9T38C-R2VJK-666HK-T7DDX', 1, 'images/office/14.jpg', '', 225000, 0, '2017-12-18', 6, '', 0),
(16, 'Gói nâng cấp Office 365 1 năm (1TB)', 'CQYRY-3KBR3-JW34C-VGH7M-MQM', 1, 'images/office/15.jpg', '', 235000, 0, '2017-12-18', 11, '', 0),
(17, 'Windows 10 Professional DSP OEI DVD (Full VAT)', 'W3BTX-H6BW7-Q6DFW-BXFFY-8RVJP', 1, 'images/office/16.jpg', '', 245000, 0, '2017-12-18', 13, '', 0),
(18, 'Office Home & Business 2019 English APAC EM (Full VAT)', 'DX4MW-PB7F4-YR4WT-BV3MM-4YV79', 1, 'images/office/17.jpg', '', 195000, 0, '2017-12-18', 15, '', 0),
(19, 'Microsoft Office 2021 Home & Business for MAC', 'BDD3G-XM7FB-BD2HM-YK63V-VQFDK', 1, 'images/office/18.jpg', '', 115000, 0, '2017-12-18', 13, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_order`
--

CREATE TABLE `product_order` (
  `product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_order`
--

INSERT INTO `product_order` (`product_id`, `order_id`, `quantity`) VALUES
(12, 1, 1),
(14, 2, 1),
(17, 3, 1),
(12, 4, 1),
(17, 5, 1),
(16, 6, 1),
(17, 7, 1),
(22, 0, 1),
(12, 8, 1),
(18, 10, 1),
(3, 10, 0),
(13, 10, 1),
(15, 10, 3),
(4, 10, 0),
(17, 10, 1),
(9, 10, 0),
(13, 11, 1),
(15, 12, 1),
(15, 13, 1),
(2, 13, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_ oview`
--

CREATE TABLE `product_ oview` (
  `product_id` int(11) NOT NULL,
  `oview_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `contents` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `address`, `phone`, `created`, `role`) VALUES
(10, 'Hoai Nam', 'namvtc', '12345678', 'my.hoih@student.passerellesnumeriques.org', 'Đà Nẵng', '01697450200', NULL, 1),
(11, 'y blir', 'blir.y', 'C00813256690A14079A569831F9BAAD6', 'blir.y@student.passerellesnumeriques.org', 'Đà Nẵng', '0926055983', NULL, 1),
(12, 'Ly Ca Tiếu', '', '', 'hoihmy2712@gmail.com', 'Đà Nẵng', '01697450200', NULL, 0),
(13, 'Ly Ca Tiếu', '', '', 'hoihmy2712@gmail.com', 'Đà Nẵng', '01697450200', NULL, 0),
(14, 'Ly Ca Tiếu', '', '', 'hoihmy2712@gmail.com', 'Đà Nẵng', '01697450200', NULL, 0),
(22, 'Mr DInh', 'dinhvcvn', '123abc', 'dinhvcvn@gmail.com', NULL, NULL, '2023-04-01 05:25:22', 1),
(23, 'PHAN HOAI NAM', 'cmvnam', '09850985', 'phanhoainam.work@gmail.com', NULL, NULL, NULL, 1),
(24, 'PHAN HOAI NAM', 'cmvnam', '123', 'phanhoainam.work@gmail.com', NULL, NULL, NULL, 1),
(25, 'PHAN HOAI NAM', 'nampro', '202cb962ac59075b964b07152d234b70', 'phanhoainam.work@gmail.com', NULL, NULL, NULL, 1),
(26, 'PHAN HOAI NAM', 'cmvnam', '202cb962ac59075b964b07152d234b70', 'Phanhoainam.work@gmail.com', NULL, NULL, NULL, 1),
(27, 'PHAN HOAI NAM', 'nampro', 'd41d8cd98f00b204e9800998ecf8427e', 'Phanhoainam.work@gmail.co', 'Liên chiểu, đà nẵng', '03', NULL, 1),
(28, 'PHAN HOAI NAM', 'nampro1', '202cb962ac59075b964b07152d234b70', 'Phanhoainam.work@gmail.com', 'Liên chiểu, đà nẵng', '0325788806', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_groupby_idorder`
-- (See below for the actual view)
--
CREATE TABLE `view_groupby_idorder` (
`idOrder` int(11)
,`status` tinyint(2)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_order_list`
-- (See below for the actual view)
--
CREATE TABLE `view_order_list` (
`idOrder` int(11)
,`fullname` varchar(50)
,`phone` varchar(20)
,`email` varchar(100)
,`idUser` int(11)
,`address` varchar(50)
,`idProduct` int(11)
,`nameProduct` varchar(255)
,`price` float
,`saleprice` float
,`quantity` int(11)
,`status` tinyint(2)
,`dateOrder` datetime
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_groupby_idorder`
--
DROP TABLE IF EXISTS `view_groupby_idorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_groupby_idorder`  AS SELECT `orders`.`id` AS `idOrder`, `orders`.`status` AS `status` FROM (((`orders` join `users` on(`orders`.`user_id` = `users`.`id`)) join `product_order` on(`product_order`.`order_id` = `orders`.`id`)) join `products` on(`product_order`.`product_id` = `products`.`id`)) GROUP BY `orders`.`id``id`  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_order_list`
--
DROP TABLE IF EXISTS `view_order_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order_list`  AS SELECT `orders`.`id` AS `idOrder`, `users`.`fullname` AS `fullname`, `users`.`phone` AS `phone`, `users`.`email` AS `email`, `users`.`id` AS `idUser`, `users`.`address` AS `address`, `products`.`id` AS `idProduct`, `products`.`name` AS `nameProduct`, `products`.`price` AS `price`, `products`.`saleprice` AS `saleprice`, `product_order`.`quantity` AS `quantity`, `orders`.`status` AS `status`, `orders`.`date_order` AS `dateOrder` FROM (((`orders` join `users` on(`orders`.`user_id` = `users`.`id`)) join `product_order` on(`product_order`.`order_id` = `orders`.`id`)) join `products` on(`product_order`.`product_id` = `products`.`id`))  ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

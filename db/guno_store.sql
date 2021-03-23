-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2021 lúc 09:32 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `guno_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `reciever` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Không tên',
  `coupon` double DEFAULT 0,
  `ship_cost` double DEFAULT 0,
  `total_bill` double NOT NULL DEFAULT 0,
  `recive_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` int(11) NOT NULL DEFAULT 1,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_finish` date DEFAULT NULL,
  `date_cancel` date DEFAULT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `id_user`, `reciever`, `coupon`, `ship_cost`, `total_bill`, `recive_address`, `phone`, `email`, `status_order`, `date_order`, `date_finish`, `date_cancel`, `cancel_reason`, `created_at`, `updated_at`) VALUES
(1064, 12, 'Bảo', 0, 0, 1599988, '227, phường 4, quận 5, HCM', '0845606616', 'nmhieu03032000@gmail.com', 3, '2020-03-09 13:50:36', NULL, NULL, NULL, '2021-01-10 12:55:53', '2021-01-12 02:52:18'),
(1065, 11, 'Nguyễn Minh Hiếu', 0, 0, 990000, 'Can Giuoc, Long An', '0134656598', 'demo@gmail.com', 4, '2021-01-09 13:05:36', NULL, NULL, NULL, '2021-01-10 13:05:36', '2021-01-21 08:30:59'),
(1066, 16, 'Nguyễn Minh Hiếu', 0, 0, 1299000, 'Can Giuoc, Long An', '0845606616', 'nmhieu03032000@gmail.com', 4, '2021-05-07 13:51:46', NULL, NULL, NULL, '2021-01-10 13:51:46', '2021-01-21 06:32:33'),
(1068, 17, 'Nguyễn Minh Hiếu', 0, 0, 949000, 'Can Giuoc, Long An', '0845606616', 'nmhieu03032000@gmail.com', 5, '2021-01-12 02:47:27', NULL, NULL, NULL, '2021-01-12 02:47:27', '2021-01-12 02:52:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) NOT NULL,
  `id_bill` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, '1062', 'SP1040', 900000, 1, 900000, '2021-01-10 09:12:24', '2021-01-10 09:12:24'),
(2, '1062', 'SP1078', 490000, 1, 490000, '2021-01-10 09:12:24', '2021-01-10 09:12:24'),
(3, '1062', 'SP1048', 450000, 1, 450000, '2021-01-10 09:12:24', '2021-01-10 09:12:24'),
(4, '1063', 'SP1041', 990000, 5, 4950000, '2021-01-10 12:39:08', '2021-01-10 12:39:08'),
(5, '1064', 'SP1044', 399996, 3, 1199988, '2021-01-10 12:55:53', '2021-01-10 12:55:53'),
(6, '1064', 'SP1067', 400000, 1, 400000, '2021-01-10 12:55:53', '2021-01-10 12:55:53'),
(7, '1065', 'SP1041', 990000, 1, 990000, '2021-01-10 13:05:36', '2021-01-10 13:05:36'),
(8, '1066', 'SP1048', 450000, 2, 900000, '2021-01-10 13:51:46', '2021-01-10 13:51:46'),
(9, '1066', 'SP1047', 399000, 1, 399000, '2021-01-10 13:51:46', '2021-01-10 13:51:46'),
(10, '1067', 'SP1044', 399996, 1, 399996, '2021-01-10 14:53:47', '2021-01-10 14:53:47'),
(11, '1067', 'SP1055', 650000, 1, 650000, '2021-01-10 14:53:47', '2021-01-10 14:53:47'),
(12, '1068', 'SP1047', 399000, 1, 399000, '2021-01-12 02:47:28', '2021-01-12 02:47:28'),
(13, '1068', 'SP1083', 550000, 1, 550000, '2021-01-12 02:47:28', '2021-01-12 02:47:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_code` int(11) DEFAULT NULL,
  `total_cart` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_code`, `total_cart`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, NULL, '2021-01-10 09:11:40'),
(4, 6, NULL, 0, '2021-01-09 06:19:15', '2021-01-09 06:19:15'),
(5, 7, NULL, 0, '2021-01-09 06:23:56', '2021-01-09 06:23:56'),
(6, 8, NULL, 950000, '2021-01-09 06:31:18', '2021-01-10 11:33:34'),
(7, 9, NULL, 0, '2021-01-10 12:13:27', '2021-01-10 12:13:27'),
(8, 10, NULL, 0, '2021-01-10 12:18:47', '2021-01-10 12:18:47'),
(9, 11, NULL, 0, '2021-01-10 12:29:03', '2021-01-10 13:05:36'),
(10, 12, NULL, 0, '2021-01-10 12:47:42', '2021-01-10 12:55:53'),
(11, 13, NULL, 0, '2021-01-10 13:37:52', '2021-01-10 13:37:52'),
(12, 14, NULL, 0, '2021-01-10 13:40:26', '2021-01-10 13:40:26'),
(13, 15, NULL, 0, '2021-01-10 13:41:39', '2021-01-10 13:41:39'),
(14, 16, NULL, 399996, '2021-01-10 13:43:39', '2021-01-11 15:03:27'),
(15, 17, NULL, 450000, '2021-01-12 02:44:27', '2021-01-12 02:53:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `id_cart`, `id_product`, `size`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(59, 6, 'SP1087', '29', 950000, 1, 950000, '2021-01-10 11:33:17', '2021-01-10 11:33:34'),
(71, 14, 'SP1044', '29', 399996, 1, 399996, '2021-01-11 04:58:21', '2021-01-11 04:58:21'),
(75, 15, 'SP1082', '29', 450000, 1, 450000, '2021-01-12 02:53:40', '2021-01-12 02:53:40');

--
-- Bẫy `cart_detail`
--
DELIMITER $$
CREATE TRIGGER `add_cart_detail-update-total-cart` AFTER INSERT ON `cart_detail` FOR EACH ROW UPDATE cart SET total_cart = (SELECT SUM(total) FROM cart_detail WHERE cart_detail.id_cart = NEW.id_cart)
WHERE cart.id = NEW.id_cart
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_cart_detail` AFTER DELETE ON `cart_detail` FOR EACH ROW UPDATE cart 
    SET total_cart = (SELECT SUM(total) 
                      FROM cart_detail
                      WHERE cart_detail.id_cart = 						old.id_cart)
    WHERE id = old.id_cart
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_cart_detail-Cart` AFTER UPDATE ON `cart_detail` FOR EACH ROW UPDATE cart 
    SET total_cart = (SELECT SUM(total) 
                      FROM cart_detail
                      WHERE cart_detail.id_cart = 						NEW.id_cart)
    WHERE id = NEW.id_cart
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(10) NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `color_name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'White', '#ffffff', NULL, '2021-01-08 18:44:08'),
(2, 'Black', '#000000', NULL, '2021-01-08 18:44:13'),
(3, 'FloralWhite', '#FFFAF0', NULL, '2021-01-08 18:44:29'),
(4, 'Chartreuse', '#7FFF00', NULL, '2021-01-09 07:23:12'),
(5, 'DarkCyan', '#008B8B', NULL, '2021-01-09 07:42:52'),
(6, 'Green', '#517805', NULL, '2021-01-10 07:28:44'),
(7, 'Red', '#ee3838', NULL, '2021-01-11 07:27:47'),
(8, 'Gold', '#FFD700', NULL, '2021-01-09 08:06:15'),
(9, 'Roasted sand', '#0000CD', NULL, '2021-01-10 07:34:20'),
(10, 'Orange', '#FFA500', NULL, '2021-01-09 08:15:18'),
(11, 'SkyBlue', '#87CEEB', NULL, '2021-01-09 08:18:58'),
(12, 'Teal', '#008080', NULL, '2021-01-09 08:19:30'),
(13, 'Tan', '#D2B48C', NULL, '2021-01-09 08:19:58'),
(14, 'Silver', '#C0C0C0', NULL, '2021-01-09 08:22:39'),
(15, 'Taupr', '#bf9c65', NULL, '2021-01-11 07:30:51'),
(16, 'Plum', '	#DDA0DD', '2018-11-22 13:43:47', '2021-01-09 08:24:20'),
(17, 'Goldenrod', '#DAA520', '2018-11-25 15:58:26', '2021-01-09 08:47:07'),
(18, 'LightCoral', '#F08080', '2018-11-25 16:03:49', '2021-01-09 08:35:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `virtual_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `id_user`, `virtual_name`, `id_product`, `content`, `star`, `created_at`, `updated_at`) VALUES
(1, 5, 'van cuong', 'SP1007', 'Sản phẩm tốt!', 5, '2018-11-18 14:05:34', '2018-11-18 14:05:34'),
(2, 6, 'Ẩn danh', 'SP1007', 'Áo chất lượng khá tốt!', 4, '2018-11-18 14:17:20', '2018-11-18 14:17:20'),
(3, 6, 'Meo', 'SP1007', 'Good!!', 4, '2018-11-18 14:20:19', '2018-11-18 14:20:19'),
(7, 6, 'jacky', 'SP1012', 'Sản phẩm đẹp quá', 3, '2018-11-23 02:53:34', '2018-11-23 02:53:34'),
(8, 6, 'lucy', 'SP1012', NULL, 5, '2018-11-23 02:59:33', '2018-11-23 02:59:33'),
(9, 6, 'wendy', 'SP1013', NULL, 4, '2018-11-23 03:00:06', '2018-11-23 03:00:06'),
(10, 5, 'snow', 'SP1012', NULL, 3, '2018-11-25 12:08:06', '2018-11-25 12:08:06'),
(11, 5, 'van cuong', 'SP1011', NULL, 4, '2018-11-27 03:16:20', '2018-11-27 03:16:20'),
(12, 5, NULL, 'SP1023', NULL, 5, '2019-01-22 14:15:45', '2019-01-22 14:15:45'),
(13, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:17:37', '2019-01-22 14:17:37'),
(14, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(15, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(16, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(17, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(18, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Trẻ em'),
(4, 'Cả nam và nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `my_product`
--

CREATE TABLE `my_product` (
  `id` int(10) NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `my_product`
--

INSERT INTO `my_product` (`id`, `id_product`, `id_user`, `created_at`, `updated_at`) VALUES
(29, 'SP1060', 8, '2021-01-10 07:40:43', '2021-01-10 07:40:43'),
(31, 'SP1067', 8, '2021-01-10 07:40:49', '2021-01-10 07:40:49'),
(34, 'SP1055', 8, '2021-01-10 07:40:59', '2021-01-10 07:40:59'),
(35, 'SP1041', 8, '2021-01-10 08:21:04', '2021-01-10 08:21:04'),
(36, 'SP1057', 8, '2021-01-10 08:21:09', '2021-01-10 08:21:09'),
(37, 'SP1063', 8, '2021-01-10 08:21:12', '2021-01-10 08:21:12'),
(38, 'SP1064', 8, '2021-01-10 08:21:13', '2021-01-10 08:21:13'),
(39, 'SP1065', 8, '2021-01-10 08:21:15', '2021-01-10 08:21:15'),
(40, 'SP1071', 8, '2021-01-10 08:21:18', '2021-01-10 08:21:18'),
(41, 'SP1077', 8, '2021-01-10 08:21:21', '2021-01-10 08:21:21'),
(42, 'SP1078', 8, '2021-01-10 08:29:54', '2021-01-10 08:29:54'),
(47, 'SP1087', 8, '2021-01-10 11:32:59', '2021-01-10 11:32:59'),
(48, 'SP1040', 11, '2021-01-10 12:31:55', '2021-01-10 12:31:55'),
(49, 'SP1044', 11, '2021-01-10 12:31:57', '2021-01-10 12:31:57'),
(50, 'SP1042', 11, '2021-01-10 12:31:58', '2021-01-10 12:31:58'),
(51, 'SP1048', 11, '2021-01-10 12:32:04', '2021-01-10 12:32:04'),
(52, 'SP1050', 11, '2021-01-10 12:32:10', '2021-01-10 12:32:10'),
(53, 'SP1055', 11, '2021-01-10 12:32:12', '2021-01-10 12:32:12'),
(54, 'SP1071', 11, '2021-01-10 12:33:34', '2021-01-10 12:33:34'),
(60, 'SP1041', 11, '2021-01-10 13:04:53', '2021-01-10 13:04:53'),
(65, 'SP1063', 16, '2021-01-10 14:51:33', '2021-01-10 14:51:33'),
(66, 'SP1061', 16, '2021-01-10 14:51:34', '2021-01-10 14:51:34'),
(67, 'SP1044', 16, '2021-01-11 04:58:18', '2021-01-11 04:58:18'),
(68, 'SP1037', 16, '2021-01-11 15:04:31', '2021-01-11 15:04:31'),
(69, 'SP1043', 16, '2021-01-11 15:04:33', '2021-01-11 15:04:33'),
(70, 'SP1080', 17, '2021-01-12 02:45:55', '2021-01-12 02:45:55'),
(71, 'SP1043', 17, '2021-01-12 02:46:00', '2021-01-12 02:46:00');

--
-- Bẫy `my_product`
--
DELIMITER $$
CREATE TRIGGER `can't add product already exists` BEFORE INSERT ON `my_product` FOR EACH ROW IF EXISTS(SELECT * 
              FROM my_product
              WHERE id_product =NEW.id_product 
              AND id_user = NEW.id_user)
THEN
	    SIGNAL SQLSTATE VALUE '45000' SET MESSAGE_TEXT = 'INSERT failed due to duplicate wish item';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_color` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 100,
  `gender` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_price` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `promotion_price` double NOT NULL DEFAULT -1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `new` int(11) NOT NULL DEFAULT 0,
  `hot` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_product`, `name`, `id_type`, `id_color`, `quantity`, `gender`, `description`, `import_price`, `price`, `promotion_price`, `image`, `new`, `hot`, `created_at`, `updated_at`) VALUES
(1039, 'SP1037', 'ANANAS TRACK 6 - LOW TOP - TRIPLE BLACK', 1, 2, 55, 3, '<p>Với cảm hứng từ <b>Retro Sneakers</b> và âm nhạc giai đoạn 1970s,<b> Ananas Track 6</b> ra đời với danh hiệu là mẫu giày Cold Cement đầu tiên của Ananas - một thương hiệu giày Vulcanized. Chất liệu Storm Leather đáng giá \"càn quét\" toàn bộ bề mặt upper cùng những chi tiết thiết kế đặc trưng và mang nhiều ý nghĩa. Chắc rắng, Track 6 sẽ đem đến cho bạn sự tự nhiên thú vị như chính thông điệp bài hát Let it be của huyền thoại The Beatles gửi gắm. Màu all black huyền bí luôn có mặt trong danh sách best seller.</p>', 800000, 990000, 900000, 'SP1037_1.jpg', 1, 1, '2021-01-08 17:29:18', NULL),
(1041, 'SP1041', 'ANANAS TRACK 6 OG - LOW TOP - 70S WHITE', 1, 1, 100, 3, '<p><span style=\"font-size: 14.4px;\">Với cảm hứng từ <b>Retro Sneakers </b>và âm nhạc giai đoạn 1970s,<b> Ananas Track 6</b> ra đời với danh hiệu là mẫu giày Cold Cement đầu tiên của Ananas - một thương hiệu giày Vulcanized. Chất liệu Storm Leather đáng giá \"càn quét\" toàn bộ bề mặt upper cùng những chi tiết thiết kế đặc trưng và mang nhiều ý nghĩa. Chắc rằng, Track 6 sẽ đem đến cho bạn sự tự nhiên thú vị như chính thông điệp bài hát Let it be của huyền thoại The Beatles gửi gắm.</span><br></p>', 800000, 990000, -1, 'SP1041_1.jpg', 0, 1, '2021-01-09 07:17:45', NULL),
(1043, 'SP1043', 'URBAS CORLURAY - HIGH TOP - MOUSE', 1, 1, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ kì nghỉ Xuân 2020 \"dài hạn đặc biệt\" vượt qua cả mùa Hạ để chạm đến mùa Thu, “Corluray Pack” ra đời với nét cách điệu mới mẻ, hiếm thấy ở dòng <b>Urbas</b>. Chất liệu Corduroy với tên gọi khác <b>Elephant Cord</b> (nhung gân sợi to) lần đầu tiên được sử dụng trên thân giày, gây ấn tượng cùng những phối màu như những tia nắng cuối Xuân ấm áp.</span><br></p>', 600000, 700000, -1, 'SP1043_1.jpg', 1, 1, '2021-01-09 09:33:05', '2021-01-09 09:33:05'),
(1046, 'SP1044', 'BASAS BUMPER GUM - LOW TOP - BLACKGUM', 1, 2, 100, 3, '<p><span style=\"font-size: 14.4px;\">Sự kết hợp giữa những tông màu cơ bản, dễ ứng dụng của dòng giày <b>Basas </b>và điểm nhấn màu <b>Gum</b> ở phần bumber đã mang đến cho <b>\"Basas Bumber Gum\" Pack</b> cái nhìn phá cách và thu hút. Cùng với quai dán trẻ trung và tiện lợi, đây chính là đôi giày dành cho những ai tìm kiếm sự mới mẻ từ những điều quen thuộc, truyền thống.</span><br></p>', 300000, 450000, 399996, 'SP1044_1.jpg', 1, 0, '2021-01-09 10:07:08', '2021-01-09 10:07:08'),
(1047, 'SP1047', 'BASAS BUMPER GUM - SLIP ON - OFFWHITEGUM', 1, 1, 100, 3, '<p><span style=\"font-size: 14.4px;\">Vẫn là màu trắng cổ điển của dòng giày <b>Basas</b>, nhưng phần mũi của những sản phẩm thuộc</span> <b>Basas \"Bumper Gum\"</b> l<span style=\"font-size: 14.4px;\">ại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách.<b> \"Bumper Gum\"</b> là đôi giày dành cho những ai tìm kiếm sự mới mẻ từ những điều quen thuộc, truyền thống.</span><br></p>', 300000, 450000, 399000, 'SP1047_1.jpg', 1, 1, '2021-01-09 10:09:28', '2021-01-09 10:09:28'),
(1048, 'SP1048', 'BASAS HOOK N\'LOOP - LOW TOP - TAUPE', 1, 15, 100, 3, '<p><span style=\"font-size: 14.4px;\">Làm mới hình ảnh cơ bản của<b> Basas, \"Hook n\' Look\" Pack</b> với quai dán hiện đại, ứng dụng giúp điều chỉnh dễ dàng khi mang, đồng thời đem lại cảm giác trẻ trung, khỏe khoắn của tuổi trẻ ở mọi lúc, mọi nơi.</span><br></p>', 250000, 450000, -1, 'SP1048_1.jpg', 0, 1, '2021-01-09 10:12:34', '2021-01-09 10:12:34'),
(1049, 'SP1049', 'BASAS MONO - HIGH TOP - ALL DARK GREY', 1, 14, 100, 3, '<p><span style=\"font-size: 14.4px;\">Dáng giày high top cá tính, kết hợp upper và phần đế \"ton-sur-ton\" đã giúp <b>\"Basas Mono\" Pack </b>trở nên thu hút. Đôi giày này hứa hẹn sẽ là một điểm nhấn thú vị cho mọi set đồ của bạn.</span><br></p>', 300000, 490000, 450000, 'SP1049_1.jpg', 1, 1, '2021-01-09 10:14:44', '2021-01-09 10:14:44'),
(1050, 'SP1050', 'BASAS MONO - LOW TOP - TAOS TAUPE', 1, 15, 100, 3, '<p><span style=\"font-size: 14.4px;\">Vẻ ngoài cổ điển. Chất màu đơn giản cùng phần đế tiệp màu, \"ton-sur-ton\" với upper. <b>Basas \"Mono\" Pack </b>hứa hẹn sẽ là một điểm nhấn đầy thú vị cho tủ giày của bạn.</span><br></p>', 250000, 450000, 449000, 'SP1050_1.jpg', 1, 0, '2021-01-09 10:16:16', '2021-01-09 10:16:16'),
(1051, 'SP1051', 'BASAS MONO-BLACK - LOW TOP - ALL BLACK', 1, 2, 100, 3, '<p><span style=\"font-size: 14.4px;\">Vẻ ngoài cổ điển. Chất màu đơn giản cùng phần đế tiệp màu, \"ton-sur-ton\" với upper. <b>Basas \"Mono\" Pack </b>hứa hẹn sẽ là một điểm nhấn đầy thú vị cho tủ giày của bạn.</span><br></p>', 220000, 420000, 400000, 'SP1051_1.jpg', 1, 0, '2021-01-09 10:17:41', '2021-01-09 10:17:41'),
(1052, 'SP1052', 'BASAS MONO-BLACK - SLIP ON - ALL BLACK', 1, 2, 100, 3, '<p><span style=\"font-size: 14.4px;\">Vẻ ngoài cổ điển. Chất màu đơn giản cùng phần đế tiệp màu, \"ton-sur-ton\" với upper. <b>Basas \"Mono\" Pack</b> hứa hẹn sẽ là một điểm nhấn đầy thú vị cho tủ giày của bạn.</span><br></p>', 220000, 420000, 400000, 'SP1052_1.jpg', 1, 0, '2021-01-09 10:19:16', '2021-01-09 10:19:16'),
(1053, 'SP1053', 'BASAS NEW SIMPLE LIFE - HIGH TOP - TAUPE', 1, 15, 100, 3, '<p><span style=\"font-size: 14.4px;\">Thuộc dòng Basas với nét tối giản đặc trưng, khả năng kết hợp mọi outfit thường ngày, <b>Basas \"New Simple Life\"</b> dành cho những con người đơn giản nhưng không đơn điệu, bình thường mà chẳng tầm thường. Dáng <b>High Top </b>cá tính, không bao giờ lỗi thời chính là sự lựa chọn dễ chịu cho những ngày vô lo, vô nghĩ.</span><br></p>', 300000, 520000, -1, 'SP1053_1.jpg', 1, 1, '2021-01-09 10:20:54', '2021-01-09 10:20:54'),
(1054, 'SP1054', 'BASAS SUEDE - LOW TOP - BLACK', 1, 1, 100, 3, '<p><span style=\"font-size: 14.4px;\">Chất liệu Suede cổ điển, bền bỉ cùng thiết kế tối giản đặt trưng của dòng <b>Basas</b>, <b>\"Basas Suede\" Pack</b> không chỉ phù hợp cho mọi outfit của bạn, mà còn là những đôi giày cùng bạn chinh chiến mỗi ngày bất kể nắng mưa.</span></p><div><br></div>', 350000, 580000, -1, 'SP1054_1.jpg', 1, 1, '2021-01-09 10:22:11', '2021-01-09 10:22:11'),
(1055, 'SP1055', 'CREAS FLIP-FLAP - HIGH TOP - MAGENTA-SNORKEL BLUE', 1, 11, 100, 3, '<p><span style=\"font-size: 14.4px;\"><b>Ananas Creas Flip-Flap</b> được sản xuất với số lượng giới hạn. Ngẫu hứng, đảo nghịch và truyền tải \"bí quyết\" của sự hạnh phúc. Xem kĩ hình để rõ hơn các chi tiết thiết kế đặc biệt trên sản phẩm</span></p><div><br></div>', 450000, 690000, 650000, 'SP1055_1.jpg', 0, 1, '2021-01-09 10:23:27', '2021-01-09 10:23:27'),
(1056, 'SP1056', 'URBAS BLOODY - LOW TOP - HAUTE RED', 1, 7, 100, 3, '<p><span style=\"font-size: 14.4px;\"><b>Urbas \"Bloody\" </b>- đôi giày có chất liệu <b>Upper </b>hoàn toàn bằng da lộn dành cho những tâm hồn mong muốn nổi bật một cách nổi loạn, sáng tạo một cách sáng chói.</span><br></p>', 300000, 440000, 400000, 'SP1056_1.jpg', 1, 0, '2021-01-09 10:24:34', '2021-01-09 10:24:34'),
(1057, 'SP1057', 'URBAS CORLURAY - HIGH TOP - GRASSES', 1, 6, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ kì nghỉ Xuân 2020 \"dài hạn đặc biệt\" vượt qua cả mùa Hạ để chạm đến mùa Thu,<b> “Corluray Pack” </b>ra đời với nét cách điệu mới mẻ, hiếm thấy ở dòng Urbas. Chất liệu Corduroy với tên gọi khác <b>Elephant Cord</b> (nhung gân sợi to) lần đầu tiên được sử dụng trên thân giày, gây ấn tượng cùng những phối màu như những tia nắng cuối Xuân ấm áp.</span><br></p>', 400000, 650000, 630000, 'SP1057_1.jpg', 1, 0, '2021-01-09 10:26:05', '2021-01-09 10:26:05'),
(1058, 'SP1058', 'URBAS CORLURAY - LOW TOP - DEEP GREEN', 1, 6, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ kì nghỉ Xuân 2020 \"dài hạn đặc biệt\" vượt qua cả mùa Hạ để chạm đến mùa Thu, <b>“Corluray Pack”</b> ra đời với nét cách điệu mới mẻ, hiếm thấy ở dòng Urbas. Chất liệu <b>Corduroy</b> với tên gọi khác <b>Elephant Cord</b> (nhung gân sợi to) lần đầu tiên được sử dụng trên thân giày, gây ấn tượng cùng những phối màu như những tia nắng cuối Xuân ấm áp.</span><br></p>', 350000, 590000, 550000, 'SP1058_1.jpg', 1, 0, '2021-01-09 14:40:30', '2021-01-09 14:40:30'),
(1059, 'SP1059', 'URBAS CORLURAY - LOW TOP - FADED PINK', 1, 15, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ kì nghỉ Xuân 2020 \"dài hạn đặc biệt\" vượt qua cả mùa Hạ để chạm đến mùa Thu, <b>“Corluray Pack”</b> ra đời với nét cách điệu mới mẻ, hiếm thấy ở dòng Urbas. Chất liệu Corduroy với tên gọi khác <b>Elephant Cord </b>(nhung gân sợi to) lần đầu tiên được sử dụng trên thân giày, gây ấn tượng cùng những phối màu như những tia nắng cuối Xuân ấm áp.</span></p><div><br></div>', 350000, 590000, 590000, 'SP1059_1.jpg', 1, 0, '2021-01-09 14:41:51', '2021-01-09 14:41:51'),
(1060, 'SP1060', 'URBAS INVERSION - LOW TOP - NAVY CITRUS', 1, 17, 100, 3, '<p><span style=\"font-size: 14.4px;\">Phá cách bằng những phối màu đảo nghịch đầy độc đáo, tươi vui, <b>Urbas \"Inversion\"</b> là một pack giày đầy thú vị cho những ai muốn có thêm sắc màu cho cuộc sống, và tất nhiên, là cho cả những bộ outfit của riêng mình nữa.</span><br></p>', 200000, 420000, -1, 'SP1060_1.jpg', 1, 0, '2021-01-09 14:43:14', NULL),
(1061, 'SP1061', 'URBAS IRRELEVANT - LOW TOP - ANTARCTICARED ORANGE', 1, 10, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lạ lẫm trong cách sắp xếp các màu sắc ngẫu nhiên không rõ ý đồ. <b>Urbas Irrelevant Pack</b> mang đậm sự ngẫu hứng không cần điểm chung, cũng ko cần có sự liên quan quá nhiều với nhau trong ý đồ sáng tác giữa các sản phẩm trong bộ. Đây chắc chắn là mảnh ghép không thể thiếu cho những ai muốn điều đặc biệt mà không phân tích quá nhiều.</span><br></p>', 300000, 550000, 529000, 'SP1061_1.jpg', 1, 0, '2021-01-09 14:44:41', '2021-01-09 14:44:41'),
(1062, 'SP1062', 'URBAS IRRELEVANT - LOW TOP - STORMA.GOLD', 1, 17, 100, 3, '', 350000, 550000, 550000, 'SP1062_1.jpg', 1, 0, '2021-01-09 14:45:38', '2021-01-09 14:45:38'),
(1063, 'SP1063', 'URBAS IRRELEVANT - SLIP ON - ANTARCTICARED ORANGE', 1, 10, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lạ lẫm trong cách sắp xếp các màu sắc ngẫu nhiên không rõ ý đồ. <b>Urbas Irrelevant Pack</b> mang đậm sự ngẫu hứng không cần điểm chung, cũng ko cần có sự liên quan quá nhiều với nhau trong ý đồ sáng tác giữa các sản phẩm trong bộ. Đây chắc chắn là mảnh ghép không thể thiếu cho những ai muốn điều đặc biệt mà không phân tích quá nhiều.</span><br></p>', 250000, 490000, 450000, 'SP1063_1.jpg', 1, 0, '2021-01-09 14:46:50', '2021-01-09 14:46:50'),
(1064, 'SP1064', 'URBAS LEGO - LOW TOP - DEEP MIMOSA', 1, 13, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ món đồ chơi xếp hình quen thuộc cùng phong cách thời trang <b>Color Block</b> cá tính, <b>Urbas \"Lego\"</b> với sự kết hợp của những mảng màu nổi bật sẽ tạo nên một bức tranh đa sắc màu ngay dưới chân bạn, cùng bạn thu hút mọi ánh nhìn trên đường phố.</span><br></p>', 200000, 450000, 430000, 'SP1064_1.jpg', 1, 0, '2021-01-09 14:48:44', '2021-01-09 14:48:44'),
(1065, 'SP1065', 'URBAS PINEAPPLE OR ANANAS - LOW TOP - PINEAPPLE PEEL', 1, 10, 100, 3, '<p><span style=\"font-size: 14.4px;\"><b>\"Urbas Pineapple or Ananas Pack\"</b> với quai dán tiện lợi gây ấn tượng với những phối màu \"rất vui\". Kĩ thuật in foxing lần đầu tiên được sử dụng với dòng chữ <b>\"Pineapple Ananas\"</b> chạy dọc viền quanh. Điểm nhấn cuối cùng chính là thiết kế quả Dứa được thêu tỉ mỉ ở quai dán thay cho logo cách điệu thường thấy càng làm rõ hơn tính cách của dòng sản phẩm Urbas và thông điệp muốn truyền tải của bộ sản phẩm.</span><br></p>', 250000, 490000, -1, 'SP1065_1.jpg', 1, 1, '2021-01-09 14:57:15', '2021-01-09 14:57:15'),
(1066, 'SP1066', 'URBAS PINEAPPLE OR ANANAS - LOW TOP - RED PINEAPPLE', 1, 7, 100, 3, '<p><span style=\"font-size: 14.4px;\"><b>\"Urbas Pineapple or Ananas Pack\" </b>với quai dán tiện lợi gây ấn tượng với những phối màu \"rất vui\". Kĩ thuật in foxing lần đầu tiên được sử dụng với dòng chữ <b>\"Pineapple Ananas\" </b>chạy dọc viền quanh. Điểm nhấn cuối cùng chính là thiết kế quả Dứa được thêu tỉ mỉ ở quai dán thay cho logo cách điệu thường thấy càng làm rõ hơn tính cách của dòng sản phẩm Urbas và thông điệp muốn truyền tải của bộ sản phẩm.</span><br></p>', 250000, 490000, 450000, 'SP1066_1.jpg', 1, 0, '2021-01-09 15:00:50', '2021-01-09 15:00:50'),
(1067, 'SP1067', 'URBAS THE GANG - LOW TOP - CERAMIC BLACK', 1, 2, 100, 3, '<p><span style=\"font-size: 14.4px;\">Cùng sở hữu một màu đen chủ đạo và chỉ khác nhau phần màu được nhấn nhá ở đế và đỉnh hậu, <b>Urbas \"The Gang\"</b> là hình ảnh của nhóm bạn thân với nhiều mảnh ghép, nhiều tính cách trái ngược nhưng vẫn có sự kết nối đầy tích cực, lạc quan.</span></p><div><br></div>', 200000, 450000, 400000, 'SP1067_1.jpg', 1, 1, '2021-01-09 15:02:48', '2021-01-09 15:02:48'),
(1068, 'SP1068', 'URBAS THE GANG - LOW TOP - CITRUS BLACK', 1, 2, 100, 3, '<p><span style=\"font-size: 14.4px;\">Cùng sở hữu một màu đen chủ đạo và chỉ khác nhau phần màu được nhấn nhá ở đế và đỉnh hậu, <b>Urbas \"The Gang\"</b> là hình ảnh của nhóm bạn thân với nhiều mảnh ghép, nhiều tính cách trái ngược nhưng vẫn có sự kết nối đầy tích cực, lạc quan.</span><br></p>', 200000, 450000, -1, 'SP1068_1.jpg', 1, 0, '2021-01-09 15:05:11', '2021-01-09 15:05:11'),
(1069, 'SP1069', 'URBAS THE GANG - LOW TOP - HAUTE BLACK', 1, 2, 100, 3, '<p><span style=\"font-size: 14.4px;\">Cùng sở hữu một màu đen chủ đạo và chỉ khác nhau phần màu được nhấn nhá ở đế và đỉnh hậu, <b>Urbas \"The Gang\"</b> là hình ảnh của nhóm bạn thân với nhiều mảnh ghép, nhiều tính cách trái ngược nhưng vẫn có sự kết nối đầy tích cực, lạc quan.</span></p><div><br></div>', 200000, 450000, 430000, 'SP1069_1.jpg', 1, 0, '2021-01-09 15:07:17', '2021-01-09 15:07:17'),
(1070, 'SP1070', 'URBAS UNSETTLING - HIGH TOP - STARLIGHTLAVENDER', 1, 18, 100, 3, '<p><span style=\"font-size: 14.4px;\">Sở hữu công thức pha màu \"khó chịu\". <b>Urbas Unsettling</b> tạo nên điểm nhấn mạnh mẽ, gây kích thích thị giác thông qua sự đối lập trong từng gam màu. Điểm chốt hạ cho một outfit đặc biệt thú vị, tách biệt khỏi sự trùng lặp thông thường.</span><br></p>', 200000, 490000, 400000, 'SP1070_1.jpg', 1, 0, '2021-01-09 15:09:36', '2021-01-09 15:09:36'),
(1071, 'SP1071', 'URBAS UNSETTLING - LOW TOP - INSIGNIASULPHUR', 1, 17, 100, 3, '<p><span style=\"font-size: 14.4px;\">Phiên bản <b>EXT (Extension)</b> từ bộ sản phẩm <b>Basas Bumper Gum</b>, <b>Basas Bumper Gum EXT</b> sử dụng chất liệu <b>Suede</b> (da lộn) thay vào một số chi tiết và những pha hoán đổi nhỏ trong nội bộ sản phẩm gốc, tạo điểm nhấn \"phá phách\" nhưng vẫn không quá cầu kỳ, vẫn phù hợp với những người yêu thích sự đơn giản nhưng với một cá tính mạnh mẽ hơn.</span><br></p>', 250000, 490000, -1, 'SP1071_1.jpg', 0, 1, '2021-01-09 15:13:02', '2021-01-09 15:13:02'),
(1072, 'SP1072', 'URBAS UNSETTLING - LOW TOP - STARLIGHTLAVENDER', 1, 18, 100, 3, '<p><span style=\"font-size: 14.4px;\">Sở hữu công thức pha màu \"khó chịu\". <b>Urbas Unsettling</b> tạo nên điểm nhấn mạnh mẽ, gây kích thích thị giác thông qua sự đối lập trong từng gam màu. Điểm chốt hạ cho một outfit đặc biệt thú vị, tách biệt khỏi sự trùng lặp thông thường.</span><br></p>', 250000, 490000, 450000, 'SP1072_1.jpg', 1, 0, '2021-01-09 15:14:39', '2021-01-09 15:14:39'),
(1073, 'SP1073', 'VINTAS MISTER - HIGH TOP - CHOCOLATE BROWN', 1, 18, 100, 3, '<p><span style=\"font-size: 14.4px;\">Công thức pha trộn từ hai chất liệu vải và da lộn đặc trưng, điều thường thấy ở bộ <b>Vintas Mister</b>. Sự kết hợp mạnh mẽ tạo nên nét cổ điển, hoài niệm. Chắc chắn là sự lựa chọn \"hết bài\" cho những con người trầm tính và điềm đạm.</span><br></p>', 400000, 610000, 600000, 'SP1073_1.jpg', 1, 0, '2021-01-09 15:21:04', '2021-01-09 15:21:04'),
(1074, 'SP1074', 'VINTAS MISTER - LOW TOP - NARCISSUEDE', 1, 17, 100, 3, '<p><span style=\"font-size: 14.4px;\">Dáng <b>Low Top</b> truyền thống, kết hợp cùng phối màu gợi nét cổ điển, xưa cũ với chất liệu da Suede. Một sự lựa chọn của những ai muốn làm nổi bật lên sự chín chắn, tính điềm đạm cùng nét lịch thiệp cho bộ outfit của mình.</span></p><div><br></div>', 350000, 580000, 550000, 'SP1074_1.jpg', 1, 0, '2021-01-09 15:22:19', '2021-01-09 15:22:19'),
(1075, 'SP1075', 'VINTAS MISTER - LOW TOP - SLATE CARAFE', 1, 9, 100, 3, '<p><span style=\"font-size: 14.4px;\">Dáng <b>Low Top</b> truyền thống, kết hợp cùng phối màu gợi nét cổ điển, xưa cũ với chất vải <b>Canvas</b>, da <b>Suede</b> trên <b>Upper</b> và một phần nhỏ da <b>Nappa</b> ở tem logo trên lưỡi gà. Một sự lựa chọn của những ai muốn làm nổi bật lên sự chín chắn, tính điềm đạm cùng nét lịch thiệp cho bộ outfit của mình.</span><br></p>', 250000, 465000, 450000, 'SP1075_1.jpg', 1, 0, '2021-01-09 15:24:07', '2021-01-09 15:24:07'),
(1076, 'SP1076', 'VINTAS NEW BLEACHED SAND - LOW TOP - ROASTED SAND', 1, 9, 100, 3, '<p><span style=\"font-size: 14.4px;\">Sử dụng kết hợp chất canvas thông thường cùng chi tiết da lộn trên nền màu trầm đậm, táo bạo mà phá cách. Gợi nhắc cá tính riêng biệt, đặc trưng của những tâm hồn yêu thiên nhiên, thích phiêu lưu đó đây.</span><br></p>', 300000, 550000, 500000, 'SP1076_1.jpg', 1, 0, '2021-01-09 15:25:13', '2021-01-09 15:25:13'),
(1077, 'SP1077', 'ANANAS X LUCKY LUKE PATTAS - LOW TOP - LL GRR BLUE', 1, 5, 100, 3, '<p><span style=\"font-size: 14.4px;\">Phiên bản \"ưu ái\" dành riêng cho chú chó <b>Rantanplan</b>, vốn để lại ấn tượng ngốc nghếch rõ nét trong bộ truyện <b>Lucky Luke</b>. Sử dụng sắc thái khuôn mặt hài hước và dỉ dỏm, kết hợp phom dáng <b>Low Top</b> trên nền xanh chủ đạo. Chắc chắn chinh phục những bạn trẻ đang tìm thêm sắc màu trẻ trung cho cuộc sống.</span></p><div><br></div>', 550000, 790000, 790000, 'SP1077_1.jpg', 1, 0, '2021-01-09 15:27:13', '2021-01-09 15:27:13'),
(1078, 'SP1078', 'VINTAS SAIGON 1980S - HIGH TOP - DARK DENIM', 1, NULL, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ các màu sắc đặc trưng của đường phố Sài Gòn những năm 80, <b>Vintas \"Saigon 1980s\" </b>là BST mang đậm nét đẹp cổ kính, hoài niệm. Với những ai yêu mến nét xưa cũ, trầm mặc, \"Saigon 1980s\" hứa hẹn sẽ trở thành must-have item cho tủ giày của bạn.</span><br></p>', 300000, 495000, 490000, 'SP1078_1.jpg', 1, 0, '2021-01-09 15:29:28', '2021-01-09 15:29:28'),
(1079, 'SP1079', 'VINTAS SAIGON 1980S - LOW TOP - VIN BLACK', 1, 1, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ các màu sắc đặc trưng của đường phố Sài Gòn những năm 80, <b>Vintas \"Saigon 1980s\"</b> là BST mang đậm nét đẹp cổ kính, hoài niệm. Với những ai yêu mến nét xưa cũ, trầm mặc, \"Saigon 1980s\" hứa hẹn sẽ trở thành must-have item cho tủ giày của bạn.</span></p><div><br></div>', 250000, 480000, 450000, 'SP1079_1.jpg', 1, 0, '2021-01-09 15:31:51', '2021-01-09 15:31:51'),
(1080, 'SP1080', 'VINTAS SAIGON 1980S - LOW TOP - VIN CORDOVAN', 1, 14, 100, 3, '<p><span style=\"font-size: 14.4px;\">Lấy cảm hứng từ các màu sắc đặc trưng của đường phố Sài Gòn những năm 80, <b>Vintas \"Saigon 1980s\"</b> là BST mang đậm nét đẹp cổ kính, hoài niệm. Với những ai yêu mến nét xưa cũ, trầm mặc, \"Saigon 1980s\" hứa hẹn sẽ trở thành must-have item cho tủ giày của bạn.</span><br></p>', 250000, 480000, 450000, 'SP1080_1.jpg', 1, 0, '2021-01-09 15:33:08', '2021-01-09 15:33:08'),
(1081, 'SP1081', 'VINTAS THE NEW MILITARY - HIGH TOP - CAPULET OLIVE', 1, 14, 100, 3, '<p><span style=\"font-size: 14.4px;\">Mang vẻ ngoài bụi bặm, mộc mạc và được lấy cảm hứng từ những bộ quân phục của nhiều binh chủng trong quân đội, <b>Vintas \"The New Military\"</b> đem lại một \"chất lính\" rất riêng cho những ai yêu phong cách <b>\"Military\"</b> và những tâm hồn điềm đạm, kiên cường đầy tinh tế.</span><br></p>', 250000, 495000, 450000, 'SP1081_1.jpg', 1, 0, '2021-01-09 15:40:26', '2021-01-09 15:40:26'),
(1082, 'SP1082', 'VINTAS THE NEW MILITARY - LOW TOP - CAPULET OLIVE', 1, 14, 100, 3, '<p><span style=\"font-size: 14.4px;\">Mang vẻ ngoài bụi bặm, mộc mạc và được lấy cảm hứng từ những bộ quân phục của nhiều binh chủng trong quân đội, <b>Vintas \"The New Military\"</b> đem lại một \"chất lính\" rất riêng cho những ai yêu phong cách <b>\"Military\"</b> và những tâm hồn điềm đạm, kiên cường đầy tinh tế.</span><br></p>', 250000, 465000, 450000, 'SP1082_1.jpg', 1, 1, '2021-01-09 15:45:12', '2021-01-09 15:45:12'),
(1083, 'SP1083', 'VINTAS YESTERDAY - HIGH TOP - MOONSTRUCK PIRATE', 1, 17, 100, 3, '<p><span style=\"font-size: 14.4px;\">Sử dụng đồng thời chất liệu da <b>Suede</b>, da <b>Nappa</b> và vải <b>Canvas</b>, <b>\"Yesterday\"</b> gợi cho người nhìn một cảm giác vừa cổ điển, vừa tân thời. Nếu bạn bất giác cảm thấy bản thân đang ở đô tuổi lưng chừng, chưa già nhưng cũng qua thời tuổi trẻ, có lẽ bạn chính là tuýp người \"ngày hôm qua\" chăng?</span><br></p>', 300000, 550000, -1, 'SP1083_1.jpg', 1, 0, '2021-01-09 15:47:00', '2021-01-09 15:47:00'),
(1084, 'SP1084', 'ANANAS X LUCKY LUKE PATTAS - HIGH TOP - RED', 1, 11, 100, 4, '<p><span style=\"font-size: 14.4px;\">Phiên bản gợi nhắc với hình ảnh <b>Lucky Luke</b> và chú ngựa <b>Jolly Jumper </b>đi về hướng mặt trời lặn, miệng nghêu ngao câu hát quen thuộc. Màn kết ấm áp đi vào lòng những tâm hồn mê truyện được tái hiện rõ nét trên kiểu dáng <b>High Top</b> quen thuộc, hứa hẹn sẽ là đôi giày để trưng hay lên chân đều đẹp.</span><br></p>', 600000, 850000, 850000, 'SP1084_1.jpg', 1, 0, '2021-01-09 15:48:39', NULL),
(1085, 'SP1085', 'ANANAS X LUCKY LUKE PATTAS - LL MORRIS WHITE', 1, 1, 100, 3, '<p><span style=\"font-size: 14.4px;\">Phiên bản bất ngờ dành riêng cho bộ sản phẩm <b>Ananas x Lucky Luke </b>nhằm mục đích tôn vinh nét vẽ tài hoa của tác giả <b>Morris</b>. Với việc xuất hiện đầy đủ các nhân vật tuyến chính trong bộ truyện và theo nhiều chi tiết tinh tế được bố trí khắp nơi, sản phẩm được ra mắt với số lượng giới hạn trong một chiếc hộp đặc biệt hấp dẫn, đáng để bạn rinh về nhà.</span><br></p>', 600000, 890000, 880000, 'SP1085_1.jpg', 0, 0, '2021-01-09 15:50:48', '2021-01-09 15:50:48'),
(1086, 'SP1086', 'ANANAS X LUCKY LUKE PATTAS - HIGH TOP - DALTON YELLOW', 1, 8, 100, 3, '<p><span style=\"font-size: 14.4px;\">Phiên bản tượng trưng cho bộ tứ \"cán cộm\" nhất bang <b>Arizona</b>. Thiết kế nhấn mạnh màu sắc tương phản giữa đen và vàng, khắc hoạ đúng nét \"bộ áo truyền thống\" của anh em nhà <b>Dalton</b>. Với nét riêng đầy ấn tượng, đây sẽ là một bản collab không thể bỏ qua với những bạn đam mê những gangster một thời gắn bó với bộ truyện <b>Lucky Luke.</b></span><br></p>', 600000, 850000, -1, 'SP1086_1.jpg', 0, 1, '2021-01-09 15:52:19', '2021-01-09 15:52:19'),
(1087, 'SP1087', 'ANANAS X DORAEMON 50 YEARS PATTAS - WHITE/SUNRISE 50TH', 1, 1, 100, 4, '<p><b>Ananas x Doraemon 50 Years Pattas</b> thể hiện chân thật nét vẽ nguyên bản của bộ truyện từ cái nhìn đầu tiên. Sử dụng chất liệu Action Leather (da) phủ khắp thân giày, pha trộn cùng các chi tiết đắt giá được sắp đặt hợp lí. Ra mắt với số lượng đặc biệt giới hạn, phiên bản này phát hành với mục đích kỉ niệm, tôn vinh giá trị mà bộ truyện Doraemon đã mang lại suốt 50 năm qua.</p>', 900000, 950000, -1, 'SP1087_1.jpg', 1, 0, '2021-01-10 10:56:27', NULL),
(1088, 'SP1088', 'ANANAS TRACK 6 - LOW TOP - TRIPLE WHITE', 1, 5, 100, 3, '<p><span style=\"color: rgb(33, 37, 41); font-family: Quicksand, sans-serif;\">Với cảm hứng từ&nbsp;</span><span style=\"font-family: Quicksand, sans-serif; font-weight: bolder; color: rgb(33, 37, 41);\">Retro Sneakers&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: Quicksand, sans-serif;\">và âm nhạc giai đoạn 1970s,&nbsp;</span><span style=\"font-family: Quicksand, sans-serif; font-weight: bolder; color: rgb(33, 37, 41);\">Ananas Track 6&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-family: Quicksand, sans-serif;\">ra đời với danh hiệu là mẫu giày Cold Cement đầu tiên của Ananas - một thương hiệu giày Vulcanized. Chất liệu Storm Leather đáng giá \"càn quét\" toàn bộ bề mặt upper cùng những chi tiết thiết kế đặc trưng và mang nhiều ý nghĩa. Chắc rằng, Track 6 sẽ đem đến cho bạn sự tự nhiên thú vị như chính thông điệp bài hát Let it be của huyền thoại The Beatles gửi gắm. Màu all white chắc nhiều bạn sẽ thích.</span><br></p>', 800000, 990000, 500000, 'SP1088_1.jpg', 1, 0, '2021-01-10 13:01:26', NULL),
(1089, 'SP1089', 'ANANAS X LUCKY LUKE PATTAS - HIGH TOP - BLUE SUNSET', 1, 3, 100, 3, '<p><span style=\"font-size: 14.4px;\">Phiên bản gợi nhắc với hình ảnh Lucky Luke và chú ngựa Jolly Jumper đi về hướng mặt trời lặn, miệng nghêu ngao câu hát quen thuộc. Màn kết ấm áp đi vào lòng những tâm hồn mê truyện được tái hiện rõ nét trên kiểu dáng High Top quen thuộc, hứa hẹn sẽ là đôi giày để trưng hay lên chân đều đẹp.</span><br></p>', 700000, 85000, 0, 'SP1089_1.jpg', 1, 0, '2021-01-10 13:58:18', '2021-01-10 13:58:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `id_product`, `id_store`, `id_color`, `id_size`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'SP1005', 1, 1, 1, 7, '2018-11-02 19:26:38', '2018-11-27 13:42:01'),
(2, 'SP1005', 1, 1, 2, 6, '2018-11-02 19:26:39', '2018-11-27 13:42:01'),
(3, 'SP1005', 1, 1, 3, 9, '2018-11-02 19:26:39', '2018-11-27 13:42:01'),
(4, 'SP1005', 1, 1, 4, 6, '2018-11-02 19:26:39', '2018-11-27 13:42:01'),
(5, 'SP1005', 1, 1, 5, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(6, 'SP1005', 1, 2, 1, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(7, 'SP1005', 1, 2, 2, 2, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(8, 'SP1005', 1, 2, 3, 5, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(9, 'SP1005', 1, 2, 4, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(10, 'SP1005', 1, 2, 5, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(11, 'SP1005', 2, 1, 1, 0, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(12, 'SP1005', 2, 1, 2, 6, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(13, 'SP1005', 2, 1, 3, 8, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(14, 'SP1005', 2, 1, 4, 7, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(15, 'SP1005', 2, 1, 5, 0, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(16, 'SP1005', 2, 2, 1, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(17, 'SP1005', 2, 2, 2, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(18, 'SP1005', 2, 2, 3, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(19, 'SP1005', 2, 2, 4, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(20, 'SP1005', 2, 2, 5, 0, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(21, 'SP1007', 1, 1, 1, 128, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(22, 'SP1007', 1, 1, 2, 18, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(23, 'SP1007', 1, 1, 3, 10, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(24, 'SP1007', 1, 1, 4, 13, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(25, 'SP1007', 1, 1, 5, 0, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(26, 'SP1007', 1, 7, 1, 4, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(27, 'SP1007', 1, 7, 2, 9, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(28, 'SP1007', 1, 7, 3, 14, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(29, 'SP1007', 1, 7, 4, 5, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(30, 'SP1007', 1, 7, 5, 0, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(31, 'SP1007', 1, 2, 1, 4, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(32, 'SP1007', 1, 2, 2, 6, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(33, 'SP1007', 1, 2, 3, 13, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(34, 'SP1007', 1, 2, 4, 9, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(35, 'SP1007', 1, 2, 5, 0, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(36, 'SP1011', 1, 1, 1, 3, '2018-11-23 00:41:00', '2018-11-28 02:29:27'),
(37, 'SP1011', 1, 1, 2, -3, '2018-11-23 00:41:00', '2018-11-27 03:15:35'),
(38, 'SP1011', 1, 1, 3, 4, '2018-11-23 00:41:00', '2018-11-25 08:04:04'),
(39, 'SP1011', 1, 1, 4, 0, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(40, 'SP1011', 1, 1, 5, 6, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(41, 'SP1011', 1, 8, 1, 3, '2018-11-23 00:41:00', '2018-11-28 02:29:27'),
(42, 'SP1011', 1, 8, 2, -3, '2018-11-23 00:41:00', '2018-11-27 03:15:35'),
(43, 'SP1011', 1, 8, 3, 4, '2018-11-23 00:41:00', '2018-11-25 08:04:04'),
(44, 'SP1011', 1, 8, 4, 7, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(45, 'SP1011', 1, 8, 5, 5, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(46, 'SP1011', 1, 7, 1, 3, '2018-11-23 00:41:00', '2018-11-28 02:29:27'),
(47, 'SP1011', 1, 7, 2, -3, '2018-11-23 00:41:00', '2018-11-27 03:15:35'),
(48, 'SP1011', 1, 7, 3, 4, '2018-11-23 00:41:00', '2018-11-25 08:04:04'),
(49, 'SP1011', 1, 7, 4, 2, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(50, 'SP1011', 1, 7, 5, 0, '2018-11-23 00:41:01', '2018-11-23 00:41:01'),
(51, 'SP1012', 1, 2, 1, 5, '2018-11-23 00:41:29', '2018-11-23 00:41:29'),
(52, 'SP1012', 1, 2, 2, 4, '2018-11-23 00:41:30', '2018-11-25 12:07:39'),
(53, 'SP1012', 1, 2, 3, 4, '2018-11-23 00:41:30', '2018-11-23 02:13:02'),
(54, 'SP1012', 1, 2, 4, 5, '2018-11-23 00:41:30', '2018-11-23 00:41:30'),
(55, 'SP1012', 1, 2, 5, 2, '2018-11-23 00:41:30', '2018-11-23 00:41:30'),
(56, 'SP1013', 1, 2, 1, 6, '2018-11-23 00:42:10', '2018-11-23 00:42:10'),
(57, 'SP1013', 1, 2, 2, 3, '2018-11-23 00:42:10', '2018-11-23 02:13:02'),
(58, 'SP1013', 1, 2, 3, 2, '2018-11-23 00:42:10', '2018-11-25 12:07:39'),
(59, 'SP1013', 1, 2, 4, 3, '2018-11-23 00:42:10', '2018-11-23 00:42:10'),
(60, 'SP1013', 1, 2, 5, 7, '2018-11-23 00:42:10', '2018-11-23 00:42:10'),
(61, 'SP1013', 1, 1, 1, 8, '2018-11-23 00:42:11', '2018-11-23 00:42:11'),
(62, 'SP1013', 1, 1, 2, 3, '2018-11-23 00:42:11', '2018-11-23 02:13:02'),
(63, 'SP1013', 1, 1, 3, 2, '2018-11-23 00:42:11', '2018-11-25 12:07:39'),
(64, 'SP1013', 1, 1, 4, 8, '2018-11-23 00:42:11', '2018-11-23 00:42:11'),
(65, 'SP1013', 1, 1, 5, 4, '2018-11-23 00:42:11', '2018-11-23 00:42:11'),
(66, 'SP1010', 1, 1, 1, 2, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(67, 'SP1010', 1, 1, 2, 4, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(68, 'SP1010', 1, 1, 3, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(69, 'SP1010', 1, 1, 4, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(70, 'SP1010', 1, 1, 5, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(71, 'SP1024', 2, 1, 1, 4, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(72, 'SP1024', 2, 1, 2, 5, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(73, 'SP1024', 2, 1, 3, 8, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(74, 'SP1024', 2, 1, 4, 9, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(75, 'SP1024', 2, 1, 5, 0, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(76, 'SP1025', 1, 5, 1, 2, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(77, 'SP1025', 1, 5, 2, 2, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(78, 'SP1025', 1, 5, 3, 3, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(79, 'SP1025', 1, 5, 4, 3, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(80, 'SP1025', 1, 5, 5, 5, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(81, 'SP1023', 1, 18, 1, 0, '2018-11-27 13:46:38', '2019-04-06 13:33:10'),
(82, 'SP1023', 1, 18, 2, 2, '2018-11-27 13:46:38', '2018-11-27 13:46:38'),
(83, 'SP1023', 1, 18, 3, 4, '2018-11-27 13:46:38', '2018-11-27 13:46:38'),
(84, 'SP1023', 1, 18, 4, 5, '2018-11-27 13:46:38', '2018-11-27 13:46:38'),
(85, 'SP1023', 1, 18, 5, 8, '2018-11-27 13:46:39', '2018-11-27 13:46:39'),
(86, 'SP1021', 1, 3, 1, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(87, 'SP1021', 1, 3, 2, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(88, 'SP1021', 1, 3, 3, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(89, 'SP1021', 1, 3, 4, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(90, 'SP1021', 1, 3, 5, 0, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(91, 'SP1024', 1, 1, 1, 54, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(92, 'SP1024', 1, 1, 2, 3, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(93, 'SP1024', 1, 1, 3, 3, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(94, 'SP1024', 1, 1, 4, 0, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(95, 'SP1024', 1, 1, 5, 0, '2018-11-29 01:53:42', '2018-11-29 01:53:42'),
(96, 'SP1023', 2, 18, 1, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(97, 'SP1023', 2, 18, 2, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(98, 'SP1023', 2, 18, 3, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(99, 'SP1023', 2, 18, 4, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(100, 'SP1023', 2, 18, 5, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(101, 'SP1015', 1, 17, 1, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(102, 'SP1015', 1, 17, 2, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(103, 'SP1015', 1, 17, 3, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(104, 'SP1015', 1, 17, 4, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(105, 'SP1015', 1, 17, 5, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(106, 'SP1015', 1, 4, 1, 3, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(107, 'SP1015', 1, 4, 2, 3, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(108, 'SP1015', 1, 4, 3, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(109, 'SP1015', 1, 4, 4, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(110, 'SP1015', 1, 4, 5, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `image`, `created_at`, `updated_at`) VALUES
(50, 'SP1037', 'SP1037_1.jpg', '2021-01-08 17:29:18', NULL),
(51, 'SP1037', 'SP1037_2.jpg', '2021-01-08 17:29:18', NULL),
(52, 'SP1037', 'SP1037_3.jpg', '2021-01-08 17:29:18', NULL),
(53, 'SP1037', 'SP1037_4.jpg', '2021-01-08 17:29:18', NULL),
(54, 'SP1040', 'SP1040_1.jpg', '2021-01-09 07:13:45', NULL),
(55, 'SP1040', 'SP1040_2.jpg', '2021-01-09 07:13:45', NULL),
(56, 'SP1040', 'SP1040_3.jpg', '2021-01-09 07:13:45', NULL),
(57, 'SP1040', 'SP1040_4.jpg', '2021-01-09 07:13:45', NULL),
(58, 'SP1041', 'SP1041_1.jpg', '2021-01-09 07:17:45', NULL),
(59, 'SP1042', 'SP1042_1.jpg', '2021-01-09 08:53:34', NULL),
(60, 'SP1042', 'SP1042_2.jpg', '2021-01-09 08:53:34', NULL),
(61, 'SP1042', 'SP1042_3.jpg', '2021-01-09 08:53:34', NULL),
(62, 'SP1042', 'SP1042_4.jpg', '2021-01-09 08:53:34', NULL),
(63, 'SP1043', 'SP1043_1.jpg', '2021-01-09 09:02:12', NULL),
(64, 'SP1043', 'SP1043_2.jpg', '2021-01-09 09:02:12', NULL),
(65, 'SP1043', 'SP1043_3.jpg', '2021-01-09 09:02:12', NULL),
(66, 'SP1043', 'SP1043_4.jpg', '2021-01-09 09:02:12', NULL),
(67, 'SP1043', 'SP1043_1.jpg', '2021-01-09 09:11:30', NULL),
(68, 'SP1043', 'SP1043_2.jpg', '2021-01-09 09:11:30', NULL),
(69, 'SP1043', 'SP1043_3.jpg', '2021-01-09 09:11:30', NULL),
(70, 'SP1043', 'SP1043_4.jpg', '2021-01-09 09:11:30', NULL),
(71, 'SP1043', 'SP1043_1.jpg', '2021-01-09 09:33:05', NULL),
(72, 'SP1043', 'SP1043_2.jpg', '2021-01-09 09:33:05', NULL),
(73, 'SP1043', 'SP1043_3.jpg', '2021-01-09 09:33:05', NULL),
(74, 'SP1043', 'SP1043_4.jpg', '2021-01-09 09:33:05', NULL),
(75, 'SP1044', 'SP1044_1.jpg', '2021-01-09 09:41:16', NULL),
(76, 'SP1044', 'SP1044_2.jpg', '2021-01-09 09:41:16', NULL),
(77, 'SP1044', 'SP1044_3.jpg', '2021-01-09 09:41:16', NULL),
(78, 'SP1044', 'SP1044_4.jpg', '2021-01-09 09:41:16', NULL),
(79, 'SP1044', 'SP1044_1.jpg', '2021-01-09 09:46:04', NULL),
(80, 'SP1044', 'SP1044_2.jpg', '2021-01-09 09:46:04', NULL),
(81, 'SP1044', 'SP1044_3.jpg', '2021-01-09 09:46:04', NULL),
(82, 'SP1044', 'SP1044_4.jpg', '2021-01-09 09:46:04', NULL),
(83, 'SP1045', 'SP1045_1.jpg', '2021-01-09 10:04:25', NULL),
(84, 'SP1045', 'SP1045_2.jpg', '2021-01-09 10:04:25', NULL),
(85, 'SP1044', 'SP1044_1.jpg', '2021-01-09 10:07:08', NULL),
(86, 'SP1044', 'SP1044_2.jpg', '2021-01-09 10:07:08', NULL),
(87, 'SP1044', 'SP1044_3.jpg', '2021-01-09 10:07:08', NULL),
(88, 'SP1044', 'SP1044_4.jpg', '2021-01-09 10:07:08', NULL),
(89, 'SP1047', 'SP1047_1.jpg', '2021-01-09 10:09:28', NULL),
(90, 'SP1047', 'SP1047_2.jpg', '2021-01-09 10:09:28', NULL),
(91, 'SP1047', 'SP1047_3.jpg', '2021-01-09 10:09:28', NULL),
(92, 'SP1047', 'SP1047_4.jpg', '2021-01-09 10:09:28', NULL),
(93, 'SP1048', 'SP1048_1.jpg', '2021-01-09 10:11:02', NULL),
(94, 'SP1048', 'SP1048_2.jpg', '2021-01-09 10:11:02', NULL),
(95, 'SP1048', 'SP1048_3.jpg', '2021-01-09 10:11:02', NULL),
(96, 'SP1048', 'SP1048_4.jpg', '2021-01-09 10:11:02', NULL),
(97, 'SP1048', 'SP1048_1.jpg', '2021-01-09 10:12:34', NULL),
(98, 'SP1048', 'SP1048_2.jpg', '2021-01-09 10:12:34', NULL),
(99, 'SP1048', 'SP1048_3.jpg', '2021-01-09 10:12:34', NULL),
(100, 'SP1048', 'SP1048_4.jpg', '2021-01-09 10:12:34', NULL),
(101, 'SP1049', 'SP1049_1.jpg', '2021-01-09 10:14:44', NULL),
(102, 'SP1049', 'SP1049_2.jpg', '2021-01-09 10:14:44', NULL),
(103, 'SP1049', 'SP1049_3.jpg', '2021-01-09 10:14:44', NULL),
(104, 'SP1049', 'SP1049_4.jpg', '2021-01-09 10:14:44', NULL),
(105, 'SP1050', 'SP1050_1.jpg', '2021-01-09 10:16:16', NULL),
(106, 'SP1050', 'SP1050_2.jpg', '2021-01-09 10:16:16', NULL),
(107, 'SP1050', 'SP1050_3.jpg', '2021-01-09 10:16:16', NULL),
(108, 'SP1050', 'SP1050_4.jpg', '2021-01-09 10:16:16', NULL),
(109, 'SP1051', 'SP1051_1.jpg', '2021-01-09 10:17:41', NULL),
(110, 'SP1051', 'SP1051_2.jpg', '2021-01-09 10:17:41', NULL),
(111, 'SP1051', 'SP1051_3.jpg', '2021-01-09 10:17:41', NULL),
(112, 'SP1051', 'SP1051_4.jpg', '2021-01-09 10:17:41', NULL),
(113, 'SP1052', 'SP1052_1.jpg', '2021-01-09 10:19:16', NULL),
(114, 'SP1052', 'SP1052_2.jpg', '2021-01-09 10:19:16', NULL),
(115, 'SP1052', 'SP1052_3.jpg', '2021-01-09 10:19:16', NULL),
(116, 'SP1052', 'SP1052_4.jpg', '2021-01-09 10:19:16', NULL),
(117, 'SP1053', 'SP1053_1.jpg', '2021-01-09 10:20:54', NULL),
(118, 'SP1053', 'SP1053_2.jpg', '2021-01-09 10:20:54', NULL),
(119, 'SP1053', 'SP1053_3.jpg', '2021-01-09 10:20:54', NULL),
(120, 'SP1053', 'SP1053_4.jpg', '2021-01-09 10:20:54', NULL),
(121, 'SP1054', 'SP1054_1.jpg', '2021-01-09 10:22:11', NULL),
(122, 'SP1054', 'SP1054_2.jpg', '2021-01-09 10:22:11', NULL),
(123, 'SP1054', 'SP1054_3.jpg', '2021-01-09 10:22:11', NULL),
(124, 'SP1054', 'SP1054_4.jpg', '2021-01-09 10:22:11', NULL),
(125, 'SP1055', 'SP1055_1.jpg', '2021-01-09 10:23:27', NULL),
(126, 'SP1055', 'SP1055_2.jpg', '2021-01-09 10:23:27', NULL),
(127, 'SP1055', 'SP1055_3.jpg', '2021-01-09 10:23:27', NULL),
(128, 'SP1055', 'SP1055_4.jpg', '2021-01-09 10:23:27', NULL),
(129, 'SP1056', 'SP1056_1.jpg', '2021-01-09 10:24:34', NULL),
(130, 'SP1056', 'SP1056_2.jpg', '2021-01-09 10:24:34', NULL),
(131, 'SP1056', 'SP1056_3.jpg', '2021-01-09 10:24:34', NULL),
(132, 'SP1056', 'SP1056_4.jpg', '2021-01-09 10:24:34', NULL),
(133, 'SP1057', 'SP1057_1.jpg', '2021-01-09 10:26:05', NULL),
(134, 'SP1057', 'SP1057_2.jpg', '2021-01-09 10:26:05', NULL),
(135, 'SP1057', 'SP1057_3.jpg', '2021-01-09 10:26:05', NULL),
(136, 'SP1057', 'SP1057_4.jpg', '2021-01-09 10:26:05', NULL),
(137, 'SP1058', 'SP1058_1.jpg', '2021-01-09 14:40:30', NULL),
(138, 'SP1058', 'SP1058_2.jpg', '2021-01-09 14:40:30', NULL),
(139, 'SP1058', 'SP1058_3.jpg', '2021-01-09 14:40:30', NULL),
(140, 'SP1058', 'SP1058_4.jpg', '2021-01-09 14:40:30', NULL),
(141, 'SP1059', 'SP1059_1.jpg', '2021-01-09 14:41:51', NULL),
(142, 'SP1059', 'SP1059_2.jpg', '2021-01-09 14:41:51', NULL),
(143, 'SP1059', 'SP1059_3.jpg', '2021-01-09 14:41:51', NULL),
(144, 'SP1059', 'SP1059_4.jpg', '2021-01-09 14:41:51', NULL),
(145, 'SP1060', 'SP1060_1.jpg', '2021-01-09 14:43:14', NULL),
(146, 'SP1060', 'SP1060_2.jpg', '2021-01-09 14:43:14', NULL),
(147, 'SP1060', 'SP1060_3.jpg', '2021-01-09 14:43:14', NULL),
(148, 'SP1060', 'SP1060_4.jpg', '2021-01-09 14:43:15', NULL),
(149, 'SP1061', 'SP1061_1.jpg', '2021-01-09 14:44:41', NULL),
(150, 'SP1061', 'SP1061_2.jpg', '2021-01-09 14:44:41', NULL),
(151, 'SP1061', 'SP1061_3.jpg', '2021-01-09 14:44:41', NULL),
(152, 'SP1061', 'SP1061_4.jpg', '2021-01-09 14:44:41', NULL),
(153, 'SP1062', 'SP1062_1.jpg', '2021-01-09 14:45:38', NULL),
(154, 'SP1062', 'SP1062_2.jpg', '2021-01-09 14:45:38', NULL),
(155, 'SP1062', 'SP1062_3.jpg', '2021-01-09 14:45:38', NULL),
(156, 'SP1062', 'SP1062_4.jpg', '2021-01-09 14:45:38', NULL),
(157, 'SP1063', 'SP1063_1.jpg', '2021-01-09 14:46:50', NULL),
(158, 'SP1063', 'SP1063_2.jpg', '2021-01-09 14:46:50', NULL),
(159, 'SP1063', 'SP1063_3.jpg', '2021-01-09 14:46:50', NULL),
(160, 'SP1063', 'SP1063_4.jpg', '2021-01-09 14:46:50', NULL),
(161, 'SP1064', 'SP1064_1.jpg', '2021-01-09 14:48:44', NULL),
(162, 'SP1064', 'SP1064_2.jpg', '2021-01-09 14:48:44', NULL),
(163, 'SP1064', 'SP1064_3.jpg', '2021-01-09 14:48:44', NULL),
(164, 'SP1064', 'SP1064_4.jpg', '2021-01-09 14:48:44', NULL),
(165, 'SP1065', 'SP1065_1.jpg', '2021-01-09 14:51:17', NULL),
(166, 'SP1065', 'SP1065_2.jpg', '2021-01-09 14:51:17', NULL),
(167, 'SP1065', 'SP1065_3.jpg', '2021-01-09 14:51:17', NULL),
(168, 'SP1065', 'SP1065_4.jpg', '2021-01-09 14:51:17', NULL),
(169, 'SP1065', 'SP1065_1.jpg', '2021-01-09 14:52:36', NULL),
(170, 'SP1065', 'SP1065_2.jpg', '2021-01-09 14:52:36', NULL),
(171, 'SP1065', 'SP1065_3.jpg', '2021-01-09 14:52:36', NULL),
(172, 'SP1065', 'SP1065_4.jpg', '2021-01-09 14:52:36', NULL),
(173, 'SP1065', 'SP1065_1.jpg', '2021-01-09 14:54:18', NULL),
(174, 'SP1065', 'SP1065_2.jpg', '2021-01-09 14:54:18', NULL),
(175, 'SP1065', 'SP1065_3.jpg', '2021-01-09 14:54:18', NULL),
(176, 'SP1065', 'SP1065_4.jpg', '2021-01-09 14:54:18', NULL),
(177, 'SP1065', 'SP1065_1.jpg', '2021-01-09 14:57:15', NULL),
(178, 'SP1065', 'SP1065_2.jpg', '2021-01-09 14:57:15', NULL),
(179, 'SP1065', 'SP1065_3.jpg', '2021-01-09 14:57:15', NULL),
(180, 'SP1065', 'SP1065_4.jpg', '2021-01-09 14:57:15', NULL),
(181, 'SP1066', 'SP1066_1.jpg', '2021-01-09 15:00:50', NULL),
(182, 'SP1066', 'SP1066_2.jpg', '2021-01-09 15:00:50', NULL),
(183, 'SP1066', 'SP1066_3.jpg', '2021-01-09 15:00:50', NULL),
(184, 'SP1066', 'SP1066_4.jpg', '2021-01-09 15:00:50', NULL),
(185, 'SP1067', 'SP1067_1.jpg', '2021-01-09 15:02:48', NULL),
(186, 'SP1067', 'SP1067_2.jpg', '2021-01-09 15:02:48', NULL),
(187, 'SP1067', 'SP1067_3.jpg', '2021-01-09 15:02:48', NULL),
(188, 'SP1067', 'SP1067_4.jpg', '2021-01-09 15:02:48', NULL),
(189, 'SP1068', 'SP1068_1.jpg', '2021-01-09 15:05:11', NULL),
(190, 'SP1068', 'SP1068_2.jpg', '2021-01-09 15:05:11', NULL),
(191, 'SP1068', 'SP1068_3.jpg', '2021-01-09 15:05:11', NULL),
(192, 'SP1068', 'SP1068_4.jpg', '2021-01-09 15:05:11', NULL),
(193, 'SP1069', 'SP1069_1.jpg', '2021-01-09 15:07:17', NULL),
(194, 'SP1069', 'SP1069_2.jpg', '2021-01-09 15:07:17', NULL),
(195, 'SP1069', 'SP1069_3.jpg', '2021-01-09 15:07:17', NULL),
(196, 'SP1069', 'SP1069_4.jpg', '2021-01-09 15:07:17', NULL),
(197, 'SP1070', 'SP1070_1.jpg', '2021-01-09 15:09:36', NULL),
(198, 'SP1070', 'SP1070_2.jpg', '2021-01-09 15:09:36', NULL),
(199, 'SP1070', 'SP1070_3.jpg', '2021-01-09 15:09:36', NULL),
(200, 'SP1070', 'SP1070_4.jpg', '2021-01-09 15:09:36', NULL),
(201, 'SP1071', 'SP1071_1.jpg', '2021-01-09 15:13:02', NULL),
(202, 'SP1071', 'SP1071_2.jpg', '2021-01-09 15:13:02', NULL),
(203, 'SP1071', 'SP1071_3.jpg', '2021-01-09 15:13:02', NULL),
(204, 'SP1071', 'SP1071_4.jpg', '2021-01-09 15:13:02', NULL),
(205, 'SP1072', 'SP1072_1.jpg', '2021-01-09 15:14:39', NULL),
(206, 'SP1072', 'SP1072_2.jpg', '2021-01-09 15:14:39', NULL),
(207, 'SP1072', 'SP1072_3.jpg', '2021-01-09 15:14:39', NULL),
(208, 'SP1072', 'SP1072_4.jpg', '2021-01-09 15:14:39', NULL),
(209, 'SP1073', 'SP1073_1.jpg', '2021-01-09 15:21:04', NULL),
(210, 'SP1073', 'SP1073_2.jpg', '2021-01-09 15:21:04', NULL),
(211, 'SP1073', 'SP1073_3.jpg', '2021-01-09 15:21:04', NULL),
(212, 'SP1073', 'SP1073_4.jpg', '2021-01-09 15:21:04', NULL),
(213, 'SP1074', 'SP1074_1.jpg', '2021-01-09 15:22:19', NULL),
(214, 'SP1074', 'SP1074_2.jpg', '2021-01-09 15:22:19', NULL),
(215, 'SP1074', 'SP1074_3.jpg', '2021-01-09 15:22:19', NULL),
(216, 'SP1074', 'SP1074_4.jpg', '2021-01-09 15:22:19', NULL),
(217, 'SP1075', 'SP1075_1.jpg', '2021-01-09 15:24:07', NULL),
(218, 'SP1075', 'SP1075_2.jpg', '2021-01-09 15:24:07', NULL),
(219, 'SP1075', 'SP1075_3.jpg', '2021-01-09 15:24:07', NULL),
(220, 'SP1075', 'SP1075_4.jpg', '2021-01-09 15:24:07', NULL),
(221, 'SP1076', 'SP1076_1.jpg', '2021-01-09 15:25:13', NULL),
(222, 'SP1076', 'SP1076_2.jpg', '2021-01-09 15:25:13', NULL),
(223, 'SP1076', 'SP1076_3.jpg', '2021-01-09 15:25:13', NULL),
(224, 'SP1076', 'SP1076_4.jpg', '2021-01-09 15:25:13', NULL),
(225, 'SP1077', 'SP1077_1.jpg', '2021-01-09 15:27:13', NULL),
(226, 'SP1077', 'SP1077_2.jpg', '2021-01-09 15:27:13', NULL),
(227, 'SP1077', 'SP1077_3.jpg', '2021-01-09 15:27:13', NULL),
(228, 'SP1077', 'SP1077_4.jpg', '2021-01-09 15:27:13', NULL),
(229, 'SP1078', 'SP1078_1.jpg', '2021-01-09 15:29:28', NULL),
(230, 'SP1078', 'SP1078_2.jpg', '2021-01-09 15:29:28', NULL),
(231, 'SP1078', 'SP1078_3.jpg', '2021-01-09 15:29:28', NULL),
(232, 'SP1078', 'SP1078_4.jpg', '2021-01-09 15:29:28', NULL),
(233, 'SP1079', 'SP1079_1.jpg', '2021-01-09 15:31:51', NULL),
(234, 'SP1079', 'SP1079_2.jpg', '2021-01-09 15:31:51', NULL),
(235, 'SP1079', 'SP1079_3.jpg', '2021-01-09 15:31:51', NULL),
(236, 'SP1079', 'SP1079_4.jpg', '2021-01-09 15:31:51', NULL),
(237, 'SP1080', 'SP1080_1.jpg', '2021-01-09 15:33:08', NULL),
(238, 'SP1080', 'SP1080_2.jpg', '2021-01-09 15:33:08', NULL),
(239, 'SP1080', 'SP1080_3.jpg', '2021-01-09 15:33:08', NULL),
(240, 'SP1080', 'SP1080_4.jpg', '2021-01-09 15:33:08', NULL),
(241, 'SP1081', 'SP1081_1.jpg', '2021-01-09 15:40:26', NULL),
(242, 'SP1081', 'SP1081_2.jpg', '2021-01-09 15:40:26', NULL),
(243, 'SP1081', 'SP1081_3.jpg', '2021-01-09 15:40:26', NULL),
(244, 'SP1081', 'SP1081_4.jpg', '2021-01-09 15:40:26', NULL),
(245, 'SP1082', 'SP1082_1.jpg', '2021-01-09 15:45:12', NULL),
(246, 'SP1082', 'SP1082_2.jpg', '2021-01-09 15:45:12', NULL),
(247, 'SP1082', 'SP1082_3.jpg', '2021-01-09 15:45:12', NULL),
(248, 'SP1082', 'SP1082_4.jpg', '2021-01-09 15:45:12', NULL),
(249, 'SP1083', 'SP1083_1.jpg', '2021-01-09 15:47:00', NULL),
(250, 'SP1083', 'SP1083_2.jpg', '2021-01-09 15:47:00', NULL),
(251, 'SP1083', 'SP1083_3.jpg', '2021-01-09 15:47:00', NULL),
(252, 'SP1083', 'SP1083_4.jpg', '2021-01-09 15:47:00', NULL),
(253, 'SP1084', 'SP1084_1.jpg', '2021-01-09 15:48:39', NULL),
(254, 'SP1084', 'SP1084_2.jpg', '2021-01-09 15:48:39', NULL),
(255, 'SP1084', 'SP1084_3.jpg', '2021-01-09 15:48:39', NULL),
(256, 'SP1084', 'SP1084_4.jpg', '2021-01-09 15:48:39', NULL),
(257, 'SP1085', 'SP1085_1.jpg', '2021-01-09 15:50:48', NULL),
(258, 'SP1085', 'SP1085_2.jpg', '2021-01-09 15:50:48', NULL),
(259, 'SP1085', 'SP1085_3.jpg', '2021-01-09 15:50:48', NULL),
(260, 'SP1085', 'SP1085_4.jpg', '2021-01-09 15:50:48', NULL),
(261, 'SP1086', 'SP1086_1.jpg', '2021-01-09 15:52:19', NULL),
(262, 'SP1086', 'SP1086_2.jpg', '2021-01-09 15:52:19', NULL),
(263, 'SP1086', 'SP1086_3.jpg', '2021-01-09 15:52:19', NULL),
(264, 'SP1086', 'SP1086_4.jpg', '2021-01-09 15:52:19', NULL),
(265, 'SP1087', 'SP1087_1.jpg', '2021-01-10 10:56:28', NULL),
(266, 'SP1087', 'SP1087_2.jpg', '2021-01-10 10:56:28', NULL),
(267, 'SP1087', 'SP1087_3.jpg', '2021-01-10 10:56:28', NULL),
(268, 'SP1087', 'SP1087_4.jpg', '2021-01-10 10:56:28', NULL),
(269, 'SP1087', 'SP1087_5.jpg', '2021-01-10 10:56:28', NULL),
(270, 'SP1087', 'SP1087_6.jpg', '2021-01-10 10:56:28', NULL),
(271, 'SP1088', 'SP1088_1.jpg', '2021-01-10 13:01:27', NULL),
(272, 'SP1088', 'SP1088_2.jpg', '2021-01-10 13:01:27', NULL),
(273, 'SP1088', 'SP1088_4.jpg', '2021-01-10 13:01:27', NULL),
(274, 'SP1088', 'SP1088_5.jpg', '2021-01-10 13:01:27', NULL),
(275, 'SP1088', 'SP1088_6.jpg', '2021-01-10 13:01:27', NULL),
(276, 'SP1089', 'SP1089_1.jpg', '2021-01-10 13:58:18', NULL),
(277, 'SP1089', 'SP1089_2.jpg', '2021-01-10 13:58:18', NULL),
(278, 'SP1089', 'SP1089_3.jpg', '2021-01-10 13:58:18', NULL),
(279, 'SP1089', 'SP1089_4.jpg', '2021-01-10 13:58:18', NULL),
(317, 'SP1090', 'SP1090_1.jpg', '2021-01-21 05:28:55', NULL),
(318, 'SP1090', 'SP1090_2.jpg', '2021-01-21 05:28:55', NULL),
(319, 'SP1090', 'SP1090_3.jpg', '2021-01-21 05:28:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_store`
--

CREATE TABLE `product_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_store` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `number_tranf` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `number_error` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_store`
--

INSERT INTO `product_store` (`id`, `id_product`, `id_store`, `number`, `number_tranf`, `status`, `number_error`, `created_at`, `updated_at`) VALUES
(1, 'SP1001', 1, 50, 0, 0, 0, NULL, NULL),
(2, 'SP1002', 1, 30, 0, 0, 0, NULL, NULL),
(3, 'SP1003', 1, 30, 0, 0, 0, NULL, NULL),
(4, 'SP1004', 1, 55, 0, 0, 0, NULL, NULL),
(5, 'SP1001', 2, 20, 0, 0, 0, NULL, NULL),
(6, 'SP1002', 2, 50, 0, 0, 0, NULL, NULL),
(7, 'SP1003', 2, 30, 0, 0, 0, NULL, NULL),
(8, 'SP1004', 2, 45, 0, 0, 0, NULL, NULL),
(9, 'SP1005', 1, 35, 0, 0, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(10, 'SP1005', 2, 57, 0, 0, 0, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(11, 'SP1007', 1, 233, 0, 0, 0, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(12, 'SP1011', 1, 61, 9, 0, 0, '2018-11-23 00:41:01', '2018-12-05 03:12:47'),
(13, 'SP1012', 1, 20, 0, 0, 0, '2018-11-23 00:41:30', '2018-11-25 12:07:40'),
(14, 'SP1013', 1, 57, 0, 0, 0, '2018-11-23 00:42:11', '2018-11-25 12:07:39'),
(15, 'SP1010', 1, 6, 0, 0, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(16, 'SP1024', 2, 26, 0, 0, 0, '2018-11-27 13:43:15', '2018-11-27 13:43:15'),
(17, 'SP1025', 1, 15, 0, 0, 0, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(18, 'SP1023', 1, 19, 0, 0, 0, '2018-11-27 13:46:39', '2019-04-06 13:33:10'),
(19, 'SP1021', 1, 16, 0, 0, 0, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(20, 'SP1024', 1, 60, 0, 0, 0, '2018-11-29 01:53:42', '2018-11-29 01:53:42'),
(21, 'SP1023', 2, 25, 0, 0, 0, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(22, 'SP1015', 1, 22, 0, 0, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_order`
--

CREATE TABLE `status_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status_order`
--

INSERT INTO `status_order` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mới', NULL, NULL),
(2, 'Đang đóng gói', NULL, NULL),
(3, 'Đang chuyển hàng', NULL, NULL),
(4, 'Đã giao hàng', NULL, NULL),
(5, 'Giao hàng thất bại', NULL, NULL),
(6, 'Khách hủy', NULL, NULL),
(7, 'Hệ thống hủy', NULL, NULL),
(8, 'Trả hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Giày', '2020-12-29 14:33:41', '2020-12-29 14:33:41'),
(2, 'Áo', NULL, NULL),
(4, 'Phụ kiện', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `full_name`, `phone_number`, `address`, `create_at`, `activation`) VALUES
(1, 'admin', '$2y$10$GBozE2c.k9tRdsm/6A3Bz.hOgyZenayrLQgnCpcRRzLm9Oz6tWdd6', 'abcxyz123@gmail.com', '', '', '', '2020-12-14 08:41:16', ''),
(17, 'q', '$2y$10$7Oqui0DM1mStHA8mgUEsdu61cszF6co0i/7kk4SHO5kCgcChHZE5u', 'abcxyz@gmail.com', 'Nguyễn Minh Hiếu', '0123456789', '', '2021-01-12 02:44:27', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `my_product`
--
ALTER TABLE `my_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
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
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1069;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `my_product`
--
ALTER TABLE `my_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1094;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT cho bảng `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 12:03 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(10) DEFAULT NULL,
  `shipper_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `bill_status`
--

CREATE TABLE `bill_status` (
  `id` int(10) NOT NULL,
  `bill_status_name` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `case_material`
--

CREATE TABLE `case_material` (
  `id` int(10) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `image_status`
--

CREATE TABLE `image_status` (
  `id` int(10) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `type_gender` tinyint(2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `post` longtext COLLATE utf8_unicode_ci,
  `case_material_id` int(10) DEFAULT NULL,
  `strap_id` int(10) DEFAULT NULL,
  `product_status_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type_id`, `type_gender`, `description`, `unit_price`, `promotion_price`, `image`, `new`, `post`, `case_material_id`, `strap_id`, `product_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Richard Mille RM 51-01 Tourbillon Tiger and	Dragon', 1, 0, 'Đồng hồ chính hãng', 900000, 850000, 'Richard Mille RM 51-01.jpg', 1, NULL, NULL, 1, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'Patek Philippe Grand Complications 6002G-001', 2, 0, '', 3000000, 2500000, 'Patek Philippe 6002G-001.jpg', 1, NULL, NULL, 1, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Hublot Big Bang King Power Gold Ceramic 48mm', 5, 0, '', 90000, 87000, 'Hublot Big Bang King.jpg', 1, NULL, NULL, 1, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(4, 'Rolex Cosmograph Daytona Rainbow 116595RBOW', 4, 0, '', 300000, 260000, 'Rolex Cosmograph Daytona 116500LN.jpg', 1, NULL, NULL, 1, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(5, 'Franck Muller Long Island 1002', 3, 0, '', 30000, 0, 'Franck Muller Long Island 1002.jpg', 1, NULL, NULL, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(6, 'Rolex Cosmograph Daytona 116500LN', 4, 0, '', 31000, 0, 'Rolex Cosmograph Daytona 116500LN.jpg', 1, NULL, NULL, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(7, 'Richard Mille RM 11-02 Flyback Chronograph Dual Time', 1, 0, '', 200000, 195000, 'Richard Mille Flyback Chronograph Dual Time Zone.jpg', 1, NULL, NULL, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(8, 'Patek Philippe Grand Complications 5074P-001', 2, 0, '', 645000, 0, 'Patek Philippe Grand Complications 5074P-001.jpg', 1, NULL, NULL, 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(17, 'Richard Mille RM 030 Automatic With Declutchable Rotor', 1, 0, NULL, 180000, 150000, 'Richard Mille RM 030 Automatic With Declutchable Rotor.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Richard Mille RM 004 Split Seconds Chronograph', 1, 0, NULL, 200000, 195000, 'Richard Mille RM 004 Split Seconds Chronograph.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Richard Mille RM 029 Automatic With Oversize Date', 1, 0, NULL, 130000, 128000, 'Richard Mille RM 029 Automatic With Oversize Date.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Richard Mille Rafael Nadal Shock Resistance 10,000g\'s RM 27-03', 1, 0, NULL, 785000, 782000, 'Richard Mille Rafael Nadal Shock Resistance 10,000g\'s RM 27-03.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Richard Mille Automatic Flyback Chronograph RM 11-03 McLaren', 1, 0, NULL, 384000, 382000, 'Richard Mille Automatic Flyback Chronograph RM 11-03 McLaren.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Richard Mille Automatic Flyback Chronograph RM 11-03 Jean Todt', 1, 0, NULL, 340000, 325000, 'Richard Mille Automatic Flyback Chronograph RM 11-03 Jean Todt.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Richard Mille Flyback Chronograph Dual Time Zone RM 11-02 Carbon', 1, 0, NULL, 226000, 0, 'Richard Mille Flyback Chronograph Dual Time Zone RM 11-02 Carbon.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Patek Philippe Grand Complications 5102G-001', 2, 0, NULL, 194000, 0, 'Patek Philippe Grand Complications 5102G-001.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Patek Philippe Complications 7130R-011', 2, 0, NULL, 85000, 82500, 'Patek Philippe Complications 7130R-011.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Patek Philippe Complications 5975R-001', 2, 0, NULL, 98000, 96400, 'Patek Philippe Complications 5975R-001.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Patek Philippe Grand Complications 5496P-015', 2, 0, NULL, 87800, 0, 'Patek Philippe Grand Complications 5496P-015.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Patek Philippe Grand Complications 6104R-001', 2, 0, NULL, 380000, 362000, 'Patek Philippe Grand Complications 6104R-001.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Patek Philippe Grand Complications 6102P-001', 2, 0, NULL, 290000, 288000, 'Patek Philippe Grand Complications 6102P-001.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Patek Philippe Grand Complications 5159R-001', 2, 0, NULL, 88000, 84000, 'Patek Philippe Grand Complications 5159R-001.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Franck Muller Vanguard Yachting V 45 SC DT TT BR NR', 3, 0, NULL, 6500, 6200, 'Franck Muller Long Island 1002.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Franck Muller Master Calendar 6850', 3, 0, NULL, 35000, 32700, 'Franck Muller Long Island 1002.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Franck Muller Master Banker 6850 Mb', 3, 0, NULL, 6800, 6650, 'Franck Muller Long Island 1002.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Rolex Day-Date 118348 Mặt Số Xanh Lá Nạm Kim Cương', 4, 0, NULL, 55000, 52000, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Rolex Cosmograph Daytona 116576TBR Mặt Số Khảm Kim Cương', 4, 0, NULL, 145000, 142000, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Rolex Yacht-Master 268655 Mặt Số Đính Kim Cương', 4, 0, NULL, 38000, 36300, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Rolex Day-Date 228345RBR Mặt Số Chocolate Cọc Kim Cương', 4, 0, NULL, 49000, 47500, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Rolex Submariner Date 116618LB', 4, 0, NULL, 31000, 29000, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Rolex Yacht-Master 116695 Mặt Số Khảm Kim Cương', 4, 0, NULL, 110000, 108000, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Hublot Big Bang Gold Blue Diamonds 41mm', 5, 0, NULL, 55000, 52000, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Rolex Yacht-Master II 116688', 4, 0, NULL, 38000, 37500, 'Rolex Cosmograph Daytona 116500LN.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Hublot Big Bang Sang Bleu Titanium Pave 45mm', 5, 0, NULL, 38000, 34500, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Hublot Big Bang Gold Ceramic 44mm', 5, 0, NULL, 25000, 24000, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Hublot Big Bang Unico Perpetual Calendar Sapphire 45mm', 5, 0, NULL, 98000, 97000, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Hublot Classic Fusion Tourbillon Titanium Opalin 45mm', 5, 0, NULL, 31000, 28000, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Hublot Big Bang Unico Black Magic 45mm', 5, 0, NULL, 19900, 15000, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Hublot Big Bang Steel White Chronograph 41mm', 5, 0, NULL, 12500, 11000, 'Hublot Big Bang King.jpg', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Rolex Lady-Datejust 179138 Mặt Số Vỏ Trai Trắng Nạm Kim Cương', 7, 1, NULL, 35000, 27000, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Rolex Lady-Datejust 279381RBR Mặt Số Chocolate Nạm Kim Cương Dây Đeo Oyster', 7, 1, NULL, 18000, 15130, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Rolex Lady-Datejust 178271 Mặt Số Vi Tính Hồng', 7, 1, NULL, 12000, 11500, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Rolex Pearlmaster 81315 Mặt Số Vỏ Trai Trắng Nạm Kim Cương', 7, 1, NULL, 30000, 26130, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `name_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE `product_status` (
  `id` int(10) NOT NULL,
  `product_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name_id`, `type`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'richard-mille', 0, 'Richard Mille', '', 'richard-mille.jpg', NULL, NULL),
(2, 'patek-philippe', 0, 'Patek Philippe', '', 'patek-philippe.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'franck-muller', 0, 'Franck Muller', '', 'franck-muller.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'rolex', 0, 'Rolex', '', 'rolex-men.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'hublot', 0, 'Hublot', '', 'hublot-men.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'tissot', 0, 'Tissot', '', 'tissot-men.jpg', '2016-10-25 17:19:00', NULL),
(7, 'rolex', 1, 'Rolex', '', '', NULL, NULL),
(8, 'longines', 1, 'Longines', '', '', NULL, NULL),
(9, 'omega', 1, 'Omega', '', '', NULL, NULL),
(10, 'tissot', 1, 'Tissot', '', '', NULL, NULL),
(11, 'tag-heuer', 1, 'TAG Heuer', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name_id`, `name`, `description`, `link`, `image`) VALUES
(1, 'richard-mille', 'Richard Mille', 'Đỉnh cao của sự xa xỉ', '', '1.jpg'),
(2, 'hublot', 'Hublot', 'Đỉnh cao của sự xa xỉ', '', '2.jpg'),
(3, 'rolex', 'Rolex', 'Đỉnh cao của sự xa xỉ', '', '3.jpg'),
(4, 'patek-philippe', 'Patek Philippe', 'Đỉnh cao của sự xa xỉ', '', '4.jpg'),
(5, 'tissot', 'Tissot', 'Tuyệt tác của đồng hồ thụy sĩ', '', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `strap_types`
--

CREATE TABLE `strap_types` (
  `id` int(10) NOT NULL,
  `strap_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strap_types`
--

INSERT INTO `strap_types` (`id`, `strap_name`) VALUES
(1, 'Dây kim loại'),
(2, 'Dây da');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `tag_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `phone_number`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Nguyễn Hồng Chương', 'chuongnhd00645@fpt.edu.vn', '$2y$10$alZJgvsLxjPsIQ5eUTSa2O00E9LVWSR.txEpPSxtRyyxXCCBcMNn.', '0988211231', NULL, '3U39A4FxiWIFii5YlxB7GBs23ot1ohOfrsJkN2Cfkds8I5rhXfowessBNo3p', '2018-11-03 17:33:19', '2018-11-03 17:33:19'),
(3, 'chuongnguyen', 'Chương', 'nguyenhong@gmail.com', '$2y$10$NNPny0KXICEX9rAfRTHwPu1EWGL9LHKspumvj7/eCIFkfxZWHTNIO', '0988211231', NULL, NULL, '2018-11-04 15:30:35', '2018-11-04 15:30:35'),
(4, 'admin1', 'fgsjglkdfj', 'fdsfdsfdsfs@gmail.com', '$2y$10$o65uXjT2V8MiI5F07eeC3uVLu5gI0ivDnRiIdrBHr8hvAlXqMr1We', '0934291994', NULL, 'sur7pSOzn4SkDXbAqMTfqKk66hVHuXf5IveH4brKzVun8QSxrqAep76Y047S', '2018-11-04 15:53:17', '2018-11-04 15:53:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`customer_id`),
  ADD KEY `FK_bill_status` (`status_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`product_id`);

--
-- Indexes for table `bill_status`
--
ALTER TABLE `bill_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_material`
--
ALTER TABLE `case_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_status`
--
ALTER TABLE `image_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`type_id`),
  ADD KEY `FK_strap_products` (`strap_id`),
  ADD KEY `FK_status_products` (`product_status_id`),
  ADD KEY `FK_material_products` (`case_material_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_id` (`name_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_id` (`name_id`);

--
-- Indexes for table `strap_types`
--
ALTER TABLE `strap_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bill_status`
--
ALTER TABLE `bill_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_material`
--
ALTER TABLE `case_material`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `image_status`
--
ALTER TABLE `image_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `strap_types`
--
ALTER TABLE `strap_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_material_products` FOREIGN KEY (`case_material_id`) REFERENCES `case_material` (`id`),
  ADD CONSTRAINT `FK_status_products` FOREIGN KEY (`product_status_id`) REFERENCES `product_status` (`id`),
  ADD CONSTRAINT `FK_strap_products` FOREIGN KEY (`strap_id`) REFERENCES `strap_types` (`id`),
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`type_id`) REFERENCES `product_types` (`id`);

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `FK_product_slide` FOREIGN KEY (`name_id`) REFERENCES `product_types` (`name_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

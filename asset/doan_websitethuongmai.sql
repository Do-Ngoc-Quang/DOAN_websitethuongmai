-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 09:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan_websitethuongmai`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `detail` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auther` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `detail`, `img`, `auther`, `category_id`, `created_at`) VALUES
(1, 'Cơn sốt iPhone 15 test', 'Có vẻ như test', 'chi tiết test chi tiết test chi tiết test chi tiết test chi tiết test chi tiết test chi tiết test chi tiết testchi tiết test', '1702185333_687a2940643341935705.jpg', 'demo4', 2, '2023-12-09'),
(4, 'Vẻ đẹp của tri thức', 'Sự học sẽ giúp bạn phát triển bản thân', 'Ngày nay, để học môt thứ gì đó rất đơn giản, nó ở ngay trên internet, trình độ tiếng anh hiện tại của tôi là A2', '1702224770_6309e09f0330908da98e.jpg', 'demo4', 24, '2023-12-10'),
(6, 'Test', 'test', 'test', '1702226202_53d24764805e2205d5d3.jpg', 'dongocquang', 28, '2023-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(2, 'iPhone'),
(24, 'iPad'),
(27, 'Macbook'),
(28, 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `cmt` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_blog`
--

INSERT INTO `comment_blog` (`id`, `blog_id`, `cmt`, `name`, `email`, `created_at`) VALUES
(1, 1, 'a', 'aaa', 'aaa', '2023-12-10'),
(2, 1, 'ff', 'ff', 'ff', '2023-12-10'),
(3, 6, 'nothing', 'nothing', 'nothing', '2023-12-10'),
(4, 6, 'test', 'test', 'test', '2023-12-10'),
(5, 1, 'test', 'têst', 'ts', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `body`) VALUES
(1, 'Elvis sighted', 'elvis-sighted', 'Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.'),
(2, 'Say it isn\'t so!', 'say-it-isnt-so', 'Scientists conclude that some programmers have a sense of humor.'),
(3, 'Caffeination, Yes!', 'caffeination-yes', 'World\'s largest coffee shop open onsite nested coffee shop for staff only.');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `slug`, `name_product`, `price`, `quantity`, `img`, `detail`, `description`, `category_id`) VALUES
(5, 'macbook-1', 'Macbook', 111, 111, '1701684315_c4eae537066b9bedcd89.png', 'test', 'test', 27),
(11, 'macbook-2', 'Macbook', 222, 222, '1701684280_853dafbc0ac8841a6b48.png', '222', 'test', 27),
(13, 'ipad-1', 'Ipad', 11, 11, '1701684293_3282b580bc3418938eb2.png', '1', 'test', 24),
(15, 'ipad-2', 'Ipad', 1, 1, '1701684301_8d8e42754a85d601bcff.png', 'qq', 'test', 24),
(16, 'iphone-1', 'iPhone', 111, 11, '1701423299_da70dfe7c93fc3f94da5.png', 'iphone', 'test', 2),
(21, 'iphone-2', 'iphone', 111, 11, '1702127704_13f00b783f8516de9dbe.png', 'iphone', 'test', 2),
(22, 'iphone-3', 'Iphone', 1, 1, '1702127757_5e761b1df43a81b3ffbf.png', '1', 'test', 2),
(23, 'iphone-4', 'test', 1, 1, '1702450778_4da1e059dd3f706e1fa4.png', 'test', 'test', 28),
(24, 'test-1', 'test-1', 11, 11, '1703062579_fadea79291f0eb9cec42.jpg', 'test-1', 'test-1', 28);

-- --------------------------------------------------------

--
-- Table structure for table `review_product`
--

CREATE TABLE `review_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_product`
--

INSERT INTO `review_product` (`id`, `id_product`, `review`, `name`, `email`, `created_at`) VALUES
(1, 23, 'test', 'test', 'test@gmail.com', '2023-12-13'),
(2, 23, 'test 2', 'test 2', 'test 2', '2023-12-13'),
(3, 15, 'Test', 'Test', 'test@gmail.com', '2023-12-13'),
(4, 5, 'Review test', 'Review test', 'Reviewtest@gmail.com', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_fullname`, `user_avatar`, `user_password`, `user_role`) VALUES
(1, 'aa', 'aa', '', '', 'aa', 0),
(2, 'aab', 'aa', '', '', 'bbbb', 0),
(3, 'demo', 'demo@gmail.com', '', '', 'demo', 0),
(4, 'demo2', 'demo2gamil.com', '', '', '$2y$10$HFnBSo6m5DZlJFNTXj9icuTm7KqkvWBolonUAMgV8u8dFtuTIbGKe', 0),
(5, 'demo3', 'demo3@gmail.com', '', '', '$2y$10$HNgToY7Px4qovxY3MTymA.6eZeN2RozewtdSnfr9VXdsJ/BhTLLV6', 0),
(6, 'demo4', 'demo4', 'demo4 fullname', '1701590999_b402f1a44e259d27ed02.png', '$2y$10$IYxDI0.dJwl05g/EBAM6QezI66FT5pMOgeHa7PLdvtVQShJ/LJ84.', 0),
(7, 'dongocquang', 'dongocquang@gmail.com', 'Đỗ Ngọc Quang', '1702225900_049a1d8099f4042a6525.jpg', '$2y$10$BtcexID0Tg7cj/DwfjBkhu2xxoEl2alF5GAPix1AVyjPTD7WJ6jj2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_product`
--
ALTER TABLE `review_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review_product`
--
ALTER TABLE `review_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

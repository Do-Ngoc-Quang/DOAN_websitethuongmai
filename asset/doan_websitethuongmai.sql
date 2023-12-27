-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 04:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `img`) VALUES
(1, 'Our Story', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat consequat enim, non auctor massa ultrices non. Morbi sed odio massa. Quisque at vehicula tellus, sed tincidunt augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius egestas diam, eu sodales metus scelerisque congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas gravida justo eu arcu egestas convallis. Nullam eu erat bibendum, tempus ipsum eget, dictum enim. Donec non neque ut enim dapibus tincidunt vitae nec augue. Suspendisse potenti. Proin ut est diam. Donec condimentum euismod tortor, eget facilisis diam faucibus et. Morbi a tempor elit.', '1703408136_5d7a1e6aa88aa2ec32a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `detail` mediumtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `auther` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `detail`, `img`, `auther`, `category_id`, `created_at`) VALUES
(1, 'Cơn sốt iPhone 15 test', 'Có vẻ như test', 'chi tiết test chi tiết test chi tiết test chi tiết test chi tiết test chi tiết test chi tiết test chi tiết testchi tiết test', '1702185333_687a2940643341935705.jpg', 'demo4', 2, '2023-12-09'),
(6, 'Bài viết', 'Bài viết', 'Bài viết', '1702226202_53d24764805e2205d5d3.jpg', 'dongocquang', 37, '2023-12-10');

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
  `slug` varchar(100) NOT NULL,
  `name_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `name_category`) VALUES
(2, 'iphone', 'iPhone'),
(24, 'ipad', 'iPad'),
(27, 'macbook', 'Macbook'),
(37, 'test-2', 'TEST 2');

-- --------------------------------------------------------

--
-- Table structure for table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `cmt` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `msg` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `body` text NOT NULL
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
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `method_payment` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `phone_number`, `email`, `method_payment`, `total`, `created_at`) VALUES
(7, 'Đỗ Ngọc Quang', '0393939393', 'dongocquang@gmail.com', 'Banking', '', '2023-12-22'),
(8, 'Đỗ Ngọc Quang', '0393939393', 'dongocquang@gmail.com', 'COD', '', '2023-12-22'),
(11, 'Đỗ Ngọc Quang', '0393939393', 'dongocquang@gmail.com', 'COD', '571', '2023-12-22'),
(12, '', '', '', 'Select a method payment ...', '222', '2023-12-22'),
(13, '', '', '', 'Select a method payment ...', '222', '2023-12-22'),
(14, '', '', '', 'Select a method payment ...', '11', '2023-12-22'),
(15, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(16, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(17, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(18, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(19, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(20, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(21, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(22, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(23, '', '', '', 'Select a method payment ...', '1', '2023-12-22'),
(24, '', '', '', 'Select a method payment ...', '55', '2023-12-22'),
(25, '', '', '', 'Select a method payment ...', '33', '2023-12-22'),
(26, '', '', '', 'Select a method payment ...', '22', '2023-12-22'),
(27, '', '', '', 'Select a method payment ...', '12', '2023-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `quantity`) VALUES
(9, 7, 5, 2),
(10, 7, 21, 3),
(11, 7, 11, 1),
(12, 8, 5, 2),
(13, 8, 21, 1),
(14, 8, 11, 3),
(18, 11, 5, 1),
(19, 11, 11, 1),
(20, 11, 13, 1),
(21, 11, 15, 1),
(22, 11, 16, 1),
(23, 11, 21, 1),
(24, 11, 22, 1),
(25, 11, 27, 1),
(26, 12, 11, 1),
(27, 13, 11, 1),
(28, 14, 13, 1),
(29, 22, 15, 1),
(30, 23, 15, 1),
(31, 24, 13, 5),
(32, 25, 13, 3),
(33, 26, 13, 2),
(34, 27, 13, 1),
(35, 27, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `slug`, `name_product`, `price`, `quantity`, `img`, `detail`, `description`, `slug_category`) VALUES
(5, 'macbook-1', 'Macbook', 111, 111, '1701684315_c4eae537066b9bedcd89.png', 'test', 'test', 'macbook'),
(11, 'macbook-2', 'Macbook 2', 2222, 2222, '1703405274_74de8c5667addcf24040.png', '2222', 'test2', 'macbook'),
(13, 'ipad-1', 'Ipad', 11, 0, '1701684293_3282b580bc3418938eb2.png', '1', 'test', 'ipad'),
(15, 'ipad-2', 'Ipad', 1, 0, '1701684301_8d8e42754a85d601bcff.png', 'qq', 'test', 'ipad'),
(16, 'iphone-1', 'iPhone', 111, 11, '1701423299_da70dfe7c93fc3f94da5.png', 'iphone', 'test', 'iphone'),
(21, 'iphone-2', 'iphone', 111, 11, '1702127704_13f00b783f8516de9dbe.png', 'iphone', 'test', 'iphone'),
(22, 'iphone-3', 'Iphone', 1, 0, '1702127757_5e761b1df43a81b3ffbf.png', '1', 'test', 'iphone'),
(24, 'test-1', 'test-1', 11, 11, '1703062579_fadea79291f0eb9cec42.jpg', 'test-1', 'test-1', 'iphone');

-- --------------------------------------------------------

--
-- Table structure for table `review_product`
--

CREATE TABLE `review_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `review` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
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
(7, 'dongocquang', 'dongocquang@gmail.com', 'Đỗ Ngọc Quang', '1702225900_049a1d8099f4042a6525.jpg', '$2y$10$BtcexID0Tg7cj/DwfjBkhu2xxoEl2alF5GAPix1AVyjPTD7WJ6jj2', 0),
(8, 'demo5', 'demo5@gmail.com', '', '', '$2y$10$i7x9DmRUz5GnT3dVDwDzOuZIq2ptkRTu2hUWJMWgWUCvaYQquVGM.', 0),
(9, 'demo6', 'demo6', '', '', '$2y$10$GOLhy6d8IwbGHWQBI//rZeYj7lcgI6xsJzTq0mURGjliHvXND3lny', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comment_blog`
--
ALTER TABLE `comment_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `review_product`
--
ALTER TABLE `review_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

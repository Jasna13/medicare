-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 02:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medico_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `id`, `quantity`, `shipping_address`, `contact_number`, `order_date`, `status`) VALUES
(1, 5, 1, 'wwqrqt', '234556666', '2024-10-03 20:52:43', 'Pending'),
(2, 5, 1, 'wwqrqt', '234556666', '2024-10-03 20:52:53', 'Pending'),
(3, 15, 1, '1hafhjfqh', '466768121', '2024-10-03 20:58:15', 'Pending'),
(4, 15, 6, 'wdasvasvnga', '87865456', '2024-10-03 21:08:30', 'Pending'),
(5, 15, 6, 'wdasvasvnga', '87865456', '2024-10-03 21:10:07', 'Pending'),
(6, 15, 6, 'wdasvasvnga', '87865456', '2024-10-03 21:10:42', 'Pending'),
(7, 15, 6, 'wdasvasvnga', '87865456', '2024-10-03 21:13:28', 'Pending'),
(8, 15, 6, 'jasna', '7736359227', '2024-10-03 21:15:06', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discounted_price` int(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `image`, `discounted_price`, `category`) VALUES
(5, 'Dolo-650 Tablet', 28.00, 12, 'uploads/dolo.jpg', 0, '0'),
(15, 'Natural Glow Smooth Skin Deodorant Roll On For Women', 249.00, 30, 'uploads/1703678527_DNIE0101BB1_D1.avif', 0, '0'),
(16, 'Lakme Sun Expert SPF 50 PA+++ Tinthint Sunscreen Lotion, 100 ml', 479.00, 20, 'uploads/9c242e28901030978609_04.avif', 0, '0'),
(17, 'Sebamed Essential Baby Care Kit, Pack of 5 – Small', 2510.00, 20, 'uploads/dsc_0219_1_8.jpg', 510, '0'),
(18, 'Wellwoman Hairfollic Hair Supplement Tablets Pack of 30', 637.00, 20, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4QBKRXhpZgAASUkqAAgAAAABAGmHBAABAAAAGgAAAAAAAAABAIaSBwAVAAAALAAAAAAAAAAAAAAAAAAAAFZlcnNpb24gMS4wLjAA/9sAhAAFBQUJBgkJCQkMEw4ODA4OGRIOEhAXDhAQFxAXFxAUFxQUGhcTExcaFBcYIxgcGR8aGCEYIxgjIiIkJygjFyc1AQkJBQkJCQwJ', 0, '0'),
(19, 'JASNA', 1000.00, 10, 'data:image/avif;base64,AAAAHGZ0eXBhdmlmAAAAAGF2aWZtaWYxbWlhZgAAAOptZXRhAAAAAAAAACFoZGxyAAAAAAAAAABwaWN0AAAAAAAAAAAAAAAAAAAAAA5waXRtAAAAAAABAAAAImlsb2MAAAAAREAAAQABAAAAAAEOAAEAAAAAAAArbwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAAamlwcnAAAABLaXBjbwAA', 100, '0');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `role`) VALUES
(1, 'jasna', 'jasnakunj13@gmail.com', 'staff'),
(2, 'jasna', 'jasnakunj13@gmail.com', 'staff'),
(3, 'jasna', 'jasnakunj13@gmail.com', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `staffattendance`
--

CREATE TABLE `staffattendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(20) NOT NULL,
  `present` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `confirm_password` varchar(30) NOT NULL,
  `uid` int(11) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `phone_number`, `password`, `confirm_password`, `uid`, `utype`, `position`) VALUES
('devika', 'devikasuresh123@gmail.com', '9895359227', 'devika', '', 14, 'User', ''),
('jasnamol', 'jasnamol123@gmail.com', '9895359227', 'kunju', '', 15, 'User', ''),
('shihab', 'shihabea123@gmail.com', '9895359227', 'shihab', '', 16, 'User', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `uid` (`uid`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffattendance`
--
ALTER TABLE `staffattendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffattendance`
--
ALTER TABLE `staffattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staffattendance`
--
ALTER TABLE `staffattendance`
  ADD CONSTRAINT `staffattendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

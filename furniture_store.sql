-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 06:05 PM
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
-- Database: `furniture_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`) VALUES
(1, 'goldwallclock.jpg', 'Gold Wall Clock', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.\r\n\r\n', 50.00),
(2, 'anigram rooster.jpg', 'Anigram rooster', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 155.00),
(3, 'black alarm clock.jpg', 'Black alarm clock', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 45.00),
(4, '\r\nflash.jpg\r\n', 'Flash', 'Add a touch of elegance and sophistication to your...', 320.00),
(5, 'brown share.jpg', 'Brown share', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 300.00),
(6, 'kumdinu.jpg', 'kumdinu', 'Add a touch of elegance and sophistication to your...', 500.00),
(7, 'clew.jpg', 'Clew', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 80.00),
(8, 'cup.jpg', 'Cup', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 30.00),
(9, 'deco table.jpg', 'Deco table', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 330.00),
(11, 'flower vase.jpg', 'Flower vase', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 230.00),
(14, 'classic vase.jpg', 'Classic vase', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 70.00),
(16, 'pottery vase.jpg', 'Pottery vase', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 310.00),
(17, 'rose holdback.jpg', 'Rose holdback', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 350.00),
(18, 'tall white table.jpg', 'Tall white table', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 450.00),
(19, 'vivid.jpg', 'Vivid', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 290.00),
(20, 'wall led.jpg', 'Wall led.jpg', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 260.00),
(21, 'white chair.jpg', 'White chair', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 310.00),
(22, 'white table.jpg', 'White table', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 450.00),
(23, 'wooden chair.jpg', 'Wooden chair', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 430.00),
(24, 'wooden clock.jpg', 'Wooden clock', 'Add a touch of elegance and sophistication to your space with this stunning Gold Wall Clock. Crafted with precision, its sleek golden finish brings a luxurious shine to any room, making it not just a functional timepiece but also a stylish decor statement.', 45.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

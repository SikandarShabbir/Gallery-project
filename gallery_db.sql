-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 12:26 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(1, 2, 'Hello', 'This is my first comment'),
(2, 3, 'Hello', 'My second comment.');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`) VALUES
(2, '', '', '', '_large_image_1.jpg', '', 'image/jpeg', 479843),
(3, '', '', '', '_large_image_2.jpg', '', 'image/jpeg', 309568),
(4, '', '', '', '_large_image_3.jpg', '', 'image/jpeg', 165053),
(5, '', '', '', '_large_image_4.jpg', '', 'image/jpeg', 554659),
(6, '', '', '', 'image-1.jpg', '', 'image/jpeg', 328747),
(7, '', '', '', 'images-1.jpg', '', 'image/jpeg', 28947),
(8, '', '', '', 'images-3.jpg', '', 'image/jpeg', 18096),
(9, '', '', '', 'images-2.jpg', '', 'image/jpeg', 18578),
(10, '', '', '', 'images-4.jpg', '', 'image/jpeg', 23270),
(11, '', '', '', 'images-5.jpg', '', 'image/jpeg', 33192),
(12, '', '', '', 'images-6.jpg', '', 'image/jpeg', 21886),
(13, '', '', '', 'images-8.jpg', '', 'image/jpeg', 20810),
(14, '', '', '', 'images-7.jpg', '', 'image/jpeg', 24140),
(15, '', '', '', 'images-9.jpg', '', 'image/jpeg', 21108),
(16, '', '', '', 'images-10.jpg', '', 'image/jpeg', 20401),
(17, '', '', '', 'images-11.jpg', '', 'image/jpeg', 27916),
(18, '', '', '', 'images-12.jpg', '', 'image/jpeg', 18540),
(19, '', '', '', 'images-13.jpg', '', 'image/jpeg', 22082),
(20, '', '', '', 'images-14.jpg', '', 'image/jpeg', 21992),
(21, '', '', '', 'images-15.jpg', '', 'image/jpeg', 28466),
(22, '', '', '', 'images-16.jpg', '', 'image/jpeg', 21133),
(23, '', '', '', 'images-17.jpg', '', 'image/jpeg', 22792),
(24, '', '', '', 'images-18.jpg', '', 'image/jpeg', 27595),
(25, '', '', '', 'images-19.jpg', '', 'image/jpeg', 22792),
(26, '', '', '', 'images-20.jpg', '', 'image/jpeg', 22942),
(27, '', '', '', 'images-21.jpg', '', 'image/jpeg', 19957),
(28, '', '', '', 'images-22.jpg', '', 'image/jpeg', 21133),
(29, '', '', '', 'images-23.jpg', '', 'image/jpeg', 22792),
(30, '', '', '', 'images-24.jpg', '', 'image/jpeg', 29850),
(31, '', '', '', 'images-25.jpg', '', 'image/jpeg', 19363),
(32, '', '', '', 'images-26.jpg', '', 'image/jpeg', 21802),
(33, '', '', '', 'images-27.jpg', '', 'image/jpeg', 17662),
(34, '', '', '', 'images-28.jpg', '', 'image/jpeg', 17662),
(35, '', '', '', 'images-30.jpg', '', 'image/jpeg', 20257),
(36, '', '', '', 'images-29.jpg', '', 'image/jpeg', 25493),
(37, '', '', '', 'images-32.jpg', '', 'image/jpeg', 22772),
(38, '', '', '', 'images-31.jpg', '', 'image/jpeg', 20928),
(39, '', '', '', 'images-34.jpg', '', 'image/jpeg', 23587),
(40, '', '', '', 'images-33.jpg', '', 'image/jpeg', 16855),
(41, '', '', '', 'images-35.jpg', '', 'image/jpeg', 23672),
(42, '', '', '', 'images-36.jpg', '', 'image/jpeg', 21672),
(43, '', '', '', 'images-37.jpg', '', 'image/jpeg', 20381),
(44, '', '', '', 'images-39.jpg', '', 'image/jpeg', 24969),
(45, '', '', '', 'images-38.jpg', '', 'image/jpeg', 21857),
(46, '', '', '', 'images-40.jpg', '', 'image/jpeg', 24385),
(47, '', '', '', 'images-41.jpg', '', 'image/jpeg', 16296),
(48, '', '', '', 'images-42.jpg', '', 'image/jpeg', 22401),
(49, '', '', '', 'images-43.jpg', '', 'image/jpeg', 27955),
(50, '', '', '', 'images-44.jpg', '', 'image/jpeg', 29486),
(51, '', '', '', 'images-50.jpg', '', 'image/jpeg', 21652),
(52, '', '', '', 'lambo.jpg', '', 'image/jpeg', 185428),
(53, '', '', '', 'lambo2.jpg', '', 'image/jpeg', 145711);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'Sikandar', 'pakistan2k18', 'Sikandar', 'Shabbir', 'IMG_2538.JPG'),
(2, 'Test', '123456', 'Test', 'User', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

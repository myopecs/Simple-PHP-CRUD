-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 04:51 PM
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
-- Database: `druddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_description` text NOT NULL,
  `i_date` date NOT NULL,
  `i_picture` varchar(255) NOT NULL,
  `i_price` double NOT NULL,
  `i_colors` varchar(100) NOT NULL,
  `i_url` varchar(1000) NOT NULL,
  `i_audio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_name`, `i_description`, `i_date`, `i_picture`, `i_price`, `i_colors`, `i_url`, `i_audio`) VALUES
(2, 'item asdasdadasd', 'item asdasdadasd', '2023-08-08', '64d23d21b31ab-Picture8.png', 1000, 'red,blue,yellow', 'https://ww4.fmovies.co/film/meg-2-the-trench-1630855563/', ''),
(3, 'Item 3', 'Item 3', '2023-08-08', '64d23d2ddd9ea-Picture8.png', 10000, 'blue,yellow,green', 'x.mp4', ''),
(5, 'Item 5', 'Item 5', '2023-08-08', '64d23d39867bc-Picture8.png', 1000, 'red,blue,yellow', '', ''),
(6, 'item 6', '', '2023-08-08', '64d23e0a7dc8b-Picture8.png', 123, '', '', ''),
(7, 'item 7', '', '2023-08-08', '64d23e1258afc-Picture8.png', 0, '', '', ''),
(8, 'item 8', '', '2023-08-08', '64d23e19a44f9-Picture8.png', 0, '', '', ''),
(9, 'item 9', '', '2023-08-08', '64d23e2287d6c-Picture8.png', 0, '', '', ''),
(10, 'item 10', '', '2023-08-08', '64d23e30d6ba8-Picture8.png', 0, '', '', ''),
(11, 'test audio', '', '2023-11-15', '6554e79159e94-alipbataa-piano.mp3', 0, '', '', ''),
(12, 'asdasdasdasd', '', '2023-11-15', '6554e8dba64f3-alipbataa-piano.mp3', 234234, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Mr Hery', 'hery', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

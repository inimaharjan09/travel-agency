-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 05:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `Place` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `cost` bigint(8) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `Place`, `description`, `cost`, `images`) VALUES
(1, 'Dubai', '3 Night | 2 Days', 50000, 'Dubai.jpg'),
(2, 'Los Angeles', '2 Night | 3 Days', 70000, 'la.jpg'),
(3, 'Bali', '4 Night | 5 Days', 45000, 'bali.jpeg'),
(4, 'Maldives', '4 Night | 5 Days', 45000, 'Maldives.jpg'),
(5, 'Singapore', '3 Night | 4 Days', 60000, 'singapore.jpg'),
(6, 'Thailand', '5 Night | 6 Days', 40000, 'th.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `res_date` date NOT NULL,
  `res_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_date`, `res_name`, `id`) VALUES
(6, '2022-08-26', 'nova', 3),
(7, '2022-08-26', 'nova', 3),
(8, '2022-09-09', 'vdsgfxc', 3),
(9, '2022-09-09', 'cfjhgv', 3),
(10, '1970-01-01', 'rr', 2),
(11, '2022-09-08', 'gfgb', 2),
(12, '2022-08-31', 'swostika', 2),
(13, '1970-01-01', 'hfdf', 2),
(14, '1970-01-01', 'hfdf', 2),
(15, '2022-08-24', 'enuuu', 2),
(16, '2022-08-17', 'hhh', 3),
(24, '2022-08-15', 'ss', 3),
(25, '2022-08-15', 'ss', 3),
(26, '2022-08-15', 'aaa', 3),
(27, '2022-08-14', 'jjj', 5),
(28, '2022-08-23', 'jjj', 5),
(29, '2022-09-08', 'grdeyh', 2),
(30, '2022-08-24', 'enuuu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(8, 'Enu mhjn', 'enu@gmail.com', 'enu', 'user'),
(9, 'enima', 'enima@gmail.com', '18e56cc266d46439149db1a0c8698221', 'user'),
(12, 'swostika', 'test@gmail.com', 'd00f5d5217896fb7fd601412cb890830', 'user'),
(13, 'nova', 'nova@mail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'user'),
(14, 'inima', 'admin@admin.com', '1844156d4166d94387f1a4ad031ca5fa', 'user'),
(15, 'indra', 'indra@gmail.com', 'e24f6e3ce19ee0728ff1c443e4ff488d', 'user'),
(16, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(17, 'user2', 'user2@mail.com', 'test123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `reservation_ibfk_1` (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

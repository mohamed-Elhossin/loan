-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 10:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `password` varchar(66) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(90) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `image`, `role`) VALUES
(6, 'ahmed tarek', '123', 'ahmed@gmail.com', '63346499.jfif', 0),
(7, 'romany', '123', 'romany@gmai.com', '9f11b405-c44a-405f-bfa4-393653b41925.jfif', 0),
(8, 'beshoy', '1234', 'beshoy@gmail.com', 'repay.png', 0),
(11, 'sara', '1234', 'sara@gmail.com', 'download (1).png', 0),
(12, 'helana', '123', 'helana@gmail.com', 'download (1).png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `ir` int(22) NOT NULL,
  `years` int(11) NOT NULL,
  `location` varchar(111) NOT NULL,
  `image` varchar(111) NOT NULL,
  `adminId` int(11) NOT NULL,
  `bankType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `ir`, `years`, `location`, `image`, `adminId`, `bankType`) VALUES
(19, 'egypt bank', 13, 2, 'elzamalk', 'unnamed.png', 6, 3),
(21, 'QNB', 12, 1, 'Cairo', '1519856022944.jpg', 6, 3),
(22, 'saib', 10, 7, 'Naser City', 'admin-panel.png', 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `banktype`
--

CREATE TABLE `banktype` (
  `id` int(11) NOT NULL,
  `title` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banktype`
--

INSERT INTO `banktype` (`id`, `title`) VALUES
(3, 'تجاري'),
(5, 'اقتصادي'),
(10, 'الزراعي المصري');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(66) NOT NULL,
  `password` varchar(23) NOT NULL,
  `address` varchar(333) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `userType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `email`, `password`, `address`, `phone`, `userType`) VALUES
(2, 'Mohamed El hosisny', 33, 'm.m.m.elhossin@gmail.com', '123', 'asfdsafd', '2213', 2),
(3, 'ahmed tofiq', 33, 'm.m.m.elhossin@gmail.com', '1234', 'asdfdsfasfdsafdsafdsaf', '  0117433885', 2),
(4, 'ahmed tofiq', 33, 'm.m.m.elhossin@gmail.com', '1234', 'asfdsafd', '2213', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `title`) VALUES
(1, 'قطاع خاص'),
(2, 'قطاع عام'),
(3, 'طالب'),
(4, 'اعمال حره');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankType` (`bankType`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `banktype`
--
ALTER TABLE `banktype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userType` (`userType`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `banktype`
--
ALTER TABLE `banktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_2` FOREIGN KEY (`bankType`) REFERENCES `banktype` (`id`),
  ADD CONSTRAINT `bank_ibfk_3` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `usertype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

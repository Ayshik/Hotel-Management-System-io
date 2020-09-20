-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 07:44 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`, `user_type`) VALUES
('a', '$2y$10$0Z/zHj8fCyQgHgc8qBXGR.nB4zwIH4m.uRtu/AFKcy0967dleCWv.', 1),
('ay', '$2y$10$dozzc4U5gpo18SMVOFpnYeF5o.k8WILjcXGb934n4woyCUcusDWIe', 4),
('D', '$2y$10$Cc.YN2rzKJBwOio45hD63uAvRNzkvf8hDwMGjMtMaKjRIsR3C6MEC', 1),
('m', '$2y$10$N4ry3dZxNaZvcie9x2zW/OCEsR9BFG4Ki.f0Mdot7DrZBn2OF/0S2', 2),
('P', '$2y$10$1BtVzusR9b4qrJIFLC6YLulZSFFmt7xyCDxQhfs3.9O8ZiRPHTQQC', 3),
('pk', '$2y$10$WSW9/4Z0AjczX0lVjIbI8.Sg061JirUz8IMd3LlaPvnS1F23xDFkW', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pre_booking`
--

CREATE TABLE `pre_booking` (
  `serial` int(11) NOT NULL,
  `user_Id` varchar(50) NOT NULL,
  `room_number` varchar(15) NOT NULL,
  `payment` int(6) NOT NULL,
  `Totalcost` int(50) NOT NULL,
  `Payment_due` int(10) DEFAULT NULL,
  `check_in` varchar(12) DEFAULT NULL,
  `check_out` varchar(12) DEFAULT NULL,
  `pre_check_in` varchar(12) NOT NULL,
  `pre_check_out` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pre_booking`
--

INSERT INTO `pre_booking` (`serial`, `user_Id`, `room_number`, `payment`, `Totalcost`, `Payment_due`, `check_in`, `check_out`, `pre_check_in`, `pre_check_out`) VALUES
(18, 'P', 'PF11', 500, 7500, 7000, '2020-02-14', '2020-02-17', '2020-02-14', '2020-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `serial` int(11) NOT NULL,
  `class` varchar(18) NOT NULL,
  `category` varchar(30) NOT NULL,
  `room_number` varchar(15) NOT NULL,
  `price` int(6) NOT NULL,
  `book_check_in` varchar(12) NOT NULL,
  `book_check_out` varchar(12) NOT NULL,
  `pre_check_in` varchar(12) NOT NULL,
  `pre_check_out` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`serial`, `class`, `category`, `room_number`, `price`, `book_check_in`, `book_check_out`, `pre_check_in`, `pre_check_out`, `status`) VALUES
(9, 'Premium', 'Single', 'PS9', 1000, '2020-02-10', '2020-02-11', '', '', 'FREE'),
(10, 'Premium', 'Double', 'PD10', 2000, '2020-02-10', '2020-02-11', '', '', 'FREE'),
(11, 'Premium', 'Family', 'PF11', 2500, '2020-02-14', '2020-02-17', '2020-09-19', '2020-09-22', 'FREE'),
(12, 'Economy', 'Single', 'ES12', 1500, '', '', '', '', 'FREE'),
(13, 'Economy', 'Double', 'ED13', 2500, '', '', '', '', 'FREE'),
(14, 'Economy', 'Family', 'EF14', 3000, '', '', '', '', 'FREE'),
(15, 'Basic', 'Single', 'BS15', 1500, '', '', '', '', 'FREE'),
(16, 'Basic', 'Double', 'BD16', 2000, '', '', '', '', 'FREE'),
(17, 'Basic', 'Family', 'BF17', 2500, '', '', '', '', 'FREE');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` varchar(18) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `national_id` varchar(10) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `user_name`, `password`, `national_id`, `phone`, `address`) VALUES
(17, 'choyon Das pulock', 'pulock1510@gmail.com', 'a', '$2y$10$0Z/zHj8fCyQgHgc8qBXGR.nB4zwIH4m.uRtu/AFKcy0967dleCWv.', '915', 1786762093, 'House no#55 ,noddapara,daskhinpara jame mosjid road'),
(18, 'choyon Das pulock', 'pulock1510@gmail.com', 'D', '$2y$10$Cc.YN2rzKJBwOio45hD63uAvRNzkvf8hDwMGjMtMaKjRIsR3C6MEC', '23', 1786762093, 'House no#55 ,noddapara,daskhinpara jame mosjid road');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `pre_booking`
--
ALTER TABLE `pre_booking`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`serial`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pre_booking`
--
ALTER TABLE `pre_booking`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

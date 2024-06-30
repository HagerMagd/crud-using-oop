-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 02:22 PM
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
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creatted_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `department`, `email`, `password`, `creatted_at`) VALUES
(1, 'Hager magd', 'we', 'hagermagd42@gmail.com', '5f75735a2763c5bd02e4bd1e73a61e8117aaf35a', '2024-06-08 19:03:52.376428'),
(4, 'fady daly', 'cs', 'fady@gamil.com', 'hhh88', '2024-06-09 12:51:12.901708'),
(6, 'bahaa samy', 'it', 'bahaasamy54@gmail.com', 'ef5d89274fa8b1261a210ae9d50191ca72fb99ab', '2024-06-10 11:57:25.551437'),
(7, 'rania ali', 'we', 'radd44y@gmail.com', 'b1c8679e0e90d642969928d3240b07465f4c37e1', '2024-06-10 15:42:59.330517');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

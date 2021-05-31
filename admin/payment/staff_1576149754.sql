-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 11:56 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpjobsma_jobsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `joining_date` date NOT NULL,
  `salary` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `clients` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `mobile`, `address`, `location`, `joining_date`, `salary`, `email`, `password`, `clients`, `created_at`, `updated_at`) VALUES
(1, 'Dearsociety software', '9096863894', 'Fursungi@', 'dfdf', '2019-12-11', '12000', 'admin@gmail.com', 'admin05!', '3', '2019-12-07 09:04:29', NULL),
(2, 'nikita', '9096863894', 'Fursungi@', 'dfdf', '2019-12-11', '12000', 'admin-demo@dearsociety.in', 'demo0608', '2', '2019-12-07 09:06:55', NULL),
(3, 'sapna', '9096863894', 'Fursungi@', 'dfdf', '2019-12-03', '12000', 'admin@gmail.com', 'admin05!', '2', '2019-12-07 09:14:51', NULL),
(4, 'deem conveyance', '9096863894', 'Fursungi@', 'dfdf', '2019-11-25', '12000', 'Swamipune123', '@2019CGproject', '[\"4\",\"2\"]', '2019-12-09 10:38:55', '2019-12-09 10:41:33'),
(5, 'dinesh', '9096863894', 'Fursungi', 'dfdf', '2019-12-11', '12000', '1dinu@gmail.com', 'sapnadinesh', '[\"2\",\"3\"]', '2019-12-11 09:22:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

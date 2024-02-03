-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 07:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(150) NOT NULL,
  `uid` int(150) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `dt` varchar(500) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `uid`, `amount`, `dt`, `remarks`) VALUES
(1, 2, '1000', '2022-09-23', 'dinner'),
(2, 2, '500', '2022-09-23', 'breakfast'),
(3, 2, '10000', '2022-09-23', 'watch'),
(4, 9, '110', '2022-09-23', 'watch'),
(5, 9, '1500', '2022-09-23', 'breakfast'),
(6, 10, '10000', '2022-09-24', 'shoes'),
(7, 10, '15000', '2022-09-24', 'watch'),
(8, 10, '80000', '2022-09-24', 'phone');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(150) NOT NULL,
  `uid` int(150) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `dt` varchar(500) NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `uid`, `amount`, `dt`, `remarks`) VALUES
(8, 2, '100000', '2022-09-23', 'first month'),
(9, 9, '150000', '2022-09-23', 'second month'),
(10, 10, '350000', '2022-09-24', 'first month');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(150) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'dhhdfh', 'nut@gmail.com', '012345', '3a029f04d76d32e79367c4b3255dda4d'),
(3, 'Bob', 'bob@b.b', '6969', 'd3d9446802a44259755d38e6d163e820'),
(4, 'tank', 'tank@t.t', '696', 'd3d9446802a44259755d38e6d163e820'),
(6, 'Godfather', 'god@g.g', '10', 'd3d9446802a44259755d38e6d163e820'),
(7, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'carl', 'carl@c.c', '1012', 'd3d9446802a44259755d38e6d163e820'),
(9, 'beast100', 'beast@b.b', '1245', 'd3d9446802a44259755d38e6d163e820'),
(10, 'Juan', 'juan@j.j', '696910', 'd3d9446802a44259755d38e6d163e820');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 04:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_listing`
--

CREATE TABLE `job_listing` (
  `id` int(11) NOT NULL,
  `title` char(255) NOT NULL,
  `description` text NOT NULL,
  `salary` int(11) NOT NULL,
  `company` char(50) NOT NULL,
  `url` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_listing`
--

INSERT INTO `job_listing` (`id`, `title`, `description`, `salary`, `company`, `url`) VALUES
(16, 'aaaaa', 'qweqweqweqweqewqwe', 123123, '123123', 'https://www.google.com/'),
(17, 'Kosachccccc', 'qweqeqweqwe', 111, 'Google', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `pending_job_listings`
--

CREATE TABLE `pending_job_listings` (
  `id` int(11) NOT NULL,
  `title` char(255) NOT NULL,
  `description` text NOT NULL,
  `salary` int(11) NOT NULL,
  `company` char(50) NOT NULL,
  `url` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `password_hash` char(64) NOT NULL,
  `email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `email`) VALUES
(4, 'Test2', 'fd61a03af4f77d870fc21e05e7e80678095c92d808cfb3b5c279ee04c74aca13', 'test1@test1.test1'),
(5, 'testing', '5fd924625f6ab16a19cc9807c7c506ae1813490e4ba675f843d5a10e0baacdb8', 'asdasd'),
(7, '1111', '318aee3fed8c9d040d35a7fc1fa776fb31303833aa2de885354ddf3d44d8fb69', '2222'),
(9, 'qqq', '7c2ecd07f155648431e0f94b89247d713c5786e1e73e953f2fe7eca39534cd6d', 'www'),
(10, 'qkooo', 'a0ec06301bf1814970a70f89d1d373afdff9a36d1ba6675fc02f8a975f4efaeb', 'awewaeawe'),
(11, '111122222', '183705900b3f56bd7b54652143c3dd52ce894996f737a45fab7a5ebf70b76dd1', '33333444'),
(12, 'login', '428821350e9691491f616b754cd8315fb86d797ab35d843479e732ef90665324', 'login');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_listing`
--
ALTER TABLE `job_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_job_listings`
--
ALTER TABLE `pending_job_listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pending_job_listings`
--
ALTER TABLE `pending_job_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

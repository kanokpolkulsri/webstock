-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 10:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_map`
--

CREATE TABLE `project_map` (
  `ProjWBS` char(14) NOT NULL,
  `ProjName` varchar(400) NOT NULL,
  `LastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_map`
--

INSERT INTO `project_map` (`ProjWBS`, `ProjName`, `LastUpdate`) VALUES
('1234', 'โครงการทดลอง', '2017-05-31 13:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(50) NOT NULL,
  `Name` varchar(400) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Company` varchar(400) NOT NULL,
  `Position` varchar(400) NOT NULL,
  `State` varchar(10) NOT NULL,
  `LastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Name`, `Phone`, `Company`, `Position`, `State`, `LastUpdate`) VALUES
('user1', 'user1', '-', '-', '-', 'admin', '2017-06-01 00:00:00'),
('user2', 'user2', '-', '-', '-', 'user', '2017-05-31 13:06:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_map`
--
ALTER TABLE `project_map`
  ADD PRIMARY KEY (`ProjWBS`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 09:34 AM
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
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(40) NOT NULL,
  `name` varchar(15) NOT NULL,
  `mobile` bigint(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile`, `email`, `password`) VALUES
(1, 'admin', 9835269259, 'admin76@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `lid` int(40) NOT NULL,
  `uid` int(15) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`lid`, `uid`, `subject`, `message`, `status`) VALUES
(1, 18, 'Regarding 2 days cl', ' hope this message finds you well. I am writing to formally request a 2days leave of absence from work starting on [start date] and ending on [end date].', 'Approve'),
(2, 18, 'Regarding own day CL', 'I have ensured that all my current tasks and responsibilities are up to date, and I am committed to completing any pending work before my departure.', 'Rejected'),
(3, 19, 'regarding 5 days leave', '  I am grateful for your understanding and cooperation in this matter. I will ensure that my absence has minimal impact on the team\'s productivity and will do my best to facilitate a smooth transition during my leave.', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `tid` int(40) NOT NULL,
  `uid` int(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tid`, `uid`, `description`, `sdate`, `edate`, `status`) VALUES
(9, 0, '                                                                  complate your miner project                                                        ', '2023-11-18', '2023-11-20', 'complete'),
(10, 21, '  Complate your miner project file', '2023-11-21', '2023-11-23', 'not started'),
(11, 17, '  complate your project', '2023-11-18', '2023-11-25', 'not started'),
(12, 18, '  create 10 slides presentation on Zomato gold!', '2023-11-22', '2023-11-28', 'not started'),
(13, 19, '  complate tour lab file', '2023-11-15', '2023-11-24', 'not started'),
(14, 20, '  complate your wors file ', '2023-11-11', '2023-11-24', 'not started');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mnumber` bigint(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `mnumber`, `email`, `password`, `rpassword`) VALUES
(17, 'JAVED KHAN', 9340954281, 'XMART4512@GMAIL.COM', 'javed@123', 'javed@123'),
(18, 'ashish patel', 7987047208, 'iamashish761@gmail.com', 'Anshish@1234', 'Anshish@1234'),
(19, 'jaydeep ', 8983452179, 'jaydeep492@gmail.com', 'jaydeep@123', 'jaydeep@123'),
(20, 'aditya yadav', 9340954343, 'aditya432@gmail.com', 'Aditya@123', 'Aditya@123'),
(21, 'yasar ali', 7865439845, 'yasar761@gmail.com', 'yasar@123', 'yasar@123'),
(22, 'ashish patel', 7987047208, 'iamashis@mail.com', 'anshish', 'anshish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `lid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `tid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

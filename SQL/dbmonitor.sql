-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 09:53 AM
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
-- Database: `dbmonitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbmonitor`
--

CREATE TABLE `tbmonitor` (
  `id` int(100) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `suhu` int(10) NOT NULL,
  `kelembaban` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmonitor`
--

INSERT INTO `tbmonitor` (`id`, `waktu`, `tanggal`, `suhu`, `kelembaban`) VALUES
(1, '00:00:00', '00/00/0000', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbmonitor`
--
ALTER TABLE `tbmonitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbmonitor`
--
ALTER TABLE `tbmonitor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

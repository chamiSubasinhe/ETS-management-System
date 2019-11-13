-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 11:23 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ets_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `stafflibrarymember`
--

CREATE TABLE `stafflibrarymember` (
  `staffID` char(12) NOT NULL,
  `receiptNo` char(10) NOT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stafflibrarymember`
--

INSERT INTO `stafflibrarymember` (`staffID`, `receiptNo`, `dateRegistered`) VALUES
('SFKGLE002277', 'LIB1224', '2018-09-07'),
('SFKGLE002297', 'LIB1239', '2018-08-30'),
('SFKGLE002298', 'LIB4557', '2018-09-20'),
('SFKGLE002299', 'LIB1223', '2018-09-10'),
('SFKGLE123456', 'LIB1237', '2018-08-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stafflibrarymember`
--
ALTER TABLE `stafflibrarymember`
  ADD PRIMARY KEY (`staffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

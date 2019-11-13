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
-- Table structure for table `studentlibrarymember`
--

CREATE TABLE `studentlibrarymember` (
  `studentID` char(12) NOT NULL,
  `receiptNo` char(10) NOT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentlibrarymember`
--

INSERT INTO `studentlibrarymember` (`studentID`, `receiptNo`, `dateRegistered`) VALUES
('STKGBM001144', 'LIB3344', '2018-08-20'),
('STKGBM001145', 'LIB4558', '2018-09-12'),
('STKGBM001148', 'LIB1233', '2018-09-12'),
('STKGBM001199', 'LIB1229', '2018-09-11'),
('STKGBM002298', 'LIB1239', '2018-08-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentlibrarymember`
--
ALTER TABLE `studentlibrarymember`
  ADD PRIMARY KEY (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

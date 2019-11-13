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
-- Table structure for table `libraryborrow`
--

CREATE TABLE `libraryborrow` (
  `isbn` char(13) NOT NULL,
  `memberId` char(12) NOT NULL,
  `dateBorrowed` date NOT NULL,
  `dateReturned` date NOT NULL,
  `fine` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraryborrow`
--

INSERT INTO `libraryborrow` (`isbn`, `memberId`, `dateBorrowed`, `dateReturned`, `fine`) VALUES
('1234567890123', 'SFGKLE001122', '2018-08-25', '2018-09-29', 1750),
('1234567890123', 'SFGKLE001122', '2018-09-01', '0000-00-00', 0),
('1234567890123', 'SFKGLE002277', '2018-09-15', '2018-09-29', 700),
('978159821516', 'SFKGLE002277', '2018-09-01', '0000-00-00', 0),
('978359815138', 'SFKGLE002277', '2018-09-01', '2018-09-09', 50),
('978359821504', 'SFKGLE002297', '2018-09-04', '2018-09-10', 0),
('978359821505', 'SFKGLE002297', '2018-09-09', '2018-09-23', 350),
('978359821505', 'SFKGLE002298', '2018-09-01', '2018-09-11', 150),
('978359821505', 'SFKGLE002298', '2018-09-12', '2018-09-27', 220),
('978359821505', 'SFKGLE002298', '2018-09-23', '2018-09-30', 0),
('978359821505', 'STKGBM001144', '2018-09-11', '2018-09-20', 200),
('978359821514', 'SFKGLE002298', '2018-09-15', '2018-09-22', 0),
('978359821514', 'SFKGLE002298', '2018-09-19', '2018-09-28', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libraryborrow`
--
ALTER TABLE `libraryborrow`
  ADD PRIMARY KEY (`isbn`,`memberId`,`dateBorrowed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

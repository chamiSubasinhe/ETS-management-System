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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` char(13) NOT NULL,
  `title` varchar(250) NOT NULL,
  `edition` int(11) NOT NULL,
  `yearPublished` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `callNumber` varchar(5) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `edition`, `yearPublished`, `pages`, `description`, `callNumber`, `dateAdded`, `author`) VALUES
('9781598215162', 'Software Engineering for Undergraduates', 3, 2011, 1100, 'A complete course on software design and engineering', '1233', '2018-09-29 06:11:09', 'P.Tannebaum'),
('9783598151386', 'Networking Basics', 3, 2009, 222, 'Networking and Security 1', '1223', '2018-09-29 06:16:27', 'P.Tannebaum'),
('9783598215049', 'Introduction to Programming', 2, 2001, 354, 'Programming basics for undergraduates', '123', '2018-09-29 05:34:42', 'C.Dietel'),
('9783598215050', 'Advanced Networking', 3, 2001, 222, 'Networking 2', '540', '2018-09-29 06:20:06', 'P.Tannebaum'),
('9783598215051', 'Introduction to Databases', 3, 2001, 354, 'Database Theory', '6305', '2018-09-29 06:17:46', 'S.P.Navanthe'),
('9783598215055', 'Java Programming', 2, 2009, 354, 'Programming in Java', '1233', '2018-09-29 06:18:57', 'Rob Wield'),
('9783598215056', 'Computer Science Basics', 3, 2010, 333, 'Computer Science Basics', '1234', '2018-09-29 05:37:01', 'J.D.Salinger'),
('9783598215057', 'History of Computing', 3, 2011, 150, 'A brief history on the development of computing', '12344', '2018-09-29 05:49:53', 'J.D.Salinger'),
('9783598215148', 'Advanced Mathematics', 0, 0, 0, 'Schaums outline Series', '1239', '2018-09-29 06:03:56', 'P.Schaum'),
('9783598215155', 'Algorithms and Data Structures', 5, 1997, 123, 'Advanced Mathematics', '6301', '2018-09-29 06:08:53', 'Ricardo A.Bates');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

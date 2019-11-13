-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 08:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ets`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignmodule`
--

CREATE TABLE `assignmodule` (
  `courseID` varchar(10) NOT NULL,
  `moduleID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmodule`
--

INSERT INTO `assignmodule` (`courseID`, `moduleID`) VALUES
('001', 'E1013'),
('001', 'IT1010'),
('001', 'IT1015'),
('002', 'ET1012'),
('002', 'IT1013');

-- --------------------------------------------------------

--
-- Table structure for table `authlevels`
--

CREATE TABLE `authlevels` (
  `authId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL,
  `studentManagement` tinyint(1) NOT NULL DEFAULT '0',
  `financialManagement` tinyint(1) NOT NULL DEFAULT '0',
  `inventoryManagemnt` tinyint(1) NOT NULL DEFAULT '0',
  `courseManagemnt` tinyint(1) NOT NULL DEFAULT '0',
  `libraryManagement` tinyint(1) DEFAULT '0',
  `staffManagement` tinyint(1) NOT NULL DEFAULT '0',
  `administration` tinyint(1) NOT NULL DEFAULT '0',
  `maintenance` tinyint(1) NOT NULL DEFAULT '0',
  `studentBasic` tinyint(1) NOT NULL DEFAULT '0',
  `staffBasic` tinyint(1) NOT NULL DEFAULT '0',
  `InventoryBasic` tinyint(1) NOT NULL DEFAULT '0',
  `libraryBasic` tinyint(1) NOT NULL DEFAULT '0',
  `attendance` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authlevels`
--

INSERT INTO `authlevels` (`authId`, `name`, `created`, `description`, `studentManagement`, `financialManagement`, `inventoryManagemnt`, `courseManagemnt`, `libraryManagement`, `staffManagement`, `administration`, `maintenance`, `studentBasic`, `staffBasic`, `InventoryBasic`, `libraryBasic`, `attendance`) VALUES
(1, 'Main Admin', '2018-07-26 05:07:50', 'This auth level is assigned for the main Administrator', 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `isbn` char(13) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`isbn`, `name`) VALUES
('b12031', 'A.A. Milne'),
('td4556', 'H.G. Wells '),
('yh12546', 'F. Scott Fitzgerald');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `billNo` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transactionID` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`billNo`, `category`, `dateAdded`, `transactionID`, `amount`) VALUES
('0000001', 'water bill', '2018-08-25 05:59:39', 3, 200),
('0000002', 'rent', '2018-08-25 06:00:26', 5, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` char(13) NOT NULL,
  `title` varchar(250) NOT NULL,
  `bookType` int(11) NOT NULL,
  `edition` int(11) NOT NULL,
  `yearPublished` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `callNumber` varchar(5) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `bookType`, `edition`, `yearPublished`, `pages`, `description`, `callNumber`, `dateAdded`) VALUES
('b12031', 'programing basic knowledge', 0, 2, 2015, 254, 'it has basic info about programing bla bla bla jhu jgwg tyr hjfi ktoy,ijthurf sdg fhh', '25487', '2018-08-25 09:50:23'),
('td4556', 'learn data structures and algorithms ', 0, 3, 2014, 300, 'its a structures and algorithms book njknfe fjnef ejnwe jfn jnf', '22222', '2018-08-25 09:50:23'),
('yh12546', 'PHP from basic knowledge', 0, 5, 2016, 250, 'its a PHP from basic knowledge book jddd asd fef fewe sqwd sqw eer frw', '12111', '2018-08-25 09:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE `booktype` (
  `isbn` varchar(12) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `centerID` char(12) NOT NULL,
  `centername` varchar(25) NOT NULL,
  `staffID` char(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`centerID`, `centername`, `staffID`, `address`, `dateCreated`, `dateUpdated`) VALUES
('1000', 'ETS Kegalle center', 'SFKGMA001563', '', '2018-08-25 09:49:01', '0000-00-00 00:00:00'),
('1001', 'ETS kurunagela center', 'SFKGAD001326', '', '2018-08-25 09:49:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE `copy` (
  `copyID` int(11) NOT NULL,
  `isbn` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copy`
--

INSERT INTO `copy` (`copyID`, `isbn`) VALUES
(1, 'yh1246'),
(2, 'b12031'),
(3, 'yh12546'),
(4, 'b12031'),
(5, 'td4556');

-- --------------------------------------------------------

--
-- Table structure for table `courieragentdetails`
--

CREATE TABLE `courieragentdetails` (
  `agentId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courierdetails`
--

CREATE TABLE `courierdetails` (
  `courierNo` int(11) NOT NULL,
  `agentID` char(3) NOT NULL,
  `description` varchar(250) NOT NULL DEFAULT 'Unknown',
  `dateSent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `staffID` char(12) NOT NULL,
  `dateReceived` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `sender` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL,
  `priority` varchar(10) NOT NULL DEFAULT 'Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courierdetails`
--

INSERT INTO `courierdetails` (`courierNo`, `agentID`, `description`, `dateSent`, `staffID`, `dateReceived`, `complete`, `sender`, `receiver`, `priority`) VALUES
(1, '12', 'books', '2018-08-14 18:30:00', 'SFKGLE001553', '2018-08-25 10:33:26', 0, 'sdf sf sdfsfgs fgfgas fgs gf', 'sdfsdf sdf sdfg sdg sdgfsg sg', 'Normal'),
(2, '23', 'study materials', '2018-08-13 18:30:00', 'SFKGMA001563', '2018-08-25 10:23:44', 0, '', '', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(10) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `preQualification` varchar(100) NOT NULL,
  `postQualification` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `commencingDate` date NOT NULL,
  `feePerSemester` double NOT NULL,
  `category` tinyint(1) NOT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `cName`, `description`, `preQualification`, `postQualification`, `duration`, `commencingDate`, `feePerSemester`, `category`, `dateUpdated`) VALUES
('001', 'Bachelors degree in information and technology', 'its a it degree course', 'hjuk gggg gtef fddgt gbfg gd  vdf dff', 'jhjuk gggg gtef fddgt gbfg gd  vdf dff', 48, '2018-08-31', 200000, 1, '2018-08-25 01:09:03'),
('002', 'Bachelor of Civil Engineering Technology', 'this is an engineering course', 'hgf hgfd hgf gfd hgfd gf gfr', 'ett tt ytt hhh vrd hgf gf hgfd hgf hgf jhgf ', 36, '2018-09-11', 250000, 1, '2018-08-25 01:09:03'),
('003', 'certifcate course in computing', 'Its a certificate course lkmdjh kjh jh', 'finished ordinary level', 'sscdasd sdad', 6, '2018-08-06', 2000, 3, '2018-08-25 02:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `coursecategory`
--

CREATE TABLE `coursecategory` (
  `categoryId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursecategory`
--

INSERT INTO `coursecategory` (`categoryId`, `title`, `description`) VALUES
(1, 'Degrees', 'It is a degree program'),
(2, 'Diploma', 'It is a Diplpma program'),
(3, 'Short Courses', 'It is a Short Courses program');

-- --------------------------------------------------------

--
-- Table structure for table `coursematerial`
--

CREATE TABLE `coursematerial` (
  `cmID` int(10) NOT NULL,
  `moduleID` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursematerial`
--

INSERT INTO `coursematerial` (`cmID`, `moduleID`, `date`, `link`) VALUES
(1, 'ET1012', '2018-08-25 04:55:46', 'folder/space/sjns'),
(2, 'IT1010', '2018-08-25 04:55:46', 'husag/kjnha/jss/'),
(3, 'IT1015', '2018-08-25 04:55:46', 'dfdrg/drgrd/gdrrg'),
(4, 'IT1015', '2018-08-25 04:55:46', 'fees/tty/gyhy/th');

-- --------------------------------------------------------

--
-- Table structure for table `dependents`
--

CREATE TABLE `dependents` (
  `staffID` char(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(25) NOT NULL,
  `bod` date DEFAULT NULL,
  `nic` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `userId` char(12) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`userId`, `email`, `subscribed`) VALUES
('SFKGAD001325', 'asiri@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ExamID` varchar(10) NOT NULL,
  `staffID` char(12) NOT NULL,
  `moduleID` varchar(10) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duration` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ExamID`, `staffID`, `moduleID`, `courseID`, `dateTime`, `duration`) VALUES
('ET12', 'SFKGLE001553', 'ET1012', '002', '2018-08-25 09:52:50', 0),
('IT10 ', 'SFKGLE001552', 'IT1010', '001', '2018-08-25 09:52:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `transactionID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`transactionID`, `type`, `amount`) VALUES
(1, 'pettycash', 3000),
(2, 'bills', 200);

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `transactionID` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(50) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial`
--

INSERT INTO `financial` (`transactionID`, `amount`, `type`, `dateAdded`) VALUES
(1, 20000, 'New cash', '2018-06-30 18:30:00'),
(2, 30000, 'Regular cash', '2018-07-31 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `stuID` char(12) NOT NULL,
  `guardianID` char(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contactNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`stuID`, `guardianID`, `name`, `contactNo`) VALUES
('STKGET001212', 'GD0012', 'J.M. Barrie', '076980236'),
('STKGET001214', 'GD0015', 'L. Frank Baum', '0723564987'),
('STKGIT001284', 'GD0013', 'J.R.R. Tolkien', '0725226963'),
('STKGIT001452', 'GD0014', 'P.G. Wodehouse', '0752546845');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `centerID` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `hallId` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`centerID`, `type`, `hallId`, `description`, `dateCreated`) VALUES
(1000, 'lab', 1015, '', '2018-08-25 09:54:56'),
(1000, 'lecture room', 1016, '', '2018-08-25 09:54:56'),
(1000, 'lecture hall', 1017, '', '2018-08-25 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquaryID` int(11) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `home` int(11) NOT NULL,
  `resident` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `response` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquaryID`, `courseID`, `home`, `resident`, `name`, `type`, `email`, `response`) VALUES
(1, '002', 11254615, 77254656, 'F. Scott Fitzgerald', 'abc', 'Fitzgerald@gmail.com', 'jghfd fjhegf hjdgf hgdf hgfd jhgfcv tfcv jhgf kjhg kjhgfc hgfd '),
(2, '003', 812649562, 760251802, 'H.Howard Phillips', 'dawd', 'Phillips@gmail.com', 'vhgt jhg hg uhygf nv  fd uytgfr ');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `hallID` int(11) NOT NULL,
  `itemNo` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `noOfItems` int(11) NOT NULL,
  `availibility` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`hallID`, `itemNo`, `type`, `noOfItems`, `availibility`, `status`) VALUES
(1015, 1, 'computer tables', 15, '14', 'good'),
(1016, 2, 'chairs', 25, '24', 'good'),
(1016, 3, 'tables', 25, '25', 'in use'),
(1017, 4, 'tables', 30, '25', 'in stock');

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `jobtypeid` int(11) NOT NULL,
  `jobtypename` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`jobtypeid`, `jobtypename`) VALUES
(1, 'permenent'),
(2, 'contract'),
(3, 'partTime');

-- --------------------------------------------------------

--
-- Table structure for table `maincash`
--

CREATE TABLE `maincash` (
  `transactionID` int(11) NOT NULL,
  `bankDate` date NOT NULL,
  `slipNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincash`
--

INSERT INTO `maincash` (`transactionID`, `bankDate`, `slipNo`) VALUES
(1, '2018-08-15', '0000001'),
(2, '2018-08-22', '0000002');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `moduleID` varchar(10) NOT NULL,
  `mName` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`moduleID`, `mName`, `description`, `updatedDate`) VALUES
('E1013', 'English for accademic purpose', 'Its a english module', '2018-08-25 01:24:18'),
('ET1012', 'engineering basics functionalities', 'Its a engineering module', '2018-08-25 01:17:54'),
('IT1010', 'Computer networking and data administration', 'It is a module of Computer networking', '2018-08-24 18:30:00'),
('IT1015', 'Internet and web Technologies', 'its a web Technologies module', '2018-08-25 01:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `perform`
--

CREATE TABLE `perform` (
  `staffID` varchar(12) NOT NULL,
  `month` varchar(50) DEFAULT NULL,
  `accuracy` int(11) DEFAULT NULL,
  `accuracycom` varchar(200) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `speedcom` varchar(200) DEFAULT NULL,
  `jobknow` int(11) DEFAULT NULL,
  `jobknowcom` varchar(200) DEFAULT NULL,
  `qow` int(11) DEFAULT NULL,
  `qowcom` varchar(200) DEFAULT NULL,
  `inititive` int(11) DEFAULT NULL,
  `inititivecom` varchar(200) DEFAULT NULL,
  `communication` int(11) DEFAULT NULL,
  `communicationcom` varchar(200) DEFAULT NULL,
  `commensense` int(11) DEFAULT NULL,
  `commenSensecom` varchar(200) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `appcom` varchar(200) DEFAULT NULL,
  `corp` int(11) DEFAULT NULL,
  `corpcom` varchar(200) DEFAULT NULL,
  `cs` int(11) DEFAULT NULL,
  `cscom` varchar(200) DEFAULT NULL,
  `conduct` int(11) DEFAULT NULL,
  `othercom` varchar(200) DEFAULT NULL,
  `entered` varchar(12) DEFAULT NULL,
  `review` varchar(12) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perform`
--

INSERT INTO `perform` (`staffID`, `month`, `accuracy`, `accuracycom`, `speed`, `speedcom`, `jobknow`, `jobknowcom`, `qow`, `qowcom`, `inititive`, `inititivecom`, `communication`, `communicationcom`, `commensense`, `commenSensecom`, `app`, `appcom`, `corp`, `corpcom`, `cs`, `cscom`, `conduct`, `othercom`, `entered`, `review`, `total`, `percent`) VALUES
('SFKGLE000001', 'janTOapril', 5, 'good', 2, 'good', 5, 'good', 5, 'good', 5, 'good', 5, 'good', 5, 'good', 5, 'good', 7, 'good', 7, 'good', 7, 'good', 'SFKGLE000000', 'SFKGLE000000', 58, 53),
('SFKGLE000002', 'janTOapril', 5, 'average', 2, 'average', 5, 'average', 7, 'average', 7, 'average', 5, 'average', 2, 'average', 6, 'average', 2, 'average', 5, 'average', 7, 'average', 'SFKGLE000000', 'SFKGLE000000', 53, 48),
('SFKGLE000003', 'janTOapril', 3, 'very good', 10, 'very good', 10, 'very good', 10, 'very good', 10, 'very good', 5, 'very good', 10, 'very good', 7, 'very good', 10, 'very good', 10, 'very good', 10, 'very good', 'SFKGLE000000', 'SFKGLE000000', 95, 86),
('SFKGLE000006', 'janTOapril', 5, 'average', 7, 'goof', 6, 'average', 8, 'good', 5, 'average', 10, 'very good', 2, 'poor', 5, 'average', 7, 'good', 6, 'average', 5, 'average', 'SFKGLE000000', '', 66, 60),
('SFKGLE000007', 'janTOapril', 7, 'Does not require constant supervision.', 8, 'Error rate is acceptable, and all work is completed timely.', 5, 'Is not as careful in checking work product for errors as he she could be.', 8, 'Forms and required paperwork are completed on time with minimal errors.', 5, 'Tends to miss small errors in work product.', 10, 'Has less than a 1% error rate on work product.', 3, 'Tends to miss small errors in work product.', 2, 'Does not complete required paperwork.', 6, 'Required paperwork is completed late or is only partially complete.', 5, 'Tends to miss small errors in work product.', 8, 'Does not require constant supervision.', 'SFKGLE000007', '', 67, 61),
('SFKGLE000010', 'janTOapril', 5, 'Average', 8, 'good', 7, 'good', 8, 'good', 5, 'average', 7, 'good', 7, 'good', 5, 'average', 5, 'average', 5, 'average', 7, 'good', 'SFKGLE000000', '', 69, 63),
('SFKGLE000011', 'janTOapril', 5, 'average', 5, 'average', 5, 'average', 5, 'average', 10, 'very good', 8, 'good', 8, 'goog', 3, 'poor', 2, 'poor', 7, 'good', 5, 'Overall good at work.', 'SFKGLE000000', '', 63, 57),
('SFKGLE000012', 'janTOapril', 5, 'average.', 6, 'average', 7, 'good', 10, 'very good', 8, 'good', 7, 'good', 6, 'average', 5, 'average', 3, 'poor', 2, 'poor', 5, 'Need more attention and improvement.', 'SFKGLE000000', '', 64, 58),
('SFKGLE000013', 'janTOapril', 8, 'good', 5, 'average', 8, 'good', 3, 'poor', 2, 'poor', 7, 'good', 8, 'good', 8, 'good', 5, 'average', 2, 'poor', 7, 'Average', 'SFKGLE000000', '', 63, 57),
('SFKGLE000014', 'janTOapril', 7, 'good', 3, 'average', 6, 'average', 5, 'average', 2, 'poor', 2, 'poor', 5, 'average', 2, 'poor', 7, 'good', 2, 'poor', 3, 'No more imrovement.', 'SFKGLE000000', '', 44, 40),
('SFKGLE000015', 'janTOapril', 5, 'average', 7, 'good', 8, 'good', 8, 'good', 10, 'very good', 5, 'average', 6, 'average', 10, 'very good', 5, 'average', 6, 'average', 7, 'good', 'SFKGLE000000', '', 77, 70);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `staffID` int(11) NOT NULL,
  `performanceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pettycash`
--

CREATE TABLE `pettycash` (
  `currentBalance` double NOT NULL,
  `amountNeeded` double NOT NULL,
  `amountRecieved` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transactionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pettycash`
--

INSERT INTO `pettycash` (`currentBalance`, `amountNeeded`, `amountRecieved`, `date`, `transactionID`) VALUES
(5000, 3000, 5000, '2018-08-25 06:01:43', 1),
(3000, 2000, 5000, '2018-08-25 06:02:07', 2),
(2000, 2500, 5000, '2018-08-25 06:02:39', 3);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `userId` char(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '1',
  `SMSKey` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`userId`, `phone`, `subscribed`, `SMSKey`) VALUES
('SFKGAD001325', '0786141343', 1, 'dgte7wh8j37hj');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `postname` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `postname`) VALUES
(1, 'accountant'),
(2, 'branchAdmin'),
(3, 'lecturer'),
(4, 'receptionst');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `examID` varchar(10) NOT NULL,
  `stuID` char(12) NOT NULL,
  `marks` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`examID`, `stuID`, `marks`) VALUES
('ET12', 'STKGET001212', 68),
('ET13', 'STKGET001214', 87),
('IT10', 'STKGIT001284', 75),
('IT12', 'STKGIT001452', 80);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `staffID` char(12) NOT NULL,
  `pay` tinyint(1) DEFAULT NULL,
  `payDate` date DEFAULT NULL,
  `basic` double NOT NULL,
  `allowences` double DEFAULT NULL,
  `deduction` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`staffID`, `pay`, `payDate`, `basic`, `allowences`, `deduction`, `total`) VALUES
('SFKGLE000000', NULL, NULL, 50000, 7000, 2000, NULL),
('SFKGLE000001', NULL, NULL, 45000, 5000, 2000, NULL),
('SFKGLE000005', NULL, NULL, 25000, 5000, 2000, NULL),
('SFKGLE000006', NULL, NULL, 50000, 10000, 5000, NULL),
('SFKGLE000007', NULL, NULL, 50000, 2200, 1000, NULL),
('SFKGLE000009', NULL, NULL, 70000, 120000, 7000, NULL),
('SFKGLE000010', NULL, NULL, 70000, 10000, 5000, NULL),
('SFKGLE000011', NULL, NULL, 50000, 6000, 5000, NULL),
('SFKGLE000012', NULL, NULL, 50000, 6000, 3000, NULL),
('SFKGLE000013', NULL, NULL, 60000, 12000, 1000, NULL),
('SFKGLE000014', NULL, NULL, 50000, 6000, 5000, NULL),
('SFKGLE000015', NULL, NULL, 50000, 7000, 2000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `varId` int(11) NOT NULL,
  `variable` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'text',
  `value` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `static` tinyint(1) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`varId`, `variable`, `description`, `type`, `value`, `created`, `updated`, `static`) VALUES
(3, 'Owner', '', 'text', 'ETS Campus Temp', '2018-08-06 09:29:31', '2018-08-06 10:26:53', 1),
(4, 'payments', '', 'text', 'enabled', '2018-07-23 15:59:06', '2018-08-20 10:26:53', 2),
(5, 'System_Name', '', 'text', 'ETS Management System', '2018-08-06 07:18:36', '2018-08-21 07:16:32', 1),
(6, 'Version', '', 'number', '3.5', '2018-08-06 09:26:19', '2018-08-24 05:19:51', 1),
(7, 'SMS_API', '', 'text', '', '2018-08-02 02:58:07', '2018-08-06 10:26:53', 2),
(8, 'USSD_API', '', 'text', '', '2018-08-02 02:58:07', '2018-08-06 10:26:53', 2),
(9, 'telco_password', '', 'text', '88abdb9fb3f7fad84f0b1a37a8d85772 ', '2018-08-02 03:00:52', '2018-08-06 10:26:53', 2),
(10, 'telco_appID', '', 'text', 'APP_046159 ', '2018-08-02 03:00:52', '2018-08-06 10:26:53', 2),
(11, 'SMS_APP_ID', '', 'text', 'APP_046159', '2018-08-06 07:21:42', '2018-08-06 10:26:53', 2),
(29, 'favicon_path', '', 'text', 'logo.png', '2018-08-06 10:08:14', '2018-08-24 05:19:19', 1),
(31, 'theme_color_background', '', 'text', 'blue', '2018-08-06 10:57:51', '2018-08-14 10:08:43', 1),
(32, 'custom_css', 'This variable shows the path to custom css', 'text', 'plugins/bootstrap-tagsinput/bootstrap-tagsinput.css', '2018-08-06 14:32:39', '2018-08-06 16:12:14', 1),
(38, 'efsef', '', 'text', 'sdf', '2018-08-10 13:23:41', '2018-08-10 13:23:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` char(12) NOT NULL,
  `nameInFull` varchar(250) NOT NULL,
  `managedBy` char(12) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `post` varchar(100) NOT NULL DEFAULT 'Staff Member',
  `dob` date NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `centerId` char(12) DEFAULT NULL,
  `thumb` varchar(150) NOT NULL DEFAULT 'images/icons/user.png',
  `nic` varchar(10) NOT NULL,
  `datejoined` date DEFAULT NULL,
  `jobtype` varchar(50) DEFAULT NULL,
  `jobstatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `nameInFull`, `managedBy`, `gender`, `post`, `dob`, `dateCreated`, `dateUpdated`, `centerId`, `thumb`, `nic`, `datejoined`, `jobtype`, `jobstatus`) VALUES
('SFKGLE000000', 'Merill Kelmere', 'SFKGLL000000', 'M', 'branchAdmin', '1986-01-05', '2018-09-29 03:28:08', '2018-09-29 13:15:22', NULL, 'uploads/SFLLLL000000.jpg', '596811744V', '2017-02-07', 'permenent', 'confirmed'),
('SFKGLE000001', 'Mattie Jeune', 'SFKGLE000000', 'F', 'lecturer', '2005-11-01', '2018-09-29 03:59:37', '2018-09-29 03:59:37', NULL, 'uploads/SFKGLE000001.jpg', '653222547V', '2017-02-10', 'contract', 'probation'),
('SFKGLE000005', 'Simon Athukorala', 'SFKGLE000000', 'M', 'lecturer', '1986-02-02', '2018-09-29 13:04:52', '2018-09-29 13:04:52', NULL, 'uploads/SFKGLE000005.jpg', '951864846V', '2018-09-05', 'internship', 'probation'),
('SFKGLE000006', 'Pasindu Wijerathna', 'SFKGLE000000', 'M', 'accountant', '2000-06-05', '2018-09-29 13:16:53', '2018-09-29 13:16:53', NULL, 'uploads/SFKGLE000006.jpg', '205156486V', '2018-09-04', 'permenent', 'confirmed'),
('SFKGLE000007', 'Nvidia Silva', 'SFKGLE000000', 'F', 'receptionst', '1996-07-05', '2018-09-30 05:55:32', '2018-09-30 05:55:32', NULL, 'uploads/SFKGLE000007.jpg', '961846564V', '2018-09-02', 'contract', 'probation'),
('SFKGLE000009', 'Bustin Weerarathne', 'SFKGLE000000', 'M', 'accountant', '1996-10-02', '2018-10-01 01:43:00', '2018-10-01 01:44:05', NULL, 'uploads/SFKGLE000009.jpg', '965247177V', '2017-01-02', 'permenent', 'confirmed'),
('SFKGLE000010', 'Jason Withanega', 'SFKGLE000000', 'M', 'accountant', '1996-02-01', '2018-10-01 22:21:38', '2018-10-01 22:21:38', NULL, 'uploads/SFKGLE000010.jpg', '963555213V', '2017-01-05', 'permenent', 'confirmed'),
('SFKGLE000011', 'ishani weeraathne', 'SFKGLE000000', 'M', 'lecturer', '1996-01-10', '2018-10-01 22:34:09', '2018-10-01 22:34:09', NULL, 'uploads/SFKGLE000011.jpg', '963125213V', '2017-06-05', 'permenent', 'confirmed'),
('SFKGLE000012', 'Jhon steve', 'SFKGLE000000', 'M', 'lecturer', '1996-11-01', '2018-10-01 23:04:21', '2018-10-01 23:04:21', NULL, 'uploads/SFKGLE000012.jpg', '962052213V', '2018-10-02', 'contract', 'probation'),
('SFKGLE000013', 'Aravindi Perera', 'SFKGLE000000', 'F', 'receptionst', '1996-02-10', '2018-10-02 02:19:38', '2018-10-02 02:19:38', NULL, 'uploads/SFKGLE000013.jpg', '962058213V', '2018-06-07', 'permenent', 'confirmed'),
('SFKGLE000014', 'Rashmi Perera', 'SFKGLE000000', 'F', 'lecturer', '1996-02-10', '2018-10-02 02:37:41', '2018-10-02 02:37:41', NULL, 'uploads/SFKGLE000014.png', '963555513V', '2017-10-06', 'partTime', 'probation'),
('SFKGLE000015', 'Sachinda Silva', 'SFKGLE000000', 'M', 'accountant', '1966-05-01', '2018-10-02 03:06:17', '2018-10-02 03:06:17', NULL, 'uploads/SFKGLE000015.jpg', '962154213V', '2018-06-07', 'partTime', 'probation');

-- --------------------------------------------------------

--
-- Table structure for table `staffattendence`
--

CREATE TABLE `staffattendence` (
  `staffID` char(12) NOT NULL,
  `present` tinyint(1) NOT NULL,
  `arrivalTime` time NOT NULL,
  `depatureTime` time NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffattendence`
--

INSERT INTO `staffattendence` (`staffID`, `present`, `arrivalTime`, `depatureTime`, `date`) VALUES
('SFKGAD001325', 0, '00:00:00', '00:00:00', '2018-08-25 03:43:35'),
('SFKGLE001552', 1, '07:08:00', '03:00:00', '2018-08-25 03:42:35'),
('SFKGLE001553', 1, '07:00:00', '06:00:00', '2018-08-25 03:42:35'),
('SFKGMA001563', 1, '08:00:00', '04:00:00', '2018-08-25 03:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `staffbankdetails`
--

CREATE TABLE `staffbankdetails` (
  `staffID` char(12) NOT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `accno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffbankdetails`
--

INSERT INTO `staffbankdetails` (`staffID`, `bank`, `accno`) VALUES
('SFKGLE000007', 'BOC ', '277 277 277 277 '),
('SFKGLE000015', 'BOC ', '277 277 277 277 '),
('SFKGLE000077', 'BOC', '255 2552555 255');

-- --------------------------------------------------------

--
-- Table structure for table `staffborrow`
--

CREATE TABLE `staffborrow` (
  `copyID` int(11) NOT NULL,
  `isbn` char(12) NOT NULL,
  `staffID` char(12) NOT NULL,
  `dateBorrowed` date NOT NULL,
  `dateReturned` date NOT NULL,
  `fine` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffborrow`
--

INSERT INTO `staffborrow` (`copyID`, `isbn`, `staffID`, `dateBorrowed`, `dateReturned`, `fine`) VALUES
(1, 'yh1246', 'SFKGLE001553', '2018-08-06', '2018-08-22', 0),
(2, 'b12031', 'SFKGLE001553', '2018-08-15', '2018-08-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffcontact`
--

CREATE TABLE `staffcontact` (
  `staffID` char(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `officephone` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffcontact`
--

INSERT INTO `staffcontact` (`staffID`, `email`, `officephone`, `address`) VALUES
('SFKGLE000000', 'mrosenstengel0@mayoclinic.com', 814987465, '8864 Swallow Avenue'),
('SFKGLE000001', 'mjeune4@va.gov', 814796743, '28 Declaration Road'),
('SFKGLE000005', 'Simon@simon.lk', 814687987, 'No 2, Simon Road, Kandy'),
('SFKGLE000006', 'pasi@sl.com', 815799878, 'No 5, Colombo road, kandy'),
('SFKGLE000007', 'nvidia@grapics.com', 716448679, 'No, Katugasthota Road, Kandy'),
('SFKGLE000009', 'Jus@gmail.com', 812266887, 'No, 277, Katugasthota Road, Kandy'),
('SFKGLE000010', 'json@gmail.com', 773787100, 'No. 2, Peradeniya Road, Kandy'),
('SFKGLE000011', 'ishani@gmail.com', 710412555, 'No. 2, Down street , Kandy'),
('SFKGLE000012', 'jonnysteve@gmail.com', 815498798, 'No. 77, Royal street , Kandy'),
('SFKGLE000013', 'aravindi@gmail.com', 711598451, 'No. 55, Ambethtenna Road , Kandy'),
('SFKGLE000014', 'rashmii@gmail.com', 771646121, 'No. 52, Kurunegala Road, Kandy'),
('SFKGLE000015', 'sachi@gmail.com', 710746378, 'No. 7, Amptitiya  Road, Kandy');

-- --------------------------------------------------------

--
-- Table structure for table `staffdumb`
--

CREATE TABLE `staffdumb` (
  `staffId` varchar(12) NOT NULL,
  `nameInFull` varchar(250) DEFAULT NULL,
  `nameWithInit` varchar(150) DEFAULT NULL,
  `managedBy` char(12) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `post` varchar(100) NOT NULL DEFAULT 'Staff Member',
  `dob` date NOT NULL,
  `nic` varchar(9) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `jobtype` varchar(50) DEFAULT NULL,
  `marital_stat` varchar(50) DEFAULT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `centerId` char(12) DEFAULT NULL,
  `thumb` varchar(150) NOT NULL DEFAULT 'images/icons/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffdumb`
--

INSERT INTO `staffdumb` (`staffId`, `nameInFull`, `nameWithInit`, `managedBy`, `gender`, `post`, `dob`, `nic`, `nationality`, `jobtype`, `marital_stat`, `dateUpdated`, `centerId`, `thumb`) VALUES
('SFKGLE000002', 'Bradly Cokly James', NULL, 'SFKGLE000001', 'F', 'accountant', '1996-02-02', '961343587', NULL, 'permenent', NULL, '2018-09-30 06:12:57', NULL, 'images/icons/user.png'),
('SFKGLE000003', 'Noman Matushevitz	', NULL, 'SFKGLE000000', 'M', 'accountant', '2000-02-02', '987524433', NULL, 'permenent', NULL, '2018-09-30 06:26:39', NULL, 'images/icons/user.png'),
('SFKGLE000004', 'NImala Boralugoda', NULL, 'SGKGLE000000', 'F', 'accountant', '1985-09-02', '851521215', NULL, 'permenent', NULL, '2018-09-30 06:24:46', NULL, 'images/icons/user.png'),
('SFKGLE000008', 'Kamal Kalana Silva', NULL, 'SFKGLE000000', 'M', 'accountant', '1996-10-02', '965245177', NULL, 'permenent', NULL, '2018-10-01 01:46:09', NULL, 'images/icons/user.png');

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
('SFKGLE001552', '0112', '2018-08-14'),
('SFKGLE001553', '0113', '2018-08-05'),
('SFKGMA001563', '0114', '2018-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `staffreserved`
--

CREATE TABLE `staffreserved` (
  `copyID` int(11) NOT NULL,
  `isbn` char(13) NOT NULL,
  `staffID` char(12) NOT NULL,
  `reservedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffreserved`
--

INSERT INTO `staffreserved` (`copyID`, `isbn`, `staffID`, `reservedDate`) VALUES
(5, 'td4556', 'SFKGLE001553', '2018-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `studcompletecourse`
--

CREATE TABLE `studcompletecourse` (
  `stuID` char(12) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `certificateIssueDate` date NOT NULL,
  `certificateNo` varchar(15) NOT NULL,
  `collectorName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studcompletecourse`
--

INSERT INTO `studcompletecourse` (`stuID`, `courseID`, `certificateIssueDate`, `certificateNo`, `collectorName`) VALUES
('STKGIT001452', '001', '2018-08-31', 'ct125555', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuID` char(12) NOT NULL,
  `nameWithInit` varchar(100) NOT NULL,
  `nameInFull` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(10) NOT NULL,
  `O/L` tinyint(1) NOT NULL,
  `A/L` tinyint(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumb` varchar(100) NOT NULL DEFAULT 'images/icons/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuID`, `nameWithInit`, `nameInFull`, `dob`, `nic`, `O/L`, `A/L`, `address`, `gender`, `dateAdded`, `dateUpdated`, `thumb`) VALUES
('STKGET001212', 'J.D. Salinger', 'Jerome David Salinger', '1919-08-15', '986774958V', 1, 0, '852/sd/weqw hgfds, vfd hgfd', 1, '2018-08-25 09:57:17', '2018-08-25 09:57:17', '0'),
('STKGET001214', 'E.E. Cummings', 'Edward Estlin Cummings', '1995-08-02', '958006968V', 1, 1, 'jhgf jhgf gfd hgf gfc hgf hgf', 1, '2018-08-25 09:57:17', '2018-08-25 09:57:17', '0'),
('STKGIT001284', 'E.B. White.', 'Elwyn Brooks white', '1997-08-15', '971508797V', 1, 1, 'kb/24/kegalle town kegalle.', 1, '2018-08-25 09:57:17', '2018-08-25 09:57:17', '0'),
('STKGIT001452', 'H.P. Lovecraft ', 'Howard Phillips Lovecraft', '1996-07-13', '965228473V', 1, 0, '524/A jiduhweurf jqhevd', 0, '2018-08-25 09:57:17', '2018-08-25 09:57:17', '0');

-- --------------------------------------------------------

--
-- Table structure for table `studentattendence`
--

CREATE TABLE `studentattendence` (
  `stuID` char(12) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `moduleID` varchar(10) NOT NULL,
  `present` tinyint(1) NOT NULL,
  `arivalTime` time NOT NULL,
  `depatureTime` time NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentattendence`
--

INSERT INTO `studentattendence` (`stuID`, `courseID`, `moduleID`, `present`, `arivalTime`, `depatureTime`, `date`) VALUES
('STKGET001212', '002', 'ET1012', 1, '02:00:00', '04:00:00', '2018-08-25 04:17:25'),
('STKGET001214', '002', 'ET1012', 1, '02:00:00', '04:00:00', '2018-08-25 04:18:35'),
('STKGIT001452', '001', 'IT1010', 1, '03:00:00', '05:00:00', '2018-08-25 04:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `studentborrow`
--

CREATE TABLE `studentborrow` (
  `copyID` int(11) NOT NULL,
  `isbn` char(13) NOT NULL,
  `studentID` char(12) NOT NULL,
  `dateBorrowed` date NOT NULL,
  `dateReturned` date NOT NULL,
  `fine` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentborrow`
--

INSERT INTO `studentborrow` (`copyID`, `isbn`, `studentID`, `dateBorrowed`, `dateReturned`, `fine`) VALUES
(3, 'yh12546', 'STKGIT001284', '2018-07-09', '2018-08-01', 10),
(4, 'b12031', 'STKGET001214', '2018-08-05', '2018-08-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentexam`
--

CREATE TABLE `studentexam` (
  `examID` varchar(10) NOT NULL,
  `stuID` char(12) NOT NULL,
  `marks` double NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentexam`
--

INSERT INTO `studentexam` (`examID`, `stuID`, `marks`, `dateCreated`) VALUES
('ET12', 'STKGET001212', 0, '2018-08-25 10:07:46'),
('IT10', 'STKGIT001284', 0, '2018-08-25 10:07:46');

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
('STKGET001212', '1121', '2018-07-18'),
('STKGIT001284', '1122', '2018-06-19'),
('STKGIT001452', '1123', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `studentpayment`
--

CREATE TABLE `studentpayment` (
  `paymentID` int(11) NOT NULL,
  `stuID` char(12) NOT NULL,
  `paidDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `billBookNo` varchar(20) NOT NULL,
  `paidAmount` double NOT NULL,
  `pendingAmount` double NOT NULL,
  `installmentType` varchar(50) NOT NULL,
  `totalAmount` double NOT NULL,
  `transactionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentpayment`
--

INSERT INTO `studentpayment` (`paymentID`, `stuID`, `paidDate`, `billBookNo`, `paidAmount`, `pendingAmount`, `installmentType`, `totalAmount`, `transactionID`) VALUES
(1, 'STKGET001214', '2018-08-25 06:08:01', '01', 20000, 80000, 'New', 100000, 0),
(2, 'STKGIT001284', '2018-08-25 06:46:23', '00125', 250000, 250000, 'New', 500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentregister`
--

CREATE TABLE `studentregister` (
  `stuID` char(12) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `dateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentregister`
--

INSERT INTO `studentregister` (`stuID`, `courseID`, `dateRegistered`) VALUES
('STKGET001212', '002', '2018-03-11 18:30:00'),
('STKGIT001284', '011', '2017-07-10 18:30:00'),
('STKGIT001452', '001', '2017-07-12 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `authId` tinyint(4) NOT NULL DEFAULT '1',
  `UID` char(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `gender` double NOT NULL DEFAULT '1',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `authId`, `UID`, `password`, `email`, `first_name`, `last_name`, `gender`, `dateCreated`) VALUES
(3, 1, 'SFKGAD001325', '$2y$10$C.6k/pf6QLhnXz6UZVHELOs3qDQT9oVyq4EXNrxAnGnFA3wA2pt9K', 'asiriofficial@gmail.com', '', '', 1, '2018-08-25 12:19:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignmodule`
--
ALTER TABLE `assignmodule`
  ADD PRIMARY KEY (`courseID`,`moduleID`);

--
-- Indexes for table `authlevels`
--
ALTER TABLE `authlevels`
  ADD PRIMARY KEY (`authId`),
  ADD UNIQUE KEY `authId` (`authId`),
  ADD UNIQUE KEY `authId_2` (`authId`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`isbn`,`name`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`centerID`);

--
-- Indexes for table `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`copyID`,`isbn`);

--
-- Indexes for table `courierdetails`
--
ALTER TABLE `courierdetails`
  ADD PRIMARY KEY (`courierNo`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD UNIQUE KEY `courseID` (`courseID`);

--
-- Indexes for table `coursecategory`
--
ALTER TABLE `coursecategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `coursematerial`
--
ALTER TABLE `coursematerial`
  ADD PRIMARY KEY (`cmID`,`moduleID`);

--
-- Indexes for table `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`staffID`,`name`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`userId`,`email`,`subscribed`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExamID`,`moduleID`,`courseID`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`stuID`,`guardianID`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`centerID`,`hallId`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquaryID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemNo`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`jobtypeid`);

--
-- Indexes for table `maincash`
--
ALTER TABLE `maincash`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `perform`
--
ALTER TABLE `perform`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`staffID`,`performanceID`);

--
-- Indexes for table `pettycash`
--
ALTER TABLE `pettycash`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`userId`,`phone`,`subscribed`,`SMSKey`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`examID`,`stuID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`varId`),
  ADD UNIQUE KEY `variable` (`variable`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staffattendence`
--
ALTER TABLE `staffattendence`
  ADD PRIMARY KEY (`staffID`,`date`);

--
-- Indexes for table `staffbankdetails`
--
ALTER TABLE `staffbankdetails`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staffborrow`
--
ALTER TABLE `staffborrow`
  ADD PRIMARY KEY (`copyID`,`isbn`,`staffID`,`dateBorrowed`);

--
-- Indexes for table `staffcontact`
--
ALTER TABLE `staffcontact`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staffdumb`
--
ALTER TABLE `staffdumb`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `stafflibrarymember`
--
ALTER TABLE `stafflibrarymember`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staffreserved`
--
ALTER TABLE `staffreserved`
  ADD PRIMARY KEY (`copyID`,`isbn`,`staffID`,`reservedDate`);

--
-- Indexes for table `studcompletecourse`
--
ALTER TABLE `studcompletecourse`
  ADD PRIMARY KEY (`stuID`,`courseID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuID`);

--
-- Indexes for table `studentattendence`
--
ALTER TABLE `studentattendence`
  ADD PRIMARY KEY (`stuID`,`courseID`,`moduleID`);

--
-- Indexes for table `studentborrow`
--
ALTER TABLE `studentborrow`
  ADD PRIMARY KEY (`copyID`,`isbn`,`studentID`,`dateBorrowed`);

--
-- Indexes for table `studentexam`
--
ALTER TABLE `studentexam`
  ADD PRIMARY KEY (`examID`,`stuID`);

--
-- Indexes for table `studentlibrarymember`
--
ALTER TABLE `studentlibrarymember`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `studentpayment`
--
ALTER TABLE `studentpayment`
  ADD PRIMARY KEY (`paymentID`,`transactionID`);

--
-- Indexes for table `studentregister`
--
ALTER TABLE `studentregister`
  ADD PRIMARY KEY (`stuID`,`courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authlevels`
--
ALTER TABLE `authlevels`
  MODIFY `authId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courierdetails`
--
ALTER TABLE `courierdetails`
  MODIFY `courierNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coursematerial`
--
ALTER TABLE `coursematerial`
  MODIFY `cmID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maincash`
--
ALTER TABLE `maincash`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pettycash`
--
ALTER TABLE `pettycash`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `varId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

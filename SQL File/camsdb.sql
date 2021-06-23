-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 10:25 AM
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
-- Database: `camsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmapplications`
--

CREATE TABLE `tbladmapplications` (
  `ID` int(11) NOT NULL,
  `UserId` char(10) NOT NULL,
  `CourseApplied` varchar(120) DEFAULT NULL,
  `FatherName` varchar(120) DEFAULT NULL,
  `MotherName` varchar(120) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Nationality` varchar(120) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Category` varchar(120) DEFAULT NULL,
  `CorrespondenceAdd` varchar(350) NOT NULL,
  `PermanentAdd` varchar(350) NOT NULL,
  `SecondaryBoard` varchar(120) DEFAULT NULL,
  `SecondaryBoardyop` varchar(120) DEFAULT NULL,
  `SecondaryBoardper` varchar(120) DEFAULT NULL,
  `SecondaryBoardstream` varchar(120) DEFAULT NULL,
  `SSecondaryBoard` varchar(120) DEFAULT NULL,
  `SSecondaryBoardyop` varchar(120) DEFAULT NULL,
  `SSecondaryBoardper` varchar(120) DEFAULT NULL,
  `SSecondaryBoardstream` varchar(120) DEFAULT NULL,
  `GraUni` varchar(120) DEFAULT NULL,
  `GraUniyop` varchar(120) DEFAULT NULL,
  `GraUnidper` varchar(120) DEFAULT NULL,
  `GraUnistream` varchar(120) DEFAULT NULL,
  `PGUni` varchar(120) DEFAULT NULL,
  `PGUniyop` varchar(120) DEFAULT NULL,
  `PGUniper` varchar(120) DEFAULT NULL,
  `PGUnistream` varchar(120) DEFAULT NULL,
  `Declaration` varchar(120) DEFAULT NULL,
  `Signature` varchar(120) DEFAULT NULL,
  `CourseApplieddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` varchar(255) NOT NULL,
  `AdminStatus` varchar(20) DEFAULT NULL,
  `AdminRemarkDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UserPic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmapplications`
--

INSERT INTO `tbladmapplications` (`ID`, `UserId`, `CourseApplied`, `FatherName`, `MotherName`, `DOB`, `Nationality`, `Gender`, `Category`, `CorrespondenceAdd`, `PermanentAdd`, `SecondaryBoard`, `SecondaryBoardyop`, `SecondaryBoardper`, `SecondaryBoardstream`, `SSecondaryBoard`, `SSecondaryBoardyop`, `SSecondaryBoardper`, `SSecondaryBoardstream`, `GraUni`, `GraUniyop`, `GraUnidper`, `GraUnistream`, `PGUni`, `PGUniyop`, `PGUniper`, `PGUnistream`, `Declaration`, `Signature`, `CourseApplieddate`, `AdminRemark`, `AdminStatus`, `AdminRemarkDate`, `UserPic`) VALUES
(1, '1', 'B.Tech(Information Technology)', 'Ragu', 'Prasad', '0000-00-00', 'Hindu', 'Male', 'OBC', '', '', 'CBSE', '1998', '56', 'science', 'CBSE', '2000', '78', 'science', 'B.Tech', '2004', '87', 'CS', 'MCA', '2008', '67', 'fgj', 'Sarita', 'cghfhg', '2019-02-19 11:38:01', 'Done', '2', '2019-03-03 07:09:07', NULL),
(4, '7', 'B.Tech(Information Technology)', 'Ankush', 'Garima', '1986-05-01', 'Indian', 'Male', 'General', '', '', 'CBSE', '2003', '72', 'Science', 'CBSE', '2005', '56', 'PCM', 'B.tech(UPTU)', '2010', '77', 'CS', 'M.Tech(UPTU)', '2012', '88', 'CS', 'grye', 'trhrt', '2019-02-20 06:53:28', 'Selected', '2', '2019-03-03 07:09:09', '1c63d436c71604732567cf28437d5d20.jpg'),
(5, '4', 'MSC', 'Abhishek Srivastav', 'Nirmala Srivastav', '1987-07-08', 'Indian', 'Male', 'OBC', 'B3/4 shivala varanasi', 'B3/4 shivala varanasi', 'CBSE', '2005', '72', 'Science', 'CBSE', '2007', '89', 'PCM', 'UPTU', '2011', '78', 'IT', 'UPTU', '2013', '65', 'IT', 'rytye', 'Ayush', '2019-02-22 09:08:10', '', '1', '2019-02-26 17:54:59', 'b9fb9d37bdf15a699bc071ce49baea53.jpg'),
(6, '9', 'MCA', 'ABC', 'XYZ', '1995-09-01', 'India', 'Male', 'General', 'New delhi', 'New delhi', 'CBSE', '2010', '52', 'SCIENCE', 'CBSE', '2012', '60', 'PCM', 'UGC', '2016', '54', 'IT', '', '', '', '', NULL, 'DEMO', '2019-03-03 07:30:15', 'Your application has been selected', '1', '2019-03-03 07:31:32', '9cc6b93fa4d8817eeccfb35314fb9a70.png'),
(7, '10', 'B.COM', 'abc', 'xyz', '1995-09-09', 'Indian', 'Male', 'General', 'New Delhi India', 'New Delhi India', 'cbse', '2010', '65', 'science', 'cbse', '2012', '56', 'pcm', '', '', '', '', '', '', '', '', NULL, 'Test', '2019-03-03 07:50:43', 'Your application has been selected.', '1', '2019-03-03 07:56:57', '9cc6b93fa4d8817eeccfb35314fb9a70.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Admin', 'Admin', 876545789, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-02-20 04:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `ID` int(11) NOT NULL,
  `CourseName` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`ID`, `CourseName`) VALUES
(1, 'B.Tech(Mechanical Engineering)'),
(2, 'Agriculture'),
(3, 'MCA'),
(4, 'MSC'),
(5, 'B.COM'),
(6, 'BSC'),
(7, 'MCOM'),
(8, 'Fashion Desinging'),
(9, 'CA'),
(10, 'TAT'),
(11, 'PHD');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE `tbldocument` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TransferCertificate` varchar(120) DEFAULT NULL,
  `TenMarksheeet` varchar(120) DEFAULT NULL,
  `TwelveMarksheet` varchar(120) DEFAULT NULL,
  `GraduationCertificate` varchar(120) DEFAULT NULL,
  `PostgraduationCertificate` varchar(120) DEFAULT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocument`
--

INSERT INTO `tbldocument` (`ID`, `UserID`, `TransferCertificate`, `TenMarksheeet`, `TwelveMarksheet`, `GraduationCertificate`, `PostgraduationCertificate`, `UploadDate`) VALUES
(1, 1, '377a20460f928e7dd57ac8db16cbc78f.jpg', 'a02079b7273f56564edb9a29c9519430.jpg', 'a02079b7273f56564edb9a29c9519430.jpg', 'ea9152003043160c562e438f9dcde10b.jpg', '57e82a83bac1c55454c788f9986966d6.jpg', '2019-02-26 09:32:04'),
(4, 9, '735c8d693bdef97958ba38ef851a4555.png', '8e00391e23437af44e265c4f647b634e.png', '8e00391e23437af44e265c4f647b634e.png', '', '', '2019-03-03 07:42:42'),
(7, 10, '8e00391e23437af44e265c4f647b634e.png', '2399f14b2718cf602dbe7e9a2d9aa928.png', '735c8d693bdef97958ba38ef851a4555.png', '', '', '2019-03-03 07:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(11) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `Decription` varchar(350) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `Title`, `Decription`, `CreationDate`) VALUES
(2, 'Notice Regarding Form Application', 'Dear Candidates,\r\nSubmit your forms within a week(27-Feb-2019 to 06-Marc-2019)  between 9 am to 4 pm', '2019-02-27 05:54:25'),
(3, 'Last date of application will be 31 March2019', 'This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. ', '2019-03-03 07:34:53'),
(4, 'Test notice 2019', 'This is sample text for testing.This is sample text for testing.This is sample text for testing.This is sample text for testing.This is sample text for testing.This is sample text for testing.', '2019-03-03 07:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(60) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `PostingDate`) VALUES
(1, 'Anuj', 'kumar', 6789054321, 'anuj@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-02 18:04:21'),
(2, 'Ramesh', 'Ranjan', 9876598753, 'ramesh@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-02 18:04:21'),
(3, 'Himanshu', 'Pandey', 9999857999, 'sarita@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-02 18:04:21'),
(4, 'Ayush', 'Mehr', 78965559, 'ayush@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-02 18:04:21'),
(5, 'Guru', 'Singh', 8280599425, 'guru@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-02 18:04:21'),
(6, 'Test', 'asjdhsaj', 4234233333, 'dsadas@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2019-03-02 18:04:21'),
(7, 'fsgd', 'sdgsdg', 2342342342, 'fdsfdf@ggm.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-03-02 18:04:21'),
(8, 'fwe', 'rwerwe', 21312123, 'dadasd@gg.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-03-02 18:04:21'),
(9, 'demo', 'Demo', 3534543543, 'testuser@demo.com', 'f925916e2754e5e03f75dd58a5733251', '2019-03-03 07:26:39'),
(10, 'Test', 'usertest', 2234234324, 'testuser@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-03-03 07:48:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmapplications`
--
ALTER TABLE `tbladmapplications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldocument`
--
ALTER TABLE `tbldocument`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmapplications`
--
ALTER TABLE `tbladmapplications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbldocument`
--
ALTER TABLE `tbldocument`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

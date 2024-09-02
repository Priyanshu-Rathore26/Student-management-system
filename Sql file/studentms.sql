-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 03:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8878405757, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-11-03 15:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int(5) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `ClassName`, `Section`, `CreationDate`) VALUES
(1, 'BCA', 'A', '2023-11-03 15:36:26'),
(2, 'BCA', 'B', '2023-11-03 15:36:37'),
(3, 'BSC', 'A', '2023-11-03 15:36:49'),
(4, 'BSC', 'B', '2023-11-03 15:37:00'),
(5, 'BSC', 'C', '2023-11-03 15:37:09'),
(6, 'MCA', 'A', '2023-11-03 15:37:17'),
(7, 'MSC', 'A', '2023-11-03 15:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` mediumtext DEFAULT NULL,
  `ClassId` int(10) DEFAULT NULL,
  `NoticeMsg` mediumtext DEFAULT NULL,
  `N0A1` int(2) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Lastdate` date DEFAULT NULL,
  `File` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `NoticeTitle`, `ClassId`, `NoticeMsg`, `N0A1`, `CreationDate`, `Lastdate`, `File`) VALUES
(1, 'Marks of Unit Test', 1, 'Meet your class teacher for seeing copies of unit test', 0, '2023-11-03 16:00:17', NULL, NULL),
(2, 'TCS Mock Test Reminder', 6, 'TCS mock test is scheduled from 1/nov/2023 ', 0, '2023-11-03 16:03:30', NULL, NULL),
(3, 'Holidays', 2, 'Diwali holidays start from 5/nov/2023', 0, '2023-11-03 16:04:19', NULL, NULL),
(4, 'MidSem Assesment Alert', 1, 'Please complete  your midsem-1 assignment file questions are given below file', 1, '2023-11-03 16:06:36', '2023-11-30', '84e3787fdbaee30d213a1fb40e0e888e1699027596.pdf'),
(5, 'MidSem Assesment Alert', 2, 'Please complete your assignment and submit before last date . do not wait for last date', 1, '2023-11-03 16:08:01', '2023-12-31', 'e9995d844084f4a795c23b99a805831f1699027681.pdf'),
(6, 'Project Submission Alert', 6, 'Dear Student , complete your project file , questions are given in file. complete file and submit it asap ', 1, '2023-11-03 16:09:47', '2024-01-31', '420b6164be9e3581f2ba07bdb28664e21699027787.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div style=\"text-align: start;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">Welcome to the Student Management System (SMS), where we are dedicated to revolutionizing the way educational institutions manage student data and communication. Our platform is designed to simplify the administrative tasks associated with student record management, ensuring efficiency, transparency, and security.&nbsp; Our mission is to simplify the management of student data, enhance communication within the educational institution, and provide a platform for both students and administrators to streamline administrative tasks.</span></font><br></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'Raisen Road, Near Hanuman Mandir, Kalchuri Nagar, Bhopal , Madhya Pradesh 462022', 'StudentMS@gmail.com', 7415399713, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

CREATE TABLE `tblpublicnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` varchar(200) DEFAULT NULL,
  `NoticeMessage` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpublicnotice`
--

INSERT INTO `tblpublicnotice` (`ID`, `NoticeTitle`, `NoticeMessage`, `CreationDate`) VALUES
(1, 'Holidays Alert', 'Dear Students, Diwali holidays start from 5th Nov to 18 Nov 2023', '2023-11-03 16:11:44'),
(2, 'Exam Alert', 'Exam Dates have been Announced', '2023-11-03 16:13:37'),
(3, '2nd Sem Result', 'Coming soon.....', '2023-11-03 16:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int(10) NOT NULL,
  `StudentName` varchar(200) DEFAULT NULL,
  `StudentEmail` varchar(200) DEFAULT NULL,
  `StudentClass` varchar(100) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `FatherName` mediumtext DEFAULT NULL,
  `MotherName` mediumtext DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `AltenateNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `StudentName`, `StudentEmail`, `StudentClass`, `Gender`, `DOB`, `StuID`, `FatherName`, `MotherName`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`, `DateofAdmission`) VALUES
(1001, 'Priyanshu Rathore', 'priyanshu@gmail.com', '6', 'Male', '2001-07-26', '2023ST1001', 'Munna Rathore', 'Mamta Rathore', 8878405757, 9893218703, 'Betul, M.P.', 'prince', '2077e4a6bafa9b4e7b55e1fff16818af', '4710615dd908220182e49db9e374852a1699026019.jpg', '2023-11-03 15:40:19'),
(1002, 'Pranjal Gupta', 'Pranjal@gmail.com', '1', 'Male', '2000-08-05', '2023ST1002', 'RAJESH GUPTA', 'ALKA GUPTA', 7000699241, 9826846845, 'NARSINGHPUR', 'pranjal', '1c1c57cbbb92ca1f4eaf9060fe18c542', '547c9ff1d973aaa5800d47c2e4c842b81699026583jpeg', '2023-11-03 15:49:43'),
(1003, 'Nikita Uphar', 'uphar@gmail.com', '1', 'Female', '2023-11-02', '2023ST1003', 'pta ni', 'pta ni', 9006975257, 0, 'Patna', 'uphar', '5118f757dc5a03d6dfa05d4a3b8bf156', 'd38342b2f2f40fd8fdc1595767de62041699026909.png', '2023-11-03 15:55:09'),
(1004, 'Prakhar Nema', 'prakhar@gmail.com', '2', 'Male', '2023-11-02', '2023ST1004', 'pta ni', 'pta ni', 7974214674, 0, 'Bhopal', 'prakhar', 'a0df7b431b2dba83d26675e676a8cb7c', '5abd7f7eb3c3651deb38d2ac89672af81699027104.png', '2023-11-03 15:58:24'),
(1005, 'Khushi Nagar', 'khushi@gmail.com', '3', 'Female', '2023-11-01', '2023ST1005', 'ni pta', 'ni pta', 9926959038, 0, 'pta ni', 'khushi', '2d75a833de8a38dff78ffb4183cd8672', 'ca39b70879bc43b855ed31cda900d4f81699029118.png', '2023-11-03 16:31:58'),
(1006, 'Praveen Modi', 'praveen@gmail.com', '6', 'Male', '2001-07-26', '2023ST1006', 'NARENDRA MODI', 'NEETA MODI', 8319099897, 8103488015, 'GUNA', 'modi', 'caacd35a900b68a8c4347d5c8564cc3d', 'cd8b75c235de3d092790b94b3ccbc5b71699028623.png', '2023-11-03 16:23:43'),
(1007, 'TARUN KUSHWAH', 'tarun@gmail.com', '7', 'Male', '2001-11-15', '2023ST1007', 'RAJMAL KUSHWAH', 'SUNITA KUSHWAH', 7987364898, 9303103478, ' BERASIA', 'tarun', '4ec6b242322a0139def69c6380c7aa27', '453fafc7f319d636eee43ae2520e1ec71699030731.png', '2023-11-03 17:00:36'),
(1008, 'Devansh Dubey', 'devansh@gmail.com', '1', 'Male', '2023-11-10', '2023ST1008', 'Bade Dubey ji', 'Mata ji', 9179888152, 0, 'Katni', 'dev', 'e77989ed21758e78331b20e477fc5582', 'e7d46786c1b4f570bdf9d68a6a0d0e851699031258.png', '2023-11-03 17:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbltempstudent`
--

CREATE TABLE `tbltempstudent` (
  `id` int(10) NOT NULL,
  `StudentName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `StudentEmail` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `StudentClass` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Gender` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `FatherName` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MotherName` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `SContact` bigint(20) DEFAULT NULL,
  `FContact` bigint(20) DEFAULT NULL,
  `Address` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Username` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Image` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltempstudent`
--

INSERT INTO `tbltempstudent` (`id`, `StudentName`, `StudentEmail`, `StudentClass`, `Status`, `Gender`, `DOB`, `FatherName`, `MotherName`, `SContact`, `FContact`, `Address`, `Username`, `Password`, `Image`) VALUES
(1, 'Priyansh Rajput', 'priyansh@gmail.com', '6', 0, 'Male', '1998-11-09', 'HARGOVIND SINGH', 'NEELIMA RAJPUT', 8109451235, 7000727165, 'Itarsi', 'priyansh', '3125ce2ba70e11b089ef35456f3d8847', '2ed55ee2c8ddec99b188bbac52e1e0dc1699030296.png'),
(2, 'PARAS SAHU', 'paras@gmail.com', '6', 0, 'Male', '2002-02-02', 'BRINDRAVAN SAHU', 'LEELA VATI', 7024780077, 7024797278, 'Vidisha', 'paras', '87985799d410ead3564453e2d9371ad5', '49728f74d46d930b1d18588f0c43ec491699030481.png'),
(3, 'TARUN KUSHWAH', 'tarun@gmail.com', '7', 1, 'Male', '2001-11-15', 'RAJMAL KUSHWAH', 'SUNITA KUSHWAH', 7987364898, 9303103478, ' BERASIA', 'tarun', '4ec6b242322a0139def69c6380c7aa27', '453fafc7f319d636eee43ae2520e1ec71699030731.png'),
(4, 'Devansh Dubey', 'devansh@gmail.com', '1', 1, 'Male', '2023-11-10', 'Bade Dubey ji', 'Mata ji', 9179888152, 0, 'Katni', 'dev', 'e77989ed21758e78331b20e477fc5582', 'e7d46786c1b4f570bdf9d68a6a0d0e851699031258.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltempstudent`
--
ALTER TABLE `tbltempstudent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `tbltempstudent`
--
ALTER TABLE `tbltempstudent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

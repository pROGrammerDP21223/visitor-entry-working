-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 01:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(5) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` char(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin user', 'admin', 7898799797, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-12-05 06:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(120) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `categoryName`, `creationDate`) VALUES
(1, 'Maid', '2022-12-04 18:09:59'),
(2, 'NewsPaper', '2022-12-04 18:10:12'),
(3, 'Cook', '2022-12-04 18:10:26'),
(4, 'Milkman', '2022-12-04 18:10:55'),
(5, 'Driver', '2022-12-04 18:11:08'),
(6, 'Gardener', '2022-12-04 18:11:18'),
(8, 'Car Cleaner', '2022-12-04 18:14:15'),
(9, 'Other', '2022-12-04 18:14:34'),
(10, 'Guest', '2022-12-04 18:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `ID` int(11) NOT NULL,
  `ResidentID` varchar(255) NOT NULL,
  `ResidentName` varchar(255) NOT NULL,
  `MobileNumber` bigint(20) NOT NULL,
  `EmailAdd` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`ID`, `ResidentID`, `ResidentName`, `MobileNumber`, `EmailAdd`, `CreationDate`) VALUES
(1, 'A21206', 'Dhananjay', 9119510726, 'd@mipl.co.in', '2024-03-27 04:36:44'),
(2, 'A1202', 'Dhananjay', 9119510726, 'dp@gmail.com', '2024-03-27 04:38:01'),
(3, 'sdr44', 'wetgwete', 4543535345, 'punewebsupport@mipl.co.in', '2024-03-27 07:28:47'),
(4, 'sdr44', 'wetgwete', 4543535345, 'punewebsupport@mipl.co.in', '2024-03-27 07:29:53'),
(5, 'd4444', 'dgh', 2121221212, 'punewebsupport@mipl.co.in', '2024-03-27 07:30:05'),
(6, 'A21206', 'Dhananjay Phirke', 9119510726, 'dhananjayphirke@gmail.com', '2024-03-27 08:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblresidentlogin`
--

CREATE TABLE `tblresidentlogin` (
  `ID` int(11) NOT NULL,
  `ResidentID` varchar(255) NOT NULL,
  `Password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresidentlogin`
--

INSERT INTO `tblresidentlogin` (`ID`, `ResidentID`, `Password`) VALUES
(1, 'sdr44', 'f6e15f3bebaf48d86f9c0bbae8ee959c'),
(2, 'sdr44', 'd5a4f3bb1bf4dd7c63e07b4019b7c367'),
(3, 'd4444', 'e5d869afc45f6fa1a49a752aa071d921'),
(4, 'A21206', 'd70882881af8a19aef4606db55defd00');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `ID` int(5) NOT NULL,
  `categoryName` varchar(120) DEFAULT NULL,
  `VisitorName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `EmailAdd` varchar(255) NOT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `WhomtoMeet` varchar(120) DEFAULT NULL,
  `ReasontoMeet` varchar(120) DEFAULT NULL,
  `ResidentID` varchar(255) NOT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp(),
  `remark` varchar(255) DEFAULT NULL,
  `outtime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`ID`, `categoryName`, `VisitorName`, `MobileNumber`, `EmailAdd`, `Address`, `WhomtoMeet`, `ReasontoMeet`, `ResidentID`, `EnterDate`, `remark`, `outtime`, `status`) VALUES
(1, 'Guest', 'Amit Kumar', 1212121233, '', 'H 1223 Sector 15 noida UP', 'Anuj Kumar', 'Personal', '', '2022-12-04 18:24:29', 'NA', '2022-12-04 18:36:04', '0'),
(2, 'Milkman', 'Sunny', 1425363625, '', 'NA', 'Amit ', 'Milk Distribution', '', '2022-12-04 18:27:21', 'Your Milkman has been out', '2022-12-05 05:49:09', '0'),
(3, 'Driver', 'Sukhdev Singh', 1425362514, '', 'NA', 'Amit Kumar', 'Driver', '', '2022-12-04 19:28:04', NULL, NULL, '0'),
(4, 'Guest', 'Dhananjay', 9119510726, 'dhananjayphirke@gmail.com', 'Loni Kalbhor', 'Kinge', 'Relative', 'A21206', '2024-03-20 12:20:20', NULL, NULL, '0'),
(11, 'Maid', 'retwetge', 0, 'ewgewge', 'wegwegwe', 'ewgwege', 'wgewgew', 'A21206', '2024-03-27 06:16:14', NULL, '2024-03-27 10:04:52', '1'),
(12, 'Driver', 'safasf', 0, 'safasf', 'asfasf', 'asfsafaf', 'safsaf', 'A21206', '2024-03-27 06:19:39', NULL, '2024-03-27 10:05:12', '1'),
(13, 'Guest', 'NEWDP', 46919293, 'punewebsupport@mipl.co.in', 'LLOni', 'Bhai', 'asach', 'A21206', '2024-03-27 10:01:23', NULL, '2024-03-27 10:04:55', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitorpass`
--

CREATE TABLE `tblvisitorpass` (
  `ID` int(5) NOT NULL,
  `passnumber` bigint(20) DEFAULT NULL,
  `categoryName` varchar(120) DEFAULT NULL,
  `VisitorName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `EmailAdd` varchar(255) NOT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `ResidentID` varchar(255) NOT NULL,
  `passDetails` varchar(120) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `fromDate` date DEFAULT NULL,
  `toDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvisitorpass`
--

INSERT INTO `tblvisitorpass` (`ID`, `passnumber`, `categoryName`, `VisitorName`, `MobileNumber`, `EmailAdd`, `Address`, `ResidentID`, `passDetails`, `creationDate`, `fromDate`, `toDate`) VALUES
(1, 94395973, 'Car Cleaner', 'Amit', 1414253625, '', 'NA', 'A512', 'For Car Cleaning', '2022-12-04 19:01:30', '2022-12-06', '2023-01-31'),
(2, 94395972, 'Maid', 'Savita', 1233211230, '', 'NA', 'Q707', 'Maid', '2022-12-04 19:04:40', '2022-12-10', '2023-03-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblresidentlogin`
--
ALTER TABLE `tblresidentlogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisitorpass`
--
ALTER TABLE `tblvisitorpass`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblresidentlogin`
--
ALTER TABLE `tblresidentlogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblvisitorpass`
--
ALTER TABLE `tblvisitorpass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

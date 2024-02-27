-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 09:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maji`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountId` int(11) NOT NULL,
  `accountEmail` varchar(50) NOT NULL,
  `accountPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountId`, `accountEmail`, `accountPassword`) VALUES
(2, '65070022@kmitl.ac.th', '123456'),
(1, '65070038@kmitl.ac.th', 'Peam582546');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custSurname` varchar(255) NOT NULL,
  `custPhone` varchar(255) NOT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `custName`, `custSurname`, `custPhone`, `accountId`) VALUES
(1, 'Jeena', 'Kerdkaew', '0952513965', 1),
(2, 'Tanggy', 'hello', '0958547852', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `tableTypeId` varchar(2) NOT NULL,
  `appointmentDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `peopleReserved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationId`, `custId`, `tableTypeId`, `appointmentDateTime`, `peopleReserved`) VALUES
(1, 1, 'A1', '2024-02-28 01:19:07', 2),
(2, 2, 'B1', '2024-02-28 01:37:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tabletype`
--

CREATE TABLE `tabletype` (
  `tableTypeId` varchar(2) NOT NULL,
  `tableSize` enum('2','4','6','8') NOT NULL,
  `tableTypeStatus` enum('ว่าง','ไม่ว่าง') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabletype`
--

INSERT INTO `tabletype` (`tableTypeId`, `tableSize`, `tableTypeStatus`) VALUES
('A1', '2', 'ไม่ว่าง'),
('A2', '2', 'ไม่ว่าง'),
('A3', '2', 'ไม่ว่าง'),
('A4', '2', 'ไม่ว่าง'),
('A5', '2', 'ไม่ว่าง'),
('B1', '4', 'ไม่ว่าง'),
('B2', '4', 'ไม่ว่าง'),
('B3', '4', 'ไม่ว่าง'),
('B4', '4', 'ว่าง'),
('B5', '4', 'ว่าง'),
('C1', '6', 'ว่าง'),
('C2', '6', 'ไม่ว่าง'),
('C3', '6', 'ไม่ว่าง'),
('D1', '8', 'ไม่ว่าง'),
('D2', '8', 'ไม่ว่าง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountId`),
  ADD UNIQUE KEY `UN_account` (`accountEmail`,`accountPassword`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`),
  ADD UNIQUE KEY `UN_accountId` (`accountId`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `FK_custId_reservation` (`custId`),
  ADD KEY `FK_tableTypeId_reservation` (`tableTypeId`);

--
-- Indexes for table `tabletype`
--
ALTER TABLE `tabletype`
  ADD PRIMARY KEY (`tableTypeId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_accountId` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountId`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_custId_reservation` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`),
  ADD CONSTRAINT `FK_tableTypeId_reservation` FOREIGN KEY (`tableTypeId`) REFERENCES `tabletype` (`tableTypeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

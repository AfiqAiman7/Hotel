-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 10:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` char(6) NOT NULL,
  `admin_pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_pass`) VALUES
('123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Member_ID` char(6) NOT NULL,
  `Member_Name` varchar(35) NOT NULL,
  `Member_Birth` date NOT NULL,
  `Member_Gender` char(1) NOT NULL,
  `Member_PhoneNum` varchar(12) NOT NULL,
  `Member_Address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Member_ID`, `Member_Name`, `Member_Birth`, `Member_Gender`, `Member_PhoneNum`, `Member_Address`) VALUES
('1001', 'MIRZA', '2002-06-16', 'M', '0176547890', 'No23,MANDUNG,SEKSYEN 7, SHAH ALAM, SELANGOR');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` char(6) NOT NULL,
  `Payment_Method` text NOT NULL,
  `Total` float NOT NULL,
  `Invoice_No` char(8) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Reservation_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_ID` char(6) NOT NULL,
  `Member_ID` char(6) NOT NULL,
  `Room_ID` char(6) NOT NULL,
  `Check_In` date NOT NULL,
  `Check_Out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_ID` char(6) NOT NULL,
  `Room_Type` text NOT NULL,
  `Room_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` char(10) NOT NULL,
  `Staff_Name` varchar(35) NOT NULL,
  `Staff_Pass` varchar(35) NOT NULL,
  `Staff_PhoneNum` char(12) NOT NULL,
  `Building_ID` char(5) NOT NULL,
  `Job_Title` text DEFAULT 'Room Keeper',
  `admin_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_Name`, `Staff_Pass`, `Staff_PhoneNum`, `Building_ID`, `Job_Title`, `admin_ID`) VALUES
('ST4562MS', 'MIRZA', '321', '0178796396', 'AI259', 'Maintenance Staff', '123'),
('ST5454RK', 'DANIAL', '123', '0133659874', 'CS230', 'Room Keeper', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Reservation_ID` (`Reservation_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Customer_ID` (`Member_ID`,`Room_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `admin_id` (`admin_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

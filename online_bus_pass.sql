-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 10:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_bus_pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `Password`, `Photo`, `Date`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '254286.png', '2018-01-08 12:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `days_detail`
--

CREATE TABLE `days_detail` (
  `id` int(11) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Days` varchar(20) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days_detail`
--

INSERT INTO `days_detail` (`id`, `Month`, `Days`, `Date`) VALUES
(1, 'One Month', '30', '2018-01-10 10:05:43'),
(2, 'Three Month', '90', '2018-01-10 10:05:43'),
(3, 'Six Month', '180', '2018-01-10 10:07:09'),
(4, 'One Year', '365', '2018-01-10 10:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `from_stop`
--

CREATE TABLE `from_stop` (
  `id` int(11) NOT NULL,
  `From_stop` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `from_stop`
--

INSERT INTO `from_stop` (`id`, `From_stop`, `Date`) VALUES
(1, 'Central Bus Station (C.B.S-Old)', '2018-01-08 16:59:05'),
(2, 'Central Bus Station (C.B.S-new)', '2018-01-08 16:59:16'),
(3, 'Nashikroad', '2018-01-08 16:59:44'),
(4, 'Shalimar', '2018-01-10 10:44:40'),
(5, 'Nimani', '2018-01-15 12:22:01'),
(7, 'Shramik Nagar', '2018-02-28 10:39:18'),
(8, 'Pandavleni', '2018-02-28 10:39:29'),
(9, 'Deolali Gaon', '2018-02-28 10:39:41'),
(11, 'Pathardi Gaon', '2018-02-28 10:40:07'),
(12, 'Mukt vidy pith', '2018-02-28 10:40:27'),
(14, 'Satpur', '2018-02-28 10:40:49'),
(15, 'K K Wagh', '2018-02-28 10:41:00'),
(16, 'Adgaon', '2018-02-28 10:41:09'),
(17, 'Mhasrul', '2018-03-05 12:57:48'),
(20, 'nimani panchvati', '2020-01-12 13:22:54'),
(21, 'jalgaon', '2020-01-12 13:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `pass_amount_details`
--

CREATE TABLE `pass_amount_details` (
  `id` int(11) NOT NULL,
  `From_stop` varchar(50) NOT NULL,
  `To_stop` varchar(50) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Days` varchar(20) NOT NULL,
  `Amount` varchar(10) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_amount_details`
--

INSERT INTO `pass_amount_details` (`id`, `From_stop`, `To_stop`, `Month`, `Days`, `Amount`, `Date`) VALUES
(2, 'Central Bus Station (C.B.S-Old)', 'Nashikroad', 'One Month', '30', '500', '2018-01-10 10:41:28'),
(3, 'Central Bus Station (C.B.S-Old)', 'Nashikroad', 'Three Month', '90', '1500', '2018-01-10 10:41:49'),
(4, 'Central Bus Station (C.B.S-Old)', 'Nashikroad', 'Six Month', '180', '3000', '2018-01-10 10:42:23'),
(5, 'Central Bus Station (C.B.S-Old)', 'Nashikroad', 'One Year', '365', '6000', '2018-01-10 10:43:03'),
(6, 'Shalimar', 'Nashikroad', 'One Month', '30', '420', '2018-01-10 10:52:56'),
(7, 'Shalimar', 'Nashikroad', 'Three Month', '90', '1260', '2018-01-10 10:54:19'),
(8, 'Shalimar', 'Nashikroad', 'Six Month', '180', '2520', '2018-01-10 10:54:44'),
(9, 'Shalimar', 'Nashikroad', 'One Year', '365', '5040', '2018-01-10 10:55:01'),
(10, 'Nashikroad', 'Shalimar', 'One Month', '30', '400', '2018-01-11 16:18:41'),
(11, 'Nashikroad', 'Central Bus Station (C.B.S-Old)', 'One Month', '30', '450', '2018-01-11 16:18:54'),
(12, 'Nashikroad', 'Shalimar', 'Three Month', '90', '1200', '2018-01-11 16:19:14'),
(13, 'Nashikroad', 'Shalimar', 'Six Month', '180', '2400', '2018-01-11 16:19:38'),
(14, 'Nashikroad', 'Shalimar', 'One Year', '365', '4800', '2018-01-11 16:20:14'),
(15, 'Nashikroad', 'Central Bus Station (C.B.S-New)', 'One Month', '30', '500', '2018-01-11 16:22:19'),
(16, 'Nashikroad', 'Central Bus Station (C.B.S-Old)', 'Three Month', '90', '1350', '2018-01-11 16:22:41'),
(17, 'Nashikroad', 'Central Bus Station (C.B.S-New)', 'Three Month', '90', '1500', '2018-01-11 16:22:56'),
(18, 'Nashikroad', 'Central Bus Station (C.B.S-New)', 'One Year', '365', '6000', '2018-01-11 16:23:07'),
(19, 'Nashikroad', 'Central Bus Station (C.B.S-New)', 'Six Month', '180', '3000', '2018-01-11 16:23:35'),
(20, 'Nashikroad', 'Central Bus Station (C.B.S-Old)', 'Six Month', '180', '2700', '2018-01-11 16:29:03'),
(21, 'Nashikroad', 'Central Bus Station (C.B.S-Old)', 'One Year', '365', '5400', '2018-01-11 16:29:40'),
(23, 'Nimani', 'Shalimar', 'One Month', '30', '600', '2018-01-15 12:39:15'),
(24, 'cbs', 'kkwagh', 'One Month', '30', '100', '2018-03-11 11:39:09'),
(25, 'Pathardi Gaon', 'Shramik nagar', 'Three Month', '90', '800', '2020-01-12 13:22:17'),
(26, 'jalgaon', 'trumbkeshwar', 'Three Month', '90', '799', '2020-01-12 13:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `pass_details`
--

CREATE TABLE `pass_details` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Aadhar_card_no` varchar(12) NOT NULL,
  `From_stop` varchar(100) NOT NULL,
  `To_stop` varchar(100) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `Days` varchar(20) NOT NULL,
  `Pass_amount` varchar(10) NOT NULL,
  `From_date` varchar(20) NOT NULL,
  `To_date` varchar(20) NOT NULL,
  `User_type` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Requested',
  `Status_id` varchar(5) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_details`
--

INSERT INTO `pass_details` (`id`, `Name`, `Aadhar_card_no`, `From_stop`, `To_stop`, `Month`, `Days`, `Pass_amount`, `From_date`, `To_date`, `User_type`, `Status`, `Status_id`, `date`) VALUES
(18, 'Rahul', '332772986402', 'Central Bus Station (C.B.S-Old)', 'Nashikroad', 'One Month', '30', '500', '2020-01-13', '2020-02-12', 'Student', 'disapproved', '1', '2020-01-12 13:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `to_stop`
--

CREATE TABLE `to_stop` (
  `id` int(11) NOT NULL,
  `To_stop` varchar(50) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `to_stop`
--

INSERT INTO `to_stop` (`id`, `To_stop`, `Date`) VALUES
(5, 'Nimani', '2018-01-15 12:38:30'),
(6, 'Deolali gaon', '2018-02-28 10:42:14'),
(9, 'Shramik nagar', '2018-02-28 10:42:48'),
(10, 'Pandavleni', '2018-02-28 10:43:02'),
(12, 'k.k.wagh', '2018-03-05 12:58:20'),
(14, 'satpur', '2020-01-12 11:43:09'),
(15, 'sandip foundation college', '2020-01-12 13:23:23'),
(16, 'trumbkeshwar', '2020-01-12 13:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Dob` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `User_type` varchar(20) NOT NULL,
  `Aadhar_card_no` varchar(12) NOT NULL,
  `Aadhar_card_photo` varchar(100) NOT NULL,
  `Bonafide` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Not_approved',
  `Status_id` varchar(5) NOT NULL DEFAULT '0',
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Address`, `Email`, `Mobile`, `Dob`, `Gender`, `User_type`, `Aadhar_card_no`, `Aadhar_card_photo`, `Bonafide`, `Username`, `Password`, `Photo`, `Status`, `Status_id`, `Date`) VALUES
(19, 'prasad', 'nashik', 'prasad@gmail.com', '7485452102', '1999/10/26', 'Male', 'Student', '332772451202', '347485.jpg', '728604.png', 'prasad', '1234', '136911.jpg', 'approved', '1', '2020-01-12 13:53:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days_detail`
--
ALTER TABLE `days_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `from_stop`
--
ALTER TABLE `from_stop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_amount_details`
--
ALTER TABLE `pass_amount_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_details`
--
ALTER TABLE `pass_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_stop`
--
ALTER TABLE `to_stop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `days_detail`
--
ALTER TABLE `days_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `from_stop`
--
ALTER TABLE `from_stop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pass_amount_details`
--
ALTER TABLE `pass_amount_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pass_details`
--
ALTER TABLE `pass_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `to_stop`
--
ALTER TABLE `to_stop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

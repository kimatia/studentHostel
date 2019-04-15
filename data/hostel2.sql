-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2019 at 11:23 PM
-- Server version: 5.7.18
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `block` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `block`, `gender`, `description`, `status`) VALUES
(20, 'hghgh', 'male', 'kjjhh', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `fees_monthly`
--

CREATE TABLE `fees_monthly` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `fees_type` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `due_balance` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_monthly`
--

INSERT INTO `fees_monthly` (`id`, `student_name`, `fees_type`, `cost`, `paid_amount`, `due_balance`, `month`, `payment_date`, `status`) VALUES
(13, 'kims', 'Mess Bill', '2000', '1000', '1000', 'Dec', '2019-04-10', 'Jan'),
(14, 'Cerey', 'Mess Bill', '2000', '1444', '556', 'Nov', '2019-04-18', 'Jan');

-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE `fees_structure` (
  `id` int(11) NOT NULL,
  `fees_type` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_structure`
--

INSERT INTO `fees_structure` (`id`, `fees_type`, `cost`, `status`) VALUES
(13, 'Mess Bill', '2000', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `messcard`
--

CREATE TABLE `messcard` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `messcard` varchar(255) NOT NULL,
  `startdate` varchar(255) NOT NULL,
  `enddate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messcard`
--

INSERT INTO `messcard` (`id`, `name`, `food`, `messcard`, `startdate`, `enddate`, `status`) VALUES
(10, 'kims', 'vegeterian', 'permanent', '2019-04-23', '2019-04-20', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `roomno` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `beds` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `roomno`, `block`, `beds`, `description`, `status`) VALUES
(21, 'njhhguy67', 'hghgh', '4', 'mjkj', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `room_allotment`
--

CREATE TABLE `room_allotment` (
  `id` int(11) NOT NULL,
  `block` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roomno` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL DEFAULT '5000',
  `paid` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `beds` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_allotment`
--

INSERT INTO `room_allotment` (`id`, `block`, `name`, `roomno`, `price`, `paid`, `balance`, `beds`, `status`) VALUES
(34, 'hghgh', 'kims', 'njhhguy67', '5000', '4500', '500', '4', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `joinn` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `course`, `student_name`, `dob`, `joinn`, `fname`, `mname`, `gender`, `address`, `contact`, `pnumber`, `blood`, `status`) VALUES
(16, 'IT', 'kims', '2019-04-05', '2019-04-27', 'HJHH', 'HHH', 'male', 'KJJHUYU5', '45455454', '45455454', 'B', 'enabled'),
(17, 'IT', 'kims', '2019-04-11', '2019-04-20', '5454mlkhj', 'jhhj', 'male', 'kji', '5489654', '656565', 'B', 'enabled'),
(18, 'it', 'Cerey', '2019-04-05', '2019-04-25', 'khjhjjh', 'hhjjh', 'male', 'jhhjhj5', '566565', '656565', 'AB+', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `logintype` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstname`, `lastname`, `username`, `phonenumber`, `email`, `password`, `logintype`) VALUES
(33, 'kimatia', 'Dan', 'kims', '254795511728', 'kimatiadaniel@gmail.com', '$2y$10$OdESqJT1lhs0gw8/8ourYOmoEXc5FacqJUBSP/lKZnI3r01P6A9mG', '1'),
(34, 'Willian', 'Juma', 'Cerey', '254716318513', 'williamjuma@gmail.com', '$2y$10$dUe31bjhHyukuT1sLKUhZe0N1AY31DqnkZB8IiLus6S3HF/CTyJ8W', '0'),
(40, 'Kimatia', 'Joshua', 'Kims', '254710805424', 'arbetmanodans@gmail.com', '$2y$10$/QNxQu67jCbbq6or/5MgeeOuBR5q.FbYhZpzDj9qpyvpR/meQ3PsC', '0'),
(43, 'Linda', 'Nyakasi', 'Liz', '254799025408', 'lindanyakasi@gmail.com', '$2y$10$Pt0QRUx/5i2IGSdAAebntu7Iq1h3QIYY1xNytYaMkqGOZ9EB7J0ry', '0'),
(44, 'Mom', 'Mom', 'Mum', '254728368410', 'lindanyakasii@gmail.com', '$2y$10$Pt0QRUx/5i2IGSdAAebntu7Iq1h3QIYY1xNytYaMkqGOZ9EB7J0ry', '0'),
(48, 'Telcom', 'joshua', 'kims', '254772773272', 'kimatiadaniell@gmail.com', '$2y$10$otWxfswDL4FrHsln5ROBMeD/9q7AH6yTUnUnAilJ9cWxwpMymuzmG', '0'),
(54, 'sam', 'otieno', 'sam', '254717423651', 'sammystonique@gmail.com', '$2y$10$Yq5ycK7D/s0D8xNVXfDggevrPpU4DX.5HS.ynk8V1A.sKrkfJ5csu', '0'),
(56, 'klkjjk', 'hhjhj', 'hjhjjh', 'jhhj', 'admin@admin.com', '$2y$10$09Sm/v9M7DRBXiX4iz7Wf.QiAxvgjXSYtkSPnuKt2XiYZF0/D/56y', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_monthly`
--
ALTER TABLE `fees_monthly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_structure`
--
ALTER TABLE `fees_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messcard`
--
ALTER TABLE `messcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_allotment`
--
ALTER TABLE `room_allotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `fees_monthly`
--
ALTER TABLE `fees_monthly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `fees_structure`
--
ALTER TABLE `fees_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `messcard`
--
ALTER TABLE `messcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `room_allotment`
--
ALTER TABLE `room_allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

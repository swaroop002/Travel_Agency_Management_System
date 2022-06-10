-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 10:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `balance`) VALUES
(0, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `type_of_booking_a` varchar(15) NOT NULL,
  `type_of_booking_b` varchar(15) NOT NULL,
  `from_city` varchar(15) NOT NULL,
  `to_city` varchar(15) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of _pass` int(11) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `cust_contact` varchar(10) NOT NULL,
  `cust_age` int(11) NOT NULL,
  `veh_no` varchar(12) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `booked_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `type_of_booking_a`, `type_of_booking_b`, `from_city`, `to_city`, `from_date`, `to_date`, `no_of _pass`, `cust_name`, `cust_contact`, `cust_age`, `veh_no`, `driver_id`, `transaction_id`, `booked_by`) VALUES
(1, 'outstation', 'RoundTrip', 'Andheri', 'Lonavla', '2022-06-10', '2022-06-14', 9, 'asdf', '8080808080', 12, '1', 1, 3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(30) NOT NULL,
  `driver_addr` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_joining` date NOT NULL,
  `driver_contact` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `face` longtext DEFAULT NULL,
  `license` longtext DEFAULT NULL,
  `payment_status` varchar(10) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `hire_status` varchar(15) DEFAULT 'HIRED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_addr`, `gender`, `date_of_joining`, `driver_contact`, `blood_group`, `face`, `license`, `payment_status`, `availability`, `hire_status`) VALUES
(1, 'D1', 'dsfsd', 'male', '2022-06-10', '1010101010', 'B-', 'upload/pngwing.com (45).png', 'upload/pngwing.com (44).png', 'UNPAID', 'UNAVAILABLE', 'HIRED');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_addr` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_joining` date NOT NULL,
  `emp_contact` varchar(10) NOT NULL,
  `face` longtext DEFAULT NULL,
  `proof` longtext DEFAULT NULL,
  `job_status` varchar(12) DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `emp_id` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `to_from` varchar(30) NOT NULL,
  `amount` double NOT NULL,
  `date-time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `mode`, `type`, `to_from`, `amount`, `date-time`) VALUES
(1, 'netbanking', 'IN', 'asdf', 5000, '2022-06-10 07:09:40'),
(2, 'upi', 'IN', 'asdf', 500, '2022-06-10 07:09:53'),
(3, 'upi', 'IN', 'asdf', 5000, '2022-06-10 07:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `veh_no` varchar(12) NOT NULL,
  `veh_type` varchar(15) NOT NULL,
  `veh_cap` int(11) NOT NULL,
  `veh_model` varchar(40) NOT NULL,
  `veh_issue` date NOT NULL,
  `availablity` varchar(15) NOT NULL,
  `owner_name` varchar(30) NOT NULL,
  `owner_contact` varchar(10) NOT NULL,
  `payment_status` varchar(10) DEFAULT 'UNPAID',
  `hire_status` varchar(12) DEFAULT 'HIRED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `veh_no`, `veh_type`, `veh_cap`, `veh_model`, `veh_issue`, `availablity`, `owner_name`, `owner_contact`, `payment_status`, `hire_status`) VALUES
(1, 'MH43AF7465', 'CAR', 9, 'Scorpio ', '2022-06-10', 'UNAVAILABLE', 'Manoj', '9090909090', 'UNPAID', 'HIRED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

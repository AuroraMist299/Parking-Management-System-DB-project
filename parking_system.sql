-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 04:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking system`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_parking_spots`
--

CREATE TABLE `available_parking_spots` (
  `location` varchar(255) NOT NULL,
  `parking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_parking_spots`
--

INSERT INTO `available_parking_spots` (`location`, `parking_date`) VALUES
('Rawalpindi', '2025-01-18'),
('Lahore', '2025-01-19'),
('Karachi', '2025-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `your_name` varchar(100) NOT NULL,
  `your_email` varchar(100) NOT NULL,
  `your_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`your_name`, `your_email`, `your_message`) VALUES
('Renaad', 'renaad@gmail.com', 'I have a question about parking availability.'),
('Maheera', 'mahi@gmail.com', 'Can I modify my reservation?'),
('Hijab', 'hijab@gmail.com', 'What are the parking charges?');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('Hijab', 'BSE233154'),
('Maheera', 'BSE233182'),
('Renaad', 'BSE233202');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`name`, `phone_number`, `vehicle_number`) VALUES
('Renaad', '3156743289', '213'),
('Maheera', '31265987', '412'),
('Hijab', '316789065', '945');

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`email`, `password`, `newpassword`) VALUES
('Renaad@gmail.com', 'BSE233202', 'BAI233202'),
('Maheera.com', 'BSE233182', 'BAI233182'),
('Hijab@gmail.com', 'BSE233154', 'BAI233154');

-- --------------------------------------------------------

--
-- Table structure for table `select_your_spot`
--

CREATE TABLE `select_your_spot` (
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `select_your_spot`
--

INSERT INTO `select_your_spot` (`location`) VALUES
('Rawalpindi'),
('Lahore'),
('Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `full_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`full_name`, `email_address`, `password`, `confirm_password`) VALUES
('Hijab Saghir', 'hijab@gmail.com', 'BSE233154', 'BSE233154'),
('Maheera Fatima Abbasi', 'mahi@gmail.com', 'BSE233182', 'BSE233182'),
('Renaad Abbasi', 'renaad@gmail.com', 'BSE233202', 'BSE233202');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email_address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 03:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_code`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_document`
--

CREATE TABLE `add_document` (
  `id` int(10) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `document_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_document`
--

INSERT INTO `add_document` (`id`, `document_type`, `document_desc`) VALUES
(2, 'Clearance', 'Municipality of Malimono Clearance '),
(3, 'Resignation Paper', 'Resign files for employee'),
(5, 'FILE OF LEAVE', 'DTR DESC');

-- --------------------------------------------------------

--
-- Table structure for table `history_track`
--

CREATE TABLE `history_track` (
  `id` int(10) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `complete_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_time` varchar(255) NOT NULL,
  `received_time` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_track`
--

INSERT INTO `history_track` (`id`, `document_type`, `complete_name`, `description`, `qr_code`, `status`, `created_time`, `received_time`, `receiver_name`) VALUES
(0, 'Resignation Paper', 'employee', 'I quits', 'documentType:Resignation Paper?name=employee&body=I+quits', 'Received', '2021-10-07', '2021-10-07', 'nays bats'),
(73, 'Clearance', 'employee1', 'Test', 'documentType:Clearance?name=employee1&body=Test', 'Received', '2021-10-07', '2021-10-07', ' Jeffrey Bernadas'),
(74, 'Resignation Paper', 'employee', 'I quits', 'documentType:Resignation Paper?name=employee&body=I+quits', 'Received', '2021-10-07', '2021-10-07', 'Christian Dave M. Batye'),
(73, 'Clearance', 'employee1', 'Test', 'documentType:Clearance?name=employee1&body=Test', 'Received', '2021-10-07', '2021-10-07', ' Jeffrey Bernadas'),
(74, 'Resignation Paper', 'employee', 'I quits', 'documentType:Resignation Paper?name=employee&body=I+quits', 'Received', '2021-10-07', '2021-10-07', 'abdula'),
(73, 'Clearance', 'employee1', 'Test', 'documentType:Clearance?name=employee1&body=Test', 'Received', '2021-10-07', '2021-10-07', ' Jeffrey Bernadas'),
(74, 'Resignation Paper', 'employee', 'I quits', 'documentType:Resignation Paper?name=employee&body=I+quits', 'Received', '2021-10-07', '2021-10-07', 'abdula'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Christian Dave Momar Bate'),
(73, 'Clearance', 'employee1', 'Test', 'documentType:Clearance?name=employee1&body=Test', 'Received', '2021-10-07', '2021-10-07', ' Jeffrey Bernadas'),
(74, 'Resignation Paper', 'employee', 'I quits', 'documentType:Resignation Paper?name=employee&body=I+quits', 'Received', '2021-10-07', '2021-10-07', 'abdula'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Jeffrey Bernadas'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Jeffrey Bernadas'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Jeffrey Bernadas'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Jeffrey Bernadas'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Christian Dave Momar Bate');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_document`
--

CREATE TABLE `tracking_document` (
  `id` int(11) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `complete_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_time` varchar(255) NOT NULL,
  `received_time` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_document`
--

INSERT INTO `tracking_document` (`id`, `document_type`, `complete_name`, `description`, `qr_code`, `status`, `created_time`, `received_time`, `receiver_name`) VALUES
(73, 'Clearance', 'employee1', 'Test', 'documentType:Clearance?name=employee1&body=Test', 'Received', '2021-10-07', '2021-10-07', ' Jeffrey Bernadas'),
(74, 'Resignation Paper', 'employee', 'I quits', 'documentType:Resignation Paper?name=employee&body=I+quits', 'Received', '2021-10-07', '2021-10-07', 'abdula'),
(76, 'FILE OF LEAVE', 'employee', 'Vacation', 'documentType:FILE OF LEAVE?name=employee&body=Vacation', 'Received', '2021-10-08', '2021-10-08', ' Christian Dave Momar Bate');

-- --------------------------------------------------------

--
-- Table structure for table `user_document`
--

CREATE TABLE `user_document` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `complete_name` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_document`
--

INSERT INTO `user_document` (`id`, `user_name`, `complete_name`, `mobilenumber`, `password`, `type`) VALUES
(7, 'Administration', 'Christian Dave Momar Bate', '09518221226', 'cr1tngsitekusog', 'Administrator'),
(9, 'Bernieqt', 'Jeffrey Bernadas', '090909090909', 'Bernieqt', 'Administrator'),
(10, 'employee', 'employee', '123123', 'employee', 'Employee'),
(11, 'employee1', 'employee1', '33333', 'employee1', 'Employee'),
(12, 'employee2', 'employee2', '33333', 'employee2', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_document`
--
ALTER TABLE `add_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking_document`
--
ALTER TABLE `tracking_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_document`
--
ALTER TABLE `user_document`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_document`
--
ALTER TABLE `add_document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracking_document`
--
ALTER TABLE `tracking_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_document`
--
ALTER TABLE `user_document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

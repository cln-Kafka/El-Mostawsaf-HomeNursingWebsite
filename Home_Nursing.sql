-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 07:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`user_id`, `name`, `message`) VALUES
(1, 'Mohamed Sayed', 'Done'),
(1, 'Mohamed Sayed', 'Done'),
(1, 'Mohamed Sayed', 'homepage done'),
(1, 'Mohamed Sayed', 'Logged In'),
(4, 'mohamed diab', 'hey');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `ssn` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`ssn`, `service_id`, `first_name`, `last_name`, `address`, `phone`, `birthday`, `gender`, `rating`) VALUES
('10045678910234', 8, 'Hazem', 'R2fat', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 3),
('12145678910234', 9, 'Mo', 'Essam', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 4),
('12343378910234', 8, 'Ali', 'Badran', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2020', 'Male', 0),
('12345578910233', 5, 'Reem', 'Adel', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 5),
('12345677910234', 7, 'Hend', 'Sayed', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 5),
('12345678910000', 8, 'Ahmed', 'Khaled', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2001', 'Male', 5),
('12345678910111', 4, 'Hager', 'Tarek', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 5),
('12345678910200', 7, 'sam7', 'Mo', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 5),
('12345678910211', 3, 'mo', 'Sayed', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 5),
('12345678910222', 3, 'Mo', 'Ahmed', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2001', 'Male', 3),
('12345678910230', 6, 'Hadeer', 'Sherif', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 2),
('12345678910231', 6, 'Mo', 'Ayman', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 0),
('12345678910232', 1, 'Mohamed', 'diab', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 4),
('12345678910234', 2, 'Kareem', 'Salah', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2020', 'Male', 5),
('12345678910237', 1, 'MS', 'alkabeer', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2001', 'Male', 5),
('12345678910245', 2, 'Ahmed', 'Tarek', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2020', 'Male', 2),
('12345678910277', 3, 'Amir', 'Hesham', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 4),
('12345678910770', 7, 'ayman', 'sayed', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 5),
('12345678910777', 4, 'Salma', 'Said', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2020', 'Female', 2),
('12345678910778', 5, 'Haydy', 'Tarek', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 0),
('12345678998701', 1, 'Sayed', 'diab', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 0),
('12345678998764', 6, 'Yousef', 'Shawki', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 5),
('12345678998765', 1, 'Salma', 'Ahmed', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 2),
('12345678998777', 2, 'Alaa', 'mohamed', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 3),
('12345678998888', 4, 'Maryam', 'hatem', '20 st mohamed abd el naby twabk faisel', '01155388090', '09/05/2001', 'Female', 3),
('12345699910234', 9, 'Ahmed', 'Taha', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Male', 0),
('12399678998765', 9, 'Manal', 'Hassan', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 5),
('13345678998777', 5, 'Raghda', 'Tarek', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 5),
('22345678910234', 5, 'Yasmen', 'Sayed', '20 st mohamed abd el naby twabk faisel', '01155388090', '11/09/2002', 'Female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `user_id` int(11) NOT NULL,
  `nurse_ssn` varchar(50) NOT NULL,
  `nurse_name` varchar(50) NOT NULL,
  `rating` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`user_id`, `nurse_ssn`, `nurse_name`, `rating`) VALUES
(4, '12345678910237', 'MS alkabeer', 5),
(4, '12345678910232', 'Mohamed diab', 4),
(4, '12345678910232', 'Mohamed diab', 3),
(4, '12345678910237', 'MS alkabeer', 5),
(4, '12345678998765', 'Salma Ahmed', 2),
(4, '12345678910234', 'Kareem Salah', 5),
(4, '12345678910245', 'Ahmed Tarek', 2),
(4, '12345678998777', 'Alaa mohamed', 3),
(4, '12345678910211', 'mo Sayed', 5),
(4, '12345678910222', 'Mo Ahmed', 3),
(4, '12345678910277', 'Amir Hesham', 4),
(4, '12345678910111', 'Hager Tarek', 5),
(4, '12345678910777', 'Salma Said', 2),
(4, '12345678998888', 'Maryam hatem', 3),
(4, '13345678998777', 'Raghda Tarek', 5),
(4, '12345678998764', 'Yousef Shawki', 5),
(4, '12345678910770', 'ayman sayed', 5),
(4, '12345678910000', 'Ahmed Khaled', 5),
(4, '10045678910234', 'Hazem R2fat', 3),
(4, '12399678998765', 'Manal Hassan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nurse_ssn` varchar(50) NOT NULL,
  `nurse_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`R_id`, `start_time`, `end_time`, `day`, `date`, `service_id`, `user_id`, `nurse_ssn`, `nurse_name`) VALUES
(25, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 1, '12345678910232', 'Mohamed diab'),
(26, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 1, '12345678910232', 'Mohamed diab'),
(27, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 0, '12345678998701', 'Sayed diab'),
(28, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 0, '12345678998701', 'Sayed diab'),
(29, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 0, '12345678998701', 'Sayed diab'),
(30, '00:00:00', '00:00:00', 'Saturday', '0000-00-00', 1, 0, '12345678910237', 'MS alkabeer'),
(31, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 1, '12345678998765', 'Salma Ahmed'),
(32, '01:00:00', '09:00:00', 'Saturday', '2023-06-24', 1, 1, '12345678910237', 'MS alkabeer'),
(33, '12:00:00', '19:00:00', 'Wednesday', '2023-06-28', 1, 4, '12345678910237', 'MS alkabeer'),
(34, '10:00:00', '20:00:00', 'Friday', '2023-06-30', 1, 4, '12345678998701', 'Sayed diab');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `S_id` int(11) NOT NULL,
  `S_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`S_id`, `S_name`) VALUES
(1, 'Skilled Nursing Care:'),
(2, 'Personal Care Assistance:'),
(3, 'Companion and Emotional Support:'),
(4, 'Pediatric Care:'),
(5, 'Respite Care:'),
(6, 'Rehabilitation Support:'),
(7, 'Dementia and Alzheimer\'s Care:'),
(8, 'Chronic Disease Management:'),
(9, 'End-of-Life Care:');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `birthday`, `phone_no`, `address`, `gender`) VALUES
(4, 'mohamed', 'diab', 'mido.sayed56@yahoo.com', 'd41d8cd98f00b204e9800998ecf8427e', '2002-09-11', '01155388090', '20 st mohamed abd el naby twabk faisel', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`ssn`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`R_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

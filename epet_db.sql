-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:56 AM
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
-- Database: `epet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lost_pets`
--

CREATE TABLE `lost_pets` (
  `id` int(11) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `reported_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_pets`
--

INSERT INTO `lost_pets` (`id`, `pet_name`, `description`, `reported_at`) VALUES
(1, 'Sanji', 'Huling nakita sa loob ng Timba ng boysen', '2024-04-13 14:41:07'),
(15, 'choco', 'ok lang', '2024-04-16 14:00:32'),
(16, 'makoy', 'ok na ', '2024-04-17 10:44:20'),
(17, 'makoy', 'asasa', '2024-04-22 10:45:06'),
(18, 'Blue Eye', 'ok na ', '2024-04-22 10:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `Ownergender` varchar(10) NOT NULL,
  `Ownerage` int(11) NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `Ownershouse` varchar(100) NOT NULL,
  `Ownersstreet` varchar(100) NOT NULL,
  `Ownersbrgy` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `first_name`, `last_name`, `middle_name`, `Ownergender`, `Ownerage`, `date_birth`, `email`, `Ownershouse`, `Ownersstreet`, `Ownersbrgy`, `contact_number`) VALUES
(1, 'adrian mathew', 'Santos', '', 'Male', 11, '2024-05-06', 'adrianomateosantosis@gmail.com', '022', 'E Gongora ', 'San Roque', '09127288408'),
(2, 'adrian mathew', 'Santos', 'Canonizado', 'Male', 10, '2024-04-30', 'adrianomateosantosis@gmail.com', '022', 'E Gongora ', 'San Roque', '09127288408'),
(3, 'junil', 'tino', 'Pogi', 'Male', 22, '2024-04-29', 'santosis@gmail.com', '022', 'E Gongora ', 'San Roque', '09127288408'),
(4, 'Nikki', 'Santos', 'Canonizado', 'Male', 25, '2024-05-03', 'santosis@gmail.com', '022', 'E Gongora ', 'San Roque', '09127288408'),
(5, 'kapal', 'rapales', 'pogii', 'Male', 1, '2024-09-09', 'adrianomateosantosis@gmail.com', '022', 'E.Gongora', 'San Roque', '09127288408');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `petage` int(11) NOT NULL,
  `age_type` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `desc_breed` varchar(100) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status_pet` varchar(20) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `Image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `owner_id`, `name`, `petage`, `age_type`, `gender`, `breed`, `desc_breed`, `color`, `type`, `status_pet`, `image_id`, `Image`) VALUES
(1, 1, 'dada', 9, 'Month', 'Male', 'Shih Tzu', 'half aspin', 'black', 'Dog', 'Active', NULL, NULL),
(2, 1, 'coco', 4, 'Year', 'Male', 'Aspin', 'half aspin', 'black', 'Cat', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `u_status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(12) NOT NULL,
  `usertype` enum('admin','user','','') NOT NULL,
  `hno` varchar(255) NOT NULL,
  `st` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `age`, `gender`, `u_status`, `email`, `phone`, `username`, `password`, `usertype`, `hno`, `st`, `brgy`) VALUES
(8, 'Nikki ', 'A.', 'Azur', '10', 'Female', 'Single', 'nikki@gmail.com', '0987456321', 'niks', '123456', 'admin', '022 ', 'Del Valle', 'San Roque'),
(9, 'Adrian Mathew', 'C. ', 'Santos', '', '', '', '', '', 'admin', 'admin', 'user', '', '', ''),
(12, 'Ezekiel', 'Pogi', 'Balladares', '13', 'Male', '', 'Ezekiel@gmail.com', '09876543210', 'admin1', '0123456', 'admin', '0011', 'Parola', 'San Roque');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lost_pets`
--
ALTER TABLE `lost_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lost_pets`
--
ALTER TABLE `lost_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

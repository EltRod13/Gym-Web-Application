-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 01:06 PM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `exerciseID` int(11) NOT NULL,
  `exerciseName` varchar(128) NOT NULL,
  `exerciseMuscle` varchar(128) NOT NULL,
  `exerciseSets` varchar(128) NOT NULL,
  `exerciseReps` varchar(128) NOT NULL,
  `exerciseWeight` varchar(128) NOT NULL,
  `exerciseRestTime` varchar(128) NOT NULL,
  `member_fk` int(20) NOT NULL,
  `exerciseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`exerciseID`, `exerciseName`, `exerciseMuscle`, `exerciseSets`, `exerciseReps`, `exerciseWeight`, `exerciseRestTime`, `member_fk`, `exerciseDate`) VALUES
(104, 'Bench Press', 'Chest', '3', '10', '40', '60', 107, '2023-04-02'),
(105, 'Squats', 'Legs', '3', '10', '0', '40', 107, '2023-04-02'),
(106, 'Dumbbell Press', 'Biceps', '3', '10', '20', '60', 107, '2023-04-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`exerciseID`),
  ADD KEY `member_fk` (`member_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `exerciseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`member_fk`) REFERENCES `members` (`memberId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

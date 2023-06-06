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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberId` int(11) NOT NULL,
  `memberName` varchar(128) NOT NULL,
  `memberEmailId` varchar(128) NOT NULL,
  `memberUsername` varchar(128) NOT NULL,
  `memberPassword` varchar(128) NOT NULL,
  `memberAge` varchar(128) NOT NULL,
  `memberAddress` varchar(128) NOT NULL,
  `memberStartdate` date NOT NULL,
  `memberEnddate` date NOT NULL,
  `memberCurrentweight` int(20) NOT NULL,
  `memberTargetweight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `memberName`, `memberEmailId`, `memberUsername`, `memberPassword`, `memberAge`, `memberAddress`, `memberStartdate`, `memberEnddate`, `memberCurrentweight`, `memberTargetweight`) VALUES
(107, 'John Doe', 'johndoe123@gmail.com', 'JDoe', '$2y$10$VxOSx6poJZG1aikDbL.67.KYGco72ju53ZlX9qfm0zUVNZeGM.8Cq', '25', 'Keele', '2023-04-01', '2023-05-01', 80, 65),
(108, 'Elton Rodrigues', 'abc@gmail.com', 'eltrod', '$2y$10$IqZGcCD9Lak2hjmFV2.6medLnoMrU/CB50rARIC/HfFxYqk2D.XHC', '20', 'Keele', '2023-04-14', '2023-05-14', 75, 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

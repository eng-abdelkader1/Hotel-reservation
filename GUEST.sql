-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 11:23 AM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `GUEST`
--

CREATE TABLE `guest` (
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `ID` int(15) NOT NULL,
  `days` int(15) NOT NULL,
  `roomType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `GUEST`
--

INSERT INTO `GUEST` (`name`, `lastname`, `ID`, `days`, `roomType`) VALUES
('abed', 'sherif', 1224556, 4, 'b'),
('jamal', 'alboukai', 12232486, 6, 'c'),
('joud', 'sleiman', 16646446, 5, 'b'),
('jana', 'hallak', 44689841, 5, 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GUEST`
--
ALTER TABLE `GUEST`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

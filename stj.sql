-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 05:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stj`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `sno` int(11) NOT NULL,
  `categoryName` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`sno`, `categoryName`, `image`) VALUES
(1, 'Doctor', 'img_521364431.jpg'),
(2, 'Electrician', 'img_734896904.png'),
(3, 'Mehndi Artist', 'img_2520835429.png'),
(4, 'Car Painter', 'img_763620907.png'),
(5, 'Plumber', 'img_8742764862.png'),
(6, 'Mechanic', 'img_9613032757.png'),
(7, 'Painter', 'img_520253189.png'),
(8, 'Raj Mistri', 'img_7896921833.jpg'),
(9, 'Sweets', 'img_3127116058.png');

-- --------------------------------------------------------

--
-- Table structure for table `insidecategory`
--

CREATE TABLE `insidecategory` (
  `categoryName` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `specialist` text NOT NULL,
  `timeFrom` time NOT NULL,
  `timeTo` time NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `phoneNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insidecategory`
--

INSERT INTO `insidecategory` (`categoryName`, `image`, `specialist`, `timeFrom`, `timeTo`, `details`, `price`, `phoneNumber`) VALUES
('Doctor', 'img_1359659262.jpg', 'Heart', '10:00:00', '17:00:00', '12/w batla house choke okhla', '200 Rs/hour', '8532873569');

-- --------------------------------------------------------

--
-- Table structure for table `loginstj`
--

CREATE TABLE `loginstj` (
  `full_name` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginstj`
--

INSERT INTO `loginstj` (`full_name`, `phoneNumber`, `password`) VALUES
('Mohd Zaid Pasha', '9045437715', '1122'),
('Sameer', '8470902550', '1234'),
('Asad', '8532873569', '1245'),
('Mehta', '9548646811', '12345'),
('Zaid', '8755445544', '12345'),
('MOHD ASHAD MEHTA', '9045437719', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

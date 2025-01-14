-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 08:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procurement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `procurement_requests`
--

CREATE TABLE `procurement_requests` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `justification` text NOT NULL,
  `request_date` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `delivery_due_date` date DEFAULT NULL,
  `req_status` varchar(100) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procurement_requests`
--

INSERT INTO `procurement_requests` (`id`, `item_name`, `item_description`, `quantity`, `justification`, `request_date`, `first_name`, `second_name`, `contact`, `email`, `delivery_due_date`, `req_status`) VALUES
(20, 'Service Cards', '50 x 50 cm pieces', 200, 'Service Cards for cars', '2025-01-13 19:48:49', 'Maureen', 'Siima', '0774321274', 'maureen.siima@niyogarage.com', '2025-01-16', 'approved'),
(22, 'External Drive', '500GB SSD TOSHIBA ', 1, 'Needed for extra back up', '2025-01-14 10:12:08', 'Mudali', 'Derrick', '0708195622', 'mudali@gmail.com', '2025-01-23', 'approved'),
(23, 'Mechanical Book', 'A hand book for Mechanics to support trainings', 1, 'This book has several safety features that can be used in the garage', '2025-01-14 10:17:28', 'Kenneth ', 'Kasumba', '0782059164', 'kenneth.kasumba@gmail.com', '2025-01-30', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `procurement_requests`
--
ALTER TABLE `procurement_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `procurement_requests`
--
ALTER TABLE `procurement_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 07:50 AM
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
  `req_status` varchar(100) DEFAULT 'pending',
  `purchase_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procurement_requests`
--

INSERT INTO `procurement_requests` (`id`, `item_name`, `item_description`, `quantity`, `justification`, `request_date`, `first_name`, `second_name`, `contact`, `email`, `delivery_due_date`, `req_status`, `purchase_order`) VALUES
(20, 'Service Cards', '50 x 50 cm pieces', 200, 'Service Cards for cars', '2025-01-13 19:48:49', 'Maureen', 'Siima', '0774321274', 'maureen.siima@niyogarage.com', '2025-01-16', 'approved', 1),
(22, 'External Drive', '500GB SSD TOSHIBA ', 1, 'Needed for extra back up', '2025-01-14 10:12:08', 'Mudali', 'Derrick', '0708195622', 'mudali@gmail.com', '2025-01-23', 'approved', 2),
(23, 'Mechanical Book', 'A hand book for Mechanics to support trainings', 1, 'This book has several safety features that can be used in the garage', '2025-01-14 10:17:28', 'Kenneth ', 'Kasumba', '0782059164', 'kenneth.kasumba@gmail.com', '2025-01-30', 'approved', 3),
(30, 'Desk', '75x45 inches', 1, 'IT DEPT. DESK', '2025-01-14 14:51:42', 'Namatovu', 'Joan', '0772515672', 'joan@gmail.com', '2025-01-30', 'approved', 4),
(32, 'Adapter', 'Laptop Adapter - HP 6TH GENERATION', 1, 'The laptop disturbs to use and it afects my work flow especially when power is off.', '2025-01-14 15:15:55', 'William', 'Job', '0700684695', 'ssekitojobwilliam@gmail.com', '2025-01-16', 'approved', 5),
(35, 'honey', 'sfdsdf', 10, 'dfsf', '2025-01-14 16:09:34', 'sfsf', 'sfdsf', 'sfdsf', 'sfsf@sdfs', '2025-01-31', 'rejected', NULL),
(37, 'Laptop', 'i5 laptop', 2, 'The other got spoilt but also store got spoilt', '2025-01-14 17:42:30', 'joan', 'namatovu', '09738728282', 'joan@gmail.com', '2025-01-31', 'approved', 6),
(38, 'Phone', 'I PHONE 13 PRO MAX', 2, 'I need to do high quality content', '2025-01-15 09:18:57', 'ronald', 'egesa', '0839320230', 'ronald@gmail.com', '2025-02-12', 'approved', 7),
(39, 'Laptop', 'i7 Core , ', 2, 'I need it for my effectiveneess', '2025-01-15 09:30:33', 'calvin', 'ahumuza', '07847658504', 'calvin@gmail.com', '2025-01-31', 'approved', 8);

--
-- Triggers `procurement_requests`
--
DELIMITER $$
CREATE TRIGGER `update_purchase_order` BEFORE UPDATE ON `procurement_requests` FOR EACH ROW BEGIN
    
    IF OLD.req_status = 'pending' AND NEW.req_status = 'approved' THEN
        
        SET NEW.purchase_order = (SELECT COALESCE(MAX(purchase_order), 0) + 1 FROM procurement_requests);
    END IF;
END
$$
DELIMITER ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

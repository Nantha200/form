-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 01:46 PM
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
-- Database: `invoices`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `subtotal` varchar(250) NOT NULL,
  `gst` varchar(300) NOT NULL,
  `nettotal` varchar(100) NOT NULL,
  `invoice_no` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `phone`, `address`, `product`, `quantity`, `price`, `total`, `subtotal`, `gst`, `nettotal`, `invoice_no`) VALUES
(35, 'nantha', '876456789987', 'Annanji', 'creative poster', 1, '200', '200.00', '2700', '1', '2727', 'INVO-281223-06'),
(36, 'nantha', '876456789987', 'Annanji', 'creative poster', 1, '200', '200.00', '2700', '1', '2727', 'INVO-281223-06'),
(37, 'vishnu', '987654345678', 'cumbum', 'WEB DESIGN', 2, '2500', '5000.00', '25000', '', '25000', 'INVO-281223-07'),
(38, 'vishnu', '987654345678', 'cumbum', 'creative poster', 2, '10000', '20000.00', '25000', '', '25000', 'INVO-281223-07'),
(39, 'arun', '8765456789', 'theni', 'WEB DESIGN', 2, '2500', '5000.00', '6600', '', '6600', 'INVO-281223-08'),
(40, 'arun', '8765456789', 'theni', 'poster design', 3, '200', '600.00', '6600', '', '6600', 'INVO-281223-08'),
(41, 'arun', '8765456789', 'theni', 'creative poster', 1, '1000', '1000.00', '6600', '', '6600', 'INVO-281223-08'),
(42, 'Nantha Kumar Senthil Kumar', '06369484309', 'Annanji', 'WEB DESIGN', 3, '2500', '7500.00', '7560', '1', '7635.6', 'INVO-281223-09'),
(43, 'Nantha Kumar Senthil Kumar', '06369484309', 'Annanji', 'creative poster', 3, '20', '60.00', '7560', '1', '7635.6', 'INVO-281223-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

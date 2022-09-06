-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 03:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aferihem_instr`
--

-- --------------------------------------------------------

--
-- Table structure for table `primanja`
--

CREATE TABLE `primanja` (
  `IdPrimanja` int(11) NOT NULL,
  `Iznos` decimal(7,2) DEFAULT NULL,
  `DatumPrimanja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `primanja`
--

INSERT INTO `primanja` (`IdPrimanja`, `Iznos`, `DatumPrimanja`) VALUES
(1, '11035.00', '2018-01-05'),
(2, '11102.31', '2018-02-02'),
(3, '11102.30', '2018-03-04'),
(4, '11135.00', '2018-04-02'),
(5, '11002.00', '2018-05-03'),
(6, '11118.35', '2018-06-04'),
(7, '11013.27', '2018-07-03'),
(8, '11113.41', '2018-08-02'),
(9, '10980.13', '2018-09-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `primanja`
--
ALTER TABLE `primanja`
  ADD PRIMARY KEY (`IdPrimanja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `primanja`
--
ALTER TABLE `primanja`
  MODIFY `IdPrimanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 05:59 PM
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
-- Table structure for table `instrukcije`
--

CREATE TABLE `instrukcije` (
  `IdInstrukcija` int(11) NOT NULL,
  `DatumInstrukcije` datetime DEFAULT NULL,
  `Iznos` decimal(7,2) DEFAULT NULL,
  `IdUsluga` int(11) DEFAULT NULL,
  `opis` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instrukcije`
--

INSERT INTO `instrukcije` (`IdInstrukcija`, `DatumInstrukcije`, `Iznos`, `IdUsluga`, `opis`) VALUES
(1, '2018-01-06 00:00:00', '300.00', 1, NULL),
(2, '2018-01-06 00:00:00', '1000.00', 2, NULL),
(3, '2018-01-08 00:00:00', '300.00', 3, NULL),
(4, '2018-01-09 00:00:00', '140.00', 1, NULL),
(5, '2018-01-11 00:00:00', '350.00', 3, NULL),
(6, '2018-01-15 00:00:00', '100.00', 1, NULL),
(7, '2018-01-17 00:00:00', '140.00', 4, NULL),
(8, '2018-01-18 00:00:00', '400.00', 5, NULL),
(9, '2018-01-23 00:00:00', '300.00', 6, NULL),
(10, '2018-01-30 00:00:00', '1100.00', 5, NULL),
(11, '2018-01-30 00:00:00', '600.00', 1, NULL),
(12, '2018-02-06 00:00:00', '140.00', 1, NULL),
(13, '2018-02-08 00:00:00', '140.00', 1, NULL),
(14, '2018-02-09 00:00:00', '140.00', 1, NULL),
(15, '2018-02-10 00:00:00', '140.00', 1, NULL),
(16, '2018-02-11 00:00:00', '300.00', 7, NULL),
(17, '2018-02-13 00:00:00', '140.00', 1, NULL),
(18, '2018-02-15 00:00:00', '280.00', 1, NULL),
(19, '2018-02-16 00:00:00', '280.00', 1, NULL),
(20, '2018-02-18 00:00:00', '350.00', 7, NULL),
(21, '2018-02-20 00:00:00', '280.00', 1, NULL),
(22, '2018-02-22 00:00:00', '140.00', 1, NULL),
(23, '2018-02-23 00:00:00', '200.00', 7, NULL),
(24, '2018-02-26 00:00:00', '140.00', 1, NULL),
(25, '2018-02-28 00:00:00', '140.00', 1, NULL),
(26, '2018-02-28 00:00:00', '300.00', 7, NULL),
(27, '2018-03-12 00:00:00', '600.00', 1, NULL),
(28, '2018-03-13 00:00:00', '140.00', 1, NULL),
(29, '2018-03-14 00:00:00', '240.00', 1, NULL),
(30, '2018-03-15 00:00:00', '140.00', 8, NULL),
(31, '2018-03-16 00:00:00', '140.00', 1, NULL),
(32, '2018-03-20 00:00:00', '200.00', 1, NULL),
(33, '2018-03-20 00:00:00', '360.00', 9, NULL),
(34, '2018-03-21 00:00:00', '140.00', 1, NULL),
(35, '2018-03-22 00:00:00', '240.00', 1, NULL),
(36, '2018-03-26 00:00:00', '200.00', 3, NULL),
(37, '2018-03-26 00:00:00', '140.00', 1, NULL),
(38, '2018-03-27 00:00:00', '740.00', 1, NULL),
(39, '2018-03-27 00:00:00', '600.00', 5, NULL),
(40, '2018-03-29 00:00:00', '240.00', 1, NULL),
(41, '2018-04-13 00:00:00', '140.00', 1, NULL),
(42, '2018-04-16 00:00:00', '300.00', 10, NULL),
(43, '2018-04-17 00:00:00', '140.00', 1, NULL),
(44, '2018-04-19 00:00:00', '140.00', 1, NULL),
(45, '2018-04-24 00:00:00', '140.00', 1, NULL),
(46, '2018-04-24 00:00:00', '510.00', 5, NULL),
(47, '2018-04-25 00:00:00', '450.00', 10, NULL),
(48, '2018-05-02 00:00:00', '100.00', 10, NULL),
(49, '2018-05-03 00:00:00', '150.00', 1, NULL),
(50, '2018-05-04 00:00:00', '140.00', 1, NULL),
(51, '2018-05-05 00:00:00', '140.00', 1, NULL),
(52, '2018-05-07 00:00:00', '160.00', 1, NULL),
(53, '2018-05-09 00:00:00', '140.00', 1, NULL),
(54, '2018-05-10 00:00:00', '140.00', 1, NULL),
(55, '2018-05-12 00:00:00', '280.00', 1, NULL),
(56, '2018-05-14 00:00:00', '150.00', 1, NULL),
(57, '2018-05-15 00:00:00', '310.00', 1, NULL),
(58, '2018-05-15 00:00:00', '100.00', 1, NULL),
(59, '2018-05-16 00:00:00', '140.00', 1, NULL),
(60, '2018-05-17 00:00:00', '130.00', 1, NULL),
(61, '2018-05-18 00:00:00', '100.00', 1, NULL),
(62, '2018-05-21 00:00:00', '140.00', 1, NULL),
(63, '2018-05-22 00:00:00', '280.00', 1, NULL),
(64, '2018-05-24 00:00:00', '140.00', 1, NULL),
(65, '2018-05-24 00:00:00', '140.00', 1, NULL),
(66, '2018-05-26 00:00:00', '140.00', 1, NULL),
(67, '2018-05-29 00:00:00', '280.00', 1, NULL),
(68, '2018-05-30 00:00:00', '140.00', 1, NULL),
(69, '2018-05-31 00:00:00', '170.00', 1, NULL),
(70, '2018-06-01 00:00:00', '310.00', 1, NULL),
(71, '2018-06-02 00:00:00', '280.00', 1, NULL),
(72, '2018-06-04 00:00:00', '1000.00', 5, NULL),
(73, '2018-06-05 00:00:00', '210.00', 1, NULL),
(74, '2018-06-06 00:00:00', '230.00', 1, NULL),
(75, '2018-06-09 00:00:00', '490.00', 1, NULL),
(76, '2018-06-11 00:00:00', '140.00', 1, NULL),
(77, '2018-06-13 00:00:00', '750.00', 1, NULL),
(78, '2018-06-14 00:00:00', '380.00', 1, NULL),
(79, '2018-06-15 00:00:00', '160.00', 1, NULL),
(80, '2018-06-28 00:00:00', '400.00', 1, NULL),
(81, '2018-06-30 00:00:00', '140.00', 1, NULL),
(82, '2018-07-03 00:00:00', '140.00', 1, NULL),
(83, '2018-07-03 00:00:00', '70.00', 1, NULL),
(84, '2018-07-07 00:00:00', '210.00', 1, NULL),
(85, '2018-07-07 00:00:00', '300.00', 5, NULL),
(86, '2018-07-23 00:00:00', '620.00', 1, NULL),
(87, '2018-07-28 00:00:00', '600.00', 1, NULL),
(88, '2018-08-22 00:00:00', '200.00', 9, NULL),
(89, '2018-08-23 00:00:00', '600.00', 1, NULL),
(90, '2018-08-23 00:00:00', '140.00', 1, NULL),
(91, '2018-08-27 00:00:00', '100.00', 9, NULL),
(92, '2018-08-27 00:00:00', '280.00', 1, NULL),
(93, '2018-08-28 00:00:00', '500.00', 1, NULL),
(94, '2018-08-29 00:00:00', '210.00', 1, NULL),
(95, '2018-08-30 00:00:00', '200.00', 1, NULL),
(96, '2018-08-31 00:00:00', '140.00', 1, NULL),
(97, '2018-09-01 00:00:00', '100.00', 1, NULL),
(98, '2018-09-03 00:00:00', '200.00', 1, NULL),
(99, '2018-09-04 00:00:00', '80.00', 1, NULL),
(100, '2018-09-05 00:00:00', '790.00', 1, NULL),
(101, '2018-09-10 00:00:00', '350.00', 1, NULL),
(102, '2018-09-11 00:00:00', '140.00', 1, NULL),
(103, '2018-09-11 00:00:00', '420.00', 1, NULL),
(104, '2018-09-12 00:00:00', '110.00', 1, NULL),
(105, '2018-09-13 00:00:00', '140.00', 1, NULL),
(106, '2018-09-16 00:00:00', '140.00', 1, NULL),
(107, '2018-09-17 00:00:00', '280.00', 1, NULL),
(108, '2018-09-18 00:00:00', '680.00', 1, NULL),
(109, '2018-09-19 00:00:00', '140.00', 1, NULL),
(110, '2018-09-21 00:00:00', '140.00', 1, NULL),
(111, '2018-09-24 00:00:00', '140.00', 1, NULL),
(112, '2018-09-25 00:00:00', '140.00', 1, NULL),
(113, '2018-09-27 00:00:00', '140.00', 1, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `usluga`
--

CREATE TABLE `usluga` (
  `IdUsluga` int(11) NOT NULL,
  `Naziv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usluga`
--

INSERT INTO `usluga` (`IdUsluga`, `Naziv`) VALUES
(1, 'PHP'),
(2, 'Word'),
(3, 'SQL'),
(4, 'Excel'),
(5, 'Ostalo'),
(6, 'MS Access'),
(7, 'JavaScript'),
(8, 'HTML'),
(9, 'Web'),
(10, 'MySQL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instrukcije`
--
ALTER TABLE `instrukcije`
  ADD PRIMARY KEY (`IdInstrukcija`),
  ADD KEY `fk_usluga` (`IdUsluga`);

--
-- Indexes for table `primanja`
--
ALTER TABLE `primanja`
  ADD PRIMARY KEY (`IdPrimanja`);

--
-- Indexes for table `usluga`
--
ALTER TABLE `usluga`
  ADD PRIMARY KEY (`IdUsluga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instrukcije`
--
ALTER TABLE `instrukcije`
  MODIFY `IdInstrukcija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `primanja`
--
ALTER TABLE `primanja`
  MODIFY `IdPrimanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usluga`
--
ALTER TABLE `usluga`
  MODIFY `IdUsluga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `instrukcije`
--
ALTER TABLE `instrukcije`
  ADD CONSTRAINT `fk_usluga` FOREIGN KEY (`IdUsluga`) REFERENCES `usluga` (`IdUsluga`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

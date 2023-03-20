-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 01:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `szalloda`
--

-- --------------------------------------------------------

--
-- Table structure for table `foglalas`
--

CREATE TABLE `foglalas` (
  `foglAzon` int(11) NOT NULL,
  `szobaAzon` int(11) NOT NULL,
  `szemAzon` int(11) NOT NULL,
  `erkezik` datetime NOT NULL,
  `tavozik` datetime NOT NULL,
  `vendegDb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `igazolvany`
--

CREATE TABLE `igazolvany` (
  `igAzon` int(11) NOT NULL,
  `igTipus` varchar(32) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `szoba`
--

CREATE TABLE `szoba` (
  `szobaAzon` int(11) NOT NULL,
  `szobaDb` int(11) NOT NULL,
  `agyDB` int(11) NOT NULL,
  `erkely` int(11) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `szoba`
--

INSERT INTO `szoba` (`szobaAzon`, `szobaDb`, `agyDB`, `erkely`, `ar`) VALUES
(1, 1, 1, 0, 20000),
(2, 1, 2, 1, 25000),
(3, 1, 2, 2, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `vendeg`
--

CREATE TABLE `vendeg` (
  `szemAzon` int(11) NOT NULL,
  `azonTip` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `szulido` datetime NOT NULL,
  `lakcim` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `telefon` varchar(16) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`foglAzon`),
  ADD KEY `foglalas_szoba_szobaAzon_fk` (`szobaAzon`),
  ADD KEY `foglalas_vendeg_szemAzon_fk` (`szemAzon`);

--
-- Indexes for table `igazolvany`
--
ALTER TABLE `igazolvany`
  ADD PRIMARY KEY (`igAzon`);

--
-- Indexes for table `szoba`
--
ALTER TABLE `szoba`
  ADD PRIMARY KEY (`szobaAzon`);

--
-- Indexes for table `vendeg`
--
ALTER TABLE `vendeg`
  ADD PRIMARY KEY (`szemAzon`),
  ADD KEY `vendeg_igazolvany_igAzon_fk` (`azonTip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `foglAzon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `igazolvany`
--
ALTER TABLE `igazolvany`
  MODIFY `igAzon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `szoba`
--
ALTER TABLE `szoba`
  MODIFY `szobaAzon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendeg`
--
ALTER TABLE `vendeg`
  MODIFY `szemAzon` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foglalas`
--
ALTER TABLE `foglalas`
  ADD CONSTRAINT `foglalas_szoba_szobaAzon_fk` FOREIGN KEY (`szobaAzon`) REFERENCES `szoba` (`szobaAzon`),
  ADD CONSTRAINT `foglalas_vendeg_szemAzon_fk` FOREIGN KEY (`szemAzon`) REFERENCES `vendeg` (`szemAzon`);

--
-- Constraints for table `vendeg`
--
ALTER TABLE `vendeg`
  ADD CONSTRAINT `vendeg_igazolvany_igAzon_fk` FOREIGN KEY (`azonTip`) REFERENCES `igazolvany` (`igAzon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.30.23
-- Generation Time: Sep 05, 2017 at 10:44 AM
-- Server version: 8.0.2-dmr
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BDKDO`
--

-- --------------------------------------------------------

--
-- Table structure for table `choixkdo`
--

CREATE TABLE `choixkdo` (
  `idinvite` int(30) NOT NULL,
  `idkdo` int(30) NOT NULL,
  `quantitekdo` int(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `idinvite` int(20) NOT NULL,
  `nominvite` varchar(10) NOT NULL,
  `passinvite` varchar(32) NOT NULL,
  `mailinvite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kdo`
--

CREATE TABLE `kdo` (
  `idkdo` int(30) NOT NULL,
  `libellekdo` varchar(30) NOT NULL,
  `quantitekdo` int(30) NOT NULL,
  `prixkdo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`idinvite`);

--
-- Indexes for table `kdo`
--
ALTER TABLE `kdo`
  ADD PRIMARY KEY (`idkdo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `idinvite` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdo`
--
ALTER TABLE `kdo`
  MODIFY `idkdo` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

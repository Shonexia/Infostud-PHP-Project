-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 08:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anubis`
--

-- --------------------------------------------------------

--
-- Table structure for table `pozicija`
--

CREATE TABLE `pozicija` (
  `pozicija_id` int(11) NOT NULL,
  `pozicija_naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pozicija`
--

INSERT INTO `pozicija` (`pozicija_id`, `pozicija_naziv`) VALUES
(1, 'Programer'),
(2, 'Designer'),
(3, 'System Administrator'),
(4, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `zaposleni_id` int(255) NOT NULL,
  `zaposleni_ime` varchar(255) NOT NULL,
  `zaposleni_prezime` varchar(255) NOT NULL,
  `pozicija_id` int(255) NOT NULL,
  `zaposleni_plata` float NOT NULL,
  `zaposleni_email` varchar(255) NOT NULL,
  `zaposleni_password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`zaposleni_id`, `zaposleni_ime`, `zaposleni_prezime`, `pozicija_id`, `zaposleni_plata`, `zaposleni_email`, `zaposleni_password`) VALUES
(1, 'Nebojsa', 'Basic Palkovic', 1, 1500, 'nele256@yahoo.com', NULL),
(3, 'Dario', 'Daric', 3, 1500, 'daric@yahoo.com', 'daric1989'),
(4, 'Mirko', 'Miric', 4, 4363, 'miric@yahoo.com', NULL),
(5, 'Sale', 'Salic', 3, 1800, 'salic@yahoo.com', 'salic1989'),
(6, 'Bane', 'Banic', 2, 1300, 'banic@gmail.com', NULL),
(9, 'Kristina', 'Krisic', 1, 1400, 'krisic@yahoo.com', NULL),
(10, 'Goran', 'Goric', 1, 1200, 'goric@gmail.com', NULL),
(11, 'Goran', 'Goric', 4, 3000, 'goric@yahoo.com', 'gogic1989'),
(26, 'vesko', 'veskic', 1, 2450, 'veskic@yahoo.com', NULL),
(41, 'veso', 'vesic', 4, 120, 'vesic@yahoo.com', NULL),
(43, 'reno', 'renici', 2, 1240, 'renic@gmail.com', NULL),
(44, 'nebo', 'nebic', 1, 2580, 'nebic@gmail.com', NULL),
(45, 'Suzana', 'Suzic', 2, 850, 'suzic@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pozicija`
--
ALTER TABLE `pozicija`
  ADD PRIMARY KEY (`pozicija_id`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`zaposleni_id`),
  ADD KEY `zaposleni_uloga` (`pozicija_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pozicija`
--
ALTER TABLE `pozicija`
  MODIFY `pozicija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `zaposleni_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `zaposleni_uloga` FOREIGN KEY (`pozicija_id`) REFERENCES `pozicija` (`pozicija_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

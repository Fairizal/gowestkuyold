-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 11:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gowestkuyold`
--

-- --------------------------------------------------------

--
-- Table structure for table `sepeda`
--

CREATE TABLE `sepeda` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepeda`
--

INSERT INTO `sepeda` (`id`, `nama`, `qty`, `harga`) VALUES
(1, 'Fixie', 2, 200000),
(2, 'Monarc', 11, 250000),
(3, 'Bike', 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id` int(11) NOT NULL,
  `trxno` varchar(20) NOT NULL,
  `tgl_sewa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duedays` int(11) NOT NULL,
  `pelanggan` varchar(20) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `sepeda_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_kembali` timestamp NULL DEFAULT NULL,
  `denda` int(11) NOT NULL,
  `isback` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id`, `trxno`, `tgl_sewa`, `duedays`, `pelanggan`, `nohp`, `alamat`, `sepeda_id`, `total`, `tgl_kembali`, `denda`, `isback`) VALUES
(1, 'SEWA/2100401/001', '2021-04-01 01:27:34', 3, 'Aldi Taher', '083832061160', 'Jalan semarang', 1, 200000, NULL, 0, 0),
(5, 'SEWA/2100401/002', '2021-04-01 05:00:00', 3, 'Budi', '0889798787', 'Sidoarjo', 2, 250000, NULL, 0, 0),
(6, 'SEWA/2100401/003', '2021-04-01 04:28:33', 3, 'Budi', '0889798787', 'Sidoarjo', 2, 250000, '2021-05-02 04:22:44', 1400000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `nohp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `alamat`, `nohp`) VALUES
(1, 'petugas', 'petugas', '81dc9bdb52d04dc20036dbd8313ed055', 'Mburi Omah', '082266425562'),
(2, 'Fairizal Aaron', 'aaron', '39bb37cf36d3b29a9280d8a70a0eed42', 'Warugunung', '083832061160');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sepeda`
--
ALTER TABLE `sepeda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sepeda_id` (`sepeda_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sepeda`
--
ALTER TABLE `sepeda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`sepeda_id`) REFERENCES `sepeda` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

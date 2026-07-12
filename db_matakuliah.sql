-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260526.9a43c2e222
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2026 at 04:48 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_matakuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int NOT NULL,
  `kode_mk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sks` int NOT NULL,
  `semester` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode_mk`, `nama_mk`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'MK001', 'Pemrograman Web I', 3, 3, '2026-07-10 03:41:29', '2026-07-10 03:41:29'),
(2, 'MK002', 'Pemrograman Web II', 3, 4, '2026-07-10 03:41:29', '2026-07-10 03:41:29'),
(3, 'MK011', 'Basis Data', 3, 4, '2026-07-10 03:41:29', '2026-07-11 21:16:52'),
(9, 'MK013', 'Interaksi Manusia dan Komputer', 1, 1, '2026-07-11 21:18:42', '2026-07-11 21:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_mk` (`kode_mk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

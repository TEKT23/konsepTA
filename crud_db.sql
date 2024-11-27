-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 11:26 AM
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
-- Database: `crud_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `status` enum('Pelajar','Mahasiswa','Pekerja') NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `name`, `email`, `phone`, `dob`, `alamat`, `jekel`, `status`, `pesan`) VALUES
(1, 'Ikbar', 'tekt23@gmail.com', '081366150394', '2004-08-23', 'Jl. Belibis Lr. Adam No.29, Labui, Ateuk Pahlawan, Baiturahman', 'Laki-laki', 'Pelajar', 'berikan saya slot untuk tournamen'),
(2, 'Lmam', 'lemamJS@gmail.com', '082355681598', '0000-00-00', '', 'Laki-laki', 'Pelajar', ''),
(5, 'angripa', 'bangyan@gmail.com', '081365464564', '0000-00-00', '', 'Laki-laki', 'Pelajar', ''),
(7, 'gustid', 'gugustitit@gmail.com', '012385154548', '2024-11-18', 'lr. cempaka', 'Laki-laki', 'Pelajar', 'aku adalah polisi'),
(8, 'angsep', 'gaatod@gmail.com', '08128563458', '2024-11-02', 'jalan angsep', 'Laki-laki', 'Pelajar', 'plis wok'),
(9, 'siapadah', 'gaktau@gmail.com', '08135486516841', '2024-11-16', 'jl. berkah', 'Perempuan', 'Mahasiswa', 'aku mau makan siang gratisnya wok\r\n'),
(11, 'ketek', 'last@gmail.com', '8468614534', '2024-10-30', 'jl. berkah', 'Laki-laki', 'Mahasiswa', 'saya nak daftar tour ml wok'),
(13, 'dobleh', 'dodo@gmail.com', '081355313515', '2024-11-23', 'surien', 'Laki-laki', 'Pelajar', 'saya nak daftar juga');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'ikbar', '$2y$10$VflA2cPnOSwkN7P2iWVyCeJoCMVM6Jz2PQtqWZR/YzHEwpBGSqZtK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2023 pada 07.00
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan_kel11`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `performance`
--

CREATE TABLE `performance` (
  `nik` int(8) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `status_kerja` enum('Tetap','Tidak Tetap') NOT NULL,
  `position` varchar(10) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `responsibility` decimal(10,2) NOT NULL,
  `teamwork` decimal(10,2) NOT NULL,
  `management_time` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `performance`
--

INSERT INTO `performance` (`nik`, `foto`, `nama`, `status_kerja`, `position`, `tgl_penilaian`, `responsibility`, `teamwork`, `management_time`, `total`, `grade`) VALUES
(12124669, '12124669-Martin.png', 'Martin', 'Tidak Tetap', 'Freelancer', '2023-08-02', 60.00, 90.00, 35.00, 59.00, 'C'),
(43819448, '43819448-Lisa.png', 'Lisa', 'Tetap', 'Pembukuan', '2023-10-30', 40.00, 30.00, 35.00, 35.00, 'D'),
(52052550, '52052550-Robert.png', 'Robert', 'Tetap', 'Karyawan', '2023-10-23', 80.00, 70.00, 80.00, 77.00, 'B'),
(78571380, '78571380-John.png', 'John', 'Tidak Tetap', 'Manager', '2023-09-20', 80.00, 70.00, 80.00, 77.00, 'B'),
(80982064, '80982064-Marry.png', 'Marry ', 'Tidak Tetap', 'Karyawan', '2023-10-02', 90.00, 80.00, 78.00, 82.20, 'A'),
(85729595, '85729595-Jean.png', 'Jean', 'Tetap', 'Manager', '2023-10-18', 70.00, 60.00, 50.00, 59.00, 'C'),
(94659671, '94659671-William.png', 'William', 'Tidak Tetap', 'Karyawan', '2023-08-22', 90.00, 100.00, 60.00, 81.00, 'A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

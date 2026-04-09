-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2025 pada 15.36
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
-- Database: `koperasi_jabbar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tal_daftar` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tal_daftar`, `jk`, `no_hp`, `foto`) VALUES
(1, 'Isyroqi Weldana Agung', 'Bojong Menteng', '2025-02-08', 'Perempuan', 842324232, 'dkr.jpg '),
(2, 'Falabi Atthala', 'Pasir Putih', '09-02-2025', 'Laki-Laki', 823432988, 'awn.png'),
(3, 'Muhammad Fatih Baktiar', 'Mahkota Cimuning', '10-02-2025', 'Laki-Laki', 8139230, 'jane.png'),
(4, 'Reihan Fahrezi', 'Gsp', '14-02-2025', 'Laki-Laki', 823423223, 'nbm.jpg'),
(5, 'Yazid', 'At Taqwa', '15-02-2025', 'Laki-Laki', 834235322, 'car.jpg'),
(6, 'Jabbar', 'mcg', '2025-02-25', '', 8235623, '67bd4bcf8e1a8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

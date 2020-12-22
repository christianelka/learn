-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Sep 2020 pada 04.15
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_training`
--

CREATE TABLE `data_training` (
  `id_data` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `kode_soal` text NOT NULL,
  `nilai_user` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `bobot_soal` int(11) NOT NULL,
  `latihan_ke` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_data`
--

CREATE TABLE `main_data` (
  `id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `income` text NOT NULL,
  `student` text NOT NULL,
  `credit_rating` text NOT NULL,
  `buy_computer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `main_data`
--

INSERT INTO `main_data` (`id`, `age`, `income`, `student`, `credit_rating`, `buy_computer`) VALUES
(1, 28, 'high', 'no', 'fair', 'no'),
(2, 26, 'high', 'no', 'excellent', 'no'),
(3, 33, 'high', 'no', 'fair', 'yes'),
(4, 42, 'medium', 'no', 'fair', 'yes'),
(5, 43, 'low', 'yes', 'fair', 'yes'),
(6, 44, 'low', 'yes', 'excellent', 'no'),
(7, 31, 'low', 'yes', 'excellent', 'yes'),
(8, 30, 'medium', 'no', 'fair', 'no'),
(9, 27, 'low', 'yes', 'fair', 'yes'),
(10, 41, 'medium', 'yes', 'fair', 'yes'),
(11, 19, 'medium', 'yes', 'excellent', 'yes'),
(12, 33, 'medium', 'no', 'excellent', 'yes'),
(13, 37, 'high', 'yes', 'fair', 'yes'),
(14, 46, 'medium', 'no', 'excellent', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_bobot`
--

CREATE TABLE `training_bobot` (
  `id_training` int(11) NOT NULL,
  `kode_soal` text NOT NULL,
  `nilai_user` text NOT NULL,
  `waktu` int(11) NOT NULL,
  `bobot_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `training_bobot`
--

INSERT INTO `training_bobot` (`id_training`, `kode_soal`, `nilai_user`, `waktu`, `bobot_soal`) VALUES
(1, 'A1', 'C', 4, 3),
(2, 'A1', 'B', 2, 5),
(3, 'A1', 'D', 5, 2),
(4, 'A1', 'B', 3, 4),
(5, 'A1', 'C', 3, 4),
(6, 'A1', 'A', 2, 5),
(7, 'A1', 'D', 4, 3),
(8, 'A1', 'E', 5, 2),
(9, 'A1', 'B', 4, 4),
(10, 'A1', 'C', 2, 4),
(11, 'A1', 'E', 3, 1),
(12, 'A1', 'A', 3, 5),
(13, 'A1', 'B', 4, 4),
(14, 'A2', 'C', 3, 3),
(15, 'A2', 'B', 3, 4),
(16, 'A2', 'A', 2, 5),
(17, 'A2', 'C', 4, 3),
(18, 'A2', 'D', 5, 2),
(19, 'A2', 'E', 5, 1),
(20, 'A2', 'B', 3, 4),
(21, 'A2', 'A', 2, 5),
(22, 'A2', 'D', 3, 4),
(23, 'A2', 'C', 4, 4),
(24, 'A3', 'D', 4, 4),
(25, 'A3', 'A', 1, 5),
(26, 'A3', 'B', 1, 4),
(27, 'A3', 'E', 1, 1),
(28, 'A3', 'C', 3, 5),
(29, 'A3', 'A', 2, 5),
(30, 'A3', 'A', 3, 5),
(31, 'A3', 'B', 4, 4),
(32, 'A3', 'D', 3, 3),
(33, 'A3', 'C', 3, 2),
(34, 'A3', 'B', 2, 4),
(35, 'A3', 'B', 4, 4),
(36, 'A3', 'C', 3, 4),
(37, 'A3', 'A', 1, 5),
(38, 'A3', 'E', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `training_level`
--

CREATE TABLE `training_level` (
  `id_training` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `nilai_user` text NOT NULL,
  `waktu` int(11) NOT NULL,
  `latihan_ke` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `training_level`
--

INSERT INTO `training_level` (`id_training`, `user_id`, `nilai_user`, `waktu`, `latihan_ke`, `level`) VALUES
(1, 'U1', 'C', 4, 3, 3),
(2, 'U2', 'B', 2, 5, 5),
(3, 'U3', 'D', 5, 2, 2),
(4, 'U4', 'B', 3, 4, 4),
(5, 'U5', 'C', 3, 4, 4),
(6, 'U1', 'A', 2, 5, 5),
(7, 'U2', 'D', 4, 3, 3),
(8, 'U3', 'E', 5, 2, 2),
(9, 'U4', 'B', 4, 4, 4),
(10, 'U5', 'C', 2, 4, 4),
(11, 'U1', 'E', 3, 1, 1),
(12, 'U2', 'A', 3, 5, 5),
(13, 'U3', 'B', 4, 4, 4),
(14, 'U4', 'C', 3, 3, 3),
(15, 'U5', 'B', 3, 4, 4),
(16, 'U1', 'A', 2, 5, 5),
(17, 'U2', 'C', 4, 3, 3),
(18, 'U3', 'D', 5, 2, 2),
(19, 'U4', 'E', 5, 1, 1),
(20, 'U5', 'B', 3, 4, 4),
(21, 'U1', 'A', 2, 5, 5),
(22, 'U2', 'D', 3, 4, 4),
(23, 'U3', 'C', 4, 4, 4),
(24, 'U4', 'D', 4, 4, 4),
(25, 'U5', 'A', 1, 5, 5),
(26, 'U1', 'B', 1, 4, 4),
(27, 'U2', 'E', 1, 1, 1),
(28, 'U3', 'C', 3, 5, 5),
(29, 'U4', 'A', 2, 5, 5),
(30, 'U5', 'A', 3, 5, 5),
(31, 'U1', 'A', 2, 5, 5),
(32, 'U2', 'D', 3, 4, 4),
(33, 'U3', 'C', 4, 4, 4),
(34, 'U4', 'D', 4, 4, 4),
(35, 'U5', 'A', 1, 5, 5),
(36, 'U1', 'B', 1, 4, 4),
(37, 'U2', 'E', 1, 1, 1),
(38, 'U3', 'C', 3, 5, 5),
(39, 'U4', 'A', 2, 5, 5),
(40, 'U5', 'A', 3, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `main_data`
--
ALTER TABLE `main_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `training_bobot`
--
ALTER TABLE `training_bobot`
  ADD PRIMARY KEY (`id_training`);

--
-- Indeks untuk tabel `training_level`
--
ALTER TABLE `training_level`
  ADD PRIMARY KEY (`id_training`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `main_data`
--
ALTER TABLE `main_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `training_bobot`
--
ALTER TABLE `training_bobot`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `training_level`
--
ALTER TABLE `training_level`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

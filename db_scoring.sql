-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2022 pada 13.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scoring`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `juri`
--

CREATE TABLE `juri` (
  `id_juri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertandingan` int(11) NOT NULL,
  `status` char(50) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `juri`
--

INSERT INTO `juri` (`id_juri`, `id_user`, `id_pertandingan`, `status`, `tanggal`) VALUES
(41, 1, 11, 'berlangsung', '2022-04-18'),
(42, 4, 11, 'berlangsung', '2022-04-18'),
(43, 5, 11, 'berlangsung', '2022-04-18'),
(44, 6, 11, 'berlangsung', '2022-04-18'),
(45, 7, 11, 'berlangsung', '2022-04-18');

--
-- Trigger `juri`
--
DELIMITER $$
CREATE TRIGGER `updateUser` AFTER INSERT ON `juri` FOR EACH ROW UPDATE user SET user_status = 'unfree' WHERE id_user = new.id_user
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateUser2` AFTER DELETE ON `juri` FOR EACH ROW UPDATE user SET user_status = 'free' WHERE id_user = old.id_user
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id_pertandingan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemain1` char(100) NOT NULL,
  `pemain2` char(100) NOT NULL,
  `kelas` char(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `id_user`, `pemain1`, `pemain2`, `kelas`, `tanggal`, `status`) VALUES
(11, 3, 'dsad', 'sadsa', 'Tunggal', '2022-04-18', 'berlangsung');

--
-- Trigger `pertandingan`
--
DELIMITER $$
CREATE TRIGGER `updateJuri` AFTER INSERT ON `pertandingan` FOR EACH ROW UPDATE juri SET id_pertandingan = new.id_pertandingan where id_pertandingan = 0 AND status = 'berlangsung' AND tanggal = new.tanggal
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateJuri2` AFTER DELETE ON `pertandingan` FOR EACH ROW DELETE FROM juri WHERE id_pertandingan = old.id_pertandingan
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateWasit` AFTER INSERT ON `pertandingan` FOR EACH ROW UPDATE user SET user_status = 'unfree' WHERE id_user = new.id_user
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateWasit2` AFTER DELETE ON `pertandingan` FOR EACH ROW UPDATE user set user_status = 'free' WHERE id_user = old.id_user
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `password` char(100) NOT NULL,
  `nama` char(100) NOT NULL,
  `level` enum('MOD','JUR','WAS','') NOT NULL,
  `user_status` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `user_status`) VALUES
(1, 'juri', '8cb2237d0679ca88db6464eac60da96345513964', 'Juri', 'JUR', 'unfree'),
(2, 'moderator', '8cb2237d0679ca88db6464eac60da96345513964', 'Moderator', 'MOD', 'free'),
(3, 'wasit', '8cb2237d0679ca88db6464eac60da96345513964', 'Wasit', 'WAS', 'unfree'),
(4, 'juri2', '8cb2237d0679ca88db6464eac60da96345513964', 'Juri 2', 'JUR', 'unfree'),
(5, 'juri3', '8cb2237d0679ca88db6464eac60da96345513964', 'Juri 3', 'JUR', 'unfree'),
(6, 'juri4', '8cb2237d0679ca88db6464eac60da96345513964', 'Juri 4', 'JUR', 'unfree'),
(7, 'juri5', '8cb2237d0679ca88db6464eac60da96345513964', 'Juri 5', 'JUR', 'unfree');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `juri`
--
ALTER TABLE `juri`
  ADD PRIMARY KEY (`id_juri`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pertandingan` (`id_pertandingan`);

--
-- Indeks untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `id_wasit` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `juri`
--
ALTER TABLE `juri`
  MODIFY `id_juri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2025 pada 18.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuliner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_makanan`
--

CREATE TABLE `tbl_makanan` (
  `nama_makanan` varchar(100) NOT NULL,
  `daerah_makanan` varchar(100) NOT NULL,
  `foto_makanan` blob DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_makanan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_makanan`
--

INSERT INTO `tbl_makanan` (`nama_makanan`, `daerah_makanan`, `foto_makanan`, `keterangan`, `id_makanan`) VALUES
('ketoprak', 'jember', NULL, NULL, 1),
('pecel', 'bandung', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  MODIFY `id_makanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

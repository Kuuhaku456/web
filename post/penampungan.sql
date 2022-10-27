-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 13.38
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penampungan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_dokter`
--

CREATE TABLE `dt_dokter` (
  `id` int(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lulusan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_dokter`
--

INSERT INTO `dt_dokter` (`id`, `nama`, `lulusan`, `email`, `alamat`) VALUES
(13, 'RUBEN ADRIEL MANIK', 'universitas Mulawarman', 'manikfillipus03@gmail.com', 'JL. SEPINGGAN BARU II NO.373');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `priv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `priv`) VALUES
(6, 'Kuuhaku', '$2y$10$3jLe4uJGawjNRjlS.m.OHeK7mb1lXFpvzLx5R13E5P/PkQUehfqj.', 'admin'),
(7, 'user', '$2y$10$VvFMuBZKru57K51ovwpOH.gJtlGMP9XR9qzd3qlxR.vMlGcrK/Cc6', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` int(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `metode` varchar(10) NOT NULL,
  `gambar` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `nama`, `alamat`, `email`, `layanan`, `tanggal`, `metode`, `gambar`) VALUES
(1, 'RUBEN ADRIEL MANIK', 'JL. SEPINGGAN BARU II NO.373', 'manikfillipus03@gmail.com', 'Akupuntur', '2022-10-27', 'cash', 'RUBEN ADRIEL MANIK.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_dokter`
--
ALTER TABLE `dt_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_dokter`
--
ALTER TABLE `dt_dokter`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

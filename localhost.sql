-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Des 2023 pada 16.02
-- Versi server: 10.5.20-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21619948_rumahkos`
--
CREATE DATABASE IF NOT EXISTS `id21619948_rumahkos` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id21619948_rumahkos`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `userid` text DEFAULT NULL,
  `nokamar` text DEFAULT NULL,
  `biayasewa` text DEFAULT NULL,
  `tanggalmasuk` text DEFAULT NULL,
  `tanggalkeluar` text DEFAULT NULL,
  `statusbayar` text DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `userid`, `nokamar`, `biayasewa`, `tanggalmasuk`, `tanggalkeluar`, `statusbayar`, `catatan`) VALUES
(11, '15', '1', '500000', '15-Dec-2023', '23-Dec-2023', 'Lunas', 'Tidak ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `userid` text DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` text DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `nokamar` text DEFAULT NULL,
  `bukti` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `userid`, `judul`, `deskripsi`, `tanggal`, `nama`, `nokamar`, `bukti`) VALUES
(4, '15', 'Pintu rusak', 'Kunci rusak dibobol maling', '30 des 2023', 'Budi', '1', 'uploads/657b6a43a7f33_images (3).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `nama` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `tanggallahir` text DEFAULT NULL,
  `kontakdarurat` text DEFAULT NULL,
  `hakakses` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `nama`, `password`, `alamat`, `telepon`, `email`, `tanggallahir`, `kontakdarurat`, `hakakses`, `gambar`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, 'admin', NULL),
(15, 'Budi', 'Budi', 'JL. Diponegoro', '081242671302', 'budi@yahoo.com', 'Banjar, 24 Jan 2003', '082113338', 'user', 'uploads/657b629f38190_images (2).jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

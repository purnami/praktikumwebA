-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2020 pada 13.02
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(128) NOT NULL,
  `jenis_buku` varchar(128) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `gambar` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `jenis_buku`, `penulis`, `penerbit`, `tahun_terbit`, `gambar`) VALUES
(1, 'Pemrograman database dengan Delphi7 menggunakan Acces ADO', 'Komputer', 'Abdul Kadir', 'Penerbit Andi', 2004, 'Buku1.jpeg'),
(2, 'Pengantar Ilmu Pertanian', 'Pertanian', 'Triwibowo Yuwono', 'Gadjah Mada University Press', 2014, 'Buku2.jpg'),
(3, 'Animasi pendidikan menggunakan flash', 'Komputer', 'Priyanto Hidayatullah', 'Penerbit Informatika', 2011, 'Buku3.jpg'),
(4, 'Dasar-dasar epidemiologi', 'Kedokteran', 'Slamet Riyadi', 'Salemba Medika', 2011, 'Buku4.jpeg'),
(5, 'Analisis dan Perancangan Fondasi 1', 'Teknik Sipil', 'Harry Christady Hardiyatmo', 'Gadjah Mada University Press', 2010, 'Buku5.jpg'),
(6, 'Analisis dan Perancangan Fondasi 2', 'Teknik Sipil', 'Harry Christady Hardiyatmo', 'Gadjah Mada University Press', 2011, 'Buku6.png'),
(7, 'Biologi Reproduksi', 'Kedokteran', 'Ayu Febri Wulanda', 'Salemba Medika', 2011, 'Buku7.jpg'),
(8, 'Algoritma dan Teknik Pemrograman', 'Komputer', 'Budi Sutejo', 'Penerbit Andi', 2000, 'Buku8.jpeg'),
(9, 'Taksonomi Tumbuhan', 'Pertanian', 'Gembong Tjitrosoepomo', 'Gadjah Mada University Press', 2014, 'Buku9.jpg'),
(10, 'Farmakokinetika Klinik', 'Farmasi', 'Djoko Wahyono', 'Gadjah Mada University Press', 2016, 'Buku10.jpg'),
(11, 'Pemrograman Pascal', 'Komputer', 'Abdul Kadir', 'Penerbit Andi', 1999, 'Buku11.jpeg'),
(12, 'Desain Hidraulik Bangunan Irigasi', 'Teknik Sipil', 'Erman Mawardi', 'Alfabeta', 2009, 'Buku12.jpg'),
(13, 'Biokimia Farmasi', 'Farmasi', 'Sismindari', 'Gadjah Mada University Press', 2016, 'Buku13.png'),
(14, 'Geosintetik untuk Rekayasa Jalan Raya: Perancangan dan Aplikasi', 'Teknik Sipil', 'Harry Christady Hardiyatmo', 'Gadjah Mada University Press', 2009, 'Buku14.jpg'),
(15, 'Analisis Perancangan Sistem Berorientasi Objek', 'Komputer', 'Munawar', 'Penerbit Informatika', 2015, 'Buku15.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'purnami', 'purnami24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

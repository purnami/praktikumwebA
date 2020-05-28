-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2020 pada 16.07
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
-- Database: `perpus`
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
  `gambar` varchar(16) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `jenis_buku`, `penulis`, `penerbit`, `tahun_terbit`, `gambar`, `no_rak`, `stok`) VALUES
(1, 'Pemrograman database dengan Delphi7 menggunakan Acces ADO', 'Komputer', 'Abdul Kadir', 'Penerbit Andi', 2004, 'Buku1.jpeg', 1, 3),
(3, 'Animasi pendidikan menggunakan flash', 'Komputer', 'Priyanto Hidayatullah', 'Penerbit Informatika', 2011, 'Buku3.jpg', 1, 1),
(4, 'Dasar-dasar epidemiologi', 'Kedokteran', 'Slamet Riyadi', 'Salemba Medika', 2011, 'Buku4.jpeg', 3, 5),
(5, 'Analisis dan Perancangan Fondasi 1', 'Teknik Sipil', 'Harry Christady Hardiyatmo', 'Gadjah Mada University Press', 2010, 'Buku5.jpg', 4, 2),
(6, 'Analisis dan Perancangan Fondasi 2', 'Teknik Sipil', 'Harry Christady Hardiyatmo', 'Gadjah Mada University Press', 2011, 'Buku6.png', 4, 2),
(7, 'Biologi Reproduksi', 'Kedokteran', 'Ayu Febri Wulanda', 'Salemba Medika', 2011, 'Buku7.jpg', 3, 9),
(8, 'Algoritma dan Teknik Pemrograman', 'Komputer', 'Budi Sutejo', 'Penerbit Andi', 2000, 'Buku8.jpeg', 1, 6),
(9, 'Taksonomi Tumbuhan', 'Pertanian', 'Gembong Tjitrosoepomo', 'Gadjah Mada University Press', 2014, 'Buku9.jpg', 2, 4),
(10, 'Farmakokinetika Klinik', 'Farmasi', 'Djoko Wahyono', 'Gadjah Mada University Press', 2016, 'Buku10.jpg', 5, 3),
(11, 'Pemrograman Pascal', 'Komputer', 'Abdul Kadir', 'Penerbit Andi', 1999, 'Buku11.jpeg', 1, 1),
(12, 'Desain Hidraulik Bangunan Irigasi', 'Teknik Sipil', 'Erman Mawardi', 'Alfabeta', 2009, 'Buku12.jpg', 4, 0),
(13, 'Biokimia Farmasi', 'Farmasi', 'Sismindari', 'Gadjah Mada University Press', 2016, 'Buku13.png', 5, 10),
(14, 'Geosintetik untuk Rekayasa Jalan Raya: Perancangan dan Aplikasi', 'Teknik Sipil', 'Harry Christady Hardiyatmo', 'Gadjah Mada University Press', 2009, 'Buku14.jpg', 4, 7),
(15, 'Analisis Perancangan Sistem Berorientasi Objek1', 'Komputer', 'Munawar', 'Penerbit Informatika', 2015, 'Buku15.jpg', 1, 5),
(30, 'Pemrograman Web Dasar', 'Komputer', 'purnami', 'ilkom', 2020, 'toko buku.jpeg', 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_user`, `id_buku`, `status`, `tgl_pinjam`, `tgl_kembali`) VALUES
(62, 2, 2, -1, '0000-00-00', '0000-00-00'),
(63, 2, 15, -1, '0000-00-00', '0000-00-00'),
(64, 1, 6, 1, '2020-05-28', '2020-06-04'),
(65, 2, 5, -1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `is_active`) VALUES
(1, 'pur', 'pur@gmail.com', 'purnami', 3, 1),
(2, 'laksmi123', 'laksmi@gmail.com', 'laksmi', 3, 1),
(3, 'Super Admin', 'superadmin@gmail.com', 'superadmin', 1, 1),
(4, 'admin1', 'admin1@gmail.com', 'admin1', 2, 1),
(5, 'admin2', 'admin2@gmail.com', 'admin2', 2, 1),
(7, 'admin3', 'admin3@gmail.com', 'admin3', 2, 0),
(8, 'admin4', 'admin4@gmail.com', 'admin4', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

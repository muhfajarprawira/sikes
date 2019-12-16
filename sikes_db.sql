-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Des 2019 pada 01.54
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11883022_sikes`
--
CREATE DATABASE IF NOT EXISTS `id11883022_sikes` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id11883022_sikes`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `kode_dokter` varchar(4) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `nomor_induk_dokter` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`kode_dokter`, `nama_dokter`, `jenis_kelamin`, `nomor_induk_dokter`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_poli`) VALUES
('D-12', 'Ayu', 'Perempuan', '53234678889965', 'Jakarta', '1961-12-10', 'Samarinda', 'Poli KIA'),
('D-27', 'Andini', 'Perempuan', '97736378383838', 'Bogor', '1955-12-10', 'Jakarta', 'Poli UMUM'),
('S-23', 'Gading', 'Laki-Laki', '98783898829543', 'Cimahi', '1999-02-22', 'Cildeug', 'Poli UMUM'),
('S-24', 'Maryudi', 'Laki-Laki', '71816838888718', 'Bandung', '1985-12-03', 'Santiong', 'Poli GIGI'),
('S-33', 'Suradi', 'Laki-Laki', '88378484849494', 'Medan', '1962-12-10', 'Semarang', 'Poli GIGI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_obat`
--

CREATE TABLE `data_obat` (
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `dosis_aturan_obat` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_obat`
--

INSERT INTO `data_obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `dosis_aturan_obat`, `satuan`) VALUES
('PG-58', 'Pil Vitamin A', 'Suplemen', '3 x 1 Sehari', 'Strip'),
('SD-65', 'Polivanol', 'Obat Tetes Luka', 'Setiap pakai 50 ml', 'Botol'),
('SN-11', 'Alpara', 'Kapsul', '3 x 1 Sehari', 'Strip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `hari` varchar(13) NOT NULL,
  `jam_mulai` varchar(13) NOT NULL,
  `jam_selesai` varchar(13) NOT NULL,
  `poli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `poli`) VALUES
(2, 'Ayu', 'Selasa', '07.30', '11.00', 'POLI KIA'),
(3, 'Andini', 'Rabu', '14.30', '16.30', 'POLI UMUM'),
(4, 'Gading', 'Senin', '07.30', '11.30', 'POLI UMUM'),
(5, 'Maryudi', 'Kamis', '08.00', '11.00', 'POLI GIGI'),
(6, 'Suradi', 'Sabtu', '07.30', '16.30', 'POLI GIGI'),
(7, 'Ani', 'Senin', '10.00', '14.30', 'POLI KIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_rekamedis` char(6) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status_pasien` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_rekamedis`, `no_ktp`, `no_bpjs`, `nama_pasien`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status_pasien`) VALUES
('000001', '098765467867', '989765764567', 'Zainal', 'Laki-Laki', 'Bandung', '2019-12-03', 'Jl.Mawar', 'UMUM'),
('000002', '987868237', '978768363', 'Ica', 'Perempuan', 'Jakarta', '1998-12-12', 'Jl.Koi', 'BPJS'),
('000003', '976536672', '8736363', 'Budi', 'Laki-Laki', 'Lumajang', '1996-12-05', 'Bojonegoro', 'BPJS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `npwp`, `tempat_lahir`, `tanggal_lahir`, `jabatan`, `bidang`) VALUES
(935646223, 'Anita', 'Perempuan', '99837664238', 'Cilacap', '1991-01-08', 'Staff Administrasi', 'Administrasi'),
(987687561, 'Sandi', 'Laki-Laki', '958593882899', 'Cirebon', '2019-12-25', 'Staff Apotek', 'Apotek'),
(987976643, 'Deni', 'Laki-Laki', '90876543213', 'Bandung', '2018-11-27', 'Staff Administrasi', 'Administrasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$H7FZ/9T40RIwsxKT1d8N2u0gBbT1xCL8SRLDfTtpKDmQb/davx0YK', 1, 1, 1562195518),
(8, 'User', 'user@gmail.com', 'default.jpg', '$2y$10$QVn2QBu4LTsTnYDIsunqr.Z0rp6G4RLzzkDCPuoImgFJeVF4.a3jC', 2, 1, 1562902391);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Jadwal Praktek Dokter', 'jadwal', 'fas fa-fw fa-calendar-alt', 1),
(3, 1, 'Data Pegawai', 'pegawai\r\n', 'fas fa-fw fa-user-friends', 1),
(4, 1, 'Data Pasien', 'pasien', 'fas fa-fw fa-users', 1),
(5, 1, 'Data Obat', 'data_obat', 'fas fa-fw fa-notes-medical', 1),
(6, 1, 'Data Dokter', 'data_dokter', 'fas fa-fw fas fa-user-md', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`kode_dokter`);

--
-- Indeks untuk tabel `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_rekamedis`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2019 at 02:03 AM
-- Server version: 10.3.16-MariaDB-1:10.3.16+maria~stretch-log
-- PHP Version: 5.6.40-8+0~20190531120521.15+stretch~1.gbpa77d1d

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `id_klinik` int(10) NOT NULL,
  `alamat_1` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `id_klinik`, `alamat_1`, `alamat_2`, `kecamatan`, `kota`, `provinsi`) VALUES
(1, 1, 'Jalan Mawar No 16', '', 'Pancoran', 'Jakarta Selatan', 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', 1, NULL, NULL),
('klinik', 8, NULL, 'N;'),
('klinik', 9, NULL, 'N;'),
('sudin', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE `authitem` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `bizrule` text DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`id`, `name`, `type`, `description`, `bizrule`, `data`) VALUES
(1, 'admin', 2, 'role untuk admin', '', ''),
(2, 'dinkes', 2, 'role untuk dinas kesehatan level provinsi', '', ''),
(3, 'sudin', 2, 'role untuk suku dinas di level kabupaten/kota', '', ''),
(4, 'klinik', 2, 'role untuk klinik', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berkas_akreditasi`
--

CREATE TABLE `berkas_akreditasi` (
  `id_pengajuan` int(10) NOT NULL,
  `tipe_berkas` int(10) DEFAULT NULL,
  `file_path` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_klinik`
--

CREATE TABLE `fasilitas_klinik` (
  `id` int(11) NOT NULL,
  `id_klinik` int(10) NOT NULL,
  `qty_tempat_tidur` int(10) DEFAULT NULL,
  `penyelenggaraan` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_klinik`
--

INSERT INTO `fasilitas_klinik` (`id`, `id_klinik`, `qty_tempat_tidur`, `penyelenggaraan`) VALUES
(1, 1, 10, 'rawat_inap');

-- --------------------------------------------------------

--
-- Table structure for table `foto_klinik`
--

CREATE TABLE `foto_klinik` (
  `id` int(11) NOT NULL,
  `id_klinik` int(10) NOT NULL,
  `path_foto` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `kode_klinik` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_izin` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepemilikan` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `karakteristik` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkatan` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`id`, `id_user`, `kode_klinik`, `nama`, `no_izin`, `kepemilikan`, `penanggung_jawab`, `karakteristik`, `tingkatan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 8, 'KL001', 'Sentra Medika', '01/MARET/2019', 'Pribadi', 'Purwa Ren', 'Karakterisik', 'dasar', 'Guest', '2019-07-17 10:27:27', 'purwaren', '2019-07-18 02:02:36'),
(2, 9, NULL, 'Medika Sejahtera', NULL, NULL, 'Nafis Pradana', NULL, NULL, 'Guest', '2019-07-17 12:55:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `id_klinik` int(10) NOT NULL,
  `no_telp` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_fax` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `id_klinik`, `no_telp`, `no_fax`, `email`, `website`) VALUES
(1, 1, '021 665772', '', 'sentra.medika@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `pendamping`
--

CREATE TABLE `pendamping` (
  `id` int(10) NOT NULL,
  `id_sudin` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tipe` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar_depan` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_belakang` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jabatan` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_akreditasi`
--

CREATE TABLE `pengajuan_akreditasi` (
  `id` int(10) NOT NULL,
  `id_klinik` int(10) NOT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `jenis_pengajuan` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_penetapan` date DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_tipe_berkas`
--

CREATE TABLE `ref_tipe_berkas` (
  `id` int(10) NOT NULL,
  `nama` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_tipe_berkas`
--

INSERT INTO `ref_tipe_berkas` (`id`, `nama`) VALUES
(1, 'Surat Permohonan'),
(2, 'Profil Klinik'),
(3, 'Laporan Pra Survey'),
(4, 'Surat Pengantar'),
(5, 'Instrumen Pemantauan'),
(6, 'Rekomendasi');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id_pendamping` int(10) NOT NULL,
  `nama_institusi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berakhir` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id_pendamping` int(10) NOT NULL,
  `nama_institusi` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id_pendamping` int(10) NOT NULL,
  `no_sertifikat` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_peminatan` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_perolehan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sudin`
--

CREATE TABLE `sudin` (
  `id` int(10) NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_fax` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `flag_delete` int(1) NOT NULL DEFAULT 0,
  `login_atemp` int(1) NOT NULL DEFAULT 0,
  `last_login_attempt` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `timestamp_created` datetime NOT NULL,
  `timestamp_updated` datetime DEFAULT NULL,
  `user_create` varchar(32) NOT NULL,
  `user_update` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `salt`, `status`, `flag_delete`, `login_atemp`, `last_login_attempt`, `last_login_time`, `timestamp_created`, `timestamp_updated`, `user_create`, `user_update`) VALUES
(1, 'Administrator', 'admin', 'and.thau@gmail.com', '$2y$13$2Qd1NqjjIj5Eyt1iVzcdT.8DNBaeI4NlIhvgg5L8sk0wpENWcjtg2', '$2y$13$jv/n.WhUXe0OdfVlkIGnc2', 1, 0, 0, NULL, NULL, '2016-03-17 13:28:17', NULL, 'admin', NULL),
(2, 'Purwanto', 'purwa', 'purwanto@modefashiongroup.com', '$2y$13$E/8Q2W27QpEiEGBpZPW5HuoohCvsrKq.p.NtU8Pdr64RzyHDPM7/C', '$2y$13$rwqp1gCirA8u6cHtW/GlhT', 1, 0, 0, NULL, NULL, '2016-03-17 13:36:49', NULL, 'admin', NULL),
(8, 'Purwa Ren', 'purwaren', 'and.thau@gmail.com', '$2y$13$6cn8stmeXKUgYxWLkEPYauTPC69Kuy/6XVQy1qntktvhOrYpNQRpK', '$2y$13$3HLDJSnByAFBCkaFbZJypu', 1, 0, 0, NULL, NULL, '2019-07-17 10:27:27', NULL, 'Guest', NULL),
(9, 'Nafis Pradana', 'nafis', 'nafis@gmail.com', '$2y$13$.EKgtKvey5VqXDFpWChBRuw2bO/9kb/7uRFRkviQnX.QxitI2Csri', '$2y$13$XUFVMGfrX1ejsSChAmBx16', 1, 0, 0, NULL, NULL, '2019-07-17 12:55:13', NULL, 'Guest', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `YiiSession`
--

CREATE TABLE `YiiSession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `YiiSession`
--

INSERT INTO `YiiSession` (`id`, `expire`, `data`) VALUES
('pe11trl82sv3kbet6h39bnd9l3', 1563416258, 0x5969692e4343617074636861416374696f6e2e35386265396262322e736974652e636170746368617c733a373a227075646f736f72223b5969692e4343617074636861416374696f6e2e35386265396262322e736974652e63617074636861636f756e747c693a323b34323964363865393037363862326537623433366639343566363539663264645f5f69647c733a313a2238223b34323964363865393037363862326537623433366639343566363539663264645f5f6e616d657c733a383a22707572776172656e223b343239643638653930373638623265376234333666393435663635396632646466756c6c6e616d657c733a393a2250757277612052656e223b34323964363865393037363862326537623433366639343566363539663264645f5f7374617465737c613a313a7b733a383a2266756c6c6e616d65223b623a313b7d6769695f5f72657475726e55726c7c733a31393a222f736961702f696e6465782e7068702f676969223b6769695f5f69647c733a353a227969696572223b6769695f5f6e616d657c733a353a227969696572223b6769695f5f7374617465737c613a303a7b7d);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_fk_id_klinik` (`id_klinik`);

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD UNIQUE KEY `UNIQUE_KEY` (`itemname`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_KEY` (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `fasilitas_klinik`
--
ALTER TABLE `fasilitas_klinik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_fk_id_klinik` (`id_klinik`);

--
-- Indexes for table `foto_klinik`
--
ALTER TABLE `foto_klinik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_fk_id_klinik` (`id_klinik`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_klinik` (`kode_klinik`),
  ADD KEY `fk_klinik_id_user` (`id_user`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontak_fk_id_klinik` (`id_klinik`);

--
-- Indexes for table `pendamping`
--
ALTER TABLE `pendamping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendamping_id_sudin` (`id_sudin`),
  ADD KEY `fk_pendamping_id_user` (`id_user`);

--
-- Indexes for table `pengajuan_akreditasi`
--
ALTER TABLE `pengajuan_akreditasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_tipe_berkas`
--
ALTER TABLE `ref_tipe_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sudin`
--
ALTER TABLE `sudin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `YiiSession`
--
ALTER TABLE `YiiSession`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authitem`
--
ALTER TABLE `authitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fasilitas_klinik`
--
ALTER TABLE `fasilitas_klinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_klinik`
--
ALTER TABLE `foto_klinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendamping`
--
ALTER TABLE `pendamping`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_akreditasi`
--
ALTER TABLE `pengajuan_akreditasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_tipe_berkas`
--
ALTER TABLE `ref_tipe_berkas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sudin`
--
ALTER TABLE `sudin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_fk_id_klinik` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id`);

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authassignment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas_klinik`
--
ALTER TABLE `fasilitas_klinik`
  ADD CONSTRAINT `fasilitas_fk_id_klinik` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id`);

--
-- Constraints for table `foto_klinik`
--
ALTER TABLE `foto_klinik`
  ADD CONSTRAINT `foto_fk_id_klinik` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id`);

--
-- Constraints for table `klinik`
--
ALTER TABLE `klinik`
  ADD CONSTRAINT `fk_klinik_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_fk_id_klinik` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id`);

--
-- Constraints for table `pendamping`
--
ALTER TABLE `pendamping`
  ADD CONSTRAINT `fk_pendamping_id_sudin` FOREIGN KEY (`id_sudin`) REFERENCES `sudin` (`id`),
  ADD CONSTRAINT `fk_pendamping_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

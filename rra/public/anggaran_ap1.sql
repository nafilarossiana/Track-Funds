-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Waktu pembuatan: 20 Bulan Mei 2024 pada 17.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anggaran_ap1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `airport_tech`
--

CREATE TABLE `airport_tech` (
  `id_airporttech` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jeniskontrak` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `detail_program` varchar(255) DEFAULT NULL,
  `rka` decimal(20,0) DEFAULT NULL,
  `geser` decimal(20,0) DEFAULT NULL,
  `nilai_pekerjaan` decimal(20,0) DEFAULT NULL,
  `realisasi` decimal(20,0) DEFAULT NULL,
  `sisa_belum` decimal(20,0) DEFAULT NULL,
  `nilai_program` decimal(20,0) DEFAULT NULL,
  `sisa_rka` decimal(20,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `januari` decimal(20,0) DEFAULT NULL,
  `februari` decimal(20,0) DEFAULT NULL,
  `maret` decimal(20,0) DEFAULT NULL,
  `april` decimal(20,0) DEFAULT NULL,
  `mei` decimal(20,0) DEFAULT NULL,
  `juni` decimal(20,0) DEFAULT NULL,
  `juli` decimal(20,0) DEFAULT NULL,
  `agustus` decimal(20,0) DEFAULT NULL,
  `september` decimal(20,0) DEFAULT NULL,
  `oktober` decimal(20,0) DEFAULT NULL,
  `november` decimal(20,0) DEFAULT NULL,
  `desember` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_rka` int(12) DEFAULT NULL,
  `id_akun` int(12) DEFAULT NULL,
  `id_unit` int(12) DEFAULT NULL,
  `beban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `airport_tech`
--

INSERT INTO `airport_tech` (`id_airporttech`, `tahun`, `unit`, `gl_account`, `jenis`, `jeniskontrak`, `status`, `no`, `detail_program`, `rka`, `geser`, `nilai_pekerjaan`, `realisasi`, `sisa_belum`, `nilai_program`, `sisa_rka`, `keterangan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`, `id_rka`, `id_akun`, `id_unit`, `beban`) VALUES
(1, 2024, 'AIRPORT TECHNOLOGY', '512020600-B.P.Taman', '', '', '', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, 0, 0, 2000000, -2000000, 0, 57823183, '', 0, 0, 0, 0, 0, 1000000, 1000000, 0, 0, 0, 0, 0, NULL, NULL, 3891, 69, 5, 'Beban Pemeliharaan Airport Technology Facilities'),
(2, 2024, 'AIRPORT TECHNOLOGY', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3893, 89, 5, 'Beban Pemeliharaan Airport Technology'),
(3, 2024, 'AIRPORT TECHNOLOGY', '512020400-B.P.Jalan', 'Non Rutin', 'Kontrak Payung', '', NULL, '', NULL, 0, 0, 50000, -50000, 0, -50000, '', 0, 0, 0, 0, 0, 0, 50000, 0, 0, 0, 0, 0, NULL, NULL, NULL, 67, 5, 'Beban Pemeliharaan Airport Technology Facilities');

-- --------------------------------------------------------

--
-- Struktur dari tabel `airside`
--

CREATE TABLE `airside` (
  `id_airside` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jeniskontrak` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `detail_program` varchar(255) DEFAULT NULL,
  `rka` decimal(20,0) DEFAULT NULL,
  `geser` decimal(20,0) DEFAULT NULL,
  `nilai_pekerjaan` decimal(20,0) DEFAULT NULL,
  `realisasi` decimal(20,0) DEFAULT NULL,
  `sisa_belum` decimal(20,0) DEFAULT NULL,
  `nilai_program` decimal(20,0) DEFAULT NULL,
  `sisa_rka` decimal(20,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `januari` decimal(20,0) DEFAULT NULL,
  `februari` decimal(20,0) DEFAULT NULL,
  `maret` decimal(20,0) DEFAULT NULL,
  `april` decimal(20,0) DEFAULT NULL,
  `mei` decimal(20,0) DEFAULT NULL,
  `juni` decimal(20,0) DEFAULT NULL,
  `juli` decimal(20,0) DEFAULT NULL,
  `agustus` decimal(20,0) DEFAULT NULL,
  `september` decimal(20,0) DEFAULT NULL,
  `oktober` decimal(20,0) DEFAULT NULL,
  `november` decimal(20,0) DEFAULT NULL,
  `desember` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_rka` int(12) DEFAULT NULL,
  `id_akun` int(12) DEFAULT NULL,
  `id_unit` int(12) DEFAULT NULL,
  `beban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `airside`
--

INSERT INTO `airside` (`id_airside`, `tahun`, `unit`, `gl_account`, `jenis`, `jeniskontrak`, `status`, `no`, `detail_program`, `rka`, `geser`, `nilai_pekerjaan`, `realisasi`, `sisa_belum`, `nilai_program`, `sisa_rka`, `keterangan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`, `id_rka`, `id_akun`, `id_unit`, `beban`) VALUES
(426, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', 'Rutin', 'Kontrak Payung', 'Perencanaan', NULL, 'Kebersihan Saluran', 403088830, 0, 402000000, 400000000, 2000000, 100000, 2988830, '', 0, 0, 200000000, 0, 0, 0, 100000000, 0, 0, 100000000, 0, 0, NULL, NULL, 3732, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(427, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', 'Rutin', 'Swakeloa', 'Pengajuan', NULL, 'Kebersihan Saluran Rutin', 141749987, 0, 100000000, 15000000, 85000000, 4000000, 122749987, '', 0, 0, 5000000, 0, 5000000, 0, 0, 0, 5000000, 0, 0, 0, NULL, NULL, 3733, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(428, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', 'Non Rutin', 'Pengadaan Langsung', 'Kontrol Anggaran', NULL, 'Pemeliharaan Kebersihan Saluran (Rutin)', 565000000, 0, 560000000, 250000000, 310000000, 3000000, 312000000, '', 0, 0, 100000000, 0, 0, 0, 100000000, 0, 0, 50000000, 0, 0, NULL, NULL, 3734, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(429, 2024, 'AIRSIDE FACILITIES', '512020300-B.P.Apron', 'Non Rutin', 'Kontrak Payung', 'Lelang/APPRO', NULL, 'Pemeliharaan Kebersihan Apron', 1349000004, 0, 1300000000, 950600000, 349400000, 50000000, 348400004, '', 950600000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3735, 66, 1, 'Beban Pemeliharaan Airside Facilities'),
(430, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', 'Rutin', 'Padi UMKM', 'Pengajuan', NULL, 'Perbaikan Rambu Jalan Airside ', 58330591, 0, 58000000, 41500000, 16500000, 1400000, 15430591, '', 0, 21500000, 0, 0, 0, 0, 0, 0, 20000000, 0, 0, 0, NULL, NULL, 3736, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(431, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', 'Non Rutin', 'Kontrak Payung', 'Pelaksanaan', NULL, 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 565000000, 0, 500000000, 401000000, 99000000, 1000000, 163000000, '', 0, 0, 200000000, 0, 0, 0, 190000000, 0, 0, 11000000, 0, 0, NULL, NULL, 3737, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(432, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', 'Rutin', 'Kontrak Payung', 'Done', NULL, 'Kebersihan Saluran', NULL, 500000, 0, 0, 0, 0, 500000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3740, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(433, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', 'Rutin', 'Kontrak Payung', 'Kontrol Anggaran', NULL, 'Kebersihan Saluran Rutin', NULL, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3741, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(434, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', 'Rutin', 'Kontrak Payung', 'Lelang/APPRO', NULL, 'Pemeliharaan Kebersihan Saluran (Rutin)', 565000000, 0, 0, 0, 0, 0, 565000000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3742, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(436, 2024, 'AIRSIDE FACILITIES', '512020200-B.P.Taxiway', 'Non Rutin', 'Kontrak Payung', 'Lelang/APPRO', NULL, 'hoih', NULL, 0, 12000000, 1000000, 11000000, 1000000, -2000000, '', 0, 0, 0, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 65, 1, 'Beban Pemeliharaan Airside Facilities'),
(448, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', NULL, NULL, NULL, NULL, 'Kebersihan Saluran', 403088830, NULL, NULL, 0, 0, NULL, 403088830, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3779, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(449, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', NULL, NULL, NULL, NULL, 'Kebersihan Saluran Rutin', 141749987, NULL, NULL, 0, 0, NULL, 141749987, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3780, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(450, 2024, 'AIRSIDE FACILITIES', '512020500-B.P.Selokan/Sal.Air', NULL, NULL, NULL, NULL, 'Pemeliharaan Kebersihan Saluran (Rutin)', 565000000, NULL, NULL, 0, 0, NULL, 565000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3781, 68, 1, 'Beban Pemeliharaan Airside Facilities'),
(451, 2024, 'AIRSIDE FACILITIES', '512020300-B.P.Apron', NULL, NULL, NULL, NULL, 'Pemeliharaan Kebersihan Apron', 1349000004, NULL, NULL, 0, 0, NULL, 1349000004, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3782, 66, 1, 'Beban Pemeliharaan Airside Facilities'),
(452, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Perbaikan Rambu Jalan Airside ', 58330591, NULL, NULL, 0, 0, NULL, 58330591, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3783, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(454, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 565000000, NULL, NULL, 0, 0, NULL, 565000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3795, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(455, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 565000000, NULL, NULL, 0, 0, NULL, 565000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3809, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(456, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 565000000, NULL, NULL, 0, 0, NULL, 565000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3816, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(457, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3839, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(458, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3840, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(459, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', '', '', '', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, 0, 0, 1000000, -1000000, 0, 58823184, '', 0, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3841, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(460, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', '', '', '', NULL, 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 565000000, 0, 0, 1000000, -1000000, 0, 564000000, '', 0, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3850, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(462, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3866, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(464, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3868, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(466, 2024, 'AIRSIDE FACILITIES', '512020700-B.P.Pagar', '', '', '', NULL, '', NULL, 0, 100000, 0, 100000, 100000, -100000, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 70, 1, 'Beban Pemeliharaan Airside Facilities'),
(467, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3870, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(468, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3872, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(469, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3874, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(470, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3877, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(471, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3880, 71, 1, 'Beban Pemeliharaan Airside Facilities'),
(472, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3883, 71, 1, 'Beban Pemeliharaan Airside Facilities');

-- --------------------------------------------------------


--

--




-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_unit`
--

CREATE TABLE `akun_unit` (
  `id_akun` int(12) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `nama_beban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun_unit`
--

INSERT INTO `akun_unit` (`id_akun`, `kode`, `nama`, `gl_account`, `nama_beban`) VALUES
(58, '511010100', 'B.Gaji1', '511010100-B.Gaji1', ''),
(59, '511020100', 'B.Insentif Merit', '511020100-B.Insentif Merit', NULL),
(60, '511030100', 'B.T.Tim Internal', '511030100-B.T.Tim Internal', NULL),
(61, '511030300', 'B.T.Pph 21', '511030300-B.T.Pph 21', ''),
(62, '511030500', 'B.T.Jamsostek', '511030500-B.T.Jamsostek', NULL),
(63, '511030600', 'B.T.Hari Raya', '511030600-B.T.Hari Raya', NULL),
(64, '512020100', 'B.P.Landasan', '512020100-B.P.Landasan', 'Beban Pemeliharaan'),
(65, '512020200', 'B.P.Taxiway', '512020200-B.P.Taxiway', 'Beban Pemeliharaan'),
(66, '512020300', 'B.P.Apron', '512020300-B.P.Apron', 'Beban Pemeliharaan'),
(67, '512020400', 'B.P.Jalan', '512020400-B.P.Jalan', 'Beban Pemeliharaan'),
(68, '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', 'Beban Pemeliharaan'),
(69, '512020600', 'B.P.Taman', '512020600-B.P.Taman', 'Beban Pemeliharaan'),
(70, '512020700', 'B.P.Pagar', '512020700-B.P.Pagar', 'Beban Pemeliharaan'),
(71, '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', 'Beban Pemeliharaan'),
(72, '5120300700', 'B.P.Gedung Lainnya', '5120300700-B.P.Gedung Lainnya', 'Beban Pemeliharaan'),
(73, '512070100', 'B.Keb NonArea Termnl', '512070100-B.Keb NonArea Termnl', 'Beban Umum\r\n'),
(74, '520040100', 'B.LVA P\'alat Oprsnl', '520040100-B.LVA P\'alat Oprsnl', 'Beban LVA'),
(86, '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', 'Beban Pemeliharaan'),
(89, '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', 'Beban Pemeliharaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beban`
--

CREATE TABLE `beban` (
  `id_beban` int(11) NOT NULL,
  `nama_beban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `beban`
--

INSERT INTO `beban` (`id_beban`, `nama_beban`) VALUES
(1, 'Beban Pemeliharaan '),
(2, 'Beban Umum'),
(3, 'Beban LVA'),
(4, 'Beban Utilitas'),
(5, 'Beban Sewa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id` int(12) NOT NULL,
  `nama_bulan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'November'),
(11, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `electrical`
--

CREATE TABLE `electrical` (
  `id_electrical` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jeniskontrak` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `detail_program` varchar(255) DEFAULT NULL,
  `rka` decimal(20,0) DEFAULT NULL,
  `geser` decimal(20,0) DEFAULT NULL,
  `nilai_pekerjaan` decimal(20,0) DEFAULT NULL,
  `realisasi` decimal(20,0) DEFAULT NULL,
  `sisa_belum` decimal(20,0) DEFAULT NULL,
  `nilai_program` decimal(20,0) DEFAULT NULL,
  `sisa_rka` decimal(20,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `januari` decimal(20,0) DEFAULT NULL,
  `februari` decimal(20,0) DEFAULT NULL,
  `maret` decimal(20,0) DEFAULT NULL,
  `april` decimal(20,0) DEFAULT NULL,
  `mei` decimal(20,0) DEFAULT NULL,
  `juni` decimal(20,0) DEFAULT NULL,
  `juli` decimal(20,0) DEFAULT NULL,
  `agustus` decimal(20,0) DEFAULT NULL,
  `september` decimal(20,0) DEFAULT NULL,
  `oktober` decimal(20,0) DEFAULT NULL,
  `november` decimal(20,0) DEFAULT NULL,
  `desember` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_rka` int(12) DEFAULT NULL,
  `id_akun` int(12) DEFAULT NULL,
  `id_unit` int(12) DEFAULT NULL,
  `beban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `electrical`
--

INSERT INTO `electrical` (`id_electrical`, `tahun`, `unit`, `gl_account`, `jenis`, `jeniskontrak`, `status`, `no`, `detail_program`, `rka`, `geser`, `nilai_pekerjaan`, `realisasi`, `sisa_belum`, `nilai_program`, `sisa_rka`, `keterangan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`, `id_rka`, `id_akun`, `id_unit`, `beban`) VALUES
(1, 2024, 'EQUIPMENT-ELECTRICAL', '512020700-B.P.Pagar', '', '', '', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, 0, 0, 120000, -120000, 0, 59703184, '', 0, 0, 0, 0, 120000, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3889, 70, 4, 'Beban Pemeliharaan Electrical Facilities'),
(3, 2024, 'EQUIPMENT-ELECTRICAL', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3892, 71, 4, 'Beban Pemeliharaan Electrical Facilities');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(12) NOT NULL,
  `namajenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `namajenis`) VALUES
(1, 'Rutin'),
(2, 'Non Rutin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskontrak`
--

CREATE TABLE `jeniskontrak` (
  `id_jeniskontrak` int(12) NOT NULL,
  `jenis_kontrak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jeniskontrak`
--

INSERT INTO `jeniskontrak` (`id_jeniskontrak`, `jenis_kontrak`) VALUES
(1, 'Swakeloa'),
(2, 'Kontrak Payung'),
(3, 'Pengadaan Langsung'),
(4, 'Padi UMKM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landside`
--

CREATE TABLE `landside` (
  `id_landside` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jeniskontrak` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `detail_program` varchar(255) DEFAULT NULL,
  `rka` decimal(20,0) DEFAULT NULL,
  `geser` decimal(20,0) DEFAULT NULL,
  `nilai_pekerjaan` decimal(20,0) DEFAULT NULL,
  `realisasi` decimal(20,0) DEFAULT NULL,
  `sisa_belum` decimal(20,0) DEFAULT NULL,
  `nilai_program` decimal(20,0) DEFAULT NULL,
  `sisa_rka` decimal(20,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `januari` decimal(20,0) DEFAULT NULL,
  `februari` decimal(20,0) DEFAULT NULL,
  `maret` decimal(20,0) DEFAULT NULL,
  `april` decimal(20,0) DEFAULT NULL,
  `mei` decimal(20,0) DEFAULT NULL,
  `juni` decimal(20,0) DEFAULT NULL,
  `juli` decimal(20,0) DEFAULT NULL,
  `agustus` decimal(20,0) DEFAULT NULL,
  `september` decimal(20,0) DEFAULT NULL,
  `oktober` decimal(20,0) DEFAULT NULL,
  `november` decimal(20,0) DEFAULT NULL,
  `desember` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_rka` int(12) DEFAULT NULL,
  `id_akun` int(12) DEFAULT NULL,
  `id_unit` int(12) DEFAULT NULL,
  `beban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `landside`
--

INSERT INTO `landside` (`id_landside`, `tahun`, `unit`, `gl_account`, `jenis`, `jeniskontrak`, `status`, `no`, `detail_program`, `rka`, `geser`, `nilai_pekerjaan`, `realisasi`, `sisa_belum`, `nilai_program`, `sisa_rka`, `keterangan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`, `id_rka`, `id_akun`, `id_unit`, `beban`) VALUES
(9, 2024, 'LANDSIDE FACILITES\r\n', '512020900-B.P.Bang.Lap.Lain', 'Rutin', 'Kontrak Payung', 'Kontrol Anggaran', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, 0, 1500, 0, 1500, 0, 59823184, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3855, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(10, 2024, 'LANDSIDE FACILITES\r\n', '512020900-B.P.Bang.Lap.Lain', 'Rutin', 'Kontrak Payung', 'Kontrol Anggaran', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, 0, 145000, 0, 145000, 0, 59823184, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3856, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(15, 2024, 'LANDSIDE FACILITES\r\n', '512020200-B.P.Taxiway', 'Non Rutin', 'Kontrak Payung', 'Lelang/APPRO', NULL, '', NULL, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 65, 2, 'Beban Pemeliharaan Landside Facilities'),
(19, 2024, 'LANDSIDE FACILITES\r\n', '512020100-B.P.Landasan', 'Non Rutin', 'Kontrak Payung', 'Lelang/APPRO', NULL, '', NULL, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 64, 2, 'Beban Pemeliharaan Landside Facilities'),
(20, 2024, 'LANDSIDE FACILITES\r\n', '512020700-B.P.Pagar', 'Rutin', 'Kontrak Payung', '', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, 0, 0, 10000000, -10000000, 0, 49823184, '', 0, 0, 10000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3857, 70, 2, 'Beban Pemeliharaan Landside Facilities'),
(21, 2024, 'LANDSIDE FACILITES\r\n', '512020100-B.P.Landasan', '', '', '', NULL, '', NULL, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 64, 2, 'Beban Pemeliharaan Landside Facilities'),
(22, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3858, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(23, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3859, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(25, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3861, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(26, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3862, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(27, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3863, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(28, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3864, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(29, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3865, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(30, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3867, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(31, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3869, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(33, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3871, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(34, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3873, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(35, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3876, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(36, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3877, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(37, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3878, 89, 2, 'Beban Pemeliharaan Landside Facilities'),
(38, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3879, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(39, 2024, 'AIRSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3880, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(40, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3881, 89, 2, 'Beban Pemeliharaan Landside Facilities'),
(41, 2024, 'LANDSIDE FACILITIES', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3882, 71, 2, 'Beban Pemeliharaan Landside Facilities'),
(42, 2024, 'LANDSIDE FACILITES\r\n', '512020200-B.P.Taxiway', '', '', '', NULL, '', NULL, 0, 0, 1000000, -1000000, 0, -1000000, '', 0, 0, 0, 0, 0, 0, 1000000, 0, 0, 0, 0, 0, NULL, NULL, NULL, 65, 2, 'Beban Pemeliharaan Landside Facilities');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mechanical`
--

CREATE TABLE `mechanical` (
  `id_mechanical` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jeniskontrak` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `detail_program` varchar(255) DEFAULT NULL,
  `rka` decimal(20,0) DEFAULT NULL,
  `geser` decimal(20,0) DEFAULT NULL,
  `nilai_pekerjaan` decimal(20,0) DEFAULT NULL,
  `realisasi` decimal(20,0) DEFAULT NULL,
  `sisa_belum` decimal(20,0) DEFAULT NULL,
  `nilai_program` decimal(20,0) DEFAULT NULL,
  `sisa_rka` decimal(20,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `januari` decimal(20,0) DEFAULT NULL,
  `februari` decimal(20,0) DEFAULT NULL,
  `maret` decimal(20,0) DEFAULT NULL,
  `april` decimal(20,0) DEFAULT NULL,
  `mei` decimal(20,0) DEFAULT NULL,
  `juni` decimal(20,0) DEFAULT NULL,
  `juli` decimal(20,0) DEFAULT NULL,
  `agustus` decimal(20,0) DEFAULT NULL,
  `september` decimal(20,0) DEFAULT NULL,
  `oktober` decimal(20,0) DEFAULT NULL,
  `november` decimal(20,0) DEFAULT NULL,
  `desember` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_rka` int(12) DEFAULT NULL,
  `id_akun` int(12) DEFAULT NULL,
  `id_unit` int(12) DEFAULT NULL,
  `beban` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mechanical`
--

INSERT INTO `mechanical` (`id_mechanical`, `tahun`, `unit`, `gl_account`, `jenis`, `jeniskontrak`, `status`, `no`, `detail_program`, `rka`, `geser`, `nilai_pekerjaan`, `realisasi`, `sisa_belum`, `nilai_program`, `sisa_rka`, `keterangan`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`, `id_rka`, `id_akun`, `id_unit`, `beban`) VALUES
(448, 2024, 'EQUIPMENT-MECHANICAL', '512020400-B.P.Jalan', '', '', '', NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, 0, 0, 0, 0, 0, 59823184, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 3875, 67, 3, 'Beban Pemeliharaan Mechanical Facilities'),
(449, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3878, 89, 3, 'Beban Pemeliharaan Landside Facilities'),
(450, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3881, 89, 3, 'Beban Pemeliharaan Landside Facilities'),
(451, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3884, 89, 3, 'Beban Pemeliharaan Landside Facilities'),
(455, 2024, 'EQUIPMENT-MECHANICAL', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3885, 71, 3, 'Beban Pemeliharaan Landside Facilities'),
(456, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3887, 89, 3, 'Beban Pemeliharaan Landside Facilities'),
(457, 2024, 'EQUIPMENT-MECHANICAL', '512020900-B.P.Bang.Lap.Lain', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823183, NULL, NULL, 0, 0, NULL, 59823183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3888, 71, 3, 'Beban Pemeliharaan Landside Facilities'),
(458, 2024, 'EQUIPMENT-MECHANICAL', '512050100-B.P.Peralatan Listrik', NULL, NULL, NULL, NULL, 'Periode Januari 2024 - Desember 2024 ', 59823184, NULL, NULL, 0, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3890, 89, 3, 'Beban Pemeliharaan Landside Facilities');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-04-16-194234', 'App\\Database\\Migrations\\User', 'default', 'App', 1713296917, 1);

-- --------------------------------------------------------

--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `id_rekap` int(11) NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `beban` varchar(100) DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `rka` decimal(10,0) DEFAULT NULL,
  `geser_anggaran` decimal(10,0) DEFAULT NULL,
  `nilai_pekerjaan` decimal(10,0) DEFAULT NULL,
  `bulan` decimal(10,0) DEFAULT NULL,
  `persen_realisasi` decimal(10,0) DEFAULT NULL,
  `sisa_belum` decimal(10,0) DEFAULT NULL,
  `rencana_program` decimal(10,0) DEFAULT NULL,
  `sisa_rka` decimal(10,0) DEFAULT NULL,
  `januari` decimal(10,0) DEFAULT NULL,
  `februari` decimal(10,0) DEFAULT NULL,
  `maret` decimal(10,0) DEFAULT NULL,
  `april` decimal(10,0) DEFAULT NULL,
  `mei` decimal(10,0) DEFAULT NULL,
  `juni` decimal(10,0) DEFAULT NULL,
  `juli` decimal(10,0) DEFAULT NULL,
  `agustus` decimal(10,0) DEFAULT NULL,
  `september` decimal(10,0) DEFAULT NULL,
  `oktober` decimal(10,0) DEFAULT NULL,
  `november` decimal(10,0) DEFAULT NULL,
  `desember` decimal(10,0) DEFAULT NULL,
  `estimasi_sisa` decimal(10,0) DEFAULT NULL,
  `jenis` decimal(20,0) DEFAULT NULL,
  `jenis_kontrak` decimal(20,0) DEFAULT NULL,
  `status` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`id_rekap`, `id_unit`, `beban`, `id_akun`, `rka`, `geser_anggaran`, `nilai_pekerjaan`, `bulan`, `persen_realisasi`, `sisa_belum`, `rencana_program`, `sisa_rka`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `estimasi_sisa`, `jenis`, `jenis_kontrak`, `status`) VALUES
(855, 2, 'Beban Pemeliharaan Landside Facilities', 64, NULL, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 2),
(856, 1, 'Beban Pemeliharaan Airside Facilities', 65, NULL, 0, 12000000, 1000000, NULL, 11000000, 1000000, -2000000, 0, 0, 0, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, -13000000, 1, 1, 1),
(857, 2, 'Beban Pemeliharaan Landside Facilities', 65, NULL, 0, 0, 1000000, NULL, -1000000, 0, -1000000, 0, 0, 0, 0, 0, 0, 1000000, 0, 0, 0, 0, 0, 0, 2, 2, 2),
(858, 1, 'Beban Pemeliharaan Airside Facilities', 66, 2698000008, 0, 1300000000, 950600000, NULL, 349400000, 50000000, 1697400008, 950600000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1348000008, 1, 1, 1),
(859, 3, 'Beban Pemeliharaan Mechanical Facilities', 67, 59823184, 0, 0, 0, NULL, 0, 0, 59823184, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59823184, 1, 1, 1),
(860, 5, 'Beban Pemeliharaan Airport Technology Facilities', 67, NULL, 0, 0, 50000, NULL, -50000, 0, -50000, 0, 0, 0, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 1, 1, 1),
(861, 1, 'Beban Pemeliharaan Airside Facilities', 68, 2784677634, 500000, 1062000000, 665000000, NULL, 397000000, 7100000, 2113077634, 0, 0, 305000000, 0, 5000000, 0, 200000000, 0, 5000000, 150000000, 0, 0, 1716077634, 6, 6, 6),
(862, 5, 'Beban Pemeliharaan Airport Technology Facilities', 69, 59823183, 0, 0, 2000000, NULL, -2000000, 0, 57823183, 0, 0, 0, 0, 0, 1000000, 1000000, 0, 0, 0, 0, 0, 59823183, 1, 1, 1),
(863, 1, 'Beban Pemeliharaan Airside Facilities', 70, NULL, 0, 100000, 0, NULL, 100000, 100000, -100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -200000, 1, 1, 1),
(864, 2, 'Beban Pemeliharaan Landside Facilities', 70, 59823184, 0, 0, 10000000, NULL, -10000000, 0, 49823184, 0, 0, 10000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59823184, 1, 1, 1),
(865, 4, 'Beban Pemeliharaan Electrical Facilities', 70, 119646368, 0, 0, 240000, NULL, -240000, 0, 119406368, 0, 0, 0, 0, 240000, 0, 0, 0, 0, 0, 0, 0, 119646368, 2, 2, 2),
(866, 1, 'Beban Pemeliharaan Airside Facilities', 71, 3599716206, 0, 558000000, 444500000, NULL, 113500000, 2400000, 3152816206, 0, 23500000, 200000000, 0, 0, 0, 190000000, 0, 20000000, 11000000, 0, 0, 3039316206, 4, 4, 4),
(867, 2, 'Beban Pemeliharaan Landside Facilities', 71, 1076817300, 0, 146500, 0, NULL, 146500, 0, 1076817300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1076670800, 2, 2, 2),
(868, 3, 'Beban Pemeliharaan Landside Facilities', 71, 119646366, NULL, NULL, 0, NULL, 0, NULL, 119646366, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 119646366, 0, 0, 0),
(869, 4, 'Beban Pemeliharaan Electrical Facilities', 71, 119646368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 119646368, 0, 0, 0),
(870, 2, 'Beban Pemeliharaan Landside Facilities', 89, 119646368, NULL, NULL, 0, NULL, 0, NULL, 119646368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 119646368, 0, 0, 0),
(871, 3, 'Beban Pemeliharaan Landside Facilities', 89, 299115920, NULL, NULL, 0, NULL, 0, NULL, 299115920, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 299115920, 0, 0, 0),
(872, 5, 'Beban Pemeliharaan Airport Technology', 89, 59823184, NULL, NULL, 0, NULL, 0, NULL, 59823184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59823184, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rka`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `rkacoba`
--

CREATE TABLE `rkacoba` (
  `id_rka` int(12) NOT NULL,
  `tahun` int(12) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `ma` varchar(255) DEFAULT NULL,
  `gl_account` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `detail_program` varchar(255) DEFAULT NULL,
  `qty` int(12) DEFAULT NULL,
  `uom` varchar(255) DEFAULT NULL,
  `nilaisatuan` varchar(255) DEFAULT NULL,
  `angka` decimal(20,0) DEFAULT NULL,
  `jumlah` decimal(20,0) DEFAULT NULL,
  `januari` decimal(10,0) DEFAULT NULL,
  `februari` decimal(20,0) DEFAULT NULL,
  `maret` decimal(20,0) DEFAULT NULL,
  `april` decimal(20,0) DEFAULT NULL,
  `mei` decimal(20,0) DEFAULT NULL,
  `juni` decimal(20,0) DEFAULT NULL,
  `juli` decimal(20,0) DEFAULT NULL,
  `agustus` decimal(20,0) DEFAULT NULL,
  `september` decimal(20,0) DEFAULT NULL,
  `oktober` decimal(20,0) DEFAULT NULL,
  `november` decimal(20,0) DEFAULT NULL,
  `desember` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `update_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rkacoba`
--

INSERT INTO `rkacoba` (`id_rka`, `tahun`, `unit`, `kode`, `ma`, `gl_account`, `keterangan`, `detail_program`, `qty`, `uom`, `nilaisatuan`, `angka`, `jumlah`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`) VALUES
(3732, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran', 12, 'Bulan', '33590736', 403088830, 403088830, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, '2024-03-08 08:10:36.503876', NULL),
(3733, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran Rutin', 12, 'Bulan', '141749987', 141749987, 141749987, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, '2024-03-08 08:10:36.505234', NULL),
(3734, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', '1', 'Pemeliharaan Kebersihan Saluran (Rutin)', 12, 'bulan', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-08 08:10:36.506385', NULL),
(3735, 2024, 'AIRSIDE FACILITIES', '512020300', 'B.P.Apron', '512020300-B.P.Apron', '1', 'Pemeliharaan Kebersihan Apron', 12, 'bulan', '112416667', 1349000004, 1349000004, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, '2024-03-08 08:10:36.507485', NULL),
(3736, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '1', 'Perbaikan Rambu Jalan Airside ', 1, 'ls', '4860883', 58330591, 58330591, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, '2024-03-08 08:10:36.508668', NULL),
(3737, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-08 08:10:36.509524', NULL),
(3738, 2024, 'HCBP', '511010100', 'B.Gaji', '511010100-B.Gaji', NULL, 'General Manager', 12, 'Bulan', '33590736', 403088830, 403088830, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, '2024-03-08 08:10:54.108494', NULL),
(3739, 2024, 'HCBP', '511010100', 'B.Gaji', '511010100-B.Gaji', NULL, 'General Manager', 12, 'Bulan', '33590736', 403088830, 403088830, 33590735, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, '2024-03-08 08:10:54.109908', NULL),
(3740, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-08 08:10:54.112605', NULL),
(3741, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran Rutin', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-08 08:10:54.114416', NULL),
(3742, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', '1', 'Pemeliharaan Kebersihan Saluran (Rutin)', 12, 'bulan', '0', NULL, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-08 08:10:54.116045', NULL),
(3749, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:02:43.251854', NULL),
(3750, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-03-25 03:02:43.260878', NULL),
(3751, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-03-25 03:02:43.261849', NULL),
(3752, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:02:43.262919', NULL),
(3753, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:17:35.976325', NULL),
(3754, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-03-25 03:17:35.977836', NULL),
(3755, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-03-25 03:17:35.979064', NULL),
(3756, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:17:35.980613', NULL),
(3757, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:18:01.452832', NULL),
(3758, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-03-25 03:18:01.455519', NULL),
(3759, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-03-25 03:18:01.456700', NULL),
(3760, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:18:01.457912', NULL),
(3761, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:29:00.592105', NULL),
(3762, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-03-25 03:29:00.593529', NULL),
(3763, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-03-25 03:29:00.594787', NULL),
(3764, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 03:29:00.596310', NULL),
(3765, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 04:17:22.748314', NULL),
(3766, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-03-25 04:17:22.756144', NULL),
(3767, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-03-25 04:17:22.757603', NULL),
(3768, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 04:17:22.759611', NULL),
(3769, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran', 12, 'Bulan', '33590736', 403088830, 403088830, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, '2024-03-25 04:18:17.517004', NULL),
(3770, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran Rutin', 12, 'Bulan', '141749987', 141749987, 141749987, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, '2024-03-25 04:18:17.518573', NULL),
(3771, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', '1', 'Pemeliharaan Kebersihan Saluran (Rutin)', 12, 'bulan', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-25 04:18:17.519550', NULL),
(3772, 2024, 'AIRSIDE FACILITIES', '512020300', 'B.P.Apron', '512020300-B.P.Apron', '1', 'Pemeliharaan Kebersihan Apron', 12, 'bulan', '112416667', 1349000004, 1349000004, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, '2024-03-25 04:18:17.520602', NULL),
(3773, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '1', 'Perbaikan Rambu Jalan Airside ', 1, 'ls', '4860883', 58330591, 58330591, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, '2024-03-25 04:18:17.522468', NULL),
(3774, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-25 04:18:17.524417', NULL),
(3775, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 06:04:47.394456', NULL),
(3776, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-03-25 06:04:47.398387', NULL),
(3777, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-03-25 06:04:47.401289', NULL),
(3778, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-03-25 06:04:47.404073', NULL),
(3779, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran', 12, 'Bulan', '33590736', 403088830, 403088830, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, '2024-03-25 06:15:48.189440', NULL),
(3780, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran Rutin', 12, 'Bulan', '141749987', 141749987, 141749987, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, '2024-03-25 06:15:48.192608', NULL),
(3781, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', '1', 'Pemeliharaan Kebersihan Saluran (Rutin)', 12, 'bulan', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-25 06:15:48.195880', NULL),
(3782, 2024, 'AIRSIDE FACILITIES', '512020300', 'B.P.Apron', '512020300-B.P.Apron', '1', 'Pemeliharaan Kebersihan Apron', 12, 'bulan', '112416667', 1349000004, 1349000004, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, '2024-03-25 06:15:48.198481', NULL),
(3783, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '1', 'Perbaikan Rambu Jalan Airside ', 1, 'ls', '4860883', 58330591, 58330591, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, '2024-03-25 06:15:48.201129', NULL),
(3784, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-03-25 06:15:48.203510', NULL),
(3785, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 02:55:56.323203', NULL),
(3786, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 02:55:56.347724', NULL),
(3787, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:00:12.351475', NULL),
(3788, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 03:00:12.358085', NULL),
(3789, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran', 12, 'Bulan', '33590736', 403088830, 403088830, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, 33590736, '2024-04-01 03:01:52.290129', NULL),
(3790, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', NULL, 'Kebersihan Saluran Rutin', 12, 'Bulan', '141749987', 141749987, 141749987, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, 11812499, '2024-04-01 03:01:52.295308', NULL),
(3791, 2024, 'AIRSIDE FACILITIES', '512020500', 'B.P.Selokan/Sal.Air', '512020500-B.P.Selokan/Sal.Air', '1', 'Pemeliharaan Kebersihan Saluran (Rutin)', 12, 'bulan', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-01 03:01:52.298175', NULL),
(3792, 2024, 'AIRSIDE FACILITIES', '512020300', 'B.P.Apron', '512020300-B.P.Apron', '1', 'Pemeliharaan Kebersihan Apron', 12, 'bulan', '112416667', 1349000004, 1349000004, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, 112416667, '2024-04-01 03:01:52.301008', NULL),
(3793, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '1', 'Perbaikan Rambu Jalan Airside ', 1, 'ls', '4860883', 58330591, 58330591, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, 4860883, '2024-04-01 03:01:52.304236', NULL),
(3794, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-01 03:01:52.309515', NULL),
(3795, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-01 03:05:56.525919', NULL),
(3796, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:07:23.978347', NULL),
(3797, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 03:07:23.985585', NULL),
(3798, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:12:13.379779', NULL),
(3799, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-01 03:12:13.387398', NULL),
(3800, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:16:29.164401', NULL),
(3801, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:28:29.539992', NULL),
(3802, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:29:30.872026', NULL),
(3803, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:35:51.032300', NULL),
(3804, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:47:20.033144', NULL),
(3805, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:50:00.153544', NULL),
(3806, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:58:33.780033', NULL),
(3807, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 03:58:46.649291', NULL),
(3808, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:02:11.758843', NULL),
(3809, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-01 04:04:38.572940', NULL),
(3810, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-01 04:08:32.701048', NULL),
(3811, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:13:41.333676', NULL),
(3812, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:14:50.920764', NULL),
(3813, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:16:14.886466', NULL),
(3814, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:27:50.413974', NULL),
(3815, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:28:36.771175', NULL),
(3816, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-01 04:29:48.241323', NULL),
(3817, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:40:34.187958', NULL),
(3818, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:45:22.974027', NULL),
(3819, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:46:00.236446', NULL),
(3820, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:49:23.741955', NULL),
(3821, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-04-01 04:49:23.744788', NULL),
(3822, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-04-01 04:49:23.746531', NULL),
(3823, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:49:23.748269', NULL),
(3824, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:50:18.099044', NULL),
(3825, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Periode Januari 2024 - Desember 2024 (Rutin)', 12, 'Bulan', '67850045', 814200540, 814200540, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, 67850045, '2024-04-01 04:50:18.101564', NULL),
(3826, 2024, 'LANDSIDE FACILITIES', '512030100', 'B.P.Term.Penumpang', '512030100-B.P.Term.Penumpang', NULL, 'Material & Komponen Sanitair T1', 12, 'Bulan', '10617798', 127413570, 127413570, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, 10617798, '2024-04-01 04:50:18.103985', NULL),
(3827, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 04:50:18.105869', NULL),
(3828, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:06:32.957913', NULL),
(3829, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:09:02.760900', NULL),
(3830, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:09:41.324245', NULL),
(3831, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:11:58.616767', NULL),
(3832, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:12:18.502748', NULL),
(3833, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:15:09.210840', NULL),
(3834, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:15:31.306126', NULL),
(3835, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:17:09.963739', NULL),
(3836, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:17:55.409151', NULL),
(3837, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:18:47.471603', NULL),
(3838, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:19:12.778431', NULL),
(3839, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:20:26.810870', NULL),
(3840, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:21:21.284142', NULL),
(3841, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:21:55.350041', NULL),
(3842, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:23:04.338159', NULL),
(3843, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:23:40.973420', NULL),
(3844, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:25:40.546548', NULL),
(3845, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:45:08.767267', NULL),
(3846, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:45:54.054830', NULL),
(3847, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-01 05:50:22.472844', NULL),
(3848, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-12 09:00:50.418122', NULL),
(3849, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-12 09:20:24.227886', NULL),
(3850, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-12 09:21:47.992770', NULL),
(3851, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-12 09:26:09.985022', NULL),
(3852, 2024, 'HCBP', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-12 09:41:21.489319', NULL),
(3853, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-12 09:43:03.636399', NULL),
(3854, 2024, 'LANDSIDEFACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', '2', 'Toilet Portable dan Fasilitas Penunjang Embarkasi Haji 2024_1', 1, 'ls', '47083337', 565000000, 565000000, 47083337, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, 47083333, '2024-04-12 09:45:38.949184', NULL),
(3855, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-12 09:53:37.855307', NULL),
(3856, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-13 06:58:04.202518', NULL),
(3857, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985266', 59823184, 59823184, 4985265, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, 4985266, '2024-04-18 12:47:54.794312', NULL),
(3858, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-20 08:11:23.323526', NULL),
(3859, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-20 08:13:36.871109', NULL),
(3860, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', 'shah', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-20 08:13:36.872521', NULL),
(3861, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-20 08:24:02.623501', NULL),
(3862, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-20 08:24:02.625533', NULL),
(3863, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-21 09:22:45.385874', NULL),
(3864, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-21 09:22:45.392941', NULL),
(3865, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-21 16:29:45.546694', NULL),
(3866, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-21 16:29:45.550371', NULL),
(3867, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-22 02:01:40.414960', NULL),
(3868, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-22 02:01:40.424114', NULL),
(3869, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:01:46.755339', NULL),
(3870, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:01:46.780463', NULL),
(3871, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:06:24.539895', NULL),
(3872, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:06:24.545448', NULL),
(3873, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:46:07.029090', NULL),
(3874, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:46:07.042177', NULL),
(3875, 2024, 'EQUIPMENT-MECHANICAL', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-24 16:46:07.045915', NULL),
(3876, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:44:12.093498', NULL),
(3877, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:44:12.101299', NULL),
(3878, 2024, 'EQUIPMENT-MECHANICAL', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:44:12.104342', NULL),
(3879, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:44:56.414826', NULL),
(3880, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:44:56.417285', NULL),
(3881, 2024, 'EQUIPMENT-MECHANICAL', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:44:56.419978', NULL),
(3882, 2024, 'LANDSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:45:32.605270', NULL),
(3883, 2024, 'AIRSIDE FACILITIES', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:45:32.608341', NULL),
(3884, 2024, 'EQUIPMENT-MECHANICAL', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-04-30 23:45:32.610487', NULL),
(3885, 2024, 'EQUIPMENT-MECHANICAL', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 07:14:12.552250', NULL);
INSERT INTO `rkacoba` (`id_rka`, `tahun`, `unit`, `kode`, `ma`, `gl_account`, `keterangan`, `detail_program`, `qty`, `uom`, `nilaisatuan`, `angka`, `jumlah`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `created_at`, `update_at`) VALUES
(3886, 2024, 'EQUIPMENT-ELECTRICAL', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 07:14:12.564230', NULL),
(3887, 2024, 'EQUIPMENT-MECHANICAL', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 07:14:12.568274', NULL),
(3888, 2024, 'EQUIPMENT-MECHANICAL', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 07:15:18.974109', NULL),
(3889, 2024, 'EQUIPMENT-ELECTRICAL', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 07:15:18.978973', NULL),
(3890, 2024, 'EQUIPMENT-MECHANICAL', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 07:15:18.982213', NULL),
(3891, 2024, 'AIRPORT TECHNOLOGY', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823183, 59823183, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 10:13:06.184969', NULL),
(3892, 2024, 'EQUIPMENT-ELECTRICAL', '512020900', 'B.P.Bang.Lap.Lain', '512020900-B.P.Bang.Lap.Lain', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 10:13:06.202009', NULL),
(3893, 2024, 'AIRPORT TECHNOLOGY', '512050100', 'B.P.Peralatan Listrik', '512050100-B.P.Peralatan Listrik', NULL, 'Periode Januari 2024 - Desember 2024 ', 12, 'bulan', '4985265', 59823184, 59823184, 4985266, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, 4985265, '2024-05-20 10:13:06.206914', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(12) NOT NULL,
  `namastatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `namastatus`) VALUES
(1, 'Mendahului Proses'),
(2, 'Perencanaan'),
(3, 'Pengajuan'),
(4, 'Kontrol Anggaran'),
(5, 'Kontrol Anggaran'),
(6, 'Lelang/APPRO'),
(7, 'Pelaksanaan'),
(8, 'Done');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(1, 'AIRSIDE FACILITIES'),
(2, 'LANDSIDE FACILITES\r\n'),
(3, 'EQUIPMENT-MECHANICAL'),
(4, 'EQUIPMENT-ELECTRICAL'),
(5, 'AIRPORT TECHNOLOGY');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `nama_pass` varchar(50) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `kelompok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `nama_pass`, `pass_user`, `kelompok`) VALUES
(8, 'airside', 'airsidesatu', '7088843782ea62e8b64abf0f057f3e1b', 'admin_airside'),
(10, 'landside', 'landsidesatu', '37ff4a9f82cf8e13027afe377d286399', 'admin_landside'),
(11, 'mechanical', 'mechanicalsatu', '2c1af4dad5f463e97ef83ac8f3e92c6b', 'admin_mechanical'),
(12, 'electrical', 'electrical', '9d05d847ad3bf54e136d0bcdbf223aff', 'admin_electrical'),
(13, 'technology', 'technology', '83ec45960b80c035a0068df1d9df5aa8', 'admin_technology'),
(14, 'adminutama', 'adminutama', 'bc578b97f566da6c15dd245ef4b2b94c', 'admin_utama');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `airport_tech`
--
ALTER TABLE `airport_tech`
  ADD PRIMARY KEY (`id_airporttech`);

--
-- Indeks untuk tabel `airside`
--
ALTER TABLE `airside`
  ADD PRIMARY KEY (`id_airside`);

--
-- Indeks untuk tabel `akunairside`
--
ALTER TABLE `akunairside`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun_unit`
--
ALTER TABLE `akun_unit`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id_beban`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `electrical`
--
ALTER TABLE `electrical`
  ADD PRIMARY KEY (`id_electrical`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `jeniskontrak`
--
ALTER TABLE `jeniskontrak`
  ADD PRIMARY KEY (`id_jeniskontrak`);

--
-- Indeks untuk tabel `landside`
--
ALTER TABLE `landside`
  ADD PRIMARY KEY (`id_landside`);

--
-- Indeks untuk tabel `mechanical`
--
ALTER TABLE `mechanical`
  ADD PRIMARY KEY (`id_mechanical`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`id_rekap`);

--


--
-- Indeks untuk tabel `rkacoba`
--
ALTER TABLE `rkacoba`
  ADD PRIMARY KEY (`id_rka`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--


--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `airport_tech`
--
ALTER TABLE `airport_tech`
  MODIFY `id_airporttech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `airside`
--
ALTER TABLE `airside`
  MODIFY `id_airside` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT untuk tabel `akunairside`
--
ALTER TABLE `akunairside`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `akun_unit`
--
ALTER TABLE `akun_unit`
  MODIFY `id_akun` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `beban`
--
ALTER TABLE `beban`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `electrical`
--
ALTER TABLE `electrical`
  MODIFY `id_electrical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jeniskontrak`
--
ALTER TABLE `jeniskontrak`
  MODIFY `id_jeniskontrak` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `landside`
--
ALTER TABLE `landside`
  MODIFY `id_landside` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `mechanical`
--
ALTER TABLE `mechanical`
  MODIFY `id_mechanical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=873;



--
-- AUTO_INCREMENT untuk tabel `rkacoba`
--
ALTER TABLE `rkacoba`
  MODIFY `id_rka` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3894;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tahun`

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

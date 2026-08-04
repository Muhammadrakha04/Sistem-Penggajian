-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Jul 2026 pada 09.12
-- Versi server: 8.0.30
-- Versi PHP: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `total_tunjangan` decimal(15,2) DEFAULT '0.00',
  `total_potongan` decimal(15,2) DEFAULT '0.00',
  `gaji_bersih` decimal(15,2) NOT NULL,
  `tanggal_proses` date NOT NULL,
  `status_pembayaran` varchar(20) DEFAULT 'Belum Dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_karyawan`, `bulan`, `tahun`, `total_tunjangan`, `total_potongan`, `gaji_bersih`, `tanggal_proses`, `status_pembayaran`) VALUES
(1, 1, 1, 2026, '5500000.00', '1100000.00', '19400000.00', '2026-01-31', 'Dibayar'),
(2, 2, 1, 2026, '3500000.00', '920000.00', '14580000.00', '2026-01-31', 'Dibayar'),
(3, 3, 1, 2026, '2000000.00', '660000.00', '9840000.00', '2026-01-31', 'Dibayar'),
(4, 4, 1, 2026, '2700000.00', '780000.00', '11920000.00', '2026-01-31', 'Dibayar'),
(5, 5, 1, 2026, '1200000.00', '490000.00', '8710000.00', '2026-01-31', 'Belum Dibayar'),
(6, 6, 1, 2026, '4300000.00', '1040000.00', '17260000.00', '2026-01-31', 'Dibayar'),
(7, 7, 1, 2026, '1000000.00', '495000.00', '8005000.00', '2026-01-31', 'Belum Dibayar'),
(8, 8, 1, 2026, '4300000.00', '1070000.00', '17730000.00', '2026-01-31', 'Dibayar'),
(9, 9, 1, 2026, '1000000.00', '390000.00', '8410000.00', '2026-01-31', 'Belum Dibayar'),
(10, 10, 1, 2026, '2000000.00', '550000.00', '9450000.00', '2026-01-31', 'Dibayar'),
(11, 11, 1, 2026, '1200000.00', '775000.00', '7925000.00', '2026-01-31', 'Belum Dibayar'),
(12, 12, 1, 2026, '1000000.00', '425000.00', '9075000.00', '2026-01-31', 'Belum Dibayar'),
(13, 13, 1, 2026, '0.00', '360000.00', '6840000.00', '2026-01-31', 'Ditolak'),
(14, 14, 1, 2026, '1000000.00', '375000.00', '8125000.00', '2026-01-31', 'Belum Dibayar'),
(15, 15, 1, 2026, '1200000.00', '365000.00', '8135000.00', '2026-01-31', 'Belum Dibayar'),
(16, 1, 2, 2026, '5500000.00', '1100000.00', '19400000.00', '2026-02-28', 'Dibayar'),
(17, 2, 2, 2026, '3500000.00', '920000.00', '14580000.00', '2026-02-28', 'Dibayar'),
(18, 3, 2, 2026, '2000000.00', '660000.00', '9840000.00', '2026-02-28', 'Dibayar'),
(19, 4, 2, 2026, '2700000.00', '780000.00', '11920000.00', '2026-02-28', 'Dibayar'),
(20, 6, 2, 2026, '4300000.00', '1040000.00', '17260000.00', '2026-02-28', 'Dibayar'),
(21, 8, 2, 2026, '4300000.00', '1070000.00', '17730000.00', '2026-02-28', 'Dibayar'),
(22, 10, 2, 2026, '2000000.00', '550000.00', '9450000.00', '2026-02-28', 'Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `gaji_pokok` decimal(15,2) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(20) DEFAULT 'Aktif',
  `no_rekening` varchar(30) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nip`, `nama`, `jabatan`, `departemen`, `gaji_pokok`, `tanggal_masuk`, `status`, `no_rekening`, `alamat`) VALUES
(1, 'K001', 'Andi Pratama', 'Manager IT', 'Teknologi Informasi', '15000000.00', '2020-01-15', 'Aktif', '1234567890', 'Jl. Merdeka No. 1, Jakarta'),
(2, 'K002', 'Budi Santoso', 'Senior Programmer', 'Teknologi Informasi', '12000000.00', '2020-03-20', 'Aktif', '1234567891', 'Jl. Sudirman No. 5, Jakarta'),
(3, 'K003', 'Citra Dewi', 'Programmer', 'Teknologi Informasi', '8500000.00', '2021-06-10', 'Aktif', '1234567892', 'Jl. Gatot Subroto No. 12, Jakarta'),
(4, 'K004', 'Dian Rahayu', 'Analis Sistem', 'Teknologi Informasi', '10000000.00', '2020-08-01', 'Aktif', '1234567893', 'Jl. Thamrin No. 8, Jakarta'),
(5, 'K005', 'Eko Purnomo', 'Programmer', 'Teknologi Informasi', '8000000.00', '2022-01-05', 'Aktif', '1234567894', 'Jl. Kuningan No. 3, Jakarta'),
(6, 'K006', 'Fitri Handayani', 'Manager HRD', 'Sumber Daya Manusia', '14000000.00', '2019-11-01', 'Aktif', '1234567895', 'Jl. Rasuna Said No. 7, Jakarta'),
(7, 'K007', 'Galih Saputra', 'Staff HRD', 'Sumber Daya Manusia', '7500000.00', '2021-09-15', 'Aktif', '1234567896', 'Jl. Ciputat Raya No. 22, Tangerang'),
(8, 'K008', 'Hesti Lestari', 'Manager Keuangan', 'Keuangan', '14500000.00', '2020-05-01', 'Aktif', '1234567897', 'Jl. TB Simatupang No. 15, Jakarta'),
(9, 'K009', 'Indra Kusuma', 'Staff Keuangan', 'Keuangan', '7800000.00', '2021-12-01', 'Aktif', '1234567898', 'Jl. Pondok Indah No. 9, Jakarta'),
(10, 'K010', 'Joko Widodo', 'Staff Marketing', 'Pemasaran', '8000000.00', '2022-07-01', 'Aktif', '1234567899', 'Jl. Kebon Jeruk No. 17, Jakarta'),
(11, 'K011', 'Kartika Sari', 'Staff Marketing', 'Pemasaran', '7500000.00', '2023-01-10', 'Aktif', '1234567900', 'Jl. Permata Hijau No. 4, Jakarta'),
(12, 'K012', 'Lukman Hakim', 'Programmer', 'Teknologi Informasi', '8500000.00', '2023-03-01', 'Aktif', '1234567901', 'Jl. Bintaro No. 11, Tangerang'),
(13, 'K013', 'Maya Sari', 'Staff HRD', 'Sumber Daya Manusia', '7200000.00', '2023-06-15', 'Cuti', '1234567902', 'Jl. Alam Sutera No. 6, Tangerang'),
(14, 'K014', 'Nugroho Aji', 'Staff Keuangan', 'Keuangan', '7500000.00', '2023-08-01', 'Aktif', '1234567903', 'Jl. Gading Serpong No. 13, Tangerang'),
(15, 'K015', 'Oktavia Putri', 'Staff Marketing', 'Pemasaran', '7300000.00', '2024-01-02', 'Aktif', '1234567904', 'Jl. Kelapa Gading No. 10, Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `jenis_potongan` varchar(50) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `id_karyawan`, `jenis_potongan`, `nominal`, `bulan`, `tahun`, `keterangan`) VALUES
(1, 1, 'PPh 21', '750000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(2, 2, 'PPh 21', '600000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(3, 3, 'PPh 21', '425000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(4, 4, 'PPh 21', '500000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(5, 5, 'PPh 21', '400000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(6, 6, 'PPh 21', '700000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(7, 7, 'PPh 21', '375000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(8, 8, 'PPh 21', '725000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(9, 9, 'PPh 21', '390000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(10, 10, 'PPh 21', '400000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(11, 11, 'PPh 21', '375000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(12, 12, 'PPh 21', '425000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(13, 13, 'PPh 21', '360000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(14, 14, 'PPh 21', '375000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(15, 15, 'PPh 21', '365000.00', 1, 2026, 'Pajak Penghasilan 5%'),
(16, 1, 'BPJS Kesehatan', '200000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(17, 1, 'BPJS Ketenagakerjaan', '150000.00', 1, 2026, 'Iuran BPJS Ketenagakerjaan'),
(18, 2, 'BPJS Kesehatan', '200000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(19, 2, 'BPJS Ketenagakerjaan', '120000.00', 1, 2026, 'Iuran BPJS Ketenagakerjaan'),
(20, 3, 'BPJS Kesehatan', '150000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(21, 3, 'BPJS Ketenagakerjaan', '85000.00', 1, 2026, 'Iuran BPJS Ketenagakerjaan'),
(22, 4, 'BPJS Kesehatan', '180000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(23, 4, 'BPJS Ketenagakerjaan', '100000.00', 1, 2026, 'Iuran BPJS Ketenagakerjaan'),
(24, 5, 'BPJS Kesehatan', '150000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(25, 6, 'BPJS Kesehatan', '200000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(26, 6, 'BPJS Ketenagakerjaan', '140000.00', 1, 2026, 'Iuran BPJS Ketenagakerjaan'),
(27, 7, 'BPJS Kesehatan', '120000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(28, 8, 'BPJS Kesehatan', '200000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(29, 8, 'BPJS Ketenagakerjaan', '145000.00', 1, 2026, 'Iuran BPJS Ketenagakerjaan'),
(30, 10, 'BPJS Kesehatan', '150000.00', 1, 2026, 'Iuran BPJS Kesehatan'),
(31, 3, 'Pinjaman Karyawan', '500000.00', 1, 2026, 'Pinjaman untuk renovasi rumah - angsuran ke-6'),
(32, 5, 'Pinjaman Karyawan', '750000.00', 1, 2026, 'Pinjaman untuk pendidikan - angsuran ke-3'),
(33, 7, 'Pinjaman Karyawan', '300000.00', 1, 2026, 'Pinjaman untuk kesehatan - angsuran ke-2'),
(34, 11, 'Pinjaman Karyawan', '400000.00', 1, 2026, 'Pinjaman untuk kebutuhan darurat - angsuran ke-1'),
(35, 1, 'PPh 21', '750000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(36, 1, 'BPJS Kesehatan', '200000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(37, 1, 'BPJS Ketenagakerjaan', '150000.00', 2, 2026, 'Iuran BPJS Ketenagakerjaan'),
(38, 2, 'PPh 21', '600000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(39, 2, 'BPJS Kesehatan', '200000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(40, 2, 'BPJS Ketenagakerjaan', '120000.00', 2, 2026, 'Iuran BPJS Ketenagakerjaan'),
(41, 3, 'PPh 21', '425000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(42, 3, 'BPJS Kesehatan', '150000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(43, 3, 'BPJS Ketenagakerjaan', '85000.00', 2, 2026, 'Iuran BPJS Ketenagakerjaan'),
(44, 3, 'Pinjaman Karyawan', '500000.00', 2, 2026, 'Pinjaman untuk renovasi rumah - angsuran ke-6'),
(45, 4, 'PPh 21', '500000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(46, 4, 'BPJS Kesehatan', '180000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(47, 4, 'BPJS Ketenagakerjaan', '100000.00', 2, 2026, 'Iuran BPJS Ketenagakerjaan'),
(48, 5, 'PPh 21', '400000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(49, 5, 'BPJS Kesehatan', '150000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(50, 5, 'Pinjaman Karyawan', '750000.00', 2, 2026, 'Pinjaman untuk pendidikan - angsuran ke-3'),
(51, 6, 'PPh 21', '700000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(52, 6, 'BPJS Kesehatan', '200000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(53, 6, 'BPJS Ketenagakerjaan', '140000.00', 2, 2026, 'Iuran BPJS Ketenagakerjaan'),
(54, 7, 'PPh 21', '375000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(55, 7, 'BPJS Kesehatan', '120000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(56, 7, 'Pinjaman Karyawan', '300000.00', 2, 2026, 'Pinjaman untuk kesehatan - angsuran ke-2'),
(57, 8, 'PPh 21', '725000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(58, 8, 'BPJS Kesehatan', '200000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(59, 8, 'BPJS Ketenagakerjaan', '145000.00', 2, 2026, 'Iuran BPJS Ketenagakerjaan'),
(60, 9, 'PPh 21', '390000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(61, 10, 'PPh 21', '400000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(62, 10, 'BPJS Kesehatan', '150000.00', 2, 2026, 'Iuran BPJS Kesehatan'),
(63, 11, 'PPh 21', '375000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(64, 11, 'Pinjaman Karyawan', '400000.00', 2, 2026, 'Pinjaman untuk kebutuhan darurat - angsuran ke-1'),
(65, 12, 'PPh 21', '425000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(66, 14, 'PPh 21', '375000.00', 2, 2026, 'Pajak Penghasilan 5%'),
(67, 15, 'PPh 21', '365000.00', 2, 2026, 'Pajak Penghasilan 5%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan` int NOT NULL,
  `id_karyawan` int NOT NULL,
  `jenis_tunjangan` varchar(50) NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `id_karyawan`, `jenis_tunjangan`, `nominal`, `bulan`, `tahun`, `keterangan`) VALUES
(1, 1, 'Tunjangan Jabatan', '3000000.00', 1, 2026, 'Tunjangan Manager IT'),
(2, 1, 'Tunjangan Transportasi', '1500000.00', 1, 2026, 'Transportasi Jakarta'),
(3, 1, 'Tunjangan Makan', '1000000.00', 1, 2026, 'Uang makan per bulan'),
(4, 2, 'Tunjangan Jabatan', '2000000.00', 1, 2026, 'Tunjangan Senior Programmer'),
(5, 2, 'Tunjangan Transportasi', '1500000.00', 1, 2026, 'Transportasi Jakarta'),
(6, 3, 'Tunjangan Transportasi', '1200000.00', 1, 2026, 'Transportasi Jakarta'),
(7, 3, 'Tunjangan Makan', '800000.00', 1, 2026, 'Uang makan per bulan'),
(8, 4, 'Tunjangan Jabatan', '1500000.00', 1, 2026, 'Tunjangan Analis Sistem'),
(9, 4, 'Tunjangan Transportasi', '1200000.00', 1, 2026, 'Transportasi Jakarta'),
(10, 5, 'Tunjangan Transportasi', '1200000.00', 1, 2026, 'Transportasi Jakarta'),
(11, 6, 'Tunjangan Jabatan', '2800000.00', 1, 2026, 'Tunjangan Manager HRD'),
(12, 6, 'Tunjangan Transportasi', '1500000.00', 1, 2026, 'Transportasi Jakarta'),
(13, 7, 'Tunjangan Transportasi', '1000000.00', 1, 2026, 'Transportasi Tangerang'),
(14, 8, 'Tunjangan Jabatan', '2800000.00', 1, 2026, 'Tunjangan Manager Keuangan'),
(15, 8, 'Tunjangan Transportasi', '1500000.00', 1, 2026, 'Transportasi Jakarta'),
(16, 9, 'Tunjangan Transportasi', '1000000.00', 1, 2026, 'Transportasi Jakarta'),
(17, 10, 'Tunjangan Transportasi', '1200000.00', 1, 2026, 'Transportasi Jakarta'),
(18, 10, 'Tunjangan Makan', '800000.00', 1, 2026, 'Uang makan per bulan'),
(19, 11, 'Tunjangan Transportasi', '1200000.00', 1, 2026, 'Transportasi Jakarta'),
(20, 12, 'Tunjangan Transportasi', '1000000.00', 1, 2026, 'Transportasi Tangerang'),
(21, 14, 'Tunjangan Transportasi', '1000000.00', 1, 2026, 'Transportasi Tangerang'),
(22, 15, 'Tunjangan Transportasi', '1200000.00', 1, 2026, 'Transportasi Jakarta'),
(23, 1, 'Tunjangan Jabatan', '3000000.00', 2, 2026, 'Tunjangan Manager IT'),
(24, 1, 'Tunjangan Transportasi', '1500000.00', 2, 2026, 'Transportasi Jakarta'),
(25, 1, 'Tunjangan Makan', '1000000.00', 2, 2026, 'Uang makan per bulan'),
(26, 2, 'Tunjangan Jabatan', '2000000.00', 2, 2026, 'Tunjangan Senior Programmer'),
(27, 2, 'Tunjangan Transportasi', '1500000.00', 2, 2026, 'Transportasi Jakarta'),
(28, 3, 'Tunjangan Transportasi', '1200000.00', 2, 2026, 'Transportasi Jakarta'),
(29, 3, 'Tunjangan Makan', '800000.00', 2, 2026, 'Uang makan per bulan'),
(30, 4, 'Tunjangan Jabatan', '1500000.00', 2, 2026, 'Tunjangan Analis Sistem'),
(31, 4, 'Tunjangan Transportasi', '1200000.00', 2, 2026, 'Transportasi Jakarta'),
(32, 5, 'Tunjangan Transportasi', '1200000.00', 2, 2026, 'Transportasi Jakarta'),
(33, 6, 'Tunjangan Jabatan', '2800000.00', 2, 2026, 'Tunjangan Manager HRD'),
(34, 6, 'Tunjangan Transportasi', '1500000.00', 2, 2026, 'Transportasi Jakarta'),
(35, 7, 'Tunjangan Transportasi', '1000000.00', 2, 2026, 'Transportasi Tangerang'),
(36, 8, 'Tunjangan Jabatan', '2800000.00', 2, 2026, 'Tunjangan Manager Keuangan'),
(37, 8, 'Tunjangan Transportasi', '1500000.00', 2, 2026, 'Transportasi Jakarta'),
(38, 9, 'Tunjangan Transportasi', '1000000.00', 2, 2026, 'Transportasi Jakarta'),
(39, 10, 'Tunjangan Transportasi', '1200000.00', 2, 2026, 'Transportasi Jakarta'),
(40, 10, 'Tunjangan Makan', '800000.00', 2, 2026, 'Uang makan per bulan'),
(41, 11, 'Tunjangan Transportasi', '1200000.00', 2, 2026, 'Transportasi Jakarta'),
(42, 12, 'Tunjangan Transportasi', '1000000.00', 2, 2026, 'Transportasi Tangerang'),
(43, 14, 'Tunjangan Transportasi', '1000000.00', 2, 2026, 'Transportasi Tangerang'),
(44, 15, 'Tunjangan Transportasi', '1200000.00', 2, 2026, 'Transportasi Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `id_karyawan` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `id_karyawan`, `created_at`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', NULL, '2026-07-23 15:23:24'),
(2, 'andi.p', '5f4dcc3b5aa765d61d8327deb882cf99', 'manager', 1, '2026-07-23 15:23:24'),
(3, 'budi.s', '5f4dcc3b5aa765d61d8327deb882cf99', 'user', 2, '2026-07-23 15:23:24'),
(4, 'citra.d', '5f4dcc3b5aa765d61d8327deb882cf99', 'user', 3, '2026-07-23 15:23:24'),
(5, 'fitri.h', '5f4dcc3b5aa765d61d8327deb882cf99', 'manager', 6, '2026-07-23 15:23:24'),
(6, 'hesti.l', '5f4dcc3b5aa765d61d8327deb882cf99', 'manager', 8, '2026-07-23 15:23:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id_tunjangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD CONSTRAINT `potongan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD CONSTRAINT `tunjangan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

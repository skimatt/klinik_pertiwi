-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2025 pada 13.20
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok_obat_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan`, `id_obat`, `harga`, `jumlah`, `subtotal`) VALUES
(0, 1, 1, 0, 2, '6000.00'),
(0, 2, 2, 0, 1, '5000.00'),
(0, 3, 3, 0, 3, '6000.00'),
(0, 4, 4, 0, 1, '10000.00'),
(0, 5, 5, 0, 2, '14000.00'),
(0, 6, 3, 0, 4, '8000.00'),
(0, 7, 1, 0, 5, '15000.00'),
(0, 8, 2, 0, 5, '25000.00'),
(0, 9, 1, 0, 95, '285000.00'),
(0, 11, 5, 7000, 6, '42000.00'),
(0, 12, 2, 5000, 3, '15000.00'),
(0, 13, 2, 5000, 2, '10000.00'),
(0, 14, 4, 10000, 19, '190000.00'),
(0, 15, 2, 0, 4, '20000.00'),
(0, 15, 2, 0, 4, '20000.00'),
(0, 16, 2, 0, 2, '10000.00'),
(0, 17, 1, 3000, 1, '3000.00'),
(0, 17, 3, 2000, 2, '4000.00'),
(0, 18, 5, 0, 1, '7000.00'),
(0, 19, 2, 0, 4, '20000.00'),
(0, 20, 5, 0, 22, '154000.00'),
(0, 21, 2, 5000, 2, '10000.00'),
(0, 22, 2, 5000, 2, '10000.00'),
(0, 23, 5, 0, 1, '7000.00'),
(0, 24, 2, 0, 3, '15000.00'),
(0, 25, 4, 0, 56, '560000.00'),
(0, 26, 2, 0, 18, '90000.00'),
(0, 27, 4, 10000, 5, '50000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(2, 'Sirup', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(3, 'Kapsul', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(4, 'Salep', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(5, 'Injeksi', '2025-06-19 02:49:03', '2025-06-19 02:49:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Analgesik', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(2, 'Antibiotik', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(3, 'Vitamin', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(4, 'Anti Jamur', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(5, 'Anti Alergi', '2025-06-19 02:49:03', '2025-06-19 02:49:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu`) VALUES
(1, 13, 'Login ke sistem', '2025-06-19 02:49:03'),
(2, 13, 'Menambahkan obat: Paracetamol', '2025-06-19 02:49:03'),
(3, 13, 'Menghapus suplier ID: 2', '2025-06-19 02:49:03'),
(4, 13, 'Melihat laporan penjualan', '2025-06-19 02:49:03'),
(5, 13, 'Logout dari sistem', '2025-06-19 02:49:03'),
(10, 13, 'Mengedit obat ID: 1', '2025-06-18 22:27:55'),
(13, 13, 'Mengedit obat ID: 4', '2025-06-20 03:32:07'),
(14, 13, 'Mengedit obat ID: 4', '2025-06-20 03:35:17'),
(15, 13, 'Mengedit obat ID: 1', '2025-06-20 03:36:06'),
(16, 13, 'Mengedit obat ID: 4', '2025-06-20 03:52:52'),
(17, 13, 'Mengedit obat ID: 5', '2025-06-20 05:50:55'),
(18, 13, 'Menambahkan pengguna: admin1', '2025-06-20 06:02:50'),
(22, 13, 'Menghapus pengguna: rahmat', '2025-06-20 06:14:53'),
(23, 13, 'Menghapus pengguna: admin1', '2025-06-20 06:14:59'),
(24, 13, 'Menambahkan pengguna: rahmat', '2025-06-20 06:15:17'),
(25, 13, 'Menambahkan pengguna: rahmat', '2025-06-20 06:15:46'),
(26, 18, 'Menyimpan penjualan ID: 18', '2025-06-20 06:20:29'),
(27, 18, 'Menyimpan penjualan ID: 19', '2025-06-20 06:26:00'),
(28, 13, 'Mengedit obat ID: 5', '2025-06-20 06:26:51'),
(29, 13, 'Mengedit obat ID: 1', '2025-06-20 06:26:56'),
(30, 13, 'Mengedit obat ID: 1', '2025-06-20 06:27:40'),
(31, 13, 'Mengedit obat ID: 1', '2025-06-20 06:27:56'),
(32, 13, 'Mengedit obat ID: 1', '2025-06-20 06:28:17'),
(33, 18, 'Menyimpan penjualan ID: 20', '2025-06-20 11:50:41'),
(34, 13, 'Mengedit obat ID: 1', '2025-06-20 12:57:43'),
(35, 13, 'Menghapus pengguna: rahmat', '2025-06-20 12:58:07'),
(36, 18, 'Menyimpan penjualan ID: 23', '2025-06-20 13:24:22'),
(37, 18, 'Menyimpan penjualan ID: 24', '2025-06-20 13:25:33'),
(38, 18, 'Menyimpan penjualan ID: 25', '2025-06-20 13:45:05'),
(39, 18, 'Menyimpan penjualan ID: 26', '2025-06-20 13:45:23'),
(40, 13, 'Mengedit pengguna ID: 18', '2025-06-20 17:13:42'),
(41, 13, 'Mengedit obat ID: 4', '2025-06-20 17:14:45'),
(42, 13, 'Mengedit obat ID: 3', '2025-06-20 17:14:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `stok` int(11) DEFAULT '0',
  `harga` decimal(12,2) NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `id_kategori`, `id_jenis`, `id_suplier`, `stok`, `harga`, `tanggal_kadaluarsa`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 1, 1, 1, 20, '3000.00', '2026-12-31', '2025-06-19 02:49:03', '2025-06-20 12:57:43'),
(2, 'Amoxicillin', 2, 3, 2, 1, '5000.00', '2026-11-30', '2025-06-19 02:49:03', '2025-06-20 13:45:23'),
(3, 'Vitamin C', 3, 1, 3, 1, '2000.00', '2027-01-15', '2025-06-19 02:49:03', '2025-06-20 17:14:53'),
(4, 'Salep Kulit', 4, 4, 4, 1, '10000.00', '2026-09-20', '2025-06-19 02:49:03', '2025-06-20 17:14:45'),
(5, 'Antihistamin', 5, 2, 5, 77, '7000.00', '2026-10-10', '2025-06-19 02:49:03', '2025-06-20 13:24:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `tanggal`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-06-19 08:00:00', '15000.00', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(2, 2, '2025-06-19 09:00:00', '10000.00', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(3, 2, '2025-06-19 10:00:00', '25000.00', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(4, 2, '2025-06-19 11:00:00', '30000.00', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(5, 2, '2025-06-19 12:00:00', '20000.00', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(6, 2, '2025-06-18 22:03:31', '8000.00', '2025-06-18 22:03:31', '2025-06-18 22:03:31'),
(7, 2, '2025-06-18 22:04:39', '15000.00', '2025-06-18 22:04:39', '2025-06-18 22:04:39'),
(8, 2, '2025-06-18 22:05:11', '25000.00', '2025-06-18 22:05:11', '2025-06-18 22:05:11'),
(9, 2, '2025-06-18 22:05:47', '285000.00', '2025-06-18 22:05:47', '2025-06-18 22:05:47'),
(11, 13, '2025-06-19 06:39:15', '42000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 13, '2025-06-19 06:39:49', '15000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 13, '2025-06-19 06:41:05', '10000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 13, '2025-06-19 06:43:19', '190000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, '2025-06-19 06:44:06', '40000.00', '2025-06-19 06:44:06', '2025-06-19 06:44:06'),
(16, 2, '2025-06-19 06:45:09', '10000.00', '2025-06-19 06:45:09', '2025-06-19 06:45:09'),
(17, 13, '2025-06-20 03:25:44', '7000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 18, '2025-06-20 06:20:29', '7000.00', '2025-06-20 06:20:29', '2025-06-20 06:20:29'),
(19, 18, '2025-06-20 06:26:00', '20000.00', '2025-06-20 06:26:00', '2025-06-20 06:26:00'),
(20, 18, '2025-06-20 11:50:41', '154000.00', '2025-06-20 11:50:41', '2025-06-20 11:50:41'),
(21, 13, '2025-06-20 12:42:09', '10000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 13, '2025-06-20 12:55:41', '10000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 18, '2025-06-20 13:24:22', '7000.00', '2025-06-20 13:24:22', '2025-06-20 13:24:22'),
(24, 18, '2025-06-20 13:25:33', '15000.00', '2025-06-20 13:25:33', '2025-06-20 13:25:33'),
(25, 18, '2025-06-20 13:45:05', '560000.00', '2025-06-20 13:45:05', '2025-06-20 13:45:05'),
(26, 18, '2025-06-20 13:45:23', '90000.00', '2025-06-20 13:45:23', '2025-06-20 13:45:23'),
(27, 13, '2025-06-20 14:00:58', '50000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stok_menipis`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stok_menipis` (
`id_obat` int(11)
,`nama_obat` varchar(100)
,`stok` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'PT Sehat Selalu', 'Jl. Apotek No.1', '081111111111', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(2, 'PT Obat Makmur', 'Jl. Kesehatan 2', '082222222222', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(3, 'CV Farma Plus', 'Jl. Obat Herbal 3', '083333333333', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(4, 'Apotek Indo Medika', 'Jl. Raya 4', '084444444444', '2025-06-19 02:49:03', '2025-06-19 02:49:03'),
(5, 'Distributor Medis', 'Jl. Medika 5', '085555555555', '2025-06-19 02:49:03', '2025-06-19 02:49:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kasir') NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Skimatt', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'aktif', '2025-06-19 00:49:31', '2025-06-19 00:49:31'),
(18, 'rahmat', 'rahmat', 'af2a4c9d4c4956ec9d6ba62213eed568', 'kasir', 'aktif', '2025-06-20 06:15:46', '2025-06-20 17:13:42');

-- --------------------------------------------------------

--
-- Struktur untuk view `stok_menipis`
--
DROP TABLE IF EXISTS `stok_menipis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_menipis`  AS  select `obat`.`id_obat` AS `id_obat`,`obat`.`nama_obat` AS `nama_obat`,`obat`.`stok` AS `stok` from `obat` where (`obat`.`stok` <= 10) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_transaksi` (`id_transaksi`),
  ADD KEY `fk_detail_obat` (`id_obat`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_user` (`id_user`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_suplier` (`id_suplier`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `fk_log_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_ibfk_3` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

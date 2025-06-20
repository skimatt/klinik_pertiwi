-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2025 pada 18.16
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
(1, 1, 1, 5000, 5, '25000.00'),
(2, 2, 2, 15000, 3, '45000.00'),
(3, 3, 3, 8000, 3, '24000.00'),
(4, 3, 5, 7000, 1, '7000.00'),
(5, 4, 4, 25000, 2, '50000.00'),
(6, 4, 6, 6000, 2, '12000.00'),
(7, 5, 7, 20000, 1, '20000.00'),
(8, 5, 8, 10000, 1, '10000.00'),
(9, 6, 9, 22000, 2, '44000.00'),
(10, 6, 10, 7500, 1, '7500.00'),
(11, 7, 1, 5000, 4, '20000.00'),
(12, 8, 2, 15000, 2, '30000.00'),
(13, 8, 3, 8000, 1, '8000.00'),
(14, 9, 4, 25000, 2, '50000.00'),
(15, 10, 5, 7000, 5, '35000.00'),
(16, 10, 6, 6000, 5, '30000.00'),
(0, 12, 3, 0, 25, '200000.00'),
(0, 12, 6, 0, 12, '72000.00'),
(0, 12, 3, 0, 25, '200000.00'),
(0, 12, 5, 0, 23, '161000.00'),
(0, 12, 1, 0, 21, '105000.00'),
(0, 13, 10, 0, 85, '637500.00');

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
(1, 1, 'Menambahkan obat Paracetamol 500mg', '2025-06-19 02:51:00'),
(2, 2, 'Melakukan penjualan ID 1', '2025-06-19 10:00:00'),
(3, 3, 'Melakukan penjualan ID 2', '2025-06-19 11:00:00'),
(4, 4, 'Mengubah stok obat Amoxicillin', '2025-06-19 12:00:00'),
(5, 5, 'Melakukan penjualan ID 3', '2025-06-19 12:00:00'),
(6, 6, 'Menambahkan suplier PT Kalbe Farma', '2025-06-19 02:50:00'),
(7, 7, 'Melakukan penjualan ID 4', '2025-06-19 13:00:00'),
(8, 8, 'Mengubah stok obat Vitamin C', '2025-06-19 14:00:00'),
(9, 10, 'Melakukan penjualan ID 5', '2025-06-19 14:00:00'),
(10, 1, 'Melakukan penjualan ID 6', '2025-06-19 15:00:00'),
(11, 2, 'Menambahkan obat Cetirizine', '2025-06-19 02:51:00'),
(12, 3, 'Melakukan penjualan ID 7', '2025-06-19 16:00:00'),
(13, 2, 'Menyimpan penjualan ID: 12', '2025-06-20 23:08:32'),
(14, 2, 'Menyimpan penjualan ID: 13', '2025-06-20 23:09:33'),
(15, 1, 'Mengedit obat ID: 4', '2025-06-20 23:10:48'),
(16, 1, 'Mengedit obat ID: 1', '2025-06-20 23:10:55'),
(17, 1, 'Mengedit obat ID: 3', '2025-06-20 23:11:02'),
(18, 1, 'Mengedit obat ID: 2', '2025-06-20 23:11:08'),
(19, 1, 'Mengedit obat ID: 12', '2025-06-20 23:11:17'),
(20, 1, 'Mengedit obat ID: 8', '2025-06-20 23:11:23'),
(21, 1, 'Mengedit obat ID: 9', '2025-06-20 23:11:30'),
(22, 1, 'Mengedit obat ID: 11', '2025-06-20 23:11:37'),
(23, 1, 'Mengedit obat ID: 6', '2025-06-20 23:11:42'),
(24, 1, 'Mengedit obat ID: 7', '2025-06-20 23:11:47'),
(25, 1, 'Mengedit obat ID: 10', '2025-06-20 23:11:53'),
(26, 1, 'Mengedit obat ID: 5', '2025-06-20 23:11:58');

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
(1, 'Paracetamol', 1, 1, 1, 79, '5000.00', '2026-06-30', '2025-06-19 02:51:00', '2025-06-20 23:10:55'),
(2, 'Amoxicillin', 2, 3, 2, 50, '15000.00', '2026-12-31', '2025-06-19 02:51:00', '2025-06-20 23:11:08'),
(3, 'Vitamin C', 3, 1, 3, 150, '8000.00', '2027-03-31', '2025-06-19 02:51:00', '2025-06-20 23:11:02'),
(4, 'Ketoconazole', 4, 4, 4, 30, '25000.00', '2026-09-30', '2025-06-19 02:51:00', '2025-06-20 23:10:48'),
(5, 'Cetirizine', 5, 1, 5, 57, '7000.00', '2026-11-30', '2025-06-19 02:51:00', '2025-06-20 23:11:58'),
(6, 'Ibuprofen', 1, 1, 6, 108, '6000.00', '2026-08-31', '2025-06-19 02:51:00', '2025-06-20 23:11:42'),
(7, 'Cefixime', 2, 3, 7, 40, '20000.00', '2026-10-31', '2025-06-19 02:51:00', '2025-06-20 23:11:47'),
(8, 'Vitamin D3', 3, 1, 8, 150, '10000.00', '2027-01-31', '2025-06-19 02:51:00', '2025-06-20 23:11:23'),
(9, 'Miconazole', 4, 4, 9, 25, '22000.00', '2026-07-31', '2025-06-19 02:51:00', '2025-06-20 23:11:30'),
(11, 'Metformin', 1, 1, 1, 60, '12000.00', '2026-05-31', '2025-06-19 02:51:00', '2025-06-20 23:11:37'),
(12, 'Omeprazole', 1, 3, 2, 70, '18000.00', '2026-04-30', '2025-06-19 02:51:00', '2025-06-20 23:11:17');

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
(1, 1, '2025-06-19 10:00:00', '25000.00', '2025-06-19 10:00:00', '2025-06-19 10:00:00'),
(2, 2, '2025-06-19 11:00:00', '45000.00', '2025-06-19 11:00:00', '2025-06-19 11:00:00'),
(3, 3, '2025-06-19 12:00:00', '30000.00', '2025-06-19 12:00:00', '2025-06-19 12:00:00'),
(4, 4, '2025-06-19 13:00:00', '60000.00', '2025-06-19 13:00:00', '2025-06-19 13:00:00'),
(5, 6, '2025-06-19 14:00:00', '35000.00', '2025-06-19 14:00:00', '2025-06-19 14:00:00'),
(6, 7, '2025-06-19 15:00:00', '50000.00', '2025-06-19 15:00:00', '2025-06-19 15:00:00'),
(7, 8, '2025-06-19 16:00:00', '20000.00', '2025-06-19 16:00:00', '2025-06-19 16:00:00'),
(8, 10, '2025-06-19 17:00:00', '40000.00', '2025-06-19 17:00:00', '2025-06-19 17:00:00'),
(9, 1, '2025-06-20 09:00:00', '55000.00', '2025-06-20 09:00:00', '2025-06-20 09:00:00'),
(10, 2, '2025-06-20 10:00:00', '70000.00', '2025-06-20 10:00:00', '2025-06-20 10:00:00'),
(11, 3, '2025-06-20 11:00:00', '25000.00', '2025-06-20 11:00:00', '2025-06-20 11:00:00'),
(12, 2, '2025-06-20 23:08:32', '738000.00', '2025-06-20 23:08:32', '2025-06-20 23:08:32'),
(13, 2, '2025-06-20 23:09:33', '637500.00', '2025-06-20 23:09:33', '2025-06-20 23:09:33');

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
(1, 'PT Kalbe Farma', 'Jl. Pulogadung No. 12, Jakarta', '021-12345678', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(2, 'PT Kimia Farma', 'Jl. Veteran No. 5, Bandung', '022-87654321', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(3, 'PT Sanbe Farma', 'Jl. Industri No. 10, Surabaya', '031-55512345', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(4, 'PT Tempo Scan', 'Jl. Sudirman No. 25, Jakarta', '021-98765432', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(5, 'PT Darya Varia', 'Jl. Raya Bogor Km 28, Bogor', '0251-12349876', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(6, 'PT Phapros', 'Jl. Simpang Borobudur No. 1, Semarang', '024-67891234', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(7, 'PT Novartis Indonesia', 'Jl. Thamrin No. 8, Jakarta', '021-34567890', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(8, 'PT Bio Farma', 'Jl. Pasteur No. 28, Bandung', '022-12340987', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(9, 'PT Merck Indonesia', 'Jl. Gatot Subroto No. 15, Jakarta', '021-56789012', '2025-06-19 02:50:00', '2025-06-19 02:50:00'),
(10, 'PT Combiphar', 'Jl. Raya Serang Km 12, Tangerang', '021-89012345', '2025-06-19 02:50:00', '2025-06-19 02:50:00');

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
(1, 'skimatt', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'aktif', '2025-06-19 10:00:00', '2025-06-19 10:00:00'),
(2, 'skimatt', 'kasir', 'de28f8f7998f23ab4194b51a6029416f', 'kasir', 'aktif', '2025-06-19 10:01:00', '2025-06-20 22:37:27'),
(3, 'Citra Lestari', 'citra_l', 'hashed_password_3', 'kasir', 'aktif', '2025-06-19 10:02:00', '2025-06-19 10:02:00'),
(4, 'Dewi Sari', 'dewi_s', 'hashed_password_4', 'admin', 'aktif', '2025-06-19 10:03:00', '2025-06-19 10:03:00'),
(5, 'Eko Prasetyo', 'eko_p', 'hashed_password_5', 'kasir', 'nonaktif', '2025-06-19 10:04:00', '2025-06-19 10:04:00'),
(6, 'Fani Indah', 'fani_i', 'hashed_password_6', 'kasir', 'aktif', '2025-06-19 10:05:00', '2025-06-19 10:05:00'),
(7, 'Gita Permata', 'gita_p', 'hashed_password_7', 'admin', 'aktif', '2025-06-19 10:06:00', '2025-06-19 10:06:00'),
(8, 'Hadi Nugroho', 'hadi_n', 'hashed_password_8', 'kasir', 'aktif', '2025-06-19 10:07:00', '2025-06-19 10:07:00'),
(9, 'Intan Wulandari', 'intan_w', 'hashed_password_9', 'kasir', 'nonaktif', '2025-06-19 10:08:00', '2025-06-19 10:08:00'),
(10, 'Joko Widodo', 'joko_w', 'hashed_password_10', 'admin', 'aktif', '2025-06-19 10:09:00', '2025-06-19 10:09:00');

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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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

-- Nonaktifkan sementara foreign key check
SET FOREIGN_KEY_CHECKS = 0;

-- Urutan hapus data dari tabel anak ke induk (hindari konflik foreign key)
DELETE FROM detail_transaksi;
DELETE FROM detail_penjualan;
DELETE FROM penjualan;
DELETE FROM log_aktivitas;
DELETE FROM obat;
DELETE FROM suplier;
DELETE FROM user;

-- (Opsional) Jika ingin menghapus juga referensi tetap
-- DELETE FROM kategori;
-- DELETE FROM jenis;

-- Reset auto_increment ke 1
ALTER TABLE detail_transaksi AUTO_INCREMENT = 1;
ALTER TABLE detail_penjualan AUTO_INCREMENT = 1;
ALTER TABLE penjualan AUTO_INCREMENT = 1;
ALTER TABLE log_aktivitas AUTO_INCREMENT = 1;
ALTER TABLE obat AUTO_INCREMENT = 1;
ALTER TABLE suplier AUTO_INCREMENT = 1;
ALTER TABLE user AUTO_INCREMENT = 1;

-- (Jika kategori dan jenis dihapus)
-- ALTER TABLE kategori AUTO_INCREMENT = 1;
-- ALTER TABLE jenis AUTO_INCREMENT = 1;

-- Aktifkan kembali foreign key check
SET FOREIGN_KEY_CHECKS = 1;

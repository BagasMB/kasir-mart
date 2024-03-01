-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2024 pada 11.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_mart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama`, `stok`, `harga`, `id_kategori`) VALUES
(1, 'B0001', 'Kemeja', 0, 70000, 1),
(3, 'B0002', 'Roti', 40, 2000, 5),
(4, 'B0003', 'Sepatu', 100, 100000, 1),
(5, 'B0004', 'Hoodie', 0, 70000, 1),
(6, 'B0005', 'Tas', 0, 100000, 1),
(7, 'B0006', 'Teh Gelas', 10, 1000, 6),
(8, 'B0007', 'Beras', 0, 10000, 6),
(9, 'B0008', 'Gula 1kg', 0, 7000, 6),
(10, 'B0009', 'Buku', 0, 1500, 6),
(11, 'B0010', 'Pensil', 0, 1000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `kode_penjualan` int(11) NOT NULL,
  `kode_barang` char(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `kode_penjualan`, `kode_barang`, `jumlah`, `sub_total`) VALUES
(1, 2402071, 'B0001', 2, 140000),
(2, 2402072, 'B0001', 3, 210000),
(3, 2402072, 'B0002', 1, 2000),
(4, 2402073, 'B0001', 2, 140000),
(5, 2402084, 'B0001', 2, 140000),
(6, 2402085, 'B0001', 5, 350000),
(7, 2402095, 'B0001', 1, 70000),
(8, 2402095, 'B0003', 2, 200000),
(9, 2402186, 'B0003', 9, 900000),
(10, 2402186, 'B0006', 4, 4000),
(11, 2402187, 'B0001', 1, 70000),
(12, 2402188, 'B0001', 1, 70000),
(16, 2402209, 'B0001', 8, 560000),
(17, 2402209, 'B0003', 87, 8700000),
(18, 2402209, 'B0004', 88, 6160000),
(19, 24022810, 'B0003', 10, 1000000),
(20, 24022811, 'B0001', 1, 70000),
(21, 24022812, 'B0001', 1, 70000),
(22, 2403011, 'B0003', 60, 6000000),
(23, 2403012, 'B0001', 68, 4760000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fasion'),
(5, 'Makanan'),
(6, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `poin` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telp`, `alamat`, `poin`) VALUES
(1, 'Bukan Pelanggan', '-', '-', 0),
(2, 'Bagas', '0812335540603', 'Padangan, Jungke', 142800),
(3, 'Decooo', '12345678', 'Leptop Rusak', 180000),
(4, 'Misbo', '0812888', 'ra ndue', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(20) NOT NULL,
  `kode_barang` char(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_supplier` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `kode_barang`, `jumlah`, `tanggal`, `kode_supplier`) VALUES
(1, '2402051835391', 'B0002', 20, '2024-01-27', 'S0001'),
(2, '2402051835542', 'B0006', 10, '2024-01-23', 'S0001'),
(3, '2402071307273', 'B0001', 100, '2024-02-07', 'S0002'),
(5, '2402201422075', 'B0007', 10, '2024-02-20', 'S0001'),
(10, '24022014341210', 'B0003', 10, '2024-02-13', 'S0001'),
(13, '2402201439083', 'B0003', 189, '2024-02-20', 'S0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `potongan_harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tanggal`, `total_tagihan`, `id_pelanggan`, `potongan_harga`, `bayar`, `kembalian`) VALUES
(1, 2402071, '2024-01-25', 135000, 2, 0, 150000, 15000),
(2, 2402072, '2024-02-07', 212000, 2, 205900, 220000, 0),
(3, 2402073, '2024-02-07', 140000, 2, 6360, 150000, 0),
(4, 2402084, '2024-02-08', 140000, 2, 4200, 140000, 0),
(5, 2402085, '2024-02-08', 350000, 2, 14000, 400000, 0),
(6, 2402095, '2024-02-09', 270000, 1, 0, 300000, 0),
(7, 2402186, '2024-02-18', 904000, 1, 10000, 1000000, 0),
(8, 2402187, '2024-02-18', 70000, 1, 10000, 100000, 0),
(9, 2402188, '2024-02-18', 70000, 1, 10000, 70000, 0),
(12, 2402209, '2024-02-20', 15420000, 2, 110700, 15500000, 0),
(13, 24022810, '2024-02-28', 1000000, 3, 0, 1000000, 0),
(14, 24022811, '2024-02-28', 70000, 2, 10000, 70000, 0),
(15, 24022812, '2024-02-28', 70000, 2, 20000, 70000, 0),
(16, 2403011, '2024-03-01', 6000000, 3, 30610, 6000000, 0),
(17, 2403012, '2024-03-01', 4760000, 2, 1850400, 4760000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara_8`
--

CREATE TABLE `suara_8` (
  `id` int(11) NOT NULL,
  `total_suara_8` int(11) NOT NULL,
  `total_suara_sah_8` int(11) NOT NULL,
  `total_suara_tidak_sah_8` int(11) NOT NULL,
  `suara_no1_8` int(11) NOT NULL,
  `suara_no2_8` int(11) NOT NULL,
  `suara_no3_8` int(11) NOT NULL,
  `nama_tps_8` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suara_8`
--

INSERT INTO `suara_8` (`id`, `total_suara_8`, `total_suara_sah_8`, `total_suara_tidak_sah_8`, `suara_no1_8`, `suara_no2_8`, `suara_no3_8`, `nama_tps_8`) VALUES
(1, 100, 90, 10, 50, 30, 10, 'Jenglong City'),
(2, 90, 90, 0, 30, 30, 30, '300'),
(3, 100, 100, 0, 1, 90, 9, '90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `kode_supplier` char(8) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kode_supplier`, `telp`) VALUES
(1, 'Ardyy', 'S0001', '088221077242'),
(2, 'Bagas', 'S0002', '081235540603');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `level` enum('Kasir','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `image`, `level`) VALUES
(1, 'admin', 'd74600e380dbf727f67113fd71669d88', 'Bagas', 'default.png', 'Admin'),
(5, 'kasir', 'd74600e380dbf727f67113fd71669d88', 'toya', 'default.png', 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `nama_voucher` varchar(50) NOT NULL,
  `potongan_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `nama_voucher`, `potongan_harga`, `jumlah`, `waktu`) VALUES
(2, 'Awal Bulan', 10000, 3, '2024-02-28'),
(3, 'Vippp', 100000, 4, '2024-02-20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `suara_8`
--
ALTER TABLE `suara_8`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `suara_8`
--
ALTER TABLE `suara_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

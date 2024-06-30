-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2024 at 04:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.30

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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `kode_barang` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama`, `stok`, `harga`, `id_kategori`) VALUES
(1, 'B0001', 'Kemeja', 0, 70000, 1),
(3, 'B0002', 'Roti', 17, 2000, 5),
(4, 'B0003', 'Sepatu', 46, 100000, 1),
(5, 'B0004', 'Hoodie', 0, 70000, 1),
(6, 'B0005', 'Tas', 0, 100000, 1),
(7, 'B0006', 'Teh Gelas', 10, 1000, 6),
(8, 'B0007', 'Beras', 0, 10000, 6),
(9, 'B0008', 'Gula 1kg', 0, 7000, 6),
(10, 'B0009', 'Buku', 0, 1500, 6),
(11, 'B0010', 'Pensil', 0, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int NOT NULL,
  `kode_penjualan` int NOT NULL,
  `kode_barang` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `sub_total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
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
(23, 2403012, 'B0001', 68, 4760000),
(24, 2403043, 'B0003', 1, 100000),
(25, 2403044, 'B0003', 50, 5000000),
(26, 2403065, 'B0002', 10, 20000),
(29, 2403066, 'B0003', 2, 200000),
(30, 2403067, 'B0002', 1, 2000),
(31, 2406301, 'B0002', 1, 0),
(32, 2406301, 'B0003', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fasion'),
(5, 'Makanan'),
(6, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int NOT NULL,
  `nama_cv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profil_website` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_wa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_cv`, `profil_website`, `instagram`, `twitter`, `facebook`, `email`, `alamat`, `no_wa`) VALUES
(1, 'Kasir-Mart', 'Haool', 'https://www.instagram.com/bgsmhrdkabdhrto_/', '', '', 'bagasmahardikabudi2007@gmail.com', 'Padangan RT 01/RW 07, Jungke, Karanganyar', '081235540603');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_pelanggan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `poin` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `telp`, `alamat`, `poin`) VALUES
(1, 'Bukan Pelanggan', '-', '-', 0),
(2, 'Bagas', '0812335540603', 'Padangan, Jungke', 438660),
(3, 'Decooo', '12345678', 'Leptop Rusak', 180000),
(4, 'Misbo', '0812888', 'ra ndue', 0),
(5, 'Budi Santosa', '12345678', 'ok', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int NOT NULL,
  `kode_pembelian` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barang` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode_supplier` char(8) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
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
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int NOT NULL,
  `kode_penjualan` int NOT NULL,
  `tanggal` date NOT NULL,
  `total_tagihan` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_user` int NOT NULL,
  `potongan_harga` int NOT NULL,
  `bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tanggal`, `total_tagihan`, `id_pelanggan`, `id_user`, `potongan_harga`, `bayar`) VALUES
(1, 2402071, '2024-01-25', 135000, 2, 1, 0, 150000),
(2, 2402072, '2024-02-07', 212000, 2, 1, 205900, 220000),
(3, 2402073, '2024-02-07', 140000, 2, 1, 6360, 150000),
(4, 2402084, '2024-02-08', 140000, 2, 1, 4200, 140000),
(5, 2402085, '2024-02-08', 350000, 2, 1, 14000, 400000),
(6, 2402095, '2024-02-09', 270000, 1, 1, 0, 300000),
(7, 2402186, '2024-02-18', 904000, 1, 5, 10000, 1000000),
(8, 2402187, '2024-02-18', 70000, 1, 5, 10000, 100000),
(9, 2402188, '2024-02-18', 70000, 1, 5, 10000, 70000),
(12, 2402209, '2024-02-20', 15420000, 2, 1, 110700, 15500000),
(13, 24022810, '2024-02-28', 1000000, 3, 5, 0, 1000000),
(14, 24022811, '2024-02-28', 70000, 2, 1, 10000, 70000),
(15, 24022812, '2024-02-28', 70000, 2, 1, 20000, 70000),
(16, 2403011, '2024-03-01', 6000000, 3, 1, 30610, 6000000),
(17, 2403012, '2024-03-01', 4760000, 2, 5, 1850400, 4760000),
(18, 2403043, '2024-03-04', 100000, 2, 1, 0, 150000),
(19, 2403044, '2024-03-04', 5000000, 2, 5, 100000, 5000000),
(20, 2403065, '2024-03-06', 20000, 4, 1, 100000, 20000),
(25, 2403066, '2024-03-06', 200000, 5, 1, 0, 200000),
(26, 2403067, '2024-03-06', 2000, 5, 1, 0, 2000),
(27, 2406301, '2024-06-30', 102000, 2, 1, 0, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `suara_8`
--

CREATE TABLE `suara_8` (
  `id` int NOT NULL,
  `total_suara_8` int NOT NULL,
  `total_suara_sah_8` int NOT NULL,
  `total_suara_tidak_sah_8` int NOT NULL,
  `suara_no1_8` int NOT NULL,
  `suara_no2_8` int NOT NULL,
  `suara_no3_8` int NOT NULL,
  `nama_tps_8` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suara_8`
--

INSERT INTO `suara_8` (`id`, `total_suara_8`, `total_suara_sah_8`, `total_suara_tidak_sah_8`, `suara_no1_8`, `suara_no2_8`, `suara_no3_8`, `nama_tps_8`) VALUES
(1, 100, 90, 10, 50, 30, 10, 'Jenglong City'),
(2, 90, 90, 0, 30, 30, 30, '300'),
(3, 100, 100, 0, 1, 90, 9, '90');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `nama_supplier` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_supplier` char(8) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `kode_supplier`, `telp`) VALUES
(1, 'Ardyy', 'S0001', '088221077242'),
(2, 'Bagas', 'S0002', '081235540603');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int NOT NULL,
  `kode_barang` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id_temp`, `kode_barang`, `jumlah`, `id_pelanggan`, `id_user`) VALUES
(45, 'B0002', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('Kasir','Admin') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `telp`, `alamat`, `image`, `level`) VALUES
(1, 'admin', 'd74600e380dbf727f67113fd71669d88', 'Bagas', 'bagas@gmail.com', '081235540603', 'Jln. Srwijaya, Padangan  RT 01/RW 07, Jungke', 'default.png', 'Admin'),
(5, 'kasir', 'd74600e380dbf727f67113fd71669d88', 'toya', 'hasha@gmail.com', '7665', 'vhghv', 'default.png', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int NOT NULL,
  `nama_voucher` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `potongan_harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `nama_voucher`, `potongan_harga`, `jumlah`, `waktu`) VALUES
(2, 'Awal Bulan', 10000, 3, '2024-03-29'),
(3, 'Vippp', 100000, 4, '2024-02-20'),
(4, 'voucher ramadhan', 100000, 0, '2024-03-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `suara_8`
--
ALTER TABLE `suara_8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `suara_8`
--
ALTER TABLE `suara_8`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

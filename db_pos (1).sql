-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mar 2021 pada 06.13
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `harga_beli` varchar(20) NOT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `barcode`, `nama_barang`, `ukuran`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `created`, `updated`) VALUES
(7, 'B20201218', 'Minyak Rambut', '10', 'gram', '30', '2500', '3500', '2021-03-11 04:28:52', '2021-03-11 04:28:52'),
(8, 'B20201219', 'Shampo', '10', 'gram', '5', '500', '1000', '2021-03-11 04:51:06', '2021-03-11 04:51:06'),
(10, 'B20201220', 'Pembersih Wajah', '10', 'gram', '5', '5000', '7000', '2021-03-11 04:48:35', '2021-03-11 04:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `p_level` varchar(30) NOT NULL,
  `diskon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `p_level`, `diskon`) VALUES
(1, 'Umum', '0'),
(2, 'Reseller', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `id_level`, `nama_pelanggan`, `alamat`, `telp`) VALUES
(1, 1, 'Aris', 'Sukodono', '089677017239'),
(2, 2, 'Lisnawati', 'Sukodono', '089677017239'),
(3, 1, 'Rendra', 'Truko', '089677017239');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_beli`, `id_barang`, `stok`, `deskripsi`, `created`, `updated`) VALUES
(1, 10, '3', 'Kulakan', '2021-03-02 15:49:18', '2021-03-02 15:49:18'),
(2, 7, '100', 'Kulakan', '2021-03-03 01:22:40', '2021-03-03 01:22:40'),
(3, 10, '100', 'Kulakan', '2021-03-03 01:22:56', '2021-03-03 01:22:56'),
(4, 8, '100', 'Kulakan', '2021-03-03 01:23:09', '2021-03-03 01:23:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(20) NOT NULL,
  `profit` int(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `barcode`, `no_invoice`, `jumlah`, `total`, `profit`, `created`, `id_pelanggan`, `id_barang`, `id_user`, `ket`) VALUES
(368, 'B20201219', 'LV2103110001', 30, '30000', 15000, '2021-03-11 04:50:53', 1, 8, 2, 'lunas');

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER UPDATE ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang
SET stok = stok - new.jumlah
WHERE 
barcode = new.barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `id_jual_detail` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `diskonrp` int(11) NOT NULL,
  `s_total` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`id_jual_detail`, `no_invoice`, `total`, `bayar`, `diskon`, `diskonrp`, `s_total`, `kembali`) VALUES
(152, 'LV2103110001', 30000, 50000, 0, 0, 30000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_piutang`
--

CREATE TABLE `tb_piutang` (
  `id_piutang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `piutang` varchar(50) NOT NULL,
  `ket` varchar(10) NOT NULL,
  `tgl_termin` date NOT NULL,
  `tgl_lunas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_piutang`
--

INSERT INTO `tb_piutang` (`id_piutang`, `id_pelanggan`, `no_invoice`, `piutang`, `ket`, `tgl_termin`, `tgl_lunas`) VALUES
(38, 1, 'LV2103110001', '20000', 'lunas', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `logo_toko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama_toko`, `no_telp`, `alamat`, `logo_toko`) VALUES
(1, 'Batrisiya', '08974658357', 'Dukuh Truko', '09032021155951garuda.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` enum('admin','kasir') NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `level`, `status`) VALUES
(1, 'admin', '$2y$10$rSSTcEn01TC8AKbQGjCSeOFcgW1S.y1UZp1piiJ59MZJHWG9h5sFu', 'Arissatur Rohman', 'admin', 'aktif'),
(2, 'kasir', '$2y$10$hUxblZnXRpxt8DjkzisJKex614KK3AGUD1du.A2QOUmdEJSlBROqi', 'Lisnawati', 'kasir', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`id_jual_detail`);

--
-- Indexes for table `tb_piutang`
--
ALTER TABLE `tb_piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;
--
-- AUTO_INCREMENT for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id_jual_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `tb_piutang`
--
ALTER TABLE `tb_piutang`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

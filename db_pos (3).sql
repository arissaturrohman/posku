-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Apr 2021 pada 06.24
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
  `kategori` varchar(20) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `harga_beli` varchar(20) NOT NULL,
  `harga_jual` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `barcode`, `nama_barang`, `ukuran`, `satuan`, `kategori`, `stok`, `harga_beli`, `harga_jual`) VALUES
(13, 'BRG0001', 'VCO', '100', 'ml', 'batrisiya', '97', '22000', '40000'),
(14, 'BRG0002', 'VCO', '250', 'ml', 'msglow', '48', '38500', '70000'),
(15, 'BRG0003', 'VCO Kapsul', '95 ', 'Kapsul', 'batrisiya', '47', '30000', '55000'),
(16, 'BRG0004', 'TONER NORMAL', '60', 'ml', 'batrisiya', '40', '33000', '60000'),
(18, 'BRG0005', 'TONER ACNE', '60', 'ml', 'batrisiya', '95', '49500', '90000'),
(19, 'BRG0006', 'TONER HARD/EKSTRA', '60', 'ml', '', '', '66000', '120000'),
(20, 'BRG0007', 'ACNE CREAM/TOTOL', '12', 'GR', '', '', '46000', '80000'),
(21, 'BRG0008', 'ANTI AGING', '15', 'gr', '', '', '69000', '120000'),
(22, 'BRG0009', 'BB CREAM PEACH', '20', 'ML', '', '', '69000', '120000'),
(23, 'BRG0010', 'BB CREAM IVORY', '20', 'ml', '', '', '69000', '120000'),
(24, 'BRG0011', 'BB+SUNSCREEN', '30', 'ml', '', '51', '98000', '170000'),
(25, 'BRG0012', 'MILK CLENSER', '60', 'ml', '', '', '23000', '40000'),
(26, 'BRG0013', 'DAY REGULAR', '12', 'gr', '', '', '27500', '70000'),
(27, 'BRG0014', 'NIGHT REGULAR', '12', 'gr', '', '', '46000', '80000'),
(28, 'BRG0015', 'DAY NORMAL', '15', 'gr', '', '51', '57500', '100000'),
(29, 'BRG0016', 'NIGHT NORMAL', '15', 'gr', '', '50', '75000', '130000'),
(30, 'BRG0017', 'DAY OILY/ACNE', '15', 'gr', '', '', '60375', '105000'),
(31, 'BRG0018', 'NIGHT OILY/ACNE', '15', 'gr', '', '3', '83375', '145000'),
(32, 'BRG0019', 'DAY EKSTRA EKLUSIF', '15', 'gr', '', '50', '69000', '120000'),
(33, 'BRG0020', 'NIGHT EKSTRA EKLUSIF', '15', 'gr', '', '', '112125', '195000'),
(34, 'BRG0021', 'DAY SQUALENE', '15', 'gr', '', '', '60375', '105000'),
(35, 'BRG0022', 'NIGHT SQUALENE', '15', 'gr', '', '', '103500', '180000'),
(36, 'BRG0023', 'DAY GOLD', '15', 'gr', '', '49', '77625', '135000'),
(37, 'BRG0024', 'NIGHT GOLD', '15', 'gr', '', '49', '112125', '195000'),
(38, 'BRG0025', 'BRIGHTENING FOR NECK', '15', 'gr', '', '', '575500', '100000'),
(39, 'BRG0026', 'NIGHT EKSTRA GEL', '15', 'gr', '', '', '143750', '250000'),
(40, 'BRG0027', 'FACE POWDER', '30', 'gr', '', '', '32625', '55000'),
(41, 'BRG0028', 'FACIAL WASH KOPI', '100', 'ml', '', '', '27600', '48000'),
(42, 'BRG0029', 'FACIAL WASH PROPOLIS  100ml', '100', 'ml', '', '', '23000', '40000'),
(43, 'BRG0030', 'FACIAL WASH PROPOLIS 250ml', '250', 'ml', '', '', '34500', '60000'),
(44, 'BRG0031', 'FACIAL WAH GREEN TEA 100 ml', '100', 'ml', '', '', '20125', '35000'),
(45, 'BRG0032', 'FACIAL WAH GREEN TEA 250 ml', '250', 'ml', '', '50', '31625', '55000'),
(46, 'BRG0033', 'FACIAL WASH SQUALENE', '100', 'ml', '', '49', '40250', '70000'),
(47, 'BRG0034', 'FRESHLY SPRAY', '70', 'ml', '', '', '23000', '40000'),
(48, 'BRG0035', 'MASKER BERAS', '100', 'gr', '', '', '210125', '35000'),
(49, 'BRG0036', 'MASKER PEELING 12 gr', '12', 'gr', '', '', '37375', '65000'),
(50, 'BRG0037', 'MASKER PEELING 30 gr', '30', 'gram', '', '', '54625', '95000'),
(51, 'BRG0038', 'MASKER KEFIR MILKY 12 gr', '12', 'gr', '', '', '143750', '25000'),
(52, 'BRG0039', 'MASKER KEFIR MILKY 50 gr', '50', 'gr', '', '', '37375', '65000'),
(53, 'BRG0040', 'MASKER KEFIR BLACK CHARCOAL', '50', 'gr', '', '', '40250', '70000'),
(54, 'BRG0041', 'MASKER KEFIR GELANDO', '12', 'gr', '', '', '14375', '25000'),
(55, 'BRG0042', 'MASKER KEFIR GELANDO', '50', 'gr', '', '', '37375', '65000'),
(56, 'BRG0043', 'SERUM COLLAGEN 20 ml', '20', 'ml', '', '49', '57500', '100000'),
(57, 'BRG0044', 'SERUM COLLAGEN 30 ml', '30', 'ml', '', '', '86250', '150000'),
(58, 'BRG0045', 'SERUM ACNE', '20', 'ml', '', '51', '57500', '100000'),
(59, 'BRG0046', 'SERUM EKSTRA COLLAGEN', '20', 'ml', '', '', '138000', '240000'),
(60, 'BRG0047', 'SERUM EKSTRA ACNE', '20', 'ml', '', '', '138000', '240000'),
(61, 'BRG0048', 'SERUM GOLD', '30', 'ml', '', '-4', '138000', '240000'),
(62, 'BRG0049', 'SUNSCREEN PEACH', '9', 'gr', '', '1', '46000', '80000'),
(63, 'BRG0050', 'SUNSCREEN YELLOW', '9', 'gr', '', '', '46000', '80000'),
(64, 'BRG0051', 'NIGHT TEENS', '30', 'ml', '', '', '34500', '60000'),
(65, 'BRG0052', 'DAY TEENS', '30', 'ml', '', '', '34500', '60000'),
(66, 'BRG0053', 'TONER TEENS', '30', 'ml', '', '', '34500', '60000'),
(67, 'BRG0054', 'TONER TEENS 60 ml', '60', 'ml', '', '', '46000', '80000'),
(68, 'BRG0055', 'TWC IVORY', '12', 'gr', '', '', '57500', '100000'),
(69, 'BRG0056', 'TWC NATURAL', '12', 'gr', '', '', '57500', '100000'),
(70, 'BRG0057', 'TWC PINK', '12', 'gr', '', '', '57500', '100000'),
(71, 'BRG0058', 'TWC IVORY REFIL', '12', 'gr', '', '', '40250', '70000'),
(72, 'BRG0059', 'TWC NATURAL REFIL', '12', 'gr', '', '', '40250', '70000'),
(73, 'BRG0060', 'TWC PINK REFIL', '12', 'gr', '', '', '40250', '70000'),
(74, 'BRG0061', 'ALOEVERA GEL 200 gr', '200', 'gr', '', '', '57500', '100000'),
(75, 'BRG0062', 'ALOEVERA GEL 50 gr', '50', 'gr', '', '', '23000', '40000'),
(76, 'BRG0063', 'BODY LOTION GREEN TEA 250', '250', 'ml', '', '', '25875', '45000'),
(77, 'BRG0064', 'BODY LOTION GREEN TEA 100', '100', 'gr', '', '', '126500', '22000'),
(78, 'BRG0065', 'BODY LOTION FRUITY 100', '100', 'gr', '', '', '126500', '22000'),
(79, 'BRG0066', 'BODY LOTION FRUITY 250', '250', 'ml', '', '', '25875', '45000'),
(80, 'BRG0067', 'BODY WASH BIDARA 200ml', '200', 'ml', '', '', '31625', '55000'),
(81, 'BRG0068', 'BODY WASH GOAT MILK 250ml', '250', 'ml', '', '', '28750', '50000'),
(82, 'BRG0069', 'BODY WASH GOAT MILK 100ml', '100', 'ml', '', '', '14375', '25000'),
(83, 'BRG0070', 'BODY WASH GOAT MILK 500ml', '500', 'ml', '', '', '49450', '86000'),
(84, 'BRG0071', 'BODY WASH GOAT MILK REFIL', '1000', 'ml', '', '', '69000', '120000'),
(85, 'BRG0072', 'BODY CREAM MINI TUBE', '30', 'gr', '', '', '46000', '80000'),
(86, 'BRG0073', 'CHARCOAL BRIGHTENING POWDER', '30', 'gr', '', '', '46000', '80000'),
(87, 'BRG0074', 'DEODORANT MAN', '60', 'ml', '', '', '23000', '40000'),
(88, 'BRG0075', 'DEODORANT WOMAN', '60', 'ml', '', '', '23000', '40000'),
(89, 'BRG0076', 'FEMINIME CARE', '60', 'ml', '', '', '23000', '40000'),
(90, 'BRG0077', 'HAIR & BODY WASH BIDARA 250ml', '250', 'ml', '', '', '34500', '60000'),
(91, 'BRG0078', 'HAIR & BODY WASH BIDARA REFIL', '1000', 'ml', '', '', '69000', '120000'),
(92, 'BRG0079', 'LULUR KOPI', '200', 'gr', '', '', '25875', '45000'),
(93, 'BRG0080', 'LULUR SUSU', '200', 'gr', '', '', '25875', '45000'),
(94, 'BRG0081', 'LULUR MANGIR', '200', 'ml', '', '', '25875', '45000'),
(95, 'BRG0082', 'ALOEVERA SEAWEED 200 gr', '200', 'gr', '', '', '59800', '104000'),
(96, 'BRG0083', 'ALOEVERA SEAWEED  50 gr', '50', 'gr', '', '', '24150', '42000'),
(97, 'BRG0084', 'VASELINE 30 gr', '30', 'gr', '', '', '13375', '25000'),
(98, 'BRG0085', 'VASELINE 12 gr', '12', 'gr', '', '', '8625', '15000'),
(99, 'BRG0086', 'CONDITIONER', '250', 'ml', '', '', '31625', '55000'),
(100, 'BRG0087', 'HAIR TONIC GINGSENG 250ml', '250', 'ml', '', '', '31625', '55000'),
(101, 'BRG0088', 'HAIR TONIC GINGSENG 100ml', '100', 'ml', '', '', '17250', '30000'),
(102, 'BRG0089', 'HAIR TREATMENT 250ml', '250', 'ml', '', '', '34500', '60000'),
(103, 'BRG0090', 'HAIR TREATMENT 100ml', '100', 'ml', '', '', '20125', '35000'),
(104, 'BRG0091', 'SHAMPO STRAWBERRY', '250', 'ml', '', '', '23000', '40000'),
(105, 'BRG0092', 'SHAMPO LEMON', '250', 'ml', '', '', '23000', '40000'),
(106, 'BRG0093', 'SHAMPO GREEN TEA', '250', 'ml', '', '', '23000', '40000'),
(107, 'BRG0094', 'SHAMPO MINT', '250', 'ml', '', '', '23000', '40000'),
(108, 'BRG0095', 'SHAMPO MELON', '250', 'ml', '', '', '23000', '40000'),
(109, 'BRG0096', 'SHAMPO AROMATIC', '250', 'ml', '', '', '23000', '40000'),
(110, 'BRG0097', 'HAIR SERUM', '60', 'ml', '', '', '40250', '70000'),
(111, 'BRG0098', 'POMADE', '50', 'gr', '', '', '40250', '70000'),
(112, 'BRG0099', 'SABUN STRAWBERRY', '60', 'gr', '', '', '17250', '30000'),
(113, 'BRG0100', 'SABUN PEPAYA', '60', 'gr', '', '49', '17250', '30000'),
(114, 'BRG0101', 'SABUN ALPUKAT', '60', 'gr', '', '', '15525', '27000'),
(115, 'BRG0102', 'SABUN MANGIR', '60', 'gr', '', '', '14375', '25000'),
(116, 'BRG0103', 'SABUN MADU', '60', 'gr', '', '', '17250', '30000'),
(117, 'BRG0104', 'SABUN BERAS MERAH SUSU 60 GR', '60', 'gr', '', '', '18975', '33000'),
(118, 'BRG0105', 'SABUN BERAS MERAH SUSU 53 GR', '53', 'gr', '', '49', '17250', '30000'),
(119, 'BRG0106', 'SABUN SUSU', '60', 'gr', '', '', '14375', '25000'),
(120, 'BRG0107', 'SABUN KOPI', '60', 'gr', '', '', '14375', '25000'),
(121, 'BRG0108', 'SABUN KEFIR', '60', 'gr', '', '', '15525', '27000'),
(122, 'BRG0109', 'SABUN GREEN TEA', '60', 'gr', '', '', '17250', '30000'),
(123, 'BRG0110', 'SABUN BENGKOANG', '60', 'gr', '', '49', '17250', '30000'),
(124, 'BRG0111', 'SABUN BERAS MERAS+MADU', '60', 'gr', '', '', '17250', '30000'),
(125, 'BRG0112', 'LIP GEL MINI', '5', 'gr', '', '', '14375', '25000'),
(126, 'BRG0113', 'LIP GEL', '12', 'gr', '', '', '17250', '30000'),
(127, 'BRG0114', 'LIP GEL 30 GR', '30', 'gr', '', '', '25875', '45000'),
(128, 'BRG0115', 'LIPSTIK MATTE PEACH', '2', 'gr', '', '', '43125', '75000'),
(129, 'BRG0116', 'LIPSTIK FUSCHIA', '2', 'gr', '', '', '43125', '75000'),
(130, 'BRG0117', 'LIPSTIK PINK', '2', 'gr', '', '', '43125', '75000'),
(131, 'BRG0118', 'LIPSTIK PINK PEACH', '2', 'gr', '', '', '43125', '75000'),
(132, 'BRG0119', 'LIPSTIK ORANGE', '2', 'gr', '', '', '43125', '75000'),
(133, 'BRG0120', 'LIPSTIK NUDE', '2', 'gr', '', '', '43125', '75000'),
(134, 'BRG0121', 'LIPSTIK PINK NUDE', '2', 'gr', '', '', '43125', '75000'),
(135, 'BRG0122', 'LIPSTIK GLOSSY CHILI', '2', 'gr', '', '', '43125', '75000'),
(136, 'BRG0123', 'LIPSTIK GLOSSY DARK PEACH', '2', 'gr', '', '', '43125', '75000'),
(137, 'BRG0124', 'LIPSTIK GLOSSY PINK RED', '2', 'gr', '', '', '43125', '75000'),
(138, 'BRG0125', 'LIPSTIK GLOSSY PINK', '2', 'gr', '', '', '43125', '75000'),
(139, 'BRG0126', 'LIP CREAM JOB INTERVIEW', '5', 'gr', '', '', '43125', '75000'),
(140, 'BRG0127', 'LIP CREAM SHOPPING TIME', '5', 'gr', '', '', '43125', '75000'),
(141, 'BRG0128', 'LIP CREAM WEDDING GUEST', '5', 'gr', '', '', '43125', '75000'),
(142, 'BRG0129', 'LIP CREAM DINNER PARTY', '5', 'gr', '', '', '43125', '75000'),
(143, 'BRG0130', 'LIP CREAM FIRST DATE', '5', 'gr', '', '', '43125', '75000'),
(144, 'BRG0131', 'LIP CREAM GIRL NIGHT', '5', 'gr', '', '', '43125', '75000'),
(145, 'BRG0132', 'LIP GLOSIR', '4,5', 'gr', '', '', '43125', '75000'),
(146, 'BRG0133', 'GIZI SUPER CREAM', '18', 'gr', '', '', '16100', '28000'),
(147, 'BRG0134', 'NIGHT TEMULAWAK', '18', 'gr', '', '', '16100', '28000'),
(148, 'BRG0135', 'DAY TEMULAWAK', '18', 'gr', '', '', '16100', '28000'),
(149, 'BRG0136', 'BINAHONG', '30', 'KAPSUL', '', '', '51750', '90000'),
(150, 'BRG0137', 'GRACINIA', '60', 'KAPSUL', '', '', '57500', '100000'),
(151, 'BRG0138', 'MADU GEMPI', '175', 'gr', '', '', '57500', '100000'),
(152, 'BRG0139', 'MADU TUEWUL', '145', 'gr', '', '51', '86250', '150000'),
(153, 'BRG0140', 'MANJAAN', '30', 'KAPSUL', '', '', '51750', '90000'),
(154, 'BRG0141', 'PURE HONEY', '275', 'gr', '', '', '63250', '110000'),
(155, 'BRG0142', 'SLIMMING HERB', '60', 'KAPSUL', '', '', '57500', '100000'),
(156, 'BRG0143', 'EDT', '50', 'ml', '', '', '51750', '90000'),
(157, 'BRG0144', 'EDC', '100', 'ml', '', '', '34500', '60000'),
(158, 'BRG0145', 'GLOW DAY ACNE SPF 15', '12', 'gr', '', '', '35000', '70000'),
(159, 'BRG0146', 'GLOW DAY SPF 30', '12', 'gr', '', '', '37000', '75000'),
(160, 'BRG0147', 'GLOW NIGHT ACNE', '12', 'gr', '', '', '42500', '85000'),
(161, 'BRG0148', 'GLOW NIGHT 1', '12', 'gr', '', '', '45000', '90000'),
(162, 'BRG0149', 'GLOW NIGHT 2', '12', 'gr', '', '', '47500', '95000'),
(163, 'BRG0150', 'NIGHT EXTRA GLOW GEL', '12', 'gr', '', '', '70000', '140000'),
(165, 'BRG0151', 'VC0 60 ML', '60', 'ml', '', '2', '34500', '60000'),
(166, 'BRG0152', 'SERUM GOLD REFIL', '10', 'ml', '', '49', '51750', '90000'),
(167, 'BRG0153', 'LEMORAS', '250', 'ml', '', '', '50250', '75000'),
(168, 'BRG0154', 'LEMORIS', '250', 'ml', '', '', '47250', '70000'),
(169, 'BRG0155', 'KATALOG', '0', '0', '', '', '16400', '20000'),
(170, 'BRG0156', 'TETES MATA', '30', 'ml', '', '50', '20250', '35000'),
(171, 'BRG0157', 'PASTA GIGI SIWAK', '0', '0', '', '', '22575', '35000'),
(172, 'BRG0158', 'TONER COKLAT', '100', 'ml', '', '', '11000', '25000'),
(173, 'BRG0159', 'Tes', '10', 'gr', 'facial', '', '9000', '90000');

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
(2, 'Reseller', '0'),
(3, 'Marketer', '0'),
(4, 'Sub Agen', '0'),
(5, 'Agen', '0'),
(6, 'Sub Agen 35', '0'),
(8, 'Umum', '0');

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
(4, 8, 'MIA', '   PURWODADI', '085786167740'),
(5, 8, 'ANITAHARA', '  BONANG', '082133200072'),
(6, 8, 'FAIZAH', ' BONANG', '081392613606'),
(7, 2, 'AULINA', 'KARANGANYAR', ''),
(8, 4, 'HIMMATUL ALIYAH', 'KARANGAWEN ', ''),
(9, 4, 'DINA SOFIANA', 'BRI', ''),
(10, 4, 'CHOIRUN NISA', 'TEMBALANG', ''),
(11, 2, 'AYU WONOKERTO', '', ''),
(12, 3, 'BU BADRIYAH', '', ''),
(13, 4, 'KRISTINA', 'KUCIR', ''),
(14, 4, 'KHUSNUL HIMAH', '', ''),
(15, 2, 'MIA BATAM', '', ''),
(16, 6, 'KHUSNUL HIMAH', 'Tanubayan/SLB ', ''),
(17, 4, 'iin novitasari', ' pati', '0'),
(18, 2, 'EDA ANDINA', 'BUYARAN', '0');

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
  `harga_pokok` varchar(20) NOT NULL,
  `diskon` varchar(20) NOT NULL,
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

INSERT INTO `tb_penjualan` (`id_penjualan`, `barcode`, `no_invoice`, `jumlah`, `total`, `harga_pokok`, `diskon`, `profit`, `created`, `id_pelanggan`, `id_barang`, `id_user`, `ket`) VALUES
(19, 'BRG0001', 'LV2104160001', 3, '120000', '66000', '13333.333333333', 54000, '2021-04-16 04:00:58', 4, 13, 4, 'lunas'),
(20, 'BRG0002', 'LV2104160002', 2, '140000', '77000', '11400', 63000, '2021-04-16 04:04:54', 7, 14, 4, 'lunas'),
(21, 'BRG0003', 'LV2104160002', 3, '165000', '90000', '11400', 75000, '2021-04-16 04:04:59', 7, 15, 4, 'lunas'),
(22, 'BRG0005', 'LV2104160002', 5, '450000', '247500', '11400', 202500, '2021-04-16 04:05:04', 7, 18, 4, 'lunas');

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
  `kembali` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`id_jual_detail`, `no_invoice`, `total`, `bayar`, `diskon`, `diskonrp`, `s_total`, `kembali`, `created`) VALUES
(8, 'LV2104160001', 120000, 100000, 39600, 400, 80000, 20000, '2021-04-16 04:03:03'),
(9, 'LV2104160002', 755000, 641000, 113250, 750, 641000, 0, '2021-04-16 04:05:27');

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
(8, 4, 'LV2104160001', '20000', 'lunas', '0000-00-00', '0000-00-00'),
(9, 7, 'LV2104160002', '0', 'lunas', '0000-00-00', '0000-00-00');

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
(1, 'Batrisiya', '08974658357', 'Dukuh Truko', '05042021162805agenda.png');

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
(1, 'admin', '$2y$10$rSSTcEn01TC8AKbQGjCSeOFcgW1S.y1UZp1piiJ59MZJHWG9h5sFu', 'Admin', 'admin', 'aktif'),
(4, 'kasir', '$2y$10$YiaepXWtPVpKRUgRGqWi1uW5k5A2XJCFF.Mn3tndtsn/c2lFs/p76', 'Nurul', 'kasir', 'aktif');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  MODIFY `id_jual_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_piutang`
--
ALTER TABLE `tb_piutang`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

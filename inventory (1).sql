-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mei 2019 pada 08.51
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` char(7) NOT NULL DEFAULT '',
  `nm_barang` varchar(100) NOT NULL DEFAULT '',
  `keterangan` text,
  `merek` varchar(100) DEFAULT '',
  `jumlah` int(6) DEFAULT '0',
  `satuan` varchar(10) DEFAULT '',
  `kd_kategori` char(4) DEFAULT '',
  `files` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `keterangan`, `merek`, `jumlah`, `satuan`, `kd_kategori`, `files`, `timestamp`, `harga`) VALUES
('B000113', 'SF', '<p>iugafi.suhh</p>\r\n', 'AWR', 1560, 'Unit', 'K004', '[]', '2018-09-16 05:06:39', 212),
('B000114', 'BA&acute;KU', '', 'HAHA', 1629332, 'Unit', 'K004', '', '2018-09-16 05:07:19', 234),
('B000115', 'KAKUNG', '', 'SAMSUNG', 6462, 'Botol', 'K001', '', '2018-09-16 05:43:06', 377777),
('B000117', 'laptop', '<p><img alt="" src="/PW/Uploadimg/images/Capture(1).PNG" style="height:202px; width:385px" /></p>\r\n', 'kokong', 3803303, 'Buah', 'K004', '["23668041_301755670231684_7348209158170083328_n.jpg"]', '2018-09-30 05:16:51', 546600000),
('B000118', 'asus rog', 'gaming', 'asus', 47304, 'Unit', 'K002', '', '2018-11-11 03:20:49', 40000000),
('B000119', 'lenovo thnkpad', 'ha', 'lenovo', 20371, 'Unit', 'K002', '', '2018-11-11 03:21:48', 14000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` char(4) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('K001', 'Komputer'),
('K002', 'Laptop'),
('K003', 'Printer'),
('K004', 'SERVER'),
('K005', '&acute;woihe'),
('K006', 'kursi'),
('K007', 'haii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `no_pe` varchar(9) DEFAULT NULL,
  `no_po` varchar(9) DEFAULT NULL,
  `kd_barang` varchar(7) DEFAULT NULL,
  `nm_barang` varchar(70) DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`no_pe`, `no_po`, `kd_barang`, `nm_barang`, `jumlah`, `harga`) VALUES
('PE0000004', 'P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('PE0000004', 'P00000001', 'B000119', 'lenovo thnkpad', 10, 14000000),
('PE0000004', 'P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('PE0000004', 'P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('PE0000004', 'P00000001', 'B000119', 'lenovo thnkpad', 10, 14000000),
('PE0000004', 'P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('PE0000004', 'P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('PE0000004', 'P00000001', 'B000119', 'lenovo thnkpad', 10, 14000000),
('PE0000004', 'P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('PE0000004', 'P00000003', 'B000119', 'lenovo thnkpad', 6667, 14000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `kd_petugas` char(4) NOT NULL,
  `nm_petugas` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` enum('Admin','user') DEFAULT NULL,
  `jns_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `nm_petugas`, `no_telepon`, `username`, `password`, `level`, `jns_kelamin`, `alamat`) VALUES
('12', 'tohirin', '0859623756', 'tohirin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'laki-laki', ''),
('1234', 'fakih', '085768966000', 'fakih123', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'laki-laki', 'jakarta'),
('P236', 'fahi', '7682455', 'fahi123', 'fcea920f7412b5da7be0cf42b8c93759', 'user', 'laki-laki', 'jakarta'),
('P237', 'saitama', '085768966000', 'saitama', '202cb962ac59075b964b07152d234b70', 'Admin', 'laki-laki', 'bogor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `no_po` varchar(9) NOT NULL,
  `tgl_po` date NOT NULL,
  `nm_supplier` varchar(30) NOT NULL,
  `divisi_tujuan` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(18,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`no_po`, `tgl_po`, `nm_supplier`, `divisi_tujuan`, `tanggal`, `total`) VALUES
('P00000001', '2019-02-12', 'S0004', 'JAKARTA', '2019-02-03 04:16:13', '700002808.00'),
('P00000002', '2019-02-14', 'S0003', 'JAKARTA', '2019-02-17 05:13:45', '0.00'),
('P00000003', '2019-02-14', 'S0004', 'JAKARTA', '2019-02-17 05:17:31', '93338000000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_item`
--

CREATE TABLE `po_item` (
  `no_po` char(9) NOT NULL,
  `kd_barang` char(7) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `harga` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po_item`
--

INSERT INTO `po_item` (`no_po`, `kd_barang`, `nm_barang`, `jumlah`, `harga`) VALUES
('', 'B000119', 'lenovo thnkpad', 50, 14000000),
('P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('P00000001', 'B000119', 'lenovo thnkpad', 10, 14000000),
('P00000001', 'B000114', 'BA&acute;KU', 12, 234),
('P00000002', 'B000119', 'lenovo thnkpad', 50, 12),
('P00000002', 'B000114', 'BA&acute;KU', 12, 234),
('P00000002', 'B000119', 'lenovo thnkpad', 50, 12),
('P00000002', 'B000114', 'BA&acute;KU', 12, 234),
('P00000002', 'B000119', 'lenovo thnkpad', 50, 12),
('P00000002', 'B000114', 'BA&acute;KU', 12, 234),
('P00000002', 'B000119', 'lenovo thnkpad', 50, 12),
('P00000002', 'B000114', 'BA&acute;KU', 12, 234),
('P00000003', 'B000119', 'lenovo thnkpad', 6667, 14000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `kd_suplier` char(5) NOT NULL,
  `nm_suplier` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` int(15) DEFAULT NULL,
  `jumlah` int(15) DEFAULT NULL,
  `kd_Kategori` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`kd_suplier`, `nm_suplier`, `keterangan`, `alamat`, `telepon`, `jumlah`, `kd_Kategori`) VALUES
('S0003', 'AHA GOR', 'HAHA', ',SJHFGJH,', 214, NULL, 'K004'),
('S0004', 'resto', 'penjual makanan', 'jakarta', 2147483647, NULL, 'K008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penerimaan`
--

CREATE TABLE `tmp_penerimaan` (
  `kd_petugas` varchar(7) DEFAULT NULL,
  `no_pe` varchar(9) DEFAULT NULL,
  `no_po` varchar(9) DEFAULT NULL,
  `kd_barang` varchar(7) DEFAULT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pengadaan`
--

CREATE TABLE `tmp_pengadaan` (
  `id` int(4) NOT NULL,
  `kd_petugas` char(5) DEFAULT NULL,
  `kd_barang` char(7) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `harga_beli` int(12) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `no_po` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pengadaan`
--

INSERT INTO `tmp_pengadaan` (`id`, `kd_petugas`, `kd_barang`, `deskripsi`, `harga_beli`, `jumlah`, `satuan`, `no_po`) VALUES
(1, '1234', 'B000114', NULL, 234, 12, NULL, 'P00000001'),
(2, '1234', 'B000119', NULL, 14000000, 10, NULL, 'P00000001'),
(3, '1234', 'B000114', NULL, 234, 12, NULL, 'P00000001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `FK_barang` (`kd_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kd_petugas`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`no_po`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kd_suplier`);

--
-- Indexes for table `tmp_pengadaan`
--
ALTER TABLE `tmp_pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_pengadaan`
--
ALTER TABLE `tmp_pengadaan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_barang` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

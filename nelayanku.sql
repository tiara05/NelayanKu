-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 07:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nelayanku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `namabarang` varchar(22) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `fotoikan` varchar(22) NOT NULL,
  `id_nelayan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `filter` enum('Paling Laku','Diskon') NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `namabarang`, `stok`, `id_kategori`, `fotoikan`, `id_nelayan`, `harga`, `filter`, `Deskripsi`) VALUES
(1, 'Ikan Gurami', 10, 2, 'gurami.jpg', 1, 15000, 'Paling Laku', 'Ikan gurami segar langsung ambil dari nelayan. 1 ekor gurami berat 7 - 8 ons. '),
(2, 'Ikan Mujair', 11, 2, 'mujair.png', 2, 5000, 'Diskon', 'Ikan Mujair segar langsung ambil dari nelayan. 1 kg Mujair isi 10-15 ekor. '),
(3, 'Ikan Kakap', 4, 1, 'kakap.jpg', 1, 50000, 'Paling Laku', 'Ikan Kakap segar langsung ambil dari nelayan. 1 kg Kakap isi 1 ekor. '),
(4, 'Ikan Lele', 1, 2, 'teri.jpeg', 2, 10500, 'Paling Laku', 'Ikan Lele segar langsung ambil dari nelayan. 1 kg Lele isi 10-15 ekor. '),
(9, 'Ikan Kembung', 3, 1, 'kembung.jpg', 2, 35000, 'Paling Laku', 'Ikan Mujair segar langsung ambil dari nelayan. 1 kg Mujair isi 10-15 ekor. '),
(10, 'Kerang Darah', 6, 2, 'kerangdarah.jpg', 1, 34000, 'Diskon', 'Kerang darah segar langsung ambil dari nelayan. 1 kg kerang darah isi 10-15 biji. '),
(11, 'Kerupuk Kemplang', 15, 4, 'kerupukkemplang.jpg', 1, 13500, 'Diskon', 'Kerupuk kemplang renyah dan nikmat dari ikan tengiri yang super segar. Kemasan 1 kg '),
(12, 'Keripik Teri', 4, 4, 'keripikteri.jpg', 2, 34000, 'Diskon', 'Kerupuk kemplang renyah dan nikmat dari ikan teri asli yang super segar. Kemasan 1 kg '),
(13, 'Ikan Gabus', 50, 1, 'Ikan gabus.png', 1, 7800, 'Paling Laku', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `id_detil_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_detil_transaksi`, `id_transaksi`, `id_barang`, `jumlah`, `status`) VALUES
(84, 55, 4, 1, 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id_favorit`, `id_barang`) VALUES
(1, 1),
(2, 4),
(3, 9),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id_filter` int(11) NOT NULL,
  `namafilter` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id_filter`, `namafilter`) VALUES
(1, 'Paling Laku'),
(2, 'Diskon');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `namakategori` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `namakategori`) VALUES
(1, 'Ikan Air Laut'),
(2, 'Ikan Air Tawar'),
(3, 'Olahan Kaleng'),
(4, 'Olahan Kerupuk');

-- --------------------------------------------------------

--
-- Table structure for table `pencariikan`
--

CREATE TABLE `pencariikan` (
  `id_nelayan` int(11) NOT NULL,
  `namanelayan` varchar(22) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pencariikan`
--

INSERT INTO `pencariikan` (`id_nelayan`, `namanelayan`, `foto`) VALUES
(1, 'Supardi', 'Supardi.jpg'),
(2, 'Susanto', 'Susanto.jpg'),
(3, 'Susi', 'susi.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `password`, `level`) VALUES
(1, 'tiara', 'tiara', 'tiara', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `preeorder`
--

CREATE TABLE `preeorder` (
  `id_preeorder` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama` varchar(22) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kirim` date NOT NULL,
  `telepon` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preeorder`
--

INSERT INTO `preeorder` (`id_preeorder`, `id_barang`, `nama`, `alamat`, `jumlah`, `kirim`, `telepon`, `status`) VALUES
(1, 1, 'tiararahmani', 'sidoarjo', 2, '2021-05-05', '08133249622', 'Pending'),
(2, 3, 'tiararahmani', 'fkb', 3, '2022-03-31', '08133249622', 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--
-- Error reading structure for table nelayanku.preorder: #1932 - Table 'nelayanku.preorder' doesn't exist in engine
-- Error reading data for table nelayanku.preorder: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `nelayanku`.`preorder`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `namapromo` varchar(15) NOT NULL,
  `detailpromo` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `namapromo`, `detailpromo`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 'Gratis Ongkir', 'Setiap pembelanjaan 5 item ikan gratis ongkir seluruh indonesia', '2021-03-17', '2021-03-31'),
(2, 'Beli 1 Gratis 1', 'Pembelajaan Ikan Laut Tawar akan gratis produk kaleng', '2021-04-01', '2021-04-07'),
(3, 'Raja Diskon', 'Pembelian minimal Rp 100.000; diskon 10%', '2021-03-01', '2021-04-30'),
(4, 'Promo Gila', 'Setiap pembelian ikan laut 1 kg gratis kerupuk kemplang 1 pack', '2021-05-20', '2021-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_beli` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_pembeli` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tgl_beli`, `nama_pembeli`) VALUES
(55, NULL, '2021-03-25 22:41:42', 'tiararahmani');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `nomertelpon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `namauser`, `nomertelpon`, `email`, `alamat`, `username`, `password`) VALUES
(1, 'Tiara Rahmania Hadiningrum', '081332496225', 'tiararahmania05@gmail.com', 'Villa Jasmine 1 blok i no.33', 'tiararahmani', 'tiara2001'),
(2, 'harya bima rahadityawan', '837912381', 'harya.biem07@gmail.com', 'vj1', 'harya', 'bima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `namabarang` (`namabarang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_nelayan` (`id_nelayan`),
  ADD KEY `id_kategori_2` (`id_kategori`),
  ADD KEY `id_nelayan_2` (`id_nelayan`),
  ADD KEY `id_filter` (`filter`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`id_detil_transaksi`),
  ADD KEY `id_detil_transaksi` (`id_detil_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_buku` (`id_barang`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_favorit`),
  ADD KEY `id_favorit` (`id_favorit`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id_filter`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pencariikan`
--
ALTER TABLE `pencariikan`
  ADD PRIMARY KEY (`id_nelayan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `preeorder`
--
ALTER TABLE `preeorder`
  ADD PRIMARY KEY (`id_preeorder`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `id_detil_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_favorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id_filter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pencariikan`
--
ALTER TABLE `pencariikan`
  MODIFY `id_nelayan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preeorder`
--
ALTER TABLE `preeorder`
  MODIFY `id_preeorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_nelayan`) REFERENCES `pencariikan` (`id_nelayan`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

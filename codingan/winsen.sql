-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 03:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(4) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `barang`, `harga`, `jumlah`) VALUES
(3, 'Chitato ayam panggang', '10000', '100'),
(4, 'Chitato sapi panggang', '10000', '100'),
(5, 'Chitato sapi bakar', '10000', '100'),
(6, 'Chitato rasa asli', '10000', '100'),
(8, 'chitato indomie goreng', '10000', '200'),
(9, 'chitato indomie ayam bawang', '10000', '200'),
(10, 'golda dolce latte', '3000', '150'),
(11, 'golda cappuchino', '3000', '150'),
(12, 'kopi kenangan black aren', '9000', '75'),
(13, 'kopi kenangan mantancino', '10000', '75'),
(14, 'kopi kenangan avocuddle', '9000', '75'),
(15, 'teh pucuk ', '4000', '50'),
(16, 'teh javana', '4000', '50'),
(17, 'coca cola ', '6000', '149'),
(18, 'sprite', '6000', '150'),
(19, 'fanta strawberry', '6000', '75'),
(20, 'fanta jeruk', '6000', '75'),
(21, 'rokok surya', '34000', '50'),
(22, 'rokok sampoerna', '34000', '50'),
(23, 'rokok malboro merah ', '43000', '50'),
(24, 'rokok malboro ice burst', '44000', '150'),
(25, 'rokok camel kecil ungu', '19000', '50'),
(26, 'rokok camel kecil kuning', '19000', '50'),
(27, 'rokok mustang kopi', '16000', '50'),
(29, 'roti top baker', '7000', '25'),
(30, 'tisu 200 pcs 2ply', '10000', '100'),
(31, 'mainan hotwheels', '40000', '40'),
(32, 'indomie goreng', '3000', '400'),
(33, 'indomie ayam bawang', '3000', '400'),
(34, 'telur ayam ', '3000', '100');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_bk` int(4) NOT NULL,
  `id_barang` int(4) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_bk`, `id_barang`, `nama_pembeli`, `stok`, `total_harga`) VALUES
(3, 17, 'winsen', '1', '6000');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `hapuss` AFTER DELETE ON `barang_keluar` FOR EACH ROW update barang set jumlah = jumlah + old.stok WHERE id_barang = old.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_bk` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE barang SET jumlah = jumlah - new.stok WHERE id_barang = new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_bm` int(4) NOT NULL,
  `id_barang` int(4) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_bm`, `id_barang`, `stok`) VALUES
(3, 1, '1'),
(5, 3, '100'),
(6, 4, '100'),
(7, 5, '100'),
(8, 6, '100'),
(9, 8, '200'),
(10, 9, '200'),
(11, 10, '150'),
(12, 11, '150'),
(13, 12, '75'),
(14, 13, '75'),
(15, 14, '75'),
(16, 15, '50'),
(17, 16, '50'),
(18, 17, '150'),
(19, 18, '150'),
(20, 19, '75'),
(21, 20, '75'),
(22, 21, '50'),
(23, 22, '50'),
(24, 23, '50'),
(25, 24, '50'),
(26, 24, '50'),
(27, 24, '50'),
(28, 25, '50'),
(29, 26, '50'),
(30, 27, '50'),
(31, 29, '25'),
(32, 31, '40'),
(33, 32, '400'),
(34, 33, '400'),
(35, 30, '100'),
(36, 34, '100');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `barang_masuk` FOR EACH ROW update barang set jumlah = jumlah-old.stok WHERE id_barang = old.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_bm` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE barang SET jumlah = jumlah + new.stok WHERE id_barang = new.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id_pekerja` int(11) NOT NULL,
  `id_userr` int(11) NOT NULL,
  `nama_pekerja` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id_pekerja`, `id_userr`, `nama_pekerja`, `alamat`, `telepon`) VALUES
(1, 1, 'admin', 'batam', '081265983564'),
(2, 2, 'petugas', 'batam', '08529674615');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_userr` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `telepon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_userr`, `nama_pelanggan`, `telepon`) VALUES
(3, 6, 'Winsen', '081236547878');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'c7911af3adbd12a035b289556d96470a', 1),
(2, 'petugas', 'c7911af3adbd12a035b289556d96470a', 2),
(6, 'winsen', '25d55ad283aa400af464c76d713c07ad', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id_pekerja`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

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
  MODIFY `id_barang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_bk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_bm` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id_pekerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

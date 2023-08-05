-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 07:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_pasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(5) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `harga_barang` int(25) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `jumlah_barang`, `harga_barang`, `satuan`) VALUES
(52, 'batu (plus)', 0, 1000, 'pcs'),
(54, 'pvc (timbal)', 0, 1000, 'pcs'),
(55, 'pasir (3 roda)', 0, 15000, 'karung'),
(56, 'semen (basar)', 0, 1000, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kode_barang_masuk` int(5) NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_barang` int(5) NOT NULL,
  `kode_karyawan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_pesanan`
--

CREATE TABLE `barang_pesanan` (
  `kode_barang` int(5) NOT NULL,
  `kode_pesanan` int(5) NOT NULL,
  `kuantitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kode_karyawan` int(5) NOT NULL,
  `nama_karyawan` varchar(15) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `kata_sandi` varchar(250) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `nama_karyawan`, `no_telp`, `alamat`, `nama_pengguna`, `kata_sandi`, `role`) VALUES
(17, 'saifa atika', '086567898755', 'jogja', 'pemilik', 'pemilik', 'pemilik'),
(21, 'budi sudarsono', '089787898909', 'buah batu selatan', 'karyawan', 'karyawan', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` int(5) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_pembeli` varchar(255) NOT NULL,
  `no_telp_pembeli` int(14) NOT NULL,
  `lokasi_pengiriman` varchar(255) NOT NULL,
  `kode_karyawan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kode_barang_masuk`),
  ADD KEY `kode_barang` (`kode_barang`) USING BTREE,
  ADD KEY `kode_karyawan` (`kode_karyawan`) USING BTREE;

--
-- Indexes for table `barang_pesanan`
--
ALTER TABLE `barang_pesanan`
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_pesanan` (`kode_pesanan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `kode_karyawan` (`kode_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kode_barang_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `kode_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kode_pesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode_karyawan`);

--
-- Constraints for table `barang_pesanan`
--
ALTER TABLE `barang_pesanan`
  ADD CONSTRAINT `barang_pesanan_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_pesanan_ibfk_2` FOREIGN KEY (`kode_pesanan`) REFERENCES `pesanan` (`kode_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

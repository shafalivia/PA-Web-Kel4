-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 09:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jabatan`, `kontak`, `role`, `username`) VALUES
('1', 'Shafa Nur Alifia', 'Pegawai', '123', 'admin', ' b ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `image_menu` varchar(255) NOT NULL,
  `name_menu` varchar(255) NOT NULL,
  `price_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `image_menu`, `name_menu`, `price_menu`) VALUES
(1, 'Halo.png', 'Halo', 12000),
(2, 'Alo.png', 'Alo', 25000),
(3, 'Olaa.png', 'Olaa', 20000),
(4, 'Aloha.png', 'Aloha', 23000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `tanggal` varchar(100) NOT NULL,
  `no_transaksi` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pesanan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`tanggal`, `no_transaksi`, `username`, `pesanan`, `harga`, `jumlah`, `status`) VALUES
('2023/05/03 00:49:28', 4811, 'a', 'Burger Ulala', '30000', 1, 'Pesanan diterima'),
('2023/05/06 14:48:32', 5256, 'aa', 'a', '112', 1, 'Pesanan diterima'),
('2023/05/08 00:07:22', 4722, 'aa', 'ccc', '23000', 1, 'Pesanan diterima'),
('2023/05/08 00:11:45', 5993, 'aa', 'ccc', '23000', 1, 'Belum di proses'),
('2023/05/08 22:55:15', 3763, 'cc', 'Alo', '12000', 1, 'Pesanan diterima'),
('2023/05/08 22:55:17', 3763, 'cc', 'Olaa', '25000', 1, 'Pesanan diterima');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `role`) VALUES
('b', 'b@gmail.com', 'b', 'admin'),
('c', 'c@gmail.com', 'c', 'kasir'),
('aa', 'a', 'aa', 'user'),
('bb', 'bb', 'ba', 'user'),
('cc', 'afibaehaqi@gmail.com', 'cc', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

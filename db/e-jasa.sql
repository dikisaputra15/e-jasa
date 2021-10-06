-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 03:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-jasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `batas_bayar` date NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `tanggal_pesan`, `batas_bayar`, `status`) VALUES
(66, '2021-07-16', '2021-07-17', 'pending'),
(67, '2021-08-05', '2021-08-06', 'pending'),
(68, '2021-08-05', '2021-08-06', 'pending'),
(69, '2021-08-06', '2021-08-07', 'pending'),
(70, '2021-08-06', '2021-08-07', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'sarana dan prasarana'),
(2, 'limbah khusus'),
(3, 'saluran mampet tanpa bongkar'),
(4, 'sumur got dan penampungan air'),
(5, 'desa dan perkampungan'),
(6, 'perumahan dan residen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jasa`
--

CREATE TABLE `tb_jasa` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jasa`
--

INSERT INTO `tb_jasa` (`id_barang`, `nama_barang`, `keterangan`, `harga`, `id_kategori`, `gambar`) VALUES
(25, 'Layanan Sarana dan Prasarana', 'melayani kebutuhan sarana dan prasarana', '2000000', 1, 'sarana.png'),
(26, 'layanan limbah khusus', 'melayani berbagai macam limbah khusus', '5000000', 2, 'limbah.jpg'),
(27, 'layanan saluran mampet tanpa bongkar', 'melayani saluran mampet tanpa bongkar', '2000000', 3, 'saluranmampet.png'),
(28, 'layanan sumur got dan penampungan air', 'melayani layanan sumur got dan penampungan air', '1500000', 4, 'sumurgot.jpg'),
(29, 'layanan desa dan perkampungan', 'melayani layanan desa dan perkampungan', '2500000', 5, 'desa.jpg'),
(30, 'layanan perumahan dan residen', 'melayani layanan perumahan dan residen', '5500000', 6, 'perumahan.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `telepon` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `distrik` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_invoice`, `id_user`, `id_transaksi`, `nama_penerima`, `telepon`, `alamat`, `provinsi`, `distrik`, `type`, `kodepos`, `catatan`) VALUES
(66, 66, 6, 45, 'diki saputra', '082187677', 'jl kiajurum cipoco jaya', 'Banten', 'Serang', 'Kota', 42111, 'datang jam 12.00'),
(67, 67, 6, 0, 'ded', '089797', 'jl kiajurum cipoco jaya', 'Banten', 'Serang', 'Kota', 42111, 'warna merah'),
(68, 68, 6, 0, 'diki bret', '082186099607', 'jl kiajurum cipoco jaya', 'Banten', 'Serang', 'Kota', 42111, 'utyry'),
(69, 69, 6, 0, 'diki bret', '082186099607', 'jl kiajurum cipoco jaya', 'Banten', 'Serang', 'Kota', 42111, 'warna merah'),
(70, 70, 6, 46, 'diki bret', '082186099607', 'jl kiajurum cipoco jaya', 'Banten', 'Serang', 'Kota', 42111, 'warna merah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan_detail`
--

CREATE TABLE `tb_pesanan_detail` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `estimasi_pengiriman` varchar(100) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan_detail`
--

INSERT INTO `tb_pesanan_detail` (`id_pesanan`, `id_barang`, `id_invoice`, `qty`, `price`, `berat`, `kurir`, `paket`, `ongkir`, `estimasi_pengiriman`, `total_bayar`) VALUES
(66, 26, 66, 1, 5000000, '0', '0', '0', '0', '0', 5000000),
(67, 26, 67, 1, 5000000, '0', '0', '0', '0', '0', 5000000),
(68, 25, 68, 1, 2000000, '0', '0', '0', '0', '0', 2000000),
(69, 27, 69, 1, 2000000, '0', '0', '0', '0', '0', 2000000),
(70, 30, 70, 1, 5500000, '0', '0', '0', '0', '0', 5500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `status_code` int(11) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `gross_amount` int(255) NOT NULL,
  `payment_type` varchar(155) NOT NULL,
  `payment_code` int(255) NOT NULL,
  `transaction_time` varchar(255) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `fraud_status` varchar(100) NOT NULL,
  `bill_key` varchar(255) NOT NULL,
  `biller_code` varchar(255) NOT NULL,
  `pdf_url` text NOT NULL,
  `finish_redirect_url` text NOT NULL,
  `bank` varchar(100) NOT NULL,
  `va_number` varchar(100) NOT NULL,
  `bca_va_number` varchar(100) NOT NULL,
  `permata_va_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `status_code`, `status_message`, `transaction_id`, `order_id`, `gross_amount`, `payment_type`, `payment_code`, `transaction_time`, `transaction_status`, `fraud_status`, `bill_key`, `biller_code`, `pdf_url`, `finish_redirect_url`, `bank`, `va_number`, `bca_va_number`, `permata_va_number`) VALUES
(45, 407, 'Success, transaction is found', 'f3e169a4-5604-432a-b673-7c709b0dd2a1', 1229350645, 5000000, 'bank_transfer', 0, '2021-07-16 13:27:21', 'expire', 'accept', '-', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2b90e6aa-1980-4c47-9da9-d5d3538a5bf8/pdf', 'http://example.com?order_id=1229350645&status_code=201&transaction_status=pending', '-', '-', '-', '157006312782105'),
(46, 201, 'Transaksi sedang diproses', 'fc6d7398-8850-4926-808e-be966bdf3b3c', 214821161, 5500000, 'echannel', 0, '2021-08-06 05:38:59', 'pending', 'accept', '766482393320', '70012', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ff5ea030-7d1b-4962-8cad-624aeed50eaa/pdf', 'http://example.com?order_id=214821161&status_code=201&transaction_status=pending', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `gambar`, `password`, `role_id`) VALUES
(1, 'Dodi', 'dodiwkwk@gmail.com', 'canonical_aubergine_hex.png', '$2y$10$Ir9nSql4XXLBDFJ2S8yUtuT2nx1TokAqzHklO1Z94YS1diEzZ9JWy', 1),
(4, 'Ahmad daruin', 'ahmadwkwk@gmail.com', 'default1.jpg', '$2y$10$PZ7HtKN52IjMh1Rz0GOPc.9uTut3nU20UOBA/FJSQcmWf2KgI04Pm', 2),
(6, 'diki', 'diki@gmail.com', 'default.jpg', '$2y$10$gbuJVguB.jGV.srZUFs8xOQMrsnC9o7xrneA3OYpogk61Fp5G15IW', 2),
(7, 'ilham', 'ilham@gmail.com', 'default.jpg', '$2y$10$MokKfbOjesb0x9RNBNlD2uOPGHJ8LVlcrALXUK1HONIF/QdOQGuIm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_jasa`
--
ALTER TABLE `tb_jasa`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_transaksi_2` (`id_transaksi`);

--
-- Indexes for table `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jasa`
--
ALTER TABLE `tb_jasa`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

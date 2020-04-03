-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 08:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pu`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan_layanan`
--

CREATE TABLE `aduan_layanan` (
  `id_aduan` bigint(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aduan_layanan`
--

INSERT INTO `aduan_layanan` (`id_aduan`, `nama_user`, `subjek`, `isi`, `tanggapan`) VALUES
(10, 'Andre', 'Pengiriman', 'Pengiriman barang yang diinginkan tergolong cepat dan tepat alamat', 'Terimakasih'),
(11, 'Gebrina', 'Barang yang dipesan', 'Barang yang ditampilkan sesuai dengan barang yang dikirimkan dan kualitas nya baik', 'Terimakasih Atas Sarannya akan segera kami tangani.'),
(13, 'Evita', 'Puas', 'Barang dikirim sesuai tampilan sistem.', 'Terimakasih sudah berbelanja.'),
(14, 'Dian', 'Produk baik', 'Kualitas Produk yang dikirimkan baik', 'Terimakasihj. Kepuasan anda keberhasilan kami'),
(15, 'Lestari Hasibuan', 'gak sampe', 'gak sampe barangku', 'udah smpe kok\r\n'),
(16, 'Gebrina', 'barang belum nyampe', 'tolong diperhatika', 'sabar ya'),
(17, 'sehat', 'Mantap', 'Nice', 'hehehe'),
(18, 'Dian', 'Pembelian', 'Tidak memuaskan, harga terlalu mahal', 'cari toko lain');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `pesanan_khusus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produk`, `id_user`, `jumlah_produk`, `total_harga`, `pesanan_khusus`) VALUES
(142, 2, 2, 1, 3000000, ''),
(154, 2, 3, 1, 3000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pesanan_khusus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `jumlah`, `pesanan_khusus`) VALUES
(310, 2, 1, ''),
(311, 21, 1, ''),
(312, 21, 1, ''),
(313, 2, 8, ''),
(314, 2, 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama`) VALUES
(1, 'Ulos'),
(2, 'Songket');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kategori` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `kategori`, `harga`, `stock`, `gambar`, `keterangan`) VALUES
(2, 'Ragi Idup', 1, 3000000, 0, 'ragi_idup.jpg', 'Bahan yang digunakan terjamin kualitasnya'),
(13, 'Ulos Sadum Ungu', 1, 250000, 294, 'sadum_ungu.jpg', 'Dibagian sisi dari ulos ini berwarna merah'),
(14, 'Ulos Mangiring Harungguan', 1, 500000, 90, 'mangiring_harungguan.jpg', 'Kualitas bahan yang digunakan terjamin kualitas nya dan tidak mudah luntur'),
(15, 'Ragi Hotang Pintu Batu ', 1, 1750000, 10, 'hotang_pintu_batu.jpg', 'Motif dan pengerjaan dilakukan secara detail untuk mendapatkan hasil yang berkualitas'),
(16, 'Songket Toba', 2, 2000000, 0, 'songket_toba.jpg', 'Menggunakan teknik benang 100 yang masih sangat jarang digunakan dalam pembuatan ulos ataupun songket, dengan teknik ini kualitas bahan lebih kuat dan rapat'),
(17, 'Ragi Idup Benang Emas', 1, 250000, 40, 'ragi_idup_benangemas.jpg', 'Kualitas baik dan terjamin'),
(18, 'Ulos Mangiring Hitam', 1, 320000, 59, 'mangiring_hitam.jpg', 'Kualitas bahan dan tenunan terjamin kualitasnya tidak mudah luntur.'),
(19, 'Ulos Mangiring Hijau', 1, 250000, 10, 'mangiring_hijau.jpg', 'Memiliki warna yang cantik dan enak dilihat'),
(20, 'Selendang Sadum Mini', 1, 250000, 40, 'selendang_sadum.jpg', 'Bahan yang digunakan dijamin baik dan memiliki stok yang banyak'),
(21, 'Songket Toba Merah', 2, 175000, 9, 'songket_merah.jpg', 'Perpaduan warna yang baik dan tidak mudah luntur'),
(22, 'Songket Sadum Merah', 2, 1000000, 8, 'sadum_merah.jpg', 'Warna tidak mudah luntur'),
(23, 'Songket Sadum Biru', 2, 1000000, 100, 'sadum_biru.jpg', 'Warna tidak mudah luntur');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'administrator'),
(2, 'costumer'),
(3, 'petugas_gudang');

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_status` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_status`, `nama`, `keterangan`) VALUES
(1, 'Open', 'Transaksi baru dilakukan, dan permintaan pesanan belum di konfirmasi.'),
(2, 'Dikonfirmasi', 'Request pesanan telah dikonfirmasi'),
(3, 'Packet', 'Pesanan sudah dikonfirmasi dan sedang diproses.'),
(4, 'Selesai', 'Pesanan telah dikirimkan pada penerima dan seudah selesai.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `alamat_tujuan` varchar(50) NOT NULL,
  `identitas_penerima` varchar(30) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `total_pembayaran` double NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `bukti` varchar(300) NOT NULL,
  `status_transaksi` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `alamat_tujuan`, `identitas_penerima`, `nomor_telepon`, `total_pembayaran`, `tanggal_transaksi`, `bukti`, `status_transaksi`) VALUES
(310, 3, 'medan', 'abdi', '081322767999', 3000000, '2017-06-21', 'abdi.jpg', 2),
(311, 3, 'Medan', 'Abdi', '082246458019', 175000, '2017-06-21', 'NULL', 2),
(312, 3, 'Medan', 'Abdi', '081322767999', 175000, '2017-06-21', 'NULL', 1),
(313, 3, 'medan', 'abdi', '081322767999', 15000000, '2017-06-21', 'NULL', 1),
(314, 7, 'medn', 'leni', '0912121121111', 51000000, '2017-06-21', 'evita.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `tanggal_lahir`, `alamat`, `username`, `password`, `email`, `role`) VALUES
(1, 'Abdi Elman Daniel Aruan', '1999-01-29', 'Balige', 'abdi', 'didanautoba', 'abdiaruan99@gmail.com', 1),
(2, 'Leonaldo Jose', '1998-11-25', 'Tarutung', 'leo', 'leo', 'leonaldo@gmail.com', 1),
(3, 'Gebrina', '2017-05-31', 'Tanjung Morawa', 'geb', 'gebrina', 'gebrina@gmail.com', 2),
(6, 'Leni Sihombing', '1997-10-22', 'Lubuk Pakam', 'gudang', 'gudang123', 'lenisihombing@yahoo.com', 3),
(7, 'Evita', '2017-06-07', 'Medan', 'evita', 'sihombing', 'evita@yahoo.com', 2),
(8, 'Dian', '2017-06-14', 'Tarutung', 'dian', 'marbun', 'dian@yahoo.com', 2),
(9, 'Resalda', '0000-00-00', 'Medan', 'resalda', 'resalda123', 'resalda@gmail.com', 2),
(10, 'Christian', '1997-04-23', 'del', 'tian', '1234', 'asdsd@gmail.com', 2),
(11, 'Lestari Hasibuan', '0000-00-00', 'Porsea', 'leha', 'leha123', 'lestarihasibuan5@gmail.co.id', 2),
(12, 'Refly Alexsander ', '1996-10-02', 'Medan', 'refly', 'easy', 'ghjk@gmai.com', 2),
(13, 'Sehat', '1996-10-02', 'hinalang', 'sehatmaru', 'sehatmaru', 'maruzhaky@gmail.com', 2),
(14, 'Mia', '0000-00-00', 'ada', 'miacrnfrska', 'aaaa', 'miacrnfrska@gmail.com', 2),
(15, 'sapto', '0000-00-00', 'dafada', 'sapto', 'depe', 'adfadf@eadfda', 2),
(16, 'danielsibarani', '0000-00-00', 'sibarani', 'daniel', 'daniel', 'daniel@gmail.com', 2),
(17, 'Hans', '0000-00-00', 'Sitoluama', 'Hans', '052', 'hansmarthenyikwa@gmail.com', 2),
(19, 'Lily', '2017-06-09', 'Balige', 'Lily', 'qwerty', 'if415024@itdel', 2),
(20, 'Lamtiur Pardede', '2016-07-06', 'Balige', 'Lamti', 'lamtiur123', 'iss15000@students.del.ac.id', 2),
(21, 'Axel', '1998-06-06', 'jl Di panjaitan', 'axel', 'sianturi', 'sianturiaxel@yahoo.co.id', 2),
(22, 'Ira ', '1997-01-31', 'Laguboti', 'ira', 'gurning', 'ira@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan_layanan`
--
ALTER TABLE `aduan_layanan`
  ADD PRIMARY KEY (`id_aduan`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `idprdkfk` (`id_produk`),
  ADD KEY `userfkcart` (`id_user`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_produk`),
  ADD KEY `transfk` (`id_transaksi`),
  ADD KEY `profk` (`id_produk`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `idtranfk` (`id_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategorifk` (`kategori`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `userfk` (`id_user`),
  ADD KEY `statusfk` (`status_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rolefk` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan_layanan`
--
ALTER TABLE `aduan_layanan`
  MODIFY `id_aduan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_status` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `idprdkfk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `userfkcart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `profk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `transfk` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategorifk` FOREIGN KEY (`kategori`) REFERENCES `kategori_produk` (`id_kategori`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `statusfk` FOREIGN KEY (`status_transaksi`) REFERENCES `status_transaksi` (`id_status`),
  ADD CONSTRAINT `userfk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `rolefk` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

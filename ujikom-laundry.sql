-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2020 pada 18.22
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom-laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL,
  `status_detail` enum('dikeranjang','ditransaksi') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `status_detail`, `id_user`) VALUES
(126, 66, 1, 1, '', 'ditransaksi', 1),
(128, 67, 4, 3, '', 'ditransaksi', 1),
(129, 67, 5, 1, '', 'ditransaksi', 1),
(130, 67, 6, 1, '', 'ditransaksi', 1),
(131, 68, 1, 1, '', 'ditransaksi', 1),
(132, 68, 5, 1, '', 'ditransaksi', 1),
(133, 69, 5, 1, '', 'ditransaksi', 1),
(134, 69, 3, 1, '', 'ditransaksi', 1),
(136, 71, 4, 1, '', 'ditransaksi', 1),
(137, 71, 5, 1, '', 'ditransaksi', 1),
(138, 72, 1, 1, '', 'ditransaksi', 1),
(139, 72, 6, 1, '', 'ditransaksi', 1),
(140, 72, 5, 1, '', 'ditransaksi', 1),
(141, 72, 4, 3, '', 'ditransaksi', 1),
(142, 73, 1, 1, '', 'ditransaksi', 1),
(143, 74, 10, 1, '', 'ditransaksi', 16),
(146, 75, 2, 1, '', 'ditransaksi', 1),
(150, 77, 4, 1, '', 'ditransaksi', 1),
(151, 78, 6, 1, '', 'ditransaksi', 1),
(154, 81, 4, 1, '', 'ditransaksi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(100) NOT NULL,
  `alamat_member` text NOT NULL,
  `jk_member` enum('L','P') NOT NULL,
  `tlp_member` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nm_member`, `alamat_member`, `jk_member`, `tlp_member`, `id_user`) VALUES
(1, 'azril', 'sukabumi', 'L', '08571236472', 1),
(2, 'syarif', 'sinpay', 'L', '08472186371', 1),
(3, 'coy', 'sinpay', 'L', '0897123878123', 1),
(6, 'jey', 'gentong', 'L', '93284293', 1),
(7, 'acul', 'jl pemuda', 'L', '174728374', 1),
(8, 'asep', 'cisaat', 'L', '18923718264', 1),
(9, 'sahril', 'cipoho', 'L', '8724109', 1),
(10, 'damar', 'di deket mesjid', 'L', '8923904235', 1),
(11, 'didim', 'selabintana', 'L', '09728364916', 1),
(12, 'akuy', 'salbin', 'L', '0820394720', 1),
(13, 'dia', 'disana', 'L', '12345678', 1),
(14, 'claire', 'disitu', 'P', '654321', 1),
(15, 'oliv', 'disini', 'P', '98765', 1),
(20, 'oliv', 'disana', 'P', '200', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nm_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `tlp_outlet` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nm_outlet`, `alamat_outlet`, `tlp_outlet`) VALUES
(1, 'outlet1', 'bogor', '085798678572'),
(2, 'outlet 2', 'sukabumi', '081343653476'),
(4, 'outlet 3', 'jakarta', '026683274824');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis_paket` enum('standar','paketan') NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `deskripsi_paket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `jenis_paket`, `nm_paket`, `harga_paket`, `deskripsi_paket`) VALUES
(1, 1, 'paketan', 'A', 15000, 'Paket Pakaian Dengan Berat 2kg'),
(2, 1, 'paketan', 'B', 30000, 'Paket Pakaian Dengan Berat 5kg'),
(3, 1, 'paketan', 'C', 30000, 'Paket Selimut Dengan Berat 5kg'),
(4, 1, 'standar', 'kemeja', 3000, 'kemeja panjang atau pendek satuan'),
(5, 1, 'standar', 'bed cover', 6000, 'bed cover satuan'),
(6, 1, 'standar', 'Selimut', 5000, 'Selimut satuan'),
(10, 2, 'paketan', 'extra setrika', 25000, 'baju kaos per 3kg dengan tambahan extra setrika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `status_transaksi` enum('baru','proses','selesai','diambil') NOT NULL,
  `status_pembayaran` enum('dibayar','dp','belum bayar') NOT NULL,
  `id_user` int(11) NOT NULL,
  `bayar_transaksi` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status_transaksi`, `status_pembayaran`, `id_user`, `bayar_transaksi`, `total_harga`) VALUES
(66, 1, '5e8f53f56c85a', 1, '2020-04-09', '2020-04-11', '2020-04-09 06:57:46', 0, 0, 0, 'diambil', 'dibayar', 1, 20000, 15000),
(67, 1, '5e9054fcb1ce4', 3, '2020-04-10', '2020-04-12', '2020-04-10 01:14:18', 0, 5, 0, 'diambil', 'dibayar', 1, 20000, 19000),
(68, 1, '5e90567e75bd6', 5, '2020-04-10', '2020-04-13', '2020-04-10 01:24:54', 0, 0, 0, 'diambil', 'dibayar', 1, 21000, 21000),
(69, 1, '5e934fd0c797f', 13, '2020-04-12', '2020-04-15', '2020-04-12 07:29:15', 0, 0, 0, 'diambil', 'dibayar', 1, 36000, 36000),
(71, 1, '5e9364f69b49f', 14, '2020-04-12', '2020-04-15', '2020-04-12 08:59:14', 0, 0, 0, 'diambil', 'dibayar', 1, 10000, 9000),
(72, 1, '5e9373a5d11bc', 15, '2020-04-12', '2020-04-15', '2020-04-12 10:02:08', 0, 5, 0, 'diambil', 'dibayar', 1, 35000, 33250),
(73, 1, '5e93c4d7672b4', 6, '2020-04-13', '2020-04-15', '2020-04-13 03:48:18', 0, 0, 0, 'diambil', 'dibayar', 1, 20000, 15000),
(74, 2, '5e94099e2b69b', 20, '2020-04-13', '2020-04-15', '2020-04-13 08:41:52', 0, 0, 0, 'diambil', 'dibayar', 16, 25000, 25000),
(75, 1, '5e98310cdd4da', 12, '2020-04-16', '2020-04-18', '2020-04-16 12:20:02', 0, 0, 0, 'diambil', 'dibayar', 1, 30000, 30000),
(77, 1, '5e9ef9bd3299c', 13, '2020-04-21', '2020-04-25', '2020-04-23 03:10:58', 0, 0, 0, 'diambil', 'dibayar', 1, 3000, 3000),
(78, 1, '5ea194cdc07ee', 14, '2020-04-23', '2020-04-25', '2020-04-23 03:15:04', 0, 0, 0, 'proses', 'dibayar', 1, 5000, 5000),
(81, 1, '5ea199feb615f', 1, '2020-04-23', '2020-04-25', '2020-04-23 03:37:44', 0, 0, 0, 'selesai', 'dibayar', 1, 3000, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `username`, `password`, `id_outlet`, `role`) VALUES
(1, 'kasir', 'kasir', 'kasir', 1, 'kasir'),
(2, 'admin', 'admin', 'admin', 1, 'admin'),
(9, 'owner', 'owner', 'owner', 1, 'owner'),
(16, 'test', 'test', 'test', 2, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode_invoice` (`kode_invoice`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

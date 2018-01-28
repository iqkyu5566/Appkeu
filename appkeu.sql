-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 11:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appkeu`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
`id_d_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_rekanan` int(11) NOT NULL,
  `id_hasil_transaksi` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_transaksi`
--

CREATE TABLE IF NOT EXISTS `hasil_transaksi` (
`id_h_transaksi` int(11) NOT NULL,
  `id_rekanan` int(11) NOT NULL,
  `total_debet` int(11) NOT NULL,
  `total_kredit` int(11) NOT NULL,
  `sisa_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`) VALUES
(15, 'menu management', 'menu', 'fa fa-list-alt', 1, 0),
(18, 'data rekanan', 'rekanan', 'fa fa-list-alt', 1, 20),
(19, 'data transaksi', 'transaksi', 'fa fa-list-alt', 1, 20),
(20, 'data keuangan', 'keuangan', 'fa fa-list-alt', 1, 0),
(23, 'LAPORAN TRANSAKSI', 'hasil_transaksi', 'fa fa-list-alt', 1, 0),
(27, 'CETAK TRANSAKSI', 'Report', 'fa fa-list-alt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekanan`
--

CREATE TABLE IF NOT EXISTS `rekanan` (
`id_rekanan` int(11) NOT NULL,
  `nama_rekanan` varchar(100) NOT NULL,
  `key_person` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_rek` int(11) NOT NULL,
  `no_hp` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekanan`
--

INSERT INTO `rekanan` (`id_rekanan`, `nama_rekanan`, `key_person`, `alamat`, `no_rek`, `no_hp`) VALUES
(1, 'Akeng', '', 'Kendari', 0, '0'),
(2, 'Ashar', '', 'Kendari', 0, '0'),
(3, 'Ami', '', 'Kendari', 0, '0'),
(4, 'CV. Anton Jaya / Erwin', '', 'Kendari', 0, '0'),
(5, 'CV. JIngga / Yuyun', '', 'Kendari', 0, '0'),
(6, 'Nurfuadi / Pak Said', '', 'Kendari', 0, '0'),
(7, 'Aan', '', 'Kendari', 0, '0'),
(8, 'Yunita', '', 'Kendari', 0, '0'),
(9, 'Sinar Jaya', '', 'Kendari', 0, '0'),
(10, 'Hoffmen', '-', 'Kendari', 0, '0'),
(11, 'Atomy', '', 'Kendari', 0, '085299959654 / 085145116479'),
(12, 'Irwan', '', 'Kendari', 0, '0'),
(13, 'Amir', '', 'Kendari', 0, '0'),
(14, 'Handri / Supir JN', '', 'Kendari', 0, '0'),
(15, 'Muhsin', '', 'Kendari', 0, '0'),
(16, 'PT. Permata Teknik', 'Ongky', 'Kendari', 0, '0'),
(17, 'Masjid Abu Bakar', 'Yayat', 'Kendari', 0, '0'),
(18, 'Toto', '', 'Kendari', 0, '0'),
(19, 'Hasruddin', '', 'Kendari', 0, '0'),
(20, 'Rian', '', 'Kendari', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_rekanan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `retasi` int(11) NOT NULL,
  `tonase` int(11) NOT NULL,
  `kubikasi` int(11) NOT NULL,
  `harga_dasar` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_rekanan`, `tanggal`, `deskripsi`, `retasi`, `tonase`, `kubikasi`, `harga_dasar`, `debet`, `kredit`, `keterangan`) VALUES
(1, 20, '2016-12-04', 'SIsa Dana Sebelumnya', 0, 0, 0, 0, 0, 7870000, '-'),
(2, 19, '2016-12-04', 'TRF - Hasruddin', 0, 0, 0, 0, 0, 8500000, '-'),
(3, 19, '2016-12-04', '50 RET PASIR NAMBO - AMP KONDA', 50, 0, 0, 85000, 4250000, 0, '-'),
(4, 19, '2016-12-04', '20 RET PASIR NAMBO - AMP KONDA', 20, 0, 0, 85000, 1700000, 0, '-'),
(5, 19, '2016-12-04', '1 RET KEMARAYA - AMI', 1, 0, 0, 125000, 125000, 0, '-'),
(6, 19, '2016-12-04', '1 RET ADAN - IBU YANA', 1, 0, 0, 85000, 85000, 0, '-'),
(7, 18, '2016-12-06', 'TRF - PAK TOTO / 739401007425538', 0, 0, 0, 0, 0, 40000000, '-'),
(8, 17, '2017-01-17', 'TUNAI -  KANTOR KEMBALIKAN IPED', 0, 0, 0, 0, 0, 4000000, '-'),
(9, 16, '2017-01-05', 'TAGIHAN SUPLIT - THP 1', 172, 0, 1325, 265000, 0, 351318450, '-'),
(10, 16, '2017-01-07', 'TAGIHAN SUPLIT - THP 2', 161, 0, 1255, 265000, 0, 332638600, '-'),
(11, 16, '2017-02-04', 'TAGIHAN SUPLIT - THP 3', 0, 0, 0, 0, 0, 585227963, '-'),
(12, 16, '2017-02-08', 'pembayaran tahap 1 trf rek abi', 0, 0, 0, 0, 361261425, 0, '-'),
(13, 16, '2017-02-08', 'fee pak ongky thp - 1', 0, 0, 1325, 7500, 0, 9942975, '-'),
(14, 15, '2017-02-10', '-', 30, 0, 211, 270000, 0, 57105000, '-'),
(15, 15, '2017-02-11', '-', 49, 0, 343, 270000, 0, 92610000, '-'),
(16, 15, '2017-02-13', '-', 63, 0, 441, 270000, 0, 119070000, '-'),
(17, 15, '2017-02-14', '-', 8, 0, 56, 270000, 0, 15120000, '-'),
(18, 14, '0000-00-00', 'TOTAL ANGSURAN MOTOR', 0, 0, 0, 0, 0, 36000000, '-'),
(19, 14, '2015-10-30', 'ANGSURAN 1', 0, 0, 0, 0, 2400000, 0, '-'),
(20, 14, '2015-11-30', 'ANGSURAN 2', 0, 0, 0, 0, 1400000, 0, '-'),
(21, 14, '2016-02-01', 'ANGSURAN 3', 0, 0, 0, 0, 1000000, 0, '-'),
(22, 14, '2016-03-04', 'ANGSURAN 4', 0, 0, 0, 0, 1000000, 0, '-'),
(23, 14, '2016-04-01', 'ANGSURAN 5', 0, 0, 0, 0, 500000, 0, '-'),
(24, 14, '2016-05-01', 'ANGSURAN 6', 0, 0, 0, 0, 1000000, 0, '0'),
(25, 14, '2016-06-12', 'ANGUSRAN 7', 0, 0, 0, 0, 1000000, 0, '-'),
(26, 14, '2016-07-01', 'ANGUSRAN 8', 0, 0, 0, 0, 1000000, 0, '-'),
(27, 14, '2016-08-01', 'ANGUSRAN 9', 0, 0, 0, 0, 750000, 0, '-'),
(28, 14, '2016-09-01', 'ANGSURAN 10', 0, 0, 0, 0, 500000, 0, '-'),
(29, 14, '2016-10-03', 'ANGSURAN 11', 0, 0, 0, 0, 600000, 0, '-'),
(30, 14, '2016-11-03', 'ANGSURAN 12', 0, 0, 0, 0, 600000, 0, '-'),
(31, 14, '2016-12-01', 'ANGSURAN 13', 0, 0, 0, 0, 600000, 0, '-'),
(32, 14, '2017-01-01', 'ANGSURAN 14', 0, 0, 0, 0, 600000, 0, '-'),
(33, 14, '2017-02-03', 'ANGSURAN 15', 0, 0, 0, 0, 600000, 0, '-'),
(34, 13, '2017-01-04', 'PANJAR-MELALUI AKENG', 0, 0, 0, 0, 0, 100000, '-'),
(35, 13, '2017-01-25', 'PANJAR-MELALUI AKENG', 0, 0, 0, 0, 0, 100000, '-'),
(36, 13, '2017-02-01', 'PANJAR-MELALUI AKENG', 0, 0, 0, 0, 0, 300000, '-'),
(37, 13, '2017-02-01', 'PANJAR-MELALUI ASHAR-BAYAR KOS', 0, 0, 0, 0, 0, 1000000, '-'),
(38, 13, '2017-02-01', 'GAJI', 0, 0, 0, 0, 2102660, 0, '-'),
(39, 13, '2017-02-01', 'TERIMA TUNAI-ASHAR', 0, 0, 0, 0, 0, 602660, '-'),
(40, 12, '2017-01-20', 'PANJAR-MELALUI AKENG', 0, 0, 0, 0, 0, 300000, '-'),
(41, 12, '2017-01-25', 'PANJAR-MELALUI AMI', 0, 0, 0, 0, 0, 150000, '-'),
(42, 12, '2017-02-01', 'PANJAR-MELALUI AKENG/CICILAN MOTOR', 0, 0, 0, 0, 0, 1000000, '-'),
(43, 12, '2017-02-01', 'GAJI JANUARI 2017 + PERAWATAN MOBIL', 0, 0, 0, 0, 1680000, 0, '-'),
(44, 12, '2017-02-03', 'BAYAR GAJI MELALUI REKENING ASHAR', 0, 0, 0, 0, 0, 230000, '-'),
(45, 11, '2017-01-13', 'PANJAR - TUNAI MELALUI AMI HAERUN', 0, 0, 0, 0, 0, 20000000, '-'),
(46, 11, '2017-01-15', '42 NOTA - MUATAN KEBI - JUMALI', 42, 0, 0, 220000, 9240000, 0, '-'),
(47, 11, '2017-01-18', '32 NOTA - MUATAN KEBI - JUMALI', 32, 0, 0, 220000, 7040000, 0, '-'),
(48, 11, '2017-02-04', 'TUNAI - MELALUI AMI', 0, 0, 0, 0, 3720000, 0, '-'),
(49, 10, '2017-01-13', 'SISA DANA SEBELUMNYA - KONTRAK 1', 0, 0, 0, 0, 0, 37930000, '-'),
(50, 10, '2017-01-19', 'TRF. REK - HOFFMEN 493101026651537', 0, 0, 0, 0, 0, 132070000, '-'),
(51, 10, '2017-02-01', 'PENGAMBILAN SUPLIT HOFFMEN PANTAI KE - 1', 94, 0, 7, 170000, 111860000, 0, '-'),
(52, 10, '2017-02-02', 'PENGAMBILAN SUPLIT HOFFMEN PANTAI KE - 2', 89, 0, 7, 170000, 105910000, 0, '-'),
(53, 10, '2017-02-03', 'PENGAMBILAN SUPLIT HOFFMEN PANTAI KE - 3', 77, 0, 7, 170000, 91630000, 0, '-'),
(54, 10, '2017-02-04', 'PENGAMBILAN SUPLIT HOFFMEN PANTAI KE - 4', 27, 0, 7, 170000, 32130000, 0, '-'),
(55, 10, '2017-01-23', 'MUATAN BATU GELONDONG - HOFFMEN ABELI', 109, 0, 5, 480000, 0, 52320000, '-'),
(56, 10, '2017-01-24', 'MUATAN BATU GELONDONG - HOFFMEN ABELI', 78, 0, 5, 480000, 0, 37440000, '-'),
(57, 10, '2017-01-25', 'JANEETA - GELONDONGAN HOFFMEN PANTAI', 2, 0, 5, 320000, 0, 640000, '-'),
(58, 10, '2017-01-30', 'JANEETA - GELONDONGAN HOFFMEN PANTAI', 36, 0, 5, 320000, 0, 11520000, '-'),
(59, 10, '2017-01-18', 'AMSAR - HOFFMEN PANTAI', 1, 0, 5, 320000, 0, 320000, '-'),
(60, 10, '2017-01-24', 'AMSAR - HOFFMEN PANTAI', 2, 0, 5, 320000, 0, 640000, '-'),
(61, 10, '2017-01-25', 'AMSAR - HOFFMEN PANTAI', 8, 0, 5, 320000, 0, 2560000, '-'),
(62, 10, '2017-01-30', 'AMSAR - HOFFMEN PANTAI', 38, 0, 5, 320000, 0, 12160000, '-'),
(63, 10, '2017-01-31', 'AMSAR - HOFFMEN PANTAI', 13, 0, 5, 320000, 0, 4160000, '-'),
(64, 10, '0000-00-00', 'TRF FEE - HOFFMEN - B RINA', 0, 0, 0, 0, 0, 2870000, '-'),
(65, 10, '2017-02-01', '13 ret hoffmen pantai', 13, 0, 0, 320000, 0, 4160000, '-'),
(66, 10, '2017-02-02', '81 ret hoffmen pantai', 81, 0, 0, 320000, 0, 25920000, '-'),
(67, 10, '2017-02-03', '5 ret hoffmen pantai', 5, 0, 0, 320000, 0, 1600000, '-'),
(68, 10, '2017-02-04', '23 ret hoffmen pantai', 28, 0, 0, 320000, 0, 8960000, '-'),
(69, 10, '2017-02-06', '23 ret hoffmen pantai', 23, 0, 0, 320000, 0, 7360000, '-'),
(70, 10, '2017-02-08', '21 ret hoffmen pantai', 21, 0, 5, 320000, 0, 6720000, '-'),
(71, 10, '2017-02-10', 'kurangi 1 ret /muatan tgl 30/01 lebih', 0, 0, 1, 320000, 320000, 0, '-'),
(72, 10, '2017-02-10', 'pot 1.5 kubik 21 ret/080217', 0, 0, 1, 64000, 96000, 0, '-'),
(73, 10, '2017-02-10', 'trf - persiapan 1000 kubik / hasdar', 0, 0, 0, 0, 0, 115696000, '-'),
(74, 9, '2017-01-17', '467 NOTA SINAR JAYA', 467, 0, 0, 310000, 0, 144770000, '-'),
(75, 9, '2017-01-24', 'pembayaran 235 ret tunai - pak yuyun', 235, 0, 0, 310000, 72850000, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'z3X1z7vxV/vL9AylCapsJe', 1268889823, 1517120588, 1, 'Janeta', 'Group', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
 ADD PRIMARY KEY (`id_d_transaksi`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_transaksi`
--
ALTER TABLE `hasil_transaksi`
 ADD PRIMARY KEY (`id_h_transaksi`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekanan`
--
ALTER TABLE `rekanan`
 ADD PRIMARY KEY (`id_rekanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
MODIFY `id_d_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hasil_transaksi`
--
ALTER TABLE `hasil_transaksi`
MODIFY `id_h_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rekanan`
--
ALTER TABLE `rekanan`
MODIFY `id_rekanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

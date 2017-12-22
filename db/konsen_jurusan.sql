-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 08:18 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konsen_jurusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ipk` varchar(4) NOT NULL,
  `ttl` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `ipk`, `ttl`, `gender`, `telepon`, `alamat`) VALUES
('061430100043', 'Seria', '3.39', 'Talang Balai, 1996-02-25', 'Perempuan', '085764745021', '<p>Talang Balai, Ogan Ilir</p>\r\n'),
('061530100017', 'Puji Fitrianti', '3.17', 'Palembang, 1998-01-31', 'Perempuan', '085788111079', '<p>palembang</p>\r\n'),
('061530100029', 'Eka Widyawati', '3.78', 'Palembang, 1998-04-21', 'Perempuan', '081378564920', '<p>Bukit Besar Palembang</p>\r\n'),
('092', 'vinna', '3.40', 'Palembang, 9 Juli 1995', 'Perempuan', '09657', '<p>palembang</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mk` int(5) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mk`, `kode_mk`, `nama_mk`, `sks`) VALUES
(2, 'TS131103', 'Fisika Terapan', '2'),
(7, 'TS131215', 'Ilmu Ukur Tanah 1', '3'),
(8, 'TS131205', 'Matematika Terapan 2', '2'),
(9, 'TS131209', 'Mekanika Rekayasa 2', '3'),
(10, 'TS131211', 'Hidrolika 1', '2'),
(11, 'TS131212', 'Mekanika Tanah 1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai_angka` varchar(100) NOT NULL,
  `nilai_huruf` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai_angka`, `nilai_huruf`) VALUES
(1, '0', 'E'),
(2, '0.5', 'E'),
(3, '1', 'E'),
(4, '1.5', 'E'),
(5, '2', 'E'),
(6, '2.5', 'E'),
(7, '3', 'E'),
(8, '3.5', 'E'),
(9, '4', 'E'),
(10, '4.5', 'E'),
(11, '5', 'E'),
(12, '5.5', 'E'),
(13, '6', 'E'),
(14, '6.5', 'E'),
(15, '7', 'E'),
(16, '7.5', 'E'),
(17, '8', 'E'),
(18, '8.5', 'E'),
(19, '9', 'E'),
(20, '9.5', 'E'),
(21, '10', 'E'),
(22, '10.5', 'E'),
(23, '11', 'E'),
(24, '11.5', 'E'),
(25, '12', 'E'),
(26, '12.5', 'E'),
(27, '13', 'E'),
(28, '13.5', 'E'),
(29, '14', 'E'),
(30, '14.5', 'E'),
(31, '15', 'E'),
(32, '15.5', 'E'),
(33, '16', 'E'),
(34, '16.5', 'E'),
(35, '17', 'E'),
(36, '17.5', 'E'),
(37, '18', 'E'),
(38, '18.5', 'E'),
(39, '19', 'E'),
(40, '19.5', 'E'),
(41, '20', 'E'),
(42, '20.5', 'E'),
(43, '21', 'E'),
(44, '21.5', 'E'),
(45, '22', 'E'),
(46, '22.5', 'E'),
(47, '23', 'E'),
(48, '23.5', 'E'),
(49, '24', 'E'),
(50, '24.5', 'E'),
(51, '25', 'E'),
(52, '25.5', 'E'),
(53, '26', 'E'),
(54, '26.5', 'E'),
(55, '27', 'E'),
(56, '27.5', 'E'),
(57, '28', 'E'),
(58, '28.5', 'E'),
(59, '29', 'E'),
(60, '29.5', 'E'),
(61, '30', 'E'),
(62, '30.5', 'E'),
(63, '31', 'E'),
(64, '31.5', 'E'),
(65, '32', 'E'),
(66, '32.5', 'E'),
(67, '33', 'E'),
(68, '33.5', 'E'),
(69, '34', 'E'),
(70, '34.5', 'E'),
(71, '35', 'E'),
(72, '35.5', 'E'),
(73, '36', 'E'),
(74, '36.5', 'E'),
(75, '37', 'E'),
(76, '37.5', 'E'),
(77, '38', 'E'),
(78, '38.5', 'E'),
(79, '39', 'E'),
(80, '39.5', 'E'),
(81, '40', 'D'),
(82, '40.5', 'D'),
(83, '41', 'D'),
(84, '41.5', 'D'),
(85, '42', 'D'),
(86, '42.5', 'D'),
(87, '43', 'D'),
(88, '43.5', 'D'),
(89, '44', 'D'),
(90, '44.5', 'D'),
(91, '45', 'D'),
(92, '45.5', 'D'),
(93, '46', 'D'),
(94, '46.5', 'D'),
(95, '47', 'D'),
(96, '47.5', 'D'),
(97, '48', 'D'),
(98, '48.5', 'D'),
(99, '49', 'D'),
(100, '49.5', 'D'),
(101, '50', 'D'),
(102, '50.5', 'D'),
(103, '51', 'D'),
(104, '51.5', 'D'),
(105, '52', 'D'),
(106, '52.5', 'D'),
(107, '53', 'D'),
(108, '53.5', 'D'),
(109, '54', 'C'),
(110, '54.5', 'C'),
(111, '55', 'C'),
(112, '55.5', 'C'),
(113, '56', 'C'),
(114, '56.5', 'C'),
(115, '57', 'C'),
(116, '57.5', 'C'),
(117, '58', 'C'),
(118, '58.5', 'C'),
(119, '59', 'C'),
(120, '59.5', 'C'),
(121, '60', 'C'),
(122, '60.5', 'C'),
(123, '61', 'C'),
(124, '61.5', 'C'),
(125, '62', 'C'),
(126, '62.5', 'C'),
(127, '63', 'C'),
(128, '63.5', 'C'),
(129, '64', 'C'),
(130, '64.5', 'C'),
(131, '65', 'C'),
(132, '65.5', 'C'),
(133, '66', 'B'),
(134, '66.5', 'B'),
(135, '67', 'B'),
(136, '67.5', 'B'),
(137, '68', 'B'),
(138, '68.5', 'B'),
(139, '69', 'B'),
(140, '69.5', 'B'),
(141, '70', 'B'),
(142, '70.5', 'B'),
(143, '71', 'B'),
(144, '71.5', 'B'),
(145, '72', 'B'),
(146, '72.5', 'B'),
(147, '73', 'B'),
(148, '73.5', 'B'),
(149, '74', 'B'),
(150, '74.5', 'B'),
(151, '75', 'B'),
(152, '75.5', 'B'),
(153, '76', 'B'),
(154, '76.5', 'B'),
(155, '77', 'B'),
(156, '77.5', 'B'),
(157, '78', 'B'),
(158, '78.5', 'B'),
(159, '79', 'B'),
(160, '79.5', 'B'),
(161, '80', 'A'),
(162, '80.5', 'A'),
(163, '81', 'A'),
(164, '81.5', 'A'),
(165, '82', 'A'),
(166, '82.5', 'A'),
(167, '83', 'A'),
(168, '83.5', 'A'),
(169, '84', 'A'),
(170, '84.5', 'A'),
(171, '85', 'A'),
(172, '85.5', 'A'),
(173, '86', 'A'),
(174, '86.5', 'A'),
(175, '87', 'A'),
(176, '87.5', 'A'),
(177, '88', 'A'),
(178, '88.5', 'A'),
(179, '89', 'A'),
(180, '89.5', 'A'),
(181, '90', 'A'),
(182, '90.5', 'A'),
(183, '91', 'A'),
(184, '91.5', 'A'),
(185, '92', 'A'),
(186, '92.5', 'A'),
(187, '93', 'A'),
(188, '93.5', 'A'),
(189, '94', 'A'),
(190, '94.5', 'A'),
(191, '95', 'A'),
(192, '95.5', 'A'),
(193, '96', 'A'),
(194, '96.5', 'A'),
(195, '97', 'A'),
(196, '97.5', 'A'),
(197, '98', 'A'),
(198, '98.5', 'A'),
(199, '99', 'A'),
(200, '99.5', 'A'),
(201, '100', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_jurusan`
--

CREATE TABLE `nilai_jurusan` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `gedung` double NOT NULL,
  `air` double NOT NULL,
  `transportasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_jurusan`
--

INSERT INTO `nilai_jurusan` (`id`, `nim`, `gedung`, `air`, `transportasi`) VALUES
(1, '061530100017', 66.75, 77.25, 77.75),
(2, '061530100029', 81.25, 80.25, 89),
(3, '061430100043', 81, 81, 80),
(4, '092', 90, 87, 76);

-- --------------------------------------------------------

--
-- Table structure for table `pembagian_konsentrasi`
--

CREATE TABLE `pembagian_konsentrasi` (
  `id_pembagian_konsentrasi` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `rekomen_sugeno` varchar(50) NOT NULL,
  `rekomen_tsukamoto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `userfile` varchar(100) NOT NULL DEFAULT 'no_photo.jpg',
  `password` varchar(50) NOT NULL,
  `hak_akses` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `userfile`, `password`, `hak_akses`) VALUES
(1, 'admin', 'Pengelola Jurusan', 'Laki-laki', 'PC  KOmputer', '20-01-2017', 'no_photo.jpg', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'sekjur', 'Sekretaris Jurusan', 'Laki-laki', 'Palembang', '20-01-2017', 'no_photo.jpg', 'd3b55b8b529ac8fd5c1ef9b43d21f0c1', 2),
(3, 'kajur', 'Ketua Jurusan', 'Laki-laki', 'Palembang', '20-01-2017', 'no_photo.jpg', 'fa2a64d863ff8a83fee0b8fafd292d26', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `nilai_angka` varchar(4) NOT NULL,
  `nilai_huruf` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `nim`, `kode_mk`, `nilai_angka`, `nilai_huruf`) VALUES
(57, '061530100017', 'TS131103', '87.5', 'A'),
(58, '061530100017', 'TS131215', '75.5', 'B'),
(59, '061530100017', 'TS131205', '80', 'A'),
(60, '061530100017', 'TS131209', '53.5', 'C'),
(61, '061530100017', 'TS131211', '67', 'B'),
(62, '061530100017', 'TS131212', '80', 'A'),
(67, '061430100043', 'TS131103', '82', 'A'),
(68, '061430100043', 'TS131215', '83', 'A'),
(69, '061430100043', 'TS131205', '85', 'A'),
(71, '061430100043', 'TS131211', '86', 'A'),
(72, '061430100043', 'TS131209', '63', 'C'),
(73, '061430100043', 'TS131212', '77', 'B'),
(74, '061530100029', 'TS131103', '71.5', 'B'),
(75, '061530100029', 'TS131215', '88', 'A'),
(76, '061530100029', 'TS131205', '82.5', 'A'),
(77, '061530100029', 'TS131209', '80', 'A'),
(78, '061530100029', 'TS131211', '89', 'A'),
(79, '061530100029', 'TS131212', '90', 'A'),
(80, '092', 'TS131103', '78', 'B'),
(81, '092', 'TS131215', '80', 'A'),
(82, '092', 'TS131103', '10', 'E'),
(83, '092', 'TS131205', '80', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mk`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nilai_huruf` (`nilai_huruf`);

--
-- Indexes for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `pembagian_konsentrasi`
--
ALTER TABLE `pembagian_konsentrasi`
  ADD PRIMARY KEY (`id_pembagian_konsentrasi`),
  ADD KEY `id_penilaian` (`id_penilaian`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_mk` (`kode_mk`),
  ADD KEY `nilai_angka` (`nilai_angka`),
  ADD KEY `nilai_huruf` (`nilai_huruf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembagian_konsentrasi`
--
ALTER TABLE `pembagian_konsentrasi`
  MODIFY `id_pembagian_konsentrasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_jurusan`
--
ALTER TABLE `nilai_jurusan`
  ADD CONSTRAINT `nilai_jurusan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `pembagian_konsentrasi`
--
ALTER TABLE `pembagian_konsentrasi`
  ADD CONSTRAINT `pembagian_konsentrasi_ibfk_1` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`),
  ADD CONSTRAINT `penilaian_ibfk_5` FOREIGN KEY (`nilai_huruf`) REFERENCES `nilai` (`nilai_huruf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

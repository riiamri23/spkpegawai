-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2021 at 03:41 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `nama_lengkap`, `jabatan`, `status`, `id`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'ya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_batch`
--

CREATE TABLE `skripsi_batch` (
  `id` int(11) NOT NULL,
  `batch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_batch`
--

INSERT INTO `skripsi_batch` (`id`, `batch`) VALUES
(9, 'IT DEVELOPER'),
(10, 'Operator mesin'),
(11, 'Pramuniaga indomarco');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_bobotahp`
--

CREATE TABLE `skripsi_bobotahp` (
  `id` int(11) NOT NULL DEFAULT 0,
  `kode` varchar(3) CHARACTER SET latin1 NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_bobotahp`
--

INSERT INTO `skripsi_bobotahp` (`id`, `kode`, `bobot`) VALUES
(0, 'c1', 0.05),
(0, 'c2', 0.27),
(0, 'c3', 0.1),
(0, 'c4', 0.41),
(0, 'c5', 0.13),
(0, 'c6', 0.04);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_calon_pegawai`
--

CREATE TABLE `skripsi_calon_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `C1` decimal(10,2) DEFAULT NULL,
  `C2` decimal(10,2) DEFAULT NULL,
  `C3` decimal(10,2) DEFAULT NULL,
  `C4` decimal(10,2) DEFAULT NULL,
  `C5` decimal(10,2) DEFAULT NULL,
  `C6` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi_calon_pegawai`
--

INSERT INTO `skripsi_calon_pegawai` (`id`, `nama`, `batch`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`) VALUES
(26, 'Calon 1', 9, '0.75', '1.00', '1.00', '1.00', '0.75', '0.50'),
(27, 'Calon 2', 9, '1.00', '0.75', '0.75', '0.25', '1.00', '0.75'),
(28, 'Calon 3', 9, '1.00', '0.25', '0.50', '0.25', '0.50', '1.00'),
(29, 'Calon 4', 9, '1.00', '0.25', '0.25', '1.00', '0.50', '0.75'),
(30, 'Calon 5', 9, '1.00', '0.75', '1.00', '1.00', '0.75', '0.50'),
(31, 'Jessy', 10, '0.50', '0.75', '0.50', '0.25', '0.75', '0.75'),
(32, 'Indigo Nugra', 10, '0.50', '0.75', '0.75', '1.00', '1.00', '1.00'),
(33, 'Teresia', 10, '0.75', '0.50', '0.75', '1.00', '0.75', '0.75'),
(34, 'syaeful amri', 10, '1.00', '1.00', '1.00', '1.00', '1.00', '1.00'),
(35, 'Indigo Nugra', 11, '1.00', '0.75', '0.75', '1.00', '1.00', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_cpegawai_kriteria`
--

CREATE TABLE `skripsi_cpegawai_kriteria` (
  `id` int(11) NOT NULL,
  `id_cpegawai` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_hasiliterasi`
--

CREATE TABLE `skripsi_hasiliterasi` (
  `id` int(11) NOT NULL DEFAULT 0,
  `kriteria` varchar(25) CHARACTER SET latin1 NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `c4` double NOT NULL,
  `c5` double NOT NULL,
  `c6` double NOT NULL,
  `hasil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_hasiliterasi`
--

INSERT INTO `skripsi_hasiliterasi` (`id`, `kriteria`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `hasil`) VALUES
(0, 'c1', 6, 1.5604329004329, 3.3933333333333, 0.8985, 3.01, 6.92, 21.782266233766),
(0, 'c2', 45.410909090909, 6, 18.453333333333, 4.66, 12.72, 43.65, 130.89424242424),
(0, 'c3', 16.515151515152, 3.1028138528138, 6, 2.5325, 5.4, 16, 49.550465367965),
(0, 'c4', 60.272727272727, 10.441558441558, 32.587878787879, 6, 23.660909090909, 67.212121212121, 200.17519480519),
(0, 'c5', 22.193939393939, 3.1017316017316, 8.0727272727272, 2.5675757575757, 6, 20.363636363636, 62.29961038961),
(0, 'c6', 5.795670995671, 1.3084415584415, 2.7380952380952, 0.83047619047619, 2.4252380952381, 6, 19.097922077922);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_hasil_normalisasi`
--

CREATE TABLE `skripsi_hasil_normalisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `C1` float NOT NULL,
  `C2` float NOT NULL,
  `C3` float NOT NULL,
  `C4` float NOT NULL,
  `C5` float NOT NULL,
  `C6` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi_hasil_normalisasi`
--

INSERT INTO `skripsi_hasil_normalisasi` (`id`, `nama`, `batch`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`) VALUES
(22, 'test', 8, 0.75, 1, 1, 0.25, 1, 1),
(23, 'Syaeful Amri', 8, 0.75, 0.75, 1, 1, 1, 1),
(24, 'Hello', 8, 1, 0.75, 0.25, 1, 1, 1),
(25, 'testing', 8, 0.75, 1, 1, 1, 0.75, 0.75),
(26, 'Calon 1', 9, 1, 1, 1, 1, 0.75, 0.5),
(27, 'Calon 2', 9, 0.75, 0.75, 0.75, 0.25, 1, 0.75),
(28, 'Calon 3', 9, 0.75, 0.25, 0.5, 0.25, 0.5, 1),
(29, 'Calon 4', 9, 0.75, 0.25, 0.25, 1, 0.5, 0.75),
(30, 'Calon 5', 9, 0.75, 0.75, 1, 1, 0.75, 0.5),
(31, 'Jessy', 10, 1, 0.75, 0.5, 0.25, 0.75, 0.75),
(32, 'Indigo Nugra', 10, 1, 0.75, 0.75, 1, 1, 1),
(33, 'Teresia', 10, 0.666667, 0.5, 0.75, 1, 0.75, 0.75),
(34, 'syaeful amri', 10, 0.5, 1, 1, 1, 1, 1),
(35, 'Indigo Nugra', 11, 0.75, 0.75, 0.75, 1, 1, 1),
(36, 'test', 11, 1, 1, 1, 1, 1, 1),
(37, 'test', 11, 0.75, 0.5, 1, 1, 0.5, 0.5),
(38, 'test', 12, 0.5, 1, 1, 1, 1, 1),
(39, 'hello', 12, 1, 0.75, 1, 1, 1, 0.75),
(40, 'hayo', 12, 0.5, 0.75, 0.75, 1, 0.666667, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_hasil_perangkingan`
--

CREATE TABLE `skripsi_hasil_perangkingan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hasil` float DEFAULT NULL,
  `rangking` int(11) DEFAULT NULL,
  `batch` int(4) NOT NULL,
  `C1` float NOT NULL,
  `C2` float NOT NULL,
  `C3` float NOT NULL,
  `C4` float NOT NULL,
  `C5` float NOT NULL,
  `C6` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi_hasil_perangkingan`
--

INSERT INTO `skripsi_hasil_perangkingan` (`id`, `nama`, `hasil`, `rangking`, `batch`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`) VALUES
(26, 'Calon 1', 0.9475, 1, 9, 1, 1, 1, 1, 0.75, 0.5),
(27, 'Calon 2', 0.5775, 4, 9, 0.75, 0.75, 0.75, 0.25, 1, 0.75),
(28, 'Calon 3', 0.3625, 5, 9, 0.75, 0.25, 0.5, 0.25, 0.5, 1),
(29, 'Calon 4', 0.635, 3, 9, 0.75, 0.25, 0.25, 1, 0.5, 0.75),
(30, 'Calon 5', 0.8675, 2, 9, 0.75, 0.75, 1, 1, 0.75, 0.5),
(31, 'Jessy', 0.5325, 4, 10, 1, 0.75, 0.5, 0.25, 0.75, 0.75),
(32, 'Indigo Nugra', 0.9075, 2, 10, 1, 0.75, 0.75, 1, 1, 1),
(33, 'Teresia', 0.780833, 3, 10, 0.666667, 0.5, 0.75, 1, 0.75, 0.75),
(34, 'syaeful amri', 0.975, 1, 10, 0.5, 1, 1, 1, 1, 1),
(35, 'Indigo Nugra', 0.895, 2, 11, 0.75, 0.75, 0.75, 1, 1, 1),
(36, 'test', 1, 1, 11, 1, 1, 1, 1, 1, 1),
(37, 'test', 0.7675, 3, 11, 0.75, 0.5, 1, 1, 0.5, 0.5),
(38, 'test', 0.975, 1, 12, 0.5, 1, 1, 1, 1, 1),
(39, 'hello', 0.9225, 2, 12, 1, 0.75, 1, 1, 1, 0.75),
(40, 'hayo', 0.819167, 3, 12, 0.5, 0.75, 0.75, 1, 0.666667, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_kriteria`
--

CREATE TABLE `skripsi_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(255) DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_kriteria`
--

INSERT INTO `skripsi_kriteria` (`id`, `kriteria`, `jenis`) VALUES
(1, 'Usia', 'cost'),
(2, 'Pengalaman Kerja', 'benefit'),
(3, 'Pendidikan Terakhir', 'benefit'),
(4, 'Sertifikat Keahlian', 'benefit'),
(5, 'Wawancara', 'benefit'),
(6, 'Penampilan', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_kriteria_terpilih`
--

CREATE TABLE `skripsi_kriteria_terpilih` (
  `id` char(4) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_kriteria_terpilih`
--

INSERT INTO `skripsi_kriteria_terpilih` (`id`, `id_kriteria`) VALUES
('C1', 1),
('C2', 2),
('C3', 3),
('C4', 4),
('C5', 5),
('C6', 6);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_nilaikriteria`
--

CREATE TABLE `skripsi_nilaikriteria` (
  `id` int(11) NOT NULL DEFAULT 0,
  `c1_1` decimal(10,2) DEFAULT NULL,
  `c1_2` decimal(10,2) DEFAULT NULL,
  `c1_3` decimal(10,2) DEFAULT NULL,
  `c1_4` decimal(10,2) DEFAULT NULL,
  `c2_1` decimal(10,2) DEFAULT NULL,
  `c2_2` decimal(10,2) DEFAULT NULL,
  `c2_3` decimal(10,2) DEFAULT NULL,
  `c3_1` decimal(10,2) DEFAULT NULL,
  `c3_2` decimal(10,2) DEFAULT NULL,
  `c4_1` decimal(10,2) DEFAULT NULL,
  `c1_5` decimal(10,2) DEFAULT NULL,
  `c2_4` decimal(10,2) DEFAULT NULL,
  `c3_3` decimal(10,2) DEFAULT NULL,
  `c4_2` decimal(10,2) DEFAULT NULL,
  `c5_1` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_nilaikriteria`
--

INSERT INTO `skripsi_nilaikriteria` (`id`, `c1_1`, `c1_2`, `c1_3`, `c1_4`, `c2_1`, `c2_2`, `c2_3`, `c3_1`, `c3_2`, `c4_1`, `c1_5`, `c2_4`, `c3_3`, `c4_2`, `c5_1`) VALUES
(1, '0.25', '0.20', '0.25', '0.33', '4.00', '0.33', '3.00', '0.25', '0.50', '5.00', '1.00', '7.00', '3.00', '5.00', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_perbandingankriteria`
--

CREATE TABLE `skripsi_perbandingankriteria` (
  `id` int(11) NOT NULL DEFAULT 0,
  `kriteria` varchar(25) CHARACTER SET latin1 NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `c4` double NOT NULL,
  `c5` double NOT NULL,
  `c6` double(22,2) NOT NULL,
  `bobot` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_perbandingankriteria`
--

INSERT INTO `skripsi_perbandingankriteria` (`id`, `kriteria`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `bobot`) VALUES
(0, 'c1', 1, 0.25, 0.2, 0.25, 0.33, 1.00, '0.00'),
(0, 'c2', 4, 1, 4, 0.33, 3, 7.00, '0.00'),
(0, 'c3', 5, 0.25, 1, 0.25, 0.5, 3.00, '0.00'),
(0, 'c4', 4, 3.030303030303, 4, 1, 5, 5.00, '0.00'),
(0, 'c5', 3.030303030303, 0.33333333333333, 2, 0.2, 1, 4.00, '0.00'),
(0, 'c6', 1, 0.14285714285714, 0.33333333333333, 0.2, 0.25, 1.00, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_subkriteria`
--

CREATE TABLE `skripsi_subkriteria` (
  `id` int(11) NOT NULL,
  `subkriteria` varchar(255) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi_subkriteria`
--

INSERT INTO `skripsi_subkriteria` (`id`, `subkriteria`, `id_kriteria`, `value`) VALUES
(1, '18-23 Tahun', 1, '1.00'),
(2, '24-27 Tahun', 1, '0.75'),
(3, '28-34 Tahun', 1, '0.50'),
(4, '35 Tahun', 1, '0.25'),
(10, 'Sangat Baik', 6, '1.00'),
(11, 'Baik', 6, '0.75'),
(12, 'Buruk', 6, '0.50'),
(14, 'Sangat Baik', 5, '1.00'),
(15, 'Baik', 5, '0.75'),
(16, 'Buruk', 5, '0.50'),
(17, 'Sangat Buruk', 5, '0.25'),
(18, 'Ada', 4, '1.00'),
(19, 'Tidak Ada', 4, '0.25'),
(20, 'S1', 3, '1.00'),
(21, 'D3', 3, '0.75'),
(22, 'D1/D2', 3, '0.50'),
(23, 'SMA/SMK', 3, '0.25'),
(24, '> 5 - 4 Tahun', 2, '1.00'),
(25, '3 - 2 Tahun', 2, '0.75'),
(26, '1 Tahun', 2, '0.50'),
(27, 'Tidak ada', 2, '0.25'),
(28, 'Sangat Buruk ', 6, '0.25'),
(29, 'terbaik', 10, '1.00'),
(30, 'baik doang', 10, '0.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `skripsi_batch`
--
ALTER TABLE `skripsi_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_calon_pegawai`
--
ALTER TABLE `skripsi_calon_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_cpegawai_kriteria`
--
ALTER TABLE `skripsi_cpegawai_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_hasil_normalisasi`
--
ALTER TABLE `skripsi_hasil_normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_hasil_perangkingan`
--
ALTER TABLE `skripsi_hasil_perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_kriteria`
--
ALTER TABLE `skripsi_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_kriteria_terpilih`
--
ALTER TABLE `skripsi_kriteria_terpilih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skripsi_subkriteria`
--
ALTER TABLE `skripsi_subkriteria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skripsi_batch`
--
ALTER TABLE `skripsi_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `skripsi_calon_pegawai`
--
ALTER TABLE `skripsi_calon_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `skripsi_cpegawai_kriteria`
--
ALTER TABLE `skripsi_cpegawai_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skripsi_hasil_normalisasi`
--
ALTER TABLE `skripsi_hasil_normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1992;

--
-- AUTO_INCREMENT for table `skripsi_hasil_perangkingan`
--
ALTER TABLE `skripsi_hasil_perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1992;

--
-- AUTO_INCREMENT for table `skripsi_kriteria`
--
ALTER TABLE `skripsi_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skripsi_subkriteria`
--
ALTER TABLE `skripsi_subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

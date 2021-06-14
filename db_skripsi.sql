-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2021 at 03:44 PM
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
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch`) VALUES
(1, 'batch 1 penerimaan karyawan IT Developer');

-- --------------------------------------------------------

--
-- Table structure for table `calon_pegawai`
--

CREATE TABLE `calon_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `wawancara` int(11) DEFAULT NULL,
  `pendidikan` int(11) DEFAULT NULL,
  `pengalaman` int(11) DEFAULT NULL,
  `karakter` int(11) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_pegawai`
--

INSERT INTO `calon_pegawai` (`id`, `nama`, `batch`, `wawancara`, `pendidikan`, `pengalaman`, `karakter`, `gaji`) VALUES
(1, 'Syaeful Amri', 1, 1, 4, 7, 9, 12),
(2, 'Yudi Herdiana', 1, 2, 6, 8, 10, 11),
(3, 'Indigo Nugra', 1, 1, 6, 7, 9, 11),
(4, 'Hesdin Rudinar', 1, 2, 5, 8, 10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `calon_penerima`
--

CREATE TABLE `calon_penerima` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `wawancara` enum('sangat baik','baik','kurang baik') NOT NULL,
  `pendidikan` enum('sd','smp','sma/smk','d3','s1') NOT NULL,
  `pengalaman` enum('sangat berpengalaman','berpengalaman','kurang berpengalaman') NOT NULL,
  `karakter` enum('sangat aktif','aktif','kurang aktif') NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_penerima`
--

INSERT INTO `calon_penerima` (`id`, `nama`, `batch`, `wawancara`, `pendidikan`, `pengalaman`, `karakter`, `gaji`) VALUES
(1, 'Syaeful amri', 1, 'sangat baik', 's1', 'berpengalaman', 'kurang aktif', 6000000),
(2, 'Yudi Herdiana', 1, 'baik', 's1', 'sangat berpengalaman', 'sangat aktif', 7000000),
(5, 'Indigo Nugra', 1, 'sangat baik', 'sd', 'sangat berpengalaman', 'sangat aktif', 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `calon_penerima_backup`
--

CREATE TABLE `calon_penerima_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nis` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `jurusan` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nilai_rata` float NOT NULL,
  `penghasilan_ortu` int(30) NOT NULL,
  `tanggungan_ortu` int(11) NOT NULL,
  `pekerjaan_ortu` varchar(20) CHARACTER SET latin1 NOT NULL,
  `alat_transportasi` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calon_penerima_dup`
--

CREATE TABLE `calon_penerima_dup` (
  `id` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `nilai_rata` float NOT NULL,
  `penghasilan_ortu` varchar(30) NOT NULL,
  `tanggungan_ortu` int(11) NOT NULL,
  `pekerjaan_ortu` varchar(20) NOT NULL,
  `alat_transportasi` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_penerima_dup`
--

INSERT INTO `calon_penerima_dup` (`id`, `nis`, `nama`, `jurusan`, `nilai_rata`, `penghasilan_ortu`, `tanggungan_ortu`, `pekerjaan_ortu`, `alat_transportasi`, `tahun`) VALUES
(1, '0032548735', 'A. Iwan Setiawan', 'TKJ', 78.8, 'Kurang dari Rp. 500,000', 1, 'Petani', 'Jalan kaki', '2019'),
(2, '0034010116', 'A. Mansuruddin Faqih', 'TKJ', 76.33, 'Rp. 500,000 - Rp. 999,999', 3, 'Petani', 'Sepeda motor', '2019'),
(3, '0003306710', 'Aan', 'TKJ', 47.4, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(4, '0025697409', 'Aan Hidayat', 'TKJ', 78.2, 'Rp. 1,000,000 - Rp. 1,999,999', 3, 'Petani', 'Angkutan umum', '2019'),
(5, '0027270512', 'Aan Triana', 'TKJ', 79.27, 'Kurang dari Rp. 500,000', 2, 'Petani', 'Jalan kaki', '2019'),
(6, '0027325379', 'Aang Epiriyana', 'TKJ', 80.27, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(7, '0009703216', 'Aang Kornaefi', 'TKJ', 81.33, 'Rp. 500,000 - Rp. 999,999', 4, 'Petani', 'Jalan kaki', '2019'),
(8, '0036869435', 'Aap Adita', 'TKJ', 79.2, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Jalan kaki', '2019'),
(9, '0007815091', 'Aap Apandi', 'TKJ', 79.07, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Sepeda motor', '2019'),
(10, '0023431499', 'Aas Asiah', 'TKJ', 77.07, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Jalan kaki', '2019'),
(11, '0004421347', 'Aas Komalasari', 'TKJ', 79.53, 'Rp. 500,000 - Rp. 999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(12, '0013110042', 'Aat Atmayudin', 'TKJ', 78.13, 'Rp. 500,000 - Rp. 999,999', 2, 'Wiraswasta', 'Angkutan umum', '2019'),
(13, '0003621564', 'Aat Supriatna', 'TKJ', 46.53, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Angkutan umum', '2019'),
(14, '0003205296', 'Abdul Manan', 'TKJ', 80.4, 'Rp. 1,000,000 - Rp. 1,999,999', 3, 'Wiraswasta', 'Angkutan umum', '2019'),
(15, '0011541157', 'Abdul Rohman', 'TKJ', 79.67, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(16, '0003691536', 'Abidin Kholik', 'TKJ', 77.8, 'Rp. 1,000,000 - Rp. 1,999,999', 3, 'Lainnya', 'Angkutan umum', '2019'),
(17, '0005607727', 'Achmad Puadnudin', 'TKJ', 74, 'Rp. 500,000 - Rp. 999,999', 4, 'Petani', 'Sepeda motor', '2019'),
(18, '0029086309', 'Acih Mintarsih', 'TKJ', 79.47, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(19, '0020263889', 'Aden Hermawan', 'TKJ', 81.87, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(20, '9991530291', 'Adi Herdiansyah', 'TKJ', 79.4, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(21, '0016765562', 'Adi Rahmat Fauzi', 'TKJ', 57.07, 'Rp. 2,000,000 - Rp. 4,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(22, '0032127042', 'Adih Gunawan', 'TKJ', 72.93, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(23, '0011585952', 'Adimi', 'TKJ', 82.87, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(24, '0164184807', 'Adin', 'TKJ', 77.87, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(25, '0011541207', 'Aditia', 'TKJ', 81, 'Kurang dari Rp. 500,000', 2, 'Wiraswasta', 'Angkutan umum', '2019'),
(26, '0011586440', 'Adni', 'TKJ', 79.13, 'Rp. 500,000 - Rp. 999,999', 4, 'Petani', 'Sepeda motor', '2019'),
(27, '0015403257', 'Adra', 'TKJ', 81, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Jalan kaki', '2019'),
(28, '0027261370', 'Aem. Mutaqien', 'TKJ', 78.73, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(29, '9995742293', 'Aep', 'TKJ', 78.8, 'Rp. 500,000 - Rp. 999,999', 4, 'Petani', 'Sepeda motor', '2019'),
(30, '0026769781', 'Agnes Meilani', 'TKJ', 81, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Pedagang Besar', 'Sepeda motor', '2019'),
(31, '0017086338', 'Agus', 'TKJ', 79.87, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Jalan kaki', '2019'),
(32, '0022877777', 'Agus Mustopa', 'TKJ', 80.93, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(33, '9993054365', 'Agus Priatna', 'TKJ', 80.93, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Sepeda motor', '2019'),
(34, '0033058074', 'Ahdi', 'TKJ', 78.73, 'Rp. 500,000 - Rp. 999,999', 2, 'Wiraswasta', 'Angkutan umum', '2019'),
(35, '0026513179', 'Ahmad Ahyudin', 'TKJ', 82.93, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(36, '0020262855', 'Ahmad Badru Tamam', 'TKJ', 58.87, 'Rp. 2,000,000 - Rp. 4,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(37, '0049444818', 'Ahmad Bodin', 'TKJ', 72.6, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(38, '0009004336', 'Ahmad Fajari', 'TKJ', 73.13, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(39, '0027220516', 'Ahmad Fauzian Arifin', 'TKJ', 73.4, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(40, '0004245171', 'Ahmad Iim', 'TKJ', 52.27, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(41, '0026033028', 'Ahmad Jaelani', 'TKJ', 69.4, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(42, '0008162965', 'Ahmad Juni', 'TKJ', 46.13, 'Rp. 1,000,000 - Rp. 1,999,999', 3, 'Petani', 'Angkutan umum', '2019'),
(43, '0027391864', 'Ahmad Matin Ansori', 'TKJ', 74.73, 'Kurang dari Rp. 500,000', 2, 'Petani', 'Jalan kaki', '2019'),
(44, '0012268882', 'Ahmad Saepudin', 'TKJ', 73.67, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Angkutan umum', '2019'),
(45, '0011586172', 'Ahmad Sutisna', 'TKJ', 47.07, 'Rp. 1,000,000 - Rp. 1,999,999', 4, 'Wiraswasta', 'Jalan kaki', '2019'),
(46, '0025940551', 'Ahmad Taufik', 'TKJ', 74.4, 'Rp. 2,000,000 - Rp. 4,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(47, '0006189246', 'Ahyani', 'TKJ', 75.8, 'Rp. 2,000,000 - Rp. 4,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(48, '0005667744', 'Ahyudin', 'TKJ', 46.07, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(49, '0013950032', 'Ai Umi Hapidatul Hidayah', 'TKJ', 73.27, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Jalan kaki', '2019'),
(50, '0022389649', 'Ajat Sudrajat', 'TKJ', 75.87, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(51, '0018584224', 'Aji Ripansyah', 'TKJ', 74.93, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(52, '0029332300', 'Aji Saputra', 'TKJ', 54.93, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(53, '0000981609', 'Ajid', 'TKJ', 74.6, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(54, '9998506255', 'Ajril Aril Ilham', 'TKJ', 70.53, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(55, '0000981355', 'Aldi', 'TKJ', 47.53, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(56, '0020598008', 'Aldi Agustiara', 'TKJ', 73.4, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Angkutan umum', '2019'),
(57, '0020081916', 'Aldi Setiawan', 'TKJ', 47.07, 'Rp. 500,000 - Rp. 999,999', 0, 'Petani', 'Jalan kaki', '2019'),
(58, '0009524682', 'Aldi Yana', 'TKJ', 66.67, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(59, '9995773453', 'Alexander', 'TKJ', 76.07, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(60, '9991512602', 'Ali', 'TKJ', 70.4, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(61, '0018344118', 'Ali Hariri', 'TKJ', 73.53, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Angkutan umum', '2019'),
(62, '0007388346', 'Ali Martodo', 'TKJ', 71.33, 'Rp. 500,000 - Rp. 999,999', 3, 'Petani', 'Sepeda motor', '2019'),
(63, '0009781593', 'Aliah', 'TKJ', 75.27, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Nelayan', 'Angkutan umum', '2019'),
(64, '0023623700', 'Alpan Pratama', 'TKJ', 66.13, 'Rp. 500,000 - Rp. 999,999', 1, 'Nelayan', 'Angkutan umum', '2019'),
(65, '0029808395', 'Alpin', 'TKJ', 77.33, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(66, '0014675163', 'Alus', 'TKJ', 71.67, 'Rp. 1,000,000 - Rp. 1,999,999', 3, 'Petani', 'Angkutan umum', '2019'),
(67, '0033910400', 'Alwi', 'TKJ', 63.47, 'Kurang dari Rp. 500,000', 1, 'Nelayan', 'Angkutan umum', '2019'),
(68, '0008326331', 'Amad', 'TKJ', 74.47, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(69, '0000981619', 'Amedi', 'TKJ', 80.67, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(70, '0026157837', 'Amelia Nuryani', 'TKJ', 55.13, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(71, '0019973489', 'Amin', 'TKJ', 72.47, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(72, '0014675535', 'Aminah', 'TKJ', 74.07, 'Rp. 1,000,000 - Rp. 1,999,999', 3, 'Nelayan', 'Angkutan umum', '2019'),
(73, '0004582770', 'Amirudin', 'TKJ', 78.44, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Petani', 'Sepeda motor', '2019'),
(74, '9997524201', 'Amnah Amelia', 'TKJ', 84.06, 'Rp. 500,000 - Rp. 999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(75, '0009673660', 'Amsar', 'TKJ', 22.75, 'Rp. 1,000,000 - Rp. 1,999,999', 0, 'Petani', 'Jalan kaki', '2019'),
(76, '0033998206', 'Amsir', 'TKJ', 81.88, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Sepeda motor', '2019'),
(77, '0038420452', 'Anah', 'TKJ', 79.88, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(78, '0008825656', 'Anan Setiawan', 'TKJ', 28.25, 'Rp. 1,000,000 - Rp. 1,999,999', 2, 'Wiraswasta', 'Sepeda motor', '2019'),
(79, '0000992969', 'Anang Wijaya', 'TKJ', 80.31, 'Kurang dari Rp. 500,000', 1, 'Petani', 'Angkutan umum', '2019'),
(80, '9981180017', 'Anda', 'TKJ', 59.43, 'Tidak Berpenghasilan', 2, 'Sudah Meninggal', 'Angkutan umum', '2019'),
(81, '0027787514', 'Anda Hidayatullah', 'TSM', 64.5, 'Rp. 2,000,000 - Rp. 4,999,999', 2, 'Wiraswasta', 'Sepeda motor', '2019'),
(82, '0009634636', 'Andi', 'TSM', 49.21, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(83, '0011586051', 'Andi', 'TSM', 74.29, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(84, '0017221131', 'Andi Anugrah', 'TSM', 69.43, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Angkutan umum', '2019'),
(85, '0029652859', 'Andi Hermawan', 'TSM', 69.36, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(86, '0024600609', 'Andi Purnawirawan', 'TSM', 71.64, 'Kurang dari Rp. 500,000', 2, 'Nelayan', 'Sepeda motor', '2019'),
(87, '0029758575', 'Andini Fitri Yanti', 'TSM', 79.36, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Angkutan umum', '2019'),
(88, '0026568181', 'Andra', 'TSM', 79.5, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Jalan kaki', '2019'),
(89, '0034116266', 'Andri Irawan', 'TSM', 83.07, 'Rp. 500,000 - Rp. 999,999', 1, 'Nelayan', 'Angkutan umum', '2019'),
(90, '9991539538', 'Andri Yani', 'TSM', 77.29, 'Rp. 500,000 - Rp. 999,999', 0, 'Petani', 'Sepeda motor', '2019'),
(91, '0012324471', 'Andrian', 'TSM', 60.86, 'Rp. 500,000 - Rp. 999,999', 0, 'Petani', 'Sepeda motor', '2019'),
(92, '0036289311', 'Angga', 'TSM', 45.07, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Sepeda motor', '2019'),
(93, '0031425703', 'Anggara', 'TSM', 82.64, 'Rp. 1,000,000 - Rp. 1,999,999', 0, 'Wiraswasta', 'Sepeda motor', '2019'),
(94, '9996529887', 'Anggi Mulyadi', 'TSM', 80.14, 'Rp. 2,000,000 - Rp. 4,999,999', 1, 'Wiraswasta', 'Angkutan umum', '2019'),
(95, '0009358789', 'Anggi Sukmajaya', 'TSM', 74.79, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Petani', 'Angkutan umum', '2019'),
(96, '0012623808', 'Ani Kurniawati', 'TSM', 75.21, 'Rp. 500,000 - Rp. 999,999', 2, 'Petani', 'Jalan kaki', '2019'),
(97, '0022963737', 'Aniah', 'TSM', 58.14, 'Rp. 500,000 - Rp. 999,999', 1, 'Petani', 'Jalan kaki', '2019'),
(98, '0037517924', 'Aning Jupriani', 'TSM', 82.79, 'Rp. 2,000,000 - Rp. 4,999,999', 2, 'Wiraswasta', 'Sepeda motor', '2019'),
(99, '0009684510', 'Anisa Agustina', 'TSM', 60, 'Rp. 1,000,000 - Rp. 1,999,999', 1, 'Wiraswasta', 'Angkutan umum', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `calon_penerima_konversi`
--

CREATE TABLE `calon_penerima_konversi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `wawancara` int(255) NOT NULL,
  `pendidikan` int(255) NOT NULL,
  `pengalaman` int(255) NOT NULL,
  `karakter` int(255) NOT NULL,
  `gaji` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_penerima_konversi`
--

INSERT INTO `calon_penerima_konversi` (`id`, `nama`, `batch`, `wawancara`, `pendidikan`, `pengalaman`, `karakter`, `gaji`) VALUES
(1, 'Syaeful amri', 1, 4, 5, 3, 3, 6000000),
(2, 'Yudi Herdiana', 1, 3, 5, 4, 4, 7000000),
(5, 'Indigo Nugra', 1, 4, 1, 4, 4, 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_bobot_ahp`
--

CREATE TABLE `hasil_bobot_ahp` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_bobot_ahp`
--

INSERT INTO `hasil_bobot_ahp` (`id`, `kode`, `bobot`) VALUES
(1, 'c1', 0.34),
(2, 'c2', 0.32),
(3, 'c3', 0.16),
(4, 'c4', 0.11),
(5, 'c5', 0.07);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_bobot_ahp_copy`
--

CREATE TABLE `hasil_bobot_ahp_copy` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_bobot_ahp_copy`
--

INSERT INTO `hasil_bobot_ahp_copy` (`id`, `kode`, `bobot`) VALUES
(1, 'c1', 0.36),
(2, 'c2', 0.3),
(3, 'c3', 0.16),
(4, 'c4', 0.12),
(5, 'c5', 0.06);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_iterasi_1`
--

CREATE TABLE `hasil_iterasi_1` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(25) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `c4` double NOT NULL,
  `c5` double NOT NULL,
  `hasil` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_iterasi_1`
--

INSERT INTO `hasil_iterasi_1` (`id`, `kriteria`, `c1`, `c2`, `c3`, `c4`, `c5`, `hasil`) VALUES
(1, 'c1', 5, 6.1666666666667, 16.166666666667, 20, 26, 73.333333333333),
(2, 'c2', 5.1666666666666, 5, 12.5, 20.333333333333, 26.5, 69.5),
(3, 'c3', 2.9583333333333, 2.6666666666667, 5, 8.0833333333333, 15, 33.708333333333),
(4, 'c4', 2.2777777777778, 2.5, 5, 5, 9.5, 24.277777777778),
(5, 'c5', 1.125, 1.4027777777778, 3.1111111111111, 3.5833333333333, 5, 14.222222222222);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_normalisasi`
--

CREATE TABLE `hasil_normalisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `batch` int(4) NOT NULL,
  `wawancara` float NOT NULL,
  `pendidikan` float NOT NULL,
  `pengalaman` float NOT NULL,
  `karakter` float NOT NULL,
  `gaji` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_normalisasi`
--

INSERT INTO `hasil_normalisasi` (`id`, `nama`, `batch`, `wawancara`, `pendidikan`, `pengalaman`, `karakter`, `gaji`) VALUES
(1, 'Syaeful amri', 1, 1, 1, 0.75, 0.75, 1),
(2, 'Yudi Herdiana', 1, 0.75, 1, 1, 1, 0.857143),
(5, 'Indigo Nugra', 1, 1, 0.2, 1, 1, 0.857143);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_perangkingan`
--

CREATE TABLE `hasil_perangkingan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hasil` float DEFAULT NULL,
  `rangking` int(11) DEFAULT NULL,
  `batch` int(4) NOT NULL,
  `wawancara` float NOT NULL,
  `pendidikan` float NOT NULL,
  `pengalaman` float NOT NULL,
  `karakter` float NOT NULL,
  `gaji` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_perangkingan`
--

INSERT INTO `hasil_perangkingan` (`id`, `nama`, `hasil`, `rangking`, `batch`, `wawancara`, `pendidikan`, `pengalaman`, `karakter`, `gaji`) VALUES
(1, 'Syaeful amri', 0.933, 1, 1, 1, 1, 0.75, 0.75, 1),
(2, 'Yudi Herdiana', 0.905, 2, 1, 0.75, 1, 1, 1, 0.857143),
(5, 'Indigo Nugra', 0.734, 3, 1, 1, 0.2, 1, 1, 0.857143);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `batch` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `jenis`, `batch`) VALUES
(1, 'c1', 'Wawancara', 'benefit', 0),
(2, 'c2', 'Pendidikan', 'benefit', 0),
(3, 'c3', 'Pengalaman', 'benefit', 0),
(4, 'c4', 'Karakter', 'benefit', 0),
(5, 'c5', 'Gaji', 'cost', 0);

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
-- Table structure for table `lookup_pegawai`
--

CREATE TABLE `lookup_pegawai` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `prioritas` int(11) DEFAULT NULL,
  `kriteria` enum('wawancara','pendidikan','pengalaman','karakter','gaji') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lookup_pegawai`
--

INSERT INTO `lookup_pegawai` (`id`, `keterangan`, `prioritas`, `kriteria`) VALUES
(1, 'Wawancara sangat aktif', 1, 'wawancara'),
(2, 'Wawancara aktif', 2, 'wawancara'),
(3, 'Wawancara passive', 3, 'wawancara'),
(4, 'SMA', 3, 'pendidikan'),
(5, 'D3', 2, 'pendidikan'),
(6, 'S1', 1, 'pendidikan'),
(7, 'Berpengalaman', 1, 'pengalaman'),
(8, 'Kurang Berpengalaman', 2, 'pengalaman'),
(9, 'Aktif', 1, 'karakter'),
(10, 'Passive', 2, 'karakter'),
(11, '4.500.000 < Gaji', 3, 'gaji'),
(12, '4.000.000 < Gaji < 4.500.000', 2, 'gaji'),
(13, 'Gaji < 4.000.000', 1, 'gaji');

-- --------------------------------------------------------

--
-- Table structure for table `nilaikriteria`
--

CREATE TABLE `nilaikriteria` (
  `id` int(11) NOT NULL,
  `c1_1` int(255) DEFAULT NULL,
  `c1_2` int(255) DEFAULT NULL,
  `c1_3` int(255) DEFAULT NULL,
  `c1_4` int(255) DEFAULT NULL,
  `c2_1` int(255) DEFAULT NULL,
  `c2_2` int(255) DEFAULT NULL,
  `c2_3` int(255) DEFAULT NULL,
  `c3_1` int(255) DEFAULT NULL,
  `c3_2` int(255) DEFAULT NULL,
  `c4_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilaikriteria`
--

INSERT INTO `nilaikriteria` (`id`, `c1_1`, `c1_2`, `c1_3`, `c1_4`, `c2_1`, `c2_2`, `c2_3`, `c3_1`, `c3_2`, `c4_1`) VALUES
(1, 2, 3, 2, 3, 4, 3, 4, 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(25) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `c4` double NOT NULL,
  `c5` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(1, 'c1', 1, 2, 3, 2, 3),
(2, 'c2', 0.5, 1, 4, 3, 4),
(3, 'c3', 0.33333333333333, 0.25, 1, 3, 2),
(4, 'c4', 0.5, 0.33333333333333, 0.33333333333333, 1, 3),
(5, 'c5', 0.33333333333333, 0.25, 0.5, 0.33333333333333, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_pegawai`
--
ALTER TABLE `calon_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_penerima`
--
ALTER TABLE `calon_penerima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_penerima_dup`
--
ALTER TABLE `calon_penerima_dup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_penerima_konversi`
--
ALTER TABLE `calon_penerima_konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_bobot_ahp`
--
ALTER TABLE `hasil_bobot_ahp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_bobot_ahp_copy`
--
ALTER TABLE `hasil_bobot_ahp_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_iterasi_1`
--
ALTER TABLE `hasil_iterasi_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_perangkingan`
--
ALTER TABLE `hasil_perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `lookup_pegawai`
--
ALTER TABLE `lookup_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaikriteria`
--
ALTER TABLE `nilaikriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calon_pegawai`
--
ALTER TABLE `calon_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calon_penerima`
--
ALTER TABLE `calon_penerima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calon_penerima_dup`
--
ALTER TABLE `calon_penerima_dup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `calon_penerima_konversi`
--
ALTER TABLE `calon_penerima_konversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1992;

--
-- AUTO_INCREMENT for table `hasil_bobot_ahp`
--
ALTER TABLE `hasil_bobot_ahp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_bobot_ahp_copy`
--
ALTER TABLE `hasil_bobot_ahp_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_iterasi_1`
--
ALTER TABLE `hasil_iterasi_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1992;

--
-- AUTO_INCREMENT for table `hasil_perangkingan`
--
ALTER TABLE `hasil_perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1992;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lookup_pegawai`
--
ALTER TABLE `lookup_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilaikriteria`
--
ALTER TABLE `nilaikriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

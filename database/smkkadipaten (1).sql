-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 08:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkkadipaten`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `fullname`, `foto`) VALUES
(1, 'admin', '$2y$10$P9peEI/lEzqb2W9/JsKlbuA5dR.oYw7dYnVgymTy3UcE41eSerIUq', 'Admin Smkn', 'default.png'),
(2, 'guru', '$2y$10$P9peEI/lEzqb2W9/JsKlbuA5dR.oYw7dYnVgymTy3UcE41eSerIUq', 'Guru Skmn', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `email_sekolah` varchar(30) NOT NULL,
  `no_telepon_sekolah` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `logo_sekolah` varchar(225) NOT NULL,
  `alamat_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `nama_sekolah`, `visi`, `misi`, `email_sekolah`, `no_telepon_sekolah`, `keterangan`, `logo_sekolah`, `alamat_sekolah`) VALUES
(1, 'SMK KADIPATEN', '<p><b></b></p><blockquote><b>“Berprestasi dilandasi Iman, Taqwa dan Berbudaya Lingkungan serta Berwawasan Global”</b></blockquote><p></p>', '<p></p><ol><li><small>Mewujudkan sarana prasarana reprensentatif dan up to date\r\n\r\n</small></li><li><small>\r\n\r\n&nbsp;Mewujudkan pengelolaan pendidikan yang professional&nbsp;</small></li><li><small>\r\n\r\nMewujudkan sistim penilaian yang berafiliasi</small></li><li><small>\r\n\r\nMewujudkan budaya yang berkualifikasi</small></li><li><small>Mewujudkan Sekolah yang bersih,hijau dan meminimalis hasil sampah yang tidak bermanfaat&nbsp;</small></li></ol><p></p><p><b></b></p>', 'smk@gmail.com', '082 234 578 912', 'keterangan sekolah', 'logo1.png', 'Jl Batugede 25 26 Tasikmalaya');

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id_extra` int(11) NOT NULL,
  `nama_extra` varchar(20) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_pembimbing` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id_extra`, `nama_extra`, `hari`, `jam`, `foto`, `keterangan`, `nama_pembimbing`) VALUES
(2, 'BKC', 'Senin', '03:30:00', '3cd731fbf06f80d9655390cfc4d5a8ee.jpg', 'Harus membawa nasi and rencang na', 'Pa Satpham'),
(3, 'Pramuka', 'Jum\'at', '01:20:00', 'Penguins.jpg', 'Kelas x, xi di wajibkan harus hadir', 'Bu Syamrotul fu\'adah'),
(4, 'Futsal', 'Rabu', '02:30:00', 'Koala.jpg', 'Bagi yang minat saja', 'Pa Hendra');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `foto`, `password`) VALUES
(27, '1234567890', 'Abdul Ghani', 'Kp.cileuleus', 'Tasikmalaya', '1998-10-20', 'islam', 'laki-laki', 'gambar-wallpaper-laptop-hd-kumpulan-wallpaper-monkey-d-luffy-e-piece-hd-terbaru-2016-of-gambar-wallpaper-laptop-hd.jpg', '$2y$10$t2GVcj/opsVUatYc7k2uLexo7YxOfaf18SEmmPYabFD7sZn6f8fwS');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `foto_jurusan` varchar(100) NOT NULL,
  `keterangan_jurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `foto_jurusan`, `keterangan_jurusan`) VALUES
(3, 'Geologi Pertambangan', 'error-bg.jpg', 'Ini keteranagan'),
(4, 'Agribisnis Tanaman Pangan Dan Hortikultura', 'front-end2.jpg', 'Nama Nama '),
(5, 'Otomatisasi Tata Kelola Perkantoran', 'wallhaven-342160.jpg', 'Harus kah saya nakal'),
(6, 'Teknik Dan Bisnis Sepeda Motor', 'logo2.png', 'di sini bisnis motor and montir'),
(8, 'Teknik Kendaraan Ringan Dan Otomotif', 'portfolio.PNG', 'keterangan ini');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `id_megajar` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`id_megajar`, `id_guru`, `id_kelas`, `id_jurusan`, `id_pelajaran`) VALUES
(92, 27, 1, 6, 1),
(93, 27, 2, 6, 1),
(94, 27, 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `ap_1` int(11) NOT NULL,
  `ap_2` int(11) NOT NULL,
  `ap_3` int(11) NOT NULL,
  `ap_4` int(11) NOT NULL,
  `ap_5` int(11) NOT NULL,
  `ap_6` int(11) NOT NULL,
  `ak_1` int(11) NOT NULL,
  `ak_2` int(11) NOT NULL,
  `ak_3` int(11) NOT NULL,
  `ak_4` int(11) NOT NULL,
  `ak_5` int(11) NOT NULL,
  `ak_6` int(11) NOT NULL,
  `nilai_ijazah` int(11) NOT NULL,
  `nilai_skhun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_pelajaran`, `ap_1`, `ap_2`, `ap_3`, `ap_4`, `ap_5`, `ap_6`, `ak_1`, `ak_2`, `ak_3`, `ak_4`, `ak_5`, `ak_6`, `nilai_ijazah`, `nilai_skhun`) VALUES
(111, 33, 3, 78, 90, 0, 0, 0, 0, 73, 77, 0, 0, 0, 0, 20, 30),
(112, 33, 4, 87, 87, 0, 0, 0, 0, 70, 75, 0, 0, 0, 0, 0, 0),
(113, 33, 5, 89, 88, 0, 0, 0, 0, 70, 75, 0, 0, 0, 0, 0, 0),
(114, 33, 7, 90, 89, 0, 0, 0, 0, 73, 80, 0, 0, 0, 0, 0, 0),
(115, 33, 8, 95, 95, 0, 0, 0, 0, 75, 90, 0, 0, 0, 0, 0, 0),
(123, 35, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 35, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, 35, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 35, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, 35, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 36, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 36, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 36, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 36, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 36, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, 37, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 37, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 37, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, 37, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, 37, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, 37, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, 38, 1, 90, 0, 0, 0, 0, 0, 80, 0, 0, 0, 0, 0, 0, 0),
(141, 38, 3, 99, 0, 0, 0, 0, 0, 96, 0, 0, 0, 0, 0, 0, 0),
(142, 38, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, 38, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, 38, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, 38, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0),
(181, 33, 1, 30, 20, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0),
(182, 35, 1, 100, 30, 0, 0, 0, 20, 50, 20, 0, 0, 0, 90, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
(1, 'Bahasa Indonesia'),
(3, 'Matematika'),
(4, 'Bahasa Sunda'),
(5, 'Fisika'),
(7, 'Pkn'),
(8, 'Pai');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `foto`, `title`) VALUES
(3, 'event1.jpg', 'portfolio satu'),
(4, 'event2.jpg', 'portfolio dua'),
(5, 'event3.jpg', 'portfolio tiga');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `warga_negara` varchar(100) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `nama_orang_tua` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat_orang_tua` text NOT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` text,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `nomor_sttb` varchar(100) NOT NULL,
  `tanggal_sttb` date NOT NULL,
  `tanggal_meninggalkan_sekolah` date NOT NULL,
  `alasan_meninggalkan_sekolah` text NOT NULL,
  `tamat_nomor_sttb` varchar(100) NOT NULL,
  `tamat_tanggal_sttb` date NOT NULL,
  `keterangan_lain` text,
  `foto_siswa` varchar(225) NOT NULL,
  `s_1` int(11) NOT NULL,
  `s_2` int(11) NOT NULL,
  `s_3` int(11) NOT NULL,
  `s_4` int(11) NOT NULL,
  `s_5` int(11) NOT NULL,
  `s_6` int(11) NOT NULL,
  `i_1` int(11) NOT NULL,
  `i_2` int(11) NOT NULL,
  `i_3` int(11) NOT NULL,
  `i_4` int(11) NOT NULL,
  `i_5` int(11) NOT NULL,
  `i_6` int(11) NOT NULL,
  `a_1` int(11) NOT NULL,
  `a_2` int(11) NOT NULL,
  `a_3` int(11) NOT NULL,
  `a_4` int(11) NOT NULL,
  `a_5` int(11) NOT NULL,
  `a_6` int(11) NOT NULL,
  `th_1` varchar(20) NOT NULL,
  `th_2` varchar(20) NOT NULL,
  `th_3` varchar(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `id_jurusan`, `nis`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `warga_negara`, `agama`, `alamat_siswa`, `nama_orang_tua`, `pekerjaan`, `alamat_orang_tua`, `nama_wali`, `alamat_wali`, `pekerjaan_wali`, `tanggal_masuk`, `asal_sekolah`, `alamat_sekolah`, `nomor_sttb`, `tanggal_sttb`, `tanggal_meninggalkan_sekolah`, `alasan_meninggalkan_sekolah`, `tamat_nomor_sttb`, `tamat_tanggal_sttb`, `keterangan_lain`, `foto_siswa`, `s_1`, `s_2`, `s_3`, `s_4`, `s_5`, `s_6`, `i_1`, `i_2`, `i_3`, `i_4`, `i_5`, `i_6`, `a_1`, `a_2`, `a_3`, `a_4`, `a_5`, `a_6`, `th_1`, `th_2`, `th_3`, `catatan`) VALUES
(33, 2, 6, 1718120, 'Sarip Hidayat', 'laki-laki', 'tasikmalaya', '2019-04-04', 'WNI', 'kristen', 'jantake', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'testimonial1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-2019', '', '', ''),
(35, 2, 6, 17181150, 'Faiz Syaidu Suhada', 'laki-laki', 'tasikmalaya', '2019-04-04', 'WNI', 'islam', 'ciawi', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'testimonial3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(36, 3, 8, 1245678743, 'Dea Herlana', 'laki-laki', 'tasikmalaya', '2019-04-04', 'WNI', 'islam', 'ciloa', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'testimonial4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(37, 2, 5, 1718150, 'Sri Mulyani', 'laki-laki', 'tasikmalaya', '2019-04-03', 'WNI', 'islam', 'cinusa', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'team-detail.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(38, 1, 4, 12345, 'Asep Husen', 'laki-laki', 'tasikmalaya', '2019-04-20', 'WNI', 'islam', 'Kp.jantake', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', 'Asep Husen', '', '0000-00-00', '', 'wallhaven-342160.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2010-2011', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali_kelas`, `id_guru`, `id_kelas`, `id_jurusan`) VALUES
(8, 27, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id_extra`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_megajar`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id_extra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_megajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

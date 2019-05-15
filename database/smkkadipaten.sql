-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2019 at 01:46 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9177124_portfolio`
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
(1, 'lamuncoding', '$2y$10$.gwPYtkRGQMj7Gwxd.dNseFBYKqIjN4PbtEqL99V0h0Q6A5BMojE6', 'Admin Smkn', 'avatar5.png'),
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
(2, 'BKC', 'Senin', '03:30:00', '2090968DSC_0509.JPG', 'Harus membawa nasi and rencang na', 'Pa Satpham'),
(3, 'Pramuka', 'Kamis', '01:20:00', 'IMG_1710-300x200.jpg', 'Kelas x, xi di wajibkan harus hadir', 'Bu Syamrotul fu\'adah'),
(4, 'Futsal', 'Rabu', '02:30:00', 'IMG_6687.JPG', 'Bagi yang minat saja', 'Pa Hendra');

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
(20, '123123', 'Chairil Anwar', 'mangkubumi', 'tasikmalaya', '2019-04-01', 'islam', 'laki-laki', 'team1.jpg', '$2y$10$1YftAcTU9P78XtXoxv.7r.U8K.iEY5X1oeDIkGik0ax58FcHpZlQK'),
(21, '12345678', 'Acep Wahyudianto', 'cisayong', 'tasikmalaya', '2019-04-11', 'islam', 'laki-laki', 'team3.jpg', '$2y$10$MaQwdCi0IHbMazF3yX16yO.IOxDeyAf7iwRdeCqD6JrPU/QOKv9hy'),
(22, '234554321', 'Ai Aryani', 'cileuleus', 'tasikmalaya', '2019-04-25', 'islam', 'laki-laki', 'team4.jpg', '$2y$10$CbfpEunHPVxc2y4lYFxKwuJ7.uR0orfvicj5KAcIYOH1cXbOKeebC'),
(24, '123456789', 'Dedy Kuswandi', 'cigorowong', 'tasikmalaya', '2019-04-12', 'islam', 'laki-laki', 'team5.jpg', '$2y$10$n0keaVDWwCjDR8maFwRr8OyFru7tK8Y5Smywrz.GGfWuSxQtG/6bG');

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
(3, 'Geologi Pertambangan', 'geologipertambangan.jpg', 'Program Studi Geologi Pertambangan mengemban tugas dan fungsi dalam upaya mencerdaskan kehidupan bangsa, khususnya dalam bidang Geologi Pertambangan serta mengembangkan potensi siswa-siswi yang berprestasi, profesional dan berwawasan lingkungan. Menyadari potensi dan kekayaan alam di Indonesia memiliki potensi tambang yang sangat melimpah. Lulusan jurusan ini diproyeksikan untuk mengisi tenaga kerja disemua sektor industri pertambangan di Indonesia.'),
(4, 'Agribisnis Tanaman Pangan Dan Hortikultura', 'Agribisnis_Tanaman_Pangan_Dan_Hortikultura.jpg', 'Agribisnis Tanaman Pangan dan Hortikultura (ATPH) adalah salah satu paket keahlian di SMK Negeri Kadipaten yang semakin menunjukkan jati dirinya sebagai “Jurusan Pertanian” dan sekaligus menjadi tolok ukur atau barometer SMK Negeri Kadipaten sebagaimana dikenal sejak awal berdirinya sebagai SMK Pertanian.  Paket Keahlian ATPH terus menerus dan berkesinambungan melaksanakan pembelajaran teori maupun praktik yang menciptakan suasana belajar yang mengasyikan, digandrungi peserta didik, dinantikan jam demi jam pertemuanya, dan memberi kesan mendalam bagi seluruh peserta didiknya.'),
(5, 'Otomatisasi Tata Kelola Perkantoran', 'Otomatisasi_Tata_Kelola_Perkantoran.jpg', 'Merupakan Kristalisasi Dari Program Keahlian Yang Harus Dikuasai Oleh Peserta Didik Untuk Dapat Bekerja Sesuai Dengan Standart Kompetensi Kerja Nasional Indonesia (SKKNI) Atau Standart Paket Keahlian : ADMINISTRASI PERKANTORAN.'),
(6, 'Teknik Dan Bisnis Sepeda Motor', 'Teknik_Dan_Bisnis_Sepeda_Motor.jpg', 'kompetensi keahlian pada Bidang Studi Keahlian Teknologi dan Rekayasa Program Studi Keahlian Teknik Otomotif yang menekankan pada keterampilan pelayanan jasa mekanik kendaraan sepeda motor roda dua. Kompetensi Keahlian Teknik dan Bisnis Sepeda Motor menyiapkan peserta didik untuk bekerja pada bidang pekerjaan yang dikelola oleh badan, instansi atau perusahaan maupun pribadi (wirausaha).'),
(8, 'Teknik Kendaraan Ringan Dan Otomotif', 'Teknik_Kendaraan_Ringan_Dan_Otomotif.jpeg', 'ilmu yang mempelajari tentang alat-alat transportasi darat yang menggunakan mesin, terutama mobil yang mulai berkembang sebagai cabang ilmu seiring dengan diciptakannya mesin mobil. Dalam perkembangannya, mobil semakin menjadi alat transportasi yang kompleks yang terdiri dari ribuan komponen yang tergolong dalam puluhan system dan subsistem. Oleh karena itu, Teknik Kendaraan Ringan pun berkembang menjadi ilmu yang luas dan mencakup semua system dan subsistem.');

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
(3, 'XII'),
(4, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id_kepsek` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kata_sambutan` text NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`id_kepsek`, `nip`, `fullname`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telepon`, `email`, `alamat`, `kata_sambutan`, `foto`) VALUES
(1, 123456789, 'Dr. Hj. Sri Nurhayati, M.SI', 'perempuan', 'tasikmalaya', '2019-05-01', '0877655123', 'srinurhayati@gmail.com', 'Kp, cijuhung desa, sukamukti kecamatan cisayong kabupaten tasikmalaya', '<p>\r\n\r\n</p><p>Assalamualaikum Warahmatullah Wabarakatuh</p><p>Alhamdulillahi robbil alamin kami panjatkan kehadlirat Allah SWT, bahwasannya dengan rahmat dan karunia-Nya lah akhirnya Website sekolah ini dengan alamat <a target=\"_blank\" rel=\"nofollow\" href=\"https://lamuncoding.000webhostapp.com/project4/\">www.smknkadipaten.sch.id</a> dapat kami perbaharui. Kami mengucapkan selamat datang di Website kami Sekolah Menengah Kejuruan Negeri (SMKN) Kadipaten yang saya tujukan untuk seluruh unsur pimpinan, guru, karyawan dan siswa serta khalayak umum guna dapat mengakses seluruh informasi tentang segala profil, aktifitas/kegiatan serta fasilitas sekolah kami.</p><p>Kami selaku pimpinan sekolah mengucapkan terima kasih kepada tim pembuat Website ini yang telah berusaha untuk dapat lebih memperkenalkan segala perihal yang dimiliki oleh sekolah. Dan tentunya Website sekolah kami masih terdapat banyak kekurangan, oleh karena itu kepada seluruh civitas akademika dan masyarakat umum dapat memberikan saran dan kritik yang membangun demi kemajuan Website ini lebih lanjut.</p><p>Saya berharap Website ini dapat dijadikan wahana interaksi yang positif baik antar civitas akademika maupun masyarakat pada umumnya sehingga dapat menjalin silaturahmi yang erat disegala unsur. Mari kita bekerja dan berkarya dengan mengharap ridho sang Kuasa dan keikhlasan yang tulus dijiwa demi anak bangsa.</p><p>Terima kasih semoga Allah ‘Azza Wa Jalla menyertai doa kita semua……amin.</p><p></p>', 'team2.jpg');

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
(113, 21, 1, 3, 7),
(114, 21, 1, 3, 8),
(115, 21, 1, 6, 1),
(116, 21, 2, 6, 1),
(117, 22, 1, 3, 3),
(118, 22, 2, 3, 3),
(119, 22, 3, 3, 3),
(120, 24, 1, 3, 1),
(121, 24, 1, 3, 3),
(122, 24, 2, 3, 3),
(123, 20, 2, 6, 1),
(124, 20, 2, 6, 3),
(125, 20, 3, 6, 1),
(126, 20, 3, 6, 3);

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
(110, 33, 1, 80, 85, 80, 0, 0, 0, 75, 75, 0, 0, 0, 0, 10, 20),
(112, 33, 4, 87, 87, 0, 0, 0, 0, 70, 75, 0, 0, 0, 0, 0, 0),
(113, 33, 5, 89, 88, 0, 0, 0, 0, 70, 75, 0, 0, 0, 0, 0, 0),
(114, 33, 7, 90, 89, 0, 0, 0, 0, 73, 80, 0, 0, 0, 0, 0, 0),
(115, 33, 8, 95, 95, 0, 0, 0, 0, 75, 90, 0, 0, 0, 0, 0, 0),
(122, 35, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
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
(150, 33, 3, 78, 90, 70, 0, 0, 0, 73, 70, 0, 0, 0, 0, 20, 30),
(151, 35, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `alamat_wali` text DEFAULT NULL,
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
  `keterangan_lain` text DEFAULT NULL,
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
(33, 2, 6, 1718120, 'Sarip Hidayat', 'laki-laki', 'tasikmalaya', '2019-04-04', 'WNI', 'kristen', 'jantake', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'testimonial1.jpg', 5, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-2019', '', '', ''),
(35, 2, 6, 17181150, 'Faiz Syaidu Suhada', 'laki-laki', 'tasikmalaya', '2019-04-04', 'WNI', 'islam', 'ciawi', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'testimonial3.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(36, 3, 8, 1245678743, 'Dea Herlana', 'laki-laki', 'tasikmalaya', '2019-04-04', 'WNI', 'islam', 'ciloa', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', 'testimonial4.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(37, 2, 4, 1718150, 'Sri Mulyani', 'laki-laki', 'tasikmalaya', '2019-04-03', 'WNI', 'islam', 'cinusa', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', 'Sri Mulyani', '', '0000-00-00', '', 'team-detail.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(38, 2, 4, 12345, 'Asep Husen', 'laki-laki', 'tasikmalaya', '2019-04-20', 'WNI', 'islam', 'Kp.jantake', '', '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', 'Asep Husen', '', '0000-00-00', '', 'wallhaven-342160.jpg', 3, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2015-2016', '2017-2018', '2019-2020', 'Jangan Bolos Mulu');

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
(3, 15, 1, 4),
(4, 23, 3, 6),
(6, 21, 2, 4),
(7, 20, 2, 6);

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
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id_kepsek`);

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
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_megajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

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
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2021 pada 14.53
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ipmk`
--
CREATE DATABASE IF NOT EXISTS `ipmk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ipmk`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user', '1234'),
(3, 'Fajar Soenaryo', '24bc50d85ad8fa9cda686145cf1f8aca'),
(4, 'Prana Septia', '$2y$10$OMToUDarAJmx01zV9hN42eLn2P6P3UC6duvd3afUD2WpkNKFJo6s.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`, `penulis`, `tanggal`) VALUES
(2, 'Bupati Kuningan Menghadiri Pelantikan Ikatan Pelajar Mahasiswa Kuningan Yogyakarta Periode 2020-2021', 'Minggu, 22 November 2020 - “Saya sebagai ketua IPMK mengucapkan terimakasih banyak yang sebesar besarnya kepada Bupati Kuningan yang telah mendukung dan memfasilitasi mahasiswa Kab Kuningan sehingga terselenggaranya acara pelantikan hari ini dengan bail, untuk itu saya akan menjaga marwah dan nama baik Kab Kuningan di Yogyakarta melalui program kerja yang nantinya akan dibentuk oleh Pengurus, dimana program kerja tersebut yang mengenalkan pariwisata budaya kuliner dan hal hal lainnya yang berkaitan dengan kuningan dan berdampak terhadap masyarakat luar kota khusunya Yogyakarta akan tau bagaimana Kuningan yang nantinya bisa menjadi suatu indicator baik untuk Kab Kuningan, saya berharap agar pemerintah daerah dapat berkolaborasi dengan IPMK dalam melaksanakan program kerja yang akan kita laksanakan di periode 2020 – 2021”. Tutur Gofur', 'artikel/rsz_artikel1.jpg', 'Admin', '2021-04-04'),
(3, 'Rencana Kuliah Di jogja? Cari Tahu Dulu Disini', 'Minggu, 7 Februari 2021 - OMJOK 2021 sendiri merupakan kegiatan yang diselenggarakan mahasiswa asal Kuningan, IPMK Yogyakarta untuk memberikan informasi pada calon mahasiswa.\r\n\r\nKetua pelaksana Muhammad Azhar Ghifari menyebut acara yang mengusung tema “Menggapai Asa untuk Meraih Cita dan Membangun Bangsa” ini, diharapkan bisa memberi informasi sebanyak-banyaknya untuk berbagai kampus disana.\r\n\r\n“Juga bisa termotivasi dan mulai mempersiapkan atau merencanakan diri sejak dini terkait profesi dan karier yang akan ditekuni di masa yang akan datang,” jelasnya Minggu (7/2/2021) siang.\r\n\r\nAdapun acara, rencananya akan digelar selama dua hari pada 13-14 Februari 2021. Karena pandemi, acara dilakukan secara daring, Zoom Meeting.\r\n\r\nRencananya, akan ada tiga rangkaian acara dalam OMJOK kali ini, meliputi sosialisasi IPMK, sosialisasi universitas serta talkshow.', 'artikel/omjok.PNG', 'Admin', '2021-04-04'),
(4, 'Bela Cabang Jakarta Di polemik HMKI, Ghofur : Aryadi Tidak Ngaco!', 'KUNINGAN (MASS) - Polemik HMKI ternyata memancing para ketua cabang angkat bicara. Salah  satunya Ketua IPMK Yogyakarta, Ghofur Cucucaniago. Dalam statement tertulisnya, dirinya membela pernyataan Ketua IPPMK Jadetabek Muhammad Aryadi. Pemuda Berkumis itu menilai, balas-balasan yang sebelumnya dimuat di Kuningan mass terkait Ketua HMKI yang sudah tidak sesuai dengan AD/ART, membuatnya turut ingin berkomentar. "Memang benar adanya ketika berbiacara ketua IPPMK (Aryadi) itu ketua baru, tapi saya kira itu bukan masalah. Seharusnya Ramdhan sebagai ketua HMKI kepada pengurus baru dari setiap cabang," ujarnya.', 'artikel/rsz_whatsapp_image_2021-05-24_at_235927.jpg', 'Admin', '2021-05-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `berkas` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `id_kegiatan` int(11) NOT NULL,
  PRIMARY KEY (`id_galeri`),
  KEY `id_kegiatan` (`id_kegiatan`),
  KEY `id_kegiatan_2` (`id_kegiatan`),
  KEY `id_kegiatan_3` (`id_kegiatan`),
  KEY `id_kegiatan_4` (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `berkas`, `deskripsi`, `id_kegiatan`) VALUES
(1, 'galeri/rsz_img_1.jpg', 'Pelantikan1', 0),
(6, 'galeri/rsz_img_2.jpg', '', 0),
(10, 'galeri/rsz_img_3.jpg', '', 0),
(11, 'galeri/rsz_whatsapp_image_2021-03-26_at_16_25_44.jpg', '', 0),
(12, 'galeri/bk1.jpg', 'pelantikan5', 0),
(17, 'galeri/rsz_1.png', 'juara futsal', 0),
(18, 'galeri/rsz_2.png', '', 0),
(19, 'galeri/rsz_3.png', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `tempat` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kegiatan`),
  KEY `id_kegiatan` (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `deskripsi`, `tempat`, `waktu`, `jam`) VALUES
(1, 'Pelantikan Pengurus Periode 2020 - 2021', 'Melanjutkan regenerasi ke generasi pengurus IPMK.', 'Pendopo Pemda Kuningan', 'Hari Minggu, 22 November 2020', '08.00 - Selesai'),
(2, 'Sparing Futsal', 'Dalam rangka mempererat silaturahmi dan mewadahi hobi dalam olahraga futsal, agar hobi futsal tersebut dapat tersalurkan.', 'Tifosi Futsal', 'Hari Rabu, 22 Februari 2021', '17.00 - 18.00'),
(4, 'Yasinan & Ngaliwet', 'Membaca surat yasin dilanjutkan baca do''a dalam rangka malam jum''at dan makan-makan setelah yasinan dan doa''bersama.', 'Asrama IPMK', 'Hari Kamis, 04 Maret 2021', '17.00 - Selesai'),
(5, 'Women'' Class ("Workshop dan Make Up Class")', 'Diselenggarakan dalam rangka "Hari Perempuan Sedunia" dengan konsep webinar, dan akan diselenggarakan 2 sesi.', 'at Zoom Meeting', 'Hari Sabtu, 13 Maret 2021', '19.00 - 22.00'),
(6, 'Yasinan & Ngaliwet', 'Membaca surat yasin dilanjutkan baca do''a dalam rangka malam jum''at dan makan-makan setelah yasinan dan doa''bersama.', 'Asrama IPMK', 'Hari Kamis, 18 Maret 2021', '17.00 - Selesai'),
(7, 'Fun Futsal', 'Dalam rangka mempererat silaturahmi dan merangkul hobi dalam olahraga futsal, agar hobi futsal tersbut dapat tersalurkan.', 'Gor Ewangga', 'Hari Sabtu, 10 April 2021', '19.00 - 20.00'),
(8, 'Badminton', 'Olahraga rutin', 'Gor Ewangga', 'Hari Rabu, 26 Mei 2021', '17.00 - Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat_kuningan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(40) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `universitas` varchar(50) DEFAULT NULL,
  `angkatan` varchar(20) DEFAULT NULL,
  `id_pengurus` int(11) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `nama` (`nama`),
  KEY `angkatan` (`angkatan`),
  KEY `universitas` (`universitas`),
  KEY `angkatan_2` (`angkatan`),
  KEY `angkatan_3` (`angkatan`),
  KEY `angkatan_4` (`angkatan`),
  KEY `id_pengurus` (`id_pengurus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `ttl`, `jenis_kelamin`, `alamat_kuningan`, `no_hp`, `jurusan`, `universitas`, `angkatan`, `id_pengurus`) VALUES
(1, 'Amelia Nur Cahyani', 'Kuningan, 16 Mei 2002', 'Laki-laki', 'Andamui, Ciwaru', '085888590104', 'Hubungan Internasional', 'Universitas Muhammadiyah Yogyakarta', '2020', 0),
(2, 'Cepi Sugianto', 'Kuningan, 12 Agustus 2002', 'Laki-laki', 'Jl. Siliwangi, Gg. Cijalim No.129', '086534876548', 'Ilmu Komunikasi', 'Universitas Teknologi Yogyakarta', '2020', 0),
(3, 'Bagja Pamungkas', 'Kuningan, 15 Juli 2001', 'Laki-laki', 'Sukadana', '0864536457465', 'Pendidikan Olahraga', 'Universitas Negeri Yogyakarta', '2019', 0),
(4, 'Edwin Wiguna', 'Kuningan, 16 Mei 2001', 'Laki-Laki', 'Cibingbin', '085888590104', 'Manajemen', 'Universitas Islam Indonesia', '2019', 0),
(5, 'Muhammad Azhar Ghifari', 'Kuningan, 14 Juni 2001', 'Laki-Laki', 'Ancaran', '0864536457465', 'Hubungan Internasional', 'Universitas Muhammadiyah Yogyakarta', '2019', 0),
(6, 'Muhamad Rafli Alfawwazi', 'Kuningan, 14 juni', 'Laki-laki', 'Ciawi', '083456756475', 'Manajemen', 'Universitas Teknologi Yogyakarta', '2019', 0),
(7, 'Alfi Herdika Firmansyah', 'Kuningan, 16 Mei 1999', 'Laki-laki', 'Cilimus', '083456756475', 'Psikologi', 'Universitas Teknologi Yogyakarta', '2018', 0),
(15, 'Fabian Karimi El Zaman', 'Kuningan, 16 November 2003', 'Laki-laki', 'Jalan Ajid No. 4', '0864536457465', 'Ilmu Pemerintahan', 'Universitas Muhammadiyah Yogyakarta', '2020', 0),
(16, 'Aulia Rahma Fadhillah', 'Kuningan, 16 Mei 1999', 'Perempuan', 'Ancaran', '083456756475', 'Kesehatan Masyarakat', 'Universitas Muhammadiyah Yogyakarta', '2018', 0),
(17, 'Deya Aprilia Noviyanti Putri Sumira', 'Kuningan, 15 Juli 2000', 'Perempuan', 'Kadugede', '087645325411', 'Kimia Murni', 'Universitas Islam Indonesia', '2018', 0),
(18, 'Fajar Ansori K. W', 'Kuningan, 23 September 2000', 'Laki-laki', 'Cibingbin', '083154976547', 'Infromatika', 'Universitas Teknologi Yogyakarta', '2018', 0),
(21, 'Galih Taufiqulhakim', 'Kuningan, 14 Juni 2002', 'Laki-Laki', 'Citangtu', '083456756475', 'Farmasi', 'Universitas Islam Indonesia', '2020', 0),
(22, 'Gerardus Pranata Gentara Pramuditha', 'Kuningan, 14 Juni 2002', 'Laki-Laki', 'Cigugur', '0864536457465', 'Filsafat', 'Universitas Gajah Mada', '2020', 0),
(23, 'Ghofur Cucuaniago', 'Kuningan, 17 Maret 2000', 'Laki-laki', 'Cigintung', '084563787654', 'Hubungan Internasional', 'Universitas Teknologi Yogyakarta', '2018', 0),
(26, 'Wintan Rodiah', 'Kuningan, 18 Juni 2001', 'Perempuan', 'Ancaran', '0864536457465', 'Psikologi', 'Universitas Islam Indonesia', '2019', 0),
(27, 'Yasir', 'Kuningan, 26 Juni 2001', 'Laki-laki', 'Ciawi', '083456756475', 'Infromatika', 'Universitas Teknologi Yogyakarta', '2018', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` int(40) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) DEFAULT NULL,
  `ttl` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(40) DEFAULT NULL,
  `alamat_kuningan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(40) NOT NULL,
  `jurusan` varchar(40) DEFAULT NULL,
  `universitas` varchar(40) DEFAULT NULL,
  `angkatan` varchar(20) DEFAULT NULL,
  `jabatan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pengurus`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama`, `ttl`, `jenis_kelamin`, `alamat_kuningan`, `no_hp`, `jurusan`, `universitas`, `angkatan`, `jabatan`) VALUES
(1, 'Ghofur Cucuaniago', 'Kuningan, 17 Maret 2000', 'Laki-laki', 'Cigadung', '087645325432', 'Hubungan Internasional', 'Universitas Teknologi Yogyakarta', '2018', 'Ketua Umum'),
(2, 'Alfi Herdika Firmansyah', 'Kuningan, 16 Mei 1999', 'Laki-laki', 'Cilimus', '084563787654', 'Psikologi', 'Universitas Teknologi Yogyakarta', '2018', 'Sekretaris Jenderal'),
(3, 'Rifqy Arief Nugraha', 'Kuningan, 14 Juni 2001', 'Laki-laki', 'Ancaran', '083456756475', 'Psikologi', 'Universitas Muhammadiyah Yogyakarta', '2019', 'Sekretaris 2'),
(5, 'Putri Dwi Nurhanisa', 'Kuningan, 16 November 2001', 'Perempuan', 'Ancaran', '084563787654', 'Manajemen', 'Universitas Muhammadiyah Yogyakarta', '2019', 'Bendahara 1'),
(6, 'Jasmine Aulia Saputri', 'Kuningan, 14 Juni 2001', 'Perempuan', 'Ancaran', '084563787654', 'Teknik Geometri', 'Universitas Gajah Mada', '2019', 'Bendahara 2'),
(7, 'Bagja Pamungkas', 'Kuningan, 16 November 2003', 'Laki-laki', 'Ancaran', '083456756475', 'Pendidikan Olahraga', 'Universitas Negeri Yogyakarta', '2019', 'Koordinator Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama`, `isi`, `gambar`) VALUES
(1, 'Apa itu IPMK Yogyakarta?', 'IPMK Yogyakarta yang merupakan singkatan dari Ikatan Pelajar & Mahasiswa Kuningan - Yogyakarta yaitu salah satu dari sekian banyak organisasi kedaerahan yang ada di Yogyakarta dan  memiliki fungsi sebagai wadah bagi mahasiswa Kuningan – Jawa Barat agar bisa saling bertukar pikiran ataupun saling membuka ide-ide, aspirasi untuk kepentingan Kuningan – Jawa Barat khususnya, umumnya untuk mahasiswa Kuningan – Jawa Barat itu sendiri. IPMK Yogyakarta mengedepankan azas kekeluargaan, yaitu segala kegiatan mengutamakan untuk kepentingan bersama bukan kepentingan pribadi. Dan IPMK Yogyakarta ini mempunyai asrama mahasiswa putra, yang bertujuan untuk memfasilitasi mahasiswa Kuningan yang sedang menempuh di Yogyakarta agar mahasiswa Kuningan di Yogyakarta dapat berkumpul di asrama mahasiswa putra IPMK Yogyakarta ini.', 'profil/rsz_img_1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

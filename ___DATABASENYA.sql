-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 10 Jun 2015 pada 05.59
-- Versi Server: 5.5.42-cll
-- Versi PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `u` varchar(20) NOT NULL,
  `p` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`u`, `p`) VALUES
('admin', 'ADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `id_daftar` int(5) NOT NULL AUTO_INCREMENT,
  `s_nama` varchar(150) NOT NULL,
  `s_jk` int(1) NOT NULL,
  `s_agama` int(1) NOT NULL,
  `s_tmp_lahir` varchar(100) NOT NULL,
  `s_tgl_lahir` date NOT NULL,
  `s_alamat` varchar(200) NOT NULL,
  `s_stat_anak` int(1) NOT NULL,
  `s_anak_ke` int(2) NOT NULL,
  `s_jum_sdr` int(2) NOT NULL,
  `k_nama_ay` varchar(100) NOT NULL,
  `k_pend_ay` int(1) NOT NULL,
  `k_pkj_ay` int(1) NOT NULL,
  `k_nama_ib` varchar(100) NOT NULL,
  `k_pend_ib` int(1) NOT NULL,
  `k_pkj_ib` int(1) NOT NULL,
  `thn_lulus` year(4) NOT NULL,
  `no_ijazah` varchar(25) NOT NULL,
  `sc_asal_skl` varchar(100) NOT NULL,
  `sc_status` int(11) NOT NULL,
  `sc_alamat` varchar(150) NOT NULL,
  `sc_kepsek` varchar(100) NOT NULL,
  `nil_1_bing` float NOT NULL,
  `nil_2_bind` float NOT NULL,
  `nil_3_mtk` float NOT NULL,
  `nil_4_ipa` float NOT NULL,
  `nil_pres1_nama` varchar(100) NOT NULL,
  `nil_pres1_tkt` int(1) NOT NULL,
  `nil_pres1` float NOT NULL,
  `nil_pres2_nama` varchar(100) NOT NULL,
  `nil_pres2_tkt` int(11) NOT NULL,
  `nil_pres2` float NOT NULL,
  `nil_pres3_nama` varchar(100) NOT NULL,
  `nil_pres3_tkt` int(1) NOT NULL,
  `nil_pres3` float NOT NULL,
  `nil_seleksi` float NOT NULL,
  `jrsn_pil1` int(2) NOT NULL,
  `jrsn_pil2` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  `u` varchar(20) NOT NULL,
  `p` varchar(20) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `s_hp` varchar(100) NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `penghasilan` varchar(100) NOT NULL,
  `o_hp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_agama`
--

CREATE TABLE IF NOT EXISTS `t_agama` (
  `id_agama` int(1) NOT NULL AUTO_INCREMENT,
  `agama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_agama`
--

INSERT INTO `t_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Katolik'),
(3, 'Kristen Protestan'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan`
--

CREATE TABLE IF NOT EXISTS `t_jurusan` (
  `id_jur` int(2) NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jur`, `jurusan`) VALUES
(2, 'Teknik Komputer dan Jaringan'),
(3, 'Teknik Elektronika Industri'),
(4, 'Akuntansi'),
(5, 'Teknik Kendaraan Ringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penddk`
--

CREATE TABLE IF NOT EXISTS `t_penddk` (
  `id_penddk` int(2) NOT NULL AUTO_INCREMENT,
  `penddk` varchar(30) NOT NULL,
  PRIMARY KEY (`id_penddk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `t_penddk`
--

INSERT INTO `t_penddk` (`id_penddk`, `penddk`) VALUES
(1, 'Tidak Sekolah'),
(2, 'SD/MI'),
(3, 'SMP/MTs'),
(4, 'SMA/SMK/MAN'),
(5, 'Diploma'),
(6, 'Sarjana'),
(7, 'S-2'),
(9, 'S-3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pkj`
--

CREATE TABLE IF NOT EXISTS `t_pkj` (
  `id_pkj` int(2) NOT NULL AUTO_INCREMENT,
  `pkj` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pkj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `t_pkj`
--

INSERT INTO `t_pkj` (`id_pkj`, `pkj`) VALUES
(1, 'Tani'),
(2, 'Karyawan Swasta'),
(3, 'Wiraswasta'),
(4, 'PNS'),
(5, 'TNI/Polri'),
(6, 'Perangkat Desa'),
(7, 'Buruh'),
(8, 'Nelayan'),
(10, 'IRT (Ibu Rumah Tangga)'),
(11, 'Lain-lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prestasi`
--

CREATE TABLE IF NOT EXISTS `t_prestasi` (
  `id_prestasi` int(1) NOT NULL AUTO_INCREMENT,
  `prestasi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_prestasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_prestasi`
--

INSERT INTO `t_prestasi` (`id_prestasi`, `prestasi`) VALUES
(1, 'Kabupaten'),
(2, 'Provinsi'),
(3, 'Nasional'),
(4, 'Internasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sekolah`
--

CREATE TABLE IF NOT EXISTS `t_sekolah` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `flag` int(1) NOT NULL,
  `beranda` longtext NOT NULL,
  `prosedur` longtext NOT NULL,
  `admin` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_sekolah`
--

INSERT INTO `t_sekolah` (`id`, `nama_sekolah`, `alamat`, `tahun_ajaran`, `kepsek`, `logo`, `flag`, `beranda`, `prosedur`, `admin`) VALUES
(1, 'MTs N Sidoharjo', 'Sumoroto, Sidoharjo, Samigaluh, Kulonprogo', '2015/2016', 'DRS. SUKARLAN', 'logo.jpg', 1, '<font size="4"><b>Selamat Datang di Penerimaan Siswa Baru MTs Negeri Sidoharjo Tahun Ajaran 2015/2016</b></font>															', 'Prosedur Penerimaan Siswa baru adalah sebagai berikut :<br>1. Mengisi formulir pendaftaran secara online.<br>2. Ijazah asli dan foto copy yang dilegalisir.<br>3. SKHUN asli dan foto copy yang dilegalisir.<br>4. Pas photo 3x4<br>', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_skolah`
--

CREATE TABLE IF NOT EXISTS `t_skolah` (
  `id_skolah` int(3) NOT NULL AUTO_INCREMENT,
  `skolah` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  PRIMARY KEY (`id_skolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_skolah`
--

INSERT INTO `t_skolah` (`id_skolah`, `skolah`, `status`, `alamat`, `kepsek`) VALUES
(1, 'SDN Sumoroto', 1, 'Sumoroto, Sidoharjo, Samigaluh', 'Drs. Tulus');

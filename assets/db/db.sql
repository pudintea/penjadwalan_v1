
--
-- Database: `sislimalicu`
-- Author	: Pudin Saepudin Ilham
-- Email	: najzmitea@gmail.com
-- Telpon	: 083820436185 - 081381729540
-- Tanggal 	: 01 Agustus 2017.
-- Team		: Humas dan IT Al-Azhar
--

-- --------------------------------------------------------

--
-- Table structure for table `data_lembur`
-- Tambahan : Tb status ( apakah Hari kerja atau hari libur ), Jumlah di bayar, yaitu 1% dari gajih poko ( HL ) 0,5% dari gajih poko ( HK ),
--

CREATE TABLE `data_member` (
  `id_member` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_nama` varchar(200) NOT NULL,
  `member_jabatan` varchar(200) NOT NULL,
  `member_bagian` tinyint(6) unsigned NOT NULL,
  `member_subag` tinyint(6) unsigned NOT NULL,
  `member_tgl_input` datetime NOT NULL,
  `member_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal`
--

CREATE TABLE IF NOT EXISTS `data_jadwal` (
  `id_jadwal` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jadwal_kode_hari` smallint(1) NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `jadwal_kegiatan` text NOT NULL,
  `jadwal_tempat` varchar(250) NOT NULL,
  `jadwal_waktu` varchar(100) NOT NULL,
  `jadwal_bagian` int(11) unsigned NOT NULL,
  `jadwal_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jadwal_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_jadwal`);
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal`
--

CREATE TABLE IF NOT EXISTS `data_jadwal` (
  `id_jadwal` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jadwal_kode_hari` smallint(1) NOT NULL,
  `jadwal_id_member` int(11) unsigned NOT NULL,
  `jadwal_tanggal` date NOT NULL,
  `jadwal_kegiatan` text NOT NULL,
  `jadwal_tempat` varchar(250) NOT NULL,
  `jadwal_waktu` varchar(100) NOT NULL,
  `jadwal_bagian` int(11) unsigned NOT NULL,
  `jadwal_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jadwal_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- VIEWS
--

CREATE VIEW data_view_jadwal
AS
SELECT tb1.id_jadwal, tb1.jadwal_kode_hari, tb1.jadwal_id_member, tb1.jadwal_tanggal, tb1.jadwal_tempat, tb1.jadwal_kegiatan,
tb1.jadwal_waktu,
tb2.id_member, tb2.member_nama
FROM data_jadwal tb1
LEFT JOIN data_member tb2 ON tb1.jadwal_id_member = tb2.id_member;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_nama_user` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_level` tinyint(2) unsigned NOT NULL,
  `user_status` tinyint(2) unsigned NOT NULL,
  `user_bagian` tinyint(6) unsigned NOT NULL,
  `user_subag` tinyint(6) unsigned NOT NULL,
  `user_foto` varchar(100) NOT NULL,
  `user_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `user_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`user_nama_user`, `user_username`, `user_email`, `user_password`, `user_level`, `user_status`, `user_bagian`, `user_subag`, `user_foto`, `user_jk`, `user_tgl_edit`, `user_tgl_input`) VALUES
('Pudin Saepudin Ilham', 'pudintea', '', '339c1bb162cc0e43431d72bbb2af03ef', 0, 0, 0, 0, '', '', '2018-07-06 07:33:08', '0000-00-00 00:00:00'),
('Administrator', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 0, 0, 0, 0, '', '', '2018-07-06 07:44:47', '0000-00-00 00:00:00');


-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--


CREATE TABLE `data_lembur` (
  `id_lembur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lembur_id_user` int(11) NOT NULL,
  `lembur_hari` varchar(10) NOT NULL,
  `lembur_tanggal` date NOT NULL,
  `lembur_j_mulai` time NOT NULL,
  `lembur_j_selesai` time NOT NULL,
  `lembur_jumlah_jam` tinyint(2) NOT NULL,
  `lembur_kegiatan` text NOT NULL,
  `lembur_status` tinyint(2) NOT NULL DEFAULT '1',
  `lembur_hk_hl` tinyint(2) NOT NULL,
  `lembur_j_dibayar` int(11) NOT NULL,
  `lembur_tgl_input` datetime NOT NULL,
  `lembur_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_lembur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `data_libur`
--

CREATE TABLE IF NOT EXISTS `data_libur` (
  `id_libur` int(11) NOT NULL AUTO_INCREMENT,
  `libur_id_user` int(11) NOT NULL,
  `libur_hari` varchar(8) NOT NULL,
  `libur_tanggal` date NOT NULL,
  `libur_j_datang` time NOT NULL,
  `libur_j_pulang` time NOT NULL,
  `libur_kegiatan` text NOT NULL,
  `libur_status` int(2) NOT NULL DEFAULT '1',
  `libur_tgl_input` datetime NOT NULL,
  `libur_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_libur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ketidakhadiran`
--

CREATE TABLE IF NOT EXISTS `data_ketidakhadiran` (
  `id_ketidakhadiran` int(11) NOT NULL AUTO_INCREMENT,
  `kth_id_user` int(11) NOT NULL,
  `kth_hari` varchar(10) NOT NULL,
  `kth_tanggal` date NOT NULL,
  `kth_status` varchar(15) NOT NULL,
  `kth_kstatus` int(2) NOT NULL DEFAULT '1',
  `kth_keterangan` varchar(500) NOT NULL,
  `kth_tgl_input` datetime NOT NULL,
  `kth_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ketidakhadiran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Table structure for table `data_bagian`
--

CREATE TABLE IF NOT EXISTS `data_direktur` (
  `id_direktur` int(11) NOT NULL AUTO_INCREMENT,
  `direktur_nama` varchar(100) NOT NULL,
  `direktur_type` varchar(50) NOT NULL DEFAULT 'Direktur',
  `direktur_tgl_input` datetime NOT NULL,
  `direktur_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_direktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------------------------------------------------------------

--
-- Table structure for table `data_bagian`
--

CREATE TABLE IF NOT EXISTS `data_bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(100) NOT NULL,
  `bagian_tgl_input` datetime NOT NULL,
  `bagian_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `data_bagian` (`id_bagian`, `nama_bagian`) VALUES
(1, 'Humas dan IT');

-- --------------------------------------------------------

--
-- Table structure for table `Data_level`
--

CREATE TABLE IF NOT EXISTS `data_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(100) NOT NULL,
  `level_tgl_input` datetime NOT NULL,
  `level_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `data_level` (`id_level`, `nama_level`) VALUES
(1, 'Staff'),
(2, 'Kasubag'),
(3, 'Admin'),
(4, 'Kabag');

-- --------------------------------------------------------

--
-- Table structure for table `data_subag`
--

CREATE TABLE IF NOT EXISTS `data_subag` (
  `id_subag` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagian` tinyint(4) NOT NULL,
  `nama_subag` varchar(100) NOT NULL,
  `subag_tgl_input` datetime NOT NULL,
  `subag_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subag`
--

INSERT INTO `data_subag` (`id_subag`, `id_bagian`, `nama_subag`) VALUES
(1, 1, 'Humas'),
(2, 1, 'IT'),
(3, 1, 'Humas dan IT');



--
-- Table structure for table `user`
-- Tambahan : tb gaji poko,
-- Tambah : id_users awalnya NIP primary key
-- Tambah : Admin Print
--
CREATE TABLE `data_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_nip_user` int(11) unsigned NOT NULL,
  `user_nama_user` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_level` tinyint(2) NOT NULL,
  `user_bagian` tinyint(6) NOT NULL,
  `user_subag` tinyint(6) NOT NULL,
  `user_foto` varchar(100) NOT NULL,
  `user_j_kelamin` tinyint(2) NOT NULL,
  `user_gaji_poko` int(11) unsigned NOT NULL,
  `user_admin_print` tinyint(2) NOT NULL DEFAULT '1',
  `user_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_tgl_input` datetime NOT NULL,
   PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `data_user` (`user_nip_user`, `user_nama_user`, `user_username`, `user_password`, `user_level`, `user_bagian`, `user_subag`, `user_foto`, `user_j_kelamin`, `user_gaji_poko`) VALUES
(111111111, 'Admin Lembur', 'admin@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 3, 0, 0, '', 0,'1331000'),
(201021153, 'Mohammad Noeseir', 'noeseir@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 2, 1, 1, 'assets/img/humasit/noeseir.jpg', 2,'1331000'),
(202152115, 'Muhamad Maruf', 'maruf@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 2, 'assets/img/humasit/maruf.jpg', 2,'1331000'),
(202152116, 'Pudin Saepudin Ilham', 'pudin@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 2, 'assets/img/humasit/pudin.jpg', 2,'1331000'),
(202152117, 'Novaldi Rahmatdiansyah', 'noval@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 1, 'assets/img/humasit/noval.jpg', 2,'1331000'),
(202152118, 'Muhammad Firmansyah', 'firman@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 1, 'assets/img/humasit/firman.jpg', 2,'1331000'),
(202152119, 'Hilma', 'hilma@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 1, 'assets/img/humasit/hilma.jpg', 1,'1331000'),
(202152120, 'Annisa Puti Az Zahra', 'annisa@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 1, 'assets/img/humasit/ibuNisa.jpg', 1,'1331000'),
(202960530, 'Tubagus Adji Darma', 'ama@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 2, 1, 2, 'assets/img/humasit/ama.jpg', 2,'1331000'),
(209122003, 'Bhayu Aditya Prihantoro', 'bhayu@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 2, 'assets/img/humasit/pakbhayu2.jpeg', 2,'1331000'),
(209142117, 'Tuti Alawiyah', 'tuty@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 1, 'assets/img/humasit/tuty.jpg', 1,'1331000'),
(209990872, 'Damarahmad Setiobudi', 'damar@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 4, 1, 3, 'assets/img/humasit/damarahmad.jpg', 2,'1331000'),
(309041500, 'Dony Sutrisno', 'dony@al-azhar.or.id', '2c3b21144acf77f790db01802e6b5d5d', 1, 1, 2, 'assets/img/humasit/doni.jpg', 2,'1331000'),
(510990986, 'Isya Syamsudin', 'isya@al-azhar.or.id', '339c1bb162cc0e43431d72bbb2af03ef', 1, 1, 1, 'assets/img/humasit/isya.jpg', 2,'1331000');



--
-- // ============================================== VIEWS DB ===============================================================================================================
--

--
-- [ Hanya Contoh ] contoh lagi Lengkap banget dan bisa.
--
CREATE VIEW view_laporan
AS
SELECT tb1.trans_id, tb1.trans_tanggal, tb1.trans_kode_barang, tb1.trans_stok_awal, tb1.trans_stok_akhir, tb1.trans_jumlah_bk,
tb1.trans_jumlah_bm, tb1.trans_harga_satuan, tb1.trans_biaya_kirim, tb1.trans_total_harga, tb1.trans_Npenerima_bk,
tb1.trans_keterangan, tb1.trans_id_suplier_bm, tb1.trans_id_unit_bk, tb1.trans_id_sub_unit_bk, tb1.trans_id_bm_bk,
tb2.nama_barang, tb2.satuan_barang,
tb3.nama_pjawab, tb3.nama_perusahaan,
tb4.nama_sub_unit, tb4.id_unit
FROM tb_trans_barang tb1
LEFT JOIN tb_barang tb2 ON tb1.trans_kode_barang = tb2.kode_barang
LEFT JOIN tb_suplier tb3 ON tb1.trans_id_suplier_bm = tb3.id_suplier
LEFT JOIN tb_sub_unit tb4 ON tb1.trans_id_sub_unit_bk = tb4.id_sub_unit;


--
-- Gabungan antara tabel data_user, data_subag, data_bagian dan data_level 
--

CREATE VIEW data_view_user
AS
SELECT tb1.id_user, tb1.user_nip_user, tb1.user_nama_user, tb1.user_username, tb1.user_password, tb1.user_level, tb1.user_bagian, tb1.user_subag, tb1.user_foto, tb1.user_j_kelamin, tb1.user_gaji_poko,
tb2.id_subag, tb2.nama_subag,
tb3.id_bagian, tb3.nama_bagian,
tb4.id_level, tb4.nama_level
FROM data_user tb1
LEFT JOIN data_subag tb2 ON tb1.user_subag = tb2.id_subag
LEFT JOIN data_bagian tb3 ON tb1.user_bagian = tb3.id_bagian
LEFT JOIN data_level tb4 ON tb1.user_level = tb4.id_level;

--
-- # View data lembur, gabungan tabel antara lembur dan user #
--
-- `id_lembur`, `lembur_id_user`, `lembur_hari`, `lembur_tanggal`, `lembur_j_mulai`, `lembur_j_selesai`, `lembur_jumlah_jam`, `lembur_kegiatan`,
-- `lembur_status`, `lembur_hk_hl`, `lembur_j_dibayar`, `lembur_tgl_input`, `lembur_tgl_edit`
--
--`id_user`, `user_nip_user`, `user_nama_user`, `user_username`, `user_password`, `user_level`, `user_bagian`, `user_subag`,
-- `user_foto`, `user_j_kelamin`, `user_gaji_poko`, `user_admin_print`, `user_tgl_edit`, `user_tgl_input`
--
-- `id_lembur`, `lembur_id_user`, `lembur_hari`, `lembur_tanggal`, `lembur_j_mulai`, `lembur_j_selesai`, `lembur_jumlah_jam`, `lembur_kegiatan`, `lembur_status`, `lembur_hk_hl`, `lembur_j_dibayar`, `id_user`, `user_nip_user`, `user_nama_user`, `user_bagian`, `user_subag`, `user_gaji_poko`, `user_admin_print`
--

CREATE VIEW data_view_lembur
AS
SELECT tb1.id_lembur, tb1.lembur_id_user, tb1.lembur_hari, tb1.lembur_tanggal, tb1.lembur_j_mulai, tb1.lembur_j_selesai, tb1.lembur_jumlah_jam, tb1.lembur_kegiatan,
tb1.lembur_status, tb1.lembur_hk_hl, tb1.lembur_j_dibayar,
tb2.id_user, tb2.user_nip_user, tb2.user_nama_user, tb2.user_bagian, tb2.user_subag, tb2.user_gaji_poko, tb2.user_level
FROM data_lembur tb1
JOIN data_user tb2 ON tb1.lembur_id_user = tb2.id_user;



--
-- # View data libur, gabungan tabel antara libur dan user #
--
--`id_libur`, `libur_id_user`, `libur_hari`, `libur_tanggal`,
-- `libur_j_datang`, `libur_j_pulang`, `libur_kegiatan`, `libur_status`, `libur_tgl_input`, `libur_tgl_edit`
--
--`id_user`, `user_nip_user`, `user_nama_user`, `user_username`, `user_password`, `user_level`, `user_bagian`, `user_subag`,
-- `user_foto`, `user_j_kelamin`, `user_gaji_poko`, `user_admin_print`, `user_tgl_edit`, `user_tgl_input`
--

CREATE VIEW data_view_libur
AS
SELECT tb1.id_libur, tb1.libur_id_user, tb1.libur_hari, tb1.libur_tanggal,
tb1.libur_j_datang, tb1.libur_j_pulang, tb1.libur_kegiatan, tb1.libur_status,
tb2.id_user, tb2.user_nip_user, tb2.user_nama_user, tb2.user_bagian, tb2.user_subag, tb2.user_level
FROM data_libur tb1
JOIN data_user tb2 ON tb1.libur_id_user = tb2.id_user;


--
--  View data ketidakhadiran, gabungan tabel antara ketidakhadiran dan user #
--
-- `id_ketidakhadiran`, `kth_id_user`, `kth_hari`, `kth_tanggal`, `kth_status`, `kth_kstatus`, `kth_keterangan`, `kth_tgl_input`, `kth_tgl_edit`
--
--`id_user`, `user_nip_user`, `user_nama_user`, `user_username`, `user_password`, `user_level`, `user_bagian`, `user_subag`,
-- `user_foto`, `user_j_kelamin`, `user_gaji_poko`, `user_admin_print`, `user_tgl_edit`, `user_tgl_input`
--

CREATE VIEW data_view_ketidakhadiran
AS
SELECT tb1.id_ketidakhadiran, tb1.kth_id_user, tb1.kth_hari, tb1.kth_tanggal, tb1.kth_status, tb1.kth_kstatus, tb1.kth_keterangan,
tb2.id_user, tb2.user_nip_user, tb2.user_nama_user, tb2.user_bagian, tb2.user_subag, tb2.user_level
FROM data_ketidakhadiran tb1
JOIN data_user tb2 ON tb1.kth_id_user = tb2.id_user;



/*
* `nip_user`, `nama_user`, `username`, `password`, `level`, `bagian`, `subag`, `foto`, `j_kelamin`, `id_subag`, `nama_subag`, `id_bagian`, `nama_bagian`, `id_level`, `nama_level
* 'nip_user', 'nama_user', 'username', 'password', 'level', 'bagian', 'subag', 'foto', 'j_kelamin'
* 'nip_user, nama_user, username, foto, nama_subag, nama_bagian, nama_level'
*
*/








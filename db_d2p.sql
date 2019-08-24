-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 08:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_d2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `id_parent` int(2) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `url` varchar(70) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `AI` int(11) NOT NULL,
  `dropdown` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_parent`, `icon`, `nama_menu`, `url`, `is_active`, `AI`, `dropdown`) VALUES
(1, 0, 'icon-home icon-white', 'Home', 'index.php/admin', 'Y', 1, 'N'),
(2, 0, 'icon-book icon-white', 'Request D2P', 'index.php/request_d2p/request_d2p_list', 'Y', 2, 'N'),
(3, 0, 'icon-tag icon-white', 'View Request', 'index.php/view_requestd2p/view_requestd2p_list', 'Y', 3, 'N'),
(5, 0, 'icon-home icon-white', 'Master', '', 'Y', 4, 'Y'),
(6, 5, '', 'Data Departement', 'index.php/master_data/master_data_departemen', 'Y', 5, 'N'),
(7, 5, '', 'Data Divisi', 'index.php/master_divisi/master_data_divisi', 'Y', 6, 'N'),
(8, 5, '', 'Role Access', 'index.php/m_role_access/master_role_access', 'Y', 7, 'N'),
(9, 5, '', 'Data User', 'index.php/m_data_user/master_user', 'Y', 8, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(2) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id_status`, `status_name`) VALUES
(1, 'Draft'),
(2, 'Waiting Approval Manager User'),
(3, 'Waiting Approval Manager Operation'),
(4, 'Waiting Approval GM Operation'),
(5, 'Approved GM Operation'),
(6, 'Reject by Manager'),
(7, 'Reject by Manager Operation'),
(8, 'Reject by GM Operation');

-- --------------------------------------------------------

--
-- Table structure for table `ref_klasifikasi`
--

CREATE TABLE `ref_klasifikasi` (
  `id` int(4) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_klasifikasi`
--

INSERT INTO `ref_klasifikasi` (`id`, `kode`, `nama`, `uraian`) VALUES
(1, '1', 'Berry', 'NPKTOS Cabang Jambi & Cirebon'),
(2, '2', 'Rola', 'NPKTOS Cabang Banten & Panjang');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(6) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `indek_berkas` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `dari` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id`, `kode`, `no_agenda`, `indek_berkas`, `isi_ringkas`, `dari`, `no_surat`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `pengolah`) VALUES
(1, 'HM', '	0001', 'data', 'Permintaan data kebutuhan tenaga medis Tahun 2019', 'Klinik Kesehatan Kost Wisma Melati', 'Par/HM.01/100/2019', '2019-05-22', '2019-05-24', '', 'Tes_Upload_file1.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE `tb_departemen` (
  `id_dep` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_dep`, `id_divisi`, `nama_departemen`) VALUES
(1, 1, 'O&M Application Platform and Database'),
(2, 1, 'Customer Care'),
(3, 2, 'System Development'),
(4, 2, 'System Integration'),
(5, 3, 'Port Solution'),
(6, 3, 'E-Payment Solution');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Operation and Service Delivery'),
(2, 'System Development and Integration'),
(3, 'Product Management');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dok` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `dokumen` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karayawan`
--

CREATE TABLE `tb_karayawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_dep` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_devisi` int(11) NOT NULL,
  `nama_kar` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role_access`
--

CREATE TABLE `tb_role_access` (
  `id_role_access` int(11) NOT NULL,
  `role_access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role_access`
--

INSERT INTO `tb_role_access` (`id_role_access`, `role_access`) VALUES
(1, 'ADMIN'),
(2, 'STAFF'),
(3, 'MANAGER'),
(4, 'GENERAL MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_karyawan` varchar(8) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL,
  `id_role_access` int(2) NOT NULL,
  `id_divisi` int(2) NOT NULL,
  `id_dep` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_karyawan`, `user_name`, `password`, `id_user`, `realname`, `email`, `status`, `id_role_access`, `id_divisi`, `id_dep`) VALUES
('11941124', 'rolasetiaputra', '24111994', 1, 'Rola Setia Putra', 'rola@ilcs.co.id', 'ACTIVE', 1, 1, 1),
('19055050', 'faizsatria', '66464646', 2, 'Faiz Satria', 'faiz@ilcs.co.id', 'ACTIVE', 1, 1, 1),
('20192010', 'berrymaulidi', '8181818', 3, 'Berry Maulidi', 'berry@ilcs.co.id', 'DEACTIVE', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_instansi`
--

CREATE TABLE `tr_instansi` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nip_kepsek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_instansi`
--

INSERT INTO `tr_instansi` (`id`, `nama`, `alamat`, `kepsek`, `nip_kepsek`, `logo`) VALUES
(1, 'ILCS', 'Telkom Plaza North Jakarta\r\n4th Floor. Yos Sudarso 22-24,\r\nTanjung Priok North Jakarta,\r\nIndonesia. ', '', '', 'logo ILCS.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tr_request`
--

CREATE TABLE `tr_request` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `project_manager` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `req_date` date NOT NULL,
  `created_date` date NOT NULL,
  `status_req` varchar(5) NOT NULL,
  `update_date` date DEFAULT NULL,
  `id_upload_file` int(11) NOT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_request`
--

INSERT INTO `tr_request` (`id`, `name`, `project_name`, `project_id`, `project_manager`, `keterangan`, `req_date`, `created_date`, `status_req`, `update_date`, `id_upload_file`, `created_by`) VALUES
(1, 'ROLA', 'NPKTOS BANTEN', '123456789', 'NICO', 'PATCH1', '2019-07-05', '0000-00-00', '8', '0000-00-00', 1, 1),
(2, 'BERRY', 'BARU', 'BERRY', 'BERRY', 'BEBRRY ', '2019-07-06', '0000-00-00', '8', '0000-00-00', 2, 1),
(3, 'REGIA', 'REGIA BARU', 'SDSDS', 'SDSDS', 'BARU', '2019-07-03', '2019-07-25', '8', '0000-00-00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_upload_file`
--

CREATE TABLE `tr_upload_file` (
  `id` int(11) NOT NULL,
  `upload_file1` varchar(50) NOT NULL,
  `upload_file2` varchar(50) NOT NULL,
  `upload_file3` varchar(50) NOT NULL,
  `upload_file4` varchar(50) NOT NULL,
  `upload_file5` varchar(50) NOT NULL,
  `upload_file6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_upload_file`
--

INSERT INTO `tr_upload_file` (`id`, `upload_file1`, `upload_file2`, `upload_file3`, `upload_file4`, `upload_file5`, `upload_file6`) VALUES
(1, 'rola1.jpg', 'rola2.jpg', 'rola3.jpg', 'rola4.jpg', 'rola5.jpg', 'rola6.jpg'),
(2, 'berry1.jpg', 'berry2.jpg', 'berry3.jpg', 'berry4.jpg', 'berry5.jpg', 'berry6.jpg'),
(3, 'regia1.jpg', 'regia2.jpg', 'regia3.jpg', 'regia4.jpg', 'regia5.jpg', 'regia6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `level` enum('Super Admin','Admin') NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_role_access` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `nama`, `nip`, `level`, `id_karyawan`, `email`, `status`, `id_role_access`, `id_divisi`, `id_dep`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '11941124', 'Super Admin', 11941124, 'admin@ilcs.co.id', 'Active', 1, 1, 1),
(2, 'rola', '21232f297a57a5a743894a0e4a801fc3', 'Rola Setia', '11941124', 'Super Admin', 11941124, 'rola@ilcs.co.id', 'Active', 1, 1, 1),
(3, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Administrator 1', '199003262017011001', 'Admin', 0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_disposisi`
--

CREATE TABLE `t_disposisi` (
  `id` int(6) NOT NULL,
  `id_surat` int(6) NOT NULL,
  `kpd_yth` varchar(250) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` enum('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu') NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_keluar`
--

CREATE TABLE `t_surat_keluar` (
  `id` int(6) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_surat_keputusan`
--

CREATE TABLE `t_surat_keputusan` (
  `id` int(6) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `tahun` varchar(7) NOT NULL,
  `tentang` mediumtext NOT NULL,
  `tgl_surat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`AI`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `ref_klasifikasi`
--
ALTER TABLE `ref_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indexes for table `tb_karayawan`
--
ALTER TABLE `tb_karayawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_role_access`
--
ALTER TABLE `tb_role_access`
  ADD PRIMARY KEY (`id_role_access`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tr_instansi`
--
ALTER TABLE `tr_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_request`
--
ALTER TABLE `tr_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_upload_file`
--
ALTER TABLE `tr_upload_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_surat_keputusan`
--
ALTER TABLE `t_surat_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `AI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ref_klasifikasi`
--
ALTER TABLE `ref_klasifikasi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_departemen`
--
ALTER TABLE `tb_departemen`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_request`
--
ALTER TABLE `tr_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_upload_file`
--
ALTER TABLE `tr_upload_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_disposisi`
--
ALTER TABLE `t_disposisi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_surat_keluar`
--
ALTER TABLE `t_surat_keluar`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_surat_keputusan`
--
ALTER TABLE `t_surat_keputusan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

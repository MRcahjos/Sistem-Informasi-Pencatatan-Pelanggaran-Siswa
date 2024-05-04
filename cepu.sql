-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2023 pada 15.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cepu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nik` varchar(90) NOT NULL,
  `guru` varchar(100) NOT NULL,
  `plajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nik`, `guru`, `plajaran`) VALUES
(10, '4336755656300003', 'Purwati, S.Pd', 'Pend. Kimia'),
(11, '7235757658300003', 'Noor Ridlo\'ah, S.Pd', 'Kimia'),
(12, '0000000', 'Mariya Ulfa Septya Ningrum, S.Pd', 'Bahasa Jawa'),
(13, '0641750652300012', 'Sri Suryani,  S.Pd', 'Teknik Mesin'),
(14, '3957759660300102', 'Veronika Yuniastuti, S.S., M.Pd', 'Pend. B. Inggris'),
(15, '000', 'Abdul Aziz, S.Kom', 'Ilmu Komputer'),
(16, '00000000', 'Meilano Abu Reza, S.Kom', 'Produktif TKJ'),
(17, '111', 'Rosyada Putra Adiarnasa, S.Kom', 'Produktif TKJ'),
(18, '8136764666200033', 'Abdul Hanif, M.Pd', 'Matematika'),
(19, '1954762665300022', 'Zunicha Lany Puspita Candra, M.Pd', 'Fisika'),
(20, '5555', 'Azmatun Nafi\'ah, S.Pd', 'B.Jawa'),
(21, '01', 'gurubk', 'bk'),
(22, '001', 'guru', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nama_kls` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `total_poin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `nama_kls`, `jumlah`, `nama_wali`, `total_poin`) VALUES
(19, 'X', 'X-TE-1', 36, 'Purwati, S.Pd', -40),
(20, 'X', 'X-TKR-1', 36, 'Noor Ridlo\'ah, S.Pd', 0),
(21, 'X', 'X-TKR-2', 36, 'Mariya Ulfa Septya Ningrum, S.Pd', 0),
(22, 'X', 'X-TKR-3', 36, 'Sri Suryani,  S.Pd', 0),
(23, 'X', 'X-TJKT-1', 36, 'Veronika Yuniastuti, S.S., M.Pd', 0),
(24, 'X', 'X-TJKT-2', 36, 'Abdul Aziz, S.Kom', 0),
(25, 'X', 'X-TJKT-3', 36, 'Meilano Abu Reza, S.Kom', 0),
(26, 'X', 'X-BP-1', 36, 'Rosyada Putra Adiarnasa, S.Kom', 0),
(27, 'X', 'X-TBSM-1', 36, 'Abdul Hanif, M.Pd', 0),
(28, 'X', 'X-TBSM-2', 36, 'Zunicha Lany Puspita Candra, M.Pd', 0),
(29, 'X', 'X-TM-1', 36, 'Azmatun Nafi\'ah, S.Pd', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketegori`
--

CREATE TABLE `ketegori` (
  `id` int(11) NOT NULL,
  `pelanggaran` varchar(100) NOT NULL,
  `point` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ketegori`
--

INSERT INTO `ketegori` (`id`, `pelanggaran`, `point`) VALUES
(1, 'Rambut Panjang', 5),
(2, 'Sepatu Tidak Hitam', 5),
(3, 'Telat', 5),
(4, 'Tidak Masuk Kelas', 8),
(5, 'Bullying', 10),
(6, 'Ngajak Berantem Kepala Sekolah', 99),
(7, 'Jajan Ke kantin', 5),
(8, 'Tidak Mengerjakan PR', 4),
(9, 'Menghhina Guru', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `pelanggaran_id` int(11) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `wali_id` int(11) NOT NULL,
  `tipe_id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `pelapor` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `point` int(11) NOT NULL,
  `reported_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `username` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `siswa_id` int(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `password`, `username`, `level`, `role_id`, `siswa_id`, `is_active`, `date_created`) VALUES
(6, 'Iqbal', 'def.jpg', '$2y$10$XnAZi7PlHcs/9s0fpk6Saekhn3CQhfWdEGBOfOwM.LXbY2epIKaAG', '201951190', 'Admin', 1, 0, 1, 1606910361),
(2116, 'Veronika Yuniastuti, S.S., M.Pd', 'def.jpg', '$2y$10$v9uYPFFRZXt5pPn69mD49OVjJ4YMwXJDWyfTnFRC23flWDV2.j2OC', 'guru3957759660300102', 'Guru', 2, 0, 1, 1689124925),
(2117, 'gurubk', 'def.jpg', '$2y$10$Fiv7cL.WOcLPt8aEsbmphOXA2cO10SLrtepwl1E.RZPt9BnDfRJvW', 'gurubk01', 'GuruBk', 5, 0, 1, 1689640058);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 1, 4),
(13, 1, 21),
(14, 1, 22),
(16, 2, 21),
(17, 1, 23),
(20, 2, 4),
(23, 4, 24),
(28, 2, 2),
(29, 2, 25),
(30, 0, 24),
(35, 6, 26),
(36, 3, 26),
(39, 1, 27),
(40, 2, 27),
(41, 3, 27),
(42, 4, 27),
(43, 5, 27),
(44, 5, 4),
(45, 5, 23),
(46, 5, 2),
(47, 5, 25),
(48, 5, 5),
(50, 5, 6),
(51, 2, 6),
(52, 5, 29),
(53, 1, 7),
(54, 5, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'GuruBK'),
(6, 'Guru'),
(7, 'Kategori'),
(22, 'Data'),
(23, 'Laporan'),
(24, 'Siswa'),
(26, 'Wali'),
(27, 'Kuisioner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Wali'),
(4, 'Siswa'),
(5, 'Guru BK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt\r\n', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-alt', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(25, 1, 'Role', 'admin/role', 'fas fa-user-tie', 1),
(33, 7, 'Kategori Pelanggaran', 'kategori/index', 'fas fa-tags', 1),
(34, 7, 'List Pelanggaran', 'kategori/pelanggaran', 'fas fa-list', 1),
(35, 22, 'Guru', 'data/index', 'fas fa-user-tie', 1),
(36, 22, 'Kelas', 'data/kelas', 'fas fa-chalkboard-teacher', 1),
(37, 22, 'Siswa', 'data/siswa', 'fas fa-user-graduate', 1),
(38, 1, 'Pengaturan', 'admin/website', 'fas fa-cog', 1),
(39, 23, 'Laporan', 'laporan/index', 'fas fa-poll-h', 1),
(40, 1, 'Pengguna', 'admin/pengguna', 'fas fa-users', 1),
(41, 24, 'Profile Siswa', 'siswa/profil', 'fas fa-address-card', 1),
(42, 24, 'List Pelanggaran', 'siswa/pelanggaran', 'fas fa-list-alt', 1),
(43, 6, 'Siswa', 'guru/siswa', 'fas fa-user-graduate', 1),
(44, 24, 'Laporkan Pelanggaran', 'siswa/PelanggaranAdd', 'fas fa-poll-h', 1),
(45, 26, 'Profile Anak', 'wali/index', 'fas fa-fw fa-user-alt', 1),
(46, 26, 'Pelanggaran Anak', 'wali/pelanggaran', 'fas fa-address-card', 1),
(47, 27, 'Kuisioner', 'kuisioner/index', 'fas fa-clipboard', 1),
(50, 5, 'Dashboard', 'GuruBK/dashboard', 'fas fa-fw fa-tachometer-alt	', 1),
(51, 5, 'Pengaturan', 'GuruBK/index', 'fas fa-cog', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE `wali` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `point` int(111) NOT NULL,
  `school_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id`, `point`, `school_name`) VALUES
(0, 1000, 'Smk Muhammadiyah Kudus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketegori`
--
ALTER TABLE `ketegori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`pelanggaran_id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `wali_id` (`wali_id`),
  ADD KEY `tipe_id` (`tipe_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `ketegori`
--
ALTER TABLE `ketegori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `pelanggaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1518;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2190;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `wali`
--
ALTER TABLE `wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1124;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggaran_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggaran_ibfk_3` FOREIGN KEY (`wali_id`) REFERENCES `wali` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggaran_ibfk_4` FOREIGN KEY (`tipe_id`) REFERENCES `ketegori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `wali_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2023 pada 03.55
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
(19, 'X', 'X-TE-1', 36, 'Purwati, S.Pd', -48),
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

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`pelanggaran_id`, `nisn`, `siswa_id`, `class_id`, `wali_id`, `tipe_id`, `catatan`, `pelapor`, `image`, `point`, `reported_on`) VALUES
(113, '\'2320050930', 1518, 19, 1124, 1, 'Rambut Panjang', 'gurubk', 'IMG_8562-scaled.jpg', 5, '2023-08-02 08:24:42'),
(114, '\'2320050930', 1518, 19, 1124, 2, 'Memakai sepatu tidak hitam', 'Veronika Yuniastuti, S.S., M.Pd', '284990.jpg', 5, '2023-08-05 07:35:53'),
(116, '\'2320050930', 1518, 19, 1124, 7, 'Jajan ke kantin', 'Veronika Yuniastuti, S.S., M.Pd', '677a451e-86c9-4b02-b19f-75590e367c27.jpg', 5, '2023-08-05 08:54:47');

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

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas_id`, `alamat`, `no_telp`) VALUES
(1518, '\'2320050930', 'ABDUL HAKIIM', 19, 'karang malang rt4 rw8 gebog kudus', '\'085727746972'),
(1519, '\'2320061110', 'ABDUL HALIIM', 19, 'karangmalang rt 04 rw 08 gebog kudus', '\'085727746972'),
(1520, '\'0068930705', 'ABDUL MALIK', 19, 'Glantengan RT 02 RW 03, kec.Kota Kudus, Jawa Tengah', '\'081219878684'),
(1521, '\'0069281021', 'AHMAD RIYAN ABDILLAH', 19, 'Karang Sambung, Bae, RT.03/RW.04, Bae, Kudus', '\'081225098745'),
(1522, '\'0072921920', 'ALHAFID DAFFA PUTRA RAMADHAN', 19, 'Getas Pejaten RT.06/RW.03, Jati, Kudus, Jawa Tengah', '\'085713749159'),
(1523, '\'0071989204', 'ANDRIYAS TEGUH PRAYOGO', 19, 'garung lor , rt 11 rw 02', '\''),
(1524, '\'0052729461', 'DIAZ ADRIAN', 19, 'DESA JATI KULON RT4RW5', '\''),
(1525, '\'0072950655', 'FAJAR DARMA RUDITYA', 19, 'Pasuruhan kidul Rt4 Rw3', '\''),
(1526, '\'0078760073', 'FERDINAND SYARIF HIDAYAT', 19, 'loram wetan rt.4/rw.2 jati kudus', '\'085225504676'),
(1527, '\'0079724490', 'FICKY HENDRIANSYAH', 19, 'klisat mijen 7/6 Kaliwunggu kudus', '\'08988933686'),
(1528, '\'2220060212', 'HARRY RAHMAWAN', 19, 'tuwang, kedungdowo,rt / rw 3 , kaliwungu, kudus, jawa tengan', '\''),
(1529, '\'0059997386', 'GILANG REDINO PUTRA', 19, 'Pati Sukolilo', '\''),
(1530, '\'0067198161', 'ILHAM MAULANA RAMADLON', 19, 'KEDUNGDOWO, RT.02/RW.02', '\''),
(1531, '\'2220071221', 'JAYA JAKA', 19, 'kiyongan,karangampel,rt04/rw05,kaliwungu ,kudus, jawa tengah', '\''),
(1532, '\'0073923220', 'KESYA JUNDAN SAFARO', 19, 'Prambatan lor RT 5 RW 1, Kaliwungu, Kudus,Jawa tengah', '\''),
(1533, '\'0073216092', 'MOHAMMAD ANDIKA WISNU PRATAMA', 19, 'Gribig, RT 03 RW 04 Gebog, Kudus', '\'085601479101'),
(1534, '\'0077063840', 'MUHAMMAD ANDIKA ARYANSYA', 19, 'garung lor rt 09 rw 02', '\'085226422085'),
(1535, '\'0076454324', 'MUHAMMAD DANI RIZQI', 19, 'Getassrabi,Gebog,RT.06/RW.06 KUDUS,Jawa Tengah', '\'085728657078'),
(1536, '\'0071373209', 'MUHAMMAD ENGGAR PRABOWO', 19, 'GONDOSARI 006/008 GONDOSARI GEBOG KUDUS, RT/RW 6/8, Kel GONDOSARI, Kec. GEBOG, Kab Kudus, Jawa Tenga', '\'085643518769'),
(1537, '\'0065263190', 'MUHAMMAD FAQIHUDDIN MUTTAQI', 19, 'Gribig muneng Rt.2/ Rw.3 Gebog kudus Jawa tengah', '\'085712995400'),
(1538, '\'0066110055', 'MUHAMMAD FAREL DAFFA SAID AKBAR', 19, 'menawan rt6 rw1 gebog kudus', '\'081382358374'),
(1539, '\'0073135988', 'MUHAMMAD FARUK AL HAQ', 19, 'desa sari rt 07 rw 03 kecamatan gajah kabupaten demak', '\'081918537715'),
(1540, '\'0077908903', 'MUHAMMAD FARUQ HAKIM', 19, 'garung lor rt ; 7 rw ; 2 kaliwungu kudus', '\'08156591164'),
(1541, '\'0071470755', 'MUHAMMAD FATHIR MAULANA', 19, 'gondang manis rt03/rw02', '\'085213115947'),
(1542, '\'0075593298', 'MUHAMMAD RANGGA WIJAYA', 19, 'Bae,Karang Bener,ngelo,rt03/rw07', '\''),
(1543, '\'0057890338', 'MUHAMMAD ROMZANUL HUDA', 19, 'DUKUH GROGOL, RT/RW 6/3, KEL.BAKALAN KRAPYAK, KEC. KALIWUNGU, KAB, KUDUS, Jawa Tengah', '\'082323931057'),
(1544, '\'0067759247', 'MUHAMMAD THORIQ ILHAM', 19, 'GRIBIG, RT.05/RW.01, GEBOG, KUDUS, JAWA TENGAH', '\'085725733102'),
(1545, '\'2220070527', 'MUHAMMAD ZAIDAN ASHSHIDDIQ', 19, 'Gribig,Gebog,RT 05/RW 01, Gebog,KUdus ,Jawa Tengah', '\'08122853597'),
(1546, '\'0076453773', 'MUHAMMAD ZAIDAN FIEKAR', 19, 'Kudus Permai,Garung Lor,RT.04/RW 04,Kaliwungu,Kudus,Jawa Tengah', '\'081466827554'),
(1547, '\'0061442468', 'MUHAMMAD ZAKY FIRDAUS', 19, 'bae rt 04/rw05 kecamatan bae kudus', '\'081327793602'),
(1548, '\'0075103544', 'MUKHAMAD TAUFIQ HIDAYAT', 19, 'JATI WETA RT.02 RW.01 JATI KUDUS', '\'085867761605'),
(1549, '\'0075004417', 'PIPIT AFITTONICO RIO', 19, 'karangampel, RT.04/RW3, Kaliwungu, Kudus, Jawa Tengah', '\'087704731176'),
(1550, '\'2220070217', 'RAVI DIDAN PRAYOGA', 19, 'garung kidul rt 1 rw 1kaliwungu,kudus,jawa tengah', '\'085743671356'),
(1551, '\'0069793415', 'RAFLI ARDIANTO WICAKSONO', 19, 'Gribig, Krajan, RT.01/RW.02, Gebog, Kudus, Jawa Tengah', '\'08122550735'),
(1552, '\'0062498870', 'WAHYU ADJIE NUGRAHA', 19, 'Sunggingan, RT. 3/RW. 3, Sunggingan, Kudus ,Jawa Tengah', '\'087779205968'),
(1553, '\'2220060721', 'YUSUF SOFIYAN', 19, 'prambatan lor', '\'081225245800');

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
(2117, 'gurubk', 'def.jpg', '$2y$10$Fiv7cL.WOcLPt8aEsbmphOXA2cO10SLrtepwl1E.RZPt9BnDfRJvW', 'gurubk01', 'GuruBk', 5, 0, 1, 1689640058),
(2190, 'ABDUL HAKIIM', 'def.jpg', '$2y$10$yLTkXxMrYO7LMr.eRBogP.FAB9aN2liCB.She.ZtSFo.0n84Jeis2', 'siswa\'2320050930', 'Siswa', 4, 1518, 1, 1690939142),
(2191, 'ABDUL HALIIM', 'def.jpg', '$2y$10$hWnUszyp.bzXLFQW4ooDhu1Oj0SeAJowFevLtDyyCyFt5YDukH2mi', 'siswa\'2320061110', 'Siswa', 4, 1519, 1, 1690939143),
(2192, 'ABDUL MALIK', 'def.jpg', '$2y$10$KR9HC9qdCV.PpcbPw.iQMOoLGCRdhzwpOwPllwdbjueKEmNqTp9.m', 'siswa\'0068930705', 'Siswa', 4, 1520, 1, 1690939143),
(2193, 'AHMAD RIYAN ABDILLAH', 'def.jpg', '$2y$10$d.FdxmDwCM0naJL4SsgcueJGwStkBFaDkNI/rkSVeiT65kxA2gJp2', 'siswa\'0069281021', 'Siswa', 4, 1521, 1, 1690939143),
(2194, 'ALHAFID DAFFA PUTRA RAMADHAN', 'def.jpg', '$2y$10$eya60XQDLq5zTSiqHUKdd.qQ8wEBGC1oKFJ8gjCg.MXEw7vh43bjy', 'siswa\'0072921920', 'Siswa', 4, 1522, 1, 1690939143),
(2195, 'ANDRIYAS TEGUH PRAYOGO', 'def.jpg', '$2y$10$wkkTnWJxvHeKbFmPydpmMOjGOO41MKqPoKwcXcR1CIVPVJOrmpjwS', 'siswa\'0071989204', 'Siswa', 4, 1523, 1, 1690939143),
(2196, 'DIAZ ADRIAN', 'def.jpg', '$2y$10$A3/.s0nB2YE7Z21eih4IWOhm7iV/O5ilJzFjQuFxqK7vZIitpaqbW', 'siswa\'0052729461', 'Siswa', 4, 1524, 1, 1690939143),
(2197, 'FAJAR DARMA RUDITYA', 'def.jpg', '$2y$10$KyBqe3UCXgXHTV4A7/LBGuI44B7Csf1y.Ko2AgdtsQm9QpviYOWOa', 'siswa\'0072950655', 'Siswa', 4, 1525, 1, 1690939143),
(2198, 'FERDINAND SYARIF HIDAYAT', 'def.jpg', '$2y$10$dUZ6rvuDOufQRy9poRqByuvWsax6yPOOYU.H61Z7mOf8LC4uoBk6W', 'siswa\'0078760073', 'Siswa', 4, 1526, 1, 1690939144),
(2199, 'FICKY HENDRIANSYAH', 'def.jpg', '$2y$10$/Aw1THIyoFuCT4WshRPlGeZBvMPQDmDoG.OxLGIxpQSNhErALr6/.', 'siswa\'0079724490', 'Siswa', 4, 1527, 1, 1690939144),
(2200, 'HARRY RAHMAWAN', 'def.jpg', '$2y$10$TkrfzHXJpHjxV0pAWgZfg.SiWKwXkj1h/7fmOAArgz8J4PW/9IKzC', 'siswa\'2220060212', 'Siswa', 4, 1528, 1, 1690939144),
(2201, 'GILANG REDINO PUTRA', 'def.jpg', '$2y$10$vRMAvuN/GtrOyqg57zIVF.eWphRkm6Gq7Di7fNLRJlwSTn31BKfGG', 'siswa\'0059997386', 'Siswa', 4, 1529, 1, 1690939144),
(2202, 'ILHAM MAULANA RAMADLON', 'def.jpg', '$2y$10$dmocZW/rVy1LmBD/N0adeufx9cmJ5kQUtPzkflu2yuAfLMOh6txQW', 'siswa\'0067198161', 'Siswa', 4, 1530, 1, 1690939144),
(2203, 'JAYA JAKA', 'def.jpg', '$2y$10$j.dcK4Aina6qAcRCDplbLele30MkPIVxMNIhssK5OAYk24bmCiGDS', 'siswa\'2220071221', 'Siswa', 4, 1531, 1, 1690939144),
(2204, 'KESYA JUNDAN SAFARO', 'def.jpg', '$2y$10$SGRw7iSkwAxB0bmKz5ZViOrfXGw.JnlUIcmdvhZ03LjfErZI/wpMm', 'siswa\'0073923220', 'Siswa', 4, 1532, 1, 1690939145),
(2205, 'MOHAMMAD ANDIKA WISNU PRATAMA', 'def.jpg', '$2y$10$.Nap3Z0uuV8rQsUzWCWbfuf4wS5D5rXLHiLjtkLwihR.Q8fFbbqT6', 'siswa\'0073216092', 'Siswa', 4, 1533, 1, 1690939145),
(2206, 'MUHAMMAD ANDIKA ARYANSYA', 'def.jpg', '$2y$10$QEbeRG1HsFOY5Hwo8r1toOwilyy9AgfPwfI7fbhhIBxzCBCdbKwWG', 'siswa\'0077063840', 'Siswa', 4, 1534, 1, 1690939145),
(2207, 'MUHAMMAD DANI RIZQI', 'def.jpg', '$2y$10$Wf9rou6sleYVw8lfix3Ai.Z5aKFBHlMzpPPazbGNlguwB3V3LWaC2', 'siswa\'0076454324', 'Siswa', 4, 1535, 1, 1690939145),
(2208, 'MUHAMMAD ENGGAR PRABOWO', 'def.jpg', '$2y$10$rVwrjA4ud8tDtHSuv9NMEeu4byMpJMQmglogTT8xg07oX0KtWhsYi', 'siswa\'0071373209', 'Siswa', 4, 1536, 1, 1690939145),
(2209, 'MUHAMMAD FAQIHUDDIN MUTTAQI', 'def.jpg', '$2y$10$gro4FjXoWkIjnqaddGHrPuMwTvdJLzsMggtsxqScHYSYvXZhDZJla', 'siswa\'0065263190', 'Siswa', 4, 1537, 1, 1690939145),
(2210, 'MUHAMMAD FAREL DAFFA SAID AKBAR', 'def.jpg', '$2y$10$OYwzSVGYbBUTCRBrlB5hhOGXmiAMYudpgbCCn1lT61Az.Tw7/VCXK', 'siswa\'0066110055', 'Siswa', 4, 1538, 1, 1690939145),
(2211, 'MUHAMMAD FARUK AL HAQ', 'def.jpg', '$2y$10$a5BLhoDRgb7zBg/oA.66Q.r5OeGhFiyyJfLHBixWPerJdFWeFQmCO', 'siswa\'0073135988', 'Siswa', 4, 1539, 1, 1690939146),
(2212, 'MUHAMMAD FARUQ HAKIM', 'def.jpg', '$2y$10$vcBOZZT3IYQEk7mVN9Qa6uFW0oTcZynfJtfmTOtOk/Efx.sBs9UOm', 'siswa\'0077908903', 'Siswa', 4, 1540, 1, 1690939146),
(2213, 'MUHAMMAD FATHIR MAULANA', 'def.jpg', '$2y$10$RM9nrr14tETtpBUwn0pLyuEP8YD3U/i9dqJGsxOjsKuvVa75ND3CW', 'siswa\'0071470755', 'Siswa', 4, 1541, 1, 1690939146),
(2214, 'MUHAMMAD RANGGA WIJAYA', 'def.jpg', '$2y$10$W2Dw1lvxZC71KUQSsTd9MO3JSjGyrqOelDdoCsI.LMmYUWvJ2z5Iq', 'siswa\'0075593298', 'Siswa', 4, 1542, 1, 1690939146),
(2215, 'MUHAMMAD ROMZANUL HUDA', 'def.jpg', '$2y$10$naHAxGpubwoCyVYusagydOtRff89OMasnZ1efoKXRwnS79rlFS2ly', 'siswa\'0057890338', 'Siswa', 4, 1543, 1, 1690939146),
(2216, 'MUHAMMAD THORIQ ILHAM', 'def.jpg', '$2y$10$6hKdssn3pjurk.nS/HzfauVdmeuZdDXTTzqRgMRw7tL/BAtDFxQIa', 'siswa\'0067759247', 'Siswa', 4, 1544, 1, 1690939146),
(2217, 'MUHAMMAD ZAIDAN ASHSHIDDIQ', 'def.jpg', '$2y$10$zU3gkIvtWVip.F5phUdNfuknVBGe5trn0T6S/cZKBQ27z1JlORMH.', 'siswa\'2220070527', 'Siswa', 4, 1545, 1, 1690939147),
(2218, 'MUHAMMAD ZAIDAN FIEKAR', 'def.jpg', '$2y$10$mNKcq1ggkXTBgYgdg61FPelmSipq1ole3ubDRnM87SdO5Uq9k0sP.', 'siswa\'0076453773', 'Siswa', 4, 1546, 1, 1690939147),
(2219, 'MUHAMMAD ZAKY FIRDAUS', 'def.jpg', '$2y$10$dJegioH1eb0PFxGhSHEH7O8SO/wbhakQElCWBdvU1Ms5olAMaemNC', 'siswa\'0061442468', 'Siswa', 4, 1547, 1, 1690939147),
(2220, 'MUKHAMAD TAUFIQ HIDAYAT', 'def.jpg', '$2y$10$V/QpaXeF/0pvjJubk4NoI.tQTxsZflUrrHXR8XSXbng1yTVyhe7ge', 'siswa\'0075103544', 'Siswa', 4, 1548, 1, 1690939147),
(2221, 'PIPIT AFITTONICO RIO', 'def.jpg', '$2y$10$85kwEkWDIoNns9JpyZxFpOXwPDLXy8fFSBuUq6q.r7NAgEAtWsc2m', 'siswa\'0075004417', 'Siswa', 4, 1549, 1, 1690939147),
(2222, 'RAVI DIDAN PRAYOGA', 'def.jpg', '$2y$10$R44QIq3Yu489riFlhIKCAu.m67JvyOOo9lJp/Jmjaosi50bXRQG8y', 'siswa\'2220070217', 'Siswa', 4, 1550, 1, 1690939147),
(2223, 'RAFLI ARDIANTO WICAKSONO', 'def.jpg', '$2y$10$BfumG2tanOuj4OU4pADWjOc7AkctROL0Et5W1klrSWOHYnv5A1GRG', 'siswa\'0069793415', 'Siswa', 4, 1551, 1, 1690939148),
(2224, 'WAHYU ADJIE NUGRAHA', 'def.jpg', '$2y$10$0.cWyiP7GLo3rHNGS6QeH.RaniTx4.Tjnn5cHJZKZBrwfzrXOHqqS', 'siswa\'0062498870', 'Siswa', 4, 1552, 1, 1690939148),
(2225, 'YUSUF SOFIYAN', 'def.jpg', '$2y$10$816Kr.ZPdR9DOeQh9la2N.8QQ1nNPBvUu673v1s84bXjTvs/dNqwq', 'siswa\'2220060721', 'Siswa', 4, 1553, 1, 1690939148),
(2226, 'PUJIASIH', 'def.jpg', '$2y$10$cMcDK.D/jCjNpFF/auflHOzxq/sE5Jt3YJZpriBFd1y7tU68F3rtu', 'wali\'2320050930', 'Wali', 3, 1518, 1, 1690939142),
(2227, 'puji asih', 'def.jpg', '$2y$10$hXyi8OG0/jUyVZ/f7XBrhOTWLHh2.3H3zbXm3xu9lgiOU4Y0WKHU2', 'wali\'2320061110', 'Wali', 3, 1519, 1, 1690939143),
(2228, 'HANDAYANI', 'def.jpg', '$2y$10$6DPNEwo02Kvh7dSuiw1MAuQgBvP1K3IlMx2gW3Dhqtaqj2VZ22US2', 'wali\'0068930705', 'Wali', 3, 1520, 1, 1690939143),
(2229, 'Dewi Sholikhatun', 'def.jpg', '$2y$10$z5o5mA.nUR/k8nBCufkhb.MCDczzNB7Wps.FsQa6prjPY6HWo0XIi', 'wali\'0069281021', 'Wali', 3, 1521, 1, 1690939143),
(2230, 'Whayuningsih', 'def.jpg', '$2y$10$SVhEi8EDwpnURRCB7Q4NIu83o1i/.dqbKgk6Gh0f.0D6EW5Eel8Du', 'wali\'0072921920', 'Wali', 3, 1522, 1, 1690939143),
(2231, 'NINIK KUSMAWATI', 'def.jpg', '$2y$10$B80/dxft85pVJZZK4AZJlOib.8CtFMyX/Zv9oiE0RQzLNsP2NWFuq', 'wali\'0071989204', 'Wali', 3, 1523, 1, 1690939143),
(2232, 'WIWIK', 'def.jpg', '$2y$10$4RQJgcUAJeCJtCnJO7nfaefOfcwRwplEDcSNu/T1rI/LHqptiKQ8u', 'wali\'0052729461', 'Wali', 3, 1524, 1, 1690939143),
(2233, 'Sri Idayani', 'def.jpg', '$2y$10$5LuDcCr9XQNQyn9KObQif.UEhMvgCP/YaH/mmFeX9K9XRAnAzKQ8O', 'wali\'0072950655', 'Wali', 3, 1525, 1, 1690939144),
(2234, 'nor hidayah', 'def.jpg', '$2y$10$RXwdzNwb60f2C0OIovgYD.H5mCGplrfE05zj7MK9ykG3y2pJ08oMq', 'wali\'0078760073', 'Wali', 3, 1526, 1, 1690939144),
(2235, 'Siti kholimah', 'def.jpg', '$2y$10$G5P9oi8PiPRYH8BFwcTMmOoGYCriAKib0RiYL7oNE16jUOp2HsQLe', 'wali\'0079724490', 'Wali', 3, 1527, 1, 1690939144),
(2236, 'sudarsih', 'def.jpg', '$2y$10$bzejOsIECm52sTuTNcjsHOIez/.Yk/Fzfzs6bzwH1Vcc3sn1uU8A.', 'wali\'2220060212', 'Wali', 3, 1528, 1, 1690939144),
(2237, 'Jumiah', 'def.jpg', '$2y$10$JFvWA2vRjlUMa0lG7tYXy.A2KvuJFv8RV.RKIlQ1ugT1QRElwzOMa', 'wali\'0059997386', 'Wali', 3, 1529, 1, 1690939144),
(2238, 'NURUL IKMAH', 'def.jpg', '$2y$10$Y8/2xzODOxD5r57biCW0IOo4k6.GkhP9mUq50BhtCd1aB0EWsBXZW', 'wali\'0067198161', 'Wali', 3, 1530, 1, 1690939144),
(2239, 'kamijah', 'def.jpg', '$2y$10$tHyZ7mMOegFgF42DBfX4v.rjMiCdVCN.0eakqQkDH3zpuPru.MM1.', 'wali\'2220071221', 'Wali', 3, 1531, 1, 1690939144),
(2240, 'Ira Fatmawati', 'def.jpg', '$2y$10$g2O8sH8reemhFfW9hY2SiO18dEaPWt3xIYaUjReDk1CUwciJXZ6rO', 'wali\'0073923220', 'Wali', 3, 1532, 1, 1690939145),
(2241, 'SITI ZULAEKAH', 'def.jpg', '$2y$10$ylThLtyGpC3SfHQldIq7RujZMaUXe/DO6jh40pXAG2XkEvF9RRgja', 'wali\'0073216092', 'Wali', 3, 1533, 1, 1690939145),
(2242, 'SUMAINAH', 'def.jpg', '$2y$10$zBEyTn27pDOMDKCjuZ4XK.DDIq5ck/ksRmFs5gEdXGtOFLFNlv0Bq', 'wali\'0077063840', 'Wali', 3, 1534, 1, 1690939145),
(2243, 'SURIYAH', 'def.jpg', '$2y$10$9IfXgeOlL0FEVA6vvPv2H.RcUu.D.y7XoPjMRaZ7U.6JCnjq60i2S', 'wali\'0076454324', 'Wali', 3, 1535, 1, 1690939145),
(2244, 'Partini', 'def.jpg', '$2y$10$0ya1MmFp.HRGkQXA2083f.1pXFr5teLbm1xxw7jsdVj1IhpXCWdx.', 'wali\'0071373209', 'Wali', 3, 1536, 1, 1690939145),
(2245, 'SUMARSIH', 'def.jpg', '$2y$10$B6cQFbKJ6mnj5T.5ZVPlBulioH/cAo1sUQH5uHwh69vu3c2DJSM3y', 'wali\'0065263190', 'Wali', 3, 1537, 1, 1690939145),
(2246, 'rodhiyatul jannah', 'def.jpg', '$2y$10$tCbKmG5RRV1rzAqGRf5QWucV6Mxh689HwaAA..NB651kzoR.lhfKy', 'wali\'0066110055', 'Wali', 3, 1538, 1, 1690939146),
(2247, 'alm sofyatun', 'def.jpg', '$2y$10$Sgf6a3yrIb1dzdOkjpuMwO3/MeqOuuGCnkY0yyfigaHmfmYxx0.Km', 'wali\'0073135988', 'Wali', 3, 1539, 1, 1690939146),
(2248, 'NOOR FARIDA ARIYANI', 'def.jpg', '$2y$10$yxcFjbdW/QsK4rJyd4N/AOF3tvyTw6gQwx19pqWrr3VupwMla.Wqm', 'wali\'0077908903', 'Wali', 3, 1540, 1, 1690939146),
(2249, 'ALIFAH WIDIASTUTI', 'def.jpg', '$2y$10$sNyFcP/x3Q4nKQplRRtBbuZaEgpvIX.7x/CTROFO3HLwkioY6F33.', 'wali\'0071470755', 'Wali', 3, 1541, 1, 1690939146),
(2250, 'sumiatun', 'def.jpg', '$2y$10$dT9o5Gb9KG0p3tJWYS6zpuWdFHPphI2jB7R1L30BkyDlSjWKmk3VO', 'wali\'0075593298', 'Wali', 3, 1542, 1, 1690939146),
(2251, 'Winarsih', 'def.jpg', '$2y$10$l9z7Fd5ojqiA8ffohFVXvO2zeWIaE9ChaTxZl7Cs6EAuU4IOJ.YDC', 'wali\'0057890338', 'Wali', 3, 1543, 1, 1690939146),
(2252, 'DARWATI', 'def.jpg', '$2y$10$OcAVsQQPi.dSsf1FzsIkJeqForZ711RAKxB2uzpNPKcZ/zuMHWixy', 'wali\'0067759247', 'Wali', 3, 1544, 1, 1690939147),
(2253, 'SITIFAICHATUN', 'def.jpg', '$2y$10$HsHmwXWtisGN6B1h.Bg8IOZYcpaY2YErSTLP8PV0Vj5bdOTGJjxmu', 'wali\'2220070527', 'Wali', 3, 1545, 1, 1690939147),
(2254, 'Indri Sulistyani', 'def.jpg', '$2y$10$lDaldXGbmY9U7mhRoVZv4.c3LLBljwkLMnBjNfX0IuFkVDrsrQ.iu', 'wali\'0076453773', 'Wali', 3, 1546, 1, 1690939147),
(2255, 'Susanti', 'def.jpg', '$2y$10$JyHQJc5BQhxadv/XGwotFe/kRVNwjEvzzCfC39J9Nz/.k/MS52vda', 'wali\'0061442468', 'Wali', 3, 1547, 1, 1690939147),
(2256, 'SITI SUTINAH', 'def.jpg', '$2y$10$lIrNzh2h0FVWa.UZc1BAeemIUt2OCfjdEr6kyOFIUf4plZG6//L5e', 'wali\'0075103544', 'Wali', 3, 1548, 1, 1690939147),
(2257, 'MUNISIH', 'def.jpg', '$2y$10$7qIDVK73SxY50c.77Z//z.MiLyYNweIpIgwxIPSr2UKCjqT72yV8S', 'wali\'0075004417', 'Wali', 3, 1549, 1, 1690939147),
(2258, 'puji rahayu', 'def.jpg', '$2y$10$Z6zSB1NhZyVa2s5toz3zrOf8Pca7gwWfXYlWEoi2qwMOsElQrUkaK', 'wali\'2220070217', 'Wali', 3, 1550, 1, 1690939147),
(2259, 'ELY ERNAWATI', 'def.jpg', '$2y$10$VwV9VTFSDJRSDZM3bRsmiu3u.50BHVYrVfpCYWaXi/brZMu6gWpvm', 'wali\'0069793415', 'Wali', 3, 1551, 1, 1690939148),
(2260, 'Any Astuti', 'def.jpg', '$2y$10$kU8Kw2WCZktdFR/klqWl/u.nhVDU2F.jUdePev0tfotGxsn8BxgIm', 'wali\'0062498870', 'Wali', 3, 1552, 1, 1690939148),
(2261, 'dariyati', 'def.jpg', '$2y$10$SWVjFbNu4JoBcA/3i20kXO.9kJPS5R0IR2AxKYIcgBI0vrAGZ9phG', 'wali\'2220060721', 'Wali', 3, 1553, 1, 1690939148);

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
(44, 5, 4),
(45, 5, 23),
(46, 5, 2),
(47, 5, 25),
(48, 5, 5),
(50, 5, 6),
(51, 2, 6),
(52, 5, 29),
(53, 1, 7),
(54, 5, 7),
(59, 1, 3),
(61, 2, 30);

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
(27, 'Kuisioner'),
(30, 'Pelanggaran');

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
(50, 5, 'Dashboard', 'gurubk/dashboard', 'fas fa-fw fa-tachometer-alt	', 1),
(51, 5, 'Pengaturan', 'GuruBK/index', 'fas fa-cog', 1),
(53, 30, 'Kategori Pelanggaran', 'pelanggaran/index', 'fas fa-tags	', 1),
(54, 30, 'List Pelanggaran', 'pelanggaran/pelanggaran', 'fas fa-list	', 1);

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

--
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id`, `siswa_id`, `parent_name`, `no_telp`) VALUES
(1124, 1518, 'PUJIASIH', '\'085727746972'),
(1125, 1519, 'puji asih', '\'085727746972'),
(1126, 1520, 'HANDAYANI', '\'081219878684'),
(1127, 1521, 'Dewi Sholikhatun', '\'081225098745'),
(1128, 1522, 'Whayuningsih', '\'085713749159'),
(1129, 1523, 'NINIK KUSMAWATI', '\''),
(1130, 1524, 'WIWIK', '\''),
(1131, 1525, 'Sri Idayani', '\''),
(1132, 1526, 'nor hidayah', '\'085225504676'),
(1133, 1527, 'Siti kholimah', '\'08988933686'),
(1134, 1528, 'sudarsih', '\''),
(1135, 1529, 'Jumiah', '\''),
(1136, 1530, 'NURUL IKMAH', '\''),
(1137, 1531, 'kamijah', '\''),
(1138, 1532, 'Ira Fatmawati', '\''),
(1139, 1533, 'SITI ZULAEKAH', '\'085601479101'),
(1140, 1534, 'SUMAINAH', '\'085226422085'),
(1141, 1535, 'SURIYAH', '\'085728657078'),
(1142, 1536, 'Partini', '\'085643518769'),
(1143, 1537, 'SUMARSIH', '\'085712995400'),
(1144, 1538, 'rodhiyatul jannah', '\'081382358374'),
(1145, 1539, 'alm sofyatun', '\'081918537715'),
(1146, 1540, 'NOOR FARIDA ARIYANI', '\'08156591164'),
(1147, 1541, 'ALIFAH WIDIASTUTI', '\'085213115947'),
(1148, 1542, 'sumiatun', '\''),
(1149, 1543, 'Winarsih', '\'082323931057'),
(1150, 1544, 'DARWATI', '\'085725733102'),
(1151, 1545, 'SITIFAICHATUN', '\'08122853597'),
(1152, 1546, 'Indri Sulistyani', '\'081466827554'),
(1153, 1547, 'Susanti', '\'081327793602'),
(1154, 1548, 'SITI SUTINAH', '\'085867761605'),
(1155, 1549, 'MUNISIH', '\'087704731176'),
(1156, 1550, 'puji rahayu', '\'085743671356'),
(1157, 1551, 'ELY ERNAWATI', '\'08122550735'),
(1158, 1552, 'Any Astuti', '\'087779205968'),
(1159, 1553, 'dariyati', '\'081225245800');

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
(0, 1, 'Smk Muhammadiyah Kudus');

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
  MODIFY `pelanggaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1554;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2262;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `wali`
--
ALTER TABLE `wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1160;

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

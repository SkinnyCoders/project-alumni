-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 11:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `email`, `password`, `foto`, `create_at`) VALUES
('admin', 'Admin', 'admin@gmail.com', '$2y$10$6QyBpIZauaclOeeTbXtgguDQIVT485u0ovpbiceCsMV5/8zsEMv7O', 'default.png', '2020-05-05 00:00:00'),
('admin3', 'admin3', 'admin2@simsekolah.co.id', '$2y$10$1TE98iXRjCTQIZ5kyO5cRulCEeph2i5bqauGPtyKYB48s09KhGUDu', 'default.png', '2020-05-06 00:00:00'),
('alif', 'alif', 'alex@gmail.com', '$2y$10$GcOqhC1vnVmSrDlLUMjNF.4q8bI7/GKDgN1UZhzZAIIuwv/4KZL9.', '737378df719a899e2cc509b62da5f5a2.png', '2020-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `nisn` int(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(65) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(60) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `foto` varchar(60) NOT NULL,
  `tentang` text,
  `id_kelas` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `status` enum('aktif','nonaktif','menunggu','') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`nisn`, `nama`, `email`, `password`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `agama`, `telepon`, `tahun_masuk`, `tahun_lulus`, `foto`, `tentang`, `id_kelas`, `id_jurusan`, `status`) VALUES
(143490, 'Davit Indri Setyawan', NULL, '$2y$10$PoFF4kd8fg44ICsBLpESKOSKPjd.Zon2YoywfkQlln5t2cbDVbICy', 'Kenongo, Basuhan, Kecamatan Eromoko', 'L', '2001-07-07', 'Wonogiri', 'Islam', '087736098675', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(1049711, 'Rika Wardhani', NULL, '$2y$10$SDnrX0mSJmBkiSYoK4XLb.9zGuXB89tUvzy3ElIzQw7WIQZURYBLK', 'Putat, Trukan, Pracimantoro, Wonogiri, Jawa Tengah', 'P', '2001-08-06', 'Wonogiri', 'Islam', '082135197633', 2016, 2019, 'default.png', 'Hobby memasak', 24, 6, 'aktif'),
(1234567, 'test', 'user1@user.com', '$2y$10$VvV.uk0pd9dvm/zg1u6oAeCTd2ulelENlXcPwF1Dkdw9mVZE658Lm', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', NULL, NULL, NULL, 'aktif'),
(1488351, 'Dannu Purnomo Aji', NULL, '$2y$10$kKXcPJO6ejmrdaPBDhJ2aeGtPyn7xsEtLC6PACI6g4c2TLmuqhlja', 'Watangrejo, Pracimantoro, Wonogiri, Jawa Tengah', 'L', '2000-04-01', 'Gunung Kidul', 'Islam', '081225098145', 2016, 2019, 'default.png', '', 27, 8, 'aktif'),
(1655611, 'Sandi Sukmo Nugroho', NULL, '$2y$10$uvoXV6U4sdFIGqg3eecdiOGRmAc3WLO9ANbyUQM9HMtb8SwyO9YFy', 'Mojo, Suci, Kecamatan Pracimantoro', 'L', '2000-11-04', 'Wonogiri', 'Islam', '085647331862', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(1656007, 'Soni Pracoyo', NULL, '$2y$10$DOwDyBfJYlounGnsQ.3ZLuHREiL7Ib/jnZDm5LWeQA0Dpze8A4Pzq', 'Duren lor, Glinggang, Kecamatan Pracimantoro', 'L', '2002-06-10', 'Wonogiri', 'Islam', '087736790508', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(1656099, 'Haris Fajar Prasetyo', NULL, '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'Guyangan, Sedayu, Pracimantoro', 'L', '2000-02-21', 'Wonogiri', 'Islam', '082243906798', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(2208456, 'Vikky Firman Ferdiansah', NULL, '$2y$10$rGOjZgj6FZyiHFcdjEfVIu8./uloDeaKdabhWXdkekQQUlOEX.5bi', 'Karanglo, Gebangharjo, Kecamatan Pracimantoro', 'L', '2000-01-04', 'Wonogiri', 'Islam', '081225890521', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(3635764, 'Feriyanto', NULL, '$2y$10$p/3mbnmt2l.PamQaQM3BkOU6jRLr0DSLBQywwib33YKFXr3rh7NsS', 'Tegalrejo, Tegalrejo, Kecamatan Eromoko', 'L', '2001-10-02', 'Wonogiri', 'Islam', '081567904173', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(4572401, 'Dwi Lestari', NULL, '$2y$10$E83ELRXWX6O4bhAQ23BxMeBTPf7Czzlq4/.CDaVNonbiGR1ORHVcu', 'Dondong, Joho, Kecamatan Pracimantoro', 'P', '2002-01-02', 'Wonogiri', 'Islam', '085649220710', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(4572546, 'Andiku Eko Nugroho Putra', NULL, '$2y$10$ydC8Zp4AEH9HPUyxxE4HkO2RgnX/2MKUbZqvA/mUsy9WdjvdYF1VO', 'Pelem, Watangrejo, Keca,atan Pracimantoro', 'L', '2001-12-12', 'Wonogiri', 'Islam', '081576017813', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(4572873, 'Dagusta Setiawan', NULL, '$2y$10$/hR1Bp30v9izhO1a8rTMw.VShxBnmUyIZySZTQ4VnjBEq74Gy8Uk6', 'Lebak, Lebak, Kecamatan Pracimantoro', 'L', '2002-05-06', 'Wonogiri', 'Islam', '085225181801', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(4598975, 'Dhavid Adi Prasetyo', NULL, '$2y$10$EyK.E6QloEvMbK4etYn9ouVTBQZGUZTCJUZJ7t7Nmr/ucpRO3rmAW', 'Nglancing, Watangrejo, Kecamatan Pracimantoro', 'L', '2000-09-05', 'Wonogiri', 'Islam', '0822254932490', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(4749218, 'Ferianto', NULL, '$2y$10$sK574I/nph57fRW/FUB5VONkAYwrE8bNOjqM7FJe.6URByEZjhJnG', 'Trukan, Trukan, Pracimantoro, Wonogiri, Jawa Tengah', 'L', '2001-01-03', 'Wonogiri', 'Islam', '082229012500', 2016, 2019, 'default.png', '', 27, 8, 'aktif'),
(4958475, 'Viko Saputro', NULL, '$2y$10$hoUVRqhtrmEs/HKhC.piaO3OTJqlrLsEI7FMBZLllxmQuf3N1H1SS', 'Mulwosari, Jatirejo, Kecamatan Giritontro', 'L', '2002-06-04', 'Wonogiri', 'Islam', '082237776970', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(5295304, 'Sindi Saputra', NULL, '$2y$10$ppAri1MBXaPBVMYKyjS58eDqa3UVOtpqYvNVeYBXf1PP9ySs7YwsK', 'Jetak, Sambiroto, Kecamatan Pracmatoro', 'L', '2000-03-05', 'Wonogiri', 'Islam', '082225724596', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(5295309, 'Fatur Setiawan', NULL, '$2y$10$hPbDak9A8Y.qi1pbk4uSj.GX2btfBtq5KFaVdIpjlF1ZcXMjAaJkS', 'Jenar, Pracimantoro, Kecamatan Pracimantoro', 'L', '2002-03-12', 'Wonogiri', 'Islam', '088216471192', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(5296224, 'Abiem Prama Adiputra', NULL, '$2y$10$HOPYkh2bFUkXT3OHHxeHaOygLO2iU.Gu1P03KvbsuCJqGk18Dyspi', 'Manggis, Ngadirojo, Kecamatan Ngadirojo', 'L', '2000-10-11', 'Wonogiri', 'Islam', '083829497112', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(5350278, 'Niva Sari Dwi Rahayu', NULL, '$2y$10$xk27rWRCknl23f.NtKB.zuAeNp.5oymjmQMoL0gq5pV1PymSVgavG', 'Pelem, Watangrejo, Kecamatan Praciamantoro', 'P', '2002-07-04', 'Wonogiri', 'Islam', '081578721863', 2016, 2019, 'default.png', '', 24, 6, 'aktif'),
(5354588, 'Agung Hartoko', NULL, '$2y$10$zP0a4caubMLMZbldlll7ROC9ZSEYPFGVFJ5u1XC.vQzgNOUvDs8gC', 'Jetak, Sambiroto, Kecamatan Pracimantoro', 'L', '2001-04-11', 'Wonogiri', 'Islam', '085789012523', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(5354602, 'Erlinda Herawati', NULL, '$2y$10$5z4QGkfbmt5S2kC//z2fxeg9TQZArzQ4LYeFRcfRIytAWrfgZqSae', 'Suci, Suci, Kecamatan Pracimantoro', 'P', '2000-12-08', 'Wonogiri', 'Islam', '085774507575', 2016, 2019, 'default.png', '', 26, 7, 'aktif'),
(5414182, 'Yuli Tri Baskoro', NULL, '$2y$10$2J02gI91ZGjDWKsLn9x8t.NPQdYwJDHykskexFhJz2o1qkkTA7z.a', 'Tlogorejo, Watangrejo, Kecamatan Pracimantoro', 'L', '2000-12-07', 'Wonogiri', 'Islam', '082325912545', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(5414183, 'Kelvin Sukma Wijaya', NULL, '$2y$10$NCRPhTjPZgYWBhI9HzVD8uW1ZuBPM93m0araXYIipsw6feL6GQ/VG', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2002-06-02', 'Wonogiri', 'Islam', '085726603957', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(5414188, 'Muhammad Fajar R', NULL, '$2y$10$h9/d9chvBRL5tyxN4CclP.OVuZR3YkaYjvauriaJfgElAr9LEktUa', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2000-09-12', 'Wonogiri', 'Islam', '08882927255', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(5414579, 'Efi Nur Wati', NULL, '$2y$10$UWylWFU1zEhvtcTk5PX54eFOHqdGnq0xGFcOO2UcKWG8LPb9C3JKu', 'Gunungsari, Sedayu, Kecamatan Pracimantoro', 'P', '2000-05-06', 'Wonogiri', 'Islam', '082225727480', 2016, 2019, 'default.png', NULL, 26, 7, 'aktif'),
(5414581, 'Rizal Tri Wibowo', NULL, '$2y$10$j.gpvIuEAkmkASC33m.5rOCPVQad64.fo9UhrgQV/cbay49Rv2dYy', 'Gunungsari, Sedayu, Kecamatan Pracimantoro', 'L', '2000-03-10', 'Wonogiri', 'Islam', '087788693754', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(5414584, 'Alvaro Syahrul Ramadhan', NULL, '$2y$10$KDvirkoK.yyc06ewULg3G.wes9t6cr.yWTrhylVHjfdRY04ulAhrK', 'Ngulu lor, Pracimantoro, Kecamatan Pracimantoro', 'L', '2000-09-12', 'Wonogiri', 'Islam', '085728083607', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(5533605, 'Eko Kustiawan', NULL, '$2y$10$8ERc7v8NZ88hV.HqvDSwuu9kDv/z8Xgd7ZZvjIl/Ft6CyCedYSQ0u', 'Glagah, Joho, Kecamatan Pracimantoro', 'L', '2000-11-12', 'Wonogiri', 'Islam', '083144936722', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(5534408, 'Bayu Aji Setyawan', NULL, '$2y$10$gFwAgGgi2cmSoIl1N9k/yOfLuGTchKyjszc0dj5egL8LDUgLSPYpe', 'Tambak, Tlogosari, Kecamatan Giritontro', 'L', '2001-06-11', 'Wonogiri', 'Islam', '082322605284', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(5822698, 'Joko Riyawan', NULL, '$2y$10$ZQR/X3U9t0kmfU.INAkUBe2Y6igdrxH5MnuQqEvErDLx94tzQd32W', 'Digal, Sumberagung, Kecamatan Pracimantoro', 'L', '2001-05-06', 'Wonogiri', 'Islam', '085773211375', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(6336046, 'Danik Prastya', NULL, '$2y$10$bgCCotkmL/QMIZUSarO02OIKRg8GFQnGYjFAXxonU46HBgLNBQPna', 'Ngledok, Gendayaan, Kecamatan Paranggupito', 'L', '2002-01-11', 'Wonogiri', 'Islam', '081381539916', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(6933918, 'Edi Riyanto', NULL, '$2y$10$wWtouR7crWQ9bDXDvKpAV.nGkJrq8P1DvnMjGAyF6aSRudcHoZQ8q', 'Bulu, Baleharjo, Kecamatan Eromoko', 'L', '2002-04-12', 'Wonogiri', 'Islam', '085258572987', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(7709158, 'Eva Yani', NULL, '$2y$10$do8gzXH5dzIkBMkd6XqKQu4qfWtcchFGEJG6ZvdIc80bijCfkmv1S', 'Sambeng, Sedayu, Kecamatan Pracimantoro', 'P', '2001-11-11', 'Wonogiri', 'Islam', '082322108460', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(7766880, 'Maulana Iksan', NULL, '$2y$10$bd9sQe9crDz/GPZXEwnNZuFA0LoPE29pR8RKyIbjd5iJsJs9r5BNO', 'Pendem, Gambirmanis, Kecamatan Pracimantoro', 'L', '2000-11-08', 'Wonogiri', 'Islam', '083841055703', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(7994335, 'Rahmat Dwi Prasetiyo', NULL, '$2y$10$BkFoMgBvUmA5haZJaI8/r.guGYwey0vM/1/KVIK50avNgGEN26joK', 'Mudal, Gebangharjo, Kecamatan Pracimantoro', 'L', '2000-07-02', 'Wonogiri', 'Islam', '083128929016', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(11433717, 'Tedi Boy Mustofa', NULL, '$2y$10$SJq4YEoojCIZKlSD0ggYheOv/MTTcgJvw3nvlefClO.1LzSel0YNi', 'Glagahombo, Gendayaan, Kecamatan Paranggupito', 'L', '2001-09-01', 'Wonogiri', 'Islam', '082325092409', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11634602, 'Arif Setiawan', NULL, '$2y$10$NLrDI6AZ9Jo8/3rmQ1PZO.Gr2DOazvhX.qaynzebCA6DFhRnCtJdS', 'Jenar, Pracimantoro, Kecamatan Pracimantoro', 'L', '2002-08-03', 'Gunung Kidul', 'Islam', '082244895177', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11634623, 'Dadang Bimantoro', NULL, '$2y$10$dNlCu8oFYTsxtxJXU9djZOwZ9RDB1F1pq0TqCrEPllYF4ZowBovRO', 'Ngulu Tengah, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-01-07', 'Gunung Kidul', 'Islam', '082136394711', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11634628, 'Narendra Wahyu Julianto', NULL, '$2y$10$hT4rO2yPqRwkNjeC8WA5oupMhQlMkhPCXp8CLzFbtPnAGBpvC7eY2', 'Belik, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-12-07', 'Wonogiri', 'Islam', '085796392100', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11634629, 'Narendri Wahyu Juliawan', NULL, '$2y$10$9wsvFyLEOdg6r3VfRDE4teRuO3mwOpAnjqwq8DJ/ss7fdruGWVuMi', 'Ngulu Wetan, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-12-07', 'Wonogiri', 'Islam', '081228689312', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11635509, 'Angga Fuad Asqolani', NULL, '$2y$10$I1mmJZOREXhCJYHFznU6Mu5g51KfGElfNH3j1iXk3e9.fb4.Ws6qe', 'Kerjo, Glinggang, Kecamatan Pracimantoro', 'L', '2001-10-03', 'Wonogiri', 'Islam', '083128050377', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(11635517, 'Afif Ardea Roma Dafi', NULL, '$2y$10$K8XMrlnQbAgKC8glHRBxn..ATOWkevKJZ1h0rqxYm8IjvraODtq/q', 'Karanglo, Gebangharjo, Kecamatan Pracimantoro', 'L', '2003-03-11', 'Wonogiri', 'Islam', '082243228352', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11635640, 'Sri Lestari', NULL, '$2y$10$SkGMgdYZuTIlw25DLnC.muJ15VIomwHq30dGwNF7fncpaAM375VtK', 'Pendem, Gambirmanis, Kecamatan Pracimantoro', 'P', '2003-03-08', 'Wonogiri', 'Islam', '081228689312', 2016, 2019, 'default.png', NULL, 26, 7, 'aktif'),
(11635723, 'Deni Kristiawan', NULL, '$2y$10$gWylvPw54K52OOJWzd5lwuepFMor0so82L0x92KpEOS1kIXlX82yS', 'Maguan, Suci,Kecamatan Pracimantoro', 'L', '2002-11-12', 'Wonogiri', 'Islam', '083874970559', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11635761, 'Arcinda Al Madani', NULL, '$2y$10$PGZnwgugWxwfMC5d3F8g7OHXApnDttGoS.zL9SzPn858Tg68NROK2', 'Geran, Sedayu, Kecamatan Pracimantoro', 'L', '2002-04-01', 'Wonogiri', 'Islam', '085799906627', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11635767, 'Angga Aprianto', NULL, '$2y$10$HhDlBw.pegh4eJ/jtGejvevd1ZfNPOJXdMHmk8IkGpNPq/Bm1bLJe', 'Gaji, Tubokarto, Kecamatan Pracimantoro', 'L', '2002-02-04', 'Wonogiri', 'Islam', '083128197210', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11636173, 'Agung Nugroho', NULL, '$2y$10$/OkL34gX2Fy7DlukCEbtK.QVSbeng4ENj1JnF8lSWqBveIqCfHsPe', 'Suruhan, Sambiroto, Kecamatan Pracimantoro', 'L', '2002-02-04', 'Wonogiri', 'Islam', '082137613779', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11636403, 'Falah Fairu Ssyabadi', NULL, '$2y$10$T/2x1m3oI3mLI4q.p.NX3ukjD/5lIlaBoO1f6oche.FsDtLqyDMVq', 'Ngreboh, Wonodadi,Kecamatan Pracimantoro', 'L', '2002-06-09', 'Wonogiri', 'Islam', '082325562156', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(11636457, 'Narendra Gus Biyantoro', NULL, '$2y$10$Laf5MBKBhUiidQOjbVB9mOc13.TX6MVZeqAREuBciwy006KF0vuSq', 'Belik, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-03-08', 'Wonogiri', 'Islam', '083842439569', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(11675463, 'Meilia Putri Rahayu', NULL, '$2y$10$L4cswMxYlhT1eibSG.VipO0qze1sv4PHZ.f/HQoCnXJHnBP/l6gn.', 'Dayu, Sedayu, Kecamatan Pracimantoro', 'P', '2001-10-05', 'Jakarta', 'Islam', '083866376813', 2016, 2016, 'default.png', NULL, 24, 6, 'aktif'),
(11676883, 'Diki Asela', NULL, '$2y$10$nCXU18TfWv5ZkRuSRzbXXOIHBG8ZxuoR8d9dW7RiG0AX/VuZwGJXi', 'Bendungan, Lebak, Kecamatan Pracimantoro', 'L', '2001-08-01', 'Wonogiri', 'Islam', '081390809046', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11676884, 'Amelia Farosa', NULL, '$2y$10$/FKAXqaXY4nJQ0d1OR.JA.OrLnwlOolqQPwJ7H4pjTANJKMx4CEN2', 'Lebak, Lebak, Kecamatan Pracimantoro', 'P', '2001-10-01', 'Wonogiri', 'Islam', '083149303471', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(11676891, 'Alex Prasetyo', NULL, '$2y$10$PlbQR/OYhQLvsV5fBaUVVO9P/dfnvzcceiibrVZA694PJzpqGIJmO', 'Bendungan, Lebak, Kecamatan Pracimantoro', 'L', '2002-09-04', 'Wonogiri', 'Kristen', '081332604351', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11676893, 'Seto Bayu Ananto', NULL, '$2y$10$soaviYoS1OAzhuXjns25qO8QQfCUV9Tg7pcGwWbVfiZ1boyQkPi9m', 'Sunggingan, Lebak, Kecamatan Pracimantoro', 'L', '2002-01-07', 'Wonogiri', 'Islam', '085870234347', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11676896, 'Samsul Fauzi', NULL, '$2y$10$wePOkcYq4sxpD2yTiys9kOuJCop77RU.vpR2ToArsfrEOL7RuwQaW', 'Sunggingan, Lebak, Kecamatan Pracimantoro', 'L', '2003-03-07', 'Wonogiri', 'Islam', '085799227160', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11676901, 'Irgina Niki Indriani', NULL, '$2y$10$SJNje/.479VRElcFs85nRey5lgUe4EI.6qCEE5iaGyhDt8nbCwHqi', 'Bendungan, Lebak, Kecamatan Pracimantoro', 'P', '2001-11-11', 'Wonogiri', 'Islam', '085740157418', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(11676908, 'Endah Rahayu', NULL, '$2y$10$VQwqsHTfHoovpQc/.uBbDesn3tLmR7HNNgbNWpXeq4JKwNlkTXxy6', 'Dondong, Joho, Kecamatan Pracimantoro', 'P', '2001-04-07', 'Wonogiri', 'Islam', '083866743809', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(11676913, 'Iyan Restu Pangesti', NULL, '$2y$10$oPNUcpKvn03/bNs.P03EEet6OXQkgvMJ/bYBx6aUL1UEhN8XOrZFW', 'Godang, Pracimantoro, Kecamatan Pracimantoro', 'L', '2002-06-01', 'Gunung Kidul', 'Islam', '085802564190', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11676924, 'Evi Rukmana Sari', NULL, '$2y$10$J6UbkgFBIjRGxjtLIcM.2uJ4KHhSfd4xDxH7lB9yOjtl0rtKdWtf2', 'Galo, Gambirmanis, Kecamatan Pracimantoro', 'P', '2002-03-05', 'Wonogiri', 'Islam', '082138781072', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(11676941, 'Junaeka Resmanaya', NULL, '$2y$10$dAiwCfVOkWkpCRpSxYqw8ek170dASBYJMEu1k.Fq.XR9iSPzPGwv2', 'Trukan, Jimbar, Kecamatan Pracimantoro', 'L', '2002-03-07', 'Wonogiri', 'Islam', '085879761401', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11676989, 'Muklis Santoso', NULL, '$2y$10$s4ET9URLm368f4lX4bFGa.CZeNxk1qnawDa1Z5hlj3mC2N8C2TYUS', 'Pendem, Trukan, Kecamatan Pracimantoro', 'L', '2001-04-02', 'Karanganyar', 'Islam', '083806544081', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11677184, 'Akbar Abdi Nata', NULL, '$2y$10$3BzrpDPLbo894sY4Pq.RY..jHD/c0aaxSBhBOmqb6x26wtOqdUi1u', 'Jenar, Pracimantoro, Kecamatan Pracimantoro', 'L', '2002-09-01', 'Wonogiri', 'Islam', '085802564190', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(11677223, 'Aditya Yoga Pratama', NULL, '$2y$10$KPiLg2H8IZHJPqj92W98Ae1gKggoydlHz/yupwQ1sICi8Zq0a6qdG', 'Sumberalit, Sedayu, Kecamatan Pracimantoro', 'L', '2002-08-06', 'Wonogiri', 'Islam', '085879331793', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11677246, 'Rajid Nur Cahyo', NULL, '$2y$10$OKqMG0ycC4Tx4UujZEkssepOReaOQVHAEKkjsks/IYHJvuKue8Toi', 'Suci, Suci, Kecamatan Pracimantoro', 'L', '2002-01-02', 'Wonogiri', 'Islam', '082243906709', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11677260, 'Febry Arya Aditia', NULL, '$2y$10$Bo.PFUr/A1A3YIAiuoYpKebQOIlExuqNNvIWEqc8kfctXV5.nCjey', 'Karanglo, Gebangharjo, Kecamatan Pracimantoro', 'L', '2002-01-03', 'Wonogiri', 'Islam', '085802566810', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11677275, 'Akhmal Risqi Mahesa', NULL, '$2y$10$Dxr3G9Dyvmyg/y8NvRiTUuSta9cYCIY4iVV4t4lJCGx6.RmDzIC1O', 'Karanglo, Gebangharjo, Kecamatan Pracimantoro', 'L', '2003-01-09', 'Wonogiri', 'Islam', '081228487312', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11677284, 'Anjasmara Putra', NULL, '$2y$10$OsewY5ZUjgdDYresNRRYQusHhQiqTWjMDcYCiO5pyaHvv6AlslABy', 'Bohol, Gedong, Kecamatan Pracimantoro', 'L', '2001-06-04', 'Wonogiri', 'Islam', '087736790164', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11677288, 'Dani Nur Widiyanto', NULL, '$2y$10$LU.N7mZnnBXp9jl8Av6m/uzy8eRXEFMxAzAbDDZVqz7/bhMzCG3Em', 'Bohol, Gedong, Kecamatan Pracimantoro', 'L', '2003-06-05', 'Wonogiri', 'Islam', '085225181422', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11677294, 'Imam Tri Rulyanto', NULL, '$2y$10$myp4Nqa/geMMug1yx6W4R.knqEcTUN4wqQ4yvBp3f3sXKsjpFlIaq', 'Belik, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-12-10', 'Gunung Kidul', 'Islam', '087733129530', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11715602, 'Muhammad Faizal Alfando', NULL, '$2y$10$FY4ilHY/ORgXdA5Q3MU/1.SmaUpdqHEPpPYrcr6N.cXQdzzu.jOOi', 'Tambakrejo, Trukan, Kecamatan Pracimantoro', 'L', '2002-10-01', 'Wonogiri', 'Islam', '0877360986766', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11715646, 'Ariel Aprilia Sakti', NULL, '$2y$10$pSt/xKLBikVzuhSaCyvXX.77oSfA3bynEMyc460GPVw/MCAJ0fP9.', 'Glinggang, Duren, Kecamatan Pracimantoro', 'L', '2002-06-04', 'Wonogiri', 'Islam', '081228689903', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11715743, 'Adi Anggara Putra', NULL, '$2y$10$CHz89AAFLHFOpwb6uVB0kuVnPrV3BuEnbeZScN71IbaTl8SWvvNcu', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2002-01-03', 'Wonogiri', 'Islam', '085700051770', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11715745, 'Khillal Priwindanu', NULL, '$2y$10$3VpR73o6hHk3.7HIliNrEuu6AGD5wt2Jq1ZBGMLW7.CLCj6d5yahu', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2002-03-05', 'Wonogiri', 'Islam', '085725268238', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11715746, 'Riko Herawan', NULL, '$2y$10$fLW62pyRmaD7jj1BQkW9quETKKaVlcrzGh3QGCIhWHtgdNf7haBZq', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2002-05-05', 'Wonogiri', 'Islam', '08225724567', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11715747, 'Didik Alriyadi', NULL, '$2y$10$pwp2xfLqyTHiAuELyY2HD.sN6Avx6II9O0wmCiU/NoPIdTqU2/KFm', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2003-05-06', 'Wonogiri', 'Islam', '085774507575', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11715996, 'Irma Pradita', NULL, '$2y$10$q95Ls/4RNKYAO46S7sfTQenchRSNNDAnnccWmiSX8d5sFz7V2A92O', 'Dilem, Gebangharjo, Kecamatan Pracimantoro', 'P', '2001-06-11', 'Wonogiri', 'Islam', '082229012521', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(11716022, 'Heri Kristianto', NULL, '$2y$10$BAXceAK5CI3qZzgxaPLNw.YkVtaPqWv9yPwdBsPrDpG5.JNDW6pja', 'Tileng, Gambirmanis, Kecamatan Pracimantoro', 'L', '2002-09-01', 'Wonogiri', 'Islam', '083806544089', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(11716090, 'Kuncoro Adi Sidik', NULL, '$2y$10$SpkFCMEermCnip4HSv8FY.HKN0sLMNQZhk15uw/Bc/SpfFm3nFZbO', 'Ngulu Lor, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-08-07', 'Wonogiri', 'Islam', '082225493246', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(11716094, 'Ika Sari Prihatin', NULL, '$2y$10$NKNvl72eEizZajunjSNWAOc/gwMKm0edkFZ4GT4cVSTQWXfN0LK5e', 'Ngulu Lor, Pracimantoro, Kecamatan Pracimantoro', 'P', '2003-06-08', 'Wonogiri', 'Islam', '085801892804', 2016, 2019, 'default.png', NULL, 26, 7, 'aktif'),
(11716211, 'Ilham Agung Prasetyo', NULL, '$2y$10$tGr4D7OybYSfzvGViK.cwuGrOagzPKD77qGkcmJM7PcO8LypT8WeW', 'Kerok, Wonodadi, Kecamatan Pracimantoro', 'L', '2003-03-04', 'Wonogiri', 'Islam', '082322096204', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11716213, 'Aldi Setiawan', NULL, '$2y$10$GB1edwsBzNunFjFgx2pEs.C55qEb5mX2A7IYYWqLOvfheWkcZHOzG', 'Kerok, Wonpdadi, Kecamatan Pracimantoro', 'L', '2001-05-06', 'Wonogiri', 'Islam', '081332604362', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11716218, 'Sigit Irawan', NULL, '$2y$10$km4c9X8dB/gftYe6nrzSdOF/KBz55FpJzAyKZWHuzhpsiWaNSoBR.', 'Kerok, Wonodadi, Kecamatan Pracimantoro', 'L', '2002-04-11', 'Wonogiri', 'Islam', '085774507775', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11716324, 'Reyhan Adi Regisa', NULL, '$2y$10$OYJclllZVtEUuz/csIzfIe1AE0FDdWtq9OZfrgjAAEYb3vG4B3JSm', 'Wonoharjo, Sambiroto, Kecamatan Pracimantoro', 'L', '2001-03-01', 'Wonogiri', 'Islam', '083144936933', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11716326, 'Bayu Aji Febrianto', NULL, '$2y$10$RYLGXfVjRSt8ql45v4Q6IOExarzKs11UCm/ykFLdPrTNmh8AzFkE2', 'Wonokarto, Sambiroto, Kecamatan Pracimantoro', 'L', '2001-01-02', 'Wonogiri', 'Islam', '082229012544', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(11716338, 'Hendri Iriyanto', NULL, '$2y$10$82xHL70S20kdOW0DtvDvme8ySw92uSZauS3cvjE5SKizgeYZ9XCzG', 'Jojo, Wonodadi, Kecamatan Pracimantoro', 'L', '2001-02-06', 'Wonogiri', 'Islam', '087736790123', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(11795986, 'Erik Prasetya Putra Pratama', NULL, '$2y$10$6xshzx/ZxAMlml7eQB7YhudByee2v8n2AG66IFpVD8esVza0w2546', 'Gedangan, Mbargoharjo, Kecamatan Giritontro', 'L', '2001-08-05', 'Wonogiri', 'Islam', '085647331865', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(12250835, 'Andika Pamungkas', NULL, '$2y$10$TadlzfsIOYCNnRmRwJdfRO.8ho5k4f6TycMMASRCu0mBdodNVwtLO', 'Ngledok, Gendayaan, Kecamatan Paranggupito', 'L', '2002-07-01', 'Wonogiri', 'Islam', '082229012529', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(12250837, 'Rendi Arianto', NULL, '$2y$10$1ZdEeihPPIL6nefXEHLHGOEyOGKa99K7lKGpUZIqTiPcfggaI.ey6', 'Pucung, Gendayakan, Kecamatan Paranggupito', 'L', '2001-07-03', 'Wonogiri', 'Islam', '085647331890', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(12250980, 'Wahyu Arianto', NULL, '$2y$10$CygoV5Aj2n6QjcKHuFoJdu8pbVM/pPQrWU0Q0/AKncCx2d7AAlXS.', 'Waruharjo, Johunut, Kecamatan Paranggupito', 'L', '2002-03-01', 'Wonogiri', 'Islam', '081332604367', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(12250985, 'Roy Fadilah Vindu Winata', NULL, '$2y$10$dcUYyirPA6JOj2gO3pTGH.ZXVce/PkaTayEaqMON6R07A6E10H5QS', 'Pule, Johunut, Kecamatan Paranggupito', 'L', '2003-04-09', 'Wonogiri', 'Islam', '085725268991', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(12250987, 'Nova Andika Laksana Putra', NULL, '$2y$10$.nIc2F.cwUBa7ewl87fMzOrC1v7roITo2a1gBIAXbTvkPj6dv7dky', 'Johunut, Johunut, Kecamatan Paranggupito', 'L', '2002-08-11', 'Wonogiri', 'Islam', '08386592479', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(12251002, 'Mahdi Adji Fadhlurrahman', NULL, '$2y$10$JuspXQzNw.4A/nWF2xBKgu5wYnOKjWiQ5V8KREMbm0TZozB7xuhJi', 'Ketos, Ketos, Kecamatan Paranggupito', 'L', '2002-04-04', 'Bekasi', 'Islam', '087812779012', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(12251048, 'Triyono', NULL, '$2y$10$zvNQb6ExpNyWIFXO0K9dHO994aNIzhCC12NyL2BTYj7jJ1miTxaRa', 'Jeruk Wangi, Jeruk Wangi, Kecamatan Paranggupito', 'L', '1999-09-10', 'Wonogiri', 'Islam', '082264930993', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(12385848, 'Marlina Dian Saputri', NULL, '$2y$10$I1ppwK9OarLgTf.7AMl1weNzhyr2hZnWSwikijXBa8BA9CsvAW3xq', 'Bakagung, Petirsari, Kecamatan Pracimantoro', 'P', '2001-08-03', 'Wonogiri', 'Islam', '085867161176', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(12590403, 'Birtha Angelia Regita Saraswati', NULL, '$2y$10$Z2K.7A1breTxVh//n5VGEuKAPaB7qxTCfhroB7uSzOcAehY3VAd0O', 'Eromoko Wetan, Eromoko, Kecamatan Eromoko', 'P', '2001-12-03', 'Wonogiri', 'Khatolik', '083866770863', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(12590493, 'Randika Pratama', NULL, '$2y$10$Ol/rIsT20gw0CKcOIDpy2.o6II1DhqLv7bHYGZ9mSUYWrKGrKF0aS', 'Prambe, Baleharjo, Kecamatan Eromoko', 'L', '2003-02-01', 'Wonogiri', 'Islam', '0852991751342', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(12590500, 'Arif Bagus Setiyawan', NULL, '$2y$10$EtgnPPJtoCh9D5s1QRXbNeLj9eV9wlLUSyBtmvOFAcDu3AqpJHAli', 'Prambon, Baleharjo, Kecamatan Eromoko', 'L', '2001-03-08', 'Wonogiri', 'Islam', '083840953310', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(12591275, 'Dwi Novi Astuti', NULL, '$2y$10$K01sYWp3Ems4XAQVHwKMGu9OEL9wsJQlOTJZv876OwsWxKe1DjGba', 'Basuhan, Basuhan, Kecamatan Eromoko', 'P', '2002-02-12', 'Wonogiri', 'Islam', '083866770863', 2016, 2019, 'default.png', NULL, 26, 7, 'aktif'),
(12693239, 'Alang Windanu', NULL, '$2y$10$ux9.BKT3lGK.UuH4b74kq.LOChTMGJ3xBB8CNWe8LM3lZqiHBv69m', 'Ngroto, Girirejo, Kecamatan Tirtomoyo', 'L', '2001-12-05', 'Wonogiri', 'Islam', '08577321983', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(13242136, 'Wahyu Saputro', NULL, '$2y$10$8Mrk/c6Xi/KMMHW0sTt2oeMWf27jiPKX6MMGjhb76yeYMi/xfrM9K', 'Semen, Pondok, Kecamatan Ngadirojo', 'L', '2003-02-03', 'Wonogiri', 'Islam', '085802564090', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(13613086, 'Adhi Aprianto', NULL, '$2y$10$8Z9xN9TtjD3g28hDorTie.Dn4pn5pM4VY0xNngm4K75UZ3dP/QAVK', 'Muntil, Gedong, Kecamatan Pracimantoro', 'L', '2002-08-04', 'Wonogiri', 'Islam', '087736089775', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(13613089, 'Tony Candra Setia Putra', NULL, '$2y$10$nwVhS.bzf4Dv62PO2u6ea.hXYQM2pH1uu6cGfUVO9PSo38vZ08lae', 'Muntil, Gedong, Kecamatan Pracimantoro', 'L', '2003-05-10', 'Wonogiri', 'Islam', '0813147022468', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(14015638, 'Aditya Aryatama', NULL, '$2y$10$VQpEtmWBuP0oFEEf4V3jTeotL/Z2qPJQg1w0M9dE76sOZLkSLEZXG', 'Dayakan, Basuhan, Kecamatan Eromoko', 'L', '2002-04-01', 'Wonogiri', 'Islam', '081314809014', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(14960725, 'Puput Tri Lestari', NULL, '$2y$10$YbAtDaYJ7inoCQ7g0igzJuq.SnSi/3JId9kocWyrWoIrHwJAcHJ72', 'Guyangan, Sedayu, Kecamatan Pracimantoro', 'P', '2002-11-03', 'Wonogiri', 'Islam', '082325092409', 2016, 2019, 'default.png', NULL, 26, 7, 'aktif'),
(15712534, 'Rizki Arya Muqlisin', NULL, '$2y$10$EJTSGxM.MDSuTR7A7jXTD.6uZ58bQeUEKUZO.UMeL3o8VbJRULXkG', 'Gambiranom, Gambirmanis, Kecamatan Pracimantoro', 'L', '2002-12-04', 'Wonogiri', 'Islam', '087736065881', 2016, 2019, 'default.png', '', 27, 8, 'aktif'),
(15713138, 'Bayu Aprilianto', NULL, '$2y$10$1o.lZcxWXtyaRr7ks/xke.sifVlLKUKlJKIEyEMeDlKTnq55VllC2', 'Salam, Wonodadi, Kecamatan Pracimantoro', 'L', '2002-02-04', 'Wonogiri', 'Islam', '0856473319087', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(15713143, 'Ridwan Ari Nugroho', NULL, '$2y$10$uFu05p0hw958kBOWJJxbUef3U6tNd.tPXdoWWXgzyiI27KPorhPoS', 'Ngaluran, Sumberagung, Kecamatan Pracimantoro', 'L', '2003-04-06', 'Gunung Kidul', 'Islam', '082225727571', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(16160395, 'Erwin Wibowo', NULL, '$2y$10$iWf9c2wfAhCaVzWBMSeTheKgJm2LWpqrC8vGZUZdN40vnJWP19Bn2', 'Guyangan, Tempurhajo, Kecamatan Eromoko', 'L', '2002-02-09', 'Wonogiri', 'Islam', '081309711270', 2015, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(17280531, 'Bagus Prabowo', NULL, '$2y$10$UautGLz/sOuzYyC9c.u/IOT0iEPNE3W/wkJCfHHuourQZXksIxVRG', 'Pringkuku, Ngargoharjo, Kecamatan Giritontro', 'L', '2003-07-08', 'Wonogiri', 'Islam', '0857745078090', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(17960857, 'Fanny Aditya Putra', NULL, '$2y$10$a.Km94LJ5taFOpKT6CRk1en9Hacr2T4oOltM6DVh6KTqCCBfqVHFO', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2001-06-01', 'Wonogiri', 'Islam', '087736790169', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(18346514, 'Rivan', NULL, '$2y$10$omWVdhLDrnH0bt3q/rZ2YucLNU/r9UUEjNKqFS9vPUi8aAtaRG3G2', 'Pelem, Watangrejo, Kecamatan Pracimantoro', 'L', '2001-02-03', 'Wonogiri', 'Islam', '085647331987', 2016, 2019, 'default.png', NULL, 30, 9, 'aktif'),
(18464258, 'Anisa Fahmiati', NULL, '$2y$10$eq/Pia2yARYQH1kk73p3I.AUSNWtOLjnm0QPlt/zIvI0MxB6sz/ji', 'Gambiranom, Gambirmanis, Kecamatan Pracimantoro', 'P', '2002-06-03', 'Wonogiri', 'Islam', '081228689314', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(18540719, 'Ahmad Gunawan', NULL, '$2y$10$3oiGDppwTKOLsmTgPcQQn.DFiWRcmeFmtLOKngN2Fg9s2ZOMQbS02', 'Pendem, Gambirmanis, Kecamatan Pracimantoro', 'L', '2001-05-11', 'Wonogiri', 'Islam', '083866770891', 2016, 2019, 'default.png', NULL, 27, 8, 'aktif'),
(19128150, 'Aji Prabowo', NULL, '$2y$10$Km7ZfYxrj4YPipG0LlxBseV5hI9.kUU9O2Kb2AbC.6qdPdhRnUhsO', 'Ngulu Wetan, Pracimantoro, Kecamatan Pracimantoro', 'L', '2001-08-10', 'Wonogiri', 'Islam', '083866770801', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(19500981, 'Ahmad Maulana Adhi Putra', NULL, '$2y$10$KcihLKZn1H9NL/sq.zSDj.nI.OSgMXh2eUTX.d.VltQKkQrcdgauG', 'Salam, Sumberagung, Kecamatan Pracimantoro', 'L', '2001-04-06', 'Gunung Kidul', 'Islam', '082136394811', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(19652393, 'Diki Pamungkas', NULL, '$2y$10$CKG.nFFDCccLxUZId1jpNO5k/svqKdH/VZclGMi8aiLTzAy40WPgO', 'Sambirejo, Suci, Kecamatan Pracimantoro', 'L', '2002-05-12', 'Wonogiri', 'Islam', '085290772996', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif'),
(19922349, 'Riski Nugroho', NULL, '$2y$10$B5ZlFRAdzUfStshaVkO4auFbRefvUau7dwGN0eKIXdKHz8Scg9e52', 'Ngulu Kidul, KPracimantoro, Kecamatan Pracimantoro', 'L', '2003-06-03', 'Boyolali', 'Islam', '087712334108', 2016, 2019, 'default.png', NULL, 29, 8, 'aktif'),
(20134623, 'Rian Muhammad Yunus', NULL, '$2y$10$DX4oJxHBYTn7dRHUgkVzeOxjPCQyd2Bn4C6clrfhPWrq.i5MabJWG', 'Selorejo, Tubokarto, Kecamatan Pracimantoro', 'L', '2003-01-01', 'Wonogiri', 'Islam', '085647049603', 2016, 2019, 'default.png', NULL, 28, 8, 'aktif'),
(2147483647, 'Puji Asmorowati', NULL, '$2y$10$mHTVkAmrXQcPN7m0knDajeBIuSksZ3F2lw/sii2oIcIBeOInb3Tj2', 'Putat, Trukan, Kecamatan Pracimantoro', 'P', '1999-02-08', 'Wonogiri', 'Islam', '081578722089', 2016, 2019, 'default.png', NULL, 24, 6, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `judul_event` varchar(60) NOT NULL,
  `gambar_event` varchar(60) NOT NULL,
  `tanggal_event` date NOT NULL,
  `lokasi_event` varchar(60) NOT NULL,
  `waktu_event` varchar(30) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `slug` varchar(60) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `judul_event`, `gambar_event`, `tanggal_event`, `lokasi_event`, `waktu_event`, `deskripsi_event`, `slug`, `create_at`, `author`) VALUES
(2, 'Pentas Seni', 'default-event.jpg', '2020-07-25', 'jogja', '15:03', 'Pentas seni ini bertujuan sebagai penghibur di masa pandemi', 'Pentas-Seni', '2020-05-05 00:00:00', 'admin'),
(3, 'Sarasehan', 'event2.jpg', '2020-07-28', 'Cafe Mang ujang', '15:03', 'Event ini salah satu tujuannya adalah agar silaturahmi selalu terjaga', 'Sarasehan', '2020-05-20 00:00:00', 'admin'),
(4, 'Pentas Seni', '6716f91a47bfe40f1cd2cc7e98f4317c.jpg', '2020-07-22', 'Gedung Wonogiri', '10:00', 'Harus Tepat Waktu', 'Pentas-Seni', '2020-07-20 13:20:48', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(6, 'akuntansi'),
(7, 'tata niaga'),
(8, 'mekanik otomotif'),
(9, 'teknik sepeda motor');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_komentar`
--

CREATE TABLE `kategori_komentar` (
  `id_kategori` int(11) NOT NULL,
  `id_berita` int(11) DEFAULT NULL,
  `kategori` varchar(30) NOT NULL,
  `id_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_komentar`
--

INSERT INTO `kategori_komentar` (`id_kategori`, `id_berita`, `kategori`, `id_komentar`) VALUES
(1, 2, 'lowongan', 1),
(2, 2, 'lowongan', 2),
(3, 3, 'lowongan', 3),
(4, 2, 'lowongan', 4),
(6, 4, 'lowongan', 6),
(8, 2, 'event', 8),
(9, 2, 'lowongan', 9),
(10, 2, 'lowongan', 10),
(11, 5, 'lowongan', 11),
(12, 3, 'lowongan', 12),
(13, 3, 'lowongan', 13),
(14, 9, 'lowongan', 14),
(15, 4, 'lowongan', 14),
(16, 3, 'event', 15),
(17, 4, 'lowongan', 16),
(18, 2, 'event', 17),
(19, 4, 'lowongan', 18);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `nama_kelas`) VALUES
(24, 6, 'XII'),
(25, 6, 'XII A'),
(26, 7, 'XII'),
(27, 8, 'XII A'),
(28, 8, 'XII B'),
(29, 8, 'XII C'),
(30, 9, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_parent_komentar` int(11) NOT NULL DEFAULT '0',
  `komentar` varchar(250) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(60) NOT NULL,
  `komentar_oleh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_parent_komentar`, `komentar`, `tanggal`, `author`, `komentar_oleh`) VALUES
(14, 0, 'Pengiriman lamaran via apa ya?', '2020-07-22 11:35:46', '516', 'alumni'),
(15, 0, 'Acara nya selasai jam berapa ya?', '2020-07-22 11:37:01', '516', 'alumni'),
(16, 0, 'Kuotanya berapa min?', '2020-07-22 11:41:47', '345876', 'alumni'),
(17, 0, 'Datangnya boleh terlambat atau tidak ya min?', '2020-07-22 11:42:29', '345876', 'alumni'),
(18, 0, 'Semua persyaratan rangkap berapa min?', '2020-07-22 11:50:07', '890', 'alumni');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritik_saran`, `nisn`, `kritik`, `saran`, `create_at`) VALUES
(1, 11635640, 'Mushola kurang bersih', 'Seharusnya ada petugas khusus untuk membersihkan mushola', '2020-08-10 21:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `posisi_pekerjaan` varchar(60) NOT NULL,
  `perusahaan` varchar(60) NOT NULL,
  `penempatan` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `thumbnail` varchar(60) NOT NULL DEFAULT 'default-job.png',
  `berakhir` date DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(30) NOT NULL,
  `slug` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `posisi_pekerjaan`, `perusahaan`, `penempatan`, `deskripsi`, `thumbnail`, `berakhir`, `create_at`, `author`, `slug`) VALUES
(3, 'data enginerr', 'Telkom', 'DKI Jakarta', 'membangun aplikasi berbasis web', 'e43af63a280e8f78e28ce2819749d82b.jpg', '2020-07-30', '2020-05-01 22:25:29', 'admin', 'data-enginerr-Telkom'),
(4, 'Pramuniaga dan Kasir', 'Mirota Pasaraya', 'DI Yogyakarta', 'Kirim ke Pt Terkait', 'ada03fbfa12685481b551575bc30b20c.jpg', '2020-07-25', '2020-07-20 13:19:29', 'admin', 'Pramuniaga-dan-Kasir-Mirota-Pasaraya');

-- --------------------------------------------------------

--
-- Table structure for table `obrolan_pesan`
--

CREATE TABLE `obrolan_pesan` (
  `id_obrolan` int(11) NOT NULL,
  `obrolan_pesan` varchar(120) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pesan` int(11) NOT NULL,
  `pengirim` enum('alumni','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obrolan_pesan`
--

INSERT INTO `obrolan_pesan` (`id_obrolan`, `obrolan_pesan`, `tanggal`, `id_pesan`, `pengirim`) VALUES
(22, 'hallo, ada yang bisa dibantu?', '2020-05-10 17:23:39', 1, 'admin'),
(29, 'saya mau tanya sesuatu!', '2020-05-11 22:59:07', 1, 'alumni'),
(30, 'iyah, tanya ajah bambang!!!', '2020-05-11 22:59:19', 1, 'admin'),
(31, 'dwd', '2020-05-22 18:01:22', 3, 'admin'),
(32, 'hallo', '2020-05-22 18:03:20', 3, 'alumni'),
(33, 'test', '2020-06-17 22:47:14', 1, 'admin'),
(34, 'hayooo', '2020-06-17 22:47:26', 1, 'alumni'),
(35, 'Halo mbak, ada yang bisa saya bantu?', '2020-07-20 13:25:41', 4, 'admin'),
(36, 'mau menanyakterkait lowongan', '2020-07-20 13:27:09', 4, 'alumni');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `browser` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `tanggal`, `browser`, `ip`) VALUES
(1, '2020-07-30 21:32:06', 'Firefox', '::1'),
(2, '2020-08-06 16:25:56', 'Chrome', '::1'),
(3, '2020-08-08 09:19:32', 'Chrome', '::1'),
(4, '2020-08-10 20:52:22', 'Chrome', '::1'),
(5, '2020-08-11 13:13:46', 'Chrome', '::1'),
(6, '2020-08-12 09:41:31', 'Chrome', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nisn` int(30) NOT NULL,
  `subjek` varchar(60) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('menunggu','terima','tolak') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nisn`, `subjek`, `keterangan`, `tanggal`, `status`) VALUES
(1, 1234, 'test', 'fdwefwefwefwefwefwf', '2020-05-10 15:51:28', 'terima'),
(3, 1234, 'Test Pesan', 'ini cuman test', '2020-05-22 17:10:16', 'terima'),
(4, 516, 'Terkait lowongan pekerjaan', 'Lowongan pekerjaan', '2020-07-20 13:24:06', 'terima');

-- --------------------------------------------------------

--
-- Table structure for table `status_alumni`
--

CREATE TABLE `status_alumni` (
  `id_status` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `status` varchar(60) NOT NULL,
  `jabatan` varchar(60) DEFAULT NULL,
  `universitas` varchar(60) DEFAULT NULL,
  `tanggal_bekerja` date DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_alumni`
--

INSERT INTO `status_alumni` (`id_status`, `nisn`, `status`, `jabatan`, `universitas`, `tanggal_bekerja`, `deskripsi`) VALUES
(5, 1049711, 'bekerja', NULL, NULL, NULL, 'Bekerja di Solo Grand Mall'),
(6, 1488351, 'bekerja', NULL, NULL, NULL, 'Bekerja di Surya Motor Surakarta'),
(7, 5350278, 'bekerja', NULL, NULL, NULL, 'Rumah makan solo'),
(8, 5354602, 'bekerja', NULL, NULL, NULL, 'Bekerja di indomaret'),
(9, 4572401, 'kuliah', NULL, NULL, NULL, 'Kuliah di Universitas Janabadra Yogyakarta'),
(10, 4572873, 'kuliah', NULL, NULL, NULL, 'Kuliah di Akademi Teknik Warga Surakarta'),
(11, 5295304, 'tidak', NULL, NULL, NULL, 'Belum bekerja'),
(12, 11676924, 'kuliah', NULL, NULL, NULL, 'Kuliah di Universitas Sebelas Maret'),
(13, 11636403, 'tidak', NULL, NULL, NULL, 'Belum bekerja'),
(14, 11675463, 'bekerja kuliah', NULL, NULL, NULL, 'Bekerja di PT Liebra Permana\r\nKuliah di Universitas Terbuka'),
(15, 12591275, 'kuliah', NULL, NULL, NULL, 'Kuliah di Universitas Terbuka'),
(16, 11635640, 'tidak', NULL, NULL, NULL, 'Belum bekerja'),
(17, 11636173, 'bekerja', NULL, NULL, NULL, 'Bekerja di Rachmat Motor'),
(18, 14960725, 'bekerja kuliah', NULL, NULL, NULL, 'Bekerja di Toserba Putra Sakat\r\nKuliah di Universitas Terbuka'),
(19, 5414584, 'kuliah', NULL, NULL, NULL, 'Kuliah di STIA Asmi Surakarta'),
(20, 17960857, 'tidak', NULL, NULL, NULL, 'Belum bekerja'),
(21, 7766880, 'bekerja kuliah', NULL, NULL, NULL, 'Bekerja di Naga Mas Motor\r\nKuliah di Universitas Terbuka'),
(22, 2208456, 'bekerja', NULL, NULL, NULL, 'Bekerja di Surya Abadi Motor'),
(23, 18346514, 'tidak', NULL, NULL, NULL, 'Belum bekerja'),
(24, 11634629, 'bekerja kuliah', NULL, NULL, NULL, 'Bekerja di PT AHM\r\nKuliah di Universitas Bina Bangsa'),
(28, 1234567, 'bekerja', 'Web Developer', '', '2020-08-02', 'fewfiefjregeoigjrigjr'),
(29, 5414182, 'bekerja', 'Karyawan', '', '2020-01-10', 'Bekerja di Naga Mas Motor');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nisn` int(20) NOT NULL,
  `testimoni` text,
  `is_tampil` enum('ya','tidak') NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nisn`, `testimoni`, `is_tampil`, `create_at`) VALUES
(3, 11675463, 'SMK Pancasila 7 Pracimantoro merupakan sekolah kejuruan yang berkualitas di pracimantoro', 'ya', '2020-08-10 21:11:19'),
(4, 12591275, 'Guru Tataniaga di SMK Pancasila 7 Pracimantoro sabar - sabar', 'ya', '2020-08-10 21:14:33'),
(5, 18346514, 'SMK Pancasila 7 Pracimantoro hebat', 'ya', '2020-08-10 21:38:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori_komentar`
--
ALTER TABLE `kategori_komentar`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `kategori_komentar_ibfk_2` (`id_berita`),
  ADD KEY `kategori_komentar_ibfk_3` (`id_komentar`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `obrolan_pesan`
--
ALTER TABLE `obrolan_pesan`
  ADD PRIMARY KEY (`id_obrolan`),
  ADD KEY `obrolan_pesan_ibfk_1` (`id_pesan`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `status_alumni`
--
ALTER TABLE `status_alumni`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `status_alumni_ibfk_1` (`nisn`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_komentar`
--
ALTER TABLE `kategori_komentar`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obrolan_pesan`
--
ALTER TABLE `obrolan_pesan`
  MODIFY `id_obrolan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_alumni`
--
ALTER TABLE `status_alumni`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `kritik_saran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `alumni` (`nisn`);

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`author`) REFERENCES `admin` (`username`);

--
-- Constraints for table `obrolan_pesan`
--
ALTER TABLE `obrolan_pesan`
  ADD CONSTRAINT `obrolan_pesan_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE;

--
-- Constraints for table `status_alumni`
--
ALTER TABLE `status_alumni`
  ADD CONSTRAINT `status_alumni_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `alumni` (`nisn`);

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `alumni` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

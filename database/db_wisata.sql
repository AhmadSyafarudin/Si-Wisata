-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `db_wisata` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_wisata`;

DROP TABLE IF EXISTS `tb_tiket`;
CREATE TABLE `tb_tiket` (
  `id_tiket` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_0900_bin NOT NULL,
  `no_wa` varchar(13) COLLATE utf8mb4_0900_bin NOT NULL,
  `alamat` tinytext COLLATE utf8mb4_0900_bin NOT NULL,
  `destinasi_wisata` tinytext COLLATE utf8mb4_0900_bin NOT NULL,
  `tanggal_perjalanan` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `layanan` varchar(64) COLLATE utf8mb4_0900_bin NOT NULL,
  `jumlah_peserta` int NOT NULL,
  `harga_paket` int NOT NULL,
  `jumlah_tagihan` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tiket`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_tiket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_bin;

INSERT INTO `tb_tiket` (`id_tiket`, `id_user`, `nama`, `no_wa`, `alamat`, `destinasi_wisata`, `tanggal_perjalanan`, `tanggal_pulang`, `layanan`, `jumlah_peserta`, `harga_paket`, `jumlah_tagihan`, `created_at`, `updated_at`) VALUES
(3,	2,	'Ahmad Syafarudin',	'895604395176',	'Jl. Kesehatan No. 246, RT/RW. 09/05, Kel. Pringsewu Selatan, Kec. Pringsewu, Kab. Pringsewu, Lampung',	'Danau Toba',	'2024-08-28',	'2024-08-30',	'Penginapan,Transportasi,Makan',	2,	2700000,	16200000,	'2024-08-28 10:59:23',	'2024-08-28 13:56:41'),
(12,	2,	'Ahmad Syafarudin',	'895604395176',	'Jl. Kesehatan No. 246, RT/RW. 09/05, Kel. Pringsewu Selatan, Kec. Pringsewu, Kab. Pringsewu, Lampung',	'Danau Toba',	'2024-08-28',	'2024-08-30',	'Penginapan,Transportasi,Makan',	3,	2700000,	24300000,	'2024-08-28 10:29:25',	NULL),
(18,	3,	'Arif',	'89898151489',	'Jl. Kesehatan No. 246, RT/RW. 09/05, Kel. Pringsewu Selatan, Kec. Pringsewu, Kab. Pringsewu, Lampung',	'Raja Ampat',	'2024-09-01',	'2024-09-07',	'Penginapan,Transportasi,',	12,	2200000,	184800000,	'2024-08-28 13:52:05',	'2024-08-28 13:54:41'),
(19,	2,	'Ahmad Syafarudin',	'895604395176',	'Jl. Kesehatan No. 246, RT/RW. 09/05, Kel. Pringsewu Selatan, Kec. Pringsewu, Kab. Pringsewu, Lampung',	'Danau Toba',	'2024-08-28',	'2024-08-30',	'Penginapan,Transportasi,Makan',	3,	2700000,	24300000,	'2024-08-28 10:29:25',	NULL),
(20,	2,	'Ahmad Syafarudin',	'895604395176',	'Jl. Kesehatan No. 246, RT/RW. 09/05, Kel. Pringsewu Selatan, Kec. Pringsewu, Kab. Pringsewu, Lampung',	'Danau Toba',	'2024-08-28',	'2024-08-30',	'Penginapan,Transportasi,Makan',	3,	2700000,	24300000,	'2024-08-28 10:29:25',	NULL);

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `role` enum('Admin','User') COLLATE utf8mb4_0900_bin NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_0900_bin NOT NULL,
  `password` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_bin NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_0900_bin NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_0900_bin NOT NULL,
  `nama_lengkap` varchar(64) COLLATE utf8mb4_0900_bin NOT NULL,
  `foto_profil` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_bin;

INSERT INTO `tb_user` (`id_user`, `role`, `username`, `password`, `email`, `no_hp`, `nama_lengkap`, `foto_profil`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'admin',	'$2y$10$xXebVfepV9P/kRWb2ww7rOazo4fgevle/iMsIwSXfX/PoGOI7vj.G',	'admin@gmail.com',	'-',	'Admin',	NULL,	'2024-08-27 02:39:59',	NULL),
(2,	'User',	'ahmadsyafar',	'$2y$10$QrEtNGRCo2gtwDHLpOh7KOcx75ItOyRPq8qsbW4S1BssmdWIYnuA2',	'ahmadsyafar99@gmail.com',	'0895604395176',	'Ahmad Syafarudin',	NULL,	'2024-08-27 02:53:28',	NULL),
(3,	'User',	'arif',	'$2y$10$QrEtNGRCo2gtwDHLpOh7KOcx75ItOyRPq8qsbW4S1BssmdWIYnuA2',	'arif@gmail.com',	'08914141151',	'Arif',	NULL,	'2024-08-28 11:01:04',	NULL);

-- 2024-08-29 01:07:23

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_decafe
CREATE DATABASE IF NOT EXISTS `db_decafe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_decafe`;

-- Dumping structure for table db_decafe.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_bayar: ~7 rows (approximately)
INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
	(1, 120, 105, '2023-11-11 18:24:40'),
	(2, 50, 20, '2023-11-11 18:30:38'),
	(3, 150, 140, '2023-11-12 04:28:10'),
	(7, 50, 20, '2023-11-12 12:02:25'),
	(8, 200, 140, '2023-11-12 12:45:53'),
	(2311121925147, 150, 140, '2023-11-12 12:43:24'),
	(2311122353920, 150, 140, '2023-11-12 16:58:30'),
	(2311141020556, 800, 725, '2023-11-14 03:22:02');

-- Dumping structure for table db_decafe.tb_daftar_menu
CREATE TABLE IF NOT EXISTS `tb_daftar_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_menu` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_tb_daftar_menu_tb_kategori_menu` (`kategori`),
  CONSTRAINT `FK_tb_daftar_menu_tb_kategori_menu` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kat_menu`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_daftar_menu: ~0 rows (approximately)

-- Dumping structure for table db_decafe.tb_kategori_menu
CREATE TABLE IF NOT EXISTS `tb_kategori_menu` (
  `id_kat_menu` int NOT NULL AUTO_INCREMENT,
  `jenis_menu` int DEFAULT NULL,
  `kategori_menu` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_kat_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_kategori_menu: ~0 rows (approximately)

-- Dumping structure for table db_decafe.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `menu` int DEFAULT NULL,
  `kode_order` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `catatan` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `menu` (`menu`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftar_menu` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_list_order: ~0 rows (approximately)

-- Dumping structure for table db_decafe.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint NOT NULL AUTO_INCREMENT,
  `pelanggan` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meja` int DEFAULT NULL,
  `pelayan` int DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`),
  KEY `pelayan` (`pelayan`),
  CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2311141429550 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_order: ~0 rows (approximately)

-- Dumping structure for table db_decafe.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_user: ~10 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'abc', 'abc@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789011', 'Ds.Calong'),
	(2, 'admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '123456789098', 'Ds.U blang asan'),
	(3, 'abcd', 'abcd@abcd.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', 'Bandung'),
	(19, 'Risma Yanti', 'Risma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082234768906', 'Sp.Mulieng'),
	(22, 'Haliza', 'lizaa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082287657899', 'blanjuruen'),
	(28, 'ffffuu', 'yuyuu@yuyun.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0822786532', 'gampong pulo'),
	(33, 'Andisa', 'Dr.Andisa@andi.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '082289875466', 'sp.rangkaya'),
	(34, 'Devi', 'pasien@devi.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082289876900', 'sp.mulieng'),
	(35, 'popo', 'pasien@popo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0843536737', '111df');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

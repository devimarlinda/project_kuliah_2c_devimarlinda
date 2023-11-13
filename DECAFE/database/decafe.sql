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

-- Dumping structure for table db_decafe.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_decafe.tb_bayar: ~7 rows (approximately)
INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
	(1, 120, 105, '2023-11-11 18:24:40'),
	(2, 50, 20, '2023-11-11 18:30:38'),
	(3, 150, 140, '2023-11-12 04:28:10'),
	(7, 50, 20, '2023-11-12 12:02:25'),
	(8, 200, 140, '2023-11-12 12:45:53'),
	(2311121925147, 150, 140, '2023-11-12 12:43:24'),
	(2311122353920, 150, 140, '2023-11-12 16:58:30');

-- Dumping structure for table db_decafe.tb_daftar_menu
CREATE TABLE IF NOT EXISTS `tb_daftar_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nama_menu` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4  DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL,
  `stok` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_tb_daftar_menu_tb_kategori_menu` (`kategori`),
  CONSTRAINT `FK_tb_daftar_menu_tb_kategori_menu` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kat_menu`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_daftar_menu: ~4 rows (approximately)
INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
	(1, '13952-1.png', 'Mie Aceh ', 'Mie asli dari Aceh', 27, '15.000', '30'),
	(3, '78771-2.png', 'Burger', 'Burger rasa keju', 2, '10.000', '30'),
	(4, '25111-4.png', 'Kopi Susu', 'Kopi susu manis', 28, '10.000', '40'),
	(5, '95226-12.png', 'Jus Mangga', 'Jus Mangga Jeli', 3, '10.000', '30'),
	(6, '35561-7.png', 'Bakso Mie Ayam', 'gurih enak', 27, '15.000', '60'),
	(7, '13401-9.png', 'Soto', 'soto ayam', 26, '20.000', '50'),
	(8, '59425-6.png', 'Nasi Goreng udang', 'Nasi goreng Udang balado', 16, '17.000', '30'),
	(9, '66750-8.png', 'Nasi Uduk', 'gurih', 16, '20.000', '30'),
	(10, '42840-14.png', 'Kepiting saus tiram', 'kepiting saus tiram asam manis', 2, '40.000', '49');

-- Dumping structure for table db_decafe.tb_kategori_menu
CREATE TABLE IF NOT EXISTS `tb_kategori_menu` (
  `id_kat_menu` int NOT NULL AUTO_INCREMENT,
  `jenis_menu` int DEFAULT NULL,
  `kategori_menu` varchar(50)  DEFAULT NULL,
  PRIMARY KEY (`id_kat_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_kategori_menu: ~6 rows (approximately)
INSERT INTO `tb_kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
	(2, 1, 'Snackk'),
	(3, 2, 'Jus'),
	(16, 1, 'Nasi'),
	(26, 1, 'kuwah'),
	(27, 1, 'Mie'),
	(28, 2, 'kopi');

-- Dumping structure for table db_decafe.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `menu` int DEFAULT NULL,
  `kode_order` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `catatan` varchar(300)  DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `menu` (`menu`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftar_menu` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_list_order: ~15 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
	(1, 1, 1, 7, '3 jangan pakek saus tomat', 2),
	(2, 1, 5, 5, 'tampa bawang goreng', 2),
	(4, 4, 2, 2, 'manis', 2),
	(5, 5, 4, 2, '', 1),
	(6, 3, 4, 2, '', 1),
	(7, 4, 4, 1, '', NULL),
	(8, 4, 3, 7, 'manis', 2),
	(9, 3, 3, 5, 'Kejunya yanag banyak', 2),
	(10, 3, 6, 6, '2 pedas ', NULL),
	(11, 5, 3, 2, '', 1),
	(12, 5, 2, 4, '', 2),
	(13, 3, 7, 2, 'pedas', 1),
	(14, 3, 8, 7, '2 jangan pakek tomat', NULL),
	(15, 5, 8, 6, 'pakek gula aren', NULL),
	(16, 4, 8, 1, 'dingin', NULL),
	(17, 7, 2311122353920, 7, 'jangan pedas', 2);

-- Dumping structure for table db_decafe.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint NOT NULL AUTO_INCREMENT,
  `pelanggan` varchar(200)  DEFAULT NULL,
  `meja` int DEFAULT NULL,
  `pelayan` int DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`),
  KEY `pelayan` (`pelayan`),
  CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2311122353921 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_order: ~8 rows (approximately)
INSERT INTO `tb_order` (`id_order`, `pelanggan`, `meja`, `pelayan`, `waktu_order`) VALUES
	(1, 'devi', 1, 3, '2023-11-11 09:16:59'),
	(2, 'risma', 2, 22, '2023-11-11 10:14:33'),
	(3, 'lija', 3, 19, '2023-11-11 10:15:09'),
	(4, 'hana', 4, 22, '2023-11-11 10:16:15'),
	(5, 'gaga', 5, 28, '2023-11-11 10:16:56'),
	(6, 'dedek', 6, 2, '2023-11-11 17:22:36'),
	(7, 'yuyu', 4, 2, '2023-11-12 04:04:01'),
	(8, 'kiku', 5, 2, '2023-11-12 12:25:30'),
	(2311122353920, 'Devi Marlinda', 11, 2, '2023-11-12 16:54:50');

-- Dumping structure for table db_decafe.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200)  DEFAULT NULL,
  `username` varchar(200)  DEFAULT NULL,
  `password` varchar(200)  DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15)  DEFAULT NULL,
  `alamat` varchar(300)  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_user: ~13 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'abc', 'abc@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789011', 'Ds.Calong'),
	(2, 'admin', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '123456789098', 'Ds.U blang asan'),
	(3, 'abcd', 'abcd@abcd.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', 'Bandung'),
	(4, 'abcde', 'abcde@abcde.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '123456789011', 'Jakarta'),
	(14, 'Hanafi Al Fayyad', 'Hanafi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '082212356783', 'Lhoksukon'),
	(16, 'Farah Nasywa', 'FarahNasywa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '081234151617', 'Lhokseumawe'),
	(17, 'Nurma', 'Nurma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '081234251617', 'Sp.KKA'),
	(18, 'Elvira S', 'Elvira@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '081234251617', 'Lhokseumawe'),
	(19, 'Risma Yanti', 'Risma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082234768906', 'Sp.Mulieng'),
	(21, 'Hambali al muntaz', 'hambali@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082234567896', 'Bayu'),
	(22, 'Haliza', 'lizaa@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082287657899', 'blanjuruen'),
	(28, 'ffffuu', 'yuyuu@yuyun.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0822786532', 'gampong pulo');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

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

-- Dumping structure for table db_klinik.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `nik` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=1240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_klinik.tb_user: ~5 rows (approximately)
INSERT INTO `tb_user` (`nik`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(123, 'Devi', 'pasien@devi.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '082289876900', 'sp.mulieng'),
	(231, 'Dara', 'admin@dara.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '082234156272', 'Ds.u'),
	(333, 'dr.andika', 'dr.andika@andi.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '082231415617', 'Sp.Rangkaya'),
	(1235, 'dedek', 'pasien@dek.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '082234543256', 'Alue rayeuk'),
	(1239, 'dekna', 'dekna@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '0822345670', 'ssssssssssssgfdsadfghj');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_material.alamat_users
CREATE TABLE IF NOT EXISTS `alamat_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `alamat_detail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_material.alamat_users: ~1 rows (approximately)
INSERT INTO `alamat_users` (`id`, `id_user`, `kota`, `kecamatan`, `alamat_detail`) VALUES
	(1, 1, 'Tangerang', 'Periuk', 'Belakang orchid bos'),
	(2, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(3, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(4, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(5, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(6, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(7, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(8, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(9, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(10, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings'),
	(11, 2, 'Jakarta pusats', 'tanah abangs', 'jl blimbings');

-- Dumping structure for table db_material.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `stock` float DEFAULT NULL,
  `pic` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_material.barang: ~5 rows (approximately)
INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `satuan`, `stock`, `pic`) VALUES
	(1, 'Genteng', 1200, 'Pcs', 1000, _binary 0x696d616765732f7372634974656d732f67656e74656e672e6a7067),
	(3, 'Besi', 5000, 'Meter', 200, _binary 0x696d616765732f7372634974656d732f626573692e6a7067),
	(4, 'kayu', 20000, 'Pcs', 240, _binary 0x696d616765732f7372634974656d732f6b72696b696c2e6a7067),
	(7, 'Suryes', 20000, '20000', 200, _binary 0x696d616765732f7372634974656d732f737572796174756b616e672e6a7067),
	(8, 'Pasir Merapi', 300000, 'Kibik', 5, _binary 0x696d616765732f7372634974656d732f70617369722e6a7067);

-- Dumping structure for table db_material.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_material.users: ~2 rows (approximately)
INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `no_hp`, `email`, `status`, `level`) VALUES
	(1, 'yusril ahmad', 'yusril', 'yusril123', '0898989', 'yus@gmail.com', 'aktif', 'admin'),
	(2, 'yudiantos', 'yudis', 'yudi123', '12345678', 'yudis@gmail.com', 'aktif', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

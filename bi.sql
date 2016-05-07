-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.5071
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for Surat
CREATE DATABASE IF NOT EXISTS `Surat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Surat`;

-- Dumping structure for table Surat.JenisDokumen
CREATE TABLE IF NOT EXISTS `JenisDokumen` (
  `idJenisDokumen` int(11) NOT NULL AUTO_INCREMENT,
  `JenisDokumen` varchar(45) DEFAULT NULL,
  `Keterangan` varchar(45) DEFAULT NULL,
  `IdUserCreate` int(11) DEFAULT NULL,
  `IdUserApprove` int(11) DEFAULT NULL,
  `Approval` enum('Y','N') DEFAULT NULL,
  `KetDelete` enum('Y','N') DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idJenisDokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.NoSurat
CREATE TABLE IF NOT EXISTS `NoSurat` (
  `idNoSurat` int(11) NOT NULL AUTO_INCREMENT,
  `TahunBuku` varchar(50) DEFAULT NULL,
  `NoBuku` varchar(45) DEFAULT NULL,
  `Penerbit` varchar(45) DEFAULT NULL,
  `JenisDokumen` varchar(45) DEFAULT NULL,
  `SifatDokumen` varchar(45) DEFAULT NULL,
  `Approval` enum('Y','N') DEFAULT NULL,
  `KetDelete` enum('Y','N') DEFAULT NULL,
  `IdUserCreator` int(11) DEFAULT NULL,
  `IdUserEditor` int(11) DEFAULT NULL,
  `IdUserApprove` int(10) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idNoSurat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.Role
CREATE TABLE IF NOT EXISTS `Role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `roleAkses` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.SatuanKerja
CREATE TABLE IF NOT EXISTS `SatuanKerja` (
  `idSatuanKerja` int(11) NOT NULL AUTO_INCREMENT,
  `SatuanKerja` varchar(45) DEFAULT NULL,
  `Keterangan` varchar(45) DEFAULT NULL,
  `IdUserCreate` int(11) DEFAULT NULL,
  `IdUserApprove` int(11) DEFAULT NULL,
  `Approval` enum('Y','N') DEFAULT NULL,
  `KetDelete` enum('Y','N') DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idSatuanKerja`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.SifatDokumen
CREATE TABLE IF NOT EXISTS `SifatDokumen` (
  `idSifatDokumen` int(11) NOT NULL AUTO_INCREMENT,
  `SifatDokumen` varchar(45) DEFAULT NULL,
  `Keterangan` varchar(45) DEFAULT NULL,
  `IdUserCreate` int(11) DEFAULT NULL,
  `IdUserApprove` int(11) DEFAULT NULL,
  `Approval` enum('Y','N') DEFAULT NULL,
  `KetDelete` enum('Y','N') DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idSifatDokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.Tahun
CREATE TABLE IF NOT EXISTS `Tahun` (
  `idTahun` int(11) NOT NULL AUTO_INCREMENT,
  `TahunBuku` year(4) DEFAULT NULL,
  `noTahunBuku` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTahun`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.TempNoSurat
CREATE TABLE IF NOT EXISTS `TempNoSurat` (
  `idTempNoSurat` int(11) NOT NULL AUTO_INCREMENT,
  `TahunBuku` varchar(45) DEFAULT NULL,
  `Penerbit` varchar(45) DEFAULT NULL,
  `JenisDokumen` varchar(45) DEFAULT NULL,
  `SifatDokumen` varchar(45) DEFAULT NULL,
  `IdUserCreate` int(11) DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  PRIMARY KEY (`idTempNoSurat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.Tim
CREATE TABLE IF NOT EXISTS `Tim` (
  `idTim` int(11) NOT NULL AUTO_INCREMENT,
  `Tim` varchar(45) DEFAULT NULL,
  `Keterangan` varchar(45) DEFAULT NULL,
  `IdUserCreate` int(11) DEFAULT NULL,
  `IdUserApprove` int(11) DEFAULT NULL,
  `Approval` enum('Y','N') DEFAULT NULL,
  `KetDelete` enum('Y','N') DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idTim`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.UnitKerja
CREATE TABLE IF NOT EXISTS `UnitKerja` (
  `idUnitKerja` int(11) NOT NULL AUTO_INCREMENT,
  `UnitKerja` varchar(45) DEFAULT NULL,
  `Keterangan` varchar(45) DEFAULT NULL,
  `IdUserCreate` int(11) DEFAULT NULL,
  `IdUserApprove` int(11) DEFAULT NULL,
  `Approval` enum('Y','N') DEFAULT NULL,
  `KetDelete` enum('Y','N') DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `DateUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idUnitKerja`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table Surat.Users
CREATE TABLE IF NOT EXISTS `Users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `RoleAkses` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `FK_User_Role` (`RoleAkses`),
  CONSTRAINT `FK_User_Role` FOREIGN KEY (`RoleAkses`) REFERENCES `Role` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

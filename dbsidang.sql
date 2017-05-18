/*
SQLyog Ultimate v9.60 
MySQL - 5.5.5-10.1.21-MariaDB : Database - dbsidang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsidang` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbsidang`;

/*Table structure for table `prd_dosen` */

DROP TABLE IF EXISTS `prd_dosen`;

CREATE TABLE `prd_dosen` (
  `KodeDosen` varchar(3) NOT NULL,
  `NamaDosen` varchar(200) DEFAULT NULL,
  `Tlp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`KodeDosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_dosen` */

insert  into `prd_dosen`(`KodeDosen`,`NamaDosen`,`Tlp`) values ('HM','Heti','083123'),('JJ','Jajang','08912121');

/*Table structure for table `prd_jabatan` */

DROP TABLE IF EXISTS `prd_jabatan`;

CREATE TABLE `prd_jabatan` (
  `IdJabatan` int(11) NOT NULL AUTO_INCREMENT,
  `KodeDosen` varchar(3) DEFAULT NULL,
  `IdJenisDosen` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`IdJabatan`),
  KEY `KodeDosen` (`KodeDosen`),
  KEY `IdJenisDosen` (`IdJenisDosen`),
  CONSTRAINT `prd_jabatan_ibfk_1` FOREIGN KEY (`KodeDosen`) REFERENCES `prd_dosen` (`KodeDosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_jabatan_ibfk_2` FOREIGN KEY (`IdJenisDosen`) REFERENCES `prd_jenisdosen` (`IdJenisDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `prd_jabatan` */

insert  into `prd_jabatan`(`IdJabatan`,`KodeDosen`,`IdJenisDosen`) values (1,'JJ','PB'),(2,'JJ','PJ'),(3,'HM','PB'),(4,'HM','PJ'),(5,'HM','PB');

/*Table structure for table `prd_jenisdosen` */

DROP TABLE IF EXISTS `prd_jenisdosen`;

CREATE TABLE `prd_jenisdosen` (
  `IdJenisDosen` varchar(3) NOT NULL,
  `NamaJenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdJenisDosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_jenisdosen` */

insert  into `prd_jenisdosen`(`IdJenisDosen`,`NamaJenis`) values ('PB','Pembimbing'),('PJ','Penguji');

/*Table structure for table `prd_jenissidang` */

DROP TABLE IF EXISTS `prd_jenissidang`;

CREATE TABLE `prd_jenissidang` (
  `IDJenisSidang` int(11) NOT NULL,
  `NamaSidang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDJenisSidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_jenissidang` */

insert  into `prd_jenissidang`(`IDJenisSidang`,`NamaSidang`) values (1,'Pra Sidang '),(2,'Sidang Skripsi'),(3,'Sidang KP');

/*Table structure for table `prd_jurusan` */

DROP TABLE IF EXISTS `prd_jurusan`;

CREATE TABLE `prd_jurusan` (
  `KodeJurusan` varchar(50) NOT NULL,
  `NamaJurusan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KodeJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_jurusan` */

insert  into `prd_jurusan`(`KodeJurusan`,`NamaJurusan`) values ('IF','Teknik Informatika'),('KA','Komputer Akuntansi'),('SI','Sistem Informasi');

/*Table structure for table `prd_mahasiswa` */

DROP TABLE IF EXISTS `prd_mahasiswa`;

CREATE TABLE `prd_mahasiswa` (
  `NIM` int(11) NOT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `Tlp` varchar(20) DEFAULT NULL,
  `KodeJurusan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NIM`),
  KEY `KodeJurusan` (`KodeJurusan`),
  CONSTRAINT `prd_mahasiswa_ibfk_1` FOREIGN KEY (`KodeJurusan`) REFERENCES `prd_jurusan` (`KodeJurusan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_mahasiswa` */

insert  into `prd_mahasiswa`(`NIM`,`Nama`,`Tlp`,`KodeJurusan`) values (31321,'Heri','423423','IF'),(120123,'Agus','08192121','IF');

/*Table structure for table `prd_nilaidetilskirpsi` */

DROP TABLE IF EXISTS `prd_nilaidetilskirpsi`;

CREATE TABLE `prd_nilaidetilskirpsi` (
  `idNilaiSkripsi` int(11) NOT NULL AUTO_INCREMENT,
  `IdPendaftaran` int(11) DEFAULT NULL,
  `NilaiPenguji1` float DEFAULT NULL,
  `NIlaiPenguji2` float DEFAULT NULL,
  PRIMARY KEY (`idNilaiSkripsi`),
  KEY `IdPendaftaran` (`IdPendaftaran`),
  CONSTRAINT `prd_nilaidetilskirpsi_ibfk_1` FOREIGN KEY (`IdPendaftaran`) REFERENCES `prd_pendaftaran` (`idPendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prd_nilaidetilskirpsi` */

insert  into `prd_nilaidetilskirpsi`(`idNilaiSkripsi`,`IdPendaftaran`,`NilaiPenguji1`,`NIlaiPenguji2`) values (1,1,70,75);

/*Table structure for table `prd_nilaikp` */

DROP TABLE IF EXISTS `prd_nilaikp`;

CREATE TABLE `prd_nilaikp` (
  `IdNilaiKp` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` int(11) DEFAULT NULL,
  `NilaiPembimbing` float DEFAULT NULL,
  `NilaiPenguji` float DEFAULT NULL,
  `NilaiPerusahaan` float DEFAULT NULL,
  `NA` float DEFAULT NULL,
  `Index` char(2) DEFAULT NULL,
  PRIMARY KEY (`IdNilaiKp`),
  KEY `NIM` (`NIM`),
  CONSTRAINT `prd_nilaikp_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `prd_mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prd_nilaikp` */

insert  into `prd_nilaikp`(`IdNilaiKp`,`NIM`,`NilaiPembimbing`,`NilaiPenguji`,`NilaiPerusahaan`,`NA`,`Index`) values (1,31321,70,60,75,23,'B');

/*Table structure for table `prd_nilaimasterskripsi` */

DROP TABLE IF EXISTS `prd_nilaimasterskripsi`;

CREATE TABLE `prd_nilaimasterskripsi` (
  `IdNMSkripsi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdPendaftaran` int(11) DEFAULT NULL,
  `NKompre` float DEFAULT NULL,
  `NPraSidang` float DEFAULT NULL,
  `NSidangSkripsi` float DEFAULT NULL,
  `NPembimbing` float DEFAULT NULL,
  `NA` float DEFAULT NULL,
  `Index` char(2) DEFAULT NULL,
  PRIMARY KEY (`IdNMSkripsi`),
  KEY `IdPendaftaran` (`IdPendaftaran`),
  CONSTRAINT `prd_nilaimasterskripsi_ibfk_1` FOREIGN KEY (`IdPendaftaran`) REFERENCES `prd_pendaftaran` (`idPendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prd_nilaimasterskripsi` */

insert  into `prd_nilaimasterskripsi`(`IdNMSkripsi`,`IdPendaftaran`,`NKompre`,`NPraSidang`,`NSidangSkripsi`,`NPembimbing`,`NA`,`Index`) values (1,1,0,72,NULL,NULL,NULL,NULL);

/*Table structure for table `prd_pendaftaran` */

DROP TABLE IF EXISTS `prd_pendaftaran`;

CREATE TABLE `prd_pendaftaran` (
  `idPendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal` date DEFAULT NULL,
  `NIM` int(11) DEFAULT NULL,
  `IDJenisSidang` int(11) DEFAULT NULL,
  `KodePembimbing1` varchar(3) DEFAULT NULL,
  `KodePembimbing2` varchar(3) DEFAULT NULL,
  `Judul` text,
  PRIMARY KEY (`idPendaftaran`),
  KEY `NIM` (`NIM`),
  KEY `IDJenisSidang` (`IDJenisSidang`),
  KEY `KodePembimbing1` (`KodePembimbing1`),
  KEY `KodePembimbing2` (`KodePembimbing2`),
  CONSTRAINT `prd_pendaftaran_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `prd_mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_pendaftaran_ibfk_2` FOREIGN KEY (`IDJenisSidang`) REFERENCES `prd_jenissidang` (`IdJenisSidang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `prd_pendaftaran` */

insert  into `prd_pendaftaran`(`idPendaftaran`,`Tanggal`,`NIM`,`IDJenisSidang`,`KodePembimbing1`,`KodePembimbing2`,`Judul`) values (1,'2017-05-18',120123,1,'HM','JJ','sistem informasi akademik'),(14,'2017-05-18',31321,3,'JJ',NULL,'fsfdas');

/*Table structure for table `prd_sidangdetil` */

DROP TABLE IF EXISTS `prd_sidangdetil`;

CREATE TABLE `prd_sidangdetil` (
  `IdSidangDetil` int(11) NOT NULL AUTO_INCREMENT,
  `IdPendaftaran` int(11) DEFAULT NULL,
  `Penguji1` varchar(20) DEFAULT NULL,
  `Penguji2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdSidangDetil`),
  KEY `IdPendaftaran` (`IdPendaftaran`),
  KEY `Penguji1` (`Penguji1`),
  KEY `Penguji2` (`Penguji2`),
  CONSTRAINT `prd_sidangdetil_ibfk_1` FOREIGN KEY (`IdPendaftaran`) REFERENCES `prd_pendaftaran` (`idPendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_sidangdetil_ibfk_2` FOREIGN KEY (`Penguji1`) REFERENCES `prd_dosen` (`KodeDosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_sidangdetil_ibfk_3` FOREIGN KEY (`Penguji2`) REFERENCES `prd_dosen` (`KodeDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `prd_sidangdetil` */

insert  into `prd_sidangdetil`(`IdSidangDetil`,`IdPendaftaran`,`Penguji1`,`Penguji2`) values (1,1,'HM','JJ'),(2,14,'HM',NULL);

/*Table structure for table `prd_sidangmaster` */

DROP TABLE IF EXISTS `prd_sidangmaster`;

CREATE TABLE `prd_sidangmaster` (
  `IdSidang` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal` date DEFAULT NULL,
  `IDJenisSidang` int(11) DEFAULT NULL,
  `IdTa` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdSidang`),
  KEY `IDJenisSidang` (`IDJenisSidang`),
  KEY `IdTa` (`IdTa`),
  CONSTRAINT `prd_sidangmaster_ibfk_1` FOREIGN KEY (`IDJenisSidang`) REFERENCES `prd_jenissidang` (`IdJenisSidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_sidangmaster_ibfk_2` FOREIGN KEY (`IdTa`) REFERENCES `prd_ta` (`IdTa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `prd_sidangmaster` */

insert  into `prd_sidangmaster`(`IdSidang`,`Tanggal`,`IDJenisSidang`,`IdTa`) values (1,'2017-06-03',1,NULL),(2,'2017-06-03',2,NULL),(3,'2017-06-03',3,NULL);

/*Table structure for table `prd_ta` */

DROP TABLE IF EXISTS `prd_ta`;

CREATE TABLE `prd_ta` (
  `IdTa` int(11) NOT NULL AUTO_INCREMENT,
  `Tahun` varchar(200) DEFAULT NULL,
  `Semester` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdTa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_ta` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

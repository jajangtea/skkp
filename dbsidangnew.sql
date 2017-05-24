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
  `IdUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`KodeDosen`),
  KEY `IdUser` (`IdUser`),
  CONSTRAINT `prd_dosen_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `prd_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_dosen` */

insert  into `prd_dosen`(`KodeDosen`,`NamaDosen`,`Tlp`,`IdUser`) values ('--','Tidak Ada',NULL,NULL),('AG','Ardianto','081242432',35),('DJ','Danand Jaya','077112121',34),('HM','Heti','081332423',NULL);

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

insert  into `prd_jabatan`(`IdJabatan`,`KodeDosen`,`IdJenisDosen`) values (3,'HM','PB'),(4,'HM','PJ'),(5,'HM','PB');

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

/*Table structure for table `prd_level` */

DROP TABLE IF EXISTS `prd_level`;

CREATE TABLE `prd_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `prd_level` */

insert  into `prd_level`(`id`,`level`) values (1,'Prodi'),(2,'Dosen'),(3,'Mahasiswa'),(4,'Pembimbing ');

/*Table structure for table `prd_mahasiswa` */

DROP TABLE IF EXISTS `prd_mahasiswa`;

CREATE TABLE `prd_mahasiswa` (
  `NIM` int(11) NOT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `Tlp` varchar(20) DEFAULT NULL,
  `KodeJurusan` varchar(50) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIM`),
  KEY `KodeJurusan` (`KodeJurusan`),
  KEY `IdUser` (`IdUser`),
  CONSTRAINT `prd_mahasiswa_ibfk_1` FOREIGN KEY (`KodeJurusan`) REFERENCES `prd_jurusan` (`KodeJurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_mahasiswa_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `prd_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_mahasiswa` */

insert  into `prd_mahasiswa`(`NIM`,`Nama`,`Tlp`,`KodeJurusan`,`IdUser`) values (3123,'','','IF',NULL),(12345,'Angga','081213211',NULL,NULL),(31321,'Heri','423423','IF',NULL),(120912,'Herman Susilo','08121213121','IF',NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_nilaidetilskirpsi` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_nilaimasterskripsi` */

/*Table structure for table `prd_pendaftaran` */

DROP TABLE IF EXISTS `prd_pendaftaran`;

CREATE TABLE `prd_pendaftaran` (
  `idPendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal` datetime DEFAULT NULL,
  `NIM` int(11) DEFAULT NULL,
  `IdSidang` int(11) DEFAULT NULL,
  `KodePembimbing1` varchar(3) DEFAULT NULL,
  `KodePembimbing2` varchar(3) DEFAULT NULL,
  `Judul` text,
  PRIMARY KEY (`idPendaftaran`),
  KEY `NIM` (`NIM`),
  KEY `IDJenisSidang` (`IdSidang`),
  KEY `KodePembimbing1` (`KodePembimbing1`),
  KEY `KodePembimbing2` (`KodePembimbing2`),
  CONSTRAINT `prd_pendaftaran_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `prd_mahasiswa` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_pendaftaran_ibfk_2` FOREIGN KEY (`IdSidang`) REFERENCES `prd_sidangmaster` (`IdSidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_pendaftaran_ibfk_3` FOREIGN KEY (`KodePembimbing1`) REFERENCES `prd_dosen` (`KodeDosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_pendaftaran_ibfk_4` FOREIGN KEY (`KodePembimbing2`) REFERENCES `prd_dosen` (`KodeDosen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `prd_pendaftaran` */

insert  into `prd_pendaftaran`(`idPendaftaran`,`Tanggal`,`NIM`,`IdSidang`,`KodePembimbing1`,`KodePembimbing2`,`Judul`) values (17,'2017-05-23 00:00:00',12345,1,'AG','HM','hgjgjh\r\n'),(18,'2017-05-23 22:37:49',31321,1,'AG','AG','pendeteksi sunami'),(21,'2017-05-23 12:45:41',12345,1,'DJ','AG','dada'),(35,'2017-05-23 12:57:44',12345,1,'DJ','AG','dsa'),(45,'2017-05-23 13:09:26',31321,1,'HM','DJ','das'),(46,'2017-05-23 13:09:48',31321,2,'DJ','AG','dasd'),(52,'2017-05-23 13:22:27',31321,2,'DJ','--','dasd'),(53,'2017-05-23 17:53:12',120912,1,'AG','--','vdsgf');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prd_sidangdetil` */

/*Table structure for table `prd_sidangmaster` */

DROP TABLE IF EXISTS `prd_sidangmaster`;

CREATE TABLE `prd_sidangmaster` (
  `IdSidang` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal` date DEFAULT NULL,
  `IDJenisSidang` int(11) DEFAULT NULL,
  `IdTa` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tglBuka` date DEFAULT NULL,
  `tglTutup` date DEFAULT NULL,
  PRIMARY KEY (`IdSidang`),
  KEY `IDJenisSidang` (`IDJenisSidang`),
  KEY `IdTa` (`IdTa`),
  CONSTRAINT `prd_sidangmaster_ibfk_1` FOREIGN KEY (`IDJenisSidang`) REFERENCES `prd_jenissidang` (`IDJenisSidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prd_sidangmaster_ibfk_2` FOREIGN KEY (`IdTa`) REFERENCES `prd_ta` (`IdTa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `prd_sidangmaster` */

insert  into `prd_sidangmaster`(`IdSidang`,`Tanggal`,`IDJenisSidang`,`IdTa`,`status`,`tglBuka`,`tglTutup`) values (1,'2017-06-03',1,1,1,'2017-05-01','2017-05-31'),(2,'2017-06-03',2,1,1,'2017-05-01','2017-05-01'),(3,'2017-06-03',3,NULL,1,NULL,NULL);

/*Table structure for table `prd_ta` */

DROP TABLE IF EXISTS `prd_ta`;

CREATE TABLE `prd_ta` (
  `IdTa` int(11) NOT NULL AUTO_INCREMENT,
  `Tahun` varchar(200) DEFAULT NULL,
  `Semester` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdTa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prd_ta` */

insert  into `prd_ta`(`IdTa`,`Tahun`,`Semester`) values (1,'2016/2017','pendek');

/*Table structure for table `prd_user` */

DROP TABLE IF EXISTS `prd_user`;

CREATE TABLE `prd_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saltPassword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level_id` int(11) NOT NULL,
  `avatar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `prd_user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `prd_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `prd_user` */

insert  into `prd_user`(`id`,`username`,`password`,`saltPassword`,`email`,`joinDate`,`level_id`,`avatar`) values (6,'admin','46765456e0059ac9b3298faf1ce09218','4e955eff7e18f2.14452790','admin@yahoo.com','2017-05-22 22:04:51',1,'admin.jpg'),(34,'djaya','a033552a2481cd6419c0065fe9729f21','591d4f74bd5331.47146090','danand@mail.comm','2017-05-22 22:09:25',2,'danand.jpg'),(35,'gotro','4e955eff7e18f2.14452790','4e955eff7e18f2.14452790','gotro@mail.com','2017-05-23 12:46:47',2,'gotro.jpg'),(36,'heri','4e955eff7e18f2.14452790','4e955eff7e18f2.14452790','heri@mail.com','2017-05-23 12:46:55',3,'heri.jpg'),(37,'jajangtea','7e0e896f9875805316619aef6bf8ac55','5923717adace57.02796175','jajangtea@mail.com','2017-05-23 06:21:15',1,'jajangtea.jpg'),(38,'agus','366a8fe5128dc72e1edb57ba963ccef6','5923cd29d64316.36843214','agus@mail.com','2017-05-23 12:48:26',3,'agus.jpg'),(39,'dini','3cc7bb8f2517621566c6c0fac477ee15','5923e214bf2585.22598629','dini@mail.com','2017-05-23 14:17:40',3,NULL),(40,'5345','b485676d90b89e7f3d2c3ac863f1f096','5923e41d5776b4.72191654','aaa@mail.com','2017-05-23 14:26:21',3,NULL),(41,'12345','bb396ac0bf7538fdecaa276359f65ada','5923e6faebeb52.72179174','angga@mail.com','2017-05-23 14:38:34',3,NULL),(42,'120912','ef17c4b50d51fd2cecf4675f9a4ecd7f','59245a728633d2.48508898','herman@mail.com','2017-05-23 22:51:14',3,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

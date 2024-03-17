/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - nigga
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nigga` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `nigga`;

/*Table structure for table `absen` */

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `ABS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `kehadiran` tinyint(1) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ABS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `absen` */

/*Table structure for table `dept` */

DROP TABLE IF EXISTS `dept`;

CREATE TABLE `dept` (
  `DEPT_ID` int(11) NOT NULL,
  `nama_dept` varchar(25) DEFAULT NULL,
  `detil_dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `dept` */

insert  into `dept`(`DEPT_ID`,`nama_dept`,`detil_dept`) values 
(1001,'ART','Illlustrator'),
(1002,'DEV','Developer'),
(1003,'HRD','Human resource');

/*Table structure for table `izin` */

DROP TABLE IF EXISTS `izin`;

CREATE TABLE `izin` (
  `ID_IZIN` int(11) NOT NULL AUTO_INCREMENT,
  `Tipe` enum('Sakit','Libur','Acara lain','Telat') NOT NULL,
  `alasan` longtext DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ID_IZIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `izin` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `pegaw` */

DROP TABLE IF EXISTS `pegaw`;

CREATE TABLE `pegaw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `DEPT_ID` int(11) DEFAULT NULL,
  `SHIFT_ID` int(11) DEFAULT NULL,
  `TKT_ID` int(11) NOT NULL,
  `stlog` int(1) DEFAULT 0,
  `pass` char(10) DEFAULT '1234567890',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1333 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pegaw` */

insert  into `pegaw`(`id`,`nama`,`DEPT_ID`,`SHIFT_ID`,`TKT_ID`,`stlog`,`pass`) values 
(1301,'Brian',1001,2,3,1,'brian12345'),
(1302,'Maesa',1002,2,2,0,'inacantik'),
(1321,'Ganjar',1003,2,5,0,'bokepanak'),
(1332,'Pranowo',1003,2,4,0,'1234567890');

/*Table structure for table `shift` */

DROP TABLE IF EXISTS `shift`;

CREATE TABLE `shift` (
  `SHIFT_ID` int(11) NOT NULL,
  `jam` varchar(25) DEFAULT NULL,
  `ket` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`SHIFT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `shift` */

insert  into `shift`(`SHIFT_ID`,`jam`,`ket`) values 
(1,'7AM - 3PM','Pagi'),
(2,'3PM - 11PM','Siang'),
(3,'11PM - 7AM','Malam');

/*Table structure for table `tingkat` */

DROP TABLE IF EXISTS `tingkat`;

CREATE TABLE `tingkat` (
  `TKT_ID` int(11) NOT NULL,
  `nama_tingkat` varchar(25) NOT NULL,
  PRIMARY KEY (`TKT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tingkat` */

insert  into `tingkat`(`TKT_ID`,`nama_tingkat`) values 
(1,'Admin'),
(2,'Mentor'),
(3,'Owner'),
(4,'Pegawe'),
(5,'training');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

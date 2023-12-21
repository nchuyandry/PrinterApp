/*
SQLyog Enterprise v10.42 
MySQL - 5.5.5-10.4.11-MariaDB : Database - printer
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`printer` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `printer`;

/*Table structure for table `alokasi` */

DROP TABLE IF EXISTS `alokasi`;

CREATE TABLE `alokasi` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `tglalokasi` datetime DEFAULT NULL,
  `kodebrg` varchar(15) DEFAULT NULL,
  `serialnumber` varchar(20) DEFAULT NULL,
  `kedepo` varchar(15) DEFAULT NULL,
  `divisi` varchar(20) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `alokasi` */

/*Table structure for table `depo` */

DROP TABLE IF EXISTS `depo`;

CREATE TABLE `depo` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `namadepo` varchar(50) DEFAULT NULL,
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `depo` */

insert  into `depo`(`no`,`namadepo`) values (1,'Alam Sutera'),(2,'Bintaro'),(3,'Balaraja'),(4,'Cikokol'),(5,'Cinangka'),(6,'Cikuda'),(7,'Cirendeu'),(8,'Daan Mogot'),(9,'Depok'),(10,'Kalibata'),(11,'Kedoya'),(12,'Lenteng Agung'),(13,'Manis'),(14,'Pluit'),(15,'Lodan'),(16,'Serang'),(17,'Pusat'),(18,'Kelapa Dua'),(19,'Rancamaya'),(20,'Pandeglang'),(21,'Bengkel Cirendeu'),(22,'Mekarsari');

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `logtgl` datetime DEFAULT NULL,
  `kodebrg` varchar(15) DEFAULT NULL,
  `serialnumber` varchar(20) DEFAULT NULL,
  `loguser` varchar(20) DEFAULT NULL,
  `logdata` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `log` */

/*Table structure for table `masterprinter` */

DROP TABLE IF EXISTS `masterprinter`;

CREATE TABLE `masterprinter` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` datetime DEFAULT NULL,
  `kodebrg` varchar(15) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `tipe` varchar(15) DEFAULT NULL,
  `serialnumber` varchar(20) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`serialnumber`),
  KEY `id` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `masterprinter` */

/*Table structure for table `statusp` */

DROP TABLE IF EXISTS `statusp`;

CREATE TABLE `statusp` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `tgl` datetime DEFAULT NULL,
  `serialnumber` varchar(20) DEFAULT NULL,
  `fromdepo` varchar(15) DEFAULT NULL,
  `divisi` varchar(15) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `action` text DEFAULT NULL,
  `tglclose` datetime DEFAULT NULL,
  `tglcontinue` datetime DEFAULT NULL,
  `tgldeadline` datetime DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

/*Data for the table `statusp` */

/*Table structure for table `tiket` */

DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `tgl` datetime DEFAULT NULL,
  `tgldeadline` datetime DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `serialnumber` varchar(15) DEFAULT NULL,
  `fromdepo` varchar(12) DEFAULT NULL,
  `divisi` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `action` text DEFAULT NULL,
  `tglclose` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tiket` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

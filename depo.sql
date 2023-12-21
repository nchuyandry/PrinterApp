/*
SQLyog Enterprise v10.42 
MySQL - 5.7.18-log : Database - checkmain
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`checkmain` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `checkmain`;

/*Table structure for table `depo` */

DROP TABLE IF EXISTS `depo`;

CREATE TABLE `depo` (
  `namadepo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `depo` */

insert  into `depo`(`namadepo`) values ('Alam Sutera'),('Bintaro'),('Balaraja'),('Cikokol'),('Cinangka'),('Cikuda'),('Cirendeu'),('Daan Mogot'),('Depok'),('Kalibata'),('Kedoya'),('Lenteng Agung'),('Manis'),('Pluit'),('Lodan'),('Serang'),('Pusat'),('Kelapa Dua'),('Rancamaya'),('Pandeglang');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

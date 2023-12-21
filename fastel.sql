/*
SQLyog Enterprise v10.42 
MySQL - 5.5.5-10.4.11-MariaDB : Database - fastel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fastel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fastel`;

/*Table structure for table `datafastel` */

DROP TABLE IF EXISTS `datafastel`;

CREATE TABLE `datafastel` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `iddepo` int(5) NOT NULL,
  `namadepo` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `namapic` varchar(20) DEFAULT NULL,
  `telppic` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`iddepo`),
  KEY `no` (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `datafastel` */

insert  into `datafastel`(`no`,`iddepo`,`namadepo`,`alamat`,`namapic`,`telppic`) values (1,1,'Alam Sutera','Komp Pergudangan Alam Sutera, Jl Tekno 8 No 01, Kel Paku Alam , Kec Serpong Utara , Tangerang selatan','Kiki spv admin','0817-9853-441'),(2,2,'Balaraja','Jalan Raya serang KM 26,8 Kelurahan Sentul Kecamatan Balaraja Banten 15610','Gugun SPV admin','0812-8973-2055'),(3,3,'Bintaro','Jalan Jombang Raya No 11 Bintaro Sektor 9, Kel. Pondok Pucung Kec. Pondok Aren, Tangerang Selatan','Nuke SPV admin','0812-1087-0736'),(4,4,'Cikokol','Jln Jenderal Sudirman No 49 Cikokol Tangerang Kota','Adi','0817-9853-435'),(5,5,'Cikuda GNP','Jl. Mercedes Benz, Cicadas, Kec.Gn.Putri, Bogor, Jawa Barat 16964','Rizwan ICT','0896-2358-7479'),(6,6,'Cinangka','JL.Kav DPR serua No. 18 Kabupaten Bogor','Fina','0819-3210-6413'),(7,7,'Bengkel Cirendeu','Jalan Cirendeu Raya No 3A , Ciputat , Tangerang Selatan','Hudi','0857-1621-3561'),(8,8,'Cirendeu','Jl. Cirendeu Raya Rt 2/3 Pisangan Ciputat Timur Kota Tangerang Selatan Banten ','Hudi','0857-1621-3561'),(9,9,'Daan Mogot','Jl. Daan Mogot KM 12 Rawabuaya RT.001/04 Jakarat Barat','Robi','0813-1936-6324'),(10,10,'Kalibata','JL Kalibata raya 1-2 rawajati Jakarta Selatan','Dewi','0821-6700-9672'),(11,11,'Kedoya','Jalan Kedoya Raya No.1 Jakarta Barat 11520 (Gedung Depan)','Kusnadi','0838-0627-9069'),(12,12,'Kelapa Dua','Jl. Diklat Pemda Kp Dukuh Pinang, Kel Bojong Nangka, Kec Kelapa Dua, Karawaci Kabupaten Tangerang','Fitri','0877-8884-4079'),(13,13,'Lodan','Jl. Lodan No.8 RT.002/08 Ancol, Pademangan, Jakarta Utara','Ibnu','0858-8335-8337'),(14,14,'Manis','Komp Pergudangan Manis, Jl Manis II No.10, Kel Manis Jaya , Kec. Jatiuwung, Kabupaten Tangerang','Rima','0817-9853-442'),(15,15,'Pluit','Jln Pluit Raya No 41-43 kec Penjaringan Jakarta Utara','Ibnu','0858-8335-8337'),(16,16,'Pusat','Jalan Kedoya Raya No.1 Jakarta Barat 11520 (Gedung Belakang)','Ari W (awe) ICT','0896-5817-4984'),(17,17,'Rancamaya','Jl. Mayjen H.E Sukma KM. 2.5 No.86 Kampung Warung Nangka Rt 01/Rw 01 Desa Bitung Sari Kecamatan Ciawi Kabupaten Bogor 16720','Rizwan ICT','0896-2358-7479'),(18,18,'Serang','Jalan Raya Serang KM. 9 No. 68 Kramat Watu Serang Banten 42162','Dhani','0812-1861-4920'),(19,19,'Serang Lama','Jalan Raya Serang Kramat Watu Serang Banten 42162','Dhani','0812-1861-4920'),(20,20,'Lenteng Agung','Jl. Raya Lenteng Agung No.7 RT.004/001 Kelurahan Lenteng Agung Kecamatan Jagakarsa Jakarta Selatan','Indra LTA','0822-2534-787'),(21,21,'Depok','Jl. Raya Bogor KM.35 No.47a, Sukamaju, Kec. Cilodong, Kota Depok, Jawa Barat 16415','Vitan','0817-0775-338'),(22,22,'Pandeglang','Jl. Raya Labuan KM.7 Rt 03/02 Kp. PacurendangDesa Mandalasari Kec. Kaduhejo Kab. Pandeglang Banten','Gugun','0812-8973-2055'),(23,23,'HO Kedoya','Jalan Kedoya Raya No.1 Jakarta Barat 11520 (Gedung Belakang)','Ari W (awe) ICT','0896-5817-4984'),(24,24,'HO Kelapa Dua','Jl. Diklat Pemda Kp Dukuh Pinang, Kel Bojong Nangka, Kec Kelapa Dua, Karawaci Kabupaten Tangerang','Andri ICT','0812-2223-0647'),(25,25,'TAX','Jalan Kedoya Raya No.1 Jakarta Barat 11520 (Gedung Belakang)','Ari W (awe) ICT','0896-5817-4984'),(26,26,'baru baru','baru','fkjdfhireoerert','vevent');

/*Table structure for table `layanan` */

DROP TABLE IF EXISTS `layanan`;

CREATE TABLE `layanan` (
  `idlay` int(5) NOT NULL AUTO_INCREMENT,
  `iddepo` int(5) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `nosid` varchar(25) DEFAULT NULL,
  KEY `idlay` (`idlay`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

/*Data for the table `layanan` */

insert  into `layanan`(`idlay`,`iddepo`,`jenis`,`nosid`) values (1,1,'Astinet','4727566-0030312977'),(2,2,'Indihome','121426201666'),(3,3,'Astinet','4727566-0030992577'),(4,4,'Astinet','4727566-0029769986'),(5,5,'Astinet','1437561703'),(6,6,'Astinet','4727566-0030917556'),(7,7,'Astinet','4727566-0030823496'),(8,8,'Indihome','121212290179'),(9,9,'Astinet','4727566-0029659212'),(10,10,'Astinet','4727566-0029699361'),(11,11,'Astinet','4727566-0029656153'),(12,12,'Astinet','4727566-0029724196'),(13,13,'Astinet','4727566-0029796479'),(14,14,'Astinet','4727566-0029769934'),(15,15,'Astinet','4727566-0029699204'),(16,16,'Astinet','4727566-0029656020'),(17,17,'Astinet','4727566-0030916564'),(18,18,'Astinet','1702797881'),(19,19,'Indihome','122403257663'),(20,20,'Indihome','122220226213'),(21,21,'Indihome','122120201920'),(22,22,'Indihome','121630118363'),(23,23,'Astinet','4727566-47853'),(24,24,'Astinet','554846401'),(25,25,'Indihome','121706000896'),(26,24,'Fibernet','IN14288'),(27,1,'Metro-E Modust','4727566-0031607310'),(28,2,'Metro-E Modust','4727566-0031721336'),(29,3,'Metro-E Modust','4727566-0031577075'),(30,4,'Metro-E Modust','4727566-0031594515'),(31,5,'Metro-E Modust','1437885708'),(32,6,'Metro-E Modust','4727566-0031584720'),(33,7,'Metro-E Modust','4727566-0031590562'),(34,8,'Metro-E Modust','1704042017'),(35,9,'Metro-E Modust','4727566-0031577112'),(36,10,'Metro-E Modust','4727566-0031605256'),(37,11,'Metro-E Modust','4727566-0031573526'),(38,13,'Metro-E Modust','4727566-0031570595'),(39,14,'Metro-E Modust','4727566-0031577244'),(40,15,'Metro-E Modust','4727566-0031570422'),(41,17,'Metro-E Modust','4727566-0031611655'),(42,18,'Metro-E Modust','4727566-0031577013'),(43,23,'Metro-E Modust','4727566-0031595227'),(44,24,'Metro-E Modust','4727566-0031570310'),(45,20,'Metro-E Modust','1385899514'),(46,22,'Metro-E Modust','1670721859'),(47,21,'Metro-E Modust','1703107590'),(48,3,'Metro-E CCTV','1707535254'),(49,6,'Metro-E CCTV','1707384762'),(50,17,'Metro-E CCTV','1709926152'),(51,18,'Metro-E CCTV','1708810235'),(52,24,'Metro-E CCTV','1707242559'),(53,22,'Metro-E CCTV','1708809984'),(54,8,'Metro-E CCTV','1707394565');

/*Table structure for table `tiket` */

DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `tgl` datetime DEFAULT NULL,
  `iddepo` int(10) DEFAULT NULL,
  `idlay` varchar(25) DEFAULT NULL,
  `nosid` varchar(20) DEFAULT NULL,
  `notiket` varchar(25) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tiket` */

insert  into `tiket`(`tgl`,`iddepo`,`idlay`,`nosid`,`notiket`,`keterangan`) values ('2023-06-24 14:04:00',9,'35','4727566-0031577112','rgee','egregerg'),('2023-06-24 14:11:00',1,'27','4727566-0031607310','trrty','ertteetert'),('2023-06-26 10:46:00',2,'2','121426201666','IN1234','testing ');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - ujmpunew
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ujmpunew` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ujmpunew`;

/*Table structure for table `mrek` */

DROP TABLE IF EXISTS `mrek`;

CREATE TABLE `mrek` (
  `idrek` int(11) NOT NULL AUTO_INCREMENT,
  `reknorek` varchar(11) DEFAULT NULL,
  `reknama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idrek`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mrek` */

insert  into `mrek`(`idrek`,`reknorek`,`reknama`) values 
(9,'41101.01','Hotel Bintang 1'),
(10,'41101.02','Hotel Bintang 2'),
(11,'41101.03','Hotel Bintang 3'),
(12,'41101.04','Hotel Bintang 4'),
(13,'41101.05','Hotel Bintang 5');

/*Table structure for table `tes` */

DROP TABLE IF EXISTS `tes`;

CREATE TABLE `tes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtes` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tes` */

/*Table structure for table `tg` */

DROP TABLE IF EXISTS `tg`;

CREATE TABLE `tg` (
  `tgid` int(11) NOT NULL AUTO_INCREMENT,
  `target` varchar(20) DEFAULT NULL,
  `tgtglawal` date DEFAULT NULL,
  `tgtglakhir` date DEFAULT NULL,
  `idrek` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tgid`),
  KEY `rekid` (`idrek`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tg` */

insert  into `tg`(`tgid`,`target`,`tgtglawal`,`tgtglakhir`,`idrek`) values 
(28,'80000000','2022-01-01','2022-01-31','9 '),
(29,'65000000','2022-01-01','2022-01-31','10 '),
(30,'50000000','2022-01-01','2022-01-31','11 '),
(31,'50000001','2022-01-01','2022-01-31','13 '),
(32,'80000001','2022-01-01','2022-01-31','12 ');

/*Table structure for table `transaksih` */

DROP TABLE IF EXISTS `transaksih`;

CREATE TABLE `transaksih` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `via` varchar(30) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` varchar(20) DEFAULT NULL,
  `idrek` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mrekid` (`idrek`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksih` */

insert  into `transaksih`(`id`,`via`,`tglbayar`,`jumlah`,`idrek`) values 
(29,'Bank','2022-01-10','15000000','9'),
(30,'Bendahara','2022-01-07','5000000','10'),
(31,'Bank','2022-01-02','7000000','11'),
(32,'Bendahara','2022-01-14','6000000','11'),
(33,'Bendahara','2022-01-25','4500000','12'),
(34,'Bank','2022-01-19','650000','13');

/*Table structure for table `vrpt` */

DROP TABLE IF EXISTS `vrpt`;

/*!50001 DROP VIEW IF EXISTS `vrpt` */;
/*!50001 DROP TABLE IF EXISTS `vrpt` */;

/*!50001 CREATE TABLE  `vrpt`(
 `id` int(11) ,
 `via` varchar(30) ,
 `tglbayar` date ,
 `jumlah` varchar(20) ,
 `reknorek` varchar(11) ,
 `reknama` varchar(30) ,
 `target` varchar(20) ,
 `tgtglawal` date ,
 `tgtglakhir` date 
)*/;

/*Table structure for table `vtg` */

DROP TABLE IF EXISTS `vtg`;

/*!50001 DROP VIEW IF EXISTS `vtg` */;
/*!50001 DROP TABLE IF EXISTS `vtg` */;

/*!50001 CREATE TABLE  `vtg`(
 `tgid` int(11) ,
 `target` varchar(20) ,
 `tgtglawal` date ,
 `tgtglakhir` date ,
 `reknorek` varchar(11) ,
 `reknama` varchar(30) 
)*/;

/*Table structure for table `vtrf` */

DROP TABLE IF EXISTS `vtrf`;

/*!50001 DROP VIEW IF EXISTS `vtrf` */;
/*!50001 DROP TABLE IF EXISTS `vtrf` */;

/*!50001 CREATE TABLE  `vtrf`(
 `id` int(11) ,
 `via` varchar(30) ,
 `tglbayar` date ,
 `jumlah` varchar(20) ,
 `reknorek` varchar(11) ,
 `reknama` varchar(30) 
)*/;

/*View structure for view vrpt */

/*!50001 DROP TABLE IF EXISTS `vrpt` */;
/*!50001 DROP VIEW IF EXISTS `vrpt` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrpt` AS select `transaksih`.`id` AS `id`,`transaksih`.`via` AS `via`,`transaksih`.`tglbayar` AS `tglbayar`,`transaksih`.`jumlah` AS `jumlah`,`mrek`.`reknorek` AS `reknorek`,`mrek`.`reknama` AS `reknama`,`tg`.`target` AS `target`,`tg`.`tgtglawal` AS `tgtglawal`,`tg`.`tgtglakhir` AS `tgtglakhir` from ((`transaksih` join `mrek`) join `tg`) where `transaksih`.`idrek` = `mrek`.`idrek` and `transaksih`.`idrek` = `tg`.`idrek` */;

/*View structure for view vtg */

/*!50001 DROP TABLE IF EXISTS `vtg` */;
/*!50001 DROP VIEW IF EXISTS `vtg` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtg` AS select `tg`.`tgid` AS `tgid`,`tg`.`target` AS `target`,`tg`.`tgtglawal` AS `tgtglawal`,`tg`.`tgtglakhir` AS `tgtglakhir`,`mrek`.`reknorek` AS `reknorek`,`mrek`.`reknama` AS `reknama` from (`tg` join `mrek`) where `tg`.`idrek` = `mrek`.`idrek` */;

/*View structure for view vtrf */

/*!50001 DROP TABLE IF EXISTS `vtrf` */;
/*!50001 DROP VIEW IF EXISTS `vtrf` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtrf` AS select `transaksih`.`id` AS `id`,`transaksih`.`via` AS `via`,`transaksih`.`tglbayar` AS `tglbayar`,`transaksih`.`jumlah` AS `jumlah`,`mrek`.`reknorek` AS `reknorek`,`mrek`.`reknama` AS `reknama` from (`transaksih` join `mrek`) where `transaksih`.`idrek` = `mrek`.`idrek` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

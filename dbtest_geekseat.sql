/*
SQLyog Professional v12.5.1 (32 bit)
MySQL - 10.4.13-MariaDB : Database - dbtest_geekseat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbtest_geekseat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbtest_geekseat`;

/*Table structure for table `app_csrf` */

DROP TABLE IF EXISTS `app_csrf`;

CREATE TABLE `app_csrf` (
  `id_csrf` int(11) NOT NULL,
  `csrf_hash` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `app_csrf` */

insert  into `app_csrf`(`id_csrf`,`csrf_hash`,`created`) values 
(0,'34b8683333e99377172cc64483c14a4c','2023-02-16 22:18:48'),
(0,'29e0e2ce9e19223481f2c5aa69ffe1e9','2023-02-16 22:18:57');

/*Table structure for table `master_user` */

DROP TABLE IF EXISTS `master_user`;

CREATE TABLE `master_user` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_role` bigint(20) DEFAULT NULL,
  `nama_lengkap` varchar(70) DEFAULT NULL,
  `username` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `id_kartu` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_phone` varchar(20) DEFAULT NULL,
  `img_file` varchar(200) DEFAULT 'avatar_default.jpg',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `master_user` */

insert  into `master_user`(`id_user`,`id_role`,`nama_lengkap`,`username`,`password`,`email`,`id_kartu`,`alamat`,`no_phone`,`img_file`) values 
(1,0,'admin','admin','a5df0ea0d601182fc16bb046a947a648','xx','123123','xxx','xx','53.jpg');

/*Table structure for table `tb_test` */

DROP TABLE IF EXISTS `tb_test`;

CREATE TABLE `tb_test` (
  `id_test` int(11) NOT NULL AUTO_INCREMENT,
  `year` year(4) DEFAULT NULL,
  `villager` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_test`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_test` */

insert  into `tb_test`(`id_test`,`year`,`villager`) values 
(1,NULL,NULL),
(2,NULL,NULL),
(3,NULL,NULL),
(4,NULL,NULL),
(5,NULL,NULL);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id_role`,`nama_role`) values 
(0,'Superadmin'),
(1,'Senior Manager');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

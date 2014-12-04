/*
SQLyog Ultimate v8.61 
MySQL - 5.5.27 : Database - usuario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`usuario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `usuario`;

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `estatus` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

LOCK TABLES `grupo` WRITE;

insert  into `grupo`(`id`,`nombre`,`estatus`) values (1,'TIC 71','1'),(2,'TIC 72','1'),(3,'TIC 73','1'),(4,'MEC 71','0');

UNLOCK TABLES;

/*Table structure for table `grupo_alumno` */

DROP TABLE IF EXISTS `grupo_alumno`;

CREATE TABLE `grupo_alumno` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(10) DEFAULT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_grupo` (`id_grupo`),
  CONSTRAINT `grupo_alumno_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuario` (`Id`),
  CONSTRAINT `grupo_alumno_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `grupo_alumno` */

LOCK TABLES `grupo_alumno` WRITE;

UNLOCK TABLES;

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `avatar` text,
  `orden` varchar(15) DEFAULT NULL,
  `estatus` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

LOCK TABLES `materia` WRITE;

insert  into `materia`(`id`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'Matemáticas para TI','xxx','0','1'),(2,'Programación de aplicaciones','xxx','0','1'),(3,'Optativa','xxx','0','1'),(4,'Ingeniería económica','xxx','0','1'),(5,'Inglés','xxx','0','1'),(6,'Desarrollo','xxx','0','0');

UNLOCK TABLES;

/*Table structure for table `materia_maestro` */

DROP TABLE IF EXISTS `materia_maestro`;

CREATE TABLE `materia_maestro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_maestro` int(10) DEFAULT NULL,
  `id_materia` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_materia` (`id_materia`),
  KEY `id_maestro` (`id_maestro`),
  CONSTRAINT `materia_maestro_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`),
  CONSTRAINT `materia_maestro_ibfk_2` FOREIGN KEY (`id_maestro`) REFERENCES `usuario` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `materia_maestro` */

LOCK TABLES `materia_maestro` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` text,
  `ApellidoPaterno` text,
  `ApellidoMaterno` text,
  `Telefono` varchar(20) DEFAULT NULL,
  `Calle` text,
  `NumeroExterior` varchar(200) DEFAULT NULL,
  `NumeroInterior` varchar(200) DEFAULT NULL,
  `Colonia` text,
  `Municipio` text,
  `Estado` text,
  `Cp` varchar(500) DEFAULT NULL,
  `Correo` text,
  `Usuario` varchar(500) DEFAULT NULL,
  `Contrasena` varchar(500) DEFAULT NULL,
  `Nivel` varchar(50) DEFAULT NULL,
  `Estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`Id`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`Cp`,`Correo`,`Usuario`,`Contrasena`,`Nivel`,`Estatus`) values (2,'Prueba','Prueba','Prueba','Prueba','Prueba',NULL,NULL,NULL,NULL,'Prueba','Prueba','Prueba','Prueba','123','1','1'),(3,'Ejemplo3','Ejemplo3','Ejemplo3','0000000000','Sor Juana Inés de la Cruz',NULL,NULL,NULL,NULL,'México','52280','prueba@hotmail.com','misael','1234','2','1'),(6,'Ejemplo2','Ejemplo2','Ejemplo2','0000000000','Sor Juana Inés de la Cruz',NULL,NULL,NULL,NULL,'México','52280','prueba@hotmail.com','misael','1234567','3','1');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

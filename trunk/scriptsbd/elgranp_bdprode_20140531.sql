/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.1.73-cll : Database - elgranp_bdprode
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`elgranp_bdprode` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `elgranp_bdprode`;

/*Table structure for table `equipo` */

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo` (
  `IdEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `archivoBandera` varchar(32) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `golesPropios` int(11) DEFAULT NULL,
  `golesEnContra` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdEquipo`),
  KEY `FK_equipo` (`idGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `equipo` */

insert  into `equipo`(`IdEquipo`,`Nombre`,`idGrupo`,`archivoBandera`,`puntos`,`golesPropios`,`golesEnContra`) values (1,'Brasil',1,'brasil.jpg',NULL,NULL,NULL),(2,'Croacia',1,'croacia.jpg',NULL,NULL,NULL),(3,'Mexico',1,'mexico.jpg',NULL,NULL,NULL),(4,'Camerun',1,'camerun.jpg',NULL,NULL,NULL),(5,'España',2,'espana.jpg',NULL,NULL,NULL),(6,'Holanda',2,'holanda.jpg',NULL,NULL,NULL),(7,'Chile',2,'chile.jpg',NULL,NULL,NULL),(8,'Australia',2,'australia.jpg',NULL,NULL,NULL),(9,'Colombia',3,'colombia.jpg',NULL,NULL,NULL),(10,'Grecia',3,'grecia.jpg',NULL,NULL,NULL),(11,'C. Marfil',3,'costamarfil.jpg',NULL,NULL,NULL),(12,'Japon',3,'japon.jpg',NULL,NULL,NULL),(13,'Uruguay',4,'uruguay.jpg',NULL,NULL,NULL),(14,'Costa Rica',4,'costarica.jpg',NULL,NULL,NULL),(15,'Inglaterra',4,'inglaterra.jpg',NULL,NULL,NULL),(16,'Italia',4,'italia.jpg',NULL,NULL,NULL),(17,'Suiza',5,'suiza.png',NULL,NULL,NULL),(18,'Ecuador',5,'ecuador.jpg',NULL,NULL,NULL),(19,'Francia',5,'francia.jpg',NULL,NULL,NULL),(20,'Honduras',5,'honduras.jpg',NULL,NULL,NULL),(21,'Argentina',6,'argentina.jpg',NULL,NULL,NULL),(22,'Bosnia',6,'bosnia.jpg',NULL,NULL,NULL),(23,'Iran',6,'iran.jpg',NULL,NULL,NULL),(24,'Nigeria',6,'nigeria.jpg',NULL,NULL,NULL),(25,'Alemania',7,'alemania.jpg',NULL,NULL,NULL),(26,'Portugal',7,'portugal.jpg',NULL,NULL,NULL),(27,'Ghana',7,'ghana.jpg',NULL,NULL,NULL),(28,'Usa',7,'usa.jpg',NULL,NULL,NULL),(29,'Belgica',8,'belgica.jpg',NULL,NULL,NULL),(30,'Argelia',8,'argelia.jpg',NULL,NULL,NULL),(31,'Rusia',8,'rusia.jpg',NULL,NULL,NULL),(32,'C. del sur',8,'coreadelsur.jpg',NULL,NULL,NULL);

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `idTorneo` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idGrupo`),
  KEY `FK_grupo` (`idTorneo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `grupo` */

insert  into `grupo`(`idGrupo`,`idTorneo`,`nombre`) values (1,1,'A'),(2,1,'B'),(3,1,'C'),(4,1,'D'),(5,1,'E'),(6,1,'F'),(7,1,'G'),(8,1,'H');

/*Table structure for table `grupoequipo` */

DROP TABLE IF EXISTS `grupoequipo`;

CREATE TABLE `grupoequipo` (
  `idGrupo` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  PRIMARY KEY (`idGrupo`,`idEquipo`),
  KEY `FK_grupoequipo` (`idEquipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `grupoequipo` */

insert  into `grupoequipo`(`idGrupo`,`idEquipo`) values (1,1),(1,2),(1,3),(1,4),(2,5),(2,6),(2,7),(2,8),(3,9),(3,10),(3,11),(3,12),(4,13),(4,14),(4,15),(4,16),(5,17),(5,18),(5,19),(5,20),(6,21),(6,22),(6,23),(6,24),(7,25),(7,26),(7,27),(7,28),(8,29),(8,30),(8,31),(8,32);

/*Table structure for table `partidomundial` */

DROP TABLE IF EXISTS `partidomundial`;

CREATE TABLE `partidomundial` (
  `idPartidoMundial` int(11) NOT NULL AUTO_INCREMENT,
  `idEquipoLocal` int(11) DEFAULT NULL,
  `idEquipoVisitante` int(11) DEFAULT NULL,
  `fechaPartido` datetime DEFAULT NULL,
  `golesLocal` int(11) DEFAULT NULL,
  `golesVisitante` int(11) DEFAULT NULL,
  `idPlayoffEstructura` int(11) DEFAULT NULL,
  `idResultadoMundial` char(1) DEFAULT NULL,
  `idTorneo` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idPlayoff` int(11) DEFAULT NULL,
  `idEquipoGanador` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPartidoMundial`),
  KEY `FK_partidomundial_equipolocal` (`idEquipoLocal`),
  KEY `FK_partidomundial_equipovisitante` (`idEquipoVisitante`),
  KEY `FK_partidomundial` (`idPlayoffEstructura`),
  KEY `FK_partidomundial_resultado` (`idResultadoMundial`),
  KEY `FK_partidomundial_torneo` (`idTorneo`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

/*Data for the table `partidomundial` */

insert  into `partidomundial`(`idPartidoMundial`,`idEquipoLocal`,`idEquipoVisitante`,`fechaPartido`,`golesLocal`,`golesVisitante`,`idPlayoffEstructura`,`idResultadoMundial`,`idTorneo`,`idGrupo`,`idPlayoff`,`idEquipoGanador`) values (1,1,2,'2014-06-12 17:00:00',2,1,NULL,NULL,1,1,NULL,NULL),(2,3,4,'2014-06-13 13:00:00',1,0,NULL,NULL,1,1,NULL,NULL),(3,1,3,'2014-06-17 16:00:00',3,1,NULL,NULL,1,1,NULL,NULL),(4,4,2,'2014-06-18 16:00:00',1,1,NULL,NULL,1,1,NULL,NULL),(5,4,1,'2014-06-23 17:00:00',0,1,NULL,NULL,1,1,NULL,NULL),(6,2,3,'2014-06-23 17:00:00',1,1,NULL,NULL,1,1,NULL,NULL),(7,5,6,'2014-06-13 16:00:00',1,3,NULL,NULL,1,2,NULL,NULL),(8,7,8,'2014-06-13 19:00:00',1,1,NULL,NULL,1,2,NULL,NULL),(9,8,6,'2014-06-18 13:00:00',1,2,NULL,NULL,1,2,NULL,NULL),(10,5,7,'2014-06-18 19:00:00',1,0,NULL,NULL,1,2,NULL,NULL),(11,8,5,'2014-06-23 13:00:00',1,2,NULL,NULL,1,2,NULL,NULL),(12,6,7,'2014-06-23 13:00:00',1,0,NULL,NULL,1,2,NULL,NULL),(13,9,10,'2014-06-14 13:00:00',2,1,NULL,NULL,1,3,NULL,NULL),(14,11,12,'2014-06-14 22:00:00',1,2,NULL,NULL,1,3,NULL,NULL),(15,9,11,'2014-06-19 13:00:00',1,0,NULL,NULL,1,3,NULL,NULL),(16,12,10,'2014-06-19 19:00:00',1,0,NULL,NULL,1,3,NULL,NULL),(17,12,9,'2014-06-24 17:00:00',1,3,NULL,NULL,1,3,NULL,NULL),(18,10,11,'2014-06-24 17:00:00',0,0,NULL,NULL,1,3,NULL,NULL),(19,13,14,'2014-06-14 16:00:00',1,0,NULL,NULL,1,4,NULL,NULL),(20,15,16,'2014-06-14 18:00:00',2,2,NULL,NULL,1,4,NULL,NULL),(21,13,15,'2014-06-19 16:00:00',0,2,NULL,NULL,1,4,NULL,NULL),(22,16,14,'2014-06-20 13:00:00',4,0,NULL,NULL,1,4,NULL,NULL),(23,16,13,'2014-06-24 13:00:00',1,0,NULL,NULL,1,4,NULL,NULL),(24,14,15,'2014-06-24 13:00:00',1,5,NULL,NULL,1,4,NULL,NULL),(25,17,18,'2014-06-15 13:00:00',1,1,NULL,NULL,1,5,NULL,NULL),(26,19,20,'2014-06-15 16:00:00',1,0,NULL,NULL,1,5,NULL,NULL),(27,17,19,'2014-06-20 16:00:00',2,1,NULL,NULL,1,5,NULL,NULL),(28,20,18,'2014-06-20 18:00:00',0,1,NULL,NULL,1,5,NULL,NULL),(29,20,17,'2014-06-25 17:00:00',5,2,NULL,NULL,1,5,NULL,NULL),(30,18,19,'2014-06-25 17:00:00',2,6,NULL,NULL,1,5,NULL,NULL),(31,21,22,'2014-06-15 19:00:00',6,0,NULL,NULL,1,6,NULL,NULL),(32,23,24,'2014-06-16 16:00:00',1,2,NULL,NULL,1,6,NULL,NULL),(33,21,23,'2014-06-21 13:00:00',3,1,NULL,NULL,1,6,NULL,NULL),(34,24,22,'2014-06-21 19:00:00',2,0,NULL,NULL,1,6,NULL,NULL),(35,24,21,'2014-06-25 13:00:00',0,1,NULL,NULL,1,6,NULL,NULL),(36,22,23,'2014-06-25 13:00:00',0,0,NULL,NULL,1,6,NULL,NULL),(37,25,26,'2014-06-16 13:00:00',2,1,NULL,NULL,1,7,NULL,NULL),(38,27,28,'2014-06-16 19:00:00',1,2,NULL,NULL,1,7,NULL,NULL),(39,25,27,'2014-06-21 16:00:00',3,0,NULL,NULL,1,7,NULL,NULL),(40,28,26,'2014-06-22 16:00:00',0,2,NULL,NULL,1,7,NULL,NULL),(41,28,25,'2014-06-26 13:00:00',4,0,NULL,NULL,1,7,NULL,NULL),(42,26,27,'2014-06-26 13:00:00',4,0,NULL,NULL,1,7,NULL,NULL),(43,29,30,'2014-06-17 13:00:00',1,0,NULL,NULL,1,8,NULL,NULL),(44,31,32,'2014-06-17 19:00:00',2,0,NULL,NULL,1,8,NULL,NULL),(45,32,30,'2014-06-22 13:00:00',2,2,NULL,NULL,1,8,NULL,NULL),(46,29,31,'2014-06-22 19:00:00',1,0,NULL,NULL,1,8,NULL,NULL),(47,32,29,'2014-06-26 17:00:00',1,3,NULL,NULL,1,8,NULL,NULL),(48,30,31,'2014-06-26 17:00:00',1,1,NULL,NULL,1,8,NULL,NULL),(138,1,5,'2014-06-28 00:00:00',2,1,1,NULL,1,NULL,1,1),(139,9,16,'2014-06-28 00:00:00',1,2,3,NULL,1,NULL,2,NULL),(140,19,24,'2014-06-30 00:00:00',2,0,5,NULL,1,NULL,3,NULL),(141,25,31,'2014-06-30 00:00:00',5,0,7,NULL,1,NULL,4,NULL),(142,6,3,'2014-06-29 00:00:00',2,0,10,NULL,1,NULL,5,NULL),(143,15,12,'2014-06-29 00:00:00',3,0,12,NULL,1,NULL,6,NULL),(144,21,18,'2014-07-01 00:00:00',5,2,14,NULL,1,NULL,7,NULL),(145,29,28,'2014-07-01 00:00:00',1,2,16,NULL,1,NULL,8,NULL),(146,1,16,'2014-07-04 00:00:00',2,1,18,NULL,1,NULL,9,NULL),(147,19,25,'2014-07-05 00:00:00',2,3,19,NULL,1,NULL,10,NULL),(148,6,15,'2014-07-04 00:00:00',3,0,21,NULL,1,NULL,11,NULL),(149,21,28,'2014-07-05 00:00:00',1,0,23,NULL,1,NULL,12,NULL),(150,1,6,'2014-07-08 00:00:00',1,0,25,NULL,1,NULL,13,NULL),(151,25,21,'2014-07-09 00:00:00',1,2,27,NULL,1,NULL,14,NULL),(152,1,21,'2014-07-13 12:00:00',0,1,30,NULL,1,NULL,15,NULL),(153,6,25,'2014-07-12 22:00:00',1,2,32,NULL,1,NULL,16,NULL);

/*Table structure for table `playoffestructura` */

DROP TABLE IF EXISTS `playoffestructura`;

CREATE TABLE `playoffestructura` (
  `idPlayoffEstructura` int(11) NOT NULL AUTO_INCREMENT,
  `posicion` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idTorneo` int(11) DEFAULT NULL,
  `idPlayoff` int(11) DEFAULT NULL,
  `idPlayoffPadre` int(11) DEFAULT NULL,
  `localia` char(1) DEFAULT NULL,
  PRIMARY KEY (`idPlayoffEstructura`),
  KEY `FK_playoffestructura_grupo` (`idGrupo`),
  KEY `FK_playoffestructura` (`idPlayoff`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `playoffestructura` */

insert  into `playoffestructura`(`idPlayoffEstructura`,`posicion`,`idGrupo`,`idTorneo`,`idPlayoff`,`idPlayoffPadre`,`localia`) values (1,1,1,1,1,NULL,NULL),(2,2,2,1,1,NULL,NULL),(3,1,3,1,2,NULL,NULL),(4,2,4,1,2,NULL,NULL),(5,1,5,1,3,NULL,NULL),(6,2,6,1,3,NULL,NULL),(7,1,7,1,4,NULL,NULL),(8,2,8,1,4,NULL,NULL),(9,2,1,1,5,NULL,NULL),(10,1,2,1,5,NULL,NULL),(11,2,3,1,6,NULL,NULL),(12,1,4,1,6,NULL,NULL),(13,2,5,1,7,NULL,NULL),(14,1,6,1,7,NULL,NULL),(15,2,7,1,8,NULL,NULL),(16,1,8,1,8,NULL,NULL),(17,1,NULL,1,9,1,'l'),(18,1,NULL,1,9,2,'v'),(19,1,NULL,1,10,3,'l'),(20,1,NULL,1,10,4,'v'),(21,1,NULL,1,11,5,'l'),(22,1,NULL,1,11,6,'v'),(23,1,NULL,1,12,7,'l'),(24,1,NULL,1,12,8,'v'),(25,1,NULL,1,13,9,'l'),(26,1,NULL,1,13,11,'v'),(27,1,NULL,1,14,10,'l'),(28,1,NULL,1,14,12,'v'),(29,1,NULL,1,15,13,'l'),(30,1,NULL,1,15,14,'v'),(31,2,NULL,1,16,13,'l'),(32,2,NULL,1,16,14,'v');

/*Table structure for table `playoffs` */

DROP TABLE IF EXISTS `playoffs`;

CREATE TABLE `playoffs` (
  `idPlayoffs` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idTipoFinal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPlayoffs`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `playoffs` */

insert  into `playoffs`(`idPlayoffs`,`nombre`,`numero`,`fecha`,`idTipoFinal`) values (1,'Octavos',1,'2014-06-28',8),(2,'Octavos',2,'2014-06-28',8),(3,'Octavos',3,'2014-06-30',8),(4,'Octavos',4,'2014-06-30',8),(5,'Octavos',5,'2014-06-29',8),(6,'Octavos',6,'2014-06-29',8),(7,'Octavos',7,'2014-07-01',8),(8,'Octavos',8,'2014-07-01',8),(9,'Cuartos',1,'2014-07-04',4),(10,'Cuartos',2,'2014-07-05',4),(11,'Cuartos',3,'2014-07-04',4),(12,'Cuartos',4,'2014-07-05',4),(13,'Semis',1,'2014-07-08',2),(14,'Semis',2,'2014-07-09',2),(15,'Final',1,'2014-07-13',1),(16,'TercerYCuarto',1,'2014-07-12',34);

/*Table structure for table `resultadofase` */

DROP TABLE IF EXISTS `resultadofase`;

CREATE TABLE `resultadofase` (
  `idTorneo` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idEquipo` int(11) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `resultadofase` */

insert  into `resultadofase`(`idTorneo`,`idGrupo`,`idEquipo`,`posicion`,`puntos`) values (1,1,1,1,9),(1,1,3,2,4),(1,2,6,1,9),(1,2,5,2,6),(1,3,9,1,9),(1,3,12,2,6),(1,4,15,1,7),(1,4,16,2,7),(1,5,19,1,6),(1,5,18,2,4),(1,6,21,1,9),(1,6,24,2,6),(1,7,25,1,6),(1,7,28,2,6),(1,8,29,1,9),(1,8,31,2,4);

/*Table structure for table `resultadomundial` */

DROP TABLE IF EXISTS `resultadomundial`;

CREATE TABLE `resultadomundial` (
  `idResultadoMundial` char(1) NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idResultadoMundial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `resultadomundial` */

insert  into `resultadomundial`(`idResultadoMundial`,`puntos`) values ('E',1),('G',3),('P',0);

/*Table structure for table `torneo` */

DROP TABLE IF EXISTS `torneo`;

CREATE TABLE `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`idTorneo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `torneo` */

insert  into `torneo`(`idTorneo`,`Nombre`) values (1,'Brazil 2014');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) DEFAULT NULL,
  `apellido` varchar(128) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `passw` varchar(128) DEFAULT NULL,
  `esAdmin` tinyint(1) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `nroLegajo` varchar(10) DEFAULT NULL,
  `nroEmpleado` varchar(10) DEFAULT NULL,
  `esBridgestone` tinyint(1) DEFAULT NULL,
  `esManpower` tinyint(1) DEFAULT NULL,
  `esAdecco` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`idUsuario`,`nombre`,`apellido`,`username`,`passw`,`esAdmin`,`puntos`,`email`,`nroLegajo`,`nroEmpleado`,`esBridgestone`,`esManpower`,`esAdecco`) values (1,'Alejandro','Rothar','arothar','81dc9bdb52d04dc20036dbd8313ed055',1,28,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Alejandro Rothar',NULL,'alerothar','81dc9bdb52d04dc20036dbd8313ed055',NULL,NULL,'alerothar@hotmail.com','12345566','0',1,0,0),(13,'Luis Saco',NULL,'lsaco','81dc9bdb52d04dc20036dbd8313ed055',NULL,175,'lsaco@tuco.tv','123456789','0',1,0,0),(14,'Alec Gibson',NULL,'Yo','674f3c2c1a8a6f90461e8a66fb5550ba',NULL,119,'alecgibson@co-partners.com.ar','1','0',1,0,0),(15,'Javier',NULL,'jpelitz','31f466af75370e2dec5a2c17565a03ed',NULL,NULL,'jpelitz@gmail.com','12345','0',1,0,0),(16,'liliana gibson',NULL,'lilugibson','cd442b615c1e61faecfd1e9a49aaca56',NULL,51,'lilugibson@co-partners.com.ar','2569','0',1,0,0),(17,'Ariel',NULL,'Ariel','446a0804332f7043c4597bc14b8f8142',NULL,NULL,'ariel@tuco.tv','11223344','0',1,0,0),(18,'Julian',NULL,'julian','ab15e5049116370d10a9ab5b8d70c8a0',NULL,NULL,'julian.720@hotmail.com','4470','0',1,0,0),(19,'copart',NULL,'copart','9aa6e5f2256c17d2d430b100032b997c',NULL,NULL,'micaelacortina@co-partners.com.ar','','0',1,0,0);

/*Table structure for table `usuariopartido` */

DROP TABLE IF EXISTS `usuariopartido`;

CREATE TABLE `usuariopartido` (
  `idUsuario` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL,
  `golesLocal` int(11) DEFAULT NULL,
  `golesVisitante` int(11) DEFAULT NULL,
  `idGanador` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `fechaUpdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idUsuario`,`idPartido`),
  KEY `FK_usuariopartido_partido` (`idPartido`),
  KEY `FK_usuariopartido_equipo` (`idGanador`),
  KEY `FK_usuariopartido_usuario` (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `usuariopartido` */

insert  into `usuariopartido`(`idUsuario`,`idPartido`,`golesLocal`,`golesVisitante`,`idGanador`,`puntos`,`fechaUpdate`) values (1,1,1,2,NULL,0,NULL),(13,1,2,0,NULL,3,NULL),(13,2,1,0,NULL,8,NULL),(13,3,3,1,NULL,8,NULL),(13,4,1,1,NULL,8,NULL),(13,5,1,4,NULL,3,NULL),(13,6,2,0,NULL,0,NULL),(13,7,1,1,NULL,0,NULL),(13,8,1,0,NULL,0,NULL),(13,9,0,1,NULL,3,NULL),(13,10,2,0,NULL,3,NULL),(13,11,1,2,NULL,8,NULL),(13,12,2,0,NULL,3,NULL),(13,13,0,0,NULL,0,NULL),(13,14,0,1,NULL,3,NULL),(13,15,1,0,NULL,8,NULL),(13,16,1,0,NULL,8,NULL),(13,17,1,2,NULL,3,NULL),(13,18,1,2,NULL,0,NULL),(13,25,1,1,NULL,8,NULL),(13,26,2,0,NULL,3,NULL),(13,27,1,1,NULL,0,NULL),(13,28,1,2,NULL,3,NULL),(13,29,1,1,NULL,0,NULL),(13,30,0,0,NULL,0,NULL),(13,36,1,1,NULL,3,NULL),(13,35,1,2,NULL,3,NULL),(13,34,2,0,NULL,8,NULL),(13,33,2,0,NULL,3,NULL),(13,32,1,1,NULL,0,NULL),(13,31,3,0,NULL,3,NULL),(13,24,0,3,NULL,3,NULL),(13,23,2,0,NULL,3,NULL),(13,22,2,0,NULL,3,NULL),(13,21,1,3,NULL,3,NULL),(13,20,1,1,NULL,3,NULL),(13,19,2,0,NULL,3,NULL),(13,37,2,0,NULL,3,NULL),(13,38,1,2,NULL,8,NULL),(13,39,2,0,NULL,3,NULL),(13,40,1,2,NULL,3,NULL),(13,41,0,2,NULL,0,NULL),(13,42,2,0,NULL,3,NULL),(13,48,1,2,NULL,0,NULL),(13,47,1,1,NULL,0,NULL),(13,46,2,0,NULL,3,NULL),(13,45,0,0,NULL,3,NULL),(13,44,2,0,NULL,8,NULL),(13,43,1,1,NULL,0,NULL),(14,1,2,0,NULL,3,NULL),(14,2,1,0,NULL,8,NULL),(14,3,1,1,NULL,0,NULL),(14,4,3,1,NULL,0,NULL),(14,5,1,3,NULL,3,NULL),(14,6,2,1,NULL,0,NULL),(14,7,1,1,NULL,0,NULL),(14,8,3,1,NULL,0,NULL),(14,9,1,1,NULL,0,NULL),(14,10,2,2,NULL,0,NULL),(14,11,1,4,NULL,3,NULL),(14,12,2,1,NULL,3,NULL),(16,1,3,1,NULL,3,NULL),(16,2,2,2,NULL,0,NULL),(16,3,3,2,NULL,3,NULL),(16,4,1,2,NULL,0,NULL),(16,5,1,3,NULL,3,NULL),(16,6,1,3,NULL,0,NULL),(16,7,2,1,NULL,0,NULL),(16,8,2,2,NULL,3,NULL),(16,9,2,2,NULL,0,NULL),(16,10,2,2,NULL,0,NULL),(16,11,2,2,NULL,0,NULL),(16,12,2,2,NULL,0,NULL),(14,13,2,0,NULL,3,NULL),(14,14,1,2,NULL,8,NULL),(14,15,1,1,NULL,0,NULL),(14,16,3,1,NULL,3,NULL),(14,17,1,2,NULL,3,NULL),(14,18,2,1,NULL,0,NULL),(16,13,1,0,NULL,3,NULL),(16,14,1,0,NULL,0,NULL),(16,15,1,2,NULL,0,NULL),(16,16,2,2,NULL,0,NULL),(16,17,2,21,NULL,3,NULL),(16,18,1,1,NULL,3,NULL),(14,19,1,1,NULL,0,NULL),(14,20,3,1,NULL,0,NULL),(16,20,1,1,NULL,3,NULL),(16,19,3,2,NULL,3,NULL),(14,21,1,2,NULL,3,NULL),(16,21,1,2,NULL,3,NULL),(16,22,2,23,NULL,0,NULL),(14,22,2,0,NULL,3,NULL),(16,23,1,3,NULL,0,NULL),(16,24,1,3,NULL,3,NULL),(14,23,1,0,NULL,8,NULL),(14,24,0,4,NULL,3,NULL),(16,25,4,3,NULL,0,NULL),(16,26,3,3,NULL,0,NULL),(16,27,4,3,NULL,3,NULL),(16,28,2,2,NULL,0,NULL),(16,29,1,2,NULL,0,NULL),(16,30,1,2,NULL,3,NULL),(16,31,1,2,NULL,0,NULL),(16,32,1,3,NULL,3,NULL),(16,33,1,3,NULL,0,NULL),(16,34,1,32,NULL,0,NULL),(16,35,2,2,NULL,0,NULL),(16,36,2,1,NULL,0,NULL),(16,37,1,1,NULL,0,NULL),(16,38,1,1,NULL,0,NULL),(16,39,2,2,NULL,0,NULL),(16,40,2,2,NULL,0,NULL),(16,41,3,1,NULL,3,NULL),(16,42,3,1,NULL,3,NULL),(14,25,1,2,NULL,0,NULL),(14,26,2,0,NULL,3,NULL),(14,27,1,2,NULL,0,NULL),(14,28,0,1,NULL,8,NULL),(14,29,1,0,NULL,3,NULL),(14,30,1,2,NULL,3,NULL),(16,43,2,2,NULL,0,NULL),(16,44,2,3,NULL,0,NULL),(16,45,1,4,NULL,0,NULL),(16,46,4,3,NULL,3,NULL),(16,47,3,2,NULL,0,NULL),(16,48,2,1,NULL,0,NULL),(14,31,3,0,NULL,3,NULL),(14,32,1,2,NULL,8,NULL),(14,33,2,1,NULL,3,NULL),(14,34,1,1,NULL,0,NULL),(14,35,1,2,NULL,3,NULL),(14,36,1,1,NULL,3,NULL),(14,42,1,1,NULL,0,NULL),(14,41,0,2,NULL,0,NULL),(14,40,1,2,NULL,3,NULL),(14,39,4,0,NULL,3,NULL),(14,38,1,0,NULL,0,NULL),(14,37,2,1,NULL,8,NULL),(14,43,1,0,NULL,8,NULL),(14,44,2,1,NULL,3,NULL),(14,45,2,0,NULL,0,NULL),(14,46,1,1,NULL,0,NULL),(14,47,0,1,NULL,3,NULL),(14,48,1,3,NULL,0,NULL),(1,2,2,1,NULL,3,'2014-05-29 19:18:00'),(13,138,2,2,NULL,0,'2014-05-30 16:04:00'),(13,139,0,1,NULL,3,'2014-05-30 16:04:00'),(13,140,1,0,NULL,3,'2014-05-30 16:04:00'),(13,141,3,0,NULL,3,'2014-05-30 16:04:00'),(13,143,4,0,NULL,3,'2014-05-30 16:04:00'),(13,142,2,0,NULL,8,'2014-05-30 16:04:00'),(1,138,2,2,1,0,'2014-05-31 15:22:00'),(1,139,2,1,NULL,NULL,'2014-05-31 11:44:00'),(1,146,0,0,1,0,'2014-05-31 18:48:00'),(1,149,3,0,NULL,3,'2014-05-31 18:49:00'),(1,144,1,1,21,NULL,'2014-05-31 18:52:00'),(1,147,2,2,19,0,'2014-05-31 18:54:00'),(1,148,2,3,NULL,0,'2014-05-31 18:53:00'),(1,150,2,1,NULL,3,'2014-05-31 19:04:00'),(1,151,1,2,NULL,8,'2014-05-31 19:04:00'),(1,0,2,3,NULL,NULL,'2014-05-31 19:06:00'),(1,152,0,1,NULL,8,'2014-05-31 19:16:00'),(1,153,2,3,NULL,3,'2014-05-31 19:16:00');

/* Procedure structure for procedure `sp_actualizarPuntos` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_actualizarPuntos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_actualizarPuntos`()
BEGIN
	update usuario as u
	inner join (select idUsuario, sum(puntos) as puntos from usuariopartido group by idUsuario) as  up on u.idUsuario = up.idUsuario
	set u.puntos = up.puntos;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_armarOctavos` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_armarOctavos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_armarOctavos`()
BEGIN
	INSERT INTO resultadofase (idTorneo, idGrupo,idEquipo, posicion, puntos)
	SELECT 1,idGrupo,IdEquipo,posicion,puntosTotal FROM (
		SELECT @row_num := IF(@prev_value=idGrupo,@row_num+1,1) AS posicion, idGrupo,idEquipo,nombre,puntosTotal,@prev_value := idGrupo AS a FROM 
		(
			SELECT t.idGrupo,
				t.idEquipo,
				t.nombre, 
				SUM(t.puntos) puntosTotal		
			FROM (
				SELECT  e.idGrupo, idEquipo, nombre, COUNT(idEquipo) * 3 AS puntos
				FROM equipo AS e
				INNER JOIN (SELECT CASE
						WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
						WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
						ELSE NULL END AS idGanador
					FROM partidomundial
					WHERE NOT golesLocal IS NULL) AS p ON e.IdEquipo = p.idGanador 
				GROUP BY idEquipo
				UNION
				SELECT e.idGrupo,idEquipo, nombre, COUNT(pml.idPartidoMundial) AS puntos
				FROM equipo AS e
					INNER JOIN partidomundial pml ON e.idEquipo = pml.idEquipoLocal OR e.idEquipo = pml.idEquipoVisitante
				WHERE (pml.golesVisitante= pml.golesLocal) AND (NOT pml.golesLocal IS NULL)
				GROUP BY idEquipo
				) AS t
			GROUP BY t.idEquipo
			ORDER BY t.idGrupo, puntosTotal DESC
		) AS j,
		(SELECT @row_num := 1) X,
		(SELECT @prev_value := '') Y
	) AS tabla 
	WHERE posicion < 3;
	
	insert into partidomundial (idPlayoffEstructura, idEquipoLocal, idEquipoVisitante,fechaPartido, idTorneo,idPlayoff)
	SELECT l.idPlayoffEstructura, l.idEquipoLocal, v.idEquipoVisitante ,fecha,1,l.idPlayoff
	FROM 
		(
		SELECT 	pe.idPlayoff,
			tlocal.idEquipo AS idEquipoLocal,
			tvisitante.idEquipo idEquipoVisitante,
			pe.idPlayoffEstructura
		FROM playoffestructura pe
			LEFT JOIN resultadofase AS tlocal ON tlocal.idGrupo=pe.idGrupo AND tlocal.posicion=pe.posicion AND pe.posicion=1
			LEFT JOIN resultadofase tvisitante ON tvisitante.idGrupo=pe.idGrupo AND tvisitante.posicion= pe.posicion AND pe.posicion=2
		ORDER BY idplayoff
		) AS l
	INNER JOIN 
		(
		SELECT 	pe.idPlayoff,
			tlocal.idEquipo AS idEquipoLocal,
			tvisitante.idEquipo idEquipoVisitante,
			pe.idPlayoffEstructura
		FROM playoffestructura pe
			LEFT JOIN resultadofase AS tlocal ON tlocal.idGrupo=pe.idGrupo AND tlocal.posicion=pe.posicion AND pe.posicion=1
			LEFT JOIN resultadofase tvisitante ON tvisitante.idGrupo=pe.idGrupo AND tvisitante.posicion= pe.posicion AND pe.posicion=2
		ORDER BY idplayoff
		) AS v
	ON l.idPlayoff = v.idPlayoff
	INNER JOIN playoffs py ON l.idPlayoff = py.idPlayoffs
	WHERE NOT l.idEquipoLocal IS NULL 
		AND NOT v.idEquipoVisitante IS NULL;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_armarPlayoffs` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_armarPlayoffs` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_armarPlayoffs`()
BEGIN
	insert into partidomundial (idPlayoffEstructura, idEquipoLocal, idEquipoVisitante,fechaPartido, idTorneo,idPlayoff)
	SELECT l.idPlayoffEstructura, l.idEquipoLocal, v.idEquipoVisitante ,fecha,1,pe.idPlayoff
	FROM 
		(
		SELECT 	pe.idPlayoff,
			tlocal.idEquipo AS idEquipoLocal,
			tvisitante.idEquipo idEquipoVisitante,
			pe.idPlayoffEstructura
		FROM playoffestructura pe
			LEFT JOIN resultadofase AS tlocal ON tlocal.idGrupo=pe.idGrupo AND tlocal.posicion=pe.posicion AND pe.posicion=1
			LEFT JOIN resultadofase tvisitante ON tvisitante.idGrupo=pe.idGrupo AND tvisitante.posicion= pe.posicion AND pe.posicion=2
		ORDER BY idplayoff
		) AS l
	INNER JOIN 
		(
		SELECT 	pe.idPlayoff,
			tlocal.idEquipo AS idEquipoLocal,
			tvisitante.idEquipo idEquipoVisitante,
			pe.idPlayoffEstructura
		FROM playoffestructura pe
			LEFT JOIN resultadofase AS tlocal ON tlocal.idGrupo=pe.idGrupo AND tlocal.posicion=pe.posicion AND pe.posicion=1
			LEFT JOIN resultadofase tvisitante ON tvisitante.idGrupo=pe.idGrupo AND tvisitante.posicion= pe.posicion AND pe.posicion=2
		ORDER BY idplayoff
		) AS v
	ON l.idPlayoff = v.idPlayoff
	INNER JOIN playoffs py ON l.idPlayoff = py.idPlayoffs
	WHERE NOT l.idEquipoLocal IS NULL 
		AND NOT v.idEquipoVisitante IS NULL;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_asignarPuntajeUsuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_asignarPuntajeUsuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_asignarPuntajeUsuario`(in p_partido int,IN p_golesLocal int,IN p_golesVisitante int)
BEGIN
	update usuariopartido 
	set puntos =  CASE
			WHEN (golesLocal = p_golesLocal and golesVisitante = p_golesVisitante) THEN 8
			WHEN (golesLocal > golesVisitante and p_golesLocal > p_golesVisitante) THEN 3
			WHEN (golesLocal < golesVisitante AND p_golesLocal < p_golesVisitante) THEN 3
			WHEN (golesLocal = golesVisitante AND p_golesLocal = p_golesVisitante) THEN 3
			else 0 end
	where idPartido = p_partido;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_clasificacionOctavos` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_clasificacionOctavos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_clasificacionOctavos`()
BEGIN
	select * from (
		select @row_num := IF(@prev_value=idGrupo,@row_num+1,1) AS posicion, idGrupo,idEquipo,nombre,puntosTotal,@prev_value := idGrupo as a from 
		(
			select t.idGrupo,
				t.idEquipo,
				t.nombre, 
				sum(t.puntos) puntosTotal		
			from (
				select  e.idGrupo, idEquipo, nombre, count(idEquipo) * 3 as puntos
				from equipo as e
				inner join (select CASE
						WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
						WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
						else null end as idGanador
					from partidomundial
					where not golesLocal is null) as p on e.IdEquipo = p.idGanador 
				group by idEquipo
				union
				select e.idGrupo,idEquipo, nombre, count(pml.idPartidoMundial) as puntos
				from equipo as e
					inner join partidomundial pml on e.idEquipo = pml.idEquipoLocal or e.idEquipo = pml.idEquipoVisitante
				where (pml.golesVisitante= pml.golesLocal) and (not pml.golesLocal is null)
				group by idEquipo
				) as t
			group by t.idEquipo
			order by t.idGrupo, puntosTotal desc
		) as j,
		(SELECT @row_num := 1) x,
		(SELECT @prev_value := '') y
	) as tabla 
	where posicion < 3;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_ganadoresPlayoffs` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_ganadoresPlayoffs` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_ganadoresPlayoffs`(in p_idTipoFinal int)
BEGIN
	select idPlayoffEstructura, idGanador, fecha, t.idTorneo,idPlayoff
	from playoffestructura pe
	inner join (	select idPartidoMundial,
			CASE
				WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
				WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
				else null end as idGanador,
			pm.idTorneo idTorneo,
			p.idPlayoffs,
			fecha
			from partidomundial pm
			-- inner join playoffestructura pe on pm.idPlayoff = pe.idPlayoff
			inner join playoffs p on pm.idPlayoff = p.idPlayoffs
			where not golesLocal is null
				and p.idtipofinal = p_idTipoFinal
		) as t on pe.idPlayoffPadre = t.idPlayoffs
	where not idPlayoffPadre is null;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_rankingFaseGrupos` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_rankingFaseGrupos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_rankingFaseGrupos`(p_idGrupo int)
BEGIN
	declare p_rank int;
	set p_rank=0;
	SELECT idEquipo, nombre, @rank:=@rank+1 AS rank,sum(puntos) as puntos
	FROM (
		select idEquipo, nombre, count(idEquipo) * 3 as puntos
		from equipo as e
		inner join (select CASE
				WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
				WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
				else null end as idGanador
			    from partidomundial
			    where not golesLocal is null) as p on e.IdEquipo = p.idGanador 
		where e.idGrupo=p_idGrupo
		group by idEquipo
		union
		select idEquipo, nombre, count(pml.idPartidoMundial) as puntos
		from equipo as e
			inner join partidomundial pml on e.idEquipo = pml.idEquipoLocal or e.idEquipo = pml.idEquipoVisitante
		where (pml.golesVisitante= pml.golesLocal) and (not pml.golesLocal is null) and e.idGrupo=p_idGrupo
		group by idEquipo) as t
	GROUP BY idEquipo, nombre ORDER BY rank asc;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_save_partidoMundialPlayoff` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_save_partidoMundialPlayoff` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_save_partidoMundialPlayoff`(in p_idPlayoffHijo int, in p_idPlayoffPadre int, in p_idEquipo int, in p_localia char(1))
BEGIN
	
	   DECLARE idPartido int;
	   select idpartidomundial into idPartido from partidomundial where idPlayoff = p_idPlayoffHijo;
	    IF p_localia = 'l' then
		    IF idPartido is null THEN
			insert into partidomundial 
					(
					idEquipoLocal,
					idEquipoVisitante, 
					fechaPartido, 
					idPlayoffEstructura, 
					idplayoff, 
					idTorneo
					)
			VALUES 		(
					p_idEquipo,
					null,
					(select fecha from playoffs where idplayoffs = p_idPlayoffHijo), 
					(select idPlayoffEstructura from playoffestructura where idplayoff = p_idPlayoffHijo and posicion=1 and idPlayoffPadre=p_idPlayoffPadre),
					p_idPlayoffHijo ,
					1
					);
		    ELSE
			UPDATE partidomundial set  idEquipoLocal = p_idEquipo
			WHERE idPartidoMundial = idPartido;
			
		    END IF;
	    ELSE
		    IF idPartido is null THEN
			insert into partidomundial 
					(
					idEquipoLocal,
					idEquipoVisitante, 
					fechaPartido, 
					idPlayoffEstructura, 
					idplayoff, 
					idTorneo
					)
			VALUES 		(
					null,
					p_idEquipo,
					(select fecha from playoffs where idplayoffs = p_idPlayoffHijo), 
					(select idPlayoffEstructura from playoffestructura where idplayoff = p_idPlayoffHijo and posicion=1 and idPlayoffPadre=p_idPlayoffPadre),
					p_idPlayoffHijo ,
					1
					);
		    ELSE
			UPDATE partidomundial set  idEquipoVisitante = p_idEquipo
			WHERE idPartidoMundial = idPartido;
		    END IF;
	    END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_traerGanadoresTipoFinal` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_traerGanadoresTipoFinal` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`elgranp_arothar`@`190.19.34.234` PROCEDURE `sp_traerGanadoresTipoFinal`(in p_idTipoFinal int, in p_idTipoFinalAnterior int)
BEGIN
	select pe.idPlayoffEstructura, pe.idPlayoff, p.fecha, pe.idPlayoffPadre, pg.idGanador, e.archivoBandera
	from playoffestructura pe
	inner join playoffs p on pe.idplayoff= p.idplayoffs
	inner join (
			select idPartidoMundial, CASE
				WHEN (golesLocal > golesVisitante) THEN idEquipoLocal
				WHEN (golesLocal < golesVisitante) THEN idEquipoVisitante
				else null end as idGanador,pm.idTorneo,
			p.idPlayoffs
			from partidomundial pm
			-- inner join playoffestructura pe on pm.idPlayoff = pe.idPlayoff
			inner join playoffs p on pm.idPlayoff = p.idPlayoffs
			where not golesLocal is null
				and p.idtipofinal = p_idTipoFinalAnterior
		   ) pg on pg.idPlayOffs =  pe.idPlayoffPadre
	inner join equipo e on e.IdEquipo= pg.idGanador
	where idTipoFinal=p_idTipoFinal;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

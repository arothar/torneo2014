/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.6.17 : Database - bdprode
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdprode` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdprode`;

/*Table structure for table `equipo` */

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo` (
  `IdEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `archivoBandera` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IdEquipo`),
  KEY `FK_equipo` (`idGrupo`),
  CONSTRAINT `FK_equipo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `equipo` */

insert  into `equipo`(`IdEquipo`,`Nombre`,`idGrupo`,`archivoBandera`) values (1,'Brasil',1,'brasil.jpg'),(2,'Croacia',1,'croacia.jpg'),(3,'Mexico',1,'mexico.jpg'),(4,'Camerun',1,'camerun.jpg'),(5,'España',2,'espana.jpg'),(6,'Holanda',2,'holanda.jpg'),(7,'Chile',2,'chile.jpg'),(8,'Australia',2,'australia.jpg'),(9,'Colombia',3,'colombia.jpg'),(10,'Grecia',3,'grecia.jpg'),(11,'C. Marfil',3,'costamarfil.jpg'),(12,'Japon',3,'japon.jpg'),(13,'Uruguay',4,'uruguay.jpg'),(14,'Costa Rica',4,'costarica.jpg'),(15,'Inglaterra',4,'inglaterra.jpg'),(16,'Italia',4,'italia.jpg'),(17,'Suiza',5,'suiza.png'),(18,'Ecuador',5,'ecuador.jpg'),(19,'Francia',5,'francia.jpg'),(20,'Honduras',5,'honduras.jpg'),(21,'Argentina',6,'argentina.jpg'),(22,'Bosnia',6,'bosnia.jpg'),(23,'Iran',6,'iran.jpg'),(24,'Nigeria',6,'nigeria.jpg'),(25,'Alemania',7,'alemania.jpg'),(26,'Portugal',7,'portugal.jpg'),(27,'Ghana',7,'ghana.jpg'),(28,'Usa',7,'usa.jpg'),(29,'Belgica',8,'belgica.jpg'),(30,'Argelia',8,'argelia.jpg'),(31,'Rusia',8,'rusia.jpg'),(32,'C. del sur',8,'coreadelsur.jpg');

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `idTorneo` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`idGrupo`),
  KEY `FK_grupo` (`idTorneo`),
  CONSTRAINT `FK_grupo` FOREIGN KEY (`idTorneo`) REFERENCES `torneo` (`idTorneo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `grupo` */

insert  into `grupo`(`idGrupo`,`idTorneo`,`nombre`) values (1,1,'A'),(2,1,'B'),(3,1,'C'),(4,1,'D'),(5,1,'E'),(6,1,'F'),(7,1,'G'),(8,1,'H');

/*Table structure for table `grupoequipo` */

DROP TABLE IF EXISTS `grupoequipo`;

CREATE TABLE `grupoequipo` (
  `idGrupo` int(11) NOT NULL,
  `idEquipo` int(11) NOT NULL,
  PRIMARY KEY (`idGrupo`,`idEquipo`),
  KEY `FK_grupoequipo` (`idEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`idPartidoMundial`),
  KEY `FK_partidomundial_equipolocal` (`idEquipoLocal`),
  KEY `FK_partidomundial_equipovisitante` (`idEquipoVisitante`),
  KEY `FK_partidomundial` (`idPlayoffEstructura`),
  KEY `FK_partidomundial_resultado` (`idResultadoMundial`),
  KEY `FK_partidomundial_torneo` (`idTorneo`),
  CONSTRAINT `FK_partidomundial` FOREIGN KEY (`idPlayoffEstructura`) REFERENCES `playoffestructura` (`idPlayoffEstructura`),
  CONSTRAINT `FK_partidomundial_equipolocal` FOREIGN KEY (`idEquipoLocal`) REFERENCES `equipo` (`IdEquipo`),
  CONSTRAINT `FK_partidomundial_equipovisitante` FOREIGN KEY (`idEquipoVisitante`) REFERENCES `equipo` (`IdEquipo`),
  CONSTRAINT `FK_partidomundial_resultado` FOREIGN KEY (`idResultadoMundial`) REFERENCES `resultadomundial` (`idResultadoMundial`),
  CONSTRAINT `FK_partidomundial_torneo` FOREIGN KEY (`idTorneo`) REFERENCES `torneo` (`idTorneo`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

/*Data for the table `partidomundial` */

insert  into `partidomundial`(`idPartidoMundial`,`idEquipoLocal`,`idEquipoVisitante`,`fechaPartido`,`golesLocal`,`golesVisitante`,`idPlayoffEstructura`,`idResultadoMundial`,`idTorneo`) values (1,1,2,'2014-06-12 17:00:00',3,0,NULL,NULL,1),(2,3,4,'2014-06-13 13:00:00',NULL,NULL,NULL,NULL,1),(3,1,3,'2014-06-17 16:00:00',NULL,NULL,NULL,NULL,1),(4,4,2,'2014-06-18 16:00:00',NULL,NULL,NULL,NULL,1),(5,4,1,'2014-06-23 17:00:00',NULL,NULL,NULL,NULL,1),(6,2,3,'2014-06-23 17:00:00',NULL,NULL,NULL,NULL,1),(7,5,6,'2014-06-13 16:00:00',NULL,NULL,NULL,NULL,1),(8,7,8,'2014-06-13 19:00:00',NULL,NULL,NULL,NULL,1),(9,8,6,'2014-06-18 13:00:00',NULL,NULL,NULL,NULL,1),(10,5,7,'2014-06-18 19:00:00',NULL,NULL,NULL,NULL,1),(11,8,5,'2014-06-23 13:00:00',NULL,NULL,NULL,NULL,1),(12,6,7,'2014-06-23 13:00:00',NULL,NULL,NULL,NULL,1),(13,9,10,'2014-06-14 13:00:00',NULL,NULL,NULL,NULL,1),(14,11,12,'2014-06-14 22:00:00',NULL,NULL,NULL,NULL,1),(15,9,11,'2014-06-19 13:00:00',NULL,NULL,NULL,NULL,1),(16,12,10,'2014-06-19 19:00:00',NULL,NULL,NULL,NULL,1),(17,12,9,'2014-06-24 17:00:00',NULL,NULL,NULL,NULL,1),(18,10,11,'2014-06-24 17:00:00',NULL,NULL,NULL,NULL,1),(19,13,14,'2014-06-14 16:00:00',NULL,NULL,NULL,NULL,1),(20,15,16,'2014-06-14 18:00:00',NULL,NULL,NULL,NULL,1),(21,13,15,'2014-06-19 16:00:00',NULL,NULL,NULL,NULL,1),(22,16,14,'2014-06-20 13:00:00',NULL,NULL,NULL,NULL,1),(23,16,13,'2014-06-24 13:00:00',NULL,NULL,NULL,NULL,1),(24,14,15,'2014-06-24 13:00:00',NULL,NULL,NULL,NULL,1),(25,17,18,'2014-06-15 13:00:00',NULL,NULL,NULL,NULL,1),(26,19,20,'2014-06-15 16:00:00',NULL,NULL,NULL,NULL,1),(27,17,19,'2014-06-20 16:00:00',NULL,NULL,NULL,NULL,1),(28,20,18,'2014-06-20 18:00:00',NULL,NULL,NULL,NULL,1),(29,20,17,'2014-06-25 17:00:00',NULL,NULL,NULL,NULL,1),(30,18,19,'2014-06-25 17:00:00',NULL,NULL,NULL,NULL,1),(31,21,22,'2014-06-15 19:00:00',NULL,NULL,NULL,NULL,1),(32,23,24,'2014-06-16 16:00:00',NULL,NULL,NULL,NULL,1),(33,21,23,'2014-06-21 13:00:00',NULL,NULL,NULL,NULL,1),(34,24,22,'2014-06-21 19:00:00',NULL,NULL,NULL,NULL,1),(35,24,21,'2014-06-25 13:00:00',NULL,NULL,NULL,NULL,1),(36,22,23,'2014-06-25 13:00:00',NULL,NULL,NULL,NULL,1),(37,25,26,'2014-06-16 13:00:00',1,2,NULL,NULL,1),(38,27,28,'2014-06-16 19:00:00',NULL,NULL,NULL,NULL,1),(39,25,27,'2014-06-21 16:00:00',1,0,NULL,NULL,1),(40,28,26,'2014-06-22 16:00:00',NULL,NULL,NULL,NULL,1),(41,28,25,'2014-06-26 13:00:00',NULL,NULL,NULL,NULL,1),(42,26,27,'2014-06-26 13:00:00',NULL,NULL,NULL,NULL,1),(43,29,30,'2014-06-17 13:00:00',NULL,NULL,NULL,NULL,1),(44,31,32,'2014-06-17 19:00:00',NULL,NULL,NULL,NULL,1),(45,32,30,'2014-06-22 13:00:00',NULL,NULL,NULL,NULL,1),(46,29,31,'2014-06-22 19:00:00',NULL,NULL,NULL,NULL,1),(47,32,29,'2014-06-26 17:00:00',NULL,NULL,NULL,NULL,1),(48,30,31,'2014-06-26 17:00:00',NULL,NULL,NULL,NULL,1);

/*Table structure for table `playoffestructura` */

DROP TABLE IF EXISTS `playoffestructura`;

CREATE TABLE `playoffestructura` (
  `idPlayoffEstructura` int(11) NOT NULL AUTO_INCREMENT,
  `posicion` int(11) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idTorneo` int(11) DEFAULT NULL,
  `idPlayoff` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPlayoffEstructura`),
  KEY `FK_playoffestructura_grupo` (`idGrupo`),
  KEY `FK_playoffestructura` (`idPlayoff`),
  CONSTRAINT `FK_playoffestructura` FOREIGN KEY (`idPlayoff`) REFERENCES `playoffs` (`idPlayoffs`),
  CONSTRAINT `FK_playoffestructura_grupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `playoffestructura` */

insert  into `playoffestructura`(`idPlayoffEstructura`,`posicion`,`idGrupo`,`idTorneo`,`idPlayoff`) values (1,1,1,1,1),(2,2,2,1,1),(3,1,3,1,2),(4,2,4,1,2),(5,1,5,1,3),(6,2,6,1,3),(7,1,7,1,4),(8,2,8,1,4),(9,2,1,1,5),(10,1,2,1,5),(11,2,3,1,6),(12,1,4,1,6),(13,2,5,1,7),(14,1,6,1,7),(15,2,7,1,8),(16,1,8,1,8);

/*Table structure for table `playoffs` */

DROP TABLE IF EXISTS `playoffs`;

CREATE TABLE `playoffs` (
  `idPlayoffs` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idPlayoffs`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `playoffs` */

insert  into `playoffs`(`idPlayoffs`,`nombre`,`numero`,`fecha`) values (1,'Octavos',1,'2014-06-28'),(2,'Octavos',2,'2014-06-28'),(3,'Octavos',3,'2014-06-30'),(4,'Octavos',4,'2014-06-30'),(5,'Octavos',5,'2014-06-29'),(6,'Octavos',6,'2014-06-29'),(7,'Octavos',7,'2014-07-01'),(8,'Octavos',8,'2014-07-01'),(9,'Cuartos',1,'2014-07-04'),(10,'Cuartos',2,'2014-07-05'),(11,'Cuartos',3,'2014-07-04'),(12,'Cuartos',4,'2014-07-05'),(13,'Semis',1,'2014-07-08'),(14,'Semis',2,'2014-07-09'),(15,'Final',1,'2014-07-13');

/*Table structure for table `resultadomundial` */

DROP TABLE IF EXISTS `resultadomundial`;

CREATE TABLE `resultadomundial` (
  `idResultadoMundial` char(1) NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idResultadoMundial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `resultadomundial` */

insert  into `resultadomundial`(`idResultadoMundial`,`puntos`) values ('E',1),('G',3),('P',0);

/*Table structure for table `torneo` */

DROP TABLE IF EXISTS `torneo`;

CREATE TABLE `torneo` (
  `idTorneo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) NOT NULL,
  PRIMARY KEY (`idTorneo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`idUsuario`,`nombre`,`apellido`,`username`,`passw`,`esAdmin`,`puntos`) values (1,'Alejandro','Rothar','arothar','orionale',1,NULL);

/*Table structure for table `usuariopartido` */

DROP TABLE IF EXISTS `usuariopartido`;

CREATE TABLE `usuariopartido` (
  `idUsuario` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL,
  `golesLocal` int(11) DEFAULT NULL,
  `golesVisitante` int(11) DEFAULT NULL,
  `idGanador` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`,`idPartido`),
  KEY `FK_usuariopartido_partido` (`idPartido`),
  KEY `FK_usuariopartido_equipo` (`idGanador`),
  KEY `FK_usuariopartido_usuario` (`idUsuario`),
  CONSTRAINT `FK_usuariopartido` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `FK_usuariopartido_equipo` FOREIGN KEY (`idGanador`) REFERENCES `equipo` (`IdEquipo`),
  CONSTRAINT `FK_usuariopartido_partido` FOREIGN KEY (`idPartido`) REFERENCES `partidomundial` (`idPartidoMundial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuariopartido` */

insert  into `usuariopartido`(`idUsuario`,`idPartido`,`golesLocal`,`golesVisitante`,`idGanador`,`puntos`) values (1,1,2,3,2,0),(1,2,1,0,4,NULL),(1,3,1,0,NULL,NULL),(1,4,1,1,NULL,NULL),(1,5,0,0,NULL,NULL),(1,6,1,2,NULL,NULL),(1,8,2,2,NULL,NULL),(1,10,2,0,NULL,NULL),(1,13,2,0,NULL,NULL),(1,14,1,0,NULL,NULL),(1,19,2,2,NULL,NULL),(1,20,5,0,NULL,NULL),(1,21,1,3,NULL,NULL);

/* Procedure structure for procedure `asignarPuntaje` */

/*!50003 DROP PROCEDURE IF EXISTS  `asignarPuntaje` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `asignarPuntaje`(in p_partido int,IN p_golesLocal int,IN p_golesVisitante int)
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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

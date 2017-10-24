CREATE DATABASE  IF NOT EXISTS `dbcontrolcapacitacion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbcontrolcapacitacion`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcontrolcapacitacion
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `idEvaluacion` int(10) NOT NULL AUTO_INCREMENT,
  `asignacion_idAsignacion` int(10) DEFAULT NULL,
  `asignacionTema_idAsignacionTema` int(10) DEFAULT NULL,
  `programacion_idProgramacion` int(10) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `calificacion` int(10) NOT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `fk_Evaluacion_Asignacion1_idx` (`asignacion_idAsignacion`),
  KEY `fk_Evaluacion_AsignacionTema1_idx` (`asignacionTema_idAsignacionTema`),
  KEY `fk_Evaluacion_Programacion1_idx` (`programacion_idProgramacion`),
  CONSTRAINT `Evaluacion_Asignacion1` FOREIGN KEY (`asignacion_idAsignacion`) REFERENCES `asignacion` (`idAsignacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Evaluacion_AsignacionTema1` FOREIGN KEY (`asignacionTema_idAsignacionTema`) REFERENCES `asignaciontema` (`idAsignacionTema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Evaluacion_Programacion1` FOREIGN KEY (`programacion_idProgramacion`) REFERENCES `programacion` (`idProgramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-11 17:15:31

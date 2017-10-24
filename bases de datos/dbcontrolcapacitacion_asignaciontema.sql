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
-- Table structure for table `asignaciontema`
--

DROP TABLE IF EXISTS `asignaciontema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaciontema` (
  `idAsignacionTema` int(10) NOT NULL AUTO_INCREMENT,
  `tema_id` int(10) DEFAULT NULL,
  `programacion_idProgramacion` int(10) DEFAULT NULL,
  PRIMARY KEY (`idAsignacionTema`),
  KEY `fk_Asignacion_tema_id1x` (`tema_id`),
  KEY `fk_Asignacion_programacion1_idx` (`programacion_idProgramacion`),
  CONSTRAINT `fk_AsignacionTema_programacion1` FOREIGN KEY (`programacion_idProgramacion`) REFERENCES `programacion` (`idProgramacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AsignacionTema_tema_id` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`idTema`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaciontema`
--

LOCK TABLES `asignaciontema` WRITE;
/*!40000 ALTER TABLE `asignaciontema` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignaciontema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-11 17:15:32

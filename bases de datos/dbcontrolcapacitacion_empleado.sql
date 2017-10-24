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
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `documento` varchar(45) NOT NULL,
  `nombreCompleto` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correoElectronico` varchar(45) NOT NULL,
  `Departamento_idDepartamento` int(11) NOT NULL,
  `Contrato_idContrato` int(11) NOT NULL,
  `tipoNivelEscolar_idtipoNivelEscolar` int(11) NOT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`documento`),
  KEY `fk_Empleado_Contrato1_idx` (`Contrato_idContrato`),
  KEY `fk_Empleado_TipoNivelEscolar1_idx` (`tipoNivelEscolar_idtipoNivelEscolar`),
  KEY `fk_Empleado_Departamento1_idx` (`Departamento_idDepartamento`),
  CONSTRAINT `fk_Empleado_Contrato1` FOREIGN KEY (`Contrato_idContrato`) REFERENCES `contrato` (`idContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleado_Departamento1` FOREIGN KEY (`Departamento_idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('0003','N','00000','Ng@gf.com',1,5,2,1),('1023923155','Ana','20545656','abbbxag@gf.com',2,4,1,1),('10239231558','Alexandra','20545656','alexandrag@gf.com',2,2,1,1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
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

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
-- Temporary view structure for view `cargarempleado`
--

DROP TABLE IF EXISTS `cargarempleado`;
/*!50001 DROP VIEW IF EXISTS `cargarempleado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `cargarempleado` AS SELECT 
 1 AS `nombreCompleto`,
 1 AS `documento`,
 1 AS `telefono`,
 1 AS `correoElectronico`,
 1 AS `fechaInicioLaboral`,
 1 AS `fechaTerminacionContrato`,
 1 AS `empresa`,
 1 AS `numContrato`,
 1 AS `Tipocontrato`,
 1 AS `area`,
 1 AS `nivelEscolar`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `cargarempleado`
--

/*!50001 DROP VIEW IF EXISTS `cargarempleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cargarempleado` AS select `empleado`.`nombreCompleto` AS `nombreCompleto`,`empleado`.`documento` AS `documento`,`empleado`.`telefono` AS `telefono`,`empleado`.`correoElectronico` AS `correoElectronico`,`contrato`.`fechaInicioLaboral` AS `fechaInicioLaboral`,`contrato`.`fechaTerminacionContrato` AS `fechaTerminacionContrato`,`contrato`.`empresa` AS `empresa`,`contrato`.`numContrato` AS `numContrato`,`tipocontrato`.`nombre` AS `Tipocontrato`,`departamento`.`area` AS `area`,`tiponivelescolar`.`nombre` AS `nivelEscolar` from ((((`empleado` join `contrato` on((`empleado`.`Contrato_idContrato` = `contrato`.`idContrato`))) join `departamento` on((`departamento`.`idDepartamento` = `empleado`.`Departamento_idDepartamento`))) join `tiponivelescolar` on((`tiponivelescolar`.`idtipoNivelEscolar` = `empleado`.`tipoNivelEscolar_idtipoNivelEscolar`))) join `tipocontrato` on((`tipocontrato`.`idtipoContrato` = `contrato`.`tipoContrato_idtipoContrato`))) where (`empleado`.`visibilidad` = '1') order by `empleado`.`nombreCompleto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping routines for database 'dbcontrolcapacitacion'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualizarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEmpleado`(
 _documento INT(10),
_nombreCompleto VARCHAR(45),
_telefono VARCHAR(45),
_correo VARCHAR(45),
_departamento int(10),
_tipoNivelEscolar int(10),
_tipoContrato INT(10),
_fechaInicio DATE,
_fechaFin DATE,
_empresa VARCHAR(45),
_numContrato VARCHAR (45)
)
BEGIN

	UPDATE Contrato  SET numContrato=_numContrato,
    TipoContrato_idTipoContrato=_tipocontrato,
    fechaInicioLaboral=_fechaInicio, 
    fechaTerminacionContrato=_fechaFin,
    empresa =_empresa
    WHERE idContrato = (SELECT Contrato_idContrato FROM Empleado WHERE documento = _documento);
    
	UPDATE Empleado SET 
    nombreCompleto=_nombreCompleto,
    telefono=_telefono,correoElectronico=_correo,
    Departamento_idDepartamento=_departamento,
    tipoNivelEscolar_idTipoNivelEscolar=_tipoNivelEscolar
    WHERE documento=_documento;
    
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `buscarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCorreo`(
 _documento VARCHAR(45)
 )
BEGIN
    SELECT count(*) AS usuario
    FROM Usuario
    where documento= _documento AND visibilidad = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inhabilitarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `inhabilitarEmpleado`(
_documento VARCHAR(45),
_idContrato VARCHAR(45))
BEGIN
    UPDATE Empleado SET visibilidad=0
    WHERE documento=_documento;
    
    
    UPDATE Contrato SET visibilidad=(SELECT visibilidad FROM Contrato INNER JOIN Empleado on Contrato.idContrato=Empleado.Contrato_idContrato )=0
    WHERE Contrato.idContrato=_idContrato;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `inhabilitarProgramacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `inhabilitarProgramacion`(
	_idProgramacion INT(10))
BEGIN

	UPDATE programacion SET visibilidad=0
    WHERE idProgramacion=_idProgramacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `registrarEmpleado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarEmpleado`(
_documento VARCHAR(45),
_nombreCompleto VARCHAR(45),
_telefono VARCHAR(45),
_correoElectronico VARCHAR(45),
_tipoNivelEscolar int(10),
_tipoContrato INT(10),
_fechaInicioLaboral DATE,
_fechaTerminacionContrato DATE,
_idDepartamento int(10),
_empresa VARCHAR(45),
_numContrato VARCHAR (45))
BEGIN

	INSERT INTO Contrato(numContrato,fechaInicioLaboral,fechaTerminacionContrato,tipoContrato_idtipoContrato,empresa,visibilidad)
    VALUES(_numContrato,_fechaInicioLaboral,_fechaTerminacionContrato,_tipocontrato,_empresa,1);

	INSERT INTO Empleado(documento,nombreCompleto,telefono,correoElectronico,departamento_idDepartamento,Contrato_idContrato,tipoNivelEscolar_idtipoNivelEscolar,visibilidad) VALUES
    (_documento,_nombreCompleto,_telefono,_correoElectronico,_idDepartamento,(select contrato.idContrato FROM Contrato WHERE contrato.numContrato =_numContrato),_tipoNivelEscolar,1);

    
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-11 17:15:33

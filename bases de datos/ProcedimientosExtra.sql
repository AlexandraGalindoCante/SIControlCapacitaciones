
DELIMITER //
CREATE PROCEDURE `crearCapacitador`(
_documento int(20),
_nombre VARCHAR(45))
BEGIN
	
    INSERT INTO capacitador(documento,nombreCapacitador,visibilidad)VALUES(_documento,_nombre,1);

END//

DELIMITER //
CREATE PROCEDURE `registrarEvaluacion`(
_estado VARCHAR(45),
_observaciones VARCHAR(100),
_calificacion int(10),
_idAsigEmpleado int(10),
_idAsigModulo int(10))
BEGIN
	
    INSERT INTO evaluacion (estado, observaciones, calificacion, visibilidad, idAsigEmpleado, idAsigmodulo) 
	values (_estado,_observaciones,_calificacion,1,_idAsigEmpleado,_idAsigmodulo);

END//

DELIMITER //
CREATE PROCEDURE `actualizarEvaluacion`(
_estado VARCHAR(45),
_observaciones VARCHAR(100),
_calificacion int(10),
_idAsigEmpleado int(10),
_idAsigModulo int(10))
BEGIN
	
    UPDATE evaluacion SET estado = _estado, observaciones = _observaciones,
     calificacion = _calificacion
     WHERE idAsigEmpleado = _idAsigEmpleado AND idAsigModulo = _idAsigModulo;

END//


-- consultas



CREATE VIEW modulosProgramacion AS 
SELECT nombreModulo, m.idModulo, a.idProgramacion FROM modulo AS m INNER JOIN asigModulo AS a 
ON a.idModulo = m.idModulo




SELECT e.nombreCompleto,e.documento, ae.idAsigEmpleado, am.idAsigModulo,
 ev.estado, ev.observaciones, ev.calificacion, ev.visibilidad FROM
empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
WHERE pr.idProgramacion = 5 AND am.idModulo = 1 AND (ev.visibilidad IS NULL OR ev.visibilidad = 1)
ORDER BY e.nombreCompleto;



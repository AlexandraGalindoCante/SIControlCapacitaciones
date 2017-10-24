/**********************************************
	PROCEDIMIENTO REGISTRAR USUARIO
/**********************************************/
DELIMITER //
CREATE PROCEDURE registrarUsuario(
_numeroDocumento VARCHAR(45),
_nombreUsuario VARCHAR (45),
_contrasena VARCHAR(100),
_rol int(10)
)
BEGIN
INSERT INTO usuario (numeroDocumento,nombreUsuario,contrasena,rol,visibilidad)VALUES 
(_numeroDocumento,_nombreUsuario,_contrasena,_rol,1);


END//
drop procedure actualizarUsuario

call registrarUsuario("1023923155","Alexandra Galindo","123",1)
select * from usuario
/**********************************************
	PROCEDIMIENTO MODIFICAR USUARIO
/**********************************************/

DELIMITER //
CREATE PROCEDURE actualizarUsuario(
_numeroDocumento VARCHAR(45),
_nombreUsuario VARCHAR (45),
_contrasena VARCHAR(100),
_rol int(10)
)
BEGIN
UPDATE Usuario SET nombreUsuario = _nombreUsuario,numeroDocumento=_numeroDocumento,contrasena=_contrasena,
rol=_rol 
WHERE numeroDocumento=_numeroDocumento;

END//

/**********************************************
	PROCEDIMIENTO ELIMINAR USUARIO
/**********************************************/

DELIMITER //
CREATE PROCEDURE eliminarUsuario(
_numeroDocumento VARCHAR(20)
)
BEGIN
	DELETE usuario
    from usuario
    WHERE 
    numeroDocumento=_numeroDocumento;
END//
/**********************************************
	PROCEDIMIENTO CAMBIO DE CONTRASEÑA
/**********************************************/

DELIMITER //
CREATE PROCEDURE cambiarContrasena(
 _doc VARCHAR(50),
 _pass varchar(255)
 )
BEGIN
    UPDATE usuario
    SET contrasena = _pass
    where numeroDocumento = _doc AND visibilidad = 1;
END //




/**********************************************
	PROCEDIMIENTO VALIDAR USUARIO
/**********************************************/


DELIMITER //
CREATE PROCEDURE login(
 _documento VARCHAR(45)
 )
BEGIN
    SELECt Usuario.*, Rol.idRol, Rol.rol  FROM Usuario
    INNER JOIN Rol ON usuario.rol = rol.idRol
    where numeroDocumento= _documento AND visibilidad = 1;
END //
drop procedure login
/**********************************************
	PROCEDIMIENTO REGISTRO EMPLEADO
/**********************************************/

DELIMITER //
CREATE PROCEDURE registrarEmpleado(
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

    
    
END //
/**********************************************
	PROCEDIMIENTO ACTUALIZAR EMPLEADO
/**********************************************/
DELIMITER //
CREATE PROCEDURE actualizarEmpleado(
 _documento  VARCHAR(45),
_nombreCompleto VARCHAR(45),
_telefono VARCHAR(45),
_correo VARCHAR(45),
_departamento int(10),
_tipoNivelEscolar int(10),
_tipoContrato INT(10),
_fechaInicio DATE,
_fechaFin DATE,
_empresa VARCHAR(45),
_numContrato VARCHAR(45)
)

BEGIN

	UPDATE Contrato  SET 
    TipoContrato_idTipoContrato=_tipocontrato,
    fechaInicioLaboral=_fechaInicio, 
    fechaTerminacionContrato=_fechaFin,
    empresa =_empresa,numContrato=_numContrato
    WHERE idContrato = (SELECT Contrato_idContrato FROM Empleado WHERE documento = _documento);
    
	UPDATE Empleado SET 
    nombreCompleto=_nombreCompleto,
    telefono=_telefono,correoElectronico=_correo,
    Departamento_idDepartamento=_departamento,
    tipoNivelEscolar_idTipoNivelEscolar=_tipoNivelEscolar
    WHERE documento=_documento;
    
    
END //
/**********************************************
	PROCEDIMIENTO ELIMINAR  EMPLEADO
/**********************************************/
DELIMITER //
CREATE PROCEDURE inhabilitarEmpleado(
_documento VARCHAR(45))
BEGIN

  UPDATE empleado set visibilidad=0 
  where documento=_documento;
  Update contrato set visibilidad = 0
 where Idcontrato = ( select contrato_idContrato from empleado where documento = _documento);
END //



/**********************************************
	PROCEDIMIENTO CREAR MODULO
/**********************************************/
DELIMITER //
CREATE PROCEDURE crearModulo(
_nombreModulo VARCHAR(45),
_frecuencia INT(10),
_descripcion VARCHAR (200))
BEGIN
	INSERT INTO modulo (nombreModulo,frecuencia,descripcion,visibilidad) VALUES(_nombreModulo,_frecuencia,_descripcion,1);
END //



call crearModulo("protocolos de seguridad",3,"")

/**********************************************
	PROCEDIMIENTO MODIFICAR MODULO
/**********************************************/

DELIMITER //
CREATE PROCEDURE modificarModulo(
_idModulo INT (10),
_nombreModulo VARCHAR(45),
_frecuencia INT(10),
_descripcion VARCHAR (200))
BEGIN
	UPDATE  MODULO SET nombreModulo=_nombreModulo,frecuencia=_frecuencia,descripcion=_descripcion
    WHERE idModulo=_idModulo;
END //
/**********************************************
	PROCEDIMIENTO ELIMINAR MODULO
/**********************************************/

DELIMITER //
CREATE PROCEDURE elimModulo(
_idModulo int(10)
)
BEGIN
UPDATE  modulo SET visibilidad=0
where idModulo=_idModulo;
END //


/**********************************************
	PROCEDIMIENTO CREAR TEMA
/**********************************************/
DELIMITER //
CREATE PROCEDURE crearTema(
_nombre varchar(45),
_descripcion varchar(250))

BEGIN
	INSERT INTO TEMA (nombre,descripcion,visibilidad) VALUES(_nombre,_descripcion,1);

END//

drop procedure crearTema
/**********************************************
	PROCEDIMIENTO MODIFICAR TEMA
/**********************************************/
DELIMITER //
CREATE PROCEDURE modificarTema(
_idTema int(10),
_nombre varchar(45),
_estado varchar(45),
descripcion varchar(250))

BEGIN
	INSERT INTO TEMA (nombre,estado,descripcion) VALUES(_nombre,_estado,_descripcion);

END//
/**********************************************
	PROCEDIMIENTO ELIMINAR TEMA
/**********************************************/
DELIMITER //
CREATE PROCEDURE eliminarTema(
_idtema INT(10)
)
BEGIN

		UPDATE tema SET visibilidad =0
        WHERE idtema =_idtema ;
END //


/**********************************************
	PROCEDIMIENTO PARA ASIGNAR TEMA A EL MODULO
/**********************************************/

DELIMITER //
CREATE PROCEDURE asignarTema(
_idTema int(10),
_idModulo int(10))
BEGIN
	
   INSERT INTO AsigTema(idModulo,idTema)VALUES(_idTema,_idModulo);

END//

/**********************************************
	PROCEDIMIENTO REGISTRO CAPACITADOR
/**********************************************/


DELIMITER //
CREATE PROCEDURE `crearCapacitador`(
_documento int(20),
_nombre VARCHAR(45))
BEGIN
	
    INSERT INTO capacitador(documento,nombreCapacitador,visibilidad)VALUES(_documento,_nombre,1);

END//
/**********************************************
	PROCEDIMIENTO ELIMINAR CAPACITADOR
/**********************************************/

DELIMITER //
CREATE PROCEDURE modificarCapacitador(
_documento int(10),
_nombre VARCHAR (45)
)
BEGIN
	
  Update Capacitador set documento=_documento,nombreCapacitador=_nombre 
  where documento=_documento;

END//
/**********************************************
	PROCEDIMIENTO PARA ASIGNAR MODULO A LA CAPACITACIÓN
/**********************************************/

DELIMITER //
CREATE PROCEDURE crearasignacionModulo(
_idCapacitador VARCHAR (45),
_idProgramacion INT (10),
_idModulo INT(10))
BEGIN
INSERT INTO AsigModulo(idCapacitador,idProgramacion,idModulo)
VALUES(_idCapacitador,_idProgramacion,_idModulo);

END//
drop procedure crearasignacionModulo





DELIMITER //
CREATE PROCEDURE eliminarAsigModulo(
_idAsigModulo int (10)
)
BEGIN
DELETE  asigmodulo FROM asigmodulo
WHERE idAsigModulo=_idAsigModulo;

END //









/**********************************************
	PROCEDIMIENTO CREAR CAPACITACION/PROGRAMACIÓN
/**********************************************/

DELIMITER //
CREATE PROCEDURE crearProgramacion(
		
	_fechaInicio DATE,
    _fechaFin DATE,
    _tipoCap varchar (45),
    _modalidad VARCHAR(45),
    _nivel VARCHAR(45)
    )
BEGIN

	INSERT INTO programacion(fechaInicio,fechaFin,tipoCapacitacion,modalidad,nivel,visibilidad,fechaReg) 
    VALUES(_fechaInicio,_fechaFin,_tipoCap,_modalidad,_nivel,1,NOW());
    
END //


/**********************************************
	PROCEDIMIENTO  MODIFICAR CAPACITACION/PROGRAMACIÓN
/**********************************************/

DELIMITER //
CREATE PROCEDURE actualizarProgramacion(
	_idProgramacion INT(10),
	_fechaInicio DATE,
    _fechaFin DATE,
    _tipoCap varchar (45),
    _modalidad VARCHAR(45),
    _nivel VARCHAR(45))
    

BEGIN

	UPDATE programacion SET fechaInicio=_fechaInicio,fechaFin=_fechaFin,tipoCapacitacion=_tipoCap,modalidad= _modalidad,nivel=_nivel
    where idProgramacion=_idProgramacion;
END //
/**********************************************
	PROCEDIMIENTO  ELIMINAR CAPACITACION/PROGRAMACIÓN
/**********************************************/
DELIMITER //
CREATE PROCEDURE inhabilitarProgramacion(
	_idProgramacion INT(10)) 
    
BEGIN

	UPDATE programacion SET visibilidad=0
    WHERE idProgramacion=_idProgramacion;

END //





call inhabilitarProgramacion()
/**********************************************
	PROCEDIMIENTO  REGISTRAR EVALUACION
/**********************************************/
DELIMITER //
CREATE PROCEDURE Evaluacion (
_asignacion int (10),
_asignacionTema int (10),
_programacion int (10),
_estado VARCHAR (45),
_observacion VARCHAR (45),
_calificacion int (10),
_idEmpleado VARCHAR(45),
_idAsModulo INT (10))
BEGIN

INSERT INTO Evaluacion (asignacion_idAsignacion,asignacionTema_idAsignacionTema,programacion,estado,observacion,calificacion,idEmpleado,idAsigModulo,visibilidad) VALUES
(_asignacion,_asignaciontema,_programacion,_estado,_observacion,_calificacion,_idEmpleado,_idAsModulo,1);
END //
/**********************************************
	PROCEDIMIENTO  MODIFICAR EVALUACION
/**********************************************/


DELIMITER //
CREATE PROCEDURE modificarEvaluacion(
_idAEvaluacion INT (10),
_asignacion int (10),
_asignacionTema int (10),
_programacion int (10),
_estado VARCHAR (45),
_calificacion int (10),
_idEmpleado VARCHAR(45),
_idAsModulo INT (10))
BEGIN

UPDATE  Evaluacion SET asignacion_idAsignacion=_asignacion,asignacionTema_idAsignacionTema=_asignaciontema,programacion=_programacion,
estado=_estado,calificacion=_calificacion,idEmpleado=_idEmpleado,idAsigModulo=_idAsModulo
WHERE idEvaluacion=_idEvaluacion;
END //

/**********************************************
	PROCEDIMIENTO  ELIMINAR  EVALUACION
/**********************************************/

DELIMITER //
CREATE PROCEDURE inhabilitarEvaluacion(
_idEvaluacion INT (10))
BEGIN

UPDATE  Evaluacion SET visibilidad=0
WHERE idEvaluacion=_idEvaluacion;
END //

/**********************************************
	PROCEDIMIENTO  CREAR ASIGNACION EMPLEADO A UNA CAPACITACIÓN
/**********************************************/

DELIMITER //
CREATE PROCEDURE crearAsigancion(
_estado VARCHAR (45),
_programacion_id VARCHAR (45),
_empleado_documento VARCHAR (45)
)
BEGIN
	INSERT INTO asignacion (estado,programacion_idProgramacion,empleado_documento) VALUES (_estado,_programacion_id,_empleado_documento);
END // 
/**********************************************
	PROCEDIMIENTO  MODIFICAR ASIGNACION EMPLEADO A UNA CAPACITACION 
/**********************************************/

CREATE PROCEDURE modificarAsignacion(
_idAsignacion INT (10),
_estado VARCHAR (45),
_programacion_id VARCHAR (45),
_empleado_documento VARCHAR (45)
)
BEGIN

	UPDATE Asignacion SET estado=_estado,programacion=_programacion,empleado_documento=_empleado_documento
	WHERE idAsignacion=_idAsignacion;
END //

/******************************************************************
	PROCEDIMIENTO ELIMINAR ASIGNACIÓN EMPLEADO A UNA CAPACITACIÓN 
/******************************************************************/


DELIMITER //
CREATE PROCEDURE elimAsigEmpleado(
_idAsignacion INT (10)

)
BEGIN
	DELETE FROM evaluacion 
	WHERE idAsigEmpleado = _idAsignacion;

	DELETE FROM asigEmpleado 
	WHERE idAsigEmpleado = _idAsignacion;


END //

/**********************************************
	PROCEDIMIENTO ELIMINAR ASIGNACION EMPLEADO A UNA
/**********************************************/
DELIMITER //
CREATE PROCEDURE inhabilitarAsignacion(
_idAsignacion INT (10))
BEGIN
	UPDATE  Evaluacion SET visibilidad=0
	WHERE idAsignacion=_idAsignacion;
END //
/**********************************************
	PROCEDIMIENTO CREAR ASIGNACION MODULO A UNA CAPACITACIÓN 
/**********************************************/

DELIMITER //
CREATE PROCEDURE crearAsignacionModulo(
_idProgramacion INT(10),
_idModulo int (10),
_idCapacitador VARCHAR(45),
_resultCapacitador VARCHAR(45)
)
BEGIN
	
		INSERT INTO AsigModulo(idModulo,idProgramacion,idCapacitador,resultCapacitador) VALUES
		(_idModulo,_idProgramacion,_idCapacitador,_resultCapacitador);
END//
/**********************************************
	PROCEDIMIENTO ELIMINAR ASIGNACION MODULO  A UNA CAPACITACION
/**********************************************/

DELIMITER //
CREATE PROCEDURE elimAsignacionModulo(

_idAsigModulo INT(10)
)
BEGIN
		delete from asigmodulo
        WHERE idAsignacionmodulo=_idAsignacionmodulo;
END//
/**********************************************
	PROCEDIMIENTO CREAR ASIGNACION TEMA A UN MODULO
/**********************************************/
DELIMITER //
CREATE PROCEDURE crearAsignacionTema(
_idAsignacionTema INT(10),
_idmodulo int (10),
_idtema int(10)
)
BEGIN
	INSERT INTO asignaciontema (idmodulo,idtema)VALUES(_idmodulo,_idtema);
       
END //

/**********************************************
	PROCEDIMIENTO MODIFICAR ASIGNACION TEMA A UN MODULO
/**********************************************/

DELIMITER //
CREATE PROCEDURE modificarAsignacionTema(
_idAsignacionTema INT(10),
_idmodulo int (10),
_idtema int(10)
)
BEGIN

		UPDATE asignaciontema SET idModulo=_idmodulo,idProgramacion=idTema
        WHERE idAsignacionTema=_idAsignacionTema;
END //
/**********************************************
	PROCEDIMIENTO ELIMINAR ASIGNACION MODULO A UNA CAPACITACIÓN 
/**********************************************/

DELIMITER //
CREATE PROCEDURE eliminarAsignacionTema(
_idAsignacionTema INT(10)
)
BEGIN

		DELETE FROM  asignaciontema 
		WHERE idAsignacionTema=_idAsignacionTema;
END //
/**************************************************************
	PROCEDIMIENTO CREAR ASIGNACIÓN EMPLEADO A UNA CAPACITACIÓN 
/**************************************************************/

DELIMITER //
CREATE PROCEDURE crearAsigEmpleado(
    _idprogramacion int (10),
    _idEmpleado VARCHAR(100)
)
BEGIN
    
        INSERT INTO asigEmpleado(idEmpleado,idProgramacion) VALUES
        (_idEmpleado,_idProgramacion);
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

DELIMITER //
CREATE PROCEDURE consultarRol(
_rol varchar (45)
)
BEGIN
SELECT idRol from Rol WHERE rol=_rol;

END //


DELIMITER //
CREATE PROCEDURE califCapacitador(
_idAsigModulo int(10),
_resultado VARCHAR(250)
)
BEGIN
	UPDATE AsigModulo set  resultCapacitador=_resultado
    WHERE idAsigModulo=_idAsigModulo;
  
END //


DELIMITER //
CREATE PROCEDURE buscarUsuario(
_documento VARCHAR(50)
)
BEGIN
 SELECT contrasena,numeroDocumento
 from Usuario 
 where numeroDocumento=_documento;

END //

drop procedure buscarUsuario;




select  * from cargarempleado;





/*CREATE VIEW modulosProgramacion 
AS 
SELECT nombreModulo, m.idModulo, a.idProgramacion 
FROM modulo as m INNER JOIN asigModulo AS a ON a.idModulo = m.idModulo;

*/








/*---consultas prueba*/


/*VISTA QWUE CARGA EMPLEADOS */
CREATE  VIEW cargarempleado AS select nombreCompleto,documento,telefono,correoElectronico,fechaInicioLaboral,fechaTerminacionContrato,
empresa,numContrato,tipocontrato.nombre AS Tipocontrato,area ,tiponivelescolar.nombre
 AS nivelEscolar from 
((((empleado join contrato on((empleado.Contrato_idContrato = contrato.idContrato))) join departamento on
((departamento.idDepartamento = empleado.Departamento_idDepartamento))) join tiponivelescolar on((tiponivelescolar.idtipoNivelEscolar = empleado.TipoNivelEscolar_idtipoNivelEscolar))) 
join tipocontrato on((tipocontrato.idtipoContrato = contrato.tipoContrato_idtipoContrato)))
 where
 (empleado.visibilidad = '1') order by empleado.nombreCompleto;


/*CONSULTA DE PRUEBA*/
SELECT e.nombreCompleto,e.documento, ae.idAsigEmpleado, am.idAsigModulo,
 ev.estado, ev.observaciones, ev.calificacion, ev.visibilidad FROM
empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento 
INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
WHERE pr.idProgramacion = 5 AND am.idModulo = 1 AND (ev.visibilidad IS NULL OR ev.visibilidad = 1)
ORDER BY e.nombreCompleto;


SELECT e.nombreCompleto,e.documento, ae.idAsigEmpleado, am.idAsigModulo,
 ev.estado, ev.observaciones, ev.calificacion, ev.visibilidad, m.nombreModulo FROM
empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento
INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
inner join modulo as m on m.idModulo= am.idAsigModulo 
LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
WHERE pr.idProgramacion =3 AND am.idModulo = 12 AND (ev.visibilidad IS NULL OR ev.visibilidad = 1) AND  ev.calificacion <3
ORDER BY e.nombreCompleto;


/*query que carga empleados que perdieron modulos*/

SELECT e.nombreCompleto,e.documento, ae.idAsigEmpleado, am.idAsigModulo,
 ev.estado, ev.observaciones, ev.calificacion, ev.visibilidad, m.nombreModulo,MAX(fechaFin) as ff
FROM empleado AS e inner join asigempleado AS ae ON ae.idEmpleado = e.documento
INNER JOIN programacion AS pr ON pr.idProgramacion = ae.idProgramacion
INNER JOIN asigModulo AS am ON am.idProgramacion = pr.idProgramacion
inner join modulo as m on m.idModulo= am.idAsigModulo 
LEFT JOIN evaluacion AS ev ON ev.idAsigEmpleado = ae.idAsigEmpleado AND ev.idAsigModulo = am.idAsigModulo
WHERE (ev.visibilidad IS NULL OR ev.visibilidad = 1) AND  ev.calificacion <3
Group by e.nombreCompleto, e.documento, ae.idAsigEmpleado, am.idAsigModulo, ev.estado, ev.observaciones,
 ev.calificacion, ev.visibilidad, m.nombreModulo
ORDER BY e.nombreCompleto;


select * from asigEmpleado;

select * from empleado;

select * from modulo;


 
/**********
query de promedio de promedio capacitaciones
***********/
 
 select emp.documento, AVG( (SELECT calificacion FROM evaluacion as ev inner join asigEmpleado on asigEmpleado.idEmpleado = ev.idAsigEmpleado) ) as promedio from empleado as emp  group by emp.documento;
 
 
 
 



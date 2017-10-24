DROP DATABASE  DBCONTROLCAPACITACION;

CREATE DATABASE DBCONTROLCAPACITACION;
USE DBCONTROLCAPACITACION;

/**********************************************
	TABLA ROL USUARIO
/**********************************************/
CREATE TABLE Rol(
	idRol INT(10) auto_increment,
	rol VARCHAR(45),
	PRIMARY KEY(idRol))
	ENGINE= InnoDB;

/**********************************************
	TABLA USUARIO
/**********************************************/
CREATE TABLE Usuario (
	`numeroDocumento` VARCHAR(100) NOT NULL,
	`nombreUsuario` VARCHAR(100) NOT NULL,
	`contrasena` VARCHAR(100) NOT NULL,
	`visibilidad` TINYINT(1) NOT NULL,
     rol INT (10) NOT NULL,
	PRIMARY KEY (`numeroDocumento`),
	INDEX `fk_Usuario_Rol1_idx` (`rol` ASC),
	CONSTRAINT `fk_Usuario_Rol1`
	FOREIGN KEY (Rol)
	REFERENCES Rol(`idRol`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
	ENGINE = InnoDB;

/**********************************************
	TABLA TIPO DE CONTRATO EMPLEADO
/**********************************************/
CREATE TABLE IF NOT EXISTS tipoContrato (
	`idtipoContrato` INT (10) AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`idtipoContrato`))
	ENGINE = InnoDB;


/**********************************************
	TABLA DEPARTAMENTO  EMPLEADO
/**********************************************/
CREATE table Departamento(

	`idDepartamento` INT (10) AUTO_INCREMENT NOT NULL,
	`area` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`iddepartamento`))
	ENGINE = InnoDB;



/**********************************************
	TABLA NIVEL ESCOLAR EMPLEADO
/**********************************************/

CREATE TABLE IF NOT EXISTS TipoNivelEscolar (
	`idtipoNivelEscolar` INT(10) AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`idtipoNivelEscolar`))

	ENGINE = InnoDB;


/**********************************************
	TABLA CAPACITADOR
/**********************************************/
CREATE TABLE Capacitador(
	documento VARCHAR(100) NOT NULL,
	nombreCapacitador VARCHAR(100),
	visibilidad TINYINT(1) NOT NULL,
	PRIMARY KEY (documento)
)ENGINE = InnoDB;
		
  	
/**********************************************
	TABLA MODULO
/**********************************************/	
CREATE TABLE Modulo (
    idModulo INT (10) auto_increment NOT NULL,
	nombreModulo VARCHAR(100) NOT NULL unique,
    frecuencia INT,
    descripcion VARCHAR (250),
    visibilidad TINYINT(1) NOT NULL,
	PRIMARY KEY (idModulo))
ENGINE = InnoDB;


/**********************************************
	TABLA TEMA
/**********************************************/
CREATE TABLE Tema(
	idTema INT(10)AUTO_INCREMENT NOT NULL, 
    nombre VARCHAR (45) unique not null,
    descripcion VARCHAR (250),
	visibilidad TINYINT(1) NOT NULL,
	PRIMARY KEY (`idTema`))
ENGINE = InnoDB;

/**********************************************
	TABLA CONTRATO EMPLEADO
/**********************************************/
CREATE TABLE IF NOT EXISTS Contrato (
	`idContrato` INT AUTO_INCREMENT,
     numContrato VARCHAR (45),
	`fechaInicioLaboral` DATE NULL,
    `fechaTerminacionContrato` DATE DEFAULT NULL,
	`tipoContrato_idtipoContrato` INT  NULL,
     empresa VARCHAR (45),
	`visibilidad` TINYINT(1) NOT NULL,
	PRIMARY KEY (`idContrato`),
    UNIQUE KEY `numContrato` (`numContrato`),
	INDEX `fk_Contrato_tipoContrato1_idx` (`tipoContrato_idtipoContrato` ASC),
	CONSTRAINT `fk_Contrato_tipoContrato1`
	FOREIGN KEY (`tipoContrato_idtipoContrato`)
	REFERENCES tipoContrato (`idtipoContrato`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
	ENGINE = InnoDB;
	

/**********************************************
	TABLA EMPLEADO
/**********************************************/

CREATE TABLE IF NOT EXISTS Empleado (
	`documento` VARCHAR(100) NOT NULL ,
	`nombreCompleto` VARCHAR(100) NOT NULL,
	`telefono` VARCHAR(45) NOT NULL,
	`correoElectronico` VARCHAR(45) NOT NULL,
	`Departamento_idDepartamento` INT NOT NULL,
	`Contrato_idContrato` INT NOT NULL,
	`TipoNivelEscolar_idtipoNivelEscolar` INT NOT NULL,
    `visibilidad` TINYINT(1) NOT NULL,
	PRIMARY KEY (`documento`),
	INDEX `fk_Empleado_Contrato1_idx` (`Contrato_idContrato` ASC),
	INDEX `fk_Empleado_TipoNivelEscolar1_idx` (`TipoNivelEscolar_idtipoNivelEscolar` ASC),
	INDEX `fk_Empleado_Departamento1_idx` (`Departamento_idDepartamento` ASC),
	CONSTRAINT `fk_Empleado_Contrato1`
	FOREIGN KEY (`Contrato_idContrato`)
	REFERENCES Contrato (`idContrato`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
	CONSTRAINT `fk_Empleado_Departamento1`
	FOREIGN KEY (`Departamento_idDepartamento`)
	REFERENCES Departamento (`idDepartamento`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
	CONSTRAINT `fk_Empleado_TipoNivelEscolar1`
	FOREIGN KEY (`TipoNivelEscolar_idtipoNivelEscolar`)
	REFERENCES TipoNivelEscolar (`idtipoNivelEscolar`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
	ENGINE = InnoDB;
    

/**********************************************
	TABLA PROGRAMACIÓN/CAPACITACIÓN
/**********************************************/

CREATE TABLE IF NOT EXISTS Programacion(
	`idProgramacion` INT(10) AUTO_INCREMENT NOT NULL,
	`fechaInicio` DATE NOT NULL,
	`fechaFin` DATE NOT NULL,
     tipoCapacitacion  VARCHAR(45) NOT NULL,
     modalidad  VARCHAR(45)  NOT NULL,
     nivel  VARCHAR(45) NOT NULL,
     fechaReg DATETIME, 
	`visibilidad` TINYINT(1) NOT NULL,
	PRIMARY KEY (`idProgramacion`))
ENGINE = InnoDB;



/**********************************************
	TABLA ASIGNACION EMPLEADO A CAPACITACION
/**********************************************/

CREATE TABLE AsigEmpleado(
	idAsigEmpleado INT(10) AUTO_INCREMENT NOT NULL, 
    idEmpleado VARCHAR(100),
    idProgramacion INT (10),
	PRIMARY KEY (`idAsigEmpleado`),
    INDEX `fk_idAsigEmpleado_idEmpleado1_idx` (`idEmpleado` ASC),
	CONSTRAINT `fk_idAsigEmpleado_idEmpleado1`
	FOREIGN KEY (`idEmpleado`)
	REFERENCES Empleado (`documento`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
    INDEX `fk_AsigEmpleado_idProgramacion1_idx` (`idProgramacion` ASC),
	CONSTRAINT `fk_AsigEmpleado_idProgramacion1`
	FOREIGN KEY (`idProgramacion`)
	REFERENCES Programacion (`idProgramacion`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
ENGINE = InnoDB;


/**********************************************
	TABLA ASIGNACION MODULO A CAPACITACION
/**********************************************/
CREATE TABLE AsigModulo(
	idAsigModulo INT(10) auto_increment NOT NULL,
	idProgramacion INT (10),
    idCapacitador VARCHAR(100),
	idModulo INT(10),
    resultCapacitador VARCHAR(45),
    PRIMARY KEY (`idAsigModulo`),
    INDEX `fk_AsigModulo_idProgramacion1_idx` (`idProgramacion` ASC),
	CONSTRAINT `fk_AsigModulo_idProgramacion1`
	FOREIGN KEY (`idProgramacion`)
	REFERENCES Programacion (`idProgramacion`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
	INDEX `fk_AsigModulo_idModulo1_idx` (`idModulo` ASC),
	CONSTRAINT `fk_AsigModulo_idTema1`
	FOREIGN KEY (`idModulo`)
	REFERENCES Modulo (`idModulo`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
    INDEX `fk_AsigModulo_idCapacitador1_idx` (`idCapacitador` ASC),
	CONSTRAINT `fk_AsigModulo_idCapacitador1`
	FOREIGN KEY (`idCapacitador`)
	REFERENCES Capacitador (`documento`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
ENGINE = InnoDB;

/**********************************************
	TABLA ASIGNACION TEMA A MODULO
/**********************************************/
CREATE TABLE AsigTema(
	idAsigTema INT(10) auto_increment NOT NULL,
	idModulo int (10) default null,
	idTema INT(10) default null ,
    PRIMARY KEY (`idAsigTema`),
    INDEX `fk_AsigTema_idModulo1_idx` (`idModulo` ASC),
	CONSTRAINT `fk_AsigTema_idModulo1`
	FOREIGN KEY (`idModulo`)
	REFERENCES Modulo (`idModulo`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
	INDEX `fk_AsigTema_idTema1_idx` (`idTema` ASC),
	CONSTRAINT `fk_AsigTema_idTema1`
	FOREIGN KEY (`idTema`)
	REFERENCES Tema (`idTema`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
ENGINE = InnoDB;

/**********************************************
	TABLA EVALUACION EMPLEADO
/**********************************************/
CREATE TABLE evaluacion(
  `idEvaluacion` INT(10) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL DEFAULT NULL,
  `observaciones` VARCHAR(100) NULL DEFAULT NULL,
  `calificacion` INT(10) NOT NULL,
  `visibilidad` TINYINT(1) NOT NULL,
   idAsigEmpleado INT(10) NOT NULL,
   idAsigModulo INT(10) NOT NULL,
   visibilidad TINYINT(1)  NOT NULL, 
  PRIMARY KEY (`idEvaluacion`),
  INDEX `fk_evaluacion_idAsigEmpleado1_idx` (`idAsigEmpleado` ASC),
  INDEX `fk_evaluacion_asigmodulo1_idx` (`idAsigModulo` ASC),
  CONSTRAINT `fk_evaluacion_idAsigEmpleado1`
    FOREIGN KEY (`idAsigEmpleado`)
    REFERENCES asigempleado (`idAsigEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_asigmodulo1`
    FOREIGN KEY (idAsigModulo)
    REFERENCES asigmodulo (`idAsigModulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


/****************************************************
VISTA QUE CARGA EMPLEADOS
***************************************************/

CREATE VIEW `cargarempleado` AS
    SELECT 
        `empleado`.`nombreCompleto` AS `nombreCompleto`,
        `empleado`.`documento` AS `documento`,
        `empleado`.`telefono` AS `telefono`,
        `empleado`.`correoElectronico` AS `correoElectronico`,
        `contrato`.`fechaInicioLaboral` AS `fechaInicioLaboral`,
        `contrato`.`fechaTerminacionContrato` AS `fechaTerminacionContrato`,
        `contrato`.`empresa` AS `empresa`,
        `contrato`.`numContrato` AS `numContrato`,
        `tipocontrato`.`nombre` AS `Tipocontrato`,
        tipocontrato.idtipoContrato AS idTipoCon,
        departamento.idDepartamento AS idDep,
        `departamento`.`area` AS `area`,
        `tiponivelescolar`.`nombre` AS `nivelEscolar`,
        tiponivelescolar.idtipoNivelEscolar AS idTipoNiv
    FROM
        ((((`empleado`
        JOIN `contrato` ON ((`empleado`.`Contrato_idContrato` = `contrato`.`idContrato`)))
        JOIN `departamento` ON ((`departamento`.`idDepartamento` = `empleado`.`Departamento_idDepartamento`)))
        JOIN `tiponivelescolar` ON ((`tiponivelescolar`.`idtipoNivelEscolar` = `empleado`.`TipoNivelEscolar_idtipoNivelEscolar`)))
        JOIN `tipocontrato` ON ((`tipocontrato`.`idtipoContrato` = `contrato`.`tipoContrato_idtipoContrato`)))
    WHERE
        (`empleado`.`visibilidad` = '1')
    ORDER BY `empleado`.`nombreCompleto`;
    
select * from cargarempleado;
    
    /*****************************************************
    VISTA QUE CARGA MODULOS POR PROGRAMAR
    ******************************************************/

CREATE VIEW `modulosprogramacion` AS
    SELECT 
        `m`.`nombreModulo` AS `nombreModulo`,
        `m`.`idModulo` AS `idModulo`,
        `a`.`idProgramacion` AS `idProgramacion`
    FROM
        (`modulo` `m`
        JOIN `asigmodulo` `a` ON ((`a`.`idModulo` = `m`.`idModulo`)));




select * from modulosprogramacion;







	
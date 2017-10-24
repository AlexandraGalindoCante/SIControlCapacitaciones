<?php
include("../models/Datos.php");
include("../models/Modulo.php");


class controladorModulo{


private $model;


	public function registrar(){
		$model = new Modulo($_REQUEST['nombreMod'],$_REQUEST['frecuencia']+0,$_REQUEST['descripcion']);
		var_dump($model);
		$model->crearModulo();
	}
	public function modificar(){
		$model = new Modulo($_REQUEST['idModulo'],$_REQUEST['nombreModulo'],$_REQUEST['frecuencia'],$_REQUEST['descripcion']);
		var_dump($model);
		echo $_REQUEST['idModulo'];
		$model->modificarModulo();
	}
	public function inhabilitar(){
		$model = new Modulo($_REQUEST['idModulo']);
		var_dump($model);
		$model->eliminarModulo();
	}


	public function consultarAlertaModulo(){
		$model = new Modulo;
		$consulta = $model->consultarAlerta();
		return $consulta;
	}






}


	$controlador = new controladorModulo;
	$funcion = null;


	if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1){
	$funcion = 'registrar';
	header('Location:../view/gestionModulo.php');

	}elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2){
	$funcion = 'modificar';
	echo "paso a la funcion";
	header('Location:../view/gestionModulo.php');
	
	
	}
	elseif(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==3){
	$funcion = 'inhabilitar';
	header('Location:../view/gestionModulo.php');
	}
	if(method_exists($controlador, $funcion)){


	call_user_func(array($controlador, $funcion));
	}



?>
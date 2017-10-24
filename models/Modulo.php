<?php



class Modulo{


	private $idModulo;
	private $nombreModulo;
	private $frecuencia;
	private $descripcion;

	public function Modulo(){
	$parametros=func_get_args();
	$cantidad=func_num_args();
	$funcionConstructor= '_constructor'.$cantidad;

	if (method_exists($this, $funcionConstructor))
	{
		call_user_func_array(array($this,$funcionConstructor), $parametros);
	}
	}

	public function getId(){

		return $this->idModulo;
	}

	public function _constructor1($idModulo){

		 $this->idModulo=$idModulo;
	}

	public function _constructor3($nombreModulo,$frecuencia,$descripcion){
		$this->nombreModulo=$nombreModulo;
		$this->frecuencia=$frecuencia;
		$this->descripcion=$descripcion;

	}

	public function _constructor4($idModulo,$nombreModulo,$frecuencia,$descripcion){
		$this->idModulo=$idModulo;
		$this->nombreModulo=$nombreModulo;
		$this->frecuencia=$frecuencia;
		$this->descripcion=$descripcion;
	}


	public function crearModulo(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL crearModulo('$this->nombreModulo','$this->frecuencia','$this->descripcion')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}
	
public function modificarModulo(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL modificarModulo('$this->idModulo','$this->nombreModulo','$this->frecuencia','$this->descripcion')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}

	public function eliminarModulo(){

		$datos = new Datos();
		$mysql = $datos->conectar();
		$mysql->query("CALL elimModulo('$this->idModulo')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);
	}

	public function consultarAlerta(){
		$datos = new Datos();
		$mysql = $datos->conectar();
		$consulta=mysqli_query($mysql,"Select * from alerta_Mod");
		$mysql = $datos->Desconectar($mysql);
		return $consulta;
	}


}

?>
<?php
	
	if(isset($_REQUEST['funcion'])){
			session_start();
		switch ($_REQUEST['funcion']) {
			case 1:
			echo $_SESSION['idProgramacion'];
				$_SESSION['idProgramacion'] = $_REQUEST['idProgramacion'];
				$_SESSION['tpCap'] = $_REQUEST['tpCap'];
				$_SESSION['fechaIn'] = $_REQUEST['fechaIn'];
				header('Location: ../view/asignarEmpleados.php');
				break;
			case 2:
				$_SESSION['idProgramacion'] = $_REQUEST['idProgramacion'];
				header('Location: ../view/gestionEvaluacion.php');
				break;
				
			default:
				
				break;
		}
	}




	
?>
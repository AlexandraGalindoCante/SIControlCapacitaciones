<?php
session_start();
include ('libreriaSCC.php'); 
include ('../view/modals/md_cambiarContrasena.php');

if ($_SESSION['sesion']== 0 or  $_SESSION['idRol'] != 1){
  header('Location: ../index.php' );
}

include_once("../models/Datos.php");

$db = new Datos();
$mysql= $db->conectar();
$contar=$mysql->query("select count(*) as cuenta from programacion where visibilidad = '1'") or die($mysql->error);
$conteoDoc = $contar->fetch_array(MYSQLI_NUM);
$cantRegistros = $conteoDoc[0];
$registro=$mysql->query("select idProgramacion,fechaInicio, fechaFin, tipoCapacitacion,color,nivel From programacion WHERE visibilidad='1'") or die($mysql->error);
$i = 0;
while($vector=$registro->fetch_array()){
  $id[$i]= $vector['idProgramacion'];
  $titulo[$i]= $vector['nivel'];
  $inicio[$i]=$vector['fechaInicio'];
  $fin[$i]= $vector ['fechaFin'];
  $color[$i]= $vector ['color'];
  $nivel[$i]= $vector ['nivel'];
  $i++;
}

$mysql->close();

?>

<!DOCTYPE>
<html>

<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
  
 
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery.min-1-11-0.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src='build/js/moment.min.js'></script>
   
    <link href="build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="build/js/bootstrap-datetimepicker.min.js"></script>


</head>

<body>
    
                                            <div class="container">
                                                <div class="row">
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker1'>
                                                                <input type='text' class="form-control" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(function () {
                                                            $('#datetimepicker1').datetimepicker();
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                      


</body>

</html>
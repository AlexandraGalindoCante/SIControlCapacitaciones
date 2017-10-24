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
   $hora[$i]= $vector['hora'];
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
    <link rel="stylesheet" href="../css/custom.css"></link>
    <link href='build/css/fullcalendar.css' rel='stylesheet' />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet"></link>
    <link rel="shortcut icon" href="../imagenes/favicon.ico"></link>
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css"></link>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"></link>
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link href='build/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <script src='build/js/moment.min.js'></script>
    <script src='build/js/jquery.min.js'></script>
    <script src='build/css/fullcalendar.css'></script>
    <script src='build/js/fullcalendar.min.js'></script>
    <script src='build/js/es.js'></script>
    <link href="build/css/jquery.timepicker.min.css" rel="stylesheet">
    <script src="build/js/jquery.timepicker.min.js"></script>

    <script type="text/javascript">
        function cargarId(idProg) {
            document.getElementById("id").value = idProg;
        }
    </script>

    <script>
        $(document).ready(function() {
            <?php
            $array_id = json_encode($id);
            $array_inicio = json_encode($inicio);
            $array_titulo = json_encode($titulo);
            $array_hora = json_encode($hora);
            $array_fin = json_encode($fin);
            $array_color = json_encode($color);
            $array_nivel = json_encode($nivel);

            echo "var id= ". $array_id . ";\n";

            echo "var id= ". $array_id . ";\n";
            echo "var inicio= ". $array_inicio . ";\n";
            echo "var titulo= ". $array_titulo . ";\n";
            echo "var fin= ". $array_fin . ";\n";
            echo "var color= ". $array_color . ";\n";
            echo "var nivel= ". $array_nivel . ";\n";

            ?>

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },

                eventClick: function(event, jsEvent, view) {
                    $('#modal-title').html(event.color);
                    $('#modal-body').html(event.color);
                    $('#fecha').html(moment(event.fin).format('MMM DD h:mm A'));
                    $('#eventUrl').attr('href', event.url);
                    $('#verProgramacion').modal();
                },

                editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end) {

                        $('#crearProgramacion #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                        $('#crearProgramacion #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                        $('#crearProgramacion').modal('show');
                    },
                    eventRender: function(event, element) {
                        element.bind('dblclick', function() {
                            $('#ModalEdit #id').val(event.id);
                            $('#ModalEdit #title').val(event.title);
                            $('#ModalEdit #color').val(event.color);
                            $('#ModalEdit').modal('show');
                        });
                    },
                    eventDrop: function(event, delta, revertFunc) { // si changement de position

                        edit(event);

                    },
                    eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                        edit(event);

                    },
                    events: [

                    

                    <?php
                    for ($i = 0; $i < $cantRegistros; $i++){
                        echo "{ start: inicio[".$i."],  end: fin[".$i."], title: titulo[".$i."],color: color[".$i."]}";
                        if ($i+1 != $cantRegistros){
                            echo ",";
                        }
                    }
                    ?>

                    ]
                });

        });
    </script>

</head>

<body>
    <?php
    include ('../view/modals/md_inhabilitarProgramacion.php');
    ?>

    <div class="page">
        <!-- Main Navbar-->
        <header class="header">
            <nav class="navbar">
                <!-- Search Box-->
                <div class="search-box">
                    <button class="dismiss"><i class="icon-close"></i></button>
                    <form id="searchForm" action="#" role="search">
                        <input type="text" placeholder="Buscar..." class="form-control">
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="navbar-holder d-flex align-items-center justify-content-between">
                        <!-- Navbar Header-->
                        <div class="navbar-header">
                            <!-- Navbar Brand -->
                            <a href="gestionCapacitacion.php" class="navbar-brand">
                                <div class="brand-text brand-big hidden-lg-down"><span> SCC </span><strong> Sistema control de capacitaciones</strong></div>
                                <div class="brand-text brand-small"><strong>SCC</strong></div>
                            </a>
                            <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                        </div>
                        <!-- Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                            <!-- Search-->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                            <!-- Notifications-->
                            <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item">
                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                                                <div class="notification-time"><small>4 minutes ago</small></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item">
                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                                <div class="notification-time"><small>4 minutes ago</small></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item">
                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                                                <div class="notification-time"><small>4 minutes ago</small></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item">
                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                                                <div class="notification-time"><small>10 minutes ago</small></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Logout    -->
                            <li class="nav-item"><a href="../index.php" class="nav-link logout">Cerrar sesion<i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-content d-flex align-items-stretch">
            <!-- Side Navbar -->
            <nav class="side-navbar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                    <div class="avatar"><img src="../imagenes/user1.png" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                        <h1 class="h4"><?php echo $_SESSION['nombreUsuario'];?></h1>
                        <p>
                            <?php echo $_SESSION['rol'];?>
                        </p>
                        <h6 style="width: 100%; text-decoration-style:underline;">   
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modContrasena" >
                           Cambiar contraseña
                       </button>
                   </h6>
               </div>
           </div>
           <span class="heading"><center> BIENVENIDO</center></span>
           <ul class="list-unstyled">
            <li>
                <a href="../view/inicio.php"> <i class="fa fa-dashboard" aria-hidden="true"></i>&nbsp;Inicio</a>
            </li>

            <li class="active">
                <a href="selectable.php"> <i class="icon-bill"></i>Calendario</a>
            </li>
            <li>
                <a href="#cronograma" aria-expanded="false" data-toggle="collapse"> <i class="icon-clock"></i>Cronograma</a>
                <ul id="cronograma" class="collapse list-unstyled">
                    <li>
                        <a href="../view/cronograma1.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Cronograma empleados</a>
                    </li>
                    <li>
                        <a href="../view/cronograma.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Cronograma módulos</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#empleados" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>&nbsp; Gestión empleado</a>
                <ul id="empleados" class="collapse list-unstyled">
                    <li><a href="../view/gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation" aria-hidden="true"></i> &nbsp;Gestión capacitación&nbsp;</a>
                <ul id="capacitaciones" class="collapse list-unstyled">
                    <li>
                        <a href="../view/verCapacitaciones.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones</a>
                    </li>
                    <li>
                        <a href="../view/gestionCapacitacion.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones proximas</a>
                    </li>
                </ul>
            </li>

        </ul>

        <ul class="list-unstyled">
            <li>
                <a href="../view/gestionModulo.php"><i class="icon-interface-windows" aria-hidden="true" ></i>Módulos</a>
            </li>
            <li>
                <a href="../view/gestionTemas.php"><i class="fa fa-object-ungroup" aria-hidden="true" style="font-size: 18px;"></i>Temas</a>
            </li>
            <li>
                <a href="../view/gestionCapacitador.php"><i class="fa fa-user-secret" aria-hidden="true" style="font-size: 18px;"></i>Capacitadores</a>
            </li>

        </ul>

        <span class="heading"></span>
        <ul class="list-unstyled">

            <li>
                <a href="../view/empleadosReprobados.php"> <i class="icon-page"></i>Evaluacion</a>
            </li>
            <li>
                <a href="../view/informeCapEmpleado.php"> <i class="icon-page"></i>Informes</a>
            </li>
            <li>
                <a href="../view/gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
            </li>

        </ul>
    </nav>
    <section style="width: 100%; height: 130%;background:#fafafa;">

        <div class="container" style="padding-top: 35px; padding-bottom: 40px;">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><i class="fa fa-calendar"></i> Calendario de Programaciones</h1>

                    <p class="lead">Capacitaciones para este periodo</p>

                    <?php
                    if (isset($_GET['msj'])) {
                        ?>
                        <div class="alert alert-info" role="alert"><strong><?php echo $msj= $_GET['msj'] ?></strong></div>
                        <?php }
                        ?>
                        <div class='text-left' style="padding-top: 40px;padding-bottom:40px;">
                            <button class="btn btn-success btn-md" data-toggle="modal" data-target="#modContrasena">
                                <i class="fa fa-edit"></i></button>

                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#eliminarProgramacion"><i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div id="calendar" class="col-centered"> </div>
                        </div>
                    </div>

                </div>

                <div class="modal fade" id="crearProgramacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="padding-top: 45px; padding-bottom: 100px; padding:10px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Programar capacitación</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="datos_ajax_register">
                                        <form method="POST" id="crearProgramacion" name="crearProgramacion" action="../controller/controladorProgramacion.php">
                                            <div class="form-group">
                                                <label>Fecha inicio:</label>

                                                <input class="form-control" id="start" name="start" required="" type="date">

                                            </div>
                                          
                                            <div class="form-group">
                                                <label>Fecha fin:</label>
                                                <span class="inpu-group-addon">
                                                  <span class="glyphicon glyphicon-calendar"></span>
                                              </span>

                                              <input class="form-control" name="end" id="end" required type="date">
                                          </div>
                                          <div class="form-group">
                                                <label>Hora:</label>
                                                <span class="inpu-group-addon">
                                                  <span class="fa fa-clock"></span>
                                              </span>

                                              <input class="form-control" name="hora" id="hora" required type="time">
                                          </div>
                                          <div class="form-group">
                                            <label>Tipo capacitación:</label>
                                            <select class="form-control" id="tipoCap" name="tipoCap" required>
                                                <option value="">Seleccione tipo de capacitación</option>
                                                <?php
                                                $tipoCap = array("INDUCTIVA","PREVENTIVA","CORRECTIVA","DESARROLLO DE LA CARRERA");
                                                $i = 0;
                                                while($i < count($tipoCap)){
                                                 echo "<option value=\"".$tipoCap[$i]."\">".$tipoCap[$i]."</option>"; 
                                                 $i++;
                                             }
                                             ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                        <label>Modalidad:</label>
                                        <select class="form-control" id="modalidad" name="modalidad" required>
                                            <option value="">Seleccione modalidad</option>
                                            <?php
                                            $modalidad = array("FORMACION","ACTUALIZACION","ESPECIALIZACION","PERFECCIONAMIENTO");
                                            $i = 0;
                                            while($i < count($modalidad)){
                                             echo "<option value=\"".$modalidad[$i]."\">".$modalidad[$i]."</option>"; 
                                             $i++;
                                         }
                                         ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Nivel:</label>
                                    <select class="form-control" id="nivel" name="nivel" required>
                                        <option value="">Seleccione nivel </option>
                                        <?php
                                        $nivel= array("NIVEL BASICO","NIVEL INTERMEDIO","NIVEL AVANZADO");
                                        $i = 0;
                                        while($i < count($modalidad)){
                                          echo "<option value=\"".$nivel[$i]."\">".$nivel[$i]."</option>"; 
                                          $i++;
                                      }
                                      ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">Color:</label>

                                <select name="color" class="form-control" id="color">
                                    <option value="">Seleccione</option>
                                    <option style="color:#1D6CD4;" value="#1D6CD4">&#10687; Azul</option>
                                    <option style="color:#40E0D0;" value="#40E0D0"> &#10687; Turquesa</option>
                                    <option style="color:#12BA60;" value="#12BA60">&#10687; Verde</option>
                                    <option style="color:#5858FA;" value="#5858FA">&#10687; Morado</option>
                                    <option style="color:#B4045F;" value="#B4045F">&#10687; Fucsia</option>
                                    <option style="color:#FF8C00;" value="#FF8C00">&#10687; Naranja</option>
                                    <option style="color:#FE2E2E;" value="#FE2E2E">&#10687; Rojo</option>

                                </select>

                            </div>
                            <br>
                            <br>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="funcion" id="funcion" value="0">Guardar cambios</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="verProgramacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="padding-top: 45px; padding-bottom: 100px; padding:10px;">
        <div class="modal-content" role="document">
            <div class="modal-header">

                <h5 id="modalTitle" class="modal-title"><i class="fa fa-calendar"></i> Detalles de la programación</h5>
                <input type="text" name="id" id="id">

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">x</span></button>
            </div>
            <div class="modal-body" id="modal-body"></div>

            <div class="modal-footer">
                <button class="btn btn-info btn-md" data-toggle="modal">
                    <a href="../view/programacion.php" onclick="cargarId();"> <i class="fa fa-eye"></i> Ver más</a>
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<div id="eliminarProgramacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="padding-top: 45px; padding-bottom: 100px; padding:10px;">
        <div class="modal-content" role="document">
            <div class="modal-header">

                <h4 id="modalTitle" class="modal-title"><i class="fa fa-trash"></i> Eliminar programación</h4>

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">x</span></button>
            </div>
            <div class="modal-body" id="modal-body">
                <?php
                $con = conectar();
                if(!$con){
                  die("imposible conectarse: ".mysqli_error($con));
              }
              if (@mysqli_connect_errno()) {
                  die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
              }
              $mysql=mysqli_query($con,"set names 'utf8'");
              $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM programacion where visibilidad =1");
              if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

              $query=mysqli_query($con,"SELECT idProgramacion,modalidad,tipoCapacitacion,fechaInicio,fechaFin,nivel FROM programacion where  visibilidad ='1' ORDER BY tipoCapacitacion") 
              or die(mysql_error());

              if ($numrows>0){
                  ?>

                  <div>
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>Modalidad</th>
                                <th>Nivel</th>
                                <th>tipoCapacitacion</th>
                                <th>fechaInicio</th>
                                <th>fechaFin</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['modalidad'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['nivel'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['tipoCapacitacion'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['fechaInicio'];?>
                                    </td>
                                    <td>
                                        <?php echo $row['fechaFin'];?>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#md_inhabilitarProgramacion"><i class="fa fa-trash"></i></button>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php

                } else {
                  ?>
                  <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>¡Aviso!</h4> No hay temas para mostrar.
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>
</div>
</div>

</div>
</div>

</section>
</div>

<footer class="main-footer">
    <div class="container-fluid">
        <div class="text-center" style="text-align: center;">
            <p>SISTEMA CONTROL DE CAPACITACIONES | GF Cobranzas juridicas-CyCP &copy; 2017</p>
        </div>

    </div>
</footer>
</div>

<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="../js/jquery.cookie.js">
</script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script>
<!-- panel admin responsivo-->
<script src="../js/app.js"></script>
<script>
    $(document).ready(function() {

        $('.star').on('click', function() {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function() {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function() {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });

    });
</script>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "pagingType": "numbers",
            "lengthChange": false,
            "pageLength": 6,
            "language": {
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "zeroRecords": "No se encontro ningun registro",
                "search": "Buscar: ",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "infoFiltered": "(Filtrado de _MAX_ registros totales)"
            }

        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: new Date(),
            editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        selectable: true,
                        selectHelper: true,
                        select: function(start, end) {

                            $('#crearProgramacion #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                            $('#crearProgramacion #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                            $('#crearProgramacion').modal('show');
                        },
                        eventRender: function(event, element) {
                            element.bind('dblclick', function() {
                                $('#ModalEdit #id').val(event.id);
                                $('#ModalEdit #title').val(event.nivel);
                                $('#ModalEdit #color').val(event.color);
                                $('#ModalEdit').modal('show');
                            });
                        },
                        eventDrop: function(event, delta, revertFunc) { // si changement de position

                            edit(event);

                        },
                        eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                            edit(event);

                        },
                        events: [
                        <?php foreach($events as $event): 

                        $start = explode(" ", $event['fechaInicio']);
                        $end = explode(" ", $event['fechaFin']);
                        if($start[1] == '00:00:00'){
                            $start = $start[0];
                        }else{
                            $start = $event['fechaInicio'];
                        }
                        if($end[1] == '00:00:00'){
                            $end = $end[0];
                        }else{
                            $end = $event['fechaFin'];
                        }
                        ?> {
                            id: '<?php echo $event['
                            idProgramacion ']; ?>',
                            capacitacion: '<?php echo $event['
                            tipoCapacitacion ']; ?>',
                            start: '<?php echo $start; ?>',
                            end: '<?php echo $end; ?>',
                            modalidad: '<?php echo $event['
                            modalidad ']; ?>',
                            nivel: '<?php echo $event['
                            nivel ']; ?>',
                            color: '<?php echo $event['
                            color ']; ?>',
                        },
                        <?php endforeach; ?>
                        ]
                    });

        function edit(event) {
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if (event.end) {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            } else {
                end = start;
            }

            id = event.id;

            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;

            $.ajax({
                url: 'editEventDate.php',
                type: "POST",
                data: {
                    Event: Event
                },
                success: function(rep) {
                    if (rep == 'OK') {
                        alert('Saved');
                    } else {
                        alert('Could not be saved. try again.');
                    }
                }
            });
        }

    });
</script>
<script type="text/javascript">
    function load() {
        $("#loadProgramacion").fadeIn('slow');
        $.ajax({
            url: '../view/consulta/cargarProgramacion.php',
            data: parametros,
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');
                $("#loadProgramacion").html("");
            }
        })
    }
</script>
<script type="text/javascript">
    $('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '5:00pm',
    defaultTime: '07:00 am',
    startTime: '07:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
</script>


</body>

</html>
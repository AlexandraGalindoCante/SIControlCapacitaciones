<?php
session_start();
include ('libreriaSCC.php'); 

if ($_SESSION['sesion']== 0 or  $_SESSION['idRol'] != 1){
  header('Location: ../index.php' );
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SCC</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</link>
<link rel="stylesheet" href="../css/custom.css">
</link>
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
</link>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
</link>
<link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet">
</link>
<link rel="shortcut icon" href="../imagenes/favicon.ico">
</link>  <script src="https://use.fontawesome.com/99347ac47f.js"></script>
<link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
</link>
<script src="../js/app.js"></script>
<script type="text/javascript">
  function cargarId(idA) {
    document.getElementById("idAsignacionEmpleado").value=idA;
  }
</script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</head>
<body>
  <?php
  include('modals/md_elimAsignacionEmp.php');
  include('modals/md_cambiarContrasena.php');
  ?>
  <div class="page form-page">
    <header class="header">
      <nav class="navbar">
        <div class="search-box">
          <button class="dismiss"><i class="icon-close"></i></button>
          <form id="searchForm" action="#" role="search">
            <input type="text" placeholder="Buscar..." class="form-control">
          </form>
        </div>
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header">
              <a href="gestionCapacitacion.php" class="navbar-brand">
                <div class="brand-text brand-big hidden-lg-down"><span> SCC </span><strong> Sistema control de capacitaciones</strong></div>
                <div class="brand-text brand-small"><strong>SCC</strong></div>
              </a>
              <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Search-->
              <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
              <!-- Notifications-->
              <li class="nav-item dropdown">
                <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                  <i class="fa fa-bell-o"></i><span class="badge bg-red">12</span>
                </a>
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
                  <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"><strong>view all notifications                                            </strong>   </a>
                  </li>
                </ul>
              </li>
              <!-- Logout    -->
              <li class="nav-item">
                <a href="consulta/cerrarSesion.php" class="nav-link logout">Cerrar sesion<i class="fa fa-sign-out"></i></a>
              </li>
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
         <p><?php echo $_SESSION['rol'];?></p>
         <h6  style="width: 100%; text-decoration-style:underline;">   
          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modContrasena" >
           Cambiar contraseña
         </button>
       </h6>
     </div>
   </div>
   <span class="heading"><center> BIENVENIDO</center></span>
   <ul class="list-unstyled">
     <li>
       <a href="inicio.php"> <i class="fa fa-dashboard" aria-hidden="true"></i>&nbsp;Inicio</a>
     </li>
     <li>
      <li> <a href="../calendar/agenda.php"> <i class="icon-bill"></i>Calendario</a>
      </li>
      <a href="#cronograma" aria-expanded="false" data-toggle="collapse"> <i class="icon-clock"></i>Cronograma</a>
      <ul id="cronograma" class="collapse list-unstyled">
        <li>
          <a href="cronograma1.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Cronograma empleados</a>
        </li>
        <li>
          <a href="cronograma.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Cronograma módulos</a>
        </li>

      </ul>
    </li>
    <li>
      <a href="#empleados" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>&nbsp; Gestión empleado</a>
      <ul id="empleados" class="collapse list-unstyled">
        <li><a href="gestionEmpleado.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>Empleados</a>
        </li>

      </ul>
    </li>
    <li>
      <a class="active" href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation" aria-hidden="true" ></i> &nbsp;Gestión capacitación&nbsp;</a>
      <ul id="capacitaciones" class="collapse list-unstyled">
       <li>
        <a href="verCapacitaciones.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones</a>
      </li>
      <li>
        <a href="gestionCapacitacion.php"><i class="fa fa-circle" aria-hidden="true" style="font-size: 6px;"></i>&nbsp;Capacitaciones proximas</a>
      </li>
    </ul>
  </li>


</ul>

<ul class="list-unstyled"> 
  <li>
   <a href="gestionModulo.php"><i class="icon-interface-windows" aria-hidden="true" ></i>Módulos</a>
 </li>
 <li>
   <a href="gestionTemas.php"><i class="fa fa-object-ungroup" aria-hidden="true" style="font-size: 18px;"></i>Temas</a>
 </li>
 <li>
   <a href="gestionCapacitador.php"><i class="fa fa-user-secret" aria-hidden="true" style="font-size: 18px;"></i>Capacitadores</a>
 </li>

</ul>



<span class="heading"></span>
<ul class="list-unstyled"> 

  <li> <a href="empleadosReprobados.php"> <i class="icon-page"></i>Evaluacion</a>
  </li>
  <li> <a href="informeCapEmpleado.php"> <i class="icon-page"></i>Informes</a>
  </li>
  <li>
    <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
  </li>

</ul>
</nav>
<div class="content-inner" style="height: 800px; background-color: white;">
 <header class="page-header">
  <div class="container-fluid">
   <h2 class="no-margin-bottom"><i class="fa fa-users"></i> Empleados</h2>
 </div>
</header>
<ul class="breadcrumb">
 <div class="container-fluid">
   <li class="breadcrumb-item">&nbsp;&nbsp;<i class="fa fa-home"></i> <a href="inicio.php">Inicio</a></li>
   <li class="breadcrumb-item active">Asignar empleados</li>
 </div>
</ul>
<section>


  <div style="display:none;"  id="alert" class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Acción exitosa! </strong>El empleado ha sido asignado.
  </div>

  <div  id="container-fluid" >
    <div class="col-xs-12 col-sm-12 col-md-12">
      <?php
      $con = conectar();
      if(!$con){
       die("imposible conectarse: ".mysqli_error($con));
     }
     if (@mysqli_connect_errno()) {
       die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
     }

     $count_query   = mysqli_query($con, "SELECT count(*) as numrows from asigEmpleado as asEmp 
       right join empleado as emp on documento = idEmpleado 
       where emp.documento 
       not in (select idEmpleado from asigEmpleado where idProgramacion = '$_SESSION[idProgramacion]') ");


     $contador= mysqli_query($con,"SELECT  count(*) as num from programacion where idProgramacion='$_SESSION[idProgramacion]'" );
     $consulta=mysqli_query($con,"SELECT idProgramacion,nivel from programacion where idProgramacion='$_SESSION[idProgramacion]'");
     if ($row= mysqli_fetch_array($contador)){$num = $row['num'];}
     $registro=mysqli_fetch_array($consulta);

     if($registro['nivel']=="NIVEL BASICO"){
      $query = mysqli_query($con,"SELECT DISTINCT emp.nombreCompleto,emp.documento,dep.area,emp.visibilidad from asigEmpleado as asEmp
        right join empNivelBasico as emp on documento=idEmpleado
        inner join departamento as dep on  dep.area=emp.area
        where emp.documento NOT IN (SELECT idEmpleado FROM asigEmpleado WHERE idProgramacion = '$_SESSION[idProgramacion]') AND  emp.visibilidad='1' order by area asc;");

    }elseif ($registro['nivel']=="NIVEL INTERMEDIO") {
      $query = mysqli_query($con,"SELECT DISTINCT emp.nombreCompleto,emp.documento,dep.area,emp.visibilidad from asigEmpleado as asEmp
        right join empNivelintermedio as emp on documento=idEmpleado
        inner join departamento as dep on  dep.area=emp.area
        where emp.documento NOT IN (SELECT idEmpleado FROM asigEmpleado WHERE idProgramacion = '$_SESSION[idProgramacion]'
      ) AND  emp.visibilidad='1' order by area asc;");                                   

    }else{
     $query = mysqli_query($con,"SELECT DISTINCT emp.nombreCompleto,emp.documento,dep.area,emp.visibilidad from asigEmpleado as asEmp
      right join empNivelAvanzado as emp on documento=idEmpleado
      inner join departamento as dep on  dep.area=emp.area
      where emp.documento NOT IN (SELECT idEmpleado FROM asigEmpleado WHERE idProgramacion = '$_SESSION[idProgramacion]'
    ) AND  emp.visibilidad='1' order by area asc;"); 

   }

   if($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

   if($numrows>0){
     ?>
     <div class="row" style="background-color: white">
      <div class="col-xs-9 col-sm-12 col-md-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_a" data-toggle="tab">Lista empleados </a></li>
          <li><a href="#tab_b" data-toggle="tab">Asignaciones</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_a">
            <div  id="containerT">
              <div class="col-xs-9 col-sm-12 col-md-12">
                <table class="table table-hover" id="tabla">
                  <thead class="thead-inverse" title="Area">
                    <tr>
                      <th>Documento de identidad</th>
                      <th>Nombre</th>
                      <th>Cargo</th>
                      <th style="text-align: center;">Asignar a capacitación</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while($row = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <form id="md_asigEmpleado" name="md_asigEmpleado" action="../controller/controladorAsigEmpleado.php" method="post">
                          <td><?php echo $row['documento'];?></td>
                          <td><?php echo $row['nombreCompleto'];?></td>
                          <td><?php echo $row['area'];?></td>
                          <input type="hidden" name="idProgramacion" value="<?php echo $_SESSION['idProgramacion'] ?>">
                          <input type="hidden" name="idEmpleado" value="<?php echo $row['documento'] ?>">
                          <td>
                            <center><button  type="submit" name="funcion" value="1"   ><img src="../imagenes/id.png" style="height: 40px;width: 40px;"></button></center>
                          </td>
                        </form>
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
                  <button type="button" >&times;</button>
                  <h4>Aviso!!!</h4>
                  No hay datos para mostrar
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tab_b">
          <div  id="containerT" style="background-color: white; height: 100%;">
            <div class="col-xs-9 col-sm-12 col-md-12">
              <div  id="container">
                <div class="col-xs-9 col-sm-12 col-md-12">
                  <h2 class="no-margin-bottom">
                    Capacitación: 
                    <h4><?php echo  $_SESSION['tpCap']?></h4>
                    <?php echo $_SESSION['fechaIn']?>
                  </h2>
                  <br>
                  <div>
                    <?php
                    $con = conectar();
                    if(!$con){
                     die("imposible conectarse: ".mysqli_error($con));
                   }
                   if (@mysqli_connect_errno()) {
                     die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
                   }

                   $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM asigEmpleado as asEmp
                    inner join empleado as emp on documento=idEmpleado
                    inner join departamento as dep on  idDepartamento=Departamento_idDepartamento 
                    inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
                    where asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1'");
                   if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

                   $query = mysqli_query($con,"
                    SELECT DISTINCT emp.nombreCompleto,emp.documento,dep.area,asEmp.idAsigEmpleado from asigEmpleado as asEmp
                    inner join empleado as emp on documento=idEmpleado
                    inner join departamento as dep on  idDepartamento=Departamento_idDepartamento 
                    inner join programacion as p on p.idProgramacion=asEmp.idprogramacion 
                    WHERE asEmp.idProgramacion='$_SESSION[idProgramacion]' AND emp.visibilidad='1'");

                   if ($numrows>0){
                    ?>
                    <table class="table table-hover" id="tabla1">
                      <thead class="thead-inverse" title="Area">
                        <tr>
                          <th>Documento de identidad</th>
                          <th>Nombre</th>
                          <th>Cargo</th>
                          <center>
                            <th>Eliminar asignación</th>
                          </center>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($row = mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td><?php echo $row['documento'];?></td>
                            <td><?php echo $row['nombreCompleto'];?></td>
                            <td><?php echo $row['area'];?></td>
                            <td>
                              <center><button type="button" class="btn btn-danger"  class="close" data-dismiss="modal" aria-hidden="true"  data-toggle="modal"  data-target="#elimAsignacion" data-id="<?php echo $row['idAsigEmpleado'] ?>" > <i  class="fa fa-trash"></i></button>
                              </center>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                  }else {
                    ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4>Aviso!!!</h4>
                      No hay datos para mostrar.
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
    </div>
  </div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
<footer class="main-footer">
  <div class="container-fluid">
    <div class="text-center" style="text-align: center;">
      <p>SISTEMA CONTROL DE CAPACITACIONES | GF Cobranzas juridicas-CyCP &copy; 2017</p>
    </div>
  </div>
</footer>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Javascript files-->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.cookie.js"> </script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/front.js"></script> <!-- panel admin responsivo-->
<script src="../js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function() {
    $('#tabla').DataTable({
      "pagingType": "numbers",
      "lengthChange": false,
      "pageLength" : 6,
      "language" : {
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "zeroRecords": "No se encontro ningun registro",
        "search" : "Buscar: ",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
        "infoFiltered":   "(Filtrado de _MAX_ registros totales)"
      }
      
    });
  } );
</script>
<script type='text/javascript'>
  $(document).ready(function() {
    $('#tabla1').DataTable({
      "pagingType": "numbers",
      "lengthChange": false,
      "pageLength" : 8,
      "language" : {
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "zeroRecords": "No se encontro ningun registro",
        "search" : "Buscar: ",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
        "infoFiltered":   "(Filtrado de _MAX_ registros totales)"
      }
      
    });
  } );
</script>
<script type="text/javascript">
  function load(idProg){
    var parametros = {"action":"ajax","idProg":idProg};
    $("#loadModulo").fadeIn('slow');
    $.ajax({
      url:'consulta/cargarModuloModal.php',
      data: parametros,
      success:function(data){
        $(".outer_div").html(data).fadeIn('slow');
        $("#loadModulo").html("");
      }
    })
  }
</script>
<script type="text/javascript">
  $("button").click(function(){
    $(".fa-user").removeClass("fa-check");
    $(this).children("i").addClass("fa-check");
    $("").removeClass("btn-primary");
    $("").addClass("btn-success");
  });
</script>
<script type="text/javascript">
  $('#elimAsignacion').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#idAsigEmpleado').val(id)
    })
  </script>
  <script type="text/javascript">
    //function mostrar(){
   //document.getElementById('alert').style.display ='inherit';
//};
</script>
<script>
  function alerta(){
    var parametros = {
      "valorCaja1" : valorCaja1,
      "valorCaja2" : valorCaja2
    };
    $.ajax({
      data:  parametros,
      url:   'ejemplo_ajax_proceso.php',
      type:  'get',
      beforeSend: function () {
        $("#resultado").html("Procesando, espere por favor...");
      },
      success:  function (response) {
        $("#resultado").html(response);
      }
    });
  }
</script>






<script type="text/javascript">
 /* $(document).on('click','#bn1', function(evt){
    evt.preventDefault();
    //buscar como usar esta funcion para alerta exitosa de la asignanción.
    toastr.options.positionClass="toast-top-right";
    toastr.options.timeOut = 3500; 

    toastr.success('Empleado asignado exitosamente!');

  });
  */
</script>



</body>
</html>
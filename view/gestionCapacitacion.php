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
  <title>SCC-Control capacitación</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Custom functions file -->
<script src="js/functions.js"></script>

<script src="../js/app.js"></script>
<script type="text/javascript">
 function cargarId(idProg) {
   document.getElementById("idProgramacion").value=idProg;
 }
</script>
</head>
<body>
  <?php
  include('modals/md_crearProgramacion.php');
  include('modals/md_asignarModulo.php');
  include('modals/md_verModulos.php');
  include('modals/md_inhabilitarProgramacion.php');
  include('modals/md_modificarProgramacion.php');
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
  <a href="#capacitaciones" aria-expanded="false" data-toggle="collapse"> <i class="icon-presentation" aria-hidden="true" ></i> &nbsp;Gestión capacitación&nbsp;</a>
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
  <li class="active">
    <a href="gestionUsuario.php"> <i class="fa fa-cog" aria-hidden="true"></i>Usuario/Preferencias</a>
  </li>

</ul>
</nav>
<div class="content-inner" style="height: 800px; background-color: white;">
<br>
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">

      <?php 
      $con = conectar();
      if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
      }
      if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
      }
      $cant=mysqli_query($con,"SELECT count(*) as num FROM ver_programacionesproximas");
      if ($row= mysqli_fetch_array($cant)){$num = $row['num'];}
      ?>

      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="icon-padnote"></i></div>
          <div class="title"><span>Proximas<br>Capacitaciones</span>
            <div class="progress">
              <div role="progressbar" style="width: <?php echo $num;?>%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
            </div>
          </div>
          <div class="number"><strong><?php echo $num;?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="icon-bill"></i></div>
          <div class="title"><span>Programaciones<br>Finalizadas</span>
            <div class="progress">
              <div role="progressbar" style="width:<?php echo $num;?>%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
            </div>
          </div>
          <div class="number"><strong><?php echo $num;?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-orange"><i class="icon-check"></i></div>
          <div class="title"><span>Capacitaciones<br>por evaluar</span>
           <div class="progress">
            <?php 
            $con = conectar();
            if(!$con){
              die("imposible conectarse: ".mysqli_error($con));
            }
            if (@mysqli_connect_errno()) {
              die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
            }
            $cant=mysqli_query($con,"SELECT count(*) as num FROM programacion where estado='1' and visibilidad=1");

            if ($row= mysqli_fetch_array($cant)){$num = $row['num'];}
            ?>

            <div role="progressbar" style="width:<?php echo $num;?>%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
          </div>
        </div>
        <div class="number"><strong><p style="width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;line-height: 1.42857; background: silver;" "><?php echo $num;?></p></strong>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<br><br><br>
<section>
  <div  id="containerT">
   <div class="col-xs-9 col-sm-12 col-md-12">

    <?php

    $con = conectar();
    if(!$con){
     die("imposible conectarse: ".mysqli_error($con));
   }
   if (@mysqli_connect_errno()) {
     die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
   }
   $mysql=mysqli_query($con,"set names 'utf8'");
   $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ver_programacionesproximas");
   if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

   $query = mysqli_query($con,"SELECT  idProgramacion,fechaInicio,fechaFin,modalidad,nivel,tipoCapacitacion,fechaReg,color,estado FROM ver_programacionesproximas");

   if ($numrows>0){
     ?>
     <table class="table table-hover" id="tabla">
       <thead class="thead-inverse">
        <tr>
          <th></th>

          <th>Fechas</th>
          <th>Tipo capacitación</th>
          <th>Módalidad</th>
          <th>Nivel</th>
          <th style="text-align: center;">Estado</th>
          <th>Módulos </th>
          <th>Empleados </th>
          <th style="text-align: center;">Ver módulos</th>
          <th>Evaluación</th>
          <th>Modificar</th>


        </thead>
        <?php  
        $hoy=date("Y-m-d");
        ?>

        <tbody class="active">
          <?php
          while($row = mysqli_fetch_array($query)){
           $fecha=$row['fechaReg'];
           ?>
           <?php 
           if($fecha==$hoy){ 
            ?>
            <tr class="table.dataTable tbody td" style="background:#D9EDF7;">
             <?php 
           }
           else{ 
            ?> 
            <tr>
             <?php 
           }
           ?>

           <td><i class="fa fa-calendar" style="background-color:<?php echo $row['color'];?> "></i></td>
           <td><?php echo $row['fechaInicio'];?> A <?php echo $row['fechaFin'];?></td>
           <td><?php echo $row['tipoCapacitacion'];?></td>
           <td><?php echo $row['modalidad'];?></td>
           <td><?php echo $row['nivel'];?></td>

           <td>


            <?php if($row['estado']==2){
              ?>
              <p class="btn btn-success btn-sm">
                <?php
                echo "FINALIZADO";
                ?>

              </p>
              <?php 
            }elseif ($row['estado']==1) {
             ?>
             <p class="btn btn-warning btn-sm">
              <?PHP
              echo "EN PROCESO";
              ?>

            </p>

            <?php
          }elseif($row['estado']==0){
           ?>
           <p class="btn btn-info btn-sm">
            <?PHP
            echo "PROGRAMADO";
            ?>

          </p>
          <?php

        }else{
         ?>
         <p class="btn btn-danger btn-sm">
          <?PHP
          echo "CANCELADO";
          ?>

        </p>
        <?php

      }
      ?>


    </td>

    <td>
      <center><button type="button" style=" width: 40px;height: 40px;padding:4px 4px;border-radius: 55px;text-align: center;font-size: 16px;line-height: 1.42857;" class="btn btn-danger btn-md btn-" data-toggle="modal" data-target="#asignarModulo" onclick="cargarId(<?php echo "'".$row['idProgramacion']."'"; ?>)"  > <i class='icon-list-1' style="padding-left: 7px;"></i> &nbsp;</button>
      </center>
    </td>
    <td>
      <form action="../controller/controladorAsignarSesion.php" method="post">
       <input type="hidden" name="idProgramacion" value="<?php echo $row['idProgramacion']?>">
       <input type="hidden" name="fechaIn" value="<?php echo $row['fechaInicio']?>">
       <input type="hidden" name="tpCap" value="<?php echo $row['tipoCapacitacion']?>">
       <center><button name="funcion" value="1" type="submit" style=" width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;font-size: 16px;line-height: 1.42857;"  class="btn btn-success btn-md"> <i class='icon-user' style="padding-left: 7px;"></i> &nbsp;</button>
       </center>
     </form>
   </td>

   <td>
    <center><button type="button" class="btn btn-info btn-md" style=" width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;font-size: 16px;line-height: 1.42857;"  data-toggle="modal"  data-target="#verModulo" onclick="load(<?php echo "'".$row['idProgramacion']."'"; ?>)"><i style="padding-left: 7px;" class="fa fa-search-plus" aria-hidden="true"></i> &nbsp;
    </button>
  </center>
</td>

<td>
  <form action="../controller/controladorAsignarSesion.php" method="post">
   <input type="hidden" name="idProgramacion" value="<?php echo $row['idProgramacion']?>">
   <center>
    <button name="funcion" value="2" style=" width: 40px;height: 40px;padding: 4px;border-radius: 55px;text-align: center;font-size: 16px;line-height: 1.42857;"  type="submit" class="btn btn-primary btn-md"> <i style="padding-left: 7px;" class='fa fa-graduation-cap'></i> &nbsp;</button>
  </center>
</form>
</td>
<td>
  <center> 
    <button type="button" style=" width: 40px;height: 40px;border-radius: 55px;padding: 4px;font-size: 16px; text-align: center;line-height: 1.42857;"  class="btn btn-success btn-md" data-toggle="modal"  data-dismiss="modal"  data-target="#modificarProgramacion" data-idProgramacion="<?php echo $row['idProgramacion']?>"
     data-fechaInicio="<?php echo $row['fechaInicio']?>"
     data-fechaFin="<?php echo $row['fechaFin']?>"
     data-tipoCap="<?php echo $row['tipoCapacitacion']?>"
     data-modalidad="<?php echo $row['modalidad']?>"
     data-nivel="<?php echo $row['nivel']?>" onclick="load(<?php echo $row['idProgramacion']; ?>);">  <i style="padding-left: 7px; padding-bottom: 8px;" class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;</button></center>
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
   <p>
     <h4>¡Aviso!</h4>
   No hay datos para mostrar.</p>
 </div>
 <?php
}

?>         
</div>
</div>
</section>
</div>
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
 $('#modificarProgramacion').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('idprogramacion') // Extraer la información de atributos de datos
          var inicio = button.data('fechainicio') // Extraer la información de atributos de datos
          var fin = button.data('fechaFin') // Extraer la información de atributos de datos
          var tipo = button.data('tipocap') // Extraer la información de atributos de datos
          var mod = button.data('modalidad') // Extraer la información de atributos de datos
          var nivel = button.data('nivel') // Extraer la información de atributos de datos


          var modal = $(this)
          modal.find('.modal-title').text('Modificar capacitación: '+ tipo)
          modal.find('#idProg').val(id)
          modal.find('.modal-body #fechaInicio').val(inicio)
          modal.find('.modal-body #fechafin').val(fin)
          modal.find('.modal-body #tipoCap').val(tipo)
          modal.find('.modal-body #modalidad').val(mod)
          modal.find('.modal-body #nivel').val(nivel)

          $('.alert').hide();//Oculto alert
        })

      </script>

      <script type="text/javascript">

       $('#cargarModulo').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var nombre = button.data('idAsigModulo') // Extraer la información de atributos de datos

          var modal = $(this)
          modal.find('.modal-title').text('Modificar módulo: ' + nombre)
          modal.find('.modal-body #idAsigModulo').val(id)
          modal.find('.modal-body #nombreModulo').val(nombre)
          modal.find('.modal-body #frecuencia').val(frec)
          modal.find('.modal-body #descripcion').val(desc)

          

          $('.alert').hide();//Oculto alert
        })

      </script>
      <script type="text/javascript">
        $('#inhabilitarProg').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Botón que activó el modal
    var id = button.data('idprogramacion') // Extraer la información de atributos de datos
    var modal = $(this)
    modal.find('#idProg').val(id)
  })
</script>


</body>
</html>
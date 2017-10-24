 <?php
              include_once ('libreriaSCC.php');
              $con = conectar();
              if(!$con){
              die("imposible conectarse: ".mysqli_error($con));
              }
              if (@mysqli_connect_errno()) {
              die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
              }
              $dni=$_REQUEST['doc'];
              
              $mysql=mysqli_query($con,"set names 'utf8'");

              $count_query   = mysqli_query($con,"SELECT count(*) AS numrows  FROM cargarEmpleado where  documento='$dni'");

              if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
              
              $query=mysqli_query($con,"SELECT nombreCompleto,documento,telefono,correoElectronico,fechaInicioLaboral,fechaTerminacionContrato, empresa, numContrato, Tipocontrato,idTipoCon,idDep,area, nivelEscolar,idTipoNiv from cargarEmpleado where  documento='$dni' ") or die(mysql_error());
            
              if ($numrows>0){
              ?>
      
            <div> 
            
                <?php
                while($row = mysqli_fetch_array($query)){
                ?>
            <div class="panel panel-success">
              <div class="panel-heading" style="background:ghostwhite; border:2px solid rgba(192, 192, 192, 0.24);">
              <h4><?php echo $row['nombreCompleto'];?></h4>
            </div>
             <div class="panel-body">
                <p style="color: gray;">NUMERO DE DOCUMENTO: </p> <h4><?php echo $row['documento'];?></h4>
               <?php
               if(isset($row['correoElectronico'])){

                ?>
               <p style="color: gray;">EMAIL:</p>  <h4><?php echo $row['correoElectronico'];?></h4>

               <?php

               }
               else{?>
               <p style="color: gray;">EMAIL:</p> <h4> No registra</h4>
              <?php
            }
              ?>
                <p style="color: gray;">ESCOLARIDAD:</p><h4><?php echo $row['nivelEscolar'];?></h4>
                <p style="color: gray;">TIPO DE CONTRATO:</p><h4><?php echo $row['Tipocontrato'];?></h4>
                <p style="color: gray;">EMPRESA:</p><h4><?php echo $row['empresa'];?></h4>
                <p style="color: gray;">FECHA INICIO LABORAL:</p> <h4><?php echo $row['fechaInicioLaboral'];?></h4>
                <p style="color: gray;">FECHA TERMINACION LABORAL:</p><h4><?php echo $row['fechaTerminacionLaboral'];?></h4>
                <p style="color: gray;">NÚMERO DE CONTRATO:</p><h4><?php echo $row['numContrato'];?></h4>
               <p style="color: gray;"> AREA:</p><h4><?php echo $row['area'];?></h4>
              </div>
            </div>
                          
                
              <?php
              }
              ?>
            
            <?php
              
            } else {
              ?>

              <h4>¡Aviso!</h4> No hay datos para mostrar.
             
            </div>
          </div>
              <?php
            }
          ?> 
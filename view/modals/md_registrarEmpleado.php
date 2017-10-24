<div class="modal fade" aria-labelledby="myModalLabel"  id="registroEmpleado" name="registroEmpleado" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel">Nuevo empleado</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax_register">
          <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("select count(*) as cuenta from Empleado where visibilidad = '1'") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("select documento from Empleado") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $documento[$i]=$vector['documento'];
            $i++;
            }
            $mysql->close();
          ?>
          <form id="registroEmpleado" action="../controller/controladorEmpleado.php" method="post" name="registrar">
            <div class="form-group">
              <label>Documento:</label>
              <div class="input-group">
                <input class="form-control" id="documento" name="documento" pattern="[0-9]{1,45}" required="" type="text"> 
                <button class="btn btn-success btn-sm" onclick="validar()"  type="button">
                <span><i aria-hidden="true"  class="fa fa-search"></i></span>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label>Nombre completo:</label> <input class="form-control" name="nombreCompleto" id="nombreCompleto" pattern="[a-zA-ZáćéįóúÿýżźñÉÓÚÑ- ]{1-20}" required="" title="Ingrese solo letras" type="text">
            </div>
            <div class="form-group">
              <label>Telefono:</label> <input class="form-control" name="telefono" id="telefono" pattern="[0-9]{7,25}" required="" type="tel">
            </div>
            <div class="form-group">
              <label>Correo electronico:</label> <input class="form-control" name="correoElectronico" id="correoElectronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required="" type="email">
            </div>
            <div class="form-group">
              <label>Nivel escolar:</label> 
              <select class="form-control" name="idTipoNivelEscolar" id="idTipoNivelEscolar" required="">
                <option value="">Seleccione nivel escolar</option>
                <?php
                  $mysql=conectar();
                  $registro=$mysql->query("select idTipoNivelEscolar, nombre from tipoNivelEscolar") or die($mysql->error);



                  
                  while($reg=$registro->fetch_array()){
                    echo "<option value=\"".$reg['idTipoNivelEscolar']."\">".$reg['nombre']."</option>";
                  }
                  $mysql->close();
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tipo de contrato:</label> <select class="form-control" id="idTipoContrato" name="idTipoContrato" required="">
                <option value="">Seleccione tipo contrato</option>
                <?php
                  $mysql=conectar();
                  $registro=$mysql->query("select idtipoContrato, nombre from TipoContrato") or die($mysql->error);
                  while($reg=$registro->fetch_array()){
                    echo "<option value=\"".$reg['idtipoContrato']."\">".$reg['nombre']."</option>";
                  }
                  $mysql->close();
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Fecha de inicio laboral:</label>
              <div class='input-group date' id='datetimepicker1'>
                <input class="form-control" id="fechaInicioLaboral" name="fechaInicioLaboral" type='date'>
              </div>
            </div>
            <div class="form-group">
              <label>Fecha de finalización laboral:</label>
              <div class='input-group date' id='datetimepicker1'>
                <input class="form-control" id="fechaTerminacionContrato" name="fechaTerminacionContrato" type='date'>
              </div>
            </div>
            <div class="form-group">
              <label>Número de contrato:</label> <input class="form-control" id="numContrato" name="numContrato" pattern="[0-9]{3,8}" required="" type="num">
            </div>
           <div class="form-group">
              <label>Empresa:</label> 
               <select class="form-control"id="empresa" name="empresa"  required>
        					<option value="" disabled="true" selected="true" >Seleccione empresa</option>
        					<option value="GF cobranzas">GF</option>
        					<option value="CYCP cobradores">CYCP</option>
                </select>
             
            </div>
             <div class="form-group">
              <label>Área:</label> <select class="form-control" name="idDepartamento" required="">
                <option value="">Seleccione</option>
                <?php
                  $mysql=conectar();
                  $registro=$mysql->query("select idDepartamento, area from Departamento") or die($mysql->error);
                  while($reg=$registro->fetch_array()){
                    echo "<option value=\"".$reg['idDepartamento']."\">".$reg['area']."</option>";
                  }
                  $mysql->close();
                ?>
              </select>
            </div>
         
      <div class="modal-footer">
        <button class="btn btn-success" name="funcion" id="funcion" value="1" type="submit"> Enviar</button> <button class="btn btn-success" data-dismiss="modal">Cerrar</button>
         </form>
        </div>
      </div>
      </div>
    </div>
    </div> 
    </div>
  </div>

  <script type='text/javascript'>
  <?php
  $js_array = json_encode($documento);
  echo "var vector= ". $js_array . ";\n";
  ?>

  function validar(){
  var doc = document.getElementById('documento').value;
  var control = 0;
  for (var i = 0; i < vector.length; i++) {
  if (vector[i]== doc) {
  control = 1;
  } 

  }
  if (control == 1) {
  alert("Documento invalido, ya fue registrado");
  }else{
  alert("Documento valido");
  }

  }


</script> 

<script type='text/javascript'>
  <?php
  $js_array = json_encode($numContrato);
  echo "var vector= ". $js_array . ";\n";
  ?>

  function validarContrato(){
  var doc = document.getElementById('numContrato').value;
  var control = 0;
  for (var i = 0; i < vector.length; i++) {
  if (vector[i]== doc) {
  control = 1;
  } 

  }
  if (control == 1) {
  alert("Este número de contrato ya fue registrado");
  }
  }


</script> 
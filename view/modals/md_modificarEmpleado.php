<div class="modal" aria-labelledby="myModalLabel"  id="modificarEmpleado"  name="modificarEmpleado" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
        <span aria-hidden="true">&times;</span></button>
        <h4 align="center" class="modal-title" id="myModalLabel">Modificar empleado</h4>
      </div>

      <div class="modal-body">
        <div id="datos_ajax">
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
          <form  action="../controller/controladorEmpleado.php" method="post" name="modificarEmpleado" id="modificarEmpleado">
            <div class="form-group">
              <label>Documento:</label>
              <div class="input-group">
                <input class="form-control" id="documento" name="documento" pattern="[0-9]{1,45}" required="" type="text" readonly> 
              
              </div>
            </div>
            <div class="form-group">
              <label>Nombre completo:</label> <input class="form-control" name="nombre" id="nombre" pattern="[a-zA-ZáćéįóúÿýżźñÉÓÚÑ- ]{1-20}" required="" title="Ingrese solo letras" type="text">
            </div>
            <div class="form-group">
              <label>Correo electronico:</label> <input class="form-control" name="correo" id="correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required="" type="email">
            </div>
             <div class="form-group">
              <label>Telefono:</label> <input class="form-control" value="00000000" name="tel" id="tel" pattern="[0-9]{7,25}" required="" type="hidden">
            </div>
            <div class="form-group">
              <label>Nivel escolar:</label> 
                <select class="form-control" name="nivelEscolar" id="nivelEscolar" required="">
                <option value="">Seleccione</option>
                <?php
                  $mysql=conectar();
                  $registro=$mysql->query("select idTipoNivelEscolar,nombre from tipoNivelEscolar") or die($mysql->error);
                  while($reg=$registro->fetch_array()){
                    echo "<option value=\"".$reg['idTipoNivelEscolar']."\">".$reg['nombre']."</option>";
                  }
                  $mysql->close();
                ?>
                </select>
            </div>
            <div class="form-group">
              <label>Tipo de contrato:</label>
                 <select class="form-control" id="tipocontrato" name="tipocontrato" required="">
                <option value="">Seleccione</option>
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
                <input class="form-control" id="fechaInicio" name="fechaInicio" type='date'>
              </div>
            </div>
            <div class="form-group">
              <label>Fecha de finalización laboral:</label>
              <div class='input-group date' id='datetimepicker1'>
                <input class="form-control" id="fechaTerminacion" name="fechaTerminacion" type='date'>
              </div>
            </div>
            <div class="form-group">
              <label>Número de contrato:</label> <input class="form-control" id="numContrato" name="numContrato" pattern="[0-9]{1,4}" required="" type="num" readonly>
            </div>
           <div class="form-group">
              <label>Empresa:</label> 
                <select class="form-control" id="empresa" name="empresa" required  >
                <option value="">Seleccione</option>
                <?php
                  $empresas = array("GFC","CyCP");
                  $i = 0;
                  while($i < count($empresas)){
                   echo "<option value=\"".$empresas[$i]."\">".$empresas[$i]."</option>"; 
                  $i++;
                  }
                  ?>
                </select>
            </div>
             <div class="form-group">
              <label>Departamento:</label> 
                <select class="form-control" name="dep"  id="dep" required="">
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
          <button class="btn btn-primary"  name="funcion" id="funcion" value="2" type="submit">Guardar</button> <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
         </form>
        </div>
      </div>
      </div>
     
    </div>
  </div>
</div>
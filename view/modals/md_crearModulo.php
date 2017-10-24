<div class="modal fade" aria-labelledby="myModalLabel"  id="crearMod" name="crearMod" role="dialog" tabindex="-1">
 <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 align="center" class="modal-title" id="myModalLabel">Crear módulo</h4>
      </div>
      
      <div class="modal-body">
        <div id="datos_ajax">
          <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("SELECT count(*) as numrows from Modulo ") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("SELECT * from Modulo order by  nombreModulo") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $tema[$i]=$vector['idModulo'];
            $i++;
            }
            $mysql->close();
          ?>
          <form id="crearMod" action="../controller/controladorModulo.php" method="post" name="crearMod">
          <input type="hidden" name="idModulo" id="idModulo">
           <div class="form-group">
              <label>* Nombre Modulo:</label>
              <div class="input-group">
                <input class="form-control" id="nombreMod" name="nombreMod"  required="" type="text" > 
              
              </div>
            </div>
            <div class="form-group">
              <label>Frecuencia:</label>
              <div class="input-group">
                <input class="form-control"  value="0" min="0" step="0" required id="frecuencia" name="frecuencia"  type="number"> &nbsp;Meses
              
              </div>
            </div>
             <div class="form-group">
              <label>Descripción (opcional):</label>
              <div class="input-group">
                <input class="form-control"   id="descripcion" name="descripcion"  type="text" > 
              
              </div>
            </div>
          <div class="modal-footer">
            <button class="btn btn-primary" name="funcion" id="funcion" value="1" type="submit"> Guardar</button> 
            <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
   
  


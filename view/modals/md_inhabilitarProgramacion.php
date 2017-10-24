
<div class="modal" id="inhabilitarProg"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 8%; padding-bottom: 100px;">
    <div class="modal-content">
    <div class="modal-body">
    <form id="inhabilitarProg" action="../controller/controladorProgramacion.php" method="post">
      <input type="hidden" id="idProg" name="idProg">
      <h2 class="text-center text-muted">¿Esta seguro?</h2>
      <div class="col-xs-6 ">
    	  <p class="lead text-muted text-center" style="display: block;margin:10px">
          <img src="../../imagenes/adv.png">Esta acción eliminará de forma permanente el registro. ¿Desea continuar?</p>
      </div>
      <div class="-footer" style="text-align: center;"> 
        
            <button type="submit" name="funcion" id="funcion" value="2" class="btn btn-md btn-success">Continuar</button>
            <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Cancelar</button>
        
      </div>
    
      </form>
    </div>
  </div>
</div>
</div>

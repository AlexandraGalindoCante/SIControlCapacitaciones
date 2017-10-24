
<div class="modal" id="inhabilitarTema" name="inhabilitarTema"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 8%; padding-bottom: 100px;">
    <div class="modal-content">
      <div class="modal-body">
    <form id="inhabilitarTema" name="inhabilitarTema" action="../controller/controladorTema.php" method="post">
      <input type="hidden" id="idTema" name="idTema">

      <h2 class="text-center text-muted">¿Esta seguro?</h2>
      <div class="col-xs-6 ">
	  <p class="lead text-muted text-center" style="display: block;margin:10px">
   
      Esta acción eliminará de forma permanente el registro. ¿Desea continuar?</p></div>
      <div class="modal-footer">
        
        <button type="submit" name="funcion" id="funcion" value="3" class="btn btn-md btn-primary">Continuar</button>
        <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Cancelar</button>
       
        </div>
        </form>
    </div>
  </div>
</div>
</div>

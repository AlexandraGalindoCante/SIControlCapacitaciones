
<div class="modal" id="inhabilitarEmpleado"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document" style="padding-top: 8%; padding-bottom: 100px;">
    <div class="modal-content">
     <div class="modal-body">
    <form id="inhabilitarEmpleado" action="../controller/controladorEmpleado.php" method="post">
      <input type="hidden" id="documento" name="documento">

      <h2 class="text-center text-muted">¿Esta seguro?</h2>
        <img src="../../imagenes/adv.png">
	  <p class="lead text-muted text-center" style="display: block;margin:10px">
      Esta acción eliminará de forma permanente el registro. ¿Desea continuar?</p>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="funcion" id="funcion" value="3" class="btn btn-lg btn-primary">Continuar</button>
        </div>
        </form>
    </div>
  </div>
</div>
</div>

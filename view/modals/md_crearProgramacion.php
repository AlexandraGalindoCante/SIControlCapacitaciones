<div class="modal fade" aria-labelledby="myModalLabel" id="crearProgramacion" name="crearProgramacion" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" style="padding-top: 15px; padding-bottom: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    <h4 align="center" class="modal-title" id="myModalLabel">Programar capacitación</h4>
                </div>

                <div class="modal-body">
                    <div id="datos_ajax_register">
                        <?php
            $mysql=conectar();
            $i=0;
            $contar=$mysql->query("select count(*) as cuenta from Programacion where visibilidad = '1'") or die($mysql->error);
            $conteoDoc = $contar->fetch_array(MYSQLI_NUM);
            $registro=$mysql->query("select idProgramacion from Programacion") or die($mysql->error);
            while($vector=$registro->fetch_array()){
            $documento[$i]=$vector['idProgramacion'];
            $i++;
            }
            $mysql->close();
          ?>
                            <form id="crearProgramacion" action="../controller/controladorProgramacion.php" method="post" name="crearProgramacion">
                                <div class="form-group">
                                    <label>Fecha inicio:</label>
                                    <div class="form-group">
                                        <input class="form-control" id="fechaInicio" name="fechaInicio" required="" type="date">
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                    </div>
                    <div class="form-group">
                        <label>Fecha fin:</label>
                        <input class="form-control" name="fechaFin" id="fechaFin" required="" title="Ingrese fecha de inicio de la capacitación" type="date">
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
                            <option value="">Seleccione  modalidad</option>
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

                    <div class="modal-footer">
                        <button class="btn btn-success" name="funcion" id="funcion" value="0" type="submit"> Guardar</button>
                        <button class="btn btn-deafult" data-dismiss="modal">Cerrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyy MM dd",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14",

    });
</script>
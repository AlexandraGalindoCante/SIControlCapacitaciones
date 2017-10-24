//Empleado


 function load(page){
        var parametros = {"action":"ajax","page":page};
        $("#loadEmpleado").fadeIn('slow');
        $.ajax({
            url:'../consulta/cargarEmpleado.php',
            data: parametros,
             beforeSend: function(objeto){
            $("#loadEmpleado").html("<img src='../imagenes/loader.gif'>");
            },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $("#loadEmpleado").html("");
            }
        })
    }

        $('#modificarEmpleado').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var doc = button.data('documento') // Extraer la información de atributos de datos
          var nombre = button.data('nombre') // Extraer la información de atributos de datos
          var tel = button.data('telefono') // Extraer la información de atributos de datos
          var correo = button.data('correo') // Extraer la información de atributos de datos
          var nivel = button.data('nivelEscolar') // Extraer la información de atributos de datos
          var contrato = button.data('Tipocontrato') // Extraer la información de atributos de datos
          var fechaInicio = button.data('fechaInicio')// Extraer la información de atributos de datos
          var fechaTerminacion = button.data('fechaTerminacion')// Extraer la información de atributos de datos
          var numCont= button.data('numContrato')// Extraer la información de atributos de datos
          var dep= button.data('departamento')// Extraer la información de atributos de datos
          var empr = button.data('empresa')// Extraer la información de atributos de datos
         

          var modal = $(this)
          modal.find('.modal-title').text('Modificar empleado: ')
          modal.find('.modal-body #documento').val(doc)
          modal.find('.modal-body #nombre').val(nombre)
          modal.find('.modal-body #tel').val(tel)
          modal.find('.modal-body #correo').val(correo)
          modal.find('.modal-body #nivelEscolar').val(nivel)
          modal.find('.modal-body #Tipocontrato').val(contrato)
          modal.find('.modal-body #fechaInicio').val(fechaInicio)
          modal.find('.modal-body #fechaTerminacion').val(fechaTerminacion)
          modal.find('.modal-body #departamento').val(dep)
          modal.find('.modal-body #empresa').val(empr)
          modal.find('.modal-body #numContrato').val(numCont)

          
     
          $('.alert').hide();//Oculto alert
        })


        $('#inhabilitarEmpleado').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var id = button.data('documento') // Extraer la información de atributos de datos
          var modal = $(this)
          modal.find('#documento').val(documento)
        })

    /*$( "#modificarEmpleado" ).submit(function( event ) {
        var parametros = $(this).serialize();
             $.ajax({
                    type: "POST",
                    url: "../controller/controladorEmpleado.php",
                    data: parametros,
                     beforeSend: function(objeto){
                        
                      },
                    success: function(datos){
                    $('#modificarEmpleado').modal('hide');
                    $('.modal-backdrop').remove();
                     
                   
                  }
            });
          event.preventDefault();
        });
        */
       /* $( "#registroEmpleado" ).submit(function( event ) {
        var parametros = $(this).serialize();
             $.ajax({
                    type: "POST",
                    url: "controller/controladorEmpleado.php",

                    data: parametros,
                     beforeSend: function(objeto){
                        
                      },
                    success: function(datos){
                    
                    $('#registroEmpleado').modal('hide');
                    $('.modal-backdrop').remove();
                  


                  }
            });
          event.preventDefault();
        });
        


        $( "#inhabilitarEmpleado" ).submit(function( event ) {
        var parametros = $(this).serialize();
             $.ajax({
                    type: "POST",
                    url: "controller/controladorEmpleado.php",
                    data: parametros,
                     beforeSend: function(objeto){
                        
                      },
                    success: function(datos){
               
                    $('#eliminarEmpleado').modal('hide');
                     $('.modal-backdrop').remove();
                     
                    load(1);
                  }
            });
          event.preventDefault();
        });
        */


        //FinEmpleado


        // gestion Programación



         $('#modificarProgramacion').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botón que activó el modal
          var inicio = button.data('fechainicio') // Extraer la información de atributos de datos
          var fin = button.data('fechaFin') // Extraer la información de atributos de datos
          var tipo = button.data('tipocap') // Extraer la información de atributos de datos
          var mod = button.data('modalidad') // Extraer la información de atributos de datos
          var nivel = button.data('nivel') // Extraer la información de atributos de datos
         

          var modal = $(this)
          modal.find('.modal-title').text('Modificar capacitación:')
          modal.find('.modal-body #fechaInicio').val(inicio)
          modal.find('.modal-body #fechafin').val(fin)
          modal.find('.modal-body #tipoCap').val(tipo)
          modal.find('.modal-body #modalidad').val(mod)
          modal.find('.modal-body #nivel').val(nivel)

          $('.alert').hide();//Oculto alert
        })


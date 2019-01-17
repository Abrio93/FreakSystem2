$(document).ready(function() {
    var table = $('#tabla_usuarios').DataTable( {
        "processing": true,
        "ajax": {
            "url": "AJAX/usuariosAjax.php",
            "type": "POST",
            "data": function (e) {
                  e.ver_usuarios = "";
              }
        },
      "columns": [
        { "data": "id_usuario" },
        { "data": "usuario" },
        { "data": "correo" },
        { "data": null, render: function ( data, type, row ) {
          return data.nombre + " " + data.apellidos;
        }},
        { "data": null, render: function ( data, type, row ) {
          var fecha = new Date(data.fecha_registro)
          return fecha.getDay() + "-" + fecha.getMonth() + "-" + fecha.getFullYear();
        }},
        { "data": null },
      ],
        "columnDefs": [
        {
          "targets": 5,
          "defaultContent": "<a href='#' class='btn btn-link editar' data-izimodal-open='#editar_usuario' data-izimodal-transitionin='fadeInDown'><i class='far fa-edit'></i></a><button class='btn btn-link borrar'><i class='far fa-trash-alt'></i></button>",
          "className": "text-center",
          "orderable": false,
          "searchable": false
        }
      ]
    });
    
    $('#tabla_usuarios tbody').on( 'click', 'a.editar', function () {
        var data = table.row( $(this).parents('tr') ).data();
        ver_usuario(data.id_usuario);
    });
    $('#tabla_usuarios tbody').on( 'click', 'button.borrar', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert(data.id_usuario);
    });
  
    $("#editar_usuario").iziModal();
    $("#editar_pass").iziModal();
  });
  
  function ver_usuario(id_usuario){
    $.ajax({
      url: "AJAX/usuariosAjax.php",
      method: "POST",
      async: true,
      data: {"ver_usuario" : "", "id" : id_usuario},
      dataType: "json",
      success: function(respuesta) {
        $("form[name=editar_usuario] input[name=id_usuario]").val(respuesta.datos.id_usuario);
        $("form[name=editar_usuario] input[name=nombre]").val(respuesta.datos.nombre);
        $("form[name=editar_usuario] input[name=apellidos]").val(respuesta.datos.apellidos);
        $("form[name=editar_usuario] input[name=correo]").val(respuesta.datos.correo);
        $("form[name=editar_usuario] input[name=usuario]").val(respuesta.datos.usuario);
      }
    });
  }
  
  function guardar(){
    $.ajax({
      url: "AJAX/usuariosAjax.php",
      method: "POST",
      async: true,
      data: $("form[name=editar_usuario]").serialize(),
      success: function() {
      $("#editar_usuario").iziModal('close');
        swal({
          position: '',
          type: 'success',
          title: 'Datos guardados correctamente',
          showConfirmButton: false,
          timer: 1500
        });
      }
    });
  }
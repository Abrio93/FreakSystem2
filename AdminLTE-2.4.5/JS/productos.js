$(document).ready(function() {
    var table = $('#tabla_productos').DataTable( {
        "responsive": true,
        "processing": true,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "ajax": {
            "url": "AJAX/productosAjax.php",
            "type": "POST",
            "data": function (e) {
                  e.ver_productos = "";
              }
        },
      "columns": [
        { "data": "id" },
        { "data": "categoria" },
        { "data": "codigo" },
        { "data": "descripcion" },
        { "data": null, render: function ( data, type, row ) {
          return "<img width='20%' src='" + data.imagen + "' />";
        }},
        { "data": "stock" },
        { "data": null, render: function ( data, type, row ) {
          return data.precio_compra + " €";
        }},
        { "data": null, render: function ( data, type, row ) {
          return data.precio_venta + " €";
        }},
        { "data": "ventas" },
        { "data": "fecha" },
        { "data": null },
      ],
        "columnDefs": [
        {
          "targets": -1,
          "defaultContent": "<a href='#' class='btn btn-link editar' data-izimodal-open='#editar_usuario' data-izimodal-transitionin='fadeInDown'><i class='far fa-edit'></i></a><button class='btn btn-link borrar'><i class='far fa-trash-alt'></i></button>",
          "className": "text-center",
          "orderable": false,
          "searchable": false
        }
      ]
    });
    
    $('#tabla_productos tbody').on( 'click', 'a.editar', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert(data.id);
    });
    $('#tabla_productos tbody').on( 'click', 'button.borrar', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert(data.id);
    });
  
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
      var table = $('#tabla_usuarios').DataTable();
      table.ajax.reload();
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
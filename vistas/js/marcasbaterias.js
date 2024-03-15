/*=============================================
EDITAR MARCAS BATERÍA
=============================================*/

$(".tablas").on("click", ".btnEditarMarcaBateria", function () {

    var idMarcaBateria = $(this).attr("idMarcaBateria");

    var datos = new FormData();

    datos.append("idMarcaBateria", idMarcaBateria);

    $.ajax({

        url: "ajax/marcasbaterias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            $("#idMarcaBateria").val(respuesta["id"]);
            $("#editarMarcaBateria").val(respuesta["marca"]);

        }

    })

})

/*=============================================
ELIMINAR MARCAS BATERÍA
=============================================*/

$(".tablas").on("click", ".btnEliminarMarcaBateria", function () {

    var idMarcaBateria = $(this).attr("idMarcaBateria");

    swal({

        title: '¿Está seguro de borrar La Marca de Bateria?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Marca de batería!'

    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=marcas-bateria&idMarcaBateria=" + idMarcaBateria;

        }

    })

})
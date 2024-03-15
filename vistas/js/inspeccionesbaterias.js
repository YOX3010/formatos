/*=============================================
EDITAR INSPECCION BATERÍA
=============================================*/

$(".tablas").on("click", ".btnEditarInspeccionBateria", function () {

    var idInspeccionBateria = $(this).attr("idInspeccionBateria");

    var datos = new FormData();

    datos.append("idInspeccionBateria", idInspeccionBateria);

    $.ajax({

        url: "ajax/inspeccionesbaterias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            $("#idInspeccionBateria").val(respuesta["id"]);
            $("#editarInspeccionBateria").val(respuesta["elemento"]);

        }

    })

})

/*=============================================
ELIMINAR INSPECCION BATERÍA
=============================================*/

$(".tablas").on("click", ".btnEliminarInspeccionBateria", function () {

    var idMarca = $(this).attr("idInspeccionBateria");

    swal({

        title: '¿Está seguro de borrar La Inspeccion de la Bateria?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Inspeccion de batería!'

    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=inspeccion-bateria&idInspeccionBateria=" + idInspeccionBateria;

        }

    })

})
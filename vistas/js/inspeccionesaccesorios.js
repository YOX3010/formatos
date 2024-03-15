/*=============================================
EDITAR INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnEditarInspeccionAccesorio", function () {

    var idInspeccionAccesorio = $(this).attr("idInspeccionAccesorio");

    var datos = new FormData();

    datos.append("idInspeccionAccesorio", idInspeccionAccesorio);

    $.ajax({

        url: "ajax/inspeccionesaccesorios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            $("#idInspeccionAccesorio").val(respuesta["id"]);
            $("#editarInspeccionAccesorio").val(respuesta["elemento"]);

        }

    })

})

/*=============================================
ELIMINAR INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnEliminarInspeccionAccesorio", function () {

    var idMarca = $(this).attr("idInspeccionAccesorio");

    swal({

        title: '¿Está seguro de borrar La Inspeccion del Accesorio?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Inspeccion del Accesorio!'

    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=inspeccion-accesorio&idInspeccionAccesorio=" + idInspeccionAccesorio;

        }

    })

})
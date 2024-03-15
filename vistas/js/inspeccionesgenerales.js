/*=============================================
EDITAR INSPECCION GENERALES
=============================================*/

$(".tablas").on("click", ".btnEditarInspeccionGeneral", function () {

    var idInspeccionGeneral = $(this).attr("idInspeccionGeneral");

    var datos = new FormData();

    datos.append("idInspeccionGeneral", idInspeccionGeneral);

    $.ajax({

        url: "ajax/inspeccionesgenerales.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            $("#idInspeccionGeneral").val(respuesta["id"]);
            $("#editarInspeccionGeneral").val(respuesta["elemento"]);

        }

    })

})

/*=============================================
ELIMINAR INSPECCION GENERALES
=============================================*/

$(".tablas").on("click", ".btnEliminarInspeccionGeneral", function () {

    var idMarca = $(this).attr("idInspeccionGeneral");

    swal({

        title: '¿Está seguro de borrar La Inspeccion General?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Inspeccion de General!'

    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=inspeccion-general&idInspeccionGeneral=" + idInspeccionGeneral;

        }

    })

})
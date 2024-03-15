/*=============================================
EDITAR INSPECCION NEUMATICO
=============================================*/

$(".tablas").on("click", ".btnEditarInspeccionNeumatico", function () {

    var idInspeccionNeumatico = $(this).attr("idInspeccionNeumatico");

    var datos = new FormData();

    datos.append("idInspeccionNeumatico", idInspeccionNeumatico);

    $.ajax({

        url: "ajax/inspeccionesneumaticos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            $("#idInspeccionNeumatico").val(respuesta["id"]);
            $("#editarInspeccionNeumatico").val(respuesta["elemento"]);

        }

    })

})

/*=============================================
ELIMINAR INSPECCION NEUMATICO
=============================================*/

$(".tablas").on("click", ".btnEliminarInspeccionNeumatico", function () {

    var idMarca = $(this).attr("idInspeccionNeumatico");

    swal({

        title: '¿Está seguro de borrar La Inspeccion Neumatico?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Inspeccion de Neumatico!'

    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=inspecciones-neumaticos&idInspeccionNeumatico=" + idInspeccionNeumatico;

        }

    })

})
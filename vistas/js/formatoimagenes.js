/*=============================================
EDITAR FORMATO IMAGENESs
=============================================*/

$(".tablas").on("click", ".btnEditarFormatoImagenes", function () {

    var idFormatoImagenes = $(this).attr("idFormatoImagenes");

    var datos = new FormData();

    datos.append("idFormatoImagenes", idFormatoImagenes);

    $.ajax({

        url: "ajax/formatoimagenes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function (respuesta) {

            $("#idFormatoImagenes").val(respuesta["id"]);
            $("#editarFormatoImagenes").val(respuesta["imagen"]);

        }

    })

})

/*=============================================
ELIMINAR FORMATO IMAGENES
=============================================*/

$(".tablas").on("click", ".btnEliminarFormatoImagenes", function () {

    var idMarca = $(this).attr("idFormatoImagenes");

    swal({

        title: '¿Está seguro de borrar La Imagen?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar La Imagen!'

    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=formato-imagenes&idFormatoImagenes=" + idFormatoImagenes;

        }

    })

})
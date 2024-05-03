/*=============================================

SUBIENDO LA FOTO DEL PROCEDIMIENTO

=============================================*/

$(".nuevaImagen").change(function () {
  var imagen = this.files[0];

  /*=============================================

  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  	=============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",

      text: "¡La imagen debe estar en formato JPG o PNG!",

      type: "error",

      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",

      text: "¡La imagen no debe pesar más de 2MB!",

      type: "error",

      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();

    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*=============================================

EDITAR PROCEDIMIENTO

=============================================*/

$(".tablaIncoterms tbody").on("click", "button.btnEditarIncoterm", function () {
  var idIncoterm = $(this).attr("idIncoterm");

  var datos = new FormData();

  datos.append("idIncoterm", idIncoterm);

  $.ajax({
    url: "ajax/incoterms.ajax.php",

    method: "POST",

    data: datos,

    cache: false,

    contentType: false,

    processData: false,

    dataType: "json",

    success: function (respuesta) {
      $("#idIncoterm").val(respuesta["id"]);
      $("#editarNombreIncoterm").val(respuesta["incoterm"]);

      if (respuesta["procedimiento"] != "") {
        $("#imagenActual").val(respuesta["procedimiento"]);
        $(".previsualizar").attr("src", respuesta["procedimiento"]);
      } else {
        $(".previsualizarEditar").attr(
          "src",
          "vistas/img/procedimientos/default/empty-doc.png"
        );
      }
    },
  });
});

/*=============================================
EDITAR PORT
=============================================*/

$(".tablas").on("click", ".btnEditarPort", function () {
  var idPort = $(this).attr("idPort");

  var datos = new FormData();

  datos.append("idPort", idPort);

  $.ajax({
    url: "ajax/port.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idPort").val(respuesta["id"]);
      $("#editarPort").val(respuesta["port"]);
    },
  });
});

/*=============================================
ELIMINAR PORT
=============================================*/

// $(".tablas").on("click", ".btnEliminarPort", function () {
//   var idMarca = $(this).attr("idPort");

//   swal({
//     title: "¿Está seguro de borrar La PORT?",
//     text: "¡Si no lo está puede cancelar la acción!",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     cancelButtonText: "Cancelar",
//     confirmButtonText: "Si, borrar PORT!",
//   }).then(function (result) {
//     if (result.value) {
//       window.location =
//         "index.php?ruta=inspecciones-reparaciones&idPort=" +
//         idPort;
//     }
//   });
// });

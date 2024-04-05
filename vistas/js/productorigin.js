/*=============================================
EDITAR PRODUCT ORIGIN
=============================================*/

$(".tablas").on("click", ".btnEditarProductOrigin", function () {
  var idProductOrigin = $(this).attr("idProductOrigin");

  var datos = new FormData();

  datos.append("idProductOrigin", idProductOrigin);

  $.ajax({
    url: "ajax/productorigin.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idProductOrigin").val(respuesta["id"]);
      $("#editarProductOrigin").val(respuesta["origin"]);
    },
  });
});

/*=============================================
ELIMINAR PRODUCT ORIGIN
=============================================*/

// $(".tablas").on("click", ".btnEliminarProductOrigin", function () {
//   var idMarca = $(this).attr("idProductOrigin");

//   swal({
//     title: "¿Está seguro de borrar La PRODUCT ORIGIN?",
//     text: "¡Si no lo está puede cancelar la acción!",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     cancelButtonText: "Cancelar",
//     confirmButtonText: "Si, borrar PRODUCT ORIGIN!",
//   }).then(function (result) {
//     if (result.value) {
//       window.location =
//         "index.php?ruta=inspecciones-reparaciones&idProductOrigin=" +
//         idProductOrigin;
//     }
//   });
// });

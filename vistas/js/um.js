/*=============================================
EDITAR UM
=============================================*/

$(".tablas").on("click", ".btnEditarUM", function () {
  var idUM = $(this).attr("idUM");

  var datos = new FormData();

  datos.append("idUM", idUM);

  $.ajax({
    url: "ajax/um.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idUM").val(respuesta["id"]);
      $("#editarUnidad").val(respuesta["unidad"]);
    },
  });
});

/*=============================================
ELIMINAR UM
=============================================*/

// $(".tablas").on("click", ".btnEliminarUM", function () {
//   var idMarca = $(this).attr("idUM");

//   swal({
//     title: "¿Está seguro de borrar La UM?",
//     text: "¡Si no lo está puede cancelar la acción!",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     cancelButtonText: "Cancelar",
//     confirmButtonText: "Si, borrar UM!",
//   }).then(function (result) {
//     if (result.value) {
//       window.location =
//         "index.php?ruta=inspecciones-reparaciones&idUM=" +
//         idUM;
//     }
//   });
// });

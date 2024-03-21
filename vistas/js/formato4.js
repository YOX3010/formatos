/*=============================================
EDITAR FORMATO 4
=============================================*/

$(".tablas").on("click", ".btnEditarFormato4", function () {
  var idFormato4 = $(this).attr("idFormato4");

  var datos = new FormData();

  datos.append("idFormato4", idFormato4);

  $.ajax({
    url: "ajax/formato4.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idFormato4").val(respuesta["id"]);
      $("#editarAuthenticationCode").val(respuesta["authentication_code"]);
      $("#editarRefNumber").val(respuesta["ref_number"]);
      $("#editarIcpoDate").val(respuesta["icpo_date"]);
      $("#editarIcpoTo").val(respuesta["icpo_to"]);
      $("#editarTradeDate").val(respuesta["trade_date"]);
      $("#editarSeller").val(respuesta["seller"]);
      $("#editarDurationContract").val(respuesta["duration_contract"]);
      $("#editarVessel").val(respuesta["vessel"]);
      $("#editarInspection").val(respuesta["inspection"]);
      $("#editarInsurance").val(respuesta["insurance"]);
      $("#editarPaymentMethod").val(respuesta["payment_method"]);
      $("#editarQQDetermination").val(respuesta["qq_determination"]);
      $("#editarLayTime").val(respuesta["lay_time"]);
      $("#editarDemurrageRate").val(respuesta["demurrage_rate"]);
      $("#editarLaw").val(respuesta["law"]);
      $("#editarIdImagenes").val(respuesta["id_imagenes"]);
    },
  });
});

/*=============================================
ELIMINAR FORMATO 4
=============================================*/

// $(".tablas").on("click", ".btnEliminarFormato4", function () {
//   var idFormato4 = $(this).attr("idFormato4");

//   swal({
//     title: "¿Está seguro de borrar El Formato?",
//     text: "¡Si no lo está puede cancelar la acción!",
//     type: "warning",
//     showCancelButton: true,
//     confirmButtonColor: "#3085d6",
//     cancelButtonColor: "#d33",
//     cancelButtonText: "Cancelar",
//     confirmButtonText: "Si, borrar El Formato!",
//   }).then(function (result) {
//     if (result.value) {
//       window.location = "index.php?ruta=formato-4&idFormato4=" + idFormato4;
//     }
//   });
// });

/*=============================================
BOTON EDITAR FORMATO 4
=============================================*/

$(".tablas").on("click", ".btnFormato4", function () {
  var idFormato4 = $(this).attr("idFormato4");

  window.location = "index.php?ruta=formato-4&idFormato4=" + idFormato4;
});

/*=============================================
BOTON IMPRIMIR FORMATO 4
=============================================*/

$(".tablas").on("click", ".btnImprimirFormato4", function () {
  var idFormato4 = $(this).attr("idFormato4");

  window.open(
    "extensiones/tcpdf/examples/formato-4.php?idFormato4=" + idFormato4,
    "_blank"
  );
});

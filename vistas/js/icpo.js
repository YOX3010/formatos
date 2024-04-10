/*=============================================
EDITAR ICPO
=============================================*/

$(".tablas").on("click", ".btnEditarICPO", function () {
  var idICPO = $(this).attr("idICPO");

  var datos = new FormData();

  datos.append("idICPO", idICPO);

  $.ajax({
    url: "ajax/icpo.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idICPO").val(respuesta["id"]);
      $("#editarSCO").val(respuesta["id_sco"]);
      $("#editarProveedor").val(respuesta["id_proveedor"]);
      $("#editarAuthCode").val(respuesta["authentication_code"]);
      $("#editarRefNumber").val(respuesta["ref_number"]);
      $("#editarVia").val(respuesta["via"]);
      $("#editarTradeDate").val(respuesta["trade_date"]);
      $("#editarDurationContract").val(respuesta["duration_contract"]);
      $("#editarVessel").val(respuesta["vessel"]);
      $("#editarInspection").val(respuesta["inspection"]);
      $("#editarInsurance").val(respuesta["insurance"]);
      $("#editarQQ").val(respuesta["qq_determination"]);
      $("#editarDemurrageRate").val(respuesta["demurrage_rate"]);
    },
  });
});

/*=============================================
BOTON MODULO ICPO
=============================================*/

$(".tablas").on("click", ".btnICPO", function () {
  var idICPO = $(this).attr("idICPO");

  window.location = "index.php?ruta=icpo&idICPO=" + idICPO;
});

/*=============================================
ELIMINAR ICPO
=============================================*/

// $(".tablas").on("click", ".btnEliminarICPO", function () {
//   var idMarca = $(this).attr("idICPO");

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
//       window.location = "index.php?ruta=ICPO&idICPO=" + idICPO;
//     }
//   });
// });

/*=============================================
BOTON PDF ICPO
=============================================*/

$(".tablas").on("click", ".btnImprimirICPO", function () {
  var idICPO = $(this).attr("idICPO");

  window.open("extensiones/tcpdf/examples/icpo.php?idICPO=" + idICPO, "_blank");
});

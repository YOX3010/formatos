/*=============================================
EDITAR FORMATO 3
=============================================*/

$(".tablas").on("click", ".btnEditarFormato3", function () {
  var idFormato3 = $(this).attr("idFormato3");

  var datos = new FormData();

  datos.append("idFormato3", idFormato3);

  $.ajax({
    url: "ajax/formato3.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idFormato3").val(respuesta["id"]);
      $("#editarCommercialInvoice").val(respuesta["commercial_invoice"]);
      $("#editarDateCommercialInvoice").val(
        respuesta["date_commercial_invoice"]
      );
      $("#editarTotalGrossAmount").val(respuesta["total_gross_amount"]);
      $("#editarTermsDeliveryDestinationPort").val(
        respuesta["terms_delivary_destination_port"]
      );
      $("#editarTermsPayment").val(respuesta["terms_payment"]);
      $("#editarFreightInsuranceCharge").val(
        respuesta["freight_insurance_charges"]
      );
    },
  });
});

/*=============================================
ELIMINAR FORMATO 3
=============================================*/

// $(".tablas").on("click", ".btnEliminarFormato3", function () {
//   var idOrdenVehiculo = $(this).attr("idFormato3");

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
//       window.location = "index.php?ruta=formato-3&idFormato3=" + idFormato3;
//     }
//   });
// });

/*=============================================
BOTON EDITAR FORMATO 3
=============================================*/

$(".tablas").on("click", ".btnFormato3", function () {
  var idFormato3 = $(this).attr("idFormato3");

  window.location = "index.php?ruta=formato-3&idFormato3=" + idFormato3;
});

/*=============================================
BOTON IMPRIMIR FORMATO 3
=============================================*/

$(".tablas").on("click", ".btnImprimirFormato3", function () {
  var idFormato3 = $(this).attr("idFormato3");

  window.open(
    "extensiones/tcpdf/examples/formato-3.php?idFormato3=" + idFormato3,
    "_blank"
  );
});

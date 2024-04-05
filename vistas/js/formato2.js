/*=============================================
EDITAR FORMATO 2
=============================================*/

$(".tablas").on("click", ".btnEditarFormato2", function () {
  var idFormato2 = $(this).attr("idFormato2");

  var datos = new FormData();

  datos.append("idFormato2", idFormato2);

  $.ajax({
    url: "ajax/formato2.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idFormato2").val(respuesta["id"]);
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
      $("#editarIdImagenesCliente").val(respuesta["id_imagenes_cliente"]);
    },
  });
});

/*=============================================
ELIMINAR FORMATO 2
=============================================*/

// $(".tablas").on("click", ".btnEliminarFormato2", function () {
//   var idOrdenVehiculo = $(this).attr("idFormato2");

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
//       window.location = "index.php?ruta=formato-2&idFormato2=" + idFormato2;
//     }
//   });
// });

/*=============================================
BOTON EDITAR FORMATO 2
=============================================*/

$(".tablas").on("click", ".btnFormato2", function () {
  var idFormato2 = $(this).attr("idFormato2");

  window.location = "index.php?ruta=formatos&idFormato2=" + idFormato2;
});

/*=============================================
BOTON IMPRIMIR FORMATO 2
=============================================*/

$(".tablas").on("click", ".btnImprimirFormato2", function () {
  var idFormato2 = $(this).attr("idFormato2");

  window.open(
    "extensiones/tcpdf/examples/formato-2.php?idFormato2=" + idFormato2,
    "_blank"
  );
});

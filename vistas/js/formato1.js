/*=============================================
EDITAR INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnEditarFormato1", function () {
  var idFormato1 = $(this).attr("idFormato1");

  var datos = new FormData();

  datos.append("idFormato1", idFormato1);

  $.ajax({
    url: "ajax/formato1.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idFormato1").val(respuesta["id"]);
      $("#editarTo1").val(respuesta["to_1"]);
      $("#editarMr1").val(respuesta["mr_1"]);
      $("#editarPosition1").val(respuesta["position_1"]);
      $("#editarEmail1").val(respuesta["email_1"]);
      $("#editarTo2").val(respuesta["to_2"]);
      $("#editarMr2").val(respuesta["mr_2"]);
      $("#editarPosition2").val(respuesta["position_2"]);
      $("#editarEmail2").val(respuesta["email_2"]);
      $("#editarVia").val(respuesta["via"]);
      $("#editarEmail3").val(respuesta["email_3"]);
      $("#editarMr3").val(respuesta["mr_3"]);
      $("#editarValiditySco").val(respuesta["validity_sco"]);
      $("#editarCommodity").val(respuesta["commodity"]);
      $("#editarQuantity").val(respuesta["quantity"]);
      $("#editarPrice").val(respuesta["price"]);
      $("#editarIncoterms").val(respuesta["incoterms"]);
      $("#editarPort").val(respuesta["port"]);
      $("#editarProductOrigin").val(respuesta["product_origin"]);
      $("#editarContractTerm").val(respuesta["contract_term"]);
      $("#editarCommission").val(respuesta["commission"]);
    },
  });
});

/*=============================================
ELIMINAR INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnEliminarFormato1", function () {
  var idMarca = $(this).attr("idFormato1");

  swal({
    title: "¿Está seguro de borrar El Formato?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar El Formato!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=formato-1&idFormato1=" + idFormato1;
    }
  });
});

/*=============================================
BOTON IMPRIMIR FORMATO 1
=============================================*/

$(".tablas").on("click", ".btnImprimirFormato1", function () {
  var idFormato1 = $(this).attr("idFormato1");

  window.open(
    "extensiones/tcpdf/examples/formato-1.php?idFormato1=" + idFormato1,
    "_blank"
  );
});

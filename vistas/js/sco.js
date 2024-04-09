/*=============================================
EDITAR SCO
=============================================*/

$(".tablas").on("click", ".btnEditarSCO", function () {
  var idSCO = $(this).attr("idSCO");

  var datos = new FormData();

  datos.append("idSCO", idSCO);

  $.ajax({
    url: "ajax/sco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idSCO").val(respuesta["id"]);
      $("#editarLoi").val(respuesta["id_loi"]);
      $("#editarClientes").val(respuesta["id_clientes"]);
      $("#editarUsuario").val(respuesta["id_usuario"]);
      $("#editarCommodity").val(respuesta["id_commodity"]);
      $("#editarPort").val(respuesta["id_port"]);
      $("#editarProductOrigin").val(respuesta["id_product_origin"]);
      $("#editarUM").val(respuesta["id_um"]);
      $("#editarIncoterms").val(respuesta["id_incoterms"]);
      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarViaCliente").val(respuesta["via_cliente"]);
      $("#editarEmailViaCliente").val(respuesta["email_via_cliente"]);
      $("#editarViaTpc").val(respuesta["via_tpc"]);
      $("#editarEmailViaTpc").val(respuesta["email_via_tpc"]);
      $("#editarValiditySco").val(respuesta["validity_of_sco"]);
      $("#editarQuantity").val(respuesta["quantity"]);
      $("#editarContractTerms").val(respuesta["contract_terms"]);
      $("#editarCommission").val(respuesta["commission"]);
    },
  });
});

/*=============================================
BOTON MODULO SCO
=============================================*/

$(".tablas").on("click", ".btnSCO", function () {
  var idSCO = $(this).attr("idSCO");

  window.location = "index.php?ruta=sco&idSCO=" + idSCO;
});

/*=============================================
ELIMINAR SCO
=============================================*/

// $(".tablas").on("click", ".btnEliminarSCO", function () {
//   var idMarca = $(this).attr("idSCO");

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
//       window.location = "index.php?ruta=sco&idSCO=" + idSCO;
//     }
//   });
// });

/*=============================================
BOTON PDF SCO
=============================================*/

$(".tablas").on("click", ".btnImprimirSCO", function () {
  var idSCO = $(this).attr("idSCO");

  window.open("extensiones/tcpdf/examples/sco.php?idSCO=" + idSCO, "_blank");
});

/*=============================================
BOTON IMPRIMIR CI
=============================================*/

$(".tablas").on("click", ".btnImprimirCI", function () {
  var idCI = $(this).attr("idCI");

  window.open("extensiones/tcpdf/examples/ci.php?idCI=" + idCI, "_blank");
});

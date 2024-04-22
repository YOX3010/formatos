/*=============================================
EDITAR CLIENTE
=============================================*/

$(".tablas").on("click", ".btnEditarCliente", function () {
  var idCliente = $(this).attr("idCliente");

  var datos = new FormData();

  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idCliente").val(respuesta["id"]);
      $("#editarCosignee").val(respuesta["cosignee"]);
      $("#editarSignatory").val(respuesta["signatory"]);
      $("#editarPosition").val(respuesta["position"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarDireccion").val(respuesta["direccion"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarCRN").val(respuesta["crn"]);
      $("#editarBankName").val(respuesta["bank_name"]);
      $("#editarBankAddress").val(respuesta["bank_address"]);
      $("#editarSwift").val(respuesta["swift"]);
      $("#editarOfficerName").val(respuesta["bank_officer_name"]);
      $("#editarOfficerPosition").val(respuesta["bank_officer_position"]);
      $("#editarOfficerPhone").val(respuesta["bank_officer_phone"]);
      $("#editarOfficerEmail").val(respuesta["bank_officer_email"]);
      $("#editarAccountNumber").val(respuesta["account_number"]);
      $("#editarCountry").val(respuesta["country"]);
      $("#editarPassportNumber").val(respuesta["passport_number"]);
      $("#editarPassportIssueDate").val(respuesta["passport_issue_date"]);
      $("#editarPassportExpirationDate").val(
        respuesta["passport_expiration_date"]
      );
      $("#editarPassportImage").val(respuesta["passport_image"]);
    },
  });
});
/*=============================================
MOSTRAR INFO CLIENTE
=============================================*/

$(".tablas").on("click", ".btnInfoCliente", function () {
  var idCliente = $(this).attr("idCliente");

  var datos = new FormData();

  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idCliente").val(respuesta["id"]);
      $("#infoCosignee").val(respuesta["cosignee"]);
      $("#infoSignatory").val(respuesta["signatory"]);
      $("#infoPosition").val(respuesta["position"]);
      $("#infoEmail").val(respuesta["email"]);
      $("#infoDireccion").val(respuesta["direccion"]);
      $("#infoTelefono").val(respuesta["telefono"]);
      $("#infoCRN").val(respuesta["crn"]);
      $("#infoBankName").val(respuesta["bank_name"]);
      $("#infoBankAddress").val(respuesta["bank_address"]);
      $("#infoSwift").val(respuesta["swift"]);
      $("#infoOfficerName").val(respuesta["bank_officer_name"]);
      $("#infoOfficerPosition").val(respuesta["bank_officer_position"]);
      $("#infoOfficerPhone").val(respuesta["bank_officer_phone"]);
      $("#infoOfficerEmail").val(respuesta["bank_officer_email"]);
      $("#infoAccountNumber").val(respuesta["account_number"]);
      $("#infoCountry").val(respuesta["country"]);
      $("#infoPassportNumber").val(respuesta["passport_number"]);
      $("#infoPassportIssueDate").val(respuesta["passport_issue_date"]);
      $("#infoPassportExpirationDate").val(
        respuesta["passport_expiration_date"]
      );
      $("#infoPassportImage").val(respuesta["passport_image"]);
    },
  });
});

/*=============================================
ELIMINAR CLIENTE
=============================================*/

$(".tablas").on("click", ".btnEliminarCliente", function () {
  var idCliente = $(this).attr("idCliente");

  swal({
    title: "¿Está seguro de borrar el cliente?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar cliente!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=clientes&idCliente=" + idCliente;
    }
  });
});

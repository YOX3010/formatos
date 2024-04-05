/*=============================================
EDITAR FORMATOS
=============================================*/

$(".tablas").on("click", ".btnEditarFormato", function () {
  var idFormato = $(this).attr("idFormato");

  var datos = new FormData();

  datos.append("idFormato", idFormato);

  $.ajax({
    url: "ajax/formato.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idFormato").val(respuesta["id"]);
      $("#editarClienteTo1").val(respuesta["cliente_to1"]);
      $("#editarClienteMr1").val(respuesta["cliente_mr1"]);
      $("#editarClientePosition1").val(respuesta["cliente_position1"]);
      $("#editarClienteEmail1").val(respuesta["cliente_email1"]);
      $("#editarClienteCoignee").val(respuesta["cliente_cosignee"]);
      $("#editarClienteSignatory").val(respuesta["cliente_signatory"]);
      $("#editarClientePosition").val(respuesta["cliente_position"]);
      $("#editarClienteEmail").val(respuesta["cliente_email"]);
      $("#editarClienteAddress").val(respuesta["cliente_address"]);
      $("#editarClienteTelephone").val(respuesta["cliente_telephone"]);
      $("#editarClienteVia").val(respuesta["cliente_via"]);
      $("#editarClienteEmailVia").val(respuesta["cliente_email_via"]);
      $("#editarClienteBankName").val(respuesta["cliente_bank_name"]);
      $("#editarClienteBankAddress").val(respuesta["cliente_bank_address"]);
      $("#editarClienteSwiftCode").val(respuesta["cliente_swift_code"]);
      $("#editarClienteAccountNumber").val(respuesta["cliente_account_number"]);
      $("#editarClienteNameOfTheBank").val(
        respuesta["cliente_name_of_the_bank"]
      );
      $("#editarClienteBranchAddress").val(respuesta["cliente_branch_address"]);
      $("#editarClienteNameOfTheBanking").val(
        respuesta["cliente_name_of_the_banking"]
      );
      $("#editarClientePhoneNumber").val(respuesta["cliente_phone_number"]);
      $("#editarClienteFaxNumber").val(respuesta["cliente_fax_number"]);
      $("#editarClienteBankingOfficerMail").val(
        respuesta["cliente_banking_officer_mail"]
      );
      $("#editarClienteAccountSignatoryName").val(
        respuesta["cliente_account_signatory_name"]
      );
      $("#editarClienteAccountName").val(respuesta["cliente_account_name"]);
      $("#editarClienteAccountNumberRoutingAba").val(
        respuesta["cliente_account_number_routing_aba"]
      );
      $("#editarClienteSwift").val(respuesta["cliente_swift"]);
      $("#editarSelSellerAccountDetails").val(
        respuesta["sel_seller_account_details"]
      );
      $("#editarSelBankName").val(respuesta["sel_bank_name"]);
      $("#editarSelBankAddress").val(respuesta["sel_bank_address"]);
      $("#editarSelAccountName").val(respuesta["sel_account_name"]);
      $("#editarSelAccountNumber").val(respuesta["sel_account_number"]);
      $("#editarSelSwift").val(respuesta["sel_swift"]);
    },
  });
});

/*=============================================
ELIMINAR FORMATOS
=============================================*/

// $(".tablas").on("click", ".btnEliminarFormato", function () {
//   var idMarca = $(this).attr("idFormato");

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
//       window.location = "index.php?ruta=formato-1&idFormato=" + idFormato;
//     }
//   });
// });

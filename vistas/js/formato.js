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
      $("#editarClientePosition").val(respuesta["cliente_position1"]);
      $("#editarClienteEmail1").val(respuesta["cliente_email1"]);
      $("#editarClienteCoignee").val(respuesta["cliente_cosignee"]);
      $("#editarClienteSignatory").val(respuesta["cliente_signatory"]);
      $("#editarClientePosition").val(respuesta["cliente_position"]);
      $("#editarClienteEmail").val(respuesta["cliente_email"]);
      $("#editarClienteVia").val(respuesta["cliente_via"]);
      $("#editarClienteEmailVia").val(respuesta["cliente_email_via"]);
      $("#editarValiditySco").val(respuesta["validity_sco"]);
      $("#editarCommodity").val(respuesta["commodity"]);
      $("#editarQuantity").val(respuesta["quantity"]);
      $("#editarPrice").val(respuesta["price"]);
      $("#editarIncoterms").val(respuesta["incoterms"]);
      $("#editarPort").val(respuesta["port"]);
      $("#editarProductOrigin").val(respuesta["product_origin"]);
      $("#editarContractTerm").val(respuesta["contract_term"]);
      $("#editarCommission").val(respuesta["commission"]);
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
      $("#editarName").val(respuesta["name"]);
      $("#editarDatePlaceBirth").val(respuesta["date_place_birth"]);
      $("#editarNumberCountryIssue").val(
        respuesta["passport_number_country_issue"]
      );
      $("#editarIssueDate").val(respuesta["passport_issue_date"]);
      $("#editarPassportExpirationDate").val(
        respuesta["passport_expiration_date"]
      );
      $("#editarTitleWithinCorporationCompany").val(
        respuesta["title_within_corporation_company"]
      );
      $("#editarOfficePhoneNumber").val(respuesta["office_phone_number"]);
      $("#editarMobilePhoneNumber").val(respuesta["mobile_phone_number"]);
      $("#editarEmailAddress").val(respuesta["email_address"]);
      $("#editarCommercialInvoice").val(respuesta["commercial_invoice"]);
      $("#editarDateCommercialInvoice").val(
        respuesta["date_commercial_invoice"]
      );
      $("#editarClienteAddress").val(respuesta["cliente_address"]);
      $("#editarClienteTelephone").val(respuesta["cliente_telephone"]);
      $("#editarTotalGrossAmount").val(respuesta["total_gross_amount"]);
      $("#editarTermsDeliveryDestinationPort").val(
        respuesta["terms_delivary_destination_port"]
      );
      $("#editarTermsPayment").val(respuesta["terms_payment"]);
      $("#editarFreightInsuranceCharge").val(
        respuesta["freight_insurance_charges"]
      );
      $("#editarSelSellerAccountDetails").val(
        respuesta["sel_seller_account_details"]
      );
      $("#editarSelBankName").val(respuesta["sel_bank_name"]);
      $("#editarSelBankAddress").val(respuesta["sel_bank_address"]);
      $("#editarSelAccountName").val(respuesta["sel_account_name"]);
      $("#editarSelAccountNumber").val(respuesta["sel_account_number"]);
      $("#editarSelSwift").val(respuesta["sel_swift"]);
      $("#editarClienteBankName").val(respuesta["cliente_bank_name"]);
      $("#editarClienteBankAddress").val(respuesta["cliente_bank_address"]);
      $("#editarClienteSwiftCode").val(respuesta["cliente_swift_code"]);
      $("#editarClienteAccountNumber").val(respuesta["cliente_account_number"]);
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

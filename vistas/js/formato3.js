/*=============================================
EDITAR FORMATO 4
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
      $("#editarAuthenticationCode").val(respuesta["authentication_code"]);
      $("#editarRefNumber").val(respuesta["ref_number"]);
      $("#editarIcpoDate").val(respuesta["icpo_date"]);
      $("#editarIcpoTo").val(respuesta["icpo_to"]);
      $("#editarTradeDate").val(respuesta["trade_date"]);
      $("#editarSeller").val(respuesta["seller"]);
      $("#editarDurationContract").val(respuesta["duration_contract"]);
      $("#editarTargetPrice").val(respuesta["target_price"]);
      $("#editarTargetPrice").val(respuesta["target_price"]);
      $("#editarVessel").val(respuesta["vessel"]);
      $("#editarInspection").val(respuesta["inspection"]);
      $("#editarInsurance").val(respuesta["insurance"]);
      $("#editarPaymentMethod").val(respuesta["payment_method"]);
      $("#editarQQDetermination").val(respuesta["qq_determination"]);
      $("#editarLayTime").val(respuesta["lay_time"]);
      $("#editarDemurrageRate").val(respuesta["demurrage_rate"]);
      $("#editarLaw").val(respuesta["law"]);
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
      $("#editarIdImagenes").val(respuesta["id_imagenes"]);
    },
  });
});

/*=============================================
ELIMINAR FORMATO 4
=============================================*/

// $(".tablas").on("click", ".btnEliminarFormato3", function () {
//   var idFormato3 = $(this).attr("idFormato3");

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
//       window.location = "index.php?ruta=formato-4&idFormato3=" + idFormato3;
//     }
//   });
// });

/*=============================================
BOTON EDITAR FORMATO 4
=============================================*/

$(".tablas").on("click", ".btnFormato3", function () {
  var idFormato3 = $(this).attr("idFormato3");

  window.location = "index.php?ruta=formatos&idFormato3=" + idFormato3;
});

/*=============================================
BOTON IMPRIMIR FORMATO 4
=============================================*/

$(".tablas").on("click", ".btnImprimirFormato3", function () {
  var idFormato3 = $(this).attr("idFormato3");

  window.open(
    "extensiones/tcpdf/examples/formato-3.php?idFormato3=" + idFormato3,
    "_blank"
  );
});

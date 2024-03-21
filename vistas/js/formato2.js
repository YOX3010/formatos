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

  window.location = "index.php?ruta=formato-2&idFormato2=" + idFormato2;
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

/*=============================================

SUBIENDO LA FOTO DEL PASAPORTE

=============================================*/

$(".nuevaImagen").change(function () {
  var imagen = this.files[0];

  /*=============================================

  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG

  	=============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",

      text: "¡La imagen debe estar en formato JPG o PNG!",

      type: "error",

      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",

      text: "¡La imagen no debe pesar más de 2MB!",

      type: "error",

      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();

    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*=============================================

EDITAR PASAPORTE

=============================================*/

$(".tablaClientes tbody").on("click", "button.btnEditarCliente", function () {
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

      if (respuesta["passport_image"] != "") {
        $("#imagenActual").val(respuesta["passport_image"]);
        $(".previsualizar").attr("src", respuesta["passport_image"]);
      } else {
        $(".previsualizarEditar").attr(
          "src",
          "vistas/img/clientes/default/cliente.png"
        );
      }
    },
  });
});

/*=============================================
MOSTRAR INFO CLIENTE
=============================================*/

$(".tablaClientes tbody").on("click", ".btnInfoCliente", function () {
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
      if (respuesta["passport_image"] != "") {
        $("#imagenActual").val(respuesta["passport_image"]);
        $(".previsualizar").attr("src", respuesta["passport_image"]);
      } else {
        $(".previsualizarEditar").attr(
          "src",
          "vistas/img/clientes/default/cliente.png"
        );
      }
    },
  });
});

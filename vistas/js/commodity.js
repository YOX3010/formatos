/*=============================================
EDITAR COMMODITY
=============================================*/

$(".tablas").on("click", ".btnEditarCommodity", function () {
  var idCommodity = $(this).attr("idCommodity");

  var datos = new FormData();

  datos.append("idCommodity", idCommodity);

  $.ajax({
    url: "ajax/commodity.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idCommodity").val(respuesta["id"]);
      $("#editarCommodity").val(respuesta["commodity"]);
      $("#editarPriceCliente").val(respuesta["price_cliente"]);
      $("#editarPriceProvedor").val(respuesta["price_provedor"]);
      $("#editarFichaTecnica").val(respuesta["ficha_tecnica"]);
    },
  });
});

/*=============================================
ELIMINAR COMMODITY
=============================================*/

// $(".tablas").on("click", ".btnEliminarCommodity", function(){

// 	 var idMarca = $(this).attr("idCommodity");

// 	 swal({

// 	 	title: '¿Está seguro de borrar La COMMODITY?',
// 	 	text: "¡Si no lo está puede cancelar la acción!",
// 	 	type: 'warning',
// 	 	showCancelButton: true,
// 	 	confirmButtonColor: '#3085d6',
// 	 	cancelButtonColor: '#d33',
// 	 	cancelButtonText: 'Cancelar',
// 	 	confirmButtonText: 'Si, borrar COMMODITY!'

// 	 }).then(function(result){

// 	 	if(result.value){

// 	 		window.location = "index.php?ruta=inspecciones-reparaciones&idCommodity="+idCommodity;

// 	 	}

// 	 })

// })

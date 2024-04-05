/*=============================================
EDITAR INCOTERMS
=============================================*/

$(".tablas").on("click", ".btnEditarIncoterms", function () {
  var idIncoterms = $(this).attr("idIncoterms");

  var datos = new FormData();

  datos.append("idIncoterms", idIncoterms);

  $.ajax({
    url: "ajax/incoterms.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idIncoterms").val(respuesta["id"]);
      $("#editarIncoterm").val(respuesta["incoterm"]);
      $("#editarProcedimiento").val(respuesta["procedimiento"]);
    },
  });
});

/*=============================================
ELIMINAR INCOTERMS
=============================================*/

// $(".tablas").on("click", ".btnEliminarIncoterms", function(){

// 	 var idMarca = $(this).attr("idIncoterms");

// 	 swal({

// 	 	title: '¿Está seguro de borrar La Incoterms?',
// 	 	text: "¡Si no lo está puede cancelar la acción!",
// 	 	type: 'warning',
// 	 	showCancelButton: true,
// 	 	confirmButtonColor: '#3085d6',
// 	 	cancelButtonColor: '#d33',
// 	 	cancelButtonText: 'Cancelar',
// 	 	confirmButtonText: 'Si, borrar Incoterms!'

// 	 }).then(function(result){

// 	 	if(result.value){

// 	 		window.location = "index.php?ruta=inspecciones-reparaciones&idIncoterms="+idIncoterms;

// 	 	}

// 	 })

// })

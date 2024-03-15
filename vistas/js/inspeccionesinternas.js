/*=============================================
EDITAR INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnEditarInspeccionInterna", function(){

	var idInspeccionInterna = $(this).attr("idInspeccionInterna");

	var datos = new FormData();

	datos.append("idInspeccionInterna", idInspeccionInterna);

	$.ajax({

		url: "ajax/inspeccionesinternas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idInspeccionInterna").val(respuesta["id"]);
     		$("#editarInspeccionInterna").val(respuesta["elemento"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnEliminarInspeccionInterna", function(){

	 var idMarca = $(this).attr("idInspeccionInterna");

	 swal({

	 	title: '¿Está seguro de borrar La Inspeccion Interna?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Inspeccion Interna!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=inspeccion-interna&idInspeccionInterna="+idInspeccionInterna;

	 	}

	 })

})
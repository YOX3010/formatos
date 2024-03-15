/*=============================================
EDITAR MODELO
=============================================*/

$(".tablas").on("click", ".btnEditarModelo", function(){

	var idModelo = $(this).attr("idModelo");

	var datos = new FormData();

	datos.append("idModelo", idModelo);

	$.ajax({

		url: "ajax/modelos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idModelo").val(respuesta["id"]);
     		$("#editarModelo").val(respuesta["modelo"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR MODELO
=============================================*/

$(".tablas").on("click", ".btnEliminarModelo", function(){

	 var idModelo = $(this).attr("idModelo");

	 swal({

	 	title: '¿Está seguro de borrar El Modelo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Modelo!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=modelos&idModelo="+idModelo;

	 	}

	 })

})
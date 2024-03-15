/*=============================================
EDITAR TIPO VEHICULO 
=============================================*/

$(".tablas").on("click", ".btnEditarTipo", function(){

	var idTipo = $(this).attr("idTipo");

	var datos = new FormData();

	datos.append("idTipo", idTipo);

	$.ajax({

		url: "ajax/tipos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idTipo").val(respuesta["id"]);
     		$("#editarTipo").val(respuesta["tipo"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR TIPO VEHICULO
=============================================*/

$(".tablas").on("click", ".btnEliminarTipo", function(){

	 var idTipo = $(this).attr("idTipo");

	 swal({

	 	title: '¿Está seguro de borrar El Tipo Vehiculo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Tipo Vehiculo!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=vehiculos-tipos&idTipo="+idTipo;

	 	}

	 })

})
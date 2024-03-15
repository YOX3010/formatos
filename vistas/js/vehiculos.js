/*=============================================
EDITAR VEHICULO
=============================================*/

$(".tablas").on("click", ".btnEditarVehiculo", function(){

	var idVehiculo = $(this).attr("idVehiculo");

	var datos = new FormData();

	datos.append("idVehiculo", idVehiculo);

	$.ajax({

		url: "ajax/vehiculos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idVehiculo").val(respuesta["id"]);
     		$("#editarVehiculo").val(respuesta["id_marca"]);
     		$("#editarModelo").val(respuesta["id_modelo"]);
     		$("#editarYear").val(respuesta["year"]);
			$("#editarTipo").val(respuesta["id_tipo"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR VEHICULO
=============================================*/

$(".tablas").on("click", ".btnEliminarVehiculo", function(){

	 var idVehiculo = $(this).attr("idVehiculo");

	 swal({

	 	title: '¿Está seguro de borrar El Vehiculo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Vehiculo!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=vehiculos&idvehiculo="+idVehiculo;

	 	}

	 })

})
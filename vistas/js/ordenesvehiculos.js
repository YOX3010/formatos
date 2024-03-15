/*=============================================
EDITAR ORDEN VEHICULO
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenVehiculo", function(){

	var idOrdenVehiculo = $(this).attr("idOrdenVehiculo");

	var datos = new FormData();

	datos.append("idOrdenVehiculo", idOrdenVehiculo);

	$.ajax({

		url: "ajax/ordenesvehiculos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idOrdenVehiculo").val(respuesta["id"]);
     		$("#editarOrdenVehiculo").val(respuesta["id_orden"]);
     		$("#editarVehiculo").val(respuesta["id_vehiculo"]);
     		$("#editarPlaca").val(respuesta["placa"]);
			$("#editarColor").val(respuesta["color"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR ORDEN VEHICULO
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenVehiculo", function(){

	 var idOrdenVehiculo = $(this).attr("idOrdenVehiculo");

	 swal({

	 	title: '¿Está seguro de borrar La Orden Vehiculo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar La Orden Vehiculo!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=ordenes-vehiculos&idOrdenVehiculo="+idOrdenVehiculo;

	 	}

	 })

})
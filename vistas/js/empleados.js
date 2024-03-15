/*=============================================
EDITAR EMPLEADO
=============================================*/

$(".tablas").on("click", ".btnEditarEmpleado", function(){

	var idEmpleado = $(this).attr("idEmpleado");

	var datos = new FormData();

	datos.append("idEmpleado", idEmpleado);

	$.ajax({

		url: "ajax/empleados.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idEmpleado").val(respuesta["id"]);
     		$("#editarEmpleado").val(respuesta["cedula"]);
     		$("#editarStatus").val(respuesta["status"]);
     		$("#editarCondicion").val(respuesta["condicion"]);
			$("#editarNombres").val(respuesta["nombres"]);
			$("#editarApellidos").val(respuesta["apellidos"]);
			$("#editarDireccion").val(respuesta["direccion"]);
			$("#editarCelular").val(respuesta["celular"]);
			$("#editarCorreo").val(respuesta["correo"]);
			$("#editarCargo").val(respuesta["id_cargo"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR EMPLEADO
=============================================*/

$(".tablas").on("click", ".btnEliminarEmpleado", function(){

	 var idEmpleado = $(this).attr("idEmpleado");

	 swal({

	 	title: '¿Está seguro de borrar El Empleado?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Empleado!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=empleados&idempleado="+idEmpleado;

	 	}

	 })

})
/*=============================================
EDITAR ORDEN DE SERVICIO
=============================================*/

$(".tablas").on("click", ".btnEditarOrden", function(){

	var idOrden = $(this).attr("idOrden");

	var datos = new FormData();

	datos.append("idOrden", idOrden);

	$.ajax({

		url: "ajax/ordenes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idOrden").val(respuesta["id"]);
     		$("#editarUsuario").val(respuesta["id_usuario"]);
     		$("#editarCliente").val(respuesta["id_cliente"]);
     		$("#editarFecha_ingreso").val(respuesta["fecha_ingreso"]);
			$("#editarFecha_salida").val(respuesta["fecha_salida"]);
			$("#editarEmpleado").val(respuesta["empleado"]);
			$("#editarStatus_reparacion").val(respuesta["status_reparacion"]);
			$("#editarObservaciones").val(respuesta["observaciones"]);
     		
     	}

	})

})

/*=============================================
BOTON EDITAR INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccion", function(){

	var idOrdenInspeccion = $(this).attr("idOrdenInspeccion");

	window.location = "index.php?ruta=ordenes-inspecciones&idOrdenInspeccion="+idOrdenInspeccion;

})
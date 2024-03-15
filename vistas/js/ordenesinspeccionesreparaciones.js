/*=============================================
EDITAR ORDEN INSPECCION REPARACION
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccionReparacion", function(){

	var idOrdenInspeccionReparacion = $(this).attr("idOrdenInspeccionReparacion");

	var datos = new FormData();

	datos.append("idOrdenInspeccionReparacion", idOrdenInspeccionReparacion);

	$.ajax({

		url: "ajax/ordenesinspeccionesreparaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idOrdenInspeccionReparacion").val(respuesta["id"]);
     		$("#editarOrdenInspeccionReparacion").val(respuesta["id_orden"]);
     		$("#editarReparacion").val(respuesta["reparacion"]);     		
			$("#editarCosto").val(respuesta["costo"]);
			$("#editarPrecio").val(respuesta["precio"]);
     		
     	}

	})

})

/*=============================================
BOTON EDITAR ORDEN INSPECCION REPARACION
=============================================*/

$(".tablas").on("click", ".btnOrdenInspeccionReparacion", function(){

	var idOrdenInspeccionReparacion = $(this).attr("idOrdenInspeccionReparacion");

	window.location = "index.php?ruta=ordenes-inspecciones-reparaciones&idOrdenInspeccionReparacion="+idOrdenInspeccionReparacion;

})
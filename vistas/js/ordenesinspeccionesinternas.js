/*=============================================
EDITAR ORDEN INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccionInterna", function(){

	var idOrdenInspeccionInterna = $(this).attr("idOrdenInspeccionInterna");

	var datos = new FormData();

	datos.append("idOrdenInspeccionInterna", idOrdenInspeccionInterna);

	$.ajax({

		url: "ajax/ordenesinspeccionesinternas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idOrdenInspeccionInterna").val(respuesta["id"]);
     		$("#editarOrdenInspeccionInterna").val(respuesta["id_orden"]);
     		$("#editarElemento").val(respuesta["id_elemento"]);
     		$("#editarCondicion").val(respuesta["condicion"]);
			$("#editarObservacion").val(respuesta["observacion"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR ORDEN INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenInspeccionInterna", function(){

	 var idOrdenVehiculo = $(this).attr("idOrdenInspeccionInterna");

	 swal({

	 	title: '¿Está seguro de borrar La Inspeccion Interna?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar La Inspeccion Interna!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=ordenes-inspecciones-internas&idOrdenInspeccionInterna="+idOrdenInspeccionInterna;

	 	}

	 })

})

/*=============================================
BOTON EDITAR ORDEN INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnOrdenInspeccionInterna", function(){

	var idOrdenInspeccionInterna = $(this).attr("idOrdenInspeccionInterna");

	window.location = "index.php?ruta=ordenes-inspecciones-internas&idOrdenInspeccionInterna="+idOrdenInspeccionInterna;

})
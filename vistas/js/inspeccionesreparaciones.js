/*=============================================
EDITAR INSPECCION REPARACION
=============================================*/

$(".tablas").on("click", ".btnEditarInspeccionReparacion", function(){

	var idInspeccionReparacion = $(this).attr("idInspeccionReparacion");

	var datos = new FormData();

	datos.append("idInspeccionReparacion", idInspeccionReparacion);

	$.ajax({

		url: "ajax/inspeccionesreparaciones.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",

     	success: function(respuesta){

     		$("#idInspeccionReparacion").val(respuesta["id"]);
     		$("#editarInspeccionReparacion").val(respuesta["reparacion"]);
     		
     	}

	})

})

/*=============================================
ELIMINAR INSPECCION REPARACION
=============================================*/

$(".tablas").on("click", ".btnEliminarInspeccionReparacion", function(){

	 var idMarca = $(this).attr("idInspeccionReparacion");

	 swal({

	 	title: '¿Está seguro de borrar La Inspeccion Reparacion?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Inspeccion Reparacion!'

	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=inspecciones-reparaciones&idInspeccionReparacion="+idInspeccionReparacion;

	 	}

	 })

})
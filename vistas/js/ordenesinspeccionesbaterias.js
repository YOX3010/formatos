/*=============================================
EDITAR ORDEN INSPECCION BATERÍA
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccionBateria", function () {

	var idOrdenInspeccionBateria = $(this).attr("idOrdenInspeccionBateria");

	var datos = new FormData();

	datos.append("idOrdenInspeccionBateria", idOrdenInspeccionBateria);

	$.ajax({

		url: "ajax/ordenesinspeccionesbaterias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (respuesta) {

			$("#idOrdenInspeccionBateria").val(respuesta["id"]);
			$("#editarOrdenInspeccionBateria").val(respuesta["id_orden"]);
			$("#editarElemento").val(respuesta["id_elemento"]);
			$("#editarMarca").val(respuesta["id_marca"]);
			$("#editarCondicion").val(respuesta["condicion"]);
			$("#editarSerial").val(respuesta["serial"]);
			$("#editarObservacion").val(respuesta["observacion"]);

		}

	})

})

/*=============================================
ELIMINAR ORDEN INSPECCION BATERÍA
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenInspeccionBateria", function () {

	var idOrdenVehiculo = $(this).attr("idOrdenInspeccionBateria");

	swal({

		title: '¿Está seguro de borrar La Inspeccion Bateria?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar La Inspeccion Bateria!'

	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=ordenes-inspecciones-baterias&idOrdenInspeccionBateria=" + idOrdenInspeccionBateria;

		}

	})

})

/*=============================================
BOTON EDITAR ORDEN INSPECCION BATERIA
=============================================*/

$(".tablas").on("click", ".btnOrdenInspeccionBateria", function(){

	var idOrdenInspeccionBateria = $(this).attr("idOrdenInspeccionBateria");

	window.location = "index.php?ruta=ordenes-inspecciones-baterias&idOrdenInspeccionBateria="+idOrdenInspeccionBateria;

})
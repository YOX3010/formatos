/*=============================================
EDITAR ORDEN INSPECCION NEUMATICOS
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccionNeumatico", function () {

	var idOrdenInspeccionNeumatico = $(this).attr("idOrdenInspeccionNeumatico");

	var datos = new FormData();

	datos.append("idOrdenInspeccionNeumatico", idOrdenInspeccionNeumatico);

	$.ajax({

		url: "ajax/ordenesinspeccionesneumaticos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (respuesta) {

			$("#idOrdenInspeccionNeumatico").val(respuesta["id"]);
			$("#editarOrdenInspeccionNeumatico").val(respuesta["id_orden"]);
			$("#editarElemento").val(respuesta["id_elemento"]);
			$("#editarCondicion").val(respuesta["condicion"]);
			$("#editarObservaciones").val(respuesta["observaciones"]);

		}

	})

})

/*=============================================
ELIMINAR ORDEN INSPECCION NEUMATICOS
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenInspeccionNeumatico", function () {

	var idOrdenVehiculo = $(this).attr("idOrdenInspeccionNeumatico");

	swal({

		title: '¿Está seguro de borrar La Inspeccion del Neumatico?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar La Inspeccion del Neumatico!'

	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=ordenes-inspecciones-neumaticos&idOrdenInspeccionNeumatico=" + idOrdenInspeccionNeumatico;

		}

	})

})

/*=============================================
BOTON EDITAR ORDEN INSPECCION NEUMATICO
=============================================*/

$(".tablas").on("click", ".btnOrdenInspeccionNeumatico", function(){

	var idOrdenInspeccionNeumatico = $(this).attr("idOrdenInspeccionNeumatico");

	window.location = "index.php?ruta=ordenes-inspecciones-neumaticos&idOrdenInspeccionNeumatico="+idOrdenInspeccionNeumatico;

})
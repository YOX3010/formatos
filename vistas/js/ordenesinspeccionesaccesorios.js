/*=============================================
EDITAR ORDEN INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccionAccesorio", function () {

	var idOrdenInspeccionAccesorio = $(this).attr("idOrdenInspeccionAccesorio");

	var datos = new FormData();

	datos.append("idOrdenInspeccionAccesorio", idOrdenInspeccionAccesorio);

	$.ajax({

		url: "ajax/ordenesinspeccionesaccesorios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (respuesta) {

			$("#idOrdenInspeccionAccesorio").val(respuesta["id"]);
			$("#editarOrdenInspeccionAccesorio").val(respuesta["id_orden"]);
			$("#editarElemento").val(respuesta["id_elemento"]);
			$("#editarCondicion").val(respuesta["condicion"]);
			$("#editarObservaciones").val(respuesta["observaciones"]);

		}

	})

})

/*=============================================
ELIMINAR ORDEN INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenInspeccionAccesorio", function () {

	var idOrdenVehiculo = $(this).attr("idOrdenInspeccionAccesorio");

	swal({

		title: '¿Está seguro de borrar La Inspeccion del Accesorio?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar La Inspeccion del Accesorio!'

	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=ordenes-inspecciones-accesorios&idOrdenInspeccionAccesorio=" + idOrdenInspeccionAccesorio;

		}

	})

})

/*=============================================
BOTON EDITAR ORDEN INSPECCION ACCESORIOS
=============================================*/

$(".tablas").on("click", ".btnOrdenInspeccionAccesorio", function(){

	var idOrdenInspeccionAccesorio = $(this).attr("idOrdenInspeccionAccesorio");

	window.location = "index.php?ruta=ordenes-inspecciones-accesorios&idOrdenInspeccionAccesorio="+idOrdenInspeccionAccesorio;

})
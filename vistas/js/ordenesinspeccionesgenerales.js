/*=============================================
EDITAR ORDEN INSPECCION GENERALES
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenInspeccionGeneral", function () {

	var idOrdenInspeccionGeneral = $(this).attr("idOrdenInspeccionGeneral");

	var datos = new FormData();

	datos.append("idOrdenInspeccionGeneral", idOrdenInspeccionGeneral);

	$.ajax({

		url: "ajax/ordenesinspeccionesgenerales.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (respuesta) {

			$("#idOrdenInspeccionGeneral").val(respuesta["id"]);
			$("#editarOrdenInspeccionGeneral").val(respuesta["id_orden"]);
			$("#editarElemento").val(respuesta["id_elemento"]);
			$("#editarCondicion").val(respuesta["condicion"]);
			$("#editarObservaciones").val(respuesta["observaciones"]);

		}

	})

})

/*=============================================
ELIMINAR ORDEN INSPECCION GENERALES
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenInspeccionGeneral", function () {

	var idOrdenVehiculo = $(this).attr("idOrdenInspeccionGeneral");

	swal({

		title: '¿Está seguro de borrar La Inspeccion General?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar La Inspeccion General!'

	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=ordenes-inspecciones-generales&idOrdenInspeccionGeneral=" + idOrdenInspeccionGeneral;

		}

	})

})

/*=============================================
BOTON EDITAR ORDEN INSPECCION INTERNA
=============================================*/

$(".tablas").on("click", ".btnOrdenInspeccionGeneral", function(){

	var idOrdenInspeccionGeneral = $(this).attr("idOrdenInspeccionGeneral");

	window.location = "index.php?ruta=ordenes-inspecciones-generales&idOrdenInspeccionGeneral="+idOrdenInspeccionGeneral;

})
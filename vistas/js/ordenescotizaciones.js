/*=============================================
EDITAR ORDEN COTIZACIONES
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenCotizacion", function () {

	var idOrdenCotizacion = $(this).attr("idOrdenCotizacion");

	var datos = new FormData();

	datos.append("idOrdenCotizacion", idOrdenCotizacion);

	$.ajax({

		url: "ajax/ordenescotizaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (respuesta) {

			$("#idOrdenCotizacion").val(respuesta["id"]);
			$("#editarOrdenCotizacion").val(respuesta["id_orden"]);
			$("#editarReparacion").val(respuesta["id_reparacion"]);
			$("#editarCosto").val(respuesta["costo"]);
			$("#editarPrecio").val(respuesta["precio"]);

		}

	})

})

/*=============================================
ELIMINAR ORDEN  Cotizaciones
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenCotizacion", function () {

	var idOrdenVehiculo = $(this).attr("idOrdenCotizacion");

	swal({

		title: '¿Está seguro de borrar La Cotizacion?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar La Cotizacion!'

	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=ordenes-cotizaciones&idOrdenCotizacion=" + idOrdenCotizacion;

		}

	})

})

/*=============================================
BOTON EDITAR ORDEN COTIZACION
=============================================*/

$(".tablas").on("click", ".btnOrdenCotizacion", function(){

	var idOrdenCotizacion = $(this).attr("idOrdenCotizacion");

	window.location = "index.php?ruta=ordenes-cotizaciones&idOrdenCotizacion="+idOrdenCotizacion;

})
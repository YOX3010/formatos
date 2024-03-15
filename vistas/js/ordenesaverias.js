/*=============================================
EDITAR ORDEN AVERIA
=============================================*/

$(".tablas").on("click", ".btnEditarOrdenAveria", function () {

	var idOrdenAveria = $(this).attr("idOrdenAveria");

	var datos = new FormData();

	datos.append("idOrdenAveria", idOrdenAveria);

	$.ajax({

		url: "ajax/ordenesaverias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function (respuesta) {

			$("#idOrdenAveria").val(respuesta["id"]);
			$("#editarOrdenAveria").val(respuesta["id_orden"]);
			$("#editarAveria").val(respuesta["averia"]);

		}

	})

})

/*=============================================
ELIMINAR ORDEN AVERIA
=============================================*/

$(".tablas").on("click", ".btnEliminarOrdenAveria", function () {

	var idOrdenVehiculo = $(this).attr("idOrdenAveria");

	swal({

		title: '¿Está seguro de borrar La Averia?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar La Averia!'

	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=ordenes-averias&idOrdenAveria=" + idOrdenAveria;

		}

	})

})

/*=============================================
BOTON EDITAR ORDEN AVERIA
=============================================*/

$(".tablas").on("click", ".btnOrdenAveria", function(){

	var idOrdenAveria = $(this).attr("idOrdenAveria");

	window.location = "index.php?ruta=ordenes-averias&idOrdenAveria="+idOrdenAveria;

})
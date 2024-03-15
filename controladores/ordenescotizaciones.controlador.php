<?php

class ControladorOrdenesCotizaciones
{

	/*=============================================
	CREAR ORDEN COTIZACIONES
	=============================================*/

	static public function ctrCrearOrdenCotizacion()
	{

		if (isset($_POST["nuevoOrdenCotizacion"])) {

			$tabla = "ordenes_cotizaciones";

			$datos = array(
				"id_orden" => $_POST["nuevoOrdenCotizacion"],
				"id_reparacion" => $_POST["nuevoReparacion"],
				"costo" => $_POST["nuevoCosto"],
				"precio" => $_POST["nuevoPrecio"]
			);


			$respuesta = ModeloOrdenesCotizaciones::mdlIngresarOrdenCotizacion($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Cotizacion ha sido guardada correctamente Recuerde Actualizar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location.close

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Cotizacion!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-cotizaciones";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR ORDENES COTIZACIONES
	=============================================*/

	static public function ctrMostrarOrdenesCotizaciones($item, $valor)
	{

		$tabla = "ordenes_cotizaciones";

		$respuesta = ModeloOrdenesCotizaciones::mdlMostrarOrdenesCotizaciones($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ORDEN COTIZACIONES
	=============================================*/

	static public function ctrEditarOrdenCotizacion()
	{

		if (isset($_POST["editarOrdenCotizacion"])) {

			$tabla = "ordenes_cotizaciones";

			$datos = array(
				"id_orden" => $_POST["editarOrdenCotizacion"],
				"id_reparacion" => $_POST["editarReparacion"],
				"costo" => $_POST["editarCosto"],
				"precio" => $_POST["editarPrecio"],
				"id" => $_POST["idOrdenCotizacion"]
			);

			$respuesta = ModeloOrdenesCotizaciones::mdlEditarOrdenCotizacion($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Cotizacion ha sido Editada correctamente Recuerde Actualizar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location.close

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Cotizacion!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-cotizaciones";

							}

						})

			  	</script>';
			}
		}
	}
}

<?php

class ControladorOrdenesAverias
{

	/*=============================================
	CREAR ORDEN AVERIA
	=============================================*/

	static public function ctrCrearOrdenAveria()
	{

		if (isset($_POST["nuevoOrdenAveria"])) {

			$tabla = "ordenes_averias";

			$datos = array(
				"id_orden" => $_POST["nuevoOrdenAveria"],
				"averia" => $_POST["nuevoAveria"],
			);


			$respuesta = ModeloOrdenesAverias::mdlIngresarOrdenAveria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Averia ha sido guardada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Guardar La Averia!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-averias";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR ORDENES AVERIAS
	=============================================*/

	static public function ctrMostrarOrdenesAverias($item, $valor)
	{

		$tabla = "ordenes_averias";

		$respuesta = ModeloOrdenesAverias::mdlMostrarOrdenesAverias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ORDEN AVERIA
	=============================================*/

	static public function ctrEditarOrdenAveria()
	{

		if (isset($_POST["editarOrdenAveria"])) {

			$tabla = "ordenes_averias";

			$datos = array(
				"id_orden" => $_POST["editarOrdenAveria"],
				"averia" => $_POST["editarAveria"],
				"id" => $_POST["idOrdenAveria"]
			);

			$respuesta = ModeloOrdenesAverias::mdlEditarOrdenAveria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Averia ha sido Editada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar La Averia!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-averias";

							}

						})

			  	</script>';
			}
		}
	}
}

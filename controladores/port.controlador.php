<?php

class ControladorPort
{

	/*=============================================
	CREAR PORT
	=============================================*/

	static public function ctrCrearPort()
	{

		if (isset($_POST["nuevoPort"])) {

			$tabla = "port";

			$datos = array("port" => $_POST["nuevoPort"]);


			$respuesta = ModeloPort::mdlIngresarPort($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Puerto ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "port";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Puerto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "port";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR PORT
	=============================================*/

	static public function ctrMostrarPort($item, $valor)
	{

		$tabla = "port";

		$respuesta = ModeloPort::mdlMostrarPort($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR PORT
	=============================================*/

	static public function ctrEditarPort()
	{

		if (isset($_POST["editarPort"])) {

			$tabla = "port";

			$datos = array(
				"port" => $_POST["editarPort"],
				"id" => $_POST["idPort"]
			);

			$respuesta = ModeloPort::mdlEditarPort($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Puerto ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "port";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Puerto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "port";

							}

						})

			  	</script>';
			}
		}
	}
}

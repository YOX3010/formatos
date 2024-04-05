<?php

class ControladorUM
{

	/*=============================================
	CREAR UM
	=============================================*/

	static public function ctrCrearUM()
	{

		if (isset($_POST["nuevoUM"])) {

			$tabla = "um";

			$datos = array("unidad" => $_POST["nuevoUnidad"]);


			$respuesta = ModeloUM::mdlIngresarUM($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Puerto ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "um";

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

							window.location = "um";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR UM
	=============================================*/

	static public function ctrMostrarUM($item, $valor)
	{

		$tabla = "um";

		$respuesta = ModeloUM::mdlMostrarUM($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR UM
	=============================================*/

	static public function ctrEditarUM()
	{

		if (isset($_POST["editarUM"])) {

			$tabla = "um";

			$datos = array(
				"unidad" => $_POST["editarUnidad"],
				"id" => $_POST["idUM"]
			);

			$respuesta = ModeloUM::mdlEditarUM($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Puerto ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "um";

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

							window.location = "um";

							}

						})

			  	</script>';
			}
		}
	}
}

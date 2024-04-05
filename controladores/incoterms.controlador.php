<?php

class ControladorIncoterms
{

	/*=============================================
	CREAR INCOTERMS
	=============================================*/

	static public function ctrCrearIncoterms()
	{

		if (isset($_POST["nuevoIncoterms"])) {

			$tabla = "incoterms";

			$datos = array(
				"incoterm" => $_POST["nuevoIncoterm"],
				"procedimiento" => $_POST["nuevoProcedimiento"],
			);


			$respuesta = ModeloIncoterms::mdlIngresarIncoterms($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "incoterms";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Producto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "incoterms";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR INCOTERMS
	=============================================*/

	static public function ctrMostrarIncoterms($item, $valor)
	{

		$tabla = "incoterms";

		$respuesta = ModeloIncoterms::mdlMostrarIncoterms($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR INCOTERMS
	=============================================*/

	static public function ctrEditarIncoterms()
	{

		if (isset($_POST["editarIncoterms"])) {

			$tabla = "incoterms";

			$datos = array(
				"incoterm" => $_POST["editarIncoterm"],
				"procedimiento" => $_POST["editarProcedimiento"],
				"id" => $_POST["idIncoterms"]
			);

			$respuesta = ModeloIncoterms::mdlEditarIncoterms($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Producto ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "incoterms";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Producto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "incoterms";

							}

						})

			  	</script>';
			}
		}
	}
}

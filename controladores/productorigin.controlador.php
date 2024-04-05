<?php

class ControladorProductOrigin
{

	/*=============================================
	CREAR PRODUCT ORIGIN
	=============================================*/

	static public function ctrCrearProductOrigin()
	{

		if (isset($_POST["nuevoProductOrigin"])) {

			$tabla = "product_origin";

			$datos = array("origin" => $_POST["nuevoProductOrigin"]);


			$respuesta = ModeloProductOrigin::mdlIngresarProductOrigin($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Origen ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "product-origin";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Origen!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "product-origin";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR PRODUCT ORIGIN
	=============================================*/

	static public function ctrMostrarProductOrigin($item, $valor)
	{

		$tabla = "product_origin";

		$respuesta = ModeloProductOrigin::mdlMostrarProductOrigin($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR PRODUCT ORIGIN
	=============================================*/

	static public function ctrEditarProductOrigin()
	{

		if (isset($_POST["editarProductOrigin"])) {

			$tabla = "product_origin";

			$datos = array(
				"origin" => $_POST["editarProductOrigin"],
				"id" => $_POST["idProductOrigin"]
			);

			$respuesta = ModeloProductOrigin::mdlEditarProductOrigin($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Origen ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "product-origin";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Origen!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "product-origin";

							}

						})

			  	</script>';
			}
		}
	}
}

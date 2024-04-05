<?php

class ControladorLOI
{

	/*=============================================
	CREAR LOI
	=============================================*/

	static public function ctrCrearLOI()
	{

		if (isset($_POST["nuevoLOI"])) {

			$tabla = "loi";

			$datos = array(
				"id_clientes" => $_POST["nuevoCliente"],
				"codigo" => $_POST["nuevoCodigo"],
				"descripcion" => $_POST["nuevoDescripcion"],
				"loi_image" => $_POST["nuevoLoiImage"],
			);


			$respuesta = ModeloLOI::mdlIngresarLOI($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "El LOI ha sido guardado correctamente, No olvide Actualizar",
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
						  title: "¡Error al Guardar El LOI!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location.close

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR LOI
	=============================================*/

	static public function ctrMostrarLOI($item, $valor)
	{

		$tabla = "loi";

		$respuesta = ModeloLOI::mdlMostrarLOI($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR LOI
	=============================================*/

	static public function ctrEditarLOI()
	{

		if (isset($_POST["editarLOI"])) {

			$tabla = "loi";

			$datos = array(
				"id_clientes" => $_POST["editarCliente"],
				"codigo" => $_POST["editarCodigo"],
				"descripcion" => $_POST["editarDescripcion"],
				"loi_image" => $_POST["editarLoiImage"],
				"id" => $_POST["idLOI"]
			);

			$respuesta = ModeloLOI::mdlEditarLOI($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "El LOI ha sido Editada correctamente, No olvide Actualizar",
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
						  title: "¡Error al Editar El LOI!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location.close

							}

						})

			  	</script>';
			}
		}
	}
}

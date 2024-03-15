<?php

class ControladorMarcasBaterias
{

	/*=============================================
	CREAR MARCAS BATERÍA
	=============================================*/

	static public function ctrCrearMarcasBateria()
	{

		if (isset($_POST["nuevoMarcaBateria"])) {

			$tabla = "marcas_baterias";

			$datos = array("marca" => $_POST["nuevoMarcaBateria"]);


			$respuesta = ModeloMarcasBaterias::mdlIngresarMarcasbateria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Marca de la Batería ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "marcas-baterias";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Marca de la Batería!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "marcas-baterias";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR MARCAS BATERÍAS
	=============================================*/

	static public function ctrMostrarMarcasBaterias($item, $valor)
	{

		$tabla = "marcas_baterias";

		$respuesta = ModeloMarcasBaterias::mdlMostrarMarcasBaterias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR MARCAS BATERÍA
	=============================================*/

	static public function ctrEditarMarcaBateria()
	{

		if (isset($_POST["editarMarcaBateria"])) {

			$tabla = "marcas_baterias";

			$datos = array(
				"marca" => $_POST["editarMarcaBateria"],
				"id" => $_POST["idMarcaBateria"]
			);

			$respuesta = ModeloMarcasBaterias::mdlEditarMarcaBateria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Marca de Batería ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "marcas-baterias";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Marca de Batería!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inspecciones-baterias";

							}

						})

			  	</script>';
			}
		}
	}
}

<?php

class ControladorInspeccionesNeumaticos
{

	/*=============================================
	CREAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrCrearInspeccionNeumatico()
	{

		if (isset($_POST["nuevoInspeccionNeumatico"])) {

			$tabla = "inspecciones_neumaticos";

			$datos = array("elemento" => $_POST["nuevoInspeccionNeumatico"]);


			$respuesta = ModeloInspeccionesNeumaticos::mdlIngresarInspeccionNeumatico($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion del neumático ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "inspecciones-neumaticos";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Inspeccion del neumático!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inspecciones-neumaticos";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR INSPECCIONES NEUMATICOS
	=============================================*/

	static public function ctrMostrarInspeccionesNeumaticos($item, $valor)
	{

		$tabla = "inspecciones_neumaticos";

		$respuesta = ModeloInspeccionesNeumaticos::mdlMostrarInspeccionesNeumaticos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrEditarInspeccionNeumatico()
	{

		if (isset($_POST["editarInspeccionNeumatico"])) {

			$tabla = "inspecciones_neumaticos";

			$datos = array(
				"elemento" => $_POST["editarInspeccionNeumatico"],
				"id" => $_POST["idInspeccionNeumatico"]
			);

			$respuesta = ModeloInspeccionesNeumaticos::mdlEditarInspeccionNeumatico($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Batería ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inspecciones-neumaticos";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Inspeccion de Neumáticos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inspecciones-neumaticos";

							}

						})

			  	</script>';
			}
		}
	}
}

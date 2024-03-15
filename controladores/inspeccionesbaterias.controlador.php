<?php

class ControladorInspeccionesBaterias
{

	/*=============================================
	CREAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrCrearInspeccionBateria()
	{

		if (isset($_POST["nuevoInspeccionBateria"])) {

			$tabla = "inspecciones_baterias";

			$datos = array("elemento" => $_POST["nuevoInspeccionBateria"]);


			$respuesta = ModeloInspeccionesBaterias::mdlIngresarInspeccionBateria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Batería ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "inspecciones-baterias";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Inspeccion de Baterías!",
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

	/*=============================================
	MOSTRAR INSPECCIONES BATERÍAS
	=============================================*/

	static public function ctrMostrarInspeccionesBaterias($item, $valor)
	{

		$tabla = "inspecciones_baterias";

		$respuesta = ModeloInspeccionesBaterias::mdlMostrarInspeccionesBaterias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrEditarInspeccionBateria()
	{

		if (isset($_POST["editarInspeccionBateria"])) {

			$tabla = "inspecciones_baterias";

			$datos = array(
				"elemento" => $_POST["editarInspeccionBateria"],
				"id" => $_POST["idInspeccionBateria"]
			);

			$respuesta = ModeloInspeccionesBaterias::mdlEditarInspeccionBateria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Batería ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inspecciones-baterias";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Inspeccion de Baterías!",
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

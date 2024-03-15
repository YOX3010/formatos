<?php

class ControladorOrdenesInspeccionesNeumaticos
{

	/*=============================================
	CREAR ORDEN INSPECCION NEUMATICOS
	=============================================*/

	static public function ctrCrearOrdenInspeccionNeumatico()
	{

		if (isset($_POST["nuevoOrdenInspeccionNeumatico"])) {

			$tabla = "ordenes_inspecciones_neumaticos";

			$datos = array(
				"id_orden" => $_POST["nuevoOrdenInspeccionNeumatico"],
				"id_elemento" => $_POST["nuevoElemento"],
				"condicion" => $_POST["nuevoCondicion"],
				"observaciones" => $_POST["nuevoObservaciones"]
			);


			$respuesta = ModeloOrdenesInspeccionesNeumaticos::mdlIngresarOrdenInspeccionNeumatico($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion del Neumático ha sido guardada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Guardar La Inspeccion del Neumatico!",
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
	MOSTRAR ORDENES INSPECCIONES NEUMATICOS
	=============================================*/

	static public function ctrMostrarOrdenesInspeccionesNeumaticos($item, $valor)
	{

		$tabla = "ordenes_inspecciones_neumaticos";

		$respuesta = ModeloOrdenesInspeccionesNeumaticos::mdlMostrarOrdenesInspeccionesNeumaticos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ORDEN INSPECCION NEUMATICOS
	=============================================*/

	static public function ctrEditarOrdenInspeccionNeumatico()
	{

		if (isset($_POST["editarOrdenInspeccionNeumatico"])) {

			$tabla = "ordenes_inspecciones_neumaticos";

			$datos = array(
				"id_orden" => $_POST["editarOrdenInspeccionNeumatico"],
				"id_elemento" => $_POST["editarElemento"],
				"condicion" => $_POST["editarCondicion"],
				"observaciones" => $_POST["editarObservaciones"],
				"id" => $_POST["idOrdenInspeccionNeumatico"]
			);

			$respuesta = ModeloOrdenesInspeccionesNeumaticos::mdlEditarOrdenInspeccionNeumatico($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion del Neumatico ha sido Editada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar La Inspeccion del Neumatico!",
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

<?php

class ControladorOrdenesInspeccionesGenerales
{

	/*=============================================
	CREAR ORDEN INSPECCION GENERALES
	=============================================*/

	static public function ctrCrearOrdenInspeccionGeneral()
	{

		if (isset($_POST["nuevoOrdenInspeccionGeneral"])) {

			$tabla = "ordenes_inspecciones_generales";

			$datos = array(
				"id_orden" => $_POST["nuevoOrdenInspeccionGeneral"],
				"id_elemento" => $_POST["nuevoElemento"],
				"condicion" => $_POST["nuevoCondicion"],
				"observaciones" => $_POST["nuevoObservaciones"]
			);


			$respuesta = ModeloOrdenesInspeccionesGenerales::mdlIngresarOrdenInspeccionGeneral($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion General ha sido guardada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Guardar La Inspeccion General!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-generales";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR ORDENES INSPECCIONES GENERALES
	=============================================*/

	static public function ctrMostrarOrdenesInspeccionesGenerales($item, $valor)
	{

		$tabla = "ordenes_inspecciones_generales";

		$respuesta = ModeloOrdenesInspeccionesGenerales::mdlMostrarOrdenesInspeccionesGenerales($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ORDEN INSPECCION GENERALES
	=============================================*/

	static public function ctrEditarOrdenInspeccionGeneral()
	{

		if (isset($_POST["editarOrdenInspeccionGeneral"])) {

			$tabla = "ordenes_inspecciones_generales";

			$datos = array(
				"id_orden" => $_POST["editarOrdenInspeccionGeneral"],
				"id_elemento" => $_POST["editarElemento"],
				"condicion" => $_POST["editarCondicion"],
				"observaciones" => $_POST["editarObservaciones"],
				"id" => $_POST["idOrdenInspeccionGeneral"]
			);

			$respuesta = ModeloOrdenesInspeccionesGenerales::mdlEditarOrdenInspeccionGeneral($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion General ha sido Editada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar La Inspeccion General!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-generales";

							}

						})

			  	</script>';
			}
		}
	}
}

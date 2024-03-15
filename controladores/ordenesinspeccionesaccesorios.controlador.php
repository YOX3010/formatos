<?php

class ControladorOrdenesInspeccionesAccesorios
{

	/*=============================================
	CREAR ORDEN INSPECCION ACCESORIOS
	=============================================*/

	static public function ctrCrearOrdenInspeccionAccesorio()
	{

		if (isset($_POST["nuevoOrdenInspeccionAccesorio"])) {

			$tabla = "ordenes_inspecciones_accesorios";

			$datos = array(
				"id_orden" => $_POST["nuevoOrdenInspeccionAccesorio"],
				"id_elemento" => $_POST["nuevoElemento"],
				"condicion" => $_POST["nuevoCondicion"],
				"observaciones" => $_POST["nuevoObservaciones"]
			);


			$respuesta = ModeloOrdenesInspeccionesAccesorios::mdlIngresarOrdenInspeccionAccesorio($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion Accesorio ha sido guardada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Guardar La Inspeccion Accesorio!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-accesorios";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR ORDENES INSPECCIONES ACCESORIOS
	=============================================*/

	static public function ctrMostrarOrdenesInspeccionesAccesorios($item, $valor)
	{

		$tabla = "ordenes_inspecciones_accesorios";

		$respuesta = ModeloOrdenesInspeccionesAccesorios::mdlMostrarOrdenesInspeccionesAccesorios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ORDEN INSPECCION ACCESORIOS
	=============================================*/

	static public function ctrEditarOrdenInspeccionAccesorio()
	{

		if (isset($_POST["editarOrdenInspeccionAccesorio"])) {

			$tabla = "ordenes_inspecciones_accesorios";

			$datos = array(
				"id_orden" => $_POST["editarOrdenInspeccionAccesorio"],
				"id_elemento" => $_POST["editarElemento"],
				"condicion" => $_POST["editarCondicion"],
				"observaciones" => $_POST["editarObservaciones"],
				"id" => $_POST["idOrdenInspeccionAccesorio"]
			);

			$respuesta = ModeloOrdenesInspeccionesAccesorios::mdlEditarOrdenInspeccionAccesorio($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion Accesorio ha sido Editada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar La Inspeccion Accesorio!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-accesorios";

							}

						})

			  	</script>';
			}
		}
	}
}

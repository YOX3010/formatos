<?php

class ControladorOrdenesInspeccionesBaterias
{

	/*=============================================
	CREAR ORDEN INSPECCION BATERÍAS
	=============================================*/

	static public function ctrCrearOrdenInspeccionBateria()
	{

		if (isset($_POST["nuevoOrdenInspeccionBateria"])) {

			$tabla = "ordenes_inspecciones_baterias";

			$datos = array(
				"id_orden" => $_POST["nuevoOrdenInspeccionBateria"],
				"id_elemento" => $_POST["nuevoElemento"],
				"condicion" => $_POST["nuevoCondicion"],
				"serial" => $_POST["nuevoSerial"],
				"observacion" => $_POST["nuevoObservacion"],
				"id_marca" => $_POST["nuevoMarca"]);

			$respuesta = ModeloOrdenesInspeccionesBaterias::mdlIngresarOrdenInspeccionBateria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion Batería ha sido guardada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Guardar La Inspeccion Bateria!",
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
	MOSTRAR ORDENES INSPECCIONES BATERÍAS
	=============================================*/

	static public function ctrMostrarOrdenesInspeccionesBaterias($item, $valor)
	{

		$tabla = "ordenes_inspecciones_baterias";

		$respuesta = ModeloOrdenesInspeccionesBaterias::mdlMostrarOrdenesInspeccionesBaterias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ORDEN INSPECCION BATERÍAS
	=============================================*/

	static public function ctrEditarOrdenInspeccionBateria()
	{

		if (isset($_POST["editarOrdenInspeccionBateria"])) {

			$tabla = "ordenes_inspecciones_baterias";

			$datos = array(
				"id_orden" => $_POST["editarOrdenInspeccionBateria"],
				"id_elemento" => $_POST["editarElemento"],
				"condicion" => $_POST["editarCondicion"],
				"observacion" => $_POST["editarObservacion"],
				"serial" => $_POST["editarSerial"],
				"id_marca" => $_POST["editarMarca"],
				"id" => $_POST["idOrdenInspeccionBateria"]);			

			$respuesta = ModeloOrdenesInspeccionesBaterias::mdlEditarOrdenInspeccionBateria($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "La Inspeccion Bateria ha sido Editada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar La Inspeccion Bateria!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-baterias";

							}

						})

			  	</script>';
			}
		}
	}
}

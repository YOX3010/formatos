<?php

class ControladorInspeccionesReparaciones
{

	/*=============================================
	CREAR INSPECCION REPARACION
	=============================================*/

	static public function ctrCrearInspeccionReparacion()
	{

		if (isset($_POST["nuevoInspeccionReparacion"])) {

			$tabla = "inspecciones_reparaciones";

			$datos = array("reparacion" => $_POST["nuevoInspeccionReparacion"]);


			$respuesta = ModeloInspeccionesReparaciones::mdlIngresarInspeccionReparacion($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Reparacion ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "inspecciones-reparaciones";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Inspeccion de Reparacion!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inspecciones-reparaciones";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR INSPECCIONES REPARACIONES
	=============================================*/

	static public function ctrMostrarInspeccionesReparaciones($item, $valor)
	{

		$tabla = "inspecciones_reparaciones";

		$respuesta = ModeloInspeccionesReparaciones::mdlMostrarInspeccionesReparaciones($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR INSPECCION REPARACION
	=============================================*/

	static public function ctrEditarInspeccionReparacion()
	{

		if (isset($_POST["editarInspeccionReparacion"])) {

			$tabla = "inspecciones_reparaciones";

			$datos = array(
				"reparacion" => $_POST["editarInspeccionReparacion"],
				"id" => $_POST["idInspeccionReparacion"]
			);

			$respuesta = ModeloInspeccionesReparaciones::mdlEditarInspeccionReparacion($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Reparacion ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inspecciones-reparaciones";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Inspeccion de Reparacion!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "inspecciones-reparaciones";

							}

						})

			  	</script>';
			}
		}
	}
}

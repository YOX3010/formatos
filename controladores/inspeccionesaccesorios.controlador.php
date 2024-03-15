<?php

class ControladorInspeccionesAccesorios
{

	/*=============================================
	CREAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrCrearInspeccionAccesorio()
	{

		if (isset($_POST["nuevoInspeccionAccesorio"])) {

			$tabla = "inspecciones_accesorios";

			$datos = array("elemento" => $_POST["nuevoInspeccionAccesorio"]);


			$respuesta = ModeloInspeccionesAccesorios::mdlIngresarInspeccionAccesorio($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion del neumático ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "inspecciones-accesorios";

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

							window.location = "inspecciones-accesorios";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR INSPECCIONES ACCESORIOS
	=============================================*/

	static public function ctrMostrarInspeccionesAccesorios($item, $valor)
	{

		$tabla = "inspecciones_accesorios";

		$respuesta = ModeloInspeccionesAccesorios::mdlMostrarInspeccionesAccesorios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrEditarInspeccionAccesorio()
	{

		if (isset($_POST["editarInspeccionAccesorio"])) {

			$tabla = "inspecciones_accesorios";

			$datos = array(
				"elemento" => $_POST["editarInspeccionAccesorio"],
				"id" => $_POST["idInspeccionAccesorio"]
			);

			$respuesta = ModeloInspeccionesAccesorios::mdlEditarInspeccionAccesorio($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Batería ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inspecciones-accesorios";

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

							window.location = "inspecciones-accesorios";

							}

						})

			  	</script>';
			}
		}
	}
}

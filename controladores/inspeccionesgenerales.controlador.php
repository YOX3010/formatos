<?php

class ControladorInspeccionesGenerales
{

	/*=============================================
	CREAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrCrearInspeccionGeneral()
	{

		if (isset($_POST["nuevoInspeccionGeneral"])) {

			$tabla = "inspecciones_generales";

			$datos = array("elemento" => $_POST["nuevoInspeccionGeneral"]);


			$respuesta = ModeloInspeccionesGenerales::mdlIngresarInspeccionGeneral($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion del neumático ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "inspecciones-generales";

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

							window.location = "inspecciones-generales";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR INSPECCIONES GENERALES
	=============================================*/

	static public function ctrMostrarInspeccionesGenerales($item, $valor)
	{

		$tabla = "inspecciones_generales";

		$respuesta = ModeloInspeccionesGenerales::mdlMostrarInspeccionesGenerales($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR INSPECCION BATERÍA
	=============================================*/

	static public function ctrEditarInspeccionGeneral()
	{

		if (isset($_POST["editarInspeccionGeneral"])) {

			$tabla = "inspecciones_generales";

			$datos = array(
				"elemento" => $_POST["editarInspeccionGeneral"],
				"id" => $_POST["idInspeccionGeneral"]
			);

			$respuesta = ModeloInspeccionesGenerales::mdlEditarInspeccionGeneral($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Inspeccion de Batería ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inspecciones-generales";

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

							window.location = "inspecciones-generales";

							}

						})

			  	</script>';
			}
		}
	}
}

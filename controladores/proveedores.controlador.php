<?php

class ControladorProveedores
{

	/*=============================================
	CREAR PROVEEDOR
	=============================================*/

	static public function ctrCrearProveedor()
	{

		if (isset($_POST["nuevoProveedor"])) {

			$tabla = "proveedores";

			$datos = array(
				"proveedor"	=> $_POST["nuevoNombreProveedor"],
				"refineria"	=> $_POST["nuevoRefineria"],
				"id_origin"	=> $_POST["nuevoOrigin"],
			);

			$respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El Proveedor ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "proveedores";

									}

								})
					</script>';
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡Error al Guardar El Proveedor!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

							if (result.value) {

							window.location = "proveedores";

							}

						})
			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR PROVEEDORES
	=============================================*/

	static public function ctrMostrarProveedores($item, $valor)
	{

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/

	static public function ctrEditarProveedor()
	{

		if (isset($_POST["editarProveedor"])) {

			$tabla = "proveedores";

			$datos = array(
				"id" => $_POST["idProveedor"],
				"proveedor"	=> $_POST["editarNombreProveedor"],
				"refineria"	=> $_POST["editarRefineria"],
				"id_origin"	=> $_POST["editarOrigin"],
			);

			$respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El Proveedor ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "proveedores";

									}
								})
					</script>';
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡Error al Editar el Proveedor!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

							if (result.value) {

							window.location = "proveedores";

							}

						})
			  	</script>';
			}
		}
	}

	/*=============================================
	ELIMINAR PROVEEDOR
	=============================================*/

	static public function ctrEliminarProveedor()
	{

		if (isset($_GET["idProveedor"])) {

			$tabla = "proveedores";
			$datos = $_GET["idProveedor"];

			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El Proveedor ha sido borrado correctamente",					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){

								if (result.value) {

								window.location = "proveedores";

								}
							})
				</script>';
			}
		}
	}
}

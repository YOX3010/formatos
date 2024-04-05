<?php

class ControladorClientes
{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente()
	{

		if (isset($_POST["nuevoCliente"])) {

			$tabla = "clientes";

			$datos = array(
				"cosignee" => $_POST["nuevoCosignee"],
				"signatory" => $_POST["nuevoSignatory"],
				"position" => $_POST["nuevoPosition"],
				"email" => $_POST["nuevoEmail"],
				"direccion" => $_POST["nuevaDireccion"],
				"telefono" => $_POST["nuevoTelefono"],
				"bank_name" => $_POST["nuevoBankName"],
				"bank_address" => $_POST["nuevoBankAddress"],
				"swift" => $_POST["nuevoSwift"],
				"account_number" => $_POST["nuevoAccountNumber"],
				"passport_number_country" => $_POST["nuevoPassportNumberCountry"],
				"passport_issue_date" => $_POST["nuevoPassportIssueDate"],
				"passport_expiration_date" => $_POST["nuevoPassportExpirationDate"],
				"passport_image" => $_POST["nuevoPassportImage"],
			);

			$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "clientes";

									}

								})
					</script>';
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

							if (result.value) {

							window.location = "clientes";

							}

						})
			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor)
	{

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente()
	{

		if (isset($_POST["editarCliente"])) {

			$tabla = "clientes";

			$datos = array(
				"id" => $_POST["idCliente"],
				"cosignee" => $_POST["editarCosignee"],
				"signatory" => $_POST["editarSignatory"],
				"position" => $_POST["editarPosition"],
				"email" => $_POST["editarEmail"],
				"direccion" => $_POST["editarDireccion"],
				"telefono" => $_POST["editarTelefono"],
				"bank_name" => $_POST["editarBankName"],
				"bank_address" => $_POST["editarBankAddress"],
				"swift" => $_POST["editarSwift"],
				"account_number" => $_POST["editarAccountNumber"],
				"passport_number_country" => $_POST["editarPassportNumberCountry"],
				"passport_issue_date" => $_POST["editarPassportIssueDate"],
				"passport_expiration_date" => $_POST["editarPassportExpirationDate"],
				"passport_image" => $_POST["editarPassportImage"]
			);

			$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "clientes";

									}
								})
					</script>';
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

							if (result.value) {

							window.location = "clientes";

							}

						})
			  	</script>';
			}
		}
	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente()
	{

		if (isset($_GET["idCliente"])) {

			$tabla = "clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente", showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){

								if (result.value) {

								window.location = "clientes";

								}
							})
				</script>';
			}
		}
	}
}

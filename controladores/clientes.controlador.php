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
				"crn" => $_POST["nuevoCRN"],
				"bank_name" => $_POST["nuevoBankName"],
				"bank_address" => $_POST["nuevoBankAddress"],
				"swift" => $_POST["nuevoSwift"],
				"bank_officer_name" => $_POST["nuevoOfficerName"],
				"bank_officer_position" => $_POST["nuevoOfficerPosition"],
				"bank_officer_phone" => $_POST["nuevoOfficerPhone"],
				"bank_officer_email" => $_POST["nuevoEmail"],
				"account_number" => $_POST["nuevoAccountNumber"],
				"country" => $_POST["nuevoCountry"],
				"passport_number" => $_POST["nuevoPassportNumber"],
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
				"crn" => $_POST["editarCRN"],
				"bank_name" => $_POST["editarBankName"],
				"bank_address" => $_POST["editarBankAddress"],
				"swift" => $_POST["editarSwift"],
				"bank_officer_name" => $_POST["editarOfficerName"],
				"bank_officer_position" => $_POST["editarOfficerPosition"],
				"bank_officer_phone" => $_POST["editarOfficerPhone"],
				"bank_officer_email" => $_POST["editarOfficerEmail"],
				"account_number" => $_POST["editarAccountNumber"],
				"country" => $_POST["editarCountry"],
				"passport_number" => $_POST["editarPassportNumber"],
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

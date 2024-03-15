<?php

class ControladorFormato3
{

	/*=============================================
	CREAR FORMATO 3
	=============================================*/

	static public function ctrCrearFormato3()
	{

		if (isset($_POST["nuevoFormato3"])) {

			$tabla = "formato_3";

			$datos = array(
				"commercial_invoice" => $_POST["nuevoCommercialInvoice"],
				"date_form" => $_POST["nuevoDateForm"],
				"cosignee" => $_POST["nuevoCosignee"],
				"signatory" => $_POST["nuevoSignatory"],
				"address" => $_POST["nuevoAddress"],
				"telephone" => $_POST["nuevoTelephone"],
				"email" => $_POST["nuevoEmail"],
				"commodity" => $_POST["nuevoCommodity"],
				"quantity" => $_POST["nuevoQuantity"],
				"unit_price" => $_POST["nuevoUnitPrice"],
				"total_gross_amount" => $_POST["nuevoTotalGrossAmount"],
				"terms_delivery_destination_port" => $_POST["nuevoTermsDeliveryDestinationPort"],
				"terms_payment" => $_POST["nuevoTermsPayment"],
				"fright_insurance_charges" => $_POST["nuevoInsuranceCharges"],
				"seller_account_detail" => $_POST["nuevoSellerAccountDetail"],
				"bank_name" => $_POST["nuevoBankName"],
				"bank_address" => $_POST["nuevoBankAddress"],
				"account_name" => $_POST["nuevoAccountName"],
				"account_number" => $_POST["nuevoAccountNumber"],
				"swift" => $_POST["nuevoSwift"],
				"buyer_bank_name" => $_POST["nuevoBuyerBankName"],
				"bank_address_buyer" => $_POST["nuevoBankAddressBuyer"],
				"account_holder" => $_POST["nuevoAccountHolder"],
				"swift_code" => $_POST["nuevoSwiftCode"],
				"account_number_buyer" => $_POST["nuevoAccountNumberBuyer"],
			);


			$respuesta = ModeloFormato3::mdlIngresarFormato3($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "El Formato ha sido guardada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Guardar El Formato!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "formato-3";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR FORMATO 3
	=============================================*/

	static public function ctrMostrarFormato3($item, $valor)
	{

		$tabla = "formato_3";

		$respuesta = ModeloFormato3::mdlMostrarFormato3($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR FORMATO 3
	=============================================*/

	static public function ctrEditarFormato3()
	{

		if (isset($_POST["editarFormato3"])) {

			$tabla = "formato_3";

			$datos = array(
				"commercial_invoice" => $_POST["editarCommercialInvoice"],
				"date_form" => $_POST["editarDateForm"],
				"cosignee" => $_POST["editarCosignee"],
				"signatory" => $_POST["editarSignatory"],
				"address" => $_POST["editarAddress"],
				"telephone" => $_POST["editarTelephone"],
				"email" => $_POST["editarEmail"],
				"commodity" => $_POST["editarCommodity"],
				"quantity" => $_POST["editarQuantity"],
				"unit_price" => $_POST["editarUnitPrice"],
				"total_gross_amount" => $_POST["editarTotalGrossAmount"],
				"terms_delivery_destination_port" => $_POST["editarTermsDeliveryDestinationPort"],
				"terms_payment" => $_POST["editarTermsPayment"],
				"fright_insurance_charges" => $_POST["editarInsuranceCharges"],
				"seller_account_detail" => $_POST["editarSellerAccountDetail"],
				"bank_name" => $_POST["editarBankName"],
				"bank_address" => $_POST["editarBankAddress"],
				"account_name" => $_POST["editarAccountName"],
				"account_number" => $_POST["editarAccountNumber"],
				"swift" => $_POST["editarSwift"],
				"buyer_bank_name" => $_POST["editarBuyerBankName"],
				"bank_address_buyer" => $_POST["editarBankAddressBuyer"],
				"account_holder" => $_POST["editarAccountHolder"],
				"swift_code" => $_POST["editarSwiftCode"],
				"account_number_buyer" => $_POST["editarAccountNumberBuyer"],
				"id" => $_POST["idFormato3"]
			);

			$respuesta = ModeloFormato3::mdlEditarFormato3($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "warning",
						  title: "El Formato ha sido Editado correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar El Formato!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "formato-3";

							}

						})

			  	</script>';
			}
		}
	}
}

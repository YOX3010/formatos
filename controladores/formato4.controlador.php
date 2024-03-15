<?php

class ControladorFormato4
{

    /*=============================================
    CREAR FORMATO 4
    =============================================*/

    public static function ctrCrearFormato4()
    {

        if (isset($_POST["nuevoFormato4"])) {

            $tabla = "formato-4";

            $datos = array(
                "code" => $_POST["nuevoCode"],
                "ref_number" => $_POST["nuevoRefNumber"],
                "date_today" => $_POST["nuevoDateToday"],
                "to_client" => $_POST["nuevoToClient"],
                "trade_date" => $_POST["nuevoTradeDate"],
                "seller" => $_POST["nuevoSeller"],
                "product_name" => $_POST["nuevoProductName"],
                "shipping_terms_sale" => $_POST["nuevoShippingTermsSale"],
                "origin" => $_POST["nuevoOrigin"],
                "trial_quantity" => $_POST["nuevoTrialQuantity"],
                "contract_quantity" => $_POST["nuevoContractQuantity"],
                "duration_contract" => $_POST["nuevoDurationContract"],
                "target_price_usd" => $_POST["nuevoTargetPriceUsd"],
                "shipment_terms" => $_POST["nuevoShipmentTerms"],
                "vessel" => $_POST["nuevoVessel"],
                "inspection" => $_POST["nuevoInspection"],
                "insurance" => $_POST["nuevoInsurance"],
                "payment_method" => $_POST["nuevoPaymentMethod"],
                "qq_determination" => $_POST["nuevoQQDetermination"],
                "lay_time" => $_POST["nuevoLayTime"],
                "demurrage_rate" => $_POST["nuevoDemurrageRate"],
                "law" => $_POST["nuevoLaw"],
                "id_images" => $_POST["nuevoIdImages"],
            );

            $respuesta = ModeloFormato4::mdlIngresarFormato4($tabla, $datos);

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

							window.location = "formato-4";

							}

						})

			  	</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR FORMATO 4
    =============================================*/

    public static function ctrMostrarFormato4($item, $valor)
    {

        $tabla = "formato_4";

        $respuesta = ModeloFormato4::mdlMostrarFormato4($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR FORMATO 4
    =============================================*/

    public static function ctrEditarFormato4()
    {

        if (isset($_POST["editarFormato4"])) {

            $tabla = "formato_4";

            $datos = array(
                "code" => $_POST["editarCode"],
                "ref_number" => $_POST["editarRefNumber"],
                "date_today" => $_POST["editarDateToday"],
                "to_client" => $_POST["editarToClient"],
                "trade_date" => $_POST["editarTradeDate"],
                "seller" => $_POST["editarSeller"],
                "product_name" => $_POST["editarProductName"],
                "shipping_terms_sale" => $_POST["editarShippingTermsSale"],
                "origin" => $_POST["editarOrigin"],
                "trial_quantity" => $_POST["editarTrialQuantity"],
                "contract_quantity" => $_POST["editarContractQuantity"],
                "duration_contract" => $_POST["editarDurationContract"],
                "target_price_usd" => $_POST["editarTargetPriceUsd"],
                "shipment_terms" => $_POST["editarShipmentTerms"],
                "vessel" => $_POST["editarVessel"],
                "inspection" => $_POST["editarInspection"],
                "insurance" => $_POST["editarInsurance"],
                "payment_method" => $_POST["editarPaymentMethod"],
                "qq_determination" => $_POST["editarQQDetermination"],
                "lay_time" => $_POST["editarLayTime"],
                "demurrage_rate" => $_POST["editarDemurrageRate"],
                "law" => $_POST["editarLaw"],
                "id_images" => $_POST["editarIdImages"],
                "id" => $_POST["idFormato4"],
            );

            $respuesta = ModeloFormato4::mdlEditarFormato4($tabla, $datos);

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

							window.location = "formato-4";

							}

						})

			  	</script>';
            }
        }
    }
}

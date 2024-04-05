<?php

class ControladorFormato
{

    /*=============================================
    CREAR FORMATOS
    =============================================*/

    public static function ctrCrearFormato()
    {

        if (isset($_POST["nuevoFormato"])) {

            $tabla = "formatos";

            $datos = array(
                "cliente_to1" => $_POST["nuevoClienteTo1"],
                "cliente_mr1" => $_POST["nuevoClienteMr1"],
                "cliente_position1" => $_POST["nuevoClientePosition1"],
                "cliente_email1" => $_POST["nuevoClienteEmail1"],
                "cliente_cosignee" => $_POST["nuevoClienteCoignee"],
                "cliente_signatory" => $_POST["nuevoClienteSignatory"],
                "cliente_position" => $_POST["nuevoClientePosition"],
                "cliente_email" => $_POST["nuevoClienteEmail"],
                "cliente_address" => $_POST["nuevoClienteAddress"],
                "cliente_telephone" => $_POST["nuevoClienteTelephone"],
                "cliente_via" => $_POST["nuevoClienteVia"],
                "cliente_email_via" => $_POST["nuevoClienteEmailVia"],
                "cliente_bank_name" => $_POST["nuevoClienteBankName"],
                "cliente_bank_address" => $_POST["nuevoClienteBankAddress"],
                "cliente_swift_code" => $_POST["nuevoClienteSwiftCode"],
                "cliente_account_number" => $_POST["nuevoClienteAccountNumber"],
                "cliente_name_of_the_bank" => $_POST["nuevoClienteNameOfTheBank"],
                "cliente_branch_address" => $_POST["nuevoClienteBranchAddress"],
                "cliente_name_of_the_banking" => $_POST["nuevoClienteNameOfTheBanking"],
                "cliente_phone_number" => $_POST["nuevoClientePhoneNumber"],
                "cliente_fax_number" => $_POST["nuevoClienteFaxNumber"],
                "cliente_banking_officer_mail" => $_POST["nuevoClienteBankingOfficerMail"],
                "cliente_account_signatory_name" => $_POST["nuevoClienteAccountSignatoryName"],
                "cliente_account_name" => $_POST["nuevoClienteAccountName"],
                "cliente_account_number_routing_aba" => $_POST["nuevoClienteAccountNumberRoutingAba"],
                "cliente_swift" => $_POST["nuevoClienteSwift"],
                "sel_seller_account_details" => $_POST["nuevoSelSellerAccountDetails"],
                "sel_bank_name" => $_POST["nuevoSelBankName"],
                "sel_bank_address" => $_POST["nuevoSelBankAddress"],
                "sel_account_name" => $_POST["nuevoSelAccountName"],
                "sel_account_number" => $_POST["nuevoSelAccountNumber"],
                "sel_swift" => $_POST["nuevoSelSwift"],
                "validity_sco" => $_POST["nuevoValiditySco"],
                "commodity" => $_POST["nuevoCommodity"],
                "quantity" => $_POST["nuevoQuantity"],
                "price" => $_POST["nuevoPrice"],
                "incoterms" => $_POST["nuevoIncoterms"],
                "port" => $_POST["nuevoPort"],
                "product_origin" => $_POST["nuevoProductOrigin"],
                "contract_term" => $_POST["nuevoContractTerm"],
                "commission" => $_POST["nuevoCommission"],
                "commercial_invoice" => $_POST["nuevoCommercialInvoice"],
                "date_commercial_invoice" => $_POST["nuevoDateCommercialInvoice"],
                "total_gross_amount" => $_POST["nuevoTotalGrossAmount"],
                "terms_delivary_destination_port" => $_POST["nuevoTermsDeliveryDestinationPort"],
                "terms_payment" => $_POST["nuevoTermsPayment"],
                "freight_insurance_charges" => $_POST["nuevoFreightInsuranceCharge"],
                "id_imagenes_cliente" => $_POST["nuevoIdImagenesCliente"],
                "authentication_code" => $_POST["nuevoAuthenticationCode"],
                "ref_number" => $_POST["nuevoRefNumber"],
                "icpo_date" => $_POST["nuevoIcpoDate"],
                "icpo_to" => $_POST["nuevoIcpoTo"],
                "trade_date" => $_POST["nuevoTradeDate"],
                "seller" => $_POST["nuevoSeller"],
                "duration_contract" => $_POST["nuevoDurationContract"],
                "target_price" => $_POST["nuevoTargetPrice"],
                "vessel" => $_POST["nuevoVessel"],
                "inspection" => $_POST["nuevoInspection"],
                "insurance" => $_POST["nuevoInsurance"],
                "payment_method" => $_POST["nuevoPaymentMethod"],
                "qq_determination" => $_POST["nuevoQQDetermination"],
                "lay_time" => $_POST["nuevoLayTime"],
                "demurrage_rate" => $_POST["nuevoDemurrageRate"],
                "law" => $_POST["nuevoLaw"],
                "name" => $_POST["nuevoName"],
                "date_place_birth" => $_POST["nuevoDatePlaceBirth"],
                "passport_number_country_issue" => $_POST["nuevoNumberCountryIssue"],
                "passport_issue_date" => $_POST["nuevoIssueDate"],
                "passport_expiration_date" => $_POST["nuevoPassportExpirationDate"],
                "title_within_corporation_company" => $_POST["nuevoTitleWithinCorporationCompany"],
                "office_phone_number" => $_POST["nuevoOfficePhoneNumber"],
                "mobile_phone_number" => $_POST["nuevoMobilePhoneNumber"],
                "email_address" => $_POST["nuevoEmailAddress"],
                "id_imagenes" => $_POST["nuevoIdImagenes"],

            );

            $respuesta = ModeloFormato::mdlIngresarFormato($tabla, $datos);

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

							window.location = "formatos";

							}

						})

			  	</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR FORMATO
    =============================================*/

    public static function ctrMostrarFormato($item, $valor)
    {

        $tabla = "formatos";

        $respuesta = ModeloFormato::mdlMostrarFormato($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR FORMATO
    =============================================*/

    public static function ctrEditarFormato()
    {

        if (isset($_POST["editarFormato"])) {

            $tabla = "formatos";

            $datos = array(
                "cliente_to1" => $_POST["editarClienteTo1"],
                "cliente_mr1" => $_POST["editarClienteMr1"],
                "cliente_position1" => $_POST["editarClientePosition1"],
                "cliente_email1" => $_POST["editarClienteEmail1"],
                "cliente_cosignee" => $_POST["editarClienteCoignee"],
                "cliente_signatory" => $_POST["editarClienteSignatory"],
                "cliente_position" => $_POST["editarClientePosition"],
                "cliente_email" => $_POST["editarClienteEmail"],
                "cliente_address" => $_POST["editarClienteAddress"],
                "cliente_telephone" => $_POST["editarClienteTelephone"],
                "cliente_via" => $_POST["editarClienteVia"],
                "cliente_email_via" => $_POST["editarClienteEmailVia"],
                "cliente_bank_name" => $_POST["editarClienteBankName"],
                "cliente_bank_address" => $_POST["editarClienteBankAddress"],
                "cliente_swift_code" => $_POST["editarClienteSwiftCode"],
                "cliente_account_number" => $_POST["editarClienteAccountNumber"],
                "cliente_name_of_the_bank" => $_POST["editarClienteNameOfTheBank"],
                "cliente_branch_address" => $_POST["editarClienteBranchAddress"],
                "cliente_name_of_the_banking" => $_POST["editarClienteNameOfTheBanking"],
                "cliente_phone_number" => $_POST["editarClientePhoneNumber"],
                "cliente_fax_number" => $_POST["editarClienteFaxNumber"],
                "cliente_banking_officer_mail" => $_POST["editarClienteBankingOfficerMail"],
                "cliente_account_signatory_name" => $_POST["editarClienteAccountSignatoryName"],
                "cliente_account_name" => $_POST["editarClienteAccountName"],
                "cliente_account_number_routing_aba" => $_POST["editarClienteAccountNumberRoutingAba"],
                "cliente_swift" => $_POST["editarClienteSwift"],
                "sel_seller_account_details" => $_POST["editarSelSellerAccountDetails"],
                "sel_bank_name" => $_POST["editarSelBankName"],
                "sel_bank_address" => $_POST["editarSelBankAddress"],
                "sel_account_name" => $_POST["editarSelAccountName"],
                "sel_account_number" => $_POST["editarSelAccountNumber"],
                "sel_swift" => $_POST["editarSelSwift"],
                "id" => $_POST["idFormato"],
            );

            $respuesta = ModeloFormato::mdlEditarFormato($tabla, $datos);

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

							window.location = "formatos";

							}

						})

			  	</script>';
            }
        }
    }
}

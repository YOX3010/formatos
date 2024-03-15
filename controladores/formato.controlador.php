<?php

class ControladorFormato
{

    /*=============================================
    CREAR FORMATO 1
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
                "cliente_via" => $_POST["nuevoClienteVia"],
                "cliente_email_via" => $_POST["nuevoClienteEmailVia"],
                "validity_sco" => $_POST["nuevoValiditySco"],
                "commodity" => $_POST["nuevoCommodity"],
                "quantity" => $_POST["nuevoQuantity"],
                "price" => $_POST["nuevoPrice"],
                "incoterms" => $_POST["nuevoIncoterms"],
                "port" => $_POST["nuevoPort"],
                "product_origin" => $_POST["nuevoProductOrigin"],
                "contract_term" => $_POST["nuevoContractTerm"],
                "commission" => $_POST["nuevoCommission"],
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
                "name" => $_POST["nuevoName"],
                "date_place_birth" => $_POST["nuevoDatePlaceBirth"],
                "passport_number_country_issue" => $_POST["nuevoNumberCountryIssue"],
                "passport_issue_date" => $_POST["nuevoIssueDate"],
                "passport_expiration_date" => $_POST["nuevoPassportExpirationDate"],
                "title_within_corporation_company" => $_POST["nuevoTitleWithinCorporationCompany"],
                "office_phone_number" => $_POST["nuevoOfficePhoneNumber"],
                "mobile_phone_number" => $_POST["nuevoMobilePhoneNumber"],
                "email_address" => $_POST["nuevoEmailAddress"],
                "commercial_invoice" => $_POST["nuevoCommercialInvoice"],
                "date_commercial_invoice" => $_POST["nuevoDateCommercialInvoice"],
                "cliente_address" => $_POST["nuevoClienteAddress"],
                "cliente_telephone" => $_POST["nuevoClienteTelephone"],
                "total_gross_amount" => $_POST["nuevoTotalGrossAmount"],
                "terms_delivary_destination_port" => $_POST["nuevoTermsDeliveryDestinationPort"],
                "terms_payment" => $_POST["nuevoTermsPayment"],
                "freight_insurance_charges" => $_POST["nuevoFreightInsuranceCharge"],
                "sel_seller_account_details" => $_POST["nuevoSelSellerAccountDetails"],
                "sel_bank_name" => $_POST["nuevoSelBankName"],
                "sel_bank_address" => $_POST["nuevoSelBankAddress"],
                "sel_account_name" => $_POST["nuevoSelAccountName"],
                "sel_account_number" => $_POST["nuevoSelAccountNumber"],
                "sel_swift" => $_POST["nuevoSelSwift"],
                "cliente_bank_name" => $_POST["nuevoClienteBankName"],
                "cliente_bank_address" => $_POST["nuevoClienteBankAddress"],
                "cliente_swift_code" => $_POST["nuevoClienteSwiftCode"],
                "cliente_account_number" => $_POST["nuevoClienteAccountNumber"],
                "authentication_code" => $_POST["nuevoAuthenticationCode"],
                "ref_number" => $_POST["nuevoRefNumber"],
                "icpo_date" => $_POST["nuevoIcpoDate"],
                "icpo_to" => $_POST["nuevoIcpoTo"],
                "trade_date" => $_POST["nuevoTradeDate"],
                "seller" => $_POST["nuevoSeller"],
                "duration_contract" => $_POST["nuevoDurationContract"],
                "vessel" => $_POST["nuevoVessel"],
                "inspection" => $_POST["nuevoInspection"],
                "insurance" => $_POST["nuevoInsurance"],
                "payment_method" => $_POST["nuevoPaymentMethod"],
                "qq_determination" => $_POST["nuevoQQDetermination"],
                "lay_time" => $_POST["nuevoLayTime"],
                "demurrage_rate" => $_POST["nuevoDemurrageRate"],
                "law" => $_POST["nuevoLaw"],
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

							window.location = "formato";

							}

						})

			  	</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR FORMATO 1
    =============================================*/

    public static function ctrMostrarFormato($item, $valor)
    {

        $tabla = "formatos";

        $respuesta = ModeloFormato::mdlMostrarFormato($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR FORMATO 1
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
                "cliente_via" => $_POST["editarClienteVia"],
                "cliente_email_via" => $_POST["editarClienteEmailVia"],
                "validity_sco" => $_POST["editarValiditySco"],
                "commodity" => $_POST["editarCommodity"],
                "quantity" => $_POST["editarQuantity"],
                "price" => $_POST["editarPrice"],
                "incoterms" => $_POST["editarIncoterms"],
                "port" => $_POST["editarPort"],
                "product_origin" => $_POST["editarProductOrigin"],
                "contract_term" => $_POST["editarContractTerm"],
                "commission" => $_POST["editarCommission"],
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
                "name" => $_POST["editarName"],
                "date_place_birth" => $_POST["editarDatePlaceBirth"],
                "passport_number_country_issue" => $_POST["editarNumberCountryIssue"],
                "passport_issue_date" => $_POST["editarIssueDate"],
                "passport_expiration_date" => $_POST["editarPassportExpirationDate"],
                "title_within_corporation_company" => $_POST["editarTitleWithinCorporationCompany"],
                "office_phone_number" => $_POST["editarOfficePhoneNumber"],
                "mobile_phone_number" => $_POST["editarMobilePhoneNumber"],
                "email_address" => $_POST["editarEmailAddress"],
                "commercial_invoice" => $_POST["editarCommercialInvoice"],
                "date_commercial_invoice" => $_POST["editarDateCommercialInvoice"],
                "cliente_address" => $_POST["editarClienteAddress"],
                "cliente_telephone" => $_POST["editarClienteTelephone"],
                "total_gross_amount" => $_POST["editarTotalGrossAmount"],
                "terms_delivary_destination_port" => $_POST["editarTermsDeliveryDestinationPort"],
                "terms_payment" => $_POST["editarTermsPayment"],
                "freight_insurance_charges" => $_POST["editarFreightInsuranceCharge"],
                "sel_seller_account_details" => $_POST["editarSelSellerAccountDetails"],
                "sel_bank_name" => $_POST["editarSelBankName"],
                "sel_bank_address" => $_POST["editarSelBankAddress"],
                "sel_account_name" => $_POST["editarSelAccountName"],
                "sel_account_number" => $_POST["editarSelAccountNumber"],
                "sel_swift" => $_POST["editarSelSwift"],
                "cliente_bank_name" => $_POST["editarClienteBankName"],
                "cliente_bank_address" => $_POST["editarClienteBankAddress"],
                "cliente_swift_code" => $_POST["editarClienteSwiftCode"],
                "cliente_account_number" => $_POST["editarClienteAccountNumber"],
                "authentication_code" => $_POST["editarAuthenticationCode"],
                "ref_number" => $_POST["editarRefNumber"],
                "icpo_date" => $_POST["editarIcpoDate"],
                "icpo_to" => $_POST["editarIcpoTo"],
                "trade_date" => $_POST["editarTradeDate"],
                "seller" => $_POST["editarSeller"],
                "duration_contract" => $_POST["editarDurationContract"],
                "vessel" => $_POST["editarVessel"],
                "inspection" => $_POST["editarInspection"],
                "insurance" => $_POST["editarInsurance"],
                "payment_method" => $_POST["editarPaymentMethod"],
                "qq_determination" => $_POST["editarQQDetermination"],
                "lay_time" => $_POST["editarLayTime"],
                "demurrage_rate" => $_POST["editarDemurrageRate"],
                "law" => $_POST["editarLaw"],
                "id_imagenes" => $_POST["editarIdImagenes"],
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

							window.location = "formato";

							}

						})

			  	</script>';
            }
        }
    }
}

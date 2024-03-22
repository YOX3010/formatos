<?php

class ControladorFormato2
{

    /*=============================================
    CREAR FORMATO 2
    =============================================*/

    // public static function ctrCrearFormato2()
    // {

    //     if (isset($_POST["nuevoFormato2"])) {

    //         $tabla = "formato_2";

    //         $datos = array(
    //             "bank_name" => $_POST["nuevoBankName"],
    //             "branch_address" => $_POST["nuevoBranchAddress"],
    //             "banking_official_name" => $_POST["nuevoBankingOfficialName"],
    //             "phone_number" => $_POST["nuevoPhoneNumber"],
    //             "fax_number" => $_POST["nuevoFaxNumber"],
    //             "banking_oficer_mail" => $_POST["nuevoBankingOficerMail"],
    //             "account_signatory_name" => $_POST["nuevoAccountSignatory"],
    //             "account_name" => $_POST["nuevoAccountName"],
    //             "account_number_routing_aba" => $_POST["nuevoAccountNumberRoutingAba"],
    //             "swift_code" => $_POST["nuevoSwiftCode"],
    //             "name" => $_POST["nuevoName"],
    //             "date_place_birth" => $_POST["nuevoDatePlaceBirth"],
    //             "passport_number_country" => $_POST["nuevoPassportNumberCountry"],
    //             "passport_issue_date" => $_POST["nuevoPassportIssueDate"],
    //             "passport_expiration_date" => $_POST["nuevoPassportExpirationDate"],
    //             "title_corporation_company" => $_POST["nuevoTitleCorporationCompany"],
    //             "office_phone_number" => $_POST["nuevoOfficePhoneNumber"],
    //             "mobile_phone_number" => $_POST["nuevoMobilePhoneNumber"],
    //             "email_address" => $_POST["nuevoEmailAddress"],
    //         );

    //         $respuesta = ModeloFormato2::mdlIngresarFormato2($tabla, $datos);

    //         if ($respuesta == "ok") {

    //             echo '<script>

    // 				swal({

    // 					  type: "warning",
    // 					  title: "El Formato ha sido guardada correctamente Recuerde Actualizar",
    // 					  showConfirmButton: true,
    // 					  confirmButtonText: "Cerrar"
    // 					  }).then(function(result){

    // 								if (result.value) {

    // 								window.location.close

    // 								}

    // 							})

    // 				</script>';
    //         } else {

    //             echo '<script>

    // 				swal({

    // 					  type: "error",
    // 					  title: "¡Error al Guardar El Formato!",
    // 					  showConfirmButton: true,
    // 					  confirmButtonText: "Cerrar"
    // 					  }).then(function(result){
    // 						if (result.value) {

    // 						window.location = "formato-2";

    // 						}

    // 					})

    // 		  	</script>';
    //         }
    //     }
    // }

    /*=============================================
    MOSTRAR FORMATO 2
    =============================================*/

    public static function ctrMostrarFormato2($item, $valor)
    {

        $tabla = "formatos";

        $respuesta = ModeloFormato2::mdlMostrarFormato2($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR FORMATO 2
    =============================================*/

    public static function ctrEditarFormato2()
    {

        if (isset($_POST["editarFormato2"])) {

            $tabla = "formatos";

            $datos = array(
                "name" => $_POST["editarName"],
                "date_place_birth" => $_POST["editarDatePlaceBirth"],
                "passport_number_country_issue" => $_POST["editarNumberCountryIssue"],
                "passport_issue_date" => $_POST["editarIssueDate"],
                "passport_expiration_date" => $_POST["editarPassportExpirationDate"],
                "title_within_corporation_company" => $_POST["editarTitleWithinCorporationCompany"],
                "office_phone_number" => $_POST["editarOfficePhoneNumber"],
                "mobile_phone_number" => $_POST["editarMobilePhoneNumber"],
                "email_address" => $_POST["editarEmailAddress"],
                "id" => $_POST["idFormato2"],
            );

            $respuesta = ModeloFormato2::mdlEditarFormato2($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({

						  type: "warning",
						  title: "El Formato ha sido Editada correctamente Recuerde Actualizar",
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

							window.location = "formato-2";

							}

						})

			  	</script>';
            }
        }
    }
}

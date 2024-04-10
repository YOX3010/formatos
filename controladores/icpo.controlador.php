<?php

class ControladorICPO
{

    /*=============================================
    CREAR ICPO
    =============================================*/

    public static function ctrCrearICPO()
    {

        if (isset($_POST["nuevoICPO"])) {

            $tabla = "icpo";

            $datos = array(
                "id_sco" => $_POST["nuevoSCO"],
                "id_proveedor" => $_POST["nuevoNombreProveedor"],
                "authentication_code" => $_POST["nuevoAuthCode"],
                "ref_number" => $_POST["nuevoRefNumber"],
                "via" => $_POST["nuevoVia"],
                "trade_date" => $_POST["nuevoTradeDate"],
                "duration_contract" => $_POST["nuevoDurationContract"],
                "vessel" => $_POST["nuevoVessel"],
                "inspection" => $_POST["nuevoInspection"],
                "insurance" => $_POST["nuevoInsurance"],
                "qq_determination" => $_POST["nuevoQQ"],
                "demurrage_rate" => $_POST["nuevoDemurrageRate"],
            );

            $respuesta = ModeloICPO::mdlIngresarICPO($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

    				swal({

    					  type: "warning",
    					  title: "El ICPO ha sido guardado correctamente. Recuerde Actualizar",
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
    					  title: "¡Error al Guardar El ICPO!",
    					  showConfirmButton: true,
    					  confirmButtonText: "Cerrar"
    					  }).then(function(result){
    						if (result.value) {

    						window.location.close

    						}

    					})

    		  	</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR ICPO
    =============================================*/

    public static function ctrMostrarICPO($item, $valor)
    {

        $tabla = "icpo";

        $respuesta = ModeloICPO::mdlMostrarICPO($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR ICPO
    =============================================*/

    public static function ctrEditarICPO()
    {

        if (isset($_POST["editarICPO"])) {

            $tabla = "icpo";

            $datos = array(
                "id_sco" => $_POST["editarSCO"],
                "id_proveedor" => $_POST["editarProveedor"],
                "authentication_code" => $_POST["editarAuthCode"],
                "ref_number" => $_POST["editarRefNumber"],
                "via" => $_POST["editarVia"],
                "trade_date" => $_POST["editarTradeDate"],
                "duration_contract" => $_POST["editarDurationContract"],
                "vessel" => $_POST["editarVessel"],
                "inspection" => $_POST["editarInspection"],
                "insurance" => $_POST["editarInsurance"],
                "qq_determination" => $_POST["editarQQ"],
                "demurrage_rate" => $_POST["editarDemurrageRate"],
                "id" => $_POST["idICPO"],
            );

            $respuesta = ModeloICPO::mdlEditarICPO($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({

						  type: "warning",
						  title: "El ICPO ha sido Editado correctamente, Recuerde Actualizar",
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
						  title: "¡Error al Editar El ICPO!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location.close

							}

						})

			  	</script>';
            }
        }
    }
}

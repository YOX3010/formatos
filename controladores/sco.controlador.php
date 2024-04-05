<?php

class ControladorSCO
{

    /*=============================================
    CREAR SCO
    =============================================*/

    public static function ctrCrearSCO()
    {

        if (isset($_POST["nuevoSCO"])) {

            $tabla = "sco";

            $datos = array(
                "id_loi" => $_POST["nuevoLoi"],
                "id_clientes" => $_POST["nuevoClientes"],
                "id_usuario" => $_POST["nuevoUsuario"],
                "id_commodity" => $_POST["nuevoCommodity"],
                "id_port" => $_POST["nuevoPort"],
                "id_product_origin" => $_POST["nuevoProductOrigin"],
                "id_um" => $_POST["nuevoUM"],
                "id_incoterms" => $_POST["nuevoIncoterms"],
                "codigo" => $_POST["nuevoCodigo"],
                "via_cliente" => $_POST["nuevoViaCliente"],
                "email_via_cliente" => $_POST["nuevoEmailViaCliente"],
                "via_tpc" => $_POST["nuevoViaTpc"],
                "email_via_tpc" => $_POST["nuevoEmailViaTpc"],
                "validity_of_sco" => $_POST["nuevoValiditySco"],
                "quantity" => $_POST["nuevoQuantity"],
                "contract_terms" => $_POST["nuevoContractTerms"],
                "commission" => $_POST["nuevoCommission"],
            );

            $respuesta = ModeloSCO::mdlIngresarSCO($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

    				swal({

    					  type: "warning",
    					  title: "El SCO ha sido guardado correctamente. Recuerde Actualizar",
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
    					  title: "¡Error al Guardar El SCO!",
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
    MOSTRAR SCO
    =============================================*/

    public static function ctrMostrarSCO($item, $valor)
    {

        $tabla = "sco";

        $respuesta = ModeloSCO::mdlMostrarSCO($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR SCO
    =============================================*/

    public static function ctrEditarSCO()
    {

        if (isset($_POST["editarSCO"])) {

            $tabla = "sco";

            $datos = array(
                "id_loi" => $_POST["editarLoi"],
                "id_clientes" => $_POST["editarClientes"],
                "id_usuario" => $_POST["editarUsuario"],
                "id_commodity" => $_POST["editarCommodity"],
                "id_port" => $_POST["editarPort"],
                "id_product_origin" => $_POST["editarProductOrigin"],
                "id_um" => $_POST["editarUM"],
                "id_incoterms" => $_POST["editarIncoterms"],
                "codigo" => $_POST["editarCodigo"],
                "via_cliente" => $_POST["editarViaCliente"],
                "email_via_cliente" => $_POST["editarEmailViaCliente"],
                "via_tpc" => $_POST["editarViaTpc"],
                "email_via_tpc" => $_POST["editarEmailViaTpc"],
                "validity_of_sco" => $_POST["editarValiditySco"],
                "quantity" => $_POST["editarQuantity"],
                "contract_terms" => $_POST["editarContractTerms"],
                "commission" => $_POST["editarCommission"],
                "id" => $_POST["idSCO"],
            );

            $respuesta = ModeloSCO::mdlEditarSCO($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({

						  type: "warning",
						  title: "El SCO ha sido Editado correctamente, Recuerde Actualizar",
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
						  title: "¡Error al Editar El SCO!",
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

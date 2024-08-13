<?php

class ControladorSCO
{

    /*=============================================
    CREAR SCO
    =============================================*/

    public static function ctrCrearSCO()
    {

        if (isset($_POST["nuevoSCO"])) {

            $itemCliente = "id";
            $valorCliente = $_POST['nuevoClientes'];

            $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

            $cosignee = $respuestaCliente['cosignee'];

            $cosigneeWords = explode(" ", $cosignee);

            $cosigneeIniciales = "";

            foreach ($cosigneeWords as $words) {
                $cosigneeIniciales .= strtoupper($words[0]);
            }

            $vendedor = $_SESSION['nombre'];

            $vendedorWords = explode(" ", $vendedor);

            $vendedorIniciales = "";

            foreach ($vendedorWords as $vendedorWord) {
                $vendedorIniciales .= strtoupper(($vendedorWord[0]));
            }

            // Obtener la fecha actual

            date_default_timezone_set('America/Caracas');

            $fechaActual = date('Y-m-d');

            $fechaActual = str_replace('-', "", $fechaActual);

            $codigo = "TPC-" . $cosigneeIniciales . "-" . $vendedorIniciales . "-SCO-" . $fechaActual;

            $tabla = "sco";

            $datos = array(
                "id_loi" => $_POST["nuevoLoi"],
                "id_clientes" => $_POST["nuevoClientes"],
                "id_usuario" => $_POST["nuevoSCO"],
                "id_commodity" => $_POST["nuevoCommodity"],
                "id_port" => $_POST["nuevoPort"],
                "id_product_origin" => $_POST["nuevoProductOrigin"],
                "id_um" => $_POST["nuevoUM"],
                "id_incoterms" => $_POST["nuevoIncoterms"],
                "codigo" => $codigo,
                "via_cliente" => $_POST["nuevoViaCliente"],
                "email_via_cliente" => $_POST["nuevoEmailViaCliente"],
                "via_tpc" => $_POST["nuevoViaTpc"],
                "email_via_tpc" => $_POST["nuevoEmailViaTpc"],
                "validity_of_sco" => $_POST["nuevoValiditySco"],
                "quantity" => $_POST["nuevoQuantity"],
                "contract_terms" => $_POST["nuevoContractTerms"],
                "commission" => $_POST["nuevoCommission"],
                "observacion" => $_POST["nuevoObservacion"],
            );

            $respuesta = ModeloSCO::mdlIngresarSCO($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

    				swal({

    					  type: "success",
    					  title: "El SCO ha sido guardado correctamente",
    					  showConfirmButton: true,
    					  confirmButtonText: "Cerrar"
    					  }).then(function(result){

    								if (result.value) {

    								window.location = "index.php?ruta=sco&idLoi=' . $_POST["nuevoLoi"] . '&idCliente=' . $_POST["nuevoClientes"] . '"

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
                "id_usuario" => $_POST["editarSCO"],
                "id_commodity" => $_POST["editarCommodity"],
                "id_port" => $_POST["editarPort"],
                "id_product_origin" => $_POST["editarProductOrigin"],
                "id_um" => $_POST["editarUM"],
                "id_incoterms" => $_POST["editarIncoterms"],
                "via_cliente" => $_POST["editarViaCliente"],
                "email_via_cliente" => $_POST["editarEmailViaCliente"],
                "via_tpc" => $_POST["editarViaTpc"],
                "email_via_tpc" => $_POST["editarEmailViaTpc"],
                "validity_of_sco" => $_POST["editarValiditySco"],
                "quantity" => $_POST["editarQuantity"],
                "contract_terms" => $_POST["editarContractTerms"],
                "commission" => $_POST["editarCommission"],
                "observacion" => $_POST["editarObservacion"],
                "id" => $_POST["idSCO"],
            );

            $respuesta = ModeloSCO::mdlEditarSCO($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({

                        type: "success",
                        title: "El SCO ha sido Editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=sco&idLoi=' . $_POST["editarLoi"] . '&idCliente=' . $_POST["editarClientes"] . '"

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

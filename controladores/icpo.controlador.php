<?php

class ControladorICPO
{

    /*=============================================
    CREAR ICPO
    =============================================*/

    public static function ctrCrearICPO()
    {

        if (isset($_POST["nuevoICPO"])) {

            $itemProveedor = "id";
            $valorProveedor = $_POST['nuevoNombreProveedor'];

            $respuestaProveedor = ControladorProveedores::ctrMostrarProveedores($itemProveedor, $valorProveedor);

            $proveedor = $respuestaProveedor['proveedor'];

            $proveedorWords = explode(" ", $proveedor);

            $proveedorIniciales = "";

            foreach ($proveedorWords as $proveedorWord) {
                $proveedorIniciales .= strtoupper(($proveedorWord[0]));
            }

            $usuarioTPC = $_SESSION['nombre'];

            $usuarioTPCWords = explode(" ", $usuarioTPC);

            $usuarioTPCIniciales = "";

            foreach ($usuarioTPCWords as $usuarioTPCWord) {
                $usuarioTPCIniciales .= strtoupper(($usuarioTPCWord[0]));
            }

            date_default_timezone_set('America/Caracas');

            $fechaActual = date('Y-m-d');

            $fechaActual = str_replace('-', "", $fechaActual);

            $codigo = 'TPC-' . $proveedorIniciales . '-' . $usuarioTPCIniciales . '-ICPO-' . $fechaActual;

            $tabla = "icpo";

            $datos = array(
                "id_proveedor" => $_POST["nuevoNombreProveedor"],
                "id_producto" => $_POST["nuevoProducto"],
                "id_origen" => $_POST["nuevoOrigen"],
                "id_um" => $_POST["nuevoUM"],
                "id_port" => $_POST["nuevoPort"],
                "code" => $codigo,
                "authentication_code" => $_POST["nuevoICPO"],
                "ref_number" => $_POST["nuevoRefNumber"],
                "via" => $_POST["nuevoVia"],
                "trade_date" => $_POST["nuevoTradeDate"],
                "trial_quantity" => $_POST["nuevoTrialQuantity"],
                "contract_quantity" => $_POST["nuevoContractQuantity"],
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

    					  type: "success",
    					  title: "El ICPO ha sido guardado correctamente",
    					  showConfirmButton: true,
    					  confirmButtonText: "Cerrar"
    					  }).then(function(result){

    								if (result.value) {

    								window.location = "icpo"

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
                "id_proveedor" => $_POST["editarProveedor"],
                "id_producto" => $_POST["editarProducto"],
                "id_origen" => $_POST["editarOrigen"],
                "id_um" => $_POST["editarUM"],
                "id_port" => $_POST["editarPort"],
                "authentication_code" => $_POST["editarAuthCode"],
                "ref_number" => $_POST["editarRefNumber"],
                "via" => $_POST["editarVia"],
                "trade_date" => $_POST["editarTradeDate"],
                "trial_quantity" => $_POST["editarTrialQuantity"],
                "contract_quantity" => $_POST["editarContractQuantity"],
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

						  type: "success",
						  title: "El ICPO ha sido Editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "icpo"

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

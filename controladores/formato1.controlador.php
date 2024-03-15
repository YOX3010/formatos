<?php

class ControladorFormato1
{

    /*=============================================
    CREAR FORMATO 1
    =============================================*/

    public static function ctrCrearFormato1()
    {

        if (isset($_POST["nuevoFormato1"])) {

            $tabla = "formato_1";

            $datos = array(
                "to_1" => $_POST["nuevoTo1"],
                "mr_1" => $_POST["nuevoMr1"],
                "position_1" => $_POST["nuevoPosition1"],
                "email_1" => $_POST["nuevoEmail1"],
                "to_2" => $_POST["nuevoTo2"],
                "mr_2" => $_POST["nuevoMr2"],
                "position_2" => $_POST["nuevoPosition2"],
                "email_2" => $_POST["nuevoEmail2"],
                "via" => $_POST["nuevoVia"],
                "email_3" => $_POST["nuevoEmail3"],
                "mr_3" => $_POST["nuevoMr3"],
                "validity_sco" => $_POST["nuevoValiditySco"],
                "commodity" => $_POST["nuevoCommodity"],
                "quantity" => $_POST["nuevoQuantity"],
                "price" => $_POST["nuevoPrice"],
                "incoterms" => $_POST["nuevoIncoterms"],
                "port" => $_POST["nuevoPort"],
                "product_origin" => $_POST["nuevoProductOrigin"],
                "contract_term" => $_POST["nuevoContractTerm"],
                "commission" => $_POST["nuevoCommission"],
            );

            $respuesta = ModeloFormato1::mdlIngresarFormato1($tabla, $datos);

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

							window.location = "formato-1";

							}

						})

			  	</script>';
            }
        }
    }

    /*=============================================
    MOSTRAR FORMATO 1
    =============================================*/

    public static function ctrMostrarFormato1($item, $valor)
    {

        $tabla = "formato_1";

        $respuesta = ModeloFormato1::mdlMostrarFormato1($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    EDITAR FORMATO 1
    =============================================*/

    public static function ctrEditarFormato1()
    {

        if (isset($_POST["editarFormato1"])) {

            $tabla = "formato_1";

            $datos = array(
                "to_1" => $_POST["editarTo1"],
                "mr_1" => $_POST["editarMr1"],
                "position_1" => $_POST["editarPosition1"],
                "email_1" => $_POST["editarEmail1"],
                "to_2" => $_POST["editarTo2"],
                "mr_2" => $_POST["editarMr2"],
                "position_2" => $_POST["editarPosition2"],
                "email_2" => $_POST["editarEmail2"],
                "via" => $_POST["editarVia"],
                "email_3" => $_POST["editarEmail3"],
                "mr_3" => $_POST["editarMr3"],
                "validity_sco" => $_POST["editarValiditySco"],
                "commodity" => $_POST["editarCommodity"],
                "quantity" => $_POST["editarQuantity"],
                "price" => $_POST["editarPrice"],
                "incoterms" => $_POST["editarIncoterms"],
                "port" => $_POST["editarPort"],
                "product_origin" => $_POST["editarProductOrigin"],
                "contract_term" => $_POST["editarContractTerm"],
                "commission" => $_POST["editarCommission"],
                "id" => $_POST["idFormato1"],
            );

            $respuesta = ModeloFormato1::mdlEditarFormato1($tabla, $datos);

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

							window.location = "formato-1";

							}

						})

			  	</script>';
            }
        }
    }
}

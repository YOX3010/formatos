<?php

class ControladorCommodity
{

	/*=============================================
	CREAR COMMODITY
	=============================================*/

	static public function ctrCrearCommodity()
	{

		if (isset($_POST["nuevoCommodity"])) {

			$tabla = "commodity";

			$datos = array(
				"commodity" => $_POST["nuevoCommodity"],
				"price_cliente" => $_POST["nuevoPriceCliente"],
				"price_provedor" => $_POST["nuevoPriceProvedor"],
				"ficha_tecnica" => $_POST["nuevoFichaTecnica"],
			);


			$respuesta = ModeloCommodity::mdlIngresarCommodity($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "commodity";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Producto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "commodity";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR COMMODITY
	=============================================*/

	static public function ctrMostrarCommodity($item, $valor)
	{

		$tabla = "commodity";

		$respuesta = ModeloCommodity::mdlMostrarCommodity($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR COMMODITY
	=============================================*/

	static public function ctrEditarCommodity()
	{

		if (isset($_POST["editarCommodity"])) {

			$tabla = "commodity";

			$datos = array(
				"commodity" => $_POST["editarCommodity"],
				"price_cliente" => $_POST["editarPriceCliente"],
				"price_provedor" => $_POST["editarPriceProvedor"],
				"ficha_tecnica" => $_POST["editarFichaTecnica"],
				"id" => $_POST["idCommodity"]
			);

			$respuesta = ModeloCommodity::mdlEditarCommodity($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El Producto ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "commodity";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Producto!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "commodity";

							}

						})

			  	</script>';
			}
		}
	}
}

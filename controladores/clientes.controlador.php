<?php



class ControladorClientes
{



	/*=============================================
	MOSTRAR CLIENTE
	=============================================*/

	static public function ctrMostrarClientes($item, $valor)
	{

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================

	CREAR CLIENTE

	=============================================*/



	static public function ctrCrearCliente()
	{



		if (isset($_POST["nuevoClientes"])) {

			/*=============================================

				VALIDAR IMAGEN

				=============================================*/



			$ruta = "vistas/img/clientes/default/cliente.png";



			if (isset($_FILES["nuevaImagen"]["tmp_name"])) {



				list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);



				$nuevoAncho = 650;

				$nuevoAlto = 500;



				/*=============================================

					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL CLIENTE

					=============================================*/



				$directorio = "vistas/img/clientes/" . $_POST["nuevoCosignee"];



				mkdir($directorio, 0755);



				/*=============================================

				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

				=============================================*/



				if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {



					/*=============================================

					GUARDAMOS LA IMAGEN EN EL DIRECTORIO

					=============================================*/



					$aleatorio = mt_rand(100, 999);



					$ruta = "vistas/img/clientes/" . $_POST["nuevoCosignee"] . "/" . $aleatorio . ".jpg";



					$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);



					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);



					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);



					imagejpeg($destino, $ruta);
				}



				if ($_FILES["nuevaImagen"]["type"] == "image/png") {



					/*=============================================

						GUARDAMOS LA IMAGEN EN EL DIRECTORIO

						=============================================*/



					$aleatorio = mt_rand(100, 999);



					$ruta = "vistas/img/clientes/" . $_POST["nuevoCosignee"] . "/" . $aleatorio . ".png";



					$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);



					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);



					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);



					imagepng($destino, $ruta);
				}
			}



			$tabla = "clientes";



			$datos = array(
				"cosignee" => $_POST["nuevoCosignee"],
				"signatory" => $_POST["nuevoSignatory"],
				"position" => $_POST["nuevoPosition"],
				"email" => $_POST["nuevoEmail"],
				"direccion" => $_POST["nuevaDireccion"],
				"telefono" => $_POST["nuevoTelefono"],
				"crn" => $_POST["nuevoCRN"],
				"bank_name" => $_POST["nuevoBankName"],
				"bank_address" => $_POST["nuevoBankAddress"],
				"swift" => $_POST["nuevoSwift"],
				"bank_officer_name" => $_POST["nuevoOfficerName"],
				"bank_officer_position" => $_POST["nuevoOfficerPosition"],
				"bank_officer_phone" => $_POST["nuevoOfficerPhone"],
				"bank_officer_email" => $_POST["nuevoEmail"],
				"account_number" => $_POST["nuevoAccountNumber"],
				"country" => $_POST["nuevoCountry"],
				"passport_number" => $_POST["nuevoPassportNumber"],
				"passport_issue_date" => $_POST["nuevoPassportIssueDate"],
				"passport_expiration_date" => $_POST["nuevoPassportExpirationDate"],
				"passport_image" => $ruta,
			);



			$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);



			if ($respuesta == "ok") {



				echo '<script>



						swal({

							  type: "success",

							  title: "El Cliente ha sido guardado correctamente",

							  showConfirmButton: true,

							  confirmButtonText: "Cerrar"

							  }).then(function(result){

										if (result.value) {



										window.location = "clientes";



										}

									})



						</script>';



				//}





			} else {



				echo '<script>



					swal({

						  type: "error",

						  title: "¡El Cliente no puede ir con los campos vacíos o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "clientes";



							}

						})



			  	</script>';
			}
		}
	}



	/*=============================================

	EDITAR CLIENTE

	=============================================*/



	static public function ctrEditarCliente()
	{



		if (isset($_POST["editarClientes"])) {

			/*=============================================

				VALIDAR IMAGEN

				=============================================*/



			$ruta = $_POST["imagenActual"];



			if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {



				list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);



				$nuevoAncho = 650;

				$nuevoAlto = 500;



				/*=============================================

					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO

					=============================================*/



				$directorio = "vistas/img/clientes/" . $_POST["editarCosignee"];



				/*=============================================

					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD

					=============================================*/



				if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/clientes/default/cliente.png") {



					unlink($_POST["imagenActual"]);
				} else {



					mkdir($directorio, 0755);
				}



				/*=============================================

					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

					=============================================*/



				if ($_FILES["editarImagen"]["type"] == "image/jpeg") {



					/*=============================================

						GUARDAMOS LA IMAGEN EN EL DIRECTORIO

						=============================================*/



					$aleatorio = mt_rand(100, 999);



					$ruta = "vistas/img/clientes/" . $_POST["editarCosignee"] . "/" . $aleatorio . ".jpg";



					$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);



					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);



					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);



					imagejpeg($destino, $ruta);
				}



				if ($_FILES["editarImagen"]["type"] == "image/png") {



					/*=============================================

						GUARDAMOS LA IMAGEN EN EL DIRECTORIO

						=============================================*/



					$aleatorio = mt_rand(100, 999);



					$ruta = "vistas/img/clientes/" . $_POST["editarCosignee"] . "/" . $aleatorio . ".png";



					$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);



					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);



					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);



					imagepng($destino, $ruta);
				}
			}



			$tabla = "clientes";



			$datos = array(
				"cosignee" => $_POST["editarCosignee"],
				"signatory" => $_POST["editarSignatory"],
				"position" => $_POST["editarPosition"],
				"email" => $_POST["editarEmail"],
				"direccion" => $_POST["editarDireccion"],
				"telefono" => $_POST["editarTelefono"],
				"crn" => $_POST["editarCRN"],
				"bank_name" => $_POST["editarBankName"],
				"bank_address" => $_POST["editarBankAddress"],
				"swift" => $_POST["editarSwift"],
				"bank_officer_name" => $_POST["editarOfficerName"],
				"bank_officer_position" => $_POST["editarOfficerPosition"],
				"bank_officer_phone" => $_POST["editarOfficerPhone"],
				"bank_officer_email" => $_POST["editarOfficerEmail"],
				"account_number" => $_POST["editarAccountNumber"],
				"country" => $_POST["editarCountry"],
				"passport_number" => $_POST["editarPassportNumber"],
				"passport_issue_date" => $_POST["editarPassportIssueDate"],
				"passport_expiration_date" => $_POST["editarPassportExpirationDate"],
				"passport_image" => $ruta,
				"id" => $_POST["idCliente"],
			);


			$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);



			if ($respuesta == "ok") {



				echo '<script>



						swal({

							  type: "success",

							  title: "El Cliente ha sido editado correctamente",

							  showConfirmButton: true,

							  confirmButtonText: "Cerrar"

							  }).then(function(result){

										if (result.value) {



										window.location = "clientes";



										}

									})



						</script>';



				//}





			} else {



				echo '<script>



					swal({

						  type: "error",

						  title: "¡El Cliente no puede ir con los campos vacíos o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "clientes";



							}

						})



			  	</script>';
			}
		}
	}
}

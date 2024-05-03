<?php



class ControladorIncoterms
{



	/*=============================================
	MOSTRAR INCOTERMS
	=============================================*/

	static public function ctrMostrarIncoterms($item, $valor)
	{

		$tabla = "incoterms";

		$respuesta = ModeloIncoterms::mdlMostrarIncoterms($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================

	CREAR INCOTERMS

	=============================================*/



	static public function ctrCrearIncoterms()
	{



		if (isset($_POST["nuevoIncoterms"])) {

			/*=============================================

				VALIDAR IMAGEN

				=============================================*/



			$ruta = "vistas/img/procedimientos/default/empty-doc.png";



			if (isset($_FILES["nuevaImagen"]["tmp_name"])) {



				list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);



				$nuevoAncho = 500;

				$nuevoAlto = 500;



				/*=============================================

				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PROCEDIMIENTO

				=============================================*/



				$directorio = "vistas/img/procedimientos/" . $_POST["nuevoNombreIncoterm"];



				mkdir($directorio, 0755);



				/*=============================================

				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

				=============================================*/



				if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {



					/*=============================================

					GUARDAMOS LA IMAGEN EN EL DIRECTORIO

					=============================================*/



					$aleatorio = mt_rand(100, 999);



					$ruta = "vistas/img/procedimientos/" . $_POST["nuevoNombreIncoterm"] . "/" . $aleatorio . ".jpg";



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



					$ruta = "vistas/img/procedimientos/" . $_POST["nuevoNombreIncoterm"] . "/" . $aleatorio . ".png";



					$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);



					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);



					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);



					imagepng($destino, $ruta);
				}
			}



			$tabla = "incoterms";

			$datos = array(
				"incoterm" => $_POST["nuevoNombreIncoterm"],
				"procedimiento" => $ruta,
			);



			$respuesta = ModeloIncoterms::mdlIngresarIncoterm($tabla, $datos);



			if ($respuesta == "ok") {



				echo '<script>



						swal({

							  type: "success",

							  title: "El Procedimiento ha sido guardado correctamente",

							  showConfirmButton: true,

							  confirmButtonText: "Cerrar"

							  }).then(function(result){

										if (result.value) {



										window.location = "incoterms";



										}

									})



						</script>';



				//}





			} else {



				echo '<script>



					swal({

						  type: "error",

						  title: "¡El Procedimiento no puede ir con los campos vacíos o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "incoterms";



							}

						})



			  	</script>';
			}
		}
	}



	/*=============================================

	EDITAR INCOTERMS

	=============================================*/



	static public function ctrEditarIncoterms()
	{



		if (isset($_POST["editarIncoterms"])) {



			/*=============================================

			VALIDAR IMAGEN

			=============================================*/



			$ruta = $_POST["imagenActual"];



			if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {



				list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);



				$nuevoAncho = 500;

				$nuevoAlto = 500;



				/*=============================================

				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRICEDIMIENTO

				=============================================*/



				$directorio = "vistas/img/procedimientos/" . $_POST["editarNombreIncoterm"];



				/*=============================================

					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD

					=============================================*/



				if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/procedimientos/default/empty-doc.png") {



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



					$ruta = "vistas/img/procedimientos/" . $_POST["editarNombreIncoterm"] . "/" . $aleatorio . ".jpg";



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



					$ruta = "vistas/img/procedimientos/" . $_POST["editarNombreIncoterm"] . "/" . $aleatorio . ".png";



					$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);



					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);



					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);



					imagepng($destino, $ruta);
				}
			}



			$tabla = "incoterms";



			$datos = array(
				"incoterm" => $_POST["editarNombreIncoterm"],
				"procedimiento" => $ruta,
				"id" => $_POST["idIncoterm"]
			);


			$respuesta = ModeloIncoterms::mdlEditarIncoterm($tabla, $datos);



			if ($respuesta == "ok") {



				echo '<script>



						swal({

							  type: "success",

							  title: "El Procedimiento ha sido editado correctamente",

							  showConfirmButton: true,

							  confirmButtonText: "Cerrar"

							  }).then(function(result){

										if (result.value) {



										window.location = "incoterms";



										}

									})



						</script>';



				//}





			} else {



				echo '<script>



					swal({

						  type: "error",

						  title: "¡El Procedimiento no puede ir con los campos vacíos o llevar caracteres especiales!",

						  showConfirmButton: true,

						  confirmButtonText: "Cerrar"

						  }).then(function(result){

							if (result.value) {



							window.location = "incoterms";



							}

						})



			  	</script>';
			}
		}
	}



	/*=============================================

	BORRAR INCOTERMS

	=============================================*/

	// static public function ctrEliminarProducto()
	// {



	// 	if (isset($_GET["idProducto"])) {



	// 		$tabla = "incoterms";

	// 		$datos = $_GET["idProducto"];



	// 		if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png") {



	// 			unlink($_GET["imagen"]);

	// 			rmdir('vistas/img/productos/' . $_GET["codigo"]);
	// 		}



	// 		$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);



	// 		if ($respuesta == "ok") {



	// 			echo '<script>



	// 			swal({

	// 				  type: "success",

	// 				  title: "El producto ha sido borrado correctamente",

	// 				  showConfirmButton: true,

	// 				  confirmButtonText: "Cerrar"

	// 				  }).then(function(result){

	// 							if (result.value) {



	// 							window.location = "productos";



	// 							}

	// 						})



	// 			</script>';
	// 		}
	// 	}
	// }

}

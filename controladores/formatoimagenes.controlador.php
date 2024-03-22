<?php

class ControladorFormatoImagenes
{

	/*=============================================
	CREAR IMAGEN DE FORMATOS
	=============================================*/

	static public function ctrCrearFormatoImagenes()
	{

		if (isset($_POST["nuevoFormatoImagenes"])) {

			if ($_POST["nuevoFormatoImagenes"]) {

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "vistas/img/formatos/default/anonymous.png";

				if (isset($_FILES["nuevoFormatoImagenes"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevoFormatoImagenes"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
				 CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				 =============================================*/

					$directorio = "vistas/img/formatos/" . $_POST["nuevoFormatoImagenes"];

					mkdir($directorio, 0755);

					/*=============================================
				 DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				 =============================================*/

					if ($_FILES["nuevoFormatoImagenes"]["type"] == "image/jpeg") {

						/*=============================================
					 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					 =============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/formatos/" . $_POST["nuevoFormatoImagenes"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevoFormatoImagenes"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["nuevoFormatoImagenes"]["type"] == "image/png") {

						/*=============================================
					 GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					 =============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/formatos/" . $_POST["nuevoFormatoImagenes"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["nuevoFormatoImagenes"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}
			}

			$tabla = "formato_imagenes";

			$datos = array(
				// "imagen" => $_POST["nuevoFormatoImagenes"],
				"imagen" => $ruta
			);

			$respuesta = ModeloFormatoImagenes::mdlIngresarFormatoImagenes($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "La Imagen del documento ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "formato-imagenes";

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Imagen del documentos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "formato-imagenes";

							}

						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR FORMATO IMAGENES
	=============================================*/

	static public function ctrMostrarFormatoImagenes($item, $valor)
	{

		$tabla = "formato_imagenes";

		$respuesta = ModeloFormatoImagenes::mdlMostrarFormatoImagenes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR FORMATO IMAGENES
	=============================================*/

	static public function ctrEditarFormatoImagenes()
	{

		$ruta = $_POST["imagenActual"];

		if (isset($_FILES["editarFormatoImagen"]["tmp_name"]) && !empty($_FILES["editarFormatoImagen"]["tmp_name"])) {

			list($ancho, $alto) = getimagesize($_FILES["editarFormatoImagen"]["tmp_name"]);

			$nuevoAncho = 500;
			$nuevoAlto = 500;

			/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

			$directorio = "vistas/img/formatos/" . $_POST["editarImagen"];

			/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

			if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/formatos/default/anonymous.png") {

				unlink($_POST["imagenActual"]);
			} else {

				mkdir($directorio, 0755);
			}

			/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

			if ($_FILES["editarFormatoImagenes"]["type"] == "image/jpeg") {

				/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

				$aleatorio = mt_rand(100, 999);

				$ruta = "vistas/img/formatos/" . $_POST["editarFormatoImagen"] . "/" . $aleatorio . ".jpg";

				$origen = imagecreatefromjpeg($_FILES["editarFormatoImagenes"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta);
			}

			if ($_FILES["editarFormatoImagenes"]["type"] == "image/png") {

				/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

				$aleatorio = mt_rand(100, 999);

				$ruta = "vistas/img/formato/" . $_POST["editarFormatoImagen"] . "/" . $aleatorio . ".png";

				$origen = imagecreatefrompng($_FILES["editarFormatoImagenes"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $ruta);
			}
		}


		$tabla = "formato_imagenes";

		$datos = array(
			"imagen" => $_POST["editarFormatoImagenes"],
			"imagen" => $ruta
		);

		$respuesta = ModeloFormatoImagenes::mdlEditarFormatoImagenes($tabla, $datos);

		if ($respuesta == "ok") {

			echo '<script>

					swal({

						  type: "success",
						  title: "La Imagen del documento ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "formato-imagenes";

									}

								})

					</script>';
		} else {

			echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Imagen del Documento!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "formato-imagenes";

							}

						})

			  	</script>';
		}
	}
}

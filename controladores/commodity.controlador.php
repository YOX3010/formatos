<?php

class ControladorCommodity
{

	/*=============================================
	CREAR COMMODITY
	=============================================*/

	static public function ctrCrearCommodity()
	{

		if (isset($_POST["nuevoCommodity"])) {

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = "vistas/img/productos/default/anonymous.png";

			if (isset($_FILES["nuevaImagen"]["tmp_name"])) {

				list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PRODUCTO
				=============================================*/

				$directorio = "vistas/img/productos/" . $_POST["nuevoCommodity"];

				mkdir($directorio, 0755);

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100, 999);

					$ruta = "vistas/img/productos/" . $_POST["nuevoCommodity"] . "/" . $aleatorio . ".jpg";

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

					$ruta = "vistas/img/productos/" . $_POST["nuevoCommodity"] . "/" . $aleatorio . ".png";

					$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
				}
			}

			$tabla = "commodity";

			$datos = array(
				"commodity" => $_POST["nuevoCommodity"],
				"price_cliente" => $_POST["nuevoPriceCliente"],
				"price_provedor" => $_POST["nuevoPriceProvedor"],
				"ficha_tecnica" => $ruta,
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

			/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			$ruta = $_POST["imagenActual"];

			if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

				list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
				 CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				 =============================================*/

				$directorio = "vistas/img/productos/" . $_POST["editarCommodity"];

				/*=============================================
				 PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				 =============================================*/

				if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {

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

					$ruta = "vistas/img/productos/" . $_POST["editarCommodity"] . "/" . $aleatorio . ".jpg";

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

					$ruta = "vistas/img/productos/" . $_POST["editarCommodity"] . "/" . $aleatorio . ".png";

					$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
				}
			}

			$tabla = "commodity";

			$datos = array(
				"commodity" => $_POST["editarCommodity"],
				"price_cliente" => $_POST["editarPriceCliente"],
				"price_provedor" => $_POST["editarPriceProvedor"],
				"ficha_tecnica" => $ruta,
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

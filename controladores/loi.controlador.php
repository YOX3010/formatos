<?php

class ControladorLOI
{

	/*=============================================
	CREAR LOI
	=============================================*/

	static public function ctrCrearLOI()
	{

		if (isset($_POST["nuevoLOI"])) {

			$itemCliente = "id";
			$valorCliente = $_POST['nuevoCliente'];

			$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

			$cosignee = $respuestaCliente['cosignee'];

			$cosigneeWords = explode(" ", $cosignee);

			$cosigneeIniciales = "";

			foreach ($cosigneeWords as $words) {
				$cosigneeIniciales .= strtoupper($words[0]);
			}

			// Obtener la fecha actual

			date_default_timezone_set('America/Caracas');

			$fechaActual = date('Y-m-d');

			$fechaActual = str_replace('-', "", $fechaActual);

			$codigo = "TPC-" . $cosigneeIniciales . "-LOI-" . $fechaActual;

			$tabla = "loi";

			$datos = array(
				"id_proveedor" => $_POST["nuevoLOI"],
				"id_clientes" => $_POST["nuevoCliente"],
				"codigo" => $codigo,
				"descripcion" => $_POST["nuevoDescripcion"],
				// "loi_image" => $_POST["nuevoLoiImage"],
			);


			$respuesta = ModeloLOI::mdlIngresarLOI($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						type: "success",
						title: "La LOI ha sido guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){

									if (result.value) {

									window.location = "index.php?ruta=loi&idProveedor=' . $_POST["nuevoLOI"] . '"

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						type: "error",
						title: "¡Error al Guardar la LOI!",
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
	MOSTRAR LOI
	=============================================*/

	static public function ctrMostrarLOI($item, $valor)
	{

		$tabla = "loi";

		$respuesta = ModeloLOI::mdlMostrarLOI($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR LOI
	=============================================*/

	static public function ctrEditarLOI()
	{

		if (isset($_POST["editarLOI"])) {

			$tabla = "loi";

			$datos = array(
				"id_proveedor" => $_POST["editarLOI"],
				"id_clientes" => $_POST["editarCliente"],
				"descripcion" => $_POST["editarDescripcion"],
				// "loi_image" => $_POST["editarLoiImage"],
				"id" => $_POST["idLOI"]
			);

			$respuesta = ModeloLOI::mdlEditarLOI($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({

						  type: "success",
						  title: "El LOI ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=loi&idProveedor=' . $_POST["editarLOI"] . '"

									}

								})

					</script>';
			} else {

				echo '<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El LOI!",
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

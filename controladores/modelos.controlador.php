<?php

class ControladorModelos{

	/*=============================================
	CREAR MODELO
	=============================================*/

	static public function ctrCrearModelo(){

		if(isset($_POST["nuevoModelo"])){

				$tabla = "vehiculos_modelos";

				$datos = array(	"modelo"=>$_POST["nuevoModelo"]);


				$respuesta = ModeloModelos::mdlIngresarModelo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Modelo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "modelos-vehiculos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Modelo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "modelos-vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR MODELOS
	=============================================*/

	static public function ctrMostrarModelos($item, $valor){

		$tabla = "vehiculos_modelos";

		$respuesta = ModeloModelos::mdlMostrarModelos($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR MODELO
	=============================================*/

	static public function ctrEditarModelo(){

		if(isset($_POST["editarModelo"])){

				$tabla = "vehiculos_modelos";

				$datos = array(	"modelo"=>$_POST["editarModelo"],
							   	"id"=>$_POST["idModelo"]);

				$respuesta = ModeloModelos::mdlEditarModelo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Modelo ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "modelos-vehiculos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Modelo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "modelos-vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

}



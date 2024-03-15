<?php

class ControladorTipos{

	/*=============================================
	CREAR TIPO VEHICULO
	=============================================*/

	static public function ctrCrearTipo(){

		if(isset($_POST["nuevoTipo"])){

				$tabla = "vehiculos_tipos";

				$datos = array(	"tipo"=>$_POST["nuevoTipo"]);


				$respuesta = ModeloTipos::mdlIngresarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Tipo de Vehiculo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "tipos-vehiculos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Tipo Vehiculo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipos-vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIPOS VEHICULO
	=============================================*/

	static public function ctrMostrarTipos($item, $valor){

		$tabla = "vehiculos_tipos";

		$respuesta = ModeloTipos::mdlMostrarTipos($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR TIPO VEHICULO
	=============================================*/

	static public function ctrEditarTipo(){

		if(isset($_POST["editarTipo"])){

				$tabla = "vehiculos_tipos";

				$datos = array(	"tipo"=>$_POST["editarTipo"],
							   	"id"=>$_POST["idTipo"]);

				$respuesta = ModeloTipos::mdlEditarTipo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Tipo Vehiculo ha sido Editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipos-vehiculos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Tipo Vehiculo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tipos-vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

}



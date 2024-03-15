<?php

class ControladorVehiculos{

	/*=============================================
	CREAR VEHICULO
	=============================================*/

	static public function ctrCrearVehiculo(){

		if(isset($_POST["nuevoVehiculo"])){

				$tabla = "vehiculos";

				$datos = array(	"id_marca"=>$_POST["nuevoVehiculo"],
								"id_modelo"=>$_POST["nuevoModelo"],
								"year"=>$_POST["nuevoYear"],
							   	"id_tipo"=>$_POST["nuevoTipo"]);


				$respuesta = ModeloVehiculos::mdlIngresarVehiculo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Vehiculo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "vehiculos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Vehiculo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR VEHICULOS
	=============================================*/

	static public function ctrMostrarVehiculos($item, $valor){

		$tabla = "vehiculos";

		$respuesta = ModeloVehiculos::mdlMostrarVehiculos($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR VEHICULO
	=============================================*/

	static public function ctrEditarVehiculo(){

		if(isset($_POST["editarVehiculo"])){

				$tabla = "vehiculos";

				$datos = array(	"id_marca"=>$_POST["editarVehiculo"],
								"id_modelo"=>$_POST["editarModelo"],
								"year"=>$_POST["editarYear"],
							   	"id_tipo"=>$_POST["editarTipo"],
							   	"id"=>$_POST["idVehiculo"]);

				$respuesta = ModeloVehiculos::mdlEditarVehiculo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Vehiculo ha sido Editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "vehiculos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar el Vehiculo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

}



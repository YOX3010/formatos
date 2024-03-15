<?php

class ControladorOrdenesVehiculos{

	/*=============================================
	CREAR ORDEN VEHICULO
	=============================================*/

	static public function ctrCrearOrdenVehiculo(){

		if(isset($_POST["nuevoOrdenVehiculo"])){

				$tabla = "ordenes_vehiculos";

				$datos = array(	"id_orden"=>$_POST["nuevoOrdenVehiculo"],
								"id_vehiculo"=>$_POST["nuevoVehiculo"],
								"placa"=>$_POST["nuevoPlaca"],
							   	"color"=>$_POST["nuevoColor"]);


				$respuesta = ModeloOrdenesVehiculos::mdlIngresarOrdenVehiculo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Vehiculo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "ordenes-vehiculos";

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

							window.location = "ordenes-vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ORDENES VEHICULOS
	=============================================*/

	static public function ctrMostrarOrdenesVehiculos($item, $valor){

		$tabla = "ordenes_vehiculos";

		$respuesta = ModeloOrdenesVehiculos::mdlMostrarOrdenesVehiculos($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR ORDEN VEHICULO
	=============================================*/

	static public function ctrEditarOrdenVehiculo(){

		if(isset($_POST["editarOrdenVehiculo"])){

				$tabla = "ordenes_vehiculos";

				$datos = array(	"id_orden"=>$_POST["editarOrdenVehiculo"],
								"id_vehiculo"=>$_POST["editarVehiculo"],
								"placa"=>$_POST["editarPlaca"],
							   	"color"=>$_POST["editarColor"],
							   	"id"=>$_POST["idOrdenVehiculo"]);

				$respuesta = ModeloOrdenesVehiculos::mdlEditarOrdenVehiculo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Vehiculo ha sido Editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ordenes";

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

							window.location = "ordenes-vehiculos";

							}

						})

			  	</script>';

			}

		}

	}

}



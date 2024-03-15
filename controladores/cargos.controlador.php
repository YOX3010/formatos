<?php

class ControladorCargos{

	/*=============================================
	CREAR CARGO
	=============================================*/

	static public function ctrCrearCargo(){

		if(isset($_POST["nuevoCargo"])){

				$tabla = "empleados_cargos";

				$datos = array(	"cargo"=>$_POST["nuevoCargo"]);


				$respuesta = ModeloCargos::mdlIngresarCargo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Cargo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "empleados-cargos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Cargo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empleados-cargos";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CARGOS
	=============================================*/

	static public function ctrMostrarCargos($item, $valor){

		$tabla = "empleados_cargos";

		$respuesta = ModeloCargos::mdlMostrarCargos($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR CARGO
	=============================================*/

	static public function ctrEditarCargo(){

		if(isset($_POST["editarCargo"])){

				$tabla = "empleados_cargos";

				$datos = array(	"cargo"=>$_POST["editarCargo"],
							   	"id"=>$_POST["idCargo"]);

				$respuesta = ModeloCargos::mdlEditarCargo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Cargo ha sido Editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empleados-cargos";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar El Cargo!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empleados-cargos";

							}

						})

			  	</script>';

			}

		}

	}

}



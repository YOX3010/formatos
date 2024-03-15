<?php

class ControladorEmpleados{

	/*=============================================
	CREAR EMPLEADO
	=============================================*/

	static public function ctrCrearEmpleado(){

		if(isset($_POST["nuevoEmpleado"])){

				$tabla = "empleados";

				$datos = array(	"cedula"=>$_POST["nuevoEmpleado"],
								"condicion"=>$_POST["nuevoCondicion"],
							   	"nombres"=>$_POST["nuevoNombres"],
							   	"apellidos"=>$_POST["nuevoApellidos"],
							   	"direccion"=>$_POST["nuevoDireccion"],
							   	"celular"=>$_POST["nuevoCelular"],
							   	"correo"=>$_POST["nuevoCorreo"],
							   	"id_cargo"=>$_POST["nuevoCargo"]);


				$respuesta = ModeloEmpleados::mdlIngresarEmpleado($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Empleado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "empleados";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar El Empleado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empleados";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR EMPLEADOS
	=============================================*/

	static public function ctrMostrarEmpleados($item, $valor){

		$tabla = "empleados";

		$respuesta = ModeloEmpleados::mdlMostrarEmpleados($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/

	static public function ctrEditarEmpleado(){

		if(isset($_POST["editarEmpleado"])){

				$tabla = "empleados";

				$datos = array("cedula"=>$_POST["editarEmpleado"],
								"status"=>$_POST["editarStatus"],
								"condicion"=>$_POST["editarCondicion"],
							   	"nombres"=>$_POST["editarNombres"],
							   	"apellidos"=>$_POST["editarApellidos"],
							   	"direccion"=>$_POST["editarDireccion"],
							   	"celular"=>$_POST["editarCelular"],
							   	"correo"=>$_POST["editarCorreo"],
							   	"id_cargo"=>$_POST["editarCargo"],
							   "id"=>$_POST["idEmpleado"]);

				$respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "El Empleado ha sido Editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empleados";

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar el Empleado!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "empleados";

							}

						})

			  	</script>';

			}

		}

	}

}



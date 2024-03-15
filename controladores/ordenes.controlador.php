<?php

class ControladorOrdenes{

	/*=============================================
	CREAR ORDEN DE SERVICIO
	=============================================*/

	static public function ctrCrearOrden(){

		if(isset($_POST["nuevoOrden"])){

				$tabla = "ordenes";

				$datos = array(	"id_usuario"			=>$_POST["nuevoOrden"],
								"id_cliente"			=>$_POST["nuevoCliente"],
								"fecha_ingreso"			=>$_POST["nuevoFecha_ingreso"],
							   	//"fecha_salida"		=>$_POST["nuevoFecha_salida"],
							   	//"id_empleado"			=>$_POST["nuevoEmpleado"],
							   	//"status_reparacion"	=>$_POST["nuevoStatus_reparacion"],
							   	"observaciones"			=>$_POST["nuevoObservaciones"]);

				$respuesta = ModeloOrdenes::mdlIngresarOrden($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "La Orden de Servicio ha sido guardada correctamente",
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
						  title: "¡Error al Guardar La Orden de Servicio!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ORDENES DE SERVICIOS
	=============================================*/

	static public function ctrMostrarOrdenes($item, $valor){

		$tabla = "ordenes";

		$respuesta = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR ORDEN DE SERVICIO
	=============================================*/

	static public function ctrEditarOrden(){

		if(isset($_POST["editarOrden"])){

				$tabla = "ordenes";

				$datos = array(	"id_usuario"		=>$_POST["editarOrden"],
								"id_cliente"		=>$_POST["editarCliente"],
								"fecha_ingreso"		=>$_POST["editarFecha_ingreso"],
							   	"fecha_salida"		=>$_POST["editarFecha_salida"],
							   	"id_empleado"		=>$_POST["editarEmpleado"],
							   	"status_reparacion"	=>$_POST["editarStatus_reparacion"],
							   	"observaciones"		=>$_POST["editarObservaciones"],
							   	"id"				=>$_POST["idorden"]);

				$respuesta = ModeloOrdenes::mdlEditarOrden($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "La Orden de Servicio ha sido Editada correctamente",
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
						  title: "¡Error al Editar La Orden de Servicio!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes";

							}

						})

			  	</script>';

			}

		}

	}

}



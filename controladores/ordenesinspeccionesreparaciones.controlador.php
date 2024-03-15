<?php

class ControladorOrdenesInspeccionesReparaciones{

	/*=============================================
	CREAR ORDEN INSPECCION REPARACION
	=============================================*/

	static public function ctrCrearOrdenInspeccionReparacion(){

		if(isset($_POST["nuevoOrdenInspeccionReparacion"])){

				$tabla = "ordenes_inspecciones_reparaciones";

				$datos = array(	"id_orden"=>$_POST["nuevoOrdenInspeccionReparacion"],
								"reparacion"=>$_POST["nuevoReparacion"],
								"costo" => $_POST["nuevoCosto"],
								"precio" => $_POST["nuevoPrecio"]);


				$respuesta = ModeloOrdenesInspeccionesReparaciones::mdlIngresarOrdenInspeccionReparacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "La Reparacion ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location.close 

									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Guardar La Reparacion!",
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
	MOSTRAR ORDENES INSPECCIONES REPARACIONES
	=============================================*/

	static public function ctrMostrarOrdenesInspeccionesReparaciones($item, $valor){

		$tabla = "ordenes_inspecciones_reparaciones";

		$respuesta = ModeloOrdenesInspeccionesReparaciones::mdlMostrarOrdenesInspeccionesReparaciones($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR ORDEN INSPECCION REPARACION
	=============================================*/

	static public function ctrEditarOrdenInspeccionReparacion(){

		if(isset($_POST["editarOrdenInspeccionReparacion"])){

				$tabla = "ordenes_inspecciones_reparaciones";

				$datos = array(	"id_orden"=>$_POST["editarOrdenInspeccionReparacion"],
								"reparacion"=>$_POST["editarReparacion"],
								"costo" => $_POST["editarCosto"],
								"precio" => $_POST["editarPrecio"],
							   	"id"=>$_POST["idOrdenInspeccionReparacion"]);

				$respuesta = ModeloOrdenesInspeccionesReparaciones::mdlEditarOrdenInspeccionReparacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "warning",
						  title: "La Reparacion ha sido Editada correctamente Recuerde Actualizar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										window.location.close
									}

								})

					</script>';

			}else{

				echo'<script>

					swal({

						  type: "error",
						  title: "¡Error al Editar La Reparacion!",
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
	SUMA TOTAL COSTOS
	=============================================*/

	static public function ctrSumaTotalCostos($item, $valor){

		$tabla = "ordenes_inspecciones_reparaciones";

		$respuesta = ModeloOrdenesInspeccionesReparaciones::mdlSumaTotalCostos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	SUMA TOTAL PRECIO
	=============================================*/

	static public function ctrSumaTotalPrecios($item, $valor){

		$tabla = "ordenes_inspecciones_reparaciones";

		$respuesta = ModeloOrdenesInspeccionesReparaciones::mdlSumaTotalPrecios($tabla, $item, $valor);

		return $respuesta;

	}

}



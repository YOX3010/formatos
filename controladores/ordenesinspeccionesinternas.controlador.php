<?php

class ControladorOrdenesInspeccionesInternas{

	/*=============================================
	CREAR ORDEN INSPECCION INTERNA
	=============================================*/

	static public function ctrCrearOrdenInspeccionInterna(){

		if(isset($_POST["nuevoOrdenInspeccionInterna"])){

				$tabla = "ordenes_inspecciones_internas";

				$datos = array(	"id_orden"=>$_POST["nuevoOrdenInspeccionInterna"],
								"id_elemento"=>$_POST["nuevoElemento"],
								"condicion"=>$_POST["nuevoCondicion"],
							   	"observacion"=>$_POST["nuevoObservacion"]);


				$respuesta = ModeloOrdenesInspeccionesInternas::mdlIngresarOrdenInspeccionInterna($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "La Inspeccion Interna ha sido guardada correctamente",
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
						  title: "¡Error al Guardar La Inspeccion Interna!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-internas";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ORDENES INSPECCIONES INTERNAS
	=============================================*/

	static public function ctrMostrarOrdenesInspeccionesInternas($item, $valor){

		$tabla = "ordenes_inspecciones_internas";

		$respuesta = ModeloOrdenesInspeccionesInternas::mdlMostrarOrdenesInspeccionesInternas($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR ORDEN INSPECCION INTERNA
	=============================================*/

	static public function ctrEditarOrdenInspeccionInterna(){

		if(isset($_POST["editarOrdenInspeccionInterna"])){

				$tabla = "ordenes_inspecciones_internas";

				$datos = array(	"id_orden"=>$_POST["editarOrdenInspeccionInterna"],
								"id_elemento"=>$_POST["editarElemento"],
								"condicion"=>$_POST["editarCondicion"],
							   	"observacion"=>$_POST["editarObservacion"],
							   	"id"=>$_POST["idOrdenInspeccionInterna"]);

				$respuesta = ModeloOrdenesInspeccionesInternas::mdlEditarOrdenInspeccionInterna($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					var idOrdenInspeccionInterna = $(this).attr("idOrdenInspeccionInterna");

					swal({

						  type: "warning",
						  title: "La Inspeccion Interna ha sido Editada correctamente Recuerde Actualizar",
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
						  title: "¡Error al Editar La Inspeccion Interna!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ordenes-inspecciones-internas";

							}

						})

			  	</script>';

			}

		}

	}

}



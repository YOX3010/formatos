<?php

class ControladorInspeccionesInternas{

	/*=============================================
	CREAR INSPECCION INTERNA
	=============================================*/

	static public function ctrCrearInspeccionInterna(){

		if(isset($_POST["nuevoInspeccionInterna"])){

				$tabla = "inspecciones_internas";

				$datos = array(	"elemento"=>$_POST["nuevoInspeccionInterna"]);


				$respuesta = ModeloInspeccionesInternas::mdlIngresarInspeccionInterna($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "La Inspeccion Interna ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){

									if (result.value) {

									window.location = "inspecciones-internas";

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

							window.location = "inspecciones-internas";

							}

						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR INSPECCIONES INTERNAS
	=============================================*/

	static public function ctrMostrarInspeccionesInternas($item, $valor){

		$tabla = "inspecciones_internas";

		$respuesta = ModeloInspeccionesInternas::mdlMostrarInspeccionesInternas($tabla, $item, $valor);

		return $respuesta;	

	}

	/*=============================================
	EDITAR INSPECCION INTERNA
	=============================================*/

	static public function ctrEditarInspeccionInterna(){

		if(isset($_POST["editarInspeccionInterna"])){

				$tabla = "inspecciones_internas";

				$datos = array(	"elemento"=>$_POST["editarInspeccionInterna"],
							   	"id"=>$_POST["idInspeccionInterna"]);

				$respuesta = ModeloInspeccionesInternas::mdlEditarInspeccionInterna($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({

						  type: "success",
						  title: "La Inspeccion Interna ha sido Editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "inspecciones-internas";

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

							window.location = "inspecciones-internas";

							}

						})

			  	</script>';

			}

		}

	}

}



<?php

require_once "../controladores/ordenesinspeccionesreparaciones.controlador.php";
require_once "../modelos/ordenesinspeccionesreparaciones.modelo.php";

class AjaxOrdenesInspeccionesReparaciones{

	/*=============================================
		EDITAR ORDEN INSPECCION REPARACION
	=============================================*/	

	public $idOrdenInspeccionReparacion;

	public function ajaxEditarOrdenInspeccionReparacion(){

		$item = "id";
		$valor = $this->idOrdenInspeccionReparacion;

		$respuesta = ControladorOrdenesInspeccionesReparaciones::ctrMostrarOrdenesInspeccionesReparaciones($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR ORDEN INSPECCION REPARACION
=============================================*/	

if(isset($_POST["idOrdenInspeccionReparacion"])){

	$ordeninspeccionreparacion = new AjaxOrdenesInspeccionesReparaciones();
	$ordeninspeccionreparacion -> idOrdenInspeccionReparacion = $_POST["idOrdenInspeccionReparacion"];
	$ordeninspeccionreparacion -> ajaxEditarOrdenInspeccionReparacion();

}


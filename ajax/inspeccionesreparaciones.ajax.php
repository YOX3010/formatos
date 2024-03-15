<?php

require_once "../controladores/inspeccionesreparaciones.controlador.php";
require_once "../modelos/inspeccionesreparaciones.modelo.php";

class AjaxInspeccionesReparaciones{

	/*=============================================
		EDITAR INSPECCION REPARACION
	=============================================*/	

	public $idInspeccionReparacion;

	public function ajaxEditarInspeccionReparacion(){

		$item = "id";
		$valor = $this->idInspeccionReparacion;

		$respuesta = ControladorInspeccionesReparaciones::ctrMostrarInspeccionesReparaciones($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR INSPECCIONES REPARACIONES
=============================================*/	

if(isset($_POST["idInspeccionReparacion"])){

	$inspeccionreparacion = new AjaxInspeccionesReparaciones();
	$inspeccionreparacion -> idInspeccionReparacion = $_POST["idInspeccionReparacion"];
	$inspeccionreparacion -> ajaxEditarInspeccionReparacion();

}


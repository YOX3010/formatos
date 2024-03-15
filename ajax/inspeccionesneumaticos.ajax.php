<?php

require_once "../controladores/inspeccionesneumaticos.controlador.php";
require_once "../modelos/inspeccionesneumaticos.modelo.php";

class AjaxInspeccionesNeumaticos{

	/*=============================================
		EDITAR INSPECCION neumatico
	=============================================*/	

	public $idInspeccionNeumatico;

	public function ajaxEditarInspeccionNeumatico(){

		$item = "id";
		$valor = $this->idInspeccionNeumatico;

		$respuesta = ControladorInspeccionesNeumaticos::ctrMostrarInspeccionesNeumaticos($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR INSPECCIONES INTERNAS
=============================================*/	

if(isset($_POST["idInspeccionNeumatico"])){

	$inspeccionneumatico = new AjaxInspeccionesNeumaticos();
	$inspeccionneumatico -> idInspeccionNeumatico = $_POST["idInspeccionNeumatico"];
	$inspeccionneumatico -> ajaxEditarInspeccionNeumatico();

}



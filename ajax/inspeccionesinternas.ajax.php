<?php

require_once "../controladores/inspeccionesinternas.controlador.php";
require_once "../modelos/inspeccionesinternas.modelo.php";

class AjaxInspeccionesInternas{

	/*=============================================
		EDITAR INSPECCION INTERNA
	=============================================*/	

	public $idInspeccionInterna;

	public function ajaxEditarInspeccionInterna(){

		$item = "id";
		$valor = $this->idInspeccionInterna;

		$respuesta = ControladorInspeccionesInternas::ctrMostrarInspeccionesInternas($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR INSPECCIONES INTERNAS
=============================================*/	

if(isset($_POST["idInspeccionInterna"])){

	$inspeccioninterna = new AjaxInspeccionesInternas();
	$inspeccioninterna -> idInspeccionInterna = $_POST["idInspeccionInterna"];
	$inspeccioninterna -> ajaxEditarInspeccionInterna();

}


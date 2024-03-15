<?php

require_once "../controladores/ordenesinspeccionesinternas.controlador.php";
require_once "../modelos/ordenesinspeccionesinternas.modelo.php";

class AjaxOrdenesInspeccionesInternas{

	/*=============================================
		EDITAR ORDEN INSPECCION INTERNA
	=============================================*/	

	public $idOrdenInspeccionInterna;

	public function ajaxEditarOrdenInspeccionInterna(){

		$item = "id";
		$valor = $this->idOrdenInspeccionInterna;

		$respuesta = ControladorOrdenesInspeccionesInternas::ctrMostrarOrdenesInspeccionesInternas($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR ORDEN INSPECCION INTERNA
=============================================*/	

if(isset($_POST["idOrdenInspeccionInterna"])){

	$ordeninspeccioninterna = new AjaxOrdenesInspeccionesInternas();
	$ordeninspeccioninterna -> idOrdenInspeccionInterna = $_POST["idOrdenInspeccionInterna"];
	$ordeninspeccioninterna -> ajaxEditarOrdenInspeccionInterna();

}


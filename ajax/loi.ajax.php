<?php

require_once "../controladores/loi.controlador.php";
require_once "../modelos/loi.modelo.php";

class AjaxLOI
{

	/*=============================================
		EDITAR LOI
	=============================================*/

	public $idLOI;

	public function ajaxEditarLOI()
	{

		$item = "id";
		$valor = $this->idLOI;

		$respuesta = ControladorLOI::ctrMostrarLOI($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR LOI
=============================================*/

if (isset($_POST["idLOI"])) {

	$loi = new AjaxLOI();
	$loi->idLOI = $_POST["idLOI"];
	$loi->ajaxEditarLOI();
}

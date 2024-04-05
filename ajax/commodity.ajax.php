<?php

require_once "../controladores/commodity.controlador.php";
require_once "../modelos/commodity.modelo.php";

class AjaxCommodity
{

	/*=============================================
		EDITAR COMMODITY
	=============================================*/

	public $idCommodity;

	public function ajaxEditarCommodity()
	{

		$item = "id";
		$valor = $this->idCommodity;

		$respuesta = ControladorCommodity::ctrMostrarCommodity($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR COMMODITY
=============================================*/

if (isset($_POST["idCommodity"])) {

	$commodity = new AjaxCommodity();
	$commodity->idCommodity = $_POST["idCommodity"];
	$commodity->ajaxEditarCommodity();
}

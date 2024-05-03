<?php

require_once "../controladores/incoterms.controlador.php";
require_once "../modelos/incoterms.modelo.php";

class AjaxIncoterms
{

	/*=============================================
		EDITAR INCOTERMS
	=============================================*/

	public $idIncoterm;

	public function ajaxEditarIncoterms()
	{

		$item = "id";
		$valor = $this->idIncoterm;

		$respuesta = ControladorIncoterms::ctrMostrarIncoterms($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR INCOTERMS
=============================================*/

if (isset($_POST["idIncoterm"])) {

	$incoterms = new AjaxIncoterms();
	$incoterms->idIncoterm = $_POST["idIncoterm"];
	$incoterms->ajaxEditarIncoterms();
}

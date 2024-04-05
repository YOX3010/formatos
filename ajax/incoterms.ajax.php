<?php

require_once "../controladores/incoterms.controlador.php";
require_once "../modelos/incoterms.modelo.php";

class AjaxIncoterms
{

	/*=============================================
		EDITAR INCOTERMS
	=============================================*/

	public $idIncoterms;

	public function ajaxEditarIncoterms()
	{

		$item = "id";
		$valor = $this->idIncoterms;

		$respuesta = ControladorIncoterms::ctrMostrarIncoterms($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR INCOTERMS
=============================================*/

if (isset($_POST["idIncoterms"])) {

	$incoterms = new AjaxIncoterms();
	$incoterms->idIncoterms = $_POST["idIncoterms"];
	$incoterms->ajaxEditarIncoterms();
}

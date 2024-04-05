<?php

require_once "../controladores/sco.controlador.php";
require_once "../modelos/sco.modelo.php";

class AjaxSCO
{

	/*=============================================
	EDITAR SCO
	=============================================*/

	public $idSCO;

	public function ajaxEditarSCO()
	{

		$item = "id";
		$valor = $this->idSCO;

		$respuesta = ControladorSCO::ctrMostrarSCO($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR SCO
=============================================*/

if (isset($_POST["idSCO"])) {

	$sco = new AjaxSCO();
	$sco->idSCO = $_POST["idSCO"];
	$sco->ajaxEditarSCO();
}

<?php

require_once "../controladores/icpo.controlador.php";
require_once "../modelos/icpo.modelo.php";

class AjaxICPO
{

	/*=============================================
		EDITAR ICPO
	=============================================*/

	public $idICPO;

	public function ajaxEditarICPO()
	{

		$item = "id";
		$valor = $this->idICPO;

		$respuesta = ControladorICPO::ctrMostrarICPO($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ICPO
=============================================*/

if (isset($_POST["idICPO"])) {

	$icpo = new AjaxICPO();
	$icpo->idICPO = $_POST["idICPO"];
	$icpo->ajaxEditarICPO();
}

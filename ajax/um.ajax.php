<?php

require_once "../controladores/um.controlador.php";
require_once "../modelos/um.modelo.php";

class AjaxUM
{

	/*=============================================
		EDITAR UM
	=============================================*/

	public $idUM;

	public function ajaxEditarUM()
	{

		$item = "id";
		$valor = $this->idUM;

		$respuesta = ControladorUM::ctrMostrarUM($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR UM
=============================================*/

if (isset($_POST["idUM"])) {

	$um = new AjaxUM();
	$um->idUM = $_POST["idUM"];
	$um->ajaxEditarUM();
}

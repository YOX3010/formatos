<?php

require_once "../controladores/formato2.controlador.php";
require_once "../modelos/formato2.modelo.php";

class AjaxFormato2
{

	/*=============================================
		EDITAR FORMATO 2
	=============================================*/

	public $idFormato2;

	public function ajaxEditarFormato2()
	{

		$item = "id";
		$valor = $this->idFormato2;

		$respuesta = ControladorFormato2::ctrMostrarFormato2($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR FORMATO 2
=============================================*/

if (isset($_POST["idFormato2"])) {

	$formato2 = new AjaxFormato2();
	$formato2->idFormato2 = $_POST["idFormato2"];
	$formato2->ajaxEditarFormato2();
}

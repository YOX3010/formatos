<?php

require_once "../controladores/formato4.controlador.php";
require_once "../modelos/formato4.modelo.php";

class AjaxFormato4
{

	/*=============================================
		EDITAR FORMATO 4
	=============================================*/

	public $idFormato4;

	public function ajaxEditarFormato4()
	{

		$item = "id";
		$valor = $this->idFormato4;

		$respuesta = ControladorFormato4::ctrMostrarFormato4($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR FORMATO 4
=============================================*/

if (isset($_POST["idFormato4"])) {

	$formato4 = new AjaxFormato4();
	$formato4->idFormato4 = $_POST["idFormato4"];
	$formato4->ajaxEditarFormato4();
}

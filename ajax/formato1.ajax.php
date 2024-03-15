<?php

require_once "../controladores/formato1.controlador.php";
require_once "../modelos/formato1.modelo.php";

class AjaxFormato1
{

	/*=============================================
		EDITAR FORMATO 1
	=============================================*/

	public $idFormato1;

	public function ajaxEditarFormato1()
	{

		$item = "id";
		$valor = $this->idFormato1;

		$respuesta = ControladorFormato1::ctrMostrarFormato1($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR FORMATO 1
=============================================*/

if (isset($_POST["idFormato1"])) {

	$formato1 = new AjaxFormato1();
	$formato1->idFormato1 = $_POST["idFormato1"];
	$formato1->ajaxEditarFormato1();
}

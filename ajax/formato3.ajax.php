<?php

require_once "../controladores/formato3.controlador.php";
require_once "../modelos/formato3.modelo.php";

class AjaxFormato3
{

	/*=============================================
		EDITAR FORMATO 3
	=============================================*/

	public $idFormato3;

	public function ajaxEditarFormato3()
	{

		$item = "id";
		$valor = $this->idFormato3;

		$respuesta = ControladorFormato3::ctrMostrarFormato3($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR FORMATO 3
=============================================*/

if (isset($_POST["idFormato3"])) {

	$formato3 = new AjaxFormato3();
	$formato3->idFormato3 = $_POST["idFormato3"];
	$formato3->ajaxEditarFormato3();
}

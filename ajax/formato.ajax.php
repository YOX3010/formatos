<?php

require_once "../controladores/formato.controlador.php";
require_once "../modelos/formato.modelo.php";

class AjaxFormato
{

	/*=============================================
		EDITAR FORMATO 1
	=============================================*/

	public $idFormato;

	public function ajaxEditarFormato()
	{

		$item = "id";
		$valor = $this->idFormato;

		$respuesta = ControladorFormato::ctrMostrarFormato($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR FORMATO 1
=============================================*/

if (isset($_POST["idFormato"])) {

	$formato = new AjaxFormato();
	$formato->idFormato = $_POST["idFormato"];
	$formato->ajaxEditarFormato();
}

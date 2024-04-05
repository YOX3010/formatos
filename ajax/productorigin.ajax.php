<?php

require_once "../controladores/productorigin.controlador.php";
require_once "../modelos/productorigin.modelo.php";

class AjaxProductOrigin
{

	/*=============================================
		EDITAR PRODUCT ORIGIN
	=============================================*/

	public $idProductOrigin;

	public function ajaxEditarProductOrigin()
	{

		$item = "id";
		$valor = $this->idProductOrigin;

		$respuesta = ControladorProductOrigin::ctrMostrarProductOrigin($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR PRODUCT ORIGIN
=============================================*/

if (isset($_POST["idProductOrigin"])) {

	$productorigin = new AjaxProductOrigin();
	$productorigin->idProductOrigin = $_POST["idProductOrigin"];
	$productorigin->ajaxEditarProductOrigin();
}

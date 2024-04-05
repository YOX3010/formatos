<?php

require_once "../controladores/port.controlador.php";
require_once "../modelos/port.modelo.php";

class AjaxPort
{

	/*=============================================
		EDITAR PORT
	=============================================*/

	public $idPort;

	public function ajaxEditarPort()
	{

		$item = "id";
		$valor = $this->idPort;

		$respuesta = ControladorPort::ctrMostrarPort($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR PORT
=============================================*/

if (isset($_POST["idPort"])) {

	$port = new AjaxPort();
	$port->idPort = $_POST["idPort"];
	$port->ajaxEditarPort();
}

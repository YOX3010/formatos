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

	/*=============================================
	ENVIAR ID CLIENTE
	=============================================*/

	public $idMostrarCliente;
	public $idMostrarSCO;

	public function ajaxMostrarCliente()
	{

		$itemCliente = "id";
		$valorCliente = $this->idMostrarCliente;

		$respuestaCliente = ControladorSCO::ctrMostrarSCO($itemCliente, $valorCliente);

		echo json_encode($respuestaCliente);
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

/*=============================================
ENVIAR CLIENTE
=============================================*/

if (isset($_POST["idMostrarCliente"])) {

	$cotizacion = new AjaxSCO();
	$cotizacion->idMostrarCliente = $_POST["idMostrarCliente"];
	$cotizacion->ajaxMostrarCliente();
}

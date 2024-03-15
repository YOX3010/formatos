<?php

require_once "../controladores/ordenesaverias.controlador.php";
require_once "../modelos/ordenesaverias.modelo.php";

class AjaxOrdenesAverias
{

	/*=============================================
		EDITAR ORDENES AVERIAS
	=============================================*/

	public $idOrdenAveria;

	public function ajaxEditarOrdenAveria()
	{

		$item = "id";
		$valor = $this->idOrdenAveria;

		$respuesta = ControladorOrdenesAverias::ctrMostrarOrdenesAverias($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ORDENES AVERIAS
=============================================*/

if (isset($_POST["idOrdenAveria"])) {

	$ordenaveria = new AjaxOrdenesAverias();
	$ordenaveria->idOrdenAveria = $_POST["idOrdenAveria"];
	$ordenaveria->ajaxEditarOrdenAveria();
}

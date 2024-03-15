<?php

require_once "../controladores/inspeccionesaccesorios.controlador.php";
require_once "../modelos/inspeccionesaccesorios.modelo.php";

class AjaxInspeccionesAccesorios
{

	/*=============================================
		EDITAR INSPECCION ACCESORIOS
	=============================================*/

	public $idInspeccionAccesorio;

	public function ajaxEditarInspeccionAccesorio()
	{

		$item = "id";
		$valor = $this->idInspeccionAccesorio;

		$respuesta = ControladorInspeccionesAccesorios::ctrMostrarInspeccionesAccesorios($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR INSPECCIONES ACCESORIOS
=============================================*/

if (isset($_POST["idInspeccionAccesorio"])) {

	$inspeccionaccesorio = new AjaxInspeccionesAccesorios();
	$inspeccionaccesorio->idInspeccionAccesorio = $_POST["idInspeccionAccesorio"];
	$inspeccionaccesorio->ajaxEditarInspeccionAccesorio();
}

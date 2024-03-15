<?php

require_once "../controladores/ordenesinspeccionesaccesorios.controlador.php";
require_once "../modelos/ordenesinspeccionesaccesorios.modelo.php";

class AjaxOrdenesInspeccionesAccesorios
{

	/*=============================================
		EDITAR ORDEN INSPECCION ACCESORIOS
	=============================================*/

	public $idOrdenInspeccionAccesorio;

	public function ajaxEditarOrdenInspeccionAccesorio()
	{

		$item = "id";
		$valor = $this->idOrdenInspeccionAccesorio;

		$respuesta = ControladorOrdenesInspeccionesAccesorios::ctrMostrarOrdenesInspeccionesAccesorios($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ORDEN INSPECCION ACCESORIOS
=============================================*/

if (isset($_POST["idOrdenInspeccionAccesorio"])) {

	$ordeninspeccionaccesorio = new AjaxOrdenesInspeccionesAccesorios();
	$ordeninspeccionaccesorio->idOrdenInspeccionAccesorio = $_POST["idOrdenInspeccionAccesorio"];
	$ordeninspeccionaccesorio->ajaxEditarOrdenInspeccionAccesorio();
}

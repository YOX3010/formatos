<?php

require_once "../controladores/ordenesinspeccionesbaterias.controlador.php";
require_once "../modelos/ordenesinspeccionesbaterias.modelo.php";

class AjaxOrdenesInspeccionesBaterias
{

	/*=============================================
		EDITAR ORDEN INSPECCION BATERÍA
	=============================================*/

	public $idOrdenInspeccionBateria;

	public function ajaxEditarOrdenInspeccionBateria()
	{

		$item = "id";
		$valor = $this->idOrdenInspeccionBateria;

		$respuesta = ControladorOrdenesInspeccionesBaterias::ctrMostrarOrdenesInspeccionesBaterias($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ORDEN INSPECCION BATERÍAS
=============================================*/

if (isset($_POST["idOrdenInspeccionBateria"])) {

	$ordeninspeccionbateria = new AjaxOrdenesInspeccionesBaterias();
	$ordeninspeccionbateria->idOrdenInspeccionBateria = $_POST["idOrdenInspeccionBateria"];
	$ordeninspeccionbateria->ajaxEditarOrdenInspeccionBateria();
}

<?php

require_once "../controladores/inspeccionesbaterias.controlador.php";
require_once "../modelos/inspeccionesbaterias.modelo.php";

class AjaxInspeccionesBaterias
{

	/*=============================================
		EDITAR INSPECCION BATERÍAS
	=============================================*/

	public $idInspeccionBateria;

	public function ajaxEditarInspeccionBateria()
	{

		$item = "id";
		$valor = $this->idInspeccionBateria;

		$respuesta = ControladorInspeccionesBaterias::ctrMostrarInspeccionesBaterias($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR INSPECCIONES BATERÍAS
=============================================*/

if (isset($_POST["idInspeccionBateria"])) {

	$inspeccionbateria = new AjaxInspeccionesBaterias();
	$inspeccionbateria->idInspeccionBateria = $_POST["idInspeccionBateria"];
	$inspeccionbateria->ajaxEditarInspeccionBateria();
}

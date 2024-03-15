<?php

require_once "../controladores/inspeccionesgenerales.controlador.php";
require_once "../modelos/inspeccionesgenerales.modelo.php";

class AjaxInspeccionesGenerales
{

	/*=============================================
		EDITAR INSPECCION GENERALES
	=============================================*/

	public $idInspeccionGeneral;

	public function ajaxEditarInspeccionGeneral()
	{

		$item = "id";
		$valor = $this->idInspeccionGeneral;

		$respuesta = ControladorInspeccionesGenerales::ctrMostrarInspeccionesGenerales($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR INSPECCIONES GENERALES
=============================================*/

if (isset($_POST["idInspeccionGeneral"])) {

	$inspecciongeneral = new AjaxInspeccionesGenerales();
	$inspecciongeneral->idInspeccionGeneral = $_POST["idInspeccionGeneral"];
	$inspecciongeneral->ajaxEditarInspeccionGeneral();
}

<?php

require_once "../controladores/ordenesinspeccionesgenerales.controlador.php";
require_once "../modelos/ordenesinspeccionesgenerales.modelo.php";

class AjaxOrdenesInspeccionesGenerales
{

	/*=============================================
		EDITAR ORDEN INSPECCION GENERALES
	=============================================*/

	public $idOrdenInspeccionGeneral;

	public function ajaxEditarOrdenInspeccionGeneral()
	{

		$item = "id";
		$valor = $this->idOrdenInspeccionGeneral;

		$respuesta = ControladorOrdenesInspeccionesGenerales::ctrMostrarOrdenesInspeccionesGenerales($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ORDEN INSPECCION GENERALES
=============================================*/

if (isset($_POST["idOrdenInspeccionGeneral"])) {

	$ordeninspecciongeneral = new AjaxOrdenesInspeccionesGenerales();
	$ordeninspecciongeneral->idOrdenInspeccionGeneral = $_POST["idOrdenInspeccionGeneral"];
	$ordeninspecciongeneral->ajaxEditarOrdenInspeccionGeneral();
}

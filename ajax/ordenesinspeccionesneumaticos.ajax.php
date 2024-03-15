<?php

require_once "../controladores/ordenesinspeccionesneumaticos.controlador.php";
require_once "../modelos/ordenesinspeccionesneumaticos.modelo.php";

class AjaxOrdenesInspeccionesNeumaticos
{

	/*=============================================
		EDITAR ORDEN INSPECCION NEUMATICOS
	=============================================*/

	public $idOrdenInspeccionNeumatico;

	public function ajaxEditarOrdenInspeccionNeumatico()
	{

		$item = "id";
		$valor = $this->idOrdenInspeccionNeumatico;

		$respuesta = ControladorOrdenesInspeccionesNeumaticos::ctrMostrarOrdenesInspeccionesNeumaticos($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ORDEN INSPECCION NEUMATICOS
=============================================*/

if (isset($_POST["idOrdenInspeccionNeumatico"])) {

	$ordeninspeccionneumatico = new AjaxOrdenesInspeccionesNeumaticos();
	$ordeninspeccionneumatico->idOrdenInspeccionNeumatico = $_POST["idOrdenInspeccionNeumatico"];
	$ordeninspeccionneumatico->ajaxEditarOrdenInspeccionNeumatico();
}

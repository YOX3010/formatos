<?php

require_once "../controladores/ordenesvehiculos.controlador.php";
require_once "../modelos/ordenesvehiculos.modelo.php";

class AjaxOrdenesVehiculos{

	/*=============================================
		EDITAR ORDEN VEHICULO
	=============================================*/	

	public $idOrdenVehiculo;

	public function ajaxEditarOrdenVehiculo(){

		$item = "id";
		$valor = $this->idOrdenVehiculo;

		$respuesta = ControladorOrdenesVehiculos::ctrMostrarOrdenesVehiculos($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR ORDEN VEHICULO
=============================================*/	

if(isset($_POST["idOrdenVehiculo"])){

	$ordenvehiculo = new AjaxOrdenesVehiculos();
	$ordenvehiculo -> idOrdenVehiculo = $_POST["idOrdenVehiculo"];
	$ordenvehiculo -> ajaxEditarOrdenVehiculo();

}


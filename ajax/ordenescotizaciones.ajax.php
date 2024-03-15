<?php

require_once "../controladores/ordenescotizaciones.controlador.php";
require_once "../modelos/ordenescotizaciones.modelo.php";

class AjaxOrdenesCotizaciones{

	/*=============================================
		EDITAR ORDEN COTIZACION
	=============================================*/	

	public $idOrdenCotizacion;

	public function ajaxEditarOrdenCotizacion(){

		$item = "id";
		$valor = $this->idOrdenCotizacion;

		$respuesta = ControladorOrdenesCotizaciones::ctrMostrarOrdenesCotizaciones($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR ORDEN COTIZACION
=============================================*/	

if(isset($_POST["idOrdenCotizacion"])){

	$ordencotizacion = new AjaxOrdenesCotizaciones();
	$ordencotizacion -> idOrdenCotizacion = $_POST["idOrdenCotizacion"];
	$ordencotizacion -> ajaxEditarOrdenCotizacion();

}


<?php

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class AjaxModelos{

	/*=============================================
		EDITAR MODELO
	=============================================*/	

	public $idMarca;

	public function ajaxEditarModelo(){

		$item = "id";
		$valor = $this->idModelo;

		$respuesta = ControladorModelos::ctrMostrarModelos($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR MODELO
=============================================*/	

if(isset($_POST["idModelo"])){

	$modelo = new AjaxModelos();
	$modelo -> idModelo = $_POST["idModelo"];
	$modelo -> ajaxEditarModelo();

}


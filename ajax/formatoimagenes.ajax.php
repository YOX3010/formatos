<?php

require_once "../controladores/formatoimagenes.controlador.php";
require_once "../modelos/formatoimagenes.modelo.php";

class AjaxFormatoImagenes
{

	/*=============================================
		EDITAR FORMATO IMAGENES
	=============================================*/

	public $idFormatoImagenes;

	public function ajaxEditarFormatoImagenes()
	{

		$item = "id";
		$valor = $this->idFormatoImagenes;

		$respuesta = ControladorFormatoImagenes::ctrMostrarFormatoImagenes($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR FORMATO IMAGENES
=============================================*/

if (isset($_POST["idFormatoImagenes"])) {

	$formatoimagenes = new AjaxFormatoImagenes();
	$formatoimagenes->idFormatoImagenes = $_POST["idFormatoImagenes"];
	$formatoimagenes->ajaxEditarFormatoImagenes();
}

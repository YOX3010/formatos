<?php

require_once "../controladores/marcasbaterias.controlador.php";
require_once "../modelos/marcasbaterias.modelo.php";

class AjaxMarcasBaterias
{

	/*=============================================
		EDITAR MARCAS BATERÍAS
	=============================================*/

	public $idMarcaBateria;

	public function ajaxEditarMarcaBateria()
	{

		$item = "id";
		$valor = $this->idMarcaBateria;

		$respuesta = ControladorMarcasBaterias::ctrMostrarMarcasBaterias($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR MARCAS BATERÍAS
=============================================*/

if (isset($_POST["idMarcaBateria"])) {

	$marcabateria = new AjaxMarcasBaterias();
	$marcabateria-> idMarcaBateria = $_POST["idMarcaBateria"];
	$marcabateria->ajaxEditarMarcaBateria();
}

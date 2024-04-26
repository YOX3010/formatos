<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos
{

  /*=============================================
		EDITAR PRODUCTO
	=============================================*/

  public $idProducto;

  public function ajaxEditarProductos()
  {

    $item = "id";
    $valor = $this->idProducto;

    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

    echo json_encode($respuesta);
  }
}

/*=============================================
EDITAR PRODCUTO
=============================================*/

if (isset($_POST["idProducto"])) {

  $producto = new AjaxProductos();
  $producto->idProducto = $_POST["idProducto"];
  $producto->ajaxEditarProductos();
}

<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes
{

  /*=============================================
		EDITAR CLIENTE
	=============================================*/

  public $idCliente;

  public function ajaxEditarClientes()
  {

    $item = "id";
    $valor = $this->idCliente;

    $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

    echo json_encode($respuesta);
  }
}

/*=============================================
EDITAR PRODCUTO
=============================================*/

if (isset($_POST["idCliente"])) {

  $cliente = new AjaxClientes();
  $cliente->idCliente = $_POST["idCliente"];
  $cliente->ajaxEditarClientes();
}

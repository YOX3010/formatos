<?php

class ControladorCuentasCobrar{	

	/*=============================================
	MOSTRAR CUENTAS COBRAR
	=============================================*/

	static public function ctrMostrarCuentasCobrar($item, $valor){

		$tabla = "cuentas_cobrar";

		$respuesta = ModeloCuentasCobrar::mdlMostrarCuentasCobrar($tabla, $item, $valor);

		return $respuesta;	

	}

}
	

	



<?php



require_once "conexion.php";



class ModeloProductos
{



	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================

	REGISTRO DE PRODUCTO

	=============================================*/

	static public function mdlIngresarProducto($tabla, $datos)
	{



		$stmt = Conexion::conectar()->prepare("		INSERT INTO 		$tabla(		commodity,
																					price_cliente,
																					price_provedor,
																					ficha_tecnica) 
																		VALUES(		:commodity,
																					:price_cliente,
																					:price_provedor,
																					:ficha_tecnica)");

		$stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
		$stmt->bindParam(":price_cliente", $datos["price_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":price_provedor", $datos["price_provedor"], PDO::PARAM_STR);
		$stmt->bindParam(":ficha_tecnica", $datos["ficha_tecnica"], PDO::PARAM_STR);



		if ($stmt->execute()) {



			return "ok";
		} else {



			return "error";
		}



		$stmt->close();

		$stmt = null;
	}



	/*=============================================

	EDITAR PRODUCTO

	=============================================*/

	static public function mdlEditarProducto($tabla, $datos)
	{



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	commodity = :commodity,
																		price_cliente = :price_cliente,
																		price_provedor = :price_provedor,
																		ficha_tecnica = :ficha_tecnica
															 	WHERE 	id 		= :id");



		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
		$stmt->bindParam(":price_cliente", $datos["price_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":price_provedor", $datos["price_provedor"], PDO::PARAM_STR);
		$stmt->bindParam(":ficha_tecnica", $datos["ficha_tecnica"], PDO::PARAM_STR);



		if ($stmt->execute()) {



			return "ok";
		} else {



			return "error";
		}



		$stmt->close();

		$stmt = null;
	}



	/*=============================================

	BORRAR PRODUCTO

	=============================================*/



	static public function mdlEliminarProducto($tabla, $datos)
	{



		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");



		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);



		if ($stmt->execute()) {



			return "ok";
		} else {



			return "error";
		}



		$stmt->close();



		$stmt = null;
	}



	/*=============================================

	ACTUALIZAR PRODUCTO

	=============================================*/



	//static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){



	//$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");



	//$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

	//$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);



	//if($stmt -> execute()){



	//return "ok";



	//}else{



	//return "error";	



	//}



	//$stmt -> close();



	//$stmt = null;



	//}



	/*=============================================

	MOSTRAR SUMA VENTAS

	=============================================*/



	// static public function mdlMostrarSumaVentas($tabla)
	// {



	// 	$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");



	// 	$stmt->execute();



	// 	return $stmt->fetch();



	// 	$stmt->close();



	// 	$stmt = null;
	// }
}

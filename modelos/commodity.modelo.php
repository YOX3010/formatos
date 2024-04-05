<?php

require_once "conexion.php";

class ModeloCommodity
{

	/*=============================================
	CREAR COMMODITY
	=============================================*/

	static public function mdlIngresarCommodity($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(		commodity,
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
	MOSTRAR COMMODITY
	=============================================*/

	static public function mdlMostrarCommodity($tabla, $item, $valor)
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
	EDITAR COMMODITY
	=============================================*/

	static public function mdlEditarCommodity($tabla, $datos)
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
}

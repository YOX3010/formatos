<?php

require_once "conexion.php";

class ModeloIncoterms
{

	/*=============================================
	CREAR INCOTERMS
	=============================================*/

	static public function mdlIngresarIncoterms($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(		incoterm,
																			procedimiento) 
																VALUES(		:incoterm,
																			:procedimiento)");

		$stmt->bindParam(":incoterm", $datos["incoterm"], PDO::PARAM_STR);
		$stmt->bindParam(":procedimiento", $datos["procedimiento"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR INCOTERMS
	=============================================*/

	static public function mdlMostrarIncoterms($tabla, $item, $valor)
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
	EDITAR INCOTERMS
	=============================================*/

	static public function mdlEditarIncoterms($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	incoterm = :incoterm,
																		procedimiento = :procedimiento
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":incoterm", $datos["incoterm"], PDO::PARAM_STR);
		$stmt->bindParam(":procedimiento", $datos["procedimiento"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

<?php

require_once "conexion.php";

class ModeloUM
{

	/*=============================================
	CREAR UM
	=============================================*/

	static public function mdlIngresarUM($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(		unidad) 
																VALUES(		:unidad)");

		$stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR UM
	=============================================*/

	static public function mdlMostrarUM($tabla, $item, $valor)
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
	EDITAR UM
	=============================================*/

	static public function mdlEditarUM($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	unidad = :unidad
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

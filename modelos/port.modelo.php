<?php

require_once "conexion.php";

class ModeloPort
{

	/*=============================================
	CREAR PORT
	=============================================*/

	static public function mdlIngresarPort($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(		port) 
																VALUES(		:port)");

		$stmt->bindParam(":port", $datos["port"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR PORT
	=============================================*/

	static public function mdlMostrarPort($tabla, $item, $valor)
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
	EDITAR PORT
	=============================================*/

	static public function mdlEditarPort($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	port = :port
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":port", $datos["port"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

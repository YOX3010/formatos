<?php

require_once "conexion.php";

class ModeloOrdenesAverias
{

	/*=============================================
	CREAR ORDEN AVERIAS
	=============================================*/

	static public function mdlIngresarOrdenAveria($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_orden,
																		averia) 
																VALUES(	:id_orden,
							   											:averia)");

		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":averia", $datos["averia"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR ORDENES AVERIAS
	=============================================*/

	static public function mdlMostrarOrdenesAverias($tabla, $item, $valor)
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
	EDITAR ORDEN AVERIAS
	=============================================*/

	static public function mdlEditarOrdenAveria($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_orden 	= 	:id_orden,
							   											averia = :averia
															 	WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":averia", $datos["averia"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

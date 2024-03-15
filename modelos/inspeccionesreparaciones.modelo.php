<?php

require_once "conexion.php";

class ModeloInspeccionesReparaciones
{

	/*=============================================
	CREAR INSPECCION REPARACION
	=============================================*/

	static public function mdlIngresarInspeccionReparacion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(		reparacion) 
																VALUES(		:reparacion)");

		$stmt->bindParam(":reparacion", $datos["reparacion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR INSPECCIONES REPARACIONES
	=============================================*/

	static public function mdlMostrarInspeccionesReparaciones($tabla, $item, $valor)
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
	EDITAR INSPECCION REPARACION
	=============================================*/

	static public function mdlEditarInspeccionReparacion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	reparacion = :reparacion
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":reparacion", $datos["reparacion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

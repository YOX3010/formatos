<?php

require_once "conexion.php";

class ModeloInspeccionesNeumaticos
{

	/*=============================================
	CREAR INSPECCION NEUMATICOS
	=============================================*/

	static public function mdlIngresarInspeccionNeumatico($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	elemento) 
																VALUES(	:elemento)");

		$stmt->bindParam(":elemento", $datos["elemento"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR INSPECCIONES NEUMATICOS
	=============================================*/

	static public function mdlMostrarInspeccionesNeumaticos($tabla, $item, $valor)
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
	EDITAR INSPECCION NEUMATICO
	=============================================*/

	static public function mdlEditarInspeccionNeumatico($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	elemento = :elemento
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":elemento", $datos["elemento"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

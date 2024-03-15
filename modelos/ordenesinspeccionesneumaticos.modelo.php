<?php

require_once "conexion.php";

class ModeloOrdenesInspeccionesNeumaticos
{

	/*=============================================
	CREAR ORDEN INSPECCION NEUMATICOS
	=============================================*/

	static public function mdlIngresarOrdenInspeccionNeumatico($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_orden,
																		id_elemento,
																		condicion,
																		observaciones) 
																VALUES(	:id_orden,
																		:id_elemento,
																		:condicion,
							   											:observaciones)");

		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_elemento", $datos["id_elemento"], PDO::PARAM_INT);
		$stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR ORDENES INSPECCIONES NEUMATICOS
	=============================================*/

	static public function mdlMostrarOrdenesInspeccionesNeumaticos($tabla, $item, $valor)
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
	EDITAR ORDEN INSPECCION NEUMATICOS
	=============================================*/

	static public function mdlEditarOrdenInspeccionNeumatico($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_orden 	= :id_orden,
																		id_elemento = :id_elemento,
																		condicion 	= :condicion,
							   											observaciones = :observaciones
															 	WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_elemento", $datos["id_elemento"], PDO::PARAM_INT);
		$stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

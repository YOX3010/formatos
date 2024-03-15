<?php

require_once "conexion.php";

class ModeloOrdenesCotizaciones
{

	/*=============================================
	CREAR ORDEN COTIZACIONES
	=============================================*/

	static public function mdlIngresarOrdenCotizacion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_orden,
																		id_reparaciones,
																		costo,
																		precio) 
																VALUES(	:id_orden,
																		:id_reparacion,
																		:costo,
							   											:precio)");

		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_reparacion", $datos["id_reparacion"], PDO::PARAM_INT);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR ORDENES COTIZACIONES
	=============================================*/

	static public function mdlMostrarOrdenesCotizaciones($tabla, $item, $valor)
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
	EDITAR ORDEN COTIZACIONES
	=============================================*/

	static public function mdlEditarOrdenCotizacion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_orden 	= :id_orden,
																		id_reparacion = :id_reparacion,
																		costo 	= :costo,
							   											precio = :precio
															 	WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_reparacion", $datos["id_reparacion"], PDO::PARAM_INT);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

<?php

require_once "conexion.php";

class ModeloLOI
{

	/*=============================================
	CREAR LOI
	=============================================*/

	static public function mdlIngresarLOI($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(		id_proveedor,
																			id_clientes,
																			codigo,
																			descripcion
																			-- loi_image
																			) 
																VALUES(		:id_proveedor,
																			:id_clientes,
																			:codigo,
																			:descripcion
																			-- :loi_image
																			)");

		$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_clientes", $datos["id_clientes"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		// $stmt->bindParam(":loi_image", $datos["loi_image"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR LOI
	=============================================*/

	static public function mdlMostrarLOI($tabla, $item, $valor)
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
	EDITAR LOI
	=============================================*/

	static public function mdlEditarLOI($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_proveedor = :id_proveedor,
																		id_clientes = :id_clientes,
																		descripcion = :descripcion
																WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
		$stmt->bindParam(":id_clientes", $datos["id_clientes"], PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

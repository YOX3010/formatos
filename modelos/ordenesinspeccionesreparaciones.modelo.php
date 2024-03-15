<?php

require_once "conexion.php";

class ModeloOrdenesInspeccionesReparaciones{

	/*=============================================
	CREAR ORDEN INSPECCION REPARACION
	=============================================*/

	static public function mdlIngresarOrdenInspeccionReparacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_orden,
																		reparacion,
																		costo,
																		precio) 
																VALUES(	:id_orden,
																		:reparacion,
																		:costo,
							   											:precio)");

		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":reparacion", $datos["reparacion"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ORDENES INSPECCIONES REPARACIONES
	=============================================*/

	static public function mdlMostrarOrdenesInspeccionesReparaciones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR ORDEN INSPECCION REPACION
	=============================================*/

	static public function mdlEditarOrdenInspeccionReparacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_orden 	= :id_orden,
																		reparacion = :reparacion,
																		costo 	= :costo,
							   											precio = :precio
															 	WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":reparacion", $datos["reparacion"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	SUMAR EL TOTAL DE COSTOS
	=============================================*/

	static public function mdlSumaTotalCostos($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(costo) as costo FROM $tabla WHERE id_orden = $item");

		//$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SUMAR EL TOTAL DE PRECIOS
	=============================================*/

	static public function mdlSumaTotalPrecios($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(precio) as precio FROM $tabla WHERE id_orden = $item");

		//$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	
}






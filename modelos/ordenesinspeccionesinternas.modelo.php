<?php

require_once "conexion.php";

class ModeloOrdenesInspeccionesInternas{

	/*=============================================
	CREAR ORDEN INSPECCION INTERNA
	=============================================*/

	static public function mdlIngresarOrdenInspeccionInterna($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_orden,
																		id_elemento,
																		condicion,
							   											observacion) 
																VALUES(	:id_orden,
																		:id_elemento,
																		:condicion,
							   											:observacion)");

		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_elemento", $datos["id_elemento"], PDO::PARAM_INT);
		$stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ORDENES INSPECCIONES INTERNAS
	=============================================*/

	static public function mdlMostrarOrdenesInspeccionesInternas($tabla, $item, $valor){

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
	EDITAR ORDEN INSPECCION INTERNA
	=============================================*/

	static public function mdlEditarOrdenInspeccionInterna($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_orden 	= :id_orden,
																		id_elemento = :id_elemento,
																		condicion 	= :condicion,
							   											observacion = :observacion
															 	WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_elemento", $datos["id_elemento"], PDO::PARAM_INT);
		$stmt->bindParam(":condicion", $datos["condicion"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




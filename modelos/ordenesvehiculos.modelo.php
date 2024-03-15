<?php

require_once "conexion.php";

class ModeloOrdenesVehiculos{

	/*=============================================
	CREAR ORDEN VEHICULO
	=============================================*/

	static public function mdlIngresarOrdenVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_orden,
																		id_vehiculo,
																		placa,
							   											color) 
																VALUES(	:id_orden,
																		:id_vehiculo,
																		:placa,
							   											:color)");

		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_STR);
		$stmt->bindParam(":id_vehiculo", $datos["id_vehiculo"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ORDENES VEHICULOS
	=============================================*/

	static public function mdlMostrarOrdenesVehiculos($tabla, $item, $valor){

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
	EDITAR ORNDE VEHICULO
	=============================================*/

	static public function mdlEditarOrdenVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_orden 	= :id_orden,
																		id_vehiculo = :id_vehiculo,
																		placa 		= :placa,
							   											color 		= :color
															 	WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_orden", $datos["id_orden"], PDO::PARAM_STR);
		$stmt->bindParam(":id_vehiculo", $datos["id_vehiculo"], PDO::PARAM_STR);
		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




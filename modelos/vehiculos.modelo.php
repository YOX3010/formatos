<?php

require_once "conexion.php";

class ModeloVehiculos{

	/*=============================================
	CREAR VEHICULO
	=============================================*/

	static public function mdlIngresarVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_marca,
																		id_modelo,
																		year,
							   											id_tipo) 
																VALUES(	:id_marca,
																		:id_modelo,
																		:year,
							   											:id_tipo)");

		$stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_STR);
		$stmt->bindParam(":id_modelo", $datos["id_modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":year", $datos["year"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tipo", $datos["id_tipo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR VEHICULOS
	=============================================*/

	static public function mdlMostrarVehiculos($tabla, $item, $valor){

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
	EDITAR VEHICULO
	=============================================*/

	static public function mdlEditarVehiculo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_marca 	= :id_marca,
																		id_modelo 	= :id_modelo,
																		year 	= :year,
							   											id_tipo 	= :id_tipo
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_STR);
		$stmt->bindParam(":id_modelo", $datos["id_modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":year", $datos["year"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tipo", $datos["id_tipo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




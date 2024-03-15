<?php

require_once "conexion.php";

class ModeloCargos{

	/*=============================================
	CREAR CARGO
	=============================================*/

	static public function mdlIngresarCargo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	cargo) 
																VALUES(	:cargo)");

		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CARGOS
	=============================================*/

	static public function mdlMostrarCargos($tabla, $item, $valor){

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
	EDITAR CARGO
	=============================================*/

	static public function mdlEditarCargo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	cargo 	= :cargo
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




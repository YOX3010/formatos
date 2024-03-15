<?php

require_once "conexion.php";

class ModeloModelos{

	/*=============================================
	CREAR MODELO
	=============================================*/

	static public function mdlIngresarModelo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	modelo) 
																VALUES(	:modelo)");

		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MODELOS
	=============================================*/

	static public function mdlMostrarModelos($tabla, $item, $valor){

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
	EDITAR MODELO
	=============================================*/

	static public function mdlEditarModelo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	modelo 	= :modelo
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




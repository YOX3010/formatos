<?php

require_once "conexion.php";

class ModeloMarcas{

	/*=============================================
	CREAR MARCA
	=============================================*/

	static public function mdlIngresarMarca($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	marca) 
																VALUES(	:marca)");

		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MARCAS
	=============================================*/

	static public function mdlMostrarMarcas($tabla, $item, $valor){

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
	EDITAR MARCA
	=============================================*/

	static public function mdlEditarMarca($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	marca 	= :marca
															 	WHERE 	id 		= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




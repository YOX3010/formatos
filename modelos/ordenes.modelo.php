<?php

require_once "conexion.php";

class ModeloOrdenes{

	/*=============================================
	CREAR ORDEN DE SERVICIO
	=============================================*/

	static public function mdlIngresarOrden($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_usuario,
																		id_cliente,
																		fecha_ingreso,
							   											/*fecha_salida,
							   											id_empleado,
							   											status_reparacion,*/
							   											observaciones) 
																VALUES(	:id_usuario,
																		:id_cliente,
																		:fecha_ingreso,
							   											/*:fecha_salida,
							   											:id_empleado,
							   											:status_reparacion,*/
							   											:observaciones)");

		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
		//$stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);
		//$stmt->bindParam(":id_empleado", $datos["id_empleado"], PDO::PARAM_INT);
		//$stmt->bindParam(":status_reparacion", $datos["status_reparacion"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";		

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ORDENES DE SERVICIOS
	=============================================*/

	static public function mdlMostrarOrdenes($tabla, $item, $valor){

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
	EDITAR ORDEN DE SERVICIO
	=============================================*/

	static public function mdlEditarOrden($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_usuario 		= 	:id_usuario,
																		id_cliente 		= 	:id_cliente,
																		fecha_ingreso 	=	:fecha_ingreso,
							   											fecha_salida 	=	:fecha_salida,
							   											id_empleado 	=	:id_empleado,
							   											status_reparacion =	:status_reparacion,
							   											observaciones 	=	:observaciones
															 	WHERE 	id 				= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);
		$stmt->bindParam(":id_empleado", $datos["id_empleado"], PDO::PARAM_INT);
		$stmt->bindParam(":status_reparacion", $datos["status_reparacion"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt->close();
		$stmt = null;

	}

}




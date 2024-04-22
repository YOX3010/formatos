<?php

require_once "conexion.php";

class ModeloClientes
{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("		INSERT INTO 	$tabla	(cosignee, 
																			signatory, 
																			position,
																			email,
																			direccion,
																			telefono,
																			crn,
																			bank_name,
																			bank_address,
																			swift,
																			bank_officer_name,
																			bank_officer_position,
																			bank_officer_phone,
																			bank_officer_email,
																			account_number,
																			country,
																			passport_number,
																			passport_issue_date,
																			passport_expiration_date,
																			passport_image) 
													VALUES 					(:cosignee, 
																			:signatory, 
																			:position,
																			:email,
																			:direccion,
																			:telefono, 
																			:crn, 
																			:bank_name,
																			:bank_address,
																			:swift,
																			:bank_officer_name,
																			:bank_officer_position,
																			:bank_officer_phone,
																			:bank_officer_email,
																			:account_number,
																			:country,
																			:passport_number,
																			:passport_issue_date,
																			:passport_expiration_date,
																			:passport_image)");

		$stmt->bindParam(":cosignee", $datos["cosignee"], PDO::PARAM_STR);
		$stmt->bindParam(":signatory", $datos["signatory"], PDO::PARAM_STR);
		$stmt->bindParam(":position", $datos["position"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":crn", $datos["crn"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_name", $datos["bank_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_address", $datos["bank_address"], PDO::PARAM_STR);
		$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_name", $datos["bank_officer_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_position", $datos["bank_officer_position"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_phone", $datos["bank_officer_phone"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_email", $datos["bank_officer_email"], PDO::PARAM_STR);
		$stmt->bindParam(":account_number", $datos["account_number"], PDO::PARAM_STR);
		$stmt->bindParam(":country", $datos["country"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_number", $datos["passport_number"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_issue_date", $datos["passport_issue_date"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_expiration_date", $datos["passport_expiration_date"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_image", $datos["passport_image"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	cosignee = :cosignee, 
																		signatory = :signatory, 
																		position = :position,
																		email = :email,
																		direccion = :direccion,
																		telefono = :telefono, 
																		crn = :crn, 
																		bank_name = :bank_name,
																		bank_address = :bank_address,
																		swift = :swift,
																		bank_officer_name = :bank_officer_name,
																		bank_officer_position = :bank_officer_position,
																		bank_officer_phone = :bank_officer_phone,
																		bank_officer_email = :bank_officer_email,
																		account_number = :account_number,
																		country = :country,
																		passport_number = :passport_number,
																		passport_issue_date = :passport_issue_date,
																		passport_expiration_date = :passport_expiration_date,
																		passport_image = :passport_image
																WHERE 	id 			= :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":cosignee", $datos["cosignee"], PDO::PARAM_STR);
		$stmt->bindParam(":signatory", $datos["signatory"], PDO::PARAM_STR);
		$stmt->bindParam(":position", $datos["position"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":crn", $datos["crn"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_name", $datos["bank_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_address", $datos["bank_address"], PDO::PARAM_STR);
		$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_name", $datos["bank_officer_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_position", $datos["bank_officer_position"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_phone", $datos["bank_officer_phone"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_officer_email", $datos["bank_officer_email"], PDO::PARAM_STR);
		$stmt->bindParam(":account_number", $datos["account_number"], PDO::PARAM_STR);
		$stmt->bindParam(":country", $datos["country"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_number", $datos["passport_number"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_issue_date", $datos["passport_issue_date"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_expiration_date", $datos["passport_expiration_date"], PDO::PARAM_STR);
		$stmt->bindParam(":passport_image", $datos["passport_image"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);

		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

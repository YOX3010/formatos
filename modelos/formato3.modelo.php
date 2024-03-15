<?php

require_once "conexion.php";

class ModeloFormato3
{

	/*=============================================
	CREAR FORMATO 3
	=============================================*/

	static public function mdlIngresarFormato3($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	commercial_invoice,
																		date_form,
																		cosignee,
																		signatory,
																		address,
																		telephone,
																		email,
																		commodity,
																		quantity,
																		unit_price,
																		total_gross_amount,
																		terms_delivery_destination_port,
																		terms_payment,
																		fright_insurance_charges,
																		seller_account_detail,
																		bank_name,
																		bank_address,
																		account_name,
																		account_number,
																		swift,
																		buyer_bank_name,
																		bank_address_buyer,
																		account_holder,
																		swift_code,
																		account_number_buyer) 
																VALUES(	:commercial_invoice,
																		:date_form,
																		:cosignee,
																		:signatory,
																		:address,
																		:telephone,
																		:email,
																		:commodity,
																		:quantity,
																		:unit_price,
																		:total_gross_amount,
																		:terms_delivery_destination_port,
																		:terms_payment,
																		:fright_insurance_charges,
																		:seller_account_detail,
																		:bank_name,
																		:bank_address,
																		:account_name,
																		:account_number,
																		:swift,
																		:buyer_bank_name,
																		:bank_address_buyer,
																		:account_holder,
																		:swift_code,
																		:account_number_buyer)");

		$stmt->bindParam(":commercial_invoice", $datos["commercial_invoice"], PDO::PARAM_STR);
		$stmt->bindParam(":date_form", $datos["date_form"], PDO::PARAM_STR);
		$stmt->bindParam(":cosignee", $datos["cosignee"], PDO::PARAM_STR);
		$stmt->bindParam(":signatory", $datos["signatory"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $datos["address"], PDO::PARAM_STR);
		$stmt->bindParam(":telephone", $datos["telephone"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
		$stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_STR);
		$stmt->bindParam(":unit_price", $datos["unit_price"], PDO::PARAM_STR);
		$stmt->bindParam(":total_gross_amount", $datos["total_gross_amount"], PDO::PARAM_STR);
		$stmt->bindParam(":terms_delivery_destination_port", $datos["terms_delivery_destination_port"], PDO::PARAM_STR);
		$stmt->bindParam(":terms_payment", $datos["terms_payment"], PDO::PARAM_STR);
		$stmt->bindParam(":fright_insurance_charges", $datos["fright_insurance_charges"], PDO::PARAM_STR);
		$stmt->bindParam(":seller_account_detail", $datos["seller_account_detail"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_name", $datos["bank_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_address", $datos["bank_address"], PDO::PARAM_STR);
		$stmt->bindParam(":account_name", $datos["account_name"], PDO::PARAM_STR);
		$stmt->bindParam(":account_number", $datos["account_number"], PDO::PARAM_STR);
		$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
		$stmt->bindParam(":buyer_bank_name", $datos["buyer_bank_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_address_buyer", $datos["bank_address_buyer"], PDO::PARAM_STR);
		$stmt->bindParam(":account_holder", $datos["account_holder"], PDO::PARAM_STR);
		$stmt->bindParam(":swift_code", $datos["swift_code"], PDO::PARAM_STR);
		$stmt->bindParam(":account_number_buyer", $datos["account_number_buyer"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR FORMATO 3
	=============================================*/

	static public function mdlMostrarFormato3($tabla, $item, $valor)
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
	EDITAR FORMATO 3
	=============================================*/

	static public function mdlEditarFormato3($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	commercial_invoice 	= :commercial_invoice,
																		date_form = :date_form,
																		cosignee 	= :cosignee,
							   											signatory = :signatory,
							   											address = :address,
							   											telephone = :telephone,
							   											email = :email,
							   											commodity = :commodity,
							   											quantity = :quantity,
							   											unit_price = :unit_price,
							   											total_gross_amount = :total_gross_amount,
							   											terms_delivery_destination_port = :terms_delivery_destination_port,
							   											terms_payment = :terms_payment,
							   											fright_insurance_charges = :fright_insurance_charges,
							   											seller_account_detail = :seller_account_detail,
							   											bank_name = :bank_name,
							   											bank_address = :bank_address,
							   											account_name = :account_name,
							   											account_number = :account_number,
							   											swift = :swift,
							   											buyer_bank_name = :buyer_bank_name,
							   											bank_address_buyer = :bank_address_buyer,
							   											account_holder = :account_holder,
							   											swift_code = :swift_code,
							   											account_number_buyer = :account_number_buyer
															 	WHERE 	id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":commercial_invoice", $datos["commercial_invoice"], PDO::PARAM_STR);
		$stmt->bindParam(":date_form", $datos["date_form"], PDO::PARAM_STR);
		$stmt->bindParam(":cosignee", $datos["cosignee"], PDO::PARAM_STR);
		$stmt->bindParam(":signatory", $datos["signatory"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $datos["address"], PDO::PARAM_STR);
		$stmt->bindParam(":telephone", $datos["telephone"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
		$stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_STR);
		$stmt->bindParam(":unit_price", $datos["unit_price"], PDO::PARAM_STR);
		$stmt->bindParam(":total_gross_amount", $datos["total_gross_amount"], PDO::PARAM_STR);
		$stmt->bindParam(":terms_delivery_destination_port", $datos["terms_delivery_destination_port"], PDO::PARAM_STR);
		$stmt->bindParam(":terms_payment", $datos["terms_payment"], PDO::PARAM_STR);
		$stmt->bindParam(":fright_insurance_charges", $datos["fright_insurance_charges"], PDO::PARAM_STR);
		$stmt->bindParam(":seller_account_detail", $datos["seller_account_detail"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_name", $datos["bank_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_address", $datos["bank_address"], PDO::PARAM_STR);
		$stmt->bindParam(":account_name", $datos["account_name"], PDO::PARAM_STR);
		$stmt->bindParam(":account_number", $datos["account_number"], PDO::PARAM_STR);
		$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
		$stmt->bindParam(":buyer_bank_name", $datos["buyer_bank_name"], PDO::PARAM_STR);
		$stmt->bindParam(":bank_address_buyer", $datos["bank_address_buyer"], PDO::PARAM_STR);
		$stmt->bindParam(":account_holder", $datos["account_holder"], PDO::PARAM_STR);
		$stmt->bindParam(":swift_code", $datos["swift_code"], PDO::PARAM_STR);
		$stmt->bindParam(":account_number_buyer", $datos["account_number_buyer"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

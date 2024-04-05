<?php

require_once "conexion.php";

class ModeloFormato2
{

	/*=============================================
	CREAR FORMATO 2
	=============================================*/

	// static public function mdlIngresarFormato2($tabla, $datos)
	// {

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	commercial_invoice,
	// 																	date_form,
	// 																	cosignee,
	// 																	signatory,
	// 																	address,
	// 																	telephone,
	// 																	email,
	// 																	commodity,
	// 																	quantity,
	// 																	unit_price,
	// 																	total_gross_amount,
	// 																	terms_delivery_destination_port,
	// 																	terms_payment,
	// 																	fright_insurance_charges,
	// 																	seller_account_detail,
	// 																	bank_name,
	// 																	bank_address,
	// 																	account_name,
	// 																	account_number,
	// 																	swift,
	// 																	buyer_bank_name,
	// 																	bank_address_buyer,
	// 																	account_holder,
	// 																	swift_code,
	// 																	account_number_buyer) 
	// 															VALUES(	:commercial_invoice,
	// 																	:date_form,
	// 																	:cosignee,
	// 																	:signatory,
	// 																	:address,
	// 																	:telephone,
	// 																	:email,
	// 																	:commodity,
	// 																	:quantity,
	// 																	:unit_price,
	// 																	:total_gross_amount,
	// 																	:terms_delivery_destination_port,
	// 																	:terms_payment,
	// 																	:fright_insurance_charges,
	// 																	:seller_account_detail,
	// 																	:bank_name,
	// 																	:bank_address,
	// 																	:account_name,
	// 																	:account_number,
	// 																	:swift,
	// 																	:buyer_bank_name,
	// 																	:bank_address_buyer,
	// 																	:account_holder,
	// 																	:swift_code,
	// 																	:account_number_buyer)");

	// 	$stmt->bindParam(":commercial_invoice", $datos["commercial_invoice"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":date_form", $datos["date_form"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":cosignee", $datos["cosignee"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":signatory", $datos["signatory"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":address", $datos["address"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":telephone", $datos["telephone"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":unit_price", $datos["unit_price"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":total_gross_amount", $datos["total_gross_amount"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":terms_delivery_destination_port", $datos["terms_delivery_destination_port"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":terms_payment", $datos["terms_payment"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":fright_insurance_charges", $datos["fright_insurance_charges"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":seller_account_detail", $datos["seller_account_detail"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":bank_name", $datos["bank_name"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":bank_address", $datos["bank_address"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":account_name", $datos["account_name"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":account_number", $datos["account_number"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":swift", $datos["swift"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":buyer_bank_name", $datos["buyer_bank_name"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":bank_address_buyer", $datos["bank_address_buyer"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":account_holder", $datos["account_holder"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":swift_code", $datos["swift_code"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":account_number_buyer", $datos["account_number_buyer"], PDO::PARAM_STR);

	// 	if ($stmt->execute()) {

	// 		return "ok";
	// 	} else {

	// 		return "error";
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;
	// }

	/*=============================================
	MOSTRAR FORMATO 2
	=============================================*/

	static public function mdlMostrarFormato2($tabla, $item, $valor)
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
	EDITAR FORMATO 2
	=============================================*/

	static public function mdlEditarFormato2($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	commercial_invoice = :commercial_invoice,
																		date_commercial_invoice = :date_commercial_invoice,
																		total_gross_amount = :total_gross_amount,
                                                                        terms_delivary_destination_port = :terms_delivary_destination_port,
                                                                        terms_payment = :terms_payment,
                                                                        freight_insurance_charges = :freight_insurance_charges,
																		id_imagenes_cliente = :id_imagenes_cliente
															 	WHERE 	id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":commercial_invoice", $datos["commercial_invoice"], PDO::PARAM_STR);
		$stmt->bindParam(":date_commercial_invoice", $datos["date_commercial_invoice"], PDO::PARAM_STR);
		$stmt->bindParam(":total_gross_amount", $datos["total_gross_amount"], PDO::PARAM_STR);
		$stmt->bindParam(":terms_delivary_destination_port", $datos["terms_delivary_destination_port"], PDO::PARAM_STR);
		$stmt->bindParam(":terms_payment", $datos["terms_payment"], PDO::PARAM_STR);
		$stmt->bindParam(":freight_insurance_charges", $datos["freight_insurance_charges"], PDO::PARAM_STR);
		$stmt->bindParam(":id_imagenes_cliente", $datos["id_imagenes_cliente"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}

<?php

require_once "conexion.php";

class ModeloFormato4
{

    /*=============================================
    CREAR FORMATO 3
    =============================================*/

    public static function mdlIngresarFormato4($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	code,
																		ref_number,
																		date_today,
																		to_client,
																		trade_date,
																		seller,
																		product_name,
																		shipping_terms_sale,
																		origin,
																		trial_quantity,
																		contract_quantity,
																		duration_contract,
																		target_price_usd,
																		shipment_terms,
																		vessel,
																		inspection,
																		insurance,
																		payment_method,
																		qq_determination,
																		lay_time,
																		demurrage_rate,
																		law,
																		id_images)
																VALUES(	:code,
																		:ref_number,
																		:date_today,
																		:to_client,
																		:trade_date,
																		:seller,
																		:product_name,
																		:shipping_terms_sale,
																		:origin,
																		:trial_quantity,
																		:contract_quantity,
																		:duration_contract,
																		:target_price_usd,
																		:shipment_terms,
																		:vessel,
																		:inspection,
																		:insurance,
																		:payment_method,
																		:qq_determination,
																		:lay_time,
																		:demurrage_rate,
																		:law,
																		:id_images)");

        $stmt->bindParam(":code", $datos["code"], PDO::PARAM_STR);
        $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
        $stmt->bindParam(":date_today", $datos["date_today"], PDO::PARAM_STR);
        $stmt->bindParam(":to_client", $datos["to_client"], PDO::PARAM_STR);
        $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
        $stmt->bindParam(":seller", $datos["seller"], PDO::PARAM_STR);
        $stmt->bindParam(":product_name", $datos["product_name"], PDO::PARAM_STR);
        $stmt->bindParam(":shipping_terms_sale", $datos["shipping_terms_sale"], PDO::PARAM_STR);
        $stmt->bindParam(":origin", $datos["origin"], PDO::PARAM_STR);
        $stmt->bindParam(":trial_quantity", $datos["trial_quantity"], PDO::PARAM_STR);
        $stmt->bindParam(":contract_quantity", $datos["contract_quantity"], PDO::PARAM_STR);
        $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
        $stmt->bindParam(":target_price_usd", $datos["target_price_usd"], PDO::PARAM_STR);
        $stmt->bindParam(":shipment_terms", $datos["shipment_terms"], PDO::PARAM_STR);
        $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
        $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
        $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_STR);
        $stmt->bindParam(":payment_method", $datos["payment_method"], PDO::PARAM_STR);
        $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
        $stmt->bindParam(":lay_time", $datos["lay_time"], PDO::PARAM_STR);
        $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);
        $stmt->bindParam(":law", $datos["law"], PDO::PARAM_STR);
        $stmt->bindParam(":id_images", $datos["id_images"], PDO::PARAM_STR);

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

    public static function mdlMostrarFormato4($tabla, $item, $valor)
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

    public static function mdlEditarFormato4($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	code 	= :code,
																		ref_number = :ref_number,
																		date_today 	= :date_today,
							   											to_client = :to_client,
							   											trade_date = :trade_date,
							   											seller = :seller,
							   											product_name = :product_name,
							   											shipping_terms_sale = :shipping_terms_sale,
							   											origin = :origin,
							   											trial_quantity = :trial_quantity,
							   											contract_quantity = :contract_quantity,
							   											duration_contract = :duration_contract,
							   											target_price_usd = :target_price_usd,
							   											shipment_terms = :shipment_terms,
							   											vessel = :vessel,
							   											inspection = :inspection,
							   											insurance = :insurance,
							   											payment_method = :payment_method,
							   											qq_determination = :qq_determination,
							   											lay_time = :lay_time,
							   											demurrage_rate = :demurrage_rate,
							   											law = :law,
							   											id_images = :id_images
															 	WHERE 	id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":code", $datos["code"], PDO::PARAM_STR);
        $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
        $stmt->bindParam(":date_today", $datos["date_today"], PDO::PARAM_STR);
        $stmt->bindParam(":to_client", $datos["to_client"], PDO::PARAM_STR);
        $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
        $stmt->bindParam(":seller", $datos["seller"], PDO::PARAM_STR);
        $stmt->bindParam(":product_name", $datos["product_name"], PDO::PARAM_STR);
        $stmt->bindParam(":shipping_terms_sale", $datos["shipping_terms_sale"], PDO::PARAM_STR);
        $stmt->bindParam(":origin", $datos["origin"], PDO::PARAM_STR);
        $stmt->bindParam(":trial_quantity", $datos["trial_quantity"], PDO::PARAM_STR);
        $stmt->bindParam(":contract_quantity", $datos["contract_quantity"], PDO::PARAM_STR);
        $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
        $stmt->bindParam(":target_price_usd", $datos["target_price_usd"], PDO::PARAM_STR);
        $stmt->bindParam(":shipment_terms", $datos["shipment_terms"], PDO::PARAM_STR);
        $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
        $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
        $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_STR);
        $stmt->bindParam(":payment_method", $datos["payment_method"], PDO::PARAM_STR);
        $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
        $stmt->bindParam(":lay_time", $datos["lay_time"], PDO::PARAM_STR);
        $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);
        $stmt->bindParam(":law", $datos["law"], PDO::PARAM_STR);
        $stmt->bindParam(":id_images", $datos["id_images"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

<?php

require_once "conexion.php";

class ModeloFormato3
{

    /*=============================================
    CREAR FORMATO 3
    =============================================*/

    // public static function mdlIngresarFormato3($tabla, $datos)
    // {

    //     $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	code,
    // 																	ref_number,
    // 																	date_today,
    // 																	to_client,
    // 																	trade_date,
    // 																	seller,
    // 																	product_name,
    // 																	shipping_terms_sale,
    // 																	origin,
    // 																	trial_quantity,
    // 																	contract_quantity,
    // 																	duration_contract,
    // 																	target_price_usd,
    // 																	shipment_terms,
    // 																	vessel,
    // 																	inspection,
    // 																	insurance,
    // 																	payment_method,
    // 																	qq_determination,
    // 																	lay_time,
    // 																	demurrage_rate,
    // 																	law,
    // 																	id_images)
    // 															VALUES(	:code,
    // 																	:ref_number,
    // 																	:date_today,
    // 																	:to_client,
    // 																	:trade_date,
    // 																	:seller,
    // 																	:product_name,
    // 																	:shipping_terms_sale,
    // 																	:origin,
    // 																	:trial_quantity,
    // 																	:contract_quantity,
    // 																	:duration_contract,
    // 																	:target_price_usd,
    // 																	:shipment_terms,
    // 																	:vessel,
    // 																	:inspection,
    // 																	:insurance,
    // 																	:payment_method,
    // 																	:qq_determination,
    // 																	:lay_time,
    // 																	:demurrage_rate,
    // 																	:law,
    // 																	:id_images)");

    //     $stmt->bindParam(":code", $datos["code"], PDO::PARAM_STR);
    //     $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
    //     $stmt->bindParam(":date_today", $datos["date_today"], PDO::PARAM_STR);
    //     $stmt->bindParam(":to_client", $datos["to_client"], PDO::PARAM_STR);
    //     $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
    //     $stmt->bindParam(":seller", $datos["seller"], PDO::PARAM_STR);
    //     $stmt->bindParam(":product_name", $datos["product_name"], PDO::PARAM_STR);
    //     $stmt->bindParam(":shipping_terms_sale", $datos["shipping_terms_sale"], PDO::PARAM_STR);
    //     $stmt->bindParam(":origin", $datos["origin"], PDO::PARAM_STR);
    //     $stmt->bindParam(":trial_quantity", $datos["trial_quantity"], PDO::PARAM_STR);
    //     $stmt->bindParam(":contract_quantity", $datos["contract_quantity"], PDO::PARAM_STR);
    //     $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
    //     $stmt->bindParam(":target_price_usd", $datos["target_price_usd"], PDO::PARAM_STR);
    //     $stmt->bindParam(":shipment_terms", $datos["shipment_terms"], PDO::PARAM_STR);
    //     $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
    //     $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
    //     $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_STR);
    //     $stmt->bindParam(":payment_method", $datos["payment_method"], PDO::PARAM_STR);
    //     $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
    //     $stmt->bindParam(":lay_time", $datos["lay_time"], PDO::PARAM_STR);
    //     $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);
    //     $stmt->bindParam(":law", $datos["law"], PDO::PARAM_STR);
    //     $stmt->bindParam(":id_images", $datos["id_images"], PDO::PARAM_STR);

    //     if ($stmt->execute()) {

    //         return "ok";
    //     } else {

    //         return "error";
    //     }

    //     $stmt->close();
    //     $stmt = null;
    // }

    /*=============================================
    MOSTRAR FORMATO 3
    =============================================*/

    public static function mdlMostrarFormato3($tabla, $item, $valor)
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

    public static function mdlEditarFormato3($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	authentication_code = :authentication_code,
                                                                        ref_number = :ref_number,
                                                                        icpo_date = :icpo_date,
                                                                        icpo_to = :icpo_to,
                                                                        trade_date = :trade_date,
                                                                        seller = :seller,
                                                                        duration_contract = :duration_contract,
                                                                        target_price = :target_price,
                                                                        vessel = :vessel,
                                                                        inspection = :inspection,
                                                                        insurance = :insurance,
                                                                        payment_method = :payment_method,
                                                                        qq_determination = :qq_determination,
                                                                        lay_time = :lay_time,
                                                                        demurrage_rate = :demurrage_rate,
                                                                        law = :law,
                                                                        name = :name,
                                                                        date_place_birth = :date_place_birth,
                                                                        passport_number_country_issue = :passport_number_country_issue,
                                                                        passport_issue_date = :passport_issue_date,
                                                                        passport_expiration_date = :passport_expiration_date,
                                                                        title_within_corporation_company = :title_within_corporation_company,
                                                                        office_phone_number = :office_phone_number,
                                                                        mobile_phone_number = :mobile_phone_number,
                                                                        email_address = :email_address,
                                                                        id_imagenes = :id_imagenes
															 	WHERE 	id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":authentication_code", $datos["authentication_code"], PDO::PARAM_STR);
        $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
        $stmt->bindParam(":icpo_date", $datos["icpo_date"], PDO::PARAM_STR);
        $stmt->bindParam(":icpo_to", $datos["icpo_to"], PDO::PARAM_STR);
        $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
        $stmt->bindParam(":seller", $datos["seller"], PDO::PARAM_STR);
        $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
        $stmt->bindParam(":target_price", $datos["target_price"], PDO::PARAM_STR);
        $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
        $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
        $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_STR);
        $stmt->bindParam(":payment_method", $datos["payment_method"], PDO::PARAM_STR);
        $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
        $stmt->bindParam(":lay_time", $datos["lay_time"], PDO::PARAM_STR);
        $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);
        $stmt->bindParam(":law", $datos["law"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":date_place_birth", $datos["date_place_birth"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_number_country_issue", $datos["passport_number_country_issue"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_issue_date", $datos["passport_issue_date"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_expiration_date", $datos["passport_expiration_date"], PDO::PARAM_STR);
        $stmt->bindParam(":title_within_corporation_company", $datos["title_within_corporation_company"], PDO::PARAM_STR);
        $stmt->bindParam(":office_phone_number", $datos["office_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":mobile_phone_number", $datos["mobile_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":email_address", $datos["email_address"], PDO::PARAM_STR);
        $stmt->bindParam(":id_imagenes", $datos["id_imagenes"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

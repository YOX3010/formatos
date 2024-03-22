<?php

require_once "conexion.php";

class ModeloFormato2
{

    /*=============================================
    CREAR FORMATO 2
    =============================================*/

    // public static function mdlIngresarFormato2($tabla, $datos)
    // {

    //     $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	bank_name,
    // 																	branch_address,
    // 																	banking_official_name,
    // 																	phone_number,
    // 																	fax_number,
    // 																	banking_oficer_mail,
    // 																	account_signatory_name,
    // 																	account_name,
    // 																	account_number_routing_aba,
    // 																	swift_code,
    // 																	name,
    // 																	date_place_birth,
    // 																	passport_number_country,
    // 																	passport_issue_date,
    // 																	passport_expiration_date,
    // 																	title_corporation_company,
    // 																	office_phone_number,
    // 																	mobile_phone_number,
    // 																	email_address)
    // 															VALUES(	:bank_name,
    // 																	:branch_address,
    // 																	:banking_official_name,
    // 																	:phone_number,
    // 																	:fax_number,
    // 																	:banking_oficer_mail,
    // 																	:account_signatory_name,
    // 																	:account_name,
    // 																	:account_number_routing_aba,
    // 																	:swift_code,
    // 																	:name,
    // 																	:date_place_birth,
    // 																	:passport_number_country,
    // 																	:passport_issue_date,
    // 																	:passport_expiration_date,
    // 																	:title_corporation_company,
    // 																	:office_phone_number,
    // 																	:mobile_phone_number,
    // 																	:email_address)");

    //     $stmt->bindParam(":bank_name", $datos["bank_name"], PDO::PARAM_STR);
    //     $stmt->bindParam(":branch_address", $datos["branch_address"], PDO::PARAM_STR);
    //     $stmt->bindParam(":banking_official_name", $datos["banking_official_name"], PDO::PARAM_STR);
    //     $stmt->bindParam(":phone_number", $datos["phone_number"], PDO::PARAM_STR);
    //     $stmt->bindParam(":fax_number", $datos["fax_number"], PDO::PARAM_STR);
    //     $stmt->bindParam(":banking_oficer_mail", $datos["banking_oficer_mail"], PDO::PARAM_STR);
    //     $stmt->bindParam(":account_signatory_name", $datos["account_signatory_name"], PDO::PARAM_STR);
    //     $stmt->bindParam(":account_name", $datos["account_name"], PDO::PARAM_STR);
    //     $stmt->bindParam(":account_number_routing_aba", $datos["account_number_routing_aba"], PDO::PARAM_STR);
    //     $stmt->bindParam(":swift_code", $datos["swift_code"], PDO::PARAM_STR);
    //     $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
    //     $stmt->bindParam(":date_place_birth", $datos["date_place_birth"], PDO::PARAM_STR);
    //     $stmt->bindParam(":passport_number_country", $datos["passport_number_country"], PDO::PARAM_STR);
    //     $stmt->bindParam(":passport_issue_date", $datos["passport_issue_date"], PDO::PARAM_STR);
    //     $stmt->bindParam(":passport_expiration_date", $datos["passport_expiration_date"], PDO::PARAM_STR);
    //     $stmt->bindParam(":title_corporation_company", $datos["title_corporation_company"], PDO::PARAM_STR);
    //     $stmt->bindParam(":office_phone_number", $datos["office_phone_number"], PDO::PARAM_STR);
    //     $stmt->bindParam(":mobile_phone_number", $datos["mobile_phone_number"], PDO::PARAM_STR);
    //     $stmt->bindParam(":email_address", $datos["email_address"], PDO::PARAM_STR);

    //     if ($stmt->execute()) {

    //         return "ok";
    //     } else {

    //         return "error";
    //     }

    //     $stmt->close();
    //     $stmt = null;
    // }

    /*=============================================
    MOSTRAR FORMATO 2
    =============================================*/

    public static function mdlMostrarFormato2($tabla, $item, $valor)
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

    public static function mdlEditarFormato2($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	name = :name,
                                                                        date_place_birth = :date_place_birth,
                                                                        passport_number_country_issue = :passport_number_country_issue,
                                                                        passport_issue_date = :passport_issue_date,
                                                                        passport_expiration_date = :passport_expiration_date,
                                                                        title_within_corporation_company = :title_within_corporation_company,
                                                                        office_phone_number = :office_phone_number,
                                                                        mobile_phone_number = :mobile_phone_number,
                                                                        email_address = :email_address
															 	WHERE 	id 			= :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":date_place_birth", $datos["date_place_birth"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_number_country_issue", $datos["passport_number_country_issue"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_issue_date", $datos["passport_issue_date"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_expiration_date", $datos["passport_expiration_date"], PDO::PARAM_STR);
        $stmt->bindParam(":title_within_corporation_company", $datos["title_within_corporation_company"], PDO::PARAM_STR);
        $stmt->bindParam(":office_phone_number", $datos["office_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":mobile_phone_number", $datos["mobile_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":email_address", $datos["email_address"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

<?php

require_once "conexion.php";

class ModeloFormato1
{

    /*=============================================
    CREAR FORMATO 1
    =============================================*/

    // public static function mdlIngresarFormato1($tabla, $datos)
    // {

    //     $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	to_1,
    // 																	mr_1,
    // 																	position_1,
    // 																	email_1,
    // 																	to_2,
    // 																	mr_2,
    // 																	position_2,
    // 																	email_2,
    // 																	via,
    // 																	email_3,
    // 																	mr_3,
    // 																	validity_sco,
    // 																	commodity,
    // 																	quantity,
    // 																	price,
    // 																	incoterms,
    // 																	port,
    // 																	product_origin,
    // 																	contract_term,
    // 																	commission)
    // 															VALUES(	:to_1,
    // 																	:mr_1,
    // 																	:position_1,
    // 																	:email_1,
    // 																	:to_2,
    // 																	:mr_2,
    // 																	:position_2,
    // 																	:email_2,
    // 																	:via,
    // 																	:email_3,
    // 																	:mr_3,
    // 																	:validity_sco,
    // 																	:commodity,
    // 																	:quantity,
    // 																	:price,
    // 																	:incoterms,
    // 																	:port,
    // 																	:product_origin,
    // 																	:contract_term,
    // 																	:commission)");

    //     $stmt->bindParam(":to_1", $datos["to_1"], PDO::PARAM_STR);
    //     $stmt->bindParam(":mr_1", $datos["mr_1"], PDO::PARAM_STR);
    //     $stmt->bindParam(":position_1", $datos["position_1"], PDO::PARAM_STR);
    //     $stmt->bindParam(":email_1", $datos["email_1"], PDO::PARAM_STR);
    //     $stmt->bindParam(":to_2", $datos["to_2"], PDO::PARAM_STR);
    //     $stmt->bindParam(":mr_2", $datos["mr_2"], PDO::PARAM_STR);
    //     $stmt->bindParam(":position_2", $datos["position_2"], PDO::PARAM_STR);
    //     $stmt->bindParam(":email_2", $datos["email_2"], PDO::PARAM_STR);
    //     $stmt->bindParam(":via", $datos["via"], PDO::PARAM_STR);
    //     $stmt->bindParam(":email_3", $datos["email_3"], PDO::PARAM_STR);
    //     $stmt->bindParam(":mr_3", $datos["mr_3"], PDO::PARAM_STR);
    //     $stmt->bindParam(":validity_sco", $datos["validity_sco"], PDO::PARAM_STR);
    //     $stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
    //     $stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_STR);
    //     $stmt->bindParam(":price", $datos["price"], PDO::PARAM_STR);
    //     $stmt->bindParam(":incoterms", $datos["incoterms"], PDO::PARAM_STR);
    //     $stmt->bindParam(":port", $datos["port"], PDO::PARAM_STR);
    //     $stmt->bindParam(":product_origin", $datos["product_origin"], PDO::PARAM_STR);
    //     $stmt->bindParam(":contract_term", $datos["contract_term"], PDO::PARAM_STR);
    //     $stmt->bindParam(":commission", $datos["commission"], PDO::PARAM_STR);

    //     if ($stmt->execute()) {

    //         return "ok";
    //     } else {

    //         return "error";
    //     }

    //     $stmt->close();
    //     $stmt = null;
    // }

    /*=============================================
    MOSTRAR FORMATO 1
    =============================================*/

    public static function mdlMostrarFormato1($tabla, $item, $valor)
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
    EDITAR FORMATO 1
    =============================================*/

    public static function mdlEditarFormato1($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	validity_sco = :validity_sco,
                                                                        commodity = :commodity,
                                                                        quantity = :quantity,
                                                                        price = :price,
                                                                        incoterms = :incoterms,
                                                                        port = :port,
                                                                        product_origin = :product_origin,
                                                                        contract_term = :contract_term,
                                                                        commission = :commission
															 	WHERE 	id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":validity_sco", $datos["validity_sco"], PDO::PARAM_STR);
        $stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $datos["price"], PDO::PARAM_STR);
        $stmt->bindParam(":incoterms", $datos["incoterms"], PDO::PARAM_STR);
        $stmt->bindParam(":port", $datos["port"], PDO::PARAM_STR);
        $stmt->bindParam(":product_origin", $datos["product_origin"], PDO::PARAM_STR);
        $stmt->bindParam(":contract_term", $datos["contract_term"], PDO::PARAM_STR);
        $stmt->bindParam(":commission", $datos["commission"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

<?php

require_once "conexion.php";

class ModeloICPO
{

    /*=============================================
    CREAR ICPO
    =============================================*/

    public static function mdlIngresarICPO($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_sco,
    																	id_proveedor,
    																	id_cliente,
    																	authentication_code,
    																	ref_number,
    																	via,
    																	trade_date,
    																	duration_contract,
    																	vessel,
    																	inspection,
    																	insurance,
    																	qq_determination,
    																	demurrage_rate)
    															VALUES(	:id_sco,
    																	:id_proveedor,
    																	:id_cliente,
    																	:authentication_code,
    																	:ref_number,
    																	:via,
    																	:trade_date,
    																	:duration_contract,
    																	:vessel,
    																	:inspection,
    																	:insurance,
    																	:qq_determination,
    																	:demurrage_rate)");

        $stmt->bindParam(":id_sco", $datos["id_sco"], PDO::PARAM_INT);
        $stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":authentication_code", $datos["authentication_code"], PDO::PARAM_STR);
        $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
        $stmt->bindParam(":via", $datos["via"], PDO::PARAM_STR);
        $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
        $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
        $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
        $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
        $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_INT);
        $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
        $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR ICPO
    =============================================*/

    public static function mdlMostrarICPO($tabla, $item, $valor)
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
    EDITAR ICPO
    =============================================*/

    public static function mdlEditarICPO($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_sco = :id_sco,
                                                                        id_proveedor = :id_proveedor,
                                                                        id_cliente = :id_cliente,
                                                                        authentication_code = :authentication_code,
                                                                        ref_number = :ref_number,
                                                                        via = :via,
                                                                        trade_date = :trade_date,
                                                                        duration_contract = :duration_contract,
                                                                        vessel = :vessel,
                                                                        inspection = :inspection,
                                                                        insurance = :insurance,
                                                                        qq_determination = :qq_determination,
                                                                        demurrage_rate = :demurrage_rate
															 	WHERE 	id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":id_sco", $datos["id_sco"], PDO::PARAM_INT);
        $stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":authentication_code", $datos["authentication_code"], PDO::PARAM_STR);
        $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
        $stmt->bindParam(":via", $datos["via"], PDO::PARAM_STR);
        $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
        $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
        $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
        $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
        $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_INT);
        $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
        $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

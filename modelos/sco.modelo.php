<?php

require_once "conexion.php";

class ModeloSCO
{

    /*=============================================
    CREAR SCO
    =============================================*/

    public static function mdlIngresarSCO($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	id_loi,
                                                                        id_clientes,
    																	id_usuario,
    																	id_commodity,
    																	id_port,
    																	id_product_origin,
    																	id_um,
    																	id_incoterms,
    																	codigo,
    																	via_cliente,
    																	email_via_cliente,
    																	via_tpc,
    																	email_via_tpc,
    																	validity_of_sco,
    																	quantity,
    																	contract_terms,
    																	commission,
                                                                        observacion)
    															VALUES(	:id_loi,
                                                                        :id_clientes,
    																	:id_usuario,
    																	:id_commodity,
    																	:id_port,
    																	:id_product_origin,
                                                                        :id_um,
    																	:id_incoterms,
    																	:codigo,
    																	:via_cliente,
    																	:email_via_cliente,
    																	:via_tpc,
    																	:email_via_tpc,
    																	:validity_of_sco,
    																	:quantity,
    																	:contract_terms,
    																	:commission,
                                                                        :observacion)");

        $stmt->bindParam(":id_loi", $datos["id_loi"], PDO::PARAM_INT);
        $stmt->bindParam(":id_clientes", $datos["id_clientes"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":id_commodity", $datos["id_commodity"], PDO::PARAM_INT);
        $stmt->bindParam(":id_port", $datos["id_port"], PDO::PARAM_INT);
        $stmt->bindParam(":id_product_origin", $datos["id_product_origin"], PDO::PARAM_INT);
        $stmt->bindParam(":id_um", $datos["id_um"], PDO::PARAM_INT);
        $stmt->bindParam(":id_incoterms", $datos["id_incoterms"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":via_cliente", $datos["via_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":email_via_cliente", $datos["email_via_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":via_tpc", $datos["via_tpc"], PDO::PARAM_STR);
        $stmt->bindParam(":email_via_tpc", $datos["email_via_tpc"], PDO::PARAM_STR);
        $stmt->bindParam(":validity_of_sco", $datos["validity_of_sco"], PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_INT);
        $stmt->bindParam(":contract_terms", $datos["contract_terms"], PDO::PARAM_STR);
        $stmt->bindParam(":commission", $datos["commission"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR SCO
    =============================================*/

    public static function mdlMostrarSCO($tabla, $item, $valor)
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
    EDITAR SCO
    =============================================*/

    public static function mdlEditarSCO($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	id_loi = :id_loi,
                                                                        id_clientes = :id_clientes,
                                                                        id_usuario = :id_usuario,
                                                                        id_commodity = :id_commodity,
                                                                        id_port = :id_port,
                                                                        id_product_origin = :id_product_origin,
                                                                        id_um = :id_um,
                                                                        id_incoterms = :id_incoterms,
                                                                        codigo = :codigo,
                                                                        via_cliente = :via_cliente,
                                                                        email_via_cliente = :email_via_cliente,
                                                                        via_tpc = :via_tpc,
                                                                        email_via_tpc = :email_via_tpc,
                                                                        validity_of_sco = :validity_of_sco,
                                                                        quantity = :quantity,
                                                                        contract_terms = :contract_terms,
                                                                        commission = :commission,
                                                                        observacion = :observacion
															 	WHERE 	id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":id_loi", $datos["id_loi"], PDO::PARAM_INT);
        $stmt->bindParam(":id_clientes", $datos["id_clientes"], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":id_commodity", $datos["id_commodity"], PDO::PARAM_INT);
        $stmt->bindParam(":id_port", $datos["id_port"], PDO::PARAM_INT);
        $stmt->bindParam(":id_product_origin", $datos["id_product_origin"], PDO::PARAM_INT);
        $stmt->bindParam(":id_um", $datos["id_um"], PDO::PARAM_INT);
        $stmt->bindParam(":id_incoterms", $datos["id_incoterms"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":via_cliente", $datos["via_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":email_via_cliente", $datos["email_via_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":via_tpc", $datos["via_tpc"], PDO::PARAM_STR);
        $stmt->bindParam(":email_via_tpc", $datos["email_via_tpc"], PDO::PARAM_STR);
        $stmt->bindParam(":validity_of_sco", $datos["validity_of_sco"], PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_INT);
        $stmt->bindParam(":contract_terms", $datos["contract_terms"], PDO::PARAM_STR);
        $stmt->bindParam(":commission", $datos["commission"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

<?php

require_once "conexion.php";

class ModeloFormato
{

    /*=============================================
    CREAR FORMATO
    =============================================*/

    public static function mdlIngresarFormato($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO 		$tabla(	cliente_to1,
																		cliente_mr1,
																		cliente_position1,
																		cliente_email1,
																		cliente_cosignee,
																		cliente_signatory,
																		cliente_position,
																		cliente_email,
																		cliente_via,
																		cliente_email_via,
																		validity_sco,
																		commodity,
																		quantity,
																		price,
																		incoterms,
																		port,
																		product_origin,
																		contract_term,
																		commission,
                                                                        cliente_name_of_the_bank,
                                                                        cliente_branch_address,
                                                                        cliente_name_of_the_banking,
                                                                        cliente_phone_number,
                                                                        cliente_fax_number,
                                                                        cliente_banking_officer_mail,
                                                                        cliente_account_signatory_name,
                                                                        cliente_account_name,
                                                                        cliente_account_number_routing_aba,
                                                                        cliente_swift,
                                                                        name,
                                                                        date_place_birth,
                                                                        passport_number_country_issue,
                                                                        passport_issue_date,
                                                                        passport_expiration_date,
                                                                        title_within_corporation_company,
                                                                        office_phone_number,
                                                                        mobile_phone_number,
                                                                        email_address,
                                                                        commercial_invoice,
                                                                        date_commercial_invoice,
                                                                        cliente_address,
                                                                        cliente_telephone,
                                                                        total_gross_amount,
                                                                        terms_delivary_destination_port,
                                                                        terms_payment,
                                                                        freight_insurance_charges,
                                                                        sel_seller_account_details,
                                                                        sel_bank_name,
                                                                        sel_bank_address,
                                                                        sel_account_name,
                                                                        sel_account_number,
                                                                        sel_swift,
                                                                        cliente_bank_name,
                                                                        cliente_bank_address,
                                                                        cliente_swift_code,
                                                                        cliente_account_number,
                                                                        authentication_code,
                                                                        ref_number,
                                                                        icpo_date,
                                                                        icpo_to,
                                                                        trade_date,
                                                                        seller,
                                                                        duration_contract,
                                                                        vessel,
                                                                        inspection,
                                                                        insurance,
                                                                        payment_method,
                                                                        qq_determination,
                                                                        lay_time,
                                                                        demurrage_rate,
                                                                        law,
                                                                        id_imagenes)
																VALUES(	:cliente_to1,
																		:cliente_mr1,
																		:cliente_position1,
																		:cliente_email1,
																		:cliente_cosignee,
																		:cliente_signatory,
																		:cliente_position,
																		:cliente_email,
																		:cliente_via,
																		:cliente_email_via,
																		:validity_sco,
																		:commodity,
																		:quantity,
																		:price,
																		:incoterms,
																		:port,
																		:product_origin,
																		:contract_term,
																		:commission,
                                                                        :cliente_name_of_the_bank,
                                                                        :cliente_branch_address,
                                                                        :cliente_name_of_the_banking,
                                                                        :cliente_phone_number,
                                                                        :cliente_fax_number,
                                                                        :cliente_banking_officer_mail,
                                                                        :cliente_account_signatory_name,
                                                                        :cliente_account_name,
                                                                        :cliente_account_number_routing_aba,
                                                                        :cliente_swift,
                                                                        :name,
                                                                        :date_place_birth,
                                                                        :passport_number_country_issue,
                                                                        :passport_issue_date,
                                                                        :passport_expiration_date,
                                                                        :title_within_corporation_company,
                                                                        :office_phone_number,
                                                                        :mobile_phone_number,
                                                                        :email_address,
                                                                        :commercial_invoice,
                                                                        :date_commercial_invoice,
                                                                        :cliente_address,
                                                                        :cliente_telephone,
                                                                        :total_gross_amount,
                                                                        :terms_delivary_destination_port,
                                                                        :terms_payment,
                                                                        :freight_insurance_charges,
                                                                        :sel_seller_account_details,
                                                                        :sel_bank_name,
                                                                        :sel_bank_address,
                                                                        :sel_account_name,
                                                                        :sel_account_number,
                                                                        :sel_swift,
                                                                        :cliente_bank_name,
                                                                        :cliente_bank_address,
                                                                        :cliente_swift_code,
                                                                        :cliente_account_number,
                                                                        :authentication_code,
                                                                        :ref_number,
                                                                        :icpo_date,
                                                                        :icpo_to,
                                                                        :trade_date,
                                                                        :seller,
                                                                        :duration_contract,
                                                                        :vessel,
                                                                        :inspection,
                                                                        :insurance,
                                                                        :payment_method,
                                                                        :qq_determination,
                                                                        :lay_time,
                                                                        :demurrage_rate,
                                                                        :law,
                                                                        :id_imagenes)");

        $stmt->bindParam(":cliente_to1", $datos["cliente_to1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_mr1", $datos["cliente_mr1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_position1", $datos["cliente_position1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_email1", $datos["cliente_email1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_cosignee", $datos["cliente_cosignee"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_signatory", $datos["cliente_signatory"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_position", $datos["cliente_position"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_email", $datos["cliente_email"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_via", $datos["cliente_via"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_email_via", $datos["cliente_email_via"], PDO::PARAM_STR);
        $stmt->bindParam(":validity_sco", $datos["validity_sco"], PDO::PARAM_STR);
        $stmt->bindParam(":commodity", $datos["commodity"], PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $datos["quantity"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $datos["price"], PDO::PARAM_STR);
        $stmt->bindParam(":incoterms", $datos["incoterms"], PDO::PARAM_STR);
        $stmt->bindParam(":port", $datos["port"], PDO::PARAM_STR);
        $stmt->bindParam(":product_origin", $datos["product_origin"], PDO::PARAM_STR);
        $stmt->bindParam(":contract_term", $datos["contract_term"], PDO::PARAM_STR);
        $stmt->bindParam(":commission", $datos["commission"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_name_of_the_bank", $datos["cliente_name_of_the_bank"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_branch_address", $datos["cliente_branch_address"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_name_of_the_banking", $datos["cliente_name_of_the_banking"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_phone_number", $datos["cliente_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_fax_number", $datos["cliente_fax_number"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_banking_officer_mail", $datos["cliente_banking_officer_mail"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_signatory_name", $datos["cliente_account_signatory_name"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_name", $datos["cliente_account_name"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_number_routing_aba", $datos["cliente_account_number_routing_aba"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_swift", $datos["cliente_swift"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":date_place_birth", $datos["date_place_birth"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_number_country_issue", $datos["passport_number_country_issue"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_issue_date", $datos["passport_issue_date"], PDO::PARAM_STR);
        $stmt->bindParam(":passport_expiration_date", $datos["passport_expiration_date"], PDO::PARAM_STR);
        $stmt->bindParam(":title_within_corporation_company", $datos["title_within_corporation_company"], PDO::PARAM_STR);
        $stmt->bindParam(":office_phone_number", $datos["office_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":mobile_phone_number", $datos["mobile_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":email_address", $datos["email_address"], PDO::PARAM_STR);
        $stmt->bindParam(":commercial_invoice", $datos["commercial_invoice"], PDO::PARAM_STR);
        $stmt->bindParam(":date_commercial_invoice", $datos["date_commercial_invoice"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_address", $datos["cliente_address"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_telephone", $datos["cliente_telephone"], PDO::PARAM_STR);
        $stmt->bindParam(":total_gross_amount", $datos["total_gross_amount"], PDO::PARAM_STR);
        $stmt->bindParam(":terms_delivary_destination_port", $datos["terms_delivary_destination_port"], PDO::PARAM_STR);
        $stmt->bindParam(":terms_payment", $datos["terms_payment"], PDO::PARAM_STR);
        $stmt->bindParam(":freight_insurance_charges", $datos["freight_insurance_charges"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_seller_account_details", $datos["sel_seller_account_details"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_bank_name", $datos["sel_bank_name"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_bank_address", $datos["sel_bank_address"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_account_name", $datos["sel_account_name"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_account_number", $datos["sel_account_number"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_swift", $datos["sel_swift"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_bank_name", $datos["cliente_bank_name"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_bank_address", $datos["cliente_bank_address"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_swift_code", $datos["cliente_swift_code"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_number", $datos["cliente_account_number"], PDO::PARAM_STR);
        $stmt->bindParam(":authentication_code", $datos["authentication_code"], PDO::PARAM_STR);
        $stmt->bindParam(":ref_number", $datos["ref_number"], PDO::PARAM_STR);
        $stmt->bindParam(":icpo_date", $datos["icpo_date"], PDO::PARAM_STR);
        $stmt->bindParam(":icpo_to", $datos["icpo_to"], PDO::PARAM_STR);
        $stmt->bindParam(":trade_date", $datos["trade_date"], PDO::PARAM_STR);
        $stmt->bindParam(":seller", $datos["seller"], PDO::PARAM_STR);
        $stmt->bindParam(":duration_contract", $datos["duration_contract"], PDO::PARAM_STR);
        $stmt->bindParam(":vessel", $datos["vessel"], PDO::PARAM_STR);
        $stmt->bindParam(":inspection", $datos["inspection"], PDO::PARAM_STR);
        $stmt->bindParam(":insurance", $datos["insurance"], PDO::PARAM_STR);
        $stmt->bindParam(":payment_method", $datos["payment_method"], PDO::PARAM_STR);
        $stmt->bindParam(":qq_determination", $datos["qq_determination"], PDO::PARAM_STR);
        $stmt->bindParam(":lay_time", $datos["lay_time"], PDO::PARAM_STR);
        $stmt->bindParam(":demurrage_rate", $datos["demurrage_rate"], PDO::PARAM_STR);
        $stmt->bindParam(":law", $datos["law"], PDO::PARAM_STR);
        $stmt->bindParam(":id_imagenes", $datos["id_imagenes"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR FORMATO
    =============================================*/

    public static function mdlMostrarFormato($tabla, $item, $valor)
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
    EDITAR FORMATO
    =============================================*/

    public static function mdlEditarFormato($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 	SET 	cliente_to1 = :cliente_to1,
																		cliente_mr1 = :cliente_mr1,
																		cliente_position1 = :cliente_position1,
																		cliente_email1 = :cliente_email1,
																		cliente_cosignee = :cliente_cosignee,
																		cliente_signatory = :cliente_signatory,
																		cliente_position = :cliente_position,
																		cliente_email = :cliente_email,
																		cliente_via = :cliente_via,
																		cliente_email_via = :cliente_email_via,
                                                                        cliente_name_of_the_bank = :cliente_name_of_the_bank,
                                                                        cliente_branch_address = :cliente_branch_address,
                                                                        cliente_name_of_the_banking = :cliente_name_of_the_banking,
                                                                        cliente_phone_number = :cliente_phone_number,
                                                                        cliente_fax_number = :cliente_fax_number,
                                                                        cliente_banking_officer_mail = :cliente_banking_officer_mail,
                                                                        cliente_account_signatory_name = :cliente_account_signatory_name,
                                                                        cliente_account_name = :cliente_account_name,
                                                                        cliente_account_number_routing_aba = :cliente_account_number_routing_aba,
                                                                        cliente_swift = :cliente_swift,
                                                                        cliente_address = :cliente_address,
                                                                        cliente_telephone = :cliente_telephone,
                                                                        sel_seller_account_details = :sel_seller_account_details,
                                                                        sel_bank_name = :sel_bank_name,
                                                                        sel_bank_address = :sel_bank_address,
                                                                        sel_account_name = :sel_account_name,
                                                                        sel_account_number = :sel_account_number,
                                                                        sel_swift = :sel_swift,
                                                                        cliente_bank_name = :cliente_bank_name,
                                                                        cliente_bank_address = :cliente_bank_address,
                                                                        cliente_swift_code = :cliente_swift_code,
                                                                        cliente_account_number = :cliente_account_number
															 	WHERE 	id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":cliente_to1", $datos["cliente_to1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_mr1", $datos["cliente_mr1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_position1", $datos["cliente_position1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_email1", $datos["cliente_email1"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_cosignee", $datos["cliente_cosignee"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_signatory", $datos["cliente_signatory"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_position", $datos["cliente_position"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_email", $datos["cliente_email"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_via", $datos["cliente_via"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_email_via", $datos["cliente_email_via"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_name_of_the_bank", $datos["cliente_name_of_the_bank"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_branch_address", $datos["cliente_branch_address"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_name_of_the_banking", $datos["cliente_name_of_the_banking"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_phone_number", $datos["cliente_phone_number"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_fax_number", $datos["cliente_fax_number"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_banking_officer_mail", $datos["cliente_banking_officer_mail"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_signatory_name", $datos["cliente_account_signatory_name"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_name", $datos["cliente_account_name"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_number_routing_aba", $datos["cliente_account_number_routing_aba"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_swift", $datos["cliente_swift"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_address", $datos["cliente_address"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_telephone", $datos["cliente_telephone"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_seller_account_details", $datos["sel_seller_account_details"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_bank_name", $datos["sel_bank_name"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_bank_address", $datos["sel_bank_address"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_account_name", $datos["sel_account_name"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_account_number", $datos["sel_account_number"], PDO::PARAM_STR);
        $stmt->bindParam(":sel_swift", $datos["sel_swift"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_bank_name", $datos["cliente_bank_name"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_bank_address", $datos["cliente_bank_address"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_swift_code", $datos["cliente_swift_code"], PDO::PARAM_STR);
        $stmt->bindParam(":cliente_account_number", $datos["cliente_account_number"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}

<?php

if ($_SESSION["perfil"] == "Vendedor") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1> Administrar Formato 3</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Formato 3</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarElemento">

          Agregar Elemento

        </button>

        <!-- <a href="index.php?ruta=formato-2&idFormato2=<?php //$_GET['idFormato2'];
                                                          ?>"> -->

        <a href="index.php?ruta=formato-3&idFormato3=">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th colspan="4">Formato 3</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            //$item = "id";
            //$valor = $_GET['idFormato3Interna'];

            $item = null;
            $valor = null;

            $Formato3 = ControladorFormato3::ctrMostrarFormato3($item, $valor);

            foreach ($Formato3 as $key => $value) {

              //$Key = 0;

              echo ' <tr>

              <th rowspan="17">' . ($key + 1) . '</th>

              <th>Commercial Invoice / Factura Comercial</th>

              <td>' . $value["commercial_invoice"] . '</td>

              <th>Date / Fecha</th>

              <td>' . $value["date_form"] . '</td>

              <td style="text-align:center;" rowspan="17">

                      <div class="btn-group">

                        <button class="btn btn-info btnImprimirFormato3" idFormato3="' . $value["id"] . '"><i class="fa fa-print"></i></button>

                        <button class="btn btn-warning btnEditarFormato3" idFormato3="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarFormato3"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>

                    </td>

            </tr>

            <tr>

              <th style="text-align:center;" colspan="4">COMMERCIAL INVOICE / FACTURA COMERCIAL</th>

            </tr>

            <tr>

              <th colspan="2">Cosignee / Cosignatario</th>

              <td colspan="2">' . $value["cosignee"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Signatory / Firmante</th>

              <td colspan="2">' . $value["signatory"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Address / Dirección</th>

              <td colspan="2">' . $value["address"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Telephone / Telefóno</th>

              <td colspan="2">' . $value["telephone"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Email / Correo Electrónico</th>

              <td colspan="2">' . $value["email"] . '</td>

            </tr>

            <tr>

              <th>Commodity / Mercancía</th>

              <th>Quantity / Cantidad</th>

              <th>Unit Price / Precio de Unidad</th>

              <th>Total/Gross Amount / Importe Total/Bruto</th>

            </tr>

            <tr>

              <td>' . $value["commodity"] . '</td>

              <td>' . $value["quantity"] . '</td>

              <td>' . $value["unit_price"] . '</td>

              <td>' . $value["total_gross_amount"] . '</td>

            </tr>

            <tr>

              <th>Terms of Delivery/Destination Port / Términos del Envío/Puerto de Destino</th>

              <th>Terms of Payment / Términos de Pago</th>

              <th colspan="2">Freight/Insurance Charges / Gastos de Flete/Seguro</th>


            </tr>

            <tr>

            <td>' . $value["terms_delivery_destination_port"] . '</td>

            <td>' . $value["terms_payment"] . '</td>

            <td colspan="2">' . $value["fright_insurance_charges"] . '</td>

            </tr>

            <tr>

             <th>Seller Account Detail / Detalles de la cuenta de vendedor</th>

             <td>' . $value["seller_account_detail"] . '</td>

             <th>Buyer\'s Bank Name / Nombre del banco del comprador</th>

             <td>' . $value["buyer_bank_name"] . '</td>

            </tr>

            <tr>

              <th>Bank Namen / Nombre del Banco</th>

              <td>' . $value["bank_name"] . '</td>

              <th>Bank Address / Dirección del Banco</th>

              <td>' . $value["bank_address_buyer"] . '</td>

            </tr>

            <tr>

              <th>Bank Address / Dirección del Banco</th>

              <td>' . $value["bank_address"] . '</td>

              <th>Account Holder / Titular de la Cuenta</th>

              <td>' . $value["account_holder"] . '</td>

            </tr>

            <tr>

              <th>Account Name / Nombre de la Cuenta</th>

              <td>' . $value["account_name"] . '</td>

              <th>Swift Code / Código de Swift</th>

              <td>' . $value["swift_code"] . '</td>

            </tr>

            <tr>

              <th>Account Number / Número de Cuenta</th>

              <td>' . $value["account_number"] . '</td>

              <th>Account Number / Número de Cuenta</th>

              <td>' . $value["account_number_buyer"] . '</td>

            </tr>

            <tr>

              <th>Swift</th>

              <td>' . $value["swift"] . '</td>

            </tr>

            <tr>

              <td colspan="6" style="background-color:#e1e1e1;"></td>

            </tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR FORMATO 3
======================================-->

<div id="modalEditarFormato3" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Elmento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR OBSERVACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCommercialInvoice" id="editarCommercialInvoice" required>

                <input type="hidden" name="idFormato3" id="idFormato3" required>

                <input type="hidden" name="editarFormato3" id="editarFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDateForm" id="editarDateForm" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>COMMERCIAL INVOICE / FACTURA COMERCIAL:</b></h5>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCosignee" id="editarCosignee" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarSignatory" id="editarSignatory" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAddress" id="editarAddress" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelephone" id="editarTelephone" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCommodity" id="editarCommodity" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarQuantity" id="editarQuantity" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarUnitPrice" id="editarUnitPrice" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTotalGrossAmount" id="editarTotalGrossAmount" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTermsDeliveryDestinationPort" id="editarTermsDeliveryDestinationPort" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTermsPayment" id="editarTermsPayment" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarInsuranceCharges" id="editarInsuranceCharges" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarSellerAccountDetail" id="editarSellerAccountDetail" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankName" id="editarBankName" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankAddress" id="editarBankAddress" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountName" id="editarAccountName" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountNumber" id="editarAccountNumber" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarSwift" id="editarSwift" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBuyerBankName" id="editarBuyerBankName" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankAddressBuyer" id="editarBankAddressBuyer" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountHolder" id="editarAccountHolder" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarSwiftCode" id="editarSwiftCode" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountNumberBuyer" id="editarAccountNumberBuyer" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

        $editarFormato3 = new ControladorFormato3();
        $editarFormato3->ctrEditarFormato3();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR FORMATO 3
======================================-->

<div id="modalAgregarElemento" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Elemento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA AGREGAR OBSERVACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommercialInvoice" id="nuevoCommercialInvoice" placeholder="Commercial Invoice / Factura Comercial" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDateForm" id="nuevoDateForm" placeholder="Date / Fecha" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>COMMERCIAL INVOICE / FACTURA COMERCIAL:</b></h5>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCosignee" id="nuevoCosignee" placeholder="Cosignee / Cosignatario" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSignatory" id="nuevoSignatory" placeholder="Signatory / Firmante" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAddress" id="nuevoAddress" placeholder="Address / Dirección" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelephone" id="nuevoTelephone" placeholder="Telephone / Telefóno" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmail" id="nuevoEmail" placeholder="Email / Correo Electrónico" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommodity" id="nuevoCommodity" placeholder="Commodity / Mercancía" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoQuantity" id="nuevoQuantity" placeholder="Quantity / Cantidad" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUnitPrice" id="nuevoUnitPrice" placeholder="Unit Price / Precio de Unidad" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTotalGrossAmount" id="nuevoTotalGrossAmount" placeholder="Total/Gross Amount / Importe Total/Bruto" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTermsDeliveryDestinationPort" id="nuevoTermsDeliveryDestinationPort" placeholder="Terms of Delivery/Destination Port / Términos del Envío/Puerto de Destino" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTermsPayment" id="nuevoTermsPayment" placeholder="Terms of Payment / Términos de Pago" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInsuranceCharges" id="nuevoInsuranceCharges" placeholder="Freight/Insurance Charges / Gastos de Flete/Seguro" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSellerAccountDetail" id="nuevoSellerAccountDetail" placeholder="Seller Account Detail / Detalles de la cuenta de vendedor" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankName" id="nuevoBankName" placeholder="Bank Name / Nombre del Banco" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankAddress" id="nuevoBankAddress" placeholder="Bank Address / Dirección del Banco" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountName" id="nuevoAccountName" placeholder="Account Name / Nombre de la Cuenta" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountNumber" id="nuevoAccountNumber" placeholder="Account Number / Número de Cuenta" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSwift" id="nuevoSwift" placeholder="Swift" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBuyerBankName" id="nuevoBuyerBankName" placeholder="Buyer's Bank Name / Nombre del banco del comprador" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankAddressBuyer" id="nuevoBankAddressBuyer" placeholder="Bank Address / Dirección del Banco" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountHolder" id="nuevoAccountHolder" placeholder="Account Holder / Titular de la Cuenta" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSwiftCode" id="nuevoSwiftCode" placeholder="Swift Code / Código de Swift" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountNumberBuyer" id="nuevoAccountNumberBuyer" placeholder="Account Number / Número de Cuenta" required>

                <input type="hidden" name="nuevoFormato3" id="nuevoFormato3" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Elemento</button>

        </div>

        <?php

        $crearFormato3 = new ControladorFormato3();
        $crearFormato3->ctrCrearFormato3();

        ?>

      </form>

    </div>

  </div>

</div>
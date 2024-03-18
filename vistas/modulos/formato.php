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

    <h1> Administrar Formato </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Formato</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFormato">

          Agregar Elmento

        </button>

        <!-- <a href="index.php?ruta=formato-2&idFormato=<?php //$_GET['idFormato'];
                                                          ?>"> -->

        <a href="index.php?ruta=formato-1&idFormato=">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th colspan="4">Formatos</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $Formato = ControladorFormato::ctrMostrarFormato($item, $valor);

            foreach ($Formato as $key => $value) {

              echo '<tr><td colspan="6" style="background-color:#e1e1e1">FORMATO 1</td></tr>
              
          <tr>

            <th rowspan="75">' . ($key + 1) . '</th>

            <th>To / Para:</th>

            <td>' . $value["cliente_to1"] . '</td>

            <th>Mr. / Sr.:</th>

            <td>' . $value["cliente_mr1"] . '</td>

            <td style="text-align:center;" rowspan="75">

              <div class="btn-group">

                <button class="btn btn-warning btnEditarFormato" idFormato="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarFormato"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>

                </td>

          </tr>

          <tr>

            <th>Position / Posición:</th>

            <td>' . $value["cliente_position1"] . '</td>

            <th>Email / Correo Electrónico:</th>

            <td>' . $value["cliente_email1"] . '</td>

          </tr>

          <tr>

            <th>To / Para:</th>

            <td>' . $value["cliente_cosignee"] . '</td>

            <th>Mr. / Sr.:</th>

            <td>' . $value["cliente_signatory"] . '</td>

          </tr>

          <tr>

            <th>Position / Posición:</th>

            <td>' . $value["cliente_position"] . '</td>

            <th>Email / Correo Electrónico:</th>

            <td>' . $value["cliente_email"] . '</td>

          </tr>

          <tr>

            <th>Via:</th>

            <td>' . $value["cliente_via"] . '</td>

            <th>Email / Correo Electrónico:</th>

            <td>' . $value["cliente_email_via"] . '</td>

          </tr>

          <tr>

            <th>To / Para:</th>

            <td>Mr</td>

          </tr>

          <tr>

            <th style="text-align: center;" colspan="4">TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</th>

          </tr>

          <tr>

            <th>Validity of SCO / Validez de SCO</th>

            <td>' . $value["validity_sco"] . '</td>

            <th>Commodity / Mercancía</th>

            <td>' . $value["commodity"] . '</td>

          </tr>

          <tr>

            <th>Quantity / Cantidad</th>

            <td>' . $value["quantity"] . '</td>

            <th>Price / Precio</th>

            <td>' . $value["price"] . '</td>

          </tr>

          <tr>

            <th>Incoterms / Incotérminos</th>

            <td>' . $value["incoterms"] . '</td>

            <th>Port / Puerto</th>

            <td>' . $value["port"] . '</td>

          </tr>

          <tr>

            <th>Product Origin / Origen del Producto</th>

            <td>' . $value["product_origin"] . '</td>

            <th>Contract Term / Término del Contrato</th>

            <td>' . $value["contract_term"] . '</td>

          </tr>

          <tr>

            <th>Commission / Comisión</th>

            <td colspan="2">' . $value["commission"] . '</td>

          </tr>

          <tr><td colspan="6" style="background-color:#e1e1e1">FORMATO 2</td></tr>
          
          <tr>

          <tr>

            <th>Name of the Bank / Nombre del Banco</th>

            <td>' . $value["cliente_name_of_the_bank"] . '</td>

          </tr>

          <tr>

            <th>Branch and Branch Address / Marca y Dirección de Marca</th>

            <td>' . $value["cliente_branch_address"] . '</td>

          </tr>

          <tr>

            <th>Name of the Banking Official / Nombre Oficial de la Banca</th>

            <td>' . $value["cliente_name_of_the_banking"] . '</td>

          </tr>

          <tr>

            <th>Phone Number / Número de Teléfono</th>

            <td>' . $value["cliente_phone_number"] . '</td>

          </tr>

          <tr>

            <th>FAX Number / Número de FAX</th>

            <td>' . $value["cliente_fax_number"] . '</td>

          </tr>

          <tr>

            <th>Banking Officer mail / Correo Oficial de la Banca</th>

            <td>' . $value["cliente_banking_officer_mail"] . '</td>

          </tr>

          <tr>

            <th>Account Signatory Name / Nombre del Firmante de la Cuenta</th>

            <td>' . $value["cliente_account_signatory_name"] . '</td>

          </tr>

          <tr>

            <th>Account Name / Nombre de la Cuenta</th>

            <td>' . $value["cliente_account_name"] . '</td>

          </tr>

          <tr>

            <th>Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA</th>

            <td>' . $value["cliente_account_number_routing_aba"] . '</td>

          </tr>

          <tr>

            <th>Swift Code / Código Swift</th>

            <td>' . $value["cliente_swift"] . '</td>

          </tr>

          <tr>

            <th style="text-align: center;" colspan="2">Datails of the signatory of the contracts on behalf of the Corporation / Datos del firmante de los contratos en nombre de la Corporación:</th>

          </tr>

          <tr>

            <th>Name / Nombre</th>

            <td>' . $value["name"] . '</td>

          </tr>

          <tr>

            <th>Date And Place Brith / Fecha y Lugar de Nacimiento</th>

            <td>' . $value["date_place_birth"] . '</td>

          </tr>

          <tr>

            <th>Passport Number And Country of issue / Número de pasaporte y país de emisión</th>

            <td>' . $value["passport_number_country_issue"] . '</td>

          </tr>

          <tr>

            <th>Passport Issue Date / Fecha de emisión del pasaporte</th>

            <td>' . $value["passport_issue_date"] . '</td>

          </tr>

          <tr>

            <th>Passport Expiration Date / Fecha de vencimiento del Pasaporte</th>

            <td>' . $value["passport_expiration_date"] . '</td>

          </tr>

          <tr>

            <th>Title within the Corporation/Company / Título dentro de la Corporación/Compañía</th>

            <td>' . $value["title_within_corporation_company"] . '</td>

          </tr>

          <tr>

            <th>Office Phone Number / Número de teléfono de la Oficina</th>

            <td>' . $value["office_phone_number"] . '</td>

          </tr>

          <tr>

            <th>Mobile Number phone / Número de teléfono móvil</th>

            <td>' . $value["mobile_phone_number"] . '</td>

          </tr>

          <tr>

            <th>Email Address / Dirección de Correo Electrónico</th>

            <td>' . $value["email_address"] . '</td>

          </tr>

          <tr><td colspan="6" style="background-color:#e1e1e1">FORMATO 3</td></tr>

          <tr>

              <th>Commercial Invoice / Factura Comercial</th>

              <td>' . $value["commercial_invoice"] . '</td>

              <th>Date / Fecha</th>

              <td>' . $value["date_commercial_invoice"] . '</td>

            </tr>

            <tr>

              <th style="text-align:center;" colspan="4">COMMERCIAL INVOICE / FACTURA COMERCIAL</th>

            </tr>

            <tr>

              <th colspan="2">Cosignee / Cosignatario</th>

              <td colspan="2">' . $value["cliente_cosignee"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Signatory / Firmante</th>

              <td colspan="2">' . $value["cliente_signatory	"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Address / Dirección</th>

              <td colspan="2">' . $value["cliente_address"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Telephone / Telefóno</th>

              <td colspan="2">' . $value["cliente_telephone"] . '</td>

            </tr>

            <tr>

              <th colspan="2">Email / Correo Electrónico</th>

              <td colspan="2">' . $value["cliente_email"] . '</td>

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

              <td>' . $value["price"] . '</td>

              <td>' . $value["total_gross_amount"] . '</td>

            </tr>

            <tr>

              <th>Terms of Delivery/Destination Port / Términos del Envío/Puerto de Destino</th>

              <th>Terms of Payment / Términos de Pago</th>

              <th colspan="2">Freight/Insurance Charges / Gastos de Flete/Seguro</th>


            </tr>

            <tr>

            <td>' . $value["terms_delivary_destination_port"] . '</td>

            <td>' . $value["terms_payment"] . '</td>

            <td colspan="2">' . $value["freight_insurance_charges"] . '</td>

            </tr>

            <tr>

             <th>Seller Account Detail / Detalles de la cuenta de vendedor</th>

             <td>' . $value["sel_seller_account_details"] . '</td>

             <th>Buyer\'s Bank Name / Nombre del banco del comprador</th>

             <td>' . $value["cliente_bank_name"] . '</td>

            </tr>

            <tr>

              <th>Bank Namen / Nombre del Banco</th>

              <td>' . $value["sel_bank_name"] . '</td>

              <th>Bank Address / Dirección del Banco</th>

              <td>' . $value["cliente_bank_address"] . '</td>

            </tr>

            <tr>

              <th>Bank Address / Dirección del Banco</th>

              <td>' . $value["sel_bank_address"] . '</td>

              <th>Account Holder / Titular de la Cuenta</th>

              <td>' . $value["cliente_cosignee"] . '</td>

            </tr>

            <tr>

              <th>Account Name / Nombre de la Cuenta</th>

              <td>' . $value["sel_account_name"] . '</td>

              <th>Swift Code / Código de Swift</th>

              <td>' . $value["cliente_swift_code"] . '</td>

            </tr>

            <tr>

              <th>Account Number / Número de Cuenta</th>

              <td>' . $value["sel_account_number"] . '</td>

              <th>Account Number / Número de Cuenta</th>

              <td>' . $value["cliente_account_number"] . '</td>

            </tr>

            <tr>

              <th>Swift</th>

              <td>' . $value["sel_swift"] . '</td>

            </tr>

            <tr>

              <td colspan="6" style="background-color:#e1e1e1;">FORMATO 4</td>

            </tr>

            <tr>

              <th colspan="3">Athentication Code / Código de Autenticación</th>

              <td colspan="1">' . $value["authentication_code"] . '</td>

            </tr>

            <tr>

              <th>Ref. Number / Número de Referencia:</th>

              <td>' . $value["ref_number"] . '</td>

              <th>Date / Fecha</th>

              <td>' . $value["icpo_date"] . '</td>

            </tr>

            <tr>

              <th>To: / Para:</th>

              <td colspan="3">' . $value["icpo_to"] . '</td>

            </tr>

            <tr>

              <th style="text-align:center;" colspan="4">IRREVOCABLE CORPORATE PURCHASE ORDER ICPO / ORDEN DE COMPRA CORPORATIVA IRREVOCABLE OCOI.</th>

            </tr>

            <tr>

              <th colspan="1">Trade Date / Fecha de negociación</th>

              <td colspan="3">' . $value["trade_date"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Seller / Vendedor</th>

              <td colspan="3">' . $value["seller"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Product Name / Nombre del Producto</th>

              <td colspan="3">' . $value["commodity"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Shipping Terms for Sale / Condiciones de envío para la venta</th>
              <td colspan="1">' . $value["incoterms"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Origin / Origen</th>

              <td colspan="1">' . $value["product_origin"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Trial Quantity / Cantidad de Prueba</th>

              <td colspan="1">' . $value["quantity"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Contract Quantity / Contrato de Cantidad</th>

              <td colspan="1">' . $value["contract_quantity"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Duration Of Contract / Duración del Contrato</th>

              <td colspan="1">' . $value["duration_contract"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Target Price USD / Precio Objetivo USD</th>

              <td colspan="1">' . $value["price"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Shipment Terms / Coniciones de Envío</th>

              <td colspan="3">' . $value["terms_delivary_destination_port"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Vessel / Buque</th>

              <td colspan="1">' . $value["vessel"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Inspection / Inspección</th>

              <td colspan="1">' . $value["inspection"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Insurance / Seguro</th>

              <td colspan="1">' . $value["insurance"] . '</td>

            </tr>

            <tr>

             <th colspan="3">Payment Method / Método de Pago</th>

             <td colspan="1">' . $value["payment_method"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Q & Q Determination / Determinación C & C</th>

              <td colspan="1">' . $value["qq_determination"] . '</td>

            </tr>

            <tr>

             <th colspan="3">Lay Time / Tiempo de Puesta</th>

             <td colspan="1">' . $value["lay_time"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Demurrage Rate / Tasa de Sobreestadía</th>

              <td colspan="1">' . $value["demurrage_rate"] . '</td>

            </tr>

            <tr>

              <th colspan="3">Law / Ley</th>

              <td colspan="1">' . $value["law"] . '</td>

            </tr>

          ';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR FORMATO
======================================-->

<div id="modalAgregarFormato" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Formato</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL FORMATO 1
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <h4><b>Datos del Cliente</b></h4>

              </div>

            </div>

            <!-- PARA 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteTo1" placeholder="To / Para:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- SR. 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteMr1" placeholder="Mr. / Sr.:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- POSICIÓN 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClientePosition1" placeholder="Position / Posición" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- EMAIL 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteEmail1" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- PARA 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteCoignee" placeholder="To / Para:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- SR. 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteSignatory" placeholder="Mr. / Sr.:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- POSICIÓN 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClientePosition" placeholder="Position / Positión" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- EMAIL 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteEmail" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteAddress" placeholder="Address / Dirección">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- TELEFONO CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteTelephone" placeholder="Telephone / Teléfono">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- Via -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteVia" placeholder="Via" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- Email 3 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteEmailVia" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>Información del banco del comprador</b></h5>

              </div>

            </div>

            <!-- AGREGAR Name of the Bank / Nombre del Banco	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteNameOfTheBank" placeholder="Name of the Bank / Nombre del Banco">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Branch and Branch Address / Marca y Dirección de Marca	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteBranchAddress" placeholder="Branch and Branch Address / Marca y Dirección de Marca">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Name of the Banking Official / Nombre Oficial de la Banca -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteNameOfTheBanking" placeholder="Name of the Banking Official / Nombre Oficial de la Banca">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Phone Number / Número de Teléfono -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClientePhoneNumber" placeholder="Phone Number / Número de Teléfono">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR FAX Number / Número de FAX	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteFaxNumber" placeholder="FAX Number / Número de FAX">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Banking Officer mail / Correo Oficial de la Banca -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteBankingOfficerMail" placeholder="Banking Officer mail / Correo Oficial de la Banca">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Account Signatory Name / Nombre del Firmante de la Cuenta -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteAccountSignatoryName" placeholder="Account Signatory Name / Nombre del Firmante de la Cuenta">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Account Name / Nombre de la Cuenta -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteAccountName" placeholder="Account Name / Nombre de la Cuenta">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteAccountNumberRoutingAba" placeholder="Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Swift Code / Código Swift	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteSwift" placeholder="Swift Code / Código Swift">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>Detalles de la cuenta del Vendedor</b></h5>

              </div>

            </div>

            <!-- SELLER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSelSellerAccountDetails" placeholder="Seller Account Detail / Detalles de la cuenta de vendedor">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- BANK NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSelBankName" placeholder="Bank Name / Nombre del Banco">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- BANK ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSelBankAddress" placeholder="Bank Address / Dirección del Banco">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- ACCOUNT NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSelAccountName" placeholder="Account Name / Nombre de la Cuenta">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSelAccountNumber" placeholder="Account Number / Número de Cuenta">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- SWIFT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSelSwift" placeholder="Swift">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>Detalles de la Cuenta del comprador</b></h5>

              </div>

            </div>

            <!-- Buyer's Bank Name -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteBankName" placeholder="Buyer's Bank Name / Nombre del banco del comprador">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- Bank Address -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteBankAddress" placeholder="Bank Address / Dirección del Banco">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- Swift Code -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteSwiftCode" placeholder="Swift Code / Código de Swift">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- Account Number -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoClienteAccountNumber" placeholder="Account Number / Número de Cuenta">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h4><b>FORMATO 1</b></h4>

              </div>

            </div>

            <!-- MR 3 -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMr3" placeholder="Mr. / Sr." required>

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div> -->

            <div class="form-group">

              <div class="input-group">

                <h5><b>TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</b></h5>

              </div>

            </div>

            <!-- VALIDEZ DE SCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoValiditySco" placeholder="Validity of SCO / Validez de SCO">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- MERCANCÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommodity" placeholder="Commodity / Mercancía">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- CANTIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoQuantity" placeholder="Quantity / Cantidad">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPrice" placeholder="Price / Precio">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIncoterms" placeholder="Incoterms / Incotérminos">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPort" placeholder="Port / Puerto">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- ORIGEN DEL PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProductOrigin" placeholder="Product origin/ Origen del Producto">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- TÉRMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContractTerm" placeholder="Contract Term / Término de Contrato">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommission" placeholder="Commission / Comisión">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!--=====================================
            CUERPO DEL MODAL FORMATO 2
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <h4><b>FORMATO 2</b></h4>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>Datails of the signatory of the contracts on behalf of the Corporation / Datos del firmante de los contratos en nombre de la Corporación:</b></h5>

              </div>

            </div>

            <!-- AGREGAR Name / Nombre	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoName" placeholder="Name / Nombre">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Date And Place Brith / Fecha y Lugar de Nacimiento	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDatePlaceBirth" placeholder="Date And Place Brith / Fecha y Lugar de Nacimiento">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Passport Number And Country of issue / Número de pasaporte y país de emisión	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNumberCountryIssue" placeholder="Passport Number And Country of issue / Número de pasaporte y país de emisión">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Passport Issue Date / Fecha de emisión del pasaporte	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIssueDate" placeholder="Passport Issue Date / Fecha de emisión del pasaporte">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Passport Expiration Date / Fecha de vencimiento del Pasaporte	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportExpirationDate" placeholder="Passport Expiration Date / Fecha de vencimiento del Pasaporte">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Title within the Corporation/Company / Título dentro de la Corporación/Compañía	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTitleWithinCorporationCompany" placeholder="Title within the Corporation/Company / Título dentro de la Corporación/Compañía">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Office Phone Number / Número de teléfono de la Oficina	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficePhoneNumber" placeholder="Office Phone Number / Número de teléfono de la Oficina">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Mobile Number phone / Número de teléfono móvil	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMobilePhoneNumber" placeholder="Mobile Number phone / Número de teléfono móvil">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Email Address / Dirección de Correo Electrónico	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmailAddress" placeholder="Email Address / Dirección de Correo Electrónico">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!--=====================================
            CUERPO DEL MODAL FORMATO 3
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <h4><b>FORMATO 3</b></h4>

              </div>

            </div>

            <!-- NUEVO COMMERCIAL INVOICE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommercialInvoice" placeholder="Commercial Invoice / Factura Comercial">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- NUEVO DATE COMMERCIAL INVOICE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDateCommercialInvoice" placeholder="Date / Fecha">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>COMMERCIAL INVOICE / FACTURA COMERCIAL:</b></h5>

              </div>

            </div>

            <!-- TOTAL / GROSS AMOUNT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTotalGrossAmount" placeholder="Total/Gross Amount / Importe Total/Bruto">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- TERMS OF DELIVERY DESTINATION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTermsDeliveryDestinationPort" placeholder="Terms of Delivery/Destination Port / Términos del Envío/Puerto de Destino">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- TERMS OF PAYMENT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTermsPayment" placeholder="Terms of Payment / Términos de Pago">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- FREIGHT / INSURANCE CHARGE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoFreightInsuranceCharge" placeholder="Freight/Insurance Charges / Gastos de Flete/Seguro">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!--=====================================
            MODAL AGREGAR FORMATO 4
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <h4><b>FORMATO 4</b></h4>

              </div>

            </div>

            <!-- AGREGAR Codigo de autenticación	-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAuthenticationCode" placeholder="Authentication Code / Código de Autenticación">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Ref. Number / Número de Referencia:	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRefNumber" placeholder="Ref. Number / Número de Referencia:">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Trade Date / Fecha de negociación	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIcpoDate" placeholder="Date / Fecha">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR To: / Para:	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIcpoTo" placeholder="To: / Para:">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>IRREVOCABLE CORPORATE PURCHASE ORDER ICPO / ORDEN DE COMPRA CORPORATIVA IRREVOCABLE OCCI.</b></h5>

              </div>

            </div>

            <!-- AGREGAR Trade Date / Fecha de negociación		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTradeDate" placeholder="Trade Date / Fecha de negociación">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Seller / Vendedor		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSeller" placeholder="Seller / Vendedor">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Duration Of Contract / Duración del Contrato		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDurationContract" placeholder="Duration Of Contract / Duración del Contrato">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Vessel / Buque	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVessel" placeholder="Vessel / Buque">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Inspection / Inspección	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInspection" placeholder="Inspection / Inspección">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Insurance / Seguro	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInsurance" placeholder="Insurance / Seguro">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Payment Method / Método de Pago	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPaymentMethod" placeholder="Payment Method / Método de Pago">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Q & Q Determination / Determinación C & C	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoQQDetermination" placeholder="Q & Q Determination / Determinación C & C">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Lay Time / Tiempo de Puesta	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLayTime" placeholder="Lay Time / Tiempo de Puesta">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Demurrage Rate / Tasa de Sobreestadía	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDemurrageRate" placeholder="Demurrage Rate / Tasa de Sobreestadía">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Law / Ley	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLaw" placeholder="Law / Ley">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

              </div>

            </div>

            <!-- AGREGAR Images / Imagene -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIdImagenes" placeholder="Images / Imagenes">

                <input type="hidden" name="nuevoFormato" id="nuevoFormato" required>

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

        $crearFormato = new ControladorFormato();
        $crearFormato->ctrCrearFormato();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR FORMATO
======================================-->

<div id="modalEditarFormato" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Formato</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR FORMATO -->

            <!-- EDITAR PARA 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarClienteTo1" id="editarClienteTo1">

                <input type="hidden" name="idFormato" id="idFormato" required>

                <input type="hidden" name="editarFormato" id="editarFormato" required>

              </div>

            </div>

            <!-- EDITAR SR. 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteMr1" name="editarClienteMr1" required>

              </div>

            </div>

            <!-- EDITAR POSICIÓN 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClientePosition1" name="editarClientePosition1" required>

              </div>

            </div>

            <!-- EDITAR EMAIL 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteEmail1" name="editarClienteEmail1" required>

              </div>

            </div>

            <!-- EDITAR PARA 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteCoignee" name="editarClienteCoignee" required>

              </div>

            </div>

            <!-- EDITAR SR. 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteSignatory" name="editarClienteSignatory" required>

              </div>

            </div>

            <!-- EDITAR POSICIÓN 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClientePosition" name="editarClientePosition" required>

              </div>

            </div>

            <!-- EDITAR EMAIL 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteEmail" name="editarClienteEmail" required>

              </div>

            </div>

            <!-- EDITAR VIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteVia" name="editarClienteVia" required>

              </div>

            </div>

            <!-- EDITAR EMAIL 3 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarClienteEmailVia" name="editarClienteEmailVia" required>

              </div>

            </div>

            <!-- EDITAR SR. 3 -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarMr3" name="editarMr3" required>

              </div>

            </div> -->

            <div class="form-group">

              <div class="input-group">

                <h5><b>TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</b></h5>

              </div>

            </div>

            <!-- EDITAR VALIDEZ SCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarValiditySco" name="editarValiditySco" required>

              </div>

            </div>

            <!-- EDITAR MERCANCIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarCommodity" name="editarCommodity" required>

              </div>

            </div>

            <!-- EDITAR CANTIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarQuantity" name="editarQuantity" required>

              </div>

            </div>

            <!-- EDITAR PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPrice" name="editarPrice" required>

              </div>

            </div>

            <!-- EDITAR INCOTERMS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarIncoterms" name="editarIncoterms" required>

              </div>

            </div>

            <!-- EDITAR PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPort" name="editarPort" required>

              </div>

            </div>

            <!-- EDITAR ORIGEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarProductOrigin" name="editarProductOrigin" required>

              </div>

            </div>

            <!-- EDITAR TERMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarContractTerm" name="editarContractTerm" required>

              </div>

            </div>

            <!-- EDITAR COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarCommission" name="editarCommission" required>

              </div>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body">

              <div class="box-body">

                <!-- ENTRADA PARA EDITAR OBSERVACION -->

                <div class="form-group">

                  <div class="input-group">

                    <!-- EDITAR Name of the Bank / Nombre del Banco -->

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteNameOfTheBank" id="editarClienteNameOfTheBank">

                    <input type="hidden" name="idFormato" id="idFormato" required>

                    <input type="hidden" name="editarFormato" id="editarFormato" required>

                  </div>

                </div>

                <div class="form-group">

                  <div class="input-group">

                    <!-- EDITAR Branch and Branch Address / Marca y Dirección de Marca -->

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteBranchAddress" id="editarClienteBranchAddress">

                  </div>

                </div>

                <div class="form-group">

                  <div class="input-group">

                    <!-- EDITAR Name of the Banking Official / Nombre Oficial de la Banca	 -->

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteNameOfTheBanking" id="editarClienteNameOfTheBanking">

                  </div>

                </div>

                <div class="form-group">

                  <div class="input-group">

                    <!-- EDITAR Phone Number / Número de Teléfono -->

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClientePhoneNumber" id="editarClientePhoneNumber">

                  </div>

                </div>

                <!-- EDITAR FAX Number / Número de FAX -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteFaxNumber" id="editarClienteFaxNumber">

                  </div>

                </div>

                <!-- EDITAR Banking Officer mail / Correo Oficial de la Banca -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteBankingOfficerMail" id="editarClienteBankingOfficerMail">

                  </div>

                </div>

                <!-- EDITAR Account Signatory Name / Nombre del Firmante de la Cuenta	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteAccountSignatoryName" id="editarClienteAccountSignatoryName">

                  </div>

                </div>

                <!-- EDITAR Account Name / Nombre de la Cuenta -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteAccountName" id="editarClienteAccountName">

                  </div>

                </div>

                <!-- EDITAR Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteAccountNumberRoutingAba" id="editarClienteAccountNumberRoutingAba">

                  </div>

                </div>

                <!-- EDITAR Swift Code / Código Swift	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarClienteSwift" id="editarClienteSwift">

                  </div>

                </div>

                <div class="form-group">

                  <div class="input-group">

                    <h5><b>Datails of the signatory of the contracts on behalf of the Corporation / Datos del firmante de los contratos en nombre de la Corporación:</b></h5>

                  </div>

                </div>

                <!-- EDITAR Name / Nombre	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarName" id="editarName">

                  </div>

                </div>

                <!-- EDITAR Date And Place Brith / Fecha y Lugar de Nacimiento -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarDatePlaceBirth" id="editarDatePlaceBirth">

                  </div>

                </div>

                <!-- EDITAR Passport Number And Country of issue / Número de pasaporte y país de emisión -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarNumberCountryIssue" id="editarNumberCountryIssue">

                  </div>

                </div>

                <!-- EDITAR Passport Issue Date / Fecha de emisión del pasaporte -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarIssueDate" id="editarIssueDate">

                  </div>

                </div>

                <!-- EDITAR Passport Expiration Date / Fecha de vencimiento del Pasaporte	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarPassportExpirationDate" id="editarPassportExpirationDate">

                  </div>

                </div>

                <!-- EDITAR Title within the Corporation/Company / Título dentro de la Corporación/Compañía	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarTitleWithinCorporationCompany" id="editarTitleWithinCorporationCompany">

                  </div>

                </div>

                <!-- EDITAR Office Phone Number / Número de teléfono de la Oficina	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarOfficePhoneNumber" id="editarOfficePhoneNumber">

                  </div>

                </div>

                <!-- EDITAR Mobile Number phone / Número de teléfono móvil	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarMobilePhoneNumber" id="editarMobilePhoneNumber">

                  </div>

                </div>

                <!-- EDITAR Email Address / Dirección de Correo Electrónico	 -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                    <input type="text" class="form-control input-lg" name="editarEmailAddress" id="editarEmailAddress">

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

            $editarFormato = new ControladorFormato();
            $editarFormato->ctrEditarFormato();

            ?>

      </form>

    </div>

  </div>

</div>
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

    <h1> Administrar Formato 2</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Formato 2</li>

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

        <a href="index.php?ruta=formato-2&idFormato2">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th colspan="2">BUYER'S BANK INFORMATION</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            //$item = "id";
            //$valor = $_GET['idOrdenInspeccionInterna'];

            $item = null;
            $valor = null;

            $Formato2 = ControladorFormato2::ctrMostrarFormato2($item, $valor);

            foreach ($Formato2 as $key => $value) {

              //$Key = 0;

              echo ' <tr>


                    <tr>

                      <th rowspan="20">' . ($key + 1) . '</th>

                      <th>Name of the Bank / Nombre del Banco</th>

                      <td>' . $value["bank_name"] . '</td>

                      <td style="text-align:center;" rowspan="20">

                      <div class="btn-group">

                        <button class="btn btn-info btnImprimirFormato2" idFormato2="' . $value["id"] . '"><i class="fa fa-print"></i></button>

                        <button class="btn btn-warning btnEditarFormato2" idFormato2="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarFormato2"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>

                    </td>

                    </tr>

                    <tr>

                      <th>Branch and Branch Address / Marca y Dirección de Marca</th>

                      <td>' . $value["branch_address"] . '</td>

                    </tr>

                    <tr>

                      <th>Name of the Banking Official / Nombre Oficial de la Banca</th>

                      <td>' . $value["banking_official_name"] . '</td>

                    </tr>

                    <tr>

                      <th>Phone Number / Número de Teléfono</th>

                      <td>' . $value["phone_number"] . '</td>

                    </tr>

                    <tr>

                      <th>FAX Number / Número de FAX</th>

                      <td>' . $value["fax_number"] . '</td>

                    </tr>

                    <tr>

                      <th>Banking Officer mail / Correo Oficial de la Banca</th>

                      <td>' . $value["banking_oficer_mail"] . '</td>

                    </tr>

                    <tr>

                      <th>Account Signatory Name / Nombre del Firmante de la Cuenta</th>

                      <td>' . $value["account_signatory_name"] . '</td>

                    </tr>

                    <tr>

                      <th>Account Name / Nombre de la Cuenta</th>

                      <td>' . $value["account_name"] . '</td>

                    </tr>

                    <tr>

                      <th>Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA</th>

                      <td>' . $value["account_number_routing_aba"] . '</td>

                    </tr>

                    <tr>

                      <th>Swift Code / Código Swift</th>

                      <td>' . $value["swift_code"] . '</td>

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

                      <td>' . $value["passport_number_country"] . '</td>

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

                      <td>' . $value["title_corporation_company"] . '</td>

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

                    <tr><td colspan="4" style="background-color:#e1e1e1"></td></tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR FORMATO 2
======================================-->

<div id="modalEditarFormato2" class="modal fade" role="dialog">

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

                <!-- EDITAR Name of the Bank / Nombre del Banco -->

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankName" id="editarBankName" required>

                <input type="hidden" name="idFormato2" id="idFormato2" required>

                <input type="hidden" name="editarFormato2" id="editarFormato2" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <!-- EDITAR Branch and Branch Address / Marca y Dirección de Marca -->

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBranchAddress" id="editarBranchAddress" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <!-- EDITAR Name of the Banking Official / Nombre Oficial de la Banca	 -->

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankingOfficialName" id="editarBankingOfficialName" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <!-- EDITAR Phone Number / Número de Teléfono -->

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPhoneNumber" id="editarPhoneNumber" required>

              </div>

            </div>

            <!-- EDITAR FAX Number / Número de FAX -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarFaxNumber" id="editarFaxNumber" required>

              </div>

            </div>

            <!-- EDITAR Banking Officer mail / Correo Oficial de la Banca -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankingOficerMail" id="editarBankingOficerMail" required>

              </div>

            </div>

            <!-- EDITAR Account Signatory Name / Nombre del Firmante de la Cuenta	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountSignatory" id="editarAccountSignatory" required>

              </div>

            </div>

            <!-- EDITAR Account Name / Nombre de la Cuenta -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountName" id="editarAccountName" required>

              </div>

            </div>

            <!-- EDITAR Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountNumberRoutingAba" id="editarAccountNumberRoutingAba" required>

              </div>

            </div>

            <!-- EDITAR Swift Code / Código Swift	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarSwiftCode" id="editarSwiftCode" required>

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

                <input type="text" class="form-control input-lg" name="editarName" id="editarName" required>

              </div>

            </div>

            <!-- EDITAR Date And Place Brith / Fecha y Lugar de Nacimiento -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDatePlaceBirth" id="editarDatePlaceBirth" required>

              </div>

            </div>

            <!-- EDITAR Passport Number And Country of issue / Número de pasaporte y país de emisión -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportNumberCountry" id="editarPassportNumberCountry" required>

              </div>

            </div>

            <!-- EDITAR Passport Issue Date / Fecha de emisión del pasaporte -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportIssueDate" id="editarPassportIssueDate" required>

              </div>

            </div>

            <!-- EDITAR Passport Expiration Date / Fecha de vencimiento del Pasaporte	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportExpirationDate" id="editarPassportExpirationDate" required>

              </div>

            </div>

            <!-- EDITAR Title within the Corporation/Company / Título dentro de la Corporación/Compañía	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTitleCorporationCompany" id="editarTitleCorporationCompany" required>

              </div>

            </div>

            <!-- EDITAR Office Phone Number / Número de teléfono de la Oficina	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficePhoneNumber" id="editarOfficePhoneNumber" required>

              </div>

            </div>

            <!-- EDITAR Mobile Number phone / Número de teléfono móvil	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarMobilePhoneNumber" id="editarMobilePhoneNumber" required>

              </div>

            </div>

            <!-- EDITAR Email Address / Dirección de Correo Electrónico	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarEmailAddress" id="editarEmailAddress" required>

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

        $editarFormato2 = new ControladorFormato2();
        $editarFormato2->ctrEditarFormato2();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR FORMATO 2
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

            <!-- AGREGAR Name of the Bank / Nombre del Banco	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankName" id="nuevoBankName" placeholder="Name of the Bank / Nombre del Banco" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Branch and Branch Address / Marca y Dirección de Marca	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBranchAddress" id="nuevoBranchAddress" placeholder="Branch and Branch Address / Marca y Dirección de Marca" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Name of the Banking Official / Nombre Oficial de la Banca -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankingOfficialName" id="nuevoBankingOfficialName" placeholder="Name of the Banking Official / Nombre Oficial de la Banca" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Phone Number / Número de Teléfono -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPhoneNumber" id="nuevoPhoneNumber" placeholder="Phone Number / Número de Teléfono" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR FAX Number / Número de FAX	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoFaxNumber" id="nuevoFaxNumber" placeholder="FAX Number / Número de FAX" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Banking Officer mail / Correo Oficial de la Banca -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankingOficerMail" id="nuevoBankingOficerMail" placeholder="Banking Officer mail / Correo Oficial de la Banca" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Account Signatory Name / Nombre del Firmante de la Cuenta -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountSignatory" id="nuevoAccountSignatory" placeholder="Account Signatory Name / Nombre del Firmante de la Cuenta" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Account Name / Nombre de la Cuenta -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountName" id="nuevoAccountName" placeholder="Account Name / Nombre de la Cuenta" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountNumberRoutingAba" id="nuevoAccountNumberRoutingAba" placeholder="Account Number/Routing/ABA Number / Número de cuenta/ruta/número ABA" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Swift Code / Código Swift	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSwiftCode" id="nuevoSwiftCode" placeholder="Swift Code / Código Swift" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

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

                <input type="text" class="form-control input-lg" name="nuevoName" id="nuevoName" placeholder="Name / Nombre" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Date And Place Brith / Fecha y Lugar de Nacimiento	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDatePlaceBirth" id="nuevoDatePlaceBirth" placeholder="Date And Place Brith / Fecha y Lugar de Nacimiento" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Passport Number And Country of issue / Número de pasaporte y país de emisión	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportNumberCountry" id="nuevoPassportNumberCountry" placeholder="Passport Number And Country of issue / Número de pasaporte y país de emisión" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Passport Issue Date / Fecha de emisión del pasaporte	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportIssueDate" id="nuevoPassportIssueDate" placeholder="Passport Issue Date / Fecha de emisión del pasaporte" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Passport Expiration Date / Fecha de vencimiento del Pasaporte	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportExpirationDate" id="nuevoPassportExpirationDate" placeholder="Passport Expiration Date / Fecha de vencimiento del Pasaporte" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Title within the Corporation/Company / Título dentro de la Corporación/Compañía	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTitleCorporationCompany" id="nuevoTitleCorporationCompany" placeholder="Title within the Corporation/Company / Título dentro de la Corporación/Compañía" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Office Phone Number / Número de teléfono de la Oficina	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficePhoneNumber" id="nuevoOfficePhoneNumber" placeholder="Office Phone Number / Número de teléfono de la Oficina" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Mobile Number phone / Número de teléfono móvil	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMobilePhoneNumber" id="nuevoMobilePhoneNumber" placeholder="Mobile Number phone / Número de teléfono móvil" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

              </div>

            </div>

            <!-- AGREGAR Email Address / Dirección de Correo Electrónico	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmailAddress" id="nuevoEmailAddress" placeholder="Email Address / Dirección de Correo Electrónico" required>

                <input type="hidden" name="nuevoFormato2" id="nuevoFormato2" required>

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

        $crearFormato2 = new ControladorFormato2();
        $crearFormato2->ctrCrearFormato2();

        ?>

      </form>

    </div>

  </div>

</div>
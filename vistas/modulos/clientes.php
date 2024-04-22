<?php

if ($_SESSION["perfil"] == "Especial") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar clientes

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar clientes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Cosignatario</th>
              <th>Firmante</th>
              <th>Posición</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Ingreso al sistema</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            foreach ($clientes as $key => $value) {

              echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["cosignee"] . '</td>

                    <td>' . $value["signatory"] . '</td>

                    <td>' . $value["position"] . '</td>

                    <td>' . $value["email"] . '</td>

                    <td>' . $value["direccion"] . '</td>  
                    
                    <td>' . $value["telefono"] . '</td>

                    <td>' . $value["fecha"] . '</td>

                    <td>

                      <div class="btn-group">
                      
                      <button class="btn btn-success btnInfoCliente" data-toggle="modal" data-target="#modalInfoCliente" idCliente="' . $value["id"] . '"><i class="fa-solid fa-eye"></i></button>
                      
                      <button class="btn btn-info btnLOI" idCliente="' . $value["id"] . '"><i class="fa-regular fa-file-lines"></i> LOI\'s</button>';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '<button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fa-solid fa-pencil"></i></button>';

                //echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '
              
              
              
              </div> 

                    </td>

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
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCosignee" placeholder="Ingresar Cosignatario" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SIGNATORY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSignatory" placeholder="Ingresar Firmante" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA POSICION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPosition" placeholder="Ingresar Posición" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CRN-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCRN" placeholder="Ingresar Company Registration Number (CRN)" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL BANK NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankName" placeholder="Ingresar Nombre del banco" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL BANK ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankAddress" placeholder="Ingresar Dirección del Banco" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SWIFT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSwift" placeholder="Ingresar Swift" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficerName" placeholder="Nombre del oficial del banco" require>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL POSITION DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficerPosition" placeholder="Posición del oficial del banco" require>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-square-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficerPhone" placeholder="Ingresar Teléfono del oficial del banco" data-inputmask="'mask':'(999) 999-9999'" data-mask require>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL E-MAIL DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoOfficerEmail" placeholder="Ingresar E-mail del oficial del banco" require>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountNumber" placeholder="Ingresar Número de Cuenta" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-flag-usa"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCountry" placeholder="Ingresar País de origen" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportNumber" placeholder="Ingresar Número del pasaporte" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportIssueDate" placeholder="Ingresar Fecha de emición del pasaporte" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportExpirationDate" placeholder="Ingresar Fecha de vencimiendo del passaporte" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL PASSPORT IMAGE -->

            <div class="form-group">

              <label for="nuevoPassportImage">Cargar foto del pasaporte</label>

              <input type="file" name="nuevoPassportImage" required>

              <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

      $crearCliente = new ControladorClientes();
      $crearCliente->ctrCrearCliente();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="text" class="form-control input-lg" name="editarCosignee" id="editarCosignee" required>

                <input type="hidden" name="idCliente" id="idCliente" required>

                <input type="hidden" name="editarCliente" id="editarCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA SIGNATORY-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarSignatory" id="editarSignatory" required>

              </div>

            </div>

            <!-- ENTRADA PARA POSICIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="editarPosition" id="editarPosition" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA CRN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="editarCRN" id="editarCRN" required>

              </div>

            </div>

            <!-- ENTRADA PARA BANK NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankName" id="editarBankName" required>

              </div>

            </div>

            <!-- ENTRADA PARA BANK ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankAddress" id="editarBankAddress" required>

              </div>

            </div>

            <!-- ENTRADA PARA SWIFT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="editarSwift" id="editarSwift" required>

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficerName" id="editarOfficerName" required>

              </div>

            </div>

            <!-- ENTRADA PARA POSITION DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficerPosition" id="editarOfficerPosition" required>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-square-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficerPhone" id="editarOfficerPhone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA E-MAIL DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarOfficerEmail" id="editarOfficerEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountNumber" id="editarAccountNumber" required>

              </div>

            </div>

            <!-- ENTRADA PARA COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-flag-usa"></i></span>

                <input type="text" class="form-control input-lg" name="editarCountry" id="editarCountry" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportNumber" id="editarPassportNumber" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportIssueDate" id="editarPassportIssueDate" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportExpirationDate" id="editarPassportExpirationDate" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA PASSPORT IMAGE -->

            <div class="form-group">

              <div class="input-group">

                <div class="form-group">

                  <label for="editarPassportImage">Cargar foto del pasaporte</label>

                  <input type="file" name="editarPassportImage" id="editarPassportImage" required>

                  <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

                </div>

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

      </form>

      <?php

      $editarCliente = new ControladorClientes();
      $editarCliente->ctrEditarCliente();

      ?>

    </div>

  </div>

</div>

<?php

$eliminarCliente = new ControladorClientes();
$eliminarCliente->ctrEliminarCliente();

?>

<!--=====================================
MODAL INFORMACIÓN DEL CLIENTE
======================================-->

<div id="modalInfoCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Información del Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL COSIGNEE -->

            <div class="form-group">

              <label for="infoCosignee">Cosignatario</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="text" class="form-control input-lg" name="infoCosignee" id="infoCosignee" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SIGNATORY-->

            <div class="form-group">

              <label for="infoSignatory">Firmante</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="infoSignatory" id="infoSignatory" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA POSICIÓN -->

            <div class="form-group">

              <label for="infoPosition">Posición</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="infoPosition" id="infoPosition" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <label for="infoEmail">Email</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="infoEmail" id="infoEmail" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <label for="infoDireccion">Dirección</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="infoDireccion" id="infoDireccion" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <label for="infoTelefono">Teléfono</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="infoTelefono" id="infoTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask readonly>

              </div>

            </div>

            <!-- ENTRADA PARA CRN -->

            <div class="form-group">

              <label for="infoCRN">CRN</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="infoCRN" id="infoCRN" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA BANK NAME -->

            <div class="form-group">

              <label for="infoBankName">Nombre del Banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i></span>

                <input type="text" class="form-control input-lg" name="infoBankName" id="infoBankName" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA BANK ADDRESS -->

            <div class="form-group">

              <label for="infoBankAddress">Dirección del Banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i></span>

                <input type="text" class="form-control input-lg" name="infoBankAddress" id="infoBankAddress" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SWIFT -->

            <div class="form-group">

              <label for="infoSwift">Código Swift</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="infoSwift" id="infoSwift" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerName">Nombre del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerName" id="infoOfficerName" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA POSITION DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerPosition">Posición del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerPosition" id="infoOfficerPosition" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerPhone">Teléfono del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-square-phone"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerPhone" id="infoOfficerPhone" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA E-MAIL DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerEmail">Email del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerEmail" id="infoOfficerEmail" readonly>

              </div>

            </div>


            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <label for="infoAccountNumber">Número de Cuenta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="infoAccountNumber" id="infoAccountNumber" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA COUNTRY -->

            <div class="form-group">

              <label for="infoCountr">País de origen</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-flag-usa"></i></span>

                <input type="text" class="form-control input-lg" name="infoCountry" id="infoCountry" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER -->

            <div class="form-group">

              <label for="infopassportNumber">Número del Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportNumber" id="infoPassportNumber" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <label for="infoPassportIssueDate">Fecha de emición del Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportIssueDate" id="infoPassportIssueDate" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <label for="infoPassportExpirationDate">Fecha de Vencimiento del Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportExpirationDate" id="infoPassportExpirationDate" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA PASSPORT IMAGE -->

            <div class="form-group">

              <label for="infoPassportImage">Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportImage" id="infoPassportImage" readonly>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

    </div>

  </div>

</div>
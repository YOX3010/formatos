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
                      
                      <button class="btn btn-success btnInfoCliente" data-toggle="modal" data-target="#modalInfoCliente" idCliente="' . $value["id"] . '"><i class="fa-solid fa-eye"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '<button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fa-solid fa-pencil"></i></button>';

                //echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '
              
              <button class="btn btn-info btnLOI" idLOI="' . $value["id"] . '">LOI\'s</button>
              
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

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

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

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountNumber" placeholder="Ingresar Número de Cuenta" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER AND COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportNumberCountry" placeholder="Ingresar País de emición y Número del pasaporte" required>

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

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportImage" placeholder="Cargar foto del pasaporte" required>

                <input type="hidden" name="nuevoCliente" id="nuevoCliente" required>

              </div>

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

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></i></span>

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

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountNumber" id="editarAccountNumber" required>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportNumberCountry" id="editarPassportNumberCountry" required>

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

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportImage" id="editarPassportImage" required>

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

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i> Cosignatario</span>

                <input type="text" class="form-control input-lg" name="infoCosignee" id="infoCosignee" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SIGNATORY-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i> Firmante</span>

                <input type="text" class="form-control input-lg" name="infoSignatory" id="infoSignatory" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA POSICIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i> Posición</span>

                <input type="text" class="form-control input-lg" name="infoPosition" id="infoPosition" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i> Email</span>

                <input type="email" class="form-control input-lg" name="infoEmail" id="infoEmail" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i> Dirección</span>

                <input type="text" class="form-control input-lg" name="infoDireccion" id="infoDireccion" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i> Teléfono</span>

                <input type="text" class="form-control input-lg" name="infoTelefono" id="infoTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask readonly>

              </div>

            </div>

            <!-- ENTRADA PARA BANK NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i> Nombre del Banco</span>

                <input type="text" class="form-control input-lg" name="infoBankName" id="infoBankName" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA BANK ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i> Dirección del Banco</span>

                <input type="text" class="form-control input-lg" name="infoBankAddress" id="infoBankAddress" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SWIFT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i> Swift</span>

                <input type="text" class="form-control input-lg" name="infoSwift" id="infoSwift" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i> Número de Cuenta</span>

                <input type="text" class="form-control input-lg" name="infoAccountNumber" id="infoAccountNumber" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i> País y Número del Pasaporte</span>

                <input type="text" class="form-control input-lg" name="infoPassportNumberCountry" id="infoPassportNumberCountry" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i> Fecha de Emición del Pasaporte</span>

                <input type="text" class="form-control input-lg" name="infoPassportIssueDate" id="infoPassportIssueDate" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i> Fecha de Vencimiento del Pasaporte</span>

                <input type="text" class="form-control input-lg" name="infoPassportExpirationDate" id="infoPassportExpirationDate" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA PASSPORT IMAGE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i> Foto del Pasaporte</span>

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
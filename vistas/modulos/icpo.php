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

    <h1>ICPO</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">ICPO</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarICPO">

          Generar ICPO

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>N° ICPO</th>
              <th>Supplier</th>
              <th>Ref. Number</th>
              <th>Auth. code</th>
              <th>Commodity</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $ICPO = ControladorICPO::ctrMostrarICPO($item, $valor);

            foreach ($ICPO as $key => $value) {

              // if ($value["id_sco"] == $_GET["idSCO"]) {

              $fechaCodigo = str_replace(array("-", " ", ":"), "", $value["fecha"]);

              echo '<tr>

              <th colspan="1">' . ($key + 1) . '</th>

              <td>TPC-MAJR-SCO-000' . $value["id"] . '</td>';


              $itemProveedor = "id";
              $valorProveedor = $value["id_proveedor"];

              $respuestaProveedor = ControladorProveedores::ctrMostrarProveedores($itemProveedor, $valorProveedor);

              echo '<td>' . $respuestaProveedor["refineria"] . ' / ' . $respuestaProveedor["proveedor"] . '</td>

              <td>TPC-MAJR-SCO-000' . $value["ref_number"] . '</td>

              <td colspan="1">' . $fechaCodigo . "-" . $value["authentication_code"] . '</td>';

              $itemProductos = "id";
              $valorProductos = $value["id_producto"];

              $respuestaProductos = ControladorProductos::ctrMostrarProductos($itemProductos, $valorProductos);

              echo '<td>' . $respuestaProductos["commodity"] . '</td>

              <td>' . $value["fecha"] . '</td>

              <td style="text-align:center;">

              <div class="btn-group">

              <button class="btn btn-info btnICPO" idICPO="' . $value["id"] . '"><i class="fa-regular fa-file-lines"></i> Ver ICPO</button>

                <button class="btn btn-danger btnImprimirICPO" idICPO="' . $value["id"] . '"><i class="fa fa-print"></i></button>';


              if ($_SESSION["perfil"] == "Administrador") {

                echo '<button class="btn btn-warning btnEditarICPO" idICPO="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarICPO"><i class="fa fa-pencil"></i></button>';
                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>

            </td>

            </tr>';
              // }
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR ICPO
======================================-->

<div id="modalAgregarICPO" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Crear ICPO</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <select class="form-control input-lg" id="nuevoNombreProveedor" name="nuevoNombreProveedor" required>

                  <option value="">Selecionar Proveedor</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $usuario = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                  foreach ($usuario as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["proveedor"] . '</option>';
                  }

                  ?>

                </select>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building"></i></span>

                <input type="text" class="form-control input-lg" value="TAMESIS PER COMPANY LLC" readonly>

                <!-- CODIGO DE AUTENTICACION -->

                <?php

                $code = mt_rand(1000, 9999);

                ?>

                <input type="hidden" class="form-control input-lg" name="nuevoAuthCode" value="<?php echo $code; ?>" require>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- NUMERO DE REFERENCIA -->

            <!-- <div class="form-group" style="display: none;"> -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <span class="input-group-addon">TPC-MAJR-SCO-000</span>

                <select class="form-control input-lg" name="nuevoRefNumber" required>

                  <option value="">Selecionar referencia de SCO</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $numRef = ControladorSCO::ctrMostrarSCO($item, $valor);

                  foreach ($numRef as $key => $valueNumRef) {


                    echo '<option value="' . $valueNumRef["id"] . '">' . $valueNumRef["id"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- VIA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVia" placeholder="Via" required>

              </div>

            </div>

            <div class="form-group">

              <h3>IRREVOCABLE CORPORATE PURCHASE ORDER ICPO</h3>

            </div>

            <!-- TRADE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i></span>

                <input type="date" class="form-control input-lg" name="nuevoTradeDate" required>

              </div>

            </div>

            <!-- PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-gas-pump"></i></span>

                <select class="form-control input-lg" name="nuevoProducto" required>

                  <option value="">Selecionar Producto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $Producto = ControladorProductos::ctrMostrarProductos($item, $valor);

                  foreach ($Producto as $key => $valueProducto) {


                    echo '<option value="' . $valueProducto["id"] . '">' . $valueProducto["commodity"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- SHIPPING TERMS FOR SALE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-handshake"></i></span>

                <span class="input-group-addon">Free on Board (FOB) Tank to Tank </span>

                <select class="form-control input-lg" name="nuevoPort" required>

                  <option value="">Puerto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $Port = ControladorPort::ctrMostrarPort($item, $valor);

                  foreach ($Port as $key => $Port) {


                    echo '<option value="' . $Port["id"] . '">' . $Port["port"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ORIGEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-location-dot"></i></span>

                <select class="form-control input-lg" name="nuevoOrigen" required>

                  <option value="">Selecionar Origen del Producto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $Origen = ControladorProductOrigin::ctrMostrarProductOrigin($item, $valor);

                  foreach ($Origen as $key => $Origen) {


                    echo '<option value="' . $Origen["id"] . '">' . $Origen["origin"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- TRIAL QUANTITY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-boxes-packing"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTrialQuantity" placeholder="Trial Quantity / Cantidad de prueba" required>

                <select class="form-control input-sm" name="nuevoUM" required>

                  <option value="">Unidad</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $UM = ControladorUM::ctrMostrarUM($item, $valor);

                  foreach ($UM as $key => $UM) {


                    echo '<option value="' . $UM["id"] . '">' . $UM["unidad"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- CONTRACT QUANTITY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-contract"></i></span>

                <select class="form-control input-lg" name="nuevoContractQuantity" required>

                  <option default value="SPOT">SPOT</option>

                  <option value="12 Months">12 Months</option>

                </select>

              </div>

            </div>

            <!-- DURACIÓN DEL CONTRATO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>

                <span class="input-group-addon">Duration Contract</span>

                <input type="text" class="form-control input-lg" name="nuevoDurationContract" value="TBA" readonly>

              </div>

            </div>

            <!-- VESSEL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ship"></i></span>

                <span class="input-group-addon">Vessel</span>

                <input type="text" class="form-control input-lg" name="nuevoVessel" value="To be acceptable by seller and/or buyer, and terminal" readonly>

              </div>

            </div>

            <!-- INSPECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-eye"></i></span>

                <span class="input-group-addon">Inspection</span>

                <textarea type="text" rows="3" style="resize: none;" class="form-control input-lg" name="nuevoInspection" readonly>SGS or ANY EQUIVALENT/ the seller pays the inspectors at the shipping tank. The buyer pays the inspectors at the receiving tank</textarea>

              </div>

            </div>

            <!-- INSURANCE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-lock"></i></span>

                <span class="input-group-addon">Insurance</span>

                <input type="text" class="form-control input-lg" name="nuevoInsurance" value="By seller choice" readonly>

              </div>

            </div>

            <!-- PAYMENT METHOD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-credit-card"></i></span>

                <span class="input-group-addon">Payment Method</span>

                <input type="text" class="form-control input-lg" value="PAYMENTS TERM : 100% MT103" readonly>

              </div>

            </div>

            <!-- Q & Q DETERMINATION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-coins"></i></span>

                <span class="input-group-addon">Q & Q Determination</span>

                <input type="text" class="form-control input-lg" name="nuevoQQ" value="As per quantity in VAC as per Bill of Lading" readonly>

              </div>

            </div>

            <!-- LAY TIME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-stopwatch"></i></span>

                <span class="input-group-addon">Lay time</span>

                <input type="text" class="form-control input-lg" value="TBA" readonly>

              </div>

            </div>

            <!-- DEMURRAGE RATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sack-xmark"></i></span>

                <span class="input-group-addon">Demurrage Rate</span>

                <input type="text" class="form-control input-lg" name="nuevoDemurrageRate" value="N/A" readonly>

              </div>

            </div>

            <!-- LAW -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-scale-balanced"></i></span>

                <span class="input-group-addon">Law</span>

                <input type="text" class="form-control input-lg" value="USA / English Law / London High Courts. No arbitration" readonly>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Crear ICPO</button>

        </div>

        <?php

        $crearICPO = new ControladorICPO();
        $crearICPO->ctrCrearICPO();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ICPO
======================================-->

<div id="modalEditarICPO" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar ICPO</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <select class="form-control input-lg" name="editarProveedor" id="editarProveedor" required>

                  <?php

                  $item = null;
                  $valor = null;

                  $usuario = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                  foreach ($usuario as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["proveedor"] . '</option>';
                  }

                  ?>

                </select>

                <input type="hidden" name="idICPO" id="idICPO" required>

                <input type="hidden" name="editarICPO" id="editarICPO" required>

              </div>

            </div>

            <!-- CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building"></i></span>

                <input type="text" class="form-control input-lg" value="TAMESIS PER COMPANY LLC" readonly>

                <input type="hidden" class="form-control input-lg" name="editarAuthCode" id="editarAuthCode" require>

              </div>

            </div>

            <!-- NUMERO DE REFERENCIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <span class="input-group-addon">TPC-MAJR-SCO-000</span>

                <select class="form-control input-lg" name="editarRefNumber" id="editarRefNumber" required>

                  <?php

                  $item = null;
                  $valor = null;

                  $numRef = ControladorSCO::ctrMostrarSCO($item, $valor);

                  foreach ($numRef as $key => $valueNumRef) {


                    echo '<option value="' . $valueNumRef["id"] . '">' . $valueNumRef["id"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- VIA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarVia" id="editarVia" placeholder="Via" required>

              </div>

            </div>

            <div class="form-group">

              <h3>IRREVOCABLE CORPORATE PURCHASE ORDER ICPO</h3>

            </div>

            <!-- TRADE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i></span>

                <input type="date" class="form-control input-lg" name="editarTradeDate" id="editarTradeDate" required>

              </div>

            </div>

            <!-- PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-gas-pump"></i></span>

                <select class="form-control input-lg" name="editarProducto" id="editarProducto" required>

                  <?php

                  $item = null;
                  $valor = null;

                  $Producto = ControladorProductos::ctrMostrarProductos($item, $valor);

                  foreach ($Producto as $key => $valueProducto) {


                    echo '<option value="' . $valueProducto["id"] . '">' . $valueProducto["commodity"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- SHIPPING TERMS FOR SALE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-handshake"></i></span>

                <span class="input-group-addon">Free on Board (FOB) Tank to Tank </span>

                <select class="form-control input-lg" name="editarPort" id="editarPort" required>

                  <?php

                  $item = null;
                  $valor = null;

                  $Port = ControladorPort::ctrMostrarPort($item, $valor);

                  foreach ($Port as $key => $Port) {


                    echo '<option value="' . $Port["id"] . '">' . $Port["port"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ORIGEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-location-dot"></i></span>

                <select class="form-control input-lg" name="editarOrigen" id="editarOrigen" required>

                  <option value="">Selecionar Origen del Producto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $Origen = ControladorProductOrigin::ctrMostrarProductOrigin($item, $valor);

                  foreach ($Origen as $key => $Origen) {


                    echo '<option value="' . $Origen["id"] . '">' . $Origen["origin"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- TRIAL QUANTITY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-boxes-packing"></i></span>

                <input type="text" class="form-control input-lg" name="editarTrialQuantity" id="editarTrialQuantity" placeholder="Trial Quantity / Cantidad de prueba" required>

                <select class="form-control input-sm" name="editarUM" id="editarUM" required>

                  <?php

                  $item = null;
                  $valor = null;

                  $UM = ControladorUM::ctrMostrarUM($item, $valor);

                  foreach ($UM as $key => $UM) {


                    echo '<option value="' . $UM["id"] . '">' . $UM["unidad"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- CONTRACT QUANTITY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-contract"></i></span>

                <select class="form-control input-lg" name="editarContractQuantity" id="editarContractQuantity" required>

                  <option value="SPOT">SPOT</option>

                  <option value="12 Months">12 Months</option>

                </select>

              </div>

            </div>

            <!-- DURACIÓN DEL CONTRATO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>

                <span class="input-group-addon">Duration Contract</span>

                <input type="text" class="form-control input-lg" name="editarDurationContract" value="TBA" readonly>

              </div>

            </div>

            <!-- VESSEL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ship"></i></span>

                <span class="input-group-addon">Vessel</span>

                <input type="text" class="form-control input-lg" name="editarVessel" value="To be acceptable by seller and/or buyer, and terminal" readonly>

              </div>

            </div>

            <!-- INSPECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-eye"></i></span>

                <span class="input-group-addon">Inspection</span>

                <textarea type="text" rows="3" style="resize: none;" class="form-control input-lg" name="editarInspection" readonly>SGS or ANY EQUIVALENT/ the seller pays the inspectors at the shipping tank. The buyer pays the inspectors at the receiving tank</textarea>

              </div>

            </div>

            <!-- INSURANCE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-lock"></i></span>

                <span class="input-group-addon">Insurance</span>

                <input type="text" class="form-control input-lg" name="editarInsurance" value="By seller choice" readonly>

              </div>

            </div>

            <!-- PAYMENT METHOD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-credit-card"></i></span>

                <span class="input-group-addon">Payment Method</span>

                <input type="text" class="form-control input-lg" value="PAYMENTS TERM : 100% MT103" readonly>

              </div>

            </div>

            <!-- Q & Q DETERMINATION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-coins"></i></span>

                <span class="input-group-addon">Q & Q Determination</span>

                <input type="text" class="form-control input-lg" name="editarQQ" value="As per quantity in VAC as per Bill of Lading" readonly>

              </div>

            </div>

            <!-- LAY TIME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-stopwatch"></i></span>

                <span class="input-group-addon">Lay time</span>

                <input type="text" class="form-control input-lg" value="TBA" readonly>

              </div>

            </div>

            <!-- DEMURRAGE RATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sack-xmark"></i></span>

                <span class="input-group-addon">Demurrage Rate</span>

                <input type="text" class="form-control input-lg" name="editarDemurrageRate" value="N/A" readonly>

              </div>

            </div>

            <!-- LAW -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-scale-balanced"></i></span>

                <span class="input-group-addon">Law</span>

                <input type="text" class="form-control input-lg" value="USA / English Law / London High Courts. No arbitration" readonly>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
PIE DEL MODAL
======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

        <?php

        $editarICPO = new ControladorICPO();
        $editarICPO->ctrEditarICPO();

        ?>

      </form>

    </div>

  </div>

</div>
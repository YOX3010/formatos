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

        <a href="index.php?ruta=icpo&idSCO=<?php echo $_GET['idSCO']; ?>&idCliente=<?php echo $_GET['idCliente']; ?>">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $ICPO = ControladorICPO::ctrMostrarICPO($item, $valor);

            foreach ($ICPO as $key => $value) {

              if ($value["id_sco"] == $_GET["idSCO"]) {

                echo '
                
              <tr>

              <th colspan="1">Authentication code</th>

              <td colspan="2">' . $value["authentication_code"] . '</td>

              <td colspan="1" style="text-align:right;">

              <div class="btn-group">

                <button class="btn btn-danger btnImprimirICPO" idICPO="' . $value["id"] . '"><i class="fa fa-print"></i> Imprimir ICPO</button>';


                if ($_SESSION["perfil"] == "Administrador") {

                  echo '<button class="btn btn-warning btnEditarICPO" idICPO="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarICPO"><i class="fa fa-pencil"></i></button>';
                  //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                }

                echo '</div>

            </td>

            </tr>

            <tr>

              <th>Ref. Number / Número de Referencia:</th>

              <td>' . $value["ref_number"] . $value["id"] . '</td>

              <th>Date / Fecha</th>

              <td>' . $value["fecha"] . '</td>

            </tr>

            <tr>';

                $itemProveedor = "id";
                $valorProveedor = $value["id_proveedor"];

                $respuestaProveedor = ControladorProveedores::ctrMostrarProveedores($itemProveedor, $valorProveedor);

                echo '<th>To: / Para:</th>

              <th colspan="3">' . $respuestaProveedor["refineria"] . ' / ' . $respuestaProveedor["proveedor"] . '</th>

            </tr>

            <tr>

              <th style="text-align:center;" colspan="4">IRREVOCABLE CORPORATE PURCHASE ORDER ICPO / ORDEN DE COMPRA CORPORATIVA IRREVOCABLE OCCI.</th>

            </tr>

            <tr>

              <th colspan="1">Trade Date / Fecha de negociación</th>

              <td colspan="3">' . $value["trade_date"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Seller / Vendedor</th>

              <td colspan="3">' . $respuestaProveedor["proveedor"] . " / " . $respuestaProveedor["refineria"] . '</td>

            </tr>

            <tr>';

                $itemSCO = "id";
                $valorSCO = $value["id_sco"];

                $respuestaSCO = ControladorSCO::ctrMostrarSCO($itemSCO, $valorSCO);

                $itemProductos = "id";
                $valorProductos = $respuestaSCO["id_commodity"];

                $respuestaProductos = ControladorProductos::ctrMostrarProductos($itemProductos, $valorProductos);

                echo '<th colspan="1">Product Name / Nombre del Producto</th>

              <td colspan="3">' . $respuestaProductos["commodity"] . '</td>

            </tr>

            <tr>';

                $itemIncoterms = "id";
                $valorIncoterms = $respuestaSCO["id_incoterms"];

                $respuestaIncoterms = ControladorIncoterms::ctrMostrarIncoterms($itemIncoterms, $valorIncoterms);

                $itemPort = "id";
                $valorPort = $respuestaSCO["id_port"];

                $respuestaPort = ControladorPort::ctrMostrarPort($itemPort, $valorPort);

                echo  '<th colspan="1">Shipping Terms for Sale / Condiciones de envío para la venta</th>
              
              <td colspan="3">' . $respuestaIncoterms["incoterm"] . " " . $respuestaPort["port"] . '</td>

            </tr>

            <tr>';

                $itemProductOrigin = "id";
                $valorProductOrigin = $respuestaSCO["id_product_origin"];

                $respuestaProductOrigin = ControladorProductOrigin::ctrMostrarProductOrigin($itemProductOrigin, $valorProductOrigin);

                echo '<th colspan="1">Origin / Origen</th>

              <td colspan="3">' . $respuestaProductOrigin["origin"] . '</td>

            </tr>

            <tr>';

                $itemUM = "id";
                $valorUM = $respuestaSCO["id_um"];

                $respuestaUM = ControladorUM::ctrMostrarUM($itemUM, $valorUM);

                echo '<th colspan="1">Trial Quantity / Cantidad de Prueba</th>

              <td colspan="3">' . $respuestaSCO["quantity"] . " " . $respuestaUM["unidad"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Contract Quantity / Contrato de Cantidad</th>

              <td colspan="3">' . $respuestaSCO["contract_terms"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Duration Of Contract / Duración del Contrato</th>

              <td colspan="3">' . $value["duration_contract"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Target Price USD / Precio Objetivo USD</th>

              <td colspan="3">' . $respuestaProductos["price_provedor"] . " $ per " . $respuestaUM["unidad"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Shipment Terms / Coniciones de Envío</th>

              <td colspan="3">' . $respuestaIncoterms["incoterm"] . " PORT " . $respuestaPort["port"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Vessel / Buque</th>

              <td colspan="3">' . $value["vessel"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Inspection / Inspección</th>

              <td colspan="3">' . $value["inspection"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Insurance / Seguro</th>

              <td colspan="3">' . $value["insurance"] . '</td>

            </tr>

            <tr>

             <th colspan="1">Payment Method / Método de Pago</th>

             <td colspan="3">PAYMENTS TERM : 100% MT103</td>

            </tr>

            <tr>

              <th colspan="1">Q & Q Determination / Determinación C & C</th>

              <td colspan="3">' . $value["qq_determination"] . '</td>

            </tr>

            <tr>

             <th colspan="1">Lay Time / Tiempo de Puesta</th>

             <td colspan="3">TBA</td>

            </tr>

            <tr>

              <th colspan="1">Demurrage Rate / Tasa de Sobreestadía</th>

              <td colspan="3">' . $value["demurrage_rate"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Law / Ley</th>

              <td colspan="3">USA / English Law / London High Courts. No arbitration</td>

            </tr>';
              }
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

            <!-- ID SCO -->

            <div class="form-group">

              <div class="input-group">

                <?php

                $itemSCO = "id";
                $valorSCO = $_GET["idSCO"];

                $respuestaSCO = ControladorSCO::ctrMostrarSCO($itemSCO, $valorSCO);

                ?>

                <span class="input-group-addon"><i class="fa-solid fa-file-code"></i></span>

                <input type="hidden" class="form-control input-lg" name="nuevoSCO" value="<?php echo $_GET["idSCO"] ?>" require readonly>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaSCO['codigo'] . $respuestaSCO["id"]; ?>" readonly>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

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

            <!-- ID CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-code"></i></span>

                <?php

                $itemCliente = "id";
                $valorCliente = $_GET["idCliente"];

                $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                ?>

                <input type="hidden" class="form-control input-lg" name="nuevoCliente" value="<?php echo $_GET['idCliente']; ?>" require readonly>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaCliente["cosignee"]; ?>" readonly>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- CODIGO DE AUTENTICACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-code"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAuthCode" placeholder="Código de Autenticación" require>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- NUMERO DE REFERENCIA -->

            <div class="form-group" style="display: none;">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRefNumber" value="TCP-MAJR-ICPO-000" readonly required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- VIA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVia" placeholder="Via" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- TRADE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i></span>

                <input type="date" class="form-control input-lg" name="nuevoTradeDate" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- DURACIÓN DEL CONTRATO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDurationContract" placeholder="Duration Contract / Duración del Contrato" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- VESSEL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ship"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVessel" placeholder="Vessel / Buque" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- INSPECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-eye"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInspection" placeholder="Inpection / Inspección" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- INSURANCE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-lock"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInsurance" placeholder="Insurance / Seguro" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- Q & Q DETERMINATION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-coins"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoQQ" placeholder="Q & Q Determination / Determinación de C & C" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- DEMURRAGE RATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sack-xmark"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDemurrageRate" placeholder="Demurrage Rate / Tasa de Sobreestadía" required>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

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

            <!-- CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <?php

                $itemSCO = "id";
                $valorSCO = $_GET["idSCO"];

                $respuestaSCO = ControladorSCO::ctrMostrarSCO($itemSCO, $valorSCO);

                ?>

                <input type="hidden" class="form-control input-lg" id="editarSCO" name="editarSCO" require readonly>

                <input type="text" class="form-control input-lg" id="editarCodigo" value="<?php echo $respuestaSCO['codigo'] . $respuestaSCO["id"]; ?>" readonly>

                <input type="hidden" name="idICPO" id="idICPO" required>

                <input type="hidden" name="editarICPO" id="editarICPO" required>

              </div>

            </div>

            <!-- PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <select class="form-control input-lg" id="editarProveedor" name="editarProveedor" required>

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

              </div>

            </div>

            <!-- COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <?php

                $itemCliente = "id";
                $valorCliente = $_GET["idCliente"];

                $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                ?>

                <input type="hidden" class="form-control input-lg" id="editarCliente" name="editarCliente" require readonly>

                <input type="text" class="form-control input-lg" id="editarCliente" value="<?php echo $respuestaCliente["cosignee"] ?>" readonly>

              </div>

            </div>

            <!-- CODIGO DE AUTENTICACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-code"></i></span>

                <input type="text" class="form-control input-lg" name="editarAuthCode" id="editarAuthCode" placeholder="Código de Autenticación" require>

              </div>

            </div>

            <!-- NUMERO DE REFERENCIA -->

            <div class="form-group" style="display: none;">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="editarRefNumber" id="editarRefNumber" value="TCP-MAJR-ICPO-000" readonly required>

              </div>

            </div>

            <!-- VIA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarVia" id="editarVia" placeholder="Via" required>

              </div>

            </div>

            <!-- TRADE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i></span>

                <input type="date" class="form-control input-lg" name="editarTradeDate" id="editarTradeDate" required>

              </div>

            </div>

            <!-- DURACIÓN DEL CONTRATO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-clock"></i></span>

                <input type="text" class="form-control input-lg" name="editarDurationContract" id="editarDurationContract" placeholder="Duration Contract / Duración del Contrato" required>

              </div>

            </div>

            <!-- VESSEL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ship"></i></span>

                <input type="text" class="form-control input-lg" name="editarVessel" id="editarVessel" placeholder="Vessel / Buque" required>

              </div>

            </div>

            <!-- INSPECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-eye"></i></span>

                <input type="text" class="form-control input-lg" name="editarInspection" id="editarInspection" placeholder="Inpection / Inspección" required>

              </div>

            </div>

            <!-- INSURANCE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-lock"></i></span>

                <input type="text" class="form-control input-lg" name="editarInsurance" id="editarInsurance" placeholder="Insurance / Seguro" required>

              </div>

            </div>

            <!-- Q & Q DETERMINATION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-coins"></i></span>

                <input type="text" class="form-control input-lg" name="editarQQ" id="editarQQ" placeholder="Q & Q Determination / Determinación de C & C" required>

              </div>

            </div>

            <!-- DEMURRAGE RATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sack-xmark"></i></span>

                <input type="text" class="form-control input-lg" name="editarDemurrageRate" id="editarDemurrageRate" placeholder="Demurrage Rate / Tasa de Sobreestadía" required>

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

        $editarICPO = new ControladorICPO();
        $editarICPO->ctrEditarICPO();

        ?>

      </form>

    </div>

  </div>

</div>
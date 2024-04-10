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

        <a href="index.php?ruta=icpo&idSCO=<?php echo $_GET['idSCO']; ?>">

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

              <td colspan="4" style="text-align:right;">

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

              <th colspan="1">Authentication code</th>

              <td colspan="3">' . $value["authentication_code"] . '</td>


            </tr>

            <tr>

              <th>Ref. Number / Número de Referencia:</th>

              <td>' . $value["ref_number"] . '</td>

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

              <td colspan="3">' . $value["product_name"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Shipping Terms for Sale / Condiciones de envío para la venta</th>
              <td colspan="2">' . $value["shipping_terms_sale"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Origin / Origen</th>

              <td colspan="3">' . $value["origin"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Trial Quantity / Cantidad de Prueba</th>

              <td colspan="3">' . $value["trial_quantity"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Contract Quantity / Contrato de Cantidad</th>

              <td colspan="3">' . $value["contract_quantity"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Duration Of Contract / Duración del Contrato</th>

              <td colspan="3">' . $value["duration_contract"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Target Price USD / Precio Objetivo USD</th>

              <td colspan="3">' . $value["target_price_usd"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Shipment Terms / Coniciones de Envío</th>

              <td colspan="3">' . $value["shipment_terms"] . '</td>

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

             <td colspan="3">' . $value["payment_method"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Q & Q Determination / Determinación C & C</th>

              <td colspan="3">' . $value["qq_determination"] . '</td>

            </tr>

            <tr>

             <th colspan="1">Lay Time / Tiempo de Puesta</th>

             <td colspan="3">' . $value["lay_time"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Demurrage Rate / Tasa de Sobreestadía</th>

              <td colspan="3">' . $value["demurrage_rate"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Law / Ley</th>

              <td colspan="3">' . $value["law"] . '</td>

            </tr>

            <tr>

              <th colspan="1">Images / Imagenes</th>

              <td colspan="3">' . $value["id_images"] . '</td>

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

                <span class="input-group-addon"><i class="fa-solid fa-file-code"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSCO" value="<?php echo $_GET['idICPO']; ?>" require readonly>

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

            <!-- CODIGO DE AUTENTICACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-code"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAuthCode" placeholder="Código de Autenticación" require>

                <input type="hidden" name="nuevoICPO" id="nuevoICPO" required>

              </div>

            </div>

            <!-- NUMERO DE REFERENCIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRefNumber" placeholder="Número de Referencia" required>

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

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" require readonly>

                <input type="hidden" name="idICPO" id="idICPO" required>

                <input type="hidden" name="editarICPO" id="editarICPO" required>

              </div>

            </div>

            <!-- ID LOI -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-code"></i></span>

                <input type="number" class="form-control input-lg" id="editarLoi" name="editarLoi" require readonly>

              </div>

            </div>

            <!-- COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="number" min="0" max="99999999999" class="form-control input-lg" id="editarClientes" name="editarClientes" require readonly>

              </div>

            </div>

            <!-- VIA CLIENTE-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarViaCliente" name="editarViaCliente" required>

              </div>

            </div>

            <!-- VIA EMAIL CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="editarEmailViaCliente" name="editarEmailViaCliente" required>

              </div>

            </div>

            <!-- SIGNATORY -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" value="Signatory" readonly>

                <input type="hidden" id="editarICPO" id="editarICPO" required> 

              </div>

            </div> -->

            <!-- POSICIÓN CLIENTE -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" value="Position cliente" readonly>

              </div>

            </div> -->

            <!-- EMAIL CLIENTE -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" value="Email Cliente" readonly>

              </div>

            </div> -->

            <!-- NOMBRE USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>

                <select class="form-control input-lg" id="editarUsuario" name="editarUsuario" required>

                  <option value="">Selecionar Vendedor</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                  foreach ($usuario as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                  }

                  ?>

                </select>

                <!-- <input type="number" class="form-control input-lg" id="editarUsuario" placeholder="To / Para:" required> -->

              </div>

            </div>

            <!-- POSICIÓN USUARIO -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPosition2" placeholder="Position / Posición" required>

              </div>

            </div> -->

            <!-- EMAIL USUARIO -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="email" class="form-control input-lg" id="editarEmail2" placeholder="Email / Correo Electrónico:" required>

              </div>

            </div> -->

            <!-- VIA USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarViaTpc" name="editarViaTpc" required>

              </div>

            </div>

            <!-- VIA EMAIL USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="editarEmailViaTpc" name="editarEmailViaTpc" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</b></h5>

              </div>

            </div>

            <!-- VALIDEZ DE ICPO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i> Validez de ICPO:</span>

                <input type="date" class="form-control input-lg" id="editarValidityICPO" name="editarValidityICPO" required>

              </div>

            </div>

            <!-- MERCANCÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-gas-pump"></i></span>

                <select class="form-control input-lg" id="editarCommodity" name="editarCommodity" required>

                  <option value="">Selecionar Producto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $producto = ControladorCommodity::ctrMostrarCommodity($item, $valor);

                  foreach ($producto as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["commodity"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- CANTIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-boxes-packing"></i></span>

                <input type="number" class="form-control input-lg" id="editarQuantity" name="editarQuantity" required>

                <select class="form-control input-lg" id="editarUM" name="editarUM" required>

                  <option value="">Selecionar Unidad</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $unidad = ControladorUM::ctrMostrarUM($item, $valor);

                  foreach ($unidad as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["unidad"] . '</option>';
                  }

                  ?>

                </select>

                <!-- <select class="form-control input-lg" id="editarUM" name="editarUM" required>

                  <option value=""></option>

                  <?php

                  // $item = null;
                  // $valor = null;

                  // $um = ControladorUM::ctrMostrarUM($item, $valor);

                  // foreach ($um as $key => $value) {


                  //   echo '<option value="' . $value["id"] . '">' . $value["unidad"] . '</option>';
                  // }

                  ?>

                </select> -->

              </div>

            </div>

            <!-- PRECIO -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPrice" placeholder="Price / Precio" required>

              </div>

            </div> -->

            <!-- INCOTERMS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sheet-plastic"></i></span>

                <select class="form-control input-lg" id="editarIncoterms" name="editarIncoterms" required>

                  <option value="">Selecionar Procedimiento</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $incoterms = ControladorIncoterms::ctrMostrarIncoterms($item, $valor);

                  foreach ($incoterms as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["incoterm"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-anchor"></i></span>

                <select class="form-control input-lg" id="editarPort" name="editarPort" required>

                  <option value="">Selecionar Puerto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $puerto = ControladorPort::ctrMostrarPort($item, $valor);

                  foreach ($puerto as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["port"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ORIGEN DEL PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-globe"></i></span>

                <select class="form-control input-lg" id="editarProductOrigin" name="editarProductOrigin" required>

                  <option value="">Selecionar Origen del producto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $origin = ControladorProductOrigin::ctrMostrarProductOrigin($item, $valor);

                  foreach ($origin as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["origin"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- TÉRMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-contract"></i></span>

                <input type="text" class="form-control input-lg" id="editarContractTerms" name="editarContractTerms" required>

              </div>

            </div>

            <!-- COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hand-holding-dollar"></i></span>

                <input type="text" class="form-control input-lg" id="editarCommission" name="editarCommission" required>

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
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

    <h1> Administrar Formato 4</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Formato 4</li>

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

        <a href="index.php?ruta=formato-4&idFormato4=">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th colspan="4">Formato 4</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            //$item = "id";
            //$valor = $_GET['idFormato4Interna'];

            $item = null;
            $valor = null;

            $Formato4 = ControladorFormato4::ctrMostrarFormato4($item, $valor);

            foreach ($Formato4 as $key => $value) {

              //$Key = 0;

              echo ' <tr>

              <th rowspan="23">' . ($key + 1) . '</th>

              <th colspan="1">n° Serial</th>

              <td colspan="3">' . $value["code"] . '</td>

              <td style="text-align:center;" rowspan="23">

                      <div class="btn-group">

                        <button class="btn btn-info btnImprimirFormato4" idFormato4="' . $value["id"] . '"><i class="fa fa-print"></i></button>

                        <button class="btn btn-warning btnEditarFormato4" idFormato4="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarFormato4"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>

                    </td>

            </tr>

            <tr>

              <th>Ref. Number / Número de Referencia:</th>

              <td>' . $value["ref_number"] . '</td>

              <th>Date / Fecha</th>

              <td>' . $value["date_today"] . '</td>

            </tr>

            <tr>

              <th>To: / Para:</th>

              <td colspan="3">' . $value["to_client"] . '</td>

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

            </tr>

            <tr><td colspan="6" style="background-color:#e1e1e1"></td></tr>';
            }

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR FORMATO 4
======================================-->

<div id="modalEditarFormato4" class="modal fade" role="dialog">

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

            <!-- EDITAR n° Serial	-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCode" id="editarCode" required>

                <input type="hidden" name="id+Formato4" id="idFormato4" required>

                <input type="hidden" name="editarFormato4" id="editarFormato4" required>

              </div>

            </div>

            <!-- EDITAR Ref. Number / Número de Referencia:	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarRefNumber" id="editarRefNumber" required>

              </div>

            </div>

            <!-- EDITAR To: / Para:	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDateToday" id="editarDateToday" placeholder="Date / Fecha" required>

              </div>

            </div>

            <!-- EDITAR Trade Date / Fecha de negociación	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarToClient" id="editarToClient" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>IRREVOCABLE CORPORATE PURCHASE ORDER ICPO / ORDEN DE COMPRA CORPORATIVA IRREVOCABLE OCOI.</b></h5>

              </div>

            </div>

            <!-- EDITAR Trade Date / Fecha de negociación		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTradeDate" id="editarTradeDate" required>

              </div>

            </div>

            <!-- EDITAR Seller / Vendedor		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarSeller" id="editarSeller" required>

              </div>

            </div>

            <!-- EDITAR Product Name / Nombre del Producto		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarProductName" id="editarProductName" required>

              </div>

            </div>

            <!-- EDITAR Shipping Terms for Sale / Condiciones de envío para la venta		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarShippingTermsSale" id="editarShippingTermsSale" required>

              </div>

            </div>

            <!-- EDITAR Origin / Origen		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarOrigin" id="editarOrigin" required>

              </div>

            </div>

            <!-- EDITAR Trial Quantity / Cantidad de Prueba		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTrialQuantity" id="editarTrialQuantity" required>

              </div>

            </div>

            <!-- EDITAR Contract Quantity / Contrato de Cantidad		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarContractQuantity" id="editarContractQuantity" required>

              </div>

            </div>

            <!-- EDITAR Duration Of Contract / Duración del Contrato		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDurationContract" id="editarDurationContract" required>

              </div>

            </div>

            <!-- EDITAR Target Price USD / Precio Objetivo USD	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTargetPriceUsd" id="editarTargetPriceUsd" required>

              </div>

            </div>

            <!-- EDITAR Shipment Terms / Coniciones de Envío	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarShipmentTerms" id="editarShipmentTerms" required>

              </div>

            </div>

            <!-- EDITAR Vessel / Buque	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarVessel" id="editarVessel" required>

              </div>

            </div>

            <!-- EDITAR Inspection / Inspección	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarInspection" id="editarInspection" required>

              </div>

            </div>

            <!-- EDITAR Insurance / Seguro	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarInsurance" id="editarInsurance" required>

              </div>

            </div>

            <!-- EDITAR Payment Method / Método de Pago	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPaymentMethod" id="editarPaymentMethod" required>

              </div>

            </div>

            <!-- EDITAR Q & Q Determination / Determinación C & C	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarQQDetermination" id="editarQQDetermination" required>

              </div>

            </div>

            <!-- EDITAR Lay Time / Tiempo de Puesta	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarLayTime" id="editarLayTime" required>

              </div>

            </div>

            <!-- EDITAR Demurrage Rate / Tasa de Sobreestadía	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDemurrageRate" id="editarDemurrageRate" required>

              </div>

            </div>

            <!-- EDITAR Law / Ley	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarLaw" id="editarLaw" required>

              </div>

            </div>

            <!-- EDITAR Images / Imagenes	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarIdImages" id="editarIdImages" required>

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

        $editarFormato4 = new ControladorFormato4();
        $editarFormato4->ctrEditarFormato4();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR FORMATO 4
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

            <!-- AGREGAR n° Serial	-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCode" id="nuevoCode" placeholder="n° Serial" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Ref. Number / Número de Referencia:	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRefNumber" id="nuevoRefNumber" placeholder="Ref. Number / Número de Referencia:" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Trade Date / Fecha de negociación	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDateToday" id="nuevoDateToday" placeholder="Date / Fecha" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR To: / Para:	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoToClient" id="nuevoToClient" placeholder="To: / Para:" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>IRREVOCABLE CORPORATE PURCHASE ORDER ICPO / ORDEN DE COMPRA CORPORATIVA IRREVOCABLE OCOI.</b></h5>

              </div>

            </div>

            <!-- AGREGAR Trade Date / Fecha de negociación		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTradeDate" id="nuevoTradeDate" placeholder="Trade Date / Fecha de negociación" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Seller / Vendedor		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSeller" id="nuevoSeller" placeholder="Seller / Vendedor" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Product Name / Nombre del Producto		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProductName" id="nuevoProductName" placeholder="Product Name / Nombre del Producto" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Shipping Terms for Sale / Condiciones de envío para la venta		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoShippingTermsSale" id="nuevoShippingTermsSale" placeholder="Shipping Terms for Sale / Condiciones de envío para la venta" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Origin / Origen		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOrigin" id="nuevoOrigin" placeholder="Origin / Origen" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Trial Quantity / Cantidad de Prueba		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTrialQuantity" id="nuevoTrialQuantity" placeholder="Trial Quantity / Cantidad de Prueba" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Contract Quantity / Contrato de Cantidad		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContractQuantity" id="nuevoContractQuantity" placeholder="Contract Quantity / Contrato de Cantidad" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Duration Of Contract / Duración del Contrato		 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDurationContract" id="nuevoDurationContract" placeholder="Duration Of Contract / Duración del Contrato" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Target Price USD / Precio Objetivo USD	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTargetPriceUsd" id="nuevoTargetPriceUsd" placeholder="Target Price USD / Precio Objetivo USD" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Shipment Terms / Coniciones de Envío	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoShipmentTerms" id="nuevoShipmentTerms" placeholder="Shipment Terms / Coniciones de Envío" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Vessel / Buque	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVessel" id="nuevoVessel" placeholder="Vessel / Buque" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Inspection / Inspección	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInspection" id="nuevoInspection" placeholder="Inspection / Inspección" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Insurance / Seguro	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInsurance" id="nuevoInsurance" placeholder="Insurance / Seguro" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Payment Method / Método de Pago	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPaymentMethod" id="nuevoPaymentMethod" placeholder="Payment Method / Método de Pago" placeholder="Payment Method / Método de Pago" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Q & Q Determination / Determinación C & C	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoQQDetermination" id="nuevoQQDetermination" placeholder="Q & Q Determination / Determinación C & C" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Lay Time / Tiempo de Puesta	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLayTime" id="nuevoLayTime" placeholder="Lay Time / Tiempo de Puesta" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Demurrage Rate / Tasa de Sobreestadía	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDemurrageRate" id="nuevoDemurrageRate" placeholder="Demurrage Rate / Tasa de Sobreestadía" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Law / Ley	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLaw" id="nuevoLaw" placeholder="Law / Ley" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

              </div>

            </div>

            <!-- AGREGAR Images / Imagenes	 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIdImages" id="nuevoIdImages" placeholder="Images / Imagenes" required>

                <input type="hidden" name="nuevoFormato4" id="nuevoFormato4" required>

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

        $crearFormato4 = new ControladorFormato4();
        $crearFormato4->ctrCrearFormato4();

        ?>

      </form>

    </div>

  </div>

</div>
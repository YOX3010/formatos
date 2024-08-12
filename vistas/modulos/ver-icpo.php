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

        <h1>TPC-MAJR-000<?php echo $_GET["idICPO"]; ?></h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">TPC-MAJR-000<?php echo $_GET["idICPO"]; ?></li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <a href="icpo">

                    <button class="btn btn-success">

                        <i class="fa-regular fa-circle-left"></i>

                    </button>

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

                            if ($value["id"] == $_GET["idICPO"]) {

                                $fechaCodigo = str_replace(array("-", " ", ":"), "", $value["fecha"]);

                                echo '
                
                                <tr style="background-color:#e1e1e1;">

                                <th colspan="1">Authentication code:</th>

                                <td colspan="2">' . $fechaCodigo . "-" . $value["authentication_code"] . '</td>

                                <td colspan="1" style="text-align:center;">

                                <div class="btn-group">

                                    <button class="btn btn-danger btnImprimirICPO" idICPO="' . $value["id"] . '"><i class="fa fa-print"></i> Imprimir ICPO</button>';


                                if ($_SESSION["perfil"] == "Administrador") {

                                    //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                                }

                                echo '</div>

                                </td>

                                </tr>

                                <tr>

                                <th>Ref. Number / Número de Referencia:</th>

                                <td>TPC-MAJR-SCO-000' . $value["ref_number"] . '</td>

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

                                $itemProductos = "id";
                                $valorProductos = $value["id_producto"];

                                $respuestaProductos = ControladorProductos::ctrMostrarProductos($itemProductos, $valorProductos);

                                echo '<th colspan="1">Product Name / Nombre del Producto</th>

                                <td colspan="3">' . $respuestaProductos["commodity"] . '</td>

                                </tr>

                                <tr>';

                                $itemPort = "id";
                                $valorPort = $value["id_port"];

                                $respuestaPort = ControladorPort::ctrMostrarPort($itemPort, $valorPort);

                                echo  '<th colspan="1">Shipping Terms for Sale / Condiciones de envío para la venta</th>
              
                                <td colspan="3">Free On Board (FOB) Tank to Tank' . " " . $respuestaPort["port"] . '</td>

                                </tr>

                                <tr>';

                                $itemProductOrigin = "id";
                                $valorProductOrigin = $value["id_origen"];

                                $respuestaProductOrigin = ControladorProductOrigin::ctrMostrarProductOrigin($itemProductOrigin, $valorProductOrigin);

                                echo '<th colspan="1">Origin / Origen</th>

                                <td colspan="3">' . $respuestaProductOrigin["origin"] . '</td>

                                </tr>

                                <tr>';

                                $itemUM = "id";
                                $valorUM = $value["id_um"];

                                $respuestaUM = ControladorUM::ctrMostrarUM($itemUM, $valorUM);

                                echo '<th colspan="1">Trial Quantity / Cantidad de Prueba</th>

                                <td colspan="3">' . $value["trial_quantity"] . " " . $respuestaUM["unidad"] . '</td>

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

                                <td colspan="3">' . $respuestaProductos["price_provedor"] . " $ per " . $respuestaUM["unidad"] . '</td>

                                </tr>

                                <tr>

                                <th colspan="1">Shipment Terms / Coniciones de Envío</th>

                                <td colspan="3">' . $value["contract_quantity"] . " PORT " . $respuestaPort["port"] . '</td>

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

                                <td colspan="3">By seller choice</td>

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

                                </tr>
                                
                                <tr>
                                
                                <td colspan="4">
                                
                                    <br>
                                
                                </td>
                                
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
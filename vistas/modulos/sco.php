<?php

if ($_SESSION["perfil"] == "Especial") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

$itemCliente = "id";
$valorCliente = $_GET["idCliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

$itemLOI = "id";
$valorLOI = $_GET["idLoi"];

$respuestaLOI = ControladorLOI::ctrMostrarLOI($itemLOI, $valorLOI);

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>SCO's de <?php echo $respuestaLOI['codigo'] ?></h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">SCO</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSCO">

          Generar SCO

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Código</th>
              <th>Cosignatario</th>
              <th>Firmante</th>
              <th>Mercancía</th>
              <th>Cantidad</th>
              <th>Puerto</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $SCO = ControladorSCO::ctrMostrarSCO($item, $valor);

            foreach ($SCO as $key => $value) {

              if ($value["id_loi"] == $_GET["idLoi"] && $value["id_clientes"] == $_GET["idCliente"]) {

                echo '<tr>

                    <td>' . ($key + 1) . '</td>';

                $itemCliente = "id";
                $valorCliente = $value["id_clientes"];

                $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                $itemCommodity = "id";
                $valorCommodity = $value["id_commodity"];

                $respuestaCommodity = ControladorProductos::ctrMostrarProductos($itemCommodity, $valorCommodity);

                $itemUM = "id";
                $valorUM = $value["id_um"];

                $respuestaUM = ControladorUM::ctrMostrarUM($itemUM, $valorUM);

                $itemPort = "id";
                $valorPort = $value["id_port"];

                $respuestaPort = ControladorPort::ctrMostrarPort($itemPort, $valorPort);

                // FORMATEAR FECHA

                $fecha = $value['fecha'];

                $nuevaFecha = new DateTime($fecha);

                $fechaFormato = $nuevaFecha->format('d/m/Y');
                // $fechaFormato = $nuevaFecha->format('F d Y');

                echo '<td>' . $value["codigo"] . '</td>
                
                    <td>' . $respuestaCliente["cosignee"] . '</td>

                    <td>' . $respuestaCliente["signatory"] . '</td>

                    <td>' . $respuestaCommodity["commodity"] . '</td>
                    
                    <td>' . $value["quantity"] . ' ' . $respuestaUM['unidad'] . '</td>

                    <td>' . $respuestaPort["port"] . '</td>
                    
                    <td>' . $fechaFormato . '</td>

                    <td>

                      <div class="btn-group">
                      
                      <button class="btn btn-danger btnImprimirSCO" idSCO="' . $value["id"] . '"><i class="fa-solid fa-file-pdf"></i> Ver SCO</button>

                      <button class="btn btn-info btnImprimirCI" idSCO="' . $value["id"] . '"><i class="fa-solid fa-file-invoice-dollar"></i> Imprimir CI</button>';

                if ($_SESSION["perfil"] == "Administrador") {

                  echo '<button class="btn btn-warning btnEditarSCO" idSCO="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarSCO"><i class="fa fa-pencil"></i></button>';

                  //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                }

                echo '</div>  

                    </td>

                  </tr>';

                /* echo '
                
                  <tr style="background-color:#e1e1e1;">
            
                    <td>
                      
                      <b>Fecha: </b> ' . $value["fecha"] . '
                
                    </td>
                
                  
                    <td colspan="1">
                      
                      <b>COD: </b> ' . $value["codigo"] . '
                
                    </td>
                
                    <td colspan="3" style=" text-align:end;">

                    <div class="btn-group">

                    <button class="btn btn-danger btnImprimirSCO" idSCO="' . $value["id"] . '"><i class="fa-solid fa-file-pdf"></i> Ver SCO</button>

                    <button class="btn btn-info btnImprimirCI" idSCO="' . $value["id"] . '"><i class="fa-solid fa-file-invoice-dollar"></i> Imprimir CI</button>';

                        if ($_SESSION["perfil"] == "Administrador") {

                          echo '<button class="btn btn-warning btnEditarSCO" idSCO="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarSCO"><i class="fa fa-pencil"></i></button>';

                          //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                        }

                        echo '</div>
                      
                      </td>

                      </tr>
                        
                        <tr>';

                        $itemCliente = "id";
                        $valorCliente = $value["id_clientes"];

                        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                        echo '<th>To / Para:</th>
                      
                      <td>' . $respuestaCliente["cosignee"] . '</td>

                    <th>Mr. / Sr.:</th>

                    <td>' . $respuestaCliente["signatory"] . '</td>

                  </tr>

                  <tr>

                    <th>Position / Posición:</th>

                    <td>' . $respuestaCliente["position"] . '</td>

                    <th>Email / Correo Electrónico:</th>

                    <td>' . $respuestaCliente["email"] . '</td>

                  </tr>

                  <tr>

                    <th>Via:</th>

                    <td>' . $value["via_cliente"] . '</td>

                    <th>Email / Correo Electrónico:</th>

                    <td>' . $value["email_via_cliente"] . '</td>

                  </tr>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_usuario"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<tr>

                    <th>From / De:</th>

                    <td>TAMESIS PER COMPANY LLC</td>

                    <th>To / Para:</th>

                    <td>' . $respuestaUsuario["nombre"] . '</td>

                  </tr>

                  <tr>

                    <th>Position / Posición:</th>

                    <td>' . $respuestaUsuario["position"] . '</td>

                    <th>Email:</th>

                    <td>' . $respuestaUsuario["email"] . '</td>

                  </tr>

                  <tr>

                    <th>Via:</th>

                    <td>' . $value["via_tpc"] . '</td>

                    <th>Email:</th>

                    <td>' . $value["email_via_tpc"] . '</td>

                  </tr>

                  <tr>

                    <th style="text-align: center;" colspan="4">TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</th>

                  </tr>

                  <tr>

                    <th>Validity of SCO / Validez de SCO:</th>

                    <td>' . $value["validity_of_sco"] . '</td>';

                        $itemProductos = "id";
                        $valorProductos = $value["id_commodity"];

                        $respuestaProductos = ControladorProductos::ctrMostrarProductos($itemProductos, $valorProductos);

                        echo '<th>Commodity / Mercancía:</th>

                    <td>' . $respuestaProductos["commodity"] . '</td>

                  </tr>

                  <tr>';

                        $itemUM = "id";
                        $valorUM = $value["id_um"];

                        $respuestaUM = ControladorUM::ctrMostrarUM($itemUM, $valorUM);

                        echo '<th>Quantity / Cantidad:</th>
                        
                        <td>' . $value["quantity"] . $respuestaUM["unidad"] . '</td>

                    <th>Price / Precio:</th>

                    <td>' . $respuestaProductos["price_cliente"] . '</td>

                  </tr>

                  <tr>';

                        $itemIncoterms = "id";
                        $valorIncoterms = $value["id_incoterms"];

                        $respuestaIncoterms = ControladorIncoterms::ctrMostrarIncoterms($itemIncoterms, $valorIncoterms);

                        echo '<th>Incoterms / Incotérminos:</th>
                  
                        <td>' . $respuestaIncoterms["incoterm"] . '</td>';

                        $itemPort = "id";
                        $valorPort = $value["id_port"];

                        $respuestaPort = ControladorPort::ctrMostrarPort($itemPort, $valorPort);

                        echo '<th>Port / Puerto:</th>

                    <td>' . $respuestaPort["port"] . '</td>

                  </tr>';

                        $itemProductOrigin = "id";
                        $valorProductOrigin = $value["id_product_origin"];

                        $respuestaProductOrigin = ControladorProductOrigin::ctrMostrarProductOrigin($itemProductOrigin, $valorProductOrigin);

                  echo '<tr>

                    <th>Product Origin / Origen del Producto:</th>

                    <td>' . $respuestaProductOrigin["origin"] . '</td>

                    <th>Contract Term / Término del Contrato:</th>

                    <td>SPOT</td>

                  </tr>

                  <tr>

                    <th>Commission / Comisión:</th>

                    <td colspan="3">' . $value["commission"] . '</td>

                  </tr>

                  <tr>

                    <th>Observation / Observación:</th>

                    <td colspan="3">' . $value["observacion"] . '</td>

                  </tr>

                  <tr>

                    <td colspan="4"><br></td>

                  </tr>
          
                '; */
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
MODAL AGREGAR SCO
======================================-->

<div id="modalAgregarSCO" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Crear SCO</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- CODIGO -->

            <!-- <div class="form-group" style="display: none;">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Código" value="TCP-MAJR-SCO-000" require>

              </div>

            </div> -->

            <div class="form-group">

              <div class="input-group">

                <h5><b>DATOS DEL COMPRADOR:</b></h5>

              </div>

            </div>

            <!-- COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="hidden" class="form-control input-lg" name="nuevoClientes" value="<?php echo $_GET["idCliente"]; ?>" require>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaCliente["cosignee"]; ?>" readonly>

                <input type="hidden" class="form-control input-lg" name="nuevoLoi" value="<?php echo $_GET['idLoi']; ?>" readonly>

              </div>

            </div>

            <!-- VIA CLIENTE-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoViaCliente" placeholder="Via del comprador">

              </div>

            </div>

            <!-- VIA EMAIL CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmailViaCliente" placeholder="Email de Via del cliente">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>DATOS DEL VENDEDOR:</b></h5>

              </div>

            </div>

            <!-- NOMBRE USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>

                <input type="hidden" class="form-control input-lg" name="nuevoSCO" value="<?php echo $_SESSION['id'] ?>" required readonly>

                <input type="text" class="form-control input-lg" value="<?php echo $_SESSION['nombre'] ?>" required readonly>

              </div>

            </div>

            <!-- VIA USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoViaTpc" placeholder="Via del vendedor (Tamesis Per Company)">

              </div>

            </div>

            <!-- VIA EMAIL USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmailViaTpc" placeholder="Email de Via del vendedor (Tamesis Per Company)">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</b></h5>

              </div>

            </div>

            <!-- VALIDEZ DE SCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i> Validez de SCO:</span>

                <input type="date" class="form-control input-lg" name="nuevoValiditySco" placeholder="Validity of SCO / Validez de SCO">

              </div>

            </div>

            <!-- MERCANCÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-gas-pump"></i></span>

                <select class="form-control input-lg" id="nuevoCommodity" name="nuevoCommodity">

                  <option value="">Selecionar Producto</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $producto = ControladorProductos::ctrMostrarProductos($item, $valor);

                  foreach ($producto as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["commodity"] . '</option>';
                  }

                  ?>

                </select>

                <div class="input-group-btn" style="padding-left: 10px;">

                  <a href="productos">

                    <button class="btn btn-success " type="button">

                      <i class="fa-solid fa-plus"></i>

                    </button>

                  </a>

                </div>

              </div>

            </div>

            <!-- CANTIDAD -->

            <div class="form-group">

              <div class="input-group" style="display: flex; align-items:center;width:100%">

                <span class="input-group-addon input-lg" style="padding-right:40px;"><i class="fa-solid fa-boxes-packing"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoQuantity" style="max-width: 61%;" placeholder="Quantity / Cantidad">

                <!-- <div class="input-group-lg"> -->

                <select class="form-control input-lg" name="nuevoUM" style="max-width: 20%;">

                  <option value="">Unidad</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $um = ControladorUM::ctrMostrarUM($item, $valor);

                  foreach ($um as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["unidad"] . '</option>';
                  }

                  ?>

                </select>

                <!-- </div> -->

                <div class="input-group-btn" style="padding-left: 10px;">

                  <a href="um">

                    <button class="btn btn-success " type="button">

                      <i class="fa-solid fa-plus"></i>

                    </button>

                  </a>

                </div>

              </div>

            </div>

            <!-- INCOTERMS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sheet-plastic"></i></span>

                <select class="form-control input-lg" id="nuevoIncoterms" name="nuevoIncoterms">

                  <option value="">Selecionar Procedimiento</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $incoterm = ControladorIncoterms::ctrMostrarIncoterms($item, $valor);

                  foreach ($incoterm as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["incoterm"] . '</option>';
                  }

                  ?>

                </select>

                <div class="input-group-btn" style="padding-left: 10px;">

                  <a href="incoterms">

                    <button class="btn btn-success " type="button">

                      <i class="fa-solid fa-plus"></i>

                    </button>

                  </a>

                </div>

              </div>

            </div>

            <!-- PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-anchor"></i></span>

                <select class="form-control input-lg" id="nuevoPort" name="nuevoPort">

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

                <div class="input-group-btn" style="padding-left: 10px;">

                  <a href="port">

                    <button class="btn btn-success " type="button">

                      <i class="fa-solid fa-plus"></i>

                    </button>

                  </a>

                </div>

              </div>

            </div>

            <!-- ORIGEN DEL PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-globe"></i></span>

                <select class="form-control input-lg" id="nuevoProductOrigin" name="nuevoProductOrigin">

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

                <div class="input-group-btn" style="padding-left: 10px;">

                  <a href="product-origin">

                    <button class="btn btn-success " type="button">

                      <i class="fa-solid fa-plus"></i>

                    </button>

                  </a>

                </div>

              </div>

            </div>

            <!-- TÉRMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-contract"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContractTerms" placeholder="Contract Term / Término de Contrato" value="SPOT">

              </div>

            </div>

            <!-- COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hand-holding-dollar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommission" placeholder="Commission / Comisión">

              </div>

            </div>

            <!-- OBSERVACIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-circle-exclamation"></i></span>

                <textarea type="text" class="form-control input-lg" name="nuevoObservacion" placeholder="observation / observacion" rows="3" style="resize: none;"></textarea>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Crear SCO</button>

        </div>

        <?php

        $crearSCO = new ControladorSCO();
        $crearSCO->ctrCrearSCO();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR SCO
======================================-->

<div id="modalEditarSCO" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar SCO</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="hidden" name="editarClientes" value="<?php echo $_GET['idCliente'] ?>">

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaCliente["cosignee"] ?>" readonly>

              </div>

            </div>

            <!-- VIA CLIENTE-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarViaCliente" name="editarViaCliente" placeholder="Via del Comprador">

              </div>

            </div>

            <!-- VIA EMAIL CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="editarEmailViaCliente" name="editarEmailViaCliente" placeholder="Email de via del comprador">

              </div>

            </div>

            <!-- NOMBRE USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>

                <input type="hidden" name="editarSCO" id="editarUsuario">

                <input type="hidden" name="idSCO" id="idSCO">

                <input type="hidden" name="editarLoi" value="<?php echo $_GET['idLoi'] ?>">

                <input type="text" class="form-control input-lg" value="<?php echo $_SESSION['nombre'] ?>" readonly>

              </div>

            </div>

            <!-- VIA USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarViaTpc" name="editarViaTpc" placeholder="Via del Vendedor (Tamesis Per Company)">

              </div>

            </div>

            <!-- VIA EMAIL USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" id="editarEmailViaTpc" name="editarEmailViaTpc" placeholder="Email de Via del vendedor (Tamesis Per Company)">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</b></h5>

              </div>

            </div>

            <!-- VALIDEZ DE SCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-calendar-xmark"></i> Validez de SCO:</span>

                <input type="date" class="form-control input-lg" id="editarValiditySco" name="editarValiditySco" required>

              </div>

            </div>

            <!-- MERCANCÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-gas-pump"></i></span>

                <select class="form-control input-lg" id="editarCommodity" name="editarCommodity" required>

                  <option value="">Selecionar Producto</option>

                  <?php

                  foreach ($producto as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["commodity"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- CANTIDAD -->

            <div class="form-group">

              <div class="input-group" style="display: flex; align-items:center;width:100%">

                <span class="input-group-addon input-lg" style="padding-right:40px;"><i class="fa-solid fa-boxes-packing"></i></span>

                <input type="number" class="form-control input-lg" id="editarQuantity" name="editarQuantity" style="max-width: 61%;" placeholder="Cantidad" required>

                <select class="form-control input-lg" id="editarUM" name="editarUM" required>

                  <option value="">Selecionar Unidad</option>

                  <?php

                  foreach ($um as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["unidad"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

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

                <input type="text" class="form-control input-lg" id="editarContractTerms" name="editarContractTerms" placeholder="Ingresar Términos del contrato">

              </div>

            </div>

            <!-- COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hand-holding-dollar"></i></span>

                <input type="text" class="form-control input-lg" id="editarCommission" name="editarCommission" placeholder="Ingresar Comisión">

              </div>

            </div>

            <!-- OBSERVACIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-circle-exclamation"></i></span>

                <textarea type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion" rows="3" style="resize: none;" placeholder="Ingresar Observación"></textarea>

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

        $editSCO = new ControladorSCO();
        $editSCO->ctrEditarSCO();

        ?>

      </form>

    </div>

  </div>

</div>
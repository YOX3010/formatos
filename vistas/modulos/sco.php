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

    <h1>SCO </h1>

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

        <a href="index.php?ruta=sco&idSCO=<?php echo $_GET['idSCO']; ?>">

          <!-- <a href="index.php?ruta=sco&idSCO="> -->

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <!-- <thead>

            <tr>

              <th style="width:10px">#</th>
              <th colspan="4">Formatos</th>
              <th>Acciones</th>

            </tr>

          </thead> -->

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $SCO = ControladorSCO::ctrMostrarSCO($item, $valor);

            foreach ($SCO as $key => $value) {

              if ($value["id_loi"] == $_GET["idSCO"]) {

                echo '
                
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

            <button class="btn btn-info btnImprimirCI" idCI="' . $value["id"] . '"><i class="fa-solid fa-file-invoice-dollar"></i> Imprimir CI</button>';

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

                $itemCommodity = "id";
                $valorCommodity = $value["id_commodity"];

                $respuestaCommodity = ControladorCommodity::ctrMostrarCommodity($itemCommodity, $valorCommodity);

                echo '<th>Commodity / Mercancía:</th>

            <td>' . $respuestaCommodity["commodity"] . '</td>

          </tr>

          <tr>';

                $itemUM = "id";
                $valorUM = $value["id_um"];

                $respuestaUM = ControladorUM::ctrMostrarUM($itemUM, $valorUM);

                echo '<th>Quantity / Cantidad:</th>
                
                <td>' . $value["quantity"] . $respuestaUM["unidad"] . '</td>

            <th>Price / Precio:</th>

            <td>' . $respuestaCommodity["price_cliente"] . '</td>

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

            <td colspan="2">' . $value["commission"] . '</td>

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

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Código" require>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- ID LOI -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-code"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLoi" value="<?php echo $_GET['idSCO']; ?>" require readonly>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <!-- <input type="number" min="0" max="99999999999" class="form-control input-lg" name="nuevoClientes" placeholder="To / Para:" require> -->

                <?php

                // $item = null;
                // $valor = null;

                // $SCO = ControladorSCO::ctrMostrarSCO($item, $valor);

                // foreach ($SCO as $key => $value) {

                //   if ($value["id_loi"] == $_GET["idSCO"]) {

                // $itemCliente = "id";
                // $valorCliente = $value["id_clientes"];

                // $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                // if ($respuestaCliente["id"] == $value["id_clientes"]) {
                //   echo '<input type="number" min="0" max="99999999999" class="form-control input-lg" name="nuevoClientes" value"' . $respuestaCliente["id"] . '" require>';
                // }
                //   }
                // }

                ?>

                <input type="number" min="0" max="99999999999" class="form-control input-lg" name="nuevoClientes" value="<?php echo $value["id_loi"] ?>" require readonly>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- VIA CLIENTE-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoViaCliente" placeholder="Via del comprador" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- VIA EMAIL CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmailViaCliente" placeholder="Email de Via del cliente" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- SIGNATORY -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" value="Signatory" readonly>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required> 

              </div>

            </div> -->

            <!-- POSICIÓN CLIENTE -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" value="Position cliente" readonly>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div> -->

            <!-- EMAIL CLIENTE -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" value="Email Cliente" readonly>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div> -->

            <!-- NOMBRE USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>

                <select class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" required>

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

                <!-- <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="<?php //echo $_SESSION["perfil"]; 
                                                                                                        ?>" required readonly> -->

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- POSICIÓN USUARIO -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPosition2" placeholder="Position / Posición" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div> -->

            <!-- EMAIL USUARIO -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail2" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div> -->

            <!-- VIA USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoViaTpc" placeholder="Via del vendedor" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- VIA EMAIL USUARIO-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmailViaTpc" placeholder="Email de Via del vendedor" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

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

                <input type="date" class="form-control input-lg" name="nuevoValiditySco" placeholder="Validity of SCO / Validez de SCO" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- MERCANCÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-gas-pump"></i></span>

                <select class="form-control input-lg" id="nuevoCommodity" name="nuevoCommodity" required>

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

                <input type="number" class="form-control input-lg" name="nuevoQuantity" placeholder="Quantity / Cantidad" required>

                <select class="form-control input-lg" id="nuevoUM" name="nuevoUM" required>

                  <option value="">Seleccionar Unidad</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $um = ControladorUM::ctrMostrarUM($item, $valor);

                  foreach ($um as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["unidad"] . '</option>';
                  }

                  ?>

                </select>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- PRECIO -->

            <!-- <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPrice" placeholder="Price / Precio" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div> -->

            <!-- INCOTERMS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sheet-plastic"></i></span>

                <select class="form-control input-lg" id="nuevoIncoterms" name="nuevoIncoterms" required>

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

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-anchor"></i></span>

                <select class="form-control input-lg" id="nuevoPort" name="nuevoPort" required>

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

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- ORIGEN DEL PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-globe"></i></span>

                <select class="form-control input-lg" id="nuevoProductOrigin" name="nuevoProductOrigin" required>

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

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- TÉRMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-contract"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContractTerms" placeholder="Contract Term / Término de Contrato" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

              </div>

            </div>

            <!-- COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hand-holding-dollar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommission" placeholder="Commission / Comisión" required>

                <input type="hidden" name="nuevoSCO" id="nuevoSCO" required>

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

            <!-- CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" require readonly>

                <input type="hidden" name="idSCO" id="idSCO" required>

                <input type="hidden" name="editarSCO" id="editarSCO" required>

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

                <input type="hidden" id="editarSCO" id="editarSCO" required> 

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

        $editarSCO = new ControladorSCO();
        $editarSCO->ctrEditarSCO();

        ?>

      </form>

    </div>

  </div>

</div>
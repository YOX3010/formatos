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

    <h1> Administrar Formato 1 </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Formato 1</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFormato1">

          Agregar Elmento

        </button>

        <!-- <a href="index.php?ruta=formato-2&idFormato2=<?php //$_GET['idFormato2'];
                                                          ?>"> -->

        <a href="index.php?ruta=formato-1&idFormato1=">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th colspan="4">Formatos</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $Formato1 = ControladorFormato1::ctrMostrarFormato1($item, $valor);

            foreach ($Formato1 as $key => $value) {

              echo '<tr>

            <th rowspan="12">' . ($key + 1) . '</th>

            <th>To / Para:</th>

            <td>' . $value["to_1"] . '</td>

            <th>Mr. / Sr.:</th>

            <td>' . $value["mr_1"] . '</td>

            <td style="text-align:center;" rowspan="12">

              <div class="btn-group">

                <button class="btn btn-info btnImprimirFormato1" idFormato1="' . $value["id"] . '"><i class="fa fa-print"></i></button>

                <button class="btn btn-warning btnEditarFormato1" idFormato1="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarFormato1"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>

                </td>

          </tr>

          <tr>

            <th>Position / Posición:</th>

            <td>' . $value["position_1"] . '</td>

            <th>Email / Correo Electrónico:</th>

            <td>' . $value["email_1"] . '</td>

          </tr>

          <tr>

            <th>To / Para:</th>

            <td>' . $value["to_2"] . '</td>

            <th>Mr. / Sr.:</th>

            <td>' . $value["mr_2"] . '</td>

          </tr>

          <tr>

            <th>Position / Posición:</th>

            <td>' . $value["position_2"] . '</td>

            <th>Email / Correo Electrónico:</th>

            <td>' . $value["email_2"] . '</td>

          </tr>

          <tr>

            <th>Via:</th>

            <td>' . $value["via"] . '</td>

            <th>Email / Correo Electrónico:</th>

            <td>' . $value["email_3"] . '</td>

          </tr>

          <tr>

            <th>To / Para:</th>

            <td>' . $value["mr_3"] . '</td>

          </tr>

          <tr>

            <th style="text-align: center;" colspan="4">TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</th>

          </tr>

          <tr>

            <th>Validity of SCO / Validez de SCO</th>

            <td>' . $value["validity_sco"] . '</td>

            <th>Commodity / Mercancía</th>

            <td>' . $value["commodity"] . '</td>

          </tr>

          <tr>

            <th>Quantity / Cantidad</th>

            <td>' . $value["quantity"] . '</td>

            <th>Price / Precio</th>

            <td>' . $value["price"] . '</td>

          </tr>

          <tr>

            <th>Incoterms / Incotérminos</th>

            <td>' . $value["incoterms"] . '</td>

            <th>Port / Puerto</th>

            <td>' . $value["port"] . '</td>

          </tr>

          <tr>

            <th>Product Origin / Origen del Producto</th>

            <td>' . $value["product_origin"] . '</td>

            <th>Contract Term / Término del Contrato</th>

            <td>' . $value["contract_term"] . '</td>

          </tr>

          <tr>

            <th>Commission / Comisión</th>

            <td colspan="2">' . $value["commission"] . '</td>

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
MODAL AGREGAR FORMATO 1
======================================-->

<div id="modalAgregarFormato1" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Formato 1</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA ELEMENTO -->

            <!-- PARA 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTo1" placeholder="To / Para:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- SR. 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMr1" placeholder="Mr. / Sr.:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- POSICIÓN 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPosition1" placeholder="Position / Posición" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- EMAIL 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmail1" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- PARA 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTo2" placeholder="To / Para:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- SR. 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMr2" placeholder="Mr. / Sr.:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- POSICIÓN 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPosition2" placeholder="Position / Posición" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- EMAIL 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmail2" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoVia" placeholder="Via" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- Email 3 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmail3" placeholder="Email / Correo Electrónico:" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- MR 3 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoMr3" placeholder="Mr. / Sr." required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

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

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoValiditySco" placeholder="Validity of SCO / Validez de SCO" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- MERCANCÍA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommodity" placeholder="Commodity / Mercancía" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- CANTIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoQuantity" placeholder="Quantity / Cantidad" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPrice" placeholder="Price / Precio" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIncoterms" placeholder="Incoterms / Incotérminos" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPort" placeholder="Port / Puerto" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- ORIGEN DEL PRODUCTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProductOrigin" placeholder="Product origin/ Origen del Producto" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- TÉRMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoContractTerm" placeholder="Contract Term / Término de Contrato" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

              </div>

            </div>

            <!-- COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommission" placeholder="Commission / Comisión" required>

                <input type="hidden" name="nuevoFormato1" id="nuevoFormato1" required>

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

        $crearFormato1 = new ControladorFormato1();
        $crearFormato1->ctrCrearFormato1();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR FORMATO 1
======================================-->

<div id="modalEditarFormato1" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Formato 1</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR FORMATO 1 -->

            <!-- EDITAR PARA 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarTo1" id="editarTo1">

                <input type="hidden" name="idFormato1" id="idFormato1" required>

                <input type="hidden" name="editarFormato1" id="editarFormato1" required>

              </div>

            </div>

            <!-- EDITAR SR. 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarMr1" name="editarMr1" required>

              </div>

            </div>

            <!-- EDITAR POSICIÓN 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPosition1" name="editarPosition1" required>

              </div>

            </div>

            <!-- EDITAR EMAIL 1 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarEmail1" name="editarEmail1" required>

              </div>

            </div>

            <!-- EDITAR PARA 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarTo2" name="editarTo2" required>

              </div>

            </div>

            <!-- EDITAR SR. 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarMr2" name="editarMr2" required>

              </div>

            </div>

            <!-- EDITAR POSICIÓN 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPosition2" name="editarPosition2" required>

              </div>

            </div>

            <!-- EDITAR EMAIL 2 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarEmail2" name="editarEmail2" required>

              </div>

            </div>

            <!-- EDITAR VIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarVia" name="editarVia" required>

              </div>

            </div>

            <!-- EDITAR EMAIL 3 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarEmail3" name="editarEmail3" required>

              </div>

            </div>

            <!-- EDITAR SR. 3 -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarMr3" name="editarMr3" required>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>TRANSACTING TERMS / TÉRMINOS DE TRANSACCIÓN:</b></h5>

              </div>

            </div>

            <!-- EDITAR VALIDEZ SCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarValiditySco" name="editarValiditySco" required>

              </div>

            </div>

            <!-- EDITAR MERCANCIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarCommodity" name="editarCommodity" required>

              </div>

            </div>

            <!-- EDITAR CANTIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarQuantity" name="editarQuantity" required>

              </div>

            </div>

            <!-- EDITAR PRECIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPrice" name="editarPrice" required>

              </div>

            </div>

            <!-- EDITAR INCOTERMS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarIncoterms" name="editarIncoterms" required>

              </div>

            </div>

            <!-- EDITAR PUERTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarPort" name="editarPort" required>

              </div>

            </div>

            <!-- EDITAR ORIGEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarProductOrigin" name="editarProductOrigin" required>

              </div>

            </div>

            <!-- EDITAR TERMINO DEL CONTRATO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="editarContractTerm" name="editarContractTerm" required>

              </div>

            </div>

            <!-- EDITAR COMISIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

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

        $editarFormato1 = new ControladorFormato1();
        $editarFormato1->ctrEditarFormato1();

        ?>

      </form>

    </div>

  </div>

</div>
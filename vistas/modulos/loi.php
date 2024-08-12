<?php

if ($_SESSION["perfil"] == "Especial") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

$itemCliente = "id";
$valorCliente = $_GET["idProveedor"];

$respuestaProveedor = ControladorProveedores::ctrMostrarProveedores($itemCliente, $valorCliente);

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>Administrar LOI's de <?php echo $respuestaProveedor["refineria"] . ' / ' . $respuestaProveedor['proveedor'] ?></h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li><a href="proveedores">Proveedores</a></li>

      <li class="active">Administrar LOI's</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLOI">

          Agregar LOI

        </button>

        <a href="proveedores">

          <button class="btn btn-success"><i class="fa-regular fa-circle-left"></i></button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Código de LOI</th>
              <th>Cosignatario</th>
              <th>Descripción</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $loi = ControladorLOI::ctrMostrarLOI($item, $valor);

            foreach ($loi as $key => $value) {

              if ($value["id_proveedor"] == $_GET["idProveedor"]) {

                echo ' <tr>

                    <td>' . ($key + 1) . '</td>';

                $itemCliente = "id";
                $valorCliente = $value["id_clientes"];

                $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                echo '<td>' . $value["codigo"] . '</td>
                
                    <td>' . $respuestaCliente["cosignee"] . '</td>

                    <td>' . $value["descripcion"] . '</td>

                    <td>' . $value["fecha"] . '</td>

                    <td>

                      <div class="btn-group">
                      
                      <button class="btn btn-danger btnSCO" idLoi="' . $value["id"] . '" idCliente="' . $value["id_clientes"] . '"><i class="fa-regular fa-file-lines"></i> Crear SCO</button>
                      
                      <button class="btn btn-info btnJV" idLoi="' . $value["id"] . '" idCliente="' . $value["id_clientes"] . '"><i class="fa-solid fa-handshake"></i> Joint Venture</button>';

                if ($_SESSION["perfil"] == "Administrador") {

                  echo '<button class="btn btn-warning btnEditarLOI" idLOI="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarLOI"><i class="fa fa-pencil"></i></button>';

                  //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                }

                echo '</div>  

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

<!--=====================================
MODAL AGREGAR LOI
======================================-->

<div id="modalAgregarLOI" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar LOI</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ID PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="hidden" class="form-control" name="nuevoLOI" value="<?php echo $_GET['idProveedor']; ?>" readonly>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaProveedor["proveedor"] ?>" readonly>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaProveedor["refineria"] ?>" readonly>

              </div>

            </div>

            <!-- ID CLIENTES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <select class="form-control input-lg" name="nuevoCliente" required>

                  <option value="">Selecionar Cliente</option>

                  <?php

                  $itemCliente = null;
                  $valorCliente = null;

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  foreach ($respuestaCliente as $key => $valueCliente) {

                    echo '<option value="' . $valueCliente["id"] . '">' . $valueCliente["cosignee"] . ' - ' . $valueCliente["signatory"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA DESCRIPCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <textarea class="form-control input-lg" name="nuevoDescripcion" style="resize: none;" rows="6" placeholder="Ingresar Descripción"></textarea>

              </div>

            </div>

            <!-- ENTRADA LOI IMAGE -->

            <!-- <div class="form-group">

              <label for="nuevoLoiImage">Cargar LOI (PDF)</label>

              <input type="file" name="nuevoLoiImage" accept=".pdf" required>

              <input type="hidden" name="nuevoLOI" id="nuevoLOI" required>

            </div> -->

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar LOI</button>

        </div>

        <?php

        $crearLOI = new ControladorLOI();
        $crearLOI->ctrCrearLOI();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR LOI
======================================-->

<div id="modalEditarLOI" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar LOI</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" readonly>

              </div>

            </div>

            <!-- ID PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="hidden" class="form-control" name="editarLOI" id="editarLOI" value="<?php echo $_GET['idProveedor']; ?>" readonly>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaProveedor["proveedor"] ?>" readonly>

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <input type="text" class="form-control input-lg" value="<?php echo $respuestaProveedor["refineria"] ?>" readonly>

                <input type="hidden" name="idLOI" id="idLOI" required>

              </div>

            </div>

            <!-- ID CLIENTES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <select class="form-control input-lg" id="editarCliente" name="editarCliente" required>

                  <option value="">Selecionar Cliente</option>

                  <?php

                  foreach ($respuestaCliente as $key => $valueCliente) {

                    echo '<option value="' . $valueCliente["id"] . '">' . $valueCliente["cosignee"] . ' - ' . $valueCliente["signatory"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA DESCRIPCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <textarea class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" style="resize: none;" rows="6" placeholder="Ingresar Descripción"></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR LOI IMAGE -->

            <!-- <div class="form-group">

              <label for="nuevoLoiImage">Cargar LOI (PDF)</label>

              <input type="file" name="editarLoiImage" id="editarLoiImage" accept=".pdf" required>

            </div> -->

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

        $editarLOI = new ControladorLOI();
        $editarLOI->ctrEditarLOI();

        ?>

      </form>

    </div>

  </div>

</div>
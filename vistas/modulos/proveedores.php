<?php

if ($_SESSION["perfil"] != "Administrador") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Proveedores

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Proveedores</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">

          Agregar Proveedor

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre del Proveedor</th>
              <th>Refinería</th>
              <th>País de Origen</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

            foreach ($proveedores as $key => $value) {

              echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["proveedor"] . '</td>
                    
                    <td>' . $value["refineria"] . '</td>';

              $itemProductOrigin = "id";
              $valorProductOrigin = $value["id_origin"];

              $respuestaOrigin = ControladorProductOrigin::ctrMostrarProductOrigin($itemProductOrigin, $valorProductOrigin);

              echo '<td>' . $respuestaOrigin["origin"] . '</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="' . $value["id"] . '"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div> 

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
MODAL AGREGAR PROVEEDOR
======================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombreProveedor" placeholder="Ingresar Nombre del Proveedor" required>

                <input type="hidden" name="nuevoProveedor" id="nuevoProveedor" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL REFINERIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-oil-well"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoRefineria" placeholder="Ingresar Nombre de la Refinaría" required>

                <input type="hidden" name="nuevoProveedor" id="nuevoProveedor" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ORIGEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-earth-americas"></i></span>

                <select class="form-control input-lg" id="nuevoOrigin" name="nuevoOrigin" required>

                  <option value="">Selecionar Origen</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $origin = ControladorProductOrigin::ctrMostrarProductOrigin($item, $valor);

                  foreach ($origin as $key => $value) {


                    echo '<option value="' . $value["id"] . '">' . $value["origin"] . '</option>';
                  }

                  ?>

                </select>

                <input type="hidden" name="nuevoProveedor" id="nuevoProveedor" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Proveedor</button>

        </div>

      </form>

      <?php

      $crearProveedor = new ControladorProveedores();
      $crearProveedor->ctrCrearProveedor();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->

<div id="modalEditarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR EL PROVEEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombreProveedor" id="editarNombreProveedor" required>

                <input type="hidden" name="idProveedor" id="idProveedor" required>

                <input type="hidden" name="editarProveedor" id="editarProveedor" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR EL REFINERIA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarRefineria" id="editarRefineria" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR EL ORIGEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <select class="form-control input-lg" id="editarOrigin" name="editarOrigin" required>

                  <option value="">Selecionar Origen</option>

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

      $editarProveedor = new ControladorProveedores();
      $editarProveedor->ctrEditarProveedor();

      ?>

    </div>

  </div>

</div>

<?php

$eliminarProveedor = new ControladorProveedores();
$eliminarProveedor->ctrEliminarProveedor();

?>
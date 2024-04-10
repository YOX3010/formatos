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

    <h1>Administrar LOI's</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar LOI's</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLOI">

          Agregar LOI

        </button>

        <a href="index.php?ruta=loi&idCliente=<?php echo $_GET['idCliente']; ?>">

          <button class="btn btn-warning"> Actualizar </button>

        </a>

        <a href="clientes">

          <button class="btn btn-success"><i class="fa-regular fa-circle-left"></i></button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Cosignatario</th>
              <th>Código de LOI</th>
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

              if ($value["id_clientes"] == $_GET["idCliente"]) {

                echo ' <tr>

                    <td>' . ($key + 1) . '</td>';

                $itemCliente = "id";
                $valorCliente = $value["id_clientes"];

                $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                echo '<td>' . $respuestaCliente["cosignee"] . '</td>

                    <td>' . $value["codigo"] . '</td>

                    <td>' . $value["descripcion"] . '</td>

                    <td>' . $value["fecha"] . '</td>

                    <td>

                      <div class="btn-group">
                      
                      <button class="btn btn-info btnSCO" idLoi="' . $value["id"] . '"><i class="fa-regular fa-file-lines"></i> SCO</button>';

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

            <!-- ID CLIENTES -->

            <div class="form-group" style="display: none;">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <!-- <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar Codigo" required> -->

                <input type="hidden" class="form-control" name="nuevoCliente" value="<?php echo $_GET['idLOI']; ?>" readonly>

              </div>

            </div>

            <!-- ENTRADA CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo" required>

                <input type="hidden" name="nuevoLOI" id="nuevoLOI" required>

              </div>

            </div>

            <!-- ENTRADA DESCRIPCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingresar Descripción" required>

                <input type="hidden" name="nuevoLOI" id="nuevoLOI" required>

              </div>

            </div>

            <!-- ENTRADA LOI IMAGE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoLoiImage" placeholder="Cargar LOI" required>

                <input type="hidden" name="nuevoLOI" id="nuevoLOI" required>

              </div>

            </div>

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

            <!-- ID CLIENTES -->

            <div class="form-group" style="display: none;">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="hidden" class="form-control input-lg" name="editarCliente" id="editarCliente" value="<?php echo $_GET['idLOI']; ?>" required readonly>

                <input type="hidden" name="idLOI" id="idLOI" required>

                <input type="hidden" name="editarLOI" id="editarLOI" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR DESCRIPCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR LOI IMAGE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarLoiImage" id="editarLoiImage" required>

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

        $editarLOI = new ControladorLOI();
        $editarLOI->ctrEditarLOI();

        ?>

      </form>

    </div>

  </div>

</div>
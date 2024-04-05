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

    <h1>Administrar Origen del Producto</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Origen del Producto</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProductOrigin">

          Agregar Pais

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Pais</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $productorigin = ControladorProductOrigin::ctrMostrarProductOrigin($item, $valor);

            foreach ($productorigin as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["origin"] . '</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarProductOrigin" idProductOrigin="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarProductOrigin"><i class="fa fa-pencil"></i></button>
                        
                      </div>  

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
MODAL AGREGAR PRODUCT ORIGIN
======================================-->

<div id="modalAgregarProductOrigin" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Pais</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA ORIGIN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-globe"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProductOrigin" placeholder="Ingresar Pais" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Pais</button>

        </div>

        <?php

        $crearProductOrigin = new ControladorProductOrigin();
        $crearProductOrigin->ctrCrearProductOrigin();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCT ORIGIN
======================================-->

<div id="modalEditarProductOrigin" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Pais</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR ORIGIN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-globe"></i></span>

                <input type="text" class="form-control input-lg" name="editarProductOrigin" id="editarProductOrigin" required>

                <input type="hidden" name="idProductOrigin" id="idProductOrigin" required>

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

        $editarProductOrigin = new ControladorProductOrigin();
        $editarProductOrigin->ctrEditarProductOrigin();

        ?>

      </form>

    </div>

  </div>

</div>
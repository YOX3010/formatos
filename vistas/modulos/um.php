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

    <h1>Administrar Unidades</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Unidades</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUM">

          Agregar Unidad

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Unidad</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $um = ControladorUM::ctrMostrarUM($item, $valor);

            foreach ($um as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["unidad"] . '</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarUM" idUM="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUM"><i class="fa fa-pencil"></i></button>
                        
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
MODAL AGREGAR UM
======================================-->

<div id="modalAgregarUM" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Unidad</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA UM -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ruler-combined"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUnidad" placeholder="Ingresar Referencia de Unidad (gal, Tm, bl)" required>

                <input type="hidden" name="nuevoUM" id="nuevoUM" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Unidad</button>

        </div>

        <?php

        $crearUM = new ControladorUM();
        $crearUM->ctrCrearUM();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR UM
======================================-->

<div id="modalEditarUM" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Unidad</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR UM -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ruler-combined"></i></span>

                <input type="text" class="form-control input-lg" name="editarUnidad" id="editarUnidad" required>

                <input type="hidden" name="idUM" id="idUM" required>

                <input type="hidden" name="editarUM" id="editarUM" required>

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

        $editarUM = new ControladorUM();
        $editarUM->ctrEditarUM();

        ?>

      </form>

    </div>

  </div>

</div>
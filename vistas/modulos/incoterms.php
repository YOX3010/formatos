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

    <h1>Administrar Procedimientos</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Procedimientos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarIncoterms">

          Agregar Procedimiento

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre del procedimiento</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $incoterms = ControladorIncoterms::ctrMostrarIncoterms($item, $valor);

            foreach ($incoterms as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["incoterm"] . '</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarIncoterms" idIncoterms="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarIncoterms"><i class="fa fa-pencil"></i></button>
                        
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
MODAL AGREGAR Incoterms
======================================-->

<div id="modalAgregarIncoterms" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Procedimiento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA Incoterms -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sheet-plastic"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIncoterm" placeholder="Ingresar el nombre del Procedimiento" required>

                <input type="hidden" name="nuevoIncoterms" id="nuevoIncoterms" required>

              </div>

            </div>

            <!-- ENTRADA Procedimiento -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file-lines"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProcedimiento" placeholder="Cargar Procedimiento" required>

                <input type="hidden" name="nuevoIncoterms" id="nuevoIncoterms" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Procedimiento</button>

        </div>

        <?php

        $crearIncoterms = new ControladorIncoterms();
        $crearIncoterms->ctrCrearIncoterms();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Incoterms
======================================-->

<div id="modalEditarIncoterms" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Procedimiento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR Incoterms -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ruler-combined"></i></span>

                <input type="text" class="form-control input-lg" name="editarIncoterm" id="editarIncoterm" required>

                <input type="hidden" name="idIncoterms" id="idIncoterms" required>

                <input type="hidden" name="editarIncoterms" id="editarIncoterms" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR Incoterms -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-ruler-combined"></i></span>

                <input type="text" class="form-control input-lg" name="editarProcedimiento" id="editarProcedimiento" required>

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

        $editarIncoterms = new ControladorIncoterms();
        $editarIncoterms->ctrEditarIncoterms();

        ?>

      </form>

    </div>

  </div>

</div>
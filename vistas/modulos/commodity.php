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

    <h1>Administrar Productos</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Productos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCommodity">

          Agregar Producto

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Precio Venta</th>
              <th>Precio Compra</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $commodity = ControladorCommodity::ctrMostrarCommodity($item, $valor);

            foreach ($commodity as $key => $value) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["commodity"] . '</td>

                    <td>' . $value["price_cliente"] . '</td>

                    <td>' . $value["price_provedor"] . '</td>

                    <td>

                      <div class="btn-group">';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '<button class="btn btn-warning btnEditarCommodity" idCommodity="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCommodity"><i class="fa fa-pencil"></i></button>';

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR COMMODITY
======================================-->

<div id="modalAgregarCommodity" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA COMMODITY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCommodity" placeholder="Ingresar Nombre del Producto" required>

              </div>

            </div>

            <!-- ENTRADA PRECIO CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-money-bill-trend-up"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPriceCliente" placeholder="Ingresar Precio de Venta" required>

              </div>

            </div>

            <!-- ENTRADA PRECIO PROVEDOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-money-check-dollar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPriceProvedor" placeholder="Ingresar Precio de Compra" required>

              </div>

            </div>

            <!-- ENTRADA FICHA TECNICA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-file"></i></i></span>

                <input type="text" class="form-control input-lg" name="nuevoFichaTecnica" placeholder="Cargar Ficha Técnica" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Producto</button>

        </div>

        <?php

        $crearCommodity = new ControladorCommodity();
        $crearCommodity->ctrCrearCommodity();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR COMMODITY
======================================-->

<div id="modalEditarCommodity" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR COMMODITY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCommodity" id="editarCommodity" required>

                <input type="hidden" name="idCommodity" id="idCommodity" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR PRECIO CLIENTE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPriceCliente" id="editarPriceCliente" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR PRECIO VENTA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarPriceProvedor" id="editarPriceProvedor" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR FICHA TECNICA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarFichaTecnica" id="editarFichaTecnica" required>

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

        $editarCommodity = new ControladorCommodity();
        $editarCommodity->ctrEditarCommodity();

        ?>

      </form>

    </div>

  </div>

</div>
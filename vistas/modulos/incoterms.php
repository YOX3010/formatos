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

      Administrar procedimientos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar procedimientos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarIncoterm">

          Agregar procedimiento

        </button>

        <a href="inicio">

          <button class="btn btn-success">

            <i class="fa-regular fa-circle-left"></i>

          </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaIncoterms tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>

              <th>Procedimiento</th>

              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $incoterm = ControladorIncoterms::ctrMostrarIncoterms($item, $valor);

            foreach ($incoterm as $key => $value) {

              echo ' <tr>

        <td>' . ($key + 1) . '</td>

        <td>' . $value["incoterm"] . '</td>

        <td>

          <div class="btn-group">';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '<button class="btn btn-warning btnEditarIncoterm" idIncoterm="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarIncoterm"><i class="fa fa-pencil"></i></button>';

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

MODAL AGREGAR PROCEDIMIENTO

======================================-->

<div id="modalAgregarIncoterm" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar procedimiento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA INCOTERM -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sheet-plastic"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoIncoterms" placeholder="Ingresar el Procedimiento" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR IMAGENES DEL PROCEDIMIENTO</div>

              <input type="file" multiple class="nuevaImagen" name="nuevaImagen[]" id="nuevaImagen" accept="image/*">

              <p class="help-block">Peso máximo de la foto 2MB. Subir en formato de imagen PNG o JPG</p>

              <img src="vistas/img/procedimientos/default/empty-doc.png" class="img-thumbnail previsualizar" width="100px">

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

        $crearProducto = new ControladorIncoterms();
        $crearProducto->ctrCrearIncoterms();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR COMMODITY
======================================-->

<div id="modalEditarIncoterm" class="modal fade" role="dialog">

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

            <!-- ENTRADA PARA EDITAR INCOTERM -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-sheet-plastic"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombreIncoterm" id="editarNombreIncoterm" required>

                <input type="hidden" name="idIncoterm" id="idIncoterm" required>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR IMAGEN DEL PROCEDIMIENTO</div>

              <input type="file" name="editarImagen" id="imagenActual" accept="image/*">
              <!-- <input type="text" id="imagenActual"> -->

              <p class="help-block">Peso máximo de la foto 2MB. Subir en formato de imagen PNG o JPG</p>

              <img class="img-thumbnail previsualizar" width="100px">
              <!-- <img class="img-thumbnail" src="vistas/img/procedimientos/prueba/123.jpg" width="100px"> -->
              <!-- <img class="img-thumbnail previsualizar" id="imagenActual" width="100px"> -->

              <!-- <input type="hidden" name="imagenActual" id="imagenActual"> -->

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

        $editarProducto = new ControladorIncoterms();
        $editarProducto->ctrEditarIncoterms();

        ?>

      </form>

    </div>

  </div>

</div>
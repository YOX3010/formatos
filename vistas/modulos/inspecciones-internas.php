<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">    

    <h1> Administrar Inspecciones Internas </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Inspecciones Internas</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInspeccionInterna">        

          Agregar Elmento

        </button>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Elemento</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $inspeccionesinternas = ControladorInspeccionesInternas::ctrMostrarInspeccionesInternas($item, $valor);

          foreach ($inspeccionesinternas as $key => $value) {           

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["elemento"].'</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarInspeccionInterna" idInspeccionInterna="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarInspeccionInterna"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

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
MODAL AGREGAR INSPECCION INTERNA
======================================-->

<div id="modalAgregarInspeccionInterna" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Elemento Inspeccion Interna</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA ELEMENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoInspeccionInterna" placeholder="Ingresar Inspeccion Interna" required>

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

          $crearInspeccionInterna = new ControladorInspeccionesInternas();
          $crearInspeccionInterna -> ctrCrearInspeccionInterna();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR INSPECCION INTERNA
======================================-->

<div id="modalEditarInspeccionInterna" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Elemento Inspeccion Interna</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR ELEMENTO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarInspeccionInterna" id="editarInspeccionInterna" required>

                <input type="hidden"  name="idInspeccionInterna" id="idInspeccionInterna" required>

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

          $editarInspeccionInterna = new ControladorInspeccionesInternas();
          $editarInspeccionInterna -> ctrEditarInspeccionInterna();

        ?> 

      </form>

    </div>

  </div>

</div>






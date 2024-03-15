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

    <h1> Administrar Cargos de Empleados </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Cargos de Empleados</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCargo">        

          Agregar Cargo Empleado

        </button>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Cargo</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cargo = ControladorCargos::ctrMostrarCargos($item, $valor);

          foreach ($cargo as $key => $value) {           

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["cargo"].'</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarCargo" idCargo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCargo"><i class="fa fa-pencil"></i></button>';

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
MODAL AGREGAR CARGO
======================================-->

<div id="modalAgregarCargo" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Cargo Empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA CARGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCargo" placeholder="Ingresar Cargo Empleado" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cargo Empleado</button>

        </div>

        <?php

          $crearCargo = new ControladorCargos();
          $crearCargo -> ctrCrearCargo();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CARGP
======================================-->

<div id="modalEditarCargo" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Cargo Empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR CARGO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCargo" id="editarCargo" required>

                <input type="hidden"  name="idCargo" id="idCargo" required>

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

          $editarCargo = new ControladorCargos();
          $editarCargo -> ctrEditarCargo();

        ?> 

      </form>

    </div>

  </div>

</div>






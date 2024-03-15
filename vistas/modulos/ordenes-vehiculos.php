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

    <h1> Vehiculo </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Vehiculo</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrdenVehiculo">          

          Agregar Vehiculo a Orden

        </button>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr> 

           <th>Orden</th>
           <th>Vehiculo</th>
           <th>Placa</th>
           <th>Color</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>



        <?php        

          $item = null;
          $valor = null;

          $ordenes = ControladorOrdenesVehiculos::ctrMostrarOrdenesVehiculos($item, $valor);

          foreach ($ordenes as $key => $value) {
      

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["id_orden"].'</td>

                    <td>'.$value["id_vehiculo"].'</td>

                    <td>'.$value["placa"].'</td>

                    <td>'.$value["color"].'</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarOrdenVehiculo" idOrdenVehiculo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenVehiculo"><i class="fa fa-pencil"></i></button>';

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
MODAL AGREGAR ORDEN VEHICULO
======================================-->

<div id="modalAgregarOrdenVehiculo" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Vehiculo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA VEHICULO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoVehiculo" name="nuevoVehiculo" required>
                  
                  <option value="">Selecionar Vehiculo</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $vehiculo = ControladorVehiculos::ctrMostrarVehiculos($item, $valor);
                  
                  foreach ($vehiculo as $key => $value) {

                    $itemMarca = "id";
                    $valorMarca = $value["id_marca"];

                    $respuestaMarca = ControladorMarcas::ctrMostrarMarcas($itemMarca, $valorMarca);

                    $itemModelo = "id";
                    $valorModelo = $value["id_modelo"];

                    $respuestaModelo = ControladorModelos::ctrMostrarModelos($itemModelo, $valorModelo);

                    $itemTipo = "id";
                    $valorTipo = $value["id_tipo"];

                    $respuestaTipo = ControladorTipos::ctrMostrarTipos($itemTipo, $valorTipo);         

                                    
                    echo '<option value="'.$value["id"].'">'.$respuestaMarca["marca"].' '.$respuestaModelo["modelo"].' '.$respuestaTipo["tipo"].'</option>';

                  }                  

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA MODELO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoModelo" name="nuevoModelo" required>
                  
                  <option value="">Selecionar Modelo del Vehiculo</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $modelo = ControladorModelos::ctrMostrarModelos($item, $valor);
                  
                  foreach ($modelo as $key => $value) {         

                                    
                    echo '<option value="'.$value["id"].'">'.$value["modelo"].'</option>';

                  }                  

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA AÑO -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoYear" placeholder="Ingresar Año" data-inputmask="'alias': 'yyyy'" data-mask required>

              </div>

            </div>  

            <!-- ENTRADA TIPO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoTipo" name="nuevoTipo" required>
                  
                  <option value="">Selecionar Tipo del Vehiculo</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $tipo = ControladorTipos::ctrMostrarTipos($item, $valor);
                  
                  foreach ($tipo as $key => $value) {         

                                    
                    echo '<option value="'.$value["id"].'">'.$value["tipo"].'</option>';

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

          <button type="submit" class="btn btn-primary">Guardar Vehiculo</button>

        </div>

        <?php

          $crearVehiculo = new ControladorVehiculos();
          $crearVehiculo -> ctrCrearVehiculo();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR VEHICULO
======================================-->

<div id="modalEditarVehiculo" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Vehiculo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR MARCA -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    
                    <select class="form-control" id="editarVehiculo" name="editarVehiculo" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $marca = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                       foreach ($marca as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["marca"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div>

            <!-- ENTRADA EDITAR MODELO -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    
                    <select class="form-control" id="editarModelo" name="editarModelo" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $modelo = ControladorModelos::ctrMostrarModelos($item, $valor);

                       foreach ($modelo as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["modelo"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div>

            <!-- ENTRADA EDITAR AÑO -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarYear" id="editarYear"  data-inputmask="'alias': 'yyyy'" data-mask required>

                <input type="hidden"  name="idVehiculo" id="idVehiculo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR TIPO -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    
                    <select class="form-control" id="editarTipo" name="editarTipo" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $tipo = ControladorTipos::ctrMostrarTipos($item, $valor);

                       foreach ($tipo as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["tipo"].'</option>';

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

      <?php

          $editarVehiculo = new ControladorVehiculos();
          $editarVehiculo -> ctrEditarVehiculo();

        ?> 

      </form>

    </div>

  </div>

</div>






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

    <h1> Administrar Inspeccion de batería</h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Inspeccion de batería</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrdenInspeccionBateria">

          Agregar Elmento

        </button>

        <a href="index.php?ruta=ordenes-inspecciones-baterias&idOrdenInspeccionBateria=<?php echo $_GET['idOrdenInspeccionBateria']; ?>">

         <button class="btn btn-warning"> Actualizar </button>

        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Orden</th>
              <th>Elemento</th>
              <th>Condicion</th>
              <th>Observacion</th>
              <th>Serial</th>
              <th>Marca</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $OrdenesInspeccionesBaterias = ControladorOrdenesInspeccionesBaterias::ctrMostrarOrdenesInspeccionesBaterias($item, $valor);

            foreach ($OrdenesInspeccionesBaterias as $key => $value) {

              if ($value["id_orden"] == $_GET['idOrdenInspeccionBateria']) {

              echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["id_orden"] . '</td>';

                      $itemElemento = "id";
                      $valorElemento = $value["id_elemento"];

                      $respuestaElemento = ControladorInspeccionesBaterias::ctrMostrarInspeccionesBaterias($itemElemento, $valorElemento); 

                    echo '<td>'.$respuestaElemento["elemento"].'</td>
                    
                    <td>' . $value["condicion"] . '</td>

                    <td>' . $value["observacion"] . '</td>

                    <td>' . $value["serial"] . '</td>';

                      $itemMarca = "id";
                      $valorMarca = $value["id_marca"];

                      $respuestaMarca = ControladorMarcasBaterias::ctrMostrarMarcasBaterias($itemMarca, $valorMarca); 

                    echo '<td>'.$respuestaMarca["marca"].'</td>
                    
                    <td>
                    
                      <div class="btn-group">                          

                        <button class="btn btn-info btnEditarOrdenInspeccion" idOrdenInspeccion="'.$value["id_orden"].'"><i class="fa-regular fa-circle-left"></i></button>

                        <button class="btn btn-warning btnEditarOrdenInspeccionBateria" idOrdenInspeccionBateria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarOrdenInspeccionBateria"><i class="fa fa-pencil"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }

              echo '</div>  

                    </td>

                  </tr>';

            }}

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR ORDEN DE INSPECCIÓN DE BATERÍA
======================================-->

<div id="modalAgregarOrdenInspeccionBateria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Orden de Inspección de Batería</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA  ELEMENTO -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>
                    
                    <select class="form-control" id="nuevoElemento" name="nuevoElemento">

                      <option value="">Seleccionar Elemento</option>                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorInspeccionesBaterias::ctrMostrarInspeccionesBaterias($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["elemento"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div> 

            <!-- ENTRADA PARA CONDICION -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span> 

                <select class="form-control input-lg" name="nuevoCondicion">

                  <option value=""> Seleccionar Condicion</option>

                  <option value="Excelente">Excelente</option>

                  <option value="Buen Estado">Buen Estado</option>

                  <option value="Regular">Regular</option>

                  <option value="Deteriorado">Deteriorado</option>

                  <option value="Deficiente">Deficiente</option>

                </select>

              </div>

            </div>      

            <!-- ENTRADA PARA  OBSERVACION-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoObservacion" placeholder="Ingresar Observacion">

                <input type="hidden" class="form-control" name="nuevoOrdenInspeccionBateria" value="<?php echo $_GET['idOrdenInspeccionBateria']; ?>" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SERIAL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSerial" placeholder="Ingresar Serial">

              </div>

            </div>

            <!-- ENTRADA PARA MARCA-->
            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>
                    
                    <select class="form-control" id="nuevoMarca" name="nuevoMarca">

                      <option value="">Seleccionar Marca Bateria</option>                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorMarcasBaterias::ctrMostrarMarcasBaterias($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["marca"].'</option>';

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

          <button type="submit" class="btn btn-primary">Guardar Orden</button>

        </div>

        <?php

        $crearOrdenInspeccionBateria = new ControladorOrdenesInspeccionesBaterias();
        $crearOrdenInspeccionBateria->ctrCrearOrdenInspeccionBateria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ORDEN DE INSPECCÍON DE BATERÍA
======================================-->

<div id="modalEditarOrdenInspeccionBateria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Orden de Inspeccion de Batería</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR ELEMENTO -->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>
                    
                    <select class="form-control" id="editarElemento" name="editarElemento">

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorInspeccionesBaterias::ctrMostrarInspeccionesBaterias($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["elemento"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div>      

            <!-- ENTRADA PARA EDITAR CONDICION -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span> 

                <select class="form-control input-lg" name="editarCondicion" id="editarCondicion">

                  <option value="" id="editarCondicion"></option>

                  <option value="Excelente">Excelente</option>

                  <option value="Buen Estado">Buen Estado</option>

                  <option value="Regular">Regular</option>

                  <option value="Deteriorado">Deteriorado</option>

                  <option value="Deficiente">Deficiente</option>

                </select>

              </div>

            </div>      

            <!-- ENTRADA PARA EDITAR OBSERVACION-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>

                <input type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion" placeholder="Ingresar Observacion">

                <input type="hidden" name="idOrdenInspeccionBateria" id="idOrdenInspeccionBateria">
 
                <input type="hidden"  name="editarOrdenInspeccionBateria" id="editarOrdenInspeccionBateria" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR SERIAL-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>

                <input type="text" class="form-control input-lg" name="editarSerial" id="editarSerial" placeholder="Ingresar Serial Bateria">

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR MARCA-->

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>
                    
                    <select class="form-control" id="editarMarca" name="editarMarca">   

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorMarcasBaterias::ctrMostrarMarcasBaterias($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["marca"].'</option>';

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

        $editarOrdenInspeccionBateria = new ControladorOrdenesInspeccionesBaterias();
        $editarOrdenInspeccionBateria->ctrEditarOrdenInspeccionBateria();

        ?>

      </form>

    </div>

  </div>

</div>
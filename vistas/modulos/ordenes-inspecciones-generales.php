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

    <h1> Administrar Inspeccion General </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Inspeccion General</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarElemento">

          Agregar Elemento

        </button>        

        <a href="index.php?ruta=ordenes-inspecciones-generales&idOrdenInspeccionGeneral=<?php echo $_GET['idOrdenInspeccionGeneral']; ?>">

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
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          //$item = "id";
          //$valor = $_GET['idOrdenInspeccionInterna'];

          $item = null;
          $valor = null;

          $orden = ControladorOrdenesInspeccionesGenerales::ctrMostrarOrdenesInspeccionesGenerales($item, $valor);          

          foreach ($orden as $key => $value) { 

            if ($value["id_orden"] == $_GET['idOrdenInspeccionGeneral']) {
             
          //$Key = 0;          

            echo ' <tr>

                    <td>'.($key+1).'</td>
                      
                    <td>'.$value["id_orden"].'</td>';

                    if ($value["id_elemento"] > 0) {

                      $itemElemento = "id";
                      $valorElemento = $value["id_elemento"];

                      $respuestaElemento = ControladorInspeccionesGenerales::ctrMostrarInspeccionesGenerales($itemElemento, $valorElemento);

                    echo '<td>'.$respuestaElemento["elemento"].'</td>';

                    } else {

                    echo '<td>'.$value["id_elemento"].'</td>';

                    }                        

                    echo '<td>'.$value["condicion"].'</td>

                    <td>'.$value["observaciones"].'</td>

                    <td>

                      <div class="btn-group">

                      <button class="btn btn-info btnEditarOrdenInspeccion" idOrdenInspeccion="'.$value["id_orden"].'"><i class="fa-regular fa-circle-left"></i></button>                          

                       <button class="btn btn-warning btnEditarOrdenInspeccionGeneral" idOrdenInspeccionGeneral="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenInspeccionGeneral"><i class="fa fa-pencil"></i></button>';

                       //echo ' <a href="ordenes-vehiculos" class="btn btn-info" idOrden="'.$value["id"].'"><i class="fa-solid fa-car fa-sm"></i></a>';

                      //echo '<td>'.$value["id"].'</td>';

                       //echo '<button class="btn btn-info btnEditarOrdenVehiculo" idOrdenVehiculo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenVehiculo"><i class="fa-solid fa-car fa-sm"></i></button>';

                       //echo '<button class="btn btn-info btnEditarOrdenInspeccionInterna" idOrdenInspeccionInterna="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenInspeccionInterna"><i class="fa-solid fa-car fa-sm"></i></button>';

                       //echo '<a href="ordenes-inspecciones?nada='.$value["id"].'" class="btn btn-info btnEditarOrdenInspeccionInterna" idOrdenInspeccionInterna="'.$value["id"].'"><i class="fa-solid fa-arrows-to-eye"></i></a>';

                       //echo '<button class="btn btn-warning btnEditarOrdenInspeccion" idOrdenInspeccion="'.$value["id"].'"><i class="fa-solid fa-arrows-to-eye"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

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
MODAL EDITAR ORDEN INSPECCION GENERAL
======================================-->

<div id="modalEditarOrdenInspeccionGeneral" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Elmento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR ELEMENTO -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fas fa-user-shield"></i></span>
                    
                    <select class="form-control" id="editarElemento" name="editarElemento" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorInspeccionesGenerales::ctrMostrarInspeccionesGenerales($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["elemento"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div>            

            <!-- ENTRADA EDITAR CONDICION -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

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

            <!-- ENTRADA PARA EDITAR OBSERVACION -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarObservaciones" id="editarObservaciones" required>

               <input type="hidden"  name="idOrdenInspeccionGeneral" id="idOrdenInspeccionGeneral" required>
 
                <input type="hidden"  name="editarOrdenInspeccionGeneral" id="editarOrdenInspeccionGeneral" required>

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

          $editarOrdenInspeccionGeneral = new ControladorOrdenesInspeccionesGenerales();
          $editarOrdenInspeccionGeneral -> ctrEditarOrdenInspeccionGeneral();

        ?> 

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR ELEMENTO INSPECCION GENERAL
======================================-->

<div id="modalAgregarElemento" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Elemento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA AGREGAR ELEMENTO -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fas fa-user-shield"></i></span>
                    
                    <select class="form-control" id="nuevoElemento" name="nuevoElemento" required>

                      <option value="">Seleccionar Elemento</option>                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorInspeccionesGenerales::ctrMostrarInspeccionesGenerales($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["elemento"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div>            

            <!-- ENTRADA AGREGAR CONDICION -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

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

            <!-- ENTRADA PARA AGREGAR OBSERVACION -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar Observaciones" required>

                <input type="hidden" class="form-control" name="nuevoOrdenInspeccionGeneral" value="<?php echo $_GET['idOrdenInspeccionGeneral']; ?>" readonly>

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

          $crearOrdenInspeccionGeneral = new ControladorOrdenesInspeccionesGenerales();
          $crearOrdenInspeccionGeneral -> ctrCrearOrdenInspeccionGeneral();

        ?>

      </form>

    </div>

  </div>

</div>







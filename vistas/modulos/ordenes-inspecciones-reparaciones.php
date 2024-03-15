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

    <h1> Administrar Reparaciones </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Reparaciones</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarReparacion">

          Agregar Reparacion

        </button>        

        <a href="index.php?ruta=ordenes-inspecciones-reparaciones&idOrdenInspeccionReparacion=<?php echo $_GET['idOrdenInspeccionReparacion']; ?>">

         <button class="btn btn-warning"> Actualizar </button>

        </a>

        <a href="ordenes">

          <button class="btn btn-primary"><i class="fa-regular fa-circle-left"></i></button>

        </a>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Orden</th>
           <th>Reparacion</th>
           <th>Costo</th>
           <th>Precio</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          //$item = "id";
          //$valor = $_GET['idOrdenInspeccionInterna'];

          $item = null;
          $valor = null;

          $orden = ControladorOrdenesInspeccionesReparaciones::ctrMostrarOrdenesInspeccionesReparaciones($item, $valor);          

          foreach ($orden as $key => $value) { 

            if ($value["id_orden"] == $_GET['idOrdenInspeccionReparacion']) {
             
          //$Key = 0;          

            echo ' <tr>

                    <td>'.($key+1).'</td>
                      
                    <td>'.$value["id_orden"].'</td>

                    <td>'.$value["reparacion"].'</td>                  

                    <td>$ '.number_format($value["costo"],2).'</td>

                    <td>$ '.number_format($value["precio"],2).'</td>


                    <td>

                      <div class="btn-group">                                               

                       <button class="btn btn-warning btnEditarOrdenInspeccionReparacion" idOrdenInspeccionReparacion="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenInspeccionReparacion"><i class="fa fa-pencil"></i></button>';

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

                  //$item = $value["id_orden"];;
                  //$valor = null;

                  //$costos = ControladorOrdenesInspeccionesReparaciones::ctrSumaTotalCostos($item, $valor);

                  //echo '<input type="text"  value="$'.number_format($costos["costo"],2).'" readonly>';

          }}

        ?>

        </tbody>

       </table> 

       <?php 

          $item = $_GET['idOrdenInspeccionReparacion'];
          $valor = null;

          $costos = ControladorOrdenesInspeccionesReparaciones::ctrSumaTotalCostos($item, $valor);

          echo '<div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-regular fa-money-bill-1"></i></span> 

                <input type="text"  value="$'.number_format($costos["costo"],2).'" readonly>

              </div>

          </div>';

          $item = $_GET['idOrdenInspeccionReparacion'];
          $valor = null;

          $precios = ControladorOrdenesInspeccionesReparaciones::ctrSumaTotalPrecios($item, $valor);

          echo '<div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-solid fa-tags"></i></span> 

                <input type="text"  value="$'.number_format($precios["precio"],2).'" readonly>

              </div>

          </div>';

      ?>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR ORDEN INSPECCION REPARACION
======================================-->

<div id="modalEditarOrdenInspeccionReparacion" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Reparacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR REPARACION -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>
                    
                    <select class="form-control" id="editarReparacion" name="editarReparacion" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorInspeccionesReparaciones::ctrMostrarInspeccionesReparaciones($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["reparacion"].'">'.$value["reparacion"].'</option>';

                       }

                    ?>

                    </select>

                    <input type="hidden"  name="idOrdenInspeccionReparacion" id="idOrdenInspeccionReparacion" required>
 
                    <input type="hidden"  name="editarOrdenInspeccionReparacion" id="editarOrdenInspeccionReparacion" required> 
                  
                  </div>
                
                </div>

                <!-- ENTRADA PARA EDITAR COSTO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-regular fa-money-bill-1"></i></span> 

                <input type="float" class="form-control input-lg" id="editarCosto" name="editarCosto" step="any" min="0" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR PRECIO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-solid fa-tags"></i></span> 

                <input type="float" class="form-control input-lg" id="editarPrecio" name="editarPrecio" step="any" min="0" required>

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

          $editarOrdenInspeccionReparacion = new ControladorOrdenesInspeccionesReparaciones();
          $editarOrdenInspeccionReparacion -> ctrEditarOrdenInspeccionReparacion();

        ?> 

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR ELEMENTO INSPECCION REPARACION
======================================-->

<div id="modalAgregarReparacion" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Reparacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA AGREGAR REPARACION -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-pen-to-square"></i></span>
                    
                    <select class="form-control" id="nuevoReparacion" name="nuevoReparacion" required>

                      <option value="">Seleccionar Reparacion</option>                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $elemento = ControladorInspeccionesReparaciones::ctrMostrarInspeccionesReparaciones($item, $valor);

                       foreach ($elemento as $key => $value) {

                         echo '<option value="'.$value["reparacion"].'">'.$value["reparacion"].'</option>';

                       }

                    ?>

                    </select>

                    <input type="hidden" class="form-control" name="nuevoOrdenInspeccionReparacion" value="<?php echo $_GET['idOrdenInspeccionReparacion']; ?>" readonly> 
                  
                  </div>
                
                </div> 

                <!-- ENTRADA PARA AGREGAR COSTO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-regular fa-money-bill-1"></i></span> 

                <input type="float" class="form-control input-lg" name="nuevoCosto" step="any" min="0" placeholder="Ingresar el Costo">

              </div>

            </div>

            <!-- ENTRADA PARA AGREGAR PRECIO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa-solid fa-tags"></i></span> 

                <input type="float" class="form-control input-lg"  name="nuevoPrecio" step="any" min="0" placeholder="Ingresar Precio">

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

          $crearOrdenInspeccionReparacion = new ControladorOrdenesInspeccionesReparaciones();
          $crearOrdenInspeccionReparacion -> ctrCrearOrdenInspeccionReparacion();

        ?>

      </form>

    </div>

  </div>

</div>







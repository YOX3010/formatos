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

    <h1> Administrar Ordenes de Servicio </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Ordenes de Servicio</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrden">          

          Agregar Orden de Servicio

        </button>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Empleado</th>
           <th>Cliente</th>
           <th>Ingreso</th>
           <th>Salida</th>
           <th>Tecnico</th>
           <th>Status</th>
           <th>Observaciones</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $ordenes = ControladorOrdenes::ctrMostrarOrdenes($item, $valor);

          foreach ($ordenes as $key => $value) {           

            echo ' <tr>

                    <td>'.($key+1).'</td>';

                      $itemUsuario = "id";
                      $valorUsuario = $value["id_usuario"];

                      $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                      $itemCliente = "id";
                      $valorCliente = $value["id_cliente"];

                      $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                    echo '<td>'.$respuestaCliente["nombre"].'</td>
                      
                    <td>'.$value["fecha_ingreso"].'</td>

                    <td>'.$value["fecha_salida"].'</td>';

                    if ($value["id_empleado"] < 1) {

                      echo '<td>'.$value["id_empleado"].'</td>';
                    
                    } else {  

                      $itemEmpleado = "id";
                      $valorEmpleado = $value["id_empleado"];

                      $respuestaEmpleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);

                    echo '<td>'.$respuestaEmpleado["nombres"].'</td>';

                    }

                    echo '<td>'.$value["status_reparacion"].'</td>

                    <td>'.$value["observaciones"].'</td>

                    <td>

                    

                      <div class="btn-group"> 

                       <button class="btn btn-info btnEditarOrdenVehiculo" idOrdenVehiculo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenVehiculo"><i class="fa-solid fa-car fa-sm"></i></button>';

                       //echo'<button class="btn btn-warning btnEditarOrden" idOrden="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrden"><i class="fa fa-pencil"></i></button>';

                       //echo '<button class="btn btn-info btnEditarOrdenInspeccionInterna" idOrdenInspeccionInterna="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenInspeccionInterna"><i class="fa-solid fa-car fa-sm"></i></button>';

                       //echo '<a href="ordenes-inspecciones?nada='.$value["id"].'" class="btn btn-info btnEditarOrdenInspeccionInterna" idOrdenInspeccionInterna="'.$value["id"].'"><i class="fa-solid fa-arrows-to-eye"></i></a>';

                       echo '<button class="btn btn-success btnEditarOrdenInspeccion" idOrdenInspeccion="'.$value["id"].'"><i class="fa-solid fa-arrows-to-eye"></i></button>

                       <button class="btn btn-warning btnOrdenAveria" idOrdenAveria="'.$value["id"].'"><i class="fa-solid fa-screwdriver-wrench"></i></button>

                       <button class="btn btn-secondary btnOrdenInspeccionReparacion" idOrdenInspeccionReparacion="'.$value["id"].'"><i class="fa-solid fa-toolbox"></i></button>';

                       echo '<button class="btn btn-danger btnOrdenCotizacion" idOrdenCotizacion="'.$value["id"].'"><i class="fa-solid fa-hand-holding-dollar"></i></button>';

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
MODAL AGREGAR ORDEN DE SERVICIO
======================================-->

<div id="modalAgregarOrden" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Orden de Servicio</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA USUARIO -->

             <div class="form-group">                

                  <div class="input-group">                    

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="nuevoOrden" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!-- ENTRADA PARA CLIENTE -->

                <div class="form-group">                  

                  <div class="input-group">                    

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control" id="nuevoCliente" name="nuevoCliente" required>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>

                  </div>                

                </div>

          <!-- ENTRADA PARA LA FECHA DE INGRESO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoFecha_ingreso" placeholder="Ingresar fecha de Ingreso" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA OBSERVACIONES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoObservaciones" placeholder="Ingresar Observaciones" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Orden de Servicio</button>

        </div>

        <?php

          $crearOrden = new ControladorOrdenes();
          $crearOrden -> ctrCrearOrden();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ORDEN DE SERVICIO
======================================-->

<div id="modalEditarOrden" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Orden de Servicio</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR EMPLEADO -->            

            <div class="form-group">                

                  <div class="input-group">                    

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="editarOrden" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                    <input type="text" id="idOrden" name="idOrden">

                  </div>

                </div> 

            <!-- ENTRADA EDITAR CLIENTE -->

            <div class="form-group">                  

                  <div class="input-group">                    

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control" id="editarCliente" name="editarCliente" readonly>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>

                  </div>                

                </div>

            <!-- ENTRADA EDITAR FECHA DE INGRESO -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarFecha_ingreso" id="editarFecha_ingreso"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA EDITAR FECHA DE SALIDA -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarFecha_salida" id="editarFecha_salida"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>  

            <!-- ENTRADA PARA EDITAR TECNICO -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fas fa-user-shield"></i></span>
                    
                    <select class="form-control" id="editarEmpleado" name="editarEmpleado" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $empleado = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                       foreach ($empleado as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombres"].'-'.$value["apellidos"].'</option>';

                       }

                    ?>

                    </select> 
                  
                  </div>
                
                </div>

            <!-- ENTRADA PARA EDITAR STATUS DE REPARACION -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarStatus_reparacion" id="editarStatus_reparacion">                  

                  <option value="" id="editarStatus_reparacion"></option>

                  <option value="Ejecutandose">Ejecutandose</option>

                  <option value="Finalizada">Finalizada</option>

                </select>

              </div>

            </div>            

            <!-- ENTRADA PARA EDITAR OBSERVACIONES -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarObservaciones" id="editarObservaciones" required>

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

          $editarOrden = new ControladorOrdenes();
          $editarOrden -> ctrEditarOrden();

        ?> 

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ORDEN VEHICULO
======================================-->

<div id="modalEditarOrdenVehiculo" class="modal fade" role="dialog">  

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

            <!-- ENTRADA PARA EDITAR VEHICULO -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa-solid fa-car"></i></span>
                    
                    <select class="form-control" id="editarVehiculo" name="editarVehiculo" required>  
                    
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

            <!-- ENTRADA EDITAR PLACA -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPlaca" id="editarPlaca" placeholder="Ingresar Placa Vehiculo" required>

                <input type="hidden"  name="idOrdenVehiculo" id="idOrdenVehiculo" required>

                <input type="hidden"  name="editarOrdenVehiculo" id="editarOrdenVehiculo" required>
                
              </div>               

            </div>  

            <!-- ENTRADA EDITAR COLOR -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarColor" id="editarColor" placeholder="Ingresar Color Vehiculo" required>          

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

          $editarOrdenVehiculo = new ControladorOrdenesVehiculos();
          $editarOrdenVehiculo -> ctrEditarOrdenVehiculo();

        ?> 

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ORDEN INSPECCION INTERNA
======================================-->

<div id="modalEditarOrdenInspeccionInterna" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Inspeccion Interna</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Orden</th>
           <th>elemento</th>
           <th>Condicion</th>
           <th>Observacion</th>

         </tr> 

        </thead>

        <tbody>

        <tr>

                    <td><input type="text"  name="idOrdenInspeccionInterna" id="idOrdenInspeccionInterna" required></td>
                      
                    <td><input type="text"  name="editarOrdenInspeccionInterna" id="editarOrdenInspeccionInterna" required></td>            

                  </tr>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarOrdenVehiculo = new ControladorOrdenesVehiculos();
          $editarOrdenVehiculo -> ctrEditarOrdenVehiculo();

        ?> 

      </form>

    </div>

  </div>

</div>








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

    <h1> Administrar Empleados </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Empleados</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">  

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpleado">          

          Agregar Empleado

        </button>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Cedula</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Cargo</th>
           <th>Celular</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

          foreach ($empleados as $key => $value) {           

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["cedula"].'</td>

                    <td>'.$value["nombres"].'</td>
                      
                    <td>'.$value["apellidos"].'</td>';

                      $itemCargo = "id";
                      $valorCargo = $value["id_cargo"];

                      $respuestaCargo = ControladorCargos::ctrMostrarCargos($itemCargo, $valorCargo);

                    echo '<td>'.$respuestaCargo["cargo"].'</td>

                    <td>'.$value["celular"].'</td>

                    <td>

                      <div class="btn-group">                          

                        <button class="btn btn-warning btnEditarEmpleado" idEmpleado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>';

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
MODAL AGREGAR EMPLEADO
======================================-->

<div id="modalAgregarEmpleado" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA CEDULA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEmpleado" placeholder="Ingresar Cedula" required>

              </div>

            </div>

            <!-- ENTRADA CONDICION -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoCondicion">                

                  <option value="">Selecionar Condicion de Contrato</option>

                  <option value="Fijo">Fijo</option>

                  <option value="Contratado">Contratado</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA NOMBRES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombres" placeholder="Ingresar Nombres" required>

              </div>

            </div>

            <!-- ENTRADA APELLIDOS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellidos" placeholder="Ingresar Apellidos" required>

              </div>

            </div>

            <!-- ENTRADA DIRECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoDireccion" placeholder="Ingresar Direccion" required>

              </div>

            </div>

            <!-- ENTRADA CELULAR -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar Celular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA CORREO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar Correo Electronico" required>

              </div>

            </div>

            <!-- ENTRADA CARGO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoCargo" name="nuevoCargo" required>
                  
                  <option value="">Selecionar Cargo Empleado</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $cargo = ControladorCargos::ctrMostrarCargos($item, $valor);
                  
                  foreach ($cargo as $key => $value) {         

                                    
                    echo '<option value="'.$value["id"].'">'.$value["cargo"].'</option>';

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

          <button type="submit" class="btn btn-primary">Guardar Empleado</button>

        </div>

        <?php

          $crearEmpleado = new ControladorEmpleados();
          $crearEmpleado -> ctrCrearEmpleado();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EMPLEADO
======================================-->

<div id="modalEditarEmpleado" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">           

            <!-- ENTRADA PARA EDITAR CEDULA -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarEmpleado" id="editarEmpleado" required>

                <input type="hidden"  name="idEmpleado" id="idEmpleado" required>

              </div>              

            </div>

            <!-- ENTRADA EDITAR STATUS -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarStatus" id="editarStatus">                  

                  <option value="" id="editarStatus"></option>

                  <option value="Activo">Activo</option>

                  <option value="Inactivo">Inactivo</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA EDITAR CONDICION -->

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarCondicion" id="editarCondicion">                  

                  <option value="" id="editarCondicion"></option>

                  <option value="Fijo">Fijo</option>

                  <option value="Contratado">Contratado</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR NOMBRES -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombres" id="editarNombres" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR APELLIDOS -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarApellidos" id="editarApellidos" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR DIRECCION -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR CELULAR -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCelular" id="editarCelular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR EL CORREO -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarCorreo" id="editarCorreo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR CARGO -->            

            <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    
                    <select class="form-control" id="editarCargo" name="editarCargo" required>
                    

                    <?php

                      $item = null;
                      $valor = null;                      

                      $cargo = ControladorCargos::ctrMostrarCargos($item, $valor);

                       foreach ($cargo as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["cargo"].'</option>';

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

          $editarEmpleado = new ControladorEmpleados();
          $editarEmpleado -> ctrEditarEmpleado();

        ?> 

      </form>

    </div>

  </div>

</div>






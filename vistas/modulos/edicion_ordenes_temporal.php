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

                    <input type="text" class="form-control" id="nuevoOrden" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

            <!-- ENTRADA EDITAR CLIENTE -->

            <div class="form-group">                  

                  <div class="input-group">                    

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>                   

                    <select class="form-control" id="editarCliente" name="editarCliente" required>

                    <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre"]; ?></option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>                    

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>                  

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
                    
                    <select class="form-control" id="editarTecnico" name="editarTecnico" required>
                    

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
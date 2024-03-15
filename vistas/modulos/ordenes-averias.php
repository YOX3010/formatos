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

    <h1> Administrar Averias </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Averias</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAveria">

          Agregar Averia

        </button>        

        <a href="index.php?ruta=ordenes-averias&idOrdenAveria=<?php echo $_GET['idOrdenAveria']; ?>">

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
           <th>Averia</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          //$item = "id";
          //$valor = $_GET['idOrdenInspeccionInterna'];

          $item = null;
          $valor = null;

          $orden = ControladorOrdenesAverias::ctrMostrarOrdenesAverias($item, $valor);          

          foreach ($orden as $key => $value) { 

            if ($value["id_orden"] == $_GET['idOrdenAveria']) {
             
          //$Key = 0;          

            echo ' <tr>

                    <td>'.($key+1).'</td>
                      
                    <td>'.$value["id_orden"].'</td>                                           

                    <td>'.$value["averia"].'</td>

                    <td>

                      <div class="btn-group">                         

                       <button class="btn btn-warning btnEditarOrdenAveria" idOrdenAveria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrdenAveria"><i class="fa fa-pencil"></i></button>';

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
MODAL EDITAR ORDEN AVERIA
======================================-->

<div id="modalEditarOrdenAveria" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Averia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EDITAR AVERIA -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarAveria" id="editarAveria" required>

               <input type="hidden"  name="idOrdenAveria" id="idOrdenAveria" required>
 
                <input type="hidden"  name="editarOrdenAveria" id="editarOrdenAveria" required>

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

          $editarOrdenAveria = new ControladorOrdenesAverias();
          $editarOrdenAveria -> ctrEditarOrdenAveria();

        ?> 

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR AVERIA
======================================-->

<div id="modalAgregarAveria" class="modal fade" role="dialog">  

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Averia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA AGREGAR AVERIA -->            

            <div class="form-group">              

              <div class="input-group">              

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoAveria" placeholder="Ingresar Averia" required>

                <input type="hidden" class="form-control" name="nuevoOrdenAveria" value="<?php echo $_GET['idOrdenAveria']; ?>" readonly>

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

          $crearOrdenAveria = new ControladorOrdenesAverias();
          $crearOrdenAveria -> ctrCrearOrdenAveria();

        ?>

      </form>

    </div>

  </div>

</div>







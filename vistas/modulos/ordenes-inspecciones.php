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

    <h1> Administrar Inspecciones </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Inspecciones Internas</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="ordenes">

          <button class="btn btn-primary btn-lg"><i class="fa-regular fa-circle-left"></i></button>

        </a>  

        <h4> Datos Orden Servicio </h4>

      </div>

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>     

         <tr> 

          <th>Cod</th> 
          <th>Empleado</th>
          <th>Cliente</th>
          <th>Ingreso</th>
          <th>Tecnico</th>
          <th>Inspecciones</th>
          

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = "id";
          $valor = $_GET['idOrdenInspeccion'];

          $orden = ControladorOrdenes::ctrMostrarOrdenes($item, $valor);

            $itemUsuario = "id";
            $valorUsuario = $orden["id_usuario"];

            $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

            $itemCliente = "id";
            $valorCliente = $orden["id_cliente"];

            $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);            

            $itemEmpleado = "id";
            $valorEmpleado = $orden["id_empleado"];

            $empleado = ControladorEmpleados::ctrMostrarEmpleados($itemEmpleado, $valorEmpleado);                    

        ?>

         <tr>

                  <td><?php echo $orden["id"]; ?></td>

                  <td><?php echo $respuestaUsuario["nombre"]; ?></td>

                  <td><?php echo $cliente["nombre"]; ?></td>

                  <td><?php echo $orden["fecha_ingreso"]; ?></td>

                  <?php 

                  if ($orden["id_empleado"] > 0) {

                    echo '<td>'.$empleado["nombres"].'</td>';

                  } else {
                    echo '<td>'.$orden["id_empleado"].'</td>';

                  }   

                  ?>

                  <td>

                    <div class="btn-group">

                      <button class="btn btn-info btn-lg btnOrdenInspeccionInterna" idOrdenInspeccionInterna="<?php echo $orden["id"]; ?>"><i class="fa-solid fa-eye fa-2xl"></i></button>

                      <button class="btn btn-success btn-lg btnOrdenInspeccionBateria" idOrdenInspeccionBateria="<?php echo $orden["id"]; ?>"><i class="fa-solid fa-car-battery fa-2xl"></i></button>

                      <button class="btn btn-warning btn-lg btnOrdenInspeccionNeumatico" idOrdenInspeccionNeumatico="<?php echo $orden["id"]; ?>"><i class="fa-solid fa-ring fa-2xl"></i></button>

                      <button class="btn btn-secondary btn-lg btnOrdenInspeccionGeneral" idOrdenInspeccionGeneral="<?php echo $orden["id"]; ?>"><i class="fa-solid fa-car-on fa-2xl"></i></button>

                      <button class="btn btn-danger btn-lg btnOrdenInspeccionAccesorio" idOrdenInspeccionAccesorio="<?php echo $orden["id"]; ?>"><i class="fa-solid fa-fire-extinguisher fa-2xl"></i></button>

                    </div>

                  </td>

        </tr>  

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>



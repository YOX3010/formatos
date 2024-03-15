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

    <h1> Administrar Cuentas por Cobrar </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Administrar Cuentas por Cobrar</li>    

    </ol>

  </section>

  <section class="content">

    <div class="box">      

      <div class="box-body">        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         

        <thead>        

         <tr>           

           <th style="width:10px">#</th>
           <th>Codigo</th>
           <th>Cliente</th>
           <th>Impuesto</th>
            <th>Neto</th> 
            <th>Total</th>
           <th>Fecha</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cuentascobrar = ControladorCuentasCobrar::ctrMostrarCuentasCobrar($item, $valor);

          foreach ($cuentascobrar as $key => $value) {           

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["codigo"].'</td>';

                      $itemCliente = "id";
                      $valorCliente = $value["id_cliente"];

                      $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                    echo '<td>'.$respuestaCliente["nombre"].'</td>

                    <td>$'.number_format($value["impuesto"],2).'</td>

                    <td>$'.number_format($value["neto"],2).'</td>

                    <td>$'.number_format($value["total"],2).'</td>

                    <td>'.$value["fecha"].'</td>                    

                  </tr>';

          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
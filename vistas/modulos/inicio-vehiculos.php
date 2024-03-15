<div class="content-wrapper">
  <section class="content-header">    

    <h1>     

      Tablero Vehiculos    

      <small>Panel de Control</small>    

    </h1>

    <ol class="breadcrumb">      

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      

      <li class="active">Tablero Vehiculos</li>    

    </ol>

  </section>

  <section class="content">

    <div class="row">      

    <?php

    if($_SESSION["perfil"] =="Administrador"){

      include "inicio/cajas-superiores-vehiculos.php";

    }

    ?>

    </div>
    
     </div>

  </section> 

</div>


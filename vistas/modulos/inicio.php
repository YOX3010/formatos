<style>
  .cajas {
    position: relative;
  }

  .texto-caja {
    position: relative;
    z-index: 50;
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
  }

  .icon {
    z-index: 1;
  }

  a.small-box {
    z-index: 100;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Tamesystem

      <small>Sistema de formatos Tamesis Per Company</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

    </ol>

  </section>

  <section class="content">

    <div class="box box-default">

      <div class="box-header">

        <h1>Bienvenid@ <?php echo $_SESSION["nombre"]  ?></h1>

      </div>

    </div>

    <div class="box box-warning">

      <div class="row">

        <div class="col-lg-12">

          <?php

          include "Inicio/opciones-iniciales.php";

          ?>

        </div>

      </div>

    </div>

    <?php
    if ($_SESSION["perfil"] == "Administrador") {


      echo '<div class="box box-primary">

        <div class="row">

          <div class="col-lg-12">';

      include "Inicio/modo-administrador.php";

      echo '</div>
        
        </div>
        
      </div>';
    }
    ?>

  </section>

</div>
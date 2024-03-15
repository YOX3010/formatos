<?php

$item = null;
$valor = null;
$orden = "id";

$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
$totalMarcas = count($marcas);

$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
$totalModelos = count($modelos);

$tipos = ControladorTipos::ctrMostrarTipos($item, $valor, $orden);
$totalTipos = count($tipos);

$vehiculos = ControladorVehiculos::ctrMostrarVehiculos($item, $valor, $orden);
$totalVehiculos = count($vehiculos);

?>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-aqua">

    <div class="inner"> 
      <h3><?php echo number_format($totalMarcas); ?></h3>
      <p>Marcas</p>   
    </div>

    <div class="icon"> 
      <i class="fa-solid fa-pen-to-square fa-sm"></i> 
    </div>    

      <a href="marcas-vehiculos" class="small-box-footer">
        Más info <i class="fa fa-arrow-circle-right"></i> 
      </a>

  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-green">  

    <div class="inner">
      <h3><?php echo number_format($totalModelos); ?></h3>
      <p>Modelos</p>
    </div>   

    <div class="icon">
      <i class="fa-solid fa-pen-to-square fa-sm"></i>
    </div>

      <a href="modelos-vehiculos" class="small-box-footer">
        Más info <i class="fa fa-arrow-circle-right"></i>
      </a>

  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-yellow">    

    <div class="inner"> 
      <h3><?php echo number_format($totalTipos); ?></h3>
      <p>Tipos</p>
    </div>

    <div class="icon">
      <i class="fa-solid fa-pen-to-square fa-sm"></i>
    </div>

      <a href="tipos-vehiculos" class="small-box-footer">
        Más info <i class="fa fa-arrow-circle-right"></i>
      </a>

  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red"> 

    <div class="inner">
      <h3><?php echo number_format($totalVehiculos); ?></h3>
      <p>Vehiculos</p>
    </div>

    <div class="icon">
      <i class="fa-solid fa-car fa-sm"></i>
    </div>

      <a href="vehiculos" class="small-box-footer">
        Más info <i class="fa fa-arrow-circle-right"></i>
      </a>

  </div>
</div>


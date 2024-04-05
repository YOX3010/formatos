<?php

/*=============================================
Mostrar errores
=============================================*/

ini_set('display_errors', 1);
ini_set("log_errors", 1);
//ini_set("error_log",  "/home/developerstdc/public_html/taller.developerstdcinternacional.com/errores/php_error_log");
ini_set("error_log",  "/Users/STDCInternacional/Sites/Taller/errores/php_error_log");

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/reparaciones.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/empleados.controlador.php";
require_once "controladores/cargos.controlador.php";
require_once "controladores/vehiculos.controlador.php";
require_once "controladores/marcas.controlador.php";
require_once "controladores/marcasbaterias.controlador.php";
require_once "controladores/modelos.controlador.php";
require_once "controladores/tipos.controlador.php";
require_once "controladores/ordenes.controlador.php";
require_once "controladores/ordenesvehiculos.controlador.php";
require_once "controladores/ordenesaverias.controlador.php";
require_once "controladores/ordenesinspeccionesinternas.controlador.php";
require_once "controladores/ordenesinspeccionesbaterias.controlador.php";
require_once "controladores/ordenesinspeccionesneumaticos.controlador.php";
require_once "controladores/ordenesinspeccionesgenerales.controlador.php";
require_once "controladores/ordenesinspeccionesaccesorios.controlador.php";
require_once "controladores/ordenesinspeccionesreparaciones.controlador.php";
require_once "controladores/inspeccionesinternas.controlador.php";
require_once "controladores/inspeccionesbaterias.controlador.php";
require_once "controladores/inspeccionesneumaticos.controlador.php";
require_once "controladores/inspeccionesgenerales.controlador.php";
require_once "controladores/inspeccionesaccesorios.controlador.php";
require_once "controladores/inspeccionesreparaciones.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/cotizaciones.controlador.php";
require_once "controladores/cuentascobrar.controlador.php";
require_once "controladores/commodity.controlador.php";
require_once "controladores/productorigin.controlador.php";
require_once "controladores/port.controlador.php";
require_once "controladores/loi.controlador.php";
require_once "controladores/sco.controlador.php";
require_once "controladores/um.controlador.php";
require_once "controladores/incoterms.controlador.php";
// require_once "controladores/formato1.controlador.php";
// require_once "controladores/formato2.controlador.php";
// require_once "controladores/formato3.controlador.php";
// require_once "controladores/formato4.controlador.php";
// require_once "controladores/formato.controlador.php";
// require_once "controladores/formatoimagenes.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/reparaciones.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/empleados.modelo.php";
require_once "modelos/cargos.modelo.php";
require_once "modelos/vehiculos.modelo.php";
require_once "modelos/marcas.modelo.php";
require_once "modelos/marcasbaterias.modelo.php";
require_once "modelos/modelos.modelo.php";
require_once "modelos/tipos.modelo.php";
require_once "modelos/ordenes.modelo.php";
require_once "modelos/ordenesvehiculos.modelo.php";
require_once "modelos/ordenesaverias.modelo.php";
require_once "modelos/ordenesinspeccionesinternas.modelo.php";
require_once "modelos/ordenesinspeccionesbaterias.modelo.php";
require_once "modelos/ordenesinspeccionesneumaticos.modelo.php";
require_once "modelos/ordenesinspeccionesgenerales.modelo.php";
require_once "modelos/ordenesinspeccionesaccesorios.modelo.php";
require_once "modelos/ordenesinspeccionesreparaciones.modelo.php";
require_once "modelos/inspeccionesinternas.modelo.php";
require_once "modelos/inspeccionesbaterias.modelo.php";
require_once "modelos/inspeccionesneumaticos.modelo.php";
require_once "modelos/inspeccionesgenerales.modelo.php";
require_once "modelos/inspeccionesaccesorios.modelo.php";
require_once "modelos/inspeccionesreparaciones.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/cotizaciones.modelo.php";
require_once "modelos/cuentascobrar.modelo.php";
require_once "modelos/commodity.modelo.php";
require_once "modelos/productorigin.modelo.php";
require_once "modelos/port.modelo.php";
require_once "modelos/loi.modelo.php";
require_once "modelos/sco.modelo.php";
require_once "modelos/um.modelo.php";
require_once "modelos/incoterms.modelo.php";
// require_once "modelos/formato1.modelo.php";
// require_once "modelos/formato2.modelo.php";
// require_once "modelos/formato3.modelo.php";
// require_once "modelos/formato4.modelo.php";
// require_once "modelos/formato.modelo.php";
// require_once "modelos/formatoimagenes.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();

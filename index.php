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
require_once "controladores/proveedores.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/productorigin.controlador.php";
require_once "controladores/port.controlador.php";
require_once "controladores/loi.controlador.php";
require_once "controladores/sco.controlador.php";
require_once "controladores/um.controlador.php";
require_once "controladores/incoterms.controlador.php";
require_once "controladores/icpo.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/productorigin.modelo.php";
require_once "modelos/port.modelo.php";
require_once "modelos/loi.modelo.php";
require_once "modelos/sco.modelo.php";
require_once "modelos/um.modelo.php";
require_once "modelos/incoterms.modelo.php";
require_once "modelos/icpo.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();

<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/expedientes.controlador.php";

require_once "modelos/expedientes.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
<?php 

# Controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/expedientes.controlador.php";
require_once "controladores/consultas.controlador.php";

# Modelos
require_once "modelos/expedientes.modelo.php";
require_once "modelos/consultas.modelo.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
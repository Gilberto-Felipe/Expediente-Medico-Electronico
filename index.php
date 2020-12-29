<?php 

# Controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/expedientes.controlador.php";
require_once "controladores/consultas.controlador.php";
require_once "controladores/estudios.controlador.php";

# Modelos
require_once "modelos/usuarios.modelo.php";
require_once "modelos/expedientes.modelo.php";
require_once "modelos/consultas.modelo.php";
require_once "modelos/estudios.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
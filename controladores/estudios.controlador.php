<?php 

class ControladorEstudios {

    /*=============================================
	Mostrar Consultas
	=============================================*/
    static public function ctrMostrarEstudios($item, $valor){

        $tabla = "estudio";

        $respuesta = ModeloEstudios::mdlMostrarEstudios($tabla, $item, $valor);

        return $respuesta;

    }

}
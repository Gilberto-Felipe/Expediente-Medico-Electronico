<?php 

class ControladorExpedientes {

    static public function ctrMostrarExpedientes($item, $valor){

        $tabla = "paciente";

        $respuesta = ModeloExpedientes::mdlMostrarExpedientes($tabla, $item, $valor);

        return $respuesta;

    }

}
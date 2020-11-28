<?php 

class ControladorConsultas {

    /*=============================================
	Mostrar Consultas
	=============================================*/
    static public function ctrMostrarConsultas($item, $valor){

        $tabla = "consulta";

        $respuesta = ModeloConsultas::mdlMostrarConsultas($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
	Crear Consulta
	=============================================*/
    static public function ctrCrearConsulta(){

	}

}
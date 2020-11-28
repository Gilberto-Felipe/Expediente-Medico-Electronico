<?php 

require_once "../controladores/consultas.controlador.php";
require_once "../modelos/consultas.modelo.php";

class TablaConsultas{

	/*=============================================
	MOSTAR LA TABLA DINÁMICAMENTE
	=============================================*/
	
	public function mostrarTablaConsultas(){

		$item = null;
		$valor = null;

		$consultas = ControladorConsultas::ctrMostrarConsultas($item, $valor);

		if (count($consultas) == 0) {
			
			echo '{ "data": [] }';

			return;

		}

		$datosJson = '{
		  	"data": [';

		  		for ($i=0; $i < count($consultas); $i++) {

                    // Formatear datos 
					$nombre_paciente = $consultas[$i]["nombre_paciente"];
					$nombre_doctor = $consultas[$i]["nombre_doctor"];

                    // Dibujar botones de acciones
					$agregarConsulta = "<a class='btn btn-success btnAgregarConsulta' data-toggle='tooltip' data-placement='top' title='Agregar consulta' idConsulta='".$consultas[$i]["id_consulta"]."' style='margin-right:1rem; border-radius:4px;'><i class='fa fa-stethoscope'></i></a>";								  			
		  			$datosJson .= '[
						"'.($i+1).'",
						"'.$consultas[$i]["id_paciente"].'",
						"'.$nombre_paciente.'",
						"'.$nombre_doctor.'",
						"'.$consultas[$i]["fecha_consulta"].'",
						"'.$agregarConsulta.'"
				    ],';

		  		}

		  	$datosJson = substr($datosJson, 0, -1);

			$datosJson .= ']
		}';

		echo $datosJson;

	}

}


/*=============================================
ACTIVAR TABLA EXPEDIENTES
=============================================*/
$activarExpedientes = new TablaConsultas();
$activarExpedientes -> mostrarTablaConsultas();
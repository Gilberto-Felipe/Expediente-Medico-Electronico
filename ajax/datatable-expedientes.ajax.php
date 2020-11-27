<?php 

require_once "../controladores/expedientes.controlador.php";
require_once "../modelos/expedientes.modelo.php";

class TablaExpedientes{

	/*=============================================
	MOSTAR LA TABLA DINÁMICA DE EXPEDIENTES
	=============================================*/
	
	public function mostrarTablaExpedientes(){

		$item = null;
		$valor = null;

		$expedientes = ControladorExpedientes::ctrMostrarExpedientes($item, $valor);

		if (count($expedientes) == 0) {
			
			echo '{ "data": [] }';

			return;

		}

		$datosJson = '{
		  	"data": [';

		  		for ($i=0; $i < count($expedientes); $i++) {

                    // Concatenar el nombre completo
                    $nombre_completo = $expedientes[$i]["nombre_paciente"]." ".$expedientes[$i]["apellido_p"]." ".$expedientes[$i]["apellido_m"];

                    // Dibujar botones de acciones
                    $ver = "<a class='btn btn-success btnVerExpediente' data-toggle='tooltip' data-placement='top' title='Ver expediente' idExpediente='".$expedientes[$i]["id_paciente"]."' style='margin-right:1rem; border-radius:4px;'><i class='fa fa-address-book'></i></a>";

                    $modificar = "<a class='btn btn-warning btnModificarExpediene' data-toggle='tooltip' data-placement='top' title='Modificar expediente' idExpediente='".$expedientes[$i]["id_paciente"]."' href='#' style='border-radius:4px;'><i class='fa fa-pencil'></i></a>";		
		  			
		  			$datosJson .= '[
						"'.($i+1).'",
						"'.$nombre_completo.'",
						"'.$expedientes[$i]["fecha_nacimiento"].'",
						"'.$ver.'",
						"'.$modificar.'"
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
$activarExpedientes = new TablaExpedientes();
$activarExpedientes -> mostrarTablaExpedientes();
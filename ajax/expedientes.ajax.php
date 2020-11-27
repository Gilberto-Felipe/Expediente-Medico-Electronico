<?php 

require_once "../controladores/expedientes.controlador.php";
require_once "../modelos/expedientes.modelo.php";

class AjaxExpedientes {
		
	/*=============================================
	RECUPERAR EXPEDIENTE
	=============================================*/

	public $idExpediente;

	public function ajaxRecupearExpediente(){

		$item = "id_paciente";
		$valor = $this->idExpediente;

		$respuesta = ControladorExpedientes::ctrMostrarExpedientes($item, $valor);

		echo json_encode($respuesta);

    }  

}

/*=============================================
INSTANCIAR RECUPERAR ID EXPEDIENTE
=============================================*/
if (isset($_POST['idExpediente'])) {
	
	$recuperarExpediente = new AjaxExpedientes();
	$recuperarExpediente -> idExpediente = $_POST['idExpediente'];
	$recuperarExpediente -> ajaxRecupearExpediente();

}
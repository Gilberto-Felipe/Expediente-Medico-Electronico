<?php 

class ControladorExpedientes {

    /*=============================================
	Mostrar Expedientes
	=============================================*/
    static public function ctrMostrarExpedientes($item, $valor){

        $tabla = "paciente";

        $respuesta = ModeloExpedientes::mdlMostrarExpedientes($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
	Crear Expediente
	=============================================*/
    static public function ctrCrearExpediente(){

        // VALIDAR QUE EXISTAN LAS LLAVES PRIMARIAS
        if (isset($_POST['nombre_paciente']) &&
            isset($_POST['apellidop_paciente']) &&
            isset($_POST['apellidom_paciente']) &&
            isset($_POST['fecha_nacimiento'])
        ){

            // VALIDAR ENTRADAS
            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['nombre_paciente']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['apellidop_paciente']) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['apellidom_paciente']) &&
				preg_match('/^[0-9\/]+$/', $_POST['fecha_nacimiento']) &&
				preg_match('/^[0-1]+$/', $_POST['sexo']) &&
				preg_match('/^[1-3]+$/', $_POST['edo_civil']) &&
                //filter_var($_POST['email_paciente'], FILTER_VALIDATE_EMAIL) 
                //preg_match('/^[0-9]+$/', $_POST['tel_paciente'])
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['direccion_paciente']) &&
                preg_match('/^[1-8]+$/', $_POST['tipo_sangre']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['alergias']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['antecedentes_med']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['antecedentes_fam']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['num_seguro']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['aseguradora']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['tipo_covertura']) &&
                preg_match('/^[0-9\/]+$/', $_POST['fecha_vencimiento']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['nombre_contacto']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['apellidop_contacto']) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['apellidom_contacto']) &&
                preg_match('/^[1-5]+$/', $_POST['parentesco'])
                //preg_match('/^[0-9]+$/', $_POST['tel_contacto'])
                //filter_var($_POST['email_contacto'], FILTER_VALIDATE_EMAIL)          
            ){

				// FORMATEAR FECHAS PARA ENVIAR A BD
                $fecha_nacimiento = $_POST['fecha_nacimiento'];
                $fecha_nacimiento = str_replace('/', '-', $fecha_nacimiento);
                $fecha_nacimiento = date('Y-m-d', strtotime($fecha_nacimiento));

                $fecha_vencimiento = $_POST['fecha_vencimiento'];
                $fecha_vencimiento = str_replace('/', '-', $fecha_vencimiento);
                $fecha_vencimiento = date('Y-m-d', strtotime($fecha_vencimiento));
                
				// VALIDAR SI HAY EMAILS
				if (isset($_POST['email_paciente']) || isset($_POST['email_contacto'])){
					$email_paciente = filter_var($_POST['email_paciente'], FILTER_VALIDATE_EMAIL);
					$email_contacto = filter_var($_POST['email_contacto'], FILTER_VALIDATE_EMAIL);
					//var_dump($email_paciente);
					//var_dump($email_contacto);
				}
				else {
					$email_paciente = "";
					$email_contacto = "";
				}
				
				// ENVIAR DATOS AL MODELO
                $tabla = 'paciente';
				
				$datos = array(
					'nombre_paciente' => $_POST['nombre_paciente'],
					'apellido_p' => $_POST['apellidop_paciente'],
					'apellido_m' => $_POST['apellidom_paciente'],
					'fecha_nacimiento' => $fecha_nacimiento,
					'sexo' => $_POST['sexo'],
					'estado_civil' => $_POST['edo_civil'],
					'email' => $email_paciente,
					'telefono' => $_POST['tel_paciente'],
					'tipo_sangre' => $_POST['tipo_sangre'],
					'alergias' => $_POST['alergias'],
					'antecedentes_medicos' => $_POST['antecedentes_med'],
					'antecedentes_familiares' => $_POST['antecedentes_fam'],
					'domicilio' => $_POST['direccion_paciente']
					//'segurom_si' => $_POST['email_paciente']			
				);



				// var_dump($datos);
				// COMPROBAR QUE SE HAYA HECHO EL REGISTRO
				$respuesta = ModeloExpedientes::mdlCrearExpediente($tabla, $datos);

				if ($respuesta == "ok") {

					// OBTENER EL ÚLTIMO ID DE PACIENTES
					$last_id = ModeloExpedientes::mdlUltimoID();
					// var_dump($last_id[0]);
					$last_id = implode($last_id[0]);
					$last_id = substr($last_id, -2);
					// echo $last_id;

					$tabla2 = 'seguro_medico';

					$datos2 = array(
						'paciente_id_paciente' => $last_id,
						'num_seguro' => $_POST['num_seguro'],
						'aseguradora' => $_POST['aseguradora'],
						'tipo_covertura' => $_POST['tipo_covertura'],
						'fecha_vencimiento' => $fecha_vencimiento
					);

					$respuesta2 = ModeloExpedientes::mdlRegistrarSeguro($tabla2, $datos2);
					//var_dump($respuesta2);

					$tabla3 = 'contacto';

					$datos3 = array(
						'paciente_id_paciente' => $last_id,
						'nombre_contacto' => $_POST['nombre_contacto'],
						'apellidop_contacto' => $_POST['apellidop_contacto'],
						'apellidom_contacto' => $_POST['apellidom_contacto'],
						'relacion_paciente' => $_POST['parentesco'],
						'telefono' => $_POST['tel_contacto'],
						'email_contacto' => $email_contacto
					);

					$respuesta3 = ModeloExpedientes::mdlRegistrarContacto($tabla3, $datos3);
					//var_dump($respuesta3);

					echo '<script>
						swal({
							type: "success",
							title: "¡El expediente se creó exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false						
					
						}).then((result)=>{
							if(result.value){
								window.location = "expedientes";
							}
						});
					</script>';

				}

			}

			/*else {

				echo '<script>
					swal({
						type: "error",
						title: "¡Asegrúrate de llenar todos los campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
				
					}).then((result)=>{
						if(result.value){
							window.location = "crear-expediente";
						}
					});
					</script>';

			}*/

		}
			
	}

}
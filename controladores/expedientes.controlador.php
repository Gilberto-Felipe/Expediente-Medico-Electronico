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

		// variables error 
		$nombrePacienteErr = $apellidoPpacienteErr = $apellidoMpacienteErr = $fechaNErr = $sexoErr = $edoCivilErr = $emailPacienteErr = $telPacienteErr = $direccionPErr = $tipoSangreErr = $aseguradoraErr = $fechaVencimientoErr = $nombreContactoErr = $apellidopContactoErr = $apellidomContactoErr = $parentescoErr = $telContactoErr = $emailContactoErr = "";

		// var post
		$nombrePaciente = $apellidoPpaciente = $apellidoMpaciente = $fechaNacimiento = $sexo = $edoCivil = $emailPaciente = $telPaciente = $direccionPaciente = $tipoSangre = $alergias = $antecedentesMed = $antecedentesFam = $numSeguro = $aseguradora = $tipoCovertura = $fechaVencimiento = $nombreContacto = $apellidopContacto = $apellidomContacto = $parentesco = $telContacto = $emailContacto = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			// Validar Datos generales
			
			if (empty($_POST["nombre_paciente"])) {
				$nombrePacienteErr = "Este campo es obligatorio";
			} else {
				$nombrePaciente = ControladorFunciones::ctrValidar($_POST['nombre_paciente']);
			  	// check if name only contains letters and whitespace
			  	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$nombrePaciente)) {
					$nombrePacienteErr = "Solo se permiten letras y números";
			  	}
			}

			if (empty($_POST["apellidop_paciente"])) {
				$apellidoPpacienteErr = "Este campo es obligatorio";
			} else {
				$apellidoPpaciente = ControladorFunciones::ctrValidar($_POST['apellidop_paciente']);
			  	// check if name only contains letters and whitespace
			  	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$apellidoPpaciente)) {
					$apellidoPpacienteErr = "Solo se permiten letras y números";
			  	}
			}

			if (empty($_POST["apellidom_paciente"])) {
				$apellidoMpacienteErr = "Este campo es obligatorio";
			} else {
				$apellidoMpaciente = ControladorFunciones::ctrValidar($_POST['apellidom_paciente']);
			  	// check if name only contains letters and whitespace
			  	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$apellidoMpaciente)) {
					$apellidoMpacienteErr = "Solo se permiten letras y números";
			  	}
			}

			if (empty($_POST["fecha_nacimiento"])) {
				$fechaNErr = "Este campo es obligatorio";
			} else {
				$fechaNacimiento = ControladorFunciones::ctrValidar($_POST['fecha_nacimiento']);
				// check a valid date
				if (!preg_match("/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/",$fechaNacimiento)) {
					$fechaNErr = "Solo se permite el formato dd/mm/yyyy";
			  	}
			}

			if (empty($_POST["sexo"])) {
				$sexoErr = "Este campo es obligatorio";
			} else {
				$sexo = ControladorFunciones::ctrValidar($_POST['sexo']);
				if (!preg_match("/^[0-1]$/",$sexo)) {
					$sexoErr = "Solo se admiten los valores 0 o 1";
				}
			}

			if (empty($_POST["edo_civil"])) {
				$edoCivilErr = "Este campo es obligatorio";
			} else {
				# /^[1-3]$/
				$edoCivil = ControladorFunciones::ctrValidar($_POST['edo_civil']);
				// check a valid edoCivil
				if (!preg_match("/^[1-3]$/",$edoCivil)) {
					$edoCivilErr = "Solo se admiten los valores 1 = soltero, 2 = casado, 3 = viudo";
				}
			}

			if (isset($_POST["email_paciente"])) {
				$emailPaciente = ControladorFunciones::ctrValidar($_POST['email_paciente']);
			  	// check if valid email
			  	if (!filter_var($emailPaciente, FILTER_VALIDATE_EMAIL)) {
					$emailPacienteErr = "Formato de email inválido";
				}
			} 

			if (empty($_POST["tel_paciente"])) {
				$telPacienteErr = "Este campo es obligatorio";
			} else {
				# ^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$
				$telPaciente = ControladorFunciones::ctrValidar($_POST['tel_paciente']);
				// check a valid telefono
				if (!preg_match("/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/",$telPaciente)) {
					$telPacienteErr = "Solo se admite el formato: '(999) 999-9999'";
				}
			}

			if (empty($_POST["direccion_paciente"])) {
				$direccionPErr = "Este campo es obligatorio";
			} else {
				$direccionPaciente = ControladorFunciones::ctrValidar($_POST['direccion_paciente']);
			}
			
			// Validar Datos médicos

			if (empty($_POST["tipo_sangre"])) {
				$tipoSangreErr = "Este campo es obligatorio";
			} else {
				$tipoSangre = ControladorFunciones::ctrValidar($_POST['tipo_sangre']);
				// check a valid tipo_sangre
				if (!preg_match("/^[1-8]$/",$tipoSangre)) {
					$tipoSangreErr = "Solo se admiten valores del 1 al 8";
				}
			}

			$alergias = ControladorFunciones::ctrValidar($_POST['alergias']);
			$antecedentesMed = ControladorFunciones::ctrValidar($_POST['antecedentes_med']);
			$antecedentesFam = ControladorFunciones::ctrValidar($_POST['antecedentes_fam']);

			// Validar Seguro médico

			if (isset($_POST['num_seguro'])) {
				$numSeguro = ControladorFunciones::ctrValidar($_POST['num_seguro']);
				// check if numSeguro
				if (!preg_match("/^[a-zA-Z0-9]*$/",$numSeguro)) {
					$numSeguroErr = "Solo se permiten letras y números";
			  	}
			}

			if (isset($_POST['aseguradora'])) {
				$aseguradora = ControladorFunciones::ctrValidar($_POST['aseguradora']);
				// check if numSeguro
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$aseguradora)) {
					$aseguradoraErr = "Solo se permiten letras y números";
			  	}
			}

			$tipoCovertura = ControladorFunciones::ctrValidar($_POST['tipo_covertura']);
			
			if (isset($_POST['fecha_vencimiento'])) {
				$fechaVencimiento = ControladorFunciones::ctrValidar($_POST['fecha_vencimiento']);
				// check a valid date
				if (!preg_match("/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/",$fechaVencimiento)) {
					$fechaVencimientoErr = "Solo se permite el formato dd/mm/yyyy";
			  	}
			}

			// Validar Persona de Contacto

			if (isset($_POST['nombre_contacto'])) {
				$nombreContacto = ControladorFunciones::ctrValidar($_POST['nombre_contacto']);
				// check a valid nombres
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$nombreContacto)) {
					$nombreContactoErr = "Solo se permiten letras y números";
			  	}
			}

			if (isset($_POST['apellidop_contacto'])) {
				$apellidopContacto = ControladorFunciones::ctrValidar($_POST['apellidop_contacto']);
				// check a valid apellidos
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$apellidopContacto)) {
					$apellidopContactoErr = "Solo se permiten letras y números";
			  	}
			}

			if (isset($_POST['apellidom_contacto'])) {
				$apellidomContacto = ControladorFunciones::ctrValidar($_POST['apellidom_contacto']);
				// check a valid apellidos
				if (!preg_match("/^[a-zA-Z0-9 ]*$/",$apellidomContacto)) {
					$apellidomContactoErr = "Solo se permiten letras y números";
			  	}
			}

			if (isset($_POST['parentesco'])) {
				$parentesco = ControladorFunciones::ctrValidar($_POST['parentesco']);
				// check parentesco
				if (!preg_match("/^[1-5]*$/",$parentesco)) {
					$parentescoErr = "Solo se permiten números";
			  	}
			}

			if (isset($_POST['tel_contacto'])) {
				$telContacto = ControladorFunciones::ctrValidar($_POST['tel_contacto']);
				// check a valid telefono
				if (!preg_match("/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/",$telContacto)) {
					$telContactoErr = "Solo se permiten letras y números";
			  	}
			}

			if (isset($_POST['email_contacto'])) {
				$emailContacto = ControladorFunciones::ctrValidar($_POST['email_contacto']);
				// check a valid email
				if (!filter_var($emailContacto, FILTER_VALIDATE_EMAIL)) {
					$emailContactoErr = "Formato de email inválido";
				}
			}

			// echo "HAAAAAAAAAAAAAAYYYYYY ".$nombrePaciente." ".$apellidoPpaciente." ".$apellidoMpaciente." ".$fechaNacimiento;

			// FORMATEAR FECHAS PARA ENVIAR A BD
			$fechaNacimiento = $_POST['fecha_nacimiento'];
			$fechaNacimiento = str_replace('/', '-', $fechaNacimiento);
			$fechaNacimiento = date('Y-m-d', strtotime($fechaNacimiento));

			$fechaVencimiento = $_POST['fecha_vencimiento'];
			$fechaVencimiento = str_replace('/', '-', $fechaVencimiento);
			$fechaVencimiento = date('Y-m-d', strtotime($fechaVencimiento));
			
			// ENVIAR DATOS AL MODELO
			$tabla = 'paciente';
			
			$datos = array(
				'nombre_paciente' => $nombrePaciente,
				'apellido_p' => $apellidoPpaciente,
				'apellido_m' => $apellidoMpaciente,
				'fecha_nacimiento' => $fechaNacimiento,
				'sexo' => $sexo,
				'estado_civil' => $edoCivil,
				'email' => $emailPaciente,
				'telefono' => $telPaciente,
				'tipo_sangre' => $tipoSangre,
				'alergias' => $alergias,
				'antecedentes_medicos' => $antecedentesMed,
				'antecedentes_familiares' => $antecedentesFam,
				'domicilio' => $direccionPaciente
			);

			// var_dump($datos);

			$respuesta = ModeloExpedientes::mdlCrearExpediente($tabla, $datos);

			if ($respuesta == "ok") {

				// OBTENER EL ÚLTIMO ID DE PACIENTES
				$lastId = ModeloExpedientes::mdlUltimoID();
				$lastID = $lastId[0][0];
				// echo $lastID;
				
				$tabla2 = 'seguro';

				$datos2 = array(
					'paciente_id_paciente' => $lastID,
					'num_seguro' => $numSeguro,
					'aseguradora' => $aseguradora,
					'tipo_covertura' => $tipoCovertura,
					'fecha_vencimiento' => $fechaVencimiento
				);

				// var_dump($datos2);

				$respuesta2 = ModeloExpedientes::mdlRegistrarSeguro($tabla2, $datos2);
				var_dump($respuesta2);

				$tabla3 = 'contacto';

				$datos3 = array(
					'paciente_id_paciente' => $lastID,
					'nombre_contacto' => $nombreContacto,
					'apellidop_contacto' => $apellidopContacto,
					'apellidom_contacto' => $apellidomContacto,
					'relacion_paciente' => $parentesco,
					'telefono' => $telContacto,
					'email_contacto' => $emailContacto
				);

				var_dump($datos3);

				$respuesta3 = ModeloExpedientes::mdlRegistrarContacto($tabla3, $datos3);
				
				var_dump($respuesta3);

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
					title: "¡Asegrúrate de llenar los campos obligatorios!",
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
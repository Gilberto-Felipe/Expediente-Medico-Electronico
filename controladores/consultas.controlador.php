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

        // VALIDAR QUE EXISTAN LAS VARIABLES
        if (isset($_POST['id_paciente']) &&
            isset($_POST['id_doctor']) &&
            isset($_POST['fecha_consulta']) &&
            //isset($_POST['diagnostico']) &&
            //isset($_POST['receta']) &&
            isset($_POST['estudios_true'])
        ){

            // SANITIZAR ENTRADAS
            if (preg_match('/^[0-9]+$/', $_POST['id_paciente']) &&
                preg_match('/^[0-9]+$/', $_POST['id_doctor']) && 
                preg_match('/^[0-1]+$/', $_POST['estudios_true'])
            ){

                // ZANITIZAR TEXTATEAS
                $diagnostico = test_input($_POST['diagnostico']);
                $receta = test_input($_POST['receta']);


                // FORMATEAR FECHAS PARA ENVIAR A BD
                $fechaConsulta = $_POST['fecha_consulta'];
                $fechaConsulta = str_replace('/', '-', $fechaConsulta);
                $fechaConsulta = date('Y-m-d H:i:s', strtotime($fechaConsulta));
                echo $fechaConsulta;

                // ENVIAR DATOS AL MODELO
                $tabla = 'consulta';

                $datos = array(
                'paciente_id_paciente' => $_POST['id_paciente'],
                'doctor_id_doctor' => $_POST['id_doctor'],
                'diagnostico' => $_POST['diagnostico'],
                'receta_medica' => $_POST['receta'],
                'fecha_consulta' => $fechaConsulta
                //'estudios_true' => $_POST['edo_civil']			
                );

                var_dump($datos);

                //COMPROBAR QUE SE HAYA HECHO EL REGISTRO
                $respuesta = ModeloConsultas::mdlCrearConsulta($tabla, $datos);
                    
                if ($respuesta == "ok") {

                    var_dump($respuesta);

                     echo '<script>
                        swal({
                            type: "success",
                            title: "¡La consulta se registró exitosamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false						
                    
                        }).then((result)=>{
                            if(result.value){
                                window.location = "consultas";
                            }
                        });
                    </script>';

                }

            }
            else {
                var_dump("Solicita ayuda al personal de sistemas :xd ");
            }
                       
        }

	}

}
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

        // VALIDAR QUE EXISTAN LAS LLAVES PRIMARIAS Y campos importantes
        if (isset($_POST['id_consulta']) &&
            isset($_POST['id_paciente']) &&
            isset($_POST['id_doctor']) &&
            isset($_POST['fecha_consulta']) &&
            isset($_POST['diagnostico']) &&
            isset($_POST['receta']) 
        ){

            if (preg_match('/^[0-9]+$/', $_POST['id_consulta']) &&
            preg_match('/^[0-9]+$/', $_POST['id_paciente']) &&
            preg_match('/^[0-9]+$/', $_POST['id_doctor']) &&
            // preg_match('/^[0-9]+$/', $_POST['fecha_consulta']) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['diagnostico']) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚüÜ ]+$/', $_POST['receta'])
            ){

                /* probando variables 
                var_dump("heeeeeeeyyyyy".$_POST['id_consulta']);
                var_dump("heeeeeeeyyyyy".$_POST['id_paciente']);
                var_dump("heeeeeeeyyyyy".$_POST['id_doctor']);
                var_dump("heeeeeeeyyyyy".$_POST['fecha_consulta']);
                var_dump("heeeeeeeyyyyy".$_POST['diagnostico']);
                var_dump("heeeeeeeyyyyy".$_POST['receta']);*/


                // FORMATEAR FECHAS PARA ENVIAR A BD
                $fechaConsulta = $_POST['fecha_consulta'];
                $fechaConsulta = str_replace('/', '-', $fechaConsulta);
                $fechaConsulta = date('Y-m-d H:i:s', strtotime($fechaConsulta));

                //echo $fechaConsulta;

                // ENVIAR DATOS AL MODELO
                $tabla = 'consulta';

                $datos = array(
                'paciente_id_paciente' => $_POST['id_paciente'],
                'doctor_id_doctor' => $_POST['id_doctor'],
                'diagnostico' => $_POST['diagnostico'],
                'receta_medica' => $_POST['receta'],
                'fecha_consulta' => $fechaConsulta,
                //'estudios_true' => $_POST['edo_civil']			
                );

                var_dump($datos);

                // COMPROBAR QUE SE HAYA HECHO EL REGISTRO
                /*$respuesta = ModeloConsultas::mdlCrearConsulta($tabla, $datos);
                    
                if ($respuesta == "ok") {


                }*/

                /*echo '<script>
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
                    </script>';*/

            }
            else {
                var_dump("AYUDADDDDDDDAAAAAAAAAAAA");
            }
                       
        }
        else {
            /*echo '<script>
                     swal({
                         type: "error",
                         title: "¡Asegúrtate de completar los campos obligatorios!",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar",
                         closeOnConfirm: false						
                 
                     }).then((result)=>{
                         if(result.value){
                             window.location = "crear-consulta";
                         }
                     });
                 </script>';*/
        }

	}

}
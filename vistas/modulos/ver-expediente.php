<?php

    if (isset($_GET['idExpediente'])) {

        // Recibir idExpediente
        $idExpediente = $_GET['idExpediente'];

        $item = "id_paciente";
        $valor = $idExpediente;

        // Pedir datos al controlador
        $paciente = ControladorExpedientes::ctrMostrarExpedientes($item, $valor);
        
        $nombre_completo = $paciente["nombre_paciente"]." ".$paciente["apellido_p"]." ".$paciente["apellido_m"];
        $tipo_sangre = $paciente["tipo_sangre"];
        $alergias = $paciente["alergias"]; 
        $antecedentes_medicos = $paciente["antecedentes_medicos"];
        $antecedentes_familiarles = $paciente["antecedentes_familiares"];

        // Formatear fecha de nacimiento
        $fecha_nacimiento = date('d-m-Y', strtotime($paciente["fecha_nacimiento"]));

        // Codificar tipo de sangre
        $tipo_sangre = $paciente["tipo_sangre"];

            switch ($tipo_sangre) {
            case 1:
                $tipo_sangre = "A+";
                break;
            case 2:
                $tipo_sangre = "A-";
                break;
            case 3:
                $tipo_sangre = "B+";
                break;
            case 4:
                $tipo_sangre = "B-";
                break;
            case 5:
                $tipo_sangre = "AB+";
                break;
            case 6:
                $tipo_sangre = "AB-";
                break;
            case 7:
                $tipo_sangre = "O+";
                break;
            case 8:
                $tipo_sangre = "O-";
                break;
            default:
                $tipo_sangre = "No hay tipo de sangre.";
        }

        /*var_dump($paciente);
        echo $nombre_completo;
        echo $fecha_nacimiento;
        echo $tipo_sangre;
        echo $alergias;
        echo $antecedentes_medicos;
        echo $antecedentes_familiarles;*/

    }
    else {
        echo "¡Hubo un error! Comunícate con el personal de sistemas.";
    }

?>


<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Ver expediente

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>

            <li class="active">Ver expediente</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border" style="padding:0 3rem;">

                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title" name="nombre_paciente">
                            <?php echo $nombre_completo;?>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-right" id="rec_idPaciente">Exp-<?php echo $idExpediente;?>
                        </h3>
                    </div>
                </div>

            </div>

            <div class="box-body" style="padding:1rem 3rem;">

                <div class="row">
                    <div class="col-sm-9">
                        <p class="">Fecha de nacimiento: <?php echo $fecha_nacimiento;?></p>
                        <p class="">Tipo de sangre: <?php echo $tipo_sangre;?></p>
                        <p class="bg-info">Alergias:</p>
                        <p class=""><?php echo $alergias;?></p>
                        <p class="bg-info">Antecedentes médicos:</p>
                        <p class=""><?php echo $antecedentes_medicos;?></p>
                        <p class="bg-info">Antecedentes familiares:</p>
                        <p class=""><?php echo $antecedentes_familiarles;?></p>
                    </div>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="ver-consulta" class="thumbnail btn btn-warning" role="button"
                                    style="width:10rem; height:8rem; border-radius:10px;">
                                    <div class="text-center">
                                        <i class="fa fa-stethoscope"
                                            style="font-size:3rem; padding-top:1rem; color:black;"
                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="caption">
                                        <p class="text-center" style="color:black">Ver consultas</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12">
                                <a href="#" class="thumbnail btn btn-info" role="button"
                                    style="width:10rem; height:8rem; border-radius:10px;">
                                    <div class="text-center">
                                        <i class="fa fa-flask" style="font-size:3rem; padding-top:1rem; color:black;"
                                            aria-hidden="true"></i>
                                    </div>
                                    <div class="caption">
                                        <p class="text-center" style="color:black">Ver estudios</p>
                                    </div>
                                </a>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.col-sm-4 -->
                </div><!-- /.row -->

            </div><!-- /.box-body-->

            <!-- 
            <div class="box-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="#" class="thumbnail btn btn-warning" role="button"
                                style="width:10rem; height:8rem; border-radius:10px;">
                                <div class="text-center">
                                    <i class="fa fa-stethoscope" style="font-size:3rem; padding-top:1rem; color:black;"
                                        aria-hidden="true"></i>
                                </div>
                                <div class="caption">
                                    <p class="text-center" style="color:black">Ver consultas</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6">
                            <a href="#" class="thumbnail btn btn-info" role="button"
                                style="width:10rem; height:8rem; border-radius:10px;">
                                <div class="text-center">
                                    <i class="fa fa-flask" style="font-size:3rem; padding-top:1rem; color:black;"
                                        aria-hidden="true"></i>
                                </div>
                                <div class="caption">
                                    <p class="text-center" style="color:black">Ver estudios</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div></.box-footer
-->


        </div><!-- /.box -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->
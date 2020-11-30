<?php

    if (isset($_GET['idConsulta'])) {

        // Recibir idConsulta
        $idConsulta = $_GET['idConsulta'];
        // echo "HOLAAAAAAAAAAAAAAAAAAAA ".$idConsulta;

        $item = "id_consulta";
        $valor = $idConsulta;
        //echo $item.$valor;

        // Pedir datos al controlador
        $consulta = ControladorConsultas::ctrMostrarConsultas($item, $valor);
        //var_dump($consulta);

        $idExpediente = $consulta['id_paciente'];
        //echo "quéeeeeeeee pasó ".$idExpediente;
        $nombre_paciente = $consulta['nombre_paciente'];
        $fecha_nacimiento = $consulta['fecha_nacimiento'];
        $idDoctor = $consulta['id_doctor'];
        $nombre_doctor = $consulta['nombre_doctor'];
        $fecha_consulta = $consulta['fecha_consulta'];
        $diagnostico = $consulta['diagnostico'];
        $receta = $consulta['receta'];
        $estudiosT =  $consulta['estudios_si'];
        //echo "HEEEEEEEEEEEEEEEEEEEEEEEEEYYYYYYYYYYYY ".$estudiosT;

        // calcular edad
        $fecha_nacimiento = new DateTime($fecha_nacimiento);
        $hoy = new DateTime('today');
        $edad = $fecha_nacimiento->diff($hoy)->y;
        // echo $fecha_nacimiento->diff($hoy)->y;

        // formatear fechas
        // $fecha_nacimiento = date('d-m-Y', strtotime($paciente["fecha_nacimiento"]));
        //$fecha_consulta = date('d-m-Y', strtotime($consulta['fecha_consulta']));
        date_default_timezone_set("America/Mexico_City");
        $fecha_actual = date("d-m-Y H:i:s");

    }
    else {
        echo "¡Hubo un error! Comunícate con el personal de sistemas.";
    }

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Ver Consulta

            <small></small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>

            <li class="active">Ver consulta</li>

        </ol>
    </section><!-- /.section content-header-->


    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border" style="padding:0rem 5rem;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title" name="nombre_paciente">
                            <?php echo $nombre_paciente;?>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-right" id="rec_idPaciente">Exp-<?php echo $idExpediente;?>
                        </h3>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.box-header-->


            <div class="box-body" style="padding:1rem 5rem;">

                <p class=""><strong>Edad: </strong><?php echo $edad;?></p>

                <p class=""><strong>Fecha consulta:</strong> <?php echo $fecha_actual;?></p>

                <div class="form-group" style="padding:0rem 0rem;">
                    <label for="diagnostico" class="control-label">Diagnóstico</label>
                    <p><?php echo $diagnostico;?></p>
                </div>

                <div class="form-group" style="padding:0rem 0rem;">
                    <label for="receta" class="control-label">Receta</label>
                    <p><?php echo $receta;?></p>
                </div>

                <?php if ($estudiosT > 0): ?>
                <button id="irVerEstudios" idExpediente="<?php echo $idExpediente;?>" class="btn btn-info"
                    style="color:black;"><i class="fa fa-binoculars"><span style="margin-left:1.5rem;">Ver
                            estudios</span></i>
                </button>
                <?php endif; ?>


            </div><!-- /.box-body-->

            <div class="box-footer text-right" style="padding:1rem 5rem;">
                <a href="inicio" class="btn btn-primary btn-lg">Ir a inicio</a>
            </div><!-- /.box-footer-->

        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
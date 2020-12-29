<?php

    if (isset($_GET['idExpediente'])) {

        // Recibir idExpediente
        $idExpediente = $_GET['idExpediente'];
        // echo "HOLAAAAAAAAAAAAAAAAAAAA ".$idExpediente;

        $item = "id_paciente";
        $valor = $idExpediente;
        //echo $item.$valor;

        // Pedir datos al controlador
        $expediente = ControladorExpedientes::ctrMostrarExpedientes($item, $valor);
        var_dump($expediente);

        $idExpediente = $expediente['id_paciente'];
        $nombre_paciente = $expediente['nombre_paciente'];
        $apellido_p = $expediente['apellido_p'];
        $apellido_m = $expediente['apellido_m'];
        $fecha_nacimiento = $expediente['fecha_nacimiento'];
        $sexo = $expediente['sexo'];

        // codificar sexo
        if ($sexo == 1) {
            $sexo_c = "Hombre";
        } else {
            $sexo_c = "Mujer";
        }

        // calcular edad
        $fecha_nacimiento = new DateTime($fecha_nacimiento);
        $hoy = new DateTime('today');
        $edad = $fecha_nacimiento->diff($hoy)->y;
        // echo $fecha_nacimiento->diff($hoy)->y;

        // formatear fechas
        date_default_timezone_set("America/Mexico_City");
        $fecha_actual = date("d-m-Y H:i");

    }
    else {
        echo "¡Hubo un error! Comunícate con el personal de sistemas.";
    }

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Registrar Consulta

            <small></small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>

            <li class="active">Registrar consulta</li>

        </ol>
    </section><!-- /.section content-header-->


    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border" style="padding:0rem 5rem;">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title" name="nombre_paciente">
                            <?php echo $nombre_paciente." ".$apellido_p." ".$apellido_m;?>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-right" id="rec_idPaciente">Exp-<?php echo $idExpediente;?>
                        </h3>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.box-header-->

            <form role="form" method="post" id="crear-consulta" enctype="multipart/form-data">
                <div class="box-body" style="padding:1rem 5rem;">
                    <input type="hidden" id="id_paciente" name="id_paciente" value="<?php echo $idExpediente;?>">

                    <p class=""><strong>Edad: </strong><?php echo $edad;?></p>
                    <input type="hidden" id="edad" name="edad" value="<?php echo $idExpediente;?>">

                    <p><strong>Sexo: </strong><?php echo $sexo_c;?></p>
                    <p class=""><strong>Fecha consulta: </strong> <?php echo $fecha_actual;?></p>
                    <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="<?php echo $fecha_actual;?>">

                    <div class="form-group" style="padding:0rem 0rem;">
                        <label for="diagnostico" class="control-label">Diagnóstico</label>
                        <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" cols="80"
                            style="resize:none;" placeholder="Escribe..." spellcheck="false"></textarea>
                    </div>

                    <div class="form-group" style="padding:0rem 0rem;">
                        <label for="receta" class="control-label">Receta</label>
                        <textarea class="form-control" id="receta" name="receta" rows="3" cols="80" style="resize:none;"
                            placeholder="Escribe..." spellcheck="false"></textarea>
                    </div>

                    <!-- BOTÓN AGREGAR ESTUDIO -->
                    <button class="btn btn-info">Solicitar Estudio</button>
                    <button class="btn btn-primary" style="margin-left:2rem;">Subir Estudio</button>
                    <div class="alert alert-warning" style="margin-top: 1rem;">
                        <strong>¡Atención!</strong> Los datos de los estudios no se almacenarán hasta que se guarde la
                        consulta.
                    </div>

                </div><!-- /.box-body-->

                <div class="box-footer" style="padding:1rem 5rem;">
                    <button type="submit" id="btnGuardarConsulta" class="btn btn-success btn-lg">Guardar
                        consulta</button>
                    <button type="button" class="btn btn-default" id="btnLimpiar" style="margin-left:2rem;">Limpiar
                        formulario</button>
                </div><!-- /.box-footer-->
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php 

    #$crearConsulta = new ControladorConsultas();
    #$crearConsulta -> ctrCrearConsulta();

?>
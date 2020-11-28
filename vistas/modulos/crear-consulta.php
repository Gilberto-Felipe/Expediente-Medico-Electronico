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
        $nombre_paciente = $consulta['nombre_paciente'];
        $fecha_nacimiento = $consulta['fecha_nacimiento'];
        $idDoctor = $consulta['id_doctor'];
        $nombre_doctor = $consulta['nombre_doctor'];
        $fecha_consulta = $consulta['fecha_consulta'];

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
                            <?php echo $nombre_paciente;?>
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

                    <input type="hidden" id="id_consulta" name="id_consulta" value="<?php echo $idConsulta;?>">
                    <input type="hidden" id="id_paciente" name="id_paciente" value="<?php echo $idExpediente;?>">
                    <input type="hidden" id="id_doctor" name="id_doctor" value="<?php echo $idDoctor;?>">

                    <p class=""><strong>Edad: </strong><?php echo $edad;?></p>

                    <p class=""><strong>Fecha consulta:</strong> <?php echo $fecha_actual;?></p>
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
                    
                    <!-- checkbox para saber si hay estudio o no
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="hay_estudio" name="hay_estudio" value="0">Hay Estudios para subir
                        </label>
                    </div>
                    -->

                    <!-- BOTÓN AGREGAR ESTUDIO -->
                    <a class="btn btn-primary" href="crear-estudio">Agregar Estudio</a>
                </div><!-- /.box-body-->

                <div class="box-footer" style="padding:1rem 5rem;">
                    <button type="submit" id="btnGuardarConsulta" class="btn btn-success btn-lg">Guardar
                        consulta</button>
                    <button type="button" class="btn btn-normal" id="btnLimpiar" style="margin-left:2rem;">Limpiar
                        formulario</button>
                </div><!-- /.box-footer-->
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php 

    $crearConsulta = new ControladorConsultas();
    $crearConsulta -> ctrCrearConsulta();

?>
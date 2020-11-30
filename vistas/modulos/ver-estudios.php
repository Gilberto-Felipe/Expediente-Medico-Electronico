<?php

    $idExpediente = $_GET['idExpediente'];
    //var_dump("HOOOOOOOOOOOOOLLLLLAAAAAAAAAAAAAAA ", $idExpediente);

    $item = 'paciente_id_paciente';
    $valor = $idExpediente;
    //echo $item.$valor;

    $estudios = ControladorEstudios::ctrMostrarEstudios($item, $valor);
    $nombrePaciente = $estudios[0]['nombre_paciente'];
    //var_dump($estudios); 

?>

    <div class="content-wrapper">
      <section class="content-header">
          <h1>Ver Estudios</h1>

          <ol class="breadcrumb">
              <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>
              <li class="active">Ver estudios</li>
          </ol>
      </section>

      <section class="content">
          <div class="box">
              <div class="box-header with-border">
                  <h4><?php echo $nombrePaciente; ?></h4>
              </div>

              <div class="box-body">
                  <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                      <thead>
                          <tr>
                              <th style="width: 10px">#</th>
                              <th>Estudio</th>
                              <th>Descripción</th>
                              <th>Fecha solicitud</th>
                              <th>Consulta</th>
                              <th style="width: 10px">Ver estudio</th>
                          </tr>
                      </thead>
                      
                      <tbody>

    <?php
    foreach ($estudios as $key => $value) {

        echo '
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$value['nombre_estudio'].'</td>
                <td>'.$value['descripcion_estudio'].'</td>
                <td>'.$value['fecha_solicitud'].'</td>
                <td>'.$value['fecha_consulta'].'</td>

                <td>
                    <a class="btn btn-info btnVerConsulta" data-toggle="tooltip" data-placement="top" title="Ver consulta" idConsulta="'.$value["id_consulta"].'" style="border-radius:4px;"><i class="fa fa-binoculars"></i></a>
                </td>
            </tr>
        ';
    } 
    ?>

                    </tbody>
                </table>
            </div>
            </div><!-- /.box -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


<?php

if (isset($_GET['idExpediente'])): ?>

    <?php
    $idExpediente = $_GET['idExpediente'];
    // var_dump("HOOOOOOOOOOOOOLLLLLAAAAAAAAAAAAAAA ", $idExpediente);

    $item = 'paciente_id_paciente';
    $valor = $idExpediente;

    $consultas = ControladorConsultas::ctrMostrarConsultas($item, $valor);

    if ($consultas == null) {
        $nombrePaciente = "";
    } else {
        //var_dump($consultas); 
        $nombrePaciente = $consultas[0]["nombre_paciente"];
    }

    ?>

    <div class="content-wrapper">
      <section class="content-header">
          <h1>Ver Consultas de</h1>

          <ol class="breadcrumb">
              <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>
              <li class="active">Ver consultas de</li>
          </ol>
      </section>

      <section class="content">
          <div class="box">
              <div class="box-header with-border">
                  <h4><?php echo $nombrePaciente ?></h4>
              </div>

              <div class="box-body">
                  <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                      <thead>
                          <tr>
                              <th style="width: 10px">#</th>
                              <th>Expediente</th>
                              <th>Paciente</th>
                              <th>Doctor</th>
                              <th>Fecha consulta</th>
                              <th style="width: 10px">Ver consulta</th>
                          </tr>
                      </thead>
                      
                      <tbody>

    <?php
    foreach ($consultas as $key => $value) {
        echo '
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$value['id_paciente'].'</td>
                <td>'.$value['nombre_paciente'].'</td>
                <td>'.$value['nombre_doctor'].'</td>
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

<?php else: ?>

    <div class="content-wrapper">

      <section class="content-header">

          <h1>

              Historial Consultas

          </h1>

          <ol class="breadcrumb">

              <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>

              <li class="active">Historial consultas</li>

          </ol>

      </section>

      <section class="content">

          <div class="box">

              <div class="box-header with-border">

                  <h4></h4>

              </div>

              <div class="box-body">

                  <table class="table table-bordered table-striped dt-responsive tablaConsultas" width="100%">

                      <thead>

                          <tr>

                              <th style="width: 10px">#</th>
                              <th>Expediente</th>
                              <th>Paciente</th>
                              <th>Doctor</th>
                              <th>Fecha consulta</th>
                              <th style="width: 10px">Ver consulta</th>

                          </tr>

                      </thead>

                  </table>

              </div>

          </div><!-- /.box -->

      </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

<?php endif; ?>

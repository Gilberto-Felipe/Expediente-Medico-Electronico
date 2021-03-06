<form role="form" method="post" id="crear-expediente">
    <!-- box-body -->
    <div class="box-body" style="padding:2rem 0rem;">

        <div class="row">
            <!-- .col (left) -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATOS PERSONALES</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nombre_paciente" class="col-sm-4 control-label">Nombre(s)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente"
                                        placeholder="Juan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="apellidop_paciente" class="col-sm-4 control-label">Apellido
                                    paterno</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="apellidop_paciente"
                                        name="apellidop_paciente" placeholder="Pérez" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="apellidom_paciente" class="col-sm-4 control-label">Apellido
                                    materno</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="apellidom_paciente"
                                        name="apellidom_paciente" placeholder="González" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento" class="col-sm-4 control-label">Fecha
                                    nacimiento</label>
                                <div class="col-sm-8">
                                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" required
                                        class="form-control fechas" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group row">
                                <label for="sexo" class="col-sm-4 control-label">sexo</label>
                                <div class="col-sm-8">
                                    <div class="radio col-sm-4">
                                        <label>
                                            <input type="radio" name="sexo" id="mujer" value="0" required>
                                            Mujer
                                        </label>
                                    </div>
                                    <div class="radio col-sm-8">
                                        <label>
                                            <input type="radio" name="sexo" id="hombre" value="1">
                                            Hombre
                                        </label>
                                    </div>
                                </div>
                            </div><!-- /.form-group radio-buttons -->

                            <div class="form-group">
                                <label for="edo_civil" class="col-sm-4 control-label">Estado
                                    civil</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="edo_civil" name="edo_civil" required>
                                        <option value="">-- Elige una opción --</option>
                                        <option value="1">Soltero/a</option>
                                        <option value="2">Casado/a</option>
                                        <option value="3">Viudo/a</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_paciente" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email_paciente" name="email_paciente"
                                        placeholder="jperez@gmail.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tel_paciente" class="col-sm-4 control-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="tel" class="form-control tel_mask" id="tel_paciente"
                                        name="tel_paciente" data-inputmask="'mask': '(999) 999-9999'" data-mask
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="direccion_paciente" class="col-sm-4 control-label">Dirección</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="direccion_paciente"
                                        name="direccion_paciente" placeholder="Avenida Universidad 333, Colima"
                                        required>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.form-horizontal -->
                </div><!-- /.box-info -->
            </div><!-- /.col (left) -->

            <!-- .col (right) -->
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATOS MÉDICOS</h3>
                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <div class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="tipo_sangre" class="col-sm-4 control-label">Tipo de
                                    sangre</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="tipo_sangre" name="tipo_sangre" required>
                                        <option value="">-- Selecciona tipo sangre --</option>
                                        <option value="1">A+</option>
                                        <option value="2">A-</option>
                                        <option value="3">B+</option>
                                        <option value="4">B+</option>
                                        <option value="5">AB+</option>
                                        <option value="6">AB-</option>
                                        <option value="7">O+</option>
                                        <option value="8">O-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alergias" class="col-sm-4 control-label">Alergias</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="alergias" name="alergias" rows="2" cols="50"
                                        style="resize:none;" placeholder="Escribe..." spellcheck="false"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="antecedentes_med" class="col-sm-4 control-label">Antecedentes
                                    médicos</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="antecedentes_med" name="antecedentes_med"
                                        rows="3" cols="50" style="resize:none;" placeholder="Escribe..."
                                        spellcheck="false"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="antecedentes_fam" class="col-sm-4 control-label">Antecedentes
                                    familiares</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="antecedentes_fam" name="antecedentes_fam"
                                        rows="3" cols="50" style="resize:none;" placeholder="Escribe..."
                                        spellcheck="false"></textarea>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.form-horizontal -->
                </div><!-- /.box-info -->
            </div><!-- /.col (right) -->
        </div><!-- /.raw -->

        <div class="row">
            <!-- .col (left) -->
            <div class="col-md-6">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATOS DEL SEGURO MÉDICO</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="num_seguro" class="col-sm-4 control-label">Número
                                    seguro</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="num_seguro" name="num_seguro"
                                        placeholder="00001280" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="aseguradora" class="col-sm-4 control-label">Aseguradora</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="aseguradora" name="aseguradora"
                                        placeholder="Seguros Potosí" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tipo_covertura" class="col-sm-4 control-label">Tipo de
                                    covertura</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tipo_covertura" name="tipo_covertura"
                                        placeholder="Alta: $ 1,000,000 M.N." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_vencimiento" class="col-sm-4 control-label">Fecha
                                    vencimiento</label>
                                <div class="col-sm-8">
                                    <input type="text" id="fecha_vencimiento" name="fecha_vencimiento"
                                        class="form-control fechas" required data-inputmask="'alias': 'dd/mm/yyyy'"
                                        data-mask>
                                </div>
                            </div><!-- /.form-group -->

                        </div><!-- /.box-body -->
                    </div><!-- /.form-horizontal -->
                </div><!-- /.box-info -->
            </div><!-- /.col (left) -->

            <!-- .col (right) -->
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PERSONA DE CONTACTO</h3>
                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nombre_contacto" class="col-sm-4 control-label">Nombre(s)</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"
                                        placeholder="José de Jesús" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="apellidop_contacto" class="col-sm-4 control-label">Apellido
                                    paterno</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="apellidop_contacto"
                                        name="apellidop_contacto" placeholder="Pérez" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="apellidom_contacto" class="col-sm-4 control-label">Apellido
                                    materno</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="apellidom_contacto"
                                        name="apellidom_contacto" placeholder="Lupercio" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="parentesco" class="col-sm-4 control-label">Parentesco</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="parentesco" name="parentesco" required>
                                        <option value="">-- Elige una opción --</option>
                                        <option value="1">Padre/madre</option>
                                        <option value="2">Hermano/a</option>
                                        <option value="3">Cónyuge/pareja</option>
                                        <option value="4">Hijo/a</option>
                                        <option value="5">Otro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tel_contacto" class="col-sm-4 control-label">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="tel" class="form-control tel_mask" id="tel_contacto"
                                        name="tel_contacto" data-inputmask="'mask': '(999) 999-9999'" data-mask
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_contacto" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email_contacto" name="email_contacto"
                                        placeholder="jjesus_perez@gmail.com">
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.form-horizontal -->
                </div><!-- /.box-info -->
            </div><!-- /.col (right) -->
        </div><!-- /.raw -->
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-success btn-lg">Crear expediente</button>
        <button type="button" class="btn btn-normal" id="btnLimpiar" style="margin-left:2rem;">Limpiar
            formulario</button>
    </div><!-- /.box-footer-->
</form>





//variables
$nombrePaciente = $_POST['nombre_paciente'];
$apellidoP = $_POST['apellidop_paciente'];
$apellidoM = $_POST['apellidom_paciente'];
$fechaNacimiento = $_POST['fecha_nacimiento'];

#echo "HAAAAAAAAAAAAAAYYYYYY ".$nombrePaciente." ".$apellidoP." ".$apellidoM." ".$fechaNacimiento;
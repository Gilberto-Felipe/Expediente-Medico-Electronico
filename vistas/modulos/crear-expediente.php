<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Crear Expediente

            <small></small>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i>ECE</a></li>

            <li class="active">Crear expediente</li>

        </ol>
    </section><!-- /.section content-header-->


    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border" style="padding:3rem 5rem;">

                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step col-xs-3">
                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                            <p><small>Datos personales</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-3">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p><small>Datos médicos</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-3">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p><small>Seguro médico</small></p>
                        </div>
                        <div class="stepwizard-step col-xs-3">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p><small>Persona de contacto</small></p>
                        </div>
                    </div>
                </div>

                <form role="form" method="post" id="crear-expediente">
                    <div class="panel panel-primary setup-content" id="step-1">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos personales</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="control-label" for="nombre_paciente">Nombre(s)<span class="error">*
                                    </span></label>
                                <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente"
                                    maxlength="100" placeholder="Juan" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="apellidop_paciente">Apellido paterno<span
                                        class="error">*</span></label>
                                <input type="text" class="form-control" id="apellidop_paciente"
                                    name="apellidop_paciente" placeholder="Pérez" maxlength="100" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="apellidom_paciente">Apellido materno<span
                                        class="error">*</span></label>
                                <input type="text" class="form-control" id="apellidom_paciente"
                                    name="apellidom_paciente" placeholder="González" maxlength="100" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento" class="control-label">Fecha nacimiento<span
                                        class="error">*</span></label>
                                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" required
                                    class="form-control fechas">
                            </div>

                            <div class="form-group">
                                <label class="control-label" style="margin-right:2rem;">Sexo<span
                                        class="error">*</span></label>
                                <label style="margin-right: 2rem;"><input type="radio" class="minimal" name="sexo"
                                        id="mujer" value="1" required> Mujer</label>
                                <label><input type="radio" class="minimal" name="sexo" id="hombre" value="2">
                                    Hombre</label>
                            </div><!-- /.form-group radio-buttons -->

                            <div class="form-group">
                                <label for="edo_civil" class="control-label">Estado civil<span
                                        class="error">*</span></label>
                                <select class="form-control" id="edo_civil" name="edo_civil" required>
                                    <option value="">--Elige una opción--</option>
                                    <option value="1">Soltero/a</option>
                                    <option value="2">Casado/a</option>
                                    <option value="3">Viudo/a</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tel_paciente" class="control-label">Teléfono<span
                                        class="error">*</span></label>
                                <input type="text" class="form-control tel-mask" id="tel_paciente" name="tel_paciente"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="email_paciente" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email_paciente" name="email_paciente"
                                    placeholder="jperez@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="direccion_paciente" class="control-label">Dirección<span
                                        class="error">*</span></label>
                                <input type="text" class="form-control" id="direccion_paciente"
                                    name="direccion_paciente" placeholder="Avenida Universidad 333, Colima" required>
                            </div>


                            <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                        </div>
                    </div>

                    <div class="panel panel-primary setup-content" id="step-2">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos médicos</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="tipo_sangre" class="control-label">Tipo de sangre<span
                                        class="error">*</span></label>
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

                            <div class="form-group">
                                <label for="alergias" class="control-label">Alergias</label>
                                <textarea class="form-control" id="alergias" name="alergias" rows="2" cols="50"
                                    style="resize:none;" placeholder="Escribe..." spellcheck="false"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="antecedentes_med" class="control-label">Antecedentes
                                    médicos</label>
                                <textarea class="form-control" id="antecedentes_med" name="antecedentes_med" rows="3"
                                    cols="50" style="resize:none;" placeholder="Escribe..."
                                    spellcheck="false"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="antecedentes_fam" class="control-label">Antecedentes
                                    familiares</label>
                                <textarea class="form-control" id="antecedentes_fam" name="antecedentes_fam" rows="3"
                                    cols="50" style="resize:none;" placeholder="Escribe..."
                                    spellcheck="false"></textarea>
                            </div>


                            <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                        </div>
                    </div>

                    <div class="panel panel-primary setup-content" id="step-3">
                        <div class="panel-heading">
                            <h3 class="panel-title">Seguro médico</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <button type="button" id="btn_show_seguro" class="btn btn-info" data-toggle="collapse"
                                    data-target="#seguro">Seguro
                                    médico</button>
                                <div id="seguro" class="collapse" style="padding-top:1rem;">
                                    <div class="form-group">
                                        <label for="num_seguro" class="control-label">Número
                                            seguro<span class="error">*</span></label>
                                        <input type="text" class="form-control" id="num_seguro" name="num_seguro"
                                            placeholder="00001280">
                                    </div>

                                    <div class="form-group">
                                        <label for="aseguradora" class="control-label">Aseguradora<span
                                                class="error">*</span></label>
                                        <input type="text" class="form-control" id="aseguradora" name="aseguradora"
                                            placeholder="Seguros Potosí">
                                    </div>

                                    <div class="form-group">
                                        <label for="tipo_covertura" class="control-label">Tipo de
                                            covertura<span class="error">*</span></label>
                                        <input type="text" class="form-control" id="tipo_covertura"
                                            name="tipo_covertura" placeholder="Alta: $ 1,000,000 M.N.">
                                    </div>

                                    <div class="form-group">
                                        <label for="fecha_vencimiento" class="control-label">Fecha
                                            vencimiento<span class="error">*</span></label>
                                        <input type="text" id="fecha_vencimiento" name="fecha_vencimiento"
                                            class="form-control fechas" data-inputmask="'alias': 'dd/mm/yyyy'"
                                            data-mask>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                        </div>
                    </div>

                    <div class="panel panel-primary setup-content" id="step-4">
                        <div class="panel-heading">
                            <h3 class="panel-title">Persona de contacto</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <button type="button" id="btn_show_pcontacto" class="btn btn-info"
                                    data-toggle="collapse" data-target="#contacto">Persona de
                                    contacto</button>
                                <div id="contacto" class="collapse" style="padding-top:1rem;">
                                    <div class="form-group">
                                        <label for="nombre_contacto" class="control-label">Nombre(s)<span
                                                class="error">*</span></label>
                                        <input type="text" class="form-control" id="nombre_contacto"
                                            name="nombre_contacto" placeholder="José de Jesús">
                                    </div>

                                    <div class="form-group">
                                        <label for="apellidop_contacto" class="control-label">Apellido
                                            paterno<span class="error">*</span></label>
                                        <input type="text" class="form-control" id="apellidop_contacto"
                                            name="apellidop_contacto" placeholder="Pérez">
                                    </div>

                                    <div class="form-group">
                                        <label for="apellidom_contacto" class="control-label">Apellido
                                            materno<span class="error">*</span></label>
                                        <input type="text" class="form-control" id="apellidom_contacto"
                                            name="apellidom_contacto" placeholder="Lupercio">
                                    </div>

                                    <div class="form-group">
                                        <label for="parentesco" class="control-label">Parentesco<span
                                                class="error">*</span></label>
                                        <select class="form-control" id="parentesco" name="parentesco">
                                            <option value="">-- Elige una opción --</option>
                                            <option value="1">Padre/madre</option>
                                            <option value="2">Hermano/a</option>
                                            <option value="3">Cónyuge/pareja</option>
                                            <option value="4">Hijo/a</option>
                                            <option value="5">Otro</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tel_contacto" class="control-label">Teléfono<span
                                                class="error">*</span></label>
                                        <input type="text" class="form-control tel-mask" id="tel_contacto"
                                            name="tel_contacto">
                                    </div>

                                    <div class="form-group">
                                        <label for="email_contacto" class="control-label">Email</label>
                                        <input type="email" class="form-control" id="email_contacto"
                                            name="email_contacto" placeholder="jjesus_perez@gmail.com">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-success pull-right" type="submit">Crear
                                expediente</button>

                        </div>
                    </div>
                </form>

<?php 

    $crearExpediente = new ControladorExpedientes();
    $crearExpediente -> ctrCrearExpediente();

?>
            </div> <!-- /.box-header -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
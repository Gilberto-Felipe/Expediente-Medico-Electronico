<div id="back"></div>

<div class="login-box">

    <div class="login-logo">

        <i class="fa fa-plus-square" style="color:#3c8dbc;"></i>

    </div>

    <div class="login-box-body">

        <p class="login-box-msg" style="color:#3c8dbc;"><strong>Inicia sesión</strong></p>

        <form method="post">

            <div class="form-group has-feedback">

                <input type="text" class="form-control" name="ingUsuario" placeholder="Usuario" required>

                <span class="glyphicon glyphicon-user form-control-feedback"></span>

            </div>

            <div class="form-group has-feedback">

                <input type="password" class="form-control" name="ingPassword" placeholder="Contraseña" required>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>

            <div class="box hidden">

                <p>usuario: admin@ghapps.com | contraseña: 123</p>
                <p>usuario: eperez@gmail.com | contraseña: abc</p>
                <p>usuario: marycruz@gmail.com | contraseña: ale</p>

            </div>

    </div>

    <div class="row">

        <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>


        <?php 

            $login = new ControladorUsuarios();
            $login -> ctrIngresoUsuario();

        ?>

    </div>

    </form>

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->
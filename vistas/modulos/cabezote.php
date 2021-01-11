<header class="main-header">

    <!--=====================================
	=            LOGOTIPO		          	=
	======================================-->

    <a href="inicio" class="logo hidden-xs">

        <!-- logo mini -->
        <span class="logo-mini">

            <i class="fa fa-plus-square" style="color:#ffffff;font-size:2.5rem;"></i>

        </span>

        <!-- logo normal -->
        <span class="logo-lg">

            <img src="vistas/img/plantilla/ghapps_logo.png" class="img-responsive"
                style="max-width:50%; padding:10px 0px;" alt="logo empresa">

        </span>

    </a>

    <!--=====================================
	=          	BARRA DE NAVEGACION       	=
	======================================-->

    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Botón de navegacion -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle navigation</span>

        </a>

        <!-- perfil de usuario -->
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php 

							//if ($_SESSION['foto'] != "") {
								
								//echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="imagen usuario por default">';

							//} else {

								date_default_timezone_set('UTC');
 
								$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
								$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
								
								echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." del ".date('Y')." ".date('h:i:s A');
								//Salida: Viernes 24 de Febrero del 2012
 
								// '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image" alt="imagen usuario por default">';

							// }

						 ?>

                        <span class="hidden-xs"></span>

                    </a>

                    <!-- Dropdown-toggle -->
                    <ul class="dropdown-menu">

                        <li class="user-body">

                            <?php
                                echo '<p class="text-center" style="color:#3c8dbc;">'.$_SESSION["usuario"].'</p>';
                            ?>

                        </li>

                        <li class="user-footer">

                            <div class="pull-right">

                                <a href="salir" class="btn btn-default btn-flat">Salir</a>

                            </div>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>

</header>
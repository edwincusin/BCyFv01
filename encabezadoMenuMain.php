
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/estilos.css">
</head>

        <div class="tituloPaginaLogo">
            <!--logos  -->
            <img src="./img/siccopespng.png">
        </div>

        <!-- inicio menu-->
        <div id="cont_menu_menu">
            <ul>
                <li id="item_menu"><a href="./menuInicio.php">Inicio</a></li>
                <li id="item_menu"><a href="#">Usuario</a>
                    <ul id="desp_submenu">
                        <li><a href="./formregistroUser.php">Agregar </a></li>
                    </ul>
                </li>
                <li id="item_menu"><a href="#">Personal Operativo</a>

                    <ul id="desp_submenu">
                        <li><a href="./menu_registrar_personal_operativos.php">Agregar / Información</a></li>
                        <li><a href="#">Agregar / Referencias familiar</a></li>
                    </ul>

                </li>
                <li id="item_menu"><a href="#">Proyecto</a>

                    <ul id="desp_submenu">
                        <li><a href="#">Agregar / Información</a></li>
                        <li><a href="#">Inf. Seguridad Interna</a></li>

                    </ul>
                </li>
                <li id="item_menu"><a href="#">Novedad</a>
                    <ul id="desp_submenu">
                        <li><a href="#">Registrar / consultar</a></li>

                    </ul>
                </li>
                <li id="item_menu"><a href="#">Reportes</a>
                    <ul id="desp_submenu">
                        <li><a href="#">Personal Operativo</a></li>
                        <li><a href="#">Inf. Seguridad Interna</a></li>
                        <li><a href="#">Proyectos</a></li>
                        <li><a href="#">Novedades</a></li>

                    </ul>
                </li>
                <?php  ?>

                <li id="item_cuenta" > <a href="#">&#128100; <?php echo $_SESSION['nameuser'];?></a>
                    
                    <ul id="desp_submenu">
                        <li><a href="#">&#128295; Cambiar contraseña</a></li>
                        <li><a href="./cerrarSesion.php">&#128682; Cerrar sesión</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- fin menu-->


</html>
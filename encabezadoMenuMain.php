
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/estilos.css">
</head>

        <div class="tituloPaginaLogo">
            <!--logos  -->
            <img src="./img/01bcyftomate.jpeg">
            <h1> BANCO SIGA ADELANTE  </h1>
            <h3>CRECIMIENTO Y FUTURO </h3> 
        </div>

        <!-- inicio menu-->
        <div id="cont_menu_menu">
            <ul>
                <li id="item_menu"><a href="./menuInicio.php">Inicio</a></li>
                <li id="item_menu"><a href="#">Usuario</a>
                    <ul id="desp_submenu">
                        <li><a href="./formregistroUserSis.php">Registrar información</a></li>
                        <li><a href="./formregistroUserSis.php">Crear empleado</a></li>
                        <li><a href="./formregistroUser.php">Crear cliente</a></li>

                    </ul>
                </li>
                <li id="item_menu"><a href="#">Apertura </a>

                    <ul id="desp_submenu">
                        <li><a href="./menu_registrar_personal_operativos.php">Agregar cuenta bancaria</a></li>
                    </ul>

                </li>
                <li id="item_menu"><a href="#">Transacción</a>

                    <ul id="desp_submenu">
                        <li><a href="#">Realizar deposito en efectivo</a></li>
                        <li><a href="#">Realizar deposito con cheque</a></li>
                        <li><a href="#">Realizar retiro</a></li>
                        <li><a href="#">Realizar transferencia interna</a></li>

                    </ul>
                </li>
                <li id="item_menu"><a href="#">Consultar / Imprimir</a>
                    <ul id="desp_submenu">
                        <li><a href="#">Estado de cuenta</a></li>
                        <li><a href="#"></a></li>

                    </ul>
                </li>
                <li id="item_menu"><a href="#">Reportes</a>
                    <ul id="desp_submenu">
                        <li><a href="#">Clientes</a></li>
                        <li><a href="#">Usuarios</a></li>
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
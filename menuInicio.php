<?php 
    include './sessionStart.php';
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <?php include 'headLib.html';?>
        <title>Inicio</title>
    </head>    

    <body>  
        <div class="contenedorMainInicio">
            <div class="subcontenedorInicio">
                <!--menu inicio -->                
                    <?php           
                        include './encabezadoMenuMain.php';
                    ?>     
                <!-- fin menu-->

                <div id="bienvenido">

                    <img src="./img/icono_welcome.png" alt="">
                    <h1>Siga Adelante</h1>
                    <h2>Crecimiento y Futuro</h2>
                    <h1>
                        ¡Bienvenido!
                    </h1>
                    <h2> a BCyF</h2>
                    <h3> Versión 0.01</h3>

                </div>
            </div>
        </div>
        
        <?php
        include './derechosAutor.html';
        ?>        
        
    </body>

</html>
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

                    <img src="./img/LogoEsfoguar.png" alt="">
                    <h1>Evolución en Seguridad y Formación Integral</h1>
                    <h1>
                        ¡Bienvenido!
                    </h1>
                    <h2> a Siccopes</h2>
                    <h3> Versión 0.01</h3>

                </div>
            </div>
        </div>
        
        <?php
        include './derechosAutor.html';
        ?>        
        
    </body>

</html>
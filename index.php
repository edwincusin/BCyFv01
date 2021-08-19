<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
            include './headLib.html';
						require_once __DIR__.'/vendor/autoload.php';
						use Spipu\Html2Pdf\Html2Pdf;
        ?>
        <title>Acceso</title>
    </head>

    <body >
        <form action="sqlValidarAccs.php" method="post">
       
        <div class="contenedorMain">

            <div class="contenedorLogin">

                <div class="elementos logo">
                    <img src="./img/01bcyftomate.jpeg" class="imgLogo">
                    <a href="">Banco Siga Adelante</a>
                    <p id="eslogan">Crecimiento Y Futuro</p>
                </div>
                <div class="elementos controles animate__animated animate__backInLeft">
                    <!-- <h1>SICCOPES</h1> -->
                    <h1>Iniciar sesión</h1>
                    <p><img src="./img/icono_login.png" alt=""></p>

                    <p>
                        &nbsp&nbsp    <input type="text" placeholder="  &#128100; Ingrese usuario" name="usuario" maxlength="25" size="18" required>
                    </p>
                    
                    <p>
                        <input type="password" placeholder="  &#128274; Ingrese contraseña" name="pwd" maxlength="25" size="18" required>
                    </p>
                                 
                    <p>
                        <input type="submit" value="&#128272; Ingresar" name="ingresar">            
                        <input type="submit" value="&#128273 ¿Olvidó su contraseña?" >
                    </p> 

                    <?php 
                        if (isset($_GET['fallo'])) {
                        echo '<h4 id="errorSis" style="font-size:15px;">Usuario o Contraseña Errada </h4>' ;
                        }
                        if (isset($_GET['falloactivar'])) {
                            echo '<h4 id="errorSis" style="font-size:12px;">Usuario cesado o esta pendiente activar o reactivar la cuenta por el administrador, como puede ser requerimiento de actualización de datos en el sistema </h4>' ;
                            }
                     ?>
                </div>    
                              
            </div>   
            
            <?php
                include './derechosAutor.html';
            ?>
        </div>
        </form>
        <br>    
</body>

</html>

<!-- &nbsp -->



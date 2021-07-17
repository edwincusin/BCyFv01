<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
            include './headLib.html';
        ?>
        <title>Acceso</title>
    </head>

    <body >
        <form action="sqlValidarAccs.php" method="post">
       
        <div class="contenedorMain">

            <div class="contenedorLogin">

                <div class="elementos logo">
                    <img src="./img/logoinsideelectronicPNG.png" class="imgLogo" >
                    <a href="">Esfoguar Cia. Ltda.</a>
                </div>
                <div class="elementos controles animate__animated animate__backInLeft">
                    <h1>SICCOPES</h1>
                    <h2>Iniciar sesión</h2>
                    <p><img src="./img/icono_login.png" alt="" ></p>            
                    <p> <input type="text" placeholder="&#128100; Ingrese cédula" name="usuario"  maxlength="10" required>  </p>            
                    <p> 
                        <input type="password" placeholder="&#128274; Ingrese contraseña" name="pwd"  maxlength="20"  required>
                        <!-- <i class="fas fa-low-vision"></i> -->
                    </p>
                   
                    <p>
                        <input type="submit" value="&#128272; Ingresar" name="ingresar">      
                        <input type="submit" value="&#128273 ¿Olvidó su contraseña?" >
                    </p> 
                </div>                   
            </div>   
            
            <?php
                include './derechosAutor.html';
            ?>
        </div>

        </form>
        

</body>

</html>



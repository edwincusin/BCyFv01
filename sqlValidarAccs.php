<?php
session_start();
require_once ('conex.php');

if (isset($_POST['ingresar'])){
    
    $conexion=conectarBD();
    $user=$_POST['usuario'];
    $pass= $_POST['pwd'];

    $consulta = "SELECT usuario_usr, contrasena_usr
                FROM public.usuario
                WHERE usuario_usr='$user' and contrasena_usr='$pass';";
    $resultado = pg_query($conexion, $consulta) or die ("Error en la consulta de Usuario y contraseña");
    $numreg = pg_num_rows($resultado);//validamos que exista algun registro 

      
    if($numreg>0)
    {
        $estadoUsuario=0;
        $estadoPersona=0;
        $personaUsuario='';
        $nombreUsuario='';
        $apellidoUsuario='';

        $consulta= "SELECT estado_usr, persona_usr
        FROM public.usuario 
        WHERE usuario_usr='$user';";
        $resultado = pg_query($conexion, $consulta) or die ("Error en la consulta de estado del usuario");

        while($row = pg_fetch_array($resultado))
            {
                $estadoUsuario=$row['estado_usr'];
                $personaUsuario=$row['persona_usr'];
             }

        $consulta="SELECT apellido1_per, nombre1_per, estadopersona_per
        FROM public.persona
        WHERE cedula_per='$personaUsuario';";
        $resultado = pg_query($conexion, $consulta) or die ("Error en la consulta cedula persona");

         while($row = pg_fetch_array($resultado))
            {
                $nombreUsuario=$row['nombre1_per'];
                $apellidoUsuario=$row['apellido1_per'];
                $estadoPersona=$row['estadopersona_per'];
            }


        if($estadoUsuario==1 and $estadoPersona==1){ 
            
           
            $_SESSION['nameuser'] =$nombreUsuario." ".$apellidoUsuario."  / CI: ".$personaUsuario; //se crea la sesion para la aplicacion
            header("location:menuInicio.php"); 
            //echo "BIENVENIDO:".$_SESSION['nameuser'];  
            
            
        }
        
        else{
        echo'<script type="text/javascript">
                 alert("Usuario cesado o esta pendiente activar o reactivar la cuenta por el administrador, como puede ser requerimiento de actualización de datos en el sistema,");
                 window.location.href="index.php";
             </script>';
        }

    }

        else{
        echo'<script type="text/javascript">
                alert("Usuario o Contraseña Errada,");
                window.location.href="index.php?fallo=true";
        </script>';
        
            }



    pg_free_result($resultado);
    pg_close($conexion);
}
?>
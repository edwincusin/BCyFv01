<?php
session_start();
require_once ('conex.php');

if (isset($_POST['ingresar'])){
    
    $conexion=conectarBD();
    $user=$_POST['usuario'];
    $pass= $_POST['pwd'];

    $consulta = "SELECT cedula_usr, contrasena_usr 
                FROM public.usuariosiccopes 
                WHERE cedula_usr='$user' and contrasena_usr='$pass';";
    $resultado = pg_query($conexion, $consulta) or die ("Error en la consulta de Usuario y contraseña");
    $numreg = pg_num_rows($resultado);//validamos que exista algun registro 
    
    if($numreg>0){
        $estadoLaboral=0;
        $nombreUsuario="";
        $apellidoUaurio="";
        $consulta= "SELECT estadolaboral_usr, primerapellido_usr, primernombre_usr
        FROM public.usuariosiccopes 
        WHERE cedula_usr='$user';";
        $resultado = pg_query($conexion, $consulta) or die ("Error en la consulta de estado laboral del usuario");
        while($row = pg_fetch_array($resultado)){
            $estadoLaboral=$row['estadolaboral_usr'];
            $nombreUsuario=$row['primerapellido_usr'];
            $apellidoUaurio=$row['primernombre_usr'];
        }
        if($estadoLaboral==1){ 
            $_SESSION['nameuser'] =$nombreUsuario." ".$apellidoUaurio ; //se crea la sesion para la aplicacion
            header("location:menuInicio.php"); 
            //echo "BIENVENIDO:".$_SESSION['nameuser'];  
        }else{
        echo'<script type="text/javascript">
                 alert("Usuario cesado o esta pendiente activar cuenta por el administrador,");
                 window.location.href="index.php";
             </script>';
        }

    }else{
        echo'<script type="text/javascript">
                alert("Usuario o Contraseña Errada,");
                window.location.href="index.php?fallo=true";
        </script>';
        
    }
    pg_free_result($resultado);
    pg_close($conexion);
}
?>
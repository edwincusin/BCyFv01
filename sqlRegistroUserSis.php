<?php
require_once './conex.php';
$conexion=conectarBD();


if(isset($_POST['buscar'])){

    $consulta="SELECT cedula_per, 
	FROM public.persona
    Where cedula_per='$_POST[buscar_dato]'";
    $resultado=pg_query($conexion,$consulta) or die ("error al realizar consulta de dato en la tabla persona");

}//if isset

?>

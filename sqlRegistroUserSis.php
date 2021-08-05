<?php
require_once './conex.php';
$conexion=conectarBD();


if(isset($_POST['buscar'])){

    $buscarDato=$_POST['txtbuscarDato'];
    $cedula_per='';
    $apellido1_per='';
    $nombre1_per='';

    $consulta="SELECT cedula_per, apellido1_per, nombre1_per
	FROM public.persona
    Where cedula_per='$buscarDato'";
    $resultado=pg_query($conexion,$consulta) or die ("error al realizar consulta de dato en la tabla persona");
    while($row=pg_fetch_array($resultado)){
        $cedula_per=$row['cedula_per'];
        $apellido1_per=$row['apellido1_per'];
        $nombre1_per=$row['nombre1_per'];
    }

    if ($cedula_per=="") {

        echo '<i style="color:red;font-size:20px;font-family:calibri ;"> usuario no encontrado</i> ';
     } else { $var=1;}
     

}//if isset buscar



pg_close($conexion);
?>

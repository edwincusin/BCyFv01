<?php



$cedula_per='';
$apellido1_per='';
$apellido2_per='';
$nombre1_per='';
$nombre2_per='';
$fechanac_per='';
$telefono_per='';
$celular_per='';
$email_per='';
$direcciondom_per='';
$nacionalidad_per=0;
$estadocivil_per=0;
$sexo_per=0;
$intruccion_per=0;
$actividad_per=0;
$estadopersona_per=0;


if(isset($_POST['buscar'])){    

    require_once './conex.php';
    $conexion=conectarBD();

    //consulta buscar en la tabla persona
    $buscarDato=$_POST['txtbuscarDato'];
    $consulta="SELECT * FROM public.persona
    Where cedula_per='$buscarDato'";
    $resultado=pg_query($conexion,$consulta) or die ("error al realizar consulta de dato en la tabla persona");
    while($row=pg_fetch_array($resultado)){
        $cedula_per=$row['cedula_per'];
        $apellido1_per=$row['apellido1_per'];
        $apellido2_per=$row['apellido2_per'];
        $nombre1_per=$row['nombre1_per'];
        $nombre2_per=$row['nombre2_per'];
        $fechanac_per=$row['fechanac_per'];
        $telefono_per=$row['telefono_per'];
        $celular_per=$row['celular_per'];
        $email_per=$row['email_per'];
        $direcciondom_per=$row['direcciondom_per'];
        $nacionalidad_per=$row['nacionalidad_per'];
        $estadocivil_per=$row['estadocivil'];
        $sexo_per=$row['sexo_per'];
        $intruccion_per=$row['intruccion_per'];
        $actividad_per=$row['actividad_per'];
        $estadopersona_per=$row['estadopersona_per'];

        }
        
    if ($cedula_per=="") {
        echo '<h4 id ="errorSis"> Resgistro no encontrado</h4> ';       

     } else{
        
        echo '<h4 id="msmcorreto"> Resgistro encontrado</h4> ';
     }
     pg_free_result($resultado);
     pg_close($conexion);
}//if isset buscar fin


?>

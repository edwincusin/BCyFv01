<?php

    $cedula_per='';
    $apellido1_per='';
    $apellido2_per='';
    $nombre1_per='';
    $nombre2_per='';
    $telefono_per='';
    $celular_per='';
    $email_per='';
    $estadopersona_per=0;
    $descripcionestper_estper='';
    $numCCC=null;


if(isset($_POST['buscar_AC'])){    

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
        $estadopersona_per=$row['estadopersona_per'];
        }
    pg_free_result($resultado);
    $consulta="SELECT descripcion_estper
                FROM estadopersona
                where codigo_estper=$estadopersona_per;";
    $resultado=pg_query($conexion,$consulta) or die ("error al realizar consulta de dato en la tabla estadopersona ");
    while($row=pg_fetch_array($resultado)){
        $descripcionestper_estper=$row['descripcion_estper'];
    }
    pg_free_result($resultado);


    //consulta para generar el numero de cuenta aorde al ultimo digito creado 
    $consulta="SELECT max(numerocuenta_cueban)
                FROM cuentabancaria;";
    $resultado=pg_query($conexion,$consulta) or die ("error no se pudo contar el total de numero de cuentas");
    $CCC=pg_fetch_result($resultado,0) + 1;
    $numCCC='593-373-022-001-0000000'.$CCC;

        //imprime si el registrro persona exite para asi crear la cuenta caso contrario no se puede crear
    if ($cedula_per=="") {
        echo '<h4 id ="errorSis"> Resgistro no encontrado</h4> ';       

     } else{
        
        echo '<h4 id="msmcorreto"> Resgistro encontrado</h4> ';
     }
    //  pg_free_result($resultado);
     pg_close($conexion);
}//if isset buscar fin


?>

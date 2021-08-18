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

 $dateAC=''; 
 $saldo_cueban=0;
 $persona_cueban="";

 $descripcion_estcue='';
 $descripcion_tipcue='';
 $numCCC=0;
 $numRetiro=0;
  

if(isset($_POST['buscar_TR'])){     
   
    

    require_once './conex.php';
    $conexion=conectarBD();    
    //consulta buscar en la tabla cuenta
    $buscarDato=$_POST['txtbuscarDato'];
    $consulta="SELECT 
	*FROM public.cuentabancaria, public.persona, public.estadopersona, public.estadocuenta, public.tipocuenta
    WHERE numerocuenta_cueban='$buscarDato' 
    and persona_cueban=cedula_per 
    and estadopersona_per=codigo_estper
	and tipocuenta_cueban=codigo_tipcue
	and estado_cueban=codigo_estcue;";
    $resultado=pg_query($conexion,$consulta) or die (" error no se realizo la consulta en la tabla cuentabancaria");
    
    if(pg_num_rows($resultado)>0){

        while($row=pg_fetch_array($resultado)){            
            $numCCC=$row['numerocuenta_cueban'];
            $dateAC=$row['fechaapertura_cueban'];
            $saldo_cueban=$row['saldo_cueban'];
            
            $descripcion_estcue=$row['descripcion_estcue'];
            $descripcion_tipcue=$row['descripcion_tipcue'];

            $cedula_per=$row['cedula_per'];
            $apellido1_per=$row['apellido1_per'];
            $apellido2_per=$row['apellido2_per'];
            $nombre1_per=$row['nombre1_per'];
            $nombre2_per=$row['nombre2_per'];
            $fechanac_per=$row['fechanac_per'];
            $telefono_per=$row['telefono_per'];
            $celular_per=$row['celular_per'];
            $email_per=$row['email_per'];
            $descripcionestper_estper=$row['descripcion_estper'];              

        }

      pg_free_result($resultado);

        $consulta="SELECT max(codigo_tranret)
                    FROM tranretiro;";
        $resultado=pg_query($conexion,$consulta) or die ("error no se pudo contar el total de numero de cuentas");
        $numRetiro=pg_fetch_result($resultado,0) + 1;

        pg_free_result($resultado);

        echo '<h4 id ="msmcorreto" > El número de cuenta encontrado. </h4>' ;

    }
    else{
        echo '<h4 id ="errorSis" > El número de cuenta no existe, vuelva a intentar. </h4>' ;
    }

    pg_close($conexion);
}//if isset buscar fin


?>

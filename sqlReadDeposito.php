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
 $tipocuenta_cueban=0;
 $descripcion_estcue="";
 $estadocuenta_cueban=0;
 $numCCC=0;
  

if(isset($_POST['buscar_UDC'])){     
   
    

    require_once './conex.php';
    $conexion=conectarBD();    
    //consulta buscar en la tabla cuenta
    $buscarDato=$_POST['txtbuscarDato'];
    $consulta="SELECT 
	*FROM public.cuentabancaria, public.persona, public.estadopersona, public.estadocuenta
    WHERE numerocuenta_cueban='$buscarDato' and persona_cueban=cedula_per and estadopersona_per=codigo_estper;";
    $resultado=pg_query($conexion,$consulta) or die (" error no se realizo la consulta en la tabla cuentabancaria");
    
    if(pg_num_rows($resultado)>0){

        while($row=pg_fetch_array($resultado)){            
            $numCCC=$row['numerocuenta_cueban'];
            $dateAC=$row['fechaapertura_cueban'];
            $saldo_cueban=$row['saldo_cueban'];
            $tipocuenta_cueban=$row['tipocuenta_cueban'];
            $estadocuenta_cueban=$row['estado_cueban'];
						$descripcion_estcue=$row['descripcion_estcue'];

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

        echo '<h4 id ="msmcorreto" > El número de cuenta encontrado. </h4>' ;

    }
    else{
        echo '<h4 id ="errorSis" > El número de cuenta no existe, vuelva a intentar. </h4>' ;
    }

    pg_close($conexion);
}//if isset buscar fin


?>

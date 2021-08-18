<?php
 $cedula_per='';
 $apellido1_per='';
 $apellido2_per='';
 $nombre1_per='';
 $nombre2_per='';
 $celular_per='';
 $email_per='';
 $descripcionestper_estper='';

 $cedula_per_B='';
 $apellido1_per_B='';
 $apellido2_per_B='';
 $nombre1_per_B='';
 $nombre2_per_B='';
 $celular_per_B='';
 $email_per_B='';
 $descripcionestper_estper_B='';
 $descripcion_tipcue_B='';
 $descripcion_transf='';

 $dateAC=''; 
 $saldo_cueban=0;
 $persona_cueban="";

 $descripcion_estcue='';
 $descripcion_tipcue='';
 $numCCC='';
 $numCCC_B='';
 $numtransferencia='';
  

if(isset($_POST['buscar_TF'])){  

    require_once './conex.php';
    $conexion=conectarBD();   

    if($_POST['txtbuscarDato1']!= $_POST['txtbuscarDato2']){//valida que las cuentas no sean las mismas
    
         
        //consulta buscar en la tabla cuenta
        $buscarDato1=$_POST['txtbuscarDato1'];
        $consulta="SELECT 
        *FROM public.cuentabancaria, public.persona, public.estadopersona, public.estadocuenta, public.tipocuenta
        WHERE numerocuenta_cueban='$buscarDato1' 
        and persona_cueban=cedula_per 
        and estadopersona_per=codigo_estper
        and tipocuenta_cueban=codigo_tipcue
        and estado_cueban=codigo_estcue;";
        $resultado_D=pg_query($conexion,$consulta) or die (" error no se realizo la consulta en la tabla cuentabancaria");
        
        if(pg_num_rows($resultado_D)>0){

            
        echo '<h4 id ="msmcorreto" > El número de cuenta a debitar encontrado. </h4>' ;

        
            $buscarDato2=$_POST['txtbuscarDato2'];
            $consulta="SELECT 
            *FROM public.cuentabancaria, public.persona, public.estadopersona, public.estadocuenta, public.tipocuenta
            WHERE numerocuenta_cueban='$buscarDato2' 
            and persona_cueban=cedula_per 
            and estadopersona_per=codigo_estper
            and tipocuenta_cueban=codigo_tipcue
            and estado_cueban=codigo_estcue;";
            $resultado_B=pg_query($conexion,$consulta) or die (" error no se realizo la consulta en la tabla cuentabancaria");

            if(pg_num_rows($resultado_B)>0){

                while($row=pg_fetch_array($resultado_D)){            
                    $numCCC=$row['numerocuenta_cueban'];
                    
                    $descripcion_tipcue=$row['descripcion_tipcue'];
        
                    $cedula_per=$row['cedula_per'];
                    $apellido1_per=$row['apellido1_per'];
                    $apellido2_per=$row['apellido2_per'];
                    $nombre1_per=$row['nombre1_per'];
                    $nombre2_per=$row['nombre2_per'];
                    $celular_per=$row['celular_per'];
                    $email_per=$row['email_per'];
                    $descripcionestper_estper=$row['descripcion_estper'];                     
        
                }
                
                pg_free_result($resultado_D);

                while($row=pg_fetch_array($resultado_B)){            
                    $numCCC_B=$row['numerocuenta_cueban'];

                    $descripcion_tipcue_B=$row['descripcion_tipcue'];
        
                    $cedula_per_B=$row['cedula_per'];
                    $apellido1_per_B=$row['apellido1_per'];
                    $apellido2_per_B=$row['apellido2_per'];
                    $nombre1_per_B=$row['nombre1_per'];
                    $nombre2_per_B=$row['nombre2_per'];
                    $celular_per_B=$row['celular_per'];
                    $email_per_B=$row['email_per'];
                    $descripcionestper_estper_B=$row['descripcion_estper'];                     
        
                }
                echo '<h4 id ="msmcorreto" > El número de cuenta beneficiario encontrado. </h4>' ;
            }else{
                    echo '<h4 id ="errorSis" > El número de cuenta beneficiario no es la correcta. </h4>' ;

            }
            pg_free_result($resultado_B);
            
            
            //PARA CONSULTAR EL ULTIMO UMERO DE TRANSFERENCIA Y SUMARLE UNO PARA EL NUEVO Y MANIPULAR MANUAL
            $consulta="SELECT max(codigo_transf)
                        FROM trantransferencia;";
            $resultado=pg_query($conexion,$consulta) or die ("error no se pudo contar el total de numero de registros en tabla trnsferencia");
            $numtransferencia=pg_fetch_result($resultado,0) + 1;
        
        }
        else{
            echo '<h4 id ="errorSis" > El número de cuenta a debitar no encontrada, vuelva a intentar. </h4>' ;
        }
    }else{
        echo '<h4 id ="errorSis" > Los números de cuenta son iguales, no se puede realizar transferencia, las cuentas deben ser diferentes </h4>' ;
        
    }

    pg_close($conexion);     
}//if isset buscar fin


?>

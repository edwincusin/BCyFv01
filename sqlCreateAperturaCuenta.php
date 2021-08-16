<?php


if(isset($_POST['crear_AC'])){    

    require_once './conex.php';
    $conexion=conectarBD();

   //declarovariables
   $estado_cueban_crear=null;
    
   $fechaapertura_cueban_crear=$_POST['dtfechaAper_AC']; 
   $saldo_cueban_crear=$_POST['txtsaldo_AC'];
   $persona_cueban_crear=$_POST['txtcedula_AC'];
   $estado_cueban_crear=$_POST['desEstadoCuenta_AC'];   
   $tipocuenta_cueban_crear=$_POST['descripcionTipoCuenta_AC'];
   $CCC=null; //variable donde se va generar el CCC

    if($persona_cueban_crear!=''){ //validar que se haya seleccionado un cliente
        if($_POST['txtestadopersona_AC']=='ACTIVO'){ //para validar que la persona este operativo en el sistema activo
            if($estado_cueban_crear==1){//validar por primera vez cuenta activa
                //consulta para generar el numero de cuenta aorde al ultimo digito creado 
                $consulta="SELECT max(numerocuenta_cueban)
                            FROM cuentabancaria;";
                $resultado=pg_query($conexion,$consulta) or die ("error no se pudo contar el total de numero de cuentas");
                $CCC=pg_fetch_result($resultado,0) + 1;
                pg_free_result($resultado);

                //SQL PARA GUARDAR CCC
                $consulta="INSERT INTO public.cuentabancaria(
                                    numerocuenta_cueban, 
                                    fechaapertura_cueban, 
                                    saldo_cueban, 
                                    tipocuenta_cueban, 
                                    persona_cueban, 
                                    estado_cueban)
                            VALUES 
                            ($CCC, 
                            '$fechaapertura_cueban_crear', 
                            $saldo_cueban_crear, 
                            $tipocuenta_cueban_crear, 
                            '$persona_cueban_crear', 
                            $estado_cueban_crear);";
                $resultado=pg_query($conexion,$consulta) or die ("error no se pudo guardar en la tabla cuenta bancaria");

                echo '<h4 id ="msmcorreto"> La cuenta se registro con exito</h4> ';
            }else {
                echo '<h4 id ="errorSis"> La cuenta debe aperturarse en estado activa</h4> ';
            }
        }else {
            echo '<h4 id ="errorSis"> Cliente en estado no operativo en el sistema actualizar informaciónn</h4> ';
        }
    }else{
        echo '<h4 id ="errorSis"> No existe informacion de cliente a quien designar  CCC</h4> ';
          }




    // pg_free_result($resultado);
    pg_close($conexion);
}//if isset buscar fin


?>

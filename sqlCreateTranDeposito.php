<?php 

if(isset($_POST['crear_deposito'])){
    
    require_once './conex.php';
    $conexion=conectarBD();   


    if($_POST['txtcedulatrandep']!=''){//validar que se haya selecionado cuenta para depositar
        if($_POST['txtvalor']>0){//valida si el valor es mayor a cero
            //ejecuto las consultas sql

                $codigo_trandep=$_POST['numDeposito']; 
                $fechadeposito_trandep=$_POST['dtfechaAper_AC']; 
                $nombredep_trandep=$_POST['txtanomape']; 
                $ceduladep_trandep=$_POST['txtcedularet']; 
                $monto_trandep=$_POST['txtvalor'];
                $numerocheque_trandep=$_POST['txtcheque']; 
                $saldomonto_trandep= 0;//calcular
                $cuentabancaria_trandep=$_POST['txtCCC']; 
                $tipodeposito_trandep=$_POST['descripcionTipoRetiro']; 
                $banco_trandep=$_POST['descripcionBancosLocales'];

                $saldocuentadepositar=0;

            //consultarsaldocuenta beneficiario
            $consulta="SELECT saldo_cueban 
            FROM public.cuentabancaria 
            WHERE numerocuenta_cueban=$cuentabancaria_trandep;";
            $resultado=pg_query($conexion,$consulta) or die ("error no se puede realizar la consulta de saldo en la cuenta bancaria de beneficiario");
            while($row=pg_fetch_array($resultado)){
                $saldocuentadepositar=$row['saldo_cueban'];            }
            pg_free_result($resultado);

            $saldomonto_trandep=$saldocuentadepositar + $monto_trandep;

           
             //registrar en la tabla de deposito
            $consulta="INSERT INTO public.trandeposito(
                codigo_trandep, 
                fechadeposito_trandep, 
                nombredep_trandep, 
                ceduladep_trandep, 
                monto_trandep, 
                numerocheque_trandep, 
                saldomonto_trandep, 
                cuentabancaria_trandep, 
                tipodeposito_trandep, 
                banco_trandep)
                VALUES (
                $codigo_trandep, 
                '$fechadeposito_trandep', 
                '$nombredep_trandep', 
                '$ceduladep_trandep', 
                $monto_trandep, 
                '$numerocheque_trandep', 
                $saldomonto_trandep, 
                $cuentabancaria_trandep, 
                $tipodeposito_trandep, 
                $banco_trandep
                );"; 
                $resultado=pg_query($conexion,$consulta) or die (" ERROR AL REGISTRAR DEPOSITO EN LA TABLA DEPOSITO");
                pg_free_result($resultado);

             //sql para actualizar saldo cuenta beneficiaria
             $consulta="UPDATE public.cuentabancaria 
             SET  saldo_cueban=$saldomonto_trandep               
             WHERE numerocuenta_cueban = $cuentabancaria_trandep;";
             $resultado=pg_query($conexion,$consulta) or die ("error al realizar modificacion en la tabla cuentabancaria AL ACTUALIZAR SALDO BENEFICIARIO");
             pg_free_result($resultado);      

             echo '<br> <h4 id ="msmcorreto" > DEPÓSITO REALIZADO CON ÉXITO. </h4>' ; 

            }else {
            echo '<h4 id ="errorSis" > Debe ingresar un valor mayor a 0 $, vuelva a intentar. </h4>' ;
        }

    }else{//cierra validacion 
        echo '<h4 id ="errorSis" > Primero debe consultar cuenta para depositar, vuelva a intentar. </h4>' ;
    }
    pg_close($conexion);
}//fin del isset



?>